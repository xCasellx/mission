-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 01 2020 г., 15:27
-- Версия сервера: 5.5.62
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `user_id`, `date`, `text`) VALUES
(1, NULL, 22, '2020-08-29 15:25:14', 'Hi'),
(3, NULL, 24, '2020-09-01 12:24:54', 'hi man'),
(4, 1, 24, '2020-09-01 13:13:21', 'Hi man'),
(5, 4, 24, '2020-09-01 14:38:05', 'Hi'),
(6, 4, 24, '2020-09-01 14:38:27', 'hi'),
(7, 6, 24, '2020-09-01 14:39:01', 'test123123'),
(8, NULL, 24, '2020-09-01 14:39:16', 'foo'),
(9, NULL, 24, '2020-09-01 14:47:20', 'Hi man'),
(10, 7, 24, '2020-09-01 15:06:55', 'test223'),
(11, 10, 24, '2020-09-01 15:07:06', 'tesrrrrrr'),
(12, 11, 24, '2020-09-01 15:08:33', 'hhhh'),
(13, 12, 24, '2020-09-01 15:24:17', 'hi');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `second_name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `town` varchar(30) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `first_name`, `second_name`, `email`, `number`, `date`, `town`, `password`) VALUES
(21, 'Dima', 'Syrotiak', 'syrotyaka@gmail.com', '0969089358', '1999-03-04', 'Комсомольск', '41890cd2ac71e06b5f2c9ad5ccc07b45'),
(22, 'Vova', 'Ivanov', 'Jamser51@gmail.com', '7777777777', '2020-01-29', 'Kremenchyk', '4297f44b13955235245b2497399d7a93'),
(23, 'Dima', 'Syrotiak', 'daggerfeed@gmail.com', '0969089358', '2020-07-30', 'Kremenchyk', '4297f44b13955235245b2497399d7a93'),
(24, 'Dima', 'Syrotiak', 'sypotiak.sbase@gmail.com', '0969089358', '1999-02-04', 'Kremenchyk', '4297f44b13955235245b2497399d7a93');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
