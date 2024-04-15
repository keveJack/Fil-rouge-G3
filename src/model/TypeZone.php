<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class TypeZone
{
    private int $_id;
    private string $_intitule;
    private ZoneCollection $_zoneCollection;

    public function __construct(string $intitule, int $id = 0, ZoneCollection $zoneCollection = new ZoneCollection())
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_zoneCollection = $zoneCollection;
    }

    public function getById(): int
    {
        return $this->_id;
    }

    public function getIntitule(): string
    {
        return $this->_intitule;
    }

    public static function create(TypeZone $typeZone): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Type_Zone (intitule) values (:intitule);");
        $statement->execute(['intitule' => $typeZone->getIntitule()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id): ?TypeZone
    {
        $statement = Database::getInstance()->getConnexion()->prepare('select * from Type_Zone where id =:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            return new TypeZone(intitule: $row['intitule'], id: $row['id']);
        }

        return null;
    }
    public static function update(TypeZone $typeZone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE Type_Zone set intitule=:intitule WHERE id =:id');
        $statement->execute(['intitule' => $typeZone->getIntitule(),'id' => $typeZone->getById()]);
    }
    public static function delete(TypeZone $typeZone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM Type_Zone WHERE id =:id');
        $statement->execute(['id' => $typeZone->getById()]);
    }

}
