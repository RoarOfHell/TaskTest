-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 05 2023 г., 15:43
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testtask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `Id` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `IdBrand` int(11) NOT NULL,
  `IdModel` int(11) NOT NULL,
  `Color` varchar(7) NOT NULL,
  `StateNumRF` varchar(9) NOT NULL,
  `IsParking` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`Id`, `IdClient`, `IdBrand`, `IdModel`, `Color`, `StateNumRF`, `IsParking`) VALUES
(12, 23, 1, 1, '#ffffff', 'dw134r123', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `carbrands`
--

CREATE TABLE `carbrands` (
  `Id` int(11) NOT NULL,
  `Brand` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `carbrands`
--

INSERT INTO `carbrands` (`Id`, `Brand`) VALUES
(1, 'Huyndai');

-- --------------------------------------------------------

--
-- Структура таблицы `carmodel`
--

CREATE TABLE `carmodel` (
  `Id` int(11) NOT NULL,
  `Model` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `carmodel`
--

INSERT INTO `carmodel` (`Id`, `Model`) VALUES
(1, 'Solaris');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(64) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `NumPhone` varchar(13) NOT NULL,
  `Address` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`Id`, `FullName`, `Gender`, `NumPhone`, `Address`) VALUES
(23, 'цукцукуц', 0, '235255', '345к34к');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UNIQUE` (`StateNumRF`),
  ADD KEY `IdBrand` (`IdBrand`),
  ADD KEY `IdClient` (`IdClient`),
  ADD KEY `IdModel` (`IdModel`);

--
-- Индексы таблицы `carbrands`
--
ALTER TABLE `carbrands`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `carmodel`
--
ALTER TABLE `carmodel`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NumPhone` (`NumPhone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `carbrands`
--
ALTER TABLE `carbrands`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `carmodel`
--
ALTER TABLE `carmodel`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `Car_ibfk_1` FOREIGN KEY (`IdBrand`) REFERENCES `carbrands` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Car_ibfk_2` FOREIGN KEY (`IdClient`) REFERENCES `client` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Car_ibfk_3` FOREIGN KEY (`IdModel`) REFERENCES `carmodel` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
