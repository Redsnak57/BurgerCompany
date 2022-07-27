<?php
if(isset($_POST["email"],$_POST["password"],$_POST["cEmail"],$_POST["cPassword"])){
    if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["cEmail"]) && !empty($_POST["cPassword"])){
        if($_POST["email"] != $_POST["cEmail"]){
            echo "<p class='msg erreur'> Les emails ne correspondent pas.</p>";
        } elseif($_POST["password"] != $_POST["cPassword"]){
            echo "<p class='msg erreur'> Les mots de passe ne correspondent pas.</p>";
        } else {
            $manager = new AdminManager();
            // $admin = $manager->createAdmin($_POST);
            // $manager->saveAdmin(ConnectionDbAdmin::getInstance()->connection, $admin);
        }
    } 
}

?>

<h2 class="top-title"> Paramètre de compte </h2>
<p class=trait-title></p>

<div class="container-addAdmin">
    <div class="wrapper">
    <h2> Modifier vos informations </h2>
    <div class="infoActuel">
        <span>Votre email : 
            <?php 
            // faux
        // $manager = new AdminManager();
        // $manager->getInfoSettings($bdd);
            ?> 
        </span>
        <span>Votre mot de passe : sddd</span>
    </div>
        <form action="" method="POST">
            <div class="row">
                <i class="bi bi-envelope"></i>
                <input type="text" name="email" placeholder="Nouvelle adresse email">
            </div>
            <div class="row">
                <i class="bi bi-envelope"></i>
                <input type="text" name="cEmail" placeholder="Confirmer l'email">
            </div>
            <div class="row">
                <i class="bi bi-key"></i>
                <input type="password" name="password" placeholder="Nouveau mot de passe">
            </div>
            <div class="row">
                <i class="bi bi-key"></i>
                <input type="password" name="cPassword" placeholder="Confirmer le mot de passe">
            </div>
            <div class="row button">
                <input type="submit" value="Mettre à jours mes informations">
            </div>
        </form>
    </div>
</div>