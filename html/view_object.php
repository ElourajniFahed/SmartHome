<?php 
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}

include('navbar1.php');

include('Configuration_object.php');

echo"<form name='view_objet' method='post' action=''>";


// recuperation des donneés
$objet="lights";

$tex_obj=$_POST['tex_obj'];
$tx_obj=$_POST['tx_obj'];
echo $tx_obj;
//recuperation paramétres for update function 
$name_updated=$_POST['table_name'];
$table_fille_updated=$_POST['table_fille'];


if($tx_obj=="lights"){
$consommation_updated=$_POST['consommation_light_seconde'];
$description_updated=$_POST['description_light'];


$x=name_table_exist(lights,$name_updated);
if(($name_updated=='') or ($consommation_updated=='') or ($description_updated=='')   ){
$empty= " Empty cases are not allowed  ";
}
else{
echo $name_updated; echo"<br>";
echo $consommation_updated; echo"<br>";
echo $description_updated; echo"<br>";
echo "table mere : ".$tx_obj."<br>";
echo "table fille : ".$table_fille_updated."<br>";

apdate_table_lights($tx_obj,$table_fille_updated,$name_updated,$consommation_updated,$description_updated);

}

}
elseif($tx_obj=="Doors"){
$Door_security_system=$_POST['Door_security_system'];
$consommation_updated=$_POST['Consommation_energ'];
$description_updated=$_POST['description_door'];


$x=name_table_exist(Doors,$name_updated);
if(($x=='True')and($name_updated!="")){echo ' This name is already used ';}
elseif(($name_updated=='') or ($consommation_updated=='') or ($description_updated=='') or ($Door_security_system=='')   ){
$empty= " Empty cases are not allowed  ";
}
else{
/*echo $name_updated; echo"<br>";
echo $consommation_updated; echo"<br>";
echo $Door_security_system;echo"<br>";
echo $description_updated;*/
apdate_table_Door($tx_obj,$table_fille_updated,$name_updated,$consommation_updated,$description_updated,$Door_security_system);

}

}
elseif($tx_obj=="windows"){
$Window_automatique_opening_system=$_POST['Window_automatique_opening_system'];
$consommation_updated=$_POST['Consommation_energ'];
$description_updated=$_POST['description_window'];

$x=name_table_exist(windows,$name_updated);
if(($x=='True')and($name_updated!="")){echo ' This name is already used ';}
elseif(($name_updated=='') or ($consommation_updated=='') or ($description_updated=='') or ($Window_automatique_opening_system=='')   ){
$empty= " Empty cases are not allowed  ";
}
else{
/*echo $name_updated; echo"<br>";
echo $consommation_updated; echo"<br>";
echo $description_updated; echo"<br>";
echo $Window_automatique_opening_system;*/
apdate_table_window($tx_obj,$table_fille_updated,$name_updated,$consommation_updated,$description_updated,$Window_automatique_opening_system);

}



}
elseif($tx_obj="Other_objects"){
$Automatique_open=$_POST['Automatique_open'];
$consommation_updated=$_POST['consommation_light_seconde'];
$description_updated=$_POST['description_objet'];
$marque=$_POST['marque'];


$x=name_table_exist(Other_objects,$name_updated);

if(($x=='True')and($name_updated!="")){echo ' This name is already used ';}
elseif(($name_updated=='') or ($consommation_updated=='') or ($description_updated=='') or ($Automatique_open=='') or ($marque=='')  ){
$empty= " Empty cases are not allowed  ";
}
else{
echo $name_updated; echo"<br>";
echo $consommation_updated; echo"<br>";
echo $description_updated; echo"<br>";
echo $Automatique_open;echo"<br>";
echo $marque;
apdate_table_Other($tx_obj,$table_fille_updated,$name_updated,$consommation_updated,$description_updated,$marque,$Automatique_open);
}
}


//

$ob=$_POST['options'];
$action=$_POST['confi'];
// pour les fonction update_object et delet_object 
mysqli_close($conn);

//
//Test
$ligne_updated='';
if($ob==""){$objet=$tex_obj;}
if($ob!=""){$objet=$ob;
}
if($objet=='lights'){$ligne_updated=$_POST['llights'];$table_mére='lights';}
elseif($objet=='windows'){$ligne_updated=$_POST['wwindows'];$table_mére='windows';}
elseif($objet=='Doors'){$ligne_updated=$_POST['Ddoors'];$table_mére='Doors';}
else{$ligne_updated=$_POST['Oother'];$table_mére='Other_objects';}
if($action == 'Add'){header('Location: add_object.php'); }
$table_fille=$ligne_updated;
//echo $table_fille;echo $table_mére;echo $action;

if($ligne_updated!=''){if($action != ''){
if($action=='Delete'){delete_objet($table_fille,$table_mére);}


}
elseif($action == ''){echo 'You must choose th action in order to execute the operation';}

}
if(($action != '') and($ligne_updated=='')){echo 'You must choose an object in order to execute the operation';}

//
//afiichage 
if(($action == 'Update') and($ligne_updated !='')){

Update_objet($table_fille,$table_mére);
echo"<input type='text' name='table_fille' value='$table_fille' hidden  >";

echo"<input type='text' name='tx_obj' value='$tex_obj' hidden  >";
echo"<button class='btn primary' value='Submit'  >Submit</button><br><br> ";
if($objet=="lights"){

}
elseif($objet=="Doors"){

}
elseif($objet=="windows"){

}
else{

}



}
else{
//echo $ligne_updated;

echo"<input type='text' name='tex_obj' value='$objet' hidden >";

echo"<br><br><select id='confi' name='confi' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:5% ;' >";
echo"<option value=''>Actions:</option>";
echo"<option value='Update'>Update</option>";
echo"<option value='Delete'>Delete</option>";
echo"<option value='Add'>Add</option>";

echo"</select>";
mysqli_close($conn);
include('historique_light.php');
mysqli_close($conn);
include('Data_Base_connection2.php');
$sql1 = "SELECT * FROM objets";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
echo"<select id='options' name='options' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:1% ;' >";
echo"<option value=''>Objects</option>";
for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$nom_obj=$r['nom_objet'];
      			echo"<option value='$nom_obj' onclick='submit()'>";echo $nom_obj; echo"</option>";
      			}
      			
echo"</select><button class='btn primary' value='Submit' style='margin-left: 5% ;' >Submit</button><br><br> ";

if($objet=="lights"){
show_lights_table();
}
elseif($objet=="Doors"){
show_door_table();
}
elseif($objet=="windows"){
show_window_table();
}
else{
show_other_object_table();
}
}

echo"</form>";
//
?>
<script>function submit(){document.getElementById("f1").submit();}
</script>
