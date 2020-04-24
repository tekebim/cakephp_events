<h1>Dashboard</h1>
<div class="row">
    <div class="col-12">
        <h2>Liste des événements</h2>

        <table>
            <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Invitations</th>
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
                    <td><?= count($event->guests) ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-4">
        <h2>Dernier(s) utilisateur(s) connecté(s)</h2>
        <?php if (!empty($lastusers)) { ?>
            <ul>
                <?php foreach ($lastusers as $user) { ?>
                    <li><?= $user ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Aucun utilisateur récemment</p>
        <?php } ?>
    </div>
    <div class="col-4">
        <h2>TOP 5 créateur d'événement</h2>
        <?php if (!empty($lastusers)) { ?>
            <ul>
                <?php foreach ($lastusers as $user) { ?>
                    <li><?= $user ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Aucun utilisateur récemment</p>
        <?php } ?>
    </div>
    <div class="col-4">
        <h2>TOP 5 des invités</h2>
        <?php if (!empty($invated)) { ?>
            <ul>
                <?php foreach ($invated as $user) { ?>
                    <li><?= $user ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Aucun utilisateur récemment</p>
        <?php } ?>
    </div>
</div>
