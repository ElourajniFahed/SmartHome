from gtts import gTTS
import os
def say(question,answer,language):
        tts=gTTS(text=answer,lang=language)
        tts.save(question+".wav")

        os.system("mpg321 "+question+".wav")

while True :
	i=raw_input()
	say("a",i,'en')

