<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class EvenementCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Evenement)) {
            throw new \InvalidArgumentException("Must be a evenement");
        }
    }
}
