<h1>Création d'un compte</h1>

<?= $this->Form->create($n); ?>
<?= $this->Form->control('login', ['label' => 'Votre pseudo']); ?>
<?= $this->Form->control('password', ['label' => 'Votre mot de passe']); ?>
<?= $this->Form->button('S\'enregistrer'); ?>
<?= $this->Form->end(); ?>

<?= $this->Html->link('Retour à la page d\'accueil', ['action' => 'index']); ?>
