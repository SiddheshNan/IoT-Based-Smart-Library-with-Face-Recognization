import os, sys

while True:
    inp = input("Press 1 to Create User, Press 2 to Issue Book, Press 3 to Return Book : ")
    if inp:
        if inp == '1':
            exec(open("./create.py").read())
        elif inp == '2':
            exec(open("./issue.py").read())
        elif inp == '3':
            exec(open("./return.py").read())
        else:
            print("invalid selection! please try again")
