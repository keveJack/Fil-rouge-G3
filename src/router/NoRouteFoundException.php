<?php
# src/router/NoRouteFoundException.php
declare (strict_types = 1);
namespace app\FilRougeG3\router;

class NoRouteFoundException extends \Exception

{
    public function __construct($message = "No route has been found")
    {
        parent::__construct($message, 2);
    }
}
