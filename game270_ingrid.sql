-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: services.irn1.chabokan.net:3070
-- Generation Time: Apr 27, 2022 at 08:07 PM
-- Server version: 8.0.26
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game270_ingrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(2, NULL, 1, 'Category 2', 'category-2', '2022-04-07 09:10:53', '2022-04-07 09:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `coin_use_types`
--

CREATE TABLE `coin_use_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coin_use_types`
--

INSERT INTO `coin_use_types` (`id`, `name`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'new_tournament', NULL, -100, '2022-04-10 13:55:45', '2022-04-10 13:55:45'),
(2, 'helepr_ChancePercent', NULL, -60, '2022-04-14 04:00:35', '2022-04-14 04:01:09'),
(3, 'helepr_EnableTwoChance', NULL, -40, '2022-04-14 04:00:49', '2022-04-14 04:00:49'),
(4, 'helepr_RemoveTwoAnswer', NULL, -40, '2022-04-14 04:01:02', '2022-04-14 04:01:02'),
(5, 'tournament_win', NULL, 150, '2022-04-17 12:10:23', '2022-04-17 12:10:23'),
(6, 'tournament_equal', NULL, 50, '2022-04-17 12:11:29', '2022-04-17 12:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int UNSIGNED NOT NULL,
  `data_type_id` int UNSIGNED NOT NULL,
  `field` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'voyager::seeders.data_rows.roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 1, 0, 0, 0, 0, '{}', 1),
(57, 7, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 2),
(58, 7, 'answer01', 'text', 'Answer01', 0, 0, 1, 1, 1, 1, '{}', 3),
(59, 7, 'answer02', 'text', 'Answer02', 0, 0, 1, 1, 1, 1, '{}', 4),
(60, 7, 'answer03', 'text', 'Answer03', 0, 0, 1, 1, 1, 1, '{}', 5),
(61, 7, 'answer04', 'text', 'Answer04', 0, 0, 1, 1, 1, 1, '{}', 6),
(62, 7, 'true_answer', 'text', 'True Answer', 0, 1, 1, 1, 1, 1, '{}', 7),
(63, 7, 'music', 'file', 'Music', 0, 0, 1, 1, 1, 1, '{}', 8),
(64, 7, 'image', 'image', 'Image', 0, 0, 1, 1, 1, 1, '{}', 9),
(65, 7, 'video', 'file', 'Video', 0, 0, 1, 1, 1, 1, '{}', 10),
(66, 7, 'author_id', 'text', 'Author Id', 0, 1, 1, 1, 1, 1, '{}', 11),
(67, 7, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{\"default\":\"approve\",\"options\":{\"pending\":\"pending\",\"approve\":\"approve\",\"reject\":\"reject\"}}', 21),
(68, 7, 'category_id', 'text', 'Category Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(69, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(70, 8, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(71, 8, 'icon', 'image', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 2),
(72, 8, 'parent_id', 'text', 'Parent Id', 0, 0, 0, 0, 0, 0, '{}', 4),
(73, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(74, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(75, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(76, 9, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 3),
(77, 9, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 4),
(78, 9, 'price', 'text', 'Price', 0, 1, 1, 1, 1, 1, '{}', 5),
(79, 9, 'icon', 'image', 'Icon', 0, 1, 1, 1, 1, 1, '{}', 2),
(80, 9, 'coin', 'text', 'Coin', 0, 1, 1, 1, 1, 1, '{}', 6),
(81, 9, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(82, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(83, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(84, 10, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(85, 10, 'package_id', 'text', 'Package Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(86, 10, 'refid', 'text', 'Refid', 0, 1, 1, 1, 1, 1, '{}', 4),
(87, 10, 'authority', 'text', 'Authority', 0, 1, 1, 1, 1, 1, '{}', 5),
(88, 10, 'amount', 'text', 'Amount', 0, 1, 1, 1, 1, 1, '{}', 6),
(89, 10, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, '{}', 7),
(90, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(91, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(92, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(93, 11, 'first_user_id', 'text', 'First User Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(94, 11, 'second_user_id', 'text', 'Second User Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(95, 11, 'winner_user_id', 'text', 'Winner User Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(96, 11, 'first_user_true_answer', 'text', 'First User True Answer', 0, 1, 1, 1, 1, 1, '{}', 7),
(97, 11, 'second_user_true_answer', 'text', 'Second User True Answer', 0, 1, 1, 1, 1, 1, '{}', 8),
(98, 11, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{\"default\":\"play\",\"options\":{\"play\":\"play\",\"complete\":\"complete\"}}', 12),
(99, 11, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 9),
(100, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(101, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(102, 12, 'tournament_id', 'text', 'Tournament Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(103, 12, 'quiz_id', 'text', 'Quiz Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(104, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(105, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(106, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 16),
(107, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 15),
(108, 7, 'type', 'select_dropdown', 'Type', 0, 1, 1, 1, 1, 1, '{\"default\":\"4answer\",\"options\":{\"4answer\":\"4answer\",\"image\":\"image\",\"music\":\"music\",\"video\":\"video\",\"true\\/false\":\"true\\/false\"}}', 12),
(109, 7, 'quiz_belongsto_quiz_category_relationship', 'relationship', 'quiz_categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\QuizCategory\",\"table\":\"quiz_categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(110, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(111, 13, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(112, 13, 'type', 'text', 'Type', 0, 1, 1, 1, 1, 1, '{}', 3),
(113, 13, 'value', 'text', 'Value', 0, 1, 1, 1, 1, 1, '{}', 4),
(114, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(115, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(116, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(117, 15, 'follower_id', 'text', 'Follower Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(118, 15, 'following_id', 'text', 'Following Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(119, 15, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(120, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(121, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(122, 17, 'from', 'text', 'From', 0, 1, 1, 1, 1, 1, '{}', 2),
(123, 17, 'to', 'text', 'To', 0, 1, 1, 1, 1, 1, '{}', 3),
(124, 17, 'text', 'text', 'Text', 0, 1, 1, 1, 1, 1, '{}', 4),
(125, 17, 'attach', 'text', 'Attach', 0, 1, 1, 1, 1, 1, '{}', 5),
(126, 17, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(127, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(128, 7, 'like', 'text', 'Like', 0, 1, 0, 0, 0, 0, '{}', 18),
(129, 7, 'dislike', 'text', 'Dislike', 0, 1, 0, 0, 0, 0, '{}', 19),
(130, 7, 'report', 'text', 'Report', 0, 0, 1, 0, 0, 0, '{}', 20),
(131, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 6),
(132, 1, 'score', 'text', 'Score', 0, 1, 1, 1, 1, 1, '{}', 12),
(133, 1, 'wallet', 'text', 'Wallet', 0, 1, 1, 1, 1, 1, '{}', 13),
(134, 1, 'token', 'text', 'Token', 0, 1, 1, 1, 1, 1, '{}', 14),
(135, 8, 'status', 'select_dropdown', 'Status', 0, 1, 1, 1, 1, 1, '{\"default\":\"active\",\"options\":{\"active\":\"active\",\"deactive\":\"deactive\"}}', 7),
(136, 7, 'quiz_belongsto_user_relationship', 'relationship', 'Author', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"author_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 17),
(137, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(138, 18, 'tournament_01', 'text', 'Tournament 01', 0, 1, 1, 1, 1, 1, '{}', 2),
(139, 18, 'tournament_02', 'text', 'Tournament 02', 0, 1, 1, 1, 1, 1, '{}', 3),
(140, 18, 'tournament_03', 'text', 'Tournament 03', 0, 1, 1, 1, 1, 1, '{}', 4),
(141, 18, 'tournament_04', 'text', 'Tournament 04', 0, 1, 1, 1, 1, 1, '{}', 5),
(142, 18, 'tournament_05', 'text', 'Tournament 05', 0, 1, 1, 1, 1, 1, '{}', 6),
(143, 18, 'tournament_06', 'text', 'Tournament 06', 0, 1, 1, 1, 1, 1, '{}', 7),
(144, 18, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(145, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(146, 11, 'tournament_belongsto_quiz_category_relationship', 'relationship', 'quiz_categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\QuizCategory\",\"table\":\"quiz_categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(147, 11, 'category_id', 'text', 'Category Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(148, 11, 'tournament_belongsto_user_relationship', 'relationship', 'first User', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"first_user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(149, 11, 'tournament_belongsto_user_relationship_1', 'relationship', 'Second User', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"second_user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-04-07 09:10:52', '2022-04-14 14:58:27'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-04-07 09:10:52', '2022-04-07 09:10:52'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(7, 'quizzes', 'quizzes', 'Quiz', 'Quizzes', NULL, 'App\\Models\\Quiz', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-07 09:34:03', '2022-04-27 13:31:28'),
(8, 'quiz_categories', 'quiz-categories', 'Quiz Category', 'Quiz Categories', NULL, 'App\\Models\\QuizCategory', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-07 09:35:59', '2022-04-16 14:49:22'),
(9, 'packages', 'packages', 'Package', 'Packages', NULL, 'App\\Models\\Package', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-07 09:47:22', '2022-04-07 13:59:01'),
(10, 'payments', 'payments', 'Payment', 'Payments', NULL, 'App\\Models\\Payment', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-07 09:47:45', '2022-04-07 09:47:45'),
(11, 'tournaments', 'tournaments', 'Tournament', 'Tournaments', NULL, 'App\\Models\\Tournament', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-08 10:55:05', '2022-04-27 15:28:08'),
(12, 'tournament_quizzes', 'tournament-quizzes', 'Tournament Quiz', 'Tournament Quizzes', NULL, 'App\\Models\\TournamentQuiz', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-09 12:55:27', '2022-04-09 12:55:27'),
(13, 'coin_use_types', 'coin-use-types', 'Coin Use Type', 'Coin Use Types', NULL, 'App\\Models\\CoinUseType', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-10 13:55:17', '2022-04-10 13:55:17'),
(15, 'followers', 'followers', 'Follower', 'Followers', NULL, 'App\\Models\\Followers', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-13 11:45:32', '2022-04-13 11:45:32'),
(17, 'messages', 'messages', 'Message', 'Messages', NULL, 'App\\Models\\message', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-13 15:29:14', '2022-04-13 15:29:14'),
(18, 'tournament_boards', 'tournament-boards', 'Tournament Board', 'Tournament Boards', NULL, 'App\\Models\\TournamentBoard', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-27 12:39:16', '2022-04-27 12:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int UNSIGNED NOT NULL,
  `follower_id` int DEFAULT NULL,
  `following_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `follower_id`, `following_id`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 2, 4, NULL, NULL),
(7, 3, 4, NULL, NULL),
(8, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-04-07 09:10:53', '2022-04-07 09:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2022-04-07 09:10:53', '2022-04-07 09:10:53', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2022-04-07 09:10:53', '2022-04-07 09:10:53', 'voyager.pages.index', NULL),
(14, 1, 'Quizzes', '', '_self', NULL, NULL, NULL, 15, '2022-04-07 09:34:03', '2022-04-07 09:34:03', 'voyager.quizzes.index', NULL),
(15, 1, 'Quiz Categories', '', '_self', NULL, NULL, NULL, 16, '2022-04-07 09:35:59', '2022-04-07 09:35:59', 'voyager.quiz-categories.index', NULL),
(16, 1, 'Packages', '', '_self', NULL, NULL, NULL, 17, '2022-04-07 09:47:22', '2022-04-07 09:47:22', 'voyager.packages.index', NULL),
(17, 1, 'Payments', '', '_self', NULL, NULL, NULL, 18, '2022-04-07 09:47:45', '2022-04-07 09:47:45', 'voyager.payments.index', NULL),
(18, 1, 'Tournaments', '', '_self', NULL, NULL, NULL, 19, '2022-04-08 10:55:05', '2022-04-08 10:55:05', 'voyager.tournaments.index', NULL),
(19, 1, 'Tournament Quizzes', '', '_self', NULL, NULL, NULL, 20, '2022-04-09 12:55:27', '2022-04-09 12:55:27', 'voyager.tournament-quizzes.index', NULL),
(20, 1, 'Coin Use Types', '', '_self', NULL, NULL, NULL, 21, '2022-04-10 13:55:17', '2022-04-10 13:55:17', 'voyager.coin-use-types.index', NULL),
(21, 1, 'Followers', '', '_self', NULL, NULL, NULL, 22, '2022-04-13 11:45:32', '2022-04-13 11:45:32', 'voyager.followers.index', NULL),
(22, 1, 'Messages', '', '_self', NULL, NULL, NULL, 23, '2022-04-13 15:29:15', '2022-04-13 15:29:15', 'voyager.messages.index', NULL),
(23, 1, 'Tournament Boards', '', '_self', NULL, NULL, NULL, 24, '2022-04-27 12:39:16', '2022-04-27 12:39:16', 'voyager.tournament-boards.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int UNSIGNED NOT NULL,
  `from_id` int DEFAULT NULL,
  `to_id` int DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `attach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `text`, `attach`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'سلام', NULL, '2022-04-13 15:42:29', '2022-04-13 15:42:29'),
(2, 2, 3, 'چه خبر', NULL, '2022-04-13 15:42:36', '2022-04-13 15:42:36'),
(3, 2, 3, 'asdasd', NULL, '2022-04-13 15:53:45', '2022-04-13 15:53:45'),
(4, 2, 2, 'asdas', NULL, '2022-04-13 15:53:55', '2022-04-13 15:53:55'),
(5, 2, 1, 'asdasd', NULL, '2022-04-13 15:54:42', '2022-04-13 15:54:42'),
(6, 4, 3, 'hiiii', NULL, '2022-04-13 15:56:48', '2022-04-13 15:56:48'),
(7, 3, 4, 'What?', NULL, '2022-04-13 15:57:05', '2022-04-13 15:57:05'),
(8, 3, 4, 'asdas', NULL, '2022-04-13 16:09:19', '2022-04-13 16:09:19'),
(9, 4, 3, 'none', NULL, '2022-04-13 16:10:51', '2022-04-13 16:10:51'),
(10, 3, 4, 'sdfsd', NULL, '2022-04-13 16:12:03', '2022-04-13 16:12:03'),
(11, 3, 2, 'asd', NULL, '2022-04-13 16:49:08', '2022-04-13 16:49:08'),
(12, 2, 4, 'asdas', NULL, '2022-04-13 16:49:20', '2022-04-13 16:49:20'),
(13, 2, 3, 'سلام خوبی؟', NULL, '2022-04-13 16:50:37', '2022-04-13 16:50:37'),
(14, 3, 2, 'چه خبرا ؟', NULL, '2022-04-13 16:50:45', '2022-04-13 16:50:45'),
(15, 2, 3, 'سلامتی', NULL, '2022-04-13 16:50:51', '2022-04-13 16:50:51'),
(16, 2, 4, 'یدی', NULL, '2022-04-13 23:16:47', '2022-04-13 23:16:47'),
(17, 3, 4, 'چطوری رضا', NULL, '2022-04-14 16:09:39', '2022-04-14 16:09:39'),
(18, 4, 3, 'خوبم', NULL, '2022-04-14 16:10:46', '2022-04-14 16:10:46'),
(19, 4, 3, 'مرسی', NULL, '2022-04-14 16:10:49', '2022-04-14 16:10:49'),
(20, 4, 3, '😥😍🤔😁😘', NULL, '2022-04-14 16:19:44', '2022-04-14 16:19:44'),
(21, 2, 5, 'سلام', NULL, '2022-04-16 15:54:22', '2022-04-16 15:54:22'),
(22, 5, 2, 'سلام', NULL, '2022-04-16 15:55:01', '2022-04-16 15:55:01'),
(23, 2, 5, 'سکتی', NULL, '2022-04-16 15:55:04', '2022-04-16 15:55:04'),
(24, 5, 2, 'شما', NULL, '2022-04-16 15:55:08', '2022-04-16 15:55:08'),
(25, 2, 5, 'من جن هستم', NULL, '2022-04-16 15:55:18', '2022-04-16 15:55:18'),
(26, 2, 5, '😈👿', NULL, '2022-04-16 15:55:24', '2022-04-16 15:55:24'),
(27, 2, 5, 'موووخوورمت', NULL, '2022-04-16 15:55:34', '2022-04-16 15:55:34'),
(28, 5, 2, '🤣وای ترسیدم', NULL, '2022-04-16 15:55:34', '2022-04-16 15:55:34'),
(29, 2, 1, 'aasdas', NULL, '2022-04-27 14:31:19', '2022-04-27 14:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2020_11_26_000000_create_spammers_table', 1),
(5, '2016_01_01_000000_add_voyager_user_fields', 2),
(6, '2016_01_01_000000_create_data_types_table', 2),
(7, '2016_05_19_173453_create_menu_table', 2),
(8, '2016_10_21_190000_create_roles_table', 2),
(9, '2016_10_21_190000_create_settings_table', 2),
(10, '2016_11_30_135954_create_permission_table', 2),
(11, '2016_11_30_141208_create_permission_role_table', 2),
(12, '2016_12_26_201236_data_types__add__server_side', 2),
(13, '2017_01_13_000000_add_route_to_menu_items_table', 2),
(14, '2017_01_14_005015_create_translations_table', 2),
(15, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 2),
(16, '2017_03_06_000000_add_controller_to_data_types_table', 2),
(17, '2017_04_21_000000_add_order_to_data_rows_table', 2),
(18, '2017_07_05_210000_add_policyname_to_data_types_table', 2),
(19, '2017_08_05_000000_add_group_to_settings_table', 2),
(20, '2017_11_26_013050_add_user_role_relationship', 2),
(21, '2017_11_26_015000_create_user_roles_table', 2),
(22, '2018_03_11_000000_add_user_settings', 2),
(23, '2018_03_14_000000_add_details_to_data_types_table', 2),
(24, '2018_03_16_000000_make_settings_value_nullable', 2),
(25, '2016_01_01_000000_create_pages_table', 3),
(26, '2016_01_01_000000_create_posts_table', 3),
(27, '2016_02_15_204651_create_categories_table', 3),
(28, '2017_04_11_000000_alter_post_nullable_fields_table', 3),
(29, '2022_04_13_163455_create_chat_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` int DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `icon`, `coin`, `created_at`, `updated_at`) VALUES
(1, '1,700 سکه', '1,700 سکه', 4900, 'packages/April2022/xWt3V9ENobxHZA16d46e.png', 1700, '2022-04-07 13:58:00', '2022-04-08 02:29:11'),
(2, '5,500 سکه', '5,500 سکه', 15000, NULL, 5500, '2022-04-07 13:59:37', '2022-04-07 13:59:37'),
(3, '18,000 سکه', '18,000 سکه', 45000, NULL, 18000, '2022-04-07 14:06:56', '2022-04-07 14:06:56'),
(4, '30,000 سکه', '30,000 سکه', 75000, NULL, 30000, '2022-04-15 07:51:46', '2022-04-15 07:51:46'),
(5, '45,000 سکه', '45,000 سکه', 75000, NULL, 45000, '2022-04-15 07:52:27', '2022-04-15 07:52:27'),
(6, '100,000 سکه', '100,000 سکه', 149000, NULL, 100000, '2022-04-15 07:53:19', '2022-04-15 07:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-04-07 09:10:53', '2022-04-07 09:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `package_id` int DEFAULT NULL,
  `refid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `package_id`, `refid`, `authority`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL, 45000, 'pending', '2022-04-12 08:55:01', '2022-04-12 08:55:01'),
(2, 2, 3, NULL, '000000000000000000000000000000807247', 45000, 'pending', '2022-04-12 08:57:38', '2022-04-12 08:57:39'),
(3, 2, 2, NULL, '000000000000000000000000000000807248', 15000, 'pending', '2022-04-12 08:57:49', '2022-04-12 08:57:49'),
(4, 2, 2, NULL, '000000000000000000000000000000807256', 15000, 'pending', '2022-04-12 09:00:03', '2022-04-12 09:00:12'),
(5, 2, 3, NULL, '000000000000000000000000000000807255', 45000, 'canceled', '2022-04-12 09:00:11', '2022-04-12 09:00:14'),
(6, 2, 2, '0', '000000000000000000000000000000807282', 15000, 'complete', '2022-04-12 09:12:32', '2022-04-12 09:13:11'),
(7, 4, 2, '0', '000000000000000000000000000000808993', 15000, 'complete', '2022-04-14 16:20:22', '2022-04-14 17:08:57'),
(8, 2, 5, NULL, '000000000000000000000000000000810510', 75000, 'pending', '2022-04-16 15:56:12', '2022-04-16 15:56:13'),
(9, 2, 5, NULL, '000000000000000000000000000000811538', 75000, 'pending', '2022-04-17 11:31:12', '2022-04-17 11:31:13'),
(10, 2, 4, NULL, '000000000000000000000000000000811539', 75000, 'canceled', '2022-04-17 11:31:52', '2022-04-17 11:31:57'),
(11, 2, 5, NULL, '000000000000000000000000000000811540', 75000, 'canceled', '2022-04-17 11:33:36', '2022-04-17 11:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(2, 'browse_bread', NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(3, 'browse_database', NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(4, 'browse_media', NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(5, 'browse_compass', NULL, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(6, 'browse_menus', 'menus', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(7, 'read_menus', 'menus', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(8, 'edit_menus', 'menus', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(9, 'add_menus', 'menus', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(10, 'delete_menus', 'menus', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(11, 'browse_roles', 'roles', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(12, 'read_roles', 'roles', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(13, 'edit_roles', 'roles', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(14, 'add_roles', 'roles', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(15, 'delete_roles', 'roles', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(16, 'browse_users', 'users', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(17, 'read_users', 'users', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(18, 'edit_users', 'users', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(19, 'add_users', 'users', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(20, 'delete_users', 'users', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(21, 'browse_settings', 'settings', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(22, 'read_settings', 'settings', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(23, 'edit_settings', 'settings', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(24, 'add_settings', 'settings', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(25, 'delete_settings', 'settings', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(26, 'browse_categories', 'categories', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(27, 'read_categories', 'categories', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(28, 'edit_categories', 'categories', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(29, 'add_categories', 'categories', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(30, 'delete_categories', 'categories', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(31, 'browse_posts', 'posts', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(32, 'read_posts', 'posts', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(33, 'edit_posts', 'posts', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(34, 'add_posts', 'posts', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(35, 'delete_posts', 'posts', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(36, 'browse_pages', 'pages', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(37, 'read_pages', 'pages', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(38, 'edit_pages', 'pages', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(39, 'add_pages', 'pages', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(40, 'delete_pages', 'pages', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(41, 'browse_quizzes', 'quizzes', '2022-04-07 09:34:03', '2022-04-07 09:34:03'),
(42, 'read_quizzes', 'quizzes', '2022-04-07 09:34:03', '2022-04-07 09:34:03'),
(43, 'edit_quizzes', 'quizzes', '2022-04-07 09:34:03', '2022-04-07 09:34:03'),
(44, 'add_quizzes', 'quizzes', '2022-04-07 09:34:03', '2022-04-07 09:34:03'),
(45, 'delete_quizzes', 'quizzes', '2022-04-07 09:34:03', '2022-04-07 09:34:03'),
(46, 'browse_quiz_categories', 'quiz_categories', '2022-04-07 09:35:59', '2022-04-07 09:35:59'),
(47, 'read_quiz_categories', 'quiz_categories', '2022-04-07 09:35:59', '2022-04-07 09:35:59'),
(48, 'edit_quiz_categories', 'quiz_categories', '2022-04-07 09:35:59', '2022-04-07 09:35:59'),
(49, 'add_quiz_categories', 'quiz_categories', '2022-04-07 09:35:59', '2022-04-07 09:35:59'),
(50, 'delete_quiz_categories', 'quiz_categories', '2022-04-07 09:35:59', '2022-04-07 09:35:59'),
(51, 'browse_packages', 'packages', '2022-04-07 09:47:22', '2022-04-07 09:47:22'),
(52, 'read_packages', 'packages', '2022-04-07 09:47:22', '2022-04-07 09:47:22'),
(53, 'edit_packages', 'packages', '2022-04-07 09:47:22', '2022-04-07 09:47:22'),
(54, 'add_packages', 'packages', '2022-04-07 09:47:22', '2022-04-07 09:47:22'),
(55, 'delete_packages', 'packages', '2022-04-07 09:47:22', '2022-04-07 09:47:22'),
(56, 'browse_payments', 'payments', '2022-04-07 09:47:45', '2022-04-07 09:47:45'),
(57, 'read_payments', 'payments', '2022-04-07 09:47:45', '2022-04-07 09:47:45'),
(58, 'edit_payments', 'payments', '2022-04-07 09:47:45', '2022-04-07 09:47:45'),
(59, 'add_payments', 'payments', '2022-04-07 09:47:45', '2022-04-07 09:47:45'),
(60, 'delete_payments', 'payments', '2022-04-07 09:47:45', '2022-04-07 09:47:45'),
(61, 'browse_tournaments', 'tournaments', '2022-04-08 10:55:05', '2022-04-08 10:55:05'),
(62, 'read_tournaments', 'tournaments', '2022-04-08 10:55:05', '2022-04-08 10:55:05'),
(63, 'edit_tournaments', 'tournaments', '2022-04-08 10:55:05', '2022-04-08 10:55:05'),
(64, 'add_tournaments', 'tournaments', '2022-04-08 10:55:05', '2022-04-08 10:55:05'),
(65, 'delete_tournaments', 'tournaments', '2022-04-08 10:55:05', '2022-04-08 10:55:05'),
(66, 'browse_tournament_quizzes', 'tournament_quizzes', '2022-04-09 12:55:27', '2022-04-09 12:55:27'),
(67, 'read_tournament_quizzes', 'tournament_quizzes', '2022-04-09 12:55:27', '2022-04-09 12:55:27'),
(68, 'edit_tournament_quizzes', 'tournament_quizzes', '2022-04-09 12:55:27', '2022-04-09 12:55:27'),
(69, 'add_tournament_quizzes', 'tournament_quizzes', '2022-04-09 12:55:27', '2022-04-09 12:55:27'),
(70, 'delete_tournament_quizzes', 'tournament_quizzes', '2022-04-09 12:55:27', '2022-04-09 12:55:27'),
(71, 'browse_coin_use_types', 'coin_use_types', '2022-04-10 13:55:17', '2022-04-10 13:55:17'),
(72, 'read_coin_use_types', 'coin_use_types', '2022-04-10 13:55:17', '2022-04-10 13:55:17'),
(73, 'edit_coin_use_types', 'coin_use_types', '2022-04-10 13:55:17', '2022-04-10 13:55:17'),
(74, 'add_coin_use_types', 'coin_use_types', '2022-04-10 13:55:17', '2022-04-10 13:55:17'),
(75, 'delete_coin_use_types', 'coin_use_types', '2022-04-10 13:55:17', '2022-04-10 13:55:17'),
(76, 'browse_followers', 'followers', '2022-04-13 11:45:32', '2022-04-13 11:45:32'),
(77, 'read_followers', 'followers', '2022-04-13 11:45:32', '2022-04-13 11:45:32'),
(78, 'edit_followers', 'followers', '2022-04-13 11:45:32', '2022-04-13 11:45:32'),
(79, 'add_followers', 'followers', '2022-04-13 11:45:32', '2022-04-13 11:45:32'),
(80, 'delete_followers', 'followers', '2022-04-13 11:45:32', '2022-04-13 11:45:32'),
(81, 'browse_messages', 'messages', '2022-04-13 15:29:15', '2022-04-13 15:29:15'),
(82, 'read_messages', 'messages', '2022-04-13 15:29:15', '2022-04-13 15:29:15'),
(83, 'edit_messages', 'messages', '2022-04-13 15:29:15', '2022-04-13 15:29:15'),
(84, 'add_messages', 'messages', '2022-04-13 15:29:15', '2022-04-13 15:29:15'),
(85, 'delete_messages', 'messages', '2022-04-13 15:29:15', '2022-04-13 15:29:15'),
(86, 'browse_tournament_boards', 'tournament_boards', '2022-04-27 12:39:16', '2022-04-27 12:39:16'),
(87, 'read_tournament_boards', 'tournament_boards', '2022-04-27 12:39:16', '2022-04-27 12:39:16'),
(88, 'edit_tournament_boards', 'tournament_boards', '2022-04-27 12:39:16', '2022-04-27 12:39:16'),
(89, 'add_tournament_boards', 'tournament_boards', '2022-04-27 12:39:16', '2022-04-27 12:39:16'),
(90, 'delete_tournament_boards', 'tournament_boards', '2022-04-27 12:39:16', '2022-04-27 12:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-07 09:10:53', '2022-04-07 09:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int UNSIGNED NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `answer01` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer02` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer03` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer04` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `true_answer` int DEFAULT NULL,
  `music` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `like` int DEFAULT NULL,
  `dislike` int DEFAULT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `description`, `answer01`, `answer02`, `answer03`, `answer04`, `true_answer`, `music`, `image`, `video`, `author_id`, `status`, `category_id`, `created_at`, `updated_at`, `type`, `like`, `dislike`, `report`) VALUES
(8, 'خواننده آلبوم نون دلقک کیست ؟', 'محمد اصفهانی', 'علرضا افتخاری', 'سینا سرلک', 'علیرضا قربانی', 1, '[]', NULL, '[]', 2, 'approve', 10, '2022-04-11 12:52:00', '2022-04-16 14:53:11', '4answer', NULL, NULL, NULL),
(17, 'تعداد حلقه های المپیک؟', '5 عدد', '6 عدد', '7 عدد', '8 عدد', 1, '[]', NULL, '[]', 2, 'approve', 6, '2022-04-16 14:19:25', '2022-04-16 14:53:36', '4answer', NULL, NULL, NULL),
(18, 'تعداد اعضای شورای نگهبان؟', 'شش نفر', 'هشت نفر', 'سیزده نفر', 'دوازده نفر', 4, '[]', NULL, '[]', 2, 'approve', 6, '2022-04-16 14:24:58', '2022-04-16 14:53:42', '4answer', NULL, NULL, NULL),
(19, 'واحد پول کشور ژاپن کدام است؟', 'یوان', 'پن', 'تاکا', 'دلار', 2, '[]', NULL, '[]', 2, 'approve', 6, '2022-04-16 14:25:56', '2022-04-18 08:01:22', '4answer', 1, NULL, NULL),
(20, 'غذای سوشی از کدام کشور آمده؟', 'تایلند', 'ژاپن', 'چین', 'کره', 2, '[]', NULL, '[]', 2, 'approve', 6, '2022-04-16 14:27:07', '2022-04-16 14:54:21', '4answer', NULL, NULL, NULL),
(21, 'در نت نویسی کدام یک از ساز های زیر، از«حامل مضاعف» استفاده می‌کنند؟', 'پیانو', 'ترمبون', 'ساکسوفون', 'تیمپانی', 1, '[]', NULL, '[]', 2, 'approve', 10, '2022-04-16 14:28:20', '2022-04-16 14:54:43', '4answer', NULL, NULL, NULL),
(22, 'سبک آهنگ های علیرضا قربانی؟', 'پاپ', 'سنتی ایرانی', 'تلفیقی', 'کلاسیک', 2, '[]', NULL, '[]', 2, 'approve', 10, '2022-04-16 14:30:36', '2022-04-16 14:54:50', '4answer', NULL, NULL, NULL),
(23, 'گروه ماکان بند از چند نفر تشکیل شده است؟', '1', '2', '3', '4', 2, '[]', NULL, '[]', 2, 'approve', 10, '2022-04-16 14:31:18', '2022-04-16 14:54:58', '4answer', NULL, NULL, NULL),
(24, 'مازیار فلاحی در کدام سریال خانگی ایفای نقش کرده است؟', 'عاشقانه', 'ممنوعه', 'قلب یخی', 'هفت سنگ', 3, '[]', NULL, '[]', 2, 'approve', 10, '2022-04-16 14:33:38', '2022-04-16 14:55:06', '4answer', NULL, NULL, NULL),
(25, 'عامل و علت تقسيم بندي سرگذشت بشر به دو دوران پيش از تاريخ و تاريخي چه مي باشد؟', 'اهلي كردن حيوانات', 'اختراع چرخ', 'كشف آتش', 'اختراع خط', 4, '[]', NULL, '[]', 2, 'approve', 7, '2022-04-16 15:23:40', '2022-04-16 15:23:51', '4answer', NULL, NULL, NULL),
(26, 'نخستين شهرهاي ميان در رود باستان در كجا پديد آمد؟', 'اور', 'كيش', 'لاگاش', 'سومر', 4, '[]', NULL, '[]', 2, 'approve', 7, '2022-04-16 15:25:39', '2022-04-16 15:25:39', '4answer', NULL, NULL, NULL),
(27, 'آخرين قومي كه بيش از يك قرن در ميان دو رود حكومت كردند.........................بودند.', 'كلداني', 'آشوري', 'اورارتور', 'ماد', 1, '[]', NULL, '[]', 2, 'approve', 7, '2022-04-16 15:26:43', '2022-04-16 15:26:43', '4answer', NULL, NULL, NULL),
(28, 'کدامیک از دلایل عمده جهانگردی در گذشته بوده است؟', 'تجاری - مذهبی', 'ورزشی – درمانی', 'فرهنگی – آموزشی', 'سیاسی – تفریحی', 4, '[]', NULL, '[]', 2, 'approve', 8, '2022-04-16 15:28:43', '2022-04-16 15:51:13', '4answer', 1, NULL, NULL),
(29, 'تاج محل و مسجد ایاصوفیه بترتیب در کدام کشورها قرار دارند؟', 'پاکستان – ترکیه', 'افغانستان – قبرس', 'هندوستان – ترکیه', 'هندوستان – یونان', 3, '[]', NULL, '[]', 2, 'approve', 8, '2022-04-16 15:29:47', '2022-04-16 15:29:47', '4answer', NULL, NULL, NULL),
(30, 'پارک ملی گلستان بین کدام شهرها قرار دارد؟', 'گنبد کاووس و بجنورد', 'گرگان و گنبد', 'نور و نوشهر', 'چالوس و آستارا', 1, '[]', NULL, '[]', 2, 'approve', 8, '2022-04-16 15:31:31', '2022-04-16 15:31:31', '4answer', NULL, NULL, NULL),
(31, 'بازیگر شخصیت کاپیتان آمریکا (Captain America) کدام یک از گزینه های زیر است؟', 'Christian Bale', 'Christopher Reeve', 'Chris Evans', 'Robert Downey Jr', 1, '[]', NULL, '[]', 2, 'approve', 11, '2022-04-16 15:36:22', '2022-04-16 15:36:22', '4answer', NULL, NULL, NULL),
(32, 'فیلم مادر ساخته چه کسی است ؟', 'علی حاتمی', 'رضا عطاران', 'بهاره رهنما', 'اصغر فرهادی', 1, '[]', NULL, '[]', 2, 'approve', 11, '2022-04-16 15:37:36', '2022-04-16 15:37:36', '4answer', NULL, NULL, NULL),
(33, 'کارگردان مجموعه زیر آسمان شهر', 'جواد عزتی', 'مهران مدیری', 'مهران غفوریان', 'رضا عطاران', 3, '[]', NULL, '[]', 2, 'approve', 11, '2022-04-16 15:38:35', '2022-04-16 15:38:35', '4answer', NULL, NULL, NULL),
(34, 'کدام یک از کمپانی های زیر تا به حال کنسول دستی تولید نکرده است', 'راکستار', 'مایکروسافت', 'یوبی سافت', 'الکترونیک آرتز', 2, '[]', NULL, '[]', 2, 'approve', 9, '2022-04-16 15:41:42', '2022-04-16 15:41:42', '4answer', NULL, NULL, NULL),
(35, 'بهترین بازی سبک استراتژی 2019 در مراسم Game Awards کدام بود', 'Elder Rings', 'Fire Emblem Three Houses', 'sims', 'Fifa', 2, '[]', NULL, '[]', 2, 'approve', 9, '2022-04-16 15:42:56', '2022-04-16 15:42:56', '4answer', NULL, NULL, NULL),
(36, 'ماریو اولین بار در کدام بازی حاضر شد', 'Super Mario', 'Pac Man', 'Spiderman', 'donkey kong', 4, '[]', NULL, '[]', 2, 'approve', 9, '2022-04-16 15:43:56', '2022-04-16 15:43:56', '4answer', NULL, NULL, NULL),
(37, 'در بازی A plague tale Innocence با چه اسلحه ای شما میجنگید', 'کلت', 'چاقو', 'قلاب سنگ', 'تک تیر انداز', 3, '[]', NULL, '[]', 2, 'approve', 9, '2022-04-16 15:45:02', '2022-04-16 15:45:02', '4answer', NULL, NULL, NULL),
(38, 'شیرینی یوخه مربوط به کدام شهراست', 'تهران', 'شیراز', 'یزد', 'رشت', 2, '[]', NULL, '[]', 5, 'approve', 12, '2022-04-18 14:50:53', '2022-04-18 14:55:40', '4answer', NULL, NULL, NULL),
(39, 'تاج محل به دست چه کسانی ساخته شده؟!', 'هندیان', 'ایرانیان', 'کره', 'چین', 3, NULL, NULL, NULL, 5, 'pending', NULL, '2022-04-18 14:55:42', '2022-04-18 14:55:42', '4answer', NULL, NULL, NULL),
(40, 'تاج محل به دست چه کسانی ساخته شده؟!', 'هندیان', 'ایرانیان', 'کره', 'چین', 3, NULL, NULL, NULL, 5, 'pending', 7, '2022-04-18 14:56:01', '2022-04-18 14:56:01', '4answer', NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 2, 'pending', NULL, '2022-04-18 15:19:16', '2022-04-18 15:19:16', '4answer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_categories`
--

CREATE TABLE `quiz_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_categories`
--

INSERT INTO `quiz_categories` (`id`, `name`, `icon`, `parent_id`, `created_at`, `updated_at`, `status`) VALUES
(6, 'اطلاعات عمومی', 'quiz-categories/April2022/G1JexZd1pY4qKjFYbQJZ.png', NULL, '2022-04-16 14:48:39', '2022-04-16 15:08:22', 'active'),
(7, 'تاریخ', 'quiz-categories/April2022/OKSFzcPLlByt1vCmBnHv.png', NULL, '2022-04-16 14:49:49', '2022-04-16 15:04:21', 'active'),
(8, 'جغرافیا', 'quiz-categories/April2022/G6FY5YxWZVfVqtaDdP0f.png', NULL, '2022-04-16 14:50:02', '2022-04-16 15:09:41', 'active'),
(9, 'گیم و بازی', 'quiz-categories/April2022/rjt5DTt35NNrZ2C9OIbG.png', NULL, '2022-04-16 14:50:20', '2022-04-16 15:11:23', 'active'),
(10, 'موسیقی', 'quiz-categories/April2022/IbDEVRCD33bwcJ1AHIcb.png', NULL, '2022-04-16 14:52:45', '2022-04-16 15:12:34', 'active'),
(11, 'فیلم و سینما', 'quiz-categories/April2022/SxZxpTFJWzf4hAiRB2YT.png', NULL, '2022-04-16 14:59:41', '2022-04-16 15:05:50', 'active'),
(12, 'غذا', 'quiz-categories/April2022/ssbom9yjmMIfo0z8Fey9.png', NULL, '2022-04-18 14:46:54', '2022-04-18 14:48:13', 'active'),
(13, 'تکنولوژی', 'quiz-categories/April2022/o92QoWsOGK19e7toNRWt.png', NULL, '2022-04-18 14:56:53', '2022-04-18 14:56:53', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(2, 'user', 'Normal User', '2022-04-07 09:10:53', '2022-04-07 09:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'QuziMuiz', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings/April2022/7W2A3Bnf3tfh7ISKYE7a.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'gamesetting.quiz_count_per_tournament', 'quiz count per tournament', '3', NULL, 'text', 6, 'gamesetting'),
(12, 'payment.zarinpal_merchent_code', 'zarinpal_merchent_code', '4edb4638-9acd-11e8-a391-000c295eb8fc', NULL, 'text', 7, 'payment'),
(13, 'payment.zarinpal_sandbox', 'zarinpal_sandbox', '1', NULL, 'checkbox', 8, 'payment'),
(14, 'firebase.token', 'token', 'AAAA0DXRy4c:APA91bENC0i68iS0X5IgSJ3WW_1WHXi-e33b6rzCRAOgtilRihtG70w1j2MHO8toMtturP9UN1GVqXOPvLXRK3EW4llr9zqnBBRfFFYerWycu1PTKklYib0267xojYjgzCVsHkLX3lqp', NULL, 'text', 9, 'firebase'),
(15, 'game-setting.socre_pre_true_answer', 'socre_pre_true_answer', '1', NULL, 'text', 10, 'game_setting');

-- --------------------------------------------------------

--
-- Table structure for table `spammers`
--

CREATE TABLE `spammers` (
  `id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` int NOT NULL,
  `blocked_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int UNSIGNED NOT NULL,
  `first_user_id` int DEFAULT NULL,
  `second_user_id` int DEFAULT NULL,
  `winner_user_id` int DEFAULT NULL,
  `first_user_true_answer` int DEFAULT NULL,
  `second_user_true_answer` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `first_user_id`, `second_user_id`, `winner_user_id`, `first_user_true_answer`, `second_user_true_answer`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(84, 2, 1, NULL, 2, NULL, 'play', '2022-04-27 13:21:00', '2022-04-27 13:34:41', 6),
(85, 2, 5, NULL, 3, 1, 'complete', '2022-04-27 14:39:00', '2022-04-27 15:34:39', 10),
(87, 2, 5, NULL, 2, NULL, 'play', '2022-04-27 15:32:04', '2022-04-27 15:32:17', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_boards`
--

CREATE TABLE `tournament_boards` (
  `id` int UNSIGNED NOT NULL,
  `tournament_01` int DEFAULT NULL,
  `tournament_02` int DEFAULT NULL,
  `tournament_03` int DEFAULT NULL,
  `tournament_04` int DEFAULT NULL,
  `tournament_05` int DEFAULT NULL,
  `tournament_06` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_user_id` int DEFAULT NULL,
  `second_user_id` int DEFAULT NULL,
  `first_user_win` int DEFAULT NULL,
  `second_user_win` int DEFAULT NULL,
  `endgame` tinyint DEFAULT NULL,
  `current_turn` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_boards`
--

INSERT INTO `tournament_boards` (`id`, `tournament_01`, `tournament_02`, `tournament_03`, `tournament_04`, `tournament_05`, `tournament_06`, `created_at`, `updated_at`, `first_user_id`, `second_user_id`, `first_user_win`, `second_user_win`, `endgame`, `current_turn`) VALUES
(4, 84, NULL, NULL, NULL, NULL, NULL, '2022-04-27 13:21:40', '2022-04-27 14:45:36', 2, 1, NULL, NULL, 1, 1),
(5, 85, 87, NULL, NULL, NULL, NULL, '2022-04-27 14:39:51', '2022-04-27 15:32:04', 2, 5, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tournament_quizzes`
--

CREATE TABLE `tournament_quizzes` (
  `id` int UNSIGNED NOT NULL,
  `tournament_id` int DEFAULT NULL,
  `quiz_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_quizzes`
--

INSERT INTO `tournament_quizzes` (`id`, `tournament_id`, `quiz_id`, `created_at`, `updated_at`) VALUES
(179, 84, 20, '2022-04-27 13:21:40', '2022-04-27 13:21:40'),
(180, 84, 18, '2022-04-27 13:21:40', '2022-04-27 13:21:40'),
(181, 84, 17, '2022-04-27 13:21:40', '2022-04-27 13:21:40'),
(182, 85, 22, '2022-04-27 14:39:51', '2022-04-27 14:39:51'),
(183, 85, 8, '2022-04-27 14:39:51', '2022-04-27 14:39:51'),
(184, 85, 23, '2022-04-27 14:39:51', '2022-04-27 14:39:51'),
(185, 87, 32, '2022-04-27 15:32:04', '2022-04-27 15:32:04'),
(186, 87, 31, '2022-04-27 15:32:04', '2022-04-27 15:32:04'),
(187, 87, 33, '2022-04-27 15:32:04', '2022-04-27 15:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int UNSIGNED NOT NULL,
  `table_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-04-07 09:10:53', '2022-04-07 09:10:53'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-04-07 09:10:53', '2022-04-07 09:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `score` int DEFAULT '0',
  `wallet` int DEFAULT '500',
  `token` longtext COLLATE utf8mb4_unicode_ci,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `score`, `wallet`, `token`, `bio`, `mobile`) VALUES
(1, NULL, 'Stacey Lueilwitz', 'user@example.com', 'users/default.png', '2022-04-07 09:07:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DmuEgJyoZz', NULL, '2022-03-12 09:06:39', '2022-04-07 09:07:24', 0, 500, NULL, NULL, NULL),
(2, 1, 'admin', 'admin@admin.com', 'users/jC0kx2iaqVRkyfjylMTepDvuTUO74MyoIu1cbOOU.png', NULL, '$2y$10$rM/lYhg7q80a/rUysqEPP.1.fqZi2b1Wt4qGg6EFkUKpdVpKiOqGW', '4YIPq1nqBg1Q5jUcNpznrYnMAxTiNMrHOjBc33lrFrvKbwLHklhctVKPHng3', NULL, '2022-04-07 09:14:40', '2022-04-27 14:39:51', 250, 15670, 'ezYlxWxYRVCKUuTBPW-pp2:APA91bHHHpgBdWYaK7s2PAMFDW8ACSM4OU7LiruHgvTCkiWLC06dUO4Pc1wmnb4Pk-B3BRqw6CWj8SXjHDK9JVv8sFB6ceM6TH8uIt6nbE5XzQVyecKsXhhGDhJ2O21li8FbDxufioiK', 'ادمین هستم', NULL),
(3, 2, 'hosein', 'hoseinhajepor@yahoo.com', 'users/default.png', NULL, '$2y$10$7JMKOeHHz1Sbub3SXnZwp.2uKz7YSDlZOSMuRDpcc5t3SU9m7PsXy', 'qI2aFvlMvPAiOfN4fbZ9oeHezCTIo9eZ3A6zKKysturbBpPtPvzrZfXqwvqd', '{\"locale\":\"en\"}', '2022-04-08 03:14:24', '2022-04-14 16:08:37', 0, 600, 'c_o2ZIggQ-2z-X47p-wtgp:APA91bHJR-kxbXO57mwIasJn_4zAJqoYZyIGp8gJmEaQz3iWB4prTcJQm6WmpzLnGSt_X2JJJjlQAvWCxHQNpyeASag-FQURpadDndThmC4yavA0JL166njdsqpu5vWJFwjGpdEnB9ix', NULL, NULL),
(4, 2, 'reza', 'reza@yahoo.com', 'users/default.png', NULL, '$2y$10$8esAgUfBvnv8CQWEaHsmgOEy0/16WsGvAi6wLUD.0ty7Kt.5KfPY.', 'RfemZyrFNOpYNjQBFSBeU9oe5F1nyQHu3kwgi1Uio8c4tWyqkVdI4hpfR4vs', NULL, '2022-04-13 15:56:07', '2022-04-15 04:34:58', 0, 5640, 'c_o2ZIggQ-2z-X47p-wtgp:APA91bHJR-kxbXO57mwIasJn_4zAJqoYZyIGp8gJmEaQz3iWB4prTcJQm6WmpzLnGSt_X2JJJjlQAvWCxHQNpyeASag-FQURpadDndThmC4yavA0JL166njdsqpu5vWJFwjGpdEnB9ix', NULL, NULL),
(5, 2, 'Sara', 'saradane78sh@gmail.com', 'users/default.png', NULL, '$2y$10$Kx7dReZ6BsphTY5p2pKQn.23ZxSBMy8YuSQMeFwJQtom1fFplkOCm', '5hQ1CTSbI2Ask85wawOCFeniO5hfrS2ZLbgJq5Ggps2EixmWfd342DpdQclb', NULL, '2022-04-16 15:49:06', '2022-04-27 14:41:08', 0, 1400, 'e3R-IDZuQcOYpPP6DVyFSz:APA91bGVG4GPwbwwi2HgbGACNSYlv2-p-Fg3iHhYs7bS8sxu_TeD90g1KKEhUsJESEFyc2bfr9kieOaWOGmYGb4_CdNpZ61h4fKqzc5SYlxXOfNRU86GiK9Aav9o2hBG8iiT2BEAEN06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `coin_use_types`
--
ALTER TABLE `coin_use_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `spammers`
--
ALTER TABLE `spammers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_boards`
--
ALTER TABLE `tournament_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_quizzes`
--
ALTER TABLE `tournament_quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coin_use_types`
--
ALTER TABLE `coin_use_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `spammers`
--
ALTER TABLE `spammers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tournament_boards`
--
ALTER TABLE `tournament_boards`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tournament_quizzes`
--
ALTER TABLE `tournament_quizzes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
