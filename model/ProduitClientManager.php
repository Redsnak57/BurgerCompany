<?php

class ProduitClientManager {

    public function getAllClientProduct(PDO $bdd){
        $str = "SELECT * FROM produit";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }
}

?>