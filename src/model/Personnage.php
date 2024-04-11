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

}
