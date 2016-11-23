<?php

/*
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
*/
?>