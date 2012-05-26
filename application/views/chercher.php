<h1>Chercher un ou des personnages</h1>


<div class="Chunk">
    <?php echo form_open('personnage/chercher'); ?>
        <div class="form-field">
            <label for="nom_utilisateur">Par nom d'utilisateur</label>
            <input type="text" name="nom_utilisateur" />
            <input class="Awesome create" type="submit" name="submit_utilisateur" value="chercher" />
        </div>
    </form>
</div>

<div class="Chunk">
    <?php echo form_open('personnage/chercher'); ?>
        <div class="form-field">
            <label for="nom_perso">Par nom de perso</label>
            <input type="text" name="nom_perso" />
            <input class="Awesome create" type="submit" name="submit_utilisateur" value="chercher" />
        </div>
    </form>
</div>

<div class="Chunk">
    <?php echo form_open('personnage/chercher'); ?>
        <div class="form-field">
            <label for="nb">Voir les derniers persos crées</label>
            <input type="text" name="nb" value="10" />
            <input class="Awesome create" type="submit" name="submit_utilisateur" value="chercher" />
        </div>
    </form>
</div>
