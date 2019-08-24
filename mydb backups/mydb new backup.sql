-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2019 at 07:40 AM
-- Server version: 8.0.13
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absente`
--

CREATE TABLE `absente` (
  `idAbsenta` int(11) NOT NULL,
  `Cursuri_idCurs` varchar(3) NOT NULL,
  `Elevi_idElev` int(11) NOT NULL,
  `dataAbsenta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clase`
--

CREATE TABLE `clase` (
  `idClasa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clase`
--

INSERT INTO `clase` (`idClasa`) VALUES
('11A'),
('11D'),
('11F'),
('12B');

-- --------------------------------------------------------

--
-- Table structure for table `cursuri`
--

CREATE TABLE `cursuri` (
  `idCurs` varchar(3) NOT NULL,
  `numeCurs` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cursuri`
--

INSERT INTO `cursuri` (`idCurs`, `numeCurs`) VALUES
('BIO', 'Biologie'),
('CHI', 'Chimie'),
('EDA', 'Ed. Antreprenoriala'),
('EDF', 'Ed. Fizica'),
('EDM', 'Ed. Muzicala'),
('EDP', 'Ed. Plastica'),
('EN', 'Lb. Engleza'),
('FIZ', 'Fizica'),
('FR', 'Lb. Franceza'),
('GEO', 'Geografie'),
('INF', 'Informatica'),
('IST', 'Istorie'),
('MAT', 'Matematica'),
('PUR', 'Purtare'),
('REL', 'Religie'),
('RO', 'Lb. Romana'),
('SSU', 'Stiinte Socio-Umane'),
('TIC', 'Teh. Info. si Com.');

-- --------------------------------------------------------

--
-- Table structure for table `elevi`
--

CREATE TABLE `elevi` (
  `idElev` int(11) NOT NULL,
  `numeElev` varchar(30) NOT NULL,
  `orasElev` varchar(25) NOT NULL,
  `sexElev` varchar(5) NOT NULL,
  `tlfElev` varchar(13) DEFAULT NULL,
  `birthdayElev` date NOT NULL,
  `Clase_idClasa` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elevi`
--

INSERT INTO `elevi` (`idElev`, `numeElev`, `orasElev`, `sexElev`, `tlfElev`, `birthdayElev`, `Clase_idClasa`) VALUES
(1, 'Radoi Andrei', 'Giurgiu', 'Baiat', '0747582938', '2001-03-04', '12B'),
(2, 'Ene Alexandra', 'Giurgiu', 'Fata', '0727384957', '2000-12-08', '12B'),
(3, 'Vlad Ioan', 'Bucuresti', 'Baiat', '0792839485', '2000-08-29', '12B'),
(4, 'Giulesteanu Andrei', 'Bucuresti', 'Baiat', '0792837502', '2000-07-21', '12B'),
(5, 'Voicu Anda', 'Bucuresti', 'Fata', '0792860286', '2000-08-24', '12B'),
(6, 'Carstea Laura', 'Bucuresti', 'Fata', '0739482938', '2001-12-09', '11D'),
(7, 'Manole Mara', 'Bucuresti', 'Fata', '0792583734', '2001-07-24', '11D'),
(8, 'Sandu Stefan', 'Giurgiu', 'Baiat', '0728394859', '2001-07-05', '11D'),
(9, 'Mircea Cosmina', 'Giurgiu', 'Fata', '0729492863', '2001-09-06', '11D'),
(10, 'Radu Stefania', 'Giurgiu', 'Fata', '0792869389', '2001-08-03', '11D'),
(11, 'Zlate Andreea', 'Giurgiu', 'Fata', '0792869384', '2000-11-28', '11A'),
(12, 'Bratu Izabela', 'Bucuresti', 'Fata', '0792856738', '2001-09-25', '11A'),
(13, 'Spiridon Alexandra', 'Dambovita', 'Fata', '0729384958', '2000-11-25', '11F'),
(14, 'Alexe Elisa', 'Bucuresti', 'Fata', '0792819385', '2000-08-06', '11F'),
(15, 'Cazaciuc Valentin', 'Bucuresti', 'Baiat', '0759287694', '2000-10-09', '11F'),
(16, 'Stan Irina', 'Bucuresti', 'Fata', '0729683968', '2001-01-22', '11F'),
(17, 'Botea Liviu', 'Giurgiu', 'Baiat', '0769384969', '2001-03-10', '11F'),
(18, 'Chirila Catalin', 'Bucuresti', 'Baiat', '0758293859', '2001-06-29', '11A'),
(19, 'Ciobanu David', 'Bucuresti', 'Baiat', '0719682393', '2000-09-18', '11A'),
(20, 'Badea Nicoleta', 'Giurgiu', 'Fata', '0754928692', '2000-01-26', '11A');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `idNota` int(11) NOT NULL,
  `Elevi_idElev` int(11) NOT NULL,
  `Cursuri_idCurs` varchar(3) NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `teza` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absente`
--
ALTER TABLE `absente`
  ADD PRIMARY KEY (`idAbsenta`),
  ADD UNIQUE KEY `idAbsenta_UNIQUE` (`idAbsenta`),
  ADD KEY `fk_Absente_Cursuri1_idx` (`Cursuri_idCurs`),
  ADD KEY `fk_Absente_Elevi1_idx` (`Elevi_idElev`);

--
-- Indexes for table `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`idClasa`),
  ADD UNIQUE KEY `idClasa_UNIQUE` (`idClasa`);

--
-- Indexes for table `cursuri`
--
ALTER TABLE `cursuri`
  ADD PRIMARY KEY (`idCurs`),
  ADD UNIQUE KEY `idCurs_UNIQUE` (`idCurs`);

--
-- Indexes for table `elevi`
--
ALTER TABLE `elevi`
  ADD PRIMARY KEY (`idElev`),
  ADD UNIQUE KEY `idElev_UNIQUE` (`idElev`),
  ADD KEY `fk_Elevi_Clase_idx` (`Clase_idClasa`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idNota`),
  ADD UNIQUE KEY `idNota_UNIQUE` (`idNota`),
  ADD KEY `fk_Note_Elevi1_idx` (`Elevi_idElev`),
  ADD KEY `fk_Note_Cursuri1_idx` (`Cursuri_idCurs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absente`
--
ALTER TABLE `absente`
  MODIFY `idAbsenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elevi`
--
ALTER TABLE `elevi`
  MODIFY `idElev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absente`
--
ALTER TABLE `absente`
  ADD CONSTRAINT `fk_Absente_Cursuri1` FOREIGN KEY (`Cursuri_idCurs`) REFERENCES `cursuri` (`idcurs`),
  ADD CONSTRAINT `fk_Absente_Elevi1` FOREIGN KEY (`Elevi_idElev`) REFERENCES `elevi` (`idelev`);

--
-- Constraints for table `elevi`
--
ALTER TABLE `elevi`
  ADD CONSTRAINT `fk_Elevi_Clase` FOREIGN KEY (`Clase_idClasa`) REFERENCES `clase` (`idclasa`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_Note_Cursuri1` FOREIGN KEY (`Cursuri_idCurs`) REFERENCES `cursuri` (`idcurs`),
  ADD CONSTRAINT `fk_Note_Elevi1` FOREIGN KEY (`Elevi_idElev`) REFERENCES `elevi` (`idelev`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
