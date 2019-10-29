import sys 

length=len(sys.argv)
def chaa():
	chainfinale=""
	for i in range(1,length):

		chain=(sys.argv[i])
		print("la chaine numero"+str(i)+"est"+chain)

		chainfinale=chainfinale+" "+chain
	print(length)
	print(sys.argv)
	print(chainfinale)

chaa()