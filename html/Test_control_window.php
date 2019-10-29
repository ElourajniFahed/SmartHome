<?php

include('Data_Base_connection.php');

$sql = "SELECT * FROM windows";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
           
$description_window=$row['description_window'];
$state=$row['state_window'];

$id=$description_window."_".$state;
$table_ref=$row['table_reference'];
$value_on=$row['table_reference']."_ON";
$value_off=$row['table_reference']."_OFF";


$sqlg = "SELECT * FROM windows WHERE table_reference='$table_ref'";
        $resultg = mysqli_query($conn, $sqlg);

        if (mysqli_num_rows($resultg) > 0) {
        // output data of each row
        while($rowg = mysqli_fetch_assoc($resultg)) {
           
        $num_gpio1=$rowg['gpio1'];
	$num_gpio2=$rowg['gpio2'];
}}

  
	
    if($_POST['description_window']==$value_on)
    {
	include('Data_Base_connection.php');

	exec("sudo  python /var/www/my_pythons/ControllWindows.py '$num_gpio1' 1 5 30");



	$sql = "UPDATE windows SET state_window='ON' , opening_time='$time' , closing_time='XX:XX:XX' WHERE description_window='$description_window'";
	mysqli_query($conn, $sql);
	mysqli_close($conn);

	include('insert_light.php');
	insert_window($table_ref);
$name=name();	
	include('historique_user.php');
$day=get_curent_day();
$time=get_curent_time();
	insert_user_historique($name,$value_on,$day,$time,$rapport);

	header('Location: Control_Windows.php'); 



 }
    elseif($_POST['description_window'] == $value_off)
    { 	
	include('Data_Base_connection.php');
	exec("sudo  python /var/www/my_pythons/ControllWindows.py '$num_gpio2' 1 5 30");



	$sql = "UPDATE windows SET state_window='OFF' , closing_time='$time'  WHERE description_window='$description_window'";
	mysqli_query($conn, $sql);
	include('insert_light.php');
	update_window($table_ref);
$name=name();	
	include('historique_user.php');
$day=get_curent_day();
$time=get_curent_time();
	insert_user_historique($name,$value_off,$day,$time,$rapport);

	header('Location: Control_Windows.php');
}
	else{}

}

}	



    

?>
