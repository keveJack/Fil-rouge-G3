<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class Signalement
{
    private int $_id;
    private string $_intitule;
    private \DateTime $_date;
    private Utilisateur $_utilisateur;
    private UtilisateurCollection $_utilisateursSignales;
    private TypeSignalement $_typeSignalement;

    public function __construct(int $id=0, string $intitule, \DateTime $date, Utilisateur $utilisateur, UtilisateurCollection $utilisateursSignales = new UtilisateurCollection(), TypeSignalement $typeSignalement)
    {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_date = $date;
        $this->_utilisateur = $utilisateur;
        $this->_typeSignalement = $typeSignalement;
        $this->_utilisateursSignales = $utilisateursSignales;
    }
    public function getById(): int
    {
        return $this->_id;
    }
    public function getIntitule(): string
    {
        return $this->_intitule;
    }
    public function getDate(): \DateTime
    {
        return $this->_date;
    }
    
    public function getUtilisateur():Utilisateur
    {
        // si vide alors faire requete pour les récupérer
        return $this->_utilisateur;
    }
    public function getUtilisateurs():UtilisateurCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_utilisateursSignales ;
    }
    public function addUtilisateur(Utilisateur $utilisateur)
    {
        // si vide alors faire requete pour les récupérer
        return $this->_utilisateursSignales[]=$utilisateur ;
    }



    public static function create(Signalement $Signalement): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Zone (intitule,date,id,numUtilisateur,numType_Signalement) values (:intitule,:date,:id,:numUtilisateur,:numType_Signalement);");
        $statement->execute(['intitule' => $Signalement->getIntitule(),'date'=>$Signalement->getDate(),'id'=>$Signalement->getById()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id):?Signalement
    {
        $statement=Database::getInstance()->getConnexion()->prepare('select * from Signalement where id =:id;');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        {
            $typeSignalement = TypeSignalement::read($row['numType_Signalement']);
            $utilisateur = Utilisateur::read($row['numUtilisateur']);
            $Signalement = new Signalement(intitule:$row['intitule'],date:$row['date'],id:$row['id'],typeSignalement:$typeSignalement,utilisateur:$utilisateur);
            return $Signalement;
        }
        return null;
    }
}
