<h1><?php echo $utilisateur['nom']?></h1>

<h2>Ses Personnages</h2>
<ul>
    <?php foreach ($persos as $perso): ?>
    <li><?php echo anchor('personnage/voir/'.$perso['id'], $perso['nom']); ?></li>
    <?php endforeach; ?>
</ul>
