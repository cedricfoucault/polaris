<div>
<?php if (empty($persos)):?>
Aucun résultat
<?php else: ?>
<ul>
    <?php foreach ($persos as $perso): ?>
    <li>
        <?php echo anchor('personnage/voir/'.$perso['id'], $perso['nom']); ?>
        (<?php echo anchor('utilisateur/voir/'.$perso['id_joueur'], $perso['nom_joueur']); ?>)
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
</div>