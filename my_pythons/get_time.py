
import time
import datetime
def time_now(day_time):
	
	date=str(day_time)
	tab=date.split(' ')
	time_millisecond=str(tab[1])

	tab=time_millisecond.split('.')
	time_millisecond=str(tab[0])

	print(time_millisecond)
	return time_millisecond

day_time=datetime.datetime.now()
time_now(day_time)