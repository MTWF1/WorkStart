-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 10 Sie 2023, 12:43
-- Wersja serwera: 8.0.31
-- Wersja PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zgloszenie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

DROP TABLE IF EXISTS `pracownicy`;
CREATE TABLE IF NOT EXISTS `pracownicy` (
  `id` int NOT NULL AUTO_INCREMENT,
  `RCP` varchar(10) COLLATE utf8mb4_polish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `imie` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `RCP`, `pass`, `imie`, `nazwisko`) VALUES
(1, '1234', 'haslo1', 'Imię1', 'Nazwisko1'),
(2, '2345', 'haslo2', 'Imię2', 'Nazwisko2'),
(3, '3456', 'haslo3', 'Imię3', 'Nazwisko3'),
(4, '4567', 'haslo4', 'Imię4', 'Nazwisko4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

DROP TABLE IF EXISTS `zgloszenia`;
CREATE TABLE IF NOT EXISTS `zgloszenia` (
  `currentDateTime` datetime NOT NULL,
  `rcp` int NOT NULL,
  `numer` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zgloszenia`
--

INSERT INTO `zgloszenia` (`currentDateTime`, `rcp`, `numer`) VALUES
('2023-08-10 12:23:15', 1234, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
