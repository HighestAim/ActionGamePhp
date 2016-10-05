<? class DB{ 
    private static $instance = NULL; 
    private function __construct(){} 
    private function __clone(){} 
    public static function connect(){ 
        if(!self::$instance){ 
        
            $params = parse_ini_file("config.ini");

            self::$instance = new PDO($params['conn'], $params['user'], $params['pass']);
            
        } 
        return self::$instance; 
    } 
}
?>