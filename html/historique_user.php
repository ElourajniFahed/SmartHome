<?php

function insert_user_historique($name,$action,$date_action,$time_action,$rapport){
include('Data_Base_connection.php');
$sqle = "INSERT INTO $name VALUES ('','$action', '$date_action','$time_action', '$rapport')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}



}
//insert_user_historique($name,'l','12547','1555','55555');
?>
