<h1>Modification de votre compte :</h1>

<?= $this->Form->create($e) ?>
<fieldset>
    <legend>Votre image de profil :</legend>
    <?php if (!empty($e->avatar)) { ?>
        <figure>
            <?= $this->Html->image('avatars/' . $e->avatar, ['alt' => 'Avatar de ' . $e->login]) ?>
        </figure>
    <?php } else { ?>
        <figure>
            <?= $this->Html->image('default.png', ['alt' => 'Avatar par défaut']) ?>
        </figure>
    <?php } ?>
    <?= $this->Html->link('Upload une nouvelle image', ['action' => 'editavatar']); ?>
</fieldset>
<fieldset>
    <legend>Vos informations</legend>
    <?= $this->Form->control('login', ['label' => 'Votre nom d\'utilisateur']) ?>
    <?= $this->Form->control('password', ['label' => 'Votre mot de passe', 'value' => '']) ?>
    <?= $this->Form->button('Modifier vos informations') ?>
</fieldset>
<?= $this->Form->end() ?>

<?= $this->Html->link('Annuler', ['action' => 'view', $e->id]);
