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
    <?php foreach ($events as $key => $value) { ?>
        <tr>
            <td><?= $this->Html->link($value->title, ['controller' => 'Events', 'action' => 'view', $value->id]) ?></td>
            <td><?= $this->Text->truncate(strip_tags($value->description), 50, ['ellipsis' => '...']) ?>
            </td>
            <td>
                <?php
                $currentTime = new DateTime();
                $eventTime = new DateTime($value->beginning);
                ?>
                <?= $this->IntervalTime->createLabel($currentTime, $eventTime) ?>
            </td>
            <td><?= $value->location ?></td>
            <td><?= $this->Html->link($value->user->login, ['action' => 'view', $value->user->id, 'controller' => 'Users']) ?> - <?=$value->user->id?></td>
            <td><?= count($value->guests) ?></td>
            <td>
                <?php if ($Auth->user('id') === $value->user->id) {
                    echo $this->Html->link('Gérer', ['action' => 'edit', $value->id], array('class' => 'button'));
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->Html->link('Créer un nouvel événement', ['action' => 'add'], array('class' => 'button')); ?>
