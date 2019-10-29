<?php

function determiner_objet($text_recorded){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
$objet='';
$exist="False";
$meaning=" ";

$array_record= explode(' ',$text_recorded);

foreach($array_record as $num => $val){
$vals=$val;
$leng=strlen($vals);

//echo $leng;
//echo $vals[$leng-1].' <br> ';





if($vals[$leng-1]=='s'){$vals=substr($vals,0,$leng-1);}
//echo"<input type='text' value= $vals> ";


////////////////////////////////////////////////// Determiner si ily'a une action (on,off,open...)
$sql="SELECT * FROM dictionnaire";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$table=$rs['table_ref'];
if($table=='verbs'){$sql="SELECT * FROM $table WHERE word='$val' or simple_present='$val' or simple_past='$val' or future='$val'";}
else{$sql="SELECT * FROM $table WHERE word='$val'";}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {$exist="True"; break;}
else{$exist="False";}
$sql="SELECT * FROM $table WHERE word='$vals'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {$exist="True"; echo $exist.' '.$vals;break;}
else{$exist="False";}

}
if($exist=="False"){$objet=$objet.$val." ";}
}



$tab_ref=split(" ",$objet);
array_pop($tab_ref);
$tab_ref=implode("_",$tab_ref);
$array_return=array();
$array_return[0]=$text_recorded;
$array_return[1]=$objet;
$array_return[2]=$tab_ref;
$array_return[3]=$meaning;

mysqli_close($conn);
return $array_return;
}
//print_r(determiner_objet('informations about banana'));

function determiner_meaning($commande){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
$tab=determiner_objet($commande);
$objet=$tab[1];
$tab_ref=$tab[2];
$meaning=$tab[3];
$array= explode(' ',$commande);
$meaning='';
$exist="False";

foreach($array as $num => $val){
$vals=$val.'s';
$sql="SELECT * FROM dictionnaire";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$table=$rs['table_ref'];
if($table=='verbs'){$sql="SELECT * FROM $table WHERE word='$val' or simple_present='$val' or simple_past='$val' or future='$val'";}
if($table=='pronoun'){$sql="SELECT * FROM $table WHERE word='$val'";}
if($table=='article'){$sql="SELECT * FROM $table WHERE word='$val'";}
if($table=='propositions'){$sql="SELECT * FROM $table WHERE word='$val'";}
if($table=='subjects'){$sql="SELECT * FROM $table WHERE word='$val'";}
if($table=='relative_adverbs'){$sql="SELECT * FROM $table WHERE word='$val'";}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {$exist="True"; break;}
else{$exist="False";}


}
if($exist=="False"){$meaning=$meaning.$val." ";}
}
similar_text($meaning,$objet,$percent);


if($percent==100){$meaning='definition';}
$pos=strpos($meaning,$objet);
echo $pos;
if ($pos>=0){$meaning=str_replace($objet,'',$meaning,$val);}
if($objet==''){$objet=$meaning; $meaning='definition';
$tab_ref=split(" ",$objet);
array_pop($tab_ref);
$tab_ref=implode("_",$tab_ref);
$tab[2]=$objet;
$tab[1]=$tab_ref;
}
$tab[3]=$meaning;

return $tab ;
}
//print_r( determiner_meaning('what is the noun '));
//echo"<br>";
//print_r( determiner_meaning('who is ronaldo please'));

//insert_new_information()
//function creat_object_info($reponse,$meaning,$objet){}



function Verif_existance_objet_and_meaning($commande){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
$tab=determiner_meaning($commande);
$objet_exist='False';
$meaning_exist='False';
$objet=$tab[1];
$tab_ref=$tab[2];
$meaning=$tab[3];
$sql="SELECT * FROM base_de_connaissance WHERE objet='$objet'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$obj=$rs['objet'];
$tabl_ref=$rs['table_ref'];
$mean=$rs['meaning'];
if ($obj!='') {$objet_exist="True"; break;}

}

if($objet_exist=="True"){ 
$sql="SELECT * FROM $tabl_ref WHERE meaning='$meaning'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$reponce=$rs['reponce'];
if ($reponce!=''){$meaning_exist="True"; break;}

}
}

$tab[4]=$objet_exist;
$tab[5]=$meaning_exist;
$tab[6]=$reponce;

return $tab;




}

//print_r(Verif_existance_objet_and_meaning('what is the weather in tunisia'));



function insert_information_to_object($commande,$objet,$table_ref,$meaning,$reponce){

include('Data_Base_connection.php');
include('Data_Base_connection2.php');
echo $table_ref."<br>";
echo $meaning."<br>";
echo $reponce."<br>";

$sql="INSERT INTO $table_ref VALUES ('','$meaning','$reponce')";
$res=mysql_query($sql) or die (mysql_error ());

$sql="INSERT INTO base_de_connaissance VALUES ('','$commande','$meaning','$objet','$table_ref')";
$res=mysql_query($sql) or die (mysql_error ());
mysqli_close($conn);
}



function Creat_table_object($objet,$tab_ref){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
$sql = "CREATE TABLE $tab_ref (
code_info BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
meaning VARCHAR(200) ,
reponce TEXT

)";

if (mysqli_query($conn, $sql)) {
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql="INSERT INTO liste_objet_information VALUES ('','$objet','$tab_ref')";
$res=mysql_query($sql) or die (mysql_error ());


mysqli_close($conn);

}
//insert_information_to_object('what is the age of cristiano ronaldo','cristiano ronaldo','cristiano_ronaldo','age of cristiano ronaldo','31');
//Creat_table_object('cristiano ronaldo','cristiano_ronaldo');


function main_principale_wolphram($commande){
$tab=Verif_existance_objet_and_meaning($commande);
$objet=$tab[1];
$tab_ref=$tab[2];
$meaning=$tab[3];
$objet_exist=$tab[4];
$meaning_exist=$tab[5];
$reponce=$tab[6];
if(($objet_exist=='True') and ($meaning_exist=='False')){
include('wolphramealpha.php');
$reponce=wolframalpha($commande);

//insert_information_to_object($commande,$objet,$tab_ref,$meaning,$reponce);

}
elseif(($objet_exist=='False') and ($meaning_exist=='False')){
include('wolphramealpha.php');
$reponce=wolframalpha($commande);
//Creat_table_object($objet,$tab_ref);

//insert_information_to_object($commande,$objet,$tab_ref,$meaning,$reponce);

}
$tab[6]=$reponce;
print_r($tab);
return $reponce;

}



function main_principale_wiki($commande){
$tab=Verif_existance_objet_and_meaning($commande);
$objet=$tab[1];
$tab_ref=$tab[2];
echo $objet."<br>";
echo $tab_ref."<br>";
$meaning=$tab[3];
$objet_exist=$tab[4];
$meaning_exist=$tab[5];
$reponce=$tab[6];
if(($objet_exist=='True') and ($meaning_exist=='False')){
include('wikipedia.php');
$reponce=wiki($commande);

//insert_information_to_object($commande,$objet,$tab_ref,$meaning,$reponce);

}
elseif(($objet_exist=='False') and ($meaning_exist=='False')){
include('wikipedia.php');
$reponce=wiki($commande);
//Creat_table_object($objet,$tab_ref);

//insert_information_to_object($commande,$objet,$tab_ref,$meaning,$reponce);

}
$tab[6]=$reponce;
return $reponce;

}

print_r(main_principale_wolphram('how are you doing'));
//print(main_principale_wiki('tunisia'));

function mot_exist($chaine,$mot){
$test='False';
$array_chiane= explode(' ',$chaine);
$length=count($array_chiane);
foreach($array_chiane as $num => $val){
$wor=$val;
similar_text($wor,$mot,$percenttt);
echo $percent."<br>";

	if($wor==$mot){$test='True'; break;}

}

return $test;



}
//echo mot_exist('how is the weather tonight','weather');
?>
