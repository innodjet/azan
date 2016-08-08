-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2016 at 12:13 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azan`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
`id` int(11) NOT NULL,
`nomeve` varchar(75) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
`lieueve` text CHARACTER SET utf8 COLLATE utf8_bin,
`datepubeve` date DEFAULT NULL,
`datedbeve` datetime DEFAULT NULL,
`datefneve` datetime DEFAULT NULL,
`contact` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
`prix` int(11) DEFAULT NULL,
`description` text CHARACTER SET utf8 COLLATE utf8_bin,
`iduser` int(11) DEFAULT NULL,
`idtype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `nomeve`, `lieueve`, `datepubeve`, `datedbeve`, `datefneve`, `contact`, `prix`, `description`, `iduser`, `idtype`) VALUES
(39, 'Biere Coktail', 'Hotel Eda Oba', '2016-07-11', '2016-07-13 23:40:23', '2016-07-14 17:35:00', 'Moniseur Faure', 25600, 'Pour le moment rien n\'est défini', 1, 1),
(40, 'sun of beach', 'apouta', '2016-07-31', '2016-08-02 10:22:41', '2016-08-09 09:26:37', 'gg', 0, 'ggggggggggggggggggggggg', 42, 4),
(41, 'Cortana é @', 'é @ Cordova', '2016-08-13', '2016-08-15 23:35:00', '2016-08-17 23:35:00', 'George', 0, 'éééééééééééééééééééééééééééééééééééééééééééééééééééé @ èè', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
`id` int(11) NOT NULL,
`exp` int(11) DEFAULT NULL,
`dest` int(11) DEFAULT NULL,
`dateenvoi` timestamp NULL DEFAULT NULL,
`sujet` varchar(125) DEFAULT NULL,
`msg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partcipation`
--

CREATE TABLE `partcipation` (
`id` int(11) NOT NULL,
`ideve` int(11) DEFAULT NULL,
`iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
`id` int(11) NOT NULL,
`ideve` int(11) DEFAULT NULL,
`lien` varchar(200) DEFAULT NULL,
`typephoto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `ideve`, `lien`, `typephoto`) VALUES
(34, 39, '06e7111a461c95bda7eb105a920353e2.jpg', 1),
(37, 39, '2f9d44377d7a642e4cef2185da96cf3f.png', 3),
(38, 39, '67d98c45fa9d770e4b0724e84b5d37a8.png', 3),
(39, 39, '90648cf75e4a334911ede45a2cff372d.png', 4),
(40, 39, 'f2592349b5bbe6799bef014201bfff55.png', 4),
(43, 39, '2a609685dc5cbf04df807f0e8ee0f681.png', 5),
(44, 40, '2462d05fcbee29997988787d385cb905.jpg', 1),
(45, 40, 'b45ce72ac0e34ff714f22085269592b5.', 3),
(46, 40, 'c2b86bdcbe246848037e6fc1eaac2aab.', 4),
(47, 40, 'fe14caa387fdd6cf02da19da59332d85.jpg', 5),
(48, 41, '2a609685dc5cbf04df807f0e8ee0f681.png', 1),
(49, 41, '1e6dca98e10611ee94b513c7256681f9.', 3),
(50, 41, 'cad23928940e4fd9ce9f3ad37969cbee.', 4),
(51, 41, '2d61000d8a1025323b638c7d27e27b6e.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `typeevenement`
--

CREATE TABLE `typeevenement` (
`id` int(11) NOT NULL,
`code` varchar(25) DEFAULT NULL,
`libelle` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeevenement`
--

INSERT INTO `typeevenement` (`id`, `code`, `libelle`) VALUES
(1, 'Promo', 'Promotion'),
(2, 'Fes', 'Festivité'),
(3, 'Cul', 'Culturel'),
(4, 'Pol', 'Politique'),
(5, 'Con', 'Concert');

-- --------------------------------------------------------

--
-- Table structure for table `typephoto`
--

CREATE TABLE `typephoto` (
`id` int(11) NOT NULL,
`code` varchar(25) DEFAULT NULL,
`nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typephoto`
--

INSERT INTO `typephoto` (`id`, `code`, `nom`) VALUES
(1, 'couv', 'Couverture'),
(3, 'spon', 'sponsor'),
(4, 'pub', 'photos'),
(5, 'rep', 'representative');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`iduser` int(11) NOT NULL,
`nomuser` varchar(56) DEFAULT NULL,
`prenomuser` varchar(75) DEFAULT NULL,
`pseudouser` varchar(25) DEFAULT NULL,
`datecreation` date DEFAULT NULL,
`sexe` char(1) DEFAULT NULL,
`telephone` varchar(25) DEFAULT NULL,
`email` varchar(100) DEFAULT NULL,
`password` varchar(200) DEFAULT NULL,
`active` int(11) DEFAULT '0',
`codeactivation` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nomuser`, `prenomuser`, `pseudouser`, `datecreation`, `sexe`, `telephone`, `email`, `password`, `active`, `codeactivation`) VALUES
(1, 'EKLOU', 'Viviane', 'ekvivi', '2016-06-23', 'F', '90978971', 'vivi@yahoo.fr', 'cool', 0, NULL),
(2, NULL, NULL, 'tontonvi', '2016-07-17', 'M', NULL, 'tonton@yahoo.fr', '$2y$10$g4py8Yk1pawgh4GH7KT1CuwxmVpogdojeBIKhtndmXooHaJhnMIt2', 0, NULL),
(3, NULL, NULL, 'pipi', '2016-07-17', 'M', NULL, 'pipi@yahoo.fr', '$2y$10$z4Jrs4WB9sOaVPaDTwtXdOYwynu.R/2KjRy7sbHojMDfAJaZUcRFi', 0, NULL),
(4, NULL, NULL, 'koko', '2016-07-17', 'M', NULL, 'koko@yahoo.fr', '$2y$10$dzH7Z0JoqeeoNyhWRozsgOl8JXhzC3.6zHzskVZWcgc7SlHs2t/na', 0, NULL),
(5, NULL, NULL, 'test', '2016-07-17', 'F', NULL, 'test@yahoo.fr', '$2y$10$qvwVWwTHMDcRVvV2UIyLPevjCD0DKQsY1IuvX0Ivrf.yURJ.0nDx2', 0, NULL),
(39, NULL, NULL, 'ajanvi', '2016-07-24', 'F', NULL, 'ajanvi@yahoo.fr', '$2y$10$iXmDDt4zt.Synq446f8DFeKER61G0/vBnJ4GWntAEAPQJQMKPNqSW', 0, NULL),
(40, NULL, NULL, 'atavi', '2016-07-24', 'M', NULL, 'atavi@yahoo.fr', '$2y$10$EXV58Odv8fjI2lC/kya/AezEYj9aO5G6vLtQ2q2hpAFgwpEqnxENC', 0, NULL),
(41, NULL, NULL, 'kokovi', '2016-07-24', 'M', NULL, 'kokovi@yahoo.fr', '$2y$10$4RMcksofbJ4ftB8H8/J/JeHb2VrA4RciKU8J97A7p8evE8evaOBLG', 0, NULL),
(42, NULL, NULL, 'mimi', '2016-07-24', 'M', NULL, 'mimi@yahoo.fr', '$2y$10$jtjNUHL.jLIe41sxSkXUfeSsTrUFhBlDVrtXQn8t9s/XHZVy1FZjC', 0, NULL),
(43, NULL, NULL, 'sia@yahoo.fr', '2016-07-24', 'M', NULL, 'sia@yahoo.fr', '$2y$10$PZd4gxr1D2I/W5.wtXJ6n.N7aTPyhjl62D3eT.hXnJO53ldpMKlQW', 0, NULL),
(44, NULL, NULL, 'pipi25', '2016-07-24', 'M', NULL, 'pipi25@yahoo.fr', '$2y$10$URCLtZ/p/LxGGuassWZvKu2cNBer5tg0sgYQ3YnmBvbQoZygedh2u', 0, NULL),
(45, NULL, NULL, 'kikivi', '2016-07-24', 'M', NULL, 'kikivi@yahoo.fr', '$2y$10$BeOf/9YKMDycjF/x.swZueJVPQj94.42eTTdYse98KU6XLmK1RdSi', 1, 'xMErMLDyUN0dyl2MffiSfhVsJVajmgDHQ9XsJqQr5PsqZj13m7KrbvJKgITqMlWsjJIQXm6PZn6OuTGGOgVPzsoD18SCiESpdq4Y'),
(46, NULL, NULL, 'pipiripi', '2016-07-25', 'M', NULL, 'pipiripi@yaho.fr', '$2y$10$KC/CWW0c7rAw6UQyi4r3eeVIxUdgHMvfYRorjn482QbFFz2TgHk.i', 0, 'VBS3S2RHCn4vJLRyEq1tJf3dyjYHrXvcnd343JytWpOu2vQvKGNjJDn6M0C4VX47ZUZRtn9eAMwr9cLGGmPfP1ar1CjLoaFdUuSc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
ADD PRIMARY KEY (`id`),
ADD KEY `evenement_user_iduser_fk` (`iduser`),
ADD KEY `evenement_typeevenement_id_fk` (`idtype`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
ADD PRIMARY KEY (`id`),
ADD KEY `message_user_iduser_fk` (`exp`),
ADD KEY `message_user_iduser2_fk` (`dest`);

--
-- Indexes for table `partcipation`
--
ALTER TABLE `partcipation`
ADD PRIMARY KEY (`id`),
ADD KEY `partcipation_evenement_id_fk` (`ideve`),
ADD KEY `partcipation_user_iduser_fk` (`iduser`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
ADD PRIMARY KEY (`id`),
ADD KEY `photos_evenement_id_fk` (`ideve`),
ADD KEY `photos_typephoto_id_fk` (`typephoto`);

--
-- Indexes for table `typeevenement`
--
ALTER TABLE `typeevenement`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typephoto`
--
ALTER TABLE `typephoto`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partcipation`
--
ALTER TABLE `partcipation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `typeevenement`
--
ALTER TABLE `typeevenement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `typephoto`
--
ALTER TABLE `typephoto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
ADD CONSTRAINT `evenement_typeevenement_id_fk` FOREIGN KEY (`idtype`) REFERENCES `typeevenement` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `evenement_user_iduser_fk` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
ADD CONSTRAINT `message_user_iduser2_fk` FOREIGN KEY (`dest`) REFERENCES `user` (`iduser`) ON UPDATE CASCADE,
ADD CONSTRAINT `message_user_iduser_fk` FOREIGN KEY (`exp`) REFERENCES `user` (`iduser`) ON UPDATE CASCADE;

--
-- Constraints for table `partcipation`
--
ALTER TABLE `partcipation`
ADD CONSTRAINT `partcipation_evenement_id_fk` FOREIGN KEY (`ideve`) REFERENCES `evenement` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `partcipation_user_iduser_fk` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
ADD CONSTRAINT `photos_evenement_id_fk` FOREIGN KEY (`ideve`) REFERENCES `evenement` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `photos_typephoto_id_fk` FOREIGN KEY (`typephoto`) REFERENCES `typephoto` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;