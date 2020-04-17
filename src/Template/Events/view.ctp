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
        <td>Invitation<?= (count($event->guests) > 1) ? 's' : '' ?> : <?= count($event->guests) ?></td>
        <td>
            <?php if (count($event->guests) > 0) { ?>
                <ul>
                    <?php foreach ($event->guests as $guest) { ?>
                        <li><?= $this->Html->link($guest->user->login, ['controller' => 'Users', 'action' => 'view', $guest->user->id]); ?>
                            (id:<?= $guest->user->id ?>)
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?></td>
    </tr>
    </tbody>
</table>

<?php if ($Auth->user('id') === $event->user_id) { ?>
    <?= $this->Html->link('Modfier l\'événement', ['controller' => 'Events', 'action' => 'edit', $event->id], array('class' => 'button')); ?> &nbsp;
    <?= $this->Html->link('Inviter des personnes', ['controller' => 'Events', 'action' => 'invite', $event->id], array('class' => 'button')); ?>
<?php } ?>
<hr>
<?= $this->Html->link('Retour à la liste des événements', ['controller' => 'Events', 'action' => 'index']); ?> &nbsp;
