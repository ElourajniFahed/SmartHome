<!DOCTYPE html>
<html>
<title>User Confirmation</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('/w3images/onepage_restaurant.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
<?php






function body_forget(){
echo"
<div id='Confirmer_mdp' class='w3-modal'>
  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black'>
      <h1>Password  Forgotten</h1>
    </div>
    <div class='w3-container'>
  <p style='color:black;'>a New password  will be sent to your email account  </p>
      <p style='color:black;'>Please  fill in all the fields   </p>

        <p><input class='w3-input w3-padding-16 w3-border' type='text' required placeholder='Login'  name='Login' id='Login' ></p>
	<p id='veriflog' style='color:red;'></p>
	<p><input class='w3-input w3-padding-16 w3-border' type='text' required placeholder='Phone Number '  name='Phone_Number' id='Phone_Number' ></p>
        <p id='verifphone' style='color:red;'></p>
	<p><input class='w3-input w3-padding-16 w3-border' type='text' required placeholder='Email Adresse'  name='Email_Adresse' id='Email_Adresse' ></p>
	<p id='verifemail' style='color:red;'></p>
	<p><input type='submit' class='btn btn-primary' value='Send'  ></p>
    </div>
  </div>
</div>";}

function Confirmationt_admin_creatuser(){
$phone=$_POST['Phone_Number'];
$login=$_POST['Login'];
$mail=$_POST['Email_Adresse'];
if($mail!=''){

include('Data_Base_connection2.php');

$sql1 = "SELECT * FROM users WHERE nom_user='$login' and password_user='$password' and email_adresse_user='$mail'";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$typee=$r['type_user'];
}
if($typee==$type){$exist='true'; echo $exist;header('Location: '.$page.'.php'); }
else{$exist='false';

}
 }
}

body_forget();



?>
  <li>    <p><input type='button' onclick="document.getElementById('Confirmer_mdp').style.display='block'" class="btn btn-primary" value='Password confirmation'></p></li>-->
<script>
function submit_forget_pass(){
var login=document.confirmation.Login.value ;
var Phone_Number=document.confirmation.Phone_Number.value ;
var email=document.confirmation.Email_Adresse.value ;
if((login=='') || (Phone_Number=='') || (email=='') ){
if (login=='') {document.getElementById("veriflog").innerHTML = "The Login is recuired";}
if (Phone_Number=='') {document.getElementById("verifphone").innerHTML = "The Phone number is required";}
if (email=='') {document.getElementById("verifemail").innerHTML = "The Email adress is required";}}

else{

document.getElementById("confirmation").action = "forget_password.php"; 
document.getElementById("confirmation").submit();}
}
function affiche(){
document.getElementById('Confirmer_mdp').style.display='block';
}
</script>
