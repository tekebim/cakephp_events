<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    // Here we precise which database's columns are editable : all except id
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword($value){
        if(strlen($value)){
            $hash = new DefaultPasswordHasher();
            return $hash->hash($value);
        }
    }
}
