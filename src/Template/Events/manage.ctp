<div class="container">
    <div class="row">
        <div class="col-12 my-5">

            <div class="title text-center">
                <h1>Gestion de mes événements</h1>
            </div>

            <?php if (empty($events)) { ?>
                <div class="content p-0 my-3">
                    <div class="alert alert-warning m-0">
                        Vous n'avez encore organiser aucun événement.
                    </div>
                </div>
            <?php } else { ?>

                <?= $this->element('eventstable', [
                    'titleType' => 'h2',
                    'titleContent' => false,
                    'sourceArray' => $events,
                    'showOrganizator' => false,
                    'showInvitation' => true,
                    'showDescription' => true,
                    'showPagination' => false,
                    'showStatus' => true,
                ]); ?>

            <?php } ?>

            <div class="cta text-center my-5">
                <?= $this->Html->link('Créer un nouvel événement', ['action' => 'add'], ['class' => 'btn btn-secondary btn-md']) ?>
            </div>
        </div>
    </div>
</div>
