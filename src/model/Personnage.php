<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class Personnage
{
    private int $_id;
    private int $_niveau;
    private string $_equipement;
    private EvenementCollection $_evenementCollection;
    private Utilisateur $_utilisateur;

    public function __construct(int $id, int $niveau, string $equipement, EvenementCollection $evenementCollection = new EvenementCollection(),
        Utilisateur $utilisateur) {
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
    public function addEvenementCollection(EvenementCollection $evenementCollection)
    {
        // si vide alors faire requete pour les récupérer
        return $this->_evenementCollection[] = $evenement;
    }

    public function getUtlisateur(): Utilisateur
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
        $statement->execute(['niveau' => $niveau->getNiveau()],
        ['equipement' => $equipement->getEquipement()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id): ?Personnage
    {
        $statement = Database::getInstance()->getConnexion()->prepare('select * from Personnage where id =:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            $personnage = new Personnage(id: $row['id'], niveau: $row['niveau'], equipement: $row['equipement']);
            return $personnage;
        }
        return null;

    }
    
}


