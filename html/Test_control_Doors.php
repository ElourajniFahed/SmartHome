<?php
include('Data_Base_connection.php');



$sql = "SELECT * FROM Doors";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
           
$description_door=$row['description_door'];
$state=$row['state_door'];

$id=$description_door."_".$state;
$table_ref=$row['table_reference'];
$value_on=$row['table_reference']."_ON";
$value_off=$row['table_reference']."_OFF";

$sqlg = "SELECT * FROM gpio WHERE table_gpio='$table_ref'";
        $resultg = mysqli_query($conn, $sqlg);

        if (mysqli_num_rows($resultg) > 0) {
        // output data of each row
        while($rowg = mysqli_fetch_assoc($resultg)) {
           
        $num_gpio=$rowg['num_gpio'];}}

  
    if($_POST['description_door']==$value_on)
    {
	include('Data_Base_connection.php');

	exec("sudo  python /var/www/my_pythons/ControlLights.py '$num_gpio' 1");
	$rapport="";



	include('insert_light.php');
	insert_door($table_ref);
$name=name();	
	include('historique_user.php');
	$day=get_curent_day();
	$time=get_curent_time();
	insert_user_historique($name,$value_on,$day,$time,$rapport);

	header('Location: Control_Doors.php'); 



 }
    elseif($_POST['description_door'] == $value_off)
    { 	
	include('Data_Base_connection.php');
	exec("sudo  python /var/www/my_pythons/ControlLights.py '$num_gpio' 0");
	$rapport="";

	include('insert_light.php');
	update_door($table_ref);
	$name=name();	
	include('historique_user.php');
$day=get_curent_day();
$time=get_curent_time();
	insert_user_historique($name,$value_off,$day,$time,$rapport);

	header('Location: Control_Doors.php');
}
	else{}

}

}	



    
?>
