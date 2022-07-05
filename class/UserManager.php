<?php

class UserManager{

    private array $user;
    private User $utilisateur;

    public function createUser($array){
        $this->user['nom'] = $array['nom'];
        $this->user['prenom'] = $array['prenom'];
        $this->user['email'] = $array['email'];
        $this->user['password'] = $array['password'];
        $this->user['ID_ville'] = $this->getVilleIdByName(ConnectionDb::getInstance()->connection, $array['ville']);
        $this->utilisateur = new User();
        $this->utilisateur->hydrate($this->user);
        return $this->utilisateur;
    }

    public function checkUser(PDO $bdd,User $user) {
        $select_email = $bdd->prepare("SELECT * FROM `user` WHERE email =:email");
        $select_email->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $select_email->execute();
    
        if($select_email->rowCount() > 0){
            return "1";
        } 
        return "0";
    }

    public function saveUser(PDO $bdd,User $user){
        $this->checkUser($bdd,$user);
        if($this->checkUser($bdd, $user) == 1) {
            return "<span class='erreur'> Email déjà existante </span>";
        } else {
            $str = 'INSERT INTO user(nom, prenom, email, `password`, ID_ville) VALUES (:nom, :prenom, :mail, :pass, 56)';
            $query = $bdd->prepare($str);
            $query->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
            $query->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
            $query->bindValue(':mail', $user->getEmail(), PDO::PARAM_STR);
            $query->bindValue(':pass', $user->getPassword(), PDO::PARAM_STR);
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


}




?>