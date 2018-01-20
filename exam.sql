-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `danceschool`
--
CREATE DATABASE IF NOT EXISTS `danceschool` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `danceschool`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `contenu`, `date`, `image`) VALUES
(1, '1er article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit maximus dui, at pretium erat volutpat quis. Quisque ut urna vitae elit mattis malesuada quis at massa. Duis luctus eros diam, vel tristique urna vehicula efficitur. Suspendisse venenatis purus quis urna tempor ultrices. Etiam ut nibh bibendum, tincidunt odio non, sollicitudin ipsum. Suspendisse elementum auctor urna eget porttitor. Vivamus at nulla turpis. Cras non accumsan nunc, sit amet lacinia felis. Quisque ultrices pharetra diam sit amet dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a auctor erat, non pharetra enim. In quis ligula quis enim euismod sodales. Morbi semper gravida dapibus. Vestibulum ac tristique urna. Fusce consectetur efficitur fringilla. Etiam dignissim a turpis vel pretium. ', '2018-01-16', 'poison_ivy.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nom` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom`) VALUES
(1, 'Hip-hop'),
(2, 'Classique'),
(3, 'Modern Jazz');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `civilite` varchar(5) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `civilite`, `email`) VALUES
(5, 'OLIVIER', 'mr', 'test@test.fr'),
(6, 'MICHELINE', 'mme', 'test2@test.fr'),
(7, 'Robert', 'mme', 'test3@test.fr'),
(8, 'ukjghfgdfd', 'mme', 'thgrdfs@hfgd.fr');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `capacite` int(5) NOT NULL,
  `inscrit` int(5) DEFAULT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nom`, `capacite`, `inscrit`, `id_cat`) VALUES
(1, 'Classique - débutant', 5, 1, 2),
(2, 'Classique - Avancé', 15, 2, 2),
(3, 'Hip-Hop - Débutant', 5, 5, 1),
(4, 'Hip-Hop - Avancé', 10, 4, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_cat` (`id_cat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
