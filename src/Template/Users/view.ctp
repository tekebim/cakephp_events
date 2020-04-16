<h1>Mon profil</h1>
<?php if (!empty($user->avatar)) { ?>
    <figure>
        <?= $this->Html->image('avatars/' . $user->avatar, ['alt' => 'Avatar de ' . $user->pseudo]) ?>
    </figure>
<?php } else { ?>
    <figure>
        <?= $this->Html->image('default.png', ['alt' => 'Avatar par défaut']) ?>
    </figure>
<?php } ?>

<?= $this->Html->link('Upload une nouvelle image', ['action' => 'editavatar']); ?>

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
    <?php if (!empty($user->lastin)) { ?>
    <tr>
        <td>Dernière connexion : <?= $user->lastin->i18nFormat('dd/MM/yy') ?>
            à <?= $user->lastin->i18nFormat('hh:mm') ?></td>
    </tr>
    <?php } ?>
    <?php if (!empty($user->lastout)) { ?>
        <tr>
            <td>Dernière déconnexion :
                <?= $user->lastout->i18nFormat('dd/MM/yy') ?>
                à <?= $user->lastin->i18nFormat('hh:mm') ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->Html->link('Mettre à jour mes informations', ['action' => 'edit']); ?>


<p><?= $this->Html->link('Retour à la page d\'accueil', ['action' => 'index', 'controller' => 'dashboard']); ?></p>
