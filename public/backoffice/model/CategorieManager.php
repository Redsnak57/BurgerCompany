<?php 

class CategorieManager {
    private Categorie $product;

    /**
     * Regarde si la catégorie est déjà existante
     *
     * @param PDO $bdd
     * @return string
     */
    public function checkCategorie(PDO $bdd): string{
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
    public function setNewCategory(PDO $bdd): bool{
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
    public function makeNewCategory(PDO $bdd, array $nom_categorie): bool{
        if(isset($nom_categorie['nom_categorie'])){
            $this->product = new Categorie(null, $nom_categorie["nom_categorie"]);
            if($this->setNewCategory($bdd)){
                return 1;
            } else {
                return 0;
            }
        } 
        return 0;
    }

    /**
     * Récupère toutes les catégorie de la bdd
     *
     * @param PDO $bdd
     * @return array
     */
    public function getAllCategorie(PDO $bdd): array{
        $array = [];

        $str = "SELECT * FROM categorie";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        foreach($reponse as $cat){
            $object = new Categorie();
            $object->hydrate($cat);
            array_push($array,$object);
        }

        return $array;
        
    }

    /**
     * Récupère un seul objet avec son ID
     *
     * @param PDO $bdd
     * @param integer $ID
     * @return Categorie
     */
    public function getCategorieByID(PDO $bdd, int $ID): Categorie{
        $cat = new Categorie();

        $str = "SELECT * FROM categorie WHERE ID=:ID";
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
     * Supprime une catégorie via son ID
     *
     * @param PDO $bdd
     * @param integer $ID
     * @return void
     */
    public function suppCategorieByID(PDO $bdd, int $ID){
        $reqDelete = "DELETE FROM categorie WHERE ID=:ID";
        $query = $bdd->prepare($reqDelete);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);

        if($query->execute()){
            
        } else {
            echo "Une erreur c'est produite.";
        }
    }

    /**
     * Modifie catégorie avec l'ID
     *
     * @param PDO $bdd
     * @param array $product
     * @return boolean
     */
    public function setEditCategorie(PDO $bdd, array $product): bool{
        $this->product = new Categorie();
        $this->product->hydrate($product);

        $str = "UPDATE categorie SET nom_categorie=:nom_categorie WHERE ID=:ID";
        $query = $bdd->prepare($str);
        $query->bindValue(":nom_categorie", $this->product->getNom_categorie(), PDO::PARAM_STR);
        $query->bindValue(":ID", $this->product->getID(), PDO::PARAM_INT);
        if($query->execute()){
            header("Location: index.php?page=produits");
            return true;
        }
        return false;
    }
}


?>