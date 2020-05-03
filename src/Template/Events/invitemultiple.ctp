<h1>Inviter des personnes à l'événement : <?= $event->title ?></h1>

<p>ID de l'événement : <?= $event->id; ?></p>
<p>Organisateur de l'événement : <?= $event->user->id; ?> - <?= $event->user->login; ?></p>

<?= $this->Form->create($n); ?>
<legend>Recherche d'utilisateur</legend>

<div class="form-horizontal form-group">

    <div class="form-group gpe-user" id="gpe-user-id-0">
        <label for="userLogin">Nom d'utilsiateur</label>
        <?=
        // Select multiple pour belongsToMany
        $this->Form->control('user_id', [
            'type' => 'select',
            'label' => false,
            'multiple' => true,
            'empty' => 'choisissez',
            'options' => $users,
            'data-field' => 'user_id',
            'class' => 'js-choice form-control',
        ]);
        ?>
        <?= $this->Form->control('event_id', ['type' => 'hidden', 'value' => $event->id]); ?>
        <?= $this->Form->control('status', ['type' => 'hidden', 'value' => 'validated']); ?>
    </div>
</div>
<?= $this->Form->button('Inviter'); ?>
<?= $this->Form->end(); ?>
<hr>
<h1>Liste des invités :</h1>
<?php foreach ($event->guests as $guest) { ?>
    <?= $guest->user['login'] ?>
<?php } ?>
<hr>
<?= $this->Html->link('Retour à la fiche de l\'événément', ['controller' => 'Events', 'action' => 'view', $event->id]); ?>

