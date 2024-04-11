<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class TypeSignalement
{
    private int $_id;
    private string $_intitule;
    private SignalementCollection $_signalementCollection;

    public function __construct(int $id, string $intitule, SignalementCollection $signalementCollection = new SignalementCollection())
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_signalementCollection = $signalementCollection;
    }

    public function getById(): int
    {
        return $this->_id;
    }

    public function getIntitule(): string
    {
        return $this->_intitule;
    }
    public function getSignalements():SignalementCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_signalementCollection ;
    }
    public function addSignalement(Signalement $signalement)
    {
        // si vide alors faire requete pour les récupérer
        return $this->_signalementCollection[]=$signalement ;
    }
    public static function create(TypeSignalement $typeSignalement): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO TypeSignalement (intitule) values (:intitule);");
        $statement->execute(['intitule' => $typeSignalement->getIntitule()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id):?TypeSignalement
    {
        $statement=Database::getInstance()->getConnexion()->prepare('select * from TypeSignalement where id =:id;');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        {
            $typeSignalement = new TypeSignalement(id:$row['id'],intitule:$row['intitule']);
            return $typeSignalement;
        }
        return null;
    }
 
}
