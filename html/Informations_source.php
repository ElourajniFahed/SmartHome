<?php
function wolframalpha($question){
$answ="";
$answer="";
$answer=exec("sudo  python /var/www/my_pythons/wolframalphaaa.py $question",$output);
//var_dump($output);
$l=count($output);
//print_r($output);
for($i=0;$i<$l;$i++){
$answ=$answ." ".$output[$i];
}
$length=strlen($answ);
for($i=0;$i<$length;$i++){
if ($answ[$i]=="|"){$answ[$i]=",";}
}
return($answ);

}
//echo wolframalpha('idhcdskilcnskljvn');

function wikipidea($question){
$answ="";
$answer="";
$answer=exec('sudo  python /var/www/my_pythons/ wikipediaaa.py messi',$output,$ret_code);
foreach ($output as $line){
    print "$line\n";
}
echo $ret_code;
var_dump($output);
$l=count($output);
//print_r($output);
for($i=0;$i<$l;$i++){
$answ=$answ." ".$output[$i];
}
$length=strlen($answ);
for($i=0;$i<$length;$i++){
if ($answ[$i]=="|"){$answ[$i]=",";}
}
echo $answ;
return($answ);


}

?>
