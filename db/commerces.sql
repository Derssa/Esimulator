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
-- Structure de la table `commerces`
--

CREATE TABLE `commerces` (
  `id` int(6) UNSIGNED NOT NULL,
  `designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `surface` float NOT NULL,
  `tarif` float NOT NULL,
  `charge` float NOT NULL,
  `disponibility` tinyint(1) DEFAULT '1',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commerces`
--

INSERT INTO `commerces` (`id`, `designation`, `surface`, `tarif`, `charge`, `disponibility`, `reg_date`) VALUES
(1, 'Showroom', 197, 70, 7, 1, '2021-04-03 19:38:28'),
(2, 'Centre multi-secours', 25, 70, 7, 1, '2021-04-06 13:33:26'),
(3, 'Creche', 25, 70, 7, 1, '2021-04-06 13:34:26'),
(4, 'Banque', 113, 70, 7, 1, '2021-04-06 13:33:26'),
(5, 'Salle de sport', 181, 70, 7, 1, '2021-04-06 13:33:26'),
(6, 'Restaurant', 797, 70, 7, 1, '2021-04-06 13:33:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commerces`
--
ALTER TABLE `commerces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commerces`
--
ALTER TABLE `commerces`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
