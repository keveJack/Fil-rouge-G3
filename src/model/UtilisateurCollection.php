<?php
declare (strict_types = 1);
namespace app\FilRougeG3\model;

class UtilisateurCollection extends \ArrayObject

{
    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Utilisateur)) {
            throw new \InvalidArgumentException("Must be a utilisateur");
        }
    }
    
}
