

<?php



function delete_user_email($email){
include('Data_Base_connection.php');
$sql = "DELETE FROM users WHERE email_adresse_user='$email'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);


}

function block_user_email($email){
include('Data_Base_connection.php');
$sql = "UPDATE users SET blocked='True' WHERE email_adresse_user='$email'";

if (mysqli_query($conn, $sql)) {

} else {
}

mysqli_close($conn);


}
function update_user_email($email){
include('Data_Base_connection2.php');

$sql1 = "SELECT * FROM users WHERE email_adresse_user ='$email'";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);
$email=$r['email_adresse_user'];
$nom_user=$r['nom_user'];
$password_user=$r['password_user'];
$blocked=$r['$blocked'];
$save_pwd=$r['save_pwd'];
$country=$r['country'];
$img=$r['image_user'];
$num_tel=$r['num_tel_user'];

}
echo"<p> New Name : </p>";
echo"<input type='text' name='new_name' id='new_name' placeholder='$nom_user'><br>";
echo"<p> New Tel : </p>";
echo"<input type='text' name='new_tel' id='new_tel' placeholder='$num_tel'><br>";
echo"<p> New Password : </p>";
echo"<input type='text' name='new_password' id='new_password' placeholder='$password_user'><br>";

}

function view_profile_name($name){
include('Data_Base_connection2.php');

$sql1 = "SELECT * FROM $name ";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
echo"<table>";
echo"<tr>";
echo"<th>Action </th>
<th>Date</th>
<th>Time</th>
<th>Report</th>";
echo"</tr>";
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);
echo" <tr>";
echo "<td>"; echo $r['Action_user']; echo"</td>";
echo "<td>"; echo $r['Date_action']; echo"</td>";
echo "<td>"; echo $r['Time_action']; echo"</td>";
echo "<td>"; echo $r['Reppor_action']; echo"</td>";

echo"</tr>";

}
echo"</table>";
}

function view_email_historique_name($name){

include('Data_Base_connection2.php');

$sql1 = "SELECT * FROM Emails WHERE User_sender='$name' ";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
echo"<table>";
echo"<tr>";
echo"<th>Day </th>
<th>Time</th>
<th>Email Subject</th>
<th>Message</th>";
echo"</tr>";
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);
echo" <tr>";
echo "<td>"; echo $r['Day_send']; echo"</td>";
echo "<td>"; echo $r['Time_send']; echo"</td>";
echo "<td>"; echo $r['Objet_email']; echo"</td>";
echo "<td>"; echo $r['msg_email']; echo"</td>";

echo"</tr>";

}
echo"</table>";
}












function updatee_user_email($nom_user,$new_name,$new_email,$new_tel,$new_pass){
include('Data_Base_connection.php');

$sql = "UPDATE users SET nom_user='$new_name' , email_adresse_user='$new_email' , num_tel_user='$new_tel' , password_user='$new_pass' WHERE nom_user='$nom_user'";

if (mysqli_query($conn, $sql)) {
} 
else {
    echo "Error updating record: " . mysqli_error($conn);
}

$sql1="RENAME TABLE $nom_user TO $new_name";
if (mysqli_query($conn, $sql1)) {
} else {
   // echo "Error updating Table: " . mysqli_error($conn);
}
mysqli_close($conn);
}

//updatee_user_email(sedki,fif,'111@gmail.com','1111','1111');





?>
