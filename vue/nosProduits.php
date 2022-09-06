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

    <div class="produits__filters">
        <span class="produits__item" data-filter="all">  Tous </span>
        <?php
        foreach($categorieClient as $cat){
            $filter = strtolower(str_replace("é","e", $cat["nom_categorie"]));
            echo "<span class='produits__item' data-filter=$filter> $cat[nom_categorie] </span>";
        }
        ?>
    </div>


    <?php foreach($categorieClient as $cat): 
            $filter = strtolower(str_replace("é","e", $cat["nom_categorie"]));
        ?>
        <div class="container nosProduits" data-item="<?= $filter ?>">
        
            <!-- fait une boucle pour afficher les produits -->        
            <?php
            // Si la catégorie a l ID qui corresponde a l ID de produit alors filtre pour afficher le bon 
            foreach($newProduit as $prod){
                if($cat['ID'] == $prod['ID_categorie']):
                    $total = $prod["prixht_produit"] + ($prod["prixht_produit"] * ($prod["taux"]/100));
                    $offre = $prod['ID_promo'];
                    if($offre != null):
                        $offre = $offreManager->getOffreById(intval($offre));
                        $totalPromo = $offre->calcPrixReduit($total);
            ?>
                <div class="box promo" style="--reduc:'<?= $offre->getPourcentageString(); ?>';">
                    <p><?= $prod["nom_produit"]; ?></p>
                    <img src="./asset/imgProduct/<?= $prod["image_produit"]; ?>">
                    <div class="acheter">
                        <i class="gauche_i fa-solid fa-info"></i>
                        <i class="droite_i fa-solid fa-basket-shopping"></i>
                        <p class="prix prixPromo"><?= number_format($total,2,",",".") ?>€</p>
                        <p class="prix"><?= $totalPromo; ?>€</p>
                    </div>
                </div>
                <?php
                    else:
                        ?>
    	        <div class="box">
                    <p><?= $prod["nom_produit"]; ?></p>
                    <img src="./asset/imgProduct/<?= $prod["image_produit"]; ?>">

                    <button data-popup-ref="monPopup">Modal </button>

                    <div class="popup" data-popup-id="monPopup">
                        <div class="popupContent">
                            <!-- Header popup -->
                            <div class="popupHeader">
                                <p><?= $prod["nom_produit"]; ?></p>
                                <span class="btnClose" data-dismiss-popup id="closeCroix"> &times; </span>
                            </div>
                            <!-- Body  popup-->
                            <div class="popupBody">
                                <div id="imgPopup">
                                    <img id="imgPopup" src="./asset/imgProduct/<?= $prod["image_produit"]; ?>">
                                </div>
                                <div id="descPopup">
                                    <p><?= $prod["description_produit"]; ?></p>
                                </div>
                                <div id="ingredientPopup">
                                   
                                </div>
                            </div>
                            <!-- Footer Popup -->
                            <div class="popupFooter">
                                <button class="btnClose" data-dismiss-popup>Fermer</button>
                            </div>
                        </div>
                    </div>
                    <div class="acheter">
                        <!-- Panier test  -->
                        <?php
                        foreach($allProduit as $all){
                        ?>
                            <i class="gauche_i fa-solid fa-info">
                                <a href="../vue/addPanier.php?ID=<?=$all["ID"]?>"></a>
                            </i>
                            <i class="droite_i fa-solid fa-basket-shopping">
                                <a href="../vue/addPanier.php?ID=<?=$all["ID"]?>"></a>
                            </i>    
                        <?php
                        }
                        ?>
                        <!-- Fin panier test -->
                        <p class="prix"><?= number_format($total,2,",",".") ?>€</p>
                    </div>
                </div>
            <?php
                    endif;
                endif;
            }
            ?>       
    </div>

    <?php endforeach; ?>


</section>