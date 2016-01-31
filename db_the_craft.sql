-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 192.168.1.3:3306
-- Время создания: Янв 31 2016 г., 03:14
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_the_craft`
--

-- --------------------------------------------------------

--
-- Структура таблицы `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userId` bigint(11) NOT NULL,
  `level` int(11) NOT NULL,
  `energy` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `lapis` int(11) NOT NULL,
  `emerald` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `stats`
--

INSERT INTO `stats` (`id`, `userId`, `level`, `energy`, `health`, `credits`, `lapis`, `emerald`) VALUES
(1, 1, 1, 1200, 120, 0, 0, 0),
(2, 2, 1, 1200, 120, 0, 0, 0),
(3, 3, 1, 1200, 120, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `email` text,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `email`, `date`) VALUES
(1, 'Dever', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-01-31 02:11:21'),
(2, 'test', '19b58543c85b97c5498edfd89c11c3aa8cb5fe51', NULL, NULL, '2016-01-31 02:12:19'),
(3, 'Owner', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, '2016-01-31 02:35:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
