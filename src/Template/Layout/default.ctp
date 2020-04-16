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

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <?php
    // If user authenfiticated
    if (!$Auth->user()) { ?>
        <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login'], ['class' => ($this->templatePath == 'Users' && $this->template == 'login') ? 'active' : '']); ?>
        <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'add'], ['class' => ($this->templatePath == 'Users' && $this->template == 'add') ? 'active' : '']); ?>
    <?php } else { ?>
        <?= $this->Session->read('Auth.User.login'); ?>
        <?= $this->Html->link('Modifier le compte', ['controller' => 'Users', 'action' => 'edit'], ['class' => ($this->templatePath == 'Users' && $this->template == 'edit') ? 'active' : '']); ?>
        <?= $this->Form->postLink('Supprimer le compte', ['controller' => 'Users', 'action' => 'delete'], ['confirm' => 'Etes-vous sûr ?']); ?>
        <?= $this->Html->link('Se déconnecter', ['controller' => 'Users', 'action' => 'logout']); ?>
    <?php } ?>
</nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
