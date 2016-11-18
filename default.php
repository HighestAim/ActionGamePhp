<?php

	$login = $_GET["login"]; 
	$password = $_GET["password"];

    if($login != null && $password != null)
    {
        $json_data = array ('login'=>"alik-arm",'password'=>"alikarm");
        $jsonEncode = json_encode($json_data);

        echo $jsonEncode;        
    }

?>