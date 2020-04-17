<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

class GuestsTable extends Table
{
    public function initialize(array $config)
    {
        // self manage the columns 'created' and 'modified'
        $this->addBehavior('Timestamp');
        // relation with Events ( table_name , relation:foreign key )
        // $this->hasMany('Events', ['foreignKey' => 'user_id', 'dependent' => true, 'cascadeCallbacks' => true]);
        // $this->hasMany('Events', ['foreignKey' => 'user_id', 'dependent' => true, 'cascadeCallbacks' => true]);
        $this->belongsTo('Users', ['foreignKey' => 'user_id', 'joinType' => 'INNER']);
        $this->belongsTo('Events', ['foreignKey' => 'event_id', 'joinType' => 'INNER']);
    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('event_id')
            ->notEmpty('user_id');
        return $v;
    }
}
