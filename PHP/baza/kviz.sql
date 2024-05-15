-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 11:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kviz`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(1, 'OkramAbab', '$2y$10$yeaxERY0/7UuDqKu4p6A3.tlV.QVI920IJv9tKraC4tptIXnviK4q'),
(2, 'Test123', '$2y$10$w6MtT/v3C0Juh2eR.jBAxuNJbTpH/cu3Gg5rFE3EXT8RrcZC/uT4O');

-- --------------------------------------------------------

--
-- Table structure for table `kvizovi`
--

CREATE TABLE `kvizovi` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kvizovi`
--

INSERT INTO `kvizovi` (`id`, `naslov`) VALUES
(1, 'Kviz 1'),
(7, 'Moj kviz'),
(8, 'Kviz 2');

-- --------------------------------------------------------

--
-- Table structure for table `opcije`
--

CREATE TABLE `opcije` (
  `id` int(11) NOT NULL,
  `pitanje_id` int(11) NOT NULL,
  `opcija_text` varchar(255) NOT NULL,
  `tacno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opcije`
--

INSERT INTO `opcije` (`id`, `pitanje_id`, `opcija_text`, `tacno`) VALUES
(1, 1, 'Ogist Kont', 0),
(2, 1, 'Karl Gustav Jung', 0),
(3, 1, 'Aleksandar Fleming', 0),
(4, 1, 'Carls Darvin', 1),
(5, 2, 'Kanu', 1),
(6, 2, 'Veneciji', 0),
(7, 2, 'Berlinu', 0),
(8, 2, 'Los Andjelesu', 0),
(9, 3, '1887.', 0),
(10, 3, '1884.', 0),
(11, 3, '1885.', 1),
(12, 3, '1886.', 0),
(13, 4, 'Los Andjeles', 0),
(14, 4, 'Vankuver', 0),
(15, 4, 'Vasington', 1),
(16, 4, 'Njujork', 0),
(17, 5, '1837.', 0),
(18, 5, '1821.', 1),
(19, 5, '1843.', 0),
(20, 5, '1818.', 0),
(21, 6, 'Monblan', 0),
(22, 6, 'Kilimandzaro', 1),
(23, 6, 'Babin zub', 0),
(24, 6, 'Veliki atlas', 0),
(25, 7, 'Xn', 0),
(26, 7, 'Ks', 0),
(27, 7, 'Kn', 0),
(28, 7, 'Xe', 1),
(29, 8, 'Vrsta gljiva', 0),
(30, 8, 'Novac', 0),
(31, 8, 'Kartaska igra', 1),
(32, 8, 'Deo automobila', 0),
(33, 9, 'Dobrica Eric', 0),
(34, 9, 'Branko Copic', 1),
(35, 9, 'Ljubivoje Rsumovic', 0),
(36, 9, 'Dobrica Cosic', 0),
(37, 10, '55', 0),
(38, 10, '83', 1),
(39, 10, '70', 0),
(40, 10, '73', 0),
(41, 13, 'Ogist Kont', 0),
(42, 13, 'Karl Gustav Jung', 0),
(43, 13, 'Aleksandar Fleming', 0),
(44, 13, 'Carls Darvin', 1),
(45, 14, 'Kanu', 1),
(46, 14, 'Veneciji', 0),
(47, 14, 'Berlinu', 0),
(48, 14, 'Los Andjelesu', 0),
(49, 15, '1887.', 0),
(50, 15, '1884.', 0),
(51, 15, '1885.', 1),
(52, 15, '1886.', 0),
(53, 16, 'Los Andjeles', 0),
(54, 16, 'Vankuver', 0),
(55, 16, 'Vasington', 1),
(56, 16, 'Njujork', 0),
(57, 17, '1837.', 0),
(58, 17, '1821.', 1),
(59, 17, '1843.', 0),
(60, 17, '1818.', 0),
(61, 18, 'Monblan', 0),
(62, 18, 'Kilimandzaro', 1),
(63, 18, 'Babin zub', 0),
(64, 18, 'Veliki atlas', 0),
(65, 19, 'Xn', 0),
(66, 19, 'Ks', 0),
(67, 19, 'Kn', 0),
(68, 19, 'Xe', 1),
(69, 20, 'Vrsta gljiva', 0),
(70, 20, 'Novac', 0),
(71, 20, 'Kartaska igra', 1),
(72, 20, 'Deo automobila', 0),
(73, 21, 'Dobrica Eric', 0),
(74, 21, 'Branko Copic', 1),
(75, 21, 'Ljubivoje Rsumovic', 0),
(76, 21, 'Dobrica Cosic', 0),
(77, 22, '55', 0),
(78, 22, '83', 1),
(79, 22, '70', 0),
(80, 22, '70', 0),
(81, 23, '1969.', 0),
(82, 23, '1980.', 1),
(83, 23, '1986.', 0),
(84, 23, '1992.', 0),
(85, 24, 'Na lokalitetu Belo Brdo', 0),
(86, 24, 'U Djerdapskoj klisuri', 1),
(87, 24, 'U Sremskoj Mitrovici', 0),
(88, 24, 'Jugozapadno od Panceva', 0),
(89, 25, 'AC/DC', 0),
(90, 25, 'Bon Jovi', 0),
(91, 25, 'U2', 0),
(92, 25, 'Maneskin', 1),
(93, 26, 'Umnjaci', 0),
(94, 26, 'Sekutici', 1),
(95, 26, 'Kutnjaci', 0),
(96, 26, 'Ocnjaci', 0),
(97, 27, 'Enklava', 1),
(98, 27, 'Dieceza', 0),
(99, 27, 'Tera inkognita', 0),
(100, 27, 'Apatrida', 0),
(101, 28, 'Naslon', 0),
(102, 28, 'Sto', 1),
(103, 28, 'Stolica', 0),
(104, 28, 'Klupa', 0),
(105, 29, '1864.', 0),
(106, 29, '1850.', 0),
(107, 29, '1847.', 1),
(108, 29, '1838.', 0),
(109, 30, 'Medicini', 1),
(110, 30, 'Fizici', 0),
(111, 30, 'Novinarstvu', 0),
(112, 30, 'Astronomiji', 0),
(113, 31, '16', 0),
(114, 31, '48', 0),
(115, 31, '24', 0),
(116, 31, '32', 1),
(117, 32, 'Monociti', 0),
(118, 32, 'Plazma', 1),
(119, 32, 'Eritrociti', 0),
(120, 32, 'Bazofili', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

CREATE TABLE `pitanja` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `kviz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pitanja`
--

INSERT INTO `pitanja` (`id`, `text`, `kviz_id`) VALUES
(1, '1. Ko je tvorac \"Teorije evolucije\"?', 1),
(2, '2. Zlatna palma se dodeljuje u:', 1),
(3, '3. Koje godine je bio srpsko-bugarski rat?', 1),
(4, '4. Glavni grad SAD-a je:', 1),
(5, '5. Koje godine je preminuo Napoleon Bonaparta?', 1),
(6, '6. Koji je najveci vrh Afrike?', 1),
(7, '7. Hemijska oznaka za ksenon je:', 1),
(8, '8. Sta je briskula?', 1),
(9, '9. Ko je napisao \"Ispod zmajevih krila\"?', 1),
(10, '10. Koliko federalnih jedinica obuhvata Rusija?', 1),
(13, '1. Ko je tvorac \"Teorije evolucije\"?', 7),
(14, '2. Zlatna palma se dodeljuje u:', 7),
(15, '3. Koje godine je bio srpsko-bugarski rat?', 7),
(16, '4. Glavni grad SAD-a je:', 7),
(17, '5. Koje godine je preminuo Napoleon Bonaparta?', 7),
(18, '6. Koji je najveci vrh Afrike?', 7),
(19, '7. Hemijska oznaka za ksenon je:', 7),
(20, '8. Sta je briskula?', 7),
(21, '9. Ko je napisao \"Ispod zmajevih krila\"?', 7),
(22, '10. Koliko federalnih jedinica obuhvata Rusija?', 7),
(23, '1. Koje godine je preminuo Josip Broz Tito?', 8),
(24, '2. Lepenski vir se nalazi:', 8),
(25, '3. Koja grupa izvodi pesmu \"Supermodel\"', 8),
(26, '4. Koja vrsta zuba su slonovske kljove', 8),
(27, '5. Kako se naziva teritorija koja je u potpunosti okruzena teritorijom druge drzave?', 8),
(28, '6. Na latinskom centum, a na srpskom:', 8),
(29, '7. Koja godina se smatra godinom Vukove pobede?', 8),
(30, '8. Stetoskop je uredjaj koji se koristi u:', 8),
(31, '9. Kada su sve sahovske figure na tabli, tada praznih polja ima:', 8),
(32, '10. Tecni deo krvi naziva se:', 8);

-- --------------------------------------------------------

--
-- Table structure for table `rezultati`
--

CREATE TABLE `rezultati` (
  `id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `kviz_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezultati`
--

INSERT INTO `rezultati` (`id`, `korisnik_id`, `kviz_id`, `skor`) VALUES
(1, 1, 1, 7),
(2, 1, 1, 3),
(3, 1, 1, 5),
(4, 1, 1, 2),
(5, 1, 1, 7),
(6, 1, 1, 4),
(7, 1, 1, 2),
(8, 1, 1, 4),
(9, 1, 1, 5),
(10, 1, 1, 2),
(11, 1, 1, 6),
(12, 1, 1, 6),
(13, 1, 1, 6),
(14, 1, 1, 6),
(15, 1, 1, 6),
(17, 2, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kvizovi`
--
ALTER TABLE `kvizovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opcije`
--
ALTER TABLE `opcije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pi` (`pitanje_id`);

--
-- Indexes for table `pitanja`
--
ALTER TABLE `pitanja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ki` (`kviz_id`);

--
-- Indexes for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kvi` (`kviz_id`),
  ADD KEY `fk_koi` (`korisnik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kvizovi`
--
ALTER TABLE `kvizovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `opcije`
--
ALTER TABLE `opcije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `pitanja`
--
ALTER TABLE `pitanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rezultati`
--
ALTER TABLE `rezultati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opcije`
--
ALTER TABLE `opcije`
  ADD CONSTRAINT `fk_pi` FOREIGN KEY (`pitanje_id`) REFERENCES `pitanja` (`id`);

--
-- Constraints for table `pitanja`
--
ALTER TABLE `pitanja`
  ADD CONSTRAINT `fk_ki` FOREIGN KEY (`kviz_id`) REFERENCES `kvizovi` (`id`);

--
-- Constraints for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD CONSTRAINT `fk_koi` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `fk_kvi` FOREIGN KEY (`kviz_id`) REFERENCES `kvizovi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
