<?php

$request = "";

//initialise the request variable

$param[username] = "abcdef"; 

//this is the username of our TM4B account

$param[password] = "12345"; 

//this is the password of our TM4B account

$param[msg] = "This is sample message."; 

//this is the message that we want to send

$param[to] = "21650029540"; 

//these are the recipients of the message

$param[from] = "MyCompany";

//this is our sender if 

$param[route] = "frst"; 

//we want to send the message via first class 

$param[sim] = "yes"; 

//we are only simulating a broadcast

foreach($param as $key=>$val) 

//traverse through each member of the param array 

{ 

$request.= $key."=".urlencode($val); 

//we have to urlencode the values

$request.= "&";

//append the ampersand (&) sign after each paramter/value pair

}

$request = substr($request, 0, strlen($request)-1); 

//remove the final ampersand (&) sign from the request 

/*This will produce the following request:username=abcdef&password=12345&
msg=This+is+sample+message.&to=447768254545%7C447956219273%
7C447771514662&from=MyCompany&route=frst&sim=yes */





//First prepare the info that relates to the connection 

$host = "tm4b.com"; 

//although you can use an ip address, it is easier to just use tm4b.com 

$request_length = strlen($request); 

// when we post the header, we have to also include it's length 

$script = "/client/api/send.php"; $method = "POST"; 

//Replace with "GET" if required. 

if($method=="GET") $script .= "?$request"; 

//Appends the request if "GET" is being used. 

//Now comes the header which we are going to post. This is where our messages details will be sent over. 

$header = "$method 

$script HTTP/1.1rn". 

//"Host: $hostrn". "User-Agent: HTTP/1.1rn". "Content-Type: application/x-www-form-urlencodedrn". "Content-Length: $request_lengthrn". "Connection: closernrn". "$requestrn"; 

//Now we open up the connection 

$socket = @fsockopen($host, 80, $errno, $errstr); 

if ($socket) //if its open, then... 

{ fputs($socket, $header); 

// send the details over 

while(!feof($socket)) $output[] = fgets($socket); 

     //get the results 

    fclose($socket); 

} 

//print_r($output); 

//the message id's will be kept in one of the $output values
?>