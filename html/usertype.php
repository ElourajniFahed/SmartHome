<?php
function typeuser($name,$pass){
$server="localhost";
$user="root";
$pass="fahd50029540";
$base="home_statics";
$c=mysql_connect($server,$user,$pass);
mysql_select_db($base);


$sql = "SELECT * FROM users WHERE nom_user='$name' and password_user='$pass'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 

for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
$type=$rs['type_user'];
 }
return $type;
}


?>
