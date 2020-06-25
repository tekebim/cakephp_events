<div class="container">
    <div class="col-12">
        <?= $this->Html->link('Retour à la liste des événements', ['controller' => 'Events', 'action' => 'index'], ['class' => 'btn btn-sm btn-outline--dark']); ?>
    </div>
    <div class="title text-center">
        <h1>Détail de l'événement</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="content">
                <div class="title text-center mb-3">
                    <h1><?= $event->title ?></h1>
                </div>
                <?php if (!empty($event->picture)) { ?>
                    <figure class="event__picture">
                        <?= $this->Html->image('events/' . $event->picture, ['alt' => 'Photo de l\'événement ' . $event->title, 'class' => 'img-fluid']) ?>
                    </figure>
                <?php } else { ?>
                    <figure class="event__picture">
                        <?= $this->Html->image('default-event.png', ['alt' => 'Avatar par défaut', 'class' => 'img-fluid']) ?>
                    </figure>
                <?php } ?>

                <table class="table table-events">
                    <tbody>
                    <tr>
                        <td class="table__label">Auteur :</td>
                        <td><?= $event->user->login ?></td>
                    </tr>
                    <tr>
                        <td class="table__label">Date :</td>
                        <td><?= $event->beginning->i18nFormat('dd/MM/yyyy') ?></td>
                    </tr>
                    <tr>
                        <td class="table__label">Lieu :</td>
                        <td><?= $event->location ?></td>
                    </tr>
                    <tr>
                        <td class="table__label">Participant<?= (count($event->guests) > 1) ? 's' : '' ?>
                            : <?= count($event->guests) ?></td>
                        <td>
                            <?php if (count($event->guests) > 0) {
                                $guestsPending = [];
                                $guestsCanceled = [];
                                $guestsParticipating = [];

                                foreach ($event->guests as $guest) {
                                    if ($guest->status === 'validated') {
                                        array_push($guestsParticipating, $guest);
                                    } else if ($guest->status === 'canceled') {
                                        array_push($guestsCanceled, $guest);
                                    } else {
                                        array_push($guestsPending, $guest);
                                    }
                                } ?>

                                <?php if (!empty($guestsParticipating)) { ?>
                                    <ul>
                                        <?php foreach ($guestsParticipating as $guest) { ?>
                                            <li>
                                                <?= $this->Html->link($guest->user->login, ['controller' => 'Users', 'action' => 'view', $guest->user->id]); ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <div class="alert alert-warning">Pas de participants confirmés pour le moment</div>
                                <?php } ?>

                                <?php if (!empty($guestsPending)) { ?>
                                    <ul>
                                        <?php foreach ($guestsPending as $guest) { ?>
                                            <li>
                                                <?= $this->Html->link($guest->user->login, ['controller' => 'Users', 'action' => 'view', $guest->user->id]); ?>
                                                <span class="small">(en attente)</span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>

                                <?php if (!empty($guestsCanceled)) { ?>
                                    <ul>
                                        <?php foreach ($guestsCanceled as $guest) { ?>
                                            <li>
                                                <?= $this->Html->link($guest->user->login, ['controller' => 'Users', 'action' => 'view', $guest->user->id]); ?>
                                                <span class="small">(annulé)</span>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>

                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__label">Description :</td>
                        <td><?= $event->description ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <?php
            if ($Auth->user('id') !== $event->user->id) {
                $guestsId = [];
                foreach ($event->guests as $guest) {
                    if($guest->status !== 'canceled') {
                        array_push($guestsId, $guest['user_id']);
                    }
                }
                if (in_array($Auth->user('id'), $guestsId)) { ?>
                    <div class="alert alert-success mt-5">
                        Vous êtes invité à cet événement ou une demande d'invitation a été envoyé.
                    </div>
                    <div class="text-center">
                        <?= $this->Form->postLink('Je ne suis plus disponible',
                            ['controller' => 'Guests', 'action' => 'cancel', $event->id],
                            [
                                'confirm' => 'Êtes-vous sûr de vouloir ne plus participer à cet événement ?',
                                'class' => 'btn btn-outline--dark btn-sm'
                            ]); ?>
                    </div>
                <?php } else { ?>
                    <div class="text-center mt-5">
                        <?= $this->Form->postLink('Demande d\'invitation à l\'organisateur',
                            ['controller' => 'Messages', 'action' => 'request', $event->id],
                            [
                                'class' => 'btn btn-primary btn-md',
                                'data' => [
                                    'event_id' => $event->id,
                                    'event_title' => $event->title,
                                    'receiver_id' => $event->user_id,
                                    'receiver_name' => $event->user->login
                                ]
                            ]
                        ); ?>
                    </div>
                <?php }
            } else { ?>

                <div class="cta text-center mt-5">
                    <?= $this->Html->link('Modifier les informations', ['controller' => 'Events', 'action' => 'edit', $event->id], ['class' => 'btn btn-md btn-primary mx-2']); ?>
                    <?= $this->Html->link('Inviter des personnes', ['controller' => 'Events', 'action' => 'invitemultiple', $event->id], ['class' => 'btn btn-md btn-primary mx-2']); ?>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
