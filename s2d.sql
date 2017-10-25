-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 03 2017 г., 15:44
-- Версия сервера: 5.6.35
-- Версия PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `dbs2d`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cafe`
--

CREATE TABLE `cafe` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photoURL` varchar(255) DEFAULT NULL,
  `vrcafeURL` varchar(255) DEFAULT NULL,
  `descriptionCafe` text,
  `rate` float DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longtitude` decimal(9,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cafe_type`
--

CREATE TABLE `cafe_type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cafe_types`
--

CREATE TABLE `cafe_types` (
  `id` int(11) NOT NULL,
  `id_cafe` int(11) DEFAULT NULL,
  `id_cafetype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `descriptionCity` text,
  `image` text,
  `panorama` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `ip`, `name`, `descriptionCity`, `image`, `panorama`) VALUES
(1, '192.124.121.123', 'Днепр', 'Днепр лучший!!! Днепр лучший!!! Днепр лучший!!! Днепр лучший!!! Днепр лучший!!! Днепр лучший!!! ', 'dnepr.jpg', 'pan_2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `photoURL` varchar(255) DEFAULT NULL,
  `descriptionEvent` text,
  `date` datetime DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longtitude` decimal(9,7) DEFAULT NULL,
  `begin` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id`, `name`, `city`, `photoURL`, `descriptionEvent`, `date`, `latitude`, `longtitude`, `begin`, `end`, `category`) VALUES
(3, 'IT-сходка', 1, '123', 'Встреча хороших людей', '2017-08-08 00:00:00', '48.4370880', '35.0350820', '16:07:00', '22:07:00', 3),
(4, 'Crossfit', 1, '123', 'Crossfit сходка', '2017-08-10 00:00:00', '48.4629750', '35.0806040', '16:08:00', '21:08:00', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(11) NOT NULL,
  `id_event` int(11) DEFAULT NULL,
  `id_eventcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event_category`
--

INSERT INTO `event_category` (`id`, `name`) VALUES
(3, 'IT'),
(4, 'Спорт');

-- --------------------------------------------------------

--
-- Структура таблицы `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photoURL` varchar(255) DEFAULT NULL,
  `vrhotelURL` varchar(255) DEFAULT NULL,
  `descriptionHotel` text,
  `rate` float DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longtitude` decimal(9,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_type`
--

CREATE TABLE `hotel_type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hotel_types`
--

CREATE TABLE `hotel_types` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) DEFAULT NULL,
  `id_hoteltype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(43, 'TourTypes/TourType3/28f155.jpeg', 3, 1, 'TourType', '7ca580aeff-1', 'images.jpeg'),
(44, 'TourTypes/TourType4/8943fd.jpeg', 4, 1, 'TourType', '2a9130f59e-1', '0.53858200 1501597773images.jpeg'),
(45, 'TourTypes/TourType6/a5b079.jpeg', 6, 1, 'TourType', '6e72810ee2-1', '1501598056.73images.jpeg'),
(49, 'TourTypes/TourType7/4ca8dd.jpeg', 7, 1, 'TourType', '06ba0aec4d-1', '1501599147.71images.jpeg'),
(50, 'TourTypes/TourType1/1ef81d.jpeg', 1, 1, 'TourType', 'a92a30699c-1', '1501599640.88images.jpeg'),
(57, 'TourTypes/TourType2/18f811.jpeg', 2, 1, 'TourType', '32be80ea7c-1', '1501600853.48images.jpeg'),
(58, 'TourCategories/TourCategory1/0fb26f.jpeg', 1, 1, 'TourCategory', '4781e62058-1', '1501674398.59images.jpeg'),
(60, 'TourCategories/TourCategory3/f81fd5.jpeg', 3, 1, 'TourCategory', '84271ae504-1', '1501675755.99images.jpeg'),
(61, 'TourCategories/TourCategory4/5a921c.jpeg', 4, 1, 'TourCategory', '0f71d5811d-1', '1501675771.17images.jpeg'),
(62, 'TourCategories/TourCategory2/fc11c6.jpeg', 2, 1, 'TourCategory', '011b39e122-1', '1501675790.62images.jpeg'),
(63, 'Tours/Tour12/4a6e27.jpeg', 12, NULL, 'Tour', 'f4cedef332-2', '1501763118.84images.jpeg'),
(64, 'Tours/Tour13/b2d127.jpeg', 13, 0, 'Tour', '4afdccfe18-2', '1501763465.77images.jpeg'),
(65, 'TourTypes/TourType8/60f074.jpeg', 8, 1, 'TourType', '2f645436ad-1', '1501763916.77images.jpeg'),
(66, 'Tours/Tour14/30b442.jpeg', 14, 1, 'Tour', 'bc033e7dd8-1', '1501764356.57images.jpeg'),
(68, 'Tours/Tour13/8bb27b.jpeg', 13, 1, 'Tour', '22fe1a553f-1', '1501764922.78images.jpeg'),
(69, 'Tours/Tour15/9c397e.jpeg', 15, 1, 'Tour', 'c31125a17c-1', '1501764990.29images.jpeg'),
(70, 'Cities/City1/1e3055.jpg', 1, 0, 'City', '7fa07bed87-2', 'dnepr.jpg'),
(71, 'Cities/City1/e63808.jpg', 1, 1, 'City', '94a2455eb6-1', 'pan_2.jpg'),
(72, 'TourTypes/TourType9/aa01dd.svg', 9, 1, 'TourType', 'fd5eb242af-1', '1501766086.68Foot color.svg'),
(73, 'TourTypes/TourType10/46ec7f.jpg', 10, 1, 'TourType', 'fd5d6f095f-1', '1501766112.91dnepr.jpg'),
(74, 'TourCategories/TourCategory5/66518d.jpeg', 5, 1, 'TourCategory', 'edf3b3bfd2-1', '1501766144.63images.jpeg'),
(75, 'Tours/Tour16/7e2879.jpg', 16, 1, 'Tour', 'b3a0b6f7ec-1', '1501766231.61dnepr-2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `maindescription`
--

CREATE TABLE `maindescription` (
  `id` int(11) NOT NULL,
  `introText` text,
  `videoURL` text,
  `videoText` text,
  `show` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `maindescription`
--

INSERT INTO `maindescription` (`id`, `introText`, `videoURL`, `videoText`, `show`) VALUES
(3, 'Днепр - лучший город!!! ', 'https://www.youtube.com/watch?v=6-Rw_NVWhuE', 'Днепр - лучший город!!! Днепр - лучший город!!! Днепр - лучший город!!! Днепр - лучший город!!! Днепр - лучший город!!! Днепр - лучший город!!! ', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1500645362),
('m130524_201442_init', 1500645365),
('m140622_111540_create_image_table', 1500892539),
('m140622_111545_add_name_to_image_table', 1500892539),
('m170719_141357_create_main_description', 1500645365),
('m170720_101755_create_city_table', 1500645365),
('m170724_144259_add_image_and_panorama_column_to_city_table', 1500907571),
('m170726_104651_create_event_category_table', 1501579607),
('m170726_114403_create_event_categories_table', 1501579607),
('m170727_132819_create_event_table', 1501579607),
('m170801_125447_create_tourtype_table', 1501592283),
('m170801_132301_create_point_category_table', 1501670343),
('m170801_140520_create_point_table', 1501672385),
('m170801_145923_create_point_categories', 1501672385),
('m170802_111132_create_tourcategory_table', 1501672385),
('m170802_143245_create_tour_table', 1501684576),
('m170803_122642_create_cafe_type', 1501767846),
('m170803_123058_create_hotel_type', 1501767846),
('m170803_123337_create_hotel', 1501767847),
('m170803_123557_create_cafe', 1501767847),
('m170803_125110_create_hotel_types', 1501767847),
('m170803_125243_create_cafe_types', 1501767847);

-- --------------------------------------------------------

--
-- Структура таблицы `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photoURL` varchar(255) DEFAULT NULL,
  `panoramaURL` varchar(255) DEFAULT NULL,
  `descriptionPoint` text,
  `shortDescriptionPoint` text,
  `rate` float DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longtitude` decimal(9,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `point`
--

INSERT INTO `point` (`id`, `name`, `photoURL`, `panoramaURL`, `descriptionPoint`, `shortDescriptionPoint`, `rate`, `latitude`, `longtitude`) VALUES
(3, 'Памятник Т.Г. Шевченко', '123', '123', 'Памятник Т.Г. Шевченко на комсомольском острове возле колеса обозрения', 'Памятник Т.Г. Шевченко на комсомольском острове', 123, '48.4662260', '35.0743040');

-- --------------------------------------------------------

--
-- Структура таблицы `point_categories`
--

CREATE TABLE `point_categories` (
  `id` int(11) NOT NULL,
  `id_point` int(11) DEFAULT NULL,
  `id_pointcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `point_categories`
--

INSERT INTO `point_categories` (`id`, `id_point`, `id_pointcategory`) VALUES
(3, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `point_category`
--

CREATE TABLE `point_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `point_category`
--

INSERT INTO `point_category` (`id`, `name`) VALUES
(2, 'IT'),
(3, 'Индустриальный');

-- --------------------------------------------------------

--
-- Структура таблицы `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `rate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tour`
--

INSERT INTO `tour` (`id`, `name`, `city`, `type`, `category`, `description`, `image`, `rate`) VALUES
(16, 'Тур по днепру', 1, 9, 5, 'Пеший тур по Днепру. ', 'dnepr-2.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tourcategory`
--

CREATE TABLE `tourcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tourcategory`
--

INSERT INTO `tourcategory` (`id`, `name`, `icon`) VALUES
(5, 'Индустриальный', 'images.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `tourtype`
--

CREATE TABLE `tourtype` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tourtype`
--

INSERT INTO `tourtype` (`id`, `name`, `icon`) VALUES
(9, 'Пеший', 'Foot color.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cafe_type`
--
ALTER TABLE `cafe_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cafe_types`
--
ALTER TABLE `cafe_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hotel_type`
--
ALTER TABLE `hotel_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hotel_types`
--
ALTER TABLE `hotel_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `maindescription`
--
ALTER TABLE `maindescription`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `point_categories`
--
ALTER TABLE `point_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `point_category`
--
ALTER TABLE `point_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tourcategory`
--
ALTER TABLE `tourcategory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tourtype`
--
ALTER TABLE `tourtype`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `cafe_type`
--
ALTER TABLE `cafe_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `cafe_types`
--
ALTER TABLE `cafe_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `hotel_type`
--
ALTER TABLE `hotel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `hotel_types`
--
ALTER TABLE `hotel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `maindescription`
--
ALTER TABLE `maindescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `point_categories`
--
ALTER TABLE `point_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `point_category`
--
ALTER TABLE `point_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `tourcategory`
--
ALTER TABLE `tourcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `tourtype`
--
ALTER TABLE `tourtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;