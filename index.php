<?php
$login = $_GET["login"]; 
$password = $_GET["password"];

$arr = array("login"=>$login, "password"=>$password);

    $jsonArray = json_encode($arr);

    echo $jsonArray;
?>

