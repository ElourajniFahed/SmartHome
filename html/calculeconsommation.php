<?php
function calcule($datedeb,$datefin,$timedeb , $timefin , $conpersec ){

$somme=0;
$j=0;
$deffereceyear_sec=0;
$defferecemonth_sec=0;
$deffereceday_sec=0;



$daydeb=(int)($datedeb[3].$datedeb[4]);
$monthdeb=(int)($datedeb[0].$datedeb[1]);
$yeardeb=(int)($datedeb[6].$datedeb[7]);
$dayfin=(int)($datefin[3].$datefin[4]);
$monthfin=(int)($datefin[0].$datefin[1]);
$yearfin=(int)($datefin[6].$datefin[7]);
if($datedeb!=$datefin){if($yearfin>$yeardeb){$deffereceyear_sec=($yearfin-$yeardeb)*12*30*24*60*60;}
if($monthfin>$monthdeb){$defferecemonth_sec=($monthfin-$monthdeb)*30*24*60*60;}
if($dayfin>$daydeb){$deffereceday_sec=($dayfin-$daydeb)*24*60*60;}
//$j=86400;// nombre des secondes dans un jour 




}
$deb=$timedeb.split(':');
$fin=$timefin.split(':');
$price=(int)$conpersec;

$debsecondes=(((($deb[0]*10)+$deb[1])*60*60)+((($deb[3]*10)+$deb[4])*60)+(($deb[6]*10)+$deb[7]));
$finsecondes=(((($fin[0]*10)+$fin[1])*60*60)+(($fin[3]*10+$fin[4])*60)+($fin[6]*10+$fin[7]));
$somme=somme+((abs($finsecondes+$deffereceyear_sec+$defferecemonth_sec+$deffereceday_sec)-$debsecondes))*($price/3600);


return $somme;
}

//echo calcule("04-12-17","04-13-17","00:33:14" , "22:07:14" , "100" );
//echo calcule('05-02-17','05-02-17','00:31:14' , '01:31:36' , "100");
?>
