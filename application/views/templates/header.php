<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title><?php echo $title ?> - Polaris</title>
    <?php header('Content-Type: text/html;charset=utf-8'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/chunks.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/styles.css" />
    <script type="text/javascript" charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
    <div class="Wrapper">
        <div class="inner">
            <div id="header">
                <ul>
                    <li>
                        <?php echo anchor('personnage/chercher', 'Recherche');?>
                    </li>

                    <?php if ($this->session->userdata('connecté')): ?>
                        <li>
                            <?php echo anchor('personnage/creation', 'Créer un perso');?>
                        </li>
                        <li class="blow">
                            <?php echo anchor('utilisateur/deconnexion', 'Se déconnecter')?>
                        </li>
                        <li class="blow">
                            <?php echo anchor('utilisateur/voir/'.$this->session->userdata('id'), $this->session->userdata('nom_utilisateur'))?>
                        </li>
                    <?php else: ?>
                        <li class="blow">
                            <?php echo anchor('utilisateur/identification', "Se connecter");?>
                        </li>
                        <li class="blow">
                            <?php echo anchor('utilisateur/inscription', "S'inscrire");?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
