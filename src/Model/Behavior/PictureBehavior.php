<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Behavior;
use Cake\Event\Event;

class PictureBehavior extends Behavior
{
    public function beforeDelete(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        if (!empty($entity->picture) && file_exists(WWW_ROOT . 'img/events/' . $entity->picture)) {
            unlink(WWW_ROOT . 'img/events/' . $entity->picture);
        }
    }
}
