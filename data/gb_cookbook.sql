-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2021 г., 11:53
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb_cookbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `kitchens`
--

CREATE TABLE `kitchens` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название кухни',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Уникальная ссылка на раздел кухни',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Фото кухни',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kitchens`
--

INSERT INTO `kitchens` (`id`, `name`, `slug`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Русская кухня', 'rusKitchen', 'rus', NULL, NULL),
(2, 'Итальянская кухня', 'italyKitchen', 'ital', NULL, NULL),
(3, 'Грузинская кухня', 'georgianKitchen', 'gruz', NULL, NULL),
(4, 'Испанская кухня', 'spanishKitchen', 'span', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_22_191038_create_rubrics_table', 1),
(5, '2021_03_23_202633_create_kitchens_table', 1),
(6, '2021_03_23_202958_create_recipes_table', 1),
(7, '2021_04_18_102727_create_wishlist_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название рецепта',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Адрес изображения',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Уникальная ссылка на рецепт',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Описание рецепта',
  `level` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Уровень сложности от 1 до 5',
  `time` int DEFAULT NULL COMMENT 'Время для приготовления',
  `ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Список ингредиентов',
  `likes` int NOT NULL DEFAULT '0' COMMENT 'Общее количество лайков на рецепте',
  `kitchen_id` bigint UNSIGNED NOT NULL DEFAULT '1' COMMENT 'ID кухни',
  `rubric_id` bigint UNSIGNED DEFAULT NULL COMMENT 'ID рубрики',
  `is_true` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `image`, `slug`, `description`, `level`, `time`, `ingredients`, `likes`, `kitchen_id`, `rubric_id`, `is_true`, `created_at`, `updated_at`) VALUES
(11, 'Красный борщ', '/storage/recipes/GTPlolHYHcM9Ji4qmHG09tKZ4XUDY0bJWax8FeMf.jpg', 'red-borch', 'Перед вами классический рецепт приготовления красного борща. Украинский борщ всегда был любимым блюдом у простого народа, да и у людей из высших слоев общества он пользовался не малой популярностью. В приготовлении борща есть множество секретов, один из таких секретов я описал ниже. Для того, чтобы добиться яркого, красивого и насыщенного цвета борща - нужно добавить одну столовую ложечку лимонного сока (перед термической обработкой свеклы). Удачи в приготовлении! Подробнее: https://povar.ru/recipes/krasnyi_borsh-19953.html', '3', 156, 'Свиные ребрышки  — 300 Грамм (вырезка) Капуста белокачанная  — 1/2 Штуки Морковь  — 1 Штука Картофель  — 4 Штуки Лук репчатый  — 2 Штуки Свекла  — 2 Штуки Лимон  — 1 Штука Масло подсолнечное  — 100 Миллилитров Перец черный  — 0,5 Чайных ложки Соль  — 1 Щепотка Петрушка  — 1 Штука (пучок) Сметана  — 1 Ст. ложка Томатная паста  — 2 Ст. ложки Гвоздика  — 3 Штуки Лавровый лист  — 1 Штука Подробнее: https://povar.ru/recipes/krasnyi_borsh-19953.html', 16, 1, NULL, 1, '2021-05-20 05:31:28', '2021-05-20 05:32:52'),
(12, 'Окрошка на йогурте', '/storage/recipes/9VxjG4PweraCg2r1vIGrCSZaTOW7IxhF3DRB7Hk8.jpg', 'okroshka', 'Окрошка экспериментальная, вкусный рецепт.  Очень приятно, жарким летним днем, покушать холодную окрошку.  Сегодня мы приготовим окрошку на йогурте.  Получится густое, сытное, освежающее, но не калорийное блюдо, прекрасно подходящее и для диеты, да и для наслаждения!', '3', 60, 'Йогурт 1 кг.Колбаса 300 гр.Картофель 300 гр.Огурец 200 гр.Укроп 1 пуч.Морковь 2 шт.Лук-порей 150 гр.Горчица 1 ст.л.Вода 1 л.', 15, 1, NULL, 1, '2021-05-20 05:46:08', '2021-05-20 05:46:20'),
(13, 'Ризотто с шампиньонами', '/storage/recipes/7NmZUNsjLDIMptmnLWkPzOvPY5PgJwlPxLptcQWM.jpg', 'Risotto-with-mushrooms', 'Для приготовления любого ризотто необходим особенный сорт риса. Он должен быть очень крахмалистым, благодаря этому свойству ризотто приобретает свою кремовую текстуру и появляется сливочный вкус. Для приготовления ризотто, подойдут такие сорта риса, как арборио, виалоне нано или карнароли.  Виалоне нано и карнароли я у нас в продаже не видела, да и арборио надо ещё поискать. Поэтому если не нахожу арборио, то отступаю от правил и готовлю ризотто с обычным рисом. С грибами та же история, лучше выбрать более ароматные лесные, но у нас лесов нет, поэтому выбираем шампиньоны или вешенки.  Ну и чтобы ризотто получился вкусным надо добавить сухого белого вина, с этим пунктом проблем нет.', '4', 88, '250 г. риса арборио (карнароли)1,5 л. куриного бульона (бульонный кубик)100 мл. белого сухого вина1 маленькая луковица100 мл. сливок 10%50 г. сливочного масласоль, перец по вкусу70 г твёрдого сыра', 0, 2, NULL, 0, '2021-05-20 05:52:24', '2021-05-20 05:52:24');

-- --------------------------------------------------------

--
-- Структура таблицы `rubrics`
--

CREATE TABLE `rubrics` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название рубрики',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Уникальная ссылка на рубрику',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Адрес изображения',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO FOTO',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `foto`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'NO FOTO', 'admin@admin.ru', '2021-05-20 05:21:41', '$2y$10$UoW2jXeyk0WkPwFeHrz2Ru2IvXOPWucA0eZuoYSkkqvxwBvV6Lnqa', 1, 'P6f05WmyQLh2MXydDbCOeiJWOgkDW2As7YTTgWEHFcJZhHeOJU0QHyivzwwx', '2021-05-20 05:21:41', '2021-05-20 05:21:41'),
(2, 'user', 'NO FOTO', 'user@user.ru', '2021-05-20 05:21:41', '$2y$10$8zU4yQUDDTR1AgxROu5Ol.btOmSoXxCkp0CbGDiH2iujRhU.IXcLq', 0, 'RAI8kfwN42', '2021-05-20 05:21:41', '2021-05-20 05:21:41'),
(3, 'Prof. Rodrick Prosacco I', 'NO FOTO', 'austin08@example.org', '2021-05-20 05:21:41', '$2y$10$hGgm.7vitQK4GjX98YydfOADOXsqVblbHHRT0uEH.sBf3SX0BN69a', 0, 'NVLxV2MUgH', '2021-05-20 05:21:41', '2021-05-20 05:21:41'),
(4, 'Ms. Jennie Abbott', 'NO FOTO', 'estelle.reichert@example.net', '2021-05-20 05:21:41', '$2y$10$bvSostSlNO6lKR1g4ifCQ.5PQ17DkB9Grlh6HVzsnGaAwBp2G3AsK', 0, 'poUpob7gA8', '2021-05-20 05:21:41', '2021-05-20 05:21:41'),
(5, 'Tanya Robel', 'NO FOTO', 'sedrick.mayert@example.net', '2021-05-20 05:21:41', '$2y$10$2MSc4HlWLX0/4h9jAU9lKOlZ6qtXHJyK.KIF.Hj/gEui0rrNCf5Ii', 0, 'fjRfZnBB15', '2021-05-20 05:21:41', '2021-05-20 05:21:41'),
(6, 'Arianna Walter', 'NO FOTO', 'cierra00@example.com', '2021-05-20 05:21:41', '$2y$10$zSb00oIqJQlol/P4Mzhz0ub0XR9ImMV0lGqCa1F0cgNMkfE3WFOwa', 0, 'J4bVD6y1aH', '2021-05-20 05:21:41', '2021-05-20 05:21:41'),
(7, 'Jeremy Rippin', 'NO FOTO', 'heathcote.cornell@example.org', '2021-05-20 05:21:41', '$2y$10$6WMVve4cyhHSA2/ZplhL5u4hC6t6KunxDnhPOtnA1DaXaBLFx9QUa', 0, '1rZ5peh95G', '2021-05-20 05:21:41', '2021-05-20 05:21:41'),
(8, 'Stacey Willms', 'NO FOTO', 'mcummerata@example.net', '2021-05-20 05:21:41', '$2y$10$R.BBPavZJLG7Bgs61szIxu9MzB2vbACSXNMmpDyUgcOp/EDXsijs.', 0, 'W8MmGXXvli', '2021-05-20 05:21:41', '2021-05-20 05:21:41');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint UNSIGNED NOT NULL,
  `recipe_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `wishlist`
--

INSERT INTO `wishlist` (`id`, `recipe_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 11, 1, '2021-05-20 05:34:14', '2021-05-20 05:34:14');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `kitchens`
--
ALTER TABLE `kitchens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kitchens_name_unique` (`name`),
  ADD UNIQUE KEY `kitchens_slug_unique` (`slug`),
  ADD UNIQUE KEY `kitchens_img_unique` (`img`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_kitchen_id_foreign` (`kitchen_id`),
  ADD KEY `recipes_rubric_id_foreign` (`rubric_id`);

--
-- Индексы таблицы `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rubrics_name_unique` (`name`),
  ADD UNIQUE KEY `rubrics_slug_unique` (`slug`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kitchens`
--
ALTER TABLE `kitchens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_kitchen_id_foreign` FOREIGN KEY (`kitchen_id`) REFERENCES `kitchens` (`id`),
  ADD CONSTRAINT `recipes_rubric_id_foreign` FOREIGN KEY (`rubric_id`) REFERENCES `rubrics` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
