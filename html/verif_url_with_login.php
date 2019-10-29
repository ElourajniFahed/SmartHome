<?php
function coonect_or_not(){
$servername = "localhost";
$username = "root";
$password = "fahd50029540";
$dbname = "home_statics";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$sql = "SELECT * FROM users where connected='True' and  blocked='False'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

return'True';
}
else{return 'False';}

mysqli_close($conn);

}
//coonect_or_not();
?>
