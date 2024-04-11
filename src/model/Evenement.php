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
    private Utilisateur $_utilisateur;

    public function __construct(int $id=0, string $intitule, \DateTime $date, int $niveau_min, int $niveau_max, Zone $zone,
        PersonnageCollection $personnageCollection = new PersonnageCollection(), Utilisateur $utilisateur) {
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
}
