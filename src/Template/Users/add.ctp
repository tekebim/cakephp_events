<h1>Création d'un compte</h1>

<?= $this->Form->create($n); ?>
<fieldset>
    <?= $this->Form->control('avatar', ['label' => 'Votre avatar']); ?>
    <legend><?php echo __('Ajouter un utilisateur'); ?></legend>
    <?= $this->Form->control('login', ['label' => 'Nom d\'utilisateur']); ?>
    <?= $this->Form->control('password', ['label' => 'Mot de passe']); ?>
    <?= $this->Form->button('S\'enregistrer'); ?>
</fieldset>
<?= $this->Form->end(); ?>

<?= $this->Html->link('Retour à la page d\'accueil', ['action' => 'index']); ?>
