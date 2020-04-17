<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Behavior;
use Cake\Event\Event;

class AvatarBehavior extends Behavior
{
    // on lui indique le comprtement particulier à avoir avant de faire une suppression d'un objet User
    public function beforeDelete(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        if (!empty($entity->avatar) && file_exists(WWW_ROOT . 'img/avatars/' . $entity->avatar)) {
            unlink(WWW_ROOT . 'img/avatars/' . $entity->avatar);
        }
    }
}
