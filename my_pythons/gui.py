from Tkinter import * 
import tkFont
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
GPIO.setup(8,GPIO.OUT)
GPIO.output(8,GPIO.LOW)
win=Tk()#main window 
myFont=tkFont.Font(family='Helvetica',size=36,weight='bold')


def ledOn():
    print("LED button pressed")
    if GPIO.input(8):# si le pin 8 est en marche = high donc 
        GPIO.output(8,GPIO.LOW)#on le desactiver = etat low 
        ledButton["text"]="LED ON"
    else:
        GPIO.output(8,GPIO.HIGH)# si il est deja disactiver alors on le reactiver 
        ledButton["text"]="LED OF"


def exitProgram():
    print("Exit button pressed")
    GPIO.cleanup()
    win.quit()

win.title("First GUI")# title of the main window
win.geometry('800x480')# dimention de main window 

exitButton=Button(win,text="EXIT",font=myFont,command=exitProgram, height=2, width=6)
exitButton.pack(side=BOTTOM)


ledButton=Button(win,text="LED on",font=myFont,command=ledOn, height=2, width=6)
ledButton.pack()

mainloop()
