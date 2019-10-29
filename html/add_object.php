<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <head>
    <title></title>
    <title>Smarty House</title>

</head>
<?php include('navbar1.php');
mysqli_close($conn);

include('Data_Base_connection2.php');
$sql1 = "SELECT * FROM objets";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1);



$obj='';
if(isset($_POST[objet]) ){
$obj= $_POST[objet];
}


$objet_Description=$_POST['objet_Description'];
$optionsauto=$_POST['optionsauto'];
$optionssecur=$_POST['optionssecur'];						
$objec=$_POST['objec']	;			
$gpiofunction_1=$_POST['gpio_function_1'];
$gpio_liste1=$_POST['gpio_liste1'];
$options=$_POST['options'];
$consumption_per_sec=$_POST['consumption_per_sec'];
$gpiofunction_2=$_POST['gpio_function_2'];
$gpio_liste2=$_POST['gpio_liste2'];
$marque=$_POST['marque'];

$verif_marque="";
$verif_gpio_liste="";
$verif_consumption_per_sec="";

/*echo $obj;echo"<br>";
echo $objet_Description; echo"<br>";
echo $gpiofunction_1;echo"<br>";
echo $gpio_liste1; echo"<br>";
echo $options; echo"<br>";
echo $consumption_per_sec;
echo $marque;*/
if($objec=='lights'){
if($objet_Description==""){echo "You must enter the Name of the object";}
elseif($consumption_per_sec==""){echo "You must enter the consumption per seconde for this object";}


elseif($gpio_liste2==$gpio_liste1){$verif_gpio_liste="You must choose two different GPIO";echo $verif_gpio_liste;  }



else{ mysqli_close($conn);
include('creat_table_light.php');
 //create_table_windows($objet_Description,15,$optionsauto,$gpio_liste1,$gpio_liste2,$gpiofunction_1,$gpiofunction_2);

create_table_light($objet_Description,$consumption_per_sec,$gpio_liste1,$gpio_liste2,$gpiofunction_1);
mysqli_close($conn);
}
			}
if($objec=='Doors'){
if($objet_Description==""){echo "You must enter the Name of the object";}
else{
mysqli_close($conn);
include('creat_table_light.php');

create_table_doors($objet_Description,10,$optionssecur,$gpio_liste1,$gpiofunction_1);
mysqli_close($conn);

}}
if($objec=='windows'){
if($objet_Description==""){echo "You must enter the Name of the object";}

elseif($gpio_liste2==$gpio_liste1){$verif_gpio_liste="You must choose two different GPIO"; echo "You must choose two different GPIO"; }
else{mysqli_close($conn);
include('creat_table_light.php');
 create_table_windows($objet_Description,15,$optionsauto,$gpio_liste1,$gpio_liste2,$gpiofunction_1,$gpiofunction_2);
mysqli_close($conn);

}
}



else{
if(($objec!="") and ($objec!='Doors') and ($objec!='windows') and ($objec!='lights')) {
if($objet_Description==""){echo "You must enter the Name of the object";}
elseif($consumption_per_sec==""){$verif_consumption_per_sec="You must enter the consumption per seconde for this power supply ";}
elseif($marque==""){$verif_marque="You must enter the marque for this power supply "; echo $verif_marque ;}
else{
mysqli_close($conn);
include('creat_table_light.php');

create_table_other($objet_Description,$consumption_per_sec,$optionsauto,$gpio_liste1,gpio_function1,$marque);
mysqli_close($conn);

}

}
}


 ?>
<style type="text/css">
    
    .nav-tabs-dropdown {
  display: none;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.nav-tabs-dropdown:before {
  content: "\e114";
  font-family: 'Glyphicons Halflings';
  position: absolute;
  right: 30px;
}

@media screen and (min-width: 769px) {
  #nav-tabs-wrapper {
    display: block!important;
  }
}
@media screen and (max-width: 768px) {
    .nav-tabs-dropdown {
        display: block;
    }
    #nav-tabs-wrapper {
        display: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        text-align: center;
    }
   .nav-tabs-horizontal {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
   }
    .nav-tabs-horizontal  > li {
        float: none;
    }
    .nav-tabs-horizontal  > li + li {
        margin-left: 2px;
    }
    .nav-tabs-horizontal > li,
    .nav-tabs-horizontal > li > a {
        background: transparent;
        width: 100%;
    } 
    .nav-tabs-horizontal  > li > a {
        border-radius: 4px;
    }
    .nav-tabs-horizontal  > li.active > a,
    .nav-tabs-horizontal  > li.active > a:hover,
    .nav-tabs-horizontal  > li.active > a:focus {
        color: #ffffff;
        background-color: #428bca;
    }
}
tr:hover{background-color:white;} 
td:hover{background-color:#f5f5f5;cursor:pointer;border-radius: 100%;} 

</style>


<body>
<form name='f1' action="" method="POST">
<div class="container">
<center><div style='width:100%;height:50%;    border:20px;'>
<br><br>
     <div class="row">
        <div class="col-sm-12">
            <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Tabs</a>
            <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal">
              <li class="active"><a href="#htab1" data-toggle="tab">Choose Object</a></li>
              <li><a href="#htab2" data-toggle="tab">Description Object</a></li>
              <li><a href="#htab3" data-toggle="tab">Object Informations</a></li>
              <li><a href="#htab4" data-toggle="tab">GPIO</a></li>
              <li><a href="#htab5" data-toggle="tab">Finals Step</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="htab1">
                    <h3>Choose Object</h3>
<?php 
					include('Data_Base_connection2.php');
					$sql1 = "SELECT * FROM objets";
					$res1=mysql_query($sql1) or die (mysql_error ());
					$n1= mysql_num_rows($res1);
					echo"<table cellspacing='3%' border='3' bordercolor='white'><tr>";
					for($i=0;$i<$n1;$i++)
					{echo"<td><center>";
						$r=mysql_fetch_array($res1);
						$image=$r['image_objet'];
						$nom=$r['nom_objet'];
						$description=$r['description_objet'];
						$id='nom'.$i;
						$idra='rad'.$i;
						  echo"<span style='cursor:pointer ;'><img src='$image' name='$nom'  id='img'.$nom.'' style='width:50px; height:50px;'class='img-responsive'  ></span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
						  echo"<p>$description</p> ";

						if($nom==$obj){

						echo"<input type='radio' name='objet' id='$idra' onclick='submit() checked='True' value='$nom'>";}
						else{echo"<input type='radio' name='objet' id='$idra' value='$nom' onclick='submit()'>";}
						echo"</center></td>";
							
									}
						echo"</tr></table>";
						echo"<script> </script>";
						mysqli_close($conn);

					?>
                    </div>






                <div role="tabpanel" class="tab-pane fade" id="htab2">
                    

                </div>








                <div role="tabpanel" class="tab-pane fade in" id="htab3">
                    <h3>Object Information</h3>
<center>
                      <h1 class="" style="font-size:12em;color:#00001a"></h1>
			<?php 
			if($obj=='lights'){echo"
			<br><br><h5><b><p > Light_Description</p></b></h5>
			<input type='text' id='objec' name='objec' value ='$obj' hidden >

			<input type='text' id='Light_Description' name='objet_Description' >
			<br><br><h5><b><p > Light consumption (W)</p></b></h5>
			<input type='text' id='consumption_per_sec' name='consumption_per_sec' > <br>";}
			elseif($obj=='Doors'){echo"
			<br><br><h5><b><p > Door_Description</p></b></h5>
			<input type='text' id='objec' name='objec' value ='$obj' hidden >

			<input type='text' id='Door_Description' name='objet_Description' >
			<br><br><h5><b><p> Door_security_system</p></b></h5>
			<select name='optionssecur'><option slected value='True'>True</option><option value='False'>False</option></select>";}
			elseif($obj=='windows'){echo"
			<br><br><h5><b><p > Window_Description</p></b></h5>
			<input type='text' id='objec' name='objec' value ='$obj' hidden >

			<input type='text' id='Window_Description' name='objet_Description' >
			<br><br><h5><b><p > Opening Automatically </p></b></h5>
			<select name='optionsauto'><option slected value='True'>True</option><option value='False'>False</option></select>";}
			else{echo"
			<br><h5><b><p > Power_Supply_Description</p></b></h5>
			<input type='text' id='objec' name='objec' value ='Other' hidden >

			<input type='text' id='objet_Description' name='objet_Description' >
			<br><h5><b><p > Object consumption (W)</p></b></h5>
			<input type='text' id='consumption_per_sec' name='consumption_per_sec' >
			<br><h5><b><p > Power_Supply Marque</p></b></h5>
			<input type='text' id='marque' name='marque' >
			<br><h5><b><p > Opening Automatically </p></b></h5>
			<select name='optionsauto'><option slected value='True'>True</option><option value='False'>False</option></select>";}
			
			?>
                </div>






 		<div role="tabpanel" class="tab-pane fade" id="htab4">
                    <h3>Choose GPIO</h3>
			
                      			<?php $num_g='Num GPIO';
				if($obj=='windows'){$num_g='Num GPIO UP';}
				echo"<p>"; echo $num_g ; echo"</p><br>";
				include('Data_Base_connection2.php');
					$sql1 = "SELECT * FROM gpio where state_gpio !='réservé'";
					$res1=mysql_query($sql1) or die (mysql_error ());
					$n1= mysql_num_rows($res1);
					if($n1==0){echo "Sorry all the GPIO are rserved ";} 
					elseif($obj!=""){echo"<select id='gpio_liste1' name='gpio_liste1' >";
      			
      			    			

					for($i=0;$i<$n1;$i++)
					{
						$r=mysql_fetch_array($res1);
						$num_gpio=$r['num_gpio'];
						echo"<option value='$num_gpio'>$num_gpio</option>";

					}

					echo"</select><br><br><br><br>";
					
					     
				
			}
if($obj=="windows"){


				echo"<p>Num GPIO Down:</p><br>";

			echo"<select id='gpio_liste2' name='gpio_liste2' >";
      			
      			    			$sql1 = "SELECT * FROM gpio where state_gpio !='réservé'";
					$res1=mysql_query($sql1) or die (mysql_error ());
					$n1= mysql_num_rows($res1);


					for($i=0;$i<$n1;$i++)
					{
						$r=mysql_fetch_array($res1);
						$num_gpio=$r['num_gpio'];
						echo"<option value='$num_gpio'>$num_gpio</option>";

					}

					echo"</select><br>";
					
					     
				
			echo"<br><br><br>
			<p>Function GPIO UP:</p><br>	
			<select id='gpio_function_2' name='gpio_function_2' >
			<option value='output'>output</option>
			<option value='input'>input</option>
			</select>"; }









if($obj=="lights"){


				echo"<p>Num GPIO IN:</p><br>";

			echo"<select id='gpio_liste2' name='gpio_liste2' >";
      			
      			    			$sql1 = "SELECT * FROM gpio where state_gpio !='réservé'";
					$res1=mysql_query($sql1) or die (mysql_error ());
					$n1= mysql_num_rows($res1);


					for($i=0;$i<$n1;$i++)
					{
						$r=mysql_fetch_array($res1);
						$num_gpio=$r['num_gpio'];
						echo"<option value='$num_gpio'>$num_gpio</option>";

					}

					echo"</select><br>";
					
					     
				
			 }






?>
                    
                </div>





                <div role="tabpanel" class="tab-pane fade in" id="htab5">
                    <h3>Final Step</h3>

<center>
			          <input type="submit" value="Create" class="btn btnprimary"  >        

                    </center>



                </div>







            </div>
        </div>
    </div>
</div>    </form>
    <script type="text/javascript">
affiche(){alert('yess');}

function submit(){document.getElementById("f1").submit();}














        $('.nav-tabs-dropdown').each(function(i, elm) {
    
    $(elm).text($(elm).next('ul').find('li.active a').text());
    
});
  
$('.nav-tabs-dropdown').on('click', function(e) {

    e.preventDefault();
    
    $(e.target).toggleClass('open').next('ul').slideToggle();
    
});

$('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function(e) {

    e.preventDefault();
    
    $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());
      
});
    </script>
</body>
</html>