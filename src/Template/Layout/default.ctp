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

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->Html->script('jquery-3.2.1.slim.min') ?>
    <?= $this->Html->script('popper.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul>
        <?php
        // If user authenfiticated
        if (!$Auth->user()) { ?>
            <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login'], ['class' => ($this->templatePath == 'Users' && $this->template == 'login') ? 'active' : '']); ?>
            <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'add'], ['class' => ($this->templatePath == 'Users' && $this->template == 'add') ? 'active' : '']); ?>
        <?php } else { ?>
            <li><?= $this->Html->link('Accueil', ['controller' => 'Dashboard', 'action' => 'index'], ['class' => ($this->templatePath == 'Dashboard' && $this->template == 'index') ? 'active' : ''])?></li>
            <li><?= $this->Html->link('Liste des événements', ['controller' => 'Events', 'action' => 'index'], ['class' => ($this->templatePath == 'Events' && $this->template == 'index') ? 'active' : '']); ?></li>
            <li><?= $this->Html->link('Mes événements', ['controller' => 'Events', 'action' => 'manage'], ['class' => ($this->templatePath == 'Events' && $this->template == 'manage') ? 'active' : '']); ?></li>
            <li><?= $this->Html->link('Mes messages', ['controller' => 'Messages', 'action' => 'index'], ['class' => ($this->templatePath == 'Messages' && $this->template == 'index') ? 'active' : '']); ?></li>
            <li>
                <a class="user__details">
                    <?php if (!empty($Auth->user('avatar'))) { ?>
                        <figure class="circle user__avatar">
                            <?= $this->Html->image('avatars/' . $Auth->user('avatar'), ['width' => 30, 'alt' => 'Avatar de ' . $Auth->user('login')]) ?>
                        </figure>
                    <?php } else { ?>
                        <figure class="circle user__avatar">
                            <?= $this->Html->image('default-avatar.png', ['width' => 30, 'alt' => 'Avatar par défaut']) ?>
                        </figure>
                    <?php } ?>

                    <span class="user__name">

                    ID : <?= $Auth->user('id'); ?> -
                    <?= $Auth->user('login'); ?>
                        </span>
                </a>
                <ul>
                    <li><?= $this->Html->link('Voir mon profil', ['controller' => 'Users', 'action' => 'view', $Auth->user('id')], ['class' => ($this->templatePath == 'Users' && $this->template == 'view') ? 'active' : '']); ?></li>
                    <li><?= $this->Html->link('Modifier mon compte', ['controller' => 'Users', 'action' => 'edit'], ['class' => ($this->templatePath == 'Users' && $this->template == 'edit') ? 'active' : '']); ?></li>
                    <li><?= $this->Form->postLink('Supprimer mon compte', ['controller' => 'Users', 'action' => 'delete'], ['confirm' => 'Etes-vous sûr ?']); ?></li>
                    <li><?= $this->Html->link('Se déconnecter', ['controller' => 'Users', 'action' => 'logout']); ?></li>
                </ul>
            </li>
        <?php } ?>

    </ul>
</nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
