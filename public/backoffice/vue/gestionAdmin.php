<?php
if(isset($_POST["email"],$_POST["password"],$_POST["cEmail"],$_POST["cPassword"])){
    if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["cEmail"]) && !empty($_POST["cPassword"])){
        if($_POST["email"] != $_POST["cEmail"]){
            echo "<p class='msg erreur'> Les emails ne correspondent pas.</p>";
        } elseif($_POST["password"] != $_POST["cPassword"]){
            echo "<p class='msg erreur'> Les mots de passe ne correspondent pas.</p>";
        } else {
            $manager = new AdminManager();
            $admin = $manager->createAdmin($_POST);
            $manager->saveAdmin(ConnectionDbAdmin::getInstance()->connection, $admin);
        }
    } else {
        echo "<p class='msg erreur'> Merci de remplir tout les champs.</p>";
    } 
}


?>
<h2 class="top-title"> Gestion des administrateurs </h2>
<p class=trait-title></p>

<h2> ajouter un administrateur </h2>
<div class="container addAdmin">
    <div class="wrapper">
        <form action="" method="POST">
            <div class="row">
                <i class="bi bi-envelope"></i>
                <input type="text" name="email" placeholder="Email du futur administrateur" required>
            </div>
            <div class="row">
                <i class="bi bi-envelope"></i>
                <input type="text" name="cEmail" placeholder="Confirmer l'email" required>
            </div>
            <div class="row">
                <i class="bi bi-key"></i>
                <input type="password" name="password" placeholder="Sont mot de passe" required>
            </div>
            <div class="row">
                <i class="bi bi-key"></i>
                <input type="password" name="cPassword" placeholder="Confirmer sont mot de passe" required>
            </div>
            <div class="row button">
                <input type="submit" value="Nouvelle administrateur">
            </div>
        </form>
    </div>
</div>

<h2> Voir le(s) administrateur(s) </h2>

<?php

$afficher_admin = new AfficherAdmin();
$admin = $afficher_admin->afficherAdmin($bdd, $user);
$afficher_admin->afficherAdmin(ConnectionDbAdmin::getInstance()->connection, $user);


foreach ($affichageVehicule as $index) {
echo "<tr>
    <td>$index[email]</td>

</tr>

";

}


?>