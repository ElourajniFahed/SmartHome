import smtplib
import sys

def sendmail(subjectt,receaverr,fromhoo,msgg):
        subject = subjectt
        to = receaverr
        sender = fromhoo
        smtpserver = smtplib.SMTP("smtp.gmail.com",587)
        user = 'cara.asistant@gmail.com'
        password ='fahd50029540'
        smtpserver.ehlo()
        smtpserver.starttls()
        smtpserver.ehlo
        smtpserver.login(user, password)
        header = 'To:' + to + '\n' + 'From: ' + sender + '\n' + 'Subject:' + subject + '\n'
        message =  header + '\n '+msgg 
        smtpserver.sendmail(sender, to, message)
        smtpserver.close()
        print("Email has been sent")
subject=(sys.argv[1])
receaver=(sys.argv[2])
msg=(sys.argv[3])
fromho=(sys.argv[4])
sendmail(subject,receaver,fromho,msg);



    

