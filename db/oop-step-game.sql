-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 05 2018 г., 17:31
-- Версия сервера: 5.7.20-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

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
(1, 1, 55, 0, 30, 15, 60, 75, 1);

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `battles`
--
ALTER TABLE `battles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `enemies`
--
ALTER TABLE `enemies`
  MODIFY `enemy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
