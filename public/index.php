<?php
declare(strict_types=1);
use app\FilRougeG3\model;
use app\FilRougeG3\model\Evenement;
use app\FilRougeG3\model\TypeZone;
use app\FilRougeG3\model\Zone;

require_once dirname(__DIR__) .'/vendor/autoload.php';
echo "SALUT";
// $typeZone = new TypeZone(intitule:'Raid');
// TypeZone::create($typeZone);
$typeZone = TypeZOne::read(4);
var_dump($typeZone);
$zone = new Zone(intitule:'Zone de fou',lieu:'dans le donjon trop ouf',typeZone:$typeZone);
var_dump($zone);
// Zone::create($zone);



// $evenement = new Evenement(intitule:'Yolo à la ferme',date:new DateTime('now'),niveau_min:5,niveau_max:50,zone:$zone,utilisateur:$utilisateur);
