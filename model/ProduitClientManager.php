<?php

class ProduitClientManager {

    /**
     * Récupère les produits
     *
     * @param PDO $bdd
     * @return array retourne un tableau avec toutes les informations de Produit
     */
    public function getAllClientProduct(PDO $bdd): array{
        $str = "SELECT produit.*, tva.ID as tid, tva.taux,categorie.nom_categorie,categorie.id as cid FROM produit INNER JOIN tva ON produit.ID_tva = tva.ID INNER JOIN categorie ON categorie.id = produit.ID_categorie";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }

    /**
     * Récupère l'ID de produit pour le panier
     *
     * @param PDO $bdd
     * @return array
     */
    public function getAllProduit(PDO $bdd): array{
        $str = "SELECT * FROM produit";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }

}

?>