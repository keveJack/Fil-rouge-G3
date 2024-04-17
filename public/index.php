<?php
declare (strict_types = 1);
use app\FilRougeG3\controller\ApiController;
use app\FilRougeG3\model\Personnage;
use app\FilRougeG3\router\HttpRequest;
use app\FilRougeG3\router\Router;
require_once dirname(__DIR__) . '/vendor/autoload.php';

try
{
   $httpRequest = new HttpRequest(); //recuperation de la requête HTTP grace à $_SERVER;
   $route = Router::getInstance()->findRoute($httpRequest);//découverte de la route depuis le Router construit avec le fichier config/routes.json
   $httpRequest->setRoute($route);//configuration de la requête avec cette route découverte
   $httpRequest->bindParam();// récuperation des parametres fournis dans le $_GET ou dans le $_POST
   $httpRequest->run();// exécution de la route trouvée
}
catch(Exception $e)
{
   echo "Une erreur s'est produite";
   echo $e->getMessage();
}
