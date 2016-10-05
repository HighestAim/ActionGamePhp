<?    class Friend{ 
        public $id; 
        public $userId; 
        public $friendId; 
        public $regDate; 

        public function __construct() { }

        /*
        public function __construct($id, $userId, $friendId, $regDate)
        {
            $this->id = $id;
            $this->userId = $userId;
            $this->friendId = $friendId;
            $this->regDate = $regDate;
        } 
        
        public function __construct($userId, $friendId, $regDate)
        {
            $this->userId = $userId;
            $this->friendId = $friendId;
            $this->regDate = $regDate;
        } 
*/
       
        public function showInfo(){
            echo '<p>'. $this->id .' : '. $this->userId .' : '. $this->friendId .' : '. $this->regDate .'</p>'; 
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