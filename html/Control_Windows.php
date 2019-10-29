<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}
include('navbar1.php');?>
<!DOCTYPE html>
<html lang="en">
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
  .thumbnail p {
      margin-top: 15px;
      color: #555;
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
      background-color: red !important;
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


  </style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<form name="f1" id="f1" action="Test_control_window.php" method="post">
<?php
 
include('Data_Base_connection.php');






$sql = "SELECT * FROM windows";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
$description_window=$row['description_window'];
$name=$row['table_reference'];          
$description_window_on=$row['description_window']."_ON";
$description_window_off=$row['description_window']."_OFF";

$state=$row['state_window'];

$value_on=$row['table_reference']."_ON";
$value_off=$row['table_reference']."_OFF";



echo"<div id=$description_window>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

   <center><p><h3> $description_window </h3></p>
   <br>";
   if($state=='OFF'){
	
   echo"<button id=$description_window.'_on' name='description_window' value='$value_on' class='button buttonON'  >OPEN</button>";}
    if($state=='ON'){
   echo"<button id=description_window.'_off' name='description_window' value='$value_off' class='button buttonOFF' >CLOSE</button>";}
  echo" </center>

    </div>";
}}
echo"</form>";

?>
<br><br>
<!-- Footer -->
<footer class='text-center'>
  <a class='up-arrow' href='#myPage' data-toggle='tooltip' title='TO TOP'>
    <span class='glyphicon glyphicon-chevron-up'></span>
  </a><br><br>
  <p>Smart House </p> 
</footer>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	function submit1(){
	document.getElementById("f1").action = "Control_Doores.php"; 
			document.getElementById("f1").submit();

		}
        <script>




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})



</script>
</body>
</html>

