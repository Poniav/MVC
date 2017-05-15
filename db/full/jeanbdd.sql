-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 15 mai 2017 à 05:42
-- Version du serveur :  5.5.55-0+deb8u1
-- Version de PHP :  7.0.18-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeanbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `idcom` int(20) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `alerts`
--

INSERT INTO `alerts` (`id`, `idcom`, `content`) VALUES
(14, 8, 'Commentaire qui ne devrait pas Ãªtre sur le site.');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `addDate` datetime NOT NULL,
  `modDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `auteur`, `addDate`, `modDate`) VALUES
(1, 'Un matin en Alaska', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis semper quam, sed malesuada tellus tincidunt vel. Nullam consectetur sem egestas orci laoreet, ut feugiat est molestie. Proin sagittis augue non elit ultrices, eu elementum arcu mollis. Phasellus a nulla vitae tellus gravida volutpat vitae vitae massa. Donec id bibendum odio. Maecenas vel elit quis massa iaculis scelerisque. Suspendisse gravida sem nec arcu venenatis, eu egestas mi sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at lobortis lectus, id facilisis leo. Mauris ultricies nibh elementum leo facilisis, <strong>nec molestie dui tristique</strong>. Donec cursus molestie felis, non tempor leo.</p>\r\n<h4>Chapitre 1</h4>\r\n<p>Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce fringilla est eleifend magna luctus, eu interdum ligula egestas. Praesent rutrum, odio in vulputate sollicitudin, orci tellus gravida leo, tincidunt tempor nulla dolor eu erat. Nulla ornare turpis in tristique volutpat. Pellentesque sed interdum nunc, ultricies maximus lacus. Vivamus sed dui nec nisl interdum varius. Pellentesque elementum neque et nibh facilisis tempor. Nunc tincidunt sem ac magna porttitor, quis lobortis diam blandit. Ut ornare sed dolor nec lobortis. Donec sed mauris nulla. Sed laoreet risus a tellus bibendum malesuada. Cras elementum cursus lectus in volutpat. Morbi blandit non est at rhoncus.</p>\r\n<p>Nulla pretium imperdiet orci, at commodo ante pulvinar at. Vivamus ac tempus lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut urna ligula. Nunc a orci sagittis ante iaculis euismod. Aliquam scelerisque quam ac nibh dapibus volutpat. Quisque id nulla orci. Curabitur aliquam laoreet enim, ut condimentum urna dapibus vel. Duis vel nibh lectus. Curabitur elementum pellentesque semper. Maecenas blandit rhoncus iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<h4>Chapitre 2</h4>\r\n<p>Sed volutpat, libero nec pulvinar suscipit, justo tellus facilisis elit, sed venenatis lectus ligula ac sapien. Nunc ac purus id turpis euismod dapibus. Pellentesque in odio vitae erat rhoncus commodo congue vehicula turpis. Sed bibendum aliquam nibh. Nunc eu cursus enim, et tempor est. Aenean ante nisl, blandit non tellus id, viverra venenatis tellus. Mauris ante nisi, posuere id dui a, vehicula placerat elit. Aenean malesuada, erat at venenatis ornare, ligula orci elementum enim, at rhoncus augue nisi vel eros.</p>', 'Jean2145', '2017-05-12 12:19:44', '2017-05-12 12:19:44');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(15) NOT NULL,
  `idnews` int(15) NOT NULL,
  `idparent` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `moderate` int(11) NOT NULL,
  `content` text NOT NULL,
  `membre` varchar(255) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `idnews`, `idparent`, `niveau`, `moderate`, `content`, `membre`, `addDate`) VALUES
(1, 1, 0, 0, 0, 'Top top taupe...ðŸ˜ŽðŸ˜ŽðŸ˜ŽðŸ˜Ž', 'Philippe', '2017-05-14 19:43:42'),
(2, 1, 1, 1, 0, 'Yes yes....top top', 'Sylvie', '2017-05-14 19:44:33'),
(3, 1, 0, 0, 0, 'Super Article. J\'aimerais bien visiter l\'Alaska.', 'Guillaume', '2017-05-15 03:29:44'),
(4, 1, 2, 2, 0, 'J\'adore les commentaires. Que pensez-vous de l\'article ?', 'Guillaume', '2017-05-15 03:32:07'),
(5, 1, 4, 3, 0, 'C\'est tip top !', 'Philippe', '2017-05-15 03:33:01'),
(6, 1, 4, 3, 0, 'Super article !', 'Visiteur', '2017-05-15 03:33:30'),
(7, 1, 6, 4, 0, 'Merci beaucoup ! Bonne visite !', 'Jean Forteroche', '2017-05-15 05:19:13'),
(8, 1, 0, 0, 1, 'Je n\'aime pas l\'Alaska.', 'Nicolas', '2017-05-15 06:48:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `firstname`, `email`, `addDate`) VALUES
(1, 'Jean2145', '$2y$10$ltNYgYnObNYW7tKksMrImOYU41W0g21bKO70lb.DZnpKkQ2IaIxf6', 'Jean', 'Forteroche', 'contact@jeanforteroche.com', '2017-05-12 12:19:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
