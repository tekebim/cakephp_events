<h1>Modification de l'événement :</h1>

<?= $this->Form->create($e) ?>
<fieldset>
    <legend>Votre image de profil :</legend>
    <?php if (!empty($e->avatar)) { ?>
        <figure>
            <?= $this->Html->image('avatars/' . $e->avatar, ['alt' => 'Avatar de ' . $e->login]) ?>
        </figure>
    <?php } else { ?>
        <figure>
            <?= $this->Html->image('default-event.png', ['alt' => 'Photo par défaut']) ?>
        </figure>
    <?php } ?>
    <?= $this->Html->link('Upload une nouvelle image', ['action' => 'editavatar']); ?>
</fieldset>
<fieldset>
    <legend>Informations de l'événement</legend>
    <?= $this->Form->control('title', ['label' => 'Titre de l\'événément']); ?>
    <?= $this->Form->control('beginning', ['label' => 'Date de l\'événement']); ?>
    <?= $this->Form->control('description', ['label' => 'Description']); ?>
    <?= $this->Form->control('location', ['label' => 'Lieu']); ?>
    <?= $this->Form->button('Modifier vos informations') ?>
</fieldset>
<?= $this->Form->end() ?>

<?= $this->Html->link('Annuler', ['action' => 'view', $e->id]);
