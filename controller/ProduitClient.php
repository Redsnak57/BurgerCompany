<?php

function nosProduitsController(){
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

    include ("../vue/nosProduits.php");
}


    