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
    <div class="col-4 bg-light">
        <?php foreach ($messages as $message) { ?>

            <?php
            echo $Auth->user('id');
            echo '-';
            echo $message->Sender->id;
            echo '-';
            echo $message->Receiver->id;
            ?>

            <?php
            // We detect if current user is the Sender or Receiver's message
            if ($message->Sender->id === $Auth->user('id')) {
                $user = 'Receiver';
            } else {
                $user = 'Sender';
            } ?>


            <div class="d-flex">
                <div class="chat__avatar">
                    <figure class="circle user__avatar m-0">
                        <?php if (!empty($message->$user->avatar)) { ?>
                            <?= $this->Html->image('avatars/' . $message->$user->avatar, ['width' => 30, 'alt' => 'Avatar de ' . $message->$user->login]) ?>
                        <?php } else { ?>
                            <?= $this->Html->image('default-avatar.png', ['width' => 30, 'alt' => 'Avatar par défaut']) ?>
                        <?php } ?>
                    </figure>
                </div>
                <div class="chat__meta">
                    <div class="chat__title">
                        <p><strong><?= $message->$user->login ?></strong></p>
                        <span class="label"><?= $this->IntervalTime->fromNow($message->created, true) ?></span>
                    </div>
                    <div class="chat__content">
                        <p><?= $this->Text->truncate(strip_tags($message->content), 50, ['ellipsis' => '...']) ?></p>
                    </div>
                    <p><?= $message->readstatus ? '(lu)' : '(non lu)' ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
