<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class ZoneCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Zone)) {
            throw new \InvalidArgumentException("Must be a zone");
        }
    }
}
