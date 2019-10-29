<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Smarty House</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style type="text/css">
	/* #####################################################################
   #
   #   Project       : Modal Login with jQuery Effects
   #   Author        : Rodrigo Amarante (rodrigockamarante)
   #   Version       : 1.0
   #   Created       : 07/28/2015
   #   Last Change   : 08/02/2015
   #
   ##################################################################### */
   
@import url(http://fonts.googleapis.com/css?family=Roboto);

* {
    font-family: 'Roboto', sans-serif;
}

#login-modal .modal-dialog {
    width: 350px;
}

#login-modal input[type=text], input[type=password] {
	margin-top: 10px;
}

#div-login-msg,
#div-lost-msg,
#div-register-msg {
    border: 1px solid #dadfe1;
    height: 30px;
    line-height: 28px;
    transition: all ease-in-out 500ms;
}

#div-login-msg.success,
#div-lost-msg.success,
#div-register-msg.success {
    border: 1px solid #68c3a3;
    background-color: #c8f7c5;
}

#div-login-msg.error,
#div-lost-msg.error,
#div-register-msg.error {
    border: 1px solid #eb575b;
    background-color: #ffcad1;
}

#icon-login-msg,
#icon-lost-msg,
#icon-register-msg {
    width: 30px;
    float: left;
    line-height: 28px;
    text-align: center;
    background-color: #dadfe1;
    margin-right: 5px;
    transition: all ease-in-out 500ms;
}

#icon-login-msg.success,
#icon-lost-msg.success,
#icon-register-msg.success {
    background-color: #68c3a3 !important;
}

#icon-login-msg.error,
#icon-lost-msg.error,
#icon-register-msg.error {
    background-color: #eb575b !important;
}

#img_logo {
    max-height: 100px;
    max-width: 100px;
}

/* #########################################
   #    override the bootstrap configs     #
   ######################################### */

.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: .8;
}

.modal-content {
    background-color: #ececec;
    border: 1px solid #bdc3c7;
    border-radius: 0px;
    outline: 0;
}

.modal-header {
    min-height: 16.43px;
    padding: 15px 15px 15px 15px;
    border-bottom: 0px;
}

.modal-body {
    position: relative;
    padding: 5px 15px 5px 15px;
}

.modal-footer {
    padding: 15px 15px 15px 15px;
    text-align: left;
    border-top: 0px;
}

.checkbox {
    margin-bottom: 0px;
}

.btn {
    border-radius: 0px;
}

.btn:focus,
.btn:active:focus,
.btn.active:focus,
.btn.focus,
.btn:active.focus,
.btn.active.focus {
    outline: none;
}

.btn-lg, .btn-group-lg>.btn {
    border-radius: 0px;
}

.btn-link {
    padding: 5px 10px 0px 0px;
    color: #95a5a6;
}

.btn-link:hover, .btn-link:focus {
    color: #2c3e50;
    text-decoration: none;
}

.glyphicon {
    top: 0px;
}

.form-control {
  border-radius: 0px;
}
.fullscreen_bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    background-repeat:repeat;
  }
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 20px;
  margin-left: 370px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu ul.list-group{
  margin-bottom: 0;
  list-style:none;
}
div.bhoechie-tab-menu ul.list-group>a{
  margin-bottom: 0;
  text-align:left;
}
div.bhoechie-tab-menu ul.list-group>a .glyphicon,
div.bhoechie-tab-menu ul.list-group>a .fa {
  color: #00001a;
}
div.bhoechie-tab-menu ul.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu ul.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu ul.list-group>a.active,
div.bhoechie-tab-menu ul.list-group>a.active .glyphicon,
div.bhoechie-tab-menu ul.list-group>a.active .fa{
  background-color: #004c99;
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu ul.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}



#gpio_liste{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
#gpio_function{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;

#submit:hover{
background-color: 	#808080;

}


</style>
<body>

<div id="fullscreen_bg" class="fullscreen_bg"/>




<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <ul class="list-group">
                <a href="#" class="list-group-item active">
                  <br/><br/><i class="glyphicon glyphicon-home"></i> Home<br/><br/>
                  </a>
                <a href="#" class="list-group-item ">
                  <br/><br/><i class="glyphicon glyphicon-user"></i> ADD Object <br/><br/>
                </a>
                <a href="#" class="list-group-item" onclick=" affiche()">
                  <br/><br/><h4 class="glyphicon glyphicon-th-list"></h4> Object Informations <br/><br/>
                </a>
                <a href="#" class="list-group-item">
                  <br/><br/><h4 class="glyphicon glyphicon-link"></h4> GPIO Configuration <br/><br/>
                </a>
                <a href="#" class="list-group-item">
                  <br/><br/><h4 class=""></h4> Final Step <br/><br/>
                </a>
                
              </ul>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->

                <div class="bhoechie-tab-content active">
                                       
		<center>
                      <h1 class="glyphicon glyphicon-wrench" style="font-size:14em;color:#00001a"></h1>
                      <h2 style="margin-top: 0;color:#00001a">Welcome</h2>
                      <h3 style="margin-top: 0;color:#00001a">Manager HomePage</h3>
                    </center>

                </div>
                

                <div class="bhoechie-tab-content">
			<form name="f1" id="f1" action="" method="post">
                    <center><h3><p ><b>Choose an object</b></p></h3>
					<?php 
					echo"<script> var j=0; </script>";
					include('Data_Base_connection2.php');
					$sql1 = "SELECT * FROM objets";
					$res1=mysql_query($sql1) or die (mysql_error ());
					$n1= mysql_num_rows($res1);
					for($i=0;$i<$n1;$i++)
					{
						$r=mysql_fetch_array($res1);
						$image=$r['image_objet'];
						$nom=$r['nom_objet'];
						$description=$r['description_objet'];
						$id='nom'.$i;
						  echo"<span style='cursor:pointer ;'><img src='$image' name='$nom'  id='img'.$nom.'' style='width:50px; height:50px;'class='img-responsive'  ></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
						  echo"<p>$description</p> ";
							echo"<input type='text' value='$id' name='$id' id='$id'>";

						if($nom=='lights'){

						echo"<input type='radio' name='objet' id=$id.n-i checked='True' value='$id'>";}
						else{echo"<input type='radio' name='objet' id=$id.n-i onclick='affiche()'>";}
						echo"<script> j=j+1; </script>";
							
					}
						echo"<script> </script>";
						mysqli_close($conn);

					?>
                    </center>
			</form>
                </div>
		
                <div id="Object Information" class="bhoechie-tab-content">
<form name="f1" id="f1" action="" method="post">
                    <center>
                      <h1 class="" style="font-size:12em;color:#00001a"></h1>
			<?php $obj='other';
			if($obj=='light'){echo"
			<br><br><h5><b><p style='margin-top: 30%;'> Light_Description</p></b></h5>
			<input type='text' id='Light_Description' name='Light_Description' >
			<br><br><h5><b><p style='margin-top: 30%;'> Light consumption (W)</p></b></h5>
			<input type='text' id='consumption_per_sec' name='consumption_per_sec' >";}
			if($obj=='door'){echo"
			<br><br><h5><b><p style='margin-top: 30%;'> Door_Description</p></b></h5>
			<input type='text' id='Door_Description' name='Door_Description' >
			<br><br><h5><b><p style='margin-top: 30%;'> Door_security_system</p></b></h5>
			<select name='securityy'><option slected value='True'>True</option><option value='False'>False</option></select>";}
			if($obj=='window'){echo"
			<br><br><h5><b><p style='margin-top: 30%;'> Window_Description</p></b></h5>
			<input type='text' id='Window_Description' name='Window_Description' >
			<br><br><h5><b><p style='margin-top: 30%;'> Opening Automatically </p></b></h5>
			<select name='opening'><option slected value='True'>True</option><option value='False'>False</option></select>";}
			if($obj=='other'){echo"
			<br><h5><b><p style='margin-top: 20%;'> Object_Description</p></b></h5>
			<input type='text' id='Objet_Description' name='Objet_Description' >
			<br><h5><b><p style='margin-top: 20%;'> Object consumption (W)</p></b></h5>
			<input type='text' id='consumption_per_sec' name='consumption_per_sec' >
			<br><h5><b><p style='margin-top: 20%;'> Object Marque</p></b></h5>
			<input type='text' id='marque' name='marque' >
			<br><h5><b><p style='margin-top: 20%;'> Opening Automatically </p></b></h5>
			<select name='opening'><option slected value='True'>True</option><option value='False'>False</option></select>";}
			?>
                    </center>
</form>
                </div>
                <div class="bhoechie-tab-content">
<form name="f1" id="f1" action="" method="post">
                    <center>
                    <center><h3><p><b>Choose an GPIO </b></p></h3>
			<p style='margin-top: 30%;'>Num GPIO:</p>
                      			<?php 
				include('Data_Base_connection2.php');
					$sql1 = "SELECT * FROM gpio where state_gpio !='réservé'";
					$res1=mysql_query($sql1) or die (mysql_error ());
					$n1= mysql_num_rows($res1);
					if($n1==0){echo "Sorry all the GPIO are rserved ";} 
					else{echo"<select id='gpio_liste' name='gpio_liste' >";
      			
      			    			

					for($i=0;$i<$n1;$i++)
					{
						$r=mysql_fetch_array($res1);
						$num_gpio=$r['num_gpio'];
						echo"<option value='$num_gpio'>$num_gpio</option>";

					}

					echo"</select>";
					     }
				
			?>
			<p style='margin-top: 30%;'>Function GPIO:</p>	
			<select id='gpio_function' name='gpio_function' >
			<option value='output'>output</option>
			<option value='input'>input</option>
			</select>
                    </center>
</form>
                </div>
                <div class="bhoechie-tab-content">
<form name="f1" id="f1" action="add_objetfunction.php" methode="post">
                    <center>
			<span style='cursor:pointer ;'><img src='http://2.bp.blogspot.com/-_LnJKtITTw0/U0c093-WxuI/AAAAAAAAKwA/LU_pkP1RLCE/s1600/submit.png' name='submit'  id='submit' style='width:200px; height:200x;margin-top: 50%;'class='img-responsive' onclick='submitt()' ></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<?php echo"<input type='text' id='objj' name='objj' value='$obj' >";?>

                    </center>
</from>
                </div>
                            </div>

        </div>

  </div>


</div>


    <script type="text/javascript">
    	
function affiche(){var id=j; alert(id);} 
   
$(function() {
    
    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                var $lg_username=$('#login_username').val();
                var $lg_password=$('#login_password').val();
                if ($lg_username == "ERROR") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Login error");
                } else {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", "Login OK");
                }
                return false;
                break;
            case "lost-form":
                var $ls_email=$('#lost_email').val();
                if ($ls_email == "ERROR") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Send error");
                } else {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "success", "glyphicon-ok", "Send OK");
                }
                return false;
                break;
            case "register-form":
                var $rg_username=$('#register_username').val();
                var $rg_email=$('#register_email').val();
                var $rg_password=$('#register_password').val();
                if ($rg_username == "ERROR") {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Register error");
                } else {
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-ok", "Register OK");
                }
                return false;
                break;
            default:
                return false;
        }
        return false;
    });
    
    $('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
    $('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
    $('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
    $('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
    
    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }
    
    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }
    
    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
  		}, $msgShowTime);
    }
});



$(document).ready(function() {
    $("div.bhoechie-tab-menu>ul.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});


function submitt(){
document.getElementById("f1").action="add_objetfunction.php";

document.getElementById("f1").submit();

}
    </script>
</body>
</html>
