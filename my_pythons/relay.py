#!/usr/bin/python
import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setup(3,GPIO.OUT)
GPIO.setup(5,GPIO.OUT)
GPIO.setup(7,GPIO.OUT)
GPIO.setup(8,GPIO.OUT)

GPIO.output(3,GPIO.HIGH)
GPIO.output(5,GPIO.HIGH)
GPIO.output(7,GPIO.HIGH)
GPIO.output(8,GPIO.HIGH)
GPIO.cleanup()

