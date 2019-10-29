<?php
include('Data_Base_connection2.php');
include('Data_Base_connection.php');
$k=0;
/*$sql="UPDATE verbs SET verb_sentence='irregular verb' WHERE verb_sentence=''";
$res=mysql_query($sql) or die (mysql_error ());*/

/*$sql = "INSERT INTO verbs VALUES 
('','to be','','','','','','','irregular verb')";
$res=mysql_query($sql) or die (mysql_error ());*/

/*$sql="SELECT * FROM verbs where verb_sentence='irregular verb'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
echo"<table border='2'>";
for($i=0;$i<$n;$i++)
{
$k=$k+1;
$rs=mysql_fetch_array($res);
$verb=$rs['word'];
echo $verb.'<br>';
$length=strlen($verb);
//close=closed---> terminer avec e alors on ajout just d
//play=played--> voyelle(a,e,i,o,u) apres y ajouter ed 
//marry=married--> non voyelle apres y ajouter ied
// else ajouter ed
if( $verb[$length-1]=='y'){
	if(($verb[$length-2]=='a') or ($verb[$length-2]=='e') or ($verb[$length-2]=='i') or ($verb[$length-2]=='o') or ($verb[$length-2]=='u')){$ver=$verb.'ed';}
	else{$ver=$verb.'ied';}
			}
elseif( $verb[$length-1]=='e'){$ver=$verb.'d';}
else{$ver=$verb.'ed';}*/


/*$sqlx = "UPDATE verbs SET simple_past='$ver' WHERE word='$verb' ";

if (mysqli_query($conn, $sqlx)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}*/

//tester si verb est sou la vorme 'to verb' ou 'verb' si to verb alors supprime to
if(($verb[0]=='t') and ($verb[1]=='o') and ($verb[2]==' ')){
$verb[0]='';
$verb[1]='';
$verb[2]='';



}
/*echo $fut='will '.$verb;
$sqlx = "UPDATE verbs SET simple_present='$verb' WHERE word='$verb' ";

if (mysqli_query($conn, $sqlx)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}*/
//}
/*
//update irrigular verbs 
if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='was-were' WHERE word='be' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='became' WHERE word='become' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='begane' WHERE word='begin' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='broke' WHERE word='break' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='brought' WHERE word='bring' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='built' WHERE word='build' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='chose' WHERE word='choose' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='came' WHERE word='come' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='did' WHERE word='do' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='drank' WHERE word='drink' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='drove' WHERE word='drive' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='fell' WHERE word='fall' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='felt' WHERE word='feel' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='found' WHERE word='find' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='forgot' WHERE word='forget' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='froze' WHERE word='freeze' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='got' WHERE word='get' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='gave' WHERE word='give' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='whent' WHERE word='go' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='hung' WHERE word='hang' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='had' WHERE word='have' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='hit' WHERE word='hit' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='kept' WHERE word='keep' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='laid' WHERE word='lay' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='left' WHERE word='leave' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='lent' WHERE word='lend' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='let' WHERE word='let' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='made' WHERE word='make' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='met' WHERE word='meet' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='put' WHERE word='put' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='reset' WHERE word='reset' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='rang' WHERE word='ring' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='saw' WHERE word='see' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='sold' WHERE word='sell' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='set' WHERE word='set' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='sang' WHERE word='sing' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='sat' WHERE word='sit' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='spoke' WHERE word='speak' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='spent' WHERE word='spend' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='swam' WHERE word='swim' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='took' WHERE word='take' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='told' WHERE word='tell' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='threw' WHERE word='throw' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='understood' WHERE word='understand' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='won' WHERE word='win' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='wrote' WHERE word='write' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='was-were' WHERE word='to be' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='beat' WHERE word='beat' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='bent' WHERE word='bend' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='bet' WHERE word='bet' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='bedded' WHERE word='bed' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='bit' WHERE word='bite' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='blew' WHERE word='blow' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='broadcasted' WHERE word='broadcast' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='burned' WHERE word='burn' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='bought' WHERE word='buy' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='caught' WHERE word='catch' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='cost' WHERE word='cost' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='cut' WHERE word='cut' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='dug' WHERE word='dig' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='drew' WHERE word='draw' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='dreamt' WHERE word='dream' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='ate' WHERE word='eat' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='fought' WHERE word='fight' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='flew' WHERE word='fly' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='forgave' WHERE word='forgive' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='grew' WHERE word='grow' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='heard' WHERE word='hear' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='hid' WHERE word='hide' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='held' WHERE word='hold' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='hurt' WHERE word='hurt' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='knew' WHERE word='know' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='led' WHERE word='lead' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='learned' WHERE word='learn' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='lied' WHERE word='lie' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='lost' WHERE word='lose' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='meant' WHERE word='mean' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='paid' WHERE word='pay' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='read' WHERE word='read' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='rode' WHERE word='ride' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='rose' WHERE word='rise' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='ran' WHERE word='run' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='said' WHERE word='say' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='sent' WHERE word='send' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='showed' WHERE word='show' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='shut' WHERE word='shut' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='sank' WHERE word='sink' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='slept' WHERE word='sleep' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='stood' WHERE word='stand' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='stank' WHERE word='stink' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='taught' WHERE word='teach' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='tore' WHERE word='tear' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='thought' WHERE word='think' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='woke' WHERE word='wake' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
$sqlx = "UPDATE verbs SET simple_past='wore' WHERE word='wear' "; mysqli_query($sqlx);if (mysqli_query($conn, $sqlx)) { echo "Record updated successfully";} else { echo "Error updating record: " . mysqli_error($conn);}
*/
   
$sql="SELECT * FROM verbs where word='do'";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res); 
echo"<table border='2'>";
for($i=0;$i<$n;$i++)
{
$rs=mysql_fetch_array($res);

echo $rs['word'];
echo"<p style='color:red;'>";
echo $rs['simple_present'];
echo $rs['simple_past'];

echo $rs['verb_sentence'];

echo"</p>";

}



?>
