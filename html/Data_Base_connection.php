<?php
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
?>
