<?php
/* Création autoLoader */ 
function loadClass($class){
    if(file_exists("../model/$class.php")){
        require_once("../model/$class.php");
    } elseif(file_exists("../class/$class.php")){
        require_once("../class/$class.php");
    }
}
spl_autoload_register('loadClass');

session_start();
if(isset($_SESSION["user"])){
    $user = $_SESSION["user"];
}

/* Appel de la BDD */
$bdd = ConnectionDb::getInstance("localhost", "burgercompany", "root", "");
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Company</title>
    <!-- nav -->
    <link rel="stylesheet" href="./asset/css/nav.css">
    <!-- vue -->
    <link rel="stylesheet" href="./asset/css/accueil.css">
    <!-- <link rel="stylesheet" href="./asset/css/header.css"> -->
    <link rel="stylesheet" href="./asset/css/inscription.css"> 
    <link rel="stylesheet" href="./asset/css/contact.css"> 
    <link rel="stylesheet" href="./asset/css/mention.css"> 
    <link rel="stylesheet" href="./asset/css/nosProduits.css"> 
    <link rel="stylesheet" href="./asset/css/connection.css"> 
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php

    // Utilisateur non connecté 
    if(!isset($user)){
    echo"
    <nav>
        <div class='bx bx-menu' id='menu-icon'></div>
        <ul>    
            <img src=./asset/img/logo.png alt='Logo du site'> 
            <li><a href=index.php?page=accueil class='menu'>Accueil</a></li>
            <li><a href=index.php?page=nosProduits class='menu'>Nos produits</a></li>
            <li><a href=index.php?page=contact class='menu'>Contact</a></li>
            <div class='buttons'>
                <button class='btn inscription'><a href=index.php?page=inscription>S'inscrire</a></button>
                <button class='btn connection'><a href=index.php?page=connection>Se connecter</a></button>
            </div>
        </ul>
    </nav>";
    }

    // Utilisateur connecté 
    if(isset($user)){
    echo"
    <nav>
        <div class='bx bx-menu' id='menu-icon'></div>
        <ul>    
            <img src=./asset/img/logo.png alt='Logo du site'> 
            <li><a href=index.php?page=accueil class='menu'>Accueil</a></li>
            <li><a href=index.php?page=nosProduits class='menu'>Nos produits</a></li>
            <li><a href=index.php?page=contact class='menu'>Contact</a></li>
        </ul>
        <div class='buttons-connecte'>
            <button class='btn bag-icon'><i class='bx bxs-cart' id='user-bag'></i></button>
            <button class='btn user-icon'><i class='bx bxs-user' id='user-profil'></i></button>
        </div>
    </nav>";

    ?>
    <div class="profil">
        <div class="buttonsSettings">
            <button class="btn monProfil"><a href="index.php?page=parametre"> Mon profil</button>
            <button class="btn deconnection"><a href="../vue/deconnection.php">Deconnection</a></button>
        </div>
    </div>
    <?php
    
    }


    //redirection page 
    if(isset($_GET["page"])){
        switch($_GET["page"]){
            case "accueil":
                include("../vue/accueil.php");
                break;
            case "nosProduits":
                include("../vue/nosProduits.php");
                break;
            case "contact":
                include("../vue/contact.php");
                break;
            case "inscription":
                include("../vue/inscription.php");
                break;
            case "connection":
                include("../vue/connection.php");
                break;
            case "mention":
                include("../vue/mention.php");
                break;
            case "protection-donnees":
                include("../vue/protection.php");
                break;
            case "parametre":
                include("../vue/parametre.php");
                break;
            case "addPanier":
                include("../vue/addPanier.php");
                break;
            default:
                include("../vue/accueil.php"); // Par défault page d'accueil
        }
    } else {
        include("../vue/accueil.php"); // si lien n'existe pas
    }   

    ?>

  
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <img src="./asset/img/logo.png" alt="Logo">
                </div>
                <div class="footer-col">
                    <h4>Navigation</h4>
                    <?php
                    if(!isset($user)){
                        echo "
                            <li><a href=index.php?page=accueil>Accueil</a></li>
                            <li><a href=index.php?page=nosProduits>Nos produits</a></li>
                            <li><a href=index.php?page=contact>Contact</a></li>
                            <li><a href=index.php?page=inscription>Inscription</a></li>
                            <li><a href=index.php?page=connection>Connection</a></li>";
                    }

                    if(isset($user)){
                        echo "
                            <li><a href=index.php?page=accueil>Accueil</a></li>
                            <li><a href=index.php?page=nosProduits>Nos produits</a></li>
                            <li><a href=index.php?page=contact>Contact</a></li>
                            <li><a href=index.php?page=parametre>Mon compte</a></li>";
                    }
                    ?>
                    
                </div>
                <div class="footer-col">
                    <h4>Condition général de vente</h4>
                    <?php
                    echo "
                        <li><a href=index.php?page=mention>Mentions légales</a></li>
                        <li><a href=index.php?page=protection-donnees>Politique de protection de données</a></li>";
                    ?>
                </div>
                <div class="footer-col">
                    <h4>Suis nous</h4>
                    <div class="social-links">
                        <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    <h4>Le restaurant</h4>
                    <div class="social-links">
                        <?= "<a href='index.php?page=contact'>"; ?><i class="fa-solid fa-location-dot"></i></a>
                        <?= "<a href='index.php?page=contact'>"; ?><i class="fa-solid fa-clock"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright -->
    <p class=copyright> &#169; Site crée par Redsnak</p>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(window).scroll(function(){
                $('.image').css("opacity", 1 - $(window).scrollTop()/1100)
            })
        })
    </script>
    <script src="./asset/js/nav.js"></script>
    <script src="./asset/js/nosProduits.js"></script>
</body>
</html>