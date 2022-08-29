<?php

class Ingredient{
    private int $ID;
    public string $nom;
    private float $prixht;

    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = "set".ucfirst(str_replace('_ingredient', '', $key));
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }

    private function setID(int $ID){
        $this->ID = $ID;
    }

    public function getID(){
        return $this->ID;
    }

    public function setNom(string $nom){
        $this->nom = htmlspecialchars(strip_tags($nom));
    }

    public function getNom(){
        return $this->nom;
    }

    public function setPrixht(float $prixht){
        $this->prixht = floatval($prixht);
    }

    public function getPrixht(){
        return $this->prixht;
    }

}


?>