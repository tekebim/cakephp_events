<?php

namespace App\Controller;

use Cake\Controller\Controller;

class MessagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function display(){
        $messages = $this->Messages->find()
            ->where(['Messages.user_id' => $this->Auth->user('id')])
            ->orwhere(['Messages.sender_id' => $this->Auth->user('id')])
            ->order(['Messages.created' => 'DESC'])
            ->contain([
                'Sender',
                'Receiver'
            ])
        ;
    }
}
