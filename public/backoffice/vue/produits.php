<?php
//------Catégorie-----\\
$manager = new CategorieManager();
$manager->makeNewCategory(ConnectionDbAdmin::getInstance()->connection, $_POST);
// Supprime dans la table catégorie 
if(isset($_GET["supCategorie"])){
    $categorie = $manager->suppCategorieByID($bdd->connection, $_GET["supCategorie"]);
}
// Fait une boucle pour l'afficher dans produit + le tableau
$categorie = $manager->getAllCategorie(ConnectionDbAdmin::getInstance()->connection);

//------Tva-----\\
$tva = new TvaManager();
$tva->makeNewTva(ConnectionDbAdmin::getInstance()->connection, $_POST);
// Supprime dans la table tva 
if(isset($_GET["supTva"])){
    $tva->suppTvaByID($bdd->connection, $_GET["supTva"]);
}
// Fait une boucle pour l'afficher dans produit + le tableau
$allTva = $tva->getAllTva(ConnectionDbAdmin::getInstance()->connection);

//------Promotion-----\\
$promo = new PromoManager();
$promo->makeNewPromo(ConnectionDbAdmin::getInstance()->connection, $_POST);
// Supprime dans la table produit 
if(isset($_GET["supPromo"])){
    $promo->suppPromoByID($bdd->connection, $_GET["supPromo"]);
}
// Fait une boucle pour l'afficher dans produit + le tableau
$allPromo = $promo->getAllPromo(ConnectionDbAdmin::getInstance()->connection);

//------Produit-----\\
$produit = new ProduitManager();
$produit->makeNewProduit(ConnectionDbAdmin::getInstance()->connection, $_POST);
// Supprime dans la table produit 
if(isset($_GET["supProduit"])){
    $produit->suppProduitByID($bdd->connection, $_GET["supProduit"]);
}
// Fait une boucle pour l'afficher  le tableau
$allProduit = $produit->getAllProduct(ConnectionDbAdmin::getInstance()->connection);

//------Ingredient-----\\
$ingredient = new IngredientManager(ConnectionDbAdmin::getInstance()->connection);
$ingredient->makeNewIngredient($_POST);
// Supprime dans la table ingrédient 
if(isset($_GET["supIngredient"])){
    $ingredient->suppIngredientByID($_GET["supIngredient"]);
}
// Fait une boucle pour l'afficher  le produit + le tableau
$allIngredient = $ingredient->getAllIngredient();

?>

<h2 class="top-title">Produits</h2>
<p class="trait-title"></p>


<div class="container containerProduits">
    <div class="containerProduits__box categorie">
        <h1 class="box__titre">Ajouter une catégorie</h1>

        <form action="" method="POST">
            <input type="text" name="nom_categorie" id="nom_categorie" placeholder="Nouvelle catégorie">
            <input type="submit" value="Enregistrer" class="btn">
        </form>
    </div>  

    <div class="containerProduits__box ingredient">
        <h1 class="box__titre">Ajouter un ingrédient</h1>

        <form action="" method="POST">
            <input type="text" name="nom_ingredient" id="nom_ingredient" placeholder="Nom de l'ingredient">
            <input type="text" name="prixHt_ingredient" id="prixHt_ingredient" placeholder="Prix ht de l'ingredient">
            <input type="submit" value="Enregistrer" class="btn">
        </form>
    </div>  

    <div class="containerProduits__box tva">
        <h1 class="box__titre">Ajouter une tva</h1>

        <form action="" method="POST">
            <input type="text" name="tva" id="tva" placeholder="Pourcentage de la TVA">
            <input type="submit" value="Enregistrer" class="btn">
        </form>
    </div>  
    <div class="containerProduits__box promo">
        <h1 class="box__titre">Ajouter une promotion</h1>

        <form action="" method="POST">
            <input type="text" name="promoNom" id="promoNom" placeholder="Nom de la promotion">
            <input type="text" name="promoPourcentage" id="promoPourcentage" placeholder="Pourcentage de réduction">
            <input type="submit" value="Enregistrer" class="btn">
        </form>
    </div>  

    <!-- Ajouter un produit -->
    <div class="containerProduits__box produit">
        <h1 class="box__titre">Ajouter un produit </h1>

        <form action="" method="POST" enctype="multipart/form-data">

            <label class="obligationRemplir">
                <input type="text" name="nom_produit" id="nom_produit" placeholder="Nom du produit">
                <p>*</p>
            </label>

            <!-- Boucle des catégories -->
            <label class="obligationRemplir">
                <p>*</p>
                <select name="ID_categorie" id="">
                    <option value="">---Catégorie---</option>
                    <?php
                        foreach($categorie as $cat){
                            echo "<option value='{$cat->getID()}'> {$cat->getNom_categorie()} </option>";
                        }
                    ?>
                </select>
            </label>

            <!-- Prix du produit -->
            <label class="obligationRemplir">
                <input type="text" name="prixHt_produit" id="prixHt_produit" placeholder="Prix HT du produit">
                <p>*</p>
            </label>

            <!-- Boucle des TVA -->
            <label class="obligationRemplir">
                <p>*</p>
                <select name="ID_tva" id="">
                    <option value="">---TVA---</option>
                    <?php
                        foreach($allTva as $tvas){
                            echo "<option value='{$tvas->getID()}'> {$tvas->getTaux()}% </option>";
                        }
                    ?>
                </select>
            </label>

            <!-- Boucle des promos -->
            <select name="ID_promo" id="">
                <option value="">---Promotion (null si vide)---</option>
                <?php
                    foreach($allPromo as $promo){
                        echo "<option value='{$promo->getID()}'> {$promo->getNom_promo()} {$promo->getPourcentage_promo()}% </option>";
                    }
                ?>
            </select>

            <!-- Description du produit -->
            <label class="obligationRemplir">
                <p>*</p>
                <textarea name="description_produit" id="description_produit" placeholder="Description du produit"></textarea>
            </label>

            <!-- Image du produit -->
            <label class="obligationRemplir">
                <p>*</p>
                <input type="file" name="image_produit" id="image_produit">
            </label>

            <!-- Checkbox Dispo du produit -->
            <div>
                <label for="">Disponibilité : 
                    <input type="checkbox" class="disponnibilite_produit" name="disponnibilite_produit">
                </label>
            </div>

            <!-- Boucle des ingredients -->
            <div class="ingredientContainer">
                <?php 
                    foreach($allIngredient as $ing):
                ?>
                    <label for="ingredient-<?= $ing->getID(); ?>" class="checkboxLabel">
                        <input type="checkbox" id="ingredient-<?= $ing->getID(); ?>" name="ingredient[]" value="<?= $ing->getID(); ?>">
                        <span><?= $ing->getNom();?></span>
                    </label>
                <?php
                    endforeach;
                ?>
            </div>

            <?php

?>

            <input type="submit" value="Enregistrer" class="btn">
        </form>
    </div>   
</div>

<!-- Affichage des produits -->
<div class="nosProduits">
    <h1 class="box__titre"> Produits </h1>
    <div class="btnProduit" id="produitToggle">
        <div id="haut"><i class='bx bx-right-arrow-alt'></i></div>
    </div>

    <div class="table" id="tableProduit">
        <h3 class="table-title"> Nom</h3>
        <h3 class="table-title"> Catégorie</h3>
        <h3 class="table-title"> Prix</h3>
        <h3 class="table-title"> Image</h3>
        <h3 class="table-title"> Description</h3>
        <h3 class="table-title"> Gestion</h3>
    </div>

    <?php
       echo "<table class='table-style' id='tableStyleProduit'>";

        foreach($allProduit as $allProd){
        echo" 
            <tr class='resultatAffichage'>
                <td>{$allProd->getNom_produit()}</td>
                <td>{$allProd->getcategorie()->getNom_categorie()}</td>
                <td>{$allProd->getPrixHt_produit()}</td>
                <td><img src='../../asset/imgProduct/{$allProd->getImage_produit()}'</td>
                <td>{$allProd->getDescription_produit()}'</td>
                <td class='floatingBtn'><button><a href=index.php?page=produits&editProduit=".$allProd->getID()." class='btn modifier'> Modifier </td>
                <td class='floatingBtn'><button><a href=index.php?page=produits&supProduit=".$allProd->getID()." class='btn'> Supprimer </td>
            </tr>";
        }
    ?>
    </table>
</div>
<!-- Fin Affichage des produits -->

<!-- Affichage des ingrédients -->
<div class="nosProduits" id="ingredient">
    <h1 class="box__titre"> Ingrédients </h1>
    <div class="btnProduit" id="ingredientToggle">
        <div id="haut"><i class='bx bx-right-arrow-alt'></i></div>
    </div>

    <div class="table" id="tableIngredient">
        <h3 class="table-title"> Nom</h3>
        <h3 class="table-title"> Prix HT </h3>
        <h3 class="table-title"> Modifier</h3>
        <h3 class="table-title"> Supprimer</h3>
    </div>

    <?php
       echo "<table class='table-style' id='tableStyleIngredient'>";

        foreach($allIngredient as $ing){
        echo" 
            <tr class='resultatAffichage'>
                <td>{$ing->getNom()}</td>
                <td>{$ing->getPrixht()}€</td>
                <td class='floatingBtn'><button><a href=index.php?page=edit&ingredient=".$ing->getID()." class='btn modifier'> Modifier </td>
                <td class='floatingBtn'><button><a href=index.php?page=produits&supIngredient=".$ing->getID()." class='btn'> Supprimer </td>
                </tr>";
            }
    ?>
    </table>
</div>
<!-- Fin Affichage des ingrédients -->


<!-- Affichage des catégories -->
<div class="nosProduits" id="categorie">
    <h1 class="box__titre"> Catégories </h1>
    <div class="btnProduit" id="categorieToggle">
        <div id="haut"><i class='bx bx-right-arrow-alt'></i></div>
    </div>

    <div class="table" id="tableCategorie">
        <h3 class="table-title"> Nom</h3>
        <h3 class="table-title"> Modifier</h3>
        <h3 class="table-title"> Supprimer</h3>
    </div>

    <?php
       echo "<table class='table-style' id='tableStyleCategorie'>";

        foreach($categorie as $cat){
        echo" 
            <tr class='resultatAffichage'>
                <td>{$cat->getNom_categorie()}</td>
                <td class='floatingBtn'><button><a href=index.php?page=edit&categorie=".$cat->getID()." class='btn modifier'> Modifier </td>
                <td class='floatingBtn'><button><a href=index.php?page=produits&supCategorie=".$cat->getID()." class='btn'> Supprimer </td>
                </tr>";
            }
    ?>
    </table>
</div>
<!-- Fin Affichage des catégories -->

<!-- Affichage des tva -->
<div class="nosProduits" id="tva">
    <h1 class="box__titre"> Tvas </h1>
    <div class="btnProduit" id="tvaToggle">
        <div id="haut"><i class='bx bx-right-arrow-alt'></i></div>
    </div>

    <div class="table" id="tableTva">
        <h3 class="table-title"> Taux</h3>
        <h3 class="table-title"> Modifier</h3>
        <h3 class="table-title"> Supprimer</h3>
    </div>

    <?php
       echo "<table class='table-style' id='tableStyleTva'>";

        foreach($allTva as $tvas){
        echo" 
            <tr class='resultatAffichage'>
                <td>{$tvas->getTaux()} %</td>
                <td class='floatingBtn'><button><a href=index.php?page=edit&tva=".$tvas->getID()." class='btn modifier'> Modifier </td>
                <td class='floatingBtn'><button><a href=index.php?page=produits&supTva=".$tvas->getID()." class='btn'> Supprimer </td>
            </tr>";
        }
    ?>
    </table>
</div>
<!-- Fin Affichage des tva -->

<!-- Affichage des Promotions -->
<div class="nosProduits" id="promo">
    <h1 class="box__titre"> Promotions </h1>
    <div class="btnProduit" id="promoToggle">
        <div id="haut"><i class='bx bx-right-arrow-alt'></i></div>
    </div>

    <div class="table" id="tablePromo">
        <h3 class="table-title"> Nom</h3>
        <h3 class="table-title"> Pourcentage de réduction</h3>
        <h3 class="table-title"> Modifier</h3>
        <h3 class="table-title"> Supprimer</h3>
    </div>

    <?php
       echo "<table class='table-style' id='tableStylePromo'>";

        foreach($allPromo as $promos){
        echo" 
            <tr class='resultatAffichage'>
                <td>{$promos->getNom_promo()}</td>
                <td>{$promos->getPourcentage_promo()} %</td>
                <td class='floatingBtn'><button><a href=index.php?page=edit&promo=".$promos->getID()." class='btn modifier'> Modifier </td>
                <td class='floatingBtn'><button><a href=index.php?page=produits&supPromo=".$promos->getID()." class='btn'> Supprimer </td>
            </tr>";
        }
    ?>
    </table>
</div>
<!-- Fin Affichage des Promotions -->