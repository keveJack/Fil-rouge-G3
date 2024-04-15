<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class SignalementCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Signalement)) {
            throw new \InvalidArgumentException("Must be a signalement");
        }
    }
    
}

