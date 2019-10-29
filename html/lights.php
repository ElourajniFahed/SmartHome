 <?php
include('Data_Base_connection.php');
echo $_POST["m"];
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

$sqlg = "SELECT * FROM gpio WHERE table_gpio='$table_ref'";
        $resultg = mysqli_query($conn, $sqlg);

        if (mysqli_num_rows($resultg) > 0) {
        // output data of each row
        while($rowg = mysqli_fetch_assoc($resultg)) {
           
        $num_gpio=$rowg['num_gpio'];}}

    echo"name= ".$description_light;echo"<br>";
	echo"value= ".$value_on;echo"<br>";
	echo $_POST['name'];
	
    if($_POST['$description_light']=='$value_on')
    {
	
	echo $num_gpio;

 }
    elseif($_POST['$description_light'] == '$value_off')
    { echo"yes";}
	else{}

}

}	



    
?>
