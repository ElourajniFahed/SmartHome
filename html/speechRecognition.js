(function($){
	var $btn = $('#btn');
	var $result= $('#result')
	var words=null;
	if('webkitSpeechRecognition' in window){// verifier que cet element ce trouve dans l'objet window 
		// pour verifier si il est accessible par le navigateur
		var recognition=new webkitSpeechRecognition();
		recognition.lang='en-US';
		recognition.continuous =false; // si elle est a true continuer a recorder jusqu'a 60 s méme si l'utilisateur stop recording
		recognition.interimResult=false;// afficher les traitement fait sur le msg lors de la reconnaissance 
		$btn.click(function(e){
			e.preventDefault();
			$btn.removeClass('btn-primary');
			 // lorsque on click sur le bouton btn il devien inaxisible 
			recognition.start();
		});

		recognition.onresult= function(event){ // retourner la resultat
			$result.text('');//
			for(var i=event.resultIndex,i<event.results.length;i++){ // event.resultIndex( par defaut en commence par 0) se trouve dans le console
					var transcript=event.results[i][0].transcript;

					if(event.results[i].isFinal){
						$result.text(transcript);
						recognition.stop();
						$btn.addClass('btn-primary');
						$words=transcript.split(' ');// cree un tableau contient tous les mots de parole de l'utilisateur
						if($words[0]=='rechercher'){
							transcript=transcript.replace('point','.')// lor de la recherche pour eviter que le navigateur implique la mot point on le remplacer par .
							window.location.replace('https://ww.google.com/search?q=' + transcript.replace('rechercher',' '));
						}
						//************************** trace la destination ********
						if($words[0]=='show'){
							transcript.replace('show','')
							path=transcript.split('destination');
							var request={
								origine	 : path[0],
								destination : path[1],
								travelMode : google.maps.DirectionsTravelMode.DRIVING }
							var directionsService = new google.maps.DirectionsService();
							directionsService.route(request,function(response,status){
								if(status=google.maps.	DirectionsStatus.OK){
									direction.setDirections(response);
								}
							})
							}	
						}
						return true // pour ne faire pas les itertions innessessaire
					}
					else{
						$result.text($('#result').text() + transcript);

					}
			}

				consol.log(event);

		}  
	}	
	else{
		$btn.hide();
	}
}) (jQuery);
