import RPi.GPIO as GPIO 
import time
GPIO.setmode(GPIO.BOARD)
GPIO.setup(7,GPIO.IN)
while True:
	
	i=GPIO.input(7)
	if i==0:
		print "no interrupt",i
		time.sleep(0.1)
	elif i==1:
		print "interupt",i
		time.sleep(0.1)
GPIO.cleanup
