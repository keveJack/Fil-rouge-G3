<?php
declare (strict_types = 1);
use app\FilRougeG3\controller\ApiController;
use app\FilRougeG3\model\Personnage;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$route = explode('/', $_SERVER['REQUEST_URI']);
if (isset($route[1]) && $route[1] == 'api') 
{
    if (isset($route[2]))
    {
        switch ($route[2]) {
            case 'evenement':
                ApiController::evenement();
                break;
                case 'personnage':
                ApiController::personnage();
                break;
                case 'zone':
                ApiController::zone();
                    break;
            default:
                ApiController::evenement();
                break;
        }
       
    }
}