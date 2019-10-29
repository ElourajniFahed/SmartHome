<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}



mysqli_close($conn);

include('navbar1.php');
mysqli_close($conn);


include('Data_Base_connection.php');

$msg_error="";
$usernamee=$_POST['usernamee'];
$psw=$_POST['psw'];
$conpsw=$_POST['conpsw'];
$usermail=$_POST['usermail'];
$country=$_POST['country'];
$type_user=$_POST['type_user'];
echo $type_user;
$usernum_tel=$_POST['usernum_tel'];
$normal='normal';
$OFF='OFF';
$False='False';
$img='http://www.iconskid.com/images/19/office-men-icons-images-19510.png';


$verif_usernamee='';
$verif_psw='';
$verif_conpsw='';
$verif_usermail='';
$verif_type_user='';
$verif_country='';
$verif_usernum_tel='';

function test_user($usernamee,$nem){ if ($usernamee!=""){echo $usernamee;} }
function test_email($usermail){ if ($usermail!=""){echo $usermail;} }
function test_tel($usernum_tel){ if ($usernum_tel!=""){echo $usernum_tel;} }
function test_psw($psw){ if ($psw!=""){echo $psw;} }
function test_conpsw($conpsw){ if ($conpsw!=""){echo $conpsw;}}


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*if(isset($_FILES['img_profile'])=== true){
move_uploaded_file($_FILES['img_profile']['tmp_name'],"profile/images/".$FILES['img_profile']['name']);
$img=$FILES['img_profile']['name'];
}*/
$file=$_FILES['image']['tmp_name'];// temporary directory where the image is stock
echo $file;
if(!isset($file)){echo "please select image";}
else{
$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name=addslashes($_FILES['image']['name']);
$image_size=getimagesize($_FILES['image']['tmp_name']);
echo $image ; 
if($image_size==FALSE){echo " that's not an image";}
$img=$image;
echo $img;
}







	if(($usernamee=="") ){$verif_usernamee="You must enter the user name"; }
	if(($psw=="") ){$verif_psw="You must enter a password";}
	if(($conpsw=="") ){$verif_conpsw="You must confirm you'r password";}
	if(($usermail=="") ){$verif_usermail="You must enter user Email";}
	if(($usernum_tel=="") ){$verif_usernum_tel="You must enter user phone number";}

	if($country=="choose a country"){$verif_country="";}

if(($usernamee!="") or ($psw!="") or ($conpsw!="") or ($usermail!="") or ($country!="Choose A Country") or ($usernum_tel!="")){

		include('userinformation.php');
		if(name_exist($usernamee)=='True'){$verif_usernamee="This name is already used ";$msg_error="User informations are rong";}
		if(email_exist($usermail)=='True'){$verif_usermail="This Email is already used ";$msg_error="User informations are rong";}
		if(tel_exist($usernum_tel)=='True'){$verif_usernum_tel="This Phone number is already used ";$msg_error="User informations are rong";}
		if($psw != $conpsw){ $verif_conpsw="Password an Confirm Password must be the same ";$msg_error="User informations are rong";}}

if(($verif_usernamee=="") and ($verif_psw=="") and ($verif_conpsw=="") and ($verif_usermail=="") and ($verif_usernum_tel=="")){
mysqli_close($conn);

include('Data_Base_connection.php');
$sql = "CREATE TABLE $usernamee (
code_action INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Action_user VARCHAR(30) ,
Date_action VARCHAR(30),
Time_action VARCHAR(30),
Reppor_action VARCHAR(30)
)";

if (mysqli_query($conn, $sql)) {
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
include('Data_Base_connection.php');
$sqlw = "INSERT INTO users VALUES  ('' , '$usernamee' , '$psw' , '$type_user' ,'$False' , '$OFF' , '$False' , '$usermail' , '$img' , '$country', '$usernum_tel')";

							if (mysqli_query($conn, $sqlw)) {} 
							else {echo "Error: " . $sqlw . "<br>" . mysqli_error($conn);}
echo"user created successfully";

		    }	


echo"<p>$msg_error</p>";


?>
<style type="text/css">
    .wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

#country{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

</style>
<body>
<form role="form" id='Profill' name="Profill" method="POST" action="" enctype='multipart/form-data'>

<div class="container">
    <div class="row">
        <section>
        <div class="wizard">
            <h1>Create New Acount</h1>
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <ul><h3>Genral Informations</h3>
			<p> Share client </p>
	
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>User Information</h3>
                       		 <label><b>Username</b></label>
   			 <input type="text" placeholder="Enter Username" name="usernamee" id="usernamee" value=<?php test_user($usernamee); ?> >
			<p style="color:red;"><?php echo $verif_usernamee; ?></p>

    			<label><b>Password</b></label>
    			<input type="password" placeholder="Enter Password" name="psw" id="psw" value=<?php test_psw($psw);?> >
			<p style="color:red;"><?php echo $verif_psw; ?></p>

			<label><b>Confirmation Password</b></label>
			<input type="password" placeholder="Confirmation Password" name="conpsw" id="conpsw" value=<?php test_conpsw($conpsw) ?>>
			<p style="color:red;"><?php echo $verif_conpsw; ?></p>
			


			<label><b>Mail adresse</b></label>
			<input type="text" placeholder="@" name="usermail" id="usermail" value=<?php test_email($usermail); ?> >
			<p style="color:red;"><?php echo $verif_usermail; ?></p>
			

			<label><b>Phone Number</b></label>
			<input type="text" placeholder="(Country code)"  name="usernum_tel" id="usernum_tel" value=<?php test_tel($usernum_tel) ?> >
			<p style="color:red;"><?php echo $verif_usernum_tel; ?></p>
			
			<label><b>User Type</b></label><br>

                        <select id="country" name="type_user" style="width:20%;" >
      			<option value="normal">normal</option>
      			<option value="technician">technicien</option>
      			</select> <br>


			<label><b>Country</b></label><br>

			<select id="country" name="country" >
      			<option value="australia">Australia</option>
      			<option value="canada">Canada</option>
      			<option value="usa">USA</option>
			<option value="Tunisa">Tunisia</option>
      			<option value="France">France</option>
      			<option value="Spain">Spain</option>
    			</select> <br>

			<p style="color:red;"><?php echo $verif_country; ?></p>


			<ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><input type="button" class="btn btn-primary next-step" onclick="test_champ()" value="next"></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Choose a Profil Image</h3>
			<input type='file' name='image'>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">next</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete steps</h3>
                        <p>You have successfully completed every steps.</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
			    <li><input type="submit" class="btn btn-primary" value="submit"></li>
                        </ul>
			                            

                    </div>
                    <div class="clearfix"></div>
                </div>
            
        </div>
    </section>
   </div>
</div>
</form>
<script type="text/javascript">
    
    $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});



function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

function submiting(form){
document.getElementById("Profill").action = form; 
document.getElementById("Profill").submit();

}


function test_champ(){


}
</script>
</body>
</html>
