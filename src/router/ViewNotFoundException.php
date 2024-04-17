<?php
# src/router/ViewNotFoundException.php
declare (strict_types = 1);
namespace app\FilRougeG3\router;

class ViewNotFoundException extends \Exception

{
    public function __construct($viewFile, $message = "View was not found")
    {

        parent::__construct($message . ": " . $viewFile, 1);
    }
}
