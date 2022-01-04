-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 04 2022 г., 14:19
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lab`
--

-- --------------------------------------------------------

--
-- Структура таблицы `list_of_companies`
--

CREATE TABLE `list_of_companies` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` blob NOT NULL,
  `region` int NOT NULL,
  `description` text NOT NULL,
  `output_in_rubles` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `list_of_companies`
--

INSERT INTO `list_of_companies` (`id`, `name`, `image`, `region`, `description`, `output_in_rubles`) VALUES
(1, 'Mak', '', 1, 'dsds', 1000000),
(2, 'apple', '', 2, 'dsdsdsd', 1000),
(3, 'LapshaRu', '', 3, 'dsdsadsax', 1000000),
(4, 'IBM', '', 4, 'dgthththt', 1000),
(5, 'microsoft', '', 5, 'lklml', 100000000),
(6, 'intervolga', '', 6, 'ooooo', 1000),
(7, 'magnit', '', 7, 'mnmnm', 1000),
(8, 'kfc', '', 8, 'uuuuu', 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `list_of_indicators`
--

CREATE TABLE `list_of_indicators` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `list_of_indicators`
--

INSERT INTO `list_of_indicators` (`id`, `name`, `type`) VALUES
(1, 'output', 'rub'),
(2, 'percent', '%'),
(3, 'worked', 'h');

-- --------------------------------------------------------

--
-- Структура таблицы `list_of_regions`
--

CREATE TABLE `list_of_regions` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `list_of_regions`
--

INSERT INTO `list_of_regions` (`id`, `name`) VALUES
(1, 'vlg'),
(2, 'ekb'),
(3, 'cb'),
(4, 'spb'),
(5, 'msk'),
(6, 'sar'),
(7, 'uf'),
(8, 'vl');

-- --------------------------------------------------------

--
-- Структура таблицы `log_entries`
--

CREATE TABLE `log_entries` (
  `id` int NOT NULL,
  `id_company` int NOT NULL,
  `year` date NOT NULL,
  `id_indicators` int NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `log_entries`
--

INSERT INTO `log_entries` (`id`, `id_company`, `year`, `id_indicators`, `value`) VALUES
(1, 1, '2021-06-08', 1, 1000000),
(2, 2, '2019-01-22', 2, 1000),
(15, 3, '2021-07-09', 3, 1000000),
(16, 4, '2017-02-12', 2, 1000),
(17, 5, '2019-06-30', 1, 1000),
(18, 6, '2019-04-04', 1, 1000),
(19, 7, '2015-02-22', 2, 1000),
(20, 8, '2016-08-22', 3, 1000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `list_of_companies`
--
ALTER TABLE `list_of_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_of_companies_fk0` (`region`);

--
-- Индексы таблицы `list_of_indicators`
--
ALTER TABLE `list_of_indicators`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `list_of_regions`
--
ALTER TABLE `list_of_regions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log_entries`
--
ALTER TABLE `log_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_entries_fk0` (`id_company`),
  ADD KEY `log_entries_fk1` (`id_indicators`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `list_of_companies`
--
ALTER TABLE `list_of_companies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `list_of_indicators`
--
ALTER TABLE `list_of_indicators`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `list_of_regions`
--
ALTER TABLE `list_of_regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `log_entries`
--
ALTER TABLE `log_entries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `list_of_companies`
--
ALTER TABLE `list_of_companies`
  ADD CONSTRAINT `list_of_companies_fk0` FOREIGN KEY (`region`) REFERENCES `list_of_regions` (`id`);

--
-- Ограничения внешнего ключа таблицы `log_entries`
--
ALTER TABLE `log_entries`
  ADD CONSTRAINT `log_entries_fk0` FOREIGN KEY (`id_company`) REFERENCES `list_of_companies` (`id`),
  ADD CONSTRAINT `log_entries_fk1` FOREIGN KEY (`id_indicators`) REFERENCES `list_of_indicators` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
