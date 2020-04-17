<h1>Événément : <?= $event->title ?></h1>
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
        <td>Invitation<?= (count($event->guests) > 1) ? 's' : '' ?></td>
        <td><?= count($event->guests) ?>
            <?php if (count($event->guests) > 0) { ?>
                <ul>
                    <?php foreach ($event->guests as $guest) { ?>
                        <li><?= $this->Html->link($guest->user->login, ['controller' => 'Users', 'action' => 'view', $guest->user->id]); ?></li>
                    <?php } ?>
                </ul>
            <?php } ?></td>
    </tr>
    </tbody>
</table>

<?= $this->Html->link('Inviter des personnes', ['controller'=> 'Events', 'action' => 'invite', $event->id], array( 'class' => 'button')); ?>

