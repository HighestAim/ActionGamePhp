<?php
include 'model/sendJsone.php';

	$db = new PDO($params['ActionGameDB'],
		$params[''],
		$params['']);



	/*$url = 'https://example/json/exam.php'//url receive into
	$jsondata = file_get_contents($url);
	$json = json_decode($jsondata,true);
	*/

	$login = $_GET["login"]; 
	$password = $_GET["password"];
	$name = $_GET["name"];

//first registration
function first_registration($login,$password,$name){

	$sql_1 = "SELECT login,password,name FROM User";
	$stmt_1 = db->query($sql_1);
	$obj_1 = $stmt_1->fetch(PDO::FETCH_CLASS,'USER');

	$decodedPassword = json_decode($password);
	if($login!=null && $decodedPassword!=null && $name !=null){
		$bool = false;
				foreach ($obj_1 as $user1) {
					if ($user1-> login != $login && $user1-> password != $decodedPassword && $user1-> name) {
						bool = true;
					}
				}

			if ($bool == true) {
				$query_user = "INSERT INTO USER(login,password,name) VALUES($login,$password,$name)";///DELETE & UPDATE
						//add level coin crystle point level score friend
						//$query_Mark = "INSERT INTO Mark() VALUES($level,$score)";
						$result = $db->exec($query_user);
							if ($result === false) {
								# code...
							}
							else{
								$json_data = array ('login'=>$login,'password'=>$password,"name"=>$name));
								$url = '';
								setdJson($json_data,$url);
								return true;
							}	
			}
			else{
				return false;
			}
		
	}
	else{
		return false;
	}

}

	$coin = $_GET["coin"];
	$crystal = $_GET["crystal"];
	$point = $_GET["point"];

function add_crystal_coin_point($login,$password){

	$sql_1 = "SELECT login,password FROM User";
	$stmt_1 = db->query($sql_1);
	$obj_1 = $stmt_1->fetch(PDO::FETCH_CLASS,'USER');

	$decodedPassword = json_decode($password);

	if($login!=null && $decodedPassword!=null){

			$bool = false;
				foreach ($obj_1 as $user1) {
					if ($user1-> login == $login && $user1-> password == $decodedPassword) {
						bool = true;
					}
				}
			if($bool == true){
				// query add coin,crystal,point
				$result = $db->exec($query_Curency);

				if ($result === false) {
					# code...
				}
				else{
						//return value
					}	
			}

	}
}


function add_level_score($login,$password){

}


function  getPoint($login,$password)){

	$sql_1 = "SELECT login,password FROM User";
	$stmt_1 = db->query($sql_1);
	$obj_1 = $stmt_1->fetch(PDO::FETCH_CLASS,'USER');

		$decodedPassword = json_decode($password);

		if($login!=null && $decodedPassword!=null){
			$bool = false;
			foreach ($obj_1 as $user1) {
					if ($user1-> login == $login && $user1-> password == $decodedPassword) {
						bool = true;
					}
				}
			if ($bool == true) {
					//query getPoit
				$result = $db->exec($query_Curency);
					if ($result === false){
						# code...
					}
					else{
						$sql_query_point = "SELECT point FROM Currency";
						$stmt_point = db->query($sql_query_point);
						$obj_point = $stmt_point->fetch(PDO::FETCH_CLASS,'Currency');

						$json_data = array ('point'=>$point);
						$url = '';
						setdJson($json_data,$url);
						return true;
					}	
			}
			else{
				echo "login and password not found";
				return false;
			}

		}
		else{
			echo "login or password not correct";
			return false;
		}
}

function getCoin($login,$password)){

	$sql_1 = "SELECT login,password FROM User";
	$stmt_1 = db->query($sql_1);
	$obj_1 = $stmt_1->fetch(PDO::FETCH_CLASS,'USER');

	$decodedPassword = json_decode($password);

		if($login!=null && $decodedPassword!=null){
			$bool = false;
			foreach ($obj_1 as $user1) {
					if ($user1-> login == $login && $user1-> password == $decodedPassword) {
						bool = true;
					}
				}
			if ($bool == true) {
				//get Coin
				$result = $db->exec($query_Curency);
					if ($result === false){
						# code...
					}
					else{
						$sql_coin = "SELECT coin FROM Currency";
						$stmt_coin = db->query($sql_coin);
						$obj_coin = $stmt_coin->fetch(PDO::FETCH_CLASS,'Currency');//for Select

						$json_data = array ('point'=>$point);
						$url = '';
						setdJson($json_data,$url);
						return true;
					}	
			}
			else{
				echo "login and password not found";
				return false;
			}

		}
		else{
			echo "login or password not correct";
			return false;
		}

}
function getCrystle($login,$password)){

	$sql_1 = "SELECT login,password FROM User";
	$stmt_1 = db->query($sql_1);
	$obj_1 = $stmt_1->fetch(PDO::FETCH_CLASS,'USER');

		$decodedPassword = json_decode($password);

		if($login!=null && $decodedPassword!=null){
			$bool = false;
			foreach ($obj_1 as $user1) {
					if ($user1-> login == $login && $user1-> password == $decodedPassword) {
						bool = true;
					}
				}
			if ($bool == true) {
				//get Coin
				$result = $db->exec($query_Curency);
					if ($result === false){
						# code...
					}
					else{
						$sql_crystle = "SELECT crystal FROM Currency";
						$stmt_crystle = db->query($sql_crystle);
						$obj_crystle = $stmt_crystle->fetch(PDO::FETCH_CLASS,'Currency');

						$json_data = array ('point'=>$point);
						$url = '';
						setdJson($json_data,$url);
						return true;
					}	
			}
			else{
				echo "login and password not found";
				return false;
			}

		}
		else{
			echo "login or password not correct";
			return false;
		}

}



	
	

$arr = array("login"=>$login, "password"=>$password);

    $jsonArray = json_encode($arr);

    echo $jsonArray;
?>

