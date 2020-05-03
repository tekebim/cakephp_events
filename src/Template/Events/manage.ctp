<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="title text-center">
                <h1>Gestion de mes événements</h1>
            </div>

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
            <div class="cta text-center my-5">
                <?= $this->Html->link('Créer un nouvel événement', ['action' => 'add'], ['class' => 'btn btn-secondary btn-md']) ?>
            </div>
        </div>
    </div>
</div>
