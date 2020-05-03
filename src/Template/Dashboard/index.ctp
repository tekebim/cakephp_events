<section id="hero-banner" class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">Jumbotron Full-width</h1>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book.</p>
        <p class="lead">
            <?= $this->Html->link('Explorer', ['controller' => 'Events', 'action' => 'index'], ['class' => 'btn btn-primary btn-md']) ?>
        </p>
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-12">
            <?= $this->element('eventstable', [
                'titleType' => 'h2',
                'titleContent' => 'Liste des événements',
                'sourceArray' => $events,
                'showOrganizator' => true,
                'showInvitation' => true,
                'showDescription' => true,
                'showPagination' => true,
                'showStatus' => false,
            ]); ?>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-4">
            <div class="card card-shadow__3">
                <h2>Utilisateur(s) connecté(s)</h2>
                <h3>Dans les 30 dernières minutes</h3>
                <?php if (!empty($lastusers)) { ?>
                    <ul>
                        <?php foreach ($lastusers as $user) { ?>
                            <?php
                            $currentTime = new DateTime('now');
                            $interval = $user->lastin->diff($currentTime);
                            $intM = ($interval->i) > 0 ? $interval->format('%i') : 0;
                            ?>
                            <li><?= $this->Html->link($user->login, ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                                <br/>connecté depuis
                                <?php if ($intM > 0) { ?>
                                    <?= $intM > 1 ? $intM . ' minutes' : $intM . ' minute'; ?>
                                <?php } else { ?>
                                    moins d'une minute
                                <?php } ?>
                                <br/>Connecté à <?= $user->lastin ?>
                                <br/>Déconnecté à <?= $user->lastout ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>Aucun utilisateur actif récemment</p>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-shadow__3">
                <h2>Top contributeurs</h2>
                <?php if (!empty($contributors)) { ?>
                    <ol>
                        <?php foreach ($contributors as $user) { ?>
                            <li><?= $this->Html->link($user->user->login, ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                                : <?= $user->count ?> moocs
                            </li>
                        <?php } ?>
                    </ol>
                <?php } else { ?>
                    <p>Aucun utilisateur récemment</p>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-shadow__3">
                <h2>TOP 5 des invités</h2>
                <?php if (!empty($invated)) { ?>
                    <ol>
                        <?php foreach ($invated as $user) { ?>
                            <li><?= $this->Html->link($user->user->login, ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                                : <?= $user->count ?> invitations
                            </li>
                        <?php } ?>
                    </ol>
                <?php } else { ?>
                    <p>Aucun utilisateur récemment</p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid bg-white">
    <div class="row">
        <div class="container py-5">
            <div class="row text-center">
                <div class="col-12">
                    <h1>Comment utiliser Geekup</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <h2>Découvrir des événements</h2>
                    <p>Explorer une liste d'événents à proximité ou en ligne pour tous les sujets.</p>
                    <?= $this->Html->link('Explorer', ['controller' => 'Events', 'action' => 'index'], ['class' => 'btn btn-secondary btn-md']) ?>
                </div>
                <div class="col-6">
                    <h2>Créer votre propre événement</h2>
                    <p>Partager votre événement au sein de la communauté de geek.</p>
                    <?= $this->Html->link('Je crée un événement', ['controller' => 'Events', 'action' => 'add'], ['class' => 'btn btn-secondary btn-md']) ?>
                </div>
            </div>
        </div>
</section>
