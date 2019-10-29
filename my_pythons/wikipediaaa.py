import json
import sys

import wikipedia

def string_tab(answer):

	    j=0
	    chaine=""
	    while j < len(answer):
		
		ch=(answer[j])
		chaine=chaine+ch+" "
		j=j+1
            
	    return chaine


def wiki(input): 
	
	answer= wikipedia.summary(input,sentences=2)
 	try:
  
            answer= wikipedia.summary(input,sentences=2) 
           
            answer=answer.replace("|"," ")
	    answer=answer.split("\n")
	    answer=string_tab(answer)	    
	    answer=answer.split(" ",0)
	    print(answer)
	    #print(answer)
	    #answer=answer.split("\ooo")
   	    #answer=string_tab(answer)	    
	    #answer=answer.split("\o")

	except:
	    answer="not exist"
	    answer=answer.split(" ",0)
	    print(answer)
length=len(sys.argv)
chainfinale=""
for i in range(1,length):
	chain=(sys.argv[i])

	chainfinale=chainfinale+" "+chain

    
wiki(chainfinale)  
