<?php

function get_curent_day(){
$answer= escapeshellcmd("sudo  python /var/www/my_pythons/get_day.py ");
$answ = shell_exec($answer);
return $answ;}

function get_curent_time(){
$answer= escapeshellcmd("sudo  python /var/www/my_pythons/get_time.py ");
$answ = shell_exec($answer);
return $answ;}
//echo get_curent_time() ;
?>
