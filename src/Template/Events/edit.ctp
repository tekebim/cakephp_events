<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="title text-center">
                <h1>Modification de l'événement</h1>
            </div>

            <div class="card card-form mt-5">
                <div class="card-body">
                    <?= $this->Form->create($e, ['enctype' => 'multipart/form-data', 'class' => 'form']) ?>
                    <fieldset>
                        <legend>Affiche de l'événement :</legend>
                        <?php if (!empty($e->picture)) { ?>
                            <figure>
                                <?= $this->Html->image('events/' . $e->picture, ['alt' => 'Affiche de ' . $e->title, 'class' => 'img-fluid']) ?>
                            </figure>
                        <?php } else { ?>
                            <figure>
                                <?= $this->Html->image('default-event.png', ['alt' => 'Photo par défaut', 'class' => 'img-fluid']) ?>
                            </figure>
                        <?php } ?>
                    </fieldset>
                    <fieldset>
                        <legend>Informations de l'événement</legend>
                        <div class="form-group">
                            <?= $this->Form->control('title', ['label' => 'Titre de l\'événément', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('beginning', ['type' => 'datetime', 'label' => 'Date de l\'événement', 'class' => 'form-control js-datetime']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('description', ['label' => 'Description', 'class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('location', ['label' => 'Lieu', 'class' => 'form-control']); ?>
                        </div>
                        <div class="cta mt-5 text-center">
                            <?= $this->Form->button('Modifier les informations', ['class' => 'btn btn-md btn-primary']); ?>
                            <?= $this->Html->link('Annuler', ['action' => 'view', $e->id], ['class' => 'btn btn-md btn-outline--dark']); ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->end() ?>

                    <div class="cta mt-5 text-center">
                        <?= $this->Form->postLink('Supprimer l\'événément', ['action' => 'delete', $e->id], ['confirm' => 'Êtes-vous sûr de vouloir supprimer cet événément ?']); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
