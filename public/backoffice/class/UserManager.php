<?php

class UserManager {
    private array $arrayList;
    private User $user;

    /**
     * Crée l'utilisateur pour le récupérer
     *
     * @param array $array
     * @return User
     */
    public function createUser($array){
        $this->arrayList["email"] = $array["email"];
        $this->user = new User();
        $this->user->hydrate($this->arrayList);
        return $this->user;
    }

    /**
     * Undocumented function
     *
     * @param array $array
     * @return User
     */
    private function makeUser(array $array){
        $return = new User();
        $return->hydrate($array);
        return $return;
    }

    /**
     * Affiche tout les utilisateurs du site
     *
     * @param PDO $bdd
     * @return array
     */
    public function getUsers(PDO $bdd){
        $str = "SELECT * FROM user";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();
        $users = [];
        foreach($reponse as $user){
            $object = $this->makeUser($user);
            array_push($users, $object);
        }

        return $users;
    }


    /**
     * Affiche les 10 derniers utilisateurs inscrit
     *
     * @param PDO $bdd
     * @return array
     */
    public function getLastTenUsers(PDO $bdd){
        $str = "SELECT * FROM user ORDER BY ID DESC LIMIT 10";
        $query = $bdd->query($str);
        $reponse = $query->fetchAll();
        $users = [];
        foreach($reponse as $user){
            $object = $this->makeUser($user);
            array_push($users, $object);
        }

        return $users;
    }
}


?>