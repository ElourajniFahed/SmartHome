import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
living_room_light_pin=7
GPIO.setup(living_room_light_pin,GPIO.OUT)
GPIO.output(living_room_light_pin,GPIO.HIGH)

