<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\Time;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        // Allow methods
        $this->Auth->allow(['logout', 'add']);
    }

    public function index()
    {
        $users = $this->Users->find();
        $this->set(compact('users'));
    }

    public function getCurrentUserId()
    {
        $u = $this->Auth->user();
        return $u['id'];
    }

    public function login()
    {
        // Check if user already auth
        if ($this->Auth->user()) {
            $this->Flash->warning('Vous êtes déjà authentifié');
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            // Check if is from post method
            if ($this->request->is(['post'])) {
                $user = $this->Auth->identify();
                // Test authentification
                if ($user) {
                    $this->Auth->setUser($user);
                    // Update lastin column on db with current time
                    if ($this->updateLastIn($this->getCurrentUserId())) {
                        return $this->redirect($this->Auth->redirectUrl());
                    } else {
                        $this->Flash->success('Une erreur est survenue.');
                    }
                }
                $this->Flash->error('Connexion impossible');
            }
        }
    }

    public function logout()
    {
        // Get the current user information
        $u = $this->Auth->user();
        $user = $this->Users->get($u['id']);
        // We save the current time for the lastout row
        $user->lastout = time();
        // We try to the save / update that on dabatase
        if ($this->Users->save($user)) {
            $this->Flash->success('Au plaisir de vous revoir bientôt parmis nous ' . $user->login);
            return $this->redirect($this->Auth->logout());
        } else {
            $this->Flash->success('Une erreur est survenue.');
        }
    }

    public function edit()
    {
        $u = $this->Auth->user();
        $e = $this->Users->find()->where(['id' => $u['id']]);
        // If not result found
        if ($e->isEmpty()) {
            $this->Flash->error('Utilisateur introuvable');
            return $this->redirect(['action' => 'add']);
        }
        // Get the first record as element
        $firstElement = $e->first();
        // Share to the view
        $this->set('e', $firstElement);
        // Check if it's from post method
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($firstElement, $this->request->getData());
            if ($this->Users->save($firstElement)) {
                $this->Flash->success('Modification(s) de votre compte effectuée(s)');
                return $this->redirect(['action' => 'view', $u['id']]);
            }
            $this->Flash->error('Erreur lors de la tentative de modification');
        }
    }

    private function checkAvatar()
    {
        // on recupere les infos par rapport à l'avatar actuel ( user connecté )
        $modif = $this->Users->get($this->Auth->user('id'));
        // si on a pas recu le fichier ou le format de l'image n est pas le bon
        if (empty($this->request->getData()['avatar']['name']) || !in_array($this->request->getData()['avatar']['type'], ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])) {
            // Flash error
            $this->Flash->error('Format erroné. Autosié : png, pdf, gif');
        } else {
            // On recupere l extension --> pathinfo
            $ext = pathinfo($this->request->getData()['avatar']['name'], PATHINFO_EXTENSION);
            // on creer le nouveau nom
            $newName = 'user-' . $modif->id . '-' . time() . '.' . $ext;
            // on deplace le fichier de la memoire temporaire vers le dossier avatars
            move_uploaded_file($this->request->getData()['avatar']['tmp_name'], WWW_ROOT . 'img/avatars/' . $newName);
            // on remplace le npm de l'objet à sauvegarder
            $modif->avatar = $newName;
            // On essaie la sauvegarde (if else)
            if ($this->Users->save($modif)) {
                $this->Flash->success('Image uploadée');
                // si l'ancien fichier existe --> !empty && file_exists
                if (!empty($ancienNom) && file_exists(WWW_ROOT . 'img/avatars/' . $ancienNom)) {
                    unlink(WWW_ROOT . 'img/avatars/' . $ancienNom);
                }

                return $this->redirect(['action' => 'view', $modif->id]);
            } else {
                $this->Flash->error('Modification impossible');
            }
        }
    }

    public function editavatar()
    {
        // on recupere les infos par rapport à l'avatar actuel ( user connecté )
        $modif = $this->Users->get($this->Auth->user('id'));
        // $modif = $this->Users->find()->where(['id' => $u['id']]);
        $this->set(compact('modif'));
        // On copie l'ancien nom de fichier
        $ancienNom = $modif->avatar;

        // on copie en mémoire le nom de l'ancien fichier
        $currentFileName = $modif->avatar;

        // si on recoit un form
        if ($this->request->is(['post', 'put'])) {
            // on patch les données
            $this->Users->patchEntity($modif, $this->request->getData());

            $this->checkAvatar();
        }
    }

    public function add()
    {
        $n = $this->Users->newEntity();
        $this->set(compact('n'));

        // Check if is from post method
        if ($this->request->is(['post'])) {
            // Get form data
            $n = $this->Users->patchEntity($n, $this->request->getData());
            // Test saving record on database
            if ($result = $this->Users->save($n)) {
                // Retrieve user from DB
                $authUser = $this->Users->get($result->id)->toArray();
                // Log user in using Auth
                $this->Auth->setUser($authUser);
                // Display Flash success
                if ($this->updateLastIn($this->getCurrentUserId())) {
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->success('Une erreur est survenue.');
                }
            }
            // Error while trying to save
            $this->Flash->error('Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function view($id)
    {
        $req = $this->Users->find()->where(['id' => $id])->contain(['Events', 'Events.Users', 'Guests']);

        $user = $req->first();
        $currentTime = new Time('now');

        $query = $this->Users->find()
            ->contain(['Events', 'Events.Users', 'Guests'])
            ->where(['id' => $id]);

        if ($query->isEmpty()) {
            $this->Flash->error('Profil d\'utilisateur inconnu');
            return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
        }

        $upcomming = $query->first();

        $this->set(compact('user', 'upcomming', 'currentTime'));
    }

    public function updateLastIn($userID)
    {
        // Get the current auth user
        $u = $this->Auth->user();
        // Query on database for this specific user
        $user = $this->Users->get(['id' => $userID]);
        // Update time of lastin
        $time = new Time('now');
        $user->lastin = $time;
        // Try to save on db
        if ($this->Users->save($user)) {
            $this->Flash->success('Bienvenue : ' . $user->login);
            return true;
        }
        return false;
    }

    public function delete()
    {
        $u = $this->Auth->user();
        $this->request->allowMethod('post', 'delete');
        $user = $this->Users->get($u['id']);
        if ($this->Users->delete($user)) {
            // Message de success
            $this->Flash->success('Votre compte a bien été supprimé');
            // On redirige
            // return $this->redirect(['action' => 'index']);
            return $this->redirect($this->Auth->logout());
        }
        $this->Flash->error('Suppression de l\'utilisateur impossible');
        return $this->redirect(['action' => 'view', $u['id']]);
    }
}
