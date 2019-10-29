<?php
include('navbar1.php');
mysqli_close($conn);
include('Data_Base_connection2.php');
$sql1 = "SELECT * FROM objets";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
echo"<br><br><select id='options' name='options' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:15% ;' >";

for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$nom_obj=$r['nom_objet'];
      			echo"<option value='$nom_obj' onclick='submit()'>";echo $nom_obj; echo"</option>";
      			}
      			
echo"</select><button class='btn primary' value='Submit' style='margin-left: 5% ;' >Submit</button><br><br> ";

?>
