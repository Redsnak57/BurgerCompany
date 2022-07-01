<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- link css -->    
    <link rel="stylesheet" href="../public/css/config.css">
    <link rel="stylesheet" href="../public/css/responsive.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    
    <!-- nav -->
    <nav class="nav">
            <a href="#" class=logo> 
            <i class="bi bi-lightbulb"></i>
            <span>Burger Company</span>
        </a>

        <ul class="menu">
            <li class="_active"><?= "<a href='index.php?page=dashboard'>"; ?><i class="bi bi-house-fill"></i><span> Dashboard</span></a></li>
            <li><?= "<a href='index.php?page=utilisateur'>"; ?><i class="bi bi-people-fill"></i><span> Utilisateur </span></a></li>
            <li><a href=""><i class="bi bi-ui-radios-grid"></i><span> Produit </span></a></li>
            <li><a href=""><i class="bi bi-bag"></i><span> Commande </span></a></li>
            <li><a href=""><i class="bi bi-cash"></i><span> Recette </span></a></li>
            <li><a href=""><i class="bi bi-box-arrow-right"></i><span> Déconnection </span></a></li>
        </ul>
    </nav>

    <!-- header -->
    <main class="content">
        <header class="header">
            <button type="button" class="button toggle-menu active">
                <i class="bi bi-list"></i>
                <span> Dashboard</span> 
            </button>
            <form action="" class="form">
                <input type="text" placeholder="Chercher">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="box-profile">
                <i class="bi bi-person"></i>
                <p class="name">
                    Bienvenue
                    <span> Redsnak</span>
                </p>
            </div>
        </header>

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
            case "contact":
                include("./contact.php");
                break;
            case "inscription":
                include("./inscription.php");
                break;
            case "connection":
                include("./connection.php");
                break;
            default:
                include("./dashboard.php"); // Par défault page d'accueil
        }
    } else {
        include("./dashboard.php"); // si lien n'existe pas
    }
    ?>
    </main>

    <!-- footer -->
    <footer class="footer">
        <span> Codé par Redsnak</span>
    </footer>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" integrity="sha512-VEBjfxWUOyzl0bAwh4gdLEaQyDYPvLrZql3pw1ifgb6fhEvZl9iDDehwHZ+dsMzA0Jfww8Xt7COSZuJ/slxc4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script src="../public/js/scripts.js"></script>
    <script src="../public/js/charts.js"></script>
</body>
</html>