-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 06 mai 2021 à 16:24
-- Version du serveur :  10.3.25-MariaDB-0ubuntu0.20.04.1-log
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `p1911682`
--

-- --------------------------------------------------------

--
-- Structure de la table `Animaux`
--

CREATE TABLE `Animaux` (
  `Identifiant` int(11) NOT NULL,
  `Nom` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


--
-- Structure de la table `Autres`
--

CREATE TABLE `Autres` (
  `Identifiant` int(11) NOT NULL,
  `Nom` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `catId` int(11) NOT NULL,
  `nomCat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`catId`, `nomCat`) VALUES
(1, 'Animaux'),
(2, 'Autres');

-- --------------------------------------------------------


--
-- Structure de la table `Photo`
--

CREATE TABLE `Photo` (
  `photoId` int(11) NOT NULL,
  `nomFich` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `catId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Photo`
--

INSERT INTO `Photo` (`photoId`, `nomFich`, `description`, `catId`) VALUES
(1, 'DSC00011.jpg', 'perroquet', 1),
(2, 'DSC01212.jpg', 'chien', 1),
(3, 'DSC01422.jpg', 'dauphin', 1),
(4, 'DSC01446.jpg', 'chèvre', 1),
(5, 'DSC01040.jpg', 'nourriture bonne', 2),
(6, 'DSC01280.jpg', 'monument', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `pseudo` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  <!--`etat` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL-->
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
