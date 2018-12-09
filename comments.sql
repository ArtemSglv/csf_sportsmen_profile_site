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
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIME` date NOT NULL,
  `NICK_NAME` varchar(30) NOT NULL DEFAULT 'No name',
  `COMMENT` varchar(1000) NOT NULL,
  `FORM_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`COMMENT_ID`),
  KEY `HARLOT_ID` (`FORM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`COMMENT_ID`, `TIME`, `NICK_NAME`, `COMMENT`, `FORM_ID`) VALUES
(32, '2017-06-05', 'Чужиков Евгений', 'Когда получил разряд?', 11),
(33, '2017-06-05', 'Меркулов Денис', 'в 7 лет', 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
