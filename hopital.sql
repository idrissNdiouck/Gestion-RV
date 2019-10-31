-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 18 oct. 2019 à 17:27
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_no` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `medical_condition` text DEFAULT NULL,
  `doctors_suggestion` varchar(30) DEFAULT NULL,
  `payment_amount` int(199) DEFAULT NULL,
  `case_closed` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`appointment_no`, `patient_id`, `speciality`, `medical_condition`, `doctors_suggestion`, `payment_amount`, `case_closed`) VALUES
(59, 85, 'Dentiste', '&agrave; suivre', NULL, NULL, 'no'),
(60, 86, 'Dentiste', '&agrave; suivre', NULL, NULL, 'no'),
(61, 87, 'Dentiste', '&agrave; suivre', 'Alioune Fall', NULL, 'no'),
(62, 88, 'Cardiologue', '&agrave; suivre', NULL, NULL, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `clerks`
--

CREATE TABLE `clerks` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='stores information about clerk';

--
-- Déchargement des données de la table `clerks`
--

INSERT INTO `clerks` (`email`, `password`, `fullname`) VALUES
('secretaire', 'secretaire', 'secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `doctors`
--

CREATE TABLE `doctors` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `speciality` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `doctors`
--

INSERT INTO `doctors` (`email`, `password`, `fullname`, `speciality`) VALUES
('alou@gmail.com', '1234', 'Alassane Fall', 'Dermatologist'),
('dacos@gmail.com', '1234', 'Dr Dacosta', 'Cardiologue'),
('dave@gmail.com', '1234', 'Dave Mendy', 'Dentist'),
('maria@gmail.com', '1234', 'Mariama Gomis', 'Allergist');

-- --------------------------------------------------------

--
-- Structure de la table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_Id` int(20) NOT NULL,
  `date_rdv` date NOT NULL,
  `heure_rdv` varchar(50) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `DOB` int(10) NOT NULL,
  `weight` int(8) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `address` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='patient';

--
-- Déchargement des données de la table `patient_info`
--

INSERT INTO `patient_info` (`patient_Id`, `date_rdv`, `heure_rdv`, `full_name`, `DOB`, `weight`, `phone_no`, `address`) VALUES
(85, '2019-10-17', '09:13', 'Ibou', 56, 167, '+221784673070', 'Cit&eacute; Apix Tivaouane Peulh'),
(86, '2019-10-17', '10:00', 'Awa ndiaye', 12, 78, '764565456', 'Pikine'),
(87, '2019-10-22', '10:15', 'Idy', 31, 79, '+221784673070', 'Cit&eacute; Apix Tivaouane Peulh'),
(88, '2019-10-22', '11:15', 'Fallou Fal', 56, 89, '708906789', 'Pikine');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`email`, `password`, `fullname`) VALUES
('fal@gmail.com', '1234', 'Fallou'),
('indiouck04@yahoo.fr', '1234', 'Weex duunx');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_no`);

--
-- Index pour la table `clerks`
--
ALTER TABLE `clerks`
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_Id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `patient_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
