-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 09 2019 г., 22:49
-- Версия сервера: 5.5.50
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `viskphonebook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Afganistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'England');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'John', 'johnpass'),
(2, 'Jessica', 'jessicapass'),
(3, 'Bill', 'billpass'),
(4, 'Robert', 'robertpass'),
(5, '1', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
  `id` int(11) NOT NULL,
  `uId` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `zipcity` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `phonenumbers` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `emails` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""',
  `publish` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_information`
--

INSERT INTO `user_information` (`id`, `uId`, `firstname`, `lastname`, `address`, `zipcity`, `country`, `phonenumbers`, `emails`, `publish`) VALUES
(1, 1, 'John', 'Smith', 'Park Avenu 34', '543, Luanda', 'Angola', '[{"phonenumbers1":"+3804579850","visiblephone1":"0"},{"phonenumbers2":"+3804579851","visiblephone2":"1"},{"phonenumbers3":"+3804579852","visiblephone3":"1"},{"phonenumbers4":"+3804579853","visiblephone4":"1"}]', '[{"emails1":"login@gmail.com","visibleemail1":"0"},{"emails2":"workmail@gmail.com","visibleemail2":"0"},{"emails3":"john@gmail.com","visibleemail3":"1"},{"emails4":"johnhi@work.ukr","visibleemail4":"0"},{"emails5":"testmail@gmail.com","visibleemail5":"0"},{"emails6":"smith@mail.ru","visibleemail6":"1"},{"emails7":"johnsmith@mail.ru","visibleemail7":"1"},{"emails8":"johnni@work.ua","visibleemail8":"1"},{"emails9":"johnni@oxo.ru","visibleemail9":"1"}]', 1),
(2, 2, 'Jessica', 'Brown', 'Kharkivska', '897, Pas de la Casa', 'Andorra', '[{"phonenumbers1":"+38050271401","visiblephone1":"0"},{"phonenumbers2":"+38050271402","visiblephone2":"1"},{"phonenumbers3":"+38050271403","visiblephone3":"1"},{"phonenumbers4":"+38050271404","visiblephone4":"1"}]', '[{"emails1":"jess@gmail.com","visibleemail1":"1"},{"emails2":"jessmail@gmail.com","visibleemail2":"1"},{"emails3":"jessmail@mail.ru","visibleemail3":"0"}]', 1),
(3, 3, 'Bill', 'Black', 'Zulu 28', '123, Tirana', 'Afganistan', '[{"phonenumbers1":"+3806662451","visiblephone1":"1"},{"phonenumbers2":"+3806662452","visiblephone2":"0"},{"phonenumbers3":"+3806662453","visiblephone3":"1"},{"phonenumbers4":"+3806662454","visiblephone4":"1"}]', '[{"emails1":"bill@gmail.com","visibleemail1":"1"},{"emails2":"bill@mail.ru","visibleemail2":"1"},{"emails3":"bill@work.ua","visibleemail3":"1"},{"emails4":"hellobill@mail.ru","visibleemail4":"1"}]', 1),
(4, 4, 'Robert', 'Grey', 'Main Street 23', '75, Algeria', 'Algeria', '[{"phonenumbers1":"123","visiblephone1":"0"},{"phonenumbers2":"324","visiblephone2":"1"},{"phonenumbers3":"789","visiblephone3":"1"},{"phonenumbers4":"","visiblephone4":"0"}]', '[{"emails1":"login@gmail.com","visibleemail1":"1"},{"emails2":"error@gmail.com","visibleemail2":"0"}]', 0),
(5, 5, '', '', '', '', 'Afganistan', '[{"phonenumbers1":"","visiblephone1":"0"}]', '[{"emails1":"","visibleemail1":"0"}]', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uId` (`uId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_information`
--
ALTER TABLE `user_information`
  ADD CONSTRAINT `user_information_ibfk_1` FOREIGN KEY (`uId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
