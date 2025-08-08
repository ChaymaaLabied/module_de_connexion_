-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 août 2025 à 10:23
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'chaymaa', 'Labied', '$2y$10$uRxNyJb8/EZ1ntbcToalPe2hpnSx9Kd6fbZN1LfJKg7R6hpMARZ3W'),
(2, 'chmicha01', 'chmicha', 'Labied', '$2y$10$IzVQvv47ZJGsdoHnxMoLLOXtmfdptB2PvWIu4c9cdsFcbjzQKevdK'),
(3, 'nassim01', 'Nassim', 'Hamdi', '$2y$10$BbQav6VrRPzQForFHlaq6eo15g1BmuAm6a70roBCEZ0Q6vTJkrF4K'),
(4, 'Khaleesi', 'Daenerys', 'Targaryen', '$2y$10$nhKbrWzUv80pl1k6SvJXYOhMdGSiZeu.dCieo0h4ShGz6oaPWjkEi'),
(5, 'stark', 'John', 'Snow', '$2y$10$1jGAlA5ErwWMiVKat5rSJeg9GQYrBKkf.MGIIBknJjJBrpwEZX3R.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
