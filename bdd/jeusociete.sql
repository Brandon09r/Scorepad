-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 01 juil. 2023 à 16:57
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeusociete`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nbJoueurMin` int NOT NULL,
  `nbJoueurMax` int NOT NULL,
  `age` int NOT NULL,
  `scorepad` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `ordre` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom`, `nbJoueurMin`, `nbJoueurMax`, `age`, `scorepad`, `ordre`) VALUES
(1, 'Oriflamme', 2, 5, 10, 'defaut', 'DESC'),
(2, 'Saboteur la Mine se Rebelle', 2, 8, 10, 'defaut', 'DESC'),
(3, 'Looterz', 2, 6, 14, 'none', 'DESC'),
(4, 'Bang! le Jeu de Dés', 3, 8, 8, 'none', 'DESC'),
(5, 'CodeNames', 2, 8, 12, 'none', 'DESC'),
(6, 'UNO', 2, 10, 7, 'none', 'DESC'),
(7, 'Owly Tribe', 2, 6, 8, 'defaut', 'DESC'),
(8, 'Saboteur les Mineurs Contre-Attaquent !', 2, 12, 8, 'defaut', 'DESC'),
(9, 'Perudo', 2, 6, 8, 'none', 'DESC'),
(10, 'Love Letter', 2, 6, 14, 'none', 'DESC'),
(11, 'L\'Auberge des Pirates', 2, 8, 7, 'none', 'DESC'),
(12, 'Unanimo Party', 3, 12, 10, 'unanimo', 'DESC'),
(13, 'Carro Combo', 3, 5, 10, 'none', 'DESC'),
(14, 'Mot Malin', 2, 6, 7, 'none', 'DESC'),
(15, 'Aztec', 3, 6, 10, 'defaut', 'DESC'),
(16, 'Village Pillage', 2, 5, 10, 'none', 'DESC'),
(17, 'C\'est Evident', 3, 6, 8, 'none', 'DESC'),
(18, 'Shamanz', 3, 5, 10, 'none', 'DESC'),
(19, 'So Clover!', 3, 6, 10, 'none', 'DESC'),
(20, 'Champ d\'Honneur', 2, 4, 12, 'none', 'DESC'),
(21, 'La Mascarade des Frères Grimm', 2, 5, 8, 'manche3', 'DESC'),
(22, 'Longueur d\'Onde', 2, 10, 14, 'none', 'DESC'),
(23, 'Paquet de Chips', 2, 5, 8, 'none', 'DESC'),
(24, 'Silver l\'Amulette', 2, 4, 10, 'manche4', 'ASC'),
(25, '6 Qui Prend!', 2, 10, 10, 'defaut', 'ASC'),
(26, 'Welcome to the Dungeon', 2, 4, 10, 'none', 'DESC'),
(27, 'Héros à Louer', 3, 5, 10, 'none', 'DESC'),
(28, 'Schotten Totten', 2, 2, 8, 'none', 'DESC'),
(29, 'Not Alone', 2, 7, 10, 'none', 'DESC'),
(30, 'Dix', 1, 5, 10, 'defaut', 'DESC'),
(31, 'Dracula Fiesta Sangria', 4, 8, 10, 'none', 'DESC'),
(32, 'Little Town', 2, 4, 10, 'defaut', 'DESC'),
(33, 'Diamant', 3, 8, 8, 'defaut', 'DESC'),
(34, 'Paper Dungeons', 1, 8, 10, 'defaut', 'DESC'),
(35, 'Tsunami Island', 2, 6, 10, 'none', 'DESC'),
(36, 'CS Files', 4, 12, 14, 'none', 'DESC'),
(37, 'Les Charlatans de Belcastel', 2, 5, 10, 'defaut', 'DESC'),
(38, 'Camel Up', 3, 8, 8, 'defaut', 'DESC'),
(39, 'Detective Club', 4, 8, 8, 'defaut', 'DESC'),
(40, 'Cerbere', 3, 7, 10, 'none', 'DESC'),
(41, 'Abyss', 2, 4, 14, 'abyss', 'DESC'),
(42, 'Dodos Rinding Dinos', 1, 6, 14, 'defaut', 'DESC'),
(43, 'The Last Bottle of Rum', 2, 5, 10, 'none', 'DESC'),
(44, 'Bellum Magica', 2, 5, 10, 'defaut', 'DESC'),
(45, 'The Hunger', 2, 6, 12, 'defaut', 'DESC'),
(46, 'Red Rising', 1, 6, 14, 'rising', 'DESC'),
(47, 'Nidavellir', 2, 5, 10, 'nidavellir', 'DESC'),
(48, 'Huns', 2, 4, 14, 'huns', 'DESC'),
(49, 'Mini Miners', 2, 4, 10, 'defaut', 'DESC'),
(50, 'Dice Forge', 2, 4, 10, 'defaut', 'DESC'),
(51, 'Mr Jack', 2, 2, 9, 'none', 'DESC'),
(52, '3000 Truands', 2, 4, 12, 'defaut', 'DESC'),
(53, 'Res Arcana', 2, 5, 12, 'none', 'DESC'),
(54, 'Citadelles', 2, 8, 10, 'none', 'DESC'),
(55, 'Lost Cities', 2, 4, 10, 'defaut', 'DESC'),
(56, 'test', 1, 6, 10, 'none', 'DESC');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `joueur` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `score` int NOT NULL,
  `jeu` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `scores`
--

INSERT INTO `scores` (`id`, `joueur`, `score`, `jeu`) VALUES
(35, 'Joueur 3', 50, 'La Mascarade des Frères Grimm'),
(34, 'Joueur 2', 50, 'La Mascarade des Frères Grimm'),
(33, 'Joueur 1', 56, 'La Mascarade des Frères Grimm'),
(32, 'Lyly', 30, '3000 Truands'),
(31, 'Nenette', 20, '3000 Truands'),
(30, 'Evan', 41, '3000 Truands'),
(29, 'Brandon', 33, '3000 Truands'),
(28, 'Joueur 2', 12, 'Aztec'),
(27, 'Joueur 1', 70, 'Aztec'),
(26, 'Joueur 2', 5, '3000 Truands'),
(25, 'Joueur 1', 54, '3000 Truands'),
(36, 'Joueur 1', 177, 'Red Rising'),
(37, 'Joueur 2', 0, 'Red Rising'),
(38, 'Joueur 3', 0, 'Red Rising'),
(39, 'Joueur 4', 0, 'Red Rising'),
(40, 'Joueur 1', 23, 'Abyss'),
(41, 'Joueur 3', 0, '3000 Truands'),
(42, 'Joueur 4', 0, '3000 Truands'),
(43, 'Joueur 2', 20, 'Abyss'),
(44, 'Joueur 3', 20, 'Abyss'),
(45, 'Joueur 4', 0, 'Abyss'),
(46, 'Joueur 5', 0, 'Abyss'),
(47, 'Joueur 1', 0, 'Silver l\'Amulette'),
(48, 'Joueur 2', 0, 'Silver l\'Amulette'),
(49, 'Joueur 3', 0, 'Silver l\'Amulette'),
(50, 'Joueur 6', 0, 'Abyss'),
(51, 'Joueur 7', 0, 'Abyss'),
(52, 'Joueur 8', 0, 'Abyss'),
(53, 'Joueur 9', 0, 'Abyss'),
(54, 'Joueur 10', 0, 'Abyss'),
(55, 'Joueur 4', 0, 'La Mascarade des Frères Grimm'),
(56, 'Joueur 4', 0, 'Silver l\'Amulette'),
(57, 'Joueur 1', 14, 'Nidavellir'),
(58, 'Joueur 2', 0, 'Nidavellir'),
(59, 'Joueur 3', 0, 'Nidavellir');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
