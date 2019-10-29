
<?php
include('Data_Base_connection2.php');
include('navbar1.php');
echo"<div id='contact' class='container'>";
function coeur($name){





echo"<div id='mySidenav' class='sidenav'>";
$sql1 = "SELECT * FROM lights";
$res1=mysql_query($sql1) or die (mysql_error ());
$n1= mysql_num_rows($res1); 

  echo"<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";
echo"<br>";
for($i=0;$i<$n1;$i++)
{
$r=mysql_fetch_array($res1);
$light=$r['description_light'];
$etat=$r['state_light'];
if($etat=="ON"){
 echo"<a href='$light.php' style='font-size: 15px;'>"; echo $light ; echo"<img src='http://www.pngmart.com/files/1/Light-Bulb-PNG-Image.png' id='light_off_image' style='width: 20%;height: 20%; size:20%; float: right;'>"; echo"</a>";	
}
else{ echo"<a href='$light.php' style='font-size: 15px;'>"; echo $light ;  echo"</a>";	
}

}
 
echo"</div>";

echo"<h5><span style='font-size:15px; color:black; cursor:pointer;' onclick='openNav()'>&#9776; Select display mode</span></h5>";

echo"<div id='main'>";


include('historique_light.php');

echo"<br>";


showobjet_lights($name);


echo"</div>";
}
echo"</div>";
?>


<script type='text/javascript'>
var i=0;
      function showTime(){
       
          i++;
        
          if (i==60){
            document.getElementById("f1").submit();
            i=0;
          }
        
        setTimeout(showTime, 1000);
      }

      showTime();
</script>
</body>
</html>
