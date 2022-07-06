<?php

class AfficherAdmin {
    public function afficherAdmin(PDO $bdd, Admin $user){
    $afficher_admin = $bdd->prepare("SELECT * FROM `admin` WHERE email=:email");
    $afficher_admin->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);

    $afficher_admin->execute();  
    }
}
?>

