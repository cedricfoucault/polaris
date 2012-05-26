<div class="Chunk">
    <h1>Création de personnage</h1>
</div>

<?php if ($this->session->userdata('connecté')): ?>
    <div class="Chunk">
        <?php echo validation_errors(); ?>

        <?php echo form_open('personnage/creation'); ?>
            <div class="Chunk">
                <div class="Chunk d by2">
                    <div class="form-field">
                        <label for="nom">Nom</label>
                        <input type="input" name="nom" value="<?php echo set_value('nom'); ?>" />
                    </div>

                    <div class="form-field">
                        <label for="sexe">Sexe</label>
                        <input type="radio" name="sexe" value="Homme" <?php echo set_radio('sexe', 'homme'); ?>>Homme</input>
                        <input type="radio" name="sexe" value="Femme" <?php echo set_radio('sexe', 'femme'); ?>>Femme</input>
                    </div>

                    <div class="form-field">
                        <label for="age">Age</label>
                        <span name="age" id="age" class="counter">16</span>
                        <span>ans</span>
                    </div>

                    <div id="div_pts_creation" class="form-field last">
                        <span name="pts_creation" class="counter" id="pts_creation">20</span>
                        <span>Points de création restants</span>
                    </div>
                </div>
                <div class="Chunk d by2">&nbsp;</div>
            </div>

            <div class="Chunk">
                <h2><span for="description_physique" class="clickable expand">[–]</span> Description physique</h2>
            </div>

            <div id="zone_description_physique" class="Chunk">
                <div class="Chunk d by2">
                    <div class="form-field">
                        <label for="taille" class="description">Taille (cm)</label>
                        <input type="input" name="taille" maxlength="3" size="3" value="<?php echo set_value('taille'); ?>" />
                    </div>

                    <div class="form-field">
                        <label for="peau" class="description">Peau</label>
                        <input type="input" name="peau" size="15" maxlength="32" value="<?php echo set_value('peau'); ?>" />
                    </div>

                    <div class="form-field">
                        <label for="corpulence" class="description">Corpulence</label>
                        <input type="input" name="corpulence" size="15" value="<?php echo set_value('corpulence'); ?>" />
                    </div>

                    <div class="form-field">
                        <label for="cheveux" class="description">Cheveux</label>
                        <input type="input" name="cheveux" size="15" maxlength="32" value="<?php echo set_value('cheveux'); ?>" />
                    </div>

                    <div class="form-field">
                        <label for="yeux" class="description">Yeux</label>
                        <input type="input" name="yeux" size="15" maxlength="32" value="<?php echo set_value('yeux'); ?>" />
                    </div>

                    <div class="form-field">
                        <label for="signes" class="description">Signes Particuliers</label>
                        <textarea name="signes" rows="1" maxlength="256" value="<?php echo set_value('signes'); ?>"></textarea>
                    </div>
                </div>

                <div class="Chunk d by2">&nbsp;</div>
            </div>

            <div class="Chunk">
                <h2><span for="attributs" class="clickable expand">[–]</span> Attributs</h2>
            </div>

            <div id="zone_attributs" class="Chunk">
                <div class="Chunk d by2">
                    <div class="Chunk">
                        <!-- <input type="number" value="38" min="0" max="99"
                        readonly="readonly" name="pts_attributs" id="pts_attributs" /> -->
                        <span name="pts_attributs" id="pts_attributs" class="counter">38</span>
                        <span>Points d'attributs restants</span>
                    </div>

                    <div class="Chunk">
                        <!-- <fieldset> -->
                        <!-- <legend>Attributs</legend> -->
                        <?php
                            $attributs = array(
                                "for" => "Force",
                                "con" => "Constitution",
                                "coo" => "Coordination",
                                "ada" => "Adaptation",
                                "per" => "Perception",
                                "int" => "Intelligence",
                                "vol" => "Volonté",
                                "pre" => "Présence",
                            );
                        ?>
                        <?php foreach ($attributs as $label => $attribut): ?>
                            <div class="form-field">
                                <?php echo form_label($attribut, $label); ?>
                                <input type="number" min="7" max="20" name="<?php echo $label;?>" id="<?php echo $label;?>" value="<?php echo set_value($label, '7'); ?>" />
                            </div>
                        <?php endforeach ?>
                        <!-- </fieldset> -->
                    </div>

                    <div class="Chunk">
                        <?php echo anchor('personnage/cout_attributs', 'Voir les coûts en points d\'attributs');?>
                    </div>

                    <div class="Chunk">
                        <div class="Chunk d by3">
                            <input type="number" value="0" min="0" max="99" name="pc_depense_attributs" id="pc_depense_attributs" />
                        </div>

                        <div class="Chunk d by3 x2">
                            Points de création convertis en points d'attributs
                        </div>
                    </div>
                </div>

                <div class="Chunk d by2">&nbsp;</div>
            </div>

            <div class="Chunk">
                <h2><span for="ajout_mutations" class="clickable expand">[–]</span> Mutations</h2>
            </div>

            <div id="zone_ajout_mutations" class="Chunk">
                <div class="Chunk d by2">
                    <div>
                        <label for="mutation_alea">Mutation(s) Al&eacuteatoire(s)</label>
                        <input type="checkbox" name="mutation_alea" id="mutation_alea" value="true" <?php echo set_checkbox('mutation_alea','true'); ?> />
                    </div>

                    <div id="zone_mutations"></div>

                    <div>
                        <button type="button" id="ajouter_mutation">Ajouter une mutation +</button>
                    </div>
                </div>

                <div class="Chunk d by2 x2">&nbsp;</div>
            </div>

            <div class="Chunk">
                <h2><span for="avantages_desavantages" class="clickable expand">[–]</span> Avantages et désavantages</h2>
            </div>

            <div id="zone_avantages_desavantages" class="Chunk">
                <div class="Chunk">
                    <div class="Chunk d by2">
                        <h3 class="notop">Avantages</h3>

                        <div id="zone_avantages"></div>

                        <div>
                            <button type="button" id="ajouter_avantage">Ajouter un avantage +</button>
                        </div>
                    </div>

                    <div class="Chunk d by2">
                        <h3>Désavantages</h3>

                        <div id="zone_desavantages"></div>

                        <div>
                            <button type="button" id="ajouter_desavantage">Ajouter un désavantage +</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Chunk">
                <h2><span for="developpement" class="clickable expand">[–]</span> Développement</h2>
            </div>

            <div id="zone_developpement" class="Chunk">
                <div class="Chunk">
                    <div class="form-field">
                        <label for="origine_geographique">Origine Géographique</label>
                        <?php // $origines_geographiques['none'] = '– Choix origine géographique -';?>
                        <?php echo form_dropdown('origine_geographique', $origines_geographiques, 'none');?>
                    </div>

                    <div class="form-field">
                        <label for="origine_sociale">Origine Sociale</label>
                        <?php // $origines_sociales['none'] = '– Choix origine sociale -';?>
                        <?php echo form_dropdown('origine_sociale', $origines_sociales, 'none');?>
                    </div>

                    <div class="form-field">
                        <label for="formation">Formation de base</label>
                        <?php // $formations['none'] = '– Choix formation -';?>
                        <?php echo form_dropdown('formation', $formations, 'none');?>
                    </div>

                    <div class="form-field">
                        <label for="etudes_superieures">Études supérieures</label>
                        <?php $etudes_superieures['none'] = '– Pas d\'études -';?>
                        <?php echo form_dropdown('etudes_superieures', $etudes_superieures, 'none', 'id="etudes_superieures"');?>
                    </div>

                    <div class="Chunk">
                        <h3>Professions</h3>

                        <div id="zone_professions"></div>

                        <div>
                            <button type="button" id="ajouter_profession">Ajouter une profession +</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Chunk">
                <input class="Awesome create" type="submit" name="submit" value="Créer Personnage" /> 
            </div>
        </form>
    </div>

    <?php $mutations['none'] = '– Choix mutation –'?>
    <?php $avantages['none'] = '– Choix avantage –'?>
    <?php $desavantages['none'] = '– Choix désavantage –'?>
    <?php $professions['none'] = '– Choix profession –'?>

    <div id="mutations_dropdown" style="display: none;">
        <?php echo form_dropdown('mutations[]', $mutations, 'none');?>
    </div>

    <div id="avantages_dropdown" style="display: none;">
        <?php echo form_dropdown('avantages[]', $avantages, 'none');?>
    </div>

    <div id="desavantages_dropdown" style="display: none;">
        <?php echo form_dropdown('desavantages[]', $desavantages, 'none');?>
    </div>

    <div id="professions_dropdown" style="display : none;">
        <?php echo form_dropdown('professions[]', $professions, 'none');?>
    </div>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            var pts_creation = 20;
            var pc_depense_attributs = 0;
            var pts_attributs = 38;
            var age = 16;
            var attributs = {
                <?php foreach ($attributs as $label => $attribut): ?>
                "<?php echo $label?>": $("#<?php echo $label; ?>").val(),
                <?php endforeach;?>
            };
            var hidden = {
                "description_physique": false,
                "attributs": false,
                "ajout_mutations": false,
                "avantages_desavantages": false,
                "ajout_avantages": false,
                "ajout_desavantages": false,
                "developpement": false,
                "ajout_professions": false
            }

            <?php foreach ($attributs as $label => $attribut): ?>
            $("#<?php echo $label;?>").click(function (e) {
                var oldValue = attributs["<?php echo $label?>"];
                attributs["<?php echo $label?>"] = $("#<?php echo $label;?>").val();
                if (update_pts_attributs() == -1) {
                    // set back the old value
                    $("#<?php echo $label;?>").val(oldValue);
                    attributs["<?php echo $label?>"] = oldValue;
                }
            });
            $("#<?php echo $label;?>").change(function (e) {
                var oldValue = attributs["<?php echo $label?>"];
                attributs["<?php echo $label?>"] = $("#<?php echo $label;?>").val();
                if (update_pts_attributs() == -1) {
                    // set back the old value
                    $("#<?php echo $label;?>").val(oldValue);
                    attributs["<?php echo $label?>"] = oldValue;
                }
            });
            <?php endforeach ?>

            function update_pts_attributs() {
                var points = 38 + 2 * pc_depense_attributs;
                for (var index in attributs) {
                    if (attributs[index] > 7) {
                        <?php foreach ($cout_attributs as $row): ?>
                        if (attributs[index] == <?php echo $row->niveau; ?>) {
                            points -= <?php echo $row->points; ?>;
                            continue;
                        }
                        <?php endforeach ?>
                    }
                }
                if (points >= 0) {
                    // set the new value
                    pts_attributs = points;
                    $("#pts_attributs").html("" + pts_attributs);
                    return 1;
                } else {
                    // don't change
                    return (-1);
                };
            }

            $("#pc_depense_attributs").click(function (e) {
                var oldValue = pc_depense_attributs;
                pc_depense_attributs = $("#pc_depense_attributs").val();

                if (update_pts_creation() == -1) {
                    $("#pc_depense_attributs").val(oldValue);
                    pc_depense_attributs = oldValue;
                } else {
                    update_pts_attributs();
                };
            });
            $("#pc_depense_attributs").change(function (e) {
                var oldValue = pc_depense_attributs;
                pc_depense_attributs = $("#pc_depense_attributs").val();

                if (update_pts_creation() == -1) {
                    $("#pc_depense_attributs").val(oldValue);
                    pc_depense_attributs = oldValue;
                } else {
                    update_pts_attributs();
                };
            });
            
            $("#mutation_alea").change(function (e) {
                if ($("#mutation_alea:checked").length > 0) {
                    $("#ajouter_mutation").attr('disabled', 'disabled');
                } else {
                    $("#ajouter_mutation").removeAttr('disabled');
                }
            })

            var id_counter = {
                "mutation" : 1,
                "avantage" : 1,
                "desavantage" : 1,
                "profession" : 1
            };
            var template = {};
            template["mutation"] = function(id) {
                return '<div style="display: none;" id="mutation' + id + '">' +
                '<span>' + $("#mutations_dropdown").html() + '</span> \
                <span id="supprimer_mutation' + id + '" class="Awesome tiny destroy clickable">&times</span> \
                </div>';
            };
            template["avantage"] = function(id) {
                return '<div style="display: none;" id="avantage' + id + '">' +
                '<span>' + $("#avantages_dropdown").html() + '</span> \
                <span id="supprimer_avantage' + id + '" class="Awesome tiny destroy clickable">&times</span> \
                </div>';
            };
            template["desavantage"] = function(id) {
                return '<div style="display: none;" id="desavantage' + id + '">' +
                '<span>' + $("#desavantages_dropdown").html() + '</span> \
                <span id="supprimer_desavantage' + id + '" class="Awesome tiny destroy clickable">&times</span> \
                </div>';
            };
            template["profession"] = function(id) {
                return '<div style="display: none;" id="profession' + id + '">' +
                '<span>' + $("#professions_dropdown").html() + '</span>' +
                '<span><input type="number" name="professions_annees[]" min="0" max="99" value="0"/> \
                an(s)</span> \
                <span id="supprimer_profession' + id + '" class="Awesome tiny destroy clickable">&times</span> \
                </div>';
            };
            var mutations = {};
            $("#ajouter_mutation").click(function(e) {
                var id_supprimer_mutation = "supprimer_mutation" + id_counter["mutation"];
                var id_mutation = "mutation" + id_counter["mutation"];
                mutations[id_mutation] = "none";
                $("#zone_mutations").append(template["mutation"](id_counter["mutation"]));
                $("#" + id_mutation).fadeIn(200, 'swing');
                $("#" + id_mutation + " select").change(function(ec) {
                    var oldValue = mutations[id_mutation];
                    mutations[id_mutation] = $(this).val();
                    if (update_pts_creation() == -1) {
                        $(this).val(oldValue);
                        mutations[id_mutation] = oldValue;
                    };
                });
                $("#" + id_supprimer_mutation).click(function(es) {
                    delete mutations[id_mutation];
                    $("#" + id_mutation).fadeOut(100, 'swing', function() {
                        $(this).remove();
                        update_pts_creation();
                    });
                });
                id_counter["mutation"]++;
            });

            var avantages = {};
            $("#ajouter_avantage").click(function(e) {
                var id_supprimer_avantage = "supprimer_avantage" + id_counter["avantage"];
                var id_avantage = "avantage" + id_counter["avantage"];
                avantages[id_avantage] = "none";
                $("#zone_avantages").append(template["avantage"](id_counter["avantage"]));
                $("#" + id_avantage).fadeIn(200, 'swing');
                $("#" + id_avantage + " select").change(function(ec) {
                    var oldValue = avantages[id_avantage];
                    avantages[id_avantage] = $(this).val();
                    if (update_pts_creation() == -1) {
                        $(this).val(oldValue);
                        avantages[id_avantage] = oldValue;
                    };
                });
                $("#" + id_supprimer_avantage).click(function(e2) {
                    delete avantages[id_avantage];
                    $("#" + id_avantage).fadeOut(100, 'swing', function() {
                        $(this).remove();
                        update_pts_creation();
                    });
                });
                id_counter["avantage"]++;
            });

            var desavantages = {};
            $("#ajouter_desavantage").click(function(e) {
                var id_supprimer_desavantage = "supprimer_desavantage" + id_counter["desavantage"];
                var id_desavantage = "desavantage" + id_counter["desavantage"];
                desavantages[id_desavantage] = "none";
                $("#zone_desavantages").append(template["desavantage"](id_counter["desavantage"]));
                $("#" + id_desavantage).fadeIn(200, 'swing');
                $("#" + id_desavantage + " select").change(function(ec) {
                    var oldValue = desavantages[id_desavantage];
                    desavantages[id_desavantage] = $(this).val();
                    if (update_pts_creation() == -1) {
                        $(this).val(oldValue);
                        desavantages[id_desavantage] = oldValue;
                    };
                });
                $("#" + id_supprimer_desavantage).click(function(e2) {
                    delete desavantages[id_desavantage];
                    $("#" + id_desavantage).fadeOut(100, 'swing', function() {
                        $(this).remove();
                        update_pts_creation();
                    });
                });
                id_counter["desavantage"]++;
            });
            
            var etudes_superieures = 'none';
            $("#etudes_superieures").change(function(e) {
                var oldValue = etudes_superieures;
                etudes_superieures = $(this).val();
                if (update_pts_creation() == -1) {
                    $(this).val(oldValue);
                };
            });

            var professions = {};
            $("#ajouter_profession").click(function(e) {
                var id_supprimer_profession = "supprimer_profession" + id_counter["profession"];
                var id_profession = "profession" + id_counter["profession"];
                professions[id_profession] = {
                    "id" : "none",
                    "annees" : 0
                };
                $("#zone_professions").append(template["profession"](id_counter["profession"]));
                $("#" + id_profession).fadeIn(200, 'swing');
                $("#" + id_profession).change(function(ec) {
                    professions[id_profession]["id"] = $("#" + id_profession + " select").val();
                    var oldValue = professions[id_profession]["annees"];
                    professions[id_profession]["annees"] = parseInt($("#" + id_profession + " input").val());
                    if (update_pts_creation() == -1) {
                        // if update could not be performed, set back old value
                        $("#" + id_profession + " input").val(oldValue);
                        professions[id_profession]["annees"] = oldValue;

                    };
                    update_age();
                });
                $("#" + id_profession + " input").click(function(ec) {
                    var oldValue = professions[id_profession]["annees"];
                    professions[id_profession]["annees"] = parseInt($("#" + id_profession + " input").val());
                    if (update_pts_creation() == -1) {
                        // if update could not be performed, set back old value
                        $("#" + id_profession + " input").val("" + oldValue);
                        professions[id_profession]["annees"] = oldValue;
                    };
                    update_age();
                });
                $("#" + id_supprimer_profession).click(function(e2) {
                    delete professions[id_profession];
                    $("#" + id_profession).fadeOut(100, 'swing', function() {
                        $(this).remove();
                        update_pts_creation();
                        update_age();
                    });
                });
                id_counter["profession"]++;
            });

            function update_pts_creation() {
                pts_creation = 20;
                pts_creation -= pc_depense_attributs;
                for (var index in mutations) {
                    <?php foreach ($cout_mutations as $cout_mutation): ?>
                    if (mutations[index] === "<?php echo $cout_mutation->id; ?>") {
                        pts_creation -= <?php echo $cout_mutation->cout; ?>;
                        continue;
                    }
                    <?php endforeach ?>
                }
                for (var index in avantages) {
                    <?php foreach ($cout_avantages as $cout_avantage): ?>
                    if (avantages[index] === "<?php echo $cout_avantage->id; ?>") {
                        pts_creation -= <?php echo $cout_avantage->cout; ?>;
                        continue;
                    }
                    <?php endforeach ?>
                }
                for (var index in desavantages) {
                    <?php foreach ($cout_desavantages as $cout_desavantage): ?>
                    if (desavantages[index] === "<?php echo $cout_desavantage->id; ?>") {
                        pts_creation -= <?php echo $cout_desavantage->cout; ?>;
                        continue;
                    }
                    <?php endforeach ?>
                }
                if (!(etudes_superieures === 'none')) {
                    pts_creation -= 2;
                }
                for (var index in professions) {
                    pts_creation -= professions[index]["annees"];
                }

                if (pts_creation >= 0) {
                    // set the new value
                    // $("#pts_creation").val("" + pts_creation);
                    $("#pts_creation").html("" + pts_creation);
                    return 1;
                } else {
                    return -1;
                }
            };
            
            function update_age() {
                age = 16;
                for (var index in professions) {
                    age += professions[index]["annees"];
                }
                
                $("#age").html("" + age);
                return 0;
            }

            $(".expand").click(function(e) {
                var zone = $(this).attr("for");
                if (hidden[zone]) {
                    hidden[zone] = false;
                    $("#" + "zone_" + zone).css({"display": "block"});
                    $(this).html("[–]");
                } else {
                    hidden[zone] = true;
                    $("#" + "zone_" + zone).css({"display": "none"});
                    $(this).html("[+]");
                }
            });
            
            update_pts_attributs();
            update_pts_creation();
            update_age;
        });
    </script>

<?php else: ?>
    <p>Il faut être inscrit pour créer un personnage.</p>
<?php endif; ?>
