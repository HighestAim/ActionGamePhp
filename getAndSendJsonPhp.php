<?php 
include 'db.php';
include 'connect and select.php';
// connect to db

		$url = 'https://example/json/exam.php'//url receive into
		$jsondata = file_get_contents($url);
	//$jsondata = file_get_contents("movies.json");
	//get query 
	$json = json_decode($jsondata,true);
	//echo $json['movies'][1]['title'];
	

	//search in database
	foreach($full_table as $item)
{
	if($item[login] == $json->login && $item[pass] == $json->password){
		//convert simple types and objects to json format
		
		//$json_data = array ('id'=>1,'name'=>"ivan",'country'=>'Russia',"office"=>array("yandex"," management"));
		$json_data = array('id'=>$item[id],'name'=>$item[name],'score'=>$item[score]);
		$jsonEncode = json_encode($json_data);
		//Change db value
			
		//return json 
		1.variant
			$client = new Zend_Http_Client($uri);
			$client->setRawData($jsonEncode, 'application/json')->request('GET');
		2.variant
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
	}
	else{
		//add in db
		//return true or false
		//return json
		//....
	}
}

/*
1.We setup the URL that we want to send our JSON to.
2.We initiated cURL using curl_init.
3.We setup a PHP array containing sample data.
4.We encoded our PHP array into a JSON string by using the function json_encode.
5.We specified that we were sending a POST request by setting the CURLOPT_POST option to 1.
6.We attached our JSON data using the CURLOPT_POSTFIELDS option.
7.We set the content-type of our request to application/json. It is extremely important to note that you should always use “application/json”, not “text/json”. Simply put, using “text/json” is incorrect!
7.Finally, we used the function curl_exec to execute our POST request. If you want to check for errors at this stage, then you should check out my article on error handling with cURL.
*/

?>