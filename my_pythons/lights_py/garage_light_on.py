import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
garage_light_pin=10
GPIO.setup(garage_light_pin,GPIO.OUT)
GPIO.output(garage_light_pin,GPIO.HIGH)

