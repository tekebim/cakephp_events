<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="title text-center">
                <h1>Connexion</h1>
            </div>
            <div class="card card-form">
                <div class="card-body">
                    <?= $this->Form->create('',['class' => 'form']); ?>
                    <div class="form-group">
                        <?= $this->Form->control('login', [
                            'class' => 'form-control',
                            'autocomplete' => 'off'
                        ]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('password', ['class' => 'form-control']); ?>
                    </div>
                    <div class="text-center mt-5">
                        <?= $this->Form->button('Se connecter', ['class' => 'btn btn-md btn-primary']); ?>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
