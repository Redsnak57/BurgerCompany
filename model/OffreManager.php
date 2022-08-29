<?php

class OffreManager{

    private PDO $bd;
    public Offre $offre;

    public function __construct(PDO $bdd){
        $this->bd = $bdd;
    }

    private function reset(){
        $this->offre = new Offre();
    }

    public function getOffreById(?int $id): Offre
    {

        $this->reset();
      
        $str = 'SELECT * FROM promo WHERE ID = :id';

        $query = $this->bd->prepare($str);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        if($query->execute()){  
            $this->offre->hydrate($query->fetch(PDO::FETCH_ASSOC));
        }


        return $this->offre;
        
    }
}


?>