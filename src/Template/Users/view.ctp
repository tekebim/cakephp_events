<h1>Mon profil</h1>
<?php if (!empty($user->avatar)) { ?>
    <figure>
        <?= $this->Html->image('avatars/' . $user->avatar, ['alt' => 'Avatar de ' . $user->pseudo]) ?>
    </figure>
<?php } else { ?>
    <figure>
        <?= $this->Html->image('default-avatar.png', ['alt' => 'Avatar par défaut']) ?>
    </figure>
<?php } ?>

<?= $this->Html->link('Upload une nouvelle image', ['action' => 'editavatar']); ?>

<table>
    <tbody>
    <tr>
        <td>Pseudo : <strong><?= $user->login ?></strong></td>
    </tr>
    <tr>
        <td>Membre depuis le : <?= $user->created->i18nFormat('dd/MM/yy') ?>
            à <?= $user->created->i18nFormat('hh:mm') ?></td>
    </tr>
    <?php if (!empty($user->lastin)) { ?>
        <tr>
            <td>Dernière connexion : <?= $user->lastin->i18nFormat('dd/MM/yy') ?>
                à <?= $user->lastin->i18nFormat('hh:mm') ?></td>
        </tr>
    <?php } ?>
    <?php if (!empty($user->lastout)) { ?>
        <tr>
            <td>Dernière déconnexion :
                <?= $user->lastout->i18nFormat('dd/MM/yy') ?>
                à <?= $user->lastin->i18nFormat('hh:mm') ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php if (count($user->events) > 0) {

    // Filter from array of all events, the events with beginning date's finished
    $eventsDone = array_filter($user->events, function ($v) {
        return ($v->beginning < new DateTime());
    });
    // Build list of upcoming events base on difference with original array and eventsDone
    $eventsUpcomming = array_diff($user->events, $eventsDone);
    ?>

    <?= $this->element('eventstable', [
        'titleType' => 'h2',
        'titleContent' => (count($eventsUpcomming) > 1 ? 'Les prochains événéments' : 'Le prochain événément') . ' de <strong>' . $user->login . '</strong> :',
        'sourceArray' => $eventsUpcomming,
    ]); ?>

    <?= $this->element('eventstable', [
        'titleType' => 'h2',
        'titleContent' => (count($eventsDone) > 1 ? 'Les événements auxquels' : 'L\'événement auquel') . ' à participé <strong>' . $user->login . '</strong> :',
        'sourceArray' => $eventsDone,
    ]); ?>

<?php } else { ?>
    <h2>Aucune participation à un événement</h2>
<?php } ?>


<?= $this->Html->link('Mettre à jour mes informations', ['action' => 'edit']); ?>
<?= $this->Form->postLink('Supprimer mon compte', ['controller' => 'Users', 'action' => 'delete'], ['confirm' => 'Etes-vous sûr ?'], ['class' => 'btn']); ?>

<p><?= $this->Html->link('Retour à la page d\'accueil', ['action' => 'index', 'controller' => 'dashboard']); ?></p>
