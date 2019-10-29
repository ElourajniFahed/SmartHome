import RPi.GPIO as GPIO 
import time
GPIO.setmode(GPIO.BOARD)

servoPin=3
GPIO.setup(servoPin,GPIO.OUT)
pwm=GPIO.PWM(servoPin,50)
pwm.start(2)
for i in range(0,180):
   # desiredPosition=input("wher do you wont your servo?0-18 ")
    #DC=1./183*(desiredPosition)+2
                     DC=9./180.*i+2    
                     pwm.ChangeDutyCycle(DC)
                     time.sleep(0.015)
for i in range(180,0,-1):
   # desiredPosition=input("wher do you wont your servo?0-18 ")
    #DC=1./183*(desiredPosition)+2
                        DC=9./180.*i+2 
                        pwm.ChangeDutyCycle(DC)
                        time.sleep(0.015)
 


pwm.stop()
GPIO.cleanup()
