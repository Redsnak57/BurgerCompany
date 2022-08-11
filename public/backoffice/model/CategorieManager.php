<?php 

class CategorieManager {
    private Categorie $product;

    /**
     * Regarde si la catégorie est déjà existante
     *
     * @param PDO $bdd
     * @return string
     */
    public function checkCategorie(PDO $bdd){
        $check_categorie = $bdd->prepare("SELECT * FROM `categorie` WHERE nom_categorie=:nom_categorie");
        $check_categorie->bindValue(":nom_categorie", $this->product->getNom_categorie(), PDO::PARAM_STR);
        $check_categorie->execute();

        if($check_categorie->rowCount() > 0){
            return "1";
        }
        return "0";
    }


    /**
     * Si catégorie déjà existante via la fonction checkCategorie alors on annule, sinon on insert dans la BDD
     *
     * @param PDO $bdd
     * @return string
     */
    public function setNewCategory(PDO $bdd){
        $this->checkCategorie($bdd);
        if($this->checkCategorie($bdd) == 1){
            echo "<p> Catégorie déjà éxistante. </p>";
        } else {
            $str = 'INSERT INTO categorie (nom_categorie) VALUES (:nom_categorie)';
    
            $query = $bdd->prepare($str);
            $query->bindValue(':nom_categorie', $this->product->getNom_categorie(), PDO::PARAM_STR);
            return $query->execute();
        }
       
    }

    /**
     * Créer un nouvel objet catégorie 
     *
     * @param PDO $bdd
     * @param array $nom_categorie
     * @return string
     */
    public function makeNewCategory(PDO $bdd, array $nom_categorie){
        if(isset($nom_categorie['nom_categorie'])){
            $this->product = new Categorie(null, $nom_categorie["nom_categorie"]);
            if($this->setNewCategory($bdd)){
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Récupère toutes les catégorie de la bdd
     *
     * @param PDO $bdd
     * @return array
     */
    public function getAllCategorie(PDO $bdd){
        $str = "SELECT * FROM categorie";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
        
    }
}


?>