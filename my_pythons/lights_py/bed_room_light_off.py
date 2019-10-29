import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
ber_room_light_pin=3
GPIO.setup(ber_room_light_pin,GPIO.OUT)
GPIO.output(ber_room_light_pin,GPIO.LOW)

