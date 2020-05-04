<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="title text-center">
                <h1>Vos échanges avec les membres</h1>
            </div>
        </div>
    </div>
    <div class="row my-5 inner-conversation">
        <div class="col-4 list-conversations bg-white p-5 justify-content-center align-content-center">
            <?php if (empty($messages)) { ?>
                <p>Vous n'avez pas encore échangé avec des membres de la communauté GeekUp.</p>
            <?php } ?>
            <table class="table table-messages">
                <?php foreach ($messages as $m) { ?>
                    <?php
                    // We detect if current user is the Sender or Receiver's message
                    if ($m[0]->Sender->id === $Auth->user('id')) {
                        $user = 'Receiver';
                    } else {
                        $user = 'Sender';
                    } ?>
                    <tr>
                        <td>
                            <a href="<?= $this->Url->build([
                                'controller' => 'Messages',
                                'action' => 'conversation',
                                $m[0]->conversation_id
                            ]); ?>" class="conversation-link">
                                <p>Conversation ID : <?= $m[0]->conversation_id ?></p>
                                <?php if (!empty($Auth->user('avatar'))) { ?>
                                    <figure class="rounded-circle user__avatar">
                                        <?= $this->Html->image('avatars/' . $Auth->user('avatar'), ['width' => 30, 'alt' => 'Avatar de ' . $Auth->user('login'), 'class' => 'rounded-circle']) ?>
                                    </figure>
                                <?php } else { ?>
                                    <figure class="user__avatar">
                                        <?= $this->Html->image('default-avatar.png', ['width' => 30, 'alt' => 'Avatar par défaut', 'class' => 'rounded-circle']) ?>
                                    </figure>
                                <?php } ?>
                                <?php var_dump($m[0]->Sender->avatar); ?>
                                <?php var_dump($m[0]->Receiver->avatar); ?>
                                <p><strong><?= $m[0]->$user->login ?></strong></p>

                                <?php if ($m[0]->type === 'request') { ?>
                                    <span class="badge badge-info">Demande d'invitation</span>
                                <?php } ?>
                                <p>
                                    <?= $this->Text->truncate(strip_tags($m[0]->content), 50, ['ellipsis' => '...']) ?>
                                </p>

                                <?php if (empty($m[0]->readstatus)) {
                                    echo '<span class="badge badge-info">nouveau<span>';
                                } else {
                                    echo '<span>' . $m[0]->readstatus->i18nFormat('dd/MM/yyyy hh:mm') . '</span>';
                                } ?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-8 text-center justify-content-center bg-light p-5">
            <h2>Les conversations sont des espaces où vous pouvez parler avec une personne.</h2>
            <p>Vous retrouverez ici tous les messages envoyés ou réçus.</p>
        </div>
    </div>
</div>
