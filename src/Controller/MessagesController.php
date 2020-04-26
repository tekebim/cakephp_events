<?php

namespace App\Controller;

use Cake\Controller\Controller;

class MessagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $messages = $this->Messages->find()->contain(['Sender', 'Receiver']);
        $messages
            ->where(['Messages.receiver_id' => $this->Auth->user('id')])
            ->orWhere(['Messages.sender_id' => $this->Auth->user('id')])
            ->order(['Messages.created' => 'DESC'])
            ->toArray();

        $this->set(compact('messages'));
    }


    /*
    ->select([
        'Messages.sender_id',
        'Messages.receiver_id',
        'Messages.content',
        'Messages.created',
        'Sender.login',
        'Sender.avatar',
        'Receiver.login',
        'Receiver.avatar',
    ])
    */

    public function display()
    {
        $messages = $this->Messages->find()
            ->where(['Messages.receiver_id' => $this->Auth->user('id')])
            ->orWhere(['Messages.sender_id' => $this->Auth->user('id')])
            ->order(['Messages.created' => 'DESC'])
            ->contain([
                'Sender',
                'Receiver'
            ])
            ->toArray();

        $this->set(compact('messages'));
    }

    public function request($eventID)
    {

        $this->loadModel('Guests');

        $n = $this->Messages->newEntity();
        $this->set(compact('n'));

        // Check if history message exist

        // Check if is from post method
        if ($this->request->is(['post'])) {
            // Check if form submit base on input hidden : request_submit
            if (isset($_POST['request_submit'])) {
                // Get form data
                $n = $this->Messages->patchEntity($n, $this->request->getData());
                // Pass current Auth user ID as sender_id
                $n->sender_id = $this->Auth->user()['id'];
                // Determine receiver_id
                $n->receiver_id = $_POST['receiver_id'];
                $n->event_id = $eventID;
                $n->type = 'request';

                $i = $this->Guests->newEntity();

                $i->user_id = $n->sender_id;
                $i->event_id = $n->event_id;
                $i->status = 'pending';
                // Test saving record on messages database
                if ($result = $this->Messages->save($n) && $result = $this->Guests->save($i)) {
                    $this->Flash->success('Votre message a été correctement evnoyée');
                    return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
                }
                // Error while trying to save
                $this->Flash->error('Une erreur est survenue. Veuillez réessayer.');
            }
        } else {
            $this->Flash->error('Vous ne pouvez pas accéder à ce contenu directement.');
            return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
        }
    }
}
