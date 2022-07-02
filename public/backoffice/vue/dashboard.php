<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/dashboard.css">
</head>
<body>

    <h2 class="top-title"> Tableau de bord </h2>
    <p class=trait-title></p>
    <!-- Container suivis des stats  -->
    <div class="container">
        <div class="box">
                <span> 100</span>
                <p> utilisateurs inscrit</p>
                <i class="bi bi-people-fill"></i>
        </div>
        <div class="box">
                <span> 23</span>
                <p> Commandes confirmé</p>
                <i class="bi bi-bag-check"></i>
        </div>
        <div class="box">
                <span> 3</span>
                <p> Commandes en attente</p>
                <i class="bi bi-bag-dash"></i>
        </div>
        <div class="box">
                <span> 195€</span>
                <p> Recette</p>
                <i class="bi bi-cash"></i>
        </div>
    </div>

    <!-- Container graphique visuel -->
    <div class="container charts">
        <div class="box">
            <canvas class="shadow" id="chartClients" width="400" height="250"></canvas>
        </div>
        <div class="box">
            <canvas class="shadow" id="chartRecette" width="400" height="250"></canvas>
        </div>
    </div>

    <!-- 10 dernier user inscrit  -->
    <h2 class="main-title"> 10 derniers utilisateurs inscrits</h2>

    <div class="table">
        <h3 class="table-title"> Name</h3>
        <h3 class="table-title"> Email</h3>
        <h3 class="table-title"> Phone</h3>
    </div>

    <div class="table-results">
    <!--  généré par js pour le moment faire bdd après -->
    </div>

</body>
</html>