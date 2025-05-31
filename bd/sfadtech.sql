-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 31 2025 г., 20:00
-- Версия сервера: 8.0.40
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sfadtech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int NOT NULL,
  `offer` varchar(55) DEFAULT NULL,
  `cost` float(10,3) UNSIGNED DEFAULT NULL,
  `targeturl` varchar(55) DEFAULT NULL,
  `ownername` varchar(40) DEFAULT NULL,
  `topic` text,
  `craftsmen` tinyint UNSIGNED DEFAULT '0',
  `topicstate` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `offer`, `cost`, `targeturl`, `ownername`, `topic`, `craftsmen`, `topicstate`) VALUES
(1, 'test', 1.000, 'https://sf-adtech-php-53/Test', 'client', 'test', 1, 1),
(2, 'testtest', 5.000, 'https://sf-adtech-php-53/Test', 'client', 'testtest', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `redirect`
--

CREATE TABLE `redirect` (
  `id` int NOT NULL,
  `nowdate` date DEFAULT (curdate()),
  `idoffer` int NOT NULL,
  `webmaster` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `redirect`
--

INSERT INTO `redirect` (`id`, `nowdate`, `idoffer`, `webmaster`) VALUES
(1, '2025-05-31', 1, 'webmaster'),
(2, '2025-05-31', 2, 'webmaster');

-- --------------------------------------------------------

--
-- Структура таблицы `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int NOT NULL,
  `id_offer` int NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `web_master` varchar(30) DEFAULT NULL,
  `costing` float(10,3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `id_offer`, `link`, `web_master`, `costing`) VALUES
(1, 1, 'sf-adtech-php-53/<br>Redirect?id=1&wMaster=webmaster', 'webmaster', 0.800),
(2, 2, 'sf-adtech-php-53/<br>Redirect?id=2&wMaster=webmaster', 'webmaster', 4.000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `pass` varchar(55) DEFAULT NULL,
  `rolestatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `rolestatus`) VALUES
(1, 'admin', '7ca17bc05d1de28416a646c71287a436', 'admin'),
(2, 'client', 'dd2c0737a7baa93e5a879ccc97dee480', 'advertiser'),
(3, 'webmaster', '01e0f8bb1118d51f3e9eea615a27a9fe', 'webmaster');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `redirect`
--
ALTER TABLE `redirect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idoffer` (`idoffer`);

--
-- Индексы таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_offer` (`id_offer`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `own` (`user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `redirect`
--
ALTER TABLE `redirect`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `redirect`
--
ALTER TABLE `redirect`
  ADD CONSTRAINT `redirect_ibfk_1` FOREIGN KEY (`idoffer`) REFERENCES `offers` (`id`);

--
-- Ограничения внешнего ключа таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `offers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
