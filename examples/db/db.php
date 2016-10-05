<? class DB{ 
    private static $instance = NULL; 
    private function __construct(){} 
    private function __clone(){} 
    public static function connection(){ 
        if(!self::$instance){ 
        
            $params = parse_ini_file("config.ini");

            self::$instance = mysqli_connect($params['conn'], $params['user'], $params['pass'], $params['name'] );
            
            if(self::$instance <= 0)	echo('Unable to connect');
        } 
        return self::$instance; 
    } 
}
?>