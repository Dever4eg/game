-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 192.168.1.3:3306
-- Время создания: Фев 11 2016 г., 19:36
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
-- Структура таблицы `forest`
--

CREATE TABLE IF NOT EXISTS `forest` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `found` tinyint(1) NOT NULL,
  `height` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `forest`
--

INSERT INTO `forest` (`id`, `login`, `found`, `height`, `state`) VALUES
(1, 'dever', 0, 0, 'find'),
(4, 'Owner', 0, 0, 'find'),
(5, 'test', 0, 0, 'find'),
(7, 'qwer', 0, 0, ''),
(8, 'qw12', 0, 0, ''),
(9, 'qwe123', 0, 0, ''),
(10, 'rest', 0, 0, 'find'),
(11, 'dever123', 0, 0, ''),
(12, 'test9', 1, 6, 'chopping');

-- --------------------------------------------------------

--
-- Структура таблицы `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `meta` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `state`
--

INSERT INTO `state` (`id`, `login`, `state`, `meta`) VALUES
(1, 'dever', 'gamer', 0),
(2, 'Owner', 'gamer', 0),
(3, 'test', 'gamer', 0),
(5, 'qwer', 'beginner', 1),
(6, 'qw12', 'gamer', 0),
(7, 'qwe123', 'beginner', 1),
(8, 'rest', 'gamer', 0),
(9, 'dever123', 'gamer', 0),
(10, 'test9', 'gamer', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `energy` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `lapis` int(11) NOT NULL,
  `emerald` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `stats`
--

INSERT INTO `stats` (`id`, `login`, `level`, `energy`, `health`, `credits`, `lapis`, `emerald`) VALUES
(1, 'dever', 1, 1200, 120, 0, 0, 0),
(2, 'Owner', 1, 1200, 120, 0, 0, 0),
(3, 'test', 1, 1200, 120, 0, 0, 0),
(5, 'qwer', 1, 1200, 10, 0, 0, 0),
(6, 'qw12', 1, 1200, 10, 0, 0, 0),
(7, 'qwe123', 1, 1200, 10, 0, 0, 0),
(8, 'rest', 1, 1200, 10, 0, 0, 0),
(9, 'dever123', 1, 1200, 10, 0, 0, 0),
(10, 'test9', 1, 1200, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `wood` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `stock`
--

INSERT INTO `stock` (`id`, `login`, `wood`) VALUES
(1, 'dever', 294),
(2, 'Owner', 176),
(3, 'test', 19),
(5, 'qwer', 0),
(6, 'qw12', 0),
(7, 'qwe123', 0),
(8, 'rest', 15),
(9, 'dever123', 0),
(10, 'test9', 45);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `email`, `date`) VALUES
(1, 'dever', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-05 01:13:50'),
(2, 'Owner', 'c8a08c28df9710b898fe53a6b545717931237f9e', NULL, NULL, '2016-02-05 01:19:08'),
(3, 'test', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-05 06:46:01'),
(5, 'qwer', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-06 12:38:59'),
(6, 'qw12', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-06 12:58:24'),
(7, 'qwe123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-06 01:04:40'),
(8, 'rest', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-06 01:07:49'),
(9, 'dever123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-06 12:28:15'),
(10, 'test9', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, '2016-02-06 12:49:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
