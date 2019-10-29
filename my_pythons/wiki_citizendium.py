import bs4 as bs
import urllib2
import sys


def string_tab(answer):

	    j=0
	    chaine=""
	    while j < len(answer):
		
		ch=(answer[j])
		chaine=chaine+ch+" "
		j=j+1
            
	    return chaine




def citizendium(chainfinale):
	try:
		url = 'http://en.citizendium.org/wiki/'
		url=url+str(chainfinale)
		print(url)
		sauce = urllib2.urlopen(url).read()
		soup = bs.BeautifulSoup(sauce,'lxml')
		#print(soup.title.text)
		#print(soup.p)
		#print(soup.p.text)
		#print(soup.find_all('p'))
		#for paragraphe in soup.find_all('p'):
			#print(paragraphe.string)
			#print(paragraphe.text)
		answer=soup.p.text
		answer=answer.replace("|"," ")
	    	answer=answer.split("\n")
	    	answer=string_tab(answer)	    

	    	answer=answer.split(" ",0)
	    	print(answer)

	except:
	    answer="not exist"
	    answer=answer.split(" ",0)
	    print(answer)	

length=len(sys.argv)
chainfinale=""
for i in range(1,length):
	chain=(sys.argv[i])

	chainfinale=chainfinale+"%20"+chain
citizendium(chainfinale)