-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 oct. 2021 à 11:46
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `java_projet_ism`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id_affectation` int(11) NOT NULL,
  `annee` varchar(255) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`id_affectation`, `annee`, `prof_id`, `classe_id`) VALUES
(1, '2021-2022', 5, 3),
(2, '2021-2022', 5, 6),
(3, '2021-2022', 7, 6),
(4, '2021-2022', 8, 3),
(5, '2021-2022', 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `libelle`) VALUES
(3, 'IAGE'),
(6, 'GLRS3'),
(5, 'MAE3');

-- --------------------------------------------------------

--
-- Structure de la table `inscrption`
--

CREATE TABLE `inscrption` (
  `id` int(11) NOT NULL,
  `anne` varchar(25) NOT NULL,
  `etu_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrption`
--

INSERT INTO `inscrption` (`id`, `anne`, `etu_id`, `classe_id`) VALUES
(1, '2021-2022', 4, 6),
(2, '2020-2021', 4, 3),
(3, '2020-2021', 4, 5),
(4, '2019-2020', 4, 5),
(5, '2019-2020', 5, 3),
(6, '2021-2022', 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom_complet` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nci` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `matricule` varchar(100) DEFAULT NULL,
  `tuteur` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom_complet`, `role`, `login`, `password`, `nci`, `grade`, `matricule`, `tuteur`) VALUES
(1, 'EsseJacques Dansomon', 'ROLE_ADMIN', 'login', '1234', '123546558', 'Developpeur', '01245485', 'jacques 2'),
(2, 'Test test', 'ROLE_ETUDIANT', NULL, NULL, NULL, NULL, 'xxxx', 'Tuteur'),
(3, 'gato ju', 'ROLE_ETUDIANT', NULL, NULL, NULL, NULL, '1111', 'Steph'),
(4, 'Karim Fall', 'ROLE_ETUDIANT', NULL, NULL, NULL, NULL, 'yyyy', 'leto'),
(5, 'Dinos', 'ROLE_PROFESSEUR', NULL, NULL, '1234', 'Technicien superieur', NULL, NULL),
(6, 'leto', 'ROLE_ETUDIANT', NULL, NULL, NULL, NULL, '1000', '100visages'),
(7, 'Karim ', 'ROLE_PROFESSEUR', NULL, NULL, '7894', 'Master', NULL, NULL),
(8, 'Gims', 'ROLE_PROFESSEUR', NULL, NULL, 'aaaa', 'Docteur', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id_affectation`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `inscrption`
--
ALTER TABLE `inscrption`
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
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id_affectation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `inscrption`
--
ALTER TABLE `inscrption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
