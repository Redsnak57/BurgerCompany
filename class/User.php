<?php


class User{
    private $ID;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $ID_ville;

    public function __construct($ID = '', $nom = '', $prenom = '', $email = '', $password = '', $ville = ''){
        $this->ID = $ID;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->ID_ville = $ville;
    }

    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }

    private function setID($ID){
        $this->ID = $ID;
    }

    public function getID(){
        return $this->ID;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getID_ville(){
        return $this->ID_ville;
    }

    public function setNom($nom){
        $nom = ucfirst(strtolower($nom));
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $prenom = ucfirst(strtolower($prenom));
        $this->prenom = $prenom;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setID_ville($ID_ville){
        $this->ID_ville = $ID_ville;
    }
}