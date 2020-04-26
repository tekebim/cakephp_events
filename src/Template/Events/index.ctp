<h1>Events</h1>

<table>
    <thead>
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
        <th>Lieu</th>
        <th>Créé par</th>
        <th>Participants (confirmés)</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($events as $event) { ?>
        <tr>
            <td><?= $this->Html->link($event->title, ['controller' => 'Events', 'action' => 'view', $event->id]) ?></td>
            <td><?= $this->Text->truncate(strip_tags($event->description), 50, ['ellipsis' => '...']) ?></td>
            <td><?= $this->IntervalTime->createLabel($event->beginning) ?></td>
            <td><?= $event->location ?></td>
            <td><?= $this->Html->link($event->user->login, ['action' => 'view', $event->user->id, 'controller' => 'Users']) ?></td>
            <td>
                <?php
                $countParticipant = 0;
                foreach ($event->guests as $guest) {
                    if ($guest->status === 'validated') {
                        $countParticipant++;
                    }
                }
                echo $countParticipant;
                ?>
            </td>
            <td>
                <?php
                if ($Auth->user('id') === $event->user->id) {
                    echo $this->Html->link('Gérer', ['action' => 'edit', $event->id], array('class' => 'button'));
                } else {
                    $guestsId = [];
                    foreach ($event->guests as $guest) {
                        array_push($guestsId, $guest['user_id']);
                    }
                    if (in_array($Auth->user('id'), $guestsId)) {
                        echo 'Vous êtes invité à cet événement';
                    }
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->Html->link('Créer un nouvel événement', ['action' => 'add'], array('class' => 'button')); ?>
