--
-- Структура таблицы forms
--

CREATE TABLE IF NOT EXISTS forms (
  id int(11) NOT NULL AUTO_INCREMENT,
  fio varchar(50)NOT NULL,
  birth varchar(10) NOT NULL,
  kind_of_sport varchar(50) NOT NULL,
  faculty varchar(30) NOT NULL,
  level varchar(30) NOT NULL,
  achievements varchar(500) NOT NULL,
  phone varchar(11) NOT NULL,
  email varchar(30) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы forms
--

INSERT INTO `forms` (`id`, `fio`, `birth`, `kind_of_sport`, `faculty`, `level`, `achievements`, `phone`, `email`) VALUES
(11, 'Серый питух', '27.12.2018', 'Тхэквондо', 'ФКН', '1', 'Чемпион области', '21366182368', 'mail'),
(12, 'Серый лох', '6.08.1995', 'Крестики-нолики(спортивные)', 'ФКН', '3 юношеский', '3 место на классовом чемпионате в школе 9 класс ', '567890', 'mail@mail.ru');

