<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

class MessagesTable extends Table
{
    public function initialize(array $config)
    {
        // self manage the columns 'created' and 'modified'
        $this->addBehavior('Timestamp');

        $this->belongsTo('Sender', [
            'className' => 'Users',
            'foreignKey' => 'sender_id',
            'propertyName' => 'Sender',
            'joinType' => 'INNER']
        );

        $this->belongsTo('Receiver', [
                'className' => 'Users',
                'foreignKey' => 'receiver_id',
                'propertyName' => 'Receiver',
                'joinType' => 'INNER']
        );
    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('login')
            ->notEmpty('password')
            ->allowEmpty('picture')
            ->maxLength('login', 20)
            ->maxLength('password', 150)
            ->add('picture', 'file');
        return $v;
    }
}
