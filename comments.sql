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
(32, '2017-06-05', 'zak', 'zak lox', 11),
(33, '2017-06-05', 'zak', 'yes, i am loh', 11);
