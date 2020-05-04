<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="title text-center">
                <h1>Demande d'invitation</h1>
            </div>
            <div class="card card-form mt-5">
                <div class="card-body">
                    <?= $this->Form->create($n, ['class' => 'form']); ?>
                    <fieldset>
                        <legend>Événement : <strong><?= $_POST['event_title']; ?></legend>
                        <div class="form-group my-4">
                            <p>Destinataire : <strong><?= $_POST['receiver_name']; ?></strong></p>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('content', [
                                'label' => 'Votre message',
                                'default' => 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.',
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                        <?= $this->Form->control('receiver_id', ['type' => 'hidden']); ?>
                        <?= $this->Form->text('receiver_name', ['type' => 'hidden']); ?>
                        <?= $this->Form->text('request_submit', ['type' => 'hidden']); ?>
                        <?= $this->Form->text('event_id', ['type' => 'hidden',]); ?>
                        <div class="text-center my-5">
                            <?= $this->Form->button('Envoyer la demande', ['class' => 'btn btn-primary btn-md']); ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
            <div class="mt-5 text-center">
                <?= $this->Html->link('< Retour à la fiche de l\'événement',
                    ['controller' => 'Events', 'action' => 'view', $_POST['event_id']], ['class' => 'btn btn-outline--dark btn-xs']); ?>
            </div>
        </div>
    </div>
</div>
