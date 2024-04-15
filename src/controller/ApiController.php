<?php
declare (strict_types = 1);
namespace app\FilRougeG3\controller;
use app\FilRougeG3\model\EvenementCollection;
use app\FilRougeG3\model\PersonnageCollection;
use app\FilRougeG3\model\ZoneCollection;
use app\FilRougeG3\model\RangCollection;
use app\FilRougeG3\model\Signalement;
use app\FilRougeG3\model\TypeSignalement;
use app\FilRougeG3\model\TypeZone;
use app\FilRougeG3\model\Utilisateur;
use app\FilRougeG3\model\Zone;


class ApiController
{
    
    public static function evenement(){
        header ('Content-Type: application/json; charset=utf-8');
        $liste = EvenementCollection::lister();
        echo json_encode($liste);
    }
    public static function personnage(){
        header ('Content-Type: application/json; charset=utf-8');
        $liste = PersonnageCollection::lister();
        echo json_encode($liste);
    }
    public static function zone(){
        header ('Content-Type: application/json; charset=utf-8');
        $liste = ZoneCollection::getZones();
        echo json_encode($liste);
    }
}