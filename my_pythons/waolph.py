import bs4 as bs
import urllib2
import sys
try:
	url='http://www.msn.fr'		
	sauce = urllib2.urlopen(url).read()
	soup = bs.BeautifulSoup(sauce,'lxml')
	images=[]
	images=soup.findAll('img')
	for image in images:
			
		print(image.get('alt'))
except:
	print('err')
	