-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 19 2023 г., 00:01
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `image`) VALUES
(1, 'КУРТКА ДЖИНСОВАЯ ЧЕРНАЯ', 12990, 'img/product1.png'),
(2, 'ДЖИНСЫ-ТРАНСФОРМЕРЫ ЧЕРНЫЕ', 12990, 'img/product2.png'),
(3, 'КУРТКА-КИМОНО ЧЕРНАЯ', 7990, 'img/product3.png'),
(4, 'ФУТБОЛКА ЧЕРНАЯ', 5990, 'img/product4.png'),
(5, 'ПЛАТЬЕ ДВУХСЛОЙНОЕ ЧЕРНОЕ', 7490, 'img/product5.png'),
(6, 'РУБАШКА-ТРАНСФОРМЕР ЧЕРНАЯ', 12990, 'img/product6.png'),
(7, 'КОСТЮМ ЧЕРНЫЙ', 9490, 'img/product7.png'),
(8, 'МАНТИЯ ЧЕРНАЯ', 10490, 'img/product8.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`) VALUES
(1, 'Darya', '48474f975022f960bc2afbe49be581e8'),
(2, 'Ilya', 'cb8915badd330f08e96e522ed25ef6d7');

-- --------------------------------------------------------

--
-- Структура таблицы `users_goods`
--

CREATE TABLE IF NOT EXISTS `users_goods` (
  `user_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`good_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_goods`
--

INSERT INTO `users_goods` (`user_id`, `good_id`, `quantity`) VALUES
(1, 3, 3),
(1, 6, 5),
(1, 7, 3),
(1, 2, 1),
(1, 1, 2),
(2, 7, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
