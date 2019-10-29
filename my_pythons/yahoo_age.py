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




def yahoo_age(chainfinale):
	try:
		url = "https://search.yahoo.com/search;_ylt=A0LEVyWnIQJZDNcAPHZXNyoA;_ylc=X1MDMjc2NjY3OQRfcgMyBGZyA3NmcC10dHMtcwRncHJpZANLc1p0ZGJhRFJsQ1pkWFROeFRxd2lBBG5fcnNsdAMwBG5fc3VnZwMyBG9yaWdpbgNzZWFyY2gueWFob28uY29tBHBvcwMwBHBxc3RyAwRwcXN0cmwDMARxc3RybAM0MARxdWVyeQN3aGF0JTIwaXMlMjB0aGUlMjBhZ2UlMjBvZiUyMGJyYWQlMjBwaXR0BHRfc3RtcAMxNDkzMzExOTUy?p="+str(chainfinale)
		url=url+'&fr2=sb-top&fr=sfp-tts-s'
		i=0
		sauce = urllib2.urlopen(url).read()
		soup = bs.BeautifulSoup(sauce,'lxml')
		#print(soup.title.text)
		#print(soup.p)
		#print(soup.p.text)#afficher le premier paragraphe
		#print(soup.find_all('p'))
		for ul in soup.find_all('ul',class_='compArticleList'):
			if(i<1):
				#print(paragraphe.string)
				
				answer=ul.text
				print(answer)
				i=i+1
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
yahoo_age(chainfinale)