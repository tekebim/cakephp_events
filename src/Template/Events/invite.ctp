<h1>Inviter des personnes à l'événement : <?= $event->title ?></h1>

<?= $this->Form->create($n); ?>
<fieldset>
    <legend>Recherche d'utilisateur</legend>
    <?= $this->Form->control('user_id', ['label' => 'Nom d\'utilisateur', 'type' => 'text']); ?>
    <?= $this->Form->button('Inviter'); ?>
</fieldset>
<?= $this->Form->end(); ?>

<?= $this->Html->link('Retour à la fiche de l\'événément', ['controller'=> 'Events', 'action' => 'view', $event->id]); ?>
