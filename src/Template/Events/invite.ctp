<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 my-5">
            <div class="title text-center">
                <h1>Inviter des personnes à l'événement : <?= $event->title ?></h1>
            </div>
            <div class="card card-form mt-5">
                <div class="card-body">
                    <p>ID de l'événement : <?= $event->title; ?></p>
                    <p>Organisateur de l'événement : <strong><?= $event->user->login; ?></strong></p>

                    <?= $this->Form->create($n, ['class' => 'form']); ?>

                    <div class="form-group">
                        <?=
                        // Select multiple pour belongsToMany
                        $this->Form->control('user_id', [
                            'type' => 'select',
                            'label' => 'Rechercher des utilisateurs',
                            'multiple' => true,
                            'empty' => 'choisissez',
                            'options' => $users,
                            'data-field' => 'user_id',
                            'class' => 'js-choice form-control',
                        ]);
                        ?></div>
                    <div class="form-group">
                        <?= $this->Form->control('event_id', ['type' => 'hidden', 'value' => $event->id, 'class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('status', ['type' => 'hidden', 'value' => 'validated', 'class' => 'form-control']); ?>
                    </div>
                    <div class="cta my-3 text-center">
                        <?= $this->Form->button('Inviter', ['class' => 'btn btn-primary btn-sm']); ?>
                    </div>
                    <?= $this->Form->end(); ?>
                    <hr>
                    <h1>Liste des invités :</h1>
                    <?php foreach ($event->guests as $guest) { ?>
                        <?= $guest->user['login'] ?>
                    <?php } ?>
                </div>
            </div>
            <div class="mt-5 text-center">
                <?= $this->Html->link('< Retour à la fiche de l\'événément', ['controller' => 'Events', 'action' => 'view', $event->id], ['class' => 'btn btn-outline--dark btn-xs']); ?>
            </div>
        </div>
    </div>
</div>
