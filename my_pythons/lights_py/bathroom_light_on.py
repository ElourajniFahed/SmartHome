import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
bathroom_light_pin=12
GPIO.setup(bathroom_light_pin,GPIO.OUT)
GPIO.output(bathroom_light_pin,GPIO.HIGH)

