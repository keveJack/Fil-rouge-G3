<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class Rang
{
    private int $_id;
    private string $_intitule;
    private ZoneCollection $_zoneCollection;
    private UtilisateurCollection $_utilisateurCollection;

    public function __construct(int $id, string $intitule, ZoneCollection $zoneCollection = new ZoneCollection(), UtilisateurCollection $utilisateurCollection = new UtilisateurCollection())
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_zoneCollection = $zoneCollection;
        $this->_utilisateurCollection = $utilisateurCollection;

    }

    public function getById(): int
    {
        return $this->_id;
    }

    public function getIntitule(): string
    {
        return $this->_intitule;
    }

}



public function getUtilisateur():UtilisateurCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_utilisateurCollection ;
    }
    public function addUtlitisateur(Utilisateur $utilisateur)
    {
        // si vide alors faire requete pour les récupérer
        return $this->_signalementCollection[]=$signalement ;
    }

    public function getUtilisateur():UtilisateurCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_utilisateurCollection ;
    }
    public function addUtlitisateur(Utilisateur $utilisateur)
    {
        // si vide alors faire requete pour les récupérer
        return $this->_iutilisateurCollection[]=$utilisateur ;
    }
public static function create(Rang $rang): int
{
    $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Rang (intitule, numUtilisateur, numZone) values (:intitule, :numUtilisateur, :numZone );");
    $statement->execute(['intitule' => $rang->getIntitule()]);
    return (int) Database::getInstance()->getConnexion()->lastInsertId();
}
public static function read(int $id):?Rang
{
    $statement=Database::getInstance()->getConnexion()->prepare('select * from Rang where id =:id;');
    $statement->execute(['id'=>$id]);
    if ($row = $statement->fetch())
    {
        $rang = new Rang(id:$row['id'],intitule:$row['intitule']);
        return $rang;
    }
    return null;
}