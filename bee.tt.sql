-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 18 2016 г., 22:25
-- Версия сервера: 5.7.12-5
-- Версия PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `k63993qj_laring`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fb`
--
-- Создание: Май 19 2016 г., 20:15
--

DROP TABLE IF EXISTS `fb`;
CREATE TABLE `fb` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `MESSAGE` varchar(1023) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `STATUS` int(2) NOT NULL,
  `CREATED_TIME` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--
-- Создание: Май 19 2016 г., 20:15
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(63) NOT NULL,
  `EMAIL` varchar(63) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `TYPE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `TYPE`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fb`
--
ALTER TABLE `fb`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fb`
--
ALTER TABLE `fb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
