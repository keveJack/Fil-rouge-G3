<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class TypeSignalementCollection extends \ArrayObject

{
    private array $_values = [];
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof TypeSignalement)) {
            throw new \InvalidArgumentException("Must be a type_signalement");
        }
        if ($index === null) {
            $this->_values[] = $newval;
        } else {
            $this->_values[$index] = $newval;
        }
    }


    
}
