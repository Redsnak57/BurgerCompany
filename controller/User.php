<?php


class User{
    private $ID;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $rueAdresse;
    private $numeroAdresse;
    private $ID_ville;

    public function __construct($email = '', $password = '', $ID = '', $nom = '', $prenom = '',  $rueAdresse = '', $numeroAdresse = '', $ville = ''){
        $this->ID = $ID;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->rueAdresse = $rueAdresse;
        $this->numeroAdresse = $numeroAdresse;
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

    public function getRueAdresse(){
        return $this->rueAdresse;
    }

    public function getNumeroAdresse(){
        return $this->numeroAdresse;
    }

    public function getID_ville(){
        return $this->ID_ville;
    }

    public function setNom($nom){
        $nom = ucfirst(strtolower($nom));
        $this->nom = htmlspecialchars(strip_tags($nom));
    }

    public function setPrenom($prenom){
        $prenom = ucfirst(strtolower($prenom));
        $this->prenom = htmlspecialchars(strip_tags($prenom));
    }

    public function setEmail($email){
        $this->email = strip_tags($email);
    }

    public function setRueAdresse($rueAdresse){
        $this->rueAdresse = strip_tags($rueAdresse);
    }

    public function setNumeroAdresse($numeroAdresse){
        $this->numeroAdresse = strip_tags($numeroAdresse);
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function setID_ville($ID_ville){
        $this->ID_ville = $ID_ville;
    }

    public function unsetPassword(){
        $this->password = null;
    }
}