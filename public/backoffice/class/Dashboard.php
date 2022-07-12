<?php

class Dashboard{

    public function __construct(){
        
    }

    public function getUser(PDO $bdd){
        $select_modele = $bdd->prepare("SELECT * FROM `user`");
        $select_modele->execute();
        $numbers_of_modele = $select_modele->rowCount();
        return $numbers_of_modele;
    }

    
}

?>