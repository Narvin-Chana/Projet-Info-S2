-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2019 at 05:48 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `googlies`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID_ARTICLE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_ARTICLE` varchar(50) NOT NULL,
  `DESCRIPTION` longtext NOT NULL,
  `PRIX_TTC` float NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `ID_CATEGORIE` int(11) NOT NULL,
  `ID_COLLECTION` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`),
  KEY `ARTICLE_CATEGORIE_FK` (`ID_CATEGORIE`),
  KEY `ARTICLE_COLLECTION0_FK` (`ID_COLLECTION`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID_ARTICLE`, `NOM_ARTICLE`, `DESCRIPTION`, `PRIX_TTC`, `IMAGE`, `ID_CATEGORIE`, `ID_COLLECTION`) VALUES
(1, 'Mug DarkVador', 'Tasse dark Vador de 300mL, qualité d\'exception, produite en France.', 11, 'mug_01.jpg', 1, 1),
(2, 'Mug Captain America', 'Tasse Captain America de 300mL, qualité d\'exception, produite en France.', 11, 'mug_02.jpg', 1, 2),
(3, 'Sac Gryffondor', 'Sac a dos de la maison Gryffondor de Harry potter', 20, 'bag_01.jpg', 5, 9),
(4, 'Sac Serpentard', 'Sac a dos de la maison Serpentard de Harry potter', 20, 'bag_02.jpg', 5, 9),
(5, 'Poster Indiana Jones Temple Maudit', 'Poster issu du film indiana Jones et le temple Maudit', 12, 'poster_01.jpg', 4, 3),
(6, 'Figurine John Snow', 'Figurine John Snow issu de la serie Game of thrones', 25, 'figurine_01.jpg', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_CATEGORIE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIE`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID_CATEGORIE`, `NOM_CATEGORIE`) VALUES
(1, 'Mug'),
(2, 'Habits'),
(3, 'Jouet/Figurines'),
(4, 'Poster'),
(5, 'Sac à dos');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(50) NOT NULL,
  `MDP` varchar(50) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `TELEPHONE` varchar(10) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `PTS_FIDELITE` int(11) NOT NULL DEFAULT '0',
  `ADRESSE` varchar(50) DEFAULT NULL,
  `COORD_BANC` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENT`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `EMAIL`, `MDP`, `NOM`, `PRENOM`, `TELEPHONE`, `DATE_NAISSANCE`, `PTS_FIDELITE`, `ADRESSE`, `COORD_BANC`) VALUES
(1, 'narvin.chana@etu.univ-tours.fr', 'motdepasse', 'Chana', 'Narvin', '0675908412', '2000-08-21', 0, 'tours', '1452698763254785'),
(2, 'simple@gmail.com', '12345', 'Simplet', 'Francky', '0789642536', '1985-06-29', 180, 'Paris', '7854458778547854'),
(3, 'charlie.dupont@orange.fr', 'password', 'dupont', 'charlie', '0736459685', '1996-12-04', 30, 'Angers', '0147852036985201'),
(4, 'bastien.camembert@etu.univ-tours.fr', 'caca', 'Bastien', 'Bastien', '123456789', '1999-04-25', 0, NULL, NULL),
(5, '', '', '', '', '', '1970-01-01', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
CREATE TABLE IF NOT EXISTS `collection` (
  `ID_COLLECTION` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_COLLECTION` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COLLECTION`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`ID_COLLECTION`, `NOM_COLLECTION`) VALUES
(1, 'StarWars'),
(2, 'Marvel'),
(3, 'Indiana Jones'),
(4, 'Rick et Morty'),
(5, 'Game Of Thrones'),
(6, 'Princesses Disney'),
(7, 'DC '),
(8, 'Mario'),
(9, 'Harry Potter'),
(10, 'Pokemon');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ID_COMMANDE` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_COMMANDE` date NOT NULL,
  `ETAT` varchar(50) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `ID_LIVRAISON` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_COMMANDE`),
  KEY `COMMANDE_CLIENT_FK` (`ID_CLIENT`),
  KEY `COMMANDE_LIVRAISON0_FK` (`ID_LIVRAISON`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`ID_COMMANDE`, `DATE_COMMANDE`, `ETAT`, `ID_CLIENT`, `ID_LIVRAISON`) VALUES
(1, '2019-02-02', 'Livre', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `est_commande`
--

DROP TABLE IF EXISTS `est_commande`;
CREATE TABLE IF NOT EXISTS `est_commande` (
  `ID_ARTICLE` int(11) NOT NULL,
  `ID_COMMANDE` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`,`ID_COMMANDE`),
  KEY `EST_COMMANDE_COMMANDE0_FK` (`ID_COMMANDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `est_commande`
--

INSERT INTO `est_commande` (`ID_ARTICLE`, `ID_COMMANDE`) VALUES
(1, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `etre`
--

DROP TABLE IF EXISTS `etre`;
CREATE TABLE IF NOT EXISTS `etre` (
  `ID_ARTICLE` int(11) NOT NULL,
  `ID_TAILLE` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`,`ID_TAILLE`),
  KEY `ETRE_TAILLE0_FK` (`ID_TAILLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `ID_LIVRAISON` int(11) NOT NULL AUTO_INCREMENT,
  `LIVREUR` varchar(50) NOT NULL,
  `DATE_LIVRAISON` date NOT NULL,
  PRIMARY KEY (`ID_LIVRAISON`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livraison`
--

INSERT INTO `livraison` (`ID_LIVRAISON`, `LIVREUR`, `DATE_LIVRAISON`) VALUES
(1, 'ChronoPost', '2019-02-19'),
(2, 'UPS', '2019-06-12'),
(3, 'UPS', '2019-01-24'),
(4, 'DHL', '2019-01-16'),
(5, 'TNT', '2019-06-13'),
(6, 'France Express', '2019-03-15'),
(7, 'ChronoPost', '2019-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ID_PROMO` int(11) NOT NULL AUTO_INCREMENT,
  `REDUCTION` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_PROMO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taille`
--

DROP TABLE IF EXISTS `taille`;
CREATE TABLE IF NOT EXISTS `taille` (
  `ID_TAILLE` int(11) NOT NULL AUTO_INCREMENT,
  `SIZE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_TAILLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `ARTICLE_CATEGORIE_FK` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`),
  ADD CONSTRAINT `ARTICLE_COLLECTION0_FK` FOREIGN KEY (`ID_COLLECTION`) REFERENCES `collection` (`ID_COLLECTION`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `COMMANDE_CLIENT_FK` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`),
  ADD CONSTRAINT `COMMANDE_LIVRAISON0_FK` FOREIGN KEY (`ID_LIVRAISON`) REFERENCES `livraison` (`ID_LIVRAISON`);

--
-- Constraints for table `est_commande`
--
ALTER TABLE `est_commande`
  ADD CONSTRAINT `EST_COMMANDE_ARTICLE_FK` FOREIGN KEY (`ID_ARTICLE`) REFERENCES `article` (`ID_ARTICLE`),
  ADD CONSTRAINT `EST_COMMANDE_COMMANDE0_FK` FOREIGN KEY (`ID_COMMANDE`) REFERENCES `commande` (`ID_COMMANDE`);

--
-- Constraints for table `etre`
--
ALTER TABLE `etre`
  ADD CONSTRAINT `ETRE_ARTICLE_FK` FOREIGN KEY (`ID_ARTICLE`) REFERENCES `article` (`ID_ARTICLE`),
  ADD CONSTRAINT `ETRE_TAILLE0_FK` FOREIGN KEY (`ID_TAILLE`) REFERENCES `taille` (`ID_TAILLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
