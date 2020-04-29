<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\Time;

class DashboardController extends AppController
{

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Events.beginning' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    public function index()
    {
        // Load required models
        $this->loadModel('Events');
        $this->loadModel('Guests');
        $this->loadModel('Users');

        /*
         * Query all events
        */

        $events = $this->Events->find()->contain(['Users', 'Guests'])->order(['beginning' => 'DESC'])->limit(5);

        /*
         * Query last connected users
        */
        //$time = Time::now();

        // Date Time with 30 minutes ago
        $timePeriodMax = new Time('30 minutes ago');

        $lastusers = $this->Users->find()
            ->select(['Users.id', 'Users.login', 'Users.lastin', 'Users.lastout'])
            ->where(['lastin > lastout'])
            ->where(['lastin >' => $timePeriodMax])
            ->order(['lastin' => 'DESC'])
            ->limit(5);

        /*
         * Query contributors
        */
        $contributors = $this->Events->find()->contain(['Users']);
        $contributors->select([
            'count' => $contributors->func()->count('user_id'),
            'user_id' => 'user_id',
            'Users.login'
        ])
            ->group('user_id')
            ->order(['count' => 'DESC'])
            ->limit(5);

        /*
         * Query most invitated users
        */
        $invated = $this->Guests->find()->contain(['Users']);
        $invated
            ->select([
                'count' => $invated->func()->count('Guests.user_id'),
                'Guests.user_id',
                'Users.login'
            ])
            ->group('Guests.user_id')
            ->order(['count' => 'DESC'])
            ->limit(5);

        // Share to view
        $this->set(compact('lastusers', 'invated', 'contributors'));
        $this->set('events', $this->paginate($events));
    }
}
