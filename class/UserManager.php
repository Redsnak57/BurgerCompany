<?php

class UserManager{

    private array $user;
    private User $utilisateur;

    /**
     * Inscription d'utilisateur
     *
     * @param array $array
     * @return User
     */
    public function createUser($array){
        $this->user['nom'] = $array['nom'];
        $this->user['prenom'] = $array['prenom'];
        $this->user['email'] = $array['email'];
        $this->user['password'] = $array['password'];
        $this->user['rueAdresse'] = $array['rueAdresse'];
        $this->user['numeroAdresse'] = $array['numeroAdresse'];
        $this->user['ID_ville'] = $this->getVilleIdByName(ConnectionDb::getInstance()->connection, $array['ville']);
        $this->utilisateur = new User();
        $this->utilisateur->hydrate($this->user);
        return $this->utilisateur;
    }

    /**
     * Vérifie si l'email est existante avant création
     *
     * @param PDO $bdd
     * @param User $user
     * @return string
     */
    public function checkUser(PDO $bdd,User $user) {
        $select_email = $bdd->prepare("SELECT * FROM `user` WHERE email =:email");
        $select_email->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $select_email->execute();
    
        if($select_email->rowCount() > 0){
            return "1";
        } 
        return "0";
    }

    /**
     * Enregistre l'utilisateur dans la BDD
     *
     * @param PDO $bdd
     * @param User $user
     * @return void
     */
    public function saveUser(PDO $bdd,User $user){
        $this->checkUser($bdd,$user);
        if($this->checkUser($bdd, $user) == 1) {
            return "<span class='erreur'> Email déjà existante </span>";
        } else {
            $str = 'INSERT INTO user(nom, prenom, email, `password`, rue_adresse, numero_adresse, ID_ville) VALUES (:nom, :prenom, :mail, :pass, :rue, :numero, 56)';
            $query = $bdd->prepare($str);
            $query->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
            $query->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
            $query->bindValue(':mail', $user->getEmail(), PDO::PARAM_STR);
            $query->bindValue(':pass', $user->getPassword(), PDO::PARAM_STR);
            $query->bindValue(':rue', $user->getRueAdresse(), PDO::PARAM_STR);
            $query->bindValue(':numero', $user->getNumeroAdresse(), PDO::PARAM_STR);
            $query->execute();
        }
    }

    private function getVilleIdByName($bdd, $name){
        $str = 'SELECT * FROM ville WHERE nom = :nom';
        $query = $bdd->prepare($str);
        $query->bindValue(':nom', $name, PDO::PARAM_STR);
        $return = $query->fetch(PDO::FETCH_ASSOC);
        return $return['ID'];
    }

    /**
     * Connecte l'utilisateur au site
     *
     * @param PDO $bdd
     * @param array $user
     * @return void
     */
    public function getConnectionUser(PDO $bdd, array $user){
        if(isset($user["email"], $user["password"])){
            $user = new User($user["email"],$user["password"]);
        }
        $connection = $bdd->prepare("SELECT * FROM user WHERE email=:email");
        $connection->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $connection->execute();

        $userBdd= $connection->fetch(PDO::FETCH_ASSOC);

        if(password_verify($user->getPassword(), $userBdd["password"])){
            $_SESSION["user"] = $user;
            $_SESSION["user"]->unsetPassword();
            header("Location:./index.php");
        } else {
            return "<span> Mot de passe incorrect.</span>";
        }    
    }


}




?>