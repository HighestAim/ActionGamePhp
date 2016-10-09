<?php

$json_data = array ('login'=>"alik-arm",'password'=>"alikarm"));
$jsonEncode = json_encode($json_data);

				$url = 'http://example.com/api/JSON/create';//url send to
			//Initiate cURL.
				$ch = curl_init($url);
			//Tell cURL that we want to send a POST request.
				curl_setopt($ch, CURLOPT_POST, 1);
	 
				//Attach our encoded JSON string to the POST fields.
				curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonEncode);
				 
				//Set the content type to application/json
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
				 
				//Execute the request
				$result = curl_exec($ch);

?>