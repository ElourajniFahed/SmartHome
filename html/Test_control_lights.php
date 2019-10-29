<?php
include('Data_Base_connection.php');





$sql = "SELECT * FROM lights";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
           
$description_light=$row['description_light'];
$state=$row['state_light'];

$id=$description_light."_".$state;
$table_ref=$row['table_reference'];
$value_on=$row['table_reference']."_ON";
$value_off=$row['table_reference']."_OFF";

$sqlg = "SELECT * FROM lights WHERE table_reference='$table_ref'";
        $resultg = mysqli_query($conn, $sqlg);

        if (mysqli_num_rows($resultg) > 0) {
        // output data of each row
        while($rowg = mysqli_fetch_assoc($resultg)) {
           
        $num_gpio=$rowg['gpio_out'];
}}

  
    if($_POST['description_light']==$value_on)
    {
	include('Data_Base_connection.php');

	exec("sudo  python /var/www/my_pythons/ControlLights.py '$num_gpio' 1");
	$rapport="";



	include('insert_light.php');
	insert_light($table_ref);
$name=name();	

	include('historique_user.php');
	$day=get_curent_day();
	$time=get_curent_time();
	insert_user_historique($name,$value_on,$day,$time,$rapport);

	header('Location: Conrole_Lights.php'); 



 }
    elseif($_POST['description_light'] == $value_off)
    { 	
	include('Data_Base_connection.php');
	exec("sudo  python /var/www/my_pythons/ControlLights.py '$num_gpio' 0");
	$rapport="";

	include('insert_light.php');
	update_light($table_ref);
	$name=name();	
	include('historique_user.php');
	$day=get_curent_day();
	$time=get_curent_time();
	insert_user_historique($name,$value_off,$day,$time,$rapport);
	
	header('Location: Conrole_Lights.php');
}
	else{}

}

}	



    
?>
