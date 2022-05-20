-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-05-2022 a las 21:18:22
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_yachtimeapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL COMMENT 'Album ID',
  `featured` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0' COMMENT 'Featured Image',
  `title` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0' COMMENT 'Album Title',
  `created_on` date NOT NULL COMMENT 'Created Date',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id`, `featured`, `title`, `created_on`, `id_user`) VALUES
(12, 'rsjch5TGgh220512054007.png', 'Nada 2', '2022-05-11', NULL),
(17, 'W4mQnYJupw220512055906.png', '', '2022-05-12', NULL),
(18, 'D23L5jCkv2220512060738.png', 'Un nombre A', '2022-05-12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album_pictures`
--

CREATE TABLE `album_pictures` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Image ID',
  `album_id` int(11) DEFAULT '0' COMMENT 'Album ID',
  `image` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0' COMMENT 'Image Name',
  `title` varchar(50) CHARACTER SET latin1 DEFAULT '0' COMMENT 'Image Title'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `album_pictures`
--

INSERT INTO `album_pictures` (`id`, `album_id`, `image`, `title`) VALUES
(27, 6, 'Captura_de_pantalla_(7)1.png', ''),
(34, 7, 'Captura_de_pantalla_(5)1.png', ''),
(35, 8, '5eSHpJsEgK220511095105.png', ''),
(36, 8, 'Captura_de_pantalla_(16).png', ''),
(37, 8, 'Captura_de_pantalla_(4).png', ''),
(38, 8, 'Captura_de_pantalla_(4)1.png', ''),
(39, 8, 'Captura_de_pantalla_(5).png', ''),
(40, 8, 'Captura_de_pantalla_(5)1.png', ''),
(41, 8, 'Captura_de_pantalla_(6).png', ''),
(42, 8, 'Captura_de_pantalla_(6)1.png', ''),
(43, 8, 'Captura_de_pantalla_(7).png', ''),
(44, 8, 'Captura_de_pantalla_(7)1.png', ''),
(45, 8, 'Uploads Goes Here.txt', ''),
(46, 8, 'XaSRuUy2AA220511073703.png', ''),
(47, 8, 'Captura_de_pantalla_(4)2.png', ''),
(48, 8, 'Captura_de_pantalla_(5)2.png', ''),
(49, 8, 'Captura_de_pantalla_(6)2.png', ''),
(58, 9, 'Captura_de_pantalla_(32).png', ''),
(62, 10, 'Captura_de_pantalla_(4)3.png', ''),
(63, 10, 'Captura_de_pantalla_(5)3.png', ''),
(103, 12, 'Captura_de_pantalla_(19)8.png', ''),
(120, 18, 'Captura_de_pantalla_(17)7.png', ''),
(121, 18, 'Captura_de_pantalla_(30)2.png', ''),
(122, 18, 'Captura_de_pantalla_(5)10.png', ''),
(166, 210, 'Captura_de_pantalla_(25).png', NULL),
(167, 210, 'Captura_de_pantalla_(26).png', NULL),
(168, 210, 'Captura_de_pantalla_(27)1.png', NULL),
(181, 209, 'Captura_de_pantalla_(30)5.png', '0'),
(198, 208, 'Captura_de_pantalla_(19)11.png', '0'),
(199, 208, 'Captura_de_pantalla_(30)6.png', '0'),
(221, 215, 'Captura_de_pantalla_(17)15.png', '0'),
(222, 215, 'Captura_de_pantalla_(18)21.png', '0'),
(225, 216, 'Captura_de_pantalla_(17)16.png', '0'),
(226, 216, 'Captura_de_pantalla_(18)22.png', '0'),
(227, 216, 'Captura_de_pantalla_(30)8.png', '0'),
(228, 216, 'Captura_de_pantalla_(31)6.png', '0'),
(229, 217, 'Captura_de_pantalla_(28).png', '0'),
(230, 217, 'Captura_de_pantalla_(29)1.png', '0'),
(235, 219, 'Captura_de_pantalla_(38)1.png', '0'),
(236, 219, 'Captura_de_pantalla_(39)2.png', '0'),
(237, 218, 'Captura_de_pantalla_(28)1.png', '0'),
(238, 218, 'Captura_de_pantalla_(29)2.png', '0'),
(239, 218, 'Captura_de_pantalla_(30)9.png', '0'),
(253, 220, 'Captura_de_pantalla_(17)17.png', '0'),
(298, 196, 'Captura_de_pantalla_(31)8.png', '0'),
(299, 196, 'Captura_de_pantalla_(17).png', '0'),
(300, 222, 'Captura_de_pantalla_(38).png', '0'),
(301, 222, 'Captura_de_pantalla_(39).png', '0'),
(302, 224, 'Captura_de_pantalla_(18).png', '0'),
(303, 224, 'Captura_de_pantalla_(19).png', '0'),
(304, 224, 'Captura_de_pantalla_(20).png', '0'),
(305, 224, 'Captura_de_pantalla_(21).png', '0'),
(306, 224, 'Captura_de_pantalla_(22).png', '0'),
(307, 225, 'Captura_de_pantalla_(4).png', '0'),
(308, 225, 'Captura_de_pantalla_(5).png', '0'),
(309, 225, 'Captura_de_pantalla_(6).png', '0'),
(310, 225, 'Captura_de_pantalla_(7).png', '0'),
(320, 226, 'Captura_de_pantalla_(38).png', '0'),
(337, 229, 'Captura_de_pantalla_(30)1.png', '0'),
(338, 229, 'Captura_de_pantalla_(31).png', '0'),
(339, 229, 'Captura_de_pantalla_(32).png', '0'),
(340, 229, '32_wellcraft_martinique_1597070617495.jpg', '0'),
(353, 228, 'Captura_de_pantalla_(34)1.png', '0'),
(354, 228, 'Captura_de_pantalla_(38)2.png', '0'),
(355, 228, 'Captura_de_pantalla_(39)2.png', '0'),
(356, 228, 'Captura_de_pantalla_(17).png', '0'),
(357, 228, 'Captura_de_pantalla_(18)1.png', '0'),
(358, 228, 'Captura_de_pantalla_(19).png', '0'),
(359, 227, 'Captura_de_pantalla_(38)1.png', '0'),
(360, 227, 'Captura_de_pantalla_(39)1.png', '0'),
(409, 234, 'Captura_de_pantalla_(17)2.png', '0'),
(431, 232, 'Captura_de_pantalla_(30)2.png', '0'),
(432, 232, 'Captura_de_pantalla_(16)7.png', '0'),
(433, 232, 'Captura_de_pantalla_(30)3.png', '0'),
(434, 236, 'Captura_de_pantalla_(18).png', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_galery`
--

CREATE TABLE `tbl_galery` (
  `id` int(11) NOT NULL,
  `fid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idyacht` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_galery`
--

INSERT INTO `tbl_galery` (`id`, `fid`, `photo`, `idyacht`) VALUES
(145, '12', 'gallery_202205051935.jpg', 180),
(146, '12', 'gallery_202205051942.jpg', 180),
(148, '12', 'gallery_202205051951.jpg', 180),
(150, '12', 'gallery_202205054337.jpg', 180),
(152, '1', 'gallery_202205065135.jpg', 196),
(153, '1', 'gallery_202205065142.jpg', 196),
(154, '1', 'gallery_202205111532', NULL),
(155, '1', 'gallery_202205111532', NULL),
(156, '1', 'gallery_202205111532', NULL),
(157, '1', 'gallery_202205111532', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(7) NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `sender_userid` varchar(45) DEFAULT NULL,
  `reciever_userid` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `message`, `time`, `sender_userid`, `reciever_userid`) VALUES
(134, 'a', 1652739640, '22', '1'),
(135, 'ook', 1652821745, '1', '22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_owner_yachts`
--

CREATE TABLE `tbl_owner_yachts` (
  `id` int(11) NOT NULL,
  `brand` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `model` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `length` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `year` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cabins` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `toilets` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `guest` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `class` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `beam` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `draft` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `speed` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fuel` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `water` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `featured` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'disable',
  `fid_owner` int(11) NOT NULL,
  `created_on` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_owner_yachts`
--

INSERT INTO `tbl_owner_yachts` (`id`, `brand`, `model`, `length`, `year`, `cabins`, `toilets`, `guest`, `class`, `beam`, `draft`, `speed`, `fuel`, `water`, `description`, `featured`, `status`, `fid_owner`, `created_on`) VALUES
(235, 'SEA RAY', NULL, '41', '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, 'v4GBuTDvck220517023340.png', 'disable', 1, '2022-05-17'),
(236, 'SEA RAY', NULL, '41', '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, 'KASu45rWer220517023830.png', 'disable', 1, '2022-05-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `txn_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_type_user`
--

CREATE TABLE `tbl_type_user` (
  `id_type` int(11) NOT NULL,
  `description` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_type_user`
--

INSERT INTO `tbl_type_user` (`id_type`, `description`) VALUES
(1, 'Admin'),
(2, 'Owner'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `id_type_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `name`, `last_name`, `photo`, `password`, `date`, `birthdate`, `phone`, `active`, `id_type_user`) VALUES
(1, 'correo@correo.com', 'Owner 1', 'Last Name', 'John-Doe.png', '12345678', '0000-00-00 00:00:00', '2022-05-06', '(123) 456-7890', '1', 2),
(19, 'correo@correo.lan', 'Member 19', 'Last Name', 'John-Doe.png', '12345678', '2022-05-06 20:08:01', '0000-00-00', '', '1', 3),
(20, 'correo@correo.uno', 'Member', '002', 'John-Doe.png', '12345678', '2022-05-06 20:10:23', '1981-08-21', '(123) 456-7890', '1', 3),
(21, 'correo@correo.dos', 'Member', 'Last Name', 'John-Doe.png', '12345678', '2022-05-06 20:12:36', '1981-08-21', 'John-Doe.png', '1', 3),
(22, 'correo@correo.tres', 'Member 22', 'Last Name', 'John-Doe.png', '12345678', '2022-05-06 20:14:15', '1981-08-21', '(123) 456-7890', '0', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `album_pictures`
--
ALTER TABLE `album_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_galery`
--
ALTER TABLE `tbl_galery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_owner_yachts`
--
ALTER TABLE `tbl_owner_yachts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indices de la tabla `tbl_type_user`
--
ALTER TABLE `tbl_type_user`
  ADD PRIMARY KEY (`id_type`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Album ID', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `album_pictures`
--
ALTER TABLE `album_pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Image ID', AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT de la tabla `tbl_galery`
--
ALTER TABLE `tbl_galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `tbl_owner_yachts`
--
ALTER TABLE `tbl_owner_yachts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT de la tabla `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_type_user`
--
ALTER TABLE `tbl_type_user`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
