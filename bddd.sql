-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 14 2024 г., 18:46
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bddd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Adduser`
--

CREATE TABLE `Adduser` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `workplace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `insta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Adduser`
--

INSERT INTO `Adduser` (`id`, `name`, `workplace`, `telephone`, `adress`, `email`, `password`, `status`, `img`, `vk`, `insta`, `telegram`) VALUES
(1, '', '', '', '', 'John_doe@gmail.com', '$2y$10$kYx0oGsPqRBQT0bnAN.pEu4RpzZdg9eRF2ITu4ut0qRZj3NZKq4iy', '', 'poWjJa2OdQY.jpg', '', '', ''),
(2, '', '', '', '', 'Admin@gmail.com', '$2y$10$I3JMbcYB5X6yf1ZiLj1Xn.L9B2YRVFuduDjcuTvK66IyErq/7DqIm', '', '', '', '', ''),
(3, 'junk', 'google', '666', 'Los Angeles', 'testAddedUser@gmail.com', '$2y$10$60C6vKLhe6TJr4tfJVVir.PYyi9Z9TuaCbPjjoCuxl5nX42WvhftO', 'Не беспокоить', 'nC99J5WbvTU.jpg', 'qwe', 'qwe', 'aasd');

-- --------------------------------------------------------

--
-- Структура таблицы `regUsers`
--

CREATE TABLE `regUsers` (
  `id` int UNSIGNED NOT NULL,
  `emailverify` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `regUsers`
--

INSERT INTO `regUsers` (`id`, `emailverify`, `password`) VALUES
(1, 'John_doe@gmail.com', '$2y$10$kYx0oGsPqRBQT0bnAN.pEu4RpzZdg9eRF2ITu4ut0qRZj3NZKq4iy'),
(2, 'Admin@gmail.com', '$2y$10$I3JMbcYB5X6yf1ZiLj1Xn.L9B2YRVFuduDjcuTvK66IyErq/7DqIm'),
(3, 'testAddedUser@gmail.com', '$2y$10$60C6vKLhe6TJr4tfJVVir.PYyi9Z9TuaCbPjjoCuxl5nX42WvhftO');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Adduser`
--
ALTER TABLE `Adduser`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `regUsers`
--
ALTER TABLE `regUsers`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Adduser`
--
ALTER TABLE `Adduser`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `regUsers`
--
ALTER TABLE `regUsers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
