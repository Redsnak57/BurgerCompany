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

    <section class="section">
        <div class="container">
        <div class="box">
                <span> 100</span>
                <p> utilisateurs inscrit</p>
                <i class="bi bi-people-fill"></i>
        </div>
        <div class="box">
                <span> 23</span>
                <p> Commandes confirmé</p>
                <i class="bi bi-bag"></i>
        </div>
        <div class="box">
                <span> 3</span>
                <p> Commandes en attente</p>
                <i class="bi bi-hourglass-bottom"></i>
        </div>
        <div class="box">
                <span> 195€</span>
                <p> Recette</p>
                <i class="bi bi-cash"></i>
        </div>            
        </div>

        <div class="container charts">
            <div class="box">
                <canvas class="shadow" id="chartClients" width="400" height="250"></canvas>
            </div>
            <div class="box">
                <canvas class="shadow" id="chartRecette" width="400" height="250"></canvas>
            </div>       
        </div>

<!-- faire création tableaux pour user + commande récentes   -->
    </section>

</body>
</html>