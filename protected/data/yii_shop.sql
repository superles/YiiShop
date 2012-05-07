--
-- База данных: `yii_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_book`
--

CREATE TABLE IF NOT EXISTS `tbl_book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `book_type` int(11) DEFAULT NULL,
  `release_date` int(11) DEFAULT NULL,
  `num_pages` int(11) DEFAULT NULL,
  `price` float(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `title`, `author`, `description`, `book_type`, `release_date`, `num_pages`, `price`) VALUES
(1, 'PHP. Объекты, шаблоны и методики программирования', 'Мэтт Зандстра', '<p><span style="font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; background-color: rgb(255, 255, 255); ">За последние десять лет PHP буквально охватила объектно-ориентированная революция, причем это относится как к самим средствам языка, так и к разработчикам, использующим эти средства, и к приложениям, которые они создают. Теперь основной акцент делается на объектах и объектно-ориентированном подходе к проектированию. Существует еще один момент, связанный с этим и также прочно укоренившийся в современные методики разработки объектно-ориентированных приложений. Речь идет об использовании средств и методик, благодаря которым достигается успешное выполнение проекта, осуществляется эффективное управление группами разработчиков и повышается качество кода.&nbsp;</span><br style="font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; background-color: rgb(255, 255, 255); " />\r\n<span style="font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 17px; background-color: rgb(255, 255, 255); ">Книга начинается с обзора объектно-ориентированных возможностей PHP, в который включены важные темы, наподобие</span></p>', 3, 1335816000, 800, 630.00);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_book_type`
--

CREATE TABLE IF NOT EXISTS `tbl_book_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `tbl_book_type`
--

INSERT INTO `tbl_book_type` (`id`, `title`, `parent_id`, `url`) VALUES
(1, 'Корень', 1, 'koren'),
(2, 'Программирование', 1, 'programmirovanie'),
(3, 'PHP', 2, 'php'),
(4, 'Верстка', 1, 'verstka');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES
(1, 'Admin', 'Administrator', '0000-00-00'),
(2, 'Demo', 'Demo', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_purchase`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `books_id` varchar(128) NOT NULL,
  `price` double NOT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1336357453, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 0, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
