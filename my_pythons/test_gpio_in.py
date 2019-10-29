import RPi.GPIO as GPIO
import MySQLdb
#import mysql.connector
#from mysql.connector import errorcode
global cursor
import sys
import time
import datetime
import subprocess

#pin=int(sys.argv[1])
GPIO.setmode(GPIO.BOARD)
global state
state=''
global verif
verif='true'
global nbr
nbr=0
global table_reffff

def php(code):
  # open process
  p = subprocess.Popen(['php'], stdout=subprocess.PIPE, stdin=subprocess.PIPE, stderr=subprocess.STDOUT, close_fds=True)

  # read output
  o = p.communicate(code)[0]

  # kill process
  try:
    os.kill(p.pid, signal.SIGTERM)
  except:
    pass

  # return
  return o



def calcule_consommation(datedeb,datefin,timedeb , timefin , conpersec):
	somme=0
	j=0
	deffereceyear_sec=0
	defferecemonth_sec=0
	deffereceday_sec=0


	daydeb=(int)(datedeb[3]+datedeb[4])
	monthdeb=(int)(datedeb[0]+datedeb[1])
	yeardeb=(int)(datedeb[6]+datedeb[7])
	dayfin=(int)(datefin[3]+datefin[4])
	monthfin=(int)(datefin[0]+datefin[1])
	yearfin=(int)(datefin[6]+datefin[7])
	if(datedeb!=datefin):
		if(yearfin>yeardeb):
			deffereceyear_sec=(yearfin-yeardeb)*12*30*24*60*60
		if(monthfin>monthdeb):
			defferecemonth_sec=(monthfin-monthdeb)*30*24*60*60
		if(dayfin>daydeb):
			deffereceday_sec=(dayfin-daydeb)*24*60*60
	#//j=86400;// nombre des secondes dans un jour 
	deb=(timedeb.split(':'))
	fin=(timefin.split(':'))
	price=(int)(conpersec)
	#print(deb)
	#print(fin)
	#print(price)
	debh=deb[0]
	debm=deb[1]
	debs=deb[2]
	finh=fin[0]
	finm=fin[1]
	fins=fin[2]
	
	#print(finh)
	#print(debm)
	#print(debs)
	#print(price)
	debsecondes=((((int(debh[0])*10)+int(debh[1]))*60*60)+(((int(debm[0])*10)+int(debm[1]))*60)+((int(debs[0])*10)+int(debs[1])))
	finsecondes=((((int(finh[0])*10)+int(finh[1]))*60*60)+((int(finm[0])*10+int(finm[1]))*60)+(int(fins[0])*10+int(fins[1])))
	somme=float((somme+((finsecondes+deffereceyear_sec+defferecemonth_sec+deffereceday_sec)-debsecondes)*price))
	somme=float(somme/3600)
	somme=abs(somme)

	#print(debsecondes)
	return somme	


def date_now(day_time):
	date=str(day_time)
	tab=date.split(' ')
	
	date_string=str(tab[0])
	tab=date_string.split('-')
	year=tab[0]
	month=tab[1]
	day=tab[2]

	yeart=year[2]+year[3]
	date_string=month+'-'+day+'-'+yeart

	return date_string
def time_now(day_time):
	date=str(day_time)
	tab=date.split(' ')
	time_millisecond=str(tab[1])

	tab=time_millisecond.split('.')
	time_millisecond=str(tab[0])

	#print(time_millisecond)
	return time_millisecond

def string_tab(answer):

	    j=0
	    chaine=""
	    while j < len(answer):
		
		ch=(answer[j])
		chaine=chaine+ch+" "
		j=j+1
            
	    return chaine


def connextion_db():
	try:	
		global con
		con=MySQLdb.connect(
		user='root',
		passwd='fahd50029540',
		host='localhost',
		db='home_statics')
		print('it work')
	except KeyboardInterrupt:
			print('connection faild')
def determine_tble_ref_lights():
	try:
		#global chiane
		chaine=""
		global cursor
		cursor=con.cursor();
		cursor.execute('SELECT table_reference FROM lights')
		for row in cursor.fetchall():
                        chaine=chaine+row[0]+" "
			
		tab=chaine.split(" ")
		length=len(tab)-1
		tab[length]=""

                return tab

	except KeyboardInterrupt:
		print('determiner table reference faild')



def determiner_gpio_table_ref(table):
	liste_gpio=''
	for i in range(len(table)-1):
		table_ref=table[i]
		if table_ref!='':
			cursor.execute('SELECT gpio_in FROM lights WHERE table_reference = %s',table_ref)
			for row in cursor.fetchall():
				pass
			gpio=row[0]
		liste_gpio=liste_gpio+gpio+" " 
	liste_gpio=liste_gpio.split(' ')
	return liste_gpio






def insert_light(table_ref,time_no,day_no):
	user='Local : Manuel'
	etat='ON'
	print(table_ref)

	cursor.execute('''INSERT INTO %s (Activation_Day,Activation_Time,Desactivation_Day,Desactivation_Time,Consommation_Light_Totale,Report,User_Activator,User_Desactivator)  VALUES (%%s,%%s,'','','0','',%%s,'')''' % table_ref,(day_no,time_no,user))
	
	cursor.execute("UPDATE lights SET state_light=%s , start_time=%s ,stop_time='' , consommation_light_totale='' WHERE table_reference =%s",(etat,time_no,table_ref))
	con.commit()
	
def UPDATE_light(table_ref,time_no,day_no):
	liste=''
	start_day=''
	start_time=''
	user_activ=''
	cursor.execute('''SELECT * FROM %s WHERE User_Desactivator ='' ''' %table_ref)
	for row in cursor.fetchall():
		start_day=row[1]
		start_time=row[2]
		user_activ=row[7]
	cursor.execute('''SELECT * FROM lights WHERE table_reference  ='%s' ''' %table_ref)
	for row in cursor.fetchall():
		con_seco=row[7]
		
	print(con_seco)
	#print(time_no - start_time)
	
	#print(start_day)
	#print(start_time)
	user='Local : Manuel'
	etat='OFF'
	consoma=calcule_consommation(start_day,day_no,start_time,time_no,con_seco)
	#print(consoma)
	print(table_ref)
	rapport=table_ref+'has been activated since '+ start_time+' by '+ user_activ+'   until  '+time_no+'  and it wos disactiveted by  '+user
	cursor.execute('''UPDATE %s  SET Desactivation_Day=%%s , Desactivation_Time=%%s ,User_Desactivator=%%s,Report=%%s ,Consommation_Light_Totale=%%s WHERE User_Desactivator='' ''' % table_ref,(day_no,time_no,user,rapport,consoma))
	cursor.execute("UPDATE lights SET state_light=%s , stop_time=%s  WHERE table_reference =%s",(etat,time_no,table_ref))
	con.commit()

def state_objet(pin):
	

	cursor.execute('SELECT * FROM lights WHERE gpio_in=%s ',pin)
	for row in cursor.fetchall():
		state_anc=row[1]
	con.commit()
	return state_anc
def test_gpio(pin , nbr):
	try:	
		global verif
		global state
		global time_n
		global day_n
		global table_reffff
		table_reffff="x"
		day_time=datetime.datetime.now()

		day_n=date_now(day_time)
		time_n=time_now(day_time)
		st=state_objet(pin)
		pin=int(pin)
		GPIO.setup(pin,GPIO.OUT)
		tab=determine_tble_ref_lights()
		liste_gpio=determiner_gpio_table_ref(tab)
		for j in range(len(liste_gpio)):	
			if(liste_gpio[j]!='') :
				if(liste_gpio[j]==str(pin)):
					table_reffff=j
		if(nbr=='0'):
			if (GPIO.input(pin)==1):
				time.sleep(1)
				state=str(pin)+' ON'
				verif='false'
				#print(tab[table_reffff])
				print (state)
				nbr='1'
				if  (st=='OFF'):
					print('Insert')

					insert_light(str(tab[table_reffff]),time_n,day_n)

				return nbr

		elif(nbr=='1'):
			if(GPIO.input(pin)==0)  :
				time.sleep(1)
				state=str(pin)+' OFF'

				print (state)
				verif='true'
				nbr='0'
				if  (st=='ON'):
					print('Updated')
					UPDATE_light(str(tab[table_reffff]),time_n,day_n)		

				return nbr
				
	except KeyboardInterrupt:
		print('test gpio faild ')
def table_nbre():
	ch=""
	cursor.execute('SELECT * FROM lights')
	for row in cursor.fetchall():
		state_anc=row[1]
		if(state_anc=='ON'):
			st='1'
		else:
			st='0';

		ch=ch+st+" "
	con.commit()
	table=ch.split(" ")
	#print(table)
	return table
	time.sleep(1)
def main_principal(liste_gpio):
	try:	
		global nbr
		nbr=''
		ch=""
		for i in range(len(liste_gpio)-1):
			ch=ch+str(0)+" "
		table_nbr=ch.split(" ")
		print(table_nbr)
		anc_tab=table_nbr

		while True:
			if(anc_tab!=table_nbr):
				print(table_nbr)
			anc_tab=table_nbr
			for i in range(len(liste_gpio)-1):
				if(liste_gpio[i]!=''):
					nambre=table_nbr[i]
					nbr=test_gpio(liste_gpio[i],nambre)
					if((nbr=='1') or (nbr=='0')):
						table_nbr[i]=nbr
						anc_tab=table_nbr
						#print(nbr)
						
					#print(table_nbr[i])

	except KeyboardInterrupt:
		print('test main princip faild ')
connextion_db()
tab=determine_tble_ref_lights()
liste_gpio=determiner_gpio_table_ref(tab)
#print(liste_gpio)
day_time=datetime.datetime.now()

day_no=date_now(day_time)

time_no=time_now(day_time)
#print(time_no)
#cons=calcule_consommation("04-12-17","04-13-17","00:33:14" , "22:07:14" , "100" )

#print(cons)
#print(day_n)
#insert_light('Living_Room_Lighting',time_n,day_n)
#UPDATE_light('Living_Room_Lighting',time_n,day_n)
main_principal(liste_gpio)
#proc = subprocess.Popen("php /var/www/html/calculeconsommation.php", shell=True, stdout=subprocess.PIPE,'04-12-17','04-13-17','00:33:14' , '22:07:14' , '100')
#script_response = proc.stdout.read()
#print(script_response)
#
#print (state_objet(3))
	

#test_gpio(3,0,'OFF')
#while True:
	#table_nbr()
	#time.sleep(1)
#cal=calcule_consommation('05-01-17','05-01-17','23:57:04' , '23:58:00' , 100)
#print(cal)
