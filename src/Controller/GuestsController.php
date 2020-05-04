<?php

namespace App\Controller;

use Cake\Controller\Controller;

class GuestsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function cancel($eventID)
    {
        $u = $this->Auth->user();

        $q = $this->Guests->find()
            ->where(['user_id' => $u['id']])
            ->andWhere(['event_id' => $eventID])
            ->select(['Guests.id']);

        $el = $q->first();

        $guest = $this->Guests->get($el->id);
        $guest->status = 'canceled';

        // If not result found
        if ($q->isEmpty()) {
            $this->Flash->error('Invitation introuvable');
            return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
        }

        if($this->Guests->save($guest)){
            // Success
            $this->Flash->success('Annulation de votre participation effectuée');
            return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
        } else {
            // something went wrong
            $this->Flash->error('Une erreur est survenue. Veuillez réessayer');
            return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
        }
    }

    public function accept($eventID)
    {
        $q = $this->Guests->find()
            ->where(['user_id' => $_POST['user_id']])
            ->andWhere(['event_id' => $eventID])
            ->select(['Guests.id']);

        $el = $q->first();

        $guest = $this->Guests->get($el->id);
        $guest->status = 'validated';

        // If not result found
        if ($q->isEmpty()) {
            $this->Flash->error('Invitation introuvable');
            return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
        }

        if($this->Guests->save($guest)){
            // Success
            $this->Flash->success('Vous venez d\'ajouter un nouvel invité');
            return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
        } else {
            // something went wrong
            $this->Flash->error('Une erreur est survenue. Veuillez réessayer');
            return $this->redirect(['controller' => 'Events', 'action' => 'view', $eventID]);
        }
    }
}
