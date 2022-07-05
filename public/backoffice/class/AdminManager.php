<?php

class AdminManager{
    private array $user;
    private Admin $admin;

    public function createAdmin($array){
        $this->user["email"] = $array["email"];
        $this->user["password"] = $array["password"];
        $this->admin = new Admin();
        $this->admin->hydrate($this->user);
        return $this->admin;
    }

    public function checkEmail(PDO $bdd, Admin $user){
        $check_email = $bdd->prepare("SELECT * FROM `admin` WHERE email=:email");
        $check_email->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $check_email->execute();

        if($check_email->rowCount() > 0){
            return "1";
        }
        return "0";
    }

    public function saveAdmin(PDO $bdd,Admin $user){
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
}

?>