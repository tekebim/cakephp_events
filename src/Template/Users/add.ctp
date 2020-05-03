<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="title text-center">
                <h1>Création d'un compte</h1>
            </div>
            <div class="card card-form">
                <div class="card-body">
                    <?= $this->Form->create($n, ['class' => 'form', 'enctype' => 'multipart/form-data']); ?>
                    <fieldset>
                        <legend><?php echo __('Vos informations'); ?></legend>
                        <div class="form-group">
                            <?= $this->Form->control('login', ['label' => 'Nom d\'utilisateur', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('password', ['label' => 'Mot de passe', 'class' => 'form-control']); ?>
                        </div>
                        <div class="text-center mt-5">
                            <?= $this->Form->button('S\'enregistrer', ['class' => 'btn btn-md btn-primary']); ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
