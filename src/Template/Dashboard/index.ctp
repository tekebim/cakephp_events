<section id="hero-banner" class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">Geekup : la plateforme <br/>d'événement geeks<br/>près de chez toi</h1>
        <p>Découvres des centaines d'événements mensuels près de chez toi, ou des sessions virtuelles. Tu pourras
            retrouver des événements de tout genre : jeu vidéo, cinéma, manga, voyages, programmation, robotique et
            cosplay.<br/> Rejoins sans plus tarder la communauté de Geekup et échange entre passioné.</p>
        <p class="lead">
            <?= $this->Html->link('Explorer', ['controller' => 'Events', 'action' => 'index'], ['class' => 'btn btn-primary btn-md']) ?>
        </p>
    </div>
</section>

<section id="stats-users" class="container">
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
            <div class="content card card-shadow__3">
                <div class="text-center">
                    <h2>Membre(s) actif(s)</h2>
                </div>

                <?php if (count($lastusers) > 0) { ?>
                <ul class="list-group list-group-flush">
                    <?php foreach ($lastusers as $user) { ?>
                        <?php
                        $currentTime = new DateTime('now');
                        $interval = $user->lastin->diff($currentTime);
                        $intM = ($interval->i) > 0 ? $interval->format('%i') : 0;
                        ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $this->Html->link($user->login, ['controller' => 'Users', 'action' => 'view', $user->id]) ?>

                            <span class="badge badge-primary badge-pill">
                            il y a
                            <?php if ($intM > 0) { ?>
                                <?= $intM > 1 ? $intM . ' minutes' : $intM . ' minute'; ?>
                            <?php } else { ?>
                                moins d'une minute
                            <?php } ?>
                                </span>
                        </li>
                    <?php } ?>
                </ul>
                <?php } else { ?>
                    <p>Aucun utilisateur récemment connecté dans les 30 dernières minutes.</p>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <div class="content card card-shadow__3">
                <div class="text-center">
                    <h2>Top contributeurs</h2>
                </div>
                <?php if (!empty($contributors)) { ?>
                    <ol class="list-group list-group-flush">
                        <?php foreach ($contributors as $user) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $this->Html->link($user->user->login, ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                                <span class="badge badge-primary badge-pill">
                                    <?= $user->count ?> <?= ($user->count > 1) ? 'événements' : 'événement' ?>
                                </span>
                            </li>
                        <?php } ?>
                    </ol>
                <?php } else { ?>
                    <p>Aucun utilisateur</p>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <div class="content card card-shadow__3">
                <div class="text-center">
                    <h2>Top des plus invités</h2>
                </div>
                <?php if (!empty($invated)) { ?>
                    <ol class="list-group list-group-flush">
                        <?php foreach ($invated as $user) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $this->Html->link($user->user->login, ['controller' => 'Users', 'action' => 'view', $user->user_id]) ?>
                                <span class="badge badge-primary badge-pill">
                                <?= $user->count ?> <?= ($user->count > 1) ? 'invitations' : 'invitation' ?>
                                </span>
                            </li>
                        <?php } ?>
                    </ol>
                <?php } else { ?>
                    <p>Aucun utilisateur</p>
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
