<?php 

/**
 * Singleton
 * @param string $host
 * @param string $dbname
 * @param string $user
 * @param string $mdp
 * @param string $char
 */
class ConnectionDb {

    public static $instance;

    private $host;
    private $dbname;
    private $user;
    private $mdp;
    private $char;
    public $connection;


    private function __construct($host, $dbname, $user, $mdp, $char){
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->mdp = $mdp;
        $this->char = $char;
        try {
            $this->connection = new PDO("mysql:host={$this->host}; dbname={$this->dbname}; char={$this->char}", $this->user, $this->mdp);
        }   catch (PDOException $e) {
                die('erreur :' .$e -> getMessage());
            }
    }

    public static function getInstance($host = "", $dbname = "", $user = "", $mdp = "", $char = "utf-8"){
        if(is_null(self::$instance)){
            self::$instance = new ConnectionDb($host, $dbname, $user, $mdp, $char);
        }
        return self::$instance;     
    }
}
?>