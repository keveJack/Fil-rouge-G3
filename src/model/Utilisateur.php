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

    public function __construct( string $pseudo, string $email, string $motDePasse,Rang $rang,
        PersonnageCollection $personnageCollection = new PersonnageCollection(), SignalementCollection $signalementCollection = new SignalementCollection(),
         EvenementCollection $evenementCollection = new EvenementCollection(), SignalementCollection $_signalementCollectionSignale = new SignalementCollection(),int $id=0) {
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

   
}
