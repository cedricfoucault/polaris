<?php echo form_open('utilisateur/identification'); ?>
<h2>Identifiez-vous</h2>
<div>
	<?php echo form_error('identifiant'); ?>
    <div>
	<label for='identifiant'>Entrez votre nom ou email</label>
	<input type="text" name="identifiant" id="identifiant" value="<?php echo set_value('nom_utilisateur');?>" size="40" />
	</div>
	<span class="error"><?php if (!empty($error)) { echo $error; } ?></span>
	<div>
	<label for='mot_de_passe'>Mot de passe</label>
	<input type="password" name="mot_de_passe" id="mot_de_passe" value="<?php echo set_value('mot_de_passe');?>" size="40" />
	</div>
	<div class="Chunk">
	    <div class="Chunk d by5"><input type="submit" value="Se connecter" /></div>
	    <div class="Chunk d by5"><?php echo anchor('utilisateur/inscription', 'S\'inscrire'); ?></div>
	    <div class="Chunk d by5 x3">&nbsp</div>
	</div>
</div>
