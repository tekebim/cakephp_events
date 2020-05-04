<?php


namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

class EventsTable extends Table
{
    public function initialize(array $config)
    {
        // self manage the columns 'created' and 'modified'
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', ['foreignKey' => 'user_id', 'joinType' => 'INNER']);
        $this->hasMany('Guests', ['foreignKey' => 'event_id', 'dependent' => true, 'cascadeCallbacks' => true]);
    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('title')
            ->notEmpty('user_id')
            ->notEmpty('beginning')
            ->notEmpty('description')
            ->allowEmpty('location')
            ->allowEmpty('picture')
            ->maxLength('title', 100)
            ->maxLength('picture', 50)
            ->maxLength('location', 200);
        return $v;
    }
}
