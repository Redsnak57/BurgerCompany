<?php

class Categorie {
    private $ID;
    private $nom_categorie;


    public function __construct($ID ="", $nom_categorie =""){
        $this->ID = $ID;
        $this->nom_categorie = $nom_categorie;
    }

    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = "set".ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }

    public function setID($ID){
        $this->ID=$ID;
    }

    public function setNom_categorie($nom_categorie){
        $nom_categorie = htmlspecialchars(strip_tags($nom_categorie));
        $this->nom_categorie = $nom_categorie;
    }

    public function getID(){
        return $this->ID;
    }

    public function getNom_categorie(){
        return $this->nom_categorie;
    }
}


?>