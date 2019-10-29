<?php
exec("sudo php living_room_light_on.php");
exec("sudo php basement_light_on.php");
exec("sudo php garage_light_on.php");
exec("sudo php kitchen_light_on.php");
exec("sudo php guest_room_light_on.php");
exec("sudo php bed_room_light_on.php");
exec("sudo php bathroom_light_on.php");
exec("sudo php children_room_light_on.php");




header('Location: index.php'); 

?>
