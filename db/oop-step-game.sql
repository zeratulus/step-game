-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 10 2018 г., 15:15
-- Версия сервера: 5.7.21-0ubuntu0.17.10.1
-- Версия PHP: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oop-step-game`
--

-- --------------------------------------------------------

--
-- Структура таблицы `battles`
--

CREATE TABLE `battles` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `p_hp` int(11) NOT NULL,
  `p_ap` int(11) NOT NULL,
  `p_mp` int(11) NOT NULL,
  `e_hp` int(11) NOT NULL,
  `e_ap` int(11) NOT NULL,
  `e_mp` int(11) NOT NULL,
  `enemy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `battles`
--

INSERT INTO `battles` (`id`, `player_id`, `p_hp`, `p_ap`, `p_mp`, `e_hp`, `e_ap`, `e_mp`, `enemy_id`) VALUES
(4, 1, 100, 100, 100, 70, 30, 0, 1),
(5, 1, 100, 100, 100, 80, 50, 0, 2),
(6, 1, 100, 100, 100, 80, 50, 0, 2),
(7, 1, 100, 100, 100, 80, 50, 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `enemies`
--

CREATE TABLE `enemies` (
  `enemy_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `ap` int(11) NOT NULL,
  `armor_type` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  `damage_type` int(11) NOT NULL,
  `skills_id` int(11) NOT NULL,
  `gain_xp` int(11) NOT NULL,
  `gain_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `enemies`
--

INSERT INTO `enemies` (`enemy_id`, `name`, `image`, `hp`, `mp`, `ap`, `armor_type`, `speed`, `damage`, `damage_type`, `skills_id`, `gain_xp`, `gain_price`) VALUES
(1, 'A terrible slug', 'img/slim.jpg', 70, 0, 30, 1, 1, 5, 2, 0, 25, 10),
(2, 'A monster slug', 'img/slim.jpg', 80, 0, 50, 1, 1, 8, 2, 0, 25, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `email` text NOT NULL,
  `hash` text NOT NULL,
  `salt` text NOT NULL,
  `lvl` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `players`
--

INSERT INTO `players` (`id`, `login`, `email`, `hash`, `salt`, `lvl`, `exp`, `gold`, `items_id`) VALUES
(1, 'test', 'test@test.test', '3ffa6ebb2975fa3789d49842c83abf33', 'swrPe557QcPqpqP3l5dQULc59TFw7jRM', 0, 0, 0, 0),
(2, 'ailus665', 'ailus665@gmail.com', '68bff9fc96242c3782c339b29d562693', 'PDrJBdz6OTH9hQ78PWcWNeqJ060CjfS3', 0, 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `battles`
--
ALTER TABLE `battles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `enemies`
--
ALTER TABLE `enemies`
  ADD PRIMARY KEY (`enemy_id`);

--
-- Индексы таблицы `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `battles`
--
ALTER TABLE `battles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `enemies`
--
ALTER TABLE `enemies`
  MODIFY `enemy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
