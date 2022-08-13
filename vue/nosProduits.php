<?php
//------Catégorie-----\\
$manager = new CategorieClientManager();
// Fait une boucle pour l'afficher dans produit
$categorieClient = $manager->getAllClientCategorie(ConnectionDb::getInstance()->connection);

//------Produit-----\\
$produit = new ProduitClientManager();
// Fait une boucle pour l'afficher dans produit
$newProduit = $produit->getAllClientProduct(ConnectionDb::getInstance()->connection);
?>

<section class="vedettes">
    <div class="heading">
        <p>Découvre tous <span> nos produits</span></p>
    </div>

    <div class="produits__filters">
        <span class="produits__item" data-filter="all">  Tous </span>
        <span class="produits__item" data-filter="entree">  Entrée </span>
        <span class="produits__item" data-filter="boeuf"> Burger boeuf </span>
        <span class="produits__item" data-filter="poulet"> Burger poulet </span>
        <span class="produits__item" data-filter="dessert"> Dessert </span>
        <?php
        foreach($categorieClient as $cat){
            echo "<span> $cat[nom_categorie] </span>";
        }
        ?>
    </div>


    <div class="container nosProduits" data-item="entree">
        <div class="box">
            <p> Wrap</p>
            <img src="../public/asset/img/wrap.jpeg" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
        <!-- test php -->
        <div class="box">
            <?php
            foreach($newProduit as $prod){
            ?>
                <p><?= $prod["nom_produit"]; ?></p>
                <img src="./asset/imgProduct/<?= $prod["image_produit"]; ?> alt="">
                <div class="acheter">
                    <i class="gauche_i fa-solid fa-info"></i>
                    <i class="droite_i fa-solid fa-basket-shopping"></i>
                    <p class="prix_promo"><?= $prod["prixht_produit"]; ?>€</p>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- fin test php -->
        <div class="box promo">
            <p> Wrap</p>
            <img src="../public/asset/img/wrap.jpeg" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
    </div>

    <div class="container nosProduits" data-item="boeuf">
        <div class="box promo" >
            <p> Double cheese Burger</p>
            <img src="../public/asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
        <div class="box promo">
            <p> Double cheese Burger</p>
            <img src="../public/asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
        <div class="box">
            <p> Double cheese Burger</p>
            <img src="../public/asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix">5.99€</p>
            </div>
        </div>
        <div class="box">
            <p> Double cheese Burger</p>
            <img src="../public/asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix">5.99€</p>
            </div>
        </div>
    </div>

    <div class="container nosProduits" data-item="dessert">
        <div class="box" >
            <p> Tiramisu</p>
            <img src="../public/asset/img/tira.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
        <div class="box promo">
            <p> Tiramisu</p>
            <img src="../public/asset/img/tira.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
    </div>
</section>