<?php

// $manager = new CategorieManager();
// $manager->makeNewCategory($bdd->connection, $_POST);


?>

<h2 class="top-title">Produits</h2>
<p class="trait-title"></p>


<div class="container containerProduits">
    <div class="containerProduits__box">
        <h1 class="box__titre">Ajouter une catégorie</h1>

        <form action="" method="POST">
            <input type="text" name="nom_categorie" id="nom_categorie" placeholder="Nouvelle catégorie">
            <input type="submit" value="Enregistrer" class="btn">
        </form>
    </div>  

    <div class="containerProduits__box">
        <h1 class="box__titre">Ajouter un produit </h1>

        <form action="" method="POST">
            <input type="text" name="nom_produit" id="nom_produit" placeholder="Nom du produit">
            <select name="" id="">
                <option value="">---Catégorie---</option>
            </select>
            <input type="text" name="prix_produit" id="prix_produit" placeholder="Prix du produit">
            <input type="file" name="prix_produit" id="prix_produit" placeholder="Prix du produit">
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