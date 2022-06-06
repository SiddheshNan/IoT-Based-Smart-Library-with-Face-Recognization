import requests
import json
import string
import cv2, sys, numpy, os
import shutil
import time
haar_file = 'haarcascade_frontalface_default.xml'
datasets = 'datasets'  #All the faces data will be present this folder
sub_data = 'train'     #This will creater folders in datasets with the face of people, so change it's name everytime for the new person.

def start_training(count):
    (width, height) = (130, 100)  # defining the size of images

    face_cascade = cv2.CascadeClassifier(haar_file)
    webcam = cv2.VideoCapture(0)  # '0' is use for my webcam, if you've any other camera attached use '1' like this
    # The program loops until it has 30 images of the face.
    cv2.namedWindow('OpenCV')
    cv2.resizeWindow('OpenCV', 720, 480)
    #count = 0
    while True:
        (_, im) = webcam.read()
        gray = cv2.cvtColor(im, cv2.COLOR_BGR2GRAY)
        faces = face_cascade.detectMultiScale(gray, 1.3, 4)
        for (x, y, w, h) in faces:
            cv2.rectangle(im, (x, y), (x + w, y + h), (255, 0, 0), 2)
            face = gray[y:y + h, x:x + w]
            face_resize = cv2.resize(face, (width, height))
            cv2.imwrite('%s/%s.png' % (path, count), face_resize)
        count += 1

        cv2.putText(im, 'Please wait 15 sec for Face training, after then press esc', (25, 25), cv2.FONT_HERSHEY_SIMPLEX , 1, (0, 0, 255) , 2, cv2.LINE_AA)
        cv2.imshow('OpenCV', im)
        key = cv2.waitKey(150)
        if key == 27:
            webcam.release()
            cv2.destroyWindow('OpenCV')
            cv2.destroyAllWindows()
            cv2.waitKey(0)
            break

def sendData():
    data = {'username': username,
            'password': password,
            'rollno': rollno,
            'branch': branch,
            'section': section}

    try:
        r = requests.post(url=createUserURL, json=data)
        res = r.json()
        if 'error' not in res:
            print ('\nStudent Account Created Successfully')
            print ('server response: ', res['success'], '\n')
            return 1
        if 'success' not in res:
            print ('\nSomthing Went Wrong!!! : Error: ', res['error'])
            print ('Please Retry the Process\n')
            try:
                shutil.rmtree('datasets/'+username)
            except:
                print('failed to remove directory')
            return 0
    except Exception as e:
        try:
            shutil.rmtree('datasets/' + username)
        except:
            print('failed to remove directory')
        print (e)
        return 0


createUserURL = 'https://smartlib.aimtechs.co.in/api/createUser.php?auth=rHpW4fzd'

username = ''
while not username:
    username = input("please enter username: ")

password = ''
while not password:
    password = input("please enter password: (minimum 6 characters) ")

rollno = ''
while not rollno:
    rollno = input("please enter roll no: ")

branch = ''
while not branch:
    branch = input("please enter branch: ")

section = ''
while not section:
    section = input("please enter section: ")

sub_data = username
path = os.path.join(datasets, sub_data)
if not os.path.isdir(path):
    os.mkdir(path)
    start_training(0)
    sendData()
else:
    num = []
    for file in os.listdir(path):
        if file.endswith(".png"):
            num.append(int(file.split(".")[0]))
    start_training(max(num)+1)
    #sendData()


