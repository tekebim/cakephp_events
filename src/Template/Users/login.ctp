<?= $this->Form->create();?>
<h1>Connexion</h1>
<?= $this->Form->control('login');?>
<?= $this->Form->control('password');?>
<?= $this->Form->button('Se connecter');?>
<?= $this->Form->end();?>
