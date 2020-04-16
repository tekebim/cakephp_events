<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        // self manage the columns 'created' and 'modified'
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('login')
            ->notEmpty('password')
            ->maxLength('login', 20)
            ->maxLength('password', 150)
            ->allowEmpty('password', 30);
        return $v;
    }
}
