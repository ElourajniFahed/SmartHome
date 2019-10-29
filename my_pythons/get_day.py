
import time
import datetime
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
	print(date_string)
	return date_string

day_time=datetime.datetime.now()
date_now(day_time)