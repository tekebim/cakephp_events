<?php if ($titleContent) { ?>
    <?= '<' . $titleType . ' class="mt-5">' ?>
    <?= $titleContent; ?>
    <?= '</' . $titleType . '>' ?>
<?php } ?>

<div class="table-wrapper my-5">
    <?php if (count($sourceArray) > 0) { ?>
    <table class="table">
        <thead>
        <tr>
            <th>Nom de l'événément</th>
            <?php if ($showDescription) { ?>
                <th>Description</th>
            <?php } ?>
            <th>Lieu de l'événément</th>
            <?php if ($showOrganizator) { ?>
                <th>Organisé par</th>
            <?php } ?>
            <?php if ($showInvitation) { ?>
                <th>Invitations (confirmées)</th>
            <?php } ?>
            <?php if ($showStatus) { ?>
                <th>Status</th>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sourceArray as $event) { ?>
            <tr>
                <td>
                    <?= $this->Html->link($event->title, ['controller' => 'Events', 'action' => 'view', $event->id]) ?>
                    <p><?= $this->IntervalTime->createLabel($event->beginning) ?></p>
                </td>
                <?php if ($showDescription) { ?>
                    <td><?= $this->Text->truncate(strip_tags($event->description), 50, ['ellipsis' => '...']) ?>
                    </td>
                <?php } ?>
                <td><?= $event->location ?></td>
                <?php if ($showOrganizator) { ?>
                    <td><?= $this->Html->link($event->user->login, ['action' => 'view', $event->user->id, 'controller' => 'Users']) ?></td>
                <?php } ?>
                <?php if ($showInvitation) { ?>
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
                <?php } ?>
                <?php if ($showStatus) { ?>
                    <td>
                        <?php
                        if ($Auth->user('id') === $event->user->id) {
                            echo $this->Html->link('Gérer', ['action' => 'edit', $event->id], array('class' => 'btn btn-primary btn-sm'));
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
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <?php } else { ?>
    <div class="content p-0">
        <div class="alert alert-warning m-0">
            Aucune participation à un événement
        </div>
    </div>
    <?php } ?>


    <?php if ($showPagination) { ?>
        <?= $this->element('pagination', []); ?>
    <?php } ?>
</div>
