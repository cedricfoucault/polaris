<h1><?php echo $perso['nom']; ?></h1>

<div>Propriétaire : <?php echo $perso['utilisateur']?></div>
<div>Sexe : <?php echo $perso['sexe']?></div>
<div>Âge : <?php echo $perso['age']?></div>
<div>Taille : <?php echo $perso['taille']?> cm</div>
<div>Peau : <?php echo $perso['peau']?></div>
<div>Corpulence : <?php echo $perso['corpulence']?></div>
<div>Cheveux : <?php echo $perso['cheveux']?></div>
<div>Yeux : <?php echo $perso['yeux']?></div>
<div>Signes : <?php echo $perso['signes']?></div>

<div>Origine géographique : <?php echo $perso['origine_geo']?></div>
<div>Origine sociale : <?php echo $perso['origine_soc']?></div>
<div>Formation : <?php echo $perso['formation']?></div>
<div>Etudes supérieures : <?php echo $perso['etudes_sup']?></div>

<h3>Attributs principaux</h3>
<div>Force : <?php echo $perso['for']?></div>
<div>Constitution : <?php echo $perso['con']?></div>
<div>Coordination : <?php echo $perso['coo']?></div>
<div>Adaptation : <?php echo $perso['ada']?></div>
<div>Perception : <?php echo $perso['per']?></div>
<div>Intelligence : <?php echo $perso['int']?></div>
<div>Volonté : <?php echo $perso['vol']?></div>
<div>Présence : <?php echo $perso['pre']?></div>

<h3>Attributs secondaires</h2>
<div>Chance : <?php echo $perso['chance']?></div>
<div>Réactivité : <?php echo $perso['rea']?></div>
<div>Modificateur de dommages : <?php echo $perso['dom']?></div>
<div>Choc : <?php echo $perso['choc']?></div>
<div>Souffle : <?php echo $perso['souffle']?></div>
<h4>Résistances</h4>
<div>Résistance aux dommages : <?php echo $perso['res_dom']?></div>
<div>Résistance aux poisons : <?php echo $perso['res_poi']?></div>
<div>Résistance aux maladies : <?php echo $perso['res_mal']?></div>
<div>Résistance aux radiations : <?php echo $perso['res_rad']?></div>
<div>Résistance aux drogues : <?php echo $perso['res_dro']?></div>

<h3>Mutations</h3>
<ul>
    <?php foreach ($perso['mutations'] as $mutation): ?>
    <li><?php echo $mutation; ?></li>
    <?php endforeach; ?>
</ul>

<h3>Avantages et désavantages</h3>
<h4>Avantages</h4>
<ul>
    <?php foreach ($perso['avantages'] as $avantage): ?>
    <li><?php echo $avantage; ?></li>
    <?php endforeach; ?>
</ul>
<h4>Désavantages</h4>
<ul>
    <?php foreach ($perso['desavantages'] as $desavantage): ?>
    <li><?php echo $desavantage; ?></li>
    <?php endforeach; ?>
</ul>

<h3>Professions</h3>
<ul>
    <?php foreach ($perso['professions'] as $profession): ?>
    <li><?php echo $profession['nom']; ?> <?php echo $profession['annees']?> ans</li>
    <?php endforeach; ?>
</ul>