-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 28 juin 2018 à 11:08
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lica`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `roles`) VALUES
(2, 'admin', 'admin', 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `alien`
--

CREATE TABLE `alien` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `race` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nutrition` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attack` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `threat` int(11) NOT NULL,
  `description_card` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trait` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win` int(11) NOT NULL,
  `defeat` int(11) NOT NULL,
  `health_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adopted` tinyint(1) NOT NULL,
  `rating` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fight`
--

CREATE TABLE `fight` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `alien1_id` int(11) DEFAULT NULL,
  `alien2_id` int(11) DEFAULT NULL,
  `bet` int(11) NOT NULL,
  `odd_fighter1` int(11) NOT NULL,
  `odd_fighter2` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180623143609'),
('20180623144225'),
('20180623145532'),
('20180623181621'),
('20180624084244'),
('20180624200146');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credi_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_credit` int(11) DEFAULT '0',
  `win` int(11) NOT NULL,
  `defeat` int(11) NOT NULL,
  `pending_fight` tinyint(1) NOT NULL,
  `rating` int(11) NOT NULL,
  `img_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `password`, `pseudo`, `birthdate`, `mail`, `credi_code`, `nb_credit`, `win`, `defeat`, `pending_fight`, `rating`, `img_user`, `roles`, `description`) VALUES
(24, 'Wesh', 'oui', '$2y$13$CkMYdP5wBoUZzzPjCM2v/u0PGc5KJqqIY7CaBX8qvNtb4URX6zU.m', 'JUL', '2421-01-01', 'oui@oui', 'non', 0, 0, 0, 0, 0, NULL, 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'Wesh alors ? Wesh alors ! Wesh alors.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `alien`
--
ALTER TABLE `alien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E606C249A76ED395` (`user_id`);

--
-- Index pour la table `fight`
--
ALTER TABLE `fight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_21AA445656AE248B` (`user1_id`),
  ADD KEY `IDX_21AA4456441B8B65` (`user2_id`),
  ADD KEY `IDX_21AA44569BD7E9A8` (`alien1_id`),
  ADD KEY `IDX_21AA445689624646` (`alien2_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `alien`
--
ALTER TABLE `alien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `fight`
--
ALTER TABLE `fight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alien`
--
ALTER TABLE `alien`
  ADD CONSTRAINT `FK_E606C249A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `fight`
--
ALTER TABLE `fight`
  ADD CONSTRAINT `FK_21AA4456441B8B65` FOREIGN KEY (`user2_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_21AA445656AE248B` FOREIGN KEY (`user1_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_21AA445689624646` FOREIGN KEY (`alien2_id`) REFERENCES `alien` (`id`),
  ADD CONSTRAINT `FK_21AA44569BD7E9A8` FOREIGN KEY (`alien1_id`) REFERENCES `alien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
