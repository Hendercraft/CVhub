-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 30 oct. 2020 à 15:00
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbcv`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `intitule` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(11) NOT NULL,
  `nom` varchar(512) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `experience_pro`
--

CREATE TABLE `experience_pro` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `poste_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `date_d` date NOT NULL,
  `date_f` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  `spé` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `peridode_etude`
--

CREATE TABLE `peridode_etude` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `universite` int(11) NOT NULL,
  `date_d` date NOT NULL,
  `date_f` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `intitule` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

CREATE TABLE `universite` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `linkdin` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `adresse`, `date_naissance`, `email`, `password`, `telephone`, `linkdin`) VALUES
(5, 'Driss', 'KIHAL', '4 rue des fromenteaux', '2002-02-20', 'drisskihal@gmail.com', 'test', '766418780', 'dsofhdsoihfodjighoisjfdhsd'),
(6, 'TEST', 'Test', '4 rue des fromenteaux', '2020-10-05', 'test@gmail.com', 'test', '766418780', 'dsofhdsoihfodjighoisjfdhsd'),
(8, 'TESTT', 'Testt', '4 rue des fromenteaux', '2020-10-05', 'test2@gmail.com', '$2y$10$ZKrjwUdIofirm5j7QljoteLVG7H3M73vyYRdVz0qlH8', '766418780', 'dsofhdsoihfodjighoisjfdhsd'),
(9, 'RUFF', 'Guillaume', '12 rue de belfort', '2001-01-28', 'guillaume.ruff@utbm.fr', '$2y$10$N6UOEAbfLZVaIRVqiNTzbu.QZ1rPasO7rjA.f3YaG8O', '665478569', 'guiguilebeaufmlkjgjfj2475'),
(57, 'TROMBINI', 'Quentin', 'cuisine de agathe', '2020-10-14', 'quentin@love.com', '$2y$10$ay0VDoN.OYSmfRr/ybpck.z0bEBmPYP7ptJX7yKIiZP', '647986532', 'linkdinmoncul'),
(63, 'TROMBINI', 'Quentin', 'cuisine agathe', '2020-10-01', 'quentin@pute.com', '$2y$10$RYvXSCKu3nIefMV2/Tb55Ols8xxVU.JyNWQPq3i8SoN', '647986532', 'kindsklfhqskjdfhqiudbfhivzbogzyabvufhsk'),
(64, 'TROMBINI', 'Quentin', 'cuisine agathe', '2020-09-30', 'quentin@pute.com', '$2y$10$ugZAF6Vyf3vOvwnKolmQ1.8FreoLRHTgRR/CXpFYeAn', '647986532', 'linkdinmoncul');

-- --------------------------------------------------------

--
-- Structure de la table `user_competences`
--

CREATE TABLE `user_competences` (
  `user_id` int(11) NOT NULL,
  `competences_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experience_pro`
--
ALTER TABLE `experience_pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `poste_id` (`poste_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `peridode_etude`
--
ALTER TABLE `peridode_etude`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `formation_id` (`formation_id`),
  ADD KEY `universite_id` (`universite`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `universite`
--
ALTER TABLE `universite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_competences`
--
ALTER TABLE `user_competences`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `competences_id` (`competences_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `experience_pro`
--
ALTER TABLE `experience_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `peridode_etude`
--
ALTER TABLE `peridode_etude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `universite`
--
ALTER TABLE `universite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `experience_pro`
--
ALTER TABLE `experience_pro`
  ADD CONSTRAINT `experience_pro_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `experience_pro_ibfk_2` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `experience_pro_ibfk_3` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `peridode_etude`
--
ALTER TABLE `peridode_etude`
  ADD CONSTRAINT `peridode_etude_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `peridode_etude_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `peridode_etude_ibfk_3` FOREIGN KEY (`universite`) REFERENCES `universite` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_competences`
--
ALTER TABLE `user_competences`
  ADD CONSTRAINT `user_competences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_competences_ibfk_2` FOREIGN KEY (`competences_id`) REFERENCES `competences` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
