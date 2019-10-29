<?php
include('information_manipulation.php');



$act=$_POST['actionnn'];
$loc=$_POST['localll'];
$descloc=$_POST['descriptionnn'];
$pourcentt=$_POST['maxee'];
$gpio111=$_POST['gpio111'];
$gpio222=$_POST['gpio222'];
$tableee=$_POST['tableee'];
echo $act."<br>";
echo $loc."<br>";
echo $descloc."<br>";
echo $gpio111."<br>";
echo $gpio222."<br>";
echo $tableee."<br>";
echo $pourcentt."<br>";
echo"<form name='f1' id='f1' method='POST' action=''>";

function action_exist($text_recorded){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
$action='';
$array_record= explode(' ',$text_recorded);
foreach($array_record as $num => $val){


////////////////////////////////////////////////// Determiner si ily'a une action (on,off,open...)
$sql="SELECT * FROM Actions WHERE action='$val'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {$action=$val;}
}mysqli_close($conn);

/////////////////////////////////////////////
return $action;
}
//echo action_exist('turn  bedd rooom ');


function local_exist($table,$text_recorded){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
// determiner le nom de la colonne  description delon la table
if($table=='lights'){$descrip='description_light';
}
elseif($table=='Doors'){$descrip='description_door';}
elseif($table=='windows'){$descrip='description_window';}
else{$descrip='description_objet';}

// dterminer si ilya une description dans la chaine desirée
$sql = "SELECT * FROM $table";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$description=strtolower($rs[$descrip]);
echo "<p style='color:red;'>le objet numero ".$i." a comparer est : ".$description."</p><br>  " ; 
// si on trouve une description prestente   dans la chaine 100% comme elle a ecrit dans la base 
if(substr_count($text_recorded,$description)==1){
if($table=='windows'){
$gpio1=$rs['gpio1'];
$gpio2=$rs['gpio2'];
}
if($table=='lights'){
$gpio2=$rs['gpio_out'];

}
$pourcentage=100;
$local=$rs['table_reference'];
$local_description=$rs[$descrip];
//echo"yes fahd";
}
// si on ne  trouve pa une description prestente   dans la chaine 100% comme elle a ecrit dans la base alor on cherche la description la plus proche 

else{

$table_mot_description=explode(' ',$description);
$table_pourcent= array();
$table_mot=array();

$percent_mot=0;

for($tmd=0;$tmd<count($table_mot_description);$tmd++){
$table_test_mot=array();
$table_test_pourcent=array();
// parcourire chaque mot de la description d'un local dans la base pour determiner son pourcentage avec tous les mots de la chaine
$mot_description=$table_mot_description[$tmd];
echo "<p style='color:blue;'>le mot a tester est : ".$mot_description." </p><br>";

$words_table=explode(' ',$text_recorded);
$length=count($words_table);
//on faire le pourcentage de tous le mots de lachaine parapor a chaque mot de la description puis oun prend le poursentage le plus elevé

for($j=0;$j<$length;$j++){

$word=$words_table[$j];
$mot_ayant_plus_percent=$word;
similar_text($mot_description,$word,$percent);
if($percent>$percent_mot){$percent_mot=$percent;$mot_ayant_plus_percent=$word;
}
echo "le mot a comparer est: ".$mot_ayant_plus_percent."<br>";

echo "le pourcentage entre ce deux mots est : ".$percent_mot."<br>";
array_push($table_test_mot,$mot_ayant_plus_percent);
array_push($table_test_pourcent,$percent_mot);

$percent_mot=0;
$mot_ayant_plus_percent="";
}

echo"<br>";
// rechercher la valeur maximale de pourcentage dans la tabel $table_test_pourcent poure determine le mot correct (mot ayont les pourcentage le plus elvé)
$max=$table_test_pourcent[0];
$indice=0;
for($b=1;$b<count($table_test_pourcent);$b++){
if($table_test_pourcent[$b]>$max){$max=$table_test_pourcent[$b]; $indice=$b;}
}
// ajouter le mot ayont le plus pourcentage dans la table $table_mot et son pourcentage dans la table $table_pourcent 
echo $max."<br>";
 $mot_trouvé=$table_test_mot[$indice];
echo $mot_trouvé."<br>";
$mot_trouvé=$table_test_mot[$indice];
array_push($table_mot,$mot_trouvé);
array_push($table_pourcent,$max);
print_r($table_test_mot);
print_r($table_test_pourcent);
// vider le deux tableu pour une autre nouvélle eteration 
for($b=0;$b<count($table_test_pourcent);$b++){
array_slice($table_test_pourcent);
array_slice($table_test_mot);
}
echo"<br> Table finale <br>";							}

echo "mot table :<br>";
print_r($table_mot);
echo "<br>pourcent table :<br>";
print_r($table_pourcent);
// calculer le pourcentage de mots recuperé pour determiner le pourcentage totale de la chaine  parraport  a la description
//on faire la somme de tous les pourcentages dans la table $table_pourcent puis on le deviser sur le nombre des cases de la table (nombre de mots de la chaine )
$somme=0;
for($b=0;$b<count($table_pourcent);$b++){
$somme=$somme+$table_pourcent[$b];
}
// pourcentage totale de chaque local 
$prc_t_local=($somme/count($table_pourcent));
echo "<br>Pourcentage totale de local est : ".$prc_t_local."<br>";
//determiner la description ayant le plus pourcentages par rapport a la chaine 
//dans chaque fin de compariason de la description numero i parr rapport a la chaine
//si son pourcentage de la descriptio actuelle est plus elevé par rapport au pourcentage de la description precedent alors $pourcentage=pourcentage de la description actuelle
if((($somme/count($table_pourcent))>$pourcentage)and(($somme/count($table_pourcent))>70)){$local = $rs['table_reference']; $local_description = $rs[$descrip]; $pourcentage=($somme/count($table_pourcent));
if($table=="windows"){
$gpio1=$rs['gpio1'];
$gpio2=$rs['gpio2'];
}
if($table=="lights"){
$gpio2=$rs['gpio_out'];
}

 }
 
}

}

$msg_speak="The ".$local_description." ".$msg_speak;
// determiner gpio de l'objet dans le local

if(($local!="") and ($tablel!="windows") and ($tablel!="lights")){
/*$sql = "SELECT * FROM gpio WHERE table_gpio='$local'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$gpio2=$rs['num_gpio'];
}*/



}

$table_information=array($local,$local_description,$pourcentage,$gpio1,$gpio2);



return $table_information;

echo $action ; echo"<br>";
echo $local; echo"<br>";
echo $pourcentage; echo"<br>";

mysqli_close($conn);



}

//print_r(local_exist(lights,'living room lighting'));



function deduire_local($chaine){
$table_light=local_exist(lights,$chaine);
$table_door=local_exist(Doors,$chaine);
$table_window=local_exist(windows,$chaine);
$table_other=local_exist(Other_objects,$chaine);
$max=$table_light[2];$local=$table_light[0] ; $description_local=$table_light[1]; $gpio1=$table_light[4]; $gpio2=$table_light[3];$table='lights';
if($table_door[2]>$max){$max=$table_door[2]; $local=$table_door[0] ; $description_local=$table_door[1]; $gpio1=$table_door[4]; $gpio2=$table_door[3];$table='Doors';}
if($table_window[2]>$max){$max=$table_window[2]; $local=$table_window[0] ; $description_local=$table_window[1]; $gpio1=$table_window[4]; $gpio2=$table_window[3];$table='windows';}
if($table_other[2]>$max){$max=$table_other[2]; $local=$table_other[0] ; $description_local=$table_other[1]; $gpio1=$table_other[4]; $gpio2=$table_other[3];$table='Other_objects';}

$table_final=array($local,$description_local,$max,$gpio2,$gpio1,$table);

return $table_final;

}
//print_r(deduire_local('could you turn on Air conditionair'));


function traitement($table,$local,$gpio,$activation,$page,$value){
$rapport="";
if($table=='lights'){$file='ControlLights.py'; }
if($table=='Doors'){$file='ControllDoors.py';}
if($table=='windows'){$file='ControllWindows.py';}
if($table=='Other_objects'){$file='ControllOther.py';}
if($table=='windows'){exec("sudo  python /var/www/my_pythons/'$file' '$gpio' 1 5 30");}
else{
	exec("sudo  python /var/www/my_pythons/'$file' '$gpio' '$activation'");}
	$rapport="";
	mysqli_close($conn);

	include('Data_Base_connection2.php');

	include('insert_light.php');
if($table=='lights'){
	if ($activation==0){update_light($local);}
	else{insert_light($local);}
			}
if($table=='Doors'){
if ($activation==0){update_door($local);}
	else{insert_door($local);}

			}
if($table=='windows'){
if ($activation==0){update_window($local);}
	else{insert_window($local);}

			}
if($table=='Other_objects'){
if ($activation==0){update_other($local);}
	else{insert_other($local);}


}
	
	$name=name();	
	include('historique_user.php');
$day=get_curent_day();
$time=get_curent_time();
	insert_user_historique($name,$value,$day,$time,$rapport);

	//header('Location: $page');

}
//traitement('lights','Living_Room_Lighting',7,0,'index.php','lvivng_on');


function object_open_or_not($table,$local){

include('Data_Base_connection.php');
include('Data_Base_connection2.php');
if($table=="lights"){
$state_objet="state_light";}
elseif($table=="windows"){
$state_objet="state_window";}
elseif($table=="Doors"){
$state_objet="state_door";}
elseif($table=="Other_objects"){
$state_objet="state_objet";}

$sql = "SELECT * FROM $table WHERE table_reference='$local'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$state=$rs[$state_objet];
}
if ($state==ON){
return 1;}
else{return 0;}
}

//echo (object_open_or_not(windows,'Living_Room_Window'));



function execution_commande($commande){
include('Data_Base_connection.php');
include('Data_Base_connection2.php');

if(($GLOBALS['loc']!="")and($GLOBALS['act']=="")){

//il faut rendre ses valeurs globale 
 $action=action_exist($commande);
 $local=$GLOBALS['loc'];
 $description_local=$GLOBALS['descloc'];
 $gpio1=$GLOBALS['gpio111'];
 $gpio2=$GLOBALS['gpio222'];
 $table=$GLOBALS['tableee'];
 $pourcentage=$GLOBALS['pourcentt'];}



else{

$table_final=deduire_local($commande);
if(($GLOBALS['loc']=="")and($GLOBALS['act']!="")){

//il faut rendre ses valeurs globale 
 $action=$GLOBALS['act'];

}
else{
$action=action_exist($commande);}

$local=$table_final[0];
$description_local=$table_final[1];
$gpio1=$table_final[3];
$gpio2=$table_final[4];
$table=$table_final[5];
$pourcentage=$table_final[2];}




echo"<input type='text' id='local' value= '$local' name='local' hidden><br>";
echo"<input type='text' id='action' value= '$action' name='action'hidden><br>";
echo"<input type='text' id='descriptio' value= '$description_local' name='descriptio'hidden><br>";

echo"<input type='text' id='max' value= '$pourcentage' name='max'hidden><br>";
echo"<input type='text' id='gpio1' value= '$gpio1' name='gpio1'hidden><br>";	
echo"<input type='text' id='gpio2' value= '$gpio2' name='gpio2'hidden><br>";
echo"<input type='text' id='table' value= '$table' name='table'hidden><br>";





if(($pourcentage>80) and($action!="") and($local!="")){
$state_obj=object_open_or_not($table,$local);

$gpio=$gpio2;

$sql = "SELECT * FROM Actions WHERE action='$action'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$activation=$rs['gpio_action'];}

if($state_obj==$activation){
$message="sorry sir i can not execute this operation because , ".$description_local." is already ".$action."";}

else	{
if($activation==1){$value=$local."_ON";}
else{$value=$local."_OFF";}
if($table=='windows'){
if($activation==1){traitement($table,$local,$gpio,1,'index.php',$value);}
else{traitement($table,$local,$gpio1,1,'index.php',$value);}
}

else{
traitement($table,$local,$gpio,$activation,'index.php',$value);}
echo $local;echo"<br>";
echo $pourcentage;
$execution_message=$description_local." It is ".$action." right now";
$message=" ".$execution_message ;

	}



echo"pourrrrrrrrrrrrrrrrrr".$pourcentage;
								}
elseif(($action=="") and ($local!="")and ($pourcentage>75)){ 
$message="What do you want me to do for ".$description_local ;}
elseif(($action!="") and ($local=="")){$message="What you want to become ".$action." " ;}
elseif(($action=="") and ($local=="") ){
$message="";
$trouv='True';
$source='';
$insert='False';
$creat='False';

$tab=Verif_existance_objet_and_meaning($commande);
$objet=$tab[1];
$tab_ref=$tab[2];
$meaning=$tab[3];
$objet_exist=$tab[4];
$meaning_exist=$tab[5];
$reponce=$tab[6];
$message=$reponce;
$source='local';

if(($objet_exist=='True') and ($meaning_exist=='False')){
$source='wolphramealpha';

$insert='True';
include('wolphramealpha.php');
$message=wolframalpha($commande);

//insert_information_to_object($commande,$objet,$tab_ref,$meaning,$message);

}
elseif(($objet_exist=='False') and ($meaning_exist=='False')){
$source='wolphramealpha';

$insert='True';
$creat='True';
include('wolphramealpha.php');
$message=wolframalpha($commande);
//Creat_table_object($objet,$tab_ref);

//insert_information_to_object($commande,$objet,$tab_ref,$meaning,$message);

}

similar_text("   ot exist, ",$message,$percenttt);
echo "wolph percent".$percenttt;


if($percenttt>80){
$source='wikipedia';

$tab=Verif_existance_objet_and_meaning($commande);
$objet=$tab[1];
$tab_ref=$tab[2];
echo $objet."<br>";
echo $tab_ref."<br>";
$meaning=$tab[3];
$objet_exist=$tab[4];
$meaning_exist=$tab[5];
$reponce=$tab[6];
$message=$reponce;

if(($objet_exist=='True') and ($meaning_exist=='False')){
$insert='True';
include('wikipedia.php');
$message=wiki($commande);


}
elseif(($objet_exist=='False') and ($meaning_exist=='False')){
$insert='True';
$creat='True';

include('wikipedia.php');
$message=wiki($commande);


}

similar_text(" ",$message,$percentaa);
echo "wiki percent".$percentaa;

if($message==''){
$message="Sorry sir i can not understand you . Can you be more specific please ";
$trouv='False';

}
}
similar_text("Array",$message,$percenttt);
echo $percenttt;
if ($percenttt>80){$message="Sorry sir i can not understand you . Can you be more specific please ";
$trouv='False';

}
}
echo "<br> l'information trouvé !!! ". $trouv."<br> la source de l'information  est ".$source."<br>";
if($trouv=='True'){
// tester si une mot de lexeption est existe (weather ' tempurature etc ...)
include('Data_Base_connection.php');
include('Data_Base_connection2.php');
$sql="SELECT * FROM exeption_words";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);
$mot=$rs['word'];
$exist = mot_exist($commande,$mot);
if($exist=='True'){break;}

}
//tester le méme meaning et la méme table a farie
if($exist=='False'){
if($creat=='True'){
Creat_table_object($objet,$tab_ref);
echo"une nouvelle table doit étre creat"."<br>";
}
if($insert=='True'){insert_information_to_object($commande,$objet,$tab_ref,$meaning,$message);
echo'une nouvelle ligne doit étre ajouté'."<br>";
}
}
}

	
mysqli_close($conn);
return $message;
}
//echo execution_commande('what does mean banana');

echo $text_recorded."<br>";

$text_recorded=$_POST['text_record'];

$msg_speak= execution_commande($text_recorded);


echo"<form name='f1' id='f1'>";

echo"<input type='text' id='msg' value= '$msg_speak' name='msg' ><br>";
//echo"<input type='button' value= 'click' onclick='subm()' ><br>";



include('commande_manup.php');
echo"</form>";
?>

<script>
//text to speech 
var voiceMap=[]
function loadvoice(){
                var voices = speechSynthesis.getVoices();
                for(var i = 0;i<voices.length;i++){
                var voice = voices[i];
                var option=document.createElement('option');
                option.value=voice.name;
                option.innerHTML=voice.name;
                voiceMap[voice.name]=voice;
};
};
window.speechSynthesis.onvoiceschanged= function(e){
loadvoice();}
var sp = document.getElementById('sp');
var  rate ="0.8";
var pitch="1";
var volume="1";
var avatar="Veena";

function speak(){
        var msg = new SpeechSynthesisUtterance(); 
                msg.rate=rate
                msg.Pitch=pitch
                msg.volume="1";
                msg.voice=voiceMap[avatar];
                msg.text=sp.value;
                window.speechSynthesis.speak(msg);}


function say(ch){
        var msg = new SpeechSynthesisUtterance(); 
                msg.rate=rate
                msg.Pitch=pitch
                msg.volume="1";
                msg.voice=voiceMap[avatar];
                msg.text=ch;
                window.speechSynthesis.speak(msg);}

function decomposition_text_and_speak(msg){
var j=0;
var r=0;
var ch=" ";
for(x=0;x<msg.length;x++){
if(msg[x]==','){msg[x]='';}
if(msg[x]=='.'){msg[x]='';}
if(msg[x]=="'"){msg[x]='';}


}
if(msg[0]==" "){msg[0]="";}
if(msg[msg.length]==" "){msg[msg.length]="";}

tab=msg.split(' ');
length=tab.length;
//alert(length);
if(length<10){say(msg);}
else{
nbr=length/10;
nbrephrase=(length/10)-((length%10)/10);
nbremot=length%10;
//alert(nbr);
//alert(nbrephrase);
//alert(nbremot);
m=0
n=10
for(nb=0;nb<nbrephrase;nb++){

for(i=m;i<n;i++){
tab[i]=' '+tab[i];
ch =ch.concat(tab[i]);}

say(ch);

ch="";

n=n+10;
m=m+10;
}

if(nbremot!=0){
m=nbrephrase*10;
n=m+nbremot;
for(i=m;i<n;i++){
tab[i]=' '+tab[i];
ch =ch.concat(tab[i]);}

say(ch);


}

}


}
function subm(){
document.getElementById("f1").action = "index.php#SOUND_CONTROL"; 
 document.getElementById("f1").submit();}
subm();
/*var msg =document.f1.msg.value;
alert(msg);
decomposition_text_and_speak(msg);*/
//say(msg);
</script>


