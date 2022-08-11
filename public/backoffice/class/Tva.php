<?php

class Tva {
    private $ID;
    private $taux;

    public function __construct($ID="", $taux=""){
        $this->taux=$taux;
        $this->ID=$ID;
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

    public function setTaux($taux){
        $taux = htmlspecialchars(strip_tags($taux));
        $this->taux = $taux;
    }

    public function getID(){
        return $this->ID;
    }

    public function getTaux(){
        return $this->taux;
    }
}

?>