<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../public/asset/css/inscription.css">
</head>
<body>
       
    <form action="" method="POST">
        <h2> Inscrit toi des maintenant </h2>
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="cEmail" placeholder="Confirmer l'email" required>
        <input type="text" name="password" placeholder="Mot de passe" required>
        <input type="text" name="cPassword" placeholder="confirmer le mot de passe" required>
        <button type="submit" class="btn btn-inscription"> S'inscire </button>
        <p class="dejaCompte"> Déjà un compte ? 
            <?= "<a href=index.php?page=connection>";?> Connecte toi maintenant</a>
        </p>
    </form>
    
</body>
</html>