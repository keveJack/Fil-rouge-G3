<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class TypeZoneCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof TypeZone)) {
            throw new \InvalidArgumentException("Must be a type_zone");
        }
    }
}
