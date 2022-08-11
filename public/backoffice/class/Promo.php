<?php

class Promo {
    private $ID;
    private $nom_promo;
    private $pourcentage_promo;

    public function __construct($ID="", $nom_promo="", $pourcentage_promo=""){
        $this->ID=$ID == 0 ? null : $ID;
        $this->nom_promo = $nom_promo;
        $this->pourcentage_promo = $pourcentage_promo;
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

    public function setNom_promo($nom_promo){
        $nom_promo = htmlspecialchars(strip_tags($nom_promo));
        $this->nom_promo = $nom_promo;
    }
    
    public function setPourcentage_promo($pourcentage_promo){
        $pourcentage_promo = htmlspecialchars(strip_tags($pourcentage_promo));
        $this->pourcentage_promo = $pourcentage_promo;
    }

    public function getID(){
        return $this->ID;
    }

    public function getNom_promo(){
        return $this->nom_promo;
    }

    public function getPourcentage_promo(){
        return $this->pourcentage_promo;
    }
}

?>