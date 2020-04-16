<?php

namespace App\Controller;

use Cake\Controller\Controller;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        // Allow method
        $this->Auth->allow(['logout', 'create']);
    }

    public function index()
    {
        $users = $this->Users->find();
        $this->set(compact('users'));
    }

    public function login()
    {
        // Check if is from post method
        if ($this->request->is(['post'])) {
            $user = $this->Auth->identify();
            // Test authentification
            if($user){
                $this->Auth->setUser($user);
                $this->Flash->success('Bienvenue ' . $user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Connexion impossible');
        }
    }

    public function create()
    {
        $n = $this->Users->newEntity();
        $this->set(compact('n'));

        // Check if is from post method
        if ($this->request->is(['post'])) {
            // Get form data
            $n = $this->Users->patchEntity($n, $this->request->getData());
            // Test saving record on database
            if ($this->Users->save($n)) {
                // Test successful
                // Display Flash success
                $this->Flash->success('Bienvenue');
                return $this->redirect(['action' => 'login']);
                // return $this->redirect(['action'=>'login']);
            }
            // Error while trying to save
            $this->Flash->error('Une erreur est survenue. Veuillez réessayer.');
        }
    }
}
