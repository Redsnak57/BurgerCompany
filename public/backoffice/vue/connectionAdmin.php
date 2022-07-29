<?php

if(isset($_POST["email"],$_POST["password"])){
    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
        $manager = new AdminManager();
        $admin = $manager->getConnectionAdmin(ConnectionDbAdmin::getInstance()->connection, $_POST);

    } else {
        echo "<span>Merci de remplir tout les champs.</span>";
    }
}

?>
<div class="global">
<div class="containerLogAdmin">
    <div class="containerLogAdmin__wrapper">
        <div class="title"><span> Connection administrateur</span></div>
        <form action="" method="POST">
            <div class="row">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="email" placeholder="Votre email" required>
            </div>
            <div class="row">
                <i class="fa-solid fa-key"></i>
                <input type="password" name="password" placeholder="Votre mot de passe" required>
            </div>
            <div class="row button">
                <input type="submit" value="Se connecter">
            </div>
            <div class="pass"><a href="#">Mot de passe oublié ?</a></div>
        </form>
    </div>
</div>
</div>
  

