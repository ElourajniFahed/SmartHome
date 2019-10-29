<?php

function insert_light($table){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
// verifier si la lampe est deja allumé 
$light_is_off="True";
include('userinformations.php');
$user_name=name();
$sql_light = "SELECT * FROM $table";
$res_light=mysql_query($sql_light) or die (mysql_error ());
$n_light= mysql_num_rows($res_light); 
for($i=0;$i<$n_light;$i++)
{
$rs_light=mysql_fetch_array($res_light);
if($rs_light['User_Desactivator']==""){$light_is_off="False";}
}
mysqli_close($conn);
include('Data_Base_connection.php');

if($light_is_off=="True"){
//modifier la table lights 
$sqlk = "UPDATE lights SET state_light='ON' , start_time='$time' , stop_time='XX:XX:XX' WHERE  table_reference='$table'";
if (mysqli_query($conn, $sqlk)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sqlk . "<br>" . mysqli_error($conn);}

$sqle = "INSERT INTO $table VALUES ('','$day', '$time','', '', '', '', '$user_name', '')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
}
//insert_light(Living_Room_Lighting);



function insert_window($table){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
// verifier si la fenétre est deja ouverte
$window_is_off="True";
include('userinformations.php');
$user_name=name();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 

for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
if($rs['User_Desactivator']==""){$window_is_off="False";}
}
mysqli_close($conn);
include('Data_Base_connection.php');

if($window_is_off=="True"){
$sqlr = "SELECT * FROM windows WHERE table_reference='$table'";
$resr=mysql_query($sqlr) or die (mysql_error ());
$nr= mysql_num_rows($resr); 
for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$automatique=$rsr['Window_automatique_opening_system'];
}
//modifier la table windows 
$sqlk = "UPDATE windows SET state_window='ON' , opening_time='$time' , closing_time='XX:XX:XX' WHERE  table_reference='$table'";
if (mysqli_query($conn, $sqlk)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
$sqle = "INSERT INTO $table VALUES ('','$time','', '$automatique', '$user_name', '')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
}
//insert_window(Guest_Room_Window);

function insert_door($table){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
// verifier si la porte est deja ouverte
$door_is_off="True";
include('userinformations.php');
$user_name=name();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 

for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
if($rs['User_Desactivator']==""){$door_is_off="False";}
}
mysqli_close($conn);
include('Data_Base_connection.php');

if($door_is_off=="True"){
$sqlr = "SELECT * FROM Doors WHERE table_reference='$table'";
$resr=mysql_query($sqlr) or die (mysql_error ());
$nr= mysql_num_rows($resr); 
for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$Door_security_system=$rsr['Door_security_system'];
}
//modifier la table Doors 
$sqlk = "UPDATE Doors SET state_door='ON' , opening_time='$time' , closing_time='XX:XX:XX' WHERE  table_reference='$table'";
if (mysqli_query($conn, $sqlk)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

$sqle = "INSERT INTO $table VALUES ('','$time','', '$Door_security_system', '$user_name', '')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
}
//insert_door(Living_Room_Door);




function insert_other($table){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
// verifier si l'objet est deja ouverte
$other_is_off="True";
include('userinformations.php');
$user_name=name();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 

for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$Descriptuon_objet=$rs['Descriptuon_objet'];
$Marque_objet=$rs['Marque_objet'];

if($rs['User_Desactivator']==""){$other_is_off="False";}
}
mysqli_close($conn);
include('Data_Base_connection.php');

if($other_is_off=="True"){
$sqlr = "SELECT * FROM Other_objects WHERE table_reference='$table'";
$resr=mysql_query($sqlr) or die (mysql_error ());
$nr= mysql_num_rows($resr); 
for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$Automatique_open=$rsr['Automatique_open'];
}
//modifier la table Other_objects 
$sqlk = "UPDATE Other_objects SET state_objet='ON' , start_time='$time' , stop_time='XX:XX:XX' WHERE  table_reference='$table'";
if (mysqli_query($conn, $sqlk)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
$day=date('m-d-y');


$sqle = "INSERT INTO $table VALUES ('','$Descriptuon_objet','$Marque_objet', '$day','$time','','','','', '$user_name', '')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
}
//insert_other(Aire_Conditionaire);




function update_light($table){
include('Data_Base_connection.php');

include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
echo $time;
include('userinformations.php');
$user_name=name();
$sql_light = "SELECT * FROM $table";
$res_light=mysql_query($sql_light) or die (mysql_error ());
$n_light= mysql_num_rows($res_light); 
for($i=0;$i<$n_light;$i++)
{
$rs_light=mysql_fetch_array($res_light);
if ($rs_light['User_Desactivator']==''){
$timestart=$rs_light['Activation_Time'];
$useractivator=$rs_light['User_Activator'];

}

}
$sqlb = "SELECT * FROM lights WHERE table_reference='$table'";
$resb=mysql_query($sqlb) or die (mysql_error ());
$nb= mysql_num_rows($resb); 
for($i=0;$i<$nb;$i++)
{
$rsb=mysql_fetch_array($resb);
$consumtion_sec=$rsb['consommation_light_seconde'];
}

include('calculeconsommation.php');
$day=date('m-d-y');
$consomtotale=calcule($rs_light['Activation_Day'],$rs_light['Desactivation_Day'],$rs_light['Activation_Time'] , $time ,$consumtion_sec);

$rapport=$table."  has been activated since  ".$timestart."  by  ".$useractivator."  until  ".$time."  and it wos disactiveted by  ".$user_name." " ;
mysqli_close($conn);
include('Data_Base_connection.php');

$sql = "UPDATE $table SET Desactivation_Time='$time',Desactivation_Day='$day' ,Consommation_Light_Totale='$consomtotale' ,Report='$rapport' ,User_Desactivator='$user_name' WHERE User_Desactivator=''";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
	$sqlz = "UPDATE lights SET state_light='OFF' , stop_time='$time' , consommation_light_totale='$consomtotale' WHERE table_reference='$table'";
	mysqli_query($conn, $sqlz);
}

//update_light(Living_Room_Lighting);

function update_door($table){
include('Data_Base_connection.php');

include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
include('userinformations.php');
$user_name=name();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
if ($rs['User_Desactivator']==''){
$timestart=$rs['Opening_time'];
$useractivator=$rs['User_Activator'];

}

}
include('calculeconsommation.php');
$day=date('m-d-y');
 $consomtotale=calcule($rs['Opening_time'] , $time ,2);

$rapport=$table."  has been activated since  ".$timestart."  by  ".$useractivator."  until  ".$time."  and it wos disactiveted by  ".$user_name." " ;
mysqli_close($conn);
include('Data_Base_connection.php');

$sql = "UPDATE $table SET Closing_Time='$time' ,User_Desactivator='$user_name' WHERE User_Desactivator=''";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
	$sqlz = "UPDATE Doors SET state_door='OFF' , Closing_Time='$time'  WHERE table_reference='$table'";
	mysqli_query($conn, $sqlz);
	
}


//update_door(Living_Room_Door);


function update_window($table){
include('Data_Base_connection.php');

include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
include('userinformations.php');
$user_name=name();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
if ($rs['User_Desactivator']==''){
$timestart=$rs['Opening_time'];
$useractivator=$rs['User_Activator'];

}

}
include('calculeconsommation.php');
$day=date('m-d-y');
 $consomtotale=calcule($rs['Opening_time'] , $time ,2);

$rapport=$table."  has been activated since  ".$timestart."  by  ".$useractivator."  until  ".$time."  and it wos disactiveted by  ".$user_name." " ;
mysqli_close($conn);
include('Data_Base_connection.php');

$sql = "UPDATE $table SET Closing_Time='$time' ,User_Desactivator='$user_name' WHERE User_Desactivator=''";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
	$sqlz = "UPDATE windows SET state_window='OFF' , Closing_Time='$time'  WHERE table_reference='$table'";
	mysqli_query($conn, $sqlz);
	
}

//update_window(Living_Room_Window);





function update_other($table){
include('Data_Base_connection.php');

include('Data_Base_connection2.php');
include('get_time_and_date.php');


$day=get_curent_day();
$time=get_curent_time();
include('userinformations.php');
$user_name=name();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
if ($rs['User_Desactivator']==''){
$timestart=$rs['Activation_Time'];
$useractivator=$rs['User_Activator'];

}



}
$sqlb = "SELECT * FROM Other_objects WHERE table_reference='$table'";
$resb=mysql_query($sqlb) or die (mysql_error ());
$nb= mysql_num_rows($resb); 
for($i=0;$i<$nb;$i++)
{
$rsb=mysql_fetch_array($resb);
$consumtion_sec=$rsb['consommation_light_seconde'];
}

include('calculeconsommation.php');
$day=date('m-d-y');
 $consomtotale=calcule($rs['Activation_Day'],$day,$rs['Activation_Time'] , $time ,$consumtion_sec);

$rapport=$table."  has been activated since  ".$timestart."  by  ".$useractivator."  until  ".$time."  and it wos disactiveted by  ".$user_name." " ;
mysqli_close($conn);
include('Data_Base_connection.php');

$sql = "UPDATE $table SET Desactivation_Time='$time',Desactivation_Day='$day',Consommation_Totale='$consomtotale' ,User_Desactivator='$user_name' ,Report='$rapport' WHERE User_Desactivator=''";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
	$sqlz = "UPDATE Other_objects SET state_objet='OFF' , stop_time='$time' ,consommation_light_totale='$consomtotale'  WHERE table_reference='$table'";
	mysqli_query($conn, $sqlz);
	
}

//update_other(Aire_Conditionaire);

mysqli_close($conn);
?>
