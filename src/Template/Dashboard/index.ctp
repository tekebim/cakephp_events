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
        <h2>Utilisateur(s) actif(s)</h2>
        <?php if (!empty($lastusers)) { ?>
            <ul>
                <?php foreach ($lastusers as $user) { ?>
                    <?php
                    $currentTime = new DateTime('now');
                    $interval = $user->lastin->diff($currentTime);
                    $intM = ($interval->i) > 0 ? $interval->format('%i') : '';
                    ?>
                    <li><?= $this->Html->link($user->login, ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                        <br/>connecté depuis
                        <?= $intM > 1 ? $intM . ' minutes' : $intM . ' minute' ?>
                        <br/>Déconnecté à <?= $user->lastout ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Aucun utilisateur actif récemment</p>
        <?php } ?>
    </div>
    <div class="col-4">
        <h2>Top contributeurs</h2>
        <?php if (!empty($contributors)) { ?>
            <ol>
                <?php foreach ($contributors as $user) { ?>
                    <li><?= $this->Html->link($user->user->login, ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                        : <?= $user->count ?> moocs
                    </li>
                <?php } ?>
            </ol>
        <?php } else { ?>
            <p>Aucun utilisateur récemment</p>
        <?php } ?>
    </div>
    <div class="col-4">
        <h2>TOP 5 des invités</h2>
        <?php if (!empty($invated)) { ?>
            <ol>
                <?php foreach ($invated as $user) { ?>
                    <li><?= $this->Html->link($user->user->login, ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                        : <?= $user->count ?> invitations
                    </li>
                <?php } ?>
            </ol>
        <?php } else { ?>
            <p>Aucun utilisateur récemment</p>
        <?php } ?>
    </div>
</div>
