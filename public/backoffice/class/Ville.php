<?php

class Ville{
    private $ID;
    private $nom;
    private $codePostal;
    private $departement;

    public function __construct(){}

    /**
     * function d'hydratation set
     *
     * @param array $array
     * @return void
     */
    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }

    /**
     * Utile pour la function d'hydratation qui a besoin de setter
     *
     * @param INT $id
     * @return void
     */
    private function setID($id){
        $this->ID = $id;
    }

    private function setNom($nom){
        $this->nom = $nom;
    }

    private function setCodePostal($code){
        $this->codePostal = $code;
    }

    private function setDepartement($dep){
        $this->departement = $dep;
    }

    public function getID(){
       return $this->ID;
    }

    /**
     * Récupère les nom de ville
     * remplace les espaces par des - 
     *
     * @return string
     */
    public function getNom(){
        return ucfirst(str_replace(' ', '-', $this->nom));
    }

    public function getCodePostal(){
        return $this->codePostal;
    }

    public function getDepartement(){
        return $this->departement;
    }
}


?>