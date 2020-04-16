<h1>Création d'un compte</h1>

<?= $this->Form->create($n, ['enctype' => 'multipart/form-data']); ?>
<fieldset>
    <!-- <?= $this->Form->control('avatar', ['type' => 'file', 'label' => 'Votre avatar']); ?> -->
    <legend><?php echo __('Vos informations'); ?></legend>
    <?= $this->Form->control('login', ['label' => 'Nom d\'utilisateur']); ?>
    <?= $this->Form->control('password', ['label' => 'Mot de passe']); ?>
    <?= $this->Form->button('S\'enregistrer'); ?>
</fieldset>
<?= $this->Form->end(); ?>

<?= $this->Html->link('Retour à la page d\'accueil', ['action' => 'index']); ?>
