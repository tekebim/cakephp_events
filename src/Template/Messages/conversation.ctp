<h1>Détail conversation</h1>

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
                    <p><?=$message->type?></p>
                    <p><?= $message->conversation_id ?></p>
                    <p><?php
                    if(empty($message->readstatus)) {
                        echo 'nouveau';
                    }
                    else {
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
