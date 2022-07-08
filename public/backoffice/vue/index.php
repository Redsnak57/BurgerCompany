<?php

/* Création autoLoader */ 
function loadClass($class){
    require('../class/'.$class.'.php');
}
spl_autoload_register('loadClass');


/* Appel de la BDD */
$bdd = ConnectionDbAdmin::getInstance("localhost", "burgercompany", "root", "");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Company</title>
    <!-- Css config-->
    <link rel="stylesheet" href="../public/css/nav_admin.css">
    <link rel="stylesheet" href="../public/css/responsive.css">
    <!--  css -->
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="../public/css/utilisateur.css">
    <link rel="stylesheet" href="../public/css/gestionAdmin.css">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>

    <!-- Nav gauche du site grid colum 1  -->
    <div class="global-container">
        <div class="hamburger-nav" id="menu-icon">
            <i class="bi bi-list"></i>
        </div>
        <nav class="side-nav">
            <div class="nav-logo">
                <img src="../../asset/img/logo.png" alt="">
                <h1>Burger company</h1>
            </div>

            <?= "<a href='index.php?page=dashboard' class='block-link'>"; ?>
                <i class="bi bi-list"></i>
                <span class="nav-links">Tableau de bord</span>
            </a>
            <?= "<a href='index.php?page=utilisateur' class='block-link'>"; ?>
                <i class="bi bi-people-fill"></i>
                <span class="nav-links">Utilisateur</span>
            </a>
            <?= "<a href='index.php?page=gestionAdmin' class='block-link'>"; ?>
                <i class="bi bi-person-plus"></i>
                <span class="nav-links"> Administrateurs</span>
            </a>
            <?= "<a href='index.php?page=produits' class='block-link'>"; ?>
                <i class="bi bi-ui-radios-grid"></i>
                <span class="nav-links">Produits</span>
            </a>
            <?= "<a href='index.php?page=commandes' class='block-link'>"; ?>
                <i class="bi bi-bag"></i>
                <span class="nav-links">Commandes</span>
            </a>
            <?= "<a href='index.php?page=parametres' class='block-link'>"; ?>
                <i class="bi bi-gear"></i>
                <span class="nav-links">Paramètres</span>
            </a>
            <a href="" class="block-link">
                <i class="bi bi-box-arrow-right"></i>
                <span class="nav-links"> Déconnection </span>
            </a>
        </nav>

        <!-- Partie droite du site grid colum 2  -->
        <main class="main-content"> 

            <?php
                //redirection page 
                if(isset($_GET["page"])){
                    switch($_GET["page"]){
                        case "dashboard":
                            include("./dashboard.php");
                            break;
                        case "utilisateur":
                            include("./utilisateur.php");
                            break;
                        case "gestionAdmin":
                            include("./gestionAdmin.php");
                            break;
                        case "produits":
                            include("./produits.php");
                            break;
                        case "commandes":
                            include("./commandes.php");
                            break;
                        case "parametres":
                            include("./parametres.php");
                            break;
                        default:
                            include("./dashboard.php"); // Par défault page d'accueil
                    }
                } else {
                    include("./dashboard.php"); // si lien n'existe pas
                }
            ?>

        </main>
    </div>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" integrity="sha512-VEBjfxWUOyzl0bAwh4gdLEaQyDYPvLrZql3pw1ifgb6fhEvZl9iDDehwHZ+dsMzA0Jfww8Xt7COSZuJ/slxc4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <script src="../public/js/scripts.js"></script> -->
    <script src="../public/js/charts.js"></script>
    <script src="../public/js/app.js"></script>
</body>
</html>