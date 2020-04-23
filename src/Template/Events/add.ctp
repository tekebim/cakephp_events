<?= $this->Form->create($n, ['enctype' => 'multipart/form-data']); ?>
    <fieldset>
        <legend>Informations de l'événement</legend>
        <?= $this->Form->control('picture', ['label' => 'Visuel de l\'énévement', 'type' => 'file']); ?>
        <?= $this->Form->control('title', ['label' => 'Titre de l\'événément']); ?>
        <?= $this->Form->control('beginning', ['label' => 'Date de l\'événement']); ?>
        <?= $this->Form->control('description', ['label' => 'Description']); ?>
        <?= $this->Form->control('location', ['label' => 'Lieu']); ?>
        <?= $this->Form->button('Créer l\'événément'); ?>
    </fieldset>
<?= $this->Form->end(); ?>
