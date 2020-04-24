<h1>Inviter des personnes à l'événement : <?= $event->title ?></h1>

<p>ID de l'événement : <?= $event->id; ?></p>
<p>Organisateur de l'événement : <?= $event->user->id; ?> - <?= $event->user->login; ?></p>

<?= $this->Form->create($n); ?>
<fieldset>
    <legend>Recherche d'utilisateur</legend>
    <!--<?= $this->Form->control('user_id', ['label' => 'Nom d\'utilisateur', 'type' => 'text']); ?>-->
    <?=
    // Select multiple pour belongsToMany
    $this->Form->control('user_id', [
        'type' => 'select',
        'label' => 'Choisissez parmi les utilisateurs :',
        'multiple' => true,
        'empty' => '(choisissez)',
        'options' => $users
    ]);
    ?>
    <?= $this->Form->button('Inviter'); ?>
</fieldset>
<?= $this->Form->end(); ?>
<hr>
<h1>Liste des invités :</h1>
<?php foreach ($event->guests as $guest) { ?>
    <?= $guest->user['login'] ?>
<?php } ?>
<hr>
<?= $this->Html->link('Retour à la fiche de l\'événément', ['controller' => 'Events', 'action' => 'view', $event->id]); ?>
