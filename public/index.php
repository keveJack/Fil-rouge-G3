<?php
declare (strict_types = 1);
use app\FilRougeG3\model\Rang;
use app\FilRougeG3\model\Utilisateur;
use app\FilRougeG3\model\Evenement;
use app\FilRougeG3\model\Zone;
use app\FilRougeG3\model\TypeZone;

require_once dirname(__DIR__) . '/vendor/autoload.php';
echo "SALUT";
$typeZone = new TypeZone(intitule:'Raid');
TypeZone::create($typeZone);
$typeZone = TypeZOne::read(4);
var_dump($typeZone);
$zone = new Zone(intitule:'Zone de fou',lieu:'dans le donjon trop ouf',typeZone:$typeZone);
var_dump($zone);
Zone::create($zone);

$evenement = new Evenement(intitule:'Yolo à la ferme',date:new DateTime('now'),niveau_min:5,niveau_max:50,zone:$zone,utilisateur:$utilisateur);
$rang = new Rang('newbie');
$id = Rang::create($rang );
$rangDB = Rang::read($id);

$rangDB = Rang::read(1);
//var_dump($rang);
// $utilisateur = new Utilisateur(pseudo: 'Ben', email: 'douakona@gmail.com', rang: $rangDB, motDePasse: 'password');
// Utilisateur::create($utilisateur);
// $zone = new Zone(intitule:'Zone de fou',lieu:'dans le donjon trop ouf',typeZone:$typeZone);
// var_dump($rang);
