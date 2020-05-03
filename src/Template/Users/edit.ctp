<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="title text-center">
                <h1>Modification de mon profil</h1>
            </div>

            <div class="card card-form mt-5">
                <div class="card-body">

                    <?= $this->Form->create($e) ?>
                    <fieldset>
                        <div class="form-group">
                            <legend>Votre image de profil :</legend>
                        </div>
                        <div class="form-group">
                            <?php if (!empty($e->avatar)) { ?>
                                <figure>
                                    <?= $this->Html->image('avatars/' . $e->avatar, ['alt' => 'Avatar de ' . $e->login]) ?>
                                </figure>
                            <?php } else { ?>
                                <figure>
                                    <?= $this->Html->image('default-avatar.png', ['alt' => 'Avatar par défaut']) ?>
                                </figure>
                            <?php } ?>
                        </div>
                        <?= $this->Html->link('Upload une nouvelle image', ['action' => 'editavatar']); ?>
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

