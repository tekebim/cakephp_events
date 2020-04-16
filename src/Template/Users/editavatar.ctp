<h1>Modification de votre image de profil</h1>

<p>Votre avatar actuel : <?= $modif->avatar ?></p>
<pre>
<?= $modif ?>
</pre>

<?= $this->Form->create($modif, ['enctype' => 'multipart/form-data']) ?>
<fieldset>
    <?= $this->Form->control('avatar', ['type' => 'file']); ?>
    <?= $this->Form->button('Modifier') ?>
</fieldset>
<?= $this->Form->end() ?>

<?= $this->Html->link('Annuler', ['action' => 'view', $modif->id]);
