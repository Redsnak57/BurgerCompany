<?php

if(isset($_POST["email"],$_POST["password"])){
    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
        $manager = new UserManager();
        $user = $manager->getConnectionUser(ConnectionDb::getInstance()->connection, $_POST);

        // var_dump($user);
    } else {
        echo "<span> Merci de remplir tout les champs. </span>";
    }
}

?>

<div class="connection">
    <div class="wrapper">
        <div class="title"><span> Connection</span></div>
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