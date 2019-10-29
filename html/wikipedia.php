<?php
function wiki($question){
$answ="";
$answer="";
$answer= escapeshellcmd("sudo  python /var/www/my_pythons/wikipediaaa.py ".$question);
$answ = shell_exec($answer);
$length=strlen($answ);
$answ[0]=" ";
$answ[1]=" ";
$answ[2]=" ";
$nbrespa=0;
$nbpoin=0;
for($i=0;$i<$length;$i++){
if ($answ[$i]=="|"){$answ[$i]=",";}
if ($answ[$i]=="["){$answ[$i]=" ";}

if ($answ[$i]=="]"){$answ[$i]="";}
if ($answ[$i]=="("){$answ[$i]="";}
if ($answ[$i]==")"){$answ[$i]=",";}
if ($answ[$i]=="'"){$answ[$i]="";}
if ($answ[$i]=="\""){$answ[$i]="";}
if ($answ[$i]==" "){$nbrespa=$nbrespa+1;
if($nbrespa==5){$answ[$i]=",";$nbrespa=0;}
if($nbpoin==15){$answ[$i]=".";$nbpoin=0;}
}



}
$answ = mb_convert_encoding($answ, "UTF-7", "EUC-JP");
//echo iconv(mb_detect_encoding($answ, mb_detect_order(), true), "latin1", $answ);

return($answ);
}
/*echo wiki('cristiano ronaldo ');
$x= utf8_decode ( $m );
echo $x;*/
?>
