
<?= $this->Paginator->first('< Première page'); ?>
<?= $this->Paginator->prev('« Précédent') ?>
<?= $this->Paginator->numbers([
    'before' => 'Lien vers',
    'first' => 'First page'
]) ?>

<?= $this->Paginator->next('Suivant »') ?>

<?= $this->Paginator->counter() ?>
