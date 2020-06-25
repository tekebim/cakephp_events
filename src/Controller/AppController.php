<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function beforeRender(Event $e){
        // Share connexion's data in all view
        $this->set('Auth', $this->Auth);
    }
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        // Connexion - Auth part
        $this->loadComponent('Auth', [
            // How we connect
            'authenticate' => [
                // Type
                'Form' => [
                    // Input uses
                    'fields' => [
                        'username' => 'login',
                        'password' => 'password'
                    ]
                ]
            ],
            // Auth error message
            'authError' => 'Vous devez être authentifié pour accéder à ce contenu',
            // In wich location
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Events',
                'action' => 'index',
            ],
            'logoutRedirect' => [
                'controller' => 'Dashboard',
                'action' => 'index',
            ],
            // Rediction if not allowed
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Actions allowed as not authed
        // Actions [display and login ] for all controllers
        // action "display" is from PageController
        $this->Auth->allow(['display', 'login']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
}
