<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="title text-center">
                <h1>Détail de la conversation</h1>
            </div>
        </div>
    </div>

    <?php if (empty($messages)) { ?>
        <p>Pas de messages</p>
    <?php } else { ?>

    <div class="row">
        <div class="col-12 content">
            <?php foreach ($messages as $message) { ?>
                <?php
                // We detect if current user is the Sender or Receiver's message
                if ($message->Sender->id === $Auth->user('id')) { ?>
                    <div class="conversation__date text-right">
                        <span class="small">Envoyé le <?= $message->created->i18nFormat('dd/MM/yyyy') ?>
                            à <?= $message->created->i18nFormat('hh:mm') ?></span>
                    </div>
                    <div class="media my-3">
                        <div class="media-left p-3">
                            <?= $message->Sender->login ?>
                        </div>
                        <div class="media-body bg-primary text-white p-3 rounded-lg">
                            <?php if ($message->type === 'request') { ?>
                                <div class="alert alert-warning">
                                    Vous avez fait une demande d'invitation pour un événement.
                                </div>
                            <?php } ?>
                            <p><?= $message->content ?></p>
                        </div>
                    </div>
                    <div class="conversation__read text-right">
                        <span class="small text-success"><?php
                            if (!empty($message->readstatus)) {
                                echo 'Vu à ' . $message->readstatus->i18nFormat('dd/MM/yyyy hh:mm');;
                            } ?>
                        </span>
                    </div>
                    <hr>
                <?php } else { ?>
                    <div class="conversation__date text-left">
                        <span class="small">Envoyé le <?= $message->created->i18nFormat('dd/MM/yyyy') ?>
                            à <?= $message->created->i18nFormat('hh:mm') ?></span>
                    </div>
                    <div class="media my-3">
                        <div class="media-left bg-light p-3 rounded-lg">
                            <?php if ($message->type === 'request') { ?>
                                <div class="alert alert-warning">
                                    Demande d'invitation à un événement.
                                    <div>
                                        <?= $this->Form->postLink('Accepter',
                                            ['controller' => 'Guests', 'action' => 'accept', $message->event_id],
                                            ['data' => [
                                                'user_id' => $message->Sender->id
                                            ]]) ?>
                                        -
                                        <?= $this->Form->postLink('Refuser',
                                            ['controller' => 'Guests', 'action' => 'cancel', $message->event_id],
                                            ['data' => [
                                                'user_id' => $message->Sender->id
                                            ]])
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <p><?= $message->content ?></p>
                        </div>
                        <div class="medias-body p-3">
                            <?= $message->Sender->login ?>
                        </div>
                    </div>
                    <div class="conversation__read text-left">
                        <span class="small text-success"><?php
                            if (!empty($message->readstatus)) {
                                echo 'Vu à ' . $message->readstatus->i18nFormat('dd/MM/yyyy hh:mm');;
                            } ?>
                        </span>
                    </div>
                    <hr>
                <?php } ?>

            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 content my-3">
            <?= $this->Form->create($n, ['class' => 'form']); ?>
            <fieldset>
                <div class="form-group">
                    <?= $this->Form->control('content', [
                        'label' => false,
                        'default' => '',
                        'class' => 'form-control'
                    ]); ?>
                </div>
                <?= $this->Form->control('receiver_id', ['type' => 'text', 'value' => $message->Receiver->id]); ?>
                <div class="text-right">
                    <?= $this->Form->button('Envoyer', ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </fieldset>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<?php } ?>
