-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Mars 2015 à 10:26
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ramakararo2`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`idcomment` int(11) NOT NULL,
  `commentContenue` mediumtext NOT NULL,
  `commentDate` datetime NOT NULL,
  `idstatut` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
`idmsg` int(11) NOT NULL,
  `id1` int(11) NOT NULL,
  `id2` int(11) NOT NULL,
  `contenue` varchar(45) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `msg`
--

INSERT INTO `msg` (`idmsg`, `id1`, `id2`, `contenue`, `date`) VALUES
(5, 1, 3, 'Akory aby ragnandria', '0000-00-00 00:00:00'),
(6, 1, 3, 'Madagascar', '2015-01-22 23:45:12'),
(7, 1, 2, 'Mbala tsara anao bb ino ma ny avaovao ino ny ', '2015-01-22 23:48:21'),
(8, 1, 2, 'Akory ino ooo', '2015-01-22 23:49:45'),
(9, 3, 1, 'Ino ny vaovao my admin', '2015-01-22 23:52:44'),
(10, 3, 2, 'Salut bb fa mandry ma ano ao\r\n#mandry', '2015-01-22 23:56:41'),
(11, 1, 2, 'Mbala tsara bb ino vaovao', '2015-01-23 07:54:26'),
(12, 1, 2, 'Karakory ma bb', '2015-01-23 09:45:06'),
(13, 1, 3, 'oooo\r\noooo', '2015-01-23 09:47:07');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
`idprofil` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `dateNaissance` date NOT NULL,
  `ville` varchar(45) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
`idstatut` int(11) NOT NULL,
  `statutContenue` text NOT NULL,
  `id` int(11) NOT NULL,
  `nbComment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `pseudo`, `email`, `password`, `active`, `created_at`) VALUES
(1, 'Root', 'SuperRoot', 'adminuser@yopmail.com', 'a1345e669cdc47f7d38dbf7b1a71e16026cc7e5e', '1', '2015-01-22 15:29:32'),
(2, 'Utilisateur', 'User', 'simple@yopmail.com', '6c135cab8920b7f349d42d34d1d8d9446c397ca1', '1', '2015-01-22 15:43:08'),
(3, 'Rabetsy', 'Rabetsy', 'rabetsy@yopmail.com', 'a1345e669cdc47f7d38dbf7b1a71e16026cc7e5e', '1', '2015-01-22 17:18:11');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`idcomment`), ADD KEY `fk_comment_statut1_idx` (`idstatut`), ADD KEY `fk_comment_user1_idx` (`id`);

--
-- Index pour la table `msg`
--
ALTER TABLE `msg`
 ADD PRIMARY KEY (`idmsg`), ADD KEY `fk_msg_users1_idx` (`id1`), ADD KEY `fk_msg_users2_idx` (`id2`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`idprofil`), ADD KEY `fk_profil_user1_idx` (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
 ADD PRIMARY KEY (`idstatut`), ADD KEY `fk_statut_user1_idx` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `msg`
--
ALTER TABLE `msg`
MODIFY `idmsg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
MODIFY `idprofil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
MODIFY `idstatut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `fk_comment_statut1` FOREIGN KEY (`idstatut`) REFERENCES `statut` (`idstatut`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `msg`
--
ALTER TABLE `msg`
ADD CONSTRAINT `fk_msg_users1` FOREIGN KEY (`id1`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_msg_users2` FOREIGN KEY (`id2`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
ADD CONSTRAINT `fk_profil_user1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `statut`
--
ALTER TABLE `statut`
ADD CONSTRAINT `fk_statut_user1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
