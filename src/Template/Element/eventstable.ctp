<?= '<' . $titleType . '>' ?>
<?= $titleContent; ?>
<?= '</' . $titleType . '>' ?>

<table>
    <thead>
    <tr>
        <th>Nom de l'événément</th>
        <th>Date de l'événément</th>
        <th>Lieu de l'événément</th>
        <th>Organisé par</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sourceArray as $event) { ?>
        <tr>
            <td><?= $event->title ?></td>
            <td><?= $this->IntervalTime->createLabel($event->beginning) ?></td>
            <td><?= $event->location ?></td>
            <td><?= $event->user->login ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
