import sqlite3
import time
import datetime
import random
conn = sqlite3.connect("cara_base_de_connaissance")
c= conn.cursor()

def creat_table():
	c.execute('CREATE TABLE IF NOT EXISTS connaissance(questions TEXT, answers TEXT)')

def data_entry(question,answer):
        c.execute("INSERT INTO connaissance(questions,answers) Values(?,?)",
        (question,answer))
        conn.commit()

def read_from_db():
        try:
                c.execute("SELECT * FROM connaissance ")
                #data=c.fetchall()
                #print(data)
                for row in c.fetchall():
                        print(row)
        except:
                pass
                
       





def dynamic_data_entry():
        unix=time.time()
	date=str(datetime.datetime.fromtimestamp(unix).strftime('%Y-%m-%d %H:%M:%S'))
	keyword='python'
	value=random.randrange(0,10)
	c.execute("INSERT INTO answers (numero,question,answer) Values(?,?,?)",
		(unix,date,keyword))
	conn.commit()



def delate_data():
       c.execute("DELETE FROM connaissance")
       conn.commit()

#creat_table()
#data_entry()

#for i in range(10):
#	dynamic_data_entry()
#	time.sleep(1)
#delate_data()
read_from_db()

c.close
conn.close
