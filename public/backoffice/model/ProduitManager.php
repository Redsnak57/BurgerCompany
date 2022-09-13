<?php

class ProduitManager {
    private Produit $produit;

    /**
     * Créer un objet Produit, avec l'insertion en BDD grâce à setNewProduit, avec l'image grâce à setNewImage
     *
     * @param PDO $bdd
     * @param array $produits
     * @return bool
     */
    public function makeNewProduit(PDO $bdd, array $produits): bool{
        if(isset($produits["nom_produit"],$produits["ID_categorie"], $produits["prixHt_produit"], $produits["ID_tva"], $produits["ID_promo"], $produits["description_produit"], $_FILES["image_produit"])){
            if(!empty($produits["nom_produit"] && !empty($produits["prixHt_produit"] && !empty($produits["description_produit"]) && !empty($produits["ID_categorie"] && !empty($produits["ID_tva"]))))){
                $this->produit = new Produit(null, $produits["nom_produit"], $produits["ID_categorie"], $produits["prixHt_produit"], $produits["ID_tva"], $produits["ID_promo"], $produits["description_produit"], isset($produits["disponnibilite_produit"]) ? "1" : "0", $_FILES["image_produit"]["name"]);
        
                if(isset($produits['ingredient'])){
                    foreach($produits['ingredient'] as $ingredient){
                        $this->produit->addIngredient($ingredient);
                    }
                }

                if($this->setNewProduit($bdd)){
                    if($this->setNewImage()){
                    return 1;
                    }
                } else {
                    return 0;
                }
            } else {
                echo "Merci de remplir tout les champs obligatoire.";
            }
        }
        return 0;
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
                    if(move_uploaded_file($file['tmp_name'], $savePath)){
                    //    condition extension image
                    // $extensions = array('png', '/gif', '/jpg', '/jpeg');
                    // //vérifie si l'extension est dans notre tableau           
                    // if(!in_array($savePath, $extensions)){
                    //     echo 'Vous devez uploader un fichier de type png, gif, jpg, jpeg.';
                    // } else {
                    //     // defini une taille maximal 
                    //     define('MAXSIZE', 500000);       
                    //     if($_FILES['image_produit']['size'] > MAXSIZE){
                    //     echo 'Votre image est supérieure à la taille maximale de '.MAXSIZE.' octets';
                    //     } 
                    // }
                    echo "ok";
                    } else {
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
     * @return bool
     */
    public function setNewProduit(PDO $bdd): bool{
        $str = "INSERT INTO produit (nom_produit, prixht_produit, image_produit, description_produit,	disponibilite_produit, ID_promo, ID_tva, ID_categorie) VALUES(:nom_produit, :prixht_produit, :image_produit, :description_produit, :disponibilite_produit, :ID_promo, :ID_tva, :ID_categorie)";
        $query = $bdd->prepare($str);
        $query->bindValue(":nom_produit", $this->produit->getNom_produit(), PDO::PARAM_STR);
        $query->bindValue(":prixht_produit", $this->produit->getPrixHt_produit(), PDO::PARAM_STR);
        $query->bindValue(":image_produit", $_FILES['image_produit']['name'], PDO::PARAM_STR);
        $query->bindValue(":description_produit", $this->produit->getDescription_produit(), PDO::PARAM_STR);
        $query->bindValue(":disponibilite_produit", $this->produit->getDisponnibilite_produit(), PDO::PARAM_INT);
        $query->bindValue(":ID_promo", $this->produit->getPromo() != null ? $this->produit->getPromo()->getID() : null, PDO::PARAM_INT);
        $query->bindValue(":ID_tva", $this->produit->getTva()->getID(), PDO::PARAM_INT);
        $query->bindValue(":ID_categorie", $this->produit->getcategorie()->getID(), PDO::PARAM_INT);

        if($query->execute()){
            if($this->produit->hasIngredient()){
                $str = 'SELECT LAST_INSERT_ID() as ID FROM produit';
                $query=$bdd->query($str);
                $ID = $query->fetch(PDO::FETCH_ASSOC);
                $this->produit->hydrate($ID);
                $str = "INSERT INTO ingredient_produit(qte_ingredient_produit, ID_produit, ID_ingredient) VALUES(:qte, :ID_produit, :ID_ingredient)";

                foreach($this->produit->getIngredient() as $ing){
                    $IDing = $ing->getID();
                    $query = $bdd->prepare($str);
                    $query->bindValue(":qte", 1, PDO::PARAM_INT);
                    $query->bindValue(":ID_produit", $this->produit->getID(), PDO::PARAM_INT);
                    $query->bindValue(":ID_ingredient", $IDing, PDO::PARAM_INT);
                    if(!$query->execute()){
                        return false;
                    }
                }
            return true;
            } else {
            return true;
           }

        } else {
            return false;
        }

    }

    public function getAllProduct(PDO $bdd): array{
        $array = [];

        $str = "SELECT * FROM produit";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($reponse as $prod){
            $object = new Produit();
            $object->hydrate($prod);
            array_push($array,$object);
        }
        return $array;
    }


    public function suppProduitByID(PDO $bdd, int $ID){
        $reqDelete = "DELETE FROM produit WHERE ID=:ID";
        $query = $bdd->prepare($reqDelete);
        $query->bindValue(":ID", $ID, PDO::PARAM_INT);

        if($query->execute()){
            
        } else {
            echo "Une erreur c'est produite.";
        }
    }

    public function getProduitById(PDO $bdd, int $id): Produit{
        $produit = new Produit();

        $str = 'SELECT * FROM produit WHERE ID = :id';
        $query = $bdd->prepare($str);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        if($query->execute()){
            $data = $query->fetch(PDO::FETCH_ASSOC);
            if($data != false){
                $produit->hydrate($data);
            }
        }

        return $produit;
    }

    public function setEditProduit(PDO $bdd, array $produit): bool{
        $this->produit = new Produit();

        foreach($produit as $key => $prod){
            if(is_numeric($prod)){
                if(stristr($prod,",") != false OR stristr($prod, ".") != false){
                    $produit[$key] = floatval($prod);
                } else {
                    $produit[$key] = intval($prod);
                }
            }
            if(empty($prod)){
                $produit[$key] = null;
            }
        }
        var_dump($_POST,$produit);
        $this->produit->hydrate($produit);

        $str = "UPDATE produit SET nom_produit=:nom_produit, prixht_produit=:prixht_produit, image_produit=:image_produit, description_produit=:description_produit, disponibilite_produit=:disponibilite_produit, ID_promo=:ID_promo, ID_tva=:ID_tva, ID_categorie=:ID_categorie WHERE ID=:ID";
        $query = $bdd->prepare($str);
        $query->bindValue(":nom_produit", $this->produit->getNom_produit(), PDO::PARAM_STR);
        $query->bindValue(":prixht_produit", $this->produit->getPrixHt_produit(), PDO::PARAM_STR);
        $query->bindValue(":image_produit", $_FILES['image_produit']['name'], PDO::PARAM_STR);
        $query->bindValue(":description_produit", $this->produit->getDescription_produit(), PDO::PARAM_STR);
        $query->bindValue(":disponibilite_produit", $this->produit->getDisponnibilite_produit(), PDO::PARAM_BOOL);
        $query->bindValue(":ID_promo", $this->produit->getPromo()->getID(), PDO::PARAM_INT);
        $query->bindValue(":ID_tva", $this->produit->getTva()->getID(), PDO::PARAM_INT);
        $query->bindValue(":ID_categorie", $this->produit->getcategorie()->getID(), PDO::PARAM_INT);
        $query->bindValue(":ID", $this->produit->getID(), PDO::PARAM_INT);

        if($query->execute()){
            $this->setNewImage();
            // header("Location: index.php?page=produits");
            return true;
        }
        return false;
    }

}

?>