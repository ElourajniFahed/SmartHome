<?php



function create_table_light($name_table,$consommation_seconde,$num_gpio,$num_gpio_in,$function_gpio){

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
$nom_table_light=$name_table;
$name_table=split(" ",$name_table);
$name_table=implode("_",$name_table);


$sql = "CREATE TABLE $name_table (
Code_Activation INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Activation_Day VARCHAR(30) ,
Activation_Time VARCHAR(30) ,
Desactivation_Day VARCHAR(30),
Desactivation_Time VARCHAR(30),
Consommation_Light_Totale VARCHAR(30) ,
Report TEXT ,
User_Activator VARCHAR(30),
User_Desactivator VARCHAR(30)
)";

if (mysqli_query($conn, $sql)) {
        echo "Table  ".$nom_table_light."  created successfully";

} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "INSERT INTO lights VALUES ('','OFF', '$nom_table_light','$num_gpio','$num_gpio_in','', '', '$consommation_seconde', '', '$name_table')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}


mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "UPDATE gpio set  function_gpio='$function_gpio' , state_gpio ='réservé' , table_gpio='$name_table' WHERE  num_gpio='$num_gpio'";
if (mysqli_query($conn, $sqle)) {
    echo " record updated  successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

$sqle = "UPDATE gpio set  function_gpio='$function_gpio' , state_gpio ='réservé' , table_gpio='$name_table' WHERE  num_gpio='$num_gpio_in'";
if (mysqli_query($conn, $sqle)) {
    echo " record updated  successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
mysqli_close($conn);



include('Data_Base_connection.php');


$sqle = "UPDATE $name_table SET  User_Desactivator='.'";
if (mysqli_query($conn, $sqle)) {
    echo " Table updated  successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
mysqli_close($conn);
$day=date('m-d-y');
$time= date('H:i:s');
$name=name();	
	include('historique_user.php');
	$act="Creation Object : ".$name_table."";
	insert_user_historique($name,$act,$day,$time,$rapport);


}


//create_table_light('i light',10,'5','11','');







function create_table_other($name_table,$consommation_seconde,$autoopen,$num_gpio,$function_gpio,$marque){

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
$nom_table_other=$name_table;
$name_table=split(" ",$name_table);
$name_table=implode("_",$name_table);


$sql = "CREATE TABLE $name_table (
Code_Activation INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Descriptuon_objet TEXT,
Marque_objet TEXT,
Activation_Day VARCHAR(30) ,
Activation_Time VARCHAR(30) ,
Desactivation_Day VARCHAR(30),
Desactivation_Time VARCHAR(30),
Consommation_Totale VARCHAR(30) ,
Report TEXT ,
User_Activator VARCHAR(30),
User_Desactivator VARCHAR(30)
)";

if (mysqli_query($conn, $sql)) {
        echo "Table  ".$nom_table_light."  created successfully <br>";

} else {
    echo "Error creating table: " . mysqli_error($conn);
}




mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "INSERT INTO Other_objects VALUES ('','OFF', '$nom_table_other','$marque','$autoopen','', '', '$consommation_seconde', '', '$name_table')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}


mysqli_close($conn);
include('Data_Base_connection.php');




$sqle = "INSERT INTO $name_table VALUES ('','','$marque','','','', '', '', '', '', '')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

mysqli_close($conn);
include('Data_Base_connection.php');

$sqle = "UPDATE gpio set  function_gpio='$function_gpio' , state_gpio ='réservé' , table_gpio='$name_table' WHERE  num_gpio='$num_gpio'";
if (mysqli_query($conn, $sqle)) {
    echo " record updated  successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
mysqli_close($conn);


include('Data_Base_connection.php');


$sqle = "UPDATE $name_table SET  User_Desactivator='.'";
if (mysqli_query($conn, $sqle)) {
    echo " Table updated  successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
mysqli_close($conn);
$day=date('m-d-y');
$time= date('H:i:s');
$name=name();	
	include('historique_user.php');
	$act="Creation Object : ".$name_table."";
	insert_user_historique($name,$act,$day,$time,$rapport);
}

//create_table_other('condinione',3,'True',300,'out','Samsang');








function create_table_doors($name_table,$consomation_energ,$optionssecur,$num_gpio,$function_gpio){

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
$nom_table_doors=$name_table;
$name_table=split(" ",$name_table);
$name_table=implode("_",$name_table);


$sql = "CREATE TABLE $name_table (
Code_Activation INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Opening_time VARCHAR(30) ,
Closing_Time VARCHAR(30),
Door_security_system VARCHAR(30) ,
User_Activator VARCHAR(30),
User_Desactivator VARCHAR(30)
)";

if (mysqli_query($conn, $sql)) {
        echo "Table  ".$nom_table_light."  created successfully";

} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "INSERT INTO $name_table VALUES ('','', '','True', '', '')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sqle. "<br>" . mysqli_error($conn);}




mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "INSERT INTO Doors VALUES ('','OFF', '$nom_table_doors','', '', '$optionssecur','$consomation_energ','$name_table')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sqle. "<br>" . mysqli_error($conn);}





mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "UPDATE gpio set  function_gpio='$function_gpio' , state_gpio ='réservé' , table_gpio='$name_table' WHERE  num_gpio='$num_gpio'";
if (mysqli_query($conn, $sqle)) {
    echo " record updated  successfully <br>";
} 
else {
    echo "Error: " . $sqle . "<br>" . mysqli_error($conn);}
mysqli_close($conn);

include('Data_Base_connection.php');


$sqle = "UPDATE $name_table SET  User_Desactivator='.'";
if (mysqli_query($conn, $sqle)) {
    echo " Table updated  successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
mysqli_close($conn);
$day=date('m-d-y');
$time= date('H:i:s');
$name=name();	
	include('historique_user.php');
	$act="Creation Object : ".$name_table."";
	insert_user_historique($name,$act,$day,$time,$rapport);

}
//create_table_doors('ch door',10,$optionssecur,'ON','7','out');






function create_table_windows($name_table,$consomation_energ,$autoopen,$num_gpio1,$num_gpio2,$function_gpio1,$function_gpio2){

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
$nom_table_windows=$name_table;
$name_table=split(" ",$name_table);
$name_table=implode("_",$name_table);


$sql = "CREATE TABLE $name_table (
Code_Activation INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Opening_time VARCHAR(30) ,
Closing_Time VARCHAR(30),
Window_automatique_opening_system VARCHAR(30),
User_Activator VARCHAR(30),
User_Desactivator VARCHAR(30)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table  ".$nom_table_light."  created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "INSERT INTO windows VALUES ('','OFF', '$nom_table_windows','', '','$autoopen',$num_gpio1,$num_gpio2,'$consomation_energ','$name_table')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sqle . "<br>" . mysqli_error($conn);}

mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "INSERT INTO $name_table VALUES ('','', '','$autoopen', '','')";
if (mysqli_query($conn, $sqle)) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sqle . "<br>" . mysqli_error($conn);}




mysqli_close($conn);
include('Data_Base_connection.php');


$sqle = "UPDATE gpio set  function_gpio='$function_gpio1' , state_gpio ='réservé' , table_gpio='$name_table' WHERE  num_gpio='$num_gpio1'";
if (mysqli_query($conn, $sqle)) {
    echo " record updated  successfully <br>";
} 
else {
    echo "Error: " . $sqle . "<br>" . mysqli_error($conn);}
mysqli_close($conn);

include('Data_Base_connection.php');


$sqle = "UPDATE gpio set  function_gpio='$function_gpio2' , state_gpio ='réservé' , table_gpio='$name_table' WHERE  num_gpio='$num_gpio2'";
if (mysqli_query($conn, $sqle)) {
    echo " record updated  successfully <br>";
} 
else {
    echo "Error: " . $sqle . "<br>" . mysqli_error($conn);}
mysqli_close($conn);


include('Data_Base_connection.php');


$sqle = "UPDATE $name_table SET  User_Desactivator='.'";
if (mysqli_query($conn, $sqle)) {
    echo " Table updated  successfully <br>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
mysqli_close($conn);

$name=name();	
$day=date('m-d-y');
$time= date('H:i:s');
	include('historique_user.php');
	$act="Creation Object : ".$name_table."";
	
	insert_user_historique($name,$act,$day,$time,$rapport);

}
//create_table_windows('my window',15,'True','7','5','out','out');









?>
