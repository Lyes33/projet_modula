-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 fév. 2021 à 08:42
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `electro_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909'),
(17, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `rgpd` varchar(25) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heure` time NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `message`, `rgpd`, `date`, `heure`, `ip`) VALUES
(3, 'toto', 'tata', 'toto@gmail.com', 'bonjour; je souhaite acheter un four', 'oui', '11-03-2020', '12:49:00', '::1'),
(4, 'lolo', 'lili', 'lolo@gmail.com', 'bonjour; excellent produit', 'oui', '11-03-2020', '12:50:00', '::1'),
(5, 'dodo', 'didi', 'dodo@gmail.com', 'commande bien reçue', 'oui', '11-03-2020', '12:51:00', '::1'),
(6, 'sisi', 'sassa', 'sisi@hotmail.com', 'bonjour; c\'est pour un retrou svp', 'oui', '11-03-2020', '12:52:00', '::1'),
(7, 'marie', 'maria', 'maria@hotmail.fr', 'bonjour; délai de de livraison non respecté', 'oui', '11-03-2020', '12:53:00', '::1'),
(8, 'jean', 'jacques', 'jeanjacques@yahoo.fr', 'bonjour c\'est jean jacques', 'oui', '11-03-2020', '13:46:00', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` varchar(3000) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `prix` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `lien`, `nom`, `descr`, `prix`) VALUES
(8, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQxEzHZthwzeX83BQbocaXVXob3YX1q_EUGx_iuxKcfmZk6Jo9J', 'four', 'Four combiné vapeur', 99.99),
(2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTpoHEQgiUZQT4l0EXfn_ZH9QVD80vZo--AVzwrPHLCKeZmt8zF', 'cuisine', 'cuisiniere induction 60cm', 108.95),
(6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSbZ21xUq5KLwmp3K531l1ke2TaAXnTJL7oMSRd0ouNncPtMxD4', 'cuisine', 'cuisinière a induction AMICA', 300),
(7, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRSMhD9zAh_Oe_l0MxzUgsyFwFddU33nW8Zlw2kqEfY3T8377Fj', 'cuisine', 'BRANDT BCI606638', 110),
(5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQNOmoL_tq5eereAc2kE-wiwbPUhou7-RUNfVszdhjA2yJurqX6', 'cuisne', 'cuisne à gaz de ville 4 foyers', 95.99),
(9, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTX4tCl1kZS12PHEDnwowuyeKjORmo6Dj5e4tW6ht0ndQajinNk', 'four', 'Four à air pulsé', 205),
(10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSB4tR3ZRePd8UsGQq9V2xiF-TdMcs2xnLwGU7TlpDzkypOjq7i', 'four', 'Four à pizza à poser à gaz', 130.5),
(11, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTAUmI6XByoBJXqfYrd1-jVIzjmXeIjZ4P4S_YWjJGqx8EvMLEA', 'four', 'Four à sole de boulangerie', 540),
(12, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTiADIqwmvw29_xiBWPMhLc5FqS_j1bs9MSCCuLuSsxpxaz9XQo', 'micro onde', 'Micro onde pose libre', 45),
(13, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRe_BMpktrSehjTzZlPibNqweMnSGUwCQPdndNTert7BVILVvsX', 'micro onde', 'Micro onde rouge', 55),
(14, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTenr5UGVIKiWil_L3oh6G0O8lMXXvD3HFAT1aaBYEW7Lxrajdr', 'frigo', 'Frigo isotherm CR219', 410),
(15, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT_DkyGEUOYtKv42zc8Fd8m1Urse3ZSYXp7WSWVDjaelJvVAr1z', 'frigo', 'Frigo congélateur couleur gris', 199.99),
(16, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRBtH2MfRhZ71xHb7sIm0tfrX7xo7LDABfavmcdCF6vTWY2IHg3', 'frigo', 'Frigo 70 Litres HEXIS', 90.95);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
