import RPi.GPIO as GPIO 
import time
GPIO.setwarnings(False)
GPIO.cleanup()
GPIO.setmode(GPIO.BOARD)
Trig=7
Echo=11
Lighte=10
GPIO.setup(Trig,GPIO.OUT)
GPIO.setup(Lighte,GPIO.OUT)

GPIO.setup(Echo,GPIO.IN)

def show_light():
	GPIO.output(Lighte,GPIO.HIGH)

def show_stop_light():
		GPIO.output(Lighte,GPIO.LOW)
		time.sleep(0.5)
		GPIO.output(Lighte,GPIO.HIGH)

def stop_light():
	GPIO.output(Lighte,GPIO.LOW)
	
def get_distance():
	GPIO.output(Trig,True)
	time.sleep(0.0001)
	GPIO.output(Trig,False)

	while GPIO.input(Echo) == False:      
		start=time.time()
	while GPIO.input(Echo) == True:      
		stop=time.time()
	end=stop-start
	distance= end/0.000058
	print('Distance :{} cm'.format(distance))

	return distance 


while True:
	distance=get_distance()
	time.sleep(0.05)
	if distance<=9 :
		show_light()	
	if distance>9 and distance<50:
		show_stop_light()
	if distance>=50 :
		stop_light()
	