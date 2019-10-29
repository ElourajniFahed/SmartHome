import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
basement_light_pin=12
GPIO.setup(basement_light_pin,GPIO.OUT)
GPIO.output(basement_light_pin,GPIO.LOW)

