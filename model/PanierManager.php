<?php

class PanierManager {

    public function getID(PDO $bdd, $ID){
        $str = "SELECT ID from produit WHERE ID=:ID";
        $query = $bdd->prepare($str);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);
        $reponse = $query->fetchAll();

        return $reponse;
    }

    
}

?>