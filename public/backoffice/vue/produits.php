<?php

//------Catégorie-----\\
$manager = new CategorieManager();
$manager->makeNewCategory(ConnectionDbAdmin::getInstance()->connection, $_POST);
// Fait une boucle pour l'afficher dans produit 
$categorie = $manager->getAllCategorie(ConnectionDbAdmin::getInstance()->connection);

//------Tva-----\\
$tva = new TvaManager();
$tva->makeNewTva(ConnectionDbAdmin::getInstance()->connection, $_POST);
// Fait une boucle pour l'afficher dans produit 
$allTva = $tva->getAllTva(ConnectionDbAdmin::getInstance()->connection);

//------Promotion-----\\
$promo = new PromoManager();
$promo->makeNewPromo(ConnectionDbAdmin::getInstance()->connection, $_POST);
// Fait une boucle pour l'afficher dans produit 
$allPromo = $promo->getAllPromo(ConnectionDbAdmin::getInstance()->connection);

//------Produit-----\\
$produit = new ProduitManager();
$produit->makeNewProduit(ConnectionDbAdmin::getInstance()->connection, $_POST);

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

            <input type="text" name="nom_produit" id="nom_produit" placeholder="Nom du produit">

            <select name="ID_categorie" id="">
                <option value="">---Catégorie---</option>
                <?php
                    foreach($categorie as $cat){
                        echo "<option value='$cat[ID]'> $cat[nom_categorie] </option>";
                    }
                ?>
            </select>
            <input type="text" name="prixHt_produit" id="prixHt_produit" placeholder="Prix HT du produit">

            <select name="ID_tva" id="">
                <option value="">---TVA---</option>
                <?php
                    foreach($allTva as $tvas){
                        echo "<option value='$tvas[ID]'> $tvas[taux]% </option>";
                    }
                ?>
            </select>

            <select name="ID_promo" id="">
                <option value="">---Promotion (null si vide)---</option>
                <?php
                    foreach($allPromo as $promo){
                        echo "<option value='$promo[ID]'> $promo[nom_promo] $promo[pourcentage_promo]% </option>";
                    }
                ?>
            </select>

            <textarea name="description_produit" id="description_produit" placeholder="Description du produit"></textarea>

            <input type="file" name="image_produit" id="image_produit">

            <div>
                <label for="">Disponibilité : 
                    <input type="checkbox" class="disponnibilite_produit" name="disponnibilite_produit">
                </label>
            </div>

            <input type="submit" value="Enregistrer" class="btn">
        </form>
    </div>   
</div>

<div class="nosProduits">
    <h1 class="box__titre"> Les produits </h1>

    <div class="table">
        <h3 class="table-title"> Nom</h3>
        <h3 class="table-title"> Catégorie</h3>
        <h3 class="table-title"> Prix</h3>
        <h3 class="table-title"> Image</h3>
        <h3 class="table-title"> Gestion</h3>
    </div>

    <table class='table-style'>
        <tr class='resultatAffichage'>
            <td> ok </td>
            <td> ok </td>
            <td> ok </td>
            <td> ok </td>
            <td> X </td>
        </tr>
    </table>
</div>