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

    public function __construct(string $pseudo, string $email, string $motDePasse, Rang $rang, int $id = 0,
        PersonnageCollection $personnageCollection = new PersonnageCollection(), SignalementCollection $signalementCollection = new SignalementCollection(),
        EvenementCollection $evenementCollection = new EvenementCollection(), SignalementCollection $_signalementCollectionSignale = new SignalementCollection()) {
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

    public function getPersonnageCollection(): PersonnageCollection
    {
        // si vide alors faire requete pour les récupérer
        return $this->_personnageCollection;
    }
    public function getRang(): Rang
    {
        return $this->_rang;
    }
    public static function create(Utilisateur $utilisateur): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare("INSERT INTO Utilisateur (pseudo,mail,mot_de_passe,numRang) values (:pseudo,:email,:motDePasse,:numRang);");
        $statement->execute(['pseudo' => $utilisateur->getPseudo(), 'email' => $utilisateur->getEmail(), 'motDePasse' => $utilisateur->getMotDePasse(), 'numRang' => $utilisateur->getRang()->getById()]);
        return (int) Database::getInstance()->getConnexion()->lastInsertId();
    }
    public static function read(int $id): ?Utilisateur
    {
        $statement = Database::getInstance()->getConnexion()->prepare('select * from Utilisateur where id =:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            $rang = Rang::read($row['numRang']);
            return new Utilisateur(pseudo: $row['pseudo'], email: $row['mail'], id: $row['id'], motDePasse: $row['mot_de_passe'], rang: $rang);
        }

        return null;
    }
    public static function update(Utilisateur $utilisateur)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE Utilisateur set pseudo=:pseudo,mail=:email,mot_de_passe=:motDePasse,numRang=:numRang WHERE id =:id');
        $statement->execute(['pseudo' => $$utilisateur->getPseudo(), 'email' => $utilisateur->getEmail(), 'id' => $utilisateur->getById(), 'motDePasse' => $utilisateur->getMotDePasse(), 'numRang' => $utilisateur->getRang()->getById()]);
    }
    public static function delete(Utilisateur $utilisateur)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM Utilisateur WHERE id =:id');
        $statement->execute(['id' => $utilisateur->getById()]);
    }
}
