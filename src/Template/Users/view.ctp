<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <?= $this->Html->link('< Retour à la page d\'accueil', ['action' => 'index', 'controller' => 'dashboard'], ['class' => 'btn btn-outline--dark btn-xs']); ?>
        </div>
    </div>
    <div class="row">
        <div class="content col-12">
            <div class="row">
                <div class="col-4">
                    <?php if (!empty($user->avatar)) { ?>
                        <figure>
                            <?= $this->Html->image('avatars/' . $user->avatar, ['alt' => 'Avatar de ' . $user->pseudo]) ?>
                        </figure>
                    <?php } else { ?>
                        <figure>
                            <?= $this->Html->image('default-avatar.png', ['alt' => 'Avatar par défaut']) ?>
                        </figure>
                    <?php } ?>
                </div>
                <div class="col-8">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="title border-0">
                                <h1><?= ($Auth->user('id') === $user->id) ? 'Mon profil d\'utilisateur' : 'Profil de <strong>' . $user->login . '</strong>' ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td>Nom d'utilisateur : <strong><?= $user->login ?></strong></td>
                        </tr>
                        <tr>
                            <td>Membre depuis le : <?= $user->created->i18nFormat('dd/MM/yy') ?>
                                à <?= $user->created->i18nFormat('hh:mm') ?></td>
                        </tr>
                        <?php if (!empty($user->lastin)) { ?>
                            <tr>
                                <td>Dernière connexion le : <?= $user->lastin->i18nFormat('dd/MM/yy') ?>
                                    à <?= $user->lastin->i18nFormat('hh:mm') ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($Auth->user('id') === $user->id) { ?>
                            <tr>
                                <td class="pt-3">
                                    <?= $this->Html->link('Mettre à jour mes informations', ['action' => 'edit'], ['class' => 'btn btn-sm btn-primary mx-2']); ?>
                                    <?= $this->Form->postLink('Supprimer mon compte', ['controller' => 'Users', 'action' => 'delete'], ['confirm' => 'Etes-vous sûr ?', 'class' => 'btn btn-outline--dark btn-sm mx-2']); ?>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td class="pt-5">
                                    <?= $this->Html->link('Contacter', ['controller' => 'Messages', 'action' => 'new'], ['class' => 'btn btn-md btn-primary']); ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <section class="user-events col-12">
            <?php
            // Filter from array of all events, the events with beginning date's finished
            $eventsDone = array_filter($user->events, function ($v) {
                return ($v->beginning < new DateTime());
            });
            // Build list of upcoming events base on difference with original array and eventsDone
            $eventsUpcomming = array_diff($user->events, $eventsDone);
            ?>


            <?php if (count($eventsUpcomming) > 0) { ?>

                <?php if ($Auth->user('id') === $user->id) {
                    $titleContent = (count($eventsUpcomming) > 1 ? 'Mes prochains événements' : 'Mon prochain événement') . ' :';
                } else {
                    $titleContent = (count($eventsUpcomming) > 1 ? 'Les prochains événements' : 'Le prochain événement') . ' de <strong>' . $user->login . '</strong> :';
                } ?>

                <?= $this->element('eventstable', [
                    'titleType' => 'h2',
                    'titleContent' => $titleContent,
                    'sourceArray' => $eventsUpcomming,
                    'showOrganizator' => true,
                    'showInvitation' => false,
                    'showDescription' => true,
                    'showPagination' => false,
                    'showStatus' => false,
                ]); ?>

            <?php } else { ?>
                <div class="content p-0">
                    <div class="alert alert-warning m-0">
                        Aucune participation à un événement
                    </div>
                </div>
            <?php } ?>

            <?php if (count($eventsDone) > 0) { ?>

                <?php if ($Auth->user('id') === $user->id) {
                    $titleContent = (count($eventsDone) > 1 ? 'Mes événements auxquels' : 'L\'événement auquel') . ' j\'ai participé :';
                } else {
                    $titleContent = (count($eventsDone) > 1 ? 'Les événements auxquels' : 'L\'événement auquel') . ' j\'ai participé :';
                } ?>

                <?= $this->element('eventstable', [
                    'titleType' => 'h2',
                    'titleContent' => $titleContent,
                    'sourceArray' => $eventsDone,
                    'showOrganizator' => true,
                    'showInvitation' => false,
                    'showDescription' => true,
                    'showPagination' => false,
                    'showStatus' => false,
                ]); ?>


            <?php } else { ?>
                <div class="content p-0">
                    <div class="alert alert-warning m-0">
                        Aucune participation à un événement
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>
</div>
</div>
