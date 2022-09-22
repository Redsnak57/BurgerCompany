<?php

class PanierManager {
    public Panier $panier;

    public function getID(PDO $bdd, $panier){
        // $str = "SELECT * FROM produit WHERE ID IN (". implode(',',$panier).")";
        // $query = $bdd->prepare($str);
        // $query->execute();
        // $reponse = $query->fetchAll(PDO::FETCH_OBJ);

        // return $reponse;
    }

    public function getPanier(PDO $bdd,$panier){
    
         $str = "SELECT * FROM produit WHERE ID IN (". implode(',',$panier).")";
        // $str = "SELECT * FROM produit WHERE ID";
        $query = $bdd->prepare($str);
        $query->execute();
        $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

        return $reponse;

    }
    
}

?>