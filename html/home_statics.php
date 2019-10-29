

<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}
include('navbar1.php');


echo"<style>
    body{margin:40px;}
      .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
	text-align:center;
      }
      .btn-circle.btn-lg {
        width: 100px;
        height: 100px;
        padding: 13px 13px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 50px;
text-align:center;
      }
 .buttonON {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
    border-radius: 50%;
    width: 100px;
    height: 100px;
}

.buttonON:hover {
    background-color: #008CBA;
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    border-radius: 50%;

}
</style>";
echo"<div id='auto'>";

$obb=$_POST['obb'];
if($obb==''){
$obb='lights';}

if((isset($_POST['options']) and ($obb!= ''))){
$obb=$_POST['options'];}


if(($obb=='lights') or ($obb=='nothing')){

include('Data_Base_connection2.php');
$sql = "SELECT * FROM lights ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res);
for($i=0;$i<$n;$i++)
{$rs=mysql_fetch_array($res);
$table=$rs['table_reference'];
$objet=$rs['table_reference'];
}


$ob=$_POST['objet_light'];
if($ob !=''){$objet=$ob;}


$sql1 = "SELECT * FROM lights WHERE description_light='$objet'";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);

$table=$r['table_reference'];}

mysqli_close($conn);

include('Data_Base_connection2.php');

echo"<div id='mySidenav' class='sidenav'>";
$sql1 = "SELECT * FROM lights";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1); 


  echo"<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";

echo"<form name='f1' method='post' action=''>";

for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$light=$r['description_light'];
 
 echo"<button class='btn btn-link' style='width:100%;' name='objet_light' value='$light'  style='font-size: 15px;' onclick='submit()'>"; echo $light ; echo"</p>";}
echo"<input type='text' name='obb' value='lights' hidden>";
  
echo"</form>";
echo"</div>";

echo"<h5><span style='font-size:15px; color:black; cursor:pointer;' onclick='openNav()'>&#9776; Select display mode</span></h5>";
echo"<form name='f2' method='post' action=''>";

echo"<div id='main'>";

echo"<br><br><select id='options' name='options' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:15% ;' >
      			<option value='nothing'></option>
      			<option value='lights'>Lights</option>
      			<option value='Doors'>Doors</option>
      			<option value='Windows'>Windows</option>
			<option value='Others'>Others Electronique Object</option>
      			
    			</select><button class='btn btn-primary' onclick='submit()' value='Submit' style='margin-left: 5% ;' >Submit</button>";
  echo"</form>";



include('historique_light.php');

echo"<br>";
echo"<div id='$light'>";

showobjet_lights($table);
echo"</div>";

echo"</div>";}


if($obb=='Doors'){

include('Data_Base_connection2.php');
$sql = "SELECT * FROM Doors ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res);
for($i=0;$i<$n;$i++)
{$rs=mysql_fetch_array($res);
$table=$rs['table_reference'];
$objet=$rs['table_reference'];
}

$ob=$_POST['objet_type'];
if($ob !=''){$objet=$ob;}



$sql1 = "SELECT * FROM Doors WHERE description_door='$objet'";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);

$table=$r['table_reference'];}

mysqli_close($conn);

include('Data_Base_connection2.php');

echo"<div id='mySidenav' class='sidenav'>";
$sql1 = "SELECT * FROM Doors";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1); 


  echo"<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";

echo"<form name='f1' method='post' action=''>";

for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$doore=$r['description_door'];
 
 echo"<button class='btn btn-link' style='width:100%;' name='objet_type' value='$doore'  style='font-size: 15px;' onclick='submit()'>"; echo $doore ; echo"</p>";}
echo"<input type='text' name='obb' value='Doors' hidden>";
 
echo"</form>";

echo"</div>";

echo"<h5><span style='font-size:15px; color:black; cursor:pointer;' onclick='openNav()'>&#9776; Select display mode</span></h5>";
echo"<form name='f2' method='post' action=''>";

echo"<div id='main'>";

echo"<br><br><select id='options' name='options' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:15% ;' >
      			<option value='nothing'></option>
      			<option value='lights'>Lights</option>
      			<option value='Doors'>Doors</option>
      			<option value='Windows'>Windows</option>
			<option value='Others'>Others Electronique Object</option>
      			
    			</select><button class='btn btn-primary' onclick='submit()' value='Submit' style='margin-left: 5% ;' >Submit</button>";
 echo"</form>";

include('historique_light.php');

echo"<br>";
echo"<div id='$light'>";

showobjet_door($table);
echo"</div>";

echo"</div>";}





if($obb=='Windows'){
include('Data_Base_connection2.php');
$sql = "SELECT * FROM windows ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res);
for($i=0;$i<$n;$i++)
{$rs=mysql_fetch_array($res);
$table=$rs['table_reference'];
$objet=$rs['table_reference'];
}

$ob=$_POST['objet_type'];
if($ob !=''){$objet=$ob;}



$sql1 = "SELECT * FROM windows WHERE description_window='$objet'";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);

$table=$r['table_reference'];}

mysqli_close($conn);

include('Data_Base_connection2.php');

echo"<div id='mySidenav' class='sidenav'>";
$sql1 = "SELECT * FROM windows";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1); 


  echo"<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";

echo"<form name='f1' method='post' action=''>";

for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$window=$r['description_window'];
 
 echo"<button class='btn btn-link' style='width:100%;' name='objet_type' value='$window'  style='font-size: 15px;' onclick='submit()'>"; echo $window ; echo"</p>";}
echo"<input type='text' name='obb' value='Windows' hidden>";
 
echo"</form>";

echo"</div>";
echo"<h5><span style='font-size:15px; color:black; cursor:pointer;' onclick='openNav()'>&#9776; Select display mode</span></h5>";
echo"<form name='f2' method='post' action=''>";

echo"<div id='main'>";

echo"<br><br><select id='options' name='options' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:15% ;' >
      			<option value='nothing'></option>
      			<option value='lights'>Lights</option>
      			<option value='Doors'>Doors</option>
      			<option value='Windows'>Windows</option>
			<option value='Others'>Others Electronique Object</option>
      			
    			</select><button class='btn btn-primary' onclick='submit()' value='Submit' style='margin-left: 5% ;' >Submit</button>";
 echo"</form>";
include('historique_light.php');

echo"<br>";
echo"<div id='$light'>";

showobjet_window($table);
echo"</div>";

echo"</div>";}







if($obb=='Others'){
include('Data_Base_connection2.php');
$sql = "SELECT * FROM Other_objects ";
$res=mysql_query($sql) or die (mysql_error ());
$n= mysql_num_rows($res);
for($i=0;$i<$n;$i++)
{$rs=mysql_fetch_array($res);
$table=$rs['table_reference'];
$objet=$rs['table_reference'];
}
$ob=$_POST['objet_type'];
if($ob !=''){$objet=$ob;}



$sql1 = "SELECT * FROM Other_objects WHERE description_objet='$objet'";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);

$table=$r['table_reference'];}

mysqli_close($conn);

include('Data_Base_connection2.php');

echo"<div id='mySidenav' class='sidenav'>";
$sql1 = "SELECT * FROM Other_objects";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1); 


  echo"<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";

echo"<form name='f1' method='post' action=''>";

for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$objet=$r['description_objet'];
 
 echo"<button class='btn btn-link' style='width:100%;' name='objet_type' value='$objet'  style='font-size: 15px;' onclick='submit()'>"; echo $objet; echo"</p>";}
echo"<input type='text' name='obb' value='Others' hidden>";
 
 echo"</form>";

echo"</div>";

echo"<h5><span style='font-size:15px; color:black; cursor:pointer;' onclick='openNav()'>&#9776; Select display mode</span></h5>";
echo"<form name='f2' method='post' action=''>";

echo"<div id='main'>";
echo"<br><br><select id='options' name='options' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:15% ;' >
      			<option value='nothing'></option>
      			<option value='lights'>Lights</option>
      			<option value='Doors'>Doors</option>
      			<option value='Windows'>Windows</option>
			<option value='Others'>Others Electronique Object</option>
      			
    			</select><button class='btn btn-primary' onclick='submit()' value='Submit' style='margin-left: 5% ;' >Submit</button>";

echo"</form>";
include('historique_light.php');

echo"<br>";
echo"<div id='$light'>";
showobjet_other($table);
echo"</div>";

echo"</div>";}

?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


<script>
      /*function showTime(){

          
$(document).ready(function(){
$("#auto").load("home_statics.php").fadeIn("slow");
	return false;
	            

}) 
		
          

        
      }

setInterval(function(){showTime();},3000)*/

function submit(){
document.getElementById('f1').submit();
}
function submit1(){
document.getElementById('f3').submit();
}
</script>
</body>
</html>