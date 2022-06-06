import cv2, sys, numpy, os
import threading
import time
from imutils.video import WebcamVideoStream
from imutils.video import FPS
import imutils
import requests
import serial

runable = True

doIssue = False


def run():
    nam = ''
    ecount = 0
    count = 5
    detected = 0
    not_detected = 0
    checkcount = 0

    global doIssue
    cv2.namedWindow('OpenCV')

    # global score # make score global for this thread context
    while True:
        im = webcam.read()
        im = imutils.resize(im, width=400)
        gray = cv2.cvtColor(im, cv2.COLOR_BGR2GRAY)
        faces = face_cascade.detectMultiScale(gray, 1.3, 5)
        for (x, y, w, h) in faces:
            cv2.rectangle(im, (x, y), (x + w, y + h), (255, 0, 0), 2)
            face = gray[y:y + h, x:x + w]
            face_resize = cv2.resize(face, (width, height))
            # Try to recognize the face
            prediction = model.predict(face_resize)
            cv2.rectangle(im, (x, y), (x + w, y + h), (0, 255, 0), 3)

            if count > 0:
                if prediction[1] < 72:

                    nam = names[prediction[0]]
                    count = count + 1

                    cv2.rectangle(im, (x, y), (x + w, y + h), (255, 0, 0), 3)
                    cv2.putText(im, '%s - %.0f' % (names[prediction[0]], prediction[1]), (x - 10, y - 10),
                                cv2.FONT_HERSHEY_PLAIN, 1, (0, 255, 0))
                    if nam == username_imp:
                        checkcount += 1

                    print('%s - %.0f' % (names[prediction[0]], prediction[1]), (x - 10, y - 10),
                          cv2.FONT_HERSHEY_PLAIN, 1, (0, 255, 0))
                else:
                    cv2.rectangle(im, (x, y), (x + w, y + h), (0, 0, 255), 3)
                    # print ('not recognized', (x - 10, y - 10), cv2.FONT_HERSHEY_PLAIN, 1, (255,0, 0))
                    cv2.putText(im, 'not recognized', (x - 10, y - 10), cv2.FONT_HERSHEY_PLAIN, 1, (0, 255, 0))
                    not_detected += 1
                    count -= 1

        cv2.imshow('OpenCV', im)
        key = cv2.waitKey(10)
        if checkcount >= 5:
            doIssue = True
            break
        if key == 27:
            break
        fps.update()


def stop():
    fps.stop()
    runable = False


getUsersURL = 'https://smartlib.aimtechs.co.in/api/getUsers.php?auth=rHpW4fzd'
getBooksURL = 'https://smartlib.aimtechs.co.in/api/getBooks.php?auth=rHpW4fzd'
haar_file = 'haarcascade_frontalface_default.xml'
datasets = 'datasets'

r = requests.get(getUsersURL)
data = r.json()

username_imp = input("Please enter username: ")
rollno_imp = input("Please enter Roll No: ")

test = False
for user in data:
    if user['username'] == str(username_imp) and user['rollno'] == str(rollno_imp):
        test = True

if not test:
    print("\nStudent not Found !! Please Retry with correct credentials !!\n")
    exit()

print("\n Student Identified... Starting Camera to Verify....")

print('Training...')
# Create a list of images and a list of corresponding names
(images, labels, names, id) = ([], [], {}, 0)
for (subdirs, dirs, files) in os.walk(datasets):
    for subdir in dirs:
        names[id] = subdir
        subjectpath = os.path.join(datasets, subdir)
        for filename in os.listdir(subjectpath):
            path = subjectpath + '/' + filename
            label = id
            images.append(cv2.imread(path, 0))
            labels.append(int(label))
        id += 1
(width, height) = (130, 100)

# Create a Numpy array from the two lists above
(images, labels) = [numpy.array(lis) for lis in [images, labels]]

model = cv2.face.LBPHFaceRecognizer_create()
model.train(images, labels)

face_cascade = cv2.CascadeClassifier(haar_file)
webcam = WebcamVideoStream(src=0).start()
fps = FPS().start()

run()

if not doIssue:
    print("\n Student could not be verified, exiting...")
    exit()

if doIssue:
    print("\n Student is Verified! Please Scan the RFID of Book")
    rfiddata = serial.Serial(port='/dev/ttyUSB0', baudrate=9600)
    x = rfiddata.read(12).decode()
    x = str(x)
    s = requests.get(getBooksURL)
    booksdata = s.json()
    tst = False
    for book in booksdata:
        if x == book['book_rfid'] and book['issued_by_name'] == username_imp:
            tst = True


    if not tst:
        print("Somthing went wrong..")
        exit()
    if tst:
        RETURNURL = 'https://smartlib.aimtechs.co.in/api/returnBook.php?auth=rHpW4fzd'
        returndata = {'rfid': x,
                     'rollno': rollno_imp,
                     'username': username_imp}

        # sending post request and saving response as response object
        q = requests.post(url=RETURNURL, json=returndata)
        print(q.json())
        print("Book return Successful")
        exit()
