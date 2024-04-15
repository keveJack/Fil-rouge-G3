<?php

declare(strict_types=1);

namespace app\FilRougeG3\model;

class EvenementCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Evenement)) {
            throw new \InvalidArgumentException("Must be a evenement");
        }
        parent::offsetSet($index, $newval);
    }
    public static function lister(): EvenementCollection
    {
        $liste = new EvenementCollection();
        $statement = Database::getInstance()->getConnexion()->prepare("select * from Evenement;");
        $statement->execute();
        while ($row = $statement->fetch()) 
        {
            $utilisateur = Utilisateur::read($row['numUtilisateur']);
            $zone = Zone::read($row['numZone']);
            $liste[] = new Evenement (id: $row['id'], niveau_max: $row['niveau_max'],
            niveau_min: $row['niveau_min'], intitule: $row['intitule'], date: new \DateTime($row['date_Evenement']),
            utilisateur: $utilisateur, zone: $zone);
        }
        return $liste;
    }
}
