<?php if ($titleContent) { ?>
    <?= '<' . $titleType . ' class="mt-5">' ?>
    <?= $titleContent; ?>
    <?= '</' . $titleType . '>' ?>
<?php } ?>

<div class="table-wrapper my-5">
    <table class="table table-events">
        <thead>
        <tr>
            <?php if ($showDescription) { ?>
                <th>Nom de l'événément</th>
            <?php } ?>
            <th>Date</th>
            <th class="text-center">Lieu de l'événément</th>
            <?php if ($showOrganizator) { ?>
                <th class="text-center">Organisé par</th>
            <?php } ?>
            <?php if ($showInvitation) { ?>
                <th class="text-center">Invitations (confirmées)</th>
            <?php } ?>
            <?php if ($showStatus) { ?>
                <th class="text-center">Status</th>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sourceArray as $event) { ?>
            <tr>
                <?php if ($showDescription) { ?>
                    <td class="align-middle">
                        <div class="media">
                            <span class="media-left">
                            <?php if (!empty($event->picture)) { ?>
                                <figure class="event__picture">
                                    <?= $this->Html->image('events/' . $event->picture, ['width' => '100', 'alt' => 'Photo de l\'événement ' . $event->title, 'class' => 'img-fluid']) ?>
                                </figure>
                            <?php } else { ?>
                                <figure class="event__picture">
                                    <?= $this->Html->image('default-event.png', ['width' => '100', 'alt' => 'Avatar par défaut', 'class' => 'img-fluid']) ?>
                                </figure>
                            <?php } ?>
                            </span>
                            <div class="media-body">
                                <h3 class="media-heading"><?= $this->Html->link($event->title, ['controller' => 'Events', 'action' => 'view', $event->id]) ?></h3>
                                <p><?= $this->Text->truncate(strip_tags($event->description), 50, ['ellipsis' => '...']) ?></p>
                            </div>
                        </div>

                    </td>
                <?php } ?>
                <td class="align-middle">
                    <p><?= $this->IntervalTime->createLabel($event->beginning) ?></p>
                </td>
                <td class="text-center align-middle"><?= $event->location ?></td>
                <?php if ($showOrganizator) { ?>
                    <td class="text-center align-middle"><?= $this->Html->link($event->user->login, ['action' => 'view', $event->user->id, 'controller' => 'Users'], ['class' => 'text-link']) ?></td>
                <?php } ?>
                <?php if ($showInvitation) { ?>
                    <td class="text-center align-middle">
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
                    <td class="text-center align-middle">
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

    <?php if ($showPagination) { ?>
        <?= $this->element('pagination', []); ?>
    <?php } ?>
</div>
