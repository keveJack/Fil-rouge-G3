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

    public function __construct(int $id, string $intitule, \DateTime $date, Utilisateur $utilisateur, UtilisateurCollection $utilisateursSignales = new UtilisateurCollection(), TypeSignalement $typeSignalement)
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
}
