<?php
//$params = parse_ini_file("config.ini");

//$conn = new PDO($params['db.conn'], $params['db.user'], $params['db.pass']);
$conn = mysqli_connect('127.0.0.1', 'root', '', 'ActionGameDB');
if($conn <= 0)	echo('Unable to connect');

$query = mysqli_query($conn, 'select * from User');
$full_table =  mysqli_fetch_all($query,MYSQLI_NUM);

foreach($full_table as $item)
{
	var_dump( $item) ;
    echo "\n";
}
?>