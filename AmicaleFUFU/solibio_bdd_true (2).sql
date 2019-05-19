-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 19 mai 2019 à 22:53
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `solibio_bdd_true`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `CONTENU` text,
  `iduser` int(25) NOT NULL,
  `idrecette` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`ID`, `CONTENU`, `iduser`, `idrecette`) VALUES
(1, 'erzrze', 2, 3),
(2, 'yui', 28, 34),
(3, 'oui', 28, 34),
(4, 'nono', 28, 34),
(5, 'nono', 28, 34),
(6, 'uyt', 28, 34),
(7, 'uyt', 28, 34),
(8, 'uyt', 28, 34),
(9, 'uyt', 28, 34),
(10, 'jkl', 28, 34),
(11, 'jkl', 28, 34),
(12, 'q', 28, 31),
(13, 'Test', 30, 31);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_posté_par_un_user`
--

DROP TABLE IF EXISTS `commentaire_posté_par_un_user`;
CREATE TABLE IF NOT EXISTS `commentaire_posté_par_un_user` (
  `ID` int(11) NOT NULL,
  `ID_1` smallint(6) NOT NULL,
  PRIMARY KEY (`ID`,`ID_1`),
  KEY `I_FK_COMMENTAIRE_POSTÉ_PAR_UN_USER_UTILISATEUR` (`ID`),
  KEY `I_FK_COMMENTAIRE_POSTÉ_PAR_UN_USER_COMMENTAIRE` (`ID_1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_posté_par_un_user_mdp`
--

DROP TABLE IF EXISTS `commentaire_posté_par_un_user_mdp`;
CREATE TABLE IF NOT EXISTS `commentaire_posté_par_un_user_mdp` (
  `ID` int(11) NOT NULL,
  `ID_1` smallint(6) NOT NULL,
  PRIMARY KEY (`ID`,`ID_1`),
  KEY `I_FK_COMMENTAIRE_POSTÉ_PAR_UN_USER_MDP_UTILISATEURMDP` (`ID`),
  KEY `I_FK_COMMENTAIRE_POSTÉ_PAR_UN_USER_MDP_COMMENTAIRE` (`ID_1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_sur_une_recette`
--

DROP TABLE IF EXISTS `commentaire_sur_une_recette`;
CREATE TABLE IF NOT EXISTS `commentaire_sur_une_recette` (
  `ID` smallint(6) NOT NULL,
  `ID_1` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`ID_1`),
  KEY `I_FK_COMMENTAIRE_SUR_UNE_RECETTE_COMMENTAIRE` (`ID`),
  KEY `I_FK_COMMENTAIRE_SUR_UNE_RECETTE_RECETTE` (`ID_1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `id_des_recettes_postées`
--

DROP TABLE IF EXISTS `id_des_recettes_postées`;
CREATE TABLE IF NOT EXISTS `id_des_recettes_postées` (
  `ID` int(11) NOT NULL,
  `ID_1` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`ID_1`),
  KEY `I_FK_ID_DES_RECETTES_POSTÉES_UTILISATEURMDP` (`ID`),
  KEY `I_FK_ID_DES_RECETTES_POSTÉES_RECETTE` (`ID_1`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE` char(32) NOT NULL,
  `TEMPS_NECESSAIRE` varchar(65) DEFAULT NULL,
  `PREPARATION` text NOT NULL,
  `PHOTO` varchar(65) DEFAULT NULL,
  `NOTE` smallint(6) DEFAULT NULL,
  `IDCOMMENTAIRES` int(11) DEFAULT NULL,
  `INGREDIENT1` varchar(255) DEFAULT NULL,
  `INGREDIENT2` varchar(255) DEFAULT NULL,
  `INGREDIENT3` varchar(255) DEFAULT NULL,
  `INGREDIENT4` varchar(255) DEFAULT NULL,
  `INGREDIENT5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`ID`, `TITRE`, `TEMPS_NECESSAIRE`, `PREPARATION`, `PHOTO`, `NOTE`, `IDCOMMENTAIRES`, `INGREDIENT1`, `INGREDIENT2`, `INGREDIENT3`, `INGREDIENT4`, `INGREDIENT5`) VALUES
(34, 'zae', 'aze', 'aze', '575ac10830699a94da92110fe2674fc9.jpg', NULL, NULL, 'aez', 'aze', 'aze', 'aze', 'zae'),
(33, 'Jolan4', '3min4', 'Cuisine4', '84581-thumb.png', NULL, NULL, 'moi4', '', '', '', ''),
(32, 'Jolan3', '3min3', 'Cuisine3', '123002-thumb.png', NULL, NULL, 'moi3', '', '', '', ''),
(31, 'Jolan2', '3min2', 'Danser2', 'ZqdOaaBA_400x400.jpg', NULL, NULL, 'Moi2', '', '', '', ''),
(30, 'Jolan', '3min', 'Danser', 'Rock-Lee-amzel-32028898-500-375.jpg', NULL, NULL, 'Moi', '', '', '', ''),
(19, 'Test', NULL, 'tets', '', NULL, NULL, 'tets', NULL, '', '', ''),
(20, 'Test', NULL, 'tets', '', NULL, NULL, 'tets', NULL, '', '', ''),
(21, 'Test', NULL, 'tets', '', NULL, NULL, 'tets', NULL, '', '', ''),
(22, 'Test', 'test', 'tets', '', NULL, NULL, 'tets', NULL, '', '', ''),
(23, 'Test', 'test', 'tets', '', NULL, NULL, 'tets', '', '', '', ''),
(24, 'Titre', '25Min.', 'Faire cuire le riz.', '', NULL, NULL, 'oeuf', 'riz', 'pomme', '', ''),
(25, 'Cuisine2', '22', 'Cuisine2', '84756-thumb.png', NULL, NULL, 'moi2', '', '', '', ''),
(26, '', '', '', '', NULL, NULL, 'y', '', '', '', ''),
(27, '', '', '', '', NULL, NULL, 'y', '', '', '', ''),
(28, '', '', '', '944439c9df68c8b9d841521e16dc305b-700.jpg', NULL, NULL, 'y', '', '', '', ''),
(29, 'a', 'e', 'z', '3107632559_1_7_8yOfVz5V.gif', NULL, NULL, 'r', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` char(25) DEFAULT NULL,
  `PRÉNOM` char(25) DEFAULT NULL,
  `MAIL` char(32) DEFAULT NULL,
  `PHOTO` longblob,
  `IDCOMMENTAIRE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `NOM`, `PRÉNOM`, `MAIL`, `PHOTO`, `IDCOMMENTAIRE`) VALUES
(1, 'LEBOSS', 'Jean', 'jolancadiou@gmail.com', NULL, 1),
(2, 'Jhon', 'Lennon', 'imagine@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurmdp`
--

DROP TABLE IF EXISTS `utilisateurmdp`;
CREATE TABLE IF NOT EXISTS `utilisateurmdp` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `MDP` char(32) DEFAULT NULL,
  `MAIL` char(32) DEFAULT NULL,
  `PP` varchar(25) NOT NULL DEFAULT 'Default.jpg',
  `IDRECETTES` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurmdp`
--

INSERT INTO `utilisateurmdp` (`ID`, `NOM`, `PRENOM`, `MDP`, `MAIL`, `PP`, `IDRECETTES`) VALUES
(30, 'c', 'c', '4a8a08f09d37b73795649038408b5f33', 'c@gmail.com', '52409-thumb.png', NULL),
(29, 'z', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'z@gmail.com', '1544348608-jdgkkk.png', NULL),
(28, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'a@gmail.com', '0 6PaAyEIKjrWtAw6x.png', NULL),
(27, 'Cadiou', 'Jolan', 'eb284049c532c9ecce982c64f260b196', 'Cadioujolan23@gmail.com', '20190403_115235.jpg', NULL),
(26, 'adz', 'adz', '99e3295edcbfeef9f7b0bd8e8534aacf', 'adz@gmail.com', 'Default.jpg', NULL),
(31, 'Admin', 'Test', 'eb284049c532c9ecce982c64f260b196', 'AdminTest@gmail.com', '67d.jpeg', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
