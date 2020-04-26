<h1>Demande d'invitation</h1>

<?php
echo '<pre>';
echo var_dump($_POST);
echo '</pre>';
?>

<?= $this->Form->create($n); ?>
<fieldset>
    <legend>Votre message</legend>
    <p>Destinataire : <strong><?= $_POST['receiver_name']; ?></strong></p>
    <?= $this->Form->control('content', [
        'label' => 'Contenu de votre message',
        'default' => 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.'
    ]); ?>
    <?= $this->Form->control('receiver_id', ['type' => 'hidden']); ?>
    <?= $this->Form->text('receiver_name', ['type' => 'hidden']); ?>
    <?= $this->Form->text('request_submit', ['type' => 'hidden']); ?>
    <?= $this->Form->text('event_id', ['type' => 'hidden', ]); ?>
    <?= $this->Form->button('Envoyer la demande'); ?>
</fieldset>
<?= $this->Form->end(); ?>

<?= $this->Html->link('Retour à la page d\'accueil', ['action' => 'index']); ?>
