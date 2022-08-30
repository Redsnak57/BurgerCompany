<?php

class TvaManager {
    private Tva $tva;

    /**
     * Regarde si la TVA est déjà existante dans la BDD
     *
     * @param PDO $bdd
     * @return string
     */
    public function checkTva(PDO $bdd){
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
     * @return string
     */
    public function setNewTva(PDO $bdd){
        $this->checkTva($bdd);
        if($this->checkTva($bdd) == 1){
            echo "<p> TVA déjà existante";
        } else {
            $str = "INSERT INTO tva (taux) VALUES(:taux)";
            $query = $bdd->prepare($str);
            $query->bindValue(":taux", $this->tva->getTaux(), PDO::PARAM_STR);
            return $query->execute();
        }
    }

    /**
     * Créer un nouvel objet Tva 
     *
     * @param PDO $bdd
     * @param array $tva
     * @return string
     */
    public function makeNewTva(PDO $bdd, array $tva){
        if(isset($tva["tva"])){
            $this->tva = new Tva(null, $tva["tva"]);
            if($this->setNewTva($bdd)){
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Récupère toutes les tva dans la BDD
     *
     * @param PDO $bdd
     * @return array
     */
    public function getAllTva(PDO $bdd){
        $str = "SELECT * FROM tva";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
        
    }

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
}

?>