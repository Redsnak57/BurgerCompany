<?php

class Panier {

    public function __construct(){
        if(!isset($_SESSION["panier"])){
            $_SESSION['panier'] = array();
        }
    }

}

?>