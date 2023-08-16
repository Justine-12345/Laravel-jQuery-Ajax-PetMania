-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 03:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petmania`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopters`
--

CREATE TABLE `adopters` (
  `id` int(10) UNSIGNED NOT NULL,
  `adopter_fname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adopter_lname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adopter_age` int(100) DEFAULT NULL,
  `adopter_contact` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adopter_address` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adopter_gender` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `is_Guest` int(11) DEFAULT NULL,
  `adopter_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adopters`
--

INSERT INTO `adopters` (`id`, `adopter_fname`, `adopter_lname`, `adopter_age`, `adopter_contact`, `adopter_address`, `adopter_gender`, `user_id`, `is_Guest`, `adopter_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Tzuyu46', 'Chou1', 20, '092121123457', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 45, NULL, NULL, '2021-08-11 05:47:27', '2021-11-22 05:12:04', NULL),
(9, 'Steph', 'Curry', 35, '09545343454', '167 Sabolo Road Hills 1475  Taguig City', 'Male', 53, NULL, NULL, '2021-08-11 07:56:05', '2021-11-17 07:22:25', '2021-11-17 07:22:25'),
(10, 'Justine1', 'Castaneda1', 25, '09207888638', 'Phase 2, asSA', 'Male', 55, NULL, NULL, '2021-08-11 17:43:25', '2021-11-17 07:23:09', '2021-11-17 07:23:09'),
(11, 'Tzuyu', 'Chou', 12, '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 68, NULL, NULL, '2021-11-17 01:56:57', '2021-11-17 08:17:43', '2021-11-17 08:17:43'),
(12, 'Tzuyu', 'Chou', 43, '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 69, NULL, NULL, '2021-11-17 01:57:23', '2021-11-17 08:17:46', '2021-11-17 08:17:46'),
(13, 'Tzuyu', 'Chou', 43, '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 70, NULL, NULL, '2021-11-17 01:57:47', '2021-11-17 01:57:47', NULL),
(14, 'Tzuyu', 'Chou', 43, '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 73, NULL, NULL, '2021-11-17 02:00:54', '2021-11-17 02:00:54', NULL),
(15, 'Tzuyu11', 'Chou11', 35, '09545343454', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 89, NULL, NULL, '2021-11-17 06:38:24', '2021-11-17 06:38:24', NULL),
(16, 'Tzuyu22', 'Chou22', 351, '09545343454', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 90, NULL, NULL, '2021-11-17 06:38:57', '2021-11-17 06:38:57', NULL),
(17, 'Bebeww', 'Konasya', 23, '09207888631', '1700 M. Adriatico St. corner General Malvar St. Makati City', 'Male', 48, NULL, NULL, '2021-11-17 18:40:27', '2021-11-17 18:40:27', NULL),
(18, 'Happy', 'Pills', 25, '09207888678', 'LG 28-32 Alfaro Building146 1227 Makati City', 'Female', 49, NULL, NULL, '2021-11-17 18:41:29', '2021-11-17 18:41:29', NULL),
(19, 'Kevin', 'Durant', 36, '09345674324', '17 UJF Road SD 1475 Manila City', 'Male', 54, NULL, NULL, '2021-11-17 18:42:46', '2021-11-17 18:42:46', '2021-11-18 03:17:47'),
(20, 'Tzuyupapi', 'Chou', 43, '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 71, NULL, NULL, '2021-11-17 18:44:06', '2021-11-20 08:28:39', NULL),
(21, 'Tzuyu3u', 'Chou', 35, '09545343454', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 100, NULL, NULL, '2021-11-20 04:30:10', '2021-11-20 04:30:28', '2021-11-20 04:30:28'),
(22, 'Tzuyusw', 'Chous', 19, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 95, NULL, NULL, '2021-11-20 09:08:42', '2021-11-20 09:08:42', NULL),
(32, 'Tzuyu', 'Chou', NULL, '32432', NULL, NULL, NULL, 1, 'tzuyu@gmail.com', '2021-11-21 15:34:59', '2021-11-21 15:34:59', NULL),
(33, 'Tzuyu', 'Chou', NULL, '21312', NULL, NULL, NULL, 1, 'tzuyu@gmail.com', '2021-11-22 09:19:21', '2021-11-22 09:19:21', NULL),
(34, 'Justine', 'Castaneda', NULL, '3232432', NULL, NULL, NULL, 1, 'dalemiguel@gmail.com', '2021-11-22 09:26:47', '2021-11-22 09:26:47', NULL),
(35, 'Justine', 'Castaneda', NULL, '3232432', NULL, NULL, NULL, 1, 'dalemiguel@gmail.com', '2021-11-22 09:26:47', '2021-11-22 09:26:47', NULL),
(36, 'Tzuyuss4', 'Chous', 19, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 96, NULL, NULL, '2021-11-22 08:20:20', '2021-11-22 08:20:20', NULL),
(37, 'Tzuywau2', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 97, NULL, NULL, '2021-11-22 08:20:34', '2021-11-22 08:20:34', NULL),
(38, 'Tzuyw22u', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 98, NULL, NULL, '2021-11-22 08:21:02', '2021-11-22 08:21:02', NULL),
(39, 'bagoAcc', 'sdasds', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 108, NULL, NULL, '2021-11-22 08:31:59', '2021-11-22 08:31:59', NULL),
(40, 'Tzuyu', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 109, NULL, NULL, '2021-11-22 08:32:32', '2021-11-22 08:32:32', NULL),
(41, 'Tzuyu', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 110, NULL, NULL, '2021-11-22 08:32:45', '2021-11-22 08:32:45', NULL),
(42, 'Tzuyu', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 112, NULL, NULL, '2021-11-22 08:38:56', '2021-11-22 08:38:56', NULL),
(43, 'Tzuyu', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 113, NULL, NULL, '2021-11-22 08:39:10', '2021-11-22 08:39:10', NULL),
(44, 'Tzuyu', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 114, NULL, NULL, '2021-11-22 08:40:49', '2021-11-22 08:40:49', NULL),
(45, 'Tzuyu', 'Chou', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 115, NULL, NULL, '2021-11-22 08:44:09', '2021-11-22 08:44:09', NULL),
(46, 'Tzuyu', 'Chou', 20, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 116, NULL, NULL, '2021-11-22 08:44:26', '2021-11-22 08:44:26', NULL),
(47, 'yyy', 'yyy', NULL, '3232432', NULL, NULL, NULL, 1, 'yyyy@gmail.com', '2021-11-23 01:22:14', '2021-11-23 01:22:14', NULL),
(48, 'newAcc', 'newAcc', 18, '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 120, NULL, NULL, '2021-11-22 17:59:39', '2021-11-22 17:59:39', NULL),
(49, 'visitor1', 'visitorlastname', NULL, '323232', NULL, NULL, NULL, 1, 'visitor@gmail.com', '2021-11-23 02:05:36', '2021-11-23 02:05:36', NULL),
(50, 'visitor1', 'visitorlastname', NULL, '323232', NULL, NULL, NULL, 1, 'visitor@gmail.com', '2021-11-23 02:05:36', '2021-11-23 02:05:36', NULL),
(51, 'visitor1', 'visitorlastname', NULL, '323232', NULL, NULL, NULL, 1, 'visitor@gmail.com', '2021-11-23 02:05:36', '2021-11-23 02:05:36', NULL),
(52, 'visitor1', 'visitorlastname', NULL, '323232', NULL, NULL, NULL, 1, 'visitor@gmail.com', '2021-11-23 02:05:36', '2021-11-23 02:05:36', NULL),
(53, 'Tzuyu', 'Chou', NULL, '3242432', NULL, NULL, NULL, 1, 'tzuweryu@gmail.com', '2021-11-27 06:01:20', '2021-11-27 06:01:20', NULL),
(54, 'Tzuyu', 'Chou', NULL, '3242432', NULL, NULL, NULL, 1, 'tzuweryu@gmail.com', '2021-11-27 06:01:20', '2021-11-27 06:01:20', NULL),
(55, 'Tzuyu', 'Chou', NULL, '3232432', NULL, NULL, NULL, 1, 'tzu222yu@gmail.com', '2021-11-27 09:52:31', '2021-11-27 09:52:31', NULL),
(56, 'Tzuyu', 'Chou', NULL, '3232432', NULL, NULL, NULL, 1, 'tzu222yu@gmail.com', '2021-11-27 09:52:31', '2021-11-27 09:52:31', NULL),
(57, 'RealCastaneda', 'RealJustine', NULL, '912345678', NULL, NULL, NULL, 1, 'castanedajustine09@gmail.com', '2021-11-30 10:32:22', '2021-11-30 10:32:22', NULL),
(58, 'RealCastaneda', 'RealJustine', NULL, '912345678', NULL, NULL, NULL, 1, 'castanedajustine09@gmail.com', '2021-11-30 10:32:22', '2021-11-30 10:32:22', NULL),
(59, 'RealCastaneda', 'RealJustine', NULL, '912345678', NULL, NULL, NULL, 1, 'castanedajustine09@gmail.com', '2021-11-30 10:32:22', '2021-11-30 10:32:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adopter_animal`
--

CREATE TABLE `adopter_animal` (
  `adopter_id` int(10) UNSIGNED DEFAULT NULL,
  `animal_id` int(10) UNSIGNED NOT NULL,
  `status` int(25) DEFAULT NULL,
  `code` int(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adopter_animal`
--

INSERT INTO `adopter_animal` (`adopter_id`, `animal_id`, `status`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 61, 0, 345675, '2021-07-17 00:52:51', NULL, NULL),
(8, 140, 0, 345676, '2021-08-17 00:52:51', NULL, NULL),
(8, 58, 1, 345677, '2021-11-22 02:52:09', NULL, NULL),
(32, 81, 1, 345678, '2021-11-22 02:53:25', NULL, NULL),
(8, 83, 1, 345679, '2021-11-22 02:56:51', NULL, NULL),
(8, 144, 1, 345670, '2021-11-22 02:57:00', NULL, NULL),
(33, 80, 0, 987933, NULL, NULL, NULL),
(34, 77, 0, 224834, NULL, NULL, NULL),
(35, 77, 0, 286589, NULL, NULL, NULL),
(47, 63, 1, 512288, '2021-11-23 01:24:41', NULL, NULL),
(49, 78, 1, 359314, '2021-11-23 02:06:20', NULL, NULL),
(53, 148, 0, 539421, NULL, NULL, NULL),
(54, 148, 0, 163671, NULL, NULL, NULL),
(55, 158, 0, 467909, NULL, NULL, NULL),
(56, 158, 0, 174796, NULL, NULL, NULL),
(57, 87, 1, 452197, '2021-11-30 10:33:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(10) UNSIGNED NOT NULL,
  `animal_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_gender` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_age` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_breed` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_health` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animal_name`, `animal_gender`, `animal_age`, `animal_breed`, `animal_health`, `animal_picture`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(58, 'Popolq2', 'Female', '12', 'Bullfrog', 'Healthy', '/storage/images/1628694958-Javan-gliding-tree-frog.jpg', 6, '2021-08-11 07:14:41', '2021-11-16 17:49:03', NULL),
(59, 'Kokoy', 'Male', '12', 'Bulldog', 'Worst', 'storage/images/1628696015-170px-Axel,_the_English_Bulldog.jpg', 1, '2021-08-11 07:33:35', '2021-11-16 17:47:47', '2021-11-16 17:47:47'),
(60, 'kupa', 'Male', '9', 'Siberian Husky', 'Bad', 'storage/images/1628696389-Siberian-Husky-courtesy-Eileen-M.-Gacke-2-600x400.jpg.optimal.jpg', 1, '2021-08-11 07:39:49', '2021-08-11 07:40:45', '2021-08-11 07:40:45'),
(61, 'kupa2', 'Male', '9', 'Siberian Husky', 'Healthy', '/storage/images/250257672_191684599815728_6626560674801879774_n.jpg', 1, '2021-08-11 07:40:21', '2021-11-16 17:55:08', '2021-11-16 17:55:08'),
(62, 'Bennies', 'Male', '2', 'Dachshund', 'Severe', 'storage/images/1628696595-Longhaired-Dachshund-standing-outdoors.jpg', 1, '2021-08-11 07:43:15', '2021-11-16 19:32:50', '2021-11-16 19:32:50'),
(63, 'Buninay2', 'Male', '9', 'Persian cat', 'Healthy', 'storage/images/1628697795-220px-White_Persian_Cat.jpg', 2, '2021-08-11 08:03:15', '2021-11-20 22:09:07', NULL),
(64, 'Buninay', 'Male', '9', 'Persian cat', 'Bad', 'storage/images/1628697795-220px-White_Persian_Cat.jpg', 2, '2021-08-11 08:03:15', '2021-08-11 08:10:54', '2021-08-11 08:10:54'),
(65, 'Buninay', 'Male', '9', 'Persian cat', 'Healthy', 'storage/images/1628697795-220px-White_Persian_Cat.jpg', 2, '2021-08-11 08:03:15', '2021-11-16 17:55:48', NULL),
(66, 'Andoks', 'Male', '5', 'Sphynx cat', 'Healthy', 'storage/images/1628697919-sphynx-cat-breed-info.jpg', 2, '2021-08-11 08:05:19', '2021-11-16 17:54:59', '2021-11-16 17:54:59'),
(67, 'Pugot', 'Male', '3', 'Gloster Canary', 'Healthy', 'storage/images/1628698041-19-Bird-Gloster-Canary.jpg', 7, '2021-08-11 08:07:21', '2021-11-16 17:54:54', '2021-11-16 17:54:54'),
(69, 'Doding Daga', 'Male', '12', 'Satin', 'Worst', 'storage/images/1628733053-istockphoto-176430993-612x612.jpg', 8, '2021-08-11 17:50:53', '2021-11-16 19:32:53', '2021-11-16 19:32:53'),
(74, 'asdsadas', 'Male', '23', 'ewew', 'Healthy', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 1, '2021-11-16 00:16:13', '2021-11-20 22:14:49', NULL),
(77, 'yyyy', 'Male', '3', 'Bulldog', 'Healthy', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:22:57', '2021-11-20 22:17:55', NULL),
(78, 'kkk', 'Male', '23', 'ewew', 'Healthy', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 1, '2021-11-16 00:26:16', '2021-11-20 22:18:20', NULL),
(80, 'sassss', 'Male', '23', 'ewew', 'Healthy', 'storage/images/icons8-donate-32.png', 6, '2021-11-16 00:30:16', '2021-11-20 22:18:50', NULL),
(81, 'kkk', 'Male', '23', 'ewew', 'Healthy', 'storage/images/178738046_663077224495183_3240678846142174974_n.png', 6, '2021-11-16 00:31:16', '2021-11-20 22:20:19', NULL),
(82, 'kkk', 'Female', '23', 'ewew', 'Healthy', 'storage/images/178738046_663077224495183_3240678846142174974_n.png', 3, '2021-11-16 00:31:45', '2021-11-20 22:20:38', NULL),
(83, 'kkk', 'Male', '23', 'ewew', 'Healthy', 'storage/images/178738046_663077224495183_3240678846142174974_n.png', 6, '2021-11-16 00:31:45', '2021-11-20 22:21:06', NULL),
(85, 'kkk', 'Male', '23', 'ewew', 'Bad', 'storage/images/178738046_663077224495183_3240678846142174974_n.png', 6, '2021-11-16 00:31:46', '2021-11-16 00:31:46', NULL),
(86, 'kkk', 'Male', '23', 'ewew', 'Bad', 'storage/images/178738046_663077224495183_3240678846142174974_n.png', 6, '2021-11-16 00:31:46', '2021-11-16 00:31:46', NULL),
(87, 'Mateko', 'Male', '12', 'African', 'Healthy', 'storage/images/Capture 2021-09-04 14.22.54.jpg', 5, '2021-11-16 00:33:41', '2021-11-26 22:02:25', NULL),
(88, 'Mateko', 'Male', '12', 'African', 'Bad', 'storage/images/Capture 2021-09-04 14.22.54.jpg', 5, '2021-11-16 00:33:47', '2021-11-16 00:33:47', NULL),
(89, 'Macoy', 'Male', '7', 'mbnbm', 'Bad', 'storage/images/awdawq.png', 5, '2021-11-16 00:34:58', '2021-11-16 00:34:58', NULL),
(90, 'Macoy', 'Male', '12', 'mbnbm', 'Bad', 'storage/images/Black and Pink Minimalist Squad Cheerleading School T-Shirt.png', 6, '2021-11-16 00:35:58', '2021-11-16 00:35:58', NULL),
(91, 'yyyy', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:37:01', '2021-11-16 00:37:01', NULL),
(92, 'yyyy', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:37:42', '2021-11-16 00:37:42', NULL),
(94, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:40:45', '2021-11-16 00:40:45', NULL),
(95, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:42:35', '2021-11-16 00:42:35', NULL),
(96, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:42:37', '2021-11-16 00:42:37', NULL),
(97, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/icons8-donate-32.png', 5, '2021-11-16 00:43:42', '2021-11-16 00:43:42', NULL),
(98, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/icons8-donate-32.png', 5, '2021-11-16 00:43:46', '2021-11-16 00:43:46', NULL),
(99, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:45:03', '2021-11-16 00:45:03', NULL),
(100, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:45:05', '2021-11-16 00:45:05', NULL),
(101, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:45:07', '2021-11-16 00:45:07', NULL),
(102, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 5, '2021-11-16 00:45:46', '2021-11-16 00:45:46', NULL),
(103, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:47:10', '2021-11-16 00:47:10', NULL),
(104, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:47:51', '2021-11-16 00:47:51', NULL),
(105, 'sasasass', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:52:22', '2021-11-16 00:52:22', NULL),
(106, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 00:53:07', '2021-11-16 00:53:07', NULL),
(107, 'hhghg', 'Male', '23', 'ewew', 'Bad', 'storage/images/icons8-donate-32.png', 4, '2021-11-16 00:55:28', '2021-11-16 00:55:28', NULL),
(108, 'hhghg', 'Male', '23', 'ewew', 'Bad', 'storage/images/icons8-donate-32.png', 4, '2021-11-16 00:55:40', '2021-11-16 00:55:40', NULL),
(109, 'hhghg', 'Male', '23', 'ewew', 'Healthy', 'storage/images/icons8-donate-32.png', 4, '2021-11-16 00:55:51', '2021-11-26 22:02:55', NULL),
(110, 'yyyy', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:56:39', '2021-11-16 00:56:39', NULL),
(111, 'yyyy', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:57:09', '2021-11-16 00:57:09', NULL),
(112, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:57:12', '2021-11-16 00:57:12', NULL),
(113, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:58:47', '2021-11-16 00:58:47', NULL),
(114, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:59:00', '2021-11-16 00:59:00', NULL),
(115, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 00:59:12', '2021-11-16 00:59:12', NULL),
(116, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 01:00:17', '2021-11-16 01:00:17', NULL),
(117, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 01:00:46', '2021-11-16 01:00:46', NULL),
(118, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 01:01:40', '2021-11-16 01:01:40', NULL),
(119, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 01:02:45', '2021-11-16 01:02:45', NULL),
(120, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 01:03:01', '2021-11-16 01:03:01', NULL),
(121, 'dcsds', 'Male', '23', 'ewew', 'Healthy', 'storage/images/178738046_663077224495183_3240678846142174974_n.png', 5, '2021-11-16 01:04:24', '2021-11-26 22:03:39', NULL),
(122, 'yyyy2', 'Male', '3', 'Bulldog', 'Bad', 'storage/images/awdaw.jpg', 1, '2021-11-16 01:05:07', '2021-11-16 01:05:07', NULL),
(123, 'kkk', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:05:20', '2021-11-16 01:05:20', NULL),
(124, 'jhkhk', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:07:18', '2021-11-16 01:07:18', NULL),
(125, 'kkk', 'Male', '12', 'ewew', 'Healthy', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:09:33', '2021-11-27 05:53:57', NULL),
(126, 'kkk', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:10:59', '2021-11-16 01:10:59', NULL),
(127, 'asdsadas', 'Male', '23', 'asd', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 5, '2021-11-16 01:12:51', '2021-11-16 01:12:51', NULL),
(128, 'kkk', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 5, '2021-11-16 01:16:22', '2021-11-16 01:16:22', NULL),
(129, 'asdsadas', 'Male', '23', 'ewew', 'Severe', '/storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:24:55', '2021-11-16 19:03:16', NULL),
(130, 'kkke', 'Male', '23', 'ewew', 'Bad', '/storage/images/178738046_663077224495183_3240678846142174974_n.png', 5, '2021-11-16 01:25:36', '2021-11-16 17:21:53', NULL),
(131, 'asdsadas', 'Male', '12', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:26:05', '2021-11-16 17:54:22', '2021-11-16 17:54:22'),
(132, 'asdsadas', 'Male', '12', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:26:59', '2021-11-16 17:54:28', '2021-11-16 17:54:28'),
(133, 'asdsadas', 'Male', '12', 'asd', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 5, '2021-11-16 01:28:07', '2021-11-16 01:28:07', NULL),
(134, 'asdsadas', 'Male', '23', 'asd', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:29:08', '2021-11-16 01:29:08', NULL),
(135, 'asdsadas', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:29:59', '2021-11-16 01:29:59', NULL),
(136, 'kkk', 'Male', '23', 'ewew', 'Bad', 'storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:34:00', '2021-11-16 17:57:15', '2021-11-16 17:57:15'),
(137, '37uuu', 'Male', '12', 'ewew', 'Bad', '/storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 6, '2021-11-16 01:34:21', '2021-11-16 17:48:02', '2021-11-16 17:48:02'),
(138, 'yyyy', 'Male', '23', 'ewew', 'Healthy', '/storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 1, '2021-11-16 17:57:38', '2021-11-26 21:17:21', NULL),
(139, 'ggggg', 'Male', '23', 'ewew', 'Bad', '/storage/images/252873455_391112772716387_3184513031296625020_n.jpg', 5, '2021-11-16 17:58:04', '2021-11-16 17:58:17', '2021-11-16 17:58:17'),
(140, 'asdsadas', 'Male', '23', 'ewew', 'Healthy', '/storage/images/255347377_171063761908545_682922945760206006_n.jpg', 6, '2021-11-16 19:06:36', '2021-11-16 19:06:52', NULL),
(141, 'asdsadas', 'Male', '23', 'ewew', 'Bad', '/storage/images/artboard_0_simplified_1637241006602.png', 4, '2021-11-20 03:51:29', '2021-11-20 03:51:29', NULL),
(142, 'Popo', 'Male', '23', 'ewew', 'Bad', '/storage/images/artboard_0_simplified_1637241289861.png', 1, '2021-11-20 03:52:28', '2021-11-20 03:52:28', NULL),
(143, '112121', 'Male', '23', '121', 'Bad', '/storage/images/artboard_0_simplified_1637241006602.png', 1, '2021-11-20 04:01:06', '2021-11-20 04:02:43', '2021-11-20 04:02:43'),
(144, 'bago', 'Female', '12', 'tuta', 'Healthy', '/storage/images/artboard_0_simplified_1637240790011.png', 1, '2021-11-20 22:21:59', '2021-11-20 22:22:15', NULL),
(145, 'jkjk', 'Male', '23', 'ewew', 'Healthy', '/storage/images/artboard_0_simplified_1637240790011.png', 1, '2021-11-21 00:10:03', '2021-11-22 17:11:50', NULL),
(146, 'bago1', 'Male', '23', 'Bullfrog', 'Healthy', '/storage/images/Uriel Tahum .jpeg', 6, '2021-11-22 05:37:25', '2021-11-22 05:38:03', '2021-11-22 05:38:03'),
(147, 'newAnim1', 'Male', '3', 'Persian cat', 'Bad', '/storage/images/245979707_1305473719875660_507958598640635031_n.png', 5, '2021-11-22 07:30:58', '2021-11-22 07:31:56', '2021-11-22 07:31:56'),
(148, 'oooo', 'Male', '23', 'ewew', 'Healthy', '/storage/images/artboard_0_simplified_1637241289861.png', 1, '2021-11-22 08:48:05', '2021-11-22 09:01:32', NULL),
(149, '\'\'\'\'', 'Male', '23', 'ewew', 'Healthy', '/storage/images/artboard_0_simplified_1637241289861.png', 2, '2021-11-22 08:49:50', '2021-11-22 08:59:17', NULL),
(150, 'mmmm1', 'Female', '23', 'Bullfrog', 'Bad', '/storage/images/Imagination-Spongebob.jpg', 6, '2021-11-22 17:52:05', '2021-11-22 17:52:56', '2021-11-22 17:52:56'),
(151, 'newAnimal', 'Male', '23', 'Bullfrog', 'Healthy', '/storage/images/artboard_0_simplified_1637241289861.png', 1, '2021-11-22 18:04:00', '2021-11-22 18:04:09', NULL),
(152, ';;;', 'Male', '23', 'Bullfrog', 'Bad', '/storage/images/nature-1637722900675-822.jpg', 1, '2021-11-27 01:22:24', '2021-11-27 01:22:24', NULL),
(153, '////', 'Male', '23', 'ewew', 'Bad', '/storage/images/Uriel Tahum .jpeg', 1, '2021-11-27 01:24:20', '2021-11-27 01:24:20', NULL),
(155, 'vvvv', 'Male', '12', 'ewew', 'Bad', '/storage/images/nature-1637722900675-822.jpg', 1, '2021-11-27 01:42:52', '2021-11-27 01:42:52', NULL),
(156, 'aaaa', 'Male', '23', 'Bullfrog', 'Bad', '/storage/images/255879789_4572416282853105_1782528598983111870_n (1).jpg', 2, '2021-11-27 01:46:52', '2021-11-27 01:49:59', '2021-11-27 01:49:59'),
(157, 'aaaa', 'Male', '23', 'Bullfrog', 'Bad', '/storage/images/255879789_4572416282853105_1782528598983111870_n (1).jpg', 2, '2021-11-27 01:47:37', '2021-11-27 01:47:37', NULL),
(158, '158NaAnimals', 'Male', '23', 'Bullfrog', 'Healthy', '/storage/images/255879789_4572416282853105_1782528598983111870_n (1).jpg', 1, '2021-11-27 01:51:11', '2021-11-27 01:52:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animal_disease`
--

CREATE TABLE `animal_disease` (
  `animal_id` int(10) UNSIGNED NOT NULL,
  `disease_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_disease`
--

INSERT INTO `animal_disease` (`animal_id`, `disease_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(59, 10, NULL, NULL, NULL),
(59, 11, NULL, NULL, NULL),
(59, 15, NULL, NULL, NULL),
(60, 9, NULL, NULL, NULL),
(60, 10, NULL, NULL, NULL),
(64, 4, NULL, NULL, NULL),
(64, 6, NULL, NULL, NULL),
(69, 10, NULL, NULL, NULL),
(69, 11, NULL, NULL, NULL),
(69, 13, NULL, NULL, NULL),
(85, 9, NULL, NULL, NULL),
(85, 10, NULL, NULL, NULL),
(86, 9, NULL, NULL, NULL),
(86, 10, NULL, NULL, NULL),
(88, 11, NULL, NULL, NULL),
(89, 10, NULL, NULL, NULL),
(90, 16, NULL, NULL, NULL),
(91, 4, NULL, NULL, NULL),
(92, 4, NULL, NULL, NULL),
(94, 15, NULL, NULL, NULL),
(95, 11, NULL, NULL, NULL),
(96, 11, NULL, NULL, NULL),
(97, 8, NULL, NULL, NULL),
(98, 8, NULL, NULL, NULL),
(99, 15, NULL, NULL, NULL),
(100, 15, NULL, NULL, NULL),
(101, 15, NULL, NULL, NULL),
(102, 10, NULL, NULL, NULL),
(103, 16, NULL, NULL, NULL),
(104, 4, NULL, NULL, NULL),
(105, 6, NULL, NULL, NULL),
(106, 10, NULL, NULL, NULL),
(106, 11, NULL, NULL, NULL),
(107, 4, NULL, NULL, NULL),
(108, 4, NULL, NULL, NULL),
(110, 4, NULL, NULL, NULL),
(111, 4, NULL, NULL, NULL),
(112, 4, NULL, NULL, NULL),
(113, 4, NULL, NULL, NULL),
(114, 4, NULL, NULL, NULL),
(115, 4, NULL, NULL, NULL),
(116, 4, NULL, NULL, NULL),
(117, 4, NULL, NULL, NULL),
(118, 4, NULL, NULL, NULL),
(119, 4, NULL, NULL, NULL),
(120, 4, NULL, NULL, NULL),
(122, 4, NULL, NULL, NULL),
(123, 14, NULL, NULL, NULL),
(124, 11, NULL, NULL, NULL),
(126, 17, NULL, NULL, NULL),
(127, 14, NULL, NULL, NULL),
(128, 17, NULL, NULL, NULL),
(131, 12, NULL, NULL, NULL),
(132, 13, NULL, NULL, NULL),
(133, 16, NULL, NULL, NULL),
(134, 4, NULL, NULL, NULL),
(135, 4, NULL, NULL, NULL),
(136, 17, NULL, NULL, NULL),
(137, 8, NULL, NULL, NULL),
(130, 4, NULL, NULL, NULL),
(139, 8, NULL, NULL, NULL),
(129, 12, NULL, NULL, NULL),
(129, 12, NULL, NULL, NULL),
(129, 13, NULL, NULL, NULL),
(129, 13, NULL, NULL, NULL),
(129, 14, NULL, NULL, NULL),
(62, 6, NULL, NULL, NULL),
(62, 14, NULL, NULL, NULL),
(62, 15, NULL, NULL, NULL),
(62, 16, NULL, NULL, NULL),
(62, 17, NULL, NULL, NULL),
(72, 14, NULL, NULL, NULL),
(141, 6, NULL, NULL, NULL),
(141, 8, NULL, NULL, NULL),
(142, 10, NULL, NULL, NULL),
(142, 11, NULL, NULL, NULL),
(143, 4, NULL, NULL, NULL),
(147, 4, NULL, NULL, NULL),
(147, 10, NULL, NULL, NULL),
(150, 8, NULL, NULL, NULL),
(152, 8, NULL, NULL, NULL),
(152, 9, NULL, NULL, NULL),
(153, 6, NULL, NULL, NULL),
(157, 4, NULL, NULL, NULL),
(157, 6, NULL, NULL, NULL),
(155, 13, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animal_rescuer`
--

CREATE TABLE `animal_rescuer` (
  `animal_id` int(10) UNSIGNED NOT NULL,
  `rescuer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_rescuer`
--

INSERT INTO `animal_rescuer` (`animal_id`, `rescuer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(59, 6, NULL, NULL, NULL),
(60, 6, NULL, NULL, NULL),
(64, 8, NULL, NULL, NULL),
(67, 8, NULL, NULL, NULL),
(69, 8, NULL, NULL, NULL),
(66, 8, NULL, NULL, NULL),
(85, 6, NULL, NULL, NULL),
(86, 6, NULL, NULL, NULL),
(88, 6, NULL, NULL, NULL),
(89, 6, NULL, NULL, NULL),
(90, 6, NULL, NULL, NULL),
(91, 6, NULL, NULL, NULL),
(92, 6, NULL, NULL, NULL),
(94, 6, NULL, NULL, NULL),
(95, 6, NULL, NULL, NULL),
(96, 6, NULL, NULL, NULL),
(97, 6, NULL, NULL, NULL),
(98, 6, NULL, NULL, NULL),
(99, 6, NULL, NULL, NULL),
(100, 6, NULL, NULL, NULL),
(101, 6, NULL, NULL, NULL),
(102, 6, NULL, NULL, NULL),
(103, 6, NULL, NULL, NULL),
(104, 6, NULL, NULL, NULL),
(105, 6, NULL, NULL, NULL),
(106, 6, NULL, NULL, NULL),
(107, 6, NULL, NULL, NULL),
(108, 6, NULL, NULL, NULL),
(110, 6, NULL, NULL, NULL),
(111, 6, NULL, NULL, NULL),
(112, 6, NULL, NULL, NULL),
(113, 6, NULL, NULL, NULL),
(114, 6, NULL, NULL, NULL),
(115, 6, NULL, NULL, NULL),
(116, 6, NULL, NULL, NULL),
(117, 6, NULL, NULL, NULL),
(118, 6, NULL, NULL, NULL),
(119, 6, NULL, NULL, NULL),
(120, 6, NULL, NULL, NULL),
(122, 6, NULL, NULL, NULL),
(123, 6, NULL, NULL, NULL),
(124, 6, NULL, NULL, NULL),
(126, 6, NULL, NULL, NULL),
(127, 6, NULL, NULL, NULL),
(128, 6, NULL, NULL, NULL),
(131, 6, NULL, NULL, NULL),
(132, 6, NULL, NULL, NULL),
(133, 6, NULL, NULL, NULL),
(134, 6, NULL, NULL, NULL),
(135, 6, NULL, NULL, NULL),
(136, 6, NULL, NULL, NULL),
(137, 6, NULL, NULL, NULL),
(61, 6, NULL, NULL, NULL),
(58, 6, NULL, NULL, NULL),
(130, 6, NULL, NULL, NULL),
(139, 6, NULL, NULL, NULL),
(129, 6, NULL, NULL, NULL),
(140, 6, NULL, NULL, NULL),
(62, 6, NULL, NULL, NULL),
(141, 8, NULL, NULL, NULL),
(142, 8, NULL, NULL, NULL),
(143, 18, NULL, NULL, NULL),
(63, 8, NULL, NULL, NULL),
(74, 8, NULL, NULL, NULL),
(65, 8, NULL, NULL, NULL),
(77, 8, NULL, NULL, NULL),
(78, 8, NULL, NULL, NULL),
(80, 17, NULL, NULL, NULL),
(81, 17, NULL, NULL, NULL),
(82, 17, NULL, NULL, NULL),
(83, 21, NULL, NULL, NULL),
(144, 27, NULL, NULL, NULL),
(146, 8, NULL, NULL, NULL),
(147, 8, NULL, NULL, NULL),
(149, 8, NULL, NULL, NULL),
(148, 8, NULL, NULL, NULL),
(145, 8, NULL, NULL, NULL),
(150, 17, NULL, NULL, NULL),
(151, 8, NULL, NULL, NULL),
(138, 8, NULL, NULL, NULL),
(87, 19, NULL, NULL, NULL),
(109, 31, NULL, NULL, NULL),
(121, 22, NULL, NULL, NULL),
(152, 34, NULL, NULL, NULL),
(153, 8, NULL, NULL, NULL),
(156, 39, NULL, NULL, NULL),
(157, 40, NULL, NULL, NULL),
(155, 38, NULL, NULL, NULL),
(158, 41, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animal_veterinarian`
--

CREATE TABLE `animal_veterinarian` (
  `animal_id` int(10) UNSIGNED NOT NULL,
  `veterinarian_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_veterinarian`
--

INSERT INTO `animal_veterinarian` (`animal_id`, `veterinarian_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(59, 7, NULL, NULL, NULL),
(60, 7, NULL, NULL, NULL),
(64, 9, NULL, NULL, NULL),
(67, 7, NULL, NULL, NULL),
(69, 9, NULL, NULL, NULL),
(66, 7, NULL, NULL, NULL),
(85, 7, NULL, NULL, NULL),
(86, 7, NULL, NULL, NULL),
(88, 7, NULL, NULL, NULL),
(89, 7, NULL, NULL, NULL),
(90, 7, NULL, NULL, NULL),
(91, 7, NULL, NULL, NULL),
(92, 7, NULL, NULL, NULL),
(94, 7, NULL, NULL, NULL),
(95, 7, NULL, NULL, NULL),
(96, 7, NULL, NULL, NULL),
(97, 7, NULL, NULL, NULL),
(98, 7, NULL, NULL, NULL),
(99, 7, NULL, NULL, NULL),
(100, 7, NULL, NULL, NULL),
(101, 7, NULL, NULL, NULL),
(102, 7, NULL, NULL, NULL),
(103, 7, NULL, NULL, NULL),
(104, 7, NULL, NULL, NULL),
(105, 7, NULL, NULL, NULL),
(106, 7, NULL, NULL, NULL),
(107, 7, NULL, NULL, NULL),
(108, 7, NULL, NULL, NULL),
(110, 7, NULL, NULL, NULL),
(111, 7, NULL, NULL, NULL),
(112, 7, NULL, NULL, NULL),
(113, 7, NULL, NULL, NULL),
(114, 7, NULL, NULL, NULL),
(115, 7, NULL, NULL, NULL),
(116, 7, NULL, NULL, NULL),
(117, 7, NULL, NULL, NULL),
(118, 7, NULL, NULL, NULL),
(119, 7, NULL, NULL, NULL),
(120, 7, NULL, NULL, NULL),
(122, 7, NULL, NULL, NULL),
(123, 7, NULL, NULL, NULL),
(124, 7, NULL, NULL, NULL),
(126, 7, NULL, NULL, NULL),
(127, 7, NULL, NULL, NULL),
(128, 7, NULL, NULL, NULL),
(131, 7, NULL, NULL, NULL),
(132, 7, NULL, NULL, NULL),
(133, 7, NULL, NULL, NULL),
(134, 7, NULL, NULL, NULL),
(135, 7, NULL, NULL, NULL),
(136, 7, NULL, NULL, NULL),
(137, 7, NULL, NULL, NULL),
(61, 7, NULL, NULL, NULL),
(58, 7, NULL, NULL, NULL),
(130, 7, NULL, NULL, NULL),
(139, 7, NULL, NULL, NULL),
(129, 7, NULL, NULL, NULL),
(140, 7, NULL, NULL, NULL),
(62, 7, NULL, NULL, NULL),
(72, 7, NULL, NULL, NULL),
(141, 9, NULL, NULL, NULL),
(142, 9, NULL, NULL, NULL),
(143, 13, NULL, NULL, NULL),
(63, 9, NULL, NULL, NULL),
(74, 9, NULL, NULL, NULL),
(65, 9, NULL, NULL, NULL),
(77, 13, NULL, NULL, NULL),
(78, 12, NULL, NULL, NULL),
(80, 9, NULL, NULL, NULL),
(81, 9, NULL, NULL, NULL),
(82, 13, NULL, NULL, NULL),
(83, 12, NULL, NULL, NULL),
(144, 9, NULL, NULL, NULL),
(146, 9, NULL, NULL, NULL),
(147, 9, NULL, NULL, NULL),
(149, 9, NULL, NULL, NULL),
(148, 9, NULL, NULL, NULL),
(145, 9, NULL, NULL, NULL),
(150, 9, NULL, NULL, NULL),
(151, 9, NULL, NULL, NULL),
(138, 9, NULL, NULL, NULL),
(87, 13, NULL, NULL, NULL),
(109, 9, NULL, NULL, NULL),
(121, 21, NULL, NULL, NULL),
(152, 21, NULL, NULL, NULL),
(153, 13, NULL, NULL, NULL),
(157, 23, NULL, NULL, NULL),
(155, 24, NULL, NULL, NULL),
(158, 24, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dog', NULL, NULL, NULL),
(2, 'Cat', NULL, NULL, NULL),
(3, 'Dove', NULL, NULL, NULL),
(4, 'Fish', NULL, NULL, NULL),
(5, 'Monkey', NULL, NULL, NULL),
(6, 'Frog', '2021-08-11 07:14:41', '2021-08-11 07:14:41', NULL),
(7, 'Bird', '2021-08-11 08:07:21', '2021-08-11 08:07:21', NULL),
(8, 'Rat', '2021-08-11 17:50:53', '2021-08-11 17:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_name`, `comment_content`, `animal_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'Tzuyu Chou', '**** bird', 68, 45, '2021-08-11 17:35:29', '2021-08-11 17:35:29', NULL),
(18, 'Tzuyu Chou', '***** Bird', 68, 45, '2021-08-11 17:36:03', '2021-08-11 17:36:03', NULL),
(19, 'roger', 'Cute', 65, NULL, '2021-08-12 01:47:20', '2021-08-12 01:47:20', NULL),
(20, 'roger', '**** cat', 65, NULL, '2021-08-12 01:48:50', '2021-08-12 01:48:50', NULL),
(21, 'hi', 'hi', 65, NULL, '2021-11-21 13:01:44', '2021-11-21 13:01:44', NULL),
(22, 'hi', 'hi', 65, NULL, '2021-11-21 13:02:00', '2021-11-21 13:02:00', NULL),
(23, 'hi j', 'hi j', 65, NULL, '2021-11-21 13:02:05', '2021-11-21 13:02:05', NULL),
(24, 'Unknown guest', 'hi j', 65, NULL, '2021-11-21 13:03:08', '2021-11-21 13:03:08', NULL),
(25, 'hi j', 'hi j', 65, NULL, '2021-11-21 13:03:16', '2021-11-21 13:03:16', NULL),
(26, 'coole', 'hi j', 65, NULL, '2021-11-21 13:03:44', '2021-11-21 13:03:44', NULL),
(27, 'Tzuyu Chou', 'rsrs', 3, NULL, '2021-11-21 13:16:02', '2021-11-21 13:16:02', NULL),
(28, 'rsdsa', 'asdas', 78, NULL, '2021-11-21 13:18:42', '2021-11-21 13:18:42', NULL),
(29, 'wad', 'awdwa', 77, NULL, '2021-11-21 13:19:18', '2021-11-21 13:19:18', NULL),
(30, 'ree', 'awdewa', 77, NULL, '2021-11-21 13:19:25', '2021-11-21 13:19:25', NULL),
(31, 'ree', '****', 77, NULL, '2021-11-21 13:19:29', '2021-11-21 13:19:29', NULL),
(32, 'cure', 'cute pet', 144, NULL, '2021-11-21 13:21:15', '2021-11-21 13:21:15', NULL),
(33, 'Justine Castaneda', 'wadsa', 144, NULL, '2021-11-21 13:23:51', '2021-11-21 13:23:51', NULL),
(34, 'awdwa', 'wwww', 144, NULL, '2021-11-21 13:24:43', '2021-11-21 13:24:43', NULL),
(35, 'hhaha', 'asdsa', 77, NULL, '2021-11-21 15:47:06', '2021-11-21 15:47:06', NULL),
(36, 'awd', 'awd', 82, NULL, '2021-11-22 08:59:03', '2021-11-22 08:59:03', NULL),
(37, 'cute', 'hi po', 63, NULL, '2021-11-22 16:46:52', '2021-11-22 16:46:52', NULL),
(38, 'wdawd', '****', 74, NULL, '2021-11-22 17:04:20', '2021-11-22 17:04:20', NULL),
(39, 'john', 'cute', 148, NULL, '2021-11-23 02:01:24', '2021-11-23 02:01:24', NULL),
(40, 'qwweqw', '****', 148, NULL, '2021-11-23 02:01:34', '2021-11-23 02:01:34', NULL),
(41, 'Tao', 'Hahahaha', 82, NULL, '2021-11-30 10:30:02', '2021-11-30 10:30:02', NULL),
(42, 'Yfff', 'Ycufsu', 77, NULL, '2021-11-30 10:41:51', '2021-11-30 10:41:51', NULL),
(43, 'ewew', 'dddddddd', 65, NULL, '2021-12-04 12:31:46', '2021-12-04 12:31:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(10) UNSIGNED NOT NULL,
  `disease_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `disease_name`, `disease_desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Anthrax', 'Anhrax, a highly infectious and fatal disease of cattle, is caused by a relatively large spore-forming rectangular shaped bacterium called Bacillus anthracis.', '2021-08-11 07:03:08', '2021-08-11 07:04:19', NULL),
(5, 'Black quarter', 'It is an acute infectious and highly fatal, bacterial disease of cattle. Buffaloes, sheep and goats are also affected.', '2021-08-11 07:05:06', '2021-08-11 07:05:21', '2021-08-11 07:05:21'),
(6, 'Black quarter', 'It is an acute infectious and highly fatal, bacterial disease of cattle. Buffaloes, sheep and goats are also affected.', '2021-08-11 07:05:06', '2021-08-11 07:05:06', NULL),
(7, 'Foot and mouth disease', 'The foot-and-mouth disease is a highly communicable disease affecting cloven-footed animals.', '2021-08-11 07:05:54', '2021-08-11 07:05:58', '2021-08-11 07:05:58'),
(8, 'Foot and mouth disease', 'The foot-and-mouth disease is a highly communicable disease affecting cloven-footed animals.', '2021-08-11 07:05:54', '2021-08-11 07:05:54', NULL),
(9, 'Rabies', 'Rabies is a disease of dogs, foxes, wolves, hyaenas and in some places, it is a disease of bats which feed on blood.', '2021-08-11 07:06:33', '2021-08-11 07:06:33', NULL),
(10, 'Blue tongue', 'Bluetongue, a disease which is transmitted by midges, infects domestic and wild ruminants and also camelids, however sheep are particularly badly affected.', '2021-08-11 07:07:05', '2021-08-11 07:07:05', NULL),
(11, 'Pox', 'sheep-pox is a highly contagious disease. It causes a mortality of 20 to 50 per cent in animals below the age of 6 months, and causes damage to the wool and skin in adults.', '2021-08-11 07:07:54', '2021-08-11 07:07:54', NULL),
(12, 'Tetanus', 'This is an infectious, non-febrile disease of animals and man, and is characterized by spasmodic tetany and hyperaesthesia.', '2021-08-11 07:08:45', '2021-08-11 07:08:45', NULL),
(13, 'Animal bites', 'If your territorial feline sees another cat strutting on to its turf like it owns the place, prepare for trou', '2021-08-11 07:10:14', '2021-08-11 07:10:14', NULL),
(14, 'Broken nail', 'If they do experience a break, they may have to be sedated at the vet so they can cut the nail back behind the crack.', '2021-08-11 07:11:15', '2021-08-11 07:11:15', NULL),
(15, 'Eye trauma', 'Nothing is more heartbreaking than seeing your poor pooch or feline tearing up.', '2021-08-11 07:11:41', '2021-11-22 17:58:24', '2021-11-22 17:58:24'),
(16, 'Insect stings/bites', 'The catch-and-release method might keep your house relatively bug-free, but it may also introduce some nasty pests into your pet’s domain.', '2021-08-11 07:12:02', '2021-08-11 07:12:02', NULL),
(17, 'Dehydration', 'If Mr Snookums is getting on in years and has become a little tubby, then he’s especially susceptible to dehydration or heat stroke in hot weather.', '2021-08-11 07:13:05', '2021-08-11 07:13:05', NULL),
(18, 'awdaw', 'awdwa', '2021-11-18 00:54:46', '2021-11-18 01:50:04', '2021-11-18 01:50:04'),
(19, 'awdwad', 'wadwad', '2021-11-18 00:55:14', '2021-11-18 01:50:02', '2021-11-18 01:50:02'),
(20, '222wwa88', '222sd88', '2021-11-18 00:55:25', '2021-11-18 01:49:59', '2021-11-18 01:49:59'),
(21, 'qwqw111', 'wqwqwq', '2021-11-20 04:43:33', '2021-11-20 04:43:52', '2021-11-20 04:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_subject`, `message_fname`, `message_lname`, `message_contact`, `message_email`, `message_content`, `message_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'apply adopter', 'Justine', 'Castaneda', '0920788638', 'sadsad@gmail.com', 'qwqeqwew', '2021-08-11', '2021-08-11 09:34:47', '2021-08-11 09:34:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_04_16_053036_create_categories_table', 1),
(4, '2021_05_05_013548_create_animals_table', 1),
(5, '2021_05_05_013820_create_adopters_table', 1),
(6, '2021_05_05_013930_create_adopter_animal_table', 1),
(7, '2021_05_05_014109_create_diseases_table', 1),
(8, '2021_05_05_014226_create_animal_disease_table', 1),
(9, '2021_05_05_014338_create_rescuers_table', 1),
(10, '2021_05_05_014446_create_animal_rescuer_table', 1),
(11, '2021_05_05_014625_create_jobs_table', 1),
(12, '2021_05_05_014737_create_users_table', 1),
(13, '2021_05_05_101218_create_messages_table', 1),
(14, '2021_08_06_071146_create_veterinarians_table', 2),
(15, '2021_08_06_071459_create_animal_veterinarian_table', 2),
(16, '2021_08_10_112037_create_comments_table', 3),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('123@gmail.com', 'h1C2xcjwjAILg3kLb42RIRIu9SduZwF9ie1XhTJzkC9Bdaum18CZGXjVuaCn', '2021-08-07 23:21:40'),
('123@gmail.com', 'DvfmTmAa0WoHevw0cRDyqC8jP598ucxEWIyczoyE7Jp4cS9Gq3gMCIuazRTu', '2021-08-07 23:22:35'),
('123@gmail.com', 'oe5JeuLu7WqnWNz9opi2TzDoKGiPE4LOi9XIzpBOylQXTM5EJOnbo8F0w1sR', '2021-08-07 23:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rescuers`
--

CREATE TABLE `rescuers` (
  `id` int(10) UNSIGNED NOT NULL,
  `rescuer_fname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rescuer_lname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rescuer_age` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rescuer_contact` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rescuer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rescuer_gender` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(25) DEFAULT NULL,
  `is_Add` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rescuers`
--

INSERT INTO `rescuers` (`id`, `rescuer_fname`, `rescuer_lname`, `rescuer_age`, `rescuer_contact`, `rescuer_address`, `rescuer_gender`, `user_id`, `is_Add`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Bebe', 'Konasya', '23', '09207888631', '1700 M. Adriatico St. corner General Malvar St. Makati City', 'Male', 48, NULL, '2021-08-11 05:53:38', '2021-11-17 01:49:28', '2021-11-17 01:49:28'),
(7, 'Tzuyuko', 'Chou', '20', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 45, NULL, '2021-08-11 06:11:05', '2021-11-17 07:22:16', '2021-11-17 16:10:38'),
(8, 'User1', 'apelyedo1', '43', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', 'Male', 52, NULL, '2021-08-11 07:49:55', '2021-11-17 01:54:41', NULL),
(9, 'Tzuyu', 'Chou', '12', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 68, NULL, '2021-11-16 21:07:10', '2021-11-17 01:56:57', '2021-11-17 01:56:57'),
(10, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 69, NULL, '2021-11-16 21:08:15', '2021-11-17 01:57:23', '2021-11-17 01:57:23'),
(11, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 70, NULL, '2021-11-16 21:11:42', '2021-11-17 01:57:47', '2021-11-17 01:57:47'),
(12, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 71, NULL, '2021-11-16 21:12:34', '2021-11-17 01:58:41', '2021-11-17 01:58:41'),
(13, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 72, NULL, '2021-11-16 21:14:52', '2021-11-17 02:00:22', '2021-11-17 02:00:22'),
(14, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 73, NULL, '2021-11-16 21:15:50', '2021-11-17 02:00:54', '2021-11-17 02:00:54'),
(15, 'Tzuyu22', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 74, NULL, '2021-11-16 21:17:06', '2021-11-17 06:05:50', '2021-11-17 06:05:50'),
(16, 'asdas', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 75, NULL, '2021-11-16 21:19:01', '2021-11-17 06:05:53', '2021-11-17 06:05:53'),
(17, 'awd', 'sds', '43', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', 'Male', 76, NULL, '2021-11-16 21:19:52', '2021-11-16 21:19:52', NULL),
(18, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 77, NULL, '2021-11-16 21:20:50', '2021-11-16 21:20:50', NULL),
(19, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 78, NULL, '2021-11-16 21:21:46', '2021-11-16 21:21:46', NULL),
(20, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 79, NULL, '2021-11-16 21:22:23', '2021-11-16 21:22:23', NULL),
(21, 'Tzuyuwad', 'Chouwad', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 80, NULL, '2021-11-16 21:23:57', '2021-11-16 21:23:57', NULL),
(22, 'Tzuyuawd', 'Chouwad', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 81, NULL, '2021-11-16 21:25:59', '2021-11-16 21:25:59', NULL),
(23, 'User1', 'apelyedo1', '43', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', 'Male', 82, NULL, '2021-11-16 21:28:35', '2021-11-16 21:28:35', NULL),
(24, 'Justine', 'Castaneda', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 83, NULL, '2021-11-16 21:29:19', '2021-11-16 21:29:19', NULL),
(25, 'new', 'new', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 84, NULL, '2021-11-17 01:05:07', '2021-11-17 01:05:07', NULL),
(26, 'asdas', 'asd', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 86, NULL, '2021-11-17 01:06:06', '2021-11-17 01:06:06', NULL),
(27, 'asdas', 'Chou', '22', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 87, NULL, '2021-11-17 01:06:48', '2021-11-17 01:06:48', NULL),
(28, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 88, NULL, '2021-11-17 01:09:56', '2021-11-20 04:36:51', '2021-11-20 04:36:51'),
(29, 'Steph', 'Curry', '35', '09545343454', '167 Sabolo Road Hills 1475  Taguig City', 'Male', 53, NULL, '2021-11-17 07:22:25', '2021-11-17 07:22:25', NULL),
(30, 'Justine1', 'Castaneda1', '25', '09207888638', 'Phase 2, asSA', 'Male', 55, NULL, '2021-11-17 07:23:09', '2021-11-17 07:23:09', NULL),
(31, 'Yodakyy1q', 'Queen', '205', '09207888630', 'Dona Soledad Avenue Paranaque City', 'Female', 50, NULL, '2021-11-19 08:54:47', '2021-11-30 02:40:20', NULL),
(32, 'pangalan1', 'apelyedo1', '23', '9232323423', 'Taguig City', 'Male', 64, NULL, '2021-11-19 08:55:08', '2021-11-19 08:55:08', NULL),
(33, 'newREs1', 'asadas1', '22', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', 'Female', 106, NULL, '2021-11-22 07:33:08', '2021-11-22 07:33:58', '2021-11-22 07:33:58'),
(34, 'iiii', 'iiii', '18', '09212112345', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', 'Male', 118, NULL, '2021-11-22 08:15:00', '2021-11-22 08:15:00', NULL),
(35, 'Tzuyu', 'Chou', '19', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 103, NULL, '2021-11-22 08:21:41', '2021-11-22 08:21:41', NULL),
(36, 'newAcc', 'sadsad', '19', '09212112345', '1700 M. Adriatico St. corner General Malvar St. Manila City', 'Female', 107, NULL, '2021-11-22 08:27:26', '2021-11-22 08:27:26', NULL),
(37, 'rrrr1', 'rrrr1', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 119, NULL, '2021-11-22 17:54:31', '2021-11-22 17:55:17', '2021-11-22 17:55:17'),
(38, 'uuuu', 'uuuu', '3', '34534543', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', NULL, 1, '2021-11-27 01:42:52', '2021-11-27 01:42:52', NULL),
(39, 'rrrrrrr', 'rrrrrrrrr', '1', '34534543', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', NULL, 1, '2021-11-27 01:46:52', '2021-11-27 01:46:52', NULL),
(40, 'rrrrrrr', 'rrrrrrrrr', '1', '34534543', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', NULL, 1, '2021-11-27 01:47:37', '2021-11-27 01:47:37', NULL),
(41, 'resresres', 'resresres', '3', '34534543', '1700 M. Adriatico St. corner General Malvar St. Manila City', 'Female', NULL, 1, '2021-11-27 01:51:11', '2021-11-27 01:51:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `user_fname`, `user_lname`, `user_age`, `user_contact`, `user_address`, `user_picture`, `user_gender`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(44, 'justine@petmania.ph', '2021-08-11 05:08:50', '$2y$10$WjaTcYEw1WxiCsleXRF94uzAdTwVmzH/MfjJ2Z9bKsuszidbsWTv2', 'Justine', 'Castaneda', '20', '09207888638', 'BLK 58 LOT 5 PH2 Taguig City', '/storage/images/1628687252-97142137_2357488904555636_7021167876983750656_n.jpg', 'Male', 'admin', 'dtnhyvdbDlmRlSrzPtUAIPOHlAmj2NkyuyCy57p4sMUKsYqnxwRjSGWGJNgA', '2021-08-11 05:07:32', '2021-08-11 05:08:50', NULL),
(45, 'tzuyu@gmail.com', '2021-08-11 05:38:18', '$2y$10$2lxK.leP0EuF/JeQqkIA3.THvATycUBe6G.bWkheQBdgJI6Ub0/qm', 'Tzuyu46', 'Chou1', '20', '092121123457', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637162536-245979707_1305473719875660_507958598640635031_n.png', 'Male', 'adopter', '6EwYbiok5GuKJkL2KGGvtqgeQ7MY6A21ojEHMbWlJNV2MA1XeMmIDxp5TuTh', '2021-08-11 05:38:02', '2021-11-22 05:12:04', NULL),
(48, 'bebe@gmail.com', '2021-08-11 05:53:13', '$2y$10$coBfyimJNEhBmzHPncsjr.yB7kvW97H96DXPoxSNqNAQksQkQvGDe', 'Bebeww', 'Konasya', '23', '09207888631', '1700 M. Adriatico St. corner General Malvar St. Makati City', '/storage/images/1637203227-icons8-donate-32.png', 'Male', 'adopter', 'V9lxLe9i1svxmktDyvaGmYCWWAkyUMR7mph3eHmgWDa6iuguidh5VAQJsOpK', '2021-08-11 05:52:49', '2021-11-17 18:40:27', NULL),
(49, 'happy@gmail.com', '2021-08-11 06:03:42', '$2y$10$rvJL6n4a0Xr/Tu.oow7PmuT6tylerAWnFSJwR7chrlz9ivxR1PCx.', 'Happy', 'Pills', '25', '09207888678', 'LG 28-32 Alfaro Building146 1227 Makati City', '/storage/images/1628690140-1582988259-eqe13rsueaivrtl.jpg', 'Female', 'adopter', 'CJ8IBNuW73JeZpuhRxEwUCmDXCH0Rx36Di4BubYZzNyCHr3xBwp1dMQJwjgE', '2021-08-11 05:55:40', '2021-11-17 18:41:29', NULL),
(50, 'yoda@gmail.com', '2021-08-11 06:27:20', '$2y$10$.zTCWqySwkseRoiwBRmSa.HTI0EqIctHrVfpvPgNUt9k5KY.uTKf.', 'Yodakyy1q', 'Queen', '205', '09207888630', 'Dona Soledad Avenue Paranaque City', '/storage/images/1638268545-1638119474047.jpg', 'Female', 'rescuer', 'ztmBEDlIE0fQr4iErpMVdTWsJmeeXOetik8Del0q71spFnaGRrkrEeEZZq0h', '2021-08-11 06:27:06', '2021-11-30 02:40:20', NULL),
(52, 'user1@gmail.com', NULL, '$2y$10$Rwgzxr37fZbL/uKkIeFv7.2mvb.6PJSj2FoSJlsmp715M6QKB1oCu', 'User1', 'apelyedo1', '43', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', '/storage/images/1628696995-photo-1593085512500-5d55148d6f0d.jpg', 'Male', 'rescuer', NULL, '2021-08-11 07:49:55', '2021-08-26 20:55:11', NULL),
(53, 'kahit@gmail.com', NULL, '$2y$10$yEJQv4YxTgL86XY60mt2XO03qVry0JIjkquK3kRmkmj.LR/SyNkhO', 'Steph', 'Curry', '35', '09545343454', '167 Sabolo Road Hills 1475  Taguig City', '/storage/images/1637162545-245979707_1305473719875660_507958598640635031_n.png', 'Male', 'rescuer', NULL, '2021-08-11 07:56:05', '2021-11-17 07:22:25', NULL),
(54, 'kevin@gmail.com', '2021-08-11 07:59:49', '$2y$10$R.MisjCeEleRKG9ZL3qANORpDwb4i6qa0tfULAjyQ7gaurnq5tli.', 'Kevinfff', 'Durant', '34', '09345674324', '17 UJF Road SD 1475 Taguig City', '/storage/images/1637427632-artboard_0_simplified_1637240906727.png', 'Male', 'veterinarian', NULL, '2021-08-11 07:59:49', '2021-11-20 09:00:32', NULL),
(55, '123@gmail.com', '2021-08-11 17:42:47', '$2y$10$4i23mS8yn6yB093CdwxBreP9zgYW9TBxmijo00AWuEgYZRz2C9t/O', 'Justine1', 'Castaneda1', '25', '09207888638', 'Phase 2, asSA', '/storage/images/1628732306-photo-1593085512500-5d55148d6f0d.jpg', 'Male', 'rescuer', 'pCcY5kyffvmbEZID4pNoZlRfbSRUSrODnVenOEHJD3SWqvXTQIi3mHNL8uTq', '2021-08-11 17:38:26', '2021-11-17 07:23:09', NULL),
(64, 'email1@gmail.com', '2021-08-11 06:27:00', '$2y$10$MTEkUV95Hvbs6mnUIk6fOuGSwGPjpz3snQ3limy.pwl8YR7LczY6G', 'pangalan1', 'apelyedo1', '23', '9232323423', 'Taguig City', NULL, 'Male', 'rescuer', NULL, '2021-08-19 21:06:22', '2021-11-19 08:55:08', NULL),
(65, 'email2@gmail.com', '2021-08-11 06:27:00', '$2y$10$iw9R3liX/knTKHYvkHhERe/TMHIvQVibS5foVG/tnlOKNngvSUyZ6', 'pangalan2', 'apelyedo2', '24', '9232323499', 'Makati City', NULL, 'Female', 'new', NULL, '2021-08-19 21:06:22', '2021-11-19 09:15:15', '2021-11-19 09:15:15'),
(66, 'wd@gmail.com', NULL, '$2y$10$yMzcF1JxSmf2Fra.4biRdufN5pdP4Ei7jQuRsNzrG5TeW1cd1Ifb6', 'Justine', 'justine', '25', '09207888638', 'Phase 2, czxcz', '/storage/images/1630042318-6e5e6994572979.5e8248228f2a3.jpg', 'Male', 'new', 'eyJpdiI6Ik1LQUd2ZE9NaWRLc2kzUU9GakZIa2c9PSIsInZhbHVlIjoiTldYVkIvT2RKR2JUV213NHM1R2NVQT09IiwibWFjIjoiMGM1ZDliMjkyMzllZWE1OGQxZDA5Nzg2ZTc0YjcwMTFhY2YzODI1ZTY5NGIxNGUwM2EyODk1MmNjZTJkZWZjMyJ9', '2021-08-26 21:31:58', '2021-11-19 09:15:18', '2021-11-19 09:15:18'),
(68, 'tzuyuwe@gmail.com', '2021-11-16 21:07:10', '$2y$10$MHFZCNbcsyU0FJKVHTzX9OaYNXeDjYSYIan/GQaFvJWUDbvUO4kpm', 'Tzuyu', 'Chou', '12', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637125630-255347377_171063761908545_682922945760206006_n.jpg', 'Female', 'adopter', NULL, '2021-11-16 21:07:10', '2021-11-17 08:17:43', '2021-11-17 08:17:43'),
(69, 'wad@gmail.com', '2021-11-16 21:08:15', '$2y$10$xBvhrTvbDc57Kphm6tIiyuSkj6I8VDg6FL9Bxcf.FGbkLiKPR044G', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637125695-252873455_391112772716387_3184513031296625020_n.jpg', 'Female', 'adopter', NULL, '2021-11-16 21:08:15', '2021-11-17 08:17:46', '2021-11-17 08:17:46'),
(70, 'tzuyuaw2@gmail.com', '2021-11-16 21:11:42', '$2y$10$2GlMKvnEAEWZla02z8/3kuWoem946HWdWomYX82NpfbWF/RMZqXom', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637125902-250257672_191684599815728_6626560674801879774_n.jpg', 'Female', 'adopter', NULL, '2021-11-16 21:11:42', '2021-11-17 01:57:47', NULL),
(71, 'tzuy32u@gmail.com', '2021-11-16 21:12:34', '$2y$10$Hwh4e59NyAL3PSMj0N0ZQ.fd/nPn9xmPWd7q3SyysmVMbi3XXIeWq', 'Tzuyupapi', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637425735-icons8-donate-32.png', 'Female', 'adopter', NULL, '2021-11-16 21:12:34', '2021-11-20 08:28:55', NULL),
(72, 'tzuyu2e@gmail.com', '2021-11-16 21:14:52', '$2y$10$e10vist6/a8FARgos6E5F.UwR2JT5pZ/jxa.8ZjU03evFglGao4Pa', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126091-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'veterinarian', NULL, '2021-11-16 21:14:52', '2021-11-17 02:00:23', NULL),
(73, 'tzuasdyu@gmail.com', '2021-11-16 21:15:50', '$2y$10$McEK4vP7o516yiXtlsEiLOCa7QSnefJI188my5pdFDuZFlbwu90WS', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126150-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'adopter', NULL, '2021-11-16 21:15:50', '2021-11-17 02:00:54', NULL),
(74, '234tzuyu@gmail.com', '2021-11-16 21:17:06', '$2y$10$yRqr8.7Dsw9AO2fUqmgKj.taAHty4H5lPWtEVL/uqMcwxi5fPJ1SW', 'Tzuyu22', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126226-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:17:06', '2021-11-17 06:05:50', '2021-11-17 06:05:50'),
(75, 'rider@shop.ph', '2021-11-16 21:19:01', '$2y$10$ECMf4l/7VGwxiJuOlDxqBOSLqbk1./IKnYxj.Hw/I2MRNnnuwdDSu', 'asdas', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126341-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:19:01', '2021-11-17 06:05:53', '2021-11-17 06:05:53'),
(76, 'weed@sad', '2021-11-16 21:19:52', '$2y$10$Q71TJTAG7Wi8oASFrhwsZOrj7ww1stVLNfzVvN1lojuKOAheErRwG', 'awd', 'sds', '43', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', '/storage/images/1637126392-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:19:52', '2021-11-16 21:19:52', NULL),
(77, 'tzuyu@gmasail.com', '2021-11-16 21:20:50', '$2y$10$rWLncvD4y8O44ZyAAeHqV.lx/HItTypkU6kyf3k1zAz4lFYMuNMAu', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126450-255347377_171063761908545_682922945760206006_n.jpg', 'Female', 'rescuer', NULL, '2021-11-16 21:20:50', '2021-11-16 21:20:50', NULL),
(78, 'tzuyuasdf2@gmail.com', '2021-11-16 21:21:46', '$2y$10$JjKRcJ7NiWQQ63njPZapReyTGplbxGM7GJ3Yp/q4ZIf.m80eyfChu', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126506-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:21:46', '2021-11-16 21:21:46', NULL),
(79, 'tzua23yu@gmail.com', '2021-11-16 21:22:23', '$2y$10$Mg3G9K2MMXaguKlR3y1Q.OUZDhmXjIDoCJA0m.dcnyzmROwoPgWx2', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126542-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:22:23', '2021-11-16 21:22:23', NULL),
(80, 'tzuyawdu@gmail.com', '2021-11-16 21:23:57', '$2y$10$XBbc0SOli7SgQTNrDa.Xeem0JdPuSLFCU4OgzMwpCejlhQ.S4jdc2', 'Tzuyuwad', 'Chouwad', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126637-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:23:57', '2021-11-16 21:23:57', NULL),
(81, 'ts3zuyu@gmail.com', '2021-11-16 21:25:59', '$2y$10$00D2qHE23ujdcx2qs7AvyucAOTv887s.fkysfxt0NvcwJ2YJXAK0K', 'Tzuyuawd', 'Chouwad', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126759-252873455_391112772716387_3184513031296625020_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:25:59', '2021-11-16 21:25:59', NULL),
(82, 'userawd31@gmail.com', '2021-11-16 21:28:35', '$2y$10$HkjIRowyKLP6xo2wzDkfFOmpwEZNVmIakHnYTcY4gs0aCsYyFqyAa', 'User1', 'apelyedo1', '43', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', '/storage/images/1637126915-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'rescuer', NULL, '2021-11-16 21:28:35', '2021-11-16 21:28:35', NULL),
(83, 'jc@gmail.com', '2021-11-16 21:29:19', '$2y$10$INxLwyuucOx4whAcaU0isOEnJLpIs/2OITY3w/f/dY7CU6bbjKEFy', 'Justine', 'Castaneda', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637126959-250257672_191684599815728_6626560674801879774_n.jpg', 'Female', 'rescuer', NULL, '2021-11-16 21:29:19', '2021-11-16 21:29:19', NULL),
(84, 'sad@sadsawe', '2021-11-17 01:05:07', '$2y$10$KirHIMlR6pvjFQ0ir3EPb.aU90uTArYERSFeTYd3tTw47xBLQNW4e', 'new', 'new', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637139907-245979707_1305473719875660_507958598640635031_n.png', 'Female', 'rescuer', NULL, '2021-11-17 01:05:07', '2021-11-17 01:05:07', NULL),
(86, 'as@433ae', '2021-11-17 01:06:05', '$2y$10$nInudY6K.wQwmzIMHaw27OqxI/I5F40KyeF.lSEbNnb54vM3Ksw9q', 'asdas', 'asd', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637139965-178738046_663077224495183_3240678846142174974_n.png', 'Female', 'rescuer', NULL, '2021-11-17 01:06:05', '2021-11-17 01:06:05', NULL),
(87, 'tzuyuw345rew@gmail.com', '2021-11-17 01:06:48', '$2y$10$cUZnYJd6c7ugoUIf.rmI9OBrbC6KUx.bLsKhkp5V0.UIqMT8Q/6Le', 'asdas', 'Chou', '22', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637140008-252873455_391112772716387_3184513031296625020_n.jpg', 'Male', 'rescuer', NULL, '2021-11-17 01:06:48', '2021-11-17 01:06:48', NULL),
(88, 'tzuyuwra4355@gmail.com', '2021-11-17 01:09:56', '$2y$10$xrB.K8VgSUvMwXEcM4jkj.jwee/m1YygEohK04R3qM6y09xtVY7PW', 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637140196-250257672_191684599815728_6626560674801879774_n.jpg', 'Male', 'rescuer', NULL, '2021-11-17 01:09:56', '2021-11-20 04:36:51', '2021-11-20 04:36:51'),
(89, 'tzuyu111@gmail.com', '2021-11-17 06:38:24', '$2y$10$RxbBw8cXaIwNIL23NGJuD.UZFUvl1a661VV3XTIoRYGRJmfzS4B5u', 'Tzuyu11', 'Chou11', '35', '09545343454', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637159904-254580724_613481003173249_8875832677836966144_n.jpg', 'Male', 'adopter', NULL, '2021-11-17 06:38:24', '2021-11-17 06:38:24', NULL),
(90, 'tzuyu22@gmail.com', '2021-11-17 06:38:57', '$2y$10$WQyc1k57lStGWvdlAJPSP.J6eKaBwR8oeesDpd3NFR7ONWk8D2UPi', 'Tzuyu22', 'Chou22', '351', '09545343454', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637159937-178738046_663077224495183_3240678846142174974_n.png', 'Female', 'adopter', NULL, '2021-11-17 06:38:57', '2021-11-17 06:38:57', NULL),
(91, 'tzuyuwe34@gmail.com', '2021-11-17 16:47:12', '$2y$10$uyjpt2jaB7d9/6ygEW3GY.rXKdd5pCaNYJNeTEZriQvfTyu/qLPou', 'Tzuyu34', 'Chou34', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637196432-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'veterinarian', NULL, '2021-11-17 16:47:12', '2021-11-17 16:47:12', NULL),
(92, 'tzuyuaw3@gmail.com', '2021-11-17 16:48:33', '$2y$10$40rOb5WE0J4vKnA9gTf1q.LqAoMQ58zGurmUGijuIL7FmETxvKmPS', 'Tzuyu', 'Chou', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637196513-255347377_171063761908545_682922945760206006_n.jpg', 'Male', 'veterinarian', NULL, '2021-11-17 16:48:33', '2021-11-17 19:22:33', '2021-11-17 19:22:33'),
(93, 'tzuyu3@gmail.com', '2021-11-17 16:50:38', '$2y$10$Rq4iRfRjNc.7UFoORPjDbuASQ.vEJsw9Fi9HXyJimeQqiFvHXpsPW', 'Tzuyu2', 'Chou2', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637196638-icons8-donate-32.png', 'Male', 'veterinarian', NULL, '2021-11-17 16:50:38', '2021-11-20 04:36:30', '2021-11-20 04:36:30'),
(94, 'tzuyu7@gmail.com', '2021-11-17 16:51:04', '$2y$10$Rv01DjNMjdFPcdwgcxH2JuaPJqljRLV52CiRneZYW1w9xVi.wKnNS', 'Tzuyu7', 'Chou7', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637196664-254580724_613481003173249_8875832677836966144_n.jpg', 'Male', 'veterinarian', NULL, '2021-11-17 16:51:04', '2021-11-17 19:22:29', '2021-11-17 19:22:29'),
(95, 'tzuyuawd@gmail.com', NULL, '$2y$10$1UIjJswnvSHy1eCjzrjZEOXDev7O4pzJ3OrMm/exCB29E0wPDNApS', 'Tzuyusw', 'Chous', '19', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637334103-255879789_4572416282853105_1782528598983111870_n.jpg', 'Male', 'adopter', 'eyJpdiI6InQrd3hRako1enJGdG1zQWdzOHdsd3c9PSIsInZhbHVlIjoiemRDaExoRGVrTVNidW9iaEhBNGszZz09IiwibWFjIjoiZjU4MDE5MjQyNjRhZTkxYzJjN2Q3ZjM3YzE5NGI0MzBmNDM4YTBlZGY0YTUyNjMxOTBmZGRmNTdkMjliYjgxMyJ9', '2021-11-19 07:01:43', '2021-11-20 09:08:42', NULL),
(96, 'tzuyuaw3d@gmail.com', NULL, '$2y$10$EqPyOWr6KtXrwRCQ9Su75e2HH6xJh4ZDZVQCpxJESNDfcGzZAiniG', 'Tzuyuss4', 'Chous', '19', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637334163-255879789_4572416282853105_1782528598983111870_n.jpg', 'Male', 'adopter', 'eyJpdiI6Ik9ENUpwZ3JSRmhOUnZnaGMrMTJBNGc9PSIsInZhbHVlIjoiMWVqMVhqSmdSZzhaTlY5MmpuUjBCdz09IiwibWFjIjoiNjE5Y2ExZWU4MTZkODlmMDk2ZDZjYTI5NWYyNjU4Y2VlYzIwN2QyNDE4NTMyM2UxNmViZGIwOGUxYzdlNGNlYSJ9', '2021-11-19 07:02:43', '2021-11-22 08:20:20', NULL),
(97, 'tzuyuwa2@gmail.com', NULL, '$2y$10$PI4/X2gzBtZCSmL1EI2DoesimJv1T/tuECCYah6/7yfmfmbPXBvE.', 'Tzuywau2', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637334270-255879789_4572416282853105_1782528598983111870_n.jpg', 'Male', 'adopter', 'eyJpdiI6IjdzV3E4SCtqNldjMHNSQU40L1ZiM1E9PSIsInZhbHVlIjoiYlZNTnQ5Q3JGS2lmZzd4MDZsRkU1Zz09IiwibWFjIjoiMGVlMjViNWMzZjRiOWMwYWZiMGFjNTI1MGU2ODIxNDlmNGI2ZTcyYjRhZDczNTI0NTQzYmIwMzUyMDA2ZDc4MyJ9', '2021-11-19 07:04:30', '2021-11-22 08:20:34', NULL),
(98, 'tzuya225678wdu@gmail.com', NULL, '$2y$10$LjWgglEUHcoFZXRuIBiAKeyiI5ogeHuX3PTJXNarwxwRsvbG1JaZm', 'Tzuyw22u', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637334764-255879789_4572416282853105_1782528598983111870_n.jpg', 'Male', 'adopter', 'eyJpdiI6IkVJREE2Y21xRDJ3V2tTRExjNHVVUVE9PSIsInZhbHVlIjoiQXUvWUtZbzFYbnVWQ3VTaWk2UjQyZz09IiwibWFjIjoiZjNkZjU5NjhjOTFmNGYwZDBmNjdlNzdiMTE4Y2E4NmRhM2Y4MDI3NzlmZDg4N2YyNzhjYWYyYzMwMGRmMzRkYyJ9', '2021-11-19 07:12:44', '2021-11-22 08:21:02', NULL),
(99, 'tz65uyu56@gmail.com', NULL, '$2y$10$sJw9jQcdrohUvg.IHIzUsuvEVtG13lB0hDr/zmSBDb6cup4vWj9qu', 'Tzuyu567', 'Chou', '19', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637335420-artboard_0_simplified_1637240906727.png', 'Female', 'new', 'eyJpdiI6InlqTmxlN2xaT3JDczF0dUZyVVVweHc9PSIsInZhbHVlIjoiQ05lUFlvYVJBNVF0UGtLV0grU050QT09IiwibWFjIjoiYTE4YjA5NWMxM2JjODQ4OTMyYTkwODg3Y2RjY2YyYWIwODU0OTgwY2VhOWZmNWI4NGM0OTE3Y2IwM2NiODJlNCJ9', '2021-11-19 07:23:40', '2021-11-20 04:48:46', '2021-11-20 04:48:46'),
(100, 'tzuyrr46u@gmail.com', '2021-11-20 04:30:10', '$2y$10$AR7hmbHZkSesLHsJq27mb.uflg2Ps9fIvce2Puk0WUUY1oT9LgPsu', 'Tzuyu3u', 'Chou', '35', '09545343454', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637411410-artboard_0_simplified_1637240748133.png', 'Male', 'adopter', NULL, '2021-11-20 04:30:10', '2021-11-20 04:30:28', '2021-11-20 04:30:28'),
(101, 'tzuyusd44@gmail.com', '2021-11-20 04:36:02', '$2y$10$llJgZQKxCnry.vyECsXpjecZNpP5p7iGEpXaetaD5PhDryz0CGdTC', 'Tzuyu2244', 'Chou22', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637411762-artboard_0_simplified_1637240748133.png', 'Female', 'veterinarian', NULL, '2021-11-20 04:36:02', '2021-11-20 04:36:24', '2021-11-20 04:36:24'),
(103, 'tzuy345u@gmail.com', NULL, '$2y$10$KeR4pjiZg7PTtFRA5BFwMOs/78dXnFEKdykJawsLD8Rt3inoS1zcm', 'Tzuyu', 'Chou', '19', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637575258-artboard_0_simplified_1637241006602.png', 'Female', 'rescuer', 'eyJpdiI6Im5vSVRuZVBudTRLRHUyUm1NcHdiTWc9PSIsInZhbHVlIjoiRjFmY3FMSk9ocWl0UVh3VHZRelhodz09IiwibWFjIjoiNzM3MDliNmViODVhNzAxYWEyN2UxN2Y0ZTIwZWE2MThlNDc3MzhlNjA2ZWJkZTViZjI1Nzc4OTY3Y2ViZjIwNiJ9', '2021-11-22 02:00:58', '2021-11-22 08:21:41', NULL),
(104, 'tzuyu12345678@gmail.com', NULL, '$2y$10$gpHOrqaYCgrGKEGvRKetrueN882GkkDYgCM1I8INCm6GbOpsBWh3W', 'Tzuyu', 'Chou', '20', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637575610-drake.jpeg', 'Female', 'veterinarian', 'eyJpdiI6InBGQ0U0SkF2U3ZqeHQ3Y3NBTEQ2c1E9PSIsInZhbHVlIjoiNm1NcytsbGRHdVR5b2RnbDF0bC8rZz09IiwibWFjIjoiYTFhZGE3OTQ1MjU2ODI4MjQwODU1YTY3MzFjN2ZkY2Q1YzFmYjIzOGFmYzU2OGVmNTM3ZTE1YTM3MjQ5Y2U2NCJ9', '2021-11-22 02:06:50', '2021-11-22 08:21:55', NULL),
(105, 'tzuyulast@gmail.com', NULL, '$2y$10$O6Wz6qKj4VBGIY1NPideI.BELyt/M7kstyxUaJyGEIWi6HPFP2rCq', 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637575771-artboard_0_simplified_1637241289861.png', 'Male', 'veterinarian', 'eyJpdiI6IkRkdW9aVCtmaEdlaHV5cE9pbmRVNmc9PSIsInZhbHVlIjoiNDd2azZMQ01LK3dSbFhDR2FSejBJQT09IiwibWFjIjoiMmRkN2I3YWMxYjk4OGNjMTJmYjU3ZTA1OGNlYmY4MWZmY2Q2YTNiNzI1MDRiOGQ2YWQ0NGQzMWU0N2Q4MGQ5MCJ9', '2021-11-22 02:09:31', '2021-11-22 08:24:08', NULL),
(106, 'keviasd3n@gmail.com', '2021-11-22 07:33:08', '$2y$10$.iVwudjpKLNmEy3kWvusC.MFgowX6xIM9/sc9dPlbGuB1i1cWPN82', 'newREs1', 'asadas1', '22', '09234324563', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', '/storage/images/1637595215-255879789_4572416282853105_1782528598983111870_n (1).jpg', 'Female', 'rescuer', NULL, '2021-11-22 07:33:08', '2021-11-22 07:33:58', '2021-11-22 07:33:58'),
(107, '32dswf22@gmail.com', NULL, '$2y$10$tmrR0OEdQ1L1wyka3LErL.PW.F6aw3fg0fVw4VJE/0rXvoOmY.Hre', 'newAcc', 'sadsad', '19', '09212112345', '1700 M. Adriatico St. corner General Malvar St. Manila City', '/storage/images/1637595393-Imagination-Spongebob.jpg', 'Female', 'rescuer', 'eyJpdiI6IjB2eklUR3ZYQldJQXFxQ1UwNVVQTUE9PSIsInZhbHVlIjoiR0lhazlSN1lCRjRCK2ZzdjR3ejVIQT09IiwibWFjIjoiMjY2OGNhODE0NDNkYjI1N2I4OTAxYzNjOTZiYjc4NTVhOWI0ZDA0ZjQyMWJkYmQzYzgwMmQ5NjhhOGQwNzc0MiJ9', '2021-11-22 07:36:33', '2021-11-22 08:27:26', NULL),
(108, 'b123@gmail.com', NULL, '$2y$10$eDbh/IJHGhpjRaMUzD.3.e6aPQBWzQn9pNHrpE4jD965xNQNwvmCa', 'bagoAcc', 'sdasds', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637595697-drake.jpeg', 'Female', 'adopter', 'eyJpdiI6InFTYmtmOGQ2MjBNRUwwUHJKV3loS0E9PSIsInZhbHVlIjoiVFk4eXJlTFhST1d0U0x4ZkZwempydz09IiwibWFjIjoiMWNiMWQ4YjFmM2U2MTk0MDI3YzAxNDhlMjFmNDFiOGE3ZTdhNzM0MDAzNWViODNlMWE3MWU3MmIyNzUxMGYzMCJ9', '2021-11-22 07:41:37', '2021-11-22 08:31:59', NULL),
(109, 'tzuyaw324u@gmail.com', NULL, '$2y$10$19dSiCyZ2xzuXQIUX1EduumBDyOLhrk5pU.q0C7StSvqbeQqUFDXG', 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637595731-artboard_0_simplified_1637241006602.png', 'Male', 'adopter', 'eyJpdiI6IkJFM1ZlOWgxTEFsMjRRV2ZjSTZHZHc9PSIsInZhbHVlIjoiYVBHdHJWblhETXRNUkdVNjJPTmZ0QT09IiwibWFjIjoiMGIwNzU1ZDEzNWVmMGUzNzZkM2UyNGU2NzRkOTczZDlkYzMzNzdmYTBmMWI4ZGNmNTE2ZmMwNmEyMmFiMmY2NyJ9', '2021-11-22 07:42:11', '2021-11-22 08:32:32', NULL),
(110, 'tzuyaw3u@gmail.com', NULL, '$2y$10$gHEwmyw2W3tAZKXertzdruwmeD8sk7CjDy.lUzeEv/o1pYaj1jUQi', 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637595861-PngItem_28383.png', 'Male', 'adopter', 'eyJpdiI6InY2ZUJvUG1kajNhck16OTQzVEk3dHc9PSIsInZhbHVlIjoiMklMOXNYcmFaYllQcWUxUURVbzRrQT09IiwibWFjIjoiYmNhY2U3ZmRjNWRiM2M2ZjdmOTUzNjFiZWU5MmEwMzBiZDM2OTNmYjQ3NGNhZTUwNDA5NWFmZWQzZDllZjNhMiJ9', '2021-11-22 07:44:21', '2021-11-22 08:32:45', NULL),
(111, 'tzuyw6789au@gmail.com', NULL, '$2y$10$EvLzsH64b3PftUKXzqSQFOP6maORnJn5Zhhd9lFZ/53ejTs0JAWOy', 'Tzuyu88', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637596103-255879789_4572416282853105_1782528598983111870_n (1).jpg', 'Male', 'veterinarian', 'eyJpdiI6Ik05bzVmU1RtTlZLZkpOams1cEY0bGc9PSIsInZhbHVlIjoiMm1EdXQ2MTR3OS9Rb3NWTG1BSHAzUT09IiwibWFjIjoiY2JmYTIwMjgyMWE4ZTNkMzUzOWVhZWFhYTU5ZTA1NDM2Y2Q5ZWViYzE3NTM5ZDY5NjNlYzI5M2U0M2Q1MGM2NSJ9', '2021-11-22 07:48:23', '2021-11-22 08:33:13', NULL),
(112, 'tzuysdu@gm59ail.com', NULL, '$2y$10$jH55tMQCSR48dHndjTZ50uDTDiOFNrHZTALxO0pKwynjkT093yCy2', 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637596399-Cars World_free-file.png', 'Male', 'adopter', 'eyJpdiI6IjhoK3Fsb1hpUm1VK1FzRFhORXo3dkE9PSIsInZhbHVlIjoiV21XL1UvbUNpODJ2a3ZjelRsRi8wUT09IiwibWFjIjoiZmEyYzY3NDJhNjU1YzFkYzhiNTVmOTdlMjE4NWYzYjBiODI1M2RlM2ZhZjRiMmUwNWIxM2IxYzJmZWU1OWFkOSJ9', '2021-11-22 07:53:19', '2021-11-22 08:38:56', NULL),
(113, 'tzuaw456yu@7gmail.com6', NULL, '$2y$10$BqWXdQ5rOC6aOYePbw/U8uoa6UQXTbaJYJw/ogD83bZ4Kap3NJ8p2', 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637596570-X-X-Everywhere.jpg', 'Male', 'adopter', 'eyJpdiI6InlnSitYTkljczY0TzJNTElLNE5Yc3c9PSIsInZhbHVlIjoicnFBanQvdUFyYmpuQWJHUlpDelBvQT09IiwibWFjIjoiMDNlOWQzOGQzZmU0OTVhYmFiOTkxOWNhMTA3MmU5NzJiMjE3YzQ5NDVkYmNiZTA1MjdiNWQ4ZmRjNzMxMTI2MCJ9', '2021-11-22 07:56:10', '2021-11-22 08:39:10', NULL),
(114, 'tza75fguyu@gmail.com', NULL, '$2y$10$.B3UR5J2fAkpZfvEWtm8PuKKYoAyd2oRJLvrX3Gr.qCxC0/XQuWK6', 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637596642-hqdefault.jpg', 'Male', 'adopter', 'eyJpdiI6InhmZ3RRelpKaHZTekNmSWYxQlhhR3c9PSIsInZhbHVlIjoibUJRMVhXYlYyUFVlYm9QalFVN3p5QT09IiwibWFjIjoiYjg4YTZiOTFmZjE2YTM2NTNhYjYyODU2N2Y4YTdmZTRhMzZjNTU2YTI1ZjczM2I1NGM2ZjFhYTRhYWQ0Y2I3MiJ9', '2021-11-22 07:57:22', '2021-11-22 08:40:49', NULL),
(115, 'tzuyuadp-8@gmail.com', NULL, '$2y$10$MHC.PoC0O6wBPDk2WTulquH38CLNfnGCRltc6HFXshn4SKa/JAw1e', 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637596755-icons8-donate-32.png', 'Male', 'adopter', 'eyJpdiI6IlBNSFphQ01sRFF4VzlTQ1l5VWZWSUE9PSIsInZhbHVlIjoiaGpIOGYyb1UvcTdGZ053NVdhdHRUQT09IiwibWFjIjoiZTVhZmFkNzI2OTMwYzBjZmI3OWY3NTNiNTNkMGUxNmNhMzY3MDg5ZTcxNTUxNzZhNjIxNThjYmZlZDVhYzliZCJ9', '2021-11-22 07:59:15', '2021-11-22 08:44:09', NULL),
(116, 'tzuyesfip;u@gmail.com', NULL, '$2y$10$Xd3LnMwxbAXI.cd1PD2xx.pWy1Fr12M1d5Xfo1ly2WaeY30me6PFu', 'Tzuyu', 'Chou', '20', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637597010-artboard_0_simplified_1637240790011.png', 'Male', 'adopter', 'eyJpdiI6IkRRbzN0ZG85ZHQrY09yZWpnV0ZXZ1E9PSIsInZhbHVlIjoidGZJTjZxQTFjcHNneG52UkxEc3piUT09IiwibWFjIjoiNTdhNTA4YWQzNTBkMmZjYzIyNzIzMzE3MDQ1MDVmYjkxYmIyYTUzODFlYTExZGI0YWUxMThiODMwYmU3MTI0OSJ9', '2021-11-22 08:03:30', '2021-11-22 08:44:26', NULL),
(117, 'qqqq111@gmail.com', NULL, '$2y$10$08DkyRHFv7H5iFLwnCvJv.M6G6f7MadQLb8LARQNFmJfcAjipQfkO', 'qqqq', 'qqqq', '18', '09212112345', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', '/storage/images/1637597093-245979707_1305473719875660_507958598640635031_n.png', 'Male', 'veterinarian', 'eyJpdiI6ImhVVHdUYnlMMGY5MFp3VWxScUhaN0E9PSIsInZhbHVlIjoiWkZsQWtTVmVuZ3JoTnNvSWVWOGlRUT09IiwibWFjIjoiNTM3MTljZGM2M2QyNjBhNDZjNThhOTgyMWI1OWFhMzI2NzA3ZGJlYjAyZWE4OTVlNjE4ZWRlYjc2Y2Q0OWE0YyJ9', '2021-11-22 08:04:53', '2021-11-22 08:46:16', NULL),
(118, 'iiii@gmail.com', NULL, '$2y$10$4DgnhUOIH2x08LHnU2bwBuDmEmqn0iBbMSfLlBYQvtflliMyQNUa2', 'iiii', 'iiii', '18', '09212112345', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', '/storage/images/1637597190-icons8-donate-32.png', 'Male', 'rescuer', 'eyJpdiI6Im44Tlc5ZERGM002Y1BQcE4xbXN5emc9PSIsInZhbHVlIjoiMW9pMVUzMUxxREphVVFtMERGTktkUT09IiwibWFjIjoiODc3ZmE2NDRkYmUyODc4OWRhNDhjY2FmODFjOTcwZGY5MzQyMGM0ODE1ZDQ3YjVmN2Q0NTYxNTY0NGI1Nzk4NiJ9', '2021-11-22 08:06:30', '2021-11-22 08:15:00', NULL),
(119, 'rrrr123@gmail.com', '2021-11-22 17:54:31', '$2y$10$mzoE6PG4thfBQWHHs8K26e1nogZMYzzcn21WF1kuIgUMIXnCvANaq', 'rrrr1', 'rrrr1', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637632508-drake.jpeg', 'Male', 'rescuer', NULL, '2021-11-22 17:54:31', '2021-11-22 17:55:17', '2021-11-22 17:55:17'),
(120, 'newAcc123@gmail.com', NULL, '$2y$10$LMPbhF3ZlqOLJmE7Tu/QyuHqKmASdMZ06y2nfk/RF8ncmVR6jKGYC', 'newAcc', 'newAcc', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', '/storage/images/1637632753-Imagination-Spongebob.jpg', 'Male', 'adopter', 'eyJpdiI6Im04Q293UndtWElGK1pCS1JWUW1oY0E9PSIsInZhbHVlIjoibkxob2RpZ25SQzJBaGV0UUZHNys2QT09IiwibWFjIjoiMDVmMTIzMzA0ODQ5MzlkYjFkMzhkMWVlNmY4MWQ0NjkxYjVjOTkxZDU1ZjBiYmM2YzVlYzY3YzEwYjRmYjU1NCJ9', '2021-11-22 17:59:13', '2021-11-22 17:59:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `veterinarians`
--

CREATE TABLE `veterinarians` (
  `id` int(10) UNSIGNED NOT NULL,
  `veterinarian_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veterinarian_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veterinarian_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veterinarian_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veterinarian_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `veterinarian_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `is_Add` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `veterinarians`
--

INSERT INTO `veterinarians` (`id`, `veterinarian_fname`, `veterinarian_lname`, `veterinarian_age`, `veterinarian_contact`, `veterinarian_address`, `veterinarian_gender`, `user_id`, `is_Add`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Happy', 'Pills', '25', '09207888678', 'LG 28-32 Alfaro Building146 1227 Makati City', 'Female', 49, NULL, NULL, '2021-08-11 06:04:06', '2021-11-17 18:41:29', '2021-11-17 18:41:29'),
(8, 'Tzuyu', 'Chou', '20', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 45, NULL, NULL, '2021-08-11 06:13:53', '2021-08-11 06:23:38', '2021-08-11 06:23:38'),
(9, 'Kevinfff', 'Durant', '34', '09345674324', '17 UJF Road SD 1475 Taguig City', 'Male', 54, NULL, NULL, '2021-08-11 07:59:49', '2021-11-20 09:00:32', NULL),
(10, 'Bebeww', 'Konasya', '23', '09207888631', '1700 M. Adriatico St. corner General Malvar St. Makati City', 'Male', 48, NULL, NULL, '2021-11-17 01:49:28', '2021-11-17 18:40:27', '2021-11-17 18:40:27'),
(11, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 71, NULL, NULL, '2021-11-17 01:58:41', '2021-11-17 18:44:06', '2021-11-17 18:44:06'),
(12, 'Tzuyu', 'Chou', '43', '09234324563', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 72, NULL, NULL, '2021-11-17 02:00:22', '2021-11-17 02:00:22', NULL),
(13, 'Tzuyu34', 'Chou34', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 91, NULL, NULL, '2021-11-17 16:47:12', '2021-11-17 16:47:12', NULL),
(14, 'Tzuyu', 'Chou', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 92, NULL, NULL, '2021-11-17 16:48:33', '2021-11-17 19:22:33', '2021-11-17 19:22:33'),
(15, 'Tzuyu2', 'Chou2', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 93, NULL, NULL, '2021-11-17 16:50:38', '2021-11-20 04:36:30', '2021-11-20 04:36:30'),
(16, 'Tzuyu7', 'Chou7', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 94, NULL, NULL, '2021-11-17 16:51:04', '2021-11-17 19:22:29', '2021-11-17 19:22:29'),
(17, 'Tzuyu2244', 'Chou22', '36', '09345674324', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 101, NULL, NULL, '2021-11-20 04:36:02', '2021-11-20 04:36:24', '2021-11-20 04:36:24'),
(18, 'Tzuyu', 'Chou', '20', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Female', 104, NULL, NULL, '2021-11-22 08:21:55', '2021-11-22 08:21:55', NULL),
(19, 'Tzuyu', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 105, NULL, NULL, '2021-11-22 08:24:08', '2021-11-22 08:24:08', NULL),
(20, 'Tzuyu88', 'Chou', '18', '09212112345', '16 Mabolo Road Northern Hills 1475  Malabon City', 'Male', 111, NULL, NULL, '2021-11-22 08:33:13', '2021-11-22 08:33:13', NULL),
(21, 'qqqq', 'qqqq', '18', '09212112345', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', 'Male', 117, NULL, NULL, '2021-11-22 08:46:16', '2021-11-22 08:46:16', NULL),
(22, 'vvvvvvvvvvv', 'vvvvvvvvvvvv', '34', '32423432', '1700 M. Adriatico St. corner General Malvar St. Manila City', 'Male', NULL, 1, NULL, '2021-11-27 01:46:52', '2021-11-27 01:46:52', NULL),
(23, 'vvvvvvvvvvv', 'vvvvvvvvvvvv', '34', '32423432', '1700 M. Adriatico St. corner General Malvar St. Manila City', 'Male', NULL, 1, NULL, '2021-11-27 01:47:37', '2021-11-27 01:47:37', NULL),
(24, 'vetvetvet', 'vetvetvet', '3', '34343', 'LG 28-32 Alfaro Building146 Leviste Street Salcedo Village 1227  City Makati City', 'Male', NULL, 1, NULL, '2021-11-27 01:51:11', '2021-11-27 01:51:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopters`
--
ALTER TABLE `adopters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adopter_animal`
--
ALTER TABLE `adopter_animal`
  ADD KEY `adopter_animal_adopter_id_foreign` (`adopter_id`),
  ADD KEY `adopter_animal_animal_id_foreign` (`animal_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_category_id_foreign` (`category_id`);

--
-- Indexes for table `animal_disease`
--
ALTER TABLE `animal_disease`
  ADD KEY `animal_disease_animal_id_foreign` (`animal_id`),
  ADD KEY `animal_disease_disease_id_foreign` (`disease_id`);

--
-- Indexes for table `animal_rescuer`
--
ALTER TABLE `animal_rescuer`
  ADD KEY `animal_rescuer_animal_id_foreign` (`animal_id`),
  ADD KEY `animal_rescuer_rescuer_id_foreign` (`rescuer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rescuers`
--
ALTER TABLE `rescuers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopters`
--
ALTER TABLE `adopters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `rescuers`
--
ALTER TABLE `rescuers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `veterinarians`
--
ALTER TABLE `veterinarians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopter_animal`
--
ALTER TABLE `adopter_animal`
  ADD CONSTRAINT `adopter_animal_adopter_id_foreign` FOREIGN KEY (`adopter_id`) REFERENCES `adopters` (`id`),
  ADD CONSTRAINT `adopter_animal_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `animal_disease`
--
ALTER TABLE `animal_disease`
  ADD CONSTRAINT `animal_disease_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `animal_disease_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`);

--
-- Constraints for table `animal_rescuer`
--
ALTER TABLE `animal_rescuer`
  ADD CONSTRAINT `animal_rescuer_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `animal_rescuer_rescuer_id_foreign` FOREIGN KEY (`rescuer_id`) REFERENCES `rescuers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
