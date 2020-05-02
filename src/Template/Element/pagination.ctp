<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">3</a></li>

        <?= $this->Paginator->first('< Première page'); ?>
        <?= $this->Paginator->prev('« Précédent') ?>
        <?= $this->Paginator->numbers([
            'before' => 'Lien vers',
            'first' => 'First page'
        ]) ?>
        <li class="page-item"><?= $this->Paginator->next('Suivant »', array('class' => 'page-link')) ?></li>
        <?= $this->Paginator->counter() ?>
    </ul>
</nav>
