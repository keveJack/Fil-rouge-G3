<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class PersonnageCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Personnage)) {
            throw new \InvalidArgumentException("Must be a personnage");
        }    
        parent::offsetSet($index, $newval);
    }

    public static function lister(): \ArrayObject
    {
        $liste = new \ArrayObject();
        $statement = Database::getInstance()->getConnexion()->prepare("select * from Personnage;");
        $statement->execute();
        while ($row = $statement->fetch()) 
        {
            $utilisateur = Utilisateur::read($row['numUtilisateur']);
            $liste[] = new Personnage(id: $row['id'], niveau: $row['niveau'], 
            equipement: $row['equipement'], utilisateur: $utilisateur);
        }
        return $liste;
    }
    
}
