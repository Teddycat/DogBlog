-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 13 2017 г., 01:58
-- Версия сервера: 5.6.34
-- Версия PHP: 5.3.10-1ubuntu3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `Investor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dogcomments`
--

CREATE TABLE IF NOT EXISTS `dogcomments` (
  `dc_id` int(5) NOT NULL AUTO_INCREMENT,
  `dc_article_id` int(5) NOT NULL,
  `dc_text` text NOT NULL,
  `dc_author` varchar(600) NOT NULL,
  PRIMARY KEY (`dc_id`),
  KEY `dc_article_id` (`dc_article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `dogcomments`
--

INSERT INTO `dogcomments` (`dc_id`, `dc_article_id`, `dc_text`, `dc_author`) VALUES
(1, 1, 'Это текст текст текст', 'Джим '),
(2, 1, 'Это текст текст текст', 'Бом'),
(3, 2, 'Это текст текст текст', 'Том');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dogcomments`
--
ALTER TABLE `dogcomments`
  ADD CONSTRAINT `dogcomments_ibfk_1` FOREIGN KEY (`dc_article_id`) REFERENCES `dogarticles` (`da_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
