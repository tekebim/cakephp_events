<nav aria-label="Evenements navigation">
    <?php
    $this->Paginator->templates([
        'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
        'current' => '<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
        'prevActive' => '<li class="page-item prev"><a href="{{url}}" class="page-link">{{text}}</a></li>',
        'prevDisabled' => '<li class="page-item disabled"><a href="{{url}}" class="page-link">{{text}}</a></li>',
        'nextActive' => '<li class="page-item next"><a href="{{url}}" class="page-link">{{text}}</a></li>',
        'nextDisabled' => '<li class="page-item disabled"><a href="{{url}}" class="page-link">{{text}}</a></li>'
    ]); ?>

    <ul class="pagination justify-content-center">
        <li><?php echo $this->Paginator->prev('< Précédent', array('escape' => false, 'tag' => 'li'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')); ?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?></li>
        <li><?php echo $this->Paginator->next('Suivant >', array('escape' => false, 'tag' => 'li', 'currentClass' => 'disabled'), null, array('escape' => false, 'tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a')); ?></li>
    </ul>
</nav>

