-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 07 avr. 2021 à 11:10
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecosimulator`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiments`
--

CREATE TABLE `batiments` (
  `id` int(6) UNSIGNED NOT NULL,
  `numero_batiment` varchar(50) COLLATE utf8_bin NOT NULL,
  `surface_rdc` float NOT NULL,
  `surface_etage` float NOT NULL,
  `parking` float NOT NULL,
  `tarif` float NOT NULL,
  `charge` float NOT NULL,
  `disponibility` tinyint(1) DEFAULT '1',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `batiments`
--

INSERT INTO `batiments` (`id`, `numero_batiment`, `surface_rdc`, `surface_etage`, `parking`, `tarif`, `charge`, `disponibility`, `reg_date`) VALUES
(1, '174', 887, 100, 58, 40, 4, 1, '2021-04-03 20:09:10'),
(2, '175', 887, 100, 58, 40, 4, 1, '2021-04-06 13:18:28'),
(3, '179', 887, 100, 65, 40, 4, 1, '2021-04-06 13:21:15'),
(4, '180', 887, 100, 65, 40, 4, 1, '2021-04-06 13:21:15'),
(5, '181', 887, 100, 65, 40, 4, 1, '2021-04-06 13:21:15'),
(6, '182', 887, 100, 65, 40, 4, 1, '2021-04-06 13:21:15'),
(7, '183', 887, 100, 65, 40, 4, 1, '2021-04-06 13:21:15'),
(8, '184', 887, 100, 65, 40, 4, 1, '2021-04-06 13:21:15'),
(9, '186', 706, 126, 58, 40, 4, 1, '2021-04-06 13:21:15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `batiments`
--
ALTER TABLE `batiments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `batiments`
--
ALTER TABLE `batiments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
