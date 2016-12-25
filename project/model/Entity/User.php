<?    
include 'db.php';

class User{ 
        public $id; 
        public $name; 
        public $login; 
        public $password; 
        public $regDate; 

        public function __construct() { }

        
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

        public static function getAll($userId)
        {
            $conn = db::connect();
            $result = -1;
            $stmt = $conn->query("SELECT name FROM User WHERE User.id = '$userId' ORDER BY regDate DESC LIMIT 1");
            $stmt->execute();

            $result = $stmt->fetchObject(); 
            return $result->name;
        }
    } 
?>