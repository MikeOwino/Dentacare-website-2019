-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2019 at 09:00 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentacare-website-2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'dentacoin-admin', '31bb1f30580232a94e105e8a7a24e6a6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('jpeg','png','jpg','svg','gif','pdf','doc','docx','rtf') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `alt`, `type`, `created_at`, `updated_at`) VALUES
(1, 'dentacare-logo.svg', 'Dentacare logo', 'svg', '2019-06-26 09:45:40', '2019-06-26 09:45:40'),
(2, 'intro-section-background-big.png', 'Intro section background big', 'png', '2019-06-27 03:20:54', '2019-06-27 03:20:54'),
(3, 'intro-section-background-medium.png', 'Intro section background medium', 'png', '2019-06-27 03:20:54', '2019-06-27 03:20:54'),
(4, 'intro-section-background-small.png', 'Intro section background small', 'png', '2019-06-27 03:20:54', '2019-06-27 03:20:54'),
(5, 'app-store.svg', 'App store', 'svg', '2019-06-27 04:23:42', '2019-06-27 04:23:42'),
(6, 'google-play-badge.svg', 'Google play badge', 'svg', '2019-06-27 04:23:42', '2019-06-27 04:23:42'),
(7, 'first-animated-phone.png', 'First animated phone', 'png', '2019-06-27 04:43:54', '2019-06-27 04:43:54'),
(9, 'third-animated-phone.png', 'Third animated phone', 'png', '2019-06-27 04:43:54', '2019-06-27 04:43:54'),
(10, 'second-animated-phone.png', 'Second animated phone', 'png', '2019-06-27 04:44:52', '2019-06-27 04:44:52'),
(11, 'benefits-icon-1.svg', 'Benefits icon 1', 'svg', '2019-06-27 04:58:16', '2019-06-27 04:58:16'),
(12, 'benefits-icon-2.svg', 'Benefits icon 2', 'svg', '2019-06-27 04:58:16', '2019-06-27 04:58:16'),
(13, 'benefits-icon-3.svg', 'Benefits icon 3', 'svg', '2019-06-27 04:58:16', '2019-06-27 04:58:16'),
(14, 'testimoanials-slider-background.svg', 'Testimoanials slider background', 'svg', '2019-06-27 05:25:54', '2019-06-27 05:25:54'),
(15, 'phone-1.png', 'Phone 1', 'png', '2019-07-01 03:21:48', '2019-07-01 03:21:48'),
(18, 'phone3.png', 'Phone3', 'png', '2019-07-01 03:27:42', '2019-07-01 03:27:42'),
(19, 'phone2.png', 'Phone2', 'png', '2019-07-01 03:28:01', '2019-07-01 03:28:01'),
(23, 'children-are-loving-it-background.png', 'Children are loving it background', 'png', '2019-07-01 04:20:19', '2019-07-01 04:20:19'),
(24, 'phone-gif1.gif', 'Phone gif1', 'gif', '2019-07-01 04:34:01', '2019-07-01 04:34:01'),
(25, 'phone-gif2.gif', 'Phone gif2', 'gif', '2019-07-01 04:34:01', '2019-07-01 04:34:01'),
(26, 'phone-gif3.gif', 'Phone gif3', 'gif', '2019-07-01 04:34:01', '2019-07-01 04:34:01'),
(27, 'phone-gif4.gif', 'Phone gif4', 'gif', '2019-07-01 04:34:01', '2019-07-01 04:34:01'),
(28, 'gray-apple-store-btn.png', 'Gray apple store btn', 'png', '2019-07-01 05:22:55', '2019-07-01 05:22:55'),
(29, 'gray-google-play-btn.png', 'Gray google play btn', 'png', '2019-07-01 05:22:55', '2019-07-01 05:22:55'),
(30, 'logged-patient-no-contracts-background.jpg', 'Logged patient no contracts background', 'jpg', '2019-07-01 05:56:51', '2019-07-01 05:56:51'),
(31, 'forgotten-pass.svg', 'Forgotten pass', 'svg', '2019-07-01 05:57:51', '2019-07-01 05:57:51'),
(34, 'children-are-loving-it-mobile-background.png', 'Children are loving it mobile background', 'png', '2019-07-02 01:54:27', '2019-07-02 01:54:27'),
(35, 'phones-mobile-768px.png', 'Phones mobile 768px', 'png', '2019-07-02 01:59:53', '2019-07-02 01:59:53'),
(36, 'background-mobile-768px.png', 'Background mobile 768px', 'png', '2019-07-02 02:04:19', '2019-07-02 02:04:19'),
(37, 'dentacare-social-image.png', 'Dentacare social image', 'png', '2019-07-03 04:52:28', '2019-07-03 04:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Footer', 'footer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_elements`
--

DROP TABLE IF EXISTS `menu_elements`;
CREATE TABLE IF NOT EXISTS `menu_elements` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('page','file') COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `new_window` tinyint(4) NOT NULL,
  `desktop_visible` tinyint(4) NOT NULL,
  `mobile_visible` tinyint(4) NOT NULL,
  `id_attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_attribute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_elements_media_id_foreign` (`media_id`),
  KEY `menu_elements_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_elements`
--

INSERT INTO `menu_elements` (`id`, `name`, `type`, `url`, `order_id`, `new_window`, `desktop_visible`, `mobile_visible`, `id_attribute`, `class_attribute`, `media_id`, `menu_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Privacy policy', 'page', 'https://dentacoin.com/privacy-policy', 0, 1, 1, 1, NULL, NULL, NULL, 1, NULL, '2019-06-28 10:52:14', '2019-06-28 10:52:14'),
(2, 'Dentavox', 'page', 'https://dentavox.dentacoin.com/', 1, 1, 1, 1, NULL, NULL, NULL, 1, NULL, '2019-06-28 10:52:39', '2019-06-28 10:52:39'),
(3, 'Trusted Reviews', 'page', 'https://reviews.dentacoin.com/', 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, '2019-06-28 10:52:52', '2019-06-28 10:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_07_22_162209_create_admin_users_table', 1),
(2, '2018_08_17_120730_media_table', 1),
(3, '2018_09_09_135739_create_pages_table', 1),
(4, '2018_09_10_085822_create_pages_html_sections_table', 1),
(5, '2018_09_16_135117_create_menus_table', 1),
(6, '2018_09_17_073943_create_menu_elements_table', 1),
(7, '2019_06_27_120050_create_user_testimonials_table', 2),
(8, '2019_06_28_052150_create_user_expressions_table', 3),
(9, '2019_06_28_124355_create_oral_care_journey_slides_table', 4),
(10, '2018_09_09_135740_create_pages_table', 5),
(11, '2019_06_28_124356_create_oral_care_journey_slides_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oral_care_journey_slides`
--

DROP TABLE IF EXISTS `oral_care_journey_slides`;
CREATE TABLE IF NOT EXISTS `oral_care_journey_slides` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `media_id` int(10) UNSIGNED DEFAULT NULL,
  `desktop_visible` tinyint(4) NOT NULL,
  `mobile_visible` tinyint(4) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oral_care_journey_slides_media_id_foreign` (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oral_care_journey_slides`
--

INSERT INTO `oral_care_journey_slides` (`id`, `media_id`, `desktop_visible`, `mobile_visible`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 19, 1, 1, 0, '2019-06-28 10:08:00', '2019-07-01 03:39:20'),
(2, 18, 1, 1, 2, '2019-07-01 03:39:26', '2019-07-01 03:39:26'),
(7, 15, 1, 1, 5, '2019-07-01 03:40:10', '2019-07-01 03:40:10'),
(8, 27, 1, 1, 1, '2019-07-01 04:35:48', '2019-07-01 04:35:48'),
(9, 26, 1, 1, 4, '2019-07-01 04:35:51', '2019-07-01 04:35:51'),
(10, 25, 1, 1, 5, '2019-07-01 04:35:55', '2019-07-01 04:35:55'),
(11, 24, 1, 1, 6, '2019-07-01 04:36:00', '2019-07-01 04:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` int(10) UNSIGNED DEFAULT NULL,
  `html` text COLLATE utf8mb4_unicode_ci,
  `css` text COLLATE utf8mb4_unicode_ci,
  `js` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_media_id_foreign` (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `description`, `keywords`, `social_title`, `social_description`, `media_id`, `html`, `css`, `js`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Dentacare Mobile App: Earn Rewards for Brushing Your Teeth', 'Improve your oral hygiene through a fun 90-day journey and earn real Dentacoin (DCN) tokens for good results. Download now for Android and iOS.', 'dentacare app, dentacare mobile app, dentacare dentacoin, dentacoin, tooth brushing app, dental care app', 'Dentacare Mobile App: Earn Rewards for Brushing Your Teeth', 'Improve your oral hygiene through a fun 90-day journey and earn real Dentacoin (DCN) tokens for good results. Download now for Android and iOS.', 37, '<section class=\"section-intro\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-xs-12 col-sm-5 padding-top-60 padding-top-xs-10 min-height-left padding-top-sm-20 padding-top-md-30\">\r\n				<figure class=\"padding-bottom-150 padding-bottom-sm-50 150 padding-bottom-md-50 padding-bottom-xs-20\" itemscope=\"\" itemtype=\"http://schema.org/Organization\"><a href=\"{{ route(\'home\') }}\" itemprop=\"url\"><img alt=\"Dentacare logo\" class=\"max-width-240 max-width-xs-120\" itemprop=\"logo\" src=\"/assets/uploads/dentacare-logo.svg\" /> </a></figure>\r\n\r\n				<h1 class=\"fs-55 fs-sm-45 fs-xs-26 text-center-xs padding-right-xs-0 line-height-sm-50 line-height-70 line-height-xs-30 color-white padding-right-50 padding-right-sm-15 padding-right-md-15 padding-top-xs-25\">Improve Your Oral Care<br class=\"show-only-on-xs\" />\r\n					and Earn Rewards!</h1>\r\n\r\n				<h3 class=\"fs-30 fs-xs-16 text-center-xs color-white padding-top-100 padding-top-xs-25 padding-bottom-20 padding-bottom-xs-10 padding-top-sm-50 padding-top-md-50\">Download now to start earning:</h3>\r\n\r\n				<figure class=\"inline-block android-btn width-xs-100 text-center-xs padding-right-20 padding-right-xs-0 padding-bottom-xs-10\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><a href=\"https://play.google.com/store/apps/details?id=com.dentacoin.dentacare&amp;hl=en\" target=\"_blank\"><img alt=\"Googe play icon\" class=\"width-100 max-width-200\" src=\"/assets/uploads/google-play-badge.svg\" /> </a></figure>\r\n\r\n				<figure class=\"inline-block ios-btn width-xs-100 text-center-xs padding-top-sm-10 padding-top-md-10\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><a href=\"https://itunes.apple.com/bg/app/dentacare-health-training/id1274148338?mt=8\" target=\"_blank\"><img alt=\"App store icon\" class=\"width-100 max-width-200\" src=\"/assets/uploads/app-store.svg\" /> </a></figure>\r\n			</div>\r\n\r\n			<div class=\"col-xs-12 col-sm-6 col-sm-offset-1 moving-phones-parent\">\r\n				<div class=\"moving-phones-container padding-top-10 fs-0\">\r\n					<div class=\"left-side inline-block\">\r\n						<figure itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"First animated phone\" class=\"first-phone\" src=\"/assets/uploads/first-animated-phone.png\" /></figure>\r\n\r\n						<figure itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"Second animated phone\" class=\"second-phone\" src=\"/assets/uploads/second-animated-phone.png\" /></figure>\r\n					</div>\r\n\r\n					<div class=\"right-side inline-block\">\r\n						<figure itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"Third animated phone\" class=\"third-phone\" src=\"/assets/uploads/third-animated-phone.png\" /></figure>\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"hidden-phones-container padding-bottom-xs-15\">\r\n				<figure itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"Phones mobile 768px\" class=\"width-100\" src=\"/assets/uploads/phones-mobile-768px.png\" /></figure>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</section>\r\n\r\n<section class=\"section-benefits\">\r\n	<div class=\"container\">\r\n		<div class=\"row fs-0\">\r\n			<div class=\"col-xs-12\">\r\n				<h2 class=\"fs-45 fs-xs-35 padding-bottom-20 text-center-xs\">BENEFITS</h2>\r\n			</div>\r\n\r\n			<div class=\"col-xs-12 col-sm-8 col-md-6 inline-block-bottom padding-bottom-100 padding-bottom-xs-20\">\r\n				<div class=\"single-benefit fs-0 padding-top-50 padding-bottom-50 padding-top-xs-30 padding-bottom-xs-30\">\r\n					<figure class=\"inline-block max-width-200 padding-right-50 padding-right-xs-0 max-width-xs-none width-100 padding-bottom-xs-20 text-center-xs\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"Benefits icon 1\" src=\"/assets/uploads/benefits-icon-1.svg\" /></figure>\r\n\r\n					<div class=\"inline-block benefit-text text-center-xs width-xs-100\">\r\n						<h3 class=\"fs-30 lato-bold padding-bottom-15\"><span class=\"color-light-blue\">01. Improve</span> your oral hygiene</h3>\r\n\r\n						<div class=\"fs-18 lato-light\">Learn how to maintain proper hygiene while having fun! Reminders, notifications, voice navigation, music accompaniment and tutorials will guide you through your 90-day journey.</div>\r\n					</div>\r\n				</div>\r\n\r\n				<div class=\"single-benefit fs-0 padding-top-50 padding-bottom-50 padding-top-xs-30 padding-bottom-xs-30\">\r\n					<figure class=\"inline-block max-width-200 padding-right-50 padding-right-xs-0 max-width-xs-none width-100 padding-bottom-xs-20 text-center-xs\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"Benefits icon 2\" src=\"/assets/uploads/benefits-icon-2.svg\" /></figure>\r\n\r\n					<div class=\"inline-block benefit-text text-center-xs width-xs-100\">\r\n						<h3 class=\"fs-30 lato-bold padding-bottom-15\"><span class=\"color-light-blue\">02. Form</span> long-lasting habits</h3>\r\n\r\n						<div class=\"fs-18 lato-light\">&ldquo;Motivation is what gets you started. Habit is what keeps you going.&rdquo; As your personal dental care companion, Dentacare will help you turn good practices into a routine for healthy teeth.</div>\r\n					</div>\r\n				</div>\r\n\r\n				<div class=\"single-benefit fs-0 padding-top-50 padding-bottom-50 padding-top-xs-30 padding-bottom-xs-30\">\r\n					<figure class=\"inline-block max-width-200 padding-right-50 padding-right-xs-0 max-width-xs-none width-100 padding-bottom-xs-20 text-center-xs\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"Benefits icon 3\" src=\"/assets/uploads/benefits-icon-3.svg\" /></figure>\r\n\r\n					<div class=\"inline-block benefit-text text-center-xs width-xs-100\">\r\n						<h3 class=\"fs-30 lato-bold padding-bottom-15\"><span class=\"color-light-blue\">03. Get rewards</span> in the first dental coin</h3>\r\n\r\n						<div class=\"fs-18 lato-light\">Completing your 90-day journey will earn you Dentacoin (DCN) tokens you can use to cover dental treatments, buy various gift cards, or exchange them to crypto/ traditional currencies.</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"col-xs-12 col-sm-4 col-md-6 inline-block-bottom text-right right-mobile-phone\">\r\n				<figure class=\"inline-block\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"First brush phone image\" class=\"width-50 width-sm-100 width-xs-100\" src=\"/assets/uploads/third-animated-phone.png\" /></figure>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</section>\r\n[shortcode type=&quot;testimonials&quot;]\r\n\r\n<section class=\"section-90-day-oral-care-journey padding-top-100 padding-bottom-100\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-xs-12 text-center\">\r\n				<h2 class=\"fs-45 fs-xs-35 line-height-45\">START YOUR 90-DAY ORAL CARE JOURNEY</h2>\r\n\r\n				<h3 class=\"fs-32 fs-xs-22 padding-bottom-40\">and earn rewards along the way!</h3>\r\n			</div>\r\n\r\n			<div class=\"col-xs-12\">[shortcode type=&quot;oral-care-journey-slider&quot;]</div>\r\n\r\n			<div class=\"col-xs-12 text-center\">\r\n				<div class=\"fs-26 padding-bottom-10 padding-top-40\">Download now to start earning:</div>\r\n\r\n				<figure class=\"inline-block android-btn display-block-xs padding-right-20 padding-right-xs-0\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><a href=\"https://play.google.com/store/apps/details?id=com.dentacoin.dentacare&amp;hl=en\" target=\"_blank\"><img alt=\"Googe play icon\" class=\"width-100 max-width-200\" src=\"/assets/uploads/google-play-badge.svg\" /> </a></figure>\r\n\r\n				<figure class=\"inline-block ios-btn display-block-xs padding-top-xs-15\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><a href=\"https://itunes.apple.com/bg/app/dentacare-health-training/id1274148338?mt=8\" target=\"_blank\"><img alt=\"App store icon\" class=\"width-100 max-width-200\" src=\"/assets/uploads/app-store.svg\" /> </a></figure>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</section>\r\n\r\n<section class=\"section-children-are-loving-it\">\r\n	<div class=\"container\">\r\n		<div class=\"row\">\r\n			<div class=\"col-xs-12 color-white text-center padding-top-70 padding-bottom-15\">\r\n				<h2 class=\"fs-45 fs-xs-35 line-height-45\">CHILDREN ARE LOVING IT:</h2>\r\n\r\n				<h3 class=\"fs-32 fs-xs-22\">Form oral hygiene habits while playing a fun card game</h3>\r\n			</div>\r\n		</div>\r\n	</div>\r\n\r\n	<div class=\"full-width-image-container\"><picture itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"> <source media=\"(max-width: 768px)\" srcset=\"/assets/uploads/children-are-loving-it-mobile-background.png\" /> <img alt=\"Children are loving it\" class=\"width-100\" itemprop=\"contentUrl\" src=\"/assets/uploads/children-are-loving-it-background.png\" /> </picture>\r\n\r\n		<div class=\"absolute-content text-center\">\r\n			<div class=\"fs-28 fs-xs-20 padding-bottom-15\">Coming soon:</div>\r\n\r\n			<figure class=\"inline-block android-btn width-xs-100 padding-right-15 padding-right-xs-0\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"Google Play button\" class=\"max-width-240 max-width-xs-210\" src=\"/assets/uploads/gray-google-play-btn.png\" /></figure>\r\n\r\n			<figure class=\"inline-block ios-btn width-xs-100 padding-top-xs-15\" itemscope=\"\" itemtype=\"http://schema.org/ImageObject\"><img alt=\"App Store button\" class=\"max-width-240 max-width-xs-210\" src=\"/assets/uploads/gray-apple-store-btn.png\" /></figure>\r\n		</div>\r\n	</div>\r\n</section>', NULL, NULL, NULL, NULL, '2019-07-03 04:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_expressions`
--

DROP TABLE IF EXISTS `user_expressions`;
CREATE TABLE IF NOT EXISTS `user_expressions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `desktop_visible` tinyint(4) NOT NULL,
  `mobile_visible` tinyint(4) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_expressions`
--

INSERT INTO `user_expressions` (`id`, `title`, `text`, `desktop_visible`, `mobile_visible`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'William Turner', 'This application is just great. I cannot belive that Dentacoin team managed to create such productive tools during the last year. I&#39;m looking forward to see their future products.', 1, 1, 0, '2019-06-28 02:50:25', '2019-06-28 02:53:03'),
(2, 'John Wick', '<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, 2, '2019-06-28 03:12:44', '2019-06-28 03:12:44'),
(3, 'Will Smith', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.', 1, 1, 1, '2019-06-28 03:13:01', '2019-06-28 03:13:01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_elements`
--
ALTER TABLE `menu_elements`
  ADD CONSTRAINT `menu_elements_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `menu_elements_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `oral_care_journey_slides`
--
ALTER TABLE `oral_care_journey_slides`
  ADD CONSTRAINT `oral_care_journey_slides_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
