<div class="container">
    <div class="row">
        <div class="col-12 my-5">

            <?= $this->element('eventstable', [
                'titleType' => 'h1',
                'titleContent' => 'Retrouver la liste des prochains événements organisés',
                'sourceArray' => $events,
                'showOrganizator' => true,
                'showInvitation' => true,
                'showDescription' => true,
                'showPagination' => true,
                'showStatus' => true,
            ]); ?>
            <div class="cta text-center my-5">

                <?= $this->Html->link('Créer un nouvel événement', ['action' => 'add'], ['class' => 'btn btn-secondary btn-md', 'escape' => false]); ?>
            </div>
        </div>
    </div>
</div>
