<?php

require_once("../class/Categorie.php");
require_once("../class/Tva.php");
require_once("../class/Promo.php");

class Produit{
    private $ID;
    private $nom_produit;
    private Categorie $categorie;
    private $prixHt_produit;
    private Tva $Tva;
    private Promo $Promo;
    private $description_produit;
    private $image_produit;
    private $disponnibilite_produit;
    private array $ingredient;

    public function __construct($ID= "", $nom_produit="", $categorie= "", $prixHt_produit= "", $Tva= "", $promo= "", $description_produit= "", $disponnibilite_produit= "", $image_produit= ""){
        $this->ID = $ID;
        $this->nom_produit = $nom_produit;
        $this->categorie = $categorie;
        $this->prixHt_produit = $prixHt_produit;
        $this->Tva = $Tva;
        $this->Promo = $promo;
        $this->description_produit = $description_produit;
        $this->image_produit = $image_produit;
        $this->disponnibilite_produit = $disponnibilite_produit;
    }

    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = "set".ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }

    public function addIngredient(int $id): Produit
    {
        $manager = new IngredientManager(ConnectionDbAdmin::getInstance()->connection);

        $this->ingredient[] = $manager->getIngredientById($id);

        return $this;
    }

    private function setID($ID){
        $this->ID=$ID;
    }

    public function getID(){
        return $this->ID;
    }

    public function getNom_produit(){
        return $this->nom_produit;
    }
    public function getcategorie(){
        return $this->categorie;
    }

    public function getPrixHt_produit(){
        return $this->prixHt_produit;
    }

    public function getTva(){
        return $this->Tva;
    }

    public function getPromo(){
        return $this->Promo;
    }

    public function getDescription_produit(){
        return $this->description_produit;
    }

    public function getImage_produit(){
        return $this->image_produit;
    }

    public function getDisponnibilite_produit(){
        return $this->disponnibilite_produit;
    }

    public function setNom_produit($nom_produit){
        $nom_produit = htmlspecialchars(strip_tags($nom_produit));
        $this->nom_produit = $nom_produit;
    }

    public function setcategorie($categorie){
        $categorie = htmlspecialchars(strip_tags($categorie));
        $this->categorie = $categorie;
    }

    public function setPrixHt_produit($prixHt_produit){
        $prixHt_produit = htmlspecialchars(strip_tags($prixHt_produit));
        $this->prixHt_produit = $prixHt_produit;
    }

    public function setTva($Tva){
        $Tva = htmlspecialchars(strip_tags($Tva));
        $this->Tva = $Tva;
    }

    public function setPromo($promo){
        $promo = htmlspecialchars(strip_tags($promo));
        $this->Promo = $promo;
    }

    public function setDescription_produit($description_produit){
        $description_produit = htmlspecialchars(strip_tags($description_produit));
        $this->description_produit = $description_produit;
    }

    public function setImage_produit($image_produit){
        $this->image_produit = $image_produit;
    }

    public function setDisponnibilite_produit($disponnibilite_produit){
        $this->disponnibilite_produit = $disponnibilite_produit;
    }


}

?>