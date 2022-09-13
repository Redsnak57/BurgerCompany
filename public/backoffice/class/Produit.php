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

    public function __construct($ID= "", $nom_produit="", $categorie= "", $prixHt_produit= "", $Tva= "", $Promo= "", $description_produit= "", $disponnibilite_produit= "", $image_produit= ""){
        $this->ID = $ID;
        $this->nom_produit = $nom_produit;
        !empty($categorie) && $this->setID_categorie(intval($categorie));
        $this->prixHt_produit = $prixHt_produit;
        !empty($Tva) && $this->setID_Tva(intval($Tva));
        !empty($Promo) && $this->setID_Promo(intval($Promo));
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

    public function getIngredient(): array{
        return $this->ingredient;
    }

    public function hasIngredient(): bool{
        return isset($this->ingredient);
    }

    private function setID($ID){
        $this->ID=$ID;
    }

    public function getID(): int{
        return $this->ID;
    }

    public function getNom_produit(): string{
        return $this->nom_produit;
    }
    public function getcategorie(): Categorie{
        return $this->categorie;
    }

    public function getPrixHt_produit(){
        return $this->prixHt_produit;
    }

    public function getTva(): Tva{
        return $this->Tva;
    }

    public function getPromo(): ?Promo {
        return isset($this->Promo) ? $this->Promo : null;
    }

    public function getDescription_produit(): string{
        return $this->description_produit;
    }

    public function getImage_produit(): string{
        return $this->image_produit;
    }

    public function getDisponnibilite_produit(): bool{
        return (!empty($this->disponnibilite_produit) && isset($this->disponnibilite_produit));
    }

    public function setNom_produit(string $nom_produit): void{
        $nom_produit = htmlspecialchars(strip_tags($nom_produit));
        $this->nom_produit = $nom_produit;
    }

    private function setID_categorie(int $categorie): void{
        $manager = new CategorieManager();
        $this->categorie = $manager->getCategorieByID(ConnectionDbAdmin::getInstance()->connection,$categorie);
    }

    public function setCategorie(int $categorie): void{
        $categorie = htmlspecialchars(strip_tags($categorie));
        $this->categorie = new Categorie($categorie);
    }

    public function setPrixHt_produit(float $prixHt_produit): void{
        $prixHt_produit = htmlspecialchars(strip_tags($prixHt_produit));
        $this->prixHt_produit = $prixHt_produit;
    }

    private function setID_tva(int $tva): void{
        $manager = new TvaManager();
        $this->Tva = $manager->getTvaByID(ConnectionDbAdmin::getInstance()->connection,$tva);
    }

    public function setTva(int $Tva): void{
        $Tva = htmlspecialchars(strip_tags($Tva));
        $this->Tva = new Tva($Tva);
    }

    private function setID_promo(?int $promo): void{
        $manager = new PromoManager();
        $this->Promo = $manager->getPromoByID(ConnectionDbAdmin::getInstance()->connection,$promo);
    }

    public function setPromo(?int $promo): void{
        $promo = htmlspecialchars(strip_tags($promo));
        if($promo != null && !empty($promo)){
            $this->Promo = new Promo($promo);
        } else {
            $this->Promo = new Promo();
        }
    }

    public function setDescription_produit(string $description_produit): void{
        $description_produit = htmlspecialchars(strip_tags($description_produit));
        $this->description_produit = $description_produit;
    }

    public function setImage_produit(string $image_produit): void{
        $this->image_produit = $image_produit;
    }

    public function setDisponibilite_produit(bool $disponnibilite_produit): void{
        $this->disponnibilite_produit = $disponnibilite_produit;
    }


}

?>