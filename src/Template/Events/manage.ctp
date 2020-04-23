<h1>Mes événements</h1>

<table>
    <thead>
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
        <th>Lieu</th>
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
                $currentTime = date("d/m/yy H:i");
                $eventTime = $value->beginning->i18nFormat('dd/MM/yyyy hh:mm');

                if ($currentTime > $eventTime) {
                    echo '<label class="label--done">Terminé</label>';
                } else {
                    echo '<label class="label--incoming">A venir</label>';
                }
                ?>

                <?= $value->beginning->i18nFormat('dd/MM/yyyy hh:mm') ?><?php $currentDate = date("d/m/yy H:i:s");
                echo $currentDate; ?></td>
            <td><?= $value->location ?></td>
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
