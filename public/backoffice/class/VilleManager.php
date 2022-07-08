<?php


class VilleManager{
    /**
     * Récupère les villes par l'ID dans le BDD
     *
     * @param PDO $bdd
     * @param INT $idVille
     * @return Ville
     */
    public function getVilleById(PDO $bdd,INT $idVille){
        $str = 'SELECT * FROM ville WHERE ID = :id';
        $query = $bdd->prepare($str);
        $query->bindValue(':id', $idVille, PDO::PARAM_INT);
        $query->execute();

        $ville = $query->fetch();

        $object = new Ville();

        $object->hydrate($ville);
        
        return $object;
    }

    /**
     * Récupère les villes par nom via ID
     *
     * @param PDO $bdd
     * @param string $name
     * @return Ville
     */
    public function getVilleByName(PDO $bdd, string $name){
        $str = 'SELECT * FROM ville WHERE nom = :nom';
        $query = $bdd->prepare($str);
        $query->bindValue(':nom', $name, PDO::PARAM_STR);
        $query->execute();
        $villeInfo = $query->fetch();

        $ville = new Ville();
        $ville->hydrate($villeInfo);
        return $ville;
    }
}


?>