<?php

/* Création autoLoader */ 
function loadClass($class){
    require('./class/'.$class.'.php');
}
spl_autoload_register('loadClass');

/* Appel de la BDD */
$bdd = ConnectionDbAdmin::getInstance("localhost", "burgercompany", "root", "");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Company</title>
    <!-- css -->
    <link rel="stylesheet" href="./public/css/connectionAdmin.css">
    <!-- cnd icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php
        include "./vue/connectionAdmin.php";
    ?>

    
</body>
</html>