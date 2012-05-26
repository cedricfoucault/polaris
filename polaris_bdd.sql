-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2012 at 03:12 PM
-- Server version: 5.0.27
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cfoucaul`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attribut`
--

CREATE TABLE IF NOT EXISTS `Attribut` (
  `id_perso` int(11) NOT NULL,
  `for` int(11) NOT NULL COMMENT 'force',
  `con` int(11) NOT NULL COMMENT 'constitution',
  `coo` int(11) NOT NULL COMMENT 'coordination',
  `ada` int(11) NOT NULL COMMENT 'adaptation',
  `per` int(11) NOT NULL COMMENT 'perception',
  `int` int(11) NOT NULL COMMENT 'intelligence',
  `vol` int(11) NOT NULL COMMENT 'volonté',
  `pre` int(11) NOT NULL COMMENT 'présence',
  `chance` int(11) NOT NULL COMMENT 'chance',
  `rea` int(11) NOT NULL COMMENT 'réaction',
  `dom` int(11) NOT NULL COMMENT 'modificateur de dommages càc',
  `choc` int(11) NOT NULL COMMENT 'résistance aux chocs',
  `res_dom` int(11) NOT NULL COMMENT 'résistance aux dommages',
  `res_poi` int(11) NOT NULL COMMENT 'résistance au poison',
  `res_mal` int(11) NOT NULL COMMENT 'résistance aux maladies',
  `res_rad` int(11) NOT NULL COMMENT 'résistance aux radiations',
  `res_dro` int(11) NOT NULL COMMENT 'résistance aux drogues',
  `souffle` int(11) NOT NULL COMMENT 'souffle',
  PRIMARY KEY  (`id_perso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Attribut`
--


-- --------------------------------------------------------

--
-- Table structure for table `Avantages`
--

CREATE TABLE IF NOT EXISTS `Avantages` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  `cout` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Avantages`
--

INSERT INTO `Avantages` (`id`, `nom`, `cout`) VALUES
(1, 'Allié ou Fournisseur supplémentaire', 2),
(2, 'Ambidextre', 1),
(3, 'Argent supplémentaire', 1),
(4, 'Bilingue', 1),
(5, 'Bonne mémoire', 1),
(6, 'Bons réflexes', 2),
(7, 'Carte au trésor', 1),
(8, 'Concession', 1),
(9, 'Contacts', 1),
(10, 'Dur à cuire', 2),
(11, 'Fausse identité', 2),
(12, 'Formation', 1),
(13, 'Homo delphinus', 1),
(14, 'Increvable', 1),
(15, 'Nerfs d''acier', 1),
(16, 'Nyctalope', 2),
(17, 'Parts', 1),
(18, 'Rente', 3),
(19, 'Résistance à la douleur', 1),
(20, 'Résistance naturelle augmentée', 1),
(21, 'Sens développé', 1),
(22, 'Titre', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Avantages_Perso`
--

CREATE TABLE IF NOT EXISTS `Avantages_Perso` (
  `id_perso` int(11) NOT NULL,
  `id_avantage` int(11) NOT NULL,
  PRIMARY KEY  (`id_perso`,`id_avantage`),
  KEY `id_avantage` (`id_avantage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Avantages_Perso`
--


-- --------------------------------------------------------

--
-- Table structure for table `Cout_attributs`
--

CREATE TABLE IF NOT EXISTS `Cout_attributs` (
  `niveau` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY  (`niveau`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cout_attributs`
--

INSERT INTO `Cout_attributs` (`niveau`, `points`) VALUES
(8, 1),
(9, 2),
(10, 3),
(11, 4),
(12, 5),
(13, 6),
(14, 7),
(15, 8),
(16, 10),
(17, 12),
(18, 14),
(19, 17),
(20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `Desavantages`
--

CREATE TABLE IF NOT EXISTS `Desavantages` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  `cout` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Desavantages`
--

INSERT INTO `Desavantages` (`id`, `nom`, `cout`) VALUES
(1, 'Allergie légère', -1),
(2, 'Allergie sévère', -3),
(3, 'Allergie fatale', -6),
(4, 'Déséquilibre mental – Cleptomanie', -2),
(5, 'Déséquilibre mental – Mégalomanie', -2),
(6, 'Déséquilibre mental – Paranoïa', -2),
(7, 'Déséquilibre mental – Hallucination', -2),
(8, 'Déséquilibre mental – Pulsion psychopathe', -3),
(9, 'Déséquilibre mental – Double personalité', -2),
(10, 'Ennemi héréditaire', -3),
(11, 'Faiblesse naturelle', -1),
(12, 'Froussard', -1),
(13, 'Infirmité', -5),
(14, 'Lent à réagir', -2),
(15, 'Opposants supplémentaires', -1),
(16, 'Petite nature', -1),
(17, 'Peu endurant', -1),
(18, 'Phobie', -1),
(19, 'Recherché par une petite communauté', -1),
(20, 'Recherché par une nation ou faction majeure', -3),
(21, 'Secret', -2),
(22, 'Sens diminué', -1);

-- --------------------------------------------------------

--
-- Table structure for table `Desavantages_Perso`
--

CREATE TABLE IF NOT EXISTS `Desavantages_Perso` (
  `id_perso` int(11) NOT NULL,
  `id_desavantage` int(11) NOT NULL,
  PRIMARY KEY  (`id_perso`,`id_desavantage`),
  KEY `id_desavantage` (`id_desavantage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Desavantages_Perso`
--


-- --------------------------------------------------------

--
-- Table structure for table `Description`
--

CREATE TABLE IF NOT EXISTS `Description` (
  `id_perso` int(11) NOT NULL,
  `sexe` varchar(32) NOT NULL,
  `age` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `peau` varchar(64) NOT NULL,
  `corpulence` varchar(64) NOT NULL,
  `cheveux` varchar(64) NOT NULL,
  `yeux` varchar(64) NOT NULL,
  `signes` varchar(256) NOT NULL,
  PRIMARY KEY  (`id_perso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Description`
--


-- --------------------------------------------------------

--
-- Table structure for table `Developpement`
--

CREATE TABLE IF NOT EXISTS `Developpement` (
  `id_perso` int(11) NOT NULL,
  `id_origine_geo` int(11) NOT NULL,
  `id_origine_soc` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL,
  `id_etudes_sup` int(11) default NULL,
  PRIMARY KEY  (`id_perso`),
  KEY `id_origine_geo` (`id_origine_geo`,`id_origine_soc`,`id_formation`,`id_etudes_sup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Developpement`
--


-- --------------------------------------------------------

--
-- Table structure for table `Etudes_Superieures`
--

CREATE TABLE IF NOT EXISTS `Etudes_Superieures` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Etudes_Superieures`
--

INSERT INTO `Etudes_Superieures` (`id`, `nom`) VALUES
(1, 'Commerce et gestion'),
(2, 'Droit'),
(3, 'École d''ingénieur'),
(4, 'École militaire'),
(5, 'École navale'),
(6, 'Médecine'),
(7, 'Sciences fondamentales'),
(8, 'Sciences humaines'),
(9, 'Sciences politiques');

-- --------------------------------------------------------

--
-- Table structure for table `Formations`
--

CREATE TABLE IF NOT EXISTS `Formations` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Formations`
--

INSERT INTO `Formations` (`id`, `nom`) VALUES
(1, 'Délinquance et criminalité'),
(2, 'Apprentissage technique – Aquaculture'),
(3, 'Apprentissage technique – Mines'),
(4, 'Apprentissage technique – Usines et ateliers'),
(5, 'Éducation scolaire'),
(6, 'Autodidacte');

-- --------------------------------------------------------

--
-- Table structure for table `Mutation`
--

CREATE TABLE IF NOT EXISTS `Mutation` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  `cout` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `Mutation`
--

INSERT INTO `Mutation` (`id`, `nom`, `cout`, `min`, `max`) VALUES
(13, 'Adaptation extérieure', 3, 1, 180),
(14, 'Amphibie', 2, 181, 300),
(15, 'Androgyne', 0, 301, 390),
(16, 'Asexué', 0, 391, 480),
(17, 'Autofécondation', 0, 481, 570),
(18, 'Caractère félin', 2, 571, 600),
(19, 'Caractère canin', 2, 601, 630),
(20, 'Caractère reptilien', 2, 631, 660),
(21, 'Caractère simiesque', 2, 661, 690),
(22, 'Contact corrosif', 3, 691, 750),
(23, 'Contagion', 3, 751, 810),
(24, 'Corne', 1, 811, 900),
(25, 'Crocs', 1, 901, 1050),
(26, 'Difformités légères', -1, 1051, 1200),
(27, 'Difformités importantes', -3, 1201, 1290),
(28, 'Empathie', 4, 1291, 1380),
(29, 'Excroissance osseuce rétractable', 3, 1381, 1470),
(30, 'Griffes', 2, 1471, 1560),
(31, 'Instabilité moléculaire', 4, 1561, 1590),
(32, 'Métamorphe', 4, 1591, 1680),
(33, 'Papilles gustatives atrophiées', 0, 1681, 1692),
(34, 'Nez atrophié', 1, 1693, 1704),
(35, 'Sens du toucher atrophié', 1, 1705, 1716),
(36, 'Oreille manquante', 2, 1717, 1728),
(37, 'Oeil manquant', 3, 1729, 1740),
(38, 'Goût amélioré', 0, 1741, 1752),
(39, 'Odorat amélioré', 1, 1753, 1764),
(40, 'Toucher amélioré', 1, 1765, 1776),
(41, 'Oreille supplémentaire', 2, 1777, 1788),
(42, 'Oeil supplémentaire', 2, 1789, 1800),
(43, 'Parasite(s)', 1, 1801, 1830),
(44, 'Peau renforcée', 2, 1831, 1980),
(45, 'Purulence', -2, 1981, 2010),
(46, 'Queue', 1, 2011, 2100),
(47, 'Radiation', 3, 2101, 2130),
(48, 'Régénération', 2, 2131, 2250),
(49, 'Résistance au feu', 1, 2251, 2275),
(50, 'Résistance au froid', 1, 2276, 2300),
(51, 'Résisrtance aux drogues', 1, 2301, 2325),
(52, 'Résistance aux maladies', 1, 2326, 2350),
(53, 'Résistance aux poisons', 1, 2351, 2375),
(54, 'Résistance aux radiations', 1, 2376, 2400),
(55, 'Sixième sens', 1, 2401, 2550),
(56, 'Sonar', 3, 2551, 2640),
(57, 'Squelette renforcé', 3, 2641, 2670),
(58, 'Symbiote(s)', 3, 2671, 2760),
(59, 'Tentacule rétractable', 1, 2761, 2850),
(60, 'Vision nocturne', 3, 2851, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `Mutations_Perso`
--

CREATE TABLE IF NOT EXISTS `Mutations_Perso` (
  `id_perso` int(11) NOT NULL,
  `id_mutation` int(11) NOT NULL,
  PRIMARY KEY  (`id_perso`,`id_mutation`),
  KEY `id_mutation` (`id_mutation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Mutations_Perso`
--


-- --------------------------------------------------------

--
-- Table structure for table `Origines_Geographiques`
--

CREATE TABLE IF NOT EXISTS `Origines_Geographiques` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Origines_Geographiques`
--

INSERT INTO `Origines_Geographiques` (`id`, `nom`) VALUES
(1, 'Navire nomade'),
(2, 'Petite station'),
(3, 'Station de taille moyenne'),
(4, 'Grande cité');

-- --------------------------------------------------------

--
-- Table structure for table `Origines_Sociales`
--

CREATE TABLE IF NOT EXISTS `Origines_Sociales` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Origines_Sociales`
--

INSERT INTO `Origines_Sociales` (`id`, `nom`) VALUES
(1, 'Bas-fonds'),
(2, 'Milieu ouvrier'),
(3, 'Classes moyennes'),
(4, 'Classes supérieures');

-- --------------------------------------------------------

--
-- Table structure for table `Personnage`
--

CREATE TABLE IF NOT EXISTS `Personnage` (
  `id` int(11) NOT NULL auto_increment,
  `id_joueur` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Personnage`
--


-- --------------------------------------------------------

--
-- Table structure for table `Professions`
--

CREATE TABLE IF NOT EXISTS `Professions` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `Professions`
--

INSERT INTO `Professions` (`id`, `nom`) VALUES
(1, 'Artisan / Artiste'),
(2, 'Assassin'),
(3, 'Barman'),
(4, 'Chasseur de primes'),
(5, 'Contrebandier'),
(6, 'Cultivateur / Éleveur'),
(7, 'Diplomate'),
(8, 'Érudit / Archéologue'),
(9, 'Espion'),
(10, 'Marchand'),
(11, 'Marchand itinérant / Conteur'),
(12, 'Médecin / Chirurgien'),
(13, 'Mercenaire'),
(14, 'Mineur'),
(15, 'Officier naval - Marine civile'),
(16, 'Officier naval - Marine militaire'),
(17, 'Officier militaire'),
(18, 'Ouvrier / Docker'),
(19, 'Pilote de chasse – Sous-marin'),
(20, 'Pilote de chasse – Atmosphère'),
(21, 'Pirate'),
(22, 'Policier / Enquêteur'),
(23, 'Prostitué(e)'),
(24, 'Scientifique / Ingénieur'),
(25, 'Soldat / Milicien'),
(26, 'Soldat d''élite'),
(27, 'Sous-marinier'),
(28, 'Technicien / Mécanicien'),
(29, 'Veilleur'),
(30, 'Voleur / Criminel');

-- --------------------------------------------------------

--
-- Table structure for table `Professions_Perso`
--

CREATE TABLE IF NOT EXISTS `Professions_Perso` (
  `id_perso` int(11) NOT NULL,
  `id_profession` int(11) NOT NULL,
  `annees` int(11) NOT NULL,
  PRIMARY KEY  (`id_perso`,`id_profession`),
  KEY `id_profession` (`id_profession`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Professions_Perso`
--


-- --------------------------------------------------------

--
-- Table structure for table `Utilisateurs`
--

CREATE TABLE IF NOT EXISTS `Utilisateurs` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  `mot_de_passe` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nom` (`nom`,`date`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Utilisateurs`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `Attribut`
--
ALTER TABLE `Attribut`
  ADD CONSTRAINT `Attribut_ibfk_1` FOREIGN KEY (`id_perso`) REFERENCES `Personnage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Avantages_Perso`
--
ALTER TABLE `Avantages_Perso`
  ADD CONSTRAINT `Avantages_Perso_ibfk_4` FOREIGN KEY (`id_avantage`) REFERENCES `Avantages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Avantages_Perso_ibfk_3` FOREIGN KEY (`id_perso`) REFERENCES `Personnage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Desavantages_Perso`
--
ALTER TABLE `Desavantages_Perso`
  ADD CONSTRAINT `Desavantages_Perso_ibfk_4` FOREIGN KEY (`id_desavantage`) REFERENCES `Desavantages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Desavantages_Perso_ibfk_3` FOREIGN KEY (`id_perso`) REFERENCES `Personnage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Description`
--
ALTER TABLE `Description`
  ADD CONSTRAINT `Description_ibfk_1` FOREIGN KEY (`id_perso`) REFERENCES `Personnage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Developpement`
--
ALTER TABLE `Developpement`
  ADD CONSTRAINT `Developpement_ibfk_1` FOREIGN KEY (`id_perso`) REFERENCES `Personnage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Mutations_Perso`
--
ALTER TABLE `Mutations_Perso`
  ADD CONSTRAINT `Mutations_Perso_ibfk_4` FOREIGN KEY (`id_mutation`) REFERENCES `Mutation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Mutations_Perso_ibfk_3` FOREIGN KEY (`id_perso`) REFERENCES `Personnage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Professions_Perso`
--
ALTER TABLE `Professions_Perso`
  ADD CONSTRAINT `Professions_Perso_ibfk_4` FOREIGN KEY (`id_profession`) REFERENCES `Professions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Professions_Perso_ibfk_3` FOREIGN KEY (`id_perso`) REFERENCES `Personnage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
