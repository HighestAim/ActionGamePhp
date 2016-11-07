<pre>
<?php

class User{
	public $id;
	public $email;
	public $naem;

	public function nameToUpper(){
		return strtoupper($this->name);
	}
}

	$db = new PDO("sqlite:users.db");///creat db

	$sql = "SELECT * FROM user";

	$stmt = $db->query($sql);

	$obj = $stmt->fetchALL(PDO::FETCH_CLASS,'USER');

	foreach ($obj as $user) {
		echo $user->nameToUpper().'br';
	}
?>