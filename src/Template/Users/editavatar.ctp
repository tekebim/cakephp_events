<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="title text-center">
                <h1>Modification de votre image de profil</h1>
            </div>

            <div class="card card-form mt-5">
                <div class="card-body">

                    <div>
                        <p>Votre avatar actuel : </p>
                        <?php if (!empty($modif->avatar)) { ?>
                            <figure>
                                <?= $this->Html->image('avatars/' . $modif->avatar, ['alt' => 'Avatar de ' . $modif->pseudo, 'class' => 'img-fluid']) ?>
                            </figure>
                        <?php } else { ?>
                            <figure>
                                <?= $this->Html->image('default-avatar.png', ['alt' => 'Avatar par défaut', 'class' => 'img-fluid']) ?>
                            </figure>
                        <?php } ?>
                    </div>

                    <?= $this->Form->create($modif, ['enctype' => 'multipart/form-data', 'class' => 'form']) ?>
                    <fieldset>
                        <div class="form-group">
                        <?= $this->Form->control('avatar', ['type' => 'file', 'class' => 'form-control']); ?>
                        </div>
                        <div class="text-center my-3">
                            <?= $this->Form->button('Modifier', ['class'=>'btn btn-primary btn-md']) ?>
                            <?= $this->Html->link('Annuler', ['action' => 'view', $modif->id], ['class'=>'btn btn-outline--dark btn-md']); ?>
                        </div>

                    </fieldset>
                    <?= $this->Form->end() ?>

                </div>
            </div>
        </div>
    </div>
</div>
