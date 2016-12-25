<?php
	include 'importModelEntity.php';

	$login = $_GET["login"]; 
	$password = $_GET["password"];
	$name = $_GET["name"];
	$friendLogin = $_GET["friendLogin"];
	$coin = $_GET["coin"];
	$crystal = $_GET["crystal"];
	$point = $_GET["point"];
	$level = $_GET["level"];
	$score = $_GET["score"];

	if($login != null && $password != null && $name != null && $friendLogin != null)
		firstRegistration($login,$password,$name, $friendLogin);
	else if($login != null && $coin != null && $crystal != null && $point != null)
		addCrystalCoinPoint($login,$coin,$crystal,$point);
	else if($login != null && $level != null && $score != null)
		addLevelScore($login,$level,$score);
	else if($login != null && $password != null)
		getAll($login, $password);

function userAutentification($login, $password){
	$conn = db::connect();
	$arrayName = -1;
	$stmt = $conn->query("SELECT id FROM User WHERE login = '$login' AND password = '$password'");
	$stmt->execute();

	$result = $stmt->fetchObject(); 

	return $result->id;	
}

function getAll($login, $password){
	$userId = userAutentification($login, $password);

	if($userId != null)
	{
		$name = User::getAll($userId);

		$mark = Mark::getAll($userId);
		$level = $mark["level"];
		$score = $mark["score"];

		$currency = Currency::getAll($userId);
		$coin = $currency["coin"];
		$crystal = $currency["crystal"];
		$point = $currency["point"];
		
		$json_data = array ('name'=>$name,'level'=>$level,"score"=>$score,"coin"=>$coin, "crystal"=>$crystal, "point"=>$point);
		$jsonEncode = json_encode($json_data);
		echo $jsonEncode;
	}					
}

function firstRegistration($login,$password,$name, $friendLogin){

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
					//echo "im here";
					echo $result;
					//echo $login.$password.$name;
					//echo "Can't write on base";
				}
				else{
					$friendId = getIdFromLogin($friendLogin);
				//	echo $friendId;
					$userId = getIdFromLogin($login);
				//	echo $userId;
					
					if($friendId != -1 && $userId != -1)
						{
							registerFriendId($userId, $friendId);
						}

				//	echo "Embatooo!";
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

function registerFriendId($userId, $friendId){
	$db = DB::connect();

	$date = date("Y-m-d");
	$stmt = $db->prepare("INSERT INTO Friend(regDate, userId, friendId) VALUES (:regDate, :userId, :friendId)");
	$stmt->bindParam(':regDate', $date);
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':friendId', $friendId);

	$result = $stmt->execute();

	if($result === false)
		return -1;
	else
		return $friendId; 
}

function  getIdFromLogin($login){
	$user = User::loadFromDB();
	$id = -1;
	foreach ($user as $item) {
		if ($item->login == $login) {
			$id = $item->id;
		}
	}

	//echo "getIdFromLogin = ".$id;

		return $id;
} 

function addCrystalCoinPoint($login,$coin,$cristal,$point){
		
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
		//			echo "im here";
					echo $result;
				}
				else{
			//			echo "Embatooo!";
						$json_data = array ('login'=>$login,"coin"=>$coin,"crystal"=>$cristal,"point"=>$point);
						$jsonEncode = json_encode($json_data);
						echo $jsonEncode;
					}	
			}

	}
}

function addLevelScore($login,$level,$score){
		
	$mark = Mark::loadFromDB();
	$db = DB::connect();
	//$decodedPassword = json_decode($password);

	if($login!=null){

		$userId = getIdFromLogin($login);

			
		if($userId != -1){
				// query add coin,crystal,point
			$date = date("Y-m-d");

			$stmt = $db->prepare("INSERT INTO Mark(level,score,regDate,userId) VALUES (:level, :score, :regDate,:userId)");
			$stmt->bindParam(':level', $level);
			$stmt->bindParam(':score', $score);
			$stmt->bindParam(':regDate', $date);
			$stmt->bindParam(':userId', $userId);

			$result = $stmt->execute();

				if ($result === false) {
					# code...
			//		echo "im here";
					echo $result;
				}
				else{
			//			echo "Embatooo!";
						$json_data = array ('login'=>$login,"level"=>$level,"score"=>$score);
						$jsonEncode = json_encode($json_data);
						echo $jsonEncode;
					}	
			}

	}
}
?>
