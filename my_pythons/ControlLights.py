import RPi.GPIO as GPIO
import sys
import time
pin=int(sys.argv[1])
etat=int(sys.argv[2])
GPIO.setmode(GPIO.BOARD)

GPIO.setup(pin,GPIO.OUT)
GPIO.output(pin,etat)

