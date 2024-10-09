-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 09 2024 г., 13:18
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
-- База данных: `binocles`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Новое название статьи', 'Новый текст статьи', '2024-02-15 09:24:04'),
(2, 1, 'Пост о жизни', 'Сидел я тут на кухне с друганом и тут он задал такой вопрос...', '2024-02-15 09:24:04'),
(3, 1, 'Еще одна статья', 'Текст еще одной статьи', '2024-02-22 09:56:31'),
(4, 1, 'Еще одна статья', 'Текст еще одной статьи', '2024-02-22 10:47:38'),
(5, 1, 'Еще одна статья', 'Текст еще одной статьи', '2024-02-22 10:47:46'),
(6, 1, 'Еще одна статья', 'Текст еще одной статьи', '2024-03-07 09:43:16'),
(7, 6, 'Статья 1 edited', 'Текст статьи 1 edited', '2024-03-07 10:31:44'),
(8, 6, 'Статья 2 edited', 'Текст статьи 2 edited', '2024-03-07 10:32:34');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `parent_id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `description`) VALUES
(1, 0, 'Прицелы', NULL),
(2, 0, 'Тепловизоры', NULL),
(3, 0, 'Монокуляры', NULL),
(4, 0, 'Подзорные трубы', NULL),
(5, 1, 'Оптические прицелы', NULL),
(6, 1, 'Коллиматорные прицелы', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `owner_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `owner_id`, `title`, `description`, `image`) VALUES
(1, 1, 'title1', 'desc', 'ggg.png');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `old_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no-image.png',
  `is_offer` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `content`, `price`, `old_price`, `description`, `img`, `is_offer`) VALUES
(1, 1, 'Прицел Пилад ПО 4х32 LK (с подсветкой крест с точкой)', 'Прицел Пилад ПО 4х32 LK (с подсветкой крест с точкой)', '1108.00', '1500.00', 'Легко устанавливается на большинство современных российских ружей и карабинов. Надежный, компактный и легкий. Эффективен при стрельбе на ближних и дальних дистанциях. Модель Р4×32LK имеет подсветку прицельной сетки. ', 'no-image.png', 0),
(2, 1, 'Прицел для пневматики Veber Храбрый Заяц 3-7x20 C', 'Прицел для пневматики Veber Храбрый Заяц 3-7x20 C', '2000.00', '3000.00', 'Легкий прицел для легкой пневматики с переменным увеличением от 3х до 7х. Ближняя точка фокусировки при увеличении 3х около 4 метров.', 'no-image.png', 0),
(3, 2, 'Тепловизионный монокуляр iRay AFFO AL 19', 'Тепловизионный монокуляр iRay AFFO AL 19', '9000.00', '9999.00', 'Линейка данной серии имеет мощный сенсор с разрешением 384х288, собственной разработки компании, изготовленный по 12 микронной технологии и высокую чувствительность <40mk.', 'no-image.png', 0),
(4, 2, 'Тепловизионный монокуляр iRay AFFO AL 25', 'Тепловизионный монокуляр iRay AFFO AL 25', '9500.00', '9999.00', 'AFFO AL 25 тепловизионный монокуляр с арсеналом эффективных функций, высокой автономностью и надежностью, а также непревзойденной детализацией изображения на рекордных для тепловизионного спектра дистанциях.  ', 'no-image.png', 0),
(5, 3, 'Монокуляр Levenhuk LabZZ MC2 10x25', 'Монокуляр Levenhuk LabZZ MC2 10x25', '1000.00', '2000.00', 'Десятикратное увеличение позволяет получать стабильное, без смазывания и дрожания, изображение при наблюдении с рук.', 'no-image.png', 0),
(6, 3, 'Монокуляр Levenhuk Wise 8x32', 'Монокуляр Levenhuk Wise 8x32', '4500.00', '7000.00', 'Восьмикратное увеличение позволяет получать стабильное, без смазывания и дрожания, изображение при наблюдении с рук.\r\nБольшой объектив эффективно собирает свет при слабом освещении, что дает возможность наблюдать в сумерки и в туман.', 'no-image.png', 0),
(7, 4, 'Зрительная труба Levenhuk Spyglass SG2', 'Зрительная труба Levenhuk Spyglass SG2', '6700.00', '8900.00', 'Тридцатикратное увеличение позволяет детально рассматривать сильно удаленные объекты.\r\nСкладной металлический корпус имеет адаптер для стационарной установки на штатив.', 'no-image.png', 0),
(8, 4, 'Зрительная труба Veber Pioneer 15-45x60 C', 'Зрительная труба Veber Pioneer 15-45x60 C', '4700.00', '6000.00', 'Широкий диапазон кратностей увеличения позволяет проводить как полевые, так и астрономические наблюдения.\r\nБольшой объектив эффективно собирает свет, что дает возможность наблюдать в сумерки и в туман.', 'no-image.png', 0),
(9, 5, 'Прицел оптический Veber Пневматика 4-16X40 AOE RG', 'Прицел оптический Veber Пневматика 4-16X40 AOE RG', '8000.00', '9100.00', 'Оптический Veber Пневматика 4-16Х40 AOE RG разработан специально для использования с пневматическим оружием пружинно-поршневого типа с дульной энергией до 20 Дж и PCP-типа с предварительной накачкой воздуха любой мощности.', 'no-image.png', 0),
(10, 6, 'Прицел коллиматорный Veber Пневматика 1x22 RG', 'Прицел коллиматорный Veber Пневматика 1x22 RG', '3200.00', '4500.00', 'Объектив диаметром 22 мм и многослойное просветление всех оптических поверхностей дают пользователю широкий обзор и четкую светлую картинку.', 'no-image.png', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nickname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 'admin', 'hash1', 'token1', '2024-02-15 09:22:08'),
(2, 'user', 'user@gmail.com', 1, 'user', 'hash2', 'token2', '2024-02-15 09:22:08'),
(3, 'admin2', 'admin2@gmail.com', 1, 'user', '$2y$10$pS0./5gio3MyYFocwMqdpO2Y1hTt3DHvk63F7jIQUNfIJnM6aMpwC', '9c0f81a92c28009f24312bd40cb33633e85008df', '2024-02-29 09:47:15'),
(4, 'Nastya', 'nastya@gmail.com', 1, 'user', '$2y$10$E3yxVRbI1xbp7bk3BvgPaeXrrHkyLLFXnHPZFn2xQITNNoMwYUtKa', '53b0c4137c58583910cc70c201f141fcd20c00d2', '2024-02-29 10:07:03'),
(5, 'amir', 'amir@gmail.com', 1, 'user', '$2y$10$RR05SfnVXy4O7yj3Mp05R.ONSmV8.odail50oCECiElA2vndIwGSq', '71756f2477b8209e8acaea7473682bd302731ed9', '2024-02-29 10:14:01'),
(6, 'qwerty12345', 'qwerty@mail.ru', 1, 'user', '$2y$10$4N/lE5NdFR0nXI5pcxxBVevHTwCN6TODsvCa2Nb7i6KfcCvgSdGoe', 'f846162da98789458c3acb554d6fc3715fc21713', '2024-02-29 11:10:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
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
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
