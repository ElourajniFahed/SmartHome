<!DOCTYPE html>
<html>
<title>User Confirmation</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('/w3images/onepage_restaurant.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
<?php
echo"
<style>
 body { background-color:black;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
.btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
cursor:pointer;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
</style>
  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black'>
     <center> <h1>Worning</h1></center>
    </div>
    <div class='w3-container'>
	<center><h3><p style='color:black;'>You must Login First</p></h3></center>
		<img src='http://clipart-library.com/images/dc45g9Aoi.gif' align='right' width='30%' height='30%'>

	 <p>You are not allowed to access this page . Please click the button below to log in</p> 
		 <p>Thank you for your comprehension</p><br>

	<p><a href='login.php'><input type='button' class='btn btn-primary' value='Click here to go to the Login page ' style='width:100%;'></a></p>
      </form>
</center>
    </div>
  </div>";
?>
