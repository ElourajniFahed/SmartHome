<?php
include('Data_Base_connection2.php');

$sql = "SELECT * FROM users";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{

$rs=mysql_fetch_array($res);
if($rs['save_pwd']=="True"){
$sql = "UPDATE users SET save_pwd='OFF'";
$res=mysql_query($sql) or die (mysql_error ());
$sql1 = "UPDATE users SET  connected='False'";
$res=mysql_query($sql1) or die (mysql_error ());
}
else{
$sql = "UPDATE users SET  connected='False'";
$res=mysql_query($sql) or die (mysql_error ());}
}
header('Location: login.php'); 
?>
