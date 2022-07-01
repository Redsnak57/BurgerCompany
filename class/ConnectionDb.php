<?php 

class ConnectionDb {

    private static $instance;

    private $connection;
    private $host = "localhost";
    private $dbname =  "burgercompany";
    private $user =  "root";
    private $mdp = "";
    private $char = "utf8";


    public function __construct(){
        try {
            $this->connection = new PDO("mysql:host={$this->host}; dbname={$this->dbname}; char={$this->char}", $this->user, $this->mdp);
        }   catch (PDOException $error) {
                die('erreur :' .$error -> getMessage());
            }
    }

    public static function getInstance(){

        if(self::$instance == NULL){
            self::$instance = new ConnectionDb();
        }

        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }
}

$bdd = ConnectionDb::getInstance();

?>