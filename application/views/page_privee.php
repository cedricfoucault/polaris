<h1>Bienvenue sur votre page perso, <?php echo $utilisateur['nom']?> !</h1>

<p>
    Email enregistré : <?php echo $utilisateur['email']; ?>
</p>

<h2>Vos personnages</h2>

<ul>
    <?php foreach ($persos as $perso): ?>
    <li>
        <?php echo anchor('personnage/voir/'.$perso['id'], $perso['nom']); ?>
        <?php echo anchor('personnage/supprimer/'.$perso['id'], '&times', 'class="Awesome tiny destroy clickable"'); ?>
    </li>
    <?php endforeach; ?>
</ul>

<div class="Chunk"><?php echo anchor('personnage/creation', "Créer un nouveau personnage");?></div>
