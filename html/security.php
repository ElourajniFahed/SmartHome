<?php
function creation_mdp(){
$result="";
$chars="abcdefghijklmnopqrstovwxyz$-_*&#0123456789";
$charArray=str_split($chars);
for($i=0;$i<10;$i++){
$randItem=array_rand($charArray); // random indice pour un charachtére 
$result.="".$charArray[$randItem];
}
 
return $result;
}

/*$x=creation_mdp();
echo $x ;*/
?>
