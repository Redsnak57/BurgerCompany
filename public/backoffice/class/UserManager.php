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
     * Retourne un object User
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

    /**
     * Supprimer un utilisateur par l'ID, qui a été récupéré via suppUser
     *
     * @param PDO $bdd
     * @param integer $ID
     * @return void
     */
    public function suppUserByID(PDO $bdd, int $ID){
        $req = "SELECT * FROM user WHERE ID=:ID";
        $query = $bdd -> prepare($req);
        $query -> bindValue(":ID", $ID, PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        $user = $this->makeUser($user);
        $this->suppUser($bdd, $user);
    }


    /**
     * Supprimer l'utilisateur 
     *
     * @param PDO $bdd
     * @param User $user
     * @return void
     */
    public function suppUser(PDO $bdd, User $user) {
        $reqDelete ="DELETE FROM user WHERE ID=:ID";
        $query = $bdd -> prepare($reqDelete);
        $query -> bindValue(":ID", $user->getID(), PDO::PARAM_INT);

        if($query -> execute()){
            header("Location:./index.php?page=utilisateur");
        } else {
            echo "Une erreur c'est produite.";
        }
    }


}  


?>