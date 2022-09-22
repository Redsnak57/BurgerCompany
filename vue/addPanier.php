<?php
// Panier 
// $panier = new PanierManager();
// $str = "SELECT * FROM produit WHERE ID IN (". implode(',',$panier).")";
// $query = $bdd->prepare($str);
// $query->execute();
// $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($reponse); exit; 


// $produit = $panier->getID(ConnectionDb::getInstance()->connection,$_GET); 
// $getPanier = $panier->getPanier(ConnectionDb::getInstance()->connection, $panier);


if(!isset($_SESSION)){
    session_start();
   
}else{

    $ids = array_keys($_SESSION["panier"]);

}
// supprime encore des bugs
if(isset($_GET["del"])){
    $ID_del = $_GET["del"];
    unset($_SESSION["panier"][$ID_del]);
}

// créer une session panier
if(!isset($_SESSION["panier"])){
    $_SESSION["panier"] = array();
}

if(isset($_GET["ID"]) && !empty($_GET['ID'])){
    $ID = $_GET["ID"];

    // si le produit n'existe pas
    if(empty($produit)){
        die("Ce produit n'existe pas");
    }
    // ajoute le produit dans le panier (tableau)

    if(isset($_SESSION["panier"][$ID])){ // si produit déjà dans panier 
        $_SESSION["panier"][$ID]++; // Réprésnte la qqt
    } else { // sinon on ajoute le produit
        $_SESSION["panier"][$ID] = 1;
    }
    header("Location: index.php?page=nosProduits");
}
?>

<div class="panier">
    <!-- <a href="" class="link"> Boutique</a> --> 
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php
            // liste des produits
            // récupéré les clés du tableau (Panier session)

             if(empty($ids)){
                echo "Votre panier est vide";
            } else {
                $total =0;
                var_dump($getPanier); 
                foreach($getPanier as $product):
                    $total += $product["prixht_produit"] * $_SESSION['panier'][$product["ID"]];
                    
            ?>
                <tr>
                    <td><img src="./asset/imgProduct/<?= $product["image_produit"]; ?>"></td>
                    <td><?= $product["nom_produit"] ?></td>
                    <td><?= $product["prixht_produit"] ?>€</td>
                    <td><?= $_SESSION['panier'][$product["ID"]] ?></td>
                    <td><a href="index.php?page=addPanier&del=<?= $product["ID"]; ?>"><img src="../public/asset/img/delete.png" alt=""></a></td>
                </tr>
                
            <?php endforeach; } ?>


            <tr class="total">
            <?php
            
            if(!empty($ids)){ ?>
                <th>Total : <?= $total ?>€</th>
            <?php } ?>
            </tr>
        </table>
    </section>
</div>