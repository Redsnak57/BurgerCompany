<h2 class="top-title"> Liste des utilisateurs </h2>
<p class=trait-title></p>
<!-- search box -->
<div class="input-control">
    <label for="search"><i class="bi bi-search"></i></label>
    <input type="text" id="search" placeholder="Rechercher un utilisateur" onkeyup="search_client()">
</div>
<h2 class="main-title"> Utilisateur inscrit</h2>

<div class="table">
    <h3 class="table-title"> Nom</h3>
    <h3 class="table-title"> Prénom</h3>
    <h3 class="table-title"> Email</h3>
    <h3 class="table-title"> Ville</h3>
    <h3 class="table-title"> Gestion</h3>
</div>

<?php
$manager = new UserManager();

if(isset($_GET["supUser"])){
    $manager->suppUserByID($bdd->connection, $_GET["supUser"]);
}

$userList = $manager->getUsers($bdd->connection); 

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
</div>

