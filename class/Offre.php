<?php

class Offre{

    private int $ID;
    public string $nom;
    public float $pourcentage;

    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = 'set'.ucfirst(str_replace('_promo', '', $key));
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }


    private function setID(?int $ID){
        $this->ID = $ID;
    }

    public function getID(){
        return $this->ID;
    }

    public function setNom(string $nom){
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setPourcentage(string $value){
        $this->pourcentage = intval($value) / 100;
    }

    public function getPourcentage(){
        return $this->pourcentage;
    }

    public function getPourcentageString(){
        $pourcent = $this->pourcentage * 100;
        $pourcent = "$pourcent %";
        return $pourcent;
    }

    public function calcPrixReduit(float $prix): string
    {
        $prixReduit = $prix - ($prix * $this->pourcentage);
        $prixReduit = number_format($prixReduit, 2, ',', '.');
        return $prixReduit;
    }

}

?>