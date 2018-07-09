-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Kwi 2018, 12:42
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
-- Baza danych: `magazyn`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE `magazyn` (
  `id_przedmiotu` int(11) NOT NULL,
  `nazwa_przedmiotu` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `cena` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `dzial` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `magazyn`
--

INSERT INTO `magazyn` (`id_przedmiotu`, `nazwa_przedmiotu`, `cena`, `ilosc`, `dzial`) VALUES
(30, 'lknl', '66', 5765, 1),
(31, 'jiui', '777', 678, 1),
(32, 'lkjxz', '121', 33, 1),
(33, 'lkdsfj', '23', 233, 1),
(34, 'gra12', '22.34', 2, 1),
(35, 'kjdc', '13213', 213, 1),
(36, 'ostatni rekord', '999', 99, 3),
(37, 'dupa', '23.24', 123187, 2),
(38, 'jushc', '23.423', 33, 1),
(39, 'ksajhd', '23.23', 231, 2),
(40, 'scd', '0.02', 23, 1),
(41, 'gówno', '13', 1, 1),
(46, 'dupa', '112', 23, 1),
(47, 'asdasd', '23', 22, 1),
(48, 'asd', '12', 22, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `administracja` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `administracja`) VALUES
(18, 'admin', 'admin1', 'admin@o2.pl', 1),
(19, 'admin231', 'admin1', 'ads@o2.pl', 0),
(20, 'asdasda', 'admin1', 'asdasd@o2.pl', 0),
(21, 'asdasda2', 'admin1', 'asdasd2@o2.pl', 0),
(22, 'asdasda22', 'admin1', 'asdasd21@o2.pl', 0),
(23, 'asdasdada', 'admin1', 'asdaa@o2.pl', 0),
(24, 'asdasdasad', 'admin1', 'dasd@o2.pl', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `magazyn`
--
ALTER TABLE `magazyn`
  ADD PRIMARY KEY (`id_przedmiotu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  MODIFY `id_przedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
