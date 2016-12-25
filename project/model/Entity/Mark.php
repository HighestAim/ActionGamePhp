<?    class Mark{ 
        public $id; 
        public $level; 
        public $score;  
        public $regDate; 
        public $userId;

        public function __construct() { }

        public function showInfo(){
            echo '<p>'. $this->id .' : '. $this->level .' : '. $this->score .' : '. $this->userId .' : '. $this->regDate .'</p>'; 
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
            $arrayName = -1;
            $stmt = $conn->query("SELECT score, level FROM Mark WHERE Mark.userId = '$userId' ORDER BY regDate DESC LIMIT 1");
            $stmt->execute();

            $result = $stmt->fetchObject(); 
            $arrayName = array(
                'score' => $result->score,
                'level' => $result->level
                ); 
            return $arrayName;
        }
    } 
?>