<h1>Mes conversations</h1>

<?php if (empty($messages)) { ?>
    <p>Pas de messages</p>
<?php } ?>

<?php
echo '<pre>';
// var_dump($messages);
echo '</pre>';
?>

<div class="row">
    <div class="col">
        <table>

            <?php foreach ($test as $t) { ?>
                <?php
                // We detect if current user is the Sender or Receiver's message
                if ($t[0]->Sender->id === $Auth->user('id')) {
                    $user = 'Receiver';
                } else {
                    $user = 'Sender';
                } ?>
                <tr>
                    <td>
                        Conversation ID : <?= $t[0]->conversation_id ?>
                    </td>
                    <td>
                        <p><?=$t[0]->type?></p>
                        <p><?php
                            if(empty($t[0]->readstatus)) {
                                echo '<label class="label label-primary">nouveau<label>';
                            }
                            else {
                                echo $t[0]->readstatus->i18nFormat('dd/MM/yyyy hh:mm');
                            } ?>
                        </p>
                        <p><?= $this->Text->truncate(strip_tags($t[0]->content), 50, ['ellipsis' => '...']) ?></p>
                    </td>
                    <td>
                        <?= $t[0]->Sender->login ?>
                        <?= $t[0]->Receiver->login ?>
                        <p><strong><?= $t[0]->$user->login ?></strong></p>
                        <?= $this->Html->link('Voir', ['action' => 'conversation', $t[0]->conversation_id]); ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
