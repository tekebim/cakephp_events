<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

class ConversationsTable extends Table
{
    public function initialize(array $config)
    {
        // self manage the columns 'created' and 'modified'
        $this->addBehavior('Timestamp');


    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('user1_id')
            ->allowEmpty('user2_id');
        return $v;
    }
}
