<?php
function wolframalpha($question){
$answ="";
$answer="";
$answer= escapeshellcmd("sudo  python /var/www/my_pythons/wolframalphaaa.py ".$question);
$answ = shell_exec($answer);
$length=strlen($answ);
$nbpoin=0;
$nbrespa=0;
$answ[0]=" ";
$answ[1]=" ";
$answ[2]=" ";




for($i=0;$i<$length;$i++){
if ($answ[$i]=="|"){$answ[$i]=",";}
if ($answ[$i]=="]"){$answ[$i]=" ";}
if ($answ[$i]=="("){$answ[$i]="";}
if ($answ[$i]==")"){$answ[$i]=",";}
if ($answ[$i]=="'"){$answ[$i]=" ";}
if ($answ[$i]==" "){$nbrespa=$nbrespa+1;$nbpoin=$nbpoin+1;
if($nbrespa==5){$answ[$i]=",";$nbrespa=0;}
if($nbpoin==15){$answ[$i]=".";$nbpoin=0;}

}




}

$answ = mb_convert_encoding($answ, "UTF-7", "auto");
$answ=utf8_encode($answ);
$answ= utf8_decode ( $answ );




return($answ);
}
 //echo wolframalpha('what is the temperature in tunisia');
?>
