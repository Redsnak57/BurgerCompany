<?php

class CategorieClientManager {

    public function getAllClientCategorie(PDO $bdd){
        $str = "SELECT * FROM categorie";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }
}

?>