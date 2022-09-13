<?php

$title = "Modification";

if(isset($_GET["promo"])){
    $title = "Promotion";
} elseif(isset($_GET["tva"])){
    $title = "Tva";
} elseif(isset($_GET["categorie"])){
    $title = "Catégorie";
} elseif(isset($_GET["ingredient"])){
    $title = "Ingrédient";
} elseif(isset($_GET["produit"])){
    $title = "Produit";
}
?>

<h2 class="top-title"><?= $title; ?></h2>
<p class="trait-title"></p>

<?php
// Promotion 
$promo = new PromoManager();

// Si le formulaire promo est remplis update la BDD
if(isset($_POST["ID"],$_POST["nom_promo"],$_POST["pourcentage_promo"])){
    $promo->setEditPromo($bdd->connection, $_POST);
}

// Si la balise GET promo est trouvé alors recupère l'ID
if(isset($_GET["promo"])){
    $affichePromo = $promo->getPromoByID($bdd->connection, $_GET["promo"]);
?>
    <form method="POST">
        <input type="hidden" name="ID" value="<?= $affichePromo->getID(); ?>">
        <span>Le nom est : </span>
        <input type="text" name="nom_promo" value="<?= $affichePromo->getNom_promo(); ?>">
        <span>La promotion est de : </span>
        <input type="text" name="pourcentage_promo" value="<?= $affichePromo->getPourcentage_promo(); ?>">
        <button type="submit">Modifier</button>
    </form>
<?php
    }

// Tva 
$tva = new TvaManager();

// Si le formulaire tva est remplis update la BDD
if(isset($_POST["ID"],$_POST["taux"])){
    $tva->setEditTva($bdd->connection, $_POST);
}

// Si la balise GET tva est trouvé alors recupère l'ID
if(isset($_GET["tva"])){
    $afficheTva = $tva->getTvaByID($bdd->connection, $_GET["tva"]);
?>
    <form method="POST">
        <input type="hidden" name="ID" value="<?= $afficheTva->getID(); ?>">
        <span>Le taux est : </span>
        <input type="text" name="taux" value="<?= $afficheTva->getTaux(); ?>">
        <button type="submit">Modifier</button>
    </form>
<?php
    }
// Categorie 
$categorie = new CategorieManager();

// Si le formulaire tva est remplis update la BDD
if(isset($_POST["ID"],$_POST["nom_categorie"])){
    $categorie->setEditCategorie($bdd->connection, $_POST);
}

// Si la balise GET tva est trouvé alors recupère l'ID
if(isset($_GET["categorie"])){
    $afficheCategorie = $categorie->getCategorieByID($bdd->connection, $_GET["categorie"]);
?>
    <form method="POST">
        <input type="hidden" name="ID" value="<?= $afficheCategorie->getID(); ?>">
        <span>La catégorie est : </span>
        <input type="text" name="nom_categorie" value="<?= $afficheCategorie->getNom_categorie(); ?>">
        <button type="submit">Modifier</button>
    </form>
<?php
    }
// Ingredient 
$ingredient = new IngredientManager(ConnectionDbAdmin::getInstance()->connection);

// Si le formulaire tva est remplis update la BDD
if(isset($_POST["ID"],$_POST["nom_ingredient"], $_POST["prixht_ingredient"])){
    $ingredient->setEditIngredient($_POST);
}

// Si la balise GET tva est trouvé alors recupère l'ID
if(isset($_GET["ingredient"])){
    $afficheIngredient = $ingredient->getIngredientByID($_GET["ingredient"]);
?>
    <form method="POST">
        <input type="hidden" name="ID" value="<?= $afficheIngredient->getID(); ?>">
        <span>Le nom de l'ingredient est : </span>
        <input type="text" name="nom_ingredient" value="<?= $afficheIngredient->getNom(); ?>"> 
        <span>Le prix est : </span>
        <input type="text" name="prixht_ingredient" value="<?= $afficheIngredient->getPrixHt(); ?>"> 
        <button type="submit">Modifier</button>
    </form>
<?php
    }


// Produit  
$produit = new ProduitManager();
$allPromo = $promo->getAllPromo(ConnectionDbAdmin::getInstance()->connection);
$allTva = $tva->getAllTva(ConnectionDbAdmin::getInstance()->connection);
$allCategorie = $categorie->getAllCategorie(ConnectionDbAdmin::getInstance()->connection);

// Si le formulaire tva est remplis update la BDD
if(isset($_POST["ID"],$_POST["nom_produit"],$_POST["prixht_produit"],$_FILES["image_produit"],$_POST["description_produit"],$_POST["ID_promo"],$_POST["ID_tva"],$_POST["ID_categorie"])){
    $produit->setEditProduit($bdd->connection, $_POST);
}

// Si la balise GET tva est trouvé alors recupère l'ID
if(isset($_GET["produit"])){
    $afficheProduit = $produit->getProduitByID($bdd->connection, $_GET["produit"]);
?>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?= $afficheProduit->getID(); ?>">
        <span>Le nom est : </span>
        <input type="text" name="nom_produit" value="<?= $afficheProduit->getNom_produit(); ?>">
        <span> Il coute : </span>
        <input type="text" name="prixht_produit" value="<?= $afficheProduit->getPrixht_produit(); ?>">
        <span> L'image :</span>
        <input type="file" name="image_produit" id="image_produit">
        <span> La description :</span>
        <input type="text" name="description_produit" value="<?= $afficheProduit->getDescription_produit(); ?>">
        <span> Disponnible :</span>
            <?php
             echo $afficheProduit->getDisponnibilite_produit() 
                ? ' <input type="checkbox" class="disponnibilite_produit" name="disponibilite_produit" checked>'
                : ' <input type="checkbox" class="disponnibilite_produit" name="disponibilite_produit" >' ;
            ?>
        <select name="ID_promo" id="">
            <option value="">---Promotion (null si vide)---</option>
            <?php
                foreach($allPromo as $promo){
                    if($promo->getID() == $afficheProduit->getPromo()->getID()){
                        echo "<option value='{$promo->getID()}' selected> {$promo->getNom_promo()} {$promo->getPourcentage_promo()}% </option>";
                    } else {
                        echo "<option value='{$promo->getID()}'> {$promo->getNom_promo()} {$promo->getPourcentage_promo()}% </option>";
                    }
                }
            ?>
        </select>
        <select name="ID_tva" id="">
            <option value="">---TVA---</option>
            <?php
                foreach($allTva as $tvas){
                    if($tvas->getID() == $afficheProduit->getTva()->getID()){
                        echo "<option value='{$tvas->getID()}' selected> {$tvas->getTaux()}% </option>";
                    }else {
                        echo "<option value='{$tvas->getID()}'> {$tvas->getTaux()}% </option>";
                    }
                }
            ?>
        </select>
        <select name="ID_categorie" id="">
            <option value="">---Catégorie---</option>
            <?php
                foreach($allCategorie as $cat){
                    if($cat->getID() == $afficheProduit->getcategorie()->getID()){
                        echo "<option value='{$cat->getID()}' selected> {$cat->getNom_categorie()} </option>";
                    }else {
                        echo "<option value='{$cat->getID()}'> {$cat->getNom_categorie()} </option>";
                    }
                }
            ?>
        </select>
        <button type="submit">Modifier</button>
    </form>
<?php
    }
?>


