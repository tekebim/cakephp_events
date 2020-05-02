<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js') ?>
    <?= $this->Html->script('vendors') ?>
    <?= $this->Html->script('app') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <?= $this->Html->link('GEEKUP', ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'navbar-brand']) ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav w-100 my-2 my-md-0 d-flex align-items-center">
            <?php if ($Auth->user()) { ?>
                <li class="nav-item text-center text-sm-left"><?= $this->Html->link('Accueil', ['controller' => 'Dashboard', 'action' => 'index'], ['class' => ('nav-link ' . $this->templatePath == 'Dashboard' && $this->template == 'index') ? 'active' : '']) ?></li>
                <li class="nav-item text-center text-sm-left"><?= $this->Html->link('Liste des événements', ['controller' => 'Events', 'action' => 'index'], ['class' => ($this->templatePath == 'Events' && $this->template == 'index') ? 'active' : '']); ?></li>
                <li class="nav-item text-center text-sm-left"><?= $this->Html->link('Mes événements', ['controller' => 'Events', 'action' => 'manage'], ['class' => ($this->templatePath == 'Events' && $this->template == 'manage') ? 'active' : '']); ?></li>
                <li class="nav-item text-center text-sm-left">
                    <?= $this->Html->link('Mes messages', ['controller' => 'Messages', 'action' => 'index'], ['class' => ($this->templatePath == 'Messages' && $this->template == 'index') ? 'active' : '']); ?>
                </li>
                <li class="nav-item dropdown ml-sm-auto text-center text-sm-left">
                    <a class="user__details nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <?php if (!empty($Auth->user('avatar'))) { ?>
                            <figure class="rounded-circle user__avatar">
                                <?= $this->Html->image('avatars/' . $Auth->user('avatar'), ['width' => 30, 'alt' => 'Avatar de ' . $Auth->user('login'), 'class' => 'rounded-circle']) ?>
                            </figure>
                        <?php } else { ?>
                            <figure class="user__avatar">
                                <?= $this->Html->image('default-avatar.png', ['width' => 30, 'alt' => 'Avatar par défaut', 'class' => 'rounded-circle']) ?>
                            </figure>
                        <?php } ?>

                        <span class="user__name"><?= $Auth->user('login'); ?>(<?= $Auth->user('id'); ?>)</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?= $this->Html->link('Voir mon profil', ['controller' => 'Users', 'action' => 'view', $Auth->user('id')], ['class' => ('dropdown-item ' . $this->templatePath == 'Users' && $this->template == 'view') ? 'active' : '']); ?>
                        <?= $this->Html->link('Modifier mon compte', ['controller' => 'Users', 'action' => 'edit'], ['class' => ($this->templatePath == 'Users' && $this->template == 'edit') ? 'active' : '']); ?>
                        <?= $this->Html->link('Se déconnecter', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item']); ?>
                    </div>
                </li>

            <?php } else { ?>
                <li class="nav-item ml-sm-auto text-center text-sm-left">
                    <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login'], ['class' => ($this->templatePath == 'Users' && $this->template == 'login') ? 'active' : '' . ' nav-link btn btn-secondary']); ?>
                </li>
                <li class="nav-item text-center text-sm-left">
                    <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'add'], ['class' => ($this->templatePath == 'Users' && $this->template == 'add') ? 'active' : '' . ' nav-link btn btn-primary']); ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
