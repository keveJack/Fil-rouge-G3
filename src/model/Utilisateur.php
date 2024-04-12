<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

use PHPUnit\Event\EventCollection;

class Utilisateur
{
    private int $_id;
    private string $_pseudo;
    private string $_email;
    private string $_motDePasse;
    private PersonnageCollection $_personnageCollection;
    private SignalementCollection $_signalementCollection;
    private Rang $_rang;
    private EvenementCollection $_evenementCollection;
    private SignalementCollection $_signalementCollectionSignale;

    public function __construct( string $pseudo, string $email, string $motDePasse, Rang $rang, int $id=0,
        PersonnageCollection $personnageCollection = new PersonnageCollection(), SignalementCollection $signalementCollection = new SignalementCollection(),
        EvenementCollection $evenementCollection = new EventCollection, SignalementCollection $_signalementCollectionSignale = new SignalementCollection()) {
        $this->_id = $id;
        $this->_pseudo = $pseudo;
        $this->_email = $email;
        $this->_motDePasse = $motDePasse;
        $this->_personnageCollection = $personnageCollection;
        $this->_signalementCollection = $signalementCollection;
        $this->_rang = $rang;
        $this->_evenementCollection = $evenementCollection;
        $this->_signalementCollectionSignale = $_signalementCollectionSignale;
    }

    public function getById(): int
    {
        return $this->_id;
    }

    public function getPseudo(): string
    {
        return $this->_pseudo;
    }
    public function getEmail(): string
    {
        return $this->_email;
    }
    public function getMotDePasse(): string
    {
        return $this->_motDePasse;
    }

    public function getPersonnageCollection():PersonnageCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_personnageCollection;
    }
    public static function create(Utilisateur $utilisateur): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Zone (pseudo,email,id,motDePasse,numUtilisateur) values (:pseudo,:email,:id,:motDePasse,:numUtilisateur);");
        $statement->execute(['pseudo' => $utilisateur->getPseudo(),'email'=>$utilisateur->getEmail(),'motDePasse'=>$utilisateur->getMotDePasse(),'id'=>$utilisateur->getById(),]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id):?Utilisateur
    {
        $statement=Database::getInstance()->getConnexion()->prepare('select * from Utilisateur where id =:id;');
        $statement->execute(['id'=>$id]);
        if ($row = $statement->fetch())
        
    {
        $rang = Rang::read($row['numRang']);
        return new Utilisateur(pseudo:$row['pseudo'],email:$row['email'],id:$row['id'],motDePasse:$row['motDePasse'],rang:$rang);
    }
           
        return null;
    }
}
