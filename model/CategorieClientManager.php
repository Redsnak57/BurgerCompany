<?php

class CategorieClientManager {

    /**
     * Récupère toutes les catégorie
     * 
     * @return array retourne un tableu avec les id ID, nom_categorie
     */
    public function getAllClientCategorie(PDO $bdd){
        $str = "SELECT * FROM categorie";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }
}

?>