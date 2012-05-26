<h1>S'inscrire</h1>

<?php echo form_open('utilisateur/inscription'); ?>

    <div class="form-field">
        <label for="nom_utilisateur"><?php echo $nom_utilisateur;?></label>
        <input type="text" name="nom_utilisateur" id="nom_utilisateur" value="<?php echo set_value('nom_utilisateur');?>" size="40" />
        <span id="verification_nom"></span>
        <?php echo form_error('nom_utilisateur'); ?>
    </div>

    <div class="form-field last">
        <label for="email"><?php echo $email;?></label>
        <input type="text" name="email" id="email" value="<?php echo set_value('email');?>" size="40" />
        <span id="verification_email"></span>
        <?php echo form_error('email'); ?>
    </div>

    <div class="form-field last">
        <label for="mot_de_passe"><?php echo $mot_de_passe;?></label>
        <input type="password" name="mot_de_passe" value="<?php echo set_value('mot_de_passe'); ?>" size="40" />
        <span id="verification_nom" />
        <?php echo form_error('mot_de_passe'); ?>
    </div>

    <div class="form-field">
        <label for="confirmation"><?php echo $confirmation;?></label>
        <input type="password" name="confirmation" value="<?php echo set_value('confirmation');?>" size="40" />
        <?php echo form_error('confirmation'); ?>
    </div>
    
    <div class="form-field last">
        <label></label>
        <input class="Awesome create" type="submit" value="S'inscrire" />
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#nom_utilisateur").keyup(function(){
        if($("#nom_utilisateur").val().length >= 2 && $("#nom_utilisateur").val().length <= 24) {
	        $.ajax({
	            type: "POST",
	            url: "<?php echo base_url();?>index.php/utilisateur/ajax_nom_valide",
	            data: {nom: $("#nom_utilisateur").val()},
	            success: function(msg){
	                if(msg == "true") {
	                    $("#verification_nom").html( 
							"<img src=\"<?php echo base_url();?>images/accept.png\" />"
						);
	                }
	                else {
	                    $("#verification_nom").html( 
							"<img src=\"<?php echo base_url();?>images/reject.png\" />"
						);
	                }
	            }
	        });
        } else {
            $("#verification_nom").html("");
        }
    });

	$("#email").change(function(){
        if($("#email").val().length >= 3) {
	        $.ajax({
	            type: "POST",
	            url: "<?php echo base_url();?>index.php/utilisateur/ajax_email_valide",
	            data: {email: $("#email").val()},
	            success: function(msg){
	                if(msg == "true") {
	                    $("#verification_email").html( 
							"<img src=\"<?php echo base_url();?>images/accept.png\" />"
						);
	                }
	                else {
	                    $("#verification_email").html( 
							"<img src=\"<?php echo base_url();?>images/reject.png\" />"
						);
	                }
	            }
	        });
        } else {
            $("#verification_email").html("");
        }
    });
});
</script>
