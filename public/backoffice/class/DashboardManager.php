<?php

class DashboardManager {

    public function getUser(PDO $bdd){
        $select_modele = $bdd->prepare("SELECT * FROM `user`");
        $select_modele->execute();
        $numbers_of_modele = $select_modele->rowCount();
        return $numbers_of_modele;
    }

    public function getProduit(PDO $bdd){
        $select_modele = $bdd->prepare("SELECT * FROM `produit`");
        $select_modele->execute();
        $numbers_of_modele = $select_modele->rowCount();
        return $numbers_of_modele;
    }
}
