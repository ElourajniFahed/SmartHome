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


function not_allowed($type){
echo"
<style>
 body { background-color:black;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
.btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
cursor:pointer;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
</style>
  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black'>
     <center> <h1>Worning</h1></center>
    </div>
    <div class='w3-container'>

	 <p>You are not alowed to execute this operation</p>
	 <p>Only the  "; echo $type; echo" user can execute this operation</p> 
	<p> If you are an  "; echo $type; echo" please go to contact page and send us a message and we will take this problem in consideration</p>
		 <p>Thank you for your comprehension</p><br>

	<p><a href='index.php'><input type='button' class='btn btn-primary' value='Click here to return to the Homepage ' style='width:100%;'></a></p>
      </form>
</center>
    </div>
  </div>";}





function coeur_confirmer(){
echo"
<div id='Confirmer_mdp' class='w3-modal'>
  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black'>
      <h1>Password Confirmation</h1>
    </div>
    <div class='w3-container'>
      <p>In order to execute this operation you must confirm your identity   </p>
      <form action='' name='confirmation' id='confirmation' method='post'>
        <input type='text' hidden='True'  name='type_user' id='type_user' style='width:100%;' >
        <input type='text' hidden='True'   name='page_user' id='page_user' style='width:100%;' >

        <p><input class='w3-input w3-padding-16 w3-border' type='text' required placeholder='Login'  name='Login' id='Login' ></p>
	<p id='veriflog' style='color:red;'></p>
        <p><input class='w3-input w3-padding-16 w3-border' type='text' required placeholder='Password'  name='Password' id='Password' ></p>
        <p id='verifpass' style='color:red;'></p>
	<p><input class='w3-input w3-padding-16 w3-border' type='text' required placeholder='Email Adresse'  name='Email_Adresse' id='Email_Adresse' ></p>
	<p id='verifemail' style='color:red;'></p>
	<p><input type='button' class='btn btn-primary' value='submit' onclick='submit_mdp_conf()' ></p>
 </form>
    </div>
  </div>
</div>";}

function Confirmationt_admin_creatuser(){
$type=$_POST['type_user'];
$page=$_POST['page_user'];
$password=$_POST['Password'];
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

not_allowed($type);
}
 }
}




/*
coeur_confirmer();*/
 
Confirmationt_admin_creatuser();


?>
<!--				<li>    <p><input type='button' onclick="document.getElementById('Confirmer_mdp').style.display='block'" class="btn btn-primary" value='Password confirmation'></p></li>-->

<script>
function quitter(){document.getElementById('contact').style.display='none'}
 
function submit_mdp_conf(){
var login=document.confirmation.Login.value ;
var pass=document.confirmation.Password.value ;
var email=document.confirmation.Email_Adresse.value ;
if((login=='') || (pass=='') || (email=='') ){
if (login=='') {document.getElementById("veriflog").innerHTML = "The Login is recuired";}
if (pass=='') {document.getElementById("verifpass").innerHTML = "The Password is required";}
if (email=='') {document.getElementById("verifemail").innerHTML = "The Email adress is required";}}

else{

document.getElementById("confirmation").action = "confurmation.php"; 
document.getElementById("confirmation").submit();}
}

function afficher_creat_profile(){
document.confirmation.type_user.value='administrateur';
document.confirmation.page_user.value='creat_profile';
document.getElementById('Confirmer_mdp').style.display='block'}

function afficher_liste_users(){
document.confirmation.type_user.value='administrateur';
document.confirmation.page_user.value='list_users';
document.getElementById('Confirmer_mdp').style.display='block'}



function afficher_object(){
document.confirmation.type_user.value='technician';
document.confirmation.page_user.value='view_object';
document.getElementById('Confirmer_mdp').style.display='block'}

function add_object(){
document.confirmation.type_user.value='technician';
document.confirmation.page_user.value='add_object';
document.getElementById('Confirmer_mdp').style.display='block'}
</script>