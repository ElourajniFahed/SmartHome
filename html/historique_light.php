<?php
function show_other_objet($table){
include('Data_Base_connection2.php');
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
include('calculeconsommation.php');
echo"<div id='contact' class='container'>";
echo"<div class='table-responsive'>";
echo"<table class='table'>";
  echo"<tr>";
    echo"<th>Description Light</th>";
    echo"<th>State Light</th>";
    echo"<th>Start Time</th>";
    echo"<th>Stope Time</th>";
    echo"<th style='width:15%';>Consumption Per Second</th>";
    echo"<th>Total Consumption</th>";
    echo"<th> </th>";
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);

if($rs['state_objet']=='ON'){
$day=date('m-d-y'); echo"hhhh";
$T= date('H:i:s');
$consomtotale=calcule($rs['Activation_Day'],$day ,$rs['start_time'], $T , $rs['consommation_light_seconde'] );

$description= $rs['description_light'];
$consomtotale=$rs['consommation_light_totale'];
if($consomtotale>999999999999999999999999999999999999999){
$to="fahd.ourajinii@gmail.com";
$from=" ";
$subject=$rs['description_light'];
$msg=(String)"Sir this subject had consumed a lot of energy  specifically '$consomtotale'  W . I recommend  to turn it off ";

exec("sudo python /var/www/my_pythons/mail.py '$subject' '$to' '$msg' '$from'");

}}




if($rs['state_light']=='OFF'){
$consomtotale=calcule($rs['Activation_Day'],$rs['Desactivation_Day'],$rs['start_time'] , $rs['stop_time'] , $rs['consommation_light_seconde'] );

$description= $rs['description_light'];

if($consomtotale>8030809999999999999999999){
$to="fahd.ourajinii@gmail.com";
$from=" ";
$subject=$rs['description_light'];
$msg=(String)"Sir this subject had consumed a lot of energy  specifically '$consomtotale'  W . 	Be more economic please ";

exec("sudo python /var/www/my_pythons/mail.py '$subject' '$to' '$msg' '$from'");
}

$sqla = "UPDATE lights SET consommation_light_totale='$consomtotale' WHERE description_light='$description'";
mysqli_query($conn, $sqla);

}
echo "hhhhhhhhhh <br>"; echo $consomtotale;
echo"<tr>";
echo"<td>"; echo $rs['description_light'];  echo"</td>";
echo"<td>"; echo $rs['state_light']; echo"</td>";
echo"<td>"; echo $rs['start_time']; echo"</td>";
echo"<td>"; echo $rs['stop_time']; echo"</td>";
echo"<td>"; echo $rs['consommation_light_seconde']; echo"          W"; echo"</td>";
echo"<td>"; echo $rs['consommation_light_totale']; echo"          W";  echo"</td>";
if($rs["state_light"]=="ON"){
	echo"<center>";
      	echo"<td><img src='http://www.pngmart.com/files/1/Light-Bulb-PNG-Image.png' id='light_on_image' style='width: 30%;height: 5%; size: 20%;'></td>";
}
if($rs["state_light"]=="OFF"){
	echo"<center>";
      	echo"<td><img src='https://consulmex.sre.gob.mx/houston/images/Energa.png' id='light_off_image' style='width: 30%;height: 30%; size: 20%;'></td>";
}
    
  echo"</tr>";
}

 echo"</table>";
echo"<div>";
echo"<div>";


mysqli_close($conn);

}



function showobjet_other($table){
include('Data_Base_connection2.php');
include('get_time_and_date.php');
$time=get_curent_time();
$day=get_curent_day();


$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
include('calculeconsommation.php');
echo"<center>"; echo "<h3>"; echo $table; echo"</h3></center> <br>";
echo"<table>";
  echo"<tr>";
    echo"<th>Descriptuon</th>";
    echo"<th>Marque</th>";
    echo"<th>Activation Day</th>";
    echo"<th>Activation Time</th>";
    echo"<th>Desactivation Day</th>";
echo"<th>Desactivation Time</th>";
    echo"<th>Totale Consumption</th>";
    echo"<th>Report</th>";


for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
// trouver la consommation par seconde from la table other objects 
$sqlb = "SELECT * FROM Other_objects WHERE table_reference='$table'";
$resb=mysql_query($sqlb) or die (mysql_error ());
$nb= mysql_num_rows($resb); 
for($j=0;$j<$nb;$j++)
{
$rsb=mysql_fetch_array($resb);
$consommation_seconde=$rsb['consommation_light_seconde'];}

if($rs['User_Desactivator']==""){
$rs['Consommation_Totale']=calcule($rs['Activation_Day'],$rs['Desactivation_Day'],$rs['Activation_Time'] , $time ,$consommation_seconde);
$consomtotale=$rs['Consommation_Totale'];
$code=$rs['Code_Activation'];

$sqlb = "UPDATE $table SET Consommation_Totale='$consomtotale' WHERE Code_Activation=$code";
mysqli_query($conn, $sqlb);

}

echo"<tr>";
echo"<td>"; echo $rsb['description_objet']; echo"</td>";
echo"<td>"; echo $rsb['marque_objet']; echo"</td>";
echo"<td>"; echo $rs['Activation_Day'];  echo"</td>";
echo"<td>"; echo $rs['Activation_Time']; echo"</td>";
echo"<td>"; echo $rs['Desactivation_Day']; echo"</td>";
echo"<td>"; echo $rs['Desactivation_Time'];  echo"</td>";
echo"<td>"; echo $rs['Consommation_Totale']; echo"</td>";
echo"<td>"; echo $rs['Report']; echo"</td>";
echo"</tr>";
}

echo"</table>";
mysqli_close($conn);
}
//showobjet_other(Aire_Conditionaire);


function showobjet_door($table){
include('Data_Base_connection2.php');
include('get_time_and_date.php');
$time=get_curent_time();
$day=get_curent_day();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
include('calculeconsommation.php');
echo"<center>"; echo "<h3>"; echo $table; echo"</h3></center> <br>";
echo"<table>";
  echo"<tr>";
    echo"<th>Opening Time</th>";
    echo"<th>Closing Time</th>";
    echo"<th>Door security_system</th>";
    echo"<th>User Activator</th>";
    echo"<th>User Desactivator</th>";


for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);

echo"<tr>";
echo"<td>"; echo $rs['Opening_time']; echo"</td>";
echo"<td>"; echo $rs['Closing_Time']; echo"</td>";
echo"<td>"; echo $rs['Door_security_system'];  echo"</td>";
echo"<td>"; echo $rs['User_Activator']; echo"</td>";
echo"<td>"; echo $rs['User_Desactivator']; echo"</td>";
echo"</tr>";
}

echo"</table>";
mysqli_close($conn);
}
//showobjet_door(Living_Room_Door);


function showobjet_window($table){
include('Data_Base_connection2.php');
include('get_time_and_date.php');
$time=get_curent_time();
$day=get_curent_day();
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
include('calculeconsommation.php');
echo"<center>"; echo "<h3>"; echo $table; echo"</h3></center> <br>";
echo"<table>";
  echo"<tr>";
    echo"<th>Opening Time</th>";
    echo"<th>Closing Time</th>";
    echo"<th>Window Automatique Opening System</th>";
    echo"<th>User Activator</th>";
    echo"<th>User Desactivator</th>";


for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);

echo"<tr>";
echo"<td>"; echo $rs['Opening_time']; echo"</td>";
echo"<td>"; echo $rs['Closing_Time']; echo"</td>";
echo"<td>"; echo $rs['Window_automatique_opening_system'];  echo"</td>";
echo"<td>"; echo $rs['User_Activator']; echo"</td>";
echo"<td>"; echo $rs['User_Desactivator']; echo"</td>";
echo"</tr>";
}

echo"</table>";
mysqli_close($conn);
}
//showobjet_window(Living_wind);


function showobjet_lights($table){
include('Data_Base_connection2.php');
include('get_time_and_date.php');
$time=get_curent_time();
$day=get_curent_day();
$sql_historique_light = "SELECT * FROM $table";
$res_historique_light=mysql_query($sql_historique_light) or die (mysql_error ());
$n_historique_light= mysql_num_rows($res_historique_light); 
include('calculeconsommation.php');
echo"<center>"; echo "<h3>"; echo $table; echo"</h3></center> <br>";
echo"<table>";
  echo"<tr>";
    echo"<th>Activation_Day</th>";
    echo"<th>Activation Time</th>";
    echo"<th>Desactivation_Day</th>";
    echo"<th>Desactivation Time</th>";
    echo"<th style='width:15%';>Consumption Light Totale</th>";
    
    echo"<th> Report</th>";

for($i=0;$i<$n_historique_light;$i++)
{
$rs_historique_light=mysql_fetch_array($res_historique_light);
// trouver la consommation par seconde from la table lights 
$sql_historique_light1 = "SELECT * FROM lights WHERE table_reference='$table'";
$res_historique_light1=mysql_query($sql_historique_light1) or die (mysql_error ());
$n_historique_light1= mysql_num_rows($res_historique_light1); 
for($j=0;$j<$n_historique_light1;$j++)
{
$rs_historique_light1=mysql_fetch_array($res_historique_light1);
$consommation_seconde=$rs_historique_light1['consommation_light_seconde'];}
$consomtotale=$rs_historique_light['Consommation_Light_Totale'];
if($rs_historique_light['User_Desactivator']==""){
$consomtotale=calcule($rs_historique_light['Activation_Day'],$rs_historique_light['Desactivation_Day'],$rs_historique_light['Activation_Time'] , $time ,$consommation_seconde);
//echo $rs_historique_light['Consommation_Light_Totale'];
$code=$rs_historique_light['Code_Activation'];

//$sqlb = "UPDATE $table SET Consommation_Light_Totale='$consomtotale' WHERE Code_Activation=$code";
//mysqli_query($conn, $sqlb);

}



echo"<tr>";
echo"<td>"; echo $rs_historique_light['Activation_Day']; echo"</td>";
echo"<td>"; echo $rs_historique_light['Activation_Time']; echo"</td>";
echo"<td>"; echo $rs_historique_light['Desactivation_Day'];  echo"</td>";
echo"<td>"; echo $rs_historique_light['Desactivation_Time']; echo"</td>";
echo"<td>"; echo $consomtotale; echo"</td>";
echo"<td>"; echo $rs_historique_light['Report']; echo"</td>";
echo"</tr>";
}

 echo"</table>";
mysqli_close($conn);
}


function show_lights_table(){
include('Data_Base_connection2.php');
$sql = "SELECT * FROM lights";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
echo"<center>"; echo "<h3>"; echo Lights; echo"</h3></center> <br>";
echo"<table>";

  echo"<tr>";
echo"<th> Configuration</th>";
    echo"<th>Light State</th>";
    echo"<th>Light Description</th>";
    echo"<th>Activation Time</th>";
    echo"<th>Desactivation Time</th>";
    echo"<th>Consumption Per Seconde</th>";
    echo"<th style='width:15%';>Total Consumption</th>";
    echo"<th>Table Reference </th></tr>";

for($i=0;$i<$n;$i++)
{
$r=mysql_fetch_array($res);
 echo"<tr>";
$name='llights' ;
$value=$r['table_reference'];
    echo"<td>";echo"<input type='radio' name='$name'  value='$value' >";echo"</td>";

    echo"<td>"; echo $r['state_light']; echo "</td>";
    echo"<td>"; echo $r['description_light']; echo"</td>";
    echo"<td>"; echo $r['start_time']; echo "</td>";
    echo"<td>"; echo $r['stop_time']; echo "</td>";
    echo"<td>"; echo $r['consommation_light_seconde']; echo "</td>";
    echo"<td>"; echo $r['consommation_light_totale']; echo "</td>";
    echo"<td>"; echo $r['table_reference']; echo"</td> </tr>";}
echo"</table>";
mysqli_close($conn);


}
//show_lights_table();




function show_window_table(){
include('Data_Base_connection2.php');
$sql = "SELECT * FROM windows";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
echo"<center>"; echo "<h3>"; echo Windows; echo"</h3></center> <br>";
echo"<table class='tabletable-responsive'>";

  echo"<tr>";
echo"<th> Configuration </th>";
    echo"<th>Window State</th>";
    echo"<th>Window Description</th>";
    echo"<th>Opening Time</th>";
    echo"<th>Closing Time</th>";
    echo"<th>Automaic System</th>";
    echo"<th>GPIO Open</th>";
    echo"<th>GPIO Close </th>";
    echo"<th>Consumption Energie</th>";
    echo"<th>Table Reference</th></tr>";

for($i=0;$i<$n;$i++)
{
$r=mysql_fetch_array($res);
 echo"<tr>";
$name='wwindows' ;
$value=$r['table_reference'];
    echo"<td>";echo"<input type='radio' name='$name'  value='$value' >";echo"</td>";
    echo"<td>"; echo $r['state_window']; echo "</td>";
    echo"<td>"; echo $r['description_window']; echo"</td>";
    echo"<td>"; echo $r['opening_time']; echo "</td>";
    echo"<td>"; echo $r['closing_time']; echo "</td>";
    echo"<td>"; echo $r['Window_automatique_opening_system']; echo "</td>";
    echo"<td >"; echo $r['gpio1']; echo "</td>";
    echo"<td>"; echo $r['gpio2']; echo "</td>";   
    echo"<td>"; echo $r['Consommation_energ']; echo "</td>";
    echo"<td>"; echo $r['table_reference']; echo"</td> </tr>";}
echo"</table>";
mysqli_close($conn);
}
//show_window_table();




function show_door_table(){
include('Data_Base_connection2.php');
$sql = "SELECT * FROM Doors";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
echo"<center>"; echo "<h3>"; echo Doors; echo"</h3></center> <br>";
echo"<table class='tabletable-responsive'>";

  echo"<tr>";
    echo"<th> Configuration</th>";
    echo"<th>Door State</th>";
    echo"<th>Door Description</th>";
    echo"<th>Opening Time</th>";
    echo"<th>Closing Time</th>";
    echo"<th>Security System</th>";
    echo"<th>Consumption Energie</th>";
    echo"<th>Table Reference</th></tr>";

for($i=0;$i<$n;$i++)
{
$r=mysql_fetch_array($res);
 echo"<tr>";
$name='Ddoors' ;
$value=$r['table_reference'];
    echo"<td>";echo"<input type='radio' name='$name'  value='$value' >";echo"</td>";

    echo"<td>"; echo $r['state_door']; echo "</td>";
    echo"<td>"; echo $r['description_door']; echo"</td>";
    echo"<td>"; echo $r['opening_time']; echo "</td>";
    echo"<td>"; echo $r['closing_time']; echo "</td>";
    echo"<td>"; echo $r['Door_security_system']; echo "</td>";
    echo"<td>"; echo $r['Consommation_energ']; echo "</td>";
    echo"<td>"; echo $r['table_reference']; echo"</td> </tr>";}
echo"</table>";
mysqli_close($conn);
}

//show_door_table();

function show_other_object_table(){
include('Data_Base_connection2.php');
$sql = "SELECT * FROM Other_objects";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
echo"<center>"; echo "<h3>"; echo Other_Object; echo"</h3></center> <br>";
echo"<table class='tabletable-responsive'>";

  echo"<tr>";
    echo"<th>Configuration </th>";
    echo"<th>State</th>";
    echo"<th>Power Supply Description</th>";
    echo"<th>Object marque</th>";
    echo"<th>Start Time</th>";
    echo"<th>Closing Time</th>";
    echo"<th>Consumption Seconde</th>";
    echo"<th>Total Consumption </th>";
    echo"<th>Table Reference</th></tr>";

for($i=0;$i<$n;$i++)
{
$r=mysql_fetch_array($res);
 echo"<tr>";
$name='Oother' ;
$value=$r['table_reference'];
    echo"<td>";echo"<input type='radio' name='$name'  value='$value' >";echo"</td>";

    echo"<td>"; echo $r['state_objet']; echo "</td>";
    echo"<td>"; echo $r['description_objet']; echo"</td>";
    echo"<td>"; echo $r['marque_objet']; echo"</td>";
    echo"<td>"; echo $r['start_time']; echo "</td>";
    echo"<td>"; echo $r['stop_time']; echo "</td>";
    echo"<td>"; echo $r['consommation_light_seconde']; echo "</td>";
    echo"<td>"; echo $r['consommation_light_totale']; echo "</td>";
    echo"<td>"; echo $r['table_reference']; echo"</td> </tr>";}
echo"</table>";
mysqli_close($conn);
}
//show_other_object_table();
?>
