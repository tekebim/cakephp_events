<h1>Events</h1>

<table>
    <thead>
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
        <th>Lieu</th>
        <th>Créé par</th>
        <th>Invitations</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($events as $event) { ?>
        <tr>
            <td><?= $this->Html->link($event->title, ['controller' => 'Events', 'action' => 'view', $event->id]) ?></td>
            <td><?= $this->Text->truncate(strip_tags($event->description), 50, ['ellipsis' => '...']) ?>
            </td>
            <td><?= $this->IntervalTime->createLabel($event->beginning) ?></td>
            <td><?= $event->location ?></td>
            <td><?= $this->Html->link($event->user->login, ['action' => 'view', $event->user->id, 'controller' => 'Users']) ?>
                - <?= $event->user->id ?></td>
            <td><?= count($event->guests) ?></td>
            <td>
                <?php if ($Auth->user('id') === $event->user->id) {
                    echo $this->Html->link('Gérer', ['action' => 'edit', $event->id], array('class' => 'button'));
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->Html->link('Créer un nouvel événement', ['action' => 'add'], array('class' => 'button')); ?>
