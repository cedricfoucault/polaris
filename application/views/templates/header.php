<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title><?php echo $title ?> - Polaris</title>
	<?php header('Content-Type: text/html;charset=utf-8'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/chunks.css" />
	<style type="text/css">
	h1 {
	    text-align: center;
	}
	#header_image {
		height: 180px;
		margin-left: 0px;
		margin-right: 0px;
		margin-top: 0px;
		margin-bottom: 0px;
		padding: 0px 0px;
		background-image: url(<?php echo base_url();?>images/polaris_deep.jpg);
		background-size: 100%;
	}
	#logo {
	    width: 263px;
	    height: 70px;
	    background-image: url(<?php echo base_url();?>images/logo_polaris_v3.png);
	}
/*  #log_utilisateur {*/
/*      display: inline;*/
/*      margin-right: 0;*/
/*      margin-left: auto;*/
/*  }*/
/*  #main_content {*/
/*      margin-left: 150px;*/
/*      margin-top: 5px;*/
/*      width: 750px;*/
/*  }*/
    #div_pts_creation {
      position: fixed;
      right: 25%;
      top: 30%;
    }
	em {
	    font-weight: bold;
	}
	body {
		background-color: rgb(006, 029, 051);
/*		color: rgb(231, 231, 231);*/
        font-family: helvetica;
		color: rgb(132, 135, 175);
	}
	input, textarea {
		background-color: rgb(212, 224, 235);
		color: black;
	}
/*  label {*/
/*        display: inline-block;*/
/*      width: 100px;*/
/*  }*/
/*  label.top {*/
/*      width: 60px;*/
/*  }*/
/*  label.description {*/
/*      width: 100px;*/
/*  }*/
/*  label.attributs {*/
/*      width: 100px;*/
/*  }*/
/*  label.developpement {*/
/*      width: 155px;*/
/*  }*/
    .notop {
        margin-top: 0;
    }
    .nobottom {
        margin-bottom: 0;
    }
    .nobottom + .Chunk {
        margin-top: 0;
    }
	.counter {
	    background-color: rgb(250, 250, 150);
	    color: rgb(255, 70, 0);
	    padding: 0px 5px;
	    font-size: 12pt;
	}
	.clickable {
		cursor: pointer;
		padding: 0px 5px;
		color: rgb(102, 102, 102);
		text-decoration: none;
	}
	.clickable:hover {
		color: rgb(231, 231, 231);
		background-color: rgb(102, 102, 102);
	}
	.error {
		color: red;
		font-style: bold;
		font-size: 12px;
	}
	select {
		width: 200px;
	}
	
	.Wrapper {
	    background-color: rgba(255, 255, 255, 0.05);
	    max-width: 710px;
	    margin-top: 0;
	    margin-bottom: 0;
	    padding: 20px;
	}
	
	h3 {
	    border-top: 1px dotted rgba(255, 255, 255, 0.2);
	    padding-top: .5em;
	}
	</style>
	<script type="text/javascript" charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
	</script>
</head>
<body>
    <!-- <div id="header"> -->
        <!-- <div id="header_image"><div id="logo"></div></div> -->
        <!-- <div id="log_utilisateur"> -->
        <!-- <?php if ($this->session->userdata('connecté')): ?> -->
            <!-- <?php echo "Bonjour ".$this->session->userdata('nom_utilisateur')."!";?> -->
            <!-- <span><?php echo anchor('utilisateur/identification/deconnexion', 'Se déconnecter')?></span> -->
            <!-- <span><?php echo anchor('personnage/creation', 'Créer un perso');?></span> -->
        <!-- <?php else: ?> -->
            <!-- <span><?php echo anchor('utilisateur/identification', "Se connecter");?></span> -->
            <!-- <span><?php echo anchor('utilisateur/inscription', "S'inscrire");?></span> -->
        <!-- <?php endif; ?> -->
        <!-- </div> -->
    <!-- </div> -->
	<div class="Wrapper">
	    <div class="inner">
	