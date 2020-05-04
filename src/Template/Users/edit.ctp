<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="title text-center">
                <h1>Modification de mon profil</h1>
            </div>

            <div class="card card-form mt-5">
                <div class="card-body">

                    <?= $this->Form->create($e, ['class' => 'form']) ?>
                    <fieldset>
                        <div class="form-group">
                            <legend>Votre image de profil :</legend>
                        </div>
                        <div class="form-group">
                            <?php if (!empty($e->avatar)) { ?>
                                <figure class="text-center">
                                    <?= $this->Html->image('avatars/' . $e->avatar, ['alt' => 'Avatar de ' . $e->login, 'class' => 'img-fluid']) ?>
                                </figure>
                            <?php } else { ?>
                                <figure class="text-center">
                                    <?= $this->Html->image('default-avatar.png', ['alt' => 'Avatar par défaut', 'class' => 'img-fluid']) ?>
                                </figure>
                            <?php } ?>
                        </div>
                        <div class="text-center my-3">
                            <?= $this->Html->link('Upload une nouvelle image', ['action' => 'editavatar'], ['class' => 'btn btn-sm btn-primary']); ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <legend>Vos informations</legend>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('login', ['label' => 'Votre nom d\'utilisateur', 'class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('password', ['label' => 'Votre mot de passe', 'value' => '', 'class' => 'form-control']) ?>
                        </div>
                    </fieldset>

                    <div class="cta text-center my-5">
                        <?= $this->Form->button('Modifier vos informations', ['class' => 'btn btn-primary btn-md']) ?>
                        <?= $this->Html->link('Annuler', ['action' => 'view', $e->id], ['class' => 'btn btn-outline--dark btn-md']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>

        </div>
    </div>
</div>

