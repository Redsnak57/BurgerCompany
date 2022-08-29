<?php

class ProduitClientManager {

    /**
     * Récupère les produits
     *
     * @param PDO $bdd
     * @return array retourne un tableau avec toutes les informations de Produit
     */
    public function getAllClientProduct(PDO $bdd){
        $str = "SELECT * FROM produit INNER JOIN tva ON produit.ID_tva = tva.ID";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }

}

?>