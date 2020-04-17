<?php

namespace App\Controller;

use Cake\Controller\Controller;

class EventsController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        // Allow methods
        // $this->Auth->allow(['logout', 'add']);
    }

    public function index()
    {
        $events = $this->Events->find()->contain(['Users', 'Guests']);
        $this->set(compact('events'));
    }

    public function view($id)
    {
        $event = $this->Events->get($id, ['contain' => ['Users','Guests.Users']]);
        $this->set(compact('event'));
    }

    public function add()
    {
        $n = $this->Events->newEntity();
        $this->set(compact('n'));

        // Get the current user information
        $u = $this->Auth->user();
        // Define user_id from current auth id
        $n->user_id = $u['id'];

        // Check if is from post method
        if ($this->request->is(['post'])) {
            // Get form data
            $n = $this->Events->patchEntity($n, $this->request->getData());
            // Test saving record on database
            if ($result = $this->Events->save($n)) {
                $this->Flash->success('Votre événement a été correctement ajouté');
                return $this->redirect(['action' => 'index']);
            }
            // Error while trying to save
            $this->Flash->error('Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function invite($eventID)
    {
        $n = $this->Events->newEntity();
        $this->set(compact('n'));

        $event = $this->Events->get($eventID, ['contain' => ['Users', 'Guests']]);
        $this->set(compact('event'));

        // Check if is from post method
        if ($this->request->is(['post'])) {
            // Get form data
            $n = $this->Events->patchEntity($n, $this->request->getData());
            $n->event_id = intval($eventID);

            // Disable self invitation
            // Get current user from auth
            $u = $this->Auth->user();

            echo '<pre>'. var_dump($n->user_id) .'</pre>';
            echo '<pre>'. var_dump($n->event_id) .'</pre>';
            echo '<pre>'. var_dump($u['id']) .'</pre>';

            if($n->user_id === $u['id']){
                $this->Flash->error('Vous participez déjà à cet événément');
                return $this->redirect(['action' => 'invite', $eventID]);
            }
            // Check if invitation already sent to user
            $existing = $this->Events->Guests->find()->where(['user_id' => $n->user_id, 'event_id' => $n->event_id]);
            $firstEl = $existing->first();

            if($firstEl){
                $this->Flash->error('Une invitation a déjà été envoyée à l\'utilisateur');
                return $this->redirect(['action' => 'invite', $eventID]);
            }

            // Test saving record on database
            if ($result = $this->Events->Guests->save($n)) {
                $this->Flash->success('Votre invitation a été correctement envoyée');
                return $this->redirect(['action' => 'view', $eventID]);
            }
            // Error while trying to save
            $this->Flash->error('Une erreur est survenue. Veuillez réessayer.');
        }
    }
}
