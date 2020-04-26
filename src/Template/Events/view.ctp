<h1>Événément : <?= $event->title ?></h1>

<?php if (!empty($event->picture)) { ?>
    <figure class="event__picture">
        <?= $this->Html->image('events/' . $event->picture, ['alt' => 'Photo de l\'événement ' . $event->title]) ?>
    </figure>
<?php } else { ?>
    <figure class="event__picture">
        <?= $this->Html->image('default-event.png', ['alt' => 'Avatar par défaut']) ?>
    </figure>
<?php } ?>

<table>
    <tbody>
    <tr>
        <td>Auteur</td>
        <td><?= $event->user->login ?></td>
    </tr>
    <tr>
        <td>Date</td>
        <td><?= $event->beginning->i18nFormat('dd/MM/yyyy') ?></td>
    </tr>
    <tr>
        <td>Lieu</td>
        <td><?= $event->location ?></td>
    </tr>
    <tr>
        <td>Participant<?= (count($event->guests) > 1) ? 's' : '' ?> : <?= count($event->guests) ?></td>
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
    </tbody>
</table>

<?php
if ($Auth->user('id') !== $event->user->id) {
    $guestsId = [];
    foreach ($event->guests as $guest) {
        array_push($guestsId, $guest['user_id']);
    }
    if (in_array($Auth->user('id'), $guestsId)) { ?>
        <div class="alert alert-success">
            Vous participez déjà à cet événement
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
}
?>
<?php if ($Auth->user('id') === $event->user_id) { ?>
    <?= $this->Html->link('Modifier les informations de l\'événement', ['controller' => 'Events', 'action' => 'edit', $event->id], array('class' => 'button')); ?> &nbsp;
    <?= $this->Html->link('Inviter une personne', ['controller' => 'Events', 'action' => 'invite', $event->id], array('class' => 'button')); ?>
    <?= $this->Html->link('Invitation multiple', ['controller' => 'Events', 'action' => 'invitemultiple', $event->id], array('class' => 'button')); ?>
<?php } ?>
<hr>
<?= $this->Html->link('Retour à la liste des événements', ['controller' => 'Events', 'action' => 'index']); ?> &nbsp;
