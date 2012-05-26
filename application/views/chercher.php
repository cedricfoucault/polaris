<h2>Chercher un ou des personnages</h2>

<div class="Chunk">
<?php echo form_open('personnage/chercher'); ?>
    <div class="Chunk">
        <div class="Chunk d by3 x2">
            <div class="Chunk d by3">
                <label for="nom_utilisateur">Par nom d'utilisateur</label>  
            </div>
            <div class="Chunk d by3">
                <input type="text" name="nom_utilisateur" /> 
            </div>
            <div class="Chunk d by3">
                <input type="submit" name="submit_utilisateur" value="chercher" />
            </div>
        </div>
        <div class="Chunk d by3">&nbsp</div>
    </div>
</form>
<div class="Chunk">

<div class="Chunk">
<?php echo form_open('personnage/chercher'); ?>
    <div class="Chunk">
        <div class="Chunk d by3 x2">
            <div class="Chunk d by3">
                <label for="nom_perso">Par nom de perso</label>  
            </div>
            <div class="Chunk d by3">
                <input type="text" name="nom_perso" /> 
            </div>
            <div class="Chunk d by3">
                <input type="submit" name="submit_utilisateur" value="chercher" />
            </div>
        </div>
        <div class="Chunk d by3">&nbsp</div>
    </div>
</form>
<div class="Chunk">
