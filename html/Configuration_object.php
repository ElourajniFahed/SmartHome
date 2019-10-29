<?php
mysqli_close($conn);

function delete_objet($table_fille,$table_mére){
include('Data_Base_connection.php');
// sql to create table
$sql = " DROP TABLE $table_fille ";

if (mysqli_query($conn, $sql)) {
    echo "Table  Droped successfully";
} else {
    echo "Error drop table: " . mysqli_error($conn);
}

mysqli_close($conn);

include('Data_Base_connection.php');
// sql to supp table
$sql = "DELETE FROM $table_mére WHERE table_reference='$table_fille'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$sql = "UPDATE gpio SET function_gpio='' , state_gpio='' , table_gpio='' WHERE  table_gpio='$table_fille'";

if (mysqli_query($conn, $sql)) {
    echo "Record UPDATED successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
//delete_objet(Livinghgbooo,Other_objects);

function Update_objet($table_fille,$table_mére){

mysqli_close($conn);

include('Data_Base_connection2.php');

$sqlr = "SELECT * FROM $table_mére WHERE table_reference='$table_fille' ";
$resr=mysql_query($sqlr) or die (mysql_error ());
$nr= mysql_num_rows($resr); 
echo"<center>";
echo"<p>Name:</p><br><input name='table_name' type='text' value='$table_fille' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";
if($table_mére=='Doors'){

echo"<br><p>Security System</p><br><select id='Door_security_system' name='Door_security_system' style=' width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;' >";

for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$security=$rsr['Door_security_system'];
$Consommation_energ=$rsr['Consommation_energ'];
$description_door=$rsr['description_door'];
}
if($security=='False'){
echo"<option value='False'>False</option>";
echo"<option value='True'>True</option>";
}
else{
echo"<option value='True'>True</option>";
echo"<option value='False'>False</option>";
}
echo"</select>";
echo"<p>Energy Consumption :</p><br><input type='number' name='Consommation_energ' value='$Consommation_energ' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";
echo"<p>Description Door :</p><br><input type='text' name='description_door' value='$description_door' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";




}

if($table_mére=='windows'){

echo"<br><p>Automation Opening System</p><br><select id='Window_automatique_opening_system' name='Window_automatique_opening_system' style=' width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;' >";
for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$security=$rsr['Window_automatique_opening_system'];
$Consommation_energ=$rsr['Consommation_energ'];
$description_window=$rsr['description_window'];
}
if($security=='False'){
echo"<option value='False'>False</option>";
echo"<option value='True'>True</option>";
}
else{
echo"<option value='True'>True</option>";
echo"<option value='False'>False</option>";
}
echo"</select>";
echo"<p>Energy Consumption :</p><br><input type='number' name='Consommation_energ' value='$Consommation_energ' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";
echo"<p>Window Description :</p><br><input type='text' name='description_window' value='$description_window' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";




}


if($table_mére=='lights'){


for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$consommation_light_seconde=$rsr['consommation_light_seconde'];
$description_light=$rsr['description_light'];

}
echo"<p>Energy Consumption :</p><br><input type='number' name='consommation_light_seconde' value='$consommation_light_seconde' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";

echo"<p>Light Description :</p><br><input type='text' name='description_light' value='$description_light' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";



}

if($table_mére=='Other_objects'){
echo"<br><p>Automation Opening System</p><br><select id='Automatique_open' name='Automatique_open' style=' width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;' >";

for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$Automatique_open=$rsr['Automatique_open'];
$consommation_light_seconde=$rsr['consommation_light_seconde'];
$description_objet=$rsr['description_objet'];
$marque=$rsr['marque_objet'];

}
if($Automatique_open=='False'){
echo"<option value='False'>False</option>";
echo"<option value='True'>True</option>";
}
else{
echo"<option value='True'>True</option>";
echo"<option value='False'>False</option>";
}
echo"</select>";
echo"<p>Energy Consumption :</p><br><input type='number' name='consommation_light_seconde' value='$consommation_light_seconde' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";

echo"<p>Object Description :</p><br><input type='text' name='description_objet' value='$description_objet' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";

echo"<p>Object Marque :</p><br><input type='text' name='marque' value='$marque' style='width: 20%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;'><br>";


}


mysqli_close($conn);


}
//Update_objet(Aire_Conditionaire,Other_objects);


function apdate_table_window($table_mére,$table_fille,$name,$consommation,$description,$Window_automatique_opening){
include('Data_Base_connection.php');
$name=split(" ",$name);
$name=implode("_",$name);
 
$sql = "UPDATE $table_mére SET Window_automatique_opening_system ='$Window_automatique_opening' , Consommation_energ='$consommation' , description_window='$description' , table_reference='$name' WHERE table_reference='$table_fille'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$sql1="RENAME TABLE $table_fille TO $name";

if (mysqli_query($conn, $sql1)) {
    echo "Table renamed successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



mysqli_close($conn);



}
//apdate_table_window(windows,winwin,'winwin hhh bbb','20','windescription','false');


function apdate_table_Door($table_mére,$table_fille,$name,$consommation,$description,$Door_security_system){
include('Data_Base_connection.php');
$name=split(" ",$name);
$name=implode("_",$name);
$sql = "UPDATE $table_mére SET Door_security_system ='$Door_security_system' , Consommation_energ='$consommation' , description_door='$description' , table_reference='$name' WHERE table_reference='$table_fille'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$sql1="RENAME TABLE $table_fille TO $name";

if (mysqli_query($conn, $sql1)) {
    echo "Table renamed successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



mysqli_close($conn);
}


function apdate_table_lights($table_mére,$table_fille,$name,$consommation,$description){
include('Data_Base_connection.php');
$name=split(" ",$name);
$name=implode("_",$name);
$sql = "UPDATE $table_mére SET  consommation_light_seconde='$consommation' , description_light='$description' , table_reference='$name' WHERE table_reference='$table_fille'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$sql1="RENAME TABLE $table_fille TO $name";

if (mysqli_query($conn, $sql1)) {
    echo "Table renamed successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



mysqli_close($conn);
}

//apdate_table_lights(lights,Children_lignt,'Children_Room_Lighting','60','Children_lll');

function apdate_table_Other($table_mére,$table_fille,$name,$consommation,$description,$marque,$Automatique_open){
include('Data_Base_connection.php');
$name=split(" ",$name);
$name=implode("_",$name);

$sql = "UPDATE $table_mére SET Automatique_open='$Automatique_open' , consommation_light_seconde='$consommation' , description_objet='$description' ,marque_objet='$marque', table_reference='$name' WHERE table_reference='$table_fille'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$sql1="RENAME TABLE $table_fille TO $name";

if (mysqli_query($conn, $sql1)) {
    echo "Table renamed successfully";
} else {
    echo "Error RENAME REcord " . mysqli_error($conn);
}



mysqli_close($conn);
}

//apdate_table_Other(Other_objects,living_room_object,'living rrrr object','90','obb_lll','nokia','True');

function name_table_exist($table_mére,$table_fille){
$exist='False';
include('Data_Base_connection2.php');

$sqlr = "SELECT * FROM $table_mére  ";
$resr=mysql_query($sqlr) or die (mysql_error ());
$nr= mysql_num_rows($resr); 
for($i=0;$i<$nr;$i++)
{
$rsr=mysql_fetch_array($resr);
$table_reference=$rsr['table_reference'];
if($table_reference==$table_fille){
$exist='True';
Break;}
}

return $exist;




mysqli_close($conn);

}
/*$x=name_table_exist(lights,Living_f_Lighting);
echo $x ;*/
?>

