<?php
    if(isset($_POST["email"],$_POST["cEmail"],$_POST["password"],$_POST["cPassword"],$_POST["nom"],$_POST["prenom"],$_POST["ville"],$_POST["rueAdresse"],$_POST["numeroAdresse"])){
        if(!empty($_POST["email"]) && !empty($_POST["cEmail"]) && !empty($_POST["password"]) && !empty($_POST["cPassword"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["ville"]) && !empty($_POST["rueAdresse"]) && !empty($_POST["numeroAdresse"])){
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

<div class="inscriptionContainer">
  <form action="" method="POST" class="signForm">
    <h1 class="formTitle">Inscrivez-vous</h1>
    <div class="inputGroup">
        <label for="nom" class="inputLabel">
            <input type="text" class="signInput" id="nom" name="nom" placeholder="Nom">
            <span>Nom</span>
        </label>
    </div>
    <div class="inputGroup">
        <label for="prenom" class="inputLabel">
            <input type="text" class="signInput" id="prenom" name="prenom" placeholder="Prénom">
            <span>Prénom</span>
        </label>
    </div>
    <div class="inputGroup">
        <label for="email" class="inputLabel">
            <input type="text" class="signInput" id="email" name="email" placeholder="E-mail">
            <span>Email</span>
        </label>
    </div>
    <div class="inputGroup">
        <label for="confirmEmail" class="inputLabel">
            <input type="text" class="signInput" id="confirmEmail" name="cEmail" placeholder="Confirmez votre email">
            <span>Confirmez votre email</span>
        </label>
    </div>
    <div class="adresseFormContainer">
        <div class="adresseNumberAndPrefix">
            <div class="inputGroup">
                <label for="adresseNumber" class="inputLabel">
                    <input type="text" class="signInput" id="adresseNumber" name="numeroAdresse" placeholder="N°" autocomplete="addresse-line3">
                    <span>N°</span>
                </label>
            </div>
            <div class="inputGroup">
                <label for="adresseName" class="inputLabel">
                    <input type="text" class="signInput" id="adresseName" name="rueAdresse" placeholder="Nom de voie" autocomplete="address-line1">
                    <span>Rue</span>
                </label>
            </div>
        </div>
        <div class="villeAndCp">
            <div class="inputGroup">
                <label for="adresseVille" class="inputLabel">
                    <input type="text" class="signInput" id="adresseVille" name="ville" placeholder="Ville" autocomplete="address-level2" onkeyup="getVilleByName()" onfocus="closeProp()">
                    <span>Ville</span>
                </label>
                <div class="propositionVille"></div>
            </div>
        <div class="inputGroup">
            <label for="adresseCp" class="inputLabel">
                <input type="text" class="signInput" id="adresseCp" name="adresseCp" placeholder="Code postal" autocomplete="postal-code" onkeyup="getVilleByCp()" onfocus="closeProp()">
                <span>Code postal</span>
            </label>
            <div class="propositionCp"></div>
        </div>
        </div>
        <!-- <div class="passwordGroup"> -->
        <div class="inputGroup">
            <label for="mdp" class="inputLabel">
                <input type="password" name="password" id="mdp" placeholder="Mot de passe" class="signInput">
                <span>Mot de passe</span>
            </label>
        </div>
        <div class="inputGroup">
            <label for="confirmMdp" class="inputLabel">
                <input type="password" name="cPassword" id="confirmMdp" placeholder="Confirmer mot de passe" class="signInput">
                <span>Confirmer mot de passe</span>
            </label>
        </div>
    </div>

    <button type="submit" class="signButton">
      M'inscrire
    </button>
  </form>
</div>


