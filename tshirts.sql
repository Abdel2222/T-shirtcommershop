-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 sep. 2024 à 01:00
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tshirt`
--

-- --------------------------------------------------------

--
-- Structure de la table `tshirts`
--

CREATE TABLE `tshirts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tshirts`
--

INSERT INTO `tshirts` (`id`, `name`, `brand`, `color`, `price`, `description`, `image_url`, `category`) VALUES
(1, 'Nike T-shirt Men', 'Nike', 'Black', 29.99, 'A stylish black Nike t-shirt for men with the Nike logo.', 'DALL·E 2024-09-12 22.45.06.webp', NULL),
(2, 'Nike T-shirt Women', 'Nike', 'White', 24.99, 'A stylish white Nike t-shirt for women with the Nike logo.', 'DALL·E 2024-09-12 22.45.17.webp', NULL),
(3, 'Adidas T-shirt Men', 'Adidas', 'Blue', 34.99, 'A stylish blue Adidas t-shirt for men with the Adidas logo.', 'DALL·E 2024-09-12 22.46.07.webp', NULL),
(4, 'Puma T-shirt Men', 'Puma', 'Black', 28.99, 'A stylish black Puma t-shirt for men with the Puma logo.', 'DALL·E 2024-09-12 22.46.43.webp', NULL),
(5, 'Gucci T-shirt Men', 'Gucci', 'Black', 199.99, 'A luxury black Gucci t-shirt for men with the Gucci logo.', 'DALL·E 2024-09-12 22.47.12.webp', NULL),
(6, 'Chanel T-shirt Women', 'Chanel', 'White', 299.99, 'A luxury white Chanel t-shirt for women with the Chanel logo.', 'DALL·E 2024-09-12 22.47.36.webp', NULL),
(7, 'Louis Vuitton T-shirt Men', 'Louis Vuitton', 'Black', 249.99, 'A luxury black Louis Vuitton t-shirt for men.', 'DALL·E 2024-09-12 22.49.31.webp', NULL),
(8, 'Guess T-shirt Men', 'Guess', 'White', 39.99, 'A stylish white Guess t-shirt for men with the Guess logo.', 'DALL·E 2024-09-12 22.50.55.webp', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tshirts`
--
ALTER TABLE `tshirts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tshirts`
--
ALTER TABLE `tshirts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
