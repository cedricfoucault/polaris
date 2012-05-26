<?php echo form_open('utilisateur/identification'); ?>
    <h1>Identifiez-vous</h1>

    <div class="Chunk">
        <div class="form-field">
    	    <label for='identifiant'>Entrez votre nom ou email</label>
    	    <input type="text" name="identifiant" id="identifiant" value="<?php echo set_value('nom_utilisateur');?>" size="40" />
    	    <span><?php echo form_error('identifiant'); ?></span>
    	</div>

    	<div class="form-field">
    	    <label for='mot_de_passe'>Mot de passe</label>
    	    <input type="password" name="mot_de_passe" id="mot_de_passe" value="<?php echo set_value('mot_de_passe');?>" size="40" />
    	    <br/><span class="error"><?php if (!empty($error)) { echo $error; } ?></span>
    	</div>
    	
    	<div class="form-field last">
    	    <label></label>
            <input class="Awesome create" type="submit" value="Se connecter" />
            ou
            <?php echo anchor('utilisateur/inscription', 's\'inscrire'); ?>
    	</div>
    </div>
</form>
