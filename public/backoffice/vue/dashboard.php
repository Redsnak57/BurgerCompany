<h2 class="top-title"> Tableau de bord </h2>
<p class=trait-title></p>
<!-- Container suivis des stats  -->
<div class="container">
    <div class="box">
            <span>
                <?php
                $afficher_user = new DashboardManager();
                echo $afficher_user->getUser(ConnectionDbAdmin::getInstance()->connection);
                ?>
            </span>
            <p> utilisateurs inscrit</p>
            <i class="bi bi-people-fill"></i>
    </div>
    <div class="box">
            <span>
                <?php
                $afficher_produit = new DashboardManager();
                echo $afficher_produit->getProduit(ConnectionDbAdmin::getInstance()->connection);
                ?>
            </span>
            <p> Produits</p>
            <i class="bi bi-people-fill"></i>
    </div>
    <div class="box">
            <span> 23</span>
            <p> Commandes confirmé</p>
            <i class="bi bi-bag-check"></i>
    </div>
    <div class="box">
            <span> 3</span>
            <p> Commandes en attente</p>
            <i class="bi bi-bag-dash"></i>
    </div>
    <div class="box">
            <span> 195€</span>
            <p> Recette</p>
            <i class="bi bi-cash"></i>
    </div>
</div>

<!-- Container graphique visuel -->
<div class="container charts">
    <div class="box">
        <canvas class="shadow" id="chartClients"></canvas>
    </div>
    <div class="box">
        <canvas class="shadow" id="chartRecette"></canvas>
    </div>
</div>

<!-- 10 dernier user inscrit  -->
<h2 class="main-title"> 10 derniers utilisateurs inscrits</h2>

<div class="table">
    <h3 class="table-title"> Nom</h3>
    <h3 class="table-title"> Prénom</h3>
    <h3 class="table-title"> Email</h3>
    <h3 class="table-title"> Ville</h3>
    <h3 class="table-title"> Gestion</h3>
</div>


<?php

$manager = new UserManager();
$userList = $manager->getLastTenUsers(ConnectionDbAdmin::getInstance()->connection); 

echo "<table class='table-style'>";

foreach($userList as $user){
    echo "<tr class='resultatAffichage'>
            <td>{$user->getNom()}</td>
            <td>{$user->getPrenom()}</td>
            <td>{$user->getEmail()}</td>
            <td>{$user->getVille()->getNom()}</td>
            <td class='floatingBtn'><button>
                <a href=index.php?page=utilisateur&supUser=".$user->getID()." class=btn>Supprimer
            </button></td>
        </tr>";
}

?>

