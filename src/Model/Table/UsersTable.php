<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        // self manage the columns 'created' and 'modified'
        $this->addBehavior('Timestamp');
        // add avatar behavior
        $this->addBehavior('Avatar');
        // relation with Events ( table_name , relation:foreign key )
        $this->hasMany('Events', ['foreignKey' => 'user_id', 'dependent' => true, 'cascadeCallbacks' => true]);
        $this->hasMany('Guests', ['foreignKey' => 'user_id', 'dependent' => true, 'cascadeCallbacks' => true]);
        // $this->hasMany('Events', ['foreignKey' => 'user_id', 'dependent' => true, 'cascadeCallbacks' => true]);
    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('login')
            ->notEmpty('password')
            ->maxLength('login', 20)
            ->maxLength('password', 150);
        return $v;
    }
}
