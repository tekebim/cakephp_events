<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="title text-center">
                <h1>Vos échanges avec les membres</h1>
            </div>
        </div>
    </div>
    <div class="row my-5 inner-conversation">
        <div class="col-4 list-conversations bg-white justify-content-center align-content-center">
            <?php if (empty($conversations)) { ?>
                <p class="m-5">Vous n'avez pas encore échangé avec des membres de la communauté GeekUp.</p>
            <?php } else { ?>
                <ul class="list-group row">
                    <?php foreach ($conversations as $c) { ?>
                        <?php
                        // We detect if current user is the Sender or Receiver's message
                        if ($c[0]->Sender->id === $Auth->user('id')) {
                            $user = 'Receiver';
                        } else {
                            $user = 'Sender';
                        } ?>
                        <li class="list-group-item p-0">
                            <a href="<?= $this->Url->build([
                                'controller' => 'Messages',
                                'action' => 'conversation',
                                $c[0]->conversation_id
                            ]); ?>" class="conversation-link">
                                <div class="discuss__wrapper p-3">
                                    <p>Conversation ID : <?= $c[0]->conversation_id ?></p>
                                    <div class="discuss__user">
                                        <?php if (!empty($Auth->user('avatar'))) { ?>
                                            <figure class="rounded-circle user__avatar">
                                                <?= $this->Html->image('avatars/' . $Auth->user('avatar'), ['width' => 30, 'alt' => 'Avatar de ' . $Auth->user('login'), 'class' => 'rounded-circle']) ?>
                                            </figure>
                                        <?php } else { ?>
                                            <figure class="user__avatar">
                                                <?= $this->Html->image('default-avatar.png', ['width' => 30, 'alt' => 'Avatar par défaut', 'class' => 'rounded-circle']) ?>
                                            </figure>
                                        <?php } ?>
                                        <strong><?= $c[0]->$user->login ?></strong>
                                    </div>
                                    <div class="discuss__msg">
                                        <?php if ($c[0]->type === 'request') { ?>
                                            <span class="badge badge-info">Demande d'invitation</span>
                                        <?php } ?>
                                        <p>
                                            <?= $this->Text->truncate(strip_tags($c[0]->content), 50, ['ellipsis' => '...']) ?>
                                        </p>

                                        <?php if (empty($c[0]->readstatus)) {
                                            echo '⬤';
                                        } else {
                                            echo '<span>' . $c[0]->readstatus->i18nFormat('dd/MM/yyyy hh:mm') . '</span>';
                                        } ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div class="col-8 text-center justify-content-center bg-light p-5">
            <h2>Les conversations sont des espaces où vous pouvez parler avec une personne.</h2>
            <p>Vous retrouverez ici tous les messages envoyés ou réçus.</p>
        </div>
    </div>
</div>
