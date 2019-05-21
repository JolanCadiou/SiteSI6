-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 21 mai 2019 à 08:24
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

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
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `idimages` int(255) NOT NULL AUTO_INCREMENT,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`idimages`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `INGREDIENT6` varchar(255) DEFAULT NULL,
  `INGREDIENT7` varchar(255) DEFAULT NULL,
  `IINGREDIENT8` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `idrecette` int(255) NOT NULL AUTO_INCREMENT,
  `IdUser_re` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `tempscuisson` int(255) NOT NULL,
  `tempspreparation` int(255) NOT NULL,
  `recette` text NOT NULL,
  `nom_image` varchar(255) NOT NULL,
  PRIMARY KEY (`idrecette`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`idrecette`, `IdUser_re`, `nom`, `ingredients`, `tempscuisson`, `tempspreparation`, `recette`, `nom_image`) VALUES
(45, 45, 'dfdfdfsq', '\r\nds\r\nfdq\r\nsdf\r\nsq\r\nfd\r\nsqd\r\nf\r\nsqdf\r\ns\r\nhy\r\ny\r\ntiu\r\ntyyj', 41, 14, 'ds\r\ndsf\r\ndsf\r\ndsf\r\nds\r\nh\r\nyt\r\ny\r\noio\r\ni\r\nk\r\n\r\nhb\r\nbv', ''),
(46, 45, 'gfhgf', 'gfhgfhd', 487, 45, 'gfhgfdh', ''),
(47, 45, 'ertertert', 'erterter', 454, 45, 'ertertert', ''),
(48, 45, 'dsqgdsg', 'sqdgdsqg', 54, 5454, 'dsgdsgfdsqg', 'Array'),
(49, 45, 'rterzt', 'erztez', 45, 45, 'ertert', 'Array'),
(50, 45, 'rterzt', 'ezrtze', 54, 874, 'erterzt', 'Array');

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

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `IdUser` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addpost` varchar(255) NOT NULL,
  `codepost` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IdUser`, `nom`, `prenom`, `tel`, `mail`, `password`, `addpost`, `codepost`, `ville`) VALUES
(43, 'Dez', 'Alexis', 781150201, 'alexis.dezetree@lyceefulbert.fr', 'azerty_1234', '3 Rue du petit clos', '28630', 'Thivars'),
(44, 'dla merde ', 'boubourse', 515185, 'ujgfuj', 'aaa', '3 Rue du petit clos', '26350', 'briconville'),
(45, 'manoury', 'kevin', 1234567890, 'dev', 'aaa', '3 Rue du petit clos', '26350', 'briconville');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
