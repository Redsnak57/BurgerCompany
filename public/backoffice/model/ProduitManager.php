<?php

class ProduitManager {
    private Produit $produit;

    /**
     * Créer un objet Produit, avec l'image
     *
     * @param PDO $bdd
     * @param array $produits
     * @return string
     */
    public function makeNewProduit(PDO $bdd, array $produits){
        if(isset($produits["nom_produit"],$produits["ID_categorie"], $produits["prixHt_produit"], $produits["ID_tva"], $produits["ID_promo"], $produits["description_produit"], $_FILES["image_produit"])){
            $this->produit = new Produit(null, $produits["nom_produit"], new Categorie($produits["ID_categorie"]), $produits["prixHt_produit"], new Tva($produits["ID_tva"]), new Promo($produits["ID_promo"]), $produits["description_produit"], isset($produits["disponnibilite_produit"]) ? "1" : "0", $_FILES["image_produit"]["name"]);
            if($this->setNewProduit($bdd)){
                $this->setNewImage();
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Récupère l'image, stock l'image dans un fichier temporaire
     *
     * @return void
     */
    public function setNewImage(){
        if(isset($_FILES['image_produit'])){
            switch($_FILES['image_produit']['error']){
        
                case 0:
                    $file = $_FILES['image_produit'];
                    $savePath = '../../asset/imgProduct/';
                    $savePath .= $file['name'];
                    var_dump($file);
                    if(move_uploaded_file($file['tmp_name'], $savePath)){
                    //    cond img
                    }else{
                        echo 'Erreur';
                    }
                    break;
        
                default: 
                    echo 'Erreur !';
                    
            }
        }
    }

    /**
     * Insère dans la BDD le nouveau produit
     *
     * @param PDO $bdd
     * @return void
     */
    public function setNewProduit(PDO $bdd){
        $str = "INSERT INTO produit (nom_produit, prixht_produit, image_produit, description_produit,	disponibilite_produit, ID_promo, ID_tva, ID_categorie) VALUES(:nom_produit, :prixht_produit, :image_produit, :description_produit, :disponibilite_produit, :ID_promo, :ID_tva, :ID_categorie)";

        $query = $bdd->prepare($str);
        $query->bindValue(":nom_produit", $this->produit->getNom_produit(), PDO::PARAM_STR);
        $query->bindValue(":prixht_produit", $this->produit->getPrixHt_produit(), PDO::PARAM_STR);
        $query->bindValue(":image_produit", $_FILES['image_produit']['name'], PDO::PARAM_STR);
        $query->bindValue(":description_produit", $this->produit->getDescription_produit(), PDO::PARAM_STR);
        $query->bindValue(":disponibilite_produit", $this->produit->getDisponnibilite_produit(), PDO::PARAM_INT);
        $query->bindValue(":ID_promo", $this->produit->getPromo()->getID(), PDO::PARAM_INT);
        $query->bindValue(":ID_tva", $this->produit->getTva()->getID(), PDO::PARAM_INT);
        $query->bindValue(":ID_categorie", $this->produit->getcategorie()->getID(), PDO::PARAM_INT);

        return $query->execute();

    }

    public function getAllProduct(PDO $bdd){
        $str = "SELECT * FROM produit";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();

        return $reponse;
    }


}

?>