<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php
include('navbar1.php');
mysqli_close($conn);
include('Data_Base_connection2');
$new_name=$_POST['new_name'];
$new_pass=$_POST['new_pass'];
$new_conpass=$_POST['new_conpass'];
$new_email=$_POST['new_email'];
$new_country=$_POST['new_country'];
$new_tel=$_POST['new_tel'];
//image

/*$file=$_FILES['image']['tmp_name'];// temporary directory where the image is stock

if(!isset($file)){echo "please select image";}
else{
$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name=addslashes($_FILES['image']['name']);
$image_size=getimagesize($_FILES['image']['tmp_name']);
if($image_size==FALSE){echo " that's not an image";}
echo $image;
echo $file;
}
*/

if(($new_tel=="") and ($new_country=="") and ($new_name=="") and ($new_pass=="") and ($new_conpass=="") and ($new_email=="") ){
$remarque=" You have to fill a case in order to configurate it "; 			}
elseif(name_exist($new_email)=='True'){$verif_new_email='This email is already exist';}
elseif(tel_exist($new_tel)=='True'){$verif_new_tel='This Phone number is already exist';}
elseif(tel_exist($new_name)=='True'){$verif_new_name='This name is already exist';}
else{
if($new_name!=''){
$new_name=split(" ",$new_name);
$new_name=implode("_",$new_name);

$oldname=name();
$sql= "RENAME TABLE $oldname TO $new_name" ;
$res=mysql_query($sql) or die (mysql_error ());
}



 update_user(adresse_mail(),$new_name,$new_pass,$new_email,$new_tel,$new_country);

}
?>
</head>
<style>
input[type=text] {
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

</style>
<body>
<form id="configuration_profil" name="configuration_profil" method="post" action="">
<div id="contact" class="container">
<center>
<h3>Configuration Profil</h3><br>
<p style="color:red;"><?php echo $remarque;?></p>
<p> New Name : </p>
<input type="text" name="new_name" id="new_name" placeholder="New user name"><br>
<p style="color:red;"><?php echo $verif_new_name;?></p>

<p> New Password : </p>
<input type="text" name="new_pass" id="new_pass" placeholder="New password"><br>
<p> Confirm Password : </p>
<input type="text" name="new_conpass" id="new_conpass" placeholder="Confirm password"><br>
<p> New Email : </p>
<input type="text" name="new_email" id="new_email" placeholder="New Email"><br>
<p style="color:red;"><?php echo $verif_new_email;?></p>

<p> New Phone Number : </p>
<input type="text" name="new_tel" id="new_tel" placeholder="New Phone Number"><br>
<p style="color:red;"><?php echo $verif_new_tel;?></p>

<p> New Country : </p><br>
<select id="new_country" name="new_country" >
      			<option value="australia">Australia</option>
      			<option value="canada">Canada</option>
      			<option value="usa">USA</option>
			<option value="Tunisa">Tunisia</option>
      			<option value="France">France</option>
      			<option value="Spain">Spain</option>
    			</select> <br>

<p> New Image : </p>
<input type='file' name='image'><br>
<input type="submit" class="btn btn-block" style="width:100px;"value="Confirm">
</center>
</div>


</fomr>
</body>
</html>

