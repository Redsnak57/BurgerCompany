<?php

class Dashboard{

    private $user;

    public function __construct($user){
        $this->user = $user;
    }

    public function getUser(PDO $bdd, $user){
        return $this->user;
        $select_modele = $bdd->prepare("SELECT * FROM `user`");
        $select_modele->execute();
        $numbers_of_modele = $select_modele->rowCount();
    }

    
}

?>