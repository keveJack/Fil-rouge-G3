<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

use DateTime;

class Evenement
{
    private int $_id;
    private string $_intitule;
    private \DateTime $_date;
    private int $_niveau_min;
    private int $_niveau_max;
    private Zone $_zone;
    private PersonnageCollection $_personnageCollection;
    // utilisateur qui crée et gère l'événement
    private Utilisateur $_utilisateur;

    public function __construct(string $intitule, \DateTime $date, int $niveau_min, int $niveau_max, Zone $zone,Utilisateur $utilisateur,
        PersonnageCollection $personnageCollection = new PersonnageCollection(),int $id = 0 ) {
        $this->_id = $id;
        $this->_intitule = $intitule;
        $this->_date = $date;
        $this->_niveau_min = $niveau_min;
        $this->_niveau_max = $niveau_max;
        $this->_zone = $zone;
        $this->_personnageCollection = $personnageCollection;
        $this->_utilisateur = $utilisateur;
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
    public function getNiveauMin(): int
    {
        return $this->_niveau_min;
    }
    public function getNiveauMax(): int
    {
        return $this->_niveau_max;
    }
    public function setIntitule(): string
    {
        return $this->_intitule;
    }
    public function setDate(): DateTime
    {
        return $this->_date;
    }
    public function setNiveauMin(): int
    {
        return $this->_niveau_min;
    }
    public function setNiveauMax(): int
    {
        return $this->_niveau_max;
    }
    public function getUtilisateur():Utilisateur
    {
        return $this->_utilisateur;
    }
    public function getPersonnageCollection(): PersonnageCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_personnageCollection;
    }
    public function getZone(): Zone
    {
        // si vide alors faire requete pour les récupérer
        return $this->_zone;
    }

    public static function create(Evenement $evenement): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Evenement (intitule,date,id,niveau_min,niveau_max,numUtilisateur,numZone)
         values (:intitule,:date,:id,:niveau_min,:niveau_max,:numUtilisateur,:numZone);");
        $statement->execute(['intitule' => $evenement->getIntitule()], ['date' => $evenement->getDate()], ['niveau_min' => $evenement->getNiveauMin()], ['niveau_max' => $evenement->getNiveauMax()], ['numZone' => $evenement->getZone()->getById()])
        ;
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id): ?Evenement
    {
        $statement = Database::getInstance()->getConnexion()->prepare('select * from Evenement where id =:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            $utilisateur = Utilisateur::read($row['numUtilisateur']);
            $zone = Zone::read($row['numZone']);
            $evenement = new Evenement(id: $row['id'], niveau_max: $row['niveau_max'], niveau_min: $row['niveau_min'], intitule: $row['intitule'], date: $row['date'], utilisateur: $utilisateur, zone: $zone);
            return $evenement;
        }
        return null;

    }

    public static function update(Evenement $evenement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE evenement set intitule=:intitule,date=:date,niveau_min=:niveau_min,niveau_max=:niveau_max,numUtilisateur=:numUtilisateur,numZone=:numZone WHERE id =:id');
        $statement->execute(['intitule'=>$evenement->getIntitule(),'numZone'=>$evenement->getZone()->getById(),'numUtilisateur'=>$evenement->getUtilisateur()->getById(),'id'=>$evenement->getById(), 'date'=>$evenement->getDate(),'niveau_min'=>$evenement->getNiveauMin(), 'niveau_max'=>$evenement->getNiveauMax()]);
    }
    public static function delete(Evenement $evenement)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM evenement WHERE id =:id');
        $statement->execute(['id'=>$evenement->getById()]);
    }

}
