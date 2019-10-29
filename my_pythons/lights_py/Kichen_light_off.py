import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
kichen_light_pin=8
GPIO.setup(kichen_light_pin,GPIO.OUT)
GPIO.output(kichen_light_pin,GPIO.LOW)

