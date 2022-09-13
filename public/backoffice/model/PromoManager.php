<?php

class PromoManager {
    private Promo $promo;

    /**
     * Regarde si la TVA est déjà existante dans la BDD
     *
     * @param PDO $bdd
     * @return string
     */
    public function checkPromo(PDO $bdd): string{
        $check_promo = $bdd->prepare("SELECT * FROM promo WHERE nom_promo=:nom_promo");
        $check_promo->bindValue(":nom_promo", $this->promo->getNom_promo(), PDO::PARAM_STR);
        $check_promo->execute();

        if($check_promo->rowCount() > 0 ){
            return "1";
        }
        return "0";
    }


    /**
     * Créer un nouvel objet Promo
     *
     * @param PDO $bdd
     * @param array $nom_promo
     * @return bool
     */
    public function makeNewPromo(PDO $bdd, array $nom_promo): bool{
        if(isset($nom_promo["promoNom"],$nom_promo["promoPourcentage"])){
            $this->promo = new Promo(null, $nom_promo["promoNom"], $nom_promo["promoPourcentage"]);
            if($this->setNewPromo($bdd)){
                return 1;
            } else {
                return 0;
            }
        }
        return false;
    }

    /**
     * Test dans la premier temps si la Promo existe déjà grace à la fonction checkPromo. Si oui alors echec, sinon insert dans la BDD
     *
     * @param PDO $bdd
     * @return bool
     */
    public function setNewPromo(PDO $bdd): bool{
        $this->checkPromo($bdd);
        if($this->checkPromo($bdd) == 1){
            echo "<p> Promotion au même nom déjà existante. </p> ";
            return false;
        } else {
            $str = "INSERT INTO promo (nom_promo,pourcentage_promo) VALUES (:nom_promo, :pourcentage_promo)";
            $query = $bdd->prepare($str);
            $query->bindValue(":nom_promo", $this->promo->getNom_promo(), PDO::PARAM_STR);
            $query->bindValue(":pourcentage_promo", $this->promo->getPourcentage_promo(), PDO::PARAM_INT);
            return $query->execute();
        }
        return false;
    }

    /**
     * Récupère toutes les Promo dans la BDD sous forme d'objet
     *
     * @param PDO $bdd
     * @return array
     */
    public function getAllPromo(PDO $bdd): array{
        $array = [];

        $str = "SELECT * FROM promo";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($reponse as $promo){
            $object = new Promo();
            $object->hydrate($promo);
            array_push($array,$object);
        }
        return $array;
    }

    /**
     * Récupère la promo avec l'id
     *
     * @param PDO $bdd
     * @param integer|null $ID
     * @return Promo
     */
    public function getPromoByID(PDO $bdd, ?int $ID): Promo{
        $cat = new Promo();

        $str = "SELECT * FROM promo WHERE ID=:ID";
        $query = $bdd->prepare($str);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);
        
        if($query->execute()){
            $data = $query->fetch(PDO::FETCH_ASSOC);
            if($data != false){
                $cat->hydrate($data);
            }
        }
        return $cat;
    }

    /**
     * Supprime la Promo avec son ID
     *
     * @param PDO $bdd
     * @param integer $ID
     * @return void
     */
    public function suppPromoByID(PDO $bdd, int $ID){
        $reqDelete = "DELETE FROM promo WHERE ID=:ID";
        $query = $bdd->prepare($reqDelete);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);

        if($query->execute()){

        } else {
            echo "Une erreur c'est produite.";
        }
    }

    /**
     * Modifie la promotion dans la BDD
     *
     * @param PDO $bdd
     * @param array $promo
     * @return bool
     */
    public function setEditPromo(PDO $bdd, array $promo): bool{
        $this->promo = new Promo();
        $this->promo->hydrate($promo);

        $str = "UPDATE promo SET nom_promo=:nom_promo, pourcentage_promo=:pourcentage_promo WHERE ID=:ID";
        $query = $bdd->prepare($str);

        $query->bindValue(":nom_promo", $this->promo->getNom_promo(), PDO::PARAM_STR);
        $query->bindValue(":pourcentage_promo", $this->promo->getPourcentage_promo(), PDO::PARAM_STR);
        $query->bindValue(":ID", $this->promo->getID(), PDO::PARAM_INT);
        if($query->execute()){
            header("Location: index.php?page=produits");
            return true;
        }
        return false;
    }
}

?>