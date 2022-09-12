<?php
require("../class/ConnectionDb.php");
require("../model/PanierManager.php");
$bdd = ConnectionDb::getInstance("localhost", "burgercompany", "root", "");

// Panier 
$panier = new PanierManager();
$panierID = $panier->getID(ConnectionDb::getInstance()->connection, $_GET);


    if(isset($_GET["ID"])){
        var_dump($panierID);
    } else {
        die("Vous n'avez pas sélectionné de produit à ajotuer au panier");
    }

?>