<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\Time;

class MessagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        // Query from all message to get conversation_id of current user
        $messages = $this->Messages->find()
            ->contain([
                'Sender',
                'Receiver'
            ])
            ->where(['Messages.receiver_id' => $this->Auth->user('id')])
            ->orWhere(['Messages.sender_id' => $this->Auth->user('id')]);

        $messages
            ->select(
                [
                    'count' => $messages->func()->count('Messages.conversation_id'),
                    'Messages.conversation_id'
                ]
            )
            ->group('Messages.conversation_id');

        $resultSet = $messages->all();

        // Create empty array
        $conversations = [];
        // While result from previous conversation
        while ($resultSet->valid()) {
            // The current vlue
            $results = $resultSet->current();
            // Request the last message from all messages with this conversation ID
            $one = $this->Messages->find()
                ->contain([
                    'Sender',
                    'Receiver'
                ])
                ->select(
                    [
                        'Messages.conversation_id',
                        'Messages.id',
                        'Messages.type',
                        'Messages.content',
                        'Messages.sender_id',
                        'Messages.receiver_id',
                        'Messages.created',
                        'Sender.id',
                        'Sender.login',
                        'Receiver.id',
                        'Receiver.login',
                    ]
                )
                ->where(['Messages.conversation_id' => $results->conversation_id])
                ->order(['Messages.created' => 'DESC'])
                ->limit(1)
                ->toArray();

            // Add this result to array
            array_push($conversations, $one);
            // Go to to next result
            $resultSet->next();
        }
        // Share array to view
        $this->set(compact('messages', 'conversations'));
    }

    public function conversation($id)
    {
         // Query from all message to get conversation_id of current user
        $messages = $this->Messages->find()
            ->contain([
                'Sender',
                'Receiver',
                'Conversations'
            ])
            ->where(['Messages.conversation_id' => $id])
            ->andWhere(['OR' => [
                'Messages.sender_id' => $this->Auth->user()['id'],
                'Messages.receiver_id' => $this->Auth->user()['id']
            ]])
            ->select(
                [
                    'Messages.id',
                    'Messages.conversation_id',
                    'Messages.event_id',
                    'Messages.readstatus',
                    'Messages.type',
                    'Messages.content',
                    'Messages.created',
                    'Sender.login',
                    'Sender.avatar',
                    'Sender.id',
                    'Receiver.login',
                    'Receiver.avatar',
                    'Receiver.id',
                    'Conversations.user1_id',
                    'Conversations.user2_id',
                ]
            )
            ->order(['Messages.created' => 'DESC']);

        $unreadMsg = [];

        foreach ($messages as $m) {
            if ($m->Sender->id !== $this->Auth->user()['id'] && empty($m->readstatus)) {
                array_push($unreadMsg, $m->id);
            }
        }

        if (!$messages->isEmpty()) {
            $this->set(compact('messages'));
            // Update readstatus of unread message
            if (!empty($unreadMsg)) {
                $query = $this->Messages->query();
                $query->update()
                    ->set(['readstatus' => new Time('now')])
                    ->where(['id IN' => $unreadMsg])
                    ->execute();
            }
        } else {
            $this->Flash->error('Impossible de charger la conversation demandée');
            return $this->redirect(['controller' => 'Messages', 'action' => 'index']);
        }

        $n = $this->Messages->newEntity();
        $this->set(compact('n'));

        // Check if is from post method
        if ($this->request->is(['post'])) {
            $u = $this->Auth->user();
            $n = $this->Messages->patchEntity($n, $this->request->getData());
            $n->type = 'message';
            $n->conversation_id = $id;
            $n->sender_id = $u['id'];

            if ($result = $this->Messages->save($n)) {
                $this->Flash->success('Message envoyé');
                return $this->redirect(['action' => 'conversation', $id]);
            }
            // Error while trying to save
            $this->Flash->error('Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function request($eventID)
    {
        $this->loadModel('Guests');
        $this->loadModel('Conversations');
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
                $n->receiver_id = intval($_POST['receiver_id']);
                // $n->event_id = $eventID;
                $n->type = 'request';

                $conversation = $this->Conversations->find()
                    ->select(['id'])
                    ->andWhere(['AND' => [
                        'Conversations.user1_id' => $n->sender_id,
                        'Conversations.user2_id' => $n->receiver_id
                    ]])
                    ->orWhere(['AND' => [
                        'Conversations.user1_id' => $n->receiver_id,
                        'Conversations.user2_id' => $n->sender_id
                    ]]);

                // If no results found in conversations table
                if ($conversation->isEmpty()) {
                    // Prepare data
                    $data = $this->Conversations->newEntity();
                    $data->user1_id = $n->sender_id;
                    $data->user2_id = $n->receiver_id;
                    // Passed data and try to save new record
                    if ($result = $this->Conversations->save($data)) {
                        echo 'save ok';
                        $conversationId = $result->id;
                    } else {
                        $this->Flash->error('Une erreur est survenue. Veuillez réessayer.');
                        return;
                    }
                    // We need to create a new conversation
                } else {
                    $element = $conversation->first();
                    $conversationId = $element->id;
                }

                $n->conversation_id = $conversationId;

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
