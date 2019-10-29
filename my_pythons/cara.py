#!/usr/bin/env 
import time
#import pyaudio
from gtts import gTTS # import bibliotheque de speak
import speech_recognition as sr 
import os # import bibliotheque de sauvegarde wave
import wolframalpha # implimenter la bibliotheque de connaissance
import sqlite3
import datetime
import random
import wikipedia # bibliotheque du wekipidia
# obtain path to "english.wav" in the same folder as this script
from os import path
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
#########################
servoPin=3
GPIO.setup(servoPin,GPIO.OUT)
pwm=GPIO.PWM(servoPin,50)
pwm.start(0)
#########################





def say(question,answer,language):
	tts=gTTS(text=answer,lang=language)
	tts.save(question+".mp3")
	
	os.system("mpg321 "+question+".mp3")
	os.system("rm "+question+".mp3")

def dors(ch):
	
	if ch=="open the dor":
		DC=9./180.*(180)+2

		say("d","yes Sir dors will be oppened right now",'en')
		
		for i in range(0,180):
			DC=9./180.*i+2    
			pwm.ChangeDutyCycle(DC)
			time.sleep(0.015)
	if ch=="close the dor":
		
		say("d","dors will be closed now",'en')
		for i in range(180,0,-1):
   
                        DC=9./180.*i+2 
                        pwm.ChangeDutyCycle(DC)
			time.sleep(0.015)
def lights(ch):
	GPIO.setup(7,GPIO.OUT)
	if ch=="open the living room light" or ch=="open the light" or ch=="open the lights" :
		
		say("lights_on","Yes sir Lights will be oppened right now",'en')
		GPIO.output(7,1)
	if ch=="close the living room light" or ch=="close the light" or ch=="close the lights" :
		say("lights_of","Yes sir Lights will be turned of right now",'en')
		GPIO.output(7,0)
###################################Base De Donnee##########################

conn = sqlite3.connect("cara_base_de_connaissance")
c= conn.cursor()
####Creation_Tables
def creat_table():
	c.execute('CREATE TABLE IF NOT EXISTS connaissance(questions TEXT, answers TEXT)')

def creat_table_objet():
	c.execute('CREATE TABLE IF NOT EXISTS objet(description_objets TEXT , description_zones TEXT)')

def creat_table_request():
	c.execute('CREATE TABLE IF NOT EXISTS request(requests TEXT, actions TEXT)')

def creat_table_action():
	c.execute('CREATE TABLE IF NOT EXISTS action(acions TEXT, objets TEXT)')

def creat_table_zone():
	c.execute('CREATE TABLE IF NOT EXISTS zone(description_zones TEXT , objets TEXT)')

def creat_table_zone():
	c.execute('CREATE TABLE IF NOT EXISTS zone(description_zones TEXT , objets TEXT)')

def creat_table_synonyme():
	c.execute('CREATE TABLE IF NOT EXISTS synonyme(words TEXT , synonymes TEXT , contexts TEXT)')


def creat_table_comprehension():
	c.execute('CREATE TABLE IF NOT EXISTS comprehension(commandes TEXT, meanings TEXT)')
#### Drope tabel 
def drope_table_zone():
	c.execute('DROP TABLE  zone')
	print("Table zone dropped")
def drope_table_objet():
	c.execute('DROP TABLE  objet')
	print("Table objet dropped")

def drope_table_action():
	c.execute('DROP TABLE  action')
	print("Table action dropped")
def drope_table_request():
	c.execute('DROP TABLE  request')
	print("Table request dropped")

def drope_table_synonyme():
	c.execute('DROP TABLE  synonyme')
	print("Table synonyme dropped")

####Insertion_Tables

def data_entry(question,answer):
        c.execute("INSERT INTO connaissance(questions,answers) Values(?,?)",
        (question,answer))
        conn.commit()

def data_entry(word,synonyme,context):
        c.execute("INSERT INTO connaissance(words,synonymes,contexts) Values(?,?)",
        (word,synonyme,context))
        conn.commit()

def data_entry_objet(description_objet,description_zone):
        c.execute("INSERT INTO objet(description_objets,description_zones) Values(?,?)",
        (description_objet,description_zone))
        conn.commit()

def data_entry_request(request, action):
        c.execute("INSERT INTO request(requests,actions) Values(?,?)",
        (request,action))
        conn.commit()

def data_entry_zone(description_zone,objet):
        c.execute("INSERT INTO zone(description_zones,objets) Values(?,?)",
        (description_zone,objet))
        conn.commit()

def data_entry_action(acion,objet):
        c.execute("INSERT INTO action(acions,objets) Values(?,?)",
        (acion,objet))
        conn.commit()


def data_entry_comprehension(commande,meaning):
        c.execute("INSERT INTO comprehension(commandes,meanings) Values(?,?)",
        (commande,meaning))
        conn.commit()

####Read_Tables

def read_from_db(question):
        try:
                c.execute("SELECT answers  FROM connaissance WHERE questions=?",[question])
                #data=c.fetchall()
                #print(data)
                for row in c.fetchall():
                        pass
                return row[0]
        except UnboundLocalError:
                return ""

def read_from_db_objet(objet):
        try:
                c.execute("SELECT *  FROM objet WHERE description_objets=?",[objet])
                #data=c.fetchall()
                #print(data)
                for row in c.fetchall():
			
                        print(row)
                return row[0]
        except UnboundLocalError:
                return ""


def read_from_db_zone(objet):
        try:
                c.execute("SELECT *  FROM zone WHERE objets=?",[objet])
                #data=c.fetchall()
                #print(data)
                for row in c.fetchall():
			
                        print(row)
                return row[0]
        except UnboundLocalError:
                return ""

def read_from_db_request(action):
        try:
                c.execute("SELECT *  FROM request WHERE actions=?",[action])
                #data=c.fetchall()
                #print(data)
                for row in c.fetchall():
			
                        print(row)
                return row[0]
        except UnboundLocalError:
                return ""

def read_from_db_action(objet):
        try:
                c.execute("SELECT *  FROM action WHERE objets=?",[objet])
                #data=c.fetchall()
                #print(data)
                for row in c.fetchall():
			
                        print(row)
                return row[0]
        except UnboundLocalError:
                return ""


############################################################################
def analyse_input(input):
	words=input.split(' ')
	for i in range(0,len(words)):
		pass

############################################################################
	
say("Hell","Hello my name is cara and i am your virtual assistant How can i help you",'en')
def wikipediaa(input):
     #try:   
        creat_table()
        answ=read_from_db(input)
                                                
        if answ == "":

                print("From wikipidia"+input+"is")
                say("search","sorry sir , Unfortunately I can not find the answer to this question in my knowledge base ,  i'm going to try learn it now, this operation may take from 5 to 10 seconds","en")
                answer=wikipedia.summary(input, sentences=2)
                data_entry(input,answer)
                print (answer)
                say("answer",answer,'en')
                                                        
        else:
                say("answer",answ,'en')
     #except:   
        #say("errorfind"," sorry sir i can't find the answer to this question can you be more specific please ",'en')



def wolframalphaa(input):
 
    creat_table()
    answ=read_from_db(input)
    if answ == "":
            app_id = "KW39JQ-337WU9HGPY" # id de votre compte wolframalpha
            client = wolframalpha.Client(app_id) # cree un client avec l  id 

            res=client.query(input) # notre resultat est une requette concernant la question
            answer = next(res.results).text # resultat de QUESTION
            data_entry(input,answer)
            print (answer)
            say("answer",answer,'en')
    else:
            say("answer",answ,'en')  

 



import speech_recognition as sr

r = sr.Recognizer()
m = sr.Microphone()
input=""




def speach_recognition():
         input=""
         try:
                        print("A moment of silence, please...")
                        with m as source: r.adjust_for_ambient_noise(source)
                        print("Set minimum energy threshold to {}".format(r.energy_threshold))
                    
                        print("Say something!")
                        with m as source: audio = r.listen(source)
                        print("Got it! Now to recognize it...")
                        try:
                                            # recognize speech using Google Speech Recognition
                                            value = r.recognize_google(audio)
                                            input=str(value)
                                                    # we need some special handling here to correctly print unicode characters to standard output
                                            if str is bytes:  # this version of Python uses bytes for strings (Python 2)
                                                    print(u"You said {}".format(value).encode("utf-8"))
                                            else:  # this version of Python uses unicode for strings (Python 3+)
                                                    print("You said {}".format(value))
                                            return input
                        except sr.UnknownValueError:
                                                 print("Oops! Didn't catch that")
                                                 input=" "
                                                 return input
                        except sr.RequestError as e:
                                                 print("Uh oh! Couldn't request results from Google Speech Recognition service; {0}".format(e))
                                                 input=" "
                                                 return input
         except KeyboardInterrupt:
                  input=" "
                  return input
                  


                

                 
def response():
        while True:

                        input= speach_recognition()
                        
            		
			
			
                      

                        if input=="open the living room light" or input=="open the living room lights" or input=="open the light" or input=="open the lights" :
                                        lights(input)
                                                

                        elif input=="close the living room light off" or input=="close the light" or input=="close the lights" :

                                        lights(input)
                                                
                        elif input=="open the dor" :
                                        dors(input)
                        elif input=="close the dor" :
                                        
                                        dors(input)
                                  
                        else :
                                        
                                        try:
                                                wolframalphaa(input)
                                        
                                        except:
                                                try:
                                                        wikipediaa(input)
                                                except:
                                                        say("err","sorry sir can you be more specific please",'en')




                                    
                        c.close
                        conn.close
                        
                
                

creat_table_request()
creat_table_objet()
creat_table_action()
creat_table_zone()
creat_table_comprehension()
read_from_db_action(objet)
