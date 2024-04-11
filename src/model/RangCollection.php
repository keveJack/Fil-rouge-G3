<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class RangCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Rang)) {
            throw new \InvalidArgumentException("Must be a rang");
        }
    }
}
