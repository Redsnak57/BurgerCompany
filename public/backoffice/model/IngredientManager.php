<?php

class IngredientManager {
    private PDO $db;
    public Ingredient $ingredient;

    public function __construct(PDO $bdd){
        $this->db = $bdd;
    }

    /**
     * Regarde si le nom de l'ingrédient est déjà existante dans la BDD
     *
     * 
     * @return string
     */
    public function checkIngredient(): string{
        $check_tva = $this->db->prepare("SELECT * FROM ingredient WHERE nom_ingredient=:nom");
        $check_tva->bindValue(":nom", $this->ingredient->getNom(), PDO::PARAM_STR);
        $check_tva->execute();

        if($check_tva->rowCount() > 0){
            return "1";
        }
        return "0";
    }

    /**
     * Test dans la premier temps si le nom de l'ingrédient existe déjà grace à la fonction checkIngredient. Si oui alors echec, sinon insert dans la BDD
     *
     * 
     * @return string
     */
    public function setNewIngredient(): bool{
        $this->checkIngredient();
        if($this->checkIngredient() == 1){
            echo "<p> Ingrédient déjà existant </p>";
        } else {
            $str = "INSERT INTO ingredient (nom_ingredient,prixht_ingredient) VALUES(:nom,:prix)";
            $query = $this->db->prepare($str);
            $query->bindValue(":nom", $this->ingredient->getNom(), PDO::PARAM_STR);
            $query->bindValue(":prix", $this->ingredient->getPrixht(), PDO::PARAM_STR);
            return $query->execute();
        }
    }

    /**
     * Créer un nouvel objet Ingrédient 
     *
     * @param array $ingredient
     * @return string
     */
    public function makeNewIngredient(array $ingredient): bool{
        if(isset($ingredient["nom_ingredient"])){
            $this->ingredient = new Ingredient();
            $this->ingredient->hydrate($ingredient);
            if($this->setNewIngredient()){
                return 1;
            } else {
                return 0;
            }
        }
        return false;
    }

    public function getIngredientById(int $id): Ingredient
    {
        $ingredient = new Ingredient();

        $str = 'SELECT * FROM ingredient WHERE ID = :id';

        $query = $this->db->prepare($str);

        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        $ingredient->hydrate($query->fetch(PDO::FETCH_ASSOC));

        return $ingredient;
    }


    public function getAllIngredient(): array{
        $returnArray = [];

        $str = "SELECT * FROM ingredient";
        $query = $this->db->query($str);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $ingredient){
            $ing = new Ingredient();
            $ing->hydrate($ingredient);
            array_push($returnArray, $ing);
        }

        return $returnArray; 
    }

    public function suppIngredientByID(PDO $bdd, int $ID): bool {
        $reqDelete = "DELETE FROM ingredient WHERE ID=:ID";
        $query = $bdd->prepare($reqDelete);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);

        if($query->execute()){
            return true;
        } else {
            return false;
            echo "Une erreur c'est produite.";
        }
    }
}

?>