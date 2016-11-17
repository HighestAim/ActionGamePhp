<?php
	$sql = "SELECT id,name,email FROM users";//db query

	$db = new PDO($params['db.com'],
		$params['db.user'],
		$params['db.pass']);

	$stmt = db->query($sql);

	$obj = $stmt->fetch(PDO::FETCH_OBJ);//for Select

	echo $obj -> id. "\n";
	echo $obj -> name. "\n";
	echo $obj -> email. "\n";


	$sql_2 = "INSERT INTO users(name,email) VALUES('jon','john@smith.com')";///DELETE & UPDATE
	$result = $db->exec($sql_2);

	if ($result === false) {
		# code...
	}
	
?>