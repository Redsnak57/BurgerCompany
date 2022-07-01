<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/asset/css/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="header">
        <div class="container">
            <div class="image">
                <!-- <img src="../public/asset/img/test1.jpeg" alt=""> -->
            </div>
            <div class="commander">
                <button class="btn commander">
                    <?php 
                    echo "<a href=index.php?page=nosProduits>";
                    ?> Commander</a></button>
            </div>
            <p class="heading">Venez gouter nos burgers 100% maison</p>
        </div>
    </section>

    <section class="step">
        <div class="heading">
            <p>Ta nourriture préferé <span> sur place ou à emporter</span></p>
        </div>
        <div class="container">
            <div class="box">
                <img src="../public/asset/img/step1-removebg-preview.png" alt="">
                <p> Commande avant et oublie le temps d'attente</p>
            </div>
            <div class="box">
                <img src="../public/asset/img/step2-removebg-preview.png" alt="">
                <p> Sur place ou à emporter</p>
            </div>
            <div class="box">
                <img src="../public/asset/img/step3-removebg-preview.png" alt="">
                <p> Adores nos délicieux burger</p>
            </div>
        </div>
    </section>

    <section class="vedettes">
    <div class="heading">
        <p>Découvres les <span> vedettes du moment</span></p>
    </div>
    <div class="container">
        <div class="box promo">
            <p> Double cheese Burger</p>
            <img src="../public//asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
        <div class="box promo">
            <p> Double cheese Burger</p>
            <img src="../public//asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix_promo">5.99€</p>
            </div>
        </div>
        <div class="box">
            <p> Double cheese Burger</p>
            <img src="../public//asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix">5.99€</p>
            </div>
        </div>
        <div class="box">
            <p> Double cheese Burger</p>
            <img src="../public//asset/img/double_chesse.png" alt="">
            <div class="acheter">
                <i class="gauche_i fa-solid fa-info"></i>
                <i class="droite_i fa-solid fa-basket-shopping"></i>
                <p class="prix">5.99€</p>
            </div>
        </div>
    </div> 
    </section>
</body>
</html>