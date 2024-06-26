<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class SignalementCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Signalement)) {
            throw new \InvalidArgumentException("Must be a signalement");
        }
    }
    public static function lister():\ArrayObject{
        $liste = new \ArrayObject();
        $statement=Database::getInstance()->getConnexion()->prepare("select * from signalement");
        $statement->execute();
        while ($row = $statement->fetch()) {
            $utilisateur = Utilisateur::read($row['numUtilisateur']);
            $typeSignalement = TypeSignalement::read($row['numType_Signalement']);
            $liste[] = new Signalement(id:$row['id'],intitule:$row['intitule'],date:$row['date'],utilisateur:$utilisateur,typeSignalement:$typeSignalement);
        }
        return $liste;
    }
}

