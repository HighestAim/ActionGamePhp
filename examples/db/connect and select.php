<?php
include 'db.php';

$conn = db::connection();


$query = mysqli_query($conn, 'select * from User');
$full_table =  mysqli_fetch_all($query,MYSQLI_NUM);

foreach($full_table as $item)
{
	var_dump( $item) ;
    echo "\n";
}
?>