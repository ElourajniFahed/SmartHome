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
<?php


$servername = "localhost";
$username = "root";
$password = "fahd50029540";
$dbname = "home_statics";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$exist='False';
$login=$_POST['Login'];
$num_tel=$_POST['Phone_Number'];
$email=$_POST['Email_Adresse'];
if(($login!='') and ($num_tel!='') and ($email!='') ){
/*echo $login;
echo $num_tel ;
echo $email ;*/
$sql = "SELECT * FROM users where nom_user='$login' and  num_tel_user='$num_tel' and email_adresse_user='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
$exist='True';

}
if($exist=='True'){
include('security.php');
$new_password=creation_mdp();
$sql = "UPDATE users SET password_user='$new_password' WHERE nom_user='$login' ";
	if (mysqli_query($conn, $sql)) {
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$msg=" Dear ".$login."  Your new Password is : ".$new_password." \n Your Login Information are :  \n Login : ".$login."\n Password : ".$new_password."\n Have a good day";

exec("sudo python /var/www/my_pythons/mail.py 'Password recovery ' '$email' '$msg' 'cara.asistant@gmail.com'");





echo"

  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black'>
     <center> <h1 >Notification</h1></center>
    </div>
    <div class='w3-container'>

	 <p> The password has been successfully sent to your email address please check your Email :  "; echo $email ; echo" . You will find it </p>
	 		 <p>Copy it and past it in the password case  <B>Thank you</B> </p>


	<p><a href='login.php'><input type='button' class='btn btn-primary' value='Click here to return to Login Page ' style='width:100%;'></a></p>
      </form>
</center>
    </div>
  </div>";




}
else{
echo"

  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black'>
     <center> <h1>Worning</h1></center>
    </div>
    <div class='w3-container'>

	 <p>Sorry  "; echo $login ; echo" . I can not find a match between your information and my database information please check again</p>
	 		 <p>Thank you for your comprehension</p><br>

	<p><a href='login.php'><input type='button' class='btn btn-primary' value='Click here to return to Login Page ' style='width:100%;'></a></p>
      </form>
</center>
    </div>
  </div>";

}

}
else{
session_start();

$user=$_POST['user'];
$password=$_POST['password'];
if(isset($_POST['save'])){
$save='True';}
if($save=="True"){
$sql = "UPDATE users SET  save_pwd='$save' WHERE nom_user='$user' and password_user='$password'";
$result = mysqli_query($conn, $sql);


}
 $failduser=" " ;
 $faildpass=" ";

$sql = "SELECT * FROM users where nom_user='$user' and password_user='$password' and blocked='False'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
		$_SESSION['Login']=$login;
	$sql = "UPDATE users SET connected='True' WHERE nom_user='$user' and password_user='$password'";
	$result = mysqli_query($conn, $sql);
	
    header('Location: index.php');}

    else {
 $failduser="Invalide Username";
 $faildpass=" Invalide Password ";
header('Location: login.php'); 
  
}

mysqli_close($conn);
}
?>
