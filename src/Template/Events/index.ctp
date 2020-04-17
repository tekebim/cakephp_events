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
    </tr>
    </thead>
    <tbody>
    <?php foreach ($events as $key => $value) { ?>
        <tr>
            <td><?= $this->Html->link($value->title, ['controller' => 'Events', 'action' => 'view', $value->id]) ?></td>
            <td><?= $this->Text->truncate(strip_tags($value->description), 50, ['ellipsis' => '...']) ?>
            </td>
            <td><?= $value->beginning->i18nFormat('dd/MM/yyyy') ?></td>
            <td><?= $value->location ?></td>
            <td><?= $value->user->login ?></td>
            <td><?= count($value->guests) ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->Html->link('Créer un nouvel événement', ['action' => 'add']); ?>
