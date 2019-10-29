
<?php
include('verif_url_with_login.php');
$conneter=coonect_or_not();
if($conneter=='False'){ header('Location: connection_required.php');}

include('navbar.php');
$action_eff=$_POST['action'];
$local_eff=$_POST['local'];
$description_eff=$_POST['descriptio'];
$max_ff=$_POST['max'];
$gpio2_ff=$_POST['gpio2'];
$gpio1_ff=$_POST['gpio1'];
$table_ff=$_POST['table'];
$msg_speak=$_POST['msg'];

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="photos\maxresdefault.jpg" alt="Much more free time" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Time</h3>
          <p>Much more free time</p>
        </div>      
      </div>

      <div class="item">
        <img src="photos\objets-connectés.jpg" alt="Easy life" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Easy life</h3>
          <p>Make your life easier</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="photos\imagecontrollewifi.jpg" alt="Feel comfortable" width="1200" height="700">
       <div class="carousel-caption">
          <h3>Feel comfortable</h3>
          <p>Avoid stress and depression</p>
        </div>  
          
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>


<!-- Container (The Band Section) -->
<div id="SOUND_CONTROL" class="container text-center">
  <h3>SOUND CONTROL</h3>
  <p><em>Press To Start Recording</em></p> <br>
  
  <center><span style="cursor:pointer"><img src="photos\microphone-icon (1).png"class="img-responsive"  id="microphone_icone" onclick="startconverting();"></span></center>
  <br><br><br><br>
  <center> <input type="button" value="Click here" name="go_totolights" id="go_tolights" class="btn" onclick="startconverting();"></center>

  <p id="sound_record"><em>Sound recorded</em></p> <br>  
  <input type="text" id="text_record" name="text_record"><br> 
<?php 


echo"msg:<input type='text' id='msg' value= '$msg_speak' name='msg'><br>";
echo"local:<input type='text' id='localll' value= '$local_eff' name='localll'><br>";
echo"description:<input type='text' id='descriptionnn' value= '$description_eff' name='descriptionnn'><br>";
echo"gpio1:<input type='text' id='gpio111' value= '$gpio1_ff' name='gpio111'><br>";
echo"gpio2:<input type='text' id='gpio222' value= '$gpio2_ff' name='gpio222'><br>";
echo"table:<input type='text' id='tableee' value= '$table_ff' name='tableee'><br>";
echo"pourcentage:<input type='text' id='maxee' value= '$max_ff' name='maxee'><br>";

echo"action:<input type='text' id='actionnn' value= '$action_eff' name='actionnn'><br>";


 ?>
 

    
  </div>
</div>

<!-- Container (Manually controlle) -->
<div id="MANUAL_CONTROL" class="bg-1">
  <div class="container">
    <h3 class="text-center">MANUAL CONTROL</h3>
    <p class="text-center">Control your house manually with simple click.<br> Please choose from the menu below</p>
        
    <br><div class="row text-center">
      <div class="col-sm-4">
        <div><center>

        <a href="Conrole_Lights.php"><img style="cursor:pointer" src="http://icon-icons.com/icons2/1148/PNG/512/1486503726-bright-idea-lightbulb-solution-bulb_81246.png" alt="lights" class="img-responsive" width="300" height="400" ></a>
          <p><strong>Lights</strong></p>
          <p>Control your house lights from here</p>
          <input type="button" value="Click here" name="go_totolights" id="go_tolights" class="btn" onclick="navigate_to_lights()">
        
<center></div>
      </div>
      <br><div class="col-sm-4">
        <div><center>
        </center></div>
      </div>
      
 <div class="col-sm-4">
        <div><center>
         <a href="Control_Doors.php"> <img style="cursor:pointer" src="http://www.fbcrosemount.org/wp-content/uploads/2016/02/door-knocking-icon.png" class="img-responsive" alt="doors" width="300" height="400"></a>
          <p><strong>Doors</strong></p>
          <p>Control your house doors from here</p>
          <input type="button" value="Click here" name="go_totodoors" id="go_todoors" class="btn" onclick="navigate_to_doors()">
        </center></div>
      </div>

    </div>
<br><div class="col-sm-4">
        <div><center>
          <a href="Control_Other.php"><img style="cursor:pointer" src="http://www.breakermaster.com/wp-content/uploads/2016/07/plug-512.png" style="float:left;"class="img-responsive" alt="doors" width="300px" height="400px"></a>
          <p><strong>Power Supply Objects</strong></p>
          <p>Control your Other Objects from here</p>
          <input type="button" value="Click here" name="go_totodoors" id="go_todoors" class="btn" onclick="navigate_to_others()">
        </center></div>
      </div>
<br><div class="col-sm-4">

        <div ><center>
        </center></div>
      </div>
<div class="col-sm-4">

        <div ><center>
	<a href="Control_Windows.php"><img style="cursor:pointer" src="http://hoosierroof.com/wp-content/uploads/2015/05/Siding-icon-01-01-01.png" alt="windows" class="img-responsive" width="300" height="400"></a>
	
          <p><strong>Windows</strong></p>
          <center><p>Control your house windows from here</p>
          <input type="button" value="Click here" name="go_towindows" id="go_towindows" class="btn" onclick="navigate_to_windows()">
        </center></div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
              <input type="number" class="form-control" id="psw" placeholder="How many?">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
              <button type="submit" class="btn btn-block">Pay 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
    <h3 class="text-center">Creators </h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Smart Waves Technologies</a></li>
    <li><a data-toggle="tab" href="#menu1">Mouhamed Sedki</a></li>
    <li><a data-toggle="tab" href="#menu2">Ouragini Fahd</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Smart Waves Technologies</h2>
      <p>Smart Waves Technologies is a research and development company in embedded electronics, data processing and industrial computing.</p>
	<img src="photos/smartwaves.png" id="smartwaves" class="img-responsive"  >
      <a href="http://www.swatek.tn/" target="_blank" >http://www.swatek.tn/ </a>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2> Mouhamed Sedki</h2>
      <p>ISSAT_SO , From ksour i ssef</p>

    </div>
    <div id="menu2" class="tab-pane fade">
       <h2>Ouragini Fahd</h2>
      <p>ISSAT_SO , From kalaa kebira</p>
    </div>
  </div>


</div>






<!-- Add Google Maps -->
<div id="googleMap"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(41.878114, -87.629798);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: http://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Smart House</p> 
</footer>


</form>
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

        <script>
/////////////////////////////////////////////////////// NAVIGATION/////////////////////
function navigate_to_lights(){
 document.getElementById("f1").action = "Conrole_Lights.php"; 
 document.getElementById("f1").submit();

}
function navigate_to_doors(){
document.getElementById("f1").action = "Control_Doors.php"; 
 document.getElementById("f1").submit();
}

function navigate_to_windows(){
document.getElementById("f1").action = "Control_Windows.php"; 
 document.getElementById("f1").submit();
}

function navigate_to_other(){
document.getElementById("f1").action = "Control_Other.php"; 
 document.getElementById("f1").submit();
}

// ******* speech recogntiytion speech to text    
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     
var sp = document.getElementById('sp');
var words
var j 
var sound_record= document.getElementById('sound_record');
var text_record= document.getElementById('text_record');
        // tester si le browser est compatible avec la bib speech recognition 
        function startconverting(){

                if('webkitSpeechRecognition' in window){
                var speechRecognizer=new webkitSpeechRecognition();
                speechRecognizer.continuous=false; // si cette valeu est a true donc il reste recorde jusqu'a 60s 
                //mai si elle est a false de que il comprend que l'utilisateur stop recorde il stop
                speechRecognizer.interimResults=true;//pour afiicher le text de reconnainssane lors de son traitement 
		speechRecognizer.lang ="en-GB"; //"ar-QA";

                speechRecognizer.start();

                var finalTranscripts='';
                speechRecognizer.onresult=function(event){
                var interimTranscripts ='' ;
                for(var i=event.resultIndex;i<event.results.length;i++){


                var transcript = event.results[i][0].transcript;
                transcript.replace("\n","<br>")
                if(event.results[i].isFinal){

                finalTranscripts += transcript ;
                speechRecognizer.stop();

		/**/




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			
			words=transcript.split(' ');// cree un tableau contient tous les mots de parole de l'utilisateur


		var i=0;
		var test_how='';
		var test_doign='';
		var test_you='';
		
		while (words[i]!=null) {
		if(words[i]=="how"){test_how='True';}
		if(words[i]=="doing"){test_doign='True';}
		if(words[i]=="you"){test_you='True';}
		i=i+1;}

		/*if(finalTranscripts=="turn the language into Arabic"){
			speechRecognizer.lang ="ar-QA";
									}		


		if(finalTranscripts=="turn the language into English"){
                        speechRecognizer.lang ="en-GB";
                                                                        }*/


		 if((finalTranscripts=="what is your name") || (finalTranscripts=="what's your name")){
                        say("My name is Cara and you ! "); }
		

		else if(words[0]=="hi" || words[0]=="hello" || words[0]=="welcome"){
                        say(words[0] + "  Sir"); }
		


		else if(finalTranscripts=="Cara"){
                        say("YES Sir"); }    
		else if(finalTranscripts=="stop speaking"){
                        
				stop();}



		else if(finalTranscripts=="who is your father"){
                        say("my father is Ouragjini Fahd "); }

		/*else if(finalTranscripts=="how are you doing today"){
                        say("doing fine thanks for asking what about you"); }*/
	
		

		if((test_how=='True') && (test_doign=='True')){
		if(test_you=='True'){say("doing fine thanks for asking what about you");}
		else{say(" how m i supposed to know Sir. I am just a machine not a psychiatrist  ");}
		}





else if((words[0]=="I'm") && (words[1]=="doing") ){
			if((words[2]=="fine")||(words[2]=="great")){say("I'm glad to hear that")}
			else{say("don't worry everything will be okay");}
		}


		else if((words[0]=="my") && (words[1]=="name") ){say("Nice to meet you " + words[words.length -1 ]);}

		else if(words[0]=='say'){
			say(finalTranscripts.replace('say',''));
			}                

		else if(words[0]=='search'){
			var w =window ;
			
			transcript=transcript.replace('point','.')// lor de la recherche pour eviter que le navigateur implique la mot point on le remplacer par .
			w.open('www.google.com/search?q=' + transcript.replace('search',''));
						}
		else{
			if(finalTranscripts!=''){
 			document.getElementById("f1").action = "Base_de_connaissance.php";
                        document.getElementById("f1").submit();
			
						}
		 }
			//msg();
			
}

		
                else{
			 interimTranscripts +=transcript ;
                }


  }
                sound_record.innerHTML=finalTranscripts + '<span style="color:#999">' + interimTranscripts + '</span>';
                document.f1.text_record.value=finalTranscripts + interimTranscripts ;

                };



                speechRecognizer.onerror=function(event){



                    };      


                                        }
        else{ sound_record.innerHTML="Your browser is not supported"}
                
}

/*     
var sec=5 ;
function countdown(){
if (sec<1){return true;}
else{sec--;}}		
   
function msg(){
request_message=false;
		var message=""
		var to="";
		var i=0;
		var nbrmotssend=0;
		var nbrmotsmessage=0;
		 // nbrmots= nombre de mots il faut etre equivalent a 2 il faut que le deux mots send and message sont present
		while (words[i]!=null) {
		if(words[i]=="send"){nbrmotssend=nbrmotssend+1;}
		if(words[i]=="message"){nbrmotsmessage=nbrmotsmessage+1;}
		if((nbrmotssend>0)&&(nbrmotsmessage>0)){request_message=true; say("ok sir , the message about what !") ;break;}			break;}
		i++;}
}
*/




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





//text to speech 
var voiceMap=[]
function loadvoice(){
                var voices = speechSynthesis.getVoices();
                for(var i = 0;i<voices.length;i++){
                var voice = voices[i];
                var option=document.createElement('option');
                option.value=voice.name;
                option.innerHTML=voice.name;
                voiceMap[voice.name]=voice;
};
};
window.speechSynthesis.onvoiceschanged= function(e){
loadvoice();}
var sp = document.getElementById('sp');
var  rate ="0.7";
var pitch="5";
var volume="5";
var avatar="Anna";
var lang='en-US';
function speak(){
        var msg = new SpeechSynthesisUtterance(); 
                msg.rate=rate
                msg.Pitch=pitch
                msg.volume="1";
                msg.voice=voiceMap[avatar];
                msg.text=sp.value;
                window.speechSynthesis.speak(msg);}

function stop(){
 window.speechSynthesis.cancel();
}
function say(ch){
        var msg = new SpeechSynthesisUtterance(); 
                msg.rate=rate
                msg.Pitch=pitch
                msg.volume="1";
		msg.lang =lang;

                msg.voice=voiceMap[avatar];
                msg.text=ch;
                window.speechSynthesis.speak(msg);}

function decomposition_text_and_speak(msg){
var j=0;
var r=0;
var ch=" ";
for(x=0;x<msg.length;x++){
if(msg[x]==','){msg[x]='';}
if(msg[x]=='.'){msg[x]='';}
if(msg[x]=="'"){msg[x]='';}


}
if(msg[0]==" "){msg[0]="";}
if(msg[msg.length]==" "){msg[msg.length]="";}

tab=msg.split(' ');
length=tab.length;
//alert(length);
if(length<10){say(msg);}
else{
nbr=length/10;
nbrephrase=(length/10)-((length%10)/10);
nbremot=length%10;
//alert(nbr);
//alert(nbrephrase);
//alert(nbremot);
m=0
n=10
for(nb=0;nb<nbrephrase;nb++){

for(i=m;i<n;i++){
tab[i]=' '+tab[i];
ch =ch.concat(tab[i]);}

say(ch);

ch="";

n=n+10;
m=m+10;
}

if(nbremot!=0){
m=nbrephrase*10;
n=m+nbremot;
for(i=m;i<n;i++){
tab[i]=' '+tab[i];
ch =ch.concat(tab[i]);}

say(ch);


}

}


}
var msg =document.f1.msg.value;
//alert(msg);
/*if(msg!=""){
decomposition_text_and_speak(msg);
}*/
say(msg);

</script>
</body>
</html>

