-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 25 sep. 2020 à 07:43
-- Version du serveur :  10.5.5-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `INFO2`
--

-- --------------------------------------------------------

--
-- Structure de la table `INFO2_items`
--

CREATE TABLE `INFO2_items` (
  `id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `INFO2_items`
--

INSERT INTO `INFO2_items` (`id`, `description`, `slug`, `expiration`) VALUES
(1, 'Maîtriser les subtilités du PHP', 'maitriser-subtilites-php', '2020-09-11 00:00:13'),
(2, 'Comprendre les frameworks', 'comprendre-les-frameworks', '2020-09-13 00:00:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `INFO2_items`
--
ALTER TABLE `INFO2_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `INFO2_items`
--
ALTER TABLE `INFO2_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
