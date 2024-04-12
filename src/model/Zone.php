<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class Zone
{
    private int $_id;
    private string $_intitule;
    private string $_lieu;
    private EvenementCollection $_evenementCollection;
    private TypeZone $_typeZone;
    private RangCollection $_rangCollection;

    public function __construct(string $intitule, string $lieu, TypeZone $typeZone, int $id = 0,
        EvenementCollection $evenementCollection = new EvenementCollection(), RangCollection $rangCollection = new RangCollection()) {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_lieu = $lieu;
        $this->_evenementCollection = $evenementCollection;
        $this->_typeZone = $typeZone;
        $this->_rangCollection = $rangCollection;
    }

    public function getById(): int
    {
        return $this->_id;
    }

    public function getIntitule(): string
    {
        return $this->_intitule;
    }
    public function getLieu(): string
    {
        return $this->_lieu;
    }

    public function getTypeZone(): TypeZone
    {
        // si vide alors faire requete pour les récupérer
        return $this->_typeZone;
    }

    public static function create(Zone $zone): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Zone (intitule,lieu,numType_Zone) values (:intitule,:lieu,:numType_Zone);");
        $statement->execute(['intitule' => $zone->getIntitule(), 'lieu' => $zone->getLieu(), 'numType_Zone' => $zone->getTypeZone()->getById()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id): ?Zone
    {
        $statement = Database::getInstance()->getConnexion()->prepare('select * from Zone where id =:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            $typeZone = TypeZone::read($row['numType_Zone']);
            return new Zone(intitule: $row['intitule'], id: $row['id'], lieu: $row['lieu'], typeZone: $typeZone);
        }

        return null;
    }
    public static function update(Zone $zone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE Zone set intitule=:intitule, numType_Zone =:numType_Zone, lieu=:lieu WHERE id =:id');
        $statement->execute(['intitule' => $zone->getIntitule(), 'lieu' => $zone->getLieu(), 'id' => $zone->getById(), 'numType_Zone' => $zone->getTypeZone()->getById()]);
    }
    public static function delete(Zone $zone)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM Zone WHERE id =:id');
        $statement->execute(['id' => $zone->getById()]);
    }
}
