<?php
include('Data_Base_connection2.php');
include('Data_Base_connection.php');

function name(){
$sql = "SELECT * FROM users WHERE connected='True'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$user=$rs['nom_user'];
}
return $user;
}

function tel(){
$sql = "SELECT * FROM users WHERE connected='True'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$tel_user=$rs['num_tel_user'];
}
return $tel_user;
}

function type(){
$sql = "SELECT * FROM users WHERE connected='True'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$type_user=$rs['type_user'];
}
return $type_user;
}

function adresse_mail(){
$sql = "SELECT * FROM users WHERE connected='True'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$adresse=$rs['email_adresse_user'];
}
return $adresse;
}

function image(){
$sql = "SELECT * FROM users WHERE connected='True'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$image=$rs['image_user'];
}
return $image;
}

function country(){
$sql = "SELECT * FROM users WHERE connected='True'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$image=$rs['country'];
}
return $image;
}
function password(){
$sql = "SELECT * FROM users WHERE connected='True'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$image=$rs['password_user'];
}
return $image;
}
function email_exist($email){
$existe="False";
$sql = "SELECT * FROM users ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
if($rs['email_adresse_user']==$email){$existe="True";};
}


return $existe;
}
function name_exist($name){
$existe="False";
$sql = "SELECT * FROM users ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
if($rs['nom_user']==$name){$existe="True";};
}


return $existe;
}


function tel_exist($tel){
$existe="False";
$sql = "SELECT * FROM users ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
if($rs['num_tel_user']==$tel){$existe="True";};
}


return $existe;
}

function update_user($email,$new_name,$new_pass,$new_email,$new_tel,$new_country){
mysqli_close($conn);

include('Data_Base_connection.php');
$sql = "SELECT * FROM users WHERE email_adresse_user='$email' ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
if($new_name==""){$new_name=$rs['nom_user'];}
if($new_pass==""){$new_pass=$rs['password_user'];}
if($new_email==""){$new_email=$rs['email_adresse_user'];}
if($new_tel==""){$new_tel=$rs['num_tel_user'];}
if($new_country==""){$new_country=$rs['country'];}
}
$sqla = "UPDATE users SET nom_user='$new_name' , password_user='$new_pass' , email_adresse_user='$new_email' , num_tel_user='$new_tel' , country='$new_country' WHERE email_adresse_user='$email'";

if (mysqli_query($conn, $sqla)) {
    echo "Record updated successfully";
    } 
else {echo "Error updating record: " . mysqli_error($conn);}
}

mysqli_close($conn);
?>
