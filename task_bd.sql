-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 06 2018 р., 22:14
-- Версія сервера: 5.5.50
-- Версія PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `task_bd`
--

-- --------------------------------------------------------

--
-- Структура таблиці `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id_c` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(300) NOT NULL,
  `id_u` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `courses`
--

INSERT INTO `courses` (`id_c`, `name`, `url`, `id_u`) VALUES
(13, 'nnn', 'nnn', 26),
(16, 'task1', 'task1', 26),
(17, 'task2', 'task2', 26),
(18, 'task3', 'task3', 26);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(111) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_register` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id_u`, `name`, `email`, `password`, `date_register`) VALUES
(14, 'igor', 'igor@mail.ru', '123456789', '2017-10-18 10:10:54'),
(19, 'teach', 'roma_2@meta.ua', '123456', '2017-10-18 20:10:42'),
(21, 'teach21', 'roma3@meta.ua', '123456', '2017-10-18 20:10:18'),
(26, 'roman2', 'rom@rom.ua', 'roma2018', '2018-03-06 13:03:49'),
(27, 'rom2', 'rom@rom.ua2', 'roma2018', '2018-03-06 13:03:18'),
(28, 'roma2', 'rom2@rom.ua', 'roma2018', '2018-03-06 13:03:27'),
(29, 'rom3', 'r3om@rom.ua', 'roma2018', '2018-03-06 13:03:11');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_c`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`),
  ADD UNIQUE KEY `emai` (`email`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_u_2` (`id_u`),
  ADD KEY `id_u_3` (`id_u`),
  ADD KEY `id_u_4` (`id_u`),
  ADD KEY `id_u_5` (`id_u`),
  ADD KEY `id_u_6` (`id_u`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `courses`
--
ALTER TABLE `courses`
  MODIFY `id_c` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
