<?
$login = $_GET["login"]; 
$password = $_GET["password"];

$jsonLogin = json_encode($login);
$jsonPassword = json_encode($password);


$decodedLogin = json_decode($jsonLogin);
$decodedPassword = json_decode($jsonPassword);
echo $decodedLogin ; echo  "\n"; echo $decodedPassword;
?>