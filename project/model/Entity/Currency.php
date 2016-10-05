<?    class Currency{ 
        public $id; 
        public $coin; 
        public $crystal; 
        public $point; 
        public $userId; 
        public $regDate; 

        public function __construct() { }

        /*
        public function __construct($id, $coin, $crystal, $point, $regDate, $userId)
        {
            $this->id = $id;
            $this->coin = $coin;
            $this->crystal = $crystal;
            $this->point = $point;
            $this->regDate = $regDate;
            $this->userId = $userId;
        } 
        
        public function __construct($coin, $crystal, $point, $regDate, $userId)
        {
            $this->coin = $coin;
            $this->crystal = $crystal;
            $this->point = $point;
            $this->regDate = $regDate;
            $this->userId = $userId;
        } 
*/

        public function showInfo(){
            echo '<p>'. $this->id .' : '. $this->coin .' : '. $this->crystal .' : '. $this->point .' : '. $this->userId .' : '. $this->regDate .'</p>'; 
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