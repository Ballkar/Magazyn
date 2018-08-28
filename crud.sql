-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Sie 2018, 00:42
-- Wersja serwera: 10.1.29-MariaDB
-- Wersja PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `crud`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `price` text COLLATE utf8_polish_ci NOT NULL,
  `number` int(11) NOT NULL,
  `section` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `storage`
--

INSERT INTO `storage` (`id`, `productName`, `price`, `number`, `section`) VALUES
(55, 'Drewno', '12', 9, 1),
(56, 'Metal', '99.12', 31, 2),
(57, 'Baterie', '1.59', 8, 2),
(58, 'turbina', '2000', 2, 3),
(59, 'Złom', '23', 6, 3),
(60, 'Radio', '2.1', 50, 2),
(61, 'pilot', '12.34', 1, 2),
(62, 'Telewior', '1200', 1, 2),
(64, 'Opona 235/55 R18', '150', 6, 3),
(65, 'Piła do cięcia drewna', '20', 3, 1),
(66, 'Klucz do świec', '10', 4, 3),
(67, 'Cement', '22', 499, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(61) COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `administracja` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `administracja`) VALUES
(36, 'admin', '$2y$10$rIbgJm8d3kB5Dir6UunwSuBunMEXkUdVaR3A7NgG9DnGfVrW2bKgO', 'admin@o2.pl', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
