<?php

class Admin {
    private $ID;
    private $email;
    private $password;

    /**
     * Constructor
     *
     * @param string $ID
     * @param string $email
     * @param string $password
     */
    public function __construct($ID = "", $email ="", $password =""){
    
        $this->ID = $ID;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Function hydrate
     *
     * @param array $array
     * @return array
     */
    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = "set".ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }

    private function setID($ID){
        $this->ID=$ID;
    }
    public function getID(){
        return $this->ID;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    /**
     * Récupère le password et le crypte 
     *
     * @param string $password
     * @return void
     */
    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }


}

?>