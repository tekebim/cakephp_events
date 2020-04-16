<h1>Mon profil</h1>
<?php var_dump($user); ?>
<?php if (!empty($user->avatar)) { ?>
    <figure>
        <?= $this->Html->image('avatars/' . $user->avatar, ['alt' => 'Avatar de ' . $user->pseudo]) ?>
    </figure>
<?php } else { ?>
    <figure>
        <?= $this->Html->image('default.png', ['alt' => 'Avatar par défaut']) ?>
    </figure>
<?php } ?>

<table>
    <tbody>
    <tr>
        <td>Avatar : <strong><?= $user->avatar ?></strong></td>
    </tr>
    <tr>
        <td>Pseudo : <strong><?= $user->login ?></strong></td>
    </tr>
    <tr>
        <td>Membre depuis le : <?= $user->created->i18nFormat('dd/MM/yy') ?>
            à <?= $user->created->i18nFormat('hh:mm') ?></td>
    </tr>
    <tr>
        <td>Dernière modification : <?= $user->modified->i18nFormat('dd/MM/yy') ?>
            à <?= $user->modified->i18nFormat('hh:mm') ?></td>
    </tr>
    <tr>
        <td>Dernière connexion : <?= $user->lastin->i18nFormat('dd/MM/yy') ?>
            à <?= $user->lastin->i18nFormat('hh:mm') ?></td>
    </tr>
    </tbody>
</table>


<p><?= $this->Html->link('Retour à la page d\'accueil', ['action' => 'index', 'controller' => 'dashboard']); ?></p>
