import RPi.GPIO as GPIO 
import time

GPIO.setmode(GPIO.BOARD)
Trig=7
Echo=11
GPIO.setup(Trig,GPIO.OUT)
GPIO.setup(Echo,GPIO.IN)

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

GPIO.cleanup()
for(k=r;k<j;k++){
ch=ch+" "+tab[i];}
say(ch);
ch="";
j=0
r=i;

}
elseif((j<10 ) and(i==length-1)){
for(k=r;k<j;k++){
ch=ch+tab[i];}
say(ch);
}
