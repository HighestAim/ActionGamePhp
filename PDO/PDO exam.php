<?php
	$sql = "SELECT id,name,email FROM users";//db query

	$db = new PDO($params['db.com'],
		$params['db.user'],
		$params['db.pass']);
	
	$stmt = db->query($sql);

	$obj = $stmt->fetch(PDO::FETCH_OBJ)

	echo $obj -> id. "\n";
	echo $obj -> name. "\n";
	echo $obj -> email. "\n";
?>