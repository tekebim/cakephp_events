<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h1>Retrouver la liste des prochains événements organisés</h1>
            </div>

            <?= $this->element('eventstable', [
                'titleType' => 'h2',
                'titleContent' => 'Liste des événements',
                'sourceArray' => $events,
                'showOrganizator' => true,
                'showInvitation' => true,
                'showDescription' => true,
                'showPagination' => true,
                'showStatus' => true,
            ]); ?>
            <div class="cta text-center my-5">
                <?= $this->Html->link('Créer un nouvel événement', ['action' => 'add'], array('class' => 'btn btn-secondary btn-md')); ?>
            </div>
        </div>
    </div>
</div>
