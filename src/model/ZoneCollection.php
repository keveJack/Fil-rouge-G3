<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class ZoneCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Zone)) {
            throw new \InvalidArgumentException("Must be a zone");
        }
    }
    public static function getZonesByType(TypeZone $typeZone):ZoneCollection
    {
        $liste = new ZoneCollection();

        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM zone where numTypeZone = :numTypeZone');
        $statement->execute(['numTypeZone' =>$typeZone->getById() ]);
        while($row =$statement->fetch())
        {
            $liste[]=new Zone(intitule: $row['intitule'], id: $row['id'], lieu: $row['lieu'], typeZone:$typeZone );
        }
        return $liste;
    }
    public static function getZonesByRang(Rang $rang):ZoneCollection
    {
        $liste = new ZoneCollection();

        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM zone where numTypeZone = :numTypeZone');
        $statement->execute(['numRang' =>$rang->getById() ]);
        while($row =$statement->fetch())
        {
            $typeZone = TypeZone::read($row['numType_Zone']);
            $liste[]=new Zone(intitule: $row['intitule'], id: $row['id'], lieu: $row['lieu'], typeZone:$typeZone );
        }
        return $liste;
    }
}
