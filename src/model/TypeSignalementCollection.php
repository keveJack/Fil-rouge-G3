<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class TypeSignalementCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof TypeSignalement)) {
            throw new \InvalidArgumentException("Must be a type_signalement");
        }
    }
}
