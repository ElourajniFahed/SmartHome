import RPi.GPIO as GPIO 
import time
import sys
pin=int(sys.argv[1])
etat=int(sys.argv[2])
nbr=int(sys.argv[3])
speed=int(sys.argv[4])

GPIO.setwarnings(False)
GPIO.cleanup()
GPIO.setmode(GPIO.BOARD)
GPIO.setup(pin,GPIO.OUT)
my_pwm=GPIO.PWM(pin,100)
my_pwm.start(0)
print(pin)
print(etat)
print(nbr)
print(speed)
for i in range(nbr):
        #fast=input("How fast? (20-100)")
	print(i)
        my_pwm.ChangeDutyCycle(speed)
	time.sleep(1)
my_pwm.stop()
GPIO.cleanup()

