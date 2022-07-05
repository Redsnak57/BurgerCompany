<?php
    if(isset($_POST["email"],$_POST["cEmail"],$_POST["password"],$_POST["cPassword"],$_POST["nom"],$_POST["prenom"],$_POST["ville"],$_POST["rue"],$_POST["nRue"])){
        if(!empty($_POST["email"]) && !empty($_POST["cEmail"]) && !empty($_POST["password"]) && !empty($_POST["cPassword"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["ville"]) && !empty($_POST["rue"]) && !empty($_POST["nRue"])){
            if($_POST["password"] != $_POST["cPassword"]){
                echo "<span class='erreur'>Les mots de passe ne correspondent pas.</span>";
            } elseif ($_POST["email"] != $_POST["cEmail"]) {
                echo "<span class='erreur'>Les emails ne correspondent pas.</span>";
            } else {
                $manager = new UserManager();
                $user = $manager->createUser($_POST);
                $manager->saveUser(ConnectionDb::getInstance()->connection, $user);
            }          
        } else {
            echo "<span class='erreur'>Merci de remplir tout les champs.</span>";
        }      
    }
?>

<form data-multi-step class="multi-step-form" method='POST' action=''>
<h2> Inscrit toi des maintenant </h2>
    <div class="card" data-step>
        <h3 class="step-title"> Création du compte</h3>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="cEmail">Confirmer l'email</label>
            <input type="email" name="cEmail" id="cEmail">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="cPassword">Confirmer le mot de passe</label>
            <input type="password" name="cPassword" id="cPassword">
        </div>
        <button type="button" data-next class="btn btn-inscription">Suivant</button>
    </div>

    <div class="card" data-step>
        <h3 class="step-title">Information personnel</h3>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville">
        </div>
        <div class="form-group">
            <label for="rue">Rue</label>
            <input type="text" name="rue" id="rue">
        </div>
        <div class="form-group">
            <label for="nRue">Numéro de rue</label>
            <input type="number" name="nRue" id="nRue">
        </div>
        <button type="button" data-previous class="btn btn-inscription">Précedant</button>
        <button type="submit" class="btn btn-inscription">S'inscire</button>
    </div>
</form>    
