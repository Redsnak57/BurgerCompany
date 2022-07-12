<?php

class AdminManager{
    private array $user;
    private Admin $admin;

    /**
     * Création d'un administrateur avec l'email + password + utilise la fonction hydrate
     *
     * @param array $array
     * @return Admin
     */
    public function createAdmin($array){
        $this->user["email"] = $array["email"];
        $this->user["password"] = $array["password"];
        $this->admin = new Admin();
        $this->admin->hydrate($this->user);
        return $this->admin;
    }

    /**
     * Vérifie si l'email est éxistante avant création 
     *
     * @param PDO $bdd
     * @param Admin $user
     * @return string
     */
    public function checkEmail(PDO $bdd, Admin $user){
        $check_email = $bdd->prepare("SELECT * FROM `admin` WHERE email=:email");
        $check_email->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $check_email->execute();

        if($check_email->rowCount() > 0){
            return "1";
        }
        return "0";
    }

    /**
     * Enregistre l'admin dans la base de donnée 
     *
     * @param PDO $bdd
     * @param Admin $user
     * @return void
     */
    public function saveAdmin(PDO $bdd, Admin $user){
        $this->checkEmail($bdd,$user);
        if($this->checkEmail($bdd,$user) == 1) {
            echo "<p class='msg erreur'> Adresse email déjà existante.</p>";
        } else {
            $str = "INSERT INTO `admin` (email,`password`) VALUE(:email, :pass)";
            $query = $bdd->prepare($str);
            $query->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
            $query->bindValue(":pass", $user->getPassword(), PDO::PARAM_STR);
            $query->execute();
            echo "<p class='msg succes'> Le compte administrateur vient d'être crée. </p>";
        }
    }

    /**
     * Récupère les admins
     *
     * @param array $array
     * @return Admin
     */
    private function makeAdmin(array $array){
        $return = new Admin();
        $return->hydrate($array);
        return $return;
    }

    /**
     * Affiche les admins
     *
     * @param PDO $bdd
     * @return array
     */
    public function getAdmins(PDO $bdd){
        $str = 'SELECT * FROM `admin`';
        $query = $bdd->query($str);
        $response = $query->fetchAll();
        $admins = [];
        foreach($response as $admin){
            $object = $this->makeAdmin($admin);
            array_push($admins, $object);
        }
        return $admins;
    }

    /* connection admin faux */ 
    public function getConnectionAdmin(PDO $bdd, Admin $admin){
        $connection = $bdd->prepare("SELECT * FROM `admin` WHERE email=:email");
        $connection->bindValue(":email", getConnectionAdmin(), PDO::PARAM_STR);
        $connection->execute();

        $userBdd= $connection->fetch(PDO::FETCH_ASSOC);

        if(password_verify($admin["password"], $userBdd["password"])){
            $_SESSION["admin"] = $userBdd;
            unset($_SESSION["admin"]["password"]);
            header("Location:./vue/index.php");
        } else {
            return "<span> Mot de passe inccorect.</span>";
        }    
    }
}

?>