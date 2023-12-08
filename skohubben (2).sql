-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 07:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skohubben`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestilling`
--

CREATE TABLE `bestilling` (
  `idBestilling` int(11) NOT NULL,
  `Bestillingsdato` date DEFAULT NULL,
  `Kunde` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bestilling`
--

INSERT INTO `bestilling` (`idBestilling`, `Bestillingsdato`, `Kunde`) VALUES
(40, '2023-12-06', 9),
(41, '2023-12-06', 9);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idid` int(11) NOT NULL,
  `produkt` int(11) DEFAULT NULL,
  `kunde` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kunde`
--

CREATE TABLE `kunde` (
  `idKunde` int(11) NOT NULL,
  `Fulltnavn` varchar(45) DEFAULT NULL,
  `Telefonnummer` varchar(45) DEFAULT NULL,
  `Addresse` varchar(45) DEFAULT NULL,
  `Postnummer` varchar(45) DEFAULT NULL,
  `passord` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kunde`
--

INSERT INTO `kunde` (`idKunde`, `Fulltnavn`, `Telefonnummer`, `Addresse`, `Postnummer`, `passord`) VALUES
(9, 'Admin', '12345678', 'Kabel', NULL, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `produkter`
--

CREATE TABLE `produkter` (
  `idProdukter` int(11) NOT NULL,
  `Størrelse` varchar(45) DEFAULT NULL,
  `Bilde` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  `Pris` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produkter`
--

INSERT INTO `produkter` (`idProdukter`, `Størrelse`, `Bilde`, `Type`, `Pris`) VALUES
(4, '45', NULL, 'Nike Jordan 1', '1999kr'),
(5, '44', NULL, 'Nike Jordan 1', '1999kr'),
(6, '43', NULL, 'Nike Jordan 1', '1999kr'),
(7, '42', NULL, 'Nike Jordan 1', '1999kr'),
(8, '41', NULL, 'Nike Jordan 1', '1999kr');

-- --------------------------------------------------------

--
-- Table structure for table `produkter_i_bestilling`
--

CREATE TABLE `produkter_i_bestilling` (
  `Produkt` int(11) DEFAULT NULL,
  `Bestilling` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produkter_i_bestilling`
--

INSERT INTO `produkter_i_bestilling` (`Produkt`, `Bestilling`) VALUES
(8, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestilling`
--
ALTER TABLE `bestilling`
  ADD PRIMARY KEY (`idBestilling`),
  ADD KEY `fk_Bestilling_Kunde_idx` (`Kunde`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idid`),
  ADD KEY `fk_Cart_Kunde1_idx` (`kunde`),
  ADD KEY `fk_Cart_Produkter1_idx` (`produkt`);

--
-- Indexes for table `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`idKunde`);

--
-- Indexes for table `produkter`
--
ALTER TABLE `produkter`
  ADD PRIMARY KEY (`idProdukter`);

--
-- Indexes for table `produkter_i_bestilling`
--
ALTER TABLE `produkter_i_bestilling`
  ADD KEY `fk_Produkter_I_Bestilling_Produkter1_idx` (`Produkt`),
  ADD KEY `fk_Produkter_I_Bestilling_Bestilling1_idx` (`Bestilling`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestilling`
--
ALTER TABLE `bestilling`
  MODIFY `idBestilling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kunde`
--
ALTER TABLE `kunde`
  MODIFY `idKunde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produkter`
--
ALTER TABLE `produkter`
  MODIFY `idProdukter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestilling`
--
ALTER TABLE `bestilling`
  ADD CONSTRAINT `fk_Bestilling_Kunde` FOREIGN KEY (`Kunde`) REFERENCES `kunde` (`idKunde`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_Cart_Kunde1` FOREIGN KEY (`kunde`) REFERENCES `kunde` (`idKunde`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cart_Produkter1` FOREIGN KEY (`produkt`) REFERENCES `produkter` (`idProdukter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produkter_i_bestilling`
--
ALTER TABLE `produkter_i_bestilling`
  ADD CONSTRAINT `fk_Produkter_I_Bestilling_Bestilling1` FOREIGN KEY (`Bestilling`) REFERENCES `bestilling` (`idBestilling`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produkter_I_Bestilling_Produkter1` FOREIGN KEY (`Produkt`) REFERENCES `produkter` (`idProdukter`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
