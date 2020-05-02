<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Conversation extends Entity
{
    // Here we precise which database's columns are editable : all except id
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
