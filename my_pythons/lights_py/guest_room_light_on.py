import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
guest_room_light_pin=5
GPIO.setup(guest_room_light_pin,GPIO.OUT)
GPIO.output(guest_room_light_pin,GPIO.HIGH)

