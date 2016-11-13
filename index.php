<?php

$sql_1 = "SELECT login,password,name FROM User";
$sql_2 = "SELECT level,score FROM Mark";
$sql_3 = "SELECT coin,crystal,point FROM Currency";

	$db = new PDO($params['ActionGameDB'],
		$params[''],
		$params['']);

	$stmt_1 = db->query($sql_1);
	$stmt_2 = db->query($sql_2);
	$stmt_3 = db->query($sql_3);

	$obj_1 = $stmt_1->fetch(PDO::FETCH_CLASS,'USER');//for Select
	$obj_2 = $stmt_2->fetch(PDO::FETCH_CLASS,'Mark');//for Select
	$obj_3 = $stmt_3->fetch(PDO::FETCH_CLASS,'Currency');//for Select


	$login = $_GET["login"]; 
	$password = $_GET["password"];
	
if($login!=null && $password!=null){
		
		$name = $_GET["name"];
		$bool = false;

			if($name != null){	
				foreach ($obj_1 as $user) {
					if($user-> name == $name) {
						$bool = true;	
					}
				}
			}
			else
			{
				echo "ERROR name is null";
			}

		$coin = $_GET["coin"];
			if($coin != null){
				
			}
		$crystal = $_GET["crystal"];
			if($crystal != null){
				
			}
		$point = $_GET["point"];
			if($point != null){
				
			}
		$level = $_GET["level"];
			if($level != null){
				
			}
		$score = $_GET["score"];
			if($score != null){
				
			}

				foreach ($obj_1 as $user1) {
					if ($user1-> login != $login && $user1-> password != $password ) {
						$sql = "INSERT INTO USER(login,password) VALUES($login,$password)";///DELETE & UPDATE
						$result = $db->exec($sql);
						if ($result === false) {
							# code...
						}
						return;
					}
					else{
						$sql = "UPDATE USER(login,password) Set login = $login,password = $password";
						$result = $db->exec($sql);
						//.................
					}
			}
		
}
	
	

$arr = array("login"=>$login, "password"=>$password);

    $jsonArray = json_encode($arr);

    echo $jsonArray;
?>

