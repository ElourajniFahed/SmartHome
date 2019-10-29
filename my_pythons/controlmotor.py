import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BOARD)
moterpin=7
GPIO.setup(moterpin,GPIO.OUT)
p=GPIO.PWM(moterpin,207)
p.start(0)
try:
	while True:
		for i in range(0,100):
			p.ChangeDutyCycle(5)
			time.sleep(0.01)
		for i in range(100):
			p.ChangeDutyCycle(100-i)
			time.sleep(0.02)
except KeyboardInterrupt:
	pass
p.stop()
GPIO.cleanup()
