<?php
# src/router/ActionNotFoundException.php
declare (strict_types = 1);
namespace app\FilRougeG3\router;

class ActionNotFoundException extends \Exception

{
    public function __construct($message = "Action was not found")
    {
        parent::__construct($message, 1);
    }
}
