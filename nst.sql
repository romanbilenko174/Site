-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 16 2018 г., 00:33
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nst`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actions`
--

INSERT INTO `actions` (`id`, `title`, `startdate`, `enddate`, `data`) VALUES
(1, 'При покупке теплого пола терморегулятор в подарок', '2018-03-01', '2018-03-30', 'При покупке теплого пола на сумму более 5000 рублей вы получаете терморегулятор \"DEVI\" в подарок!'),
(2, 'При заказе входной двери с установкой бесплатный выезд замерщика', '2018-03-01', '2018-03-30', 'При покупке входной двери стоимостью более 4000 рублей, а также заказе установки данной двери - выезд замерщика бесплатно!'),
(3, 'Доставка по городу бесплатно!', '2018-03-01', '2018-03-30', 'При заказе на сумму более 3000 рублей доставка по г. Челябинску и г. Копейску бесплатно!'),
(4, 'При покупке 3 рулонов обоев клей в подарок!', '2018-03-01', '2018-03-30', 'При покупке 3 рулонов обоев компании Erismann клей Quelyd в подарок!');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `sort_order`, `status`) VALUES
(13, 'Напольные покрытия', 1, 1),
(14, 'Двери', 2, 1),
(15, 'Сантехника', 3, 1),
(16, 'Древесно-плитные-материалы', 4, 1),
(17, 'Кровля и фасад', 5, 1),
(18, 'Теплые полы', 6, 1),
(19, 'Гипсокартон и СМЛ', 7, 1),
(20, 'Теплоизоляция', 8, 1),
(21, 'Сухие строительные смеси', 9, 1),
(22, 'Лакокрасочные материалы', 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `description`, `status`) VALUES
(46, 'Линолиеум Tarkett Идилия Оксфорд 2', 13, 101, 483, 1, 'Tarkett', '', 1),
(47, 'Дверь', 14, 102, 5500, 1, 'Гардиан', '', 1),
(49, 'Ванна', 15, 103, 9500, 1, 'Акватек', '', 1),
(50, 'ДСП', 16, 104, 650, 1, 'СП-25', '', 1),
(51, 'Металлочерепица', 17, 105, 780, 1, '', '', 1),
(52, 'Гибкая черепица', 17, 105, 1234, 1, '', '', 1),
(53, 'Теплый пол', 18, 106, 1243, 1, '', '', 1),
(54, 'Шпаклевка готовая', 21, 106, 483, 1, 'Ceresit', 'Шпаклевка для домашнего использования Шпаклевка для домашнего использованияШпаклевка для домашнего использованияШпаклевка для домашнего использованияШпаклевка для домашнего использованияШпаклевка для домашнего использованияШпаклевка для домашнего использования', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `short_data` varchar(500) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `author`, `short_data`, `data`) VALUES
(2, 'Новость №1', '2018-02-14', 'Евгенов Е.Е.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a accumsan sapien. Morbi ipsum tellus, feugiat sit amet varius auctor, tempus id metus. Ut ut purus vulputate, mollis quam sit amet, facilisis libero. Quisque vitae bibendum tortor. Aliquam erat volutpat. Nullam quis aliquam lacus, ut ultricies urna. Sed at nunc magna. Pellentesque sagittis, elit quis malesuada bibendum, mi urna mattis arcu, sed placerat purus velit a dui. Nunc fermentum placerat consectetur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a accumsan sapien. Morbi ipsum tellus, feugiat sit amet varius auctor, tempus id metus. Ut ut purus vulputate, mollis quam sit amet, facilisis libero. Quisque vitae bibendum tortor. Aliquam erat volutpat. Nullam quis aliquam lacus, ut ultricies urna. Sed at nunc magna. Pellentesque sagittis, elit quis malesuada bibendum, mi urna mattis arcu, sed placerat purus velit a dui. Nunc fermentum placerat consecteturLorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a accumsan sapien. Morbi ipsum tellus, feugiat sit amet varius auctor, tempus id metus. Ut ut purus vulputate, mollis quam sit amet, facilisis libero. Quisque vitae bibendum tortor. Aliquam erat volutpat. Nullam quis aliquam lacus, ut ultricies urna. Sed at nunc magna. Pellentesque sagittis, elit quis malesuada bibendum, mi urna mattis arcu, sed placerat purus velit a dui. Nunc fermentum placerat consectetur'),
(3, 'Новость №2', '2018-02-07', 'Иванов И.И.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a accumsan sapien. Morbi ipsum tellus, feugiat sit amet varius auctor, tempus id metus. Ut ut purus vulputate, mollis quam sit amet, facilisis libero. Quisque vitae bibendum tortor. Aliquam erat volutpat. Nullam quis aliquam lacus, ut ultricies urna. Sed at nunc magna.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a accumsan sapien. Morbi ipsum tellus, feugiat sit amet varius auctor, tempus id metus. Ut ut purus vulputate, mollis quam sit amet, facilisis libero. Quisque vitae bibendum tortor. Aliquam erat volutpat. Nullam quis aliquam lacus, ut ultricies urna. Sed at nunc magna.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a accumsan sapien. Morbi ipsum tellus, feugiat sit amet varius auctor, tempus id metus. Ut ut purus vulputate, mollis quam sit amet, facilisis libero. Quisque vitae bibendum tortor. Aliquam erat volutpat. Nullam quis aliquam lacus, ut ultricies urna. Sed at nunc magna.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_adress` varchar(50) NOT NULL,
  `user_comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_phone`, `user_adress`, `user_comment`, `date`, `products`, `status`) VALUES
(47, 'Qbzer5', '88005553535', '', 'Test', '2018-02-13 18:51:52', '{\"48\":1,\"47\":1}', 1),
(48, 'qbzer12', '88005553535', '', '1233', '2018-02-27 20:06:01', '{\"54\":1}', 1),
(49, 'qbzere5', '12312312314', '', 'asdas', '2018-02-28 08:52:59', '{\"50\":1}', 1),
(50, 'Роман', '+7 (800) 555 35', 'ул. Курчатова 7', 'sddsdsas', '2018-03-15 20:03:15', '{\"54\":1}', 1),
(51, 'Роман', '+7 (800) 555 35', 'ул. Курчатова 7', 'sddsdsas', '2018-03-15 20:04:16', 'false', 1),
(52, 'Роман', '+7 (800) 555 35', 'ул. Курчатова 7', 'sds', '2018-03-15 20:07:14', '{\"54\":1}', 1),
(53, 'Роман', '+7 (800) 555 35', 'ул. Курчатова 7', 'asds', '2018-03-15 21:30:47', '{\"54\":3}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `adress`) VALUES
(6, 'romanb', 'romanb@mail.ru', '$2y$10$5iZc9hFEN66d1B5tvze9kesd8S5UCKQwMPb50HNtMCpe1/Mgox7xq', '', ''),
(7, 'Роман', 'qbzer5@mail.ru', '$2y$10$d3JOdHRs667E9d.0.k/E4OfOccRiuVLGO7eba0KIXBcaaLnso8iD2', '+7 (800) 555 35', 'ул. Курчатова 7'),
(8, 'test', 'test123@mail.ru', '$2y$10$LbX236uiuBh89Rzhg0M7IuBQd5tPj2p0A7zHFwugT9pZDmsrxeylC', '', ''),
(9, 'test', 'test2@mail.ru', '$2y$10$ytnjh0HThdqvyAhRt/tsq.FYAcX3H9C/0Rez30F7UqRpZdQxAYske', '', ''),
(10, 'test12', 'test13@mail.ru', '$2y$10$KToqi.7phv6CIhJP7CBfz.SJCOJAewmj9GdHQ0i3DXQlglv1OO/PC', '', ''),
(11, 'testreg', 'testreg@mail.ru', '$2y$10$I0gbw6jM8/MBwnrOo09ctenAtXFtdiD8zqJfb2mqnjog3XOnlm6Aa', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
