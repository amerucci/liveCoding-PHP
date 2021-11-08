-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 21 oct. 2021 à 14:06
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `curl`
--

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `code` varchar(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`code`, `nom`) VALUES
('01', 'Guadeloupe'),
('02', 'Martinique'),
('03', 'Guyane'),
('04', 'La Réunion'),
('06', 'Mayotte'),
('11', 'Île-de-France'),
('24', 'Centre-Val de Loire'),
('27', 'Bourgogne-Franche-Comté'),
('28', 'Normandie'),
('32', 'Hauts-de-France'),
('44', 'Grand Est'),
('52', 'Pays de la Loire'),
('53', 'Bretagne'),
('75', 'Nouvelle-Aquitaine'),
('76', 'Occitanie'),
('84', 'Auvergne-Rhône-Alpes'),
('93', 'Provence-Alpes-Côte d\'Azur'),
('94', 'Corse');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
