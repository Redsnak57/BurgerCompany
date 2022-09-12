<?php

class PanierManager {

    public function getID(PDO $bdd, $ID){
        $str = "SELECT ID from produit WHERE ID=:ID";
        $query = $bdd->prepare($str);
        $query->bindValue(":ID", $ID["ID"], PDO::PARAM_INT);
        $query->execute();
        $reponse = $query->fetchAll(PDO::FETCH_OBJ);

        return $reponse;
    }

    
}

?>