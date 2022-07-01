<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./public/css/connectionAdmin.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
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
</body>
</html>
