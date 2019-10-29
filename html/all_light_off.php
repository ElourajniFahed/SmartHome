<?php
exec("sudo php living_room_light_off.php");
exec("sudo php basement_light_off.php");
exec("sudo php garage_light_off.php");
exec("sudo php kitchen_light_off.php");
exec("sudo php guest_room_light_off.php");
exec("sudo php bed_room_light_off.php");
exec("sudo php bathroom_light_off.php");

exec("sudo php children_room_light_off.php");



header('Location: index.php'); 

?>


