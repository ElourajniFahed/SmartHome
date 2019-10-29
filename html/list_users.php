<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}

include('navbar1.php');
echo"<style>
input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;

}
input[type=number] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;

}
input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
#new_country{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}


</style>";

include('usermanipulation.php');
$t="False";
mysqli_close($conn);

include('Data_Base_connection2.php');
$last_name=$_POST['last_name'];
$last_email=$_POST['last_email'];
$last_num_tel=$_POST['last_num_tel'];

$sql1 = "SELECT * FROM users";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
$ch="";
for($i=0;$i<$n1;$i++)
{$r=mysql_fetch_array($res1);
$email=$r['email_adresse_user'];
$nom_user=$r['nom_user'];
$pass=$r['password_user'];
$country=$r['country'];
$num_tel_user=$r['num_tel_user'];


if ((isset($_POST['name'.$i])) and (isset($_POST['options']))){


$t="True";
if ($_POST['options']=='Delete'){ mysqli_close($conn);delete_user_email($email);}
if ($_POST['options']=='Update'){ 
echo"<p style='color:red;'>You must fill in all the boxes</p> ";

echo"<center><br>";
echo"<input type='text' name='last_name' id='last_name' value='$nom_user' hidden>";
echo"<input type='text' name='last_email' id='last_email' value='$email' hidden>";
echo"<input type='number' name='last_num_tel' id='last_num_tel' value='$num_tel_user' hidden>";

echo"<p> New Name : </p><br>";

echo"<input type='text' name='new_name' id='new_name' value='$nom_user'><br>";
echo"<p> New Email :   </p>";
echo"<input type='text' name='new_email' id='new_email' value='$email'><br>";
echo"<p> New Phone Number : </p>";
echo"<input type='number' name='new_tel' id='new_tel' value='$num_tel_user'><br>";
echo"<p> New Password : </p>";
echo"<input type='text' name='new_pass' id='new_pass' value='$pass'><br>";
echo"<p> Confirm Password : </p>";
echo"<input type='text' name='new_confirm_pass' id='new_confirm_pass' value=''><br>";

echo"<input type='submit' class='btn btn-block' style='width:100px;'value='Confirm'>";

echo"</center>";


}



if ($_POST['options']=='Block'){mysqli_close($conn);block_user_email($email);}


}
}
$new_name=$_POST['new_name'];
$new_email=$_POST['new_email'];
$new_tel=$_POST['new_tel'];
$new_pass=$_POST['new_pass'];
$new_confirm_pass=$_POST['new_confirm_pass'];
// Verification si ilya des valeurs existe deja :p si ontrouve une valeur existe deja laors c'est une ereur


$existe_mail=email_exist($new_email);
$existe_name=name_exist($new_name);
$exist_tel=tel_exist($new_tel);
//
//
if($new_confirm_pass !=$new_pass){echo" Check You'r Password'";}

elseif((($existe_name=='True')and ($new_name!=$last_name)) or (($existe_mail=='True')and($last_email!=$new_email)) or (($exist_tel=='True') and ($new_tel!=$last_num_tel))){
if(($existe_name=='True')and ($new_name!=$last_name)){echo"<p style='color:red;'>This User name is already exist please choose another one   <br><p>";}
if(($existe_mail=='True')and($last_email!=$new_email)){echo"<p style='color:red;'>This Email Adress is already exist please choose another one   <br><p>"; }
if(($exist_tel=='True') and ($new_tel!=$last_num_tel)){echo"<p style='color:red;'>This Phone Number is already exist please choose another one  <br><p>";}

}
elseif(($new_confirm_pass !='') and ($new_name !='') and ($new_email !='') and ($new_tel !='') and ($new_pass !='')){
//echo $last_name;
//echo $last_email;
$new_name=split(" ",$new_name);
$new_name=implode("_",$new_name);
updatee_user_email($last_name,$new_name,$new_email,$new_tel,$new_pass);
echo "User Updated Successfully";
/*echo $new_name ;
echo $new_email;
echo $new_tel ;
echo $new_pass;
echo $new_confirm_pass;*/
}
elseif(($new_confirm_pass =='') or ($new_name =='') or ($new_email =='') or ($new_tel =='') or ($new_pass =='')){
}
if(($_POST['options']!='') and ($t=="False")){
echo"<p> You must choose at leaste one acount</p>";}

//
if(($_POST['options']!='Update') or(($_POST['options']=='Update') and ($t=="False"))){

if ((isset($_POST['name'.$i])) and (isset($_POST['options']))){}

mysqli_close($conn);

include('Data_Base_connection2.php');
$sql1 = "SELECT * FROM users";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);
echo"<br><br><select id='options' name='options' style=' width: 10%; margin-top: 5%;padding: 12px 20px; margin: 8px 0; box-sizing: border-box;margin-left:15% ;' >
      			<option value='Delete'>Delete</option>
      			<option value='Update'>Update</option>
			<option value='Block'>Block</option>
      			
    			</select>
<input type='submit' class='btn btn-primary' style='width:100px; margin-left:5%;'value='Confirm'>



<br><br> ";


echo"<div class='liste_table_users'>";
echo"<div class='table-responsive'>";
echo"<table class='table' id='liste_table_users'>";
  echo"<tr>";
    echo"<th>Configuration</th>";
    echo"<th>Photo</th>";
    echo"<th>User Name</th>";
    echo"<th>User Type</th>";
echo"<th>Blocked!</th>";
    echo"<th>User Email Adresse</th>";
    echo"<th style='width:15%';>User Country</th>";
    echo"<th>User Phone Number</th>";
    echo"</tr>";

for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
if($r['type_user']!='administrateur'){
$iden='name'.$i;
$img=$r['image_user'];
echo"<tr>";
echo"<td> <input type='checkbox' name='$iden' id='$iden'>" ; echo"</td>";
echo"<td>";echo"<img src=$img style='witdh:50px; height:50px; border-radius: 50px; border: 2px solid black; float:left;'>"; echo"</td>";
echo"<td>"; echo $r['nom_user']; echo"</td>";
echo"<td>"; echo $r['type_user']; echo"</td>";
echo"<td>"; echo $r['blocked']; echo"</td>";
echo"<td>"; echo $r['email_adresse_user']; echo"</td>";
echo"<td>"; echo $r['country']; echo"</td>";
echo"<td>"; echo $r['num_tel_user']; echo"</td>";
echo"</tr>";
}
}

echo"</table>";
echo"</div>";
echo"</div>";
mysqli_close($conn);
}

?>
