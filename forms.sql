-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 05 2017 г., 12:39
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zemlyanuhin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `forms`
--

CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(50) CHARACTER SET cp1251 NOT NULL,
  `birth` varchar(10) CHARACTER SET cp1251 NOT NULL,
  `kind_of_sport` varchar(50) CHARACTER SET cp1251 NOT NULL,
  `faculty` varchar(30) CHARACTER SET cp1251 NOT NULL,
  `level` varchar(30) CHARACTER SET cp1251 NOT NULL,
  `achievements` varchar(500) CHARACTER SET cp1251 NOT NULL,
  `phone` varchar(11) CHARACTER SET cp1251 NOT NULL,
  `email` varchar(30) CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `forms`
--

INSERT INTO `forms` (`id`, `fio`, `birth`, `kind_of_sport`, `faculty`, `level`, `achievements`, `phone`, `email`) VALUES
(11, 'Меркулов Денис Андреевич', '27.12.1995', 'Тхэквондо', 'ФКН', '1', 'Чемпион области', '21366182368', 'pilotaga2@mail.ru'),
(12, 'Чужиков', '6.08.1995', 'Крестики-нолики(спортивные)', 'ФКН', '3 юношеский', '3 место на классовом чемпионате в школе 9 класс ', '567890', 'omerculova1@mail.ru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
