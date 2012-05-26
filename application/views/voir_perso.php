<h1><?php echo $perso['nom']; ?> (Propriétaire : <?php echo $perso['utilisateur']?>)</h1>

<div class="Chunk">
    <div class="Chunk d by2">
        <div class="Box">
            <div class="inner">
                <table border="0">
                    <tr><td>Sexe</td><td><?php echo $perso['sexe']?></td></tr>
                    <tr><td>Âge</td><td><?php echo $perso['age']?></td></tr>
                    <tr><td>Taille</td><td><?php echo $perso['taille']?> cm</td></tr>
                    <tr><td>Peau</td><td><?php echo $perso['peau']?></td></tr>
                    <tr><td>Corpulence</td><td><?php echo $perso['corpulence']?></td></tr>
                    <tr><td>Cheveux</td><td><?php echo $perso['cheveux']?></td></tr>
                    <tr><td>Yeux</td><td><?php echo $perso['yeux']?></td></tr>
                    <tr><td>Signes</td><td><?php echo $perso['signes']?></td></tr>
                </table>
            </div>
        </div>
    </div>

    <div class="Chunk d by2">
        <table border="0">
            <tr><td>Origine géographique</td><td><?php echo $perso['origine_geo']?></td></tr>
            <tr><td>Origine sociale</td><td><?php echo $perso['origine_soc']?></td></tr>
            <tr><td>Formation</td><td><?php echo $perso['formation']?></td></tr>
            <tr><td>Etudes supérieures</td><td><?php echo $perso['etudes_sup']?></td></tr>
        </table>
    </div>
</div>

<div class="Chunk">
    <div class="Chunk d by2">
        <h2>Attributs principaux</h2>

        <table border="0">
            <tr><td>Force       </td><td><?php echo $perso['for']?></td></tr>
            <tr><td>Constitution</td><td><?php echo $perso['con']?></td></tr>
            <tr><td>Coordination</td><td><?php echo $perso['coo']?></td></tr>
            <tr><td>Adaptation  </td><td><?php echo $perso['ada']?></td></tr>
            <tr><td>Perception  </td><td><?php echo $perso['per']?></td></tr>
            <tr><td>Intelligence</td><td><?php echo $perso['int']?></td></tr>
            <tr><td>Volonté     </td><td><?php echo $perso['vol']?></td></tr>
            <tr><td>Présence    </td><td><?php echo $perso['pre']?></td></tr>
        </table>
    </div>

    <div class="Chunk d by2">
        <h2>Attributs secondaires</h2>

        <table border="0">
            <tr><td>Chance                  </td><td><?php echo $perso['chance']?> </td></tr>
            <tr><td>Réactivité              </td><td><?php echo $perso['rea']?>    </td></tr>
            <tr><td>Modif. dommages</td><td><?php echo $perso['dom']?>    </td></tr>
            <tr><td>Choc                    </td><td><?php echo $perso['choc']?>   </td></tr>
            <tr><td>Souffle                 </td><td><?php echo $perso['souffle']?></td></tr>
        </table>

        <h3>Résistances</h3>

        <table border="0">
            <tr><td>dommages  </td><td><?php echo $perso['res_dom']?></td></tr>
            <tr><td>poisons   </td><td><?php echo $perso['res_poi']?></td></tr>
            <tr><td>maladies  </td><td><?php echo $perso['res_mal']?></td></tr>
            <tr><td>radiations</td><td><?php echo $perso['res_rad']?></td></tr>
            <tr><td>drogues   </td><td><?php echo $perso['res_dro']?></td></tr>
        </table>
    </div>
</div>

<div class="Chunk">
    <div class="Chunk d by2">
        <h2>Mutations</h2>

        <ul>
            <?php foreach ($perso['mutations'] as $mutation): ?>
            <li><?php echo $mutation; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="Chunk d by2">
        <h2>Professions</h2>

        <ul>
            <?php foreach ($perso['professions'] as $profession): ?>
            <li><?php echo $profession['nom']; ?> (<?php echo $profession['annees'] ?> ans)</li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="Chunk">
    <div class="Chunk d by2">
        <h2>Avantages</h2>

        <ul>
            <?php foreach ($perso['avantages'] as $avantage): ?>
            <li><?php echo $avantage; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="Chunk d by2">
        <h2>Désavantages</h2>

        <ul>
            <?php foreach ($perso['desavantages'] as $desavantage): ?>
            <li><?php echo $desavantage; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
