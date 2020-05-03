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
    <?php } ?>

    <div class="row">
        <div class="col-12 content">
            <table class="table">
                <?php foreach ($messages as $message) { ?>
                    <?php
                    // We detect if current user is the Sender or Receiver's message
                    if ($message->Sender->id === $Auth->user('id')) {
                        $user = 'Receiver';
                    } else {
                        $user = 'Sender';
                    } ?>
                    <tr class="<?= $message->Sender->id === $Auth->user('id') ? 'bg-primary' : 'even'; ?>">
                        <td>
                            <p><?= $message->type ?></p>
                            <?php if($message->type === 'request') {
                                echo 'Event : ' . $message->event_id;
                                echo 'Accepter';
                                echo ' - ';
                                echo 'Refuser';
                            } ?>
                            <p><?= $message->conversation_id ?></p>
                            <p><?php
                                if (empty($message->readstatus)) {
                                    echo 'nouveau';
                                } else {
                                    echo $message->readstatus->i18nFormat('dd/MM/yyyy hh:mm');
                                } ?>
                            </p>
                            <p><?= $message->content ?></p>
                        </td>
                        <td>
                            <?= 'Sender : ' . $message->Sender->login ?>
                            <?= 'Receiver : ' . $message->Receiver->login ?>
                            <p><strong><?= $message->$user->login ?></strong></p>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12 content">
            <?= $this->Form->create($n, ['class' => 'form']); ?>
            <fieldset>
                <div class="form-group">
                    <?= $this->Form->control('content', [
                        'label' => false,
                        'default' => '',
                        'class' => 'form-control'
                    ]); ?>
                    <?= $this->Form->control('receiver_id', ['type' => 'hidden', 'value' => $message->$user->id]); ?>
                    <?= $this->Form->button('Envoyer'); ?>
                </div>
            </fieldset>
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
