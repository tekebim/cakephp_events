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
        <?php if (!empty($guests)) { ?>
            <ul>
                <?php foreach ($lastusers as $user) { ?>
                    <li><?= $user ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Aucun utilisateur récemment</p>
        <?php } ?>
    </div>
</div>
