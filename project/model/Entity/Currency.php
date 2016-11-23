<?    class Currency{ 
        public $id; 
        public $coin; 
        public $crystal; 
        public $point; 
        public $userId; 
        public $regDate; 

        public function __construct() { }

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
        public static function getAll($userId)
        {
            $conn = db::connect();
            $arrayName = -1;
            $stmt = $conn->query("SELECT coin, crystal, point FROM Currency WHERE Currency.userId = '$userId' ORDER BY regDate DESC LIMIT 1");
            $stmt->execute();

            $result = $stmt->fetchObject();

            $arrayName = array(
                'coin' => $result->coin,
                'crystal' => $result->crystal,
                'point' => $result->point
                ); 
            return $arrayName;
        }

    } 
?>