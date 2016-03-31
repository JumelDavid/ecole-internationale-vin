-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Mars 2016 à 10:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `eiv`
--

-- --------------------------------------------------------

--
-- Structure de la table `a`
--

CREATE TABLE IF NOT EXISTS `a` (
  `etudiant_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  PRIMARY KEY (`etudiant_id`,`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
  `absence_id` int(11) NOT NULL AUTO_INCREMENT,
  `absence_date` datetime DEFAULT NULL,
  `absence_motif` varchar(50) DEFAULT NULL,
  `etudiant_id` int(11) NOT NULL,
  PRIMARY KEY (`absence_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `absence`
--

INSERT INTO `absence` (`absence_id`, `absence_date`, `absence_motif`, `etudiant_id`) VALUES
(10, '2015-06-10 16:30:17', NULL, 1),
(11, '2015-06-10 16:30:17', NULL, 2),
(12, '2015-06-10 16:30:33', NULL, 1),
(13, '2015-06-10 16:30:33', NULL, 2),
(14, '2015-06-10 16:43:32', NULL, 1),
(15, '2015-06-10 16:43:32', NULL, 2),
(16, '2015-06-10 16:45:21', NULL, 3),
(17, '2015-06-10 16:45:24', NULL, 3),
(18, '2015-06-10 16:45:25', NULL, 3),
(19, '2015-06-10 16:45:26', NULL, 3),
(20, '2015-06-10 16:45:27', NULL, 3),
(21, '2015-06-10 16:45:28', NULL, 3),
(22, '2015-06-10 16:45:30', NULL, 3),
(23, '2015-06-10 16:45:30', NULL, 3),
(24, '2015-06-10 16:45:31', NULL, 3),
(25, '2015-06-10 16:45:33', NULL, 3),
(26, '2015-06-10 16:45:34', NULL, 3),
(27, '2015-06-10 16:45:36', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `admin_id` int(11) NOT NULL,
  `admin_rang` varchar(25) DEFAULT NULL,
  `admin_pseudo` varchar(50) DEFAULT NULL,
  `admin_pwd` varchar(255) DEFAULT NULL,
  `admin_nom` varchar(50) DEFAULT NULL,
  `admin_prenom` varchar(50) DEFAULT NULL,
  `admin_poste` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `administration`
--

INSERT INTO `administration` (`admin_id`, `admin_rang`, `admin_pseudo`, `admin_pwd`, `admin_nom`, `admin_prenom`, `admin_poste`) VALUES
(1, '1', 'jbernard', '87f3675a08225c9fb7b95f4e0b71c88ae5525971', 'Bernard', 'Jacqueline', 'Directrice'),
(2, '1', 'mdubois', 'd89aca70c0fcf63e0b55e3a2d628118c00359eb7', 'Dubois', 'Martha', 'Assistante de direction');

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE IF NOT EXISTS `appartient` (
  `redoublant_id` int(11) NOT NULL,
  `redoublant_nom` varchar(50) DEFAULT NULL,
  `redoublant_prenom` varchar(50) DEFAULT NULL,
  `module_valides` varchar(50) DEFAULT NULL,
  `etudiant_id` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL,
  PRIMARY KEY (`etudiant_id`,`promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `promo_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  PRIMARY KEY (`promo_id`,`cours_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bulletin`
--

CREATE TABLE IF NOT EXISTS `bulletin` (
  `bulletin_id` int(11) NOT NULL AUTO_INCREMENT,
  `appreciation` varchar(100) DEFAULT NULL,
  `etudiant_id` varchar(50) NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`bulletin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `bulletin`
--

INSERT INTO `bulletin` (`bulletin_id`, `appreciation`, `etudiant_id`, `statut`) VALUES
(1, 'Tres bon travail', '1', 'genere'),
(2, 'Bof', '3', 'genere'),
(3, 'jsaispas', '2', 'genere'),
(4, 'osef', '4', 'genere'),
(5, 'osef', '5', 'genere');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `cours_id` int(11) NOT NULL,
  `cours_salle` varchar(25) DEFAULT NULL,
  `cours_heure` date DEFAULT NULL,
  PRIMARY KEY (`cours_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dependre`
--

CREATE TABLE IF NOT EXISTS `dependre` (
  `evaluation_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  PRIMARY KEY (`evaluation_id`,`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `enseignant_id` int(11) NOT NULL AUTO_INCREMENT,
  `enseignant_rang` varchar(50) DEFAULT NULL,
  `enseignant_pseudo` varchar(50) DEFAULT NULL,
  `enseignant_pwd` varchar(255) DEFAULT NULL,
  `enseignant_nom` varchar(50) DEFAULT NULL,
  `enseignant_prenom` varchar(50) DEFAULT NULL,
  `matiere_id` int(11) NOT NULL,
  PRIMARY KEY (`enseignant_id`),
  KEY `FK_enseignant_matiere_id` (`matiere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1506 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`enseignant_id`, `enseignant_rang`, `enseignant_pseudo`, `enseignant_pwd`, `enseignant_nom`, `enseignant_prenom`, `matiere_id`) VALUES
(1500, '2', 'btouchard', 'e4be08c4c65f965c57813a9054b134f2dae69b89', 'Touchard', 'Benjamin', 1600),
(1501, '2', 'ytreuffet', '2428a237ac1732f7de1109179fd56521081676e0', 'Treuffet', 'Yann', 1601),
(1502, '2', 'gtimothee', '06f7709abd33acb003c8ab594f8a61715bdc21b4', 'Graveline', 'Timothée', 1602),
(1503, '2', 'obeinchet', 'a8c1de098c09987f3cd074ecde6eb26b58ed31b7', 'Beinchet', 'Olivier', 1603),
(1504, '2', 'ppujol', 'cf3a92a9570a112a1742c8105478b8f93b70ea2e', 'Pujol', 'Pascal', 1604),
(1505, '2', 'bbourdin', '871e7dcca692183183cefc6a8a49bc63c91dd631', 'Bourdin', 'Bastien', 1605);

-- --------------------------------------------------------

--
-- Structure de la table `est_equivalent`
--

CREATE TABLE IF NOT EXISTS `est_equivalent` (
  `cours_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL,
  PRIMARY KEY (`cours_id`,`matiere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `etudiant_id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_candidature` varchar(50) DEFAULT NULL,
  `etudiant_pseudo` varchar(50) DEFAULT NULL,
  `etudiant_pwd` varchar(255) DEFAULT NULL,
  `etudiant_sexe` varchar(25) DEFAULT NULL,
  `etudiant_nom` varchar(50) DEFAULT NULL,
  `etudiant_prenom` varchar(50) DEFAULT NULL,
  `etudiant_naissance` date DEFAULT NULL,
  `etudiant_rue` varchar(50) DEFAULT NULL,
  `etudiant_ville` varchar(50) DEFAULT NULL,
  `etudiant_cp` decimal(10,0) DEFAULT NULL,
  `etudiant_tel` decimal(10,0) DEFAULT NULL,
  `etudiant_mail` varchar(50) DEFAULT NULL,
  `etudiant_pays` varchar(50) DEFAULT NULL,
  `etudiant_nationalite` varchar(50) DEFAULT NULL,
  `bulletin_id` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL,
  PRIMARY KEY (`etudiant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`etudiant_id`, `statut_candidature`, `etudiant_pseudo`, `etudiant_pwd`, `etudiant_sexe`, `etudiant_nom`, `etudiant_prenom`, `etudiant_naissance`, `etudiant_rue`, `etudiant_ville`, `etudiant_cp`, `etudiant_tel`, `etudiant_mail`, `etudiant_pays`, `etudiant_nationalite`, `bulletin_id`, `promo_id`) VALUES
(1, 'acceptee', 'djumel', 'e8a8c2faad0d250d7649f3fac0b43278fec80eac', 'M.', 'Jumel', 'David', '1989-06-13', '54 rue de Lalande', 'Bordeaux', '33000', '626731992', 'david.jumel@y-nov.com', 'France', 'française', 0, 300),
(2, 'acceptee', 'scassaigne', '932f4dc9842eecc1ddbf3a605df750ba1c48c749', 'M.', 'Cassaigne', 'Sebastien', '1993-05-17', '12 allée des près', 'Bordeaux', '33000', '673288113', 'sebastien.cassaigne@gmail.com', 'France', 'française', 0, 300),
(3, 'acceptee', 'qdoret', '01825c2a65b2d43612012c384c7c0f4f30541259', 'M.', 'Doret', 'Quentin', '1990-10-06', '13 rue du gland', 'Bordeaux', '33000', '673737373', 'quentin.doret@gmail.com', 'France', 'française', 0, 301),
(4, 'acceptee', 'jbachmann', '7032eba72a07f47f4cf4de136cb41cb30944939f', 'M.', 'Bachmann', 'Jean-Pierre', '1989-08-29', '12 allée des près', 'Bordeaux', '33000', '673288113', 'jeanpierre.bachmann@gmail.com', 'France', 'française', 0, 302),
(5, 'acceptee', 'sbenamou', 'cbc63583a0700d26d55a804919e2a99ce68f559a', 'M.', 'Benamou', 'Serge', '1986-09-26', '13 rue du gland', 'Bordeaux', '33000', '673288113', 'michelmaldonado@gmail.fr', 'France', 'française', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `evaluation_id` int(11) NOT NULL,
  `evaluation_type` varchar(50) DEFAULT NULL,
  `evaluation_coeff` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`evaluation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`evaluation_id`, `evaluation_type`, `evaluation_coeff`) VALUES
(1, 'Controle continu', '1'),
(2, 'Partiel', '3'),
(3, 'Rattrapage', '4');

-- --------------------------------------------------------

--
-- Structure de la table `exclusion`
--

CREATE TABLE IF NOT EXISTS `exclusion` (
  `exclusion_id` int(11) NOT NULL AUTO_INCREMENT,
  `exclusion_date` date DEFAULT NULL,
  `exclusion_motif` varchar(50) DEFAULT NULL,
  `etudiant_id` int(11) NOT NULL,
  PRIMARY KEY (`exclusion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `matiere_id` int(11) NOT NULL,
  `matiere_nom` varchar(50) DEFAULT NULL,
  `matiere_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`matiere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`matiere_id`, `matiere_nom`, `matiere_type`) VALUES
(1600, 'Introduction à l''Oenologie', 'enseignement théorique et pratique de l’oenologie'),
(1601, 'Economie', 'enseignement complémentaire'),
(1602, 'Anglais', 'enseignement complémentaire'),
(1603, 'Pratique de l''Oenologie', 'enseignement théorique et pratique de l’oenologie'),
(1604, 'Mathématiques', 'enseignement complémentaire'),
(1605, 'Histoire du vin', 'enseignement théorique des sciences fondamentales');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `note_valeur` decimal(10,2) NOT NULL,
  `note_date` date DEFAULT NULL,
  `etudiant_id` int(11) NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `evaluation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`note_id`),
  KEY `FK_note_etudiant_id` (`etudiant_id`),
  KEY `FK_note_matiere_id` (`matiere_id`),
  KEY `FK_note_evaluation_id` (`evaluation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=261 ;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`note_id`, `note_valeur`, `note_date`, `etudiant_id`, `matiere_id`, `evaluation_id`) VALUES
(161, '12.00', '2015-08-24', 1, 1602, 2),
(162, '1.00', '2014-11-01', 5, 1604, 2),
(163, '7.00', '2015-10-13', 4, 1603, 1),
(164, '19.00', '2015-09-16', 2, 1604, 2),
(165, '20.00', '2015-12-03', 5, 1602, 1),
(166, '16.00', '2016-01-25', 5, 1605, 1),
(167, '11.00', '2014-09-26', 4, 1604, 1),
(168, '8.00', '2014-12-19', 1, 1602, 1),
(169, '17.00', '2014-12-02', 5, 1602, 1),
(170, '2.00', '2014-09-22', 3, 1604, 3),
(171, '10.00', '2015-03-08', 1, 1602, 2),
(172, '1.00', '2015-06-06', 5, 1600, 2),
(173, '6.00', '2015-07-24', 3, 1602, 1),
(174, '19.00', '2016-04-19', 2, 1605, 2),
(175, '1.00', '2015-06-29', 4, 1600, 2),
(176, '18.00', '2015-04-30', 2, 1601, 3),
(177, '15.00', '2015-03-07', 3, 1604, 2),
(178, '10.00', '2015-04-28', 3, 1604, 3),
(179, '2.00', '2016-03-25', 2, 1604, 2),
(180, '5.00', '2015-01-25', 3, 1602, 3),
(181, '19.00', '2015-04-04', 1, 1605, 2),
(182, '2.00', '2015-09-13', 3, 1605, 2),
(183, '16.00', '2015-09-04', 5, 1602, 1),
(184, '17.00', '2016-03-11', 5, 1605, 3),
(185, '3.00', '2015-11-06', 3, 1602, 3),
(186, '5.00', '2015-09-23', 3, 1601, 1),
(187, '4.00', '2016-02-04', 3, 1603, 3),
(188, '15.00', '2015-08-15', 1, 1604, 2),
(189, '20.00', '2015-04-30', 1, 1600, 3),
(190, '6.00', '2016-01-25', 1, 1601, 3),
(191, '17.00', '2015-11-14', 4, 1603, 3),
(192, '1.00', '2014-12-20', 1, 1602, 2),
(193, '19.00', '2016-02-13', 3, 1600, 3),
(194, '18.00', '2015-03-20', 1, 1604, 1),
(195, '18.00', '2014-06-18', 2, 1602, 1),
(196, '17.00', '2015-12-27', 2, 1603, 3),
(197, '5.00', '2014-10-06', 2, 1603, 3),
(198, '5.00', '2016-04-12', 4, 1602, 2),
(199, '9.00', '2015-02-09', 2, 1602, 2),
(200, '7.00', '2016-03-21', 4, 1603, 2),
(201, '10.00', '2015-10-28', 5, 1601, 1),
(202, '11.00', '2015-09-01', 3, 1601, 1),
(203, '15.00', '2015-06-09', 1, 1603, 1),
(204, '3.00', '2016-06-04', 2, 1605, 2),
(205, '7.00', '2015-06-03', 2, 1601, 3),
(206, '14.00', '2014-11-24', 3, 1600, 3),
(207, '14.00', '2015-10-20', 3, 1604, 1),
(208, '7.00', '2016-05-15', 1, 1601, 3),
(209, '8.00', '2015-11-06', 3, 1602, 1),
(210, '19.00', '2016-03-10', 4, 1605, 2),
(211, '15.00', '2014-07-02', 3, 1602, 2),
(212, '7.00', '2015-05-26', 4, 1605, 1),
(213, '1.00', '2014-10-21', 5, 1604, 1),
(214, '12.00', '2016-04-04', 2, 1600, 3),
(215, '10.00', '2014-10-19', 1, 1603, 2),
(216, '13.00', '2015-12-10', 4, 1602, 3),
(217, '16.00', '2016-02-01', 2, 1604, 3),
(218, '1.00', '2016-03-10', 3, 1600, 2),
(219, '18.00', '2016-03-18', 4, 1600, 2),
(220, '19.00', '2015-01-12', 1, 1604, 3),
(221, '6.00', '2016-03-18', 2, 1601, 2),
(222, '16.00', '2016-02-05', 4, 1604, 3),
(223, '14.00', '2016-01-31', 5, 1601, 1),
(224, '14.00', '2015-05-16', 2, 1605, 2),
(225, '12.00', '2015-06-30', 4, 1603, 3),
(226, '16.00', '2014-08-04', 5, 1602, 3),
(227, '7.00', '2015-03-04', 2, 1601, 1),
(228, '14.00', '2015-04-03', 3, 1600, 1),
(229, '1.00', '2016-03-11', 4, 1604, 3),
(230, '10.00', '2015-09-21', 4, 1602, 3),
(231, '5.00', '2014-10-11', 3, 1601, 3),
(232, '18.00', '2015-03-29', 3, 1605, 1),
(233, '8.00', '2015-06-07', 2, 1603, 3),
(234, '15.00', '2015-11-22', 2, 1601, 3),
(235, '4.00', '2014-09-10', 5, 1604, 1),
(236, '6.00', '2016-01-16', 2, 1601, 1),
(237, '15.00', '2015-03-19', 3, 1605, 2),
(238, '5.00', '2014-09-29', 5, 1600, 3),
(239, '18.00', '2015-01-18', 4, 1603, 1),
(240, '5.00', '2015-11-06', 5, 1605, 1),
(241, '8.00', '2015-11-09', 3, 1605, 3),
(242, '6.00', '2016-02-25', 5, 1600, 1),
(243, '4.00', '2015-01-09', 3, 1601, 2),
(244, '20.00', '2016-03-13', 2, 1605, 1),
(245, '10.00', '2016-03-10', 2, 1604, 2),
(246, '5.00', '2016-04-11', 2, 1600, 2),
(247, '7.00', '2015-07-12', 5, 1604, 1),
(248, '20.00', '2014-07-22', 5, 1605, 1),
(249, '19.00', '2015-03-22', 2, 1604, 1),
(250, '17.00', '2015-03-20', 1, 1603, 2),
(251, '20.00', '2015-10-27', 1, 1603, 1),
(252, '5.00', '2014-12-27', 1, 1600, 2),
(253, '20.00', '2014-10-24', 5, 1600, 1),
(254, '19.00', '2014-09-13', 5, 1601, 3),
(255, '15.00', '2015-03-09', 5, 1601, 2),
(256, '2.00', '2014-10-08', 1, 1605, 2),
(257, '7.00', '2014-10-16', 3, 1601, 1),
(258, '10.00', '2014-07-07', 5, 1604, 3),
(259, '18.00', '2015-11-20', 2, 1600, 1),
(260, '12.00', '2015-12-26', 5, 1602, 1);

-- --------------------------------------------------------

--
-- Structure de la table `peut_avoir`
--

CREATE TABLE IF NOT EXISTS `peut_avoir` (
  `matiere_id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  PRIMARY KEY (`matiere_id`,`evaluation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `promo_id` int(11) NOT NULL,
  `promo_nom` varchar(50) DEFAULT NULL,
  `promo_annee` date DEFAULT NULL,
  `promo_salle` varchar(50) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`promo_id`, `promo_nom`, `promo_annee`, `promo_salle`, `admin_id`) VALUES
(300, 'EIV1', '0000-00-00', 'G1', 0),
(301, 'EIV2', '0000-00-00', 'G2', 0),
(302, 'EIV3', '0000-00-00', 'G3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `representant_legal`
--

CREATE TABLE IF NOT EXISTS `representant_legal` (
  `tuteur1_nom` int(11) NOT NULL,
  `tuteur2_nom` int(11) NOT NULL,
  `tuteur1_prenom` varchar(50) DEFAULT NULL,
  `tuteur2_prenom` varchar(50) DEFAULT NULL,
  `tuteur1_profession` varchar(50) DEFAULT NULL,
  `tuteur2_profession` varchar(50) DEFAULT NULL,
  `tuteur1_rue` varchar(50) DEFAULT NULL,
  `tuteur2_rue` varchar(50) DEFAULT NULL,
  `tuteur1_ville` varchar(50) DEFAULT NULL,
  `tuteur2_ville` varchar(50) DEFAULT NULL,
  `tuteur1_cp` varchar(50) DEFAULT NULL,
  `tuteur2_cp` varchar(50) DEFAULT NULL,
  `tuteur1_mail` varchar(50) DEFAULT NULL,
  `tuteur2_mail` varchar(50) DEFAULT NULL,
  `tuteur1_tel` decimal(10,0) DEFAULT NULL,
  `tuteur2_tel` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`tuteur1_nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `representant_legal`
--

INSERT INTO `representant_legal` (`tuteur1_nom`, `tuteur2_nom`, `tuteur1_prenom`, `tuteur2_prenom`, `tuteur1_profession`, `tuteur2_profession`, `tuteur1_rue`, `tuteur2_rue`, `tuteur1_ville`, `tuteur2_ville`, `tuteur1_cp`, `tuteur2_cp`, `tuteur1_mail`, `tuteur2_mail`, `tuteur1_tel`, `tuteur2_tel`) VALUES
(0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `represente`
--

CREATE TABLE IF NOT EXISTS `represente` (
  `etudiant_id` int(11) NOT NULL,
  `tuteur1_nom` int(11) NOT NULL,
  PRIMARY KEY (`etudiant_id`,`tuteur1_nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `retard`
--

CREATE TABLE IF NOT EXISTS `retard` (
  `retard_id` int(11) NOT NULL AUTO_INCREMENT,
  `retard_date` datetime DEFAULT NULL,
  `retard_motif` varchar(50) DEFAULT NULL,
  `etudiant_id` int(11) NOT NULL,
  `quinze_minutes` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`retard_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `retard`
--

INSERT INTO `retard` (`retard_id`, `retard_date`, `retard_motif`, `etudiant_id`, `quinze_minutes`) VALUES
(1, '2015-06-10 00:00:00', NULL, 4, 1),
(2, '2015-06-10 00:00:00', NULL, 4, 0),
(3, '2015-06-10 00:00:00', NULL, 4, 0),
(4, '2015-06-10 00:00:00', NULL, 4, 0),
(5, '2015-06-11 09:58:55', NULL, 3, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `FK_enseignant_matiere_id` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`matiere_id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_note_etudiant_id` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`etudiant_id`),
  ADD CONSTRAINT `FK_note_evaluation_id` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluation` (`evaluation_id`),
  ADD CONSTRAINT `FK_note_matiere_id` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`matiere_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
