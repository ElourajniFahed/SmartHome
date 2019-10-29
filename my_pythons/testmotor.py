import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
GPIO.setup(7, GPIO.OUT)
GPIO.setup(7, GPIO.OUT)
my_pwm=GPIO.PWM(7,100)
my_pwm.start(0)
while(1):
        fast=input("How fast? (20-100)")
        my_pwm.ChangeDutyCycle(fast)
my_pwm.stop()
GPIO.cleanup()
