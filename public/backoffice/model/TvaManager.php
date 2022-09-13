<?php

class TvaManager {
    private Tva $tva;

    /**
     * Regarde si la TVA est déjà existante dans la BDD
     *
     * @param PDO $bdd
     * @return string
     */
    public function checkTva(PDO $bdd): string{
        $check_tva = $bdd->prepare("SELECT * FROM tva WHERE taux=:taux");
        $check_tva->bindValue(":taux", $this->tva->getTaux(), PDO::PARAM_STR);
        $check_tva->execute();

        if($check_tva->rowCount() > 0){
            return "1";
        }
        return "0";
    }

    /**
     * Test dans la premier temps si la Tva existe déjà grace à la fonction checkTva. Si oui alors echec, sinon insert dans la BDD
     *
     * @param PDO $bdd
     * @return bool
     */
    public function setNewTva(PDO $bdd): bool{
        $this->checkTva($bdd);
        if($this->checkTva($bdd) == 1){
            echo "<p> TVA déjà existante";
        } else {
            $str = "INSERT INTO tva (taux) VALUES(:taux)";
            $query = $bdd->prepare($str);
            $query->bindValue(":taux", $this->tva->getTaux(), PDO::PARAM_STR);
            return $query->execute();
        }
        return false;
    }

    /**
     * Créer un nouvel objet Tva 
     *
     * @param PDO $bdd
     * @param array $tva
     * @return bool
     */
    public function makeNewTva(PDO $bdd, array $tva): bool{
        if(isset($tva["tva"])){
            $this->tva = new Tva(null, $tva["tva"]);
            if($this->setNewTva($bdd)){
                return 1;
            } else {
                return 0;
            }
        }
        return false;
    }

    /**
     * Récupère toutes les tva dans la BDD sous forme d'object
     *
     * @param PDO $bdd
     * @return array
     */
    public function getAllTva(PDO $bdd): array{
        $array = [];

        $str = "SELECT * FROM tva";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($reponse as $tva){
            $object = new Tva();
            $object->hydrate($tva);
            array_push($array,$object);
        }
        return $array;
    }

    /**
     * Récupère le taux de la tva via l'ID
     *
     * @param PDO $bdd
     * @param int $ID
     * @return Tva
     */
    public function getTvaByID(PDO $bdd, int $ID): Tva{
        $cat = new Tva();

        $str = "SELECT * FROM tva WHERE ID=:ID";
        $query = $bdd->prepare($str);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        $cat->hydrate($data);

        return $cat;
    }

    /**
     * Supprime la TVA avec son ID
     *
     * @param PDO $bdd
     * @param int $ID
     * @return void
     */
    public function suppTvaByID(PDO $bdd, int $ID){
        $reqDelete = "DELETE FROM tva WHERE ID=:ID";
        $query = $bdd->prepare($reqDelete);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);

        if($query->execute()){

        } else {
            echo "Une erreur c'est produite.";
        }
    }

    /**
     * Modifie l'ID dans la BDD
     *
     * @param PDO $bdd
     * @param array $tva
     * @return boolean
     */
    public function setEditTva(PDO $bdd, array $tva): bool{
        $this->tva = new Tva();
        $this->tva->hydrate($tva);

        $str = "UPDATE tva SET taux=:taux WHERE ID=:ID";
        $query = $bdd->prepare($str);
        $query->bindValue(":taux", $this->tva->getTaux(), PDO::PARAM_STR);
        $query->bindValue(":ID", $this->tva->getID(), PDO::PARAM_INT);
        if($query->execute()){
            header("Location: index.php?page=produits");
            return true;
        }
        return false;
    }
}

?>