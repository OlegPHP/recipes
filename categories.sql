-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 30 2025 г., 18:24
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
