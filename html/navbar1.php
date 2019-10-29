<!DOCTYPE html>
<html lang="en">
<head>
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
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
.cadre {
      padding: 5 5 15px 5;
      border: none;
      border-radius: 0;
      width: 50%;
      height:50%;
      padding-right: 5%;
    padding-left:20%;
     padding-top: 5%;
     padding-bottom: 5%;
    text-align:center;
    
    text-align:center;
  }
  .thumbnail p {
      margin-top: 15px;
      color: white;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color:#000000	!important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  #house_photo{
    width: 10%;
    height:10%;
  }
  #record_butoon{
    width: 50%;
    height:100%;
    border-radius: 50%;

  }
#smartwaves{
width: 50%;
    height:100%;
    border-radius: 100%;
}
#listehover : hover{
background-color:#FFF8DC; 

}


table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    width:10%;

}

tr:hover{background-color:#f5f5f5;} 



 
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
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

.buttonOFF {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
    border-radius: 50%;
    width: 100px;
    height: 100px;
}

.buttonOFF:hover {
    background-color: #f44336;
    color: white;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    border-radius: 50%;

}
.sidenav {
    height: 100%;

    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
	margin-top:10%;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
#navbarbtn{
      background-color: white;
      color: white;
      border-radius: 0;
      transition: .2s;
}
#navbarbtn:hover{
  border: 1px solid #333;
      background-color:#f1f1f1 ;
      color: black;
}

  
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>
<?php
include('confurmation.php');
coeur_confirmer();
?>




<!-- ***************************** Nav Bar*********************************************-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img id="house_photo" class="img-responsive" src="photos\house_photo.png"><br>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">

        <li><a href="index.php#myPage">HOME</a></li>
        <li><a href="index.php#SOUND_CONTROL">SOUND CONTROL </a></li>
        <li><a href="index.php#MANUAL_CONTROL">MANUAL CONTROL</a></li>
        <li><a href="home_statics.php#">HOUSE STATIC</a></li>
        <li><a href="email.php">CONTACT</a></li>
	

	<li class="dropdown"> 
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
	<?php  	include('userinformations.php');
		 $user_type=type(); 
		if($user_type=='administrateur'){
		echo"<li><input type='button' onclick='afficher_creat_profile()' class='btn btn-primary' value='Create New User Acount' style='width:100%;  text-align: left;'></li>";
		echo"<li><input type='button' onclick='afficher_liste_users()' class='btn btn-primary'  value='View Users' style='width:100%;  text-align: left;'></li>";

		}
		if($user_type=='technician'){
		echo"<li><input type='button' onclick='afficher_object()' class='btn btn-primary' value='View Object' style='width:100%;  text-align: left;'></li>";
		echo"<li><input type='button' onclick='add_object()' class='btn btn-primary'  value='Add Object' style='width:100%;  text-align: left;'></li>";
		


		
		}
		?>
          <li><a id ="listehover" href="#">Team</a></li>
          <li><a id ="listehover" href="#">Blog</a></li>
          <li><a id ="listehover" href="#">About US</a></li>
        </ul>
      </li>
<li class="dropdown"> 
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Acount
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
	  <li><a id ="listehover" href="#"><?php  $user_image=image(); echo"<img src=$user_image style='witdh:50px; height:50px; border-radius: 50px; border: 2px solid black; float:right;'>";?></a></li>
          <li><a id ="listehover" href="#"><?php   $user_adresse_mail=adresse_mail(); echo $user_adresse_mail;?></a></li>

	  <li><a id ="listehover" href="user_profil.php">View Profile</a></li>
	  <li><a id ="listehover" href="configuration_profil.php">Configuration</a></li>
          <li><a id ="listehover" href="logout.php">Log out <img  class="img-responsive" style="witdh:20px; height:20px;"src="http://iconmaker.net/gd/makefg.php?i=icons/Application/Power-Off.png"></a></li>
        </ul>
      </li>
	
	   

        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>

      </ul>
    </div>
  </div>
</nav>
<!-- ////////////////////// Nav Bar///////////////////////////////////////-->
<!-- ***************************** Nav Bar*********************************************-->
<br><br><br>


