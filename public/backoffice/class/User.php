<?php
// include "../model/UserManager.php";

class User {
    private $ID;
    private $nom;
    private $prenom;
    private $email;
    private $villeID;
    private $villeInfo;

    /**
     * Construct
     *
     * @param INT $ID
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param string $ville
     */
    public function __construct($ID = "", $nom="", $prenom="", $email ="", $ville=""){
        $this->ID = $ID;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;

        /**
         * Si la ville est remplis alors on appel VilleManager
         */
        if(!empty($ville)){
            $manager = new VilleManager();
            $this->villeInfo = $manager->getVilleByName(ConnectionDbAdmin::getInstance()->connection, $ville);
        }
    }

    /**
     * Function d'hydratation
     *
     * @param array $array
     * @return void
     */
    public function hydrate(array $array){
        foreach($array as $key => $data){
            $method = "set".ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($data);
            }
        }
    }

    private function setID($ID){
        $this->ID=$ID;
    }
    public function getID(){
        return $this->ID;
    }

    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getVille(){
        return $this->villeInfo;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setID_ville($ville){
        $this->villeID = $ville;
        $this->getVilleInfo($ville);
    }

    /**
     * Function private pour récupérer les infos de la ville 
     * 
     * @param INT $idVille
     * @return void
     */
    private function getVilleInfo($idVille){
        $manager = new VilleManager();
        $ville = $manager->getVilleById(ConnectionDbAdmin::getInstance()->connection, $idVille);

        $this->setVilleInfo($ville);
    }

    private function setVilleInfo(Ville $ville){
        $this->villeInfo = $ville;
    }


}
?>