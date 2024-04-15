<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class RangCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Rang)) {
            throw new \InvalidArgumentException("Must be a rang");
        }
        parent::offsetSet($index, $newval);
    }

    public static function lister(): \ArrayObject
    {
        $liste = new \ArrayObject();
        $statement = Database::getInstance()->getConnexion()->prepare("select * from Rang;");
        $statement->execute();
        while ($row = $statement->fetch()) 
        {
            $liste[] = new Rang(id: $row['id'], intitule: $row['intitule']);
        }
        return $liste;
    } 

   
}
