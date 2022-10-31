<?php

class PanierManager {
    public Panier $panier;

    public function getID(PDO $bdd, array $data){
        $str = "SELECT * FROM produit WHERE ID = :id";
        $query = $bdd->prepare($str);
        $query->bindValue(':id', intval($data['ID']), PDO::PARAM_INT);
        $query->execute();
        $reponse = $query->fetch(PDO::FETCH_OBJ);

        return $reponse;
    }

    public function getPanier(PDO $bdd, array $panier){

        $ids = array_keys($panier);
    
        $str = "SELECT * FROM produit WHERE ID IN (". implode(',',$ids).")";
        // $str = "SELECT * FROM produit WHERE ID";
        $query = $bdd->prepare($str);
        var_dump($query->errorInfo());
        $query->execute();
        $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

        return $reponse;

    }
    
}

?>