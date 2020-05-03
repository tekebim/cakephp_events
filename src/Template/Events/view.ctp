<div class="container">
    <section class="breadcrumb">
        <div class="row">
            <div class="col-12">
                <?= $this->Html->link('Retour à la liste des événements', ['controller' => 'Events', 'action' => 'index']); ?>
            </div>
        </div>
    </section>
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="content">
                <div class="title text-center mb-3">
                    <h1>Événément : <?= $event->title ?></h1>
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

                <table class="table table-event">
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
                                $guestsParticipating = [];

                                foreach ($event->guests as $guest) {
                                    if ($guest->status === 'validated') {
                                        array_push($guestsParticipating, $guest);
                                    } else {
                                        array_push($guestsPending, $guest);
                                    }
                                } ?>

                                <ul>
                                    <?php foreach ($guestsPending as $guest) { ?>
                                        <li>
                                            <?= $this->Html->link($guest->user->login, ['controller' => 'Users', 'action' => 'view', $guest->user->id]); ?>
                                            (en attente)
                                            (id:<?= $guest->user->id ?>)
                                        </li>
                                    <?php } ?>
                                </ul>


                                <ul>
                                    <?php foreach ($guestsParticipating as $guest) { ?>
                                        <li><?= $this->Html->link($guest->user->login, ['controller' => 'Users', 'action' => 'view', $guest->user->id]); ?>
                                            (id:<?= $guest->user->id ?>)
                                        </li>
                                    <?php } ?>
                                </ul>
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
            <div class="content mt-5">
                <?php
                if ($Auth->user('id') !== $event->user->id) {
                    $guestsId = [];
                    foreach ($event->guests as $guest) {
                        array_push($guestsId, $guest['user_id']);
                    }
                    if (in_array($Auth->user('id'), $guestsId)) { ?>
                        <div class="alert alert-success">
                            Vous participez déjà à cet événement ou une demande d'invitation a été envoyé.
                        </div>
                        <?= $this->Form->postLink('Je ne suis plus disponible', ['controller' => 'Guests', 'action' => 'remove', $event->id], ['confirm' => 'Êtes-vous sûr de vouloir ne plus participer à cet événement ?']); ?>
                    <?php } else {
                        echo $this->Form->postLink('Demande d\'invitation',
                            ['controller' => 'Messages', 'action' => 'request', $event->id],
                            array(
                                'class' => 'button',
                                'data' => [
                                    'receiver_id' => $event->user_id,
                                    'receiver_name' => $event->user->login
                                ]
                            )
                        );
                    }
                } else { ?>
                    <div class="cta text-center">
                        <?= $this->Html->link('Modifier les informations', ['controller' => 'Events', 'action' => 'edit', $event->id, 'class' => 'button']); ?>
                        <?= $this->Html->link('Inviter des personnes', ['controller' => 'Events', 'action' => 'invitemultiple', $event->id, 'class' => 'button']); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
