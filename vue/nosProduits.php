<?php
//------Catégorie-----\\
$manager = new CategorieClientManager();
// Fait une boucle pour l'afficher dans produit
$categorieClient = $manager->getAllClientCategorie(ConnectionDb::getInstance()->connection);

//------Produit-----\\
$produit = new ProduitClientManager();
// Fait une boucle pour l'afficher dans produit
$newProduit = $produit->getAllClientProduct(ConnectionDb::getInstance()->connection);
$allProduit = $produit->getAllProduit(ConnectionDb::getInstance()->connection);

// Recupere la promo 
$offreManager = new OffreManager(ConnectionDb::getInstance()->connection);

?>



<section class="nosProduits">
    <div class="heading">
        <p>Découvre tous <span> nos produits</span></p>
    </div>

    <span> Panier <a href="index.php?page=addPanier"><?= array_sum($_SESSION["panier"]); ?></a></span>

    <div class="produits__filters" id="filters">
        <span class="produits__item " data-filter="*"> Tous </span>
        <?php
        foreach ($categorieClient as $cat) {
            $nomCatSansEspace = str_replace(' ', '', $cat['nom_categorie']);

        ?>
            <span class='produits__item' data-filter=".<?php echo $nomCatSansEspace ?>"> <?= $cat['nom_categorie'] ?> </span>
        <?php } ?>
    </div>



    <div class="nosProduits container filtre">
        <!-- fait une boucle pour afficher les produits -->
        <?php 
        foreach ($newProduit as $prod) {

            $nomCatSansEspace = str_replace(' ', '', $prod['nom_categorie']);
            $total = $prod["prixht_produit"] + ($prod["prixht_produit"] * ($prod["taux"] / 100));
    
            $offre = $prod["ID_promo"];

            if ($offre != null) {
                $offre = $offreManager->getOffreById(intval($offre));
                $totalPromo = $offre->calcPrixReduit($total);

        ?>

        <div class="box promo element-item grid-sizer <?= $nomCatSansEspace ?>" style="--reduc:'<?= $offre->getPourcentageString(); ?>';">
            <p><?= $prod["nom_produit"]; ?></p>
            <img src="./asset/imgProduct/<?= $prod["image_produit"]; ?>">

            <div class="acheter">
                <i class="gauche_i fa-solid fa-info" data-popup-id="monPopup"></i>
                <a href="index.php?page=addPanier&ID=<?= $prod['ID']; ?>"><i class="droite_i fa-solid fa-basket-shopping"></i></a>
                <p class="prix prixPromo"><?= number_format($total, 2, ",", ".") ?>€</p>
                <p class="prix"><?= $totalPromo; ?>€</p>
            </div>
        </div>
    <?php
        } else {
    ?>

        <div class="box element-item grid-sizer <?= $nomCatSansEspace ?>">
            <p><?= $prod["nom_produit"]; ?></p>
            <img src="./asset/imgProduct/<?= $prod["image_produit"]; ?>">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <a href="index.php?page=addPanier&ID=<?= $prod['ID']; ?>"><i class="droite_i fa-solid fa-basket-shopping"></i></a>
                <p class="prix"><?= number_format($total, 2, ",", ".") ?>€</p>
            </div>
        </div>
    <?php
            }
        }
    ?>

    </div>

</section>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="../public/asset/js/filterProduit.js"></script>