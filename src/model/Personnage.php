<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;
use JsonSerializable;

class Personnage implements JsonSerializable
{
    private int $_id;
    private int $_niveau;
    private string $_equipement;
    private EvenementCollection $_evenementCollection;
    private Utilisateur $_utilisateur;

    public function __construct( int $niveau, string $equipement, Utilisateur $utilisateur, EvenementCollection $evenementCollection = new EvenementCollection(),int $id=0) {
        $this->_id = $id;
        $this->_niveau = $niveau;
        $this->_equipement = $equipement;
        $this->_evenementCollection = $evenementCollection;
        $this->_utilisateur = $utilisateur;
    }

    public function getById(): int
    {
        return $this->_id;
    }

    public function getNiveau(): int
    {
        return $this->_niveau;
    }
    public function getEquipement(): string
    {
        return $this->_equipement;
    }

    public function getEvenementCollection(): EvenementCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_evenementCollection;
    }
    public function addEvenementCollection(Evenement $evenement)
    {
        // si vide alors faire requete pour les récupérer
        return $this->_evenementCollection[] = $evenement;
    }

    public function getUtilisateur(): Utilisateur
    {
        // si vide alors faire requete pour les récupérer
        return $this->_utilisateur;
    }
    public function addUtilisateur(Utilisateur $utilisateur)
    {
        // si vide alors faire requete pour les récupérer
        return $this->_utilisateur[] = $utilisateur;
    }

    public static function create(Personnage $personnage): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Personnage (niveau,equipement, numEvenement, numUtilisateur)
         values (:niveau, :equipement, :numEvenement, :numUtilisateur );");
        $statement->execute(['niveau' => $personnage->getNiveau()],
            ['equipement' => $personnage->getEquipement()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id): ?Personnage
    {
        $statement = Database::getInstance()->getConnexion()->prepare('select * from Personnage where id =:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            $utilisateur = Utilisateur::read($row['numUtilisateur']);
            $personnage = new Personnage(id: $row['id'], niveau: $row['niveau'], equipement: $row['equipement'], utilisateur: $utilisateur);
            return $personnage;
        }
        return null;

    }


    public static function update(Personnage $personnage)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE personnage set niveau=:niveau,equipement=:equipement,numUtilisateur=:numUtilisateur WHERE id =:id');
        $statement->execute(['niveau'=>$personnage->getNiveau(),'equipement'=>$personnage->getEquipement(), 'numUtilisateur'=>$personnage->getUtilisateur()->getById(),'id'=>$personnage->getById()]);
    }
    public static function delete(Personnage $personnage)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM personnage WHERE id =:id');
        $statement->execute(['id'=>$personnage->getById()]);
    }

    public function jsonSerialize(): mixed
    {
        $vars = get_object_vars($this);
        return $vars;
    }

}
