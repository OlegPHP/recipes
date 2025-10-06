-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 30 2025 г., 18:09
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `recipes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `title`) VALUES
(1, NULL, NULL, 'Завтраки'),
(2, NULL, NULL, 'Холодные закуски'),
(3, NULL, NULL, 'Горячие закуски'),
(4, NULL, NULL, 'Салаты'),
(5, NULL, NULL, 'Первые блюда (супы)'),
(6, NULL, NULL, 'Вторые (основные) блюда'),
(7, NULL, NULL, 'Гарниры'),
(8, NULL, NULL, 'Десерты'),
(9, NULL, NULL, 'Напитки'),
(10, NULL, NULL, 'Хлебобулочные изделия');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `quantity`, `recipe_id`, `created_at`, `updated_at`) VALUES
(1, 'Кваша', '1 штуку', 1, '2025-09-15 11:46:27', '2025-09-15 11:46:27'),
(6, 'wefwqfewf', '44', 3, '2025-09-15 14:34:36', '2025-09-15 14:34:36'),
(7, 'wqefwfg', '355', 3, '2025-09-15 14:34:36', '2025-09-15 14:34:36'),
(8, 'efregrggred', '2443', 3, '2025-09-15 14:34:36', '2025-09-15 14:34:36'),
(9, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'eeeeeee', 4, '2025-09-15 14:37:50', '2025-09-15 14:37:50'),
(10, 'вввввввввв', 'ввввввввввввв', 5, '2025-09-15 15:05:04', '2025-09-15 15:05:04'),
(11, 'ddd', 'ddd', 6, '2025-09-15 15:09:54', '2025-09-15 15:09:54'),
(12, 'ssss', 'dddd', 6, '2025-09-15 15:09:54', '2025-09-15 15:09:54'),
(13, 'уауауа', 'уауау', 7, '2025-09-16 09:24:19', '2025-09-16 09:24:19'),
(15, 'xededw', 'какака', 9, '2025-09-16 09:29:21', '2025-09-16 09:29:21'),
(16, 'уакуак', 'кака', 9, '2025-09-16 09:29:21', '2025-09-16 09:29:21'),
(17, 'ddd', 'ddd', 10, '2025-09-16 09:46:31', '2025-09-16 09:46:31'),
(18, 'sdsddsdsds', 'ddd', 11, '2025-09-16 09:47:42', '2025-09-16 09:47:42'),
(21, 'ddd', 'dd', 14, '2025-09-16 10:05:46', '2025-09-16 10:05:46'),
(22, 'df', 'df', 15, '2025-09-16 10:07:41', '2025-09-16 10:07:41'),
(23, 'eded', 'eded', 16, '2025-09-16 10:22:09', '2025-09-16 10:22:09'),
(24, 'Свиная шея', '2 кг', 17, '2025-09-16 14:39:34', '2025-09-16 14:39:34'),
(25, 'Лук репчатый', '1 кг', 17, '2025-09-16 14:39:34', '2025-09-16 14:39:34'),
(26, 'Соль', '10 гр', 17, '2025-09-16 14:39:34', '2025-09-16 14:39:34'),
(27, 'Черный перец', '10 гр', 17, '2025-09-16 14:39:34', '2025-09-16 14:39:34'),
(28, 'ss', 'ss', 18, '2025-09-16 15:15:20', '2025-09-16 15:15:20'),
(37, 'Сусло', '100 мл', 2, '2025-09-18 12:37:30', '2025-09-18 12:37:30'),
(38, 'Вода', '1 литр', 2, '2025-09-18 12:37:30', '2025-09-18 12:37:30'),
(39, 'Дрожжи сухие', '8 гр', 2, '2025-09-18 12:37:30', '2025-09-18 12:37:30'),
(40, 'Водка', '1 литр', 19, '2025-09-19 13:43:19', '2025-09-19 13:43:19'),
(42, 'мясо', '22', 20, '2025-09-23 09:38:01', '2025-09-23 09:38:01'),
(43, 'ывв', 'выв', 21, '2025-09-24 13:51:03', '2025-09-24 13:51:03'),
(44, 'ывв', 'ывв', 21, '2025-09-24 13:51:03', '2025-09-24 13:51:03'),
(46, 'ddd', 'dd', 13, '2025-09-25 08:25:33', '2025-09-25 08:25:33'),
(47, 'конь', '1 шт', 13, '2025-09-25 08:25:33', '2025-09-25 08:25:33'),
(48, 'Трюфели', '1 кг', 22, '2025-09-25 08:28:23', '2025-09-25 08:28:23'),
(49, 'Радость', '1кг', 22, '2025-09-25 08:28:23', '2025-09-25 08:28:23'),
(66, 'Крыло куриное', '1 кг', 23, '2025-09-25 09:08:20', '2025-09-25 09:08:20'),
(67, 'Соль', '10 г', 23, '2025-09-25 09:08:20', '2025-09-25 09:08:20'),
(68, 'Перец', '10 г', 23, '2025-09-25 09:08:20', '2025-09-25 09:08:20'),
(69, 'Масло растительное', '4 ст л', 23, '2025-09-25 09:08:20', '2025-09-25 09:08:20');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_08_130116_create_categories_table', 1),
(5, '2025_09_08_130131_create_recipes_table', 1),
(6, '2025_09_12_114440_create_ingredients_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recipes`
--

INSERT INTO `recipes` (`id`, `created_at`, `updated_at`, `title`, `description`, `content`, `image`, `category_id`, `user_id`) VALUES
(1, '2025-09-15 11:46:27', '2025-09-15 11:46:27', 'Простокваша', 'Просто квасим. Просто квашу.', 'Ну берем все и туда.', 'images/IdrOvp76zS2TMlpqtUVFLxFvwq1DtuJX1N5IiqVP.jpg', 9, 1),
(2, '2025-09-15 14:27:32', '2025-09-18 12:28:04', 'Квас', 'Вкусный напиток, но не пиво1', 'Сначала купить сусло. В него добавить сахар и дрожжи. Потом все это смешать с водой и дать постоять сутки. После этого можно пить.', NULL, 9, 1),
(3, '2025-09-15 14:34:36', '2025-09-15 14:34:36', 'Flsfjlewjflwfwlkffe', 'skjkvkhvereeruhgewiveoihufe', '1kcnlkervebvrvknrtknktrnkrntrk\r\n2vvtrbtrhryhhythjythrtrgjtttttttttttttttttlgj;wirehgnghreg;agrgrehgerg;ewger/\r\n3re;lgjelrglewngrehge;lmglergkjewn;lrngl;lenflkjeghewnglewmlehlvlkrejgiehlewnglkem\r\n4fergwknerlg;re;gjrehgkenjnfkjafhhfdsahfkjsanfjdsgkjsakdfhksal;hksnaghg;rhtreglkdsafkjshfskfdskhfiurhgrnfkfeuhgfnurgiwqhhr;lwqnfjfkgekffjdfjflksjfetynsjdl;ld', 'images/OyEZZygcJ0XUVQvxB64X8j4OizLuvvnuWRGNXCl7.jpg', 1, 1),
(4, '2025-09-15 14:37:50', '2025-09-15 14:37:50', 'eeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, 1, 1),
(5, '2025-09-15 15:05:04', '2025-09-15 15:05:04', 'цццццццццццццццц', 'ццццццццц ццццццццццццц ццццццц', '1.  ввввввввввв вввввввввввввввввв вввввввввв ввввввввввв ввввввввввввв ввввввввввввв ввввввввввввввввввввввв ввввввввв ввввввв вввввввввв вввввввввввв вввввввввввв \r\n2. ввввввввввввввввввввввввввввв вввввввввввввввввввввв вввввввввввввввввввввввввввв вввввввввввввввввввввввв вввввввввввввввввввввввв \r\n3. аааааааааааааа аааааааааааааааааа ааааааааааааааа ааааааааааааааааа аааааааааааа', 'images/CX3WcWpphPV1iVROkSN09cQ9RUTwJ9mDqNO9fRti.jpg', 1, 1),
(6, '2025-09-15 15:09:54', '2025-09-15 15:09:54', 'gjgjgjg', 'hfaskhfksaf khfefwafew', 'efewdewfewf', NULL, 9, 1),
(7, '2025-09-16 09:24:19', '2025-09-16 09:24:19', 'сувувуву', 'цуавуацакуцау', 'уауауауауа', NULL, 7, 1),
(9, '2025-09-16 09:29:21', '2025-09-16 09:29:21', 'sxsxsx', 'sxsxsx', 'xsdfsss', NULL, 1, 1),
(10, '2025-09-16 09:46:31', '2025-09-16 09:46:31', 'dddddd', 'ddd', 'ddddd', NULL, 9, 1),
(11, '2025-09-16 09:47:42', '2025-09-16 09:47:42', 'dddd', 'ddsdsd', 'sdsdsd', NULL, 6, 1),
(13, '2025-09-16 10:04:00', '2025-09-16 10:04:00', 'ddd', 'ddd', 'fff', NULL, 8, 1),
(14, '2025-09-16 10:05:46', '2025-09-16 10:05:46', 'dd', 'ddd', 'ddd', NULL, 9, 1),
(15, '2025-09-16 10:07:41', '2025-09-16 10:07:41', 'fdf', 'sfdsf', 'sf', NULL, 10, 1),
(16, '2025-09-16 10:22:09', '2025-09-16 10:22:09', 'eeee', 'edede', 'ede', NULL, 8, 1),
(17, '2025-09-16 14:39:34', '2025-09-16 14:39:34', 'Шашлык из свинины в луковом маринаде', 'У меня есть несколько рецептов маринада для шашлыка, однако я постоянно читаю в комментариях о том, что самый лучший маринад – это соль, перец и лук! В этом рецепте я решил продемонстрировать именно идеальный, по мнению большинства, рецепт шашлыка. Соль, перец, лук - и ничего более!', 'Если мы готовим шашлык из свинины, самым лучшим отрубом является свиная шея.\r\nДля маринования шашлыка я обычно использую лук в пропорции 1:2, то есть на 2 кг свиной шеи я буду использовать 1 кг лука.\r\nНарезаем свиную шею кусками. От размеров этих кусков будет зависеть, как быстро шашлык промаринуется и приготовится, а также насколько сочным он получится в итоге. Рекомендую нарезать мясо на куски размером примерно 4-5 см, не более.\r\nОчищаем лук и нарезаем его кольцами. Забегая вперед, скажу, что не так важно нарезать лук именно кольцами, потому что он используется только для маринования мяса, а потом выбрасывается. Однако кольцами нарезать его, на мой взгляд, проще всего.\r\nПомещаем лук в глубокую миску или небольшую кастрюлю. Добавляем соль. Переминаем лук вместе с солью, пока он не станет совсем мягким и не отдаст весь содержащийся в нём сок.\r\nПерекладываем мясо в эмалированную (стеклянную, глиняную либо керамическую) посуду. Добавляем к мясу соль и свежемолотый перец. Перемешиваем содержимое ёмкости для маринования, чтобы специи равномерно распределились по каждому куску мяса.\r\nДобавляем к мясу лук и перемешиваем их вместе. В самом конце придавливаем мясо руками, чтобы выгнать лишний воздух. При мариновании шашлыка он будет только мешать.\r\nЧтобы мясо как следует промариновалось, я рекомендую подержать его в маринаде 3-4 часа.\r\nВажным моментом является то, что вы должны на шампура насаживать только мясо. Если на шампурах вместе с мясом окажется ещё и лук, то на углях он просто подгорит, и шашлык окажется менее вкусным.\r\n\r\nРазводим угли в мангале. Не спешите сразу выкладывать шашлык на мангал. Дайте углям немного остыть и подёрнуться пеплом.\r\n\r\nВыкладываем шашлык на мангал. Во время того, как шашлык будет жариться, важно не отходить от него и внимательно следить за тем, чтобы в мангале не было огня. В противном случае ваш шашлык легко может сгореть. Также нужно достаточно часто переворачивать шампуры с шашлыком.\r\nЖарится шашлык из свинины на среднем жаре около 20 минут. После этого он будет полностью готов и его можно снимать с огня. Чтобы проверить готовность шашлыка, нужно надрезать кусок мяса и убедиться, что он полностью прожарен внутри.\r\nСервируем шашлык на тарелке, предварительно положив на неё лаваш. Сверху шашлык украшаем маринованным или обычным свежим репчатым луком. По желанию можно добавить зелень.\r\nПриятного аппетита!', 'images/ReoleCAQytTprmIxnCIrOb6zJoOAn5hvmWGRJpBi.jpg', 6, 1),
(18, '2025-09-16 15:15:20', '2025-09-16 15:15:20', 'ssss', 'ss', 'sss', NULL, 8, 1),
(19, '2025-09-19 13:43:19', '2025-09-19 13:43:19', 'Бромоло', 'Крепкая штука', 'Берем литровый стакан и туда ее, а потом в рот.', NULL, 9, 1),
(20, '2025-09-23 09:38:01', '2025-09-23 09:38:01', 'Колбасень', 'оооооооооооооооооооооо', 'Ну все туда, а потом в рот.', NULL, 9, 1),
(21, '2025-09-24 13:51:03', '2025-09-24 13:51:03', 'ывывыывывывы', 'вывыв', 'ывыв', 'images/vOoJQP0mCY1XC1sA3c5eS6GCJF0vJZxq6VerWzcG.png', 9, 1),
(22, '2025-09-25 08:28:23', '2025-09-25 08:28:23', 'Трюфели с радостью', 'Шоколадная радость', '1. Берем трюфели.\r\n2. Добавляем радость.\r\n3. Поедаем с чаем.', 'images/1jIsl4UogHTDlkBfkTwD4yOiwfzkGi479a6aVRDz.jpg', 8, 1),
(23, '2025-09-25 08:33:58', '2025-09-25 09:08:20', 'Крылышки гриль', 'Сочные острые крылышки курочки', 'Все смешать и запекать на гриле около 25 минут. Подавать с зеленью. И картофелем.', 'images/9vwkKnTJZjXbKVPUx3oSxtFH1FJE2yZby2adzQD0.jpg', 6, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IBssBRgQLpiUEnoHyvWyhLFXSUi4boXOUej0iGed', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVHJEREZLTnZFZHV1WXM1OWpucXBRNGFUZ2tKSkNjNVhRUWFhbjRiTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yaWVzLzEiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MjI6IlBIUERFQlVHQkFSX1NUQUNLX0RBVEEiO2E6MDp7fX0=', 1758802864),
('XzFJTb56fevCfCCRLbIat9botyOf7m1cwR2TM1z4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXBlaE54Tm5JcmpYNkxMR28ybVh2UE00TWNzT2xVbmQ3VG9DY3NiYiI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yaWVzLzgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758818463);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sexy', 'myl1@bk.ru', NULL, '$2y$12$x.Bu0DzcY0mSrG2ICfANxeqo/X5jzEQclpGU/COyMHI6cQR6y8VVK', NULL, '2025-09-10 09:39:54', '2025-09-10 09:39:54'),
(2, 'Матвей', 'myl2@bk.ru', NULL, '$2y$12$CZno8f38PnK5RKOZXQVeoeZtVBe/VgDkqgO/vH2lUh/zzQvcs3H7i', NULL, '2025-09-25 08:31:21', '2025-09-25 08:31:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_recipe_id_foreign` (`recipe_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_category_id_foreign` (`category_id`),
  ADD KEY `recipes_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `recipes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
