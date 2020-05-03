<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="title text-center">
                <h1>Création d'un événément</h1>
            </div>
            <div class="card card-form mt-5">
                <div class="card-body">
                    <?= $this->Form->create($n, ['enctype' => 'multipart/form-data', 'class' => 'form']); ?>
                    <fieldset>
                        <legend>Informations de l'événement</legend>
                        <div class="form-group">
                            <?= $this->Form->control('picture', ['label' => 'Visuel de l\'énévement', 'type' => 'file', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('title', ['label' => 'Titre de l\'événément', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('beginning',
                                [
                                    'type' => 'datetime-local',
                                    'label' => 'Date de l\'événement',
                                    'class' => 'form-control',
                                ]) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('location', ['label' => 'Lieu', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('description', ['label' => 'Description', 'class' => 'form-control']); ?>
                        </div>
                        <div class="cta mt-5 text-center">
                            <?= $this->Form->button('Créer l\'événement', ['class' => 'btn btn-md btn-primary']); ?>
                            <?= $this->Html->link('Annuler', ['controller' => 'Events', 'action' => 'manage'], ['class' => 'btn btn-md btn-outline--dark']); ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
