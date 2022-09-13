<?php

$title = "Modification";

if(isset($_GET["promo"])){
    $title = "Promotions";
} elseif(isset($_GET["tva"])){
    $title = "Tvas";
} elseif(isset($_GET["categorie"])){
    $title = "Catégories";
} elseif(isset($_GET["ingredient"])){
    $title = "Ingrédients";
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
// Produit à finir !!  
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
?>


