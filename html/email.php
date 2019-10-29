<!DOCTYPE html>
<html>
<head>
	<title>Contact US</title>
<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}
include('navbar1.php');
$day=date('m-d-y');
$time= date('H:i:s');


$send="";
$to="cara.asistant@gmail.com";
$from=adresse_mail();
$subject=$_POST['subject_sender'];
$msg=" User: ".$from." \n Message: ".$_POST['commentaire_sender'];
if(($msg=="") or ($subject =="")){
}
else{
mysqli_close($conn);
include('Data_Base_connection.php');
$name_email_sender=name();
$adresse_email_sender=adresse_mail();
$msg_email=$_POST['commentaire_sender'];
$sql = "INSERT INTO Emails VALUES ('', '$name_email_sender','$adresse_email_sender','$day','$time', '$subject','$msg_email')";

if (mysqli_query($conn, $sql)) {} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
exec("sudo python /var/www/my_pythons/mail.py '$subject' '$to' '$msg' '$from'");
$send="Your message has been sent successfully";
}
?>

</head>
<body>
<form name="f1" method="post" action="">
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>

  <div class="row">
    <div class="col-md-4">
      <p> Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Tunisia, Sousse</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: cara.asistant@gmail.com </p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
         <p>Your Email       :<?php $user_adresse_mail=adresse_mail(); echo $user_adresse_mail; ?></p>
         <p>Your Name        :<?php $user_name=name(); echo $user_name; ?></p>
</div><br><br><br>
  <p ><em>Feel free to send comments or message </em></p>

	<div class="col-sm-6 form-group">
          <input type="text" class="form-control" id="subject_sender" name="subject_sender" placeholder="Subject" type="email" required>
        </div>

      </div>
      <textarea class="form-control" id="commentaire_sender" name="commentaire_sender" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <input type="submit" value="Send" class="btn pull-right"  >        </div>
      </div>
<p style='color:#1E90FF;'><?php echo $send; ?></p>

    </div>
  </div>
</div>
</form>
<script>
function send(){

document.getElementById("f1").action = "emailsender.php"; 
document.getElementById("f1").submit();	
}
</script>
</body>
</html>

