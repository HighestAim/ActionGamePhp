<?    class Mark{ 
        public $id; 
        public $level; 
        public $score;  
        public $regDate; 
        public $userId;

        public function __construct() { }

     /*   public function __construct($id, $level, $score, $userId, $regDate)
        {
            $this->id = $id;
            $this->level = $level;
            $this->score = $score;
            $this->userId = $userId;
            $this->regDate = $regDate;
        } 
        
        public function __construct($level, $score, $userId, $regDate)
        {
            $this->level = $level;
            $this->score = $score;
            $this->userId = $userId;
            $this->regDate = $regDate;
        } */

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

    } 
?>