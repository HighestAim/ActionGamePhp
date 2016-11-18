<?php
include 'importModelEntity.php';

	$login = $_GET["login"]; 
	$password = $_GET["password"];
	$name = $_GET["name"];

 first_registration($login,$password,$name);


//first registration
function first_registration($login,$password,$name){

	$user = User::loadFromDB();
	$db = DB::connect();

$decodedPassword = $password;//temp
//	$decodedPassword = json_decode($password);//Decode from MD5
	if($login!=null && $decodedPassword!=null && $name !=null){
		$Contains = false;
				foreach ($user as $item) {
					if ($item->login == $login) {
						$Contains = true;
					}
				}

			if ($Contains == false){	
						//add level coin crystle point level score friend
						//$query_Mark = "INSERT INTO Mark() VALUES($level,$score)";
						$date = date("Y-m-d");
						$stmt = $db->prepare("INSERT INTO USER(login,password,name,RegDate) VALUES (:login, :password, :name, :regdate)");
						$stmt->bindParam(':login', $login);
						$stmt->bindParam(':password', $password);
						$stmt->bindParam(':name', $name);
						$stmt->bindParam(':regdate', $date);

						$result = $stmt->execute();
							if ($result === false) {
								# code...
								echo "im here";
								echo $result;
								//echo $login.$password.$name;
								//echo "Can't write on base";
							}
							else{
								echo "Embatooo!";
								$json_data = array ('login'=>$login,'password'=>$password,"name"=>$name);
								$jsonEncode = json_encode($json_data);
								echo $jsonEncode;
							}	
			}
			else{
				echo null;
			}
		
	}
	else{
		echo null;
	}

}


function  getIdFromLogin($login){
	$user = User::loadFromDB();
	$id = -1;
	foreach ($user as $item) {
					if ($item->login == $login) {
						$id = $item->id;
					}
				}
		return $id;
} 

/*
	CREATE PROCEDURE GETLASTETCURRENCY (IN USID INT )
BEGIN
SELECT `crystal`,(SELECT c.`coin` FROM `Currency` c WHERE c.`userId` = USID AND c.`coin` is NOT NULL order by c.RegDate desc
LIMIT 1) as coin,(SELECT d.`point` FROM `Currency` d WHERE d.`userId` = USID AND d.`point` is NOT NULL order by d.RegDate desc
LIMIT 1) as point FROM `Currency` WHERE `userId` = USID AND `crystal` is not null order by RegDate desc
LIMIT 1
END



*/



	$coin = $_GET["coin"];
	$cristal = $_GET["crystal"];
	$point = $_GET["point"];
 add_crystal_coin_point($login,$coin,$cristal,$point);
function add_crystal_coin_point($login,$coin,$cristal,$point){
		
		$currency = Currency::loadFromDB();
		$db = DB::connect();



	//$decodedPassword = json_decode($password);

	if($login!=null){

		$userId = getIdFromLogin($login);

			
		if($userId != -1){
				// query add coin,crystal,point
				$date = date("Y-m-d");
						$stmt = $db->prepare("INSERT INTO Currency(coin,crystal,point,RegDate,userid) VALUES (:coin, :crystal, :point, :regdate,:userid)");
						$stmt->bindParam(':coin', $coin);
						$stmt->bindParam(':crystal', $cristal);
						$stmt->bindParam(':point', $point);
						$stmt->bindParam(':regdate', $date);
						$stmt->bindParam(':userid', $userId);

						$result = $stmt->execute();

				if ($result === false) {
					# code...
					echo "im here";
					echo $result;
				}
				else{
						echo "Embatooo!";
						$json_data = array ('login'=>$login,"coin"=>$coin,"crystal"=>$cristal,"point"=>$point);
						$jsonEncode = json_encode($json_data);
						echo $jsonEncode;
					}	
			}

	}
}

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
