<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class PersonnageCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Personnage)) {
            throw new \InvalidArgumentException("Must be a personnage");
        }
    }
}
