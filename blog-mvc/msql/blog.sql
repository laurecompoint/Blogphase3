-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 02 mai 2018 à 11:52
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `content` longtext NOT NULL,
  `summary` text NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `created_at`, `content`, `summary`, `is_published`, `image`) VALUES
(1, '\"Le Crime de l\'Orient Express\" : rencontre avec Kenneth Branaghf', '2018-04-03', '<p>Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat.sssss</p>', 'Résumé de l’article Le Crime de l’Orient Expressssss', 1, NULL),
(2, 'Pourquoi “Mario + Lapins Crétins : Kingdom Battle” est le jeu de la rentrée', '2018-04-03', '<p>Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', 'Résumé de l’article Mario + Lapins Crétins', 0, NULL),
(3, 'Pourquoi \"Destiny 2\" est un remède à l’ultra-moderne solitude', '2018-01-14', '<p>Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam.</p>', ' Résumé de l\'article Destiny 2', 1, NULL),
(4, 'BO de « Les seigneurs de Dogtown » : l’époque bénie du rock.', '2018-01-03', '<p>Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula.</p>', 'Résumé de l\'article Les seigneurs de Dogtown', 1, NULL),
(5, 'Comment “Assassin’s Creed” trouve un nouveau souffle en Egypte', '2018-01-06', '<p>Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar.</p>', 'Résumé de l\'article Assassin’s Creed', 0, NULL),
(6, 'De “Skyrim” à “L.A. Noire” ou “Doom” : pourquoi les vieux jeux sont meilleurs sur la Switch', '2018-01-17', '<p>Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.</p>', 'Résumé de l\'article Switch', 1, NULL),
(7, 'Revue - The Ramones', '2018-01-08', '<p>Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh.</p>', 'Résumé de l\'article The Ramones', 1, NULL),
(8, 'Critique « Star Wars 8 – Les derniers Jedi » de Rian Johnson : le renouveau de la saga ?', '2018-01-01', '<p>Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue.</p>', 'Résumé de l\'article Star Wars 8', 0, NULL),
(14, 'La BO du film « Pixel »', '2018-03-07', '<p>Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>\r\n<p>Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>\r\n<p>Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>', 'Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article_category`
--

INSERT INTO `article_category` (`id`, `article_id`, `category_id`) VALUES
(1, 4, 1),
(2, 4, 2),
(24, 15, 4),
(26, 16, 4),
(5, 3, 4),
(6, 5, 4),
(7, 6, 4),
(8, 7, 2),
(9, 8, 1),
(10, 14, 1),
(11, 14, 2),
(12, 14, 4),
(23, 15, 3),
(25, 15, 1),
(22, 15, 2),
(21, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`) VALUES
(1, 'Cinéma', 'Trailers, infos, sorties...', NULL),
(2, 'Musique', 'Concerts, sorties d\'albums, festivals...', NULL),
(3, 'Théâtre', '', NULL),
(4, 'Jeux vidéos', 'Videos, tests...', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `article_id`, `user_id`, `comment`, `is_published`, `created_at`) VALUES
(1, 14, 1, 'TEST', 1, '2018-04-03');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `name`, `caption`, `article_id`) VALUES
(36, '11944ce4c0d439fd24e81c26304e002b.jpg', '', 3),
(37, '7d28f01d67c75855cae6941a53e7e6c1.png', '', 1),
(38, '2a1958a8edef67f651f84a431339906d.png', '', 1),
(39, '4cb0ce9e33ef37e06b447358b5799b12.png', '', 1),
(40, 'ecc95093727d75b95ab3ba57db784fc8.png', '', 1),
(41, '565dae5cbcc589eebfbf0415d9e16190.png', '', 1),
(42, '0275eca8728f848927c1be580ad02317.png', '', 3),
(43, '88d8f6bc1db3e66e59ffca5ceae28bc5.png', '', 3),
(44, 'a0d346c46074e47ffa440ae522078628.png', '', 3),
(45, 'df4948767a3637d81b112ef62b539dd4.png', '', 3),
(46, '8c1b8d2e6c2cb824fa039aaaf3fa8427.png', '', 3),
(47, '2b9ce123619590c12703819157b9056e.png', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `is_admin`, `bio`) VALUES
(30, 'Admin', 'TheBrickBox', 'admin@thebrickbox.net', 'b53759f3ce692de7aff1b5779d3964da', 1, 'admin du blog'),
(31, 'User', 'TheBrickBox', 'user@thebrickbox.net', 'b53759f3ce692de7aff1b5779d3964da', 0, 'utilisateur du blog'),
(32, 'clem', '', 'a@fdd', '2510c39011c5be704182423e3a695e91', 1, ''),
(33, 'clem', '', 'a@fd', '2510c39011c5be704182423e3a695e91', 0, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
