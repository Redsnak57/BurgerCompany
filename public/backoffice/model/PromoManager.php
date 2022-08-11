<?php

class PromoManager {
    private Promo $promo;

    public function checkPromo(PDO $bdd){
        $check_promo = $bdd->prepare("SELECT * FROM promo WHERE nom_promo=:nom_promo");
        $check_promo->bindValue(":nom_promo", $this->promo->getNom_promo(), PDO::PARAM_STR);
        $check_promo->execute();

        if($check_promo->rowCount() > 0 ){
            return "1";
        }
        return "0";
    }


    public function makeNewPromo(PDO $bdd, array $nom_promo){
        if(isset($nom_promo["promoNom"],$nom_promo["promoPourcentage"])){
            $this->promo = new Promo(null, $nom_promo["promoNom"], $nom_promo["promoPourcentage"]);
            if($this->setNewPromo($bdd)){
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function setNewPromo(PDO $bdd){
        $this->checkPromo($bdd);
        if($this->checkPromo($bdd) == 1){
            echo "<p> Promotion au même nom déjà existante. </p> ";
        } else {
            $str = "INSERT INTO promo (nom_promo,pourcentage_promo) VALUES (:nom_promo, :pourcentage_promo)";
            $query = $bdd->prepare($str);
            $query->bindValue(":nom_promo", $this->promo->getNom_promo(), PDO::PARAM_STR);
            $query->bindValue(":pourcentage_promo", $this->promo->getPourcentage_promo(), PDO::PARAM_INT);
            return $query->execute();
        
        }
    }

    public function getAllPromo(PDO $bdd){
        $str = "SELECT * FROM promo";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }
}

?>