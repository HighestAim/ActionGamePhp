<?php
include 'db.php';

    $conn = db::connect();

    class User{ 
        public $id; 
        public $name; 
        public $login; 
        public $password; 
        public $regDate; 
        function showInfo(){
            echo '<p>'.$this->id.' : '.$this->name.' : '.$this->login.' : '.$this->password.' : '.$this->regDate.'</p>'; 
        } 
    } 

    $stmt = $conn->query("select * from User");
    $obj = $stmt->fetchALL(PDO::FETCH_CLASS, 'User'); 

    foreach($obj as $user) 
        $user->showInfo();
?>