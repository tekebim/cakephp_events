<?php

namespace App\Controller;

use Cake\Controller\Controller;

class DashboardController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    public function index(){
        $this->loadModel ('Events');
        $this->loadModel ('Users');
        // Query all events
        $events = $this->Events->find()->contain(['Users', 'Guests'])->order(['beginning' => 'DESC'])->limit(5);
        $this->set(compact('events'));
    }
}
