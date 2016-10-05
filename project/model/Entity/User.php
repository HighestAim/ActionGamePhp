<?    
include 'db.php';

class User{ 
        public $id; 
        public $name; 
        public $login; 
        public $password; 
        public $regDate; 

        public function __construct() { }
/*
        public function __construct($id, $name, $login, $password, $regDate)
        {
            $this->id = $id;
            $this->name = $name;
            $this->login = $login;
            $this->password = $password;
            $this->regDate = $regDate;
        } 
        
        public function __construct($name, $login, $password, $regDate)
        {
            $this->name = $name;
            $this->login = $login;
            $this->password = $password;
            $this->regDate = $regDate;
        } 
*/
        
        public function showInfo(){
            echo '<p>'. $this->id .' : '. $this->name .' : '. $this->login .' : '. $this->password .' : '. $this->regDate .'</p>'; 
        } 
        
        public static function loadFromDB()
        {
                $conn = db::connect();
                $stmt = $conn->query("select * from " . get_class($this));
                $obj = $stmt->fetchALL(PDO::FETCH_CLASS, get_class($this)); 
                
                return $obj;
        }
    } 
?>