-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 06:23 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blog_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blog_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blog_image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog_description`, `blog_url`, `blog_image`, `created_at`, `updated_at`) VALUES
(4, 'Nullam quis risus eget urna mollis ', '<p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n            <hr>\r\n            <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n           \r\n            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>', '#', '2afd426e74335342fee19690c7712e83_eobvcd.jpg', '2017-11-10 00:38:16', '2017-11-10 00:38:16'),
(5, 'Blog', '								  	       \r\n		asdfasfasfasdfasfasfdsd						  ', '#', 'dab05c59b0ffaddb9ecffd13333a348a_penguins.jpg', '2017-11-10 00:39:35', '2017-11-10 00:39:35'),
(6, 'Blog Three', '								  	       \r\n					asdfasfasfasf			  ', '#', '0b8be68bfbc20fd2ea0eae635265ec06_koala-copy.jpg', '2017-11-10 00:39:48', '2017-11-10 00:39:48'),
(7, 'Blog Four', '								  	       \r\n						fasdfasfasfs		  ', '#', '3eb30bbd550e308ae5e5a6ffe7cf211c_hydrangeas-copy.jpg', '2017-11-10 00:40:08', '2017-11-10 00:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `dept_location`, `created_at`, `updated_at`) VALUES
(11, 'Accounting Department', 'Delhi', '2017-10-26 18:30:00', '2017-10-27 02:54:48'),
(12, 'Research Department', 'Pune', '2017-10-26 18:30:00', '2017-10-27 02:55:15'),
(13, 'Sales', 'Bangalore', '2017-10-26 18:30:00', '2017-10-27 02:56:10'),
(14, 'Operation Department', 'Mumbai', '2017-10-26 18:30:00', '2017-10-27 02:56:52'),
(15, 'Development Department', 'Hyderabad', '2017-10-26 18:30:00', '2017-10-27 02:57:22'),
(18, 'asdfasdf', 'asdfasdfasdf', '2017-10-26 18:30:00', '2017-10-27 04:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_job` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_dept` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_dept_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_job`, `location`, `city`, `country`, `lat`, `lng`, `emp_phone`, `emp_salary`, `emp_dept`, `sub_dept_id`, `created_at`, `updated_at`) VALUES
(16, 'Mahaveer', 'Marketing', 'Narayanguda, Hyderabad, Telangana, India', 'Hyderabad', 'India', '17.3985568', '78.49295210000002', '9857854569', '780000', '13', 11, '2017-10-30 18:30:00', '2017-10-31 00:26:34'),
(17, 'Vinayak ', 'dhyapule', 'Public Garden Road, Devi Bagh, Red Hills,', 'Hyderabad', 'India', '17.3931097', '78.46756289999996', '98000000', '789456', '11', 6, '2017-10-30 18:30:00', '2017-10-31 01:22:16'),
(18, 'Demo', 'developer', 'Near Saptagiri Towers, Mayur Marg, Begumpet, Mayur Marg, Begumpet, Hyderabad, Telangana 500016, India', 'Hyderabad', 'India', '17.4443387', '78.46244739999997', '9000666969', '300000', '11', 5, '2017-10-30 18:30:00', '2017-10-31 03:03:20'),
(20, 'Suresh', 'developer', 'Durga Nagar, Somajiguda, Hyderabad, Telangana 500082, India', 'Hyderabad', 'India', '17.4265532', '78.45716110000001', '9874569858', '700000', '11', 5, '2017-10-30 18:30:00', '2017-10-31 04:57:10'),
(21, 'Srikanth', 'Developer', 'Shalibanda, Hyderabad, Telangana, India', 'Hyderabad', 'India', '17.3497919', '78.4680902', '9866558877', '25000', '11', 6, '2017-11-07 18:30:00', '2017-11-08 01:06:46'),
(56, 'Ram', 'Developer', 'Dilsukhnagar, Hyderabad, Telangana, India', 'Hyderabad', 'India', '17.3687826', '78.52467060000004', '95858578885', '789456', '11', 6, '2017-11-07 09:16:46', '2017-11-07 09:16:46'),
(57, 'vinayak', 'developer', 'Dilsukhnagar, Hyderabad, Telangana, India', 'Hyderabad', 'India', '17.3687826', '78.52467060000004', '9000666969', '300000', '13', 11, '2017-11-07 09:27:35', '2017-11-07 09:27:35'),
(58, 'vinayak', 'developer', 'Old Malakpet Government Jr College, Malakpet Government Quarters, Andhra Colony, New Malakpet, Hyderabad, Telangana 500036, India', 'Hyderabad', 'India', '17.3688151', '78.50902169999995', '9000666969', '150000', '12', 9, '2017-11-08 00:25:32', '2017-11-08 00:25:32'),
(59, 'Radha', 'asdfasdfa', 'Old Malakpet, Hyderabad, Telangana, India', 'Hyderabad', 'India', '17.3781479', '78.50615240000002', '9874589658', '300000', '11', 6, '2017-11-08 06:58:31', '2017-11-08 06:58:31'),
(60, 'Krishan', 'Tester', 'Old Malakpet Government Jr College, Malakpet Government Quarters, Andhra Colony, New Malakpet, Hyderabad, Telangana 500036, India', 'Hyderabad', 'India', '17.3688151', '78.50902169999995', '7896587458', '150000', '12', 8, '2017-11-08 07:25:39', '2017-11-08 07:25:39'),
(61, 'vinayak', 'developer', '695 E La Verne Ave, Pomona, CA 91767, USA', 'Pomona', 'United States', '34.08049500000001', '-117.73895400000004', '9000666969', '150000', '13', 3, '2017-11-08 06:35:43', '2017-11-08 06:35:43'),
(62, 'vinayak', 'asdfasdf', '16 Chestnut Hill Ave, Cranston, RI 02920, USA', 'Cranston', 'United States', '41.7947585', '-71.45077659999998', '9000666969', '149999', '12', 8, '2017-11-08 06:37:46', '2017-11-08 06:37:46'),
(63, 'vinayak', 'asdfasdf', 'ASDF, Charai, Borla, Union Park, Chembur East, Mumbai, Maharashtra 400071, India', 'Mumbai', 'India', '19.0507608', '72.89527670000007', '9999999997', '150000', '12', 9, '2017-11-08 07:24:02', '2017-11-08 07:24:02'),
(64, 'Demo', 'Demo', '16 Chestnut Hill Ave, Cranston, RI 02920, USA', 'Cranston', 'United States', '41.7947585', '-71.45077659999998', '789456123', '125000', '11', 5, '2017-11-08 08:13:40', '2017-11-08 08:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `emp_gallery`
--

CREATE TABLE `emp_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `files` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emp_gallery`
--

INSERT INTO `emp_gallery` (`id`, `emp_id`, `files`, `created_at`, `updated_at`) VALUES
(1, 58, 'EMP_58_1510120532.jpg', '2017-11-08 00:25:32', '2017-11-08 00:25:32'),
(2, 58, 'EMP_58_1510120533.jpg', '2017-11-08 00:25:32', '2017-11-08 00:25:32'),
(3, 58, 'EMP_58_1510120534.jpg', '2017-11-08 00:25:32', '2017-11-08 00:25:32'),
(4, 58, 'EMP_58_1510120535.jpg', '2017-11-08 00:25:32', '2017-11-08 00:25:32'),
(37, 60, 'EMP_60_1510139385.jpg', '2017-11-08 05:39:45', '2017-11-08 05:39:45'),
(45, 61, 'EMP_61_1510142743.jpg', '2017-11-08 06:35:43', '2017-11-08 06:35:43'),
(46, 61, 'EMP_61_1510142745.jpg', '2017-11-08 06:35:43', '2017-11-08 06:35:43'),
(47, 61, 'EMP_61_1510142746.jpg', '2017-11-08 06:35:43', '2017-11-08 06:35:43'),
(48, 61, 'EMP_61_1510142747.jpg', '2017-11-08 06:35:43', '2017-11-08 06:35:43'),
(49, 62, 'EMP_62_1510142866.jpg', '2017-11-08 06:37:46', '2017-11-08 06:37:46'),
(50, 62, 'EMP_62_1510142867.jpg', '2017-11-08 06:37:46', '2017-11-08 06:37:46'),
(51, 62, 'EMP_62_1510142868.jpg', '2017-11-08 06:37:46', '2017-11-08 06:37:46'),
(52, 62, 'EMP_62_1510142869.jpg', '2017-11-08 06:37:46', '2017-11-08 06:37:46'),
(55, 59, 'EMP_59_1510144111.jpg', '2017-11-08 06:58:31', '2017-11-08 06:58:31'),
(56, 59, 'EMP_59_1510144112.jpg', '2017-11-08 06:58:31', '2017-11-08 06:58:31'),
(57, 59, 'EMP_59_1510144113.jpg', '2017-11-08 06:58:31', '2017-11-08 06:58:31'),
(58, 59, 'EMP_59_1510144114.jpg', '2017-11-08 06:58:31', '2017-11-08 06:58:31'),
(59, 63, 'EMP_63_1510145642.jpg', '2017-11-08 07:24:02', '2017-11-08 07:24:02'),
(60, 63, 'EMP_63_1510145643.jpg', '2017-11-08 07:24:02', '2017-11-08 07:24:02'),
(61, 60, 'EMP_60_1510145739.jpg', '2017-11-08 07:25:39', '2017-11-08 07:25:39'),
(62, 60, 'EMP_60_1510145740.jpg', '2017-11-08 07:25:39', '2017-11-08 07:25:39'),
(71, 64, 'EMP_64_1510148515.jpg', '2017-11-08 08:11:55', '2017-11-08 08:11:55'),
(72, 64, 'EMP_64_1510148516.jpg', '2017-11-08 08:11:55', '2017-11-08 08:11:55'),
(73, 64, 'EMP_64_1510148517.jpg', '2017-11-08 08:11:55', '2017-11-08 08:11:55'),
(74, 64, 'EMP_64_1510148620.jpg', '2017-11-08 08:13:40', '2017-11-08 08:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Childfund Event', '2017-11-22', '2017-11-22', '2017-11-22 03:24:57', '2017-11-22 03:24:57'),
(2, 'Bussiness Event', '2017-11-27', '2017-11-27', '2017-11-22 03:24:57', '2017-11-22 03:24:57'),
(3, 'Birthday Event', '2017-11-28', '2017-11-28', '2017-11-22 03:24:57', '2017-11-22 03:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_27_012636_create_employee_table', 2),
(4, '2017_10_27_095926_create_sub_department_table', 3),
(5, '2017_11_07_104748_create_emp_gallery_table', 4),
(6, '2017_11_09_055054_create_product_table', 5),
(7, '2017_11_10_074015_create_ratings_table', 6),
(8, '2017_11_22_085120_create_events_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Product One', 'REST is the acronym for Representational State Transition. It is a software architectural design for building scalable web services.', 100, '2017-11-09 00:43:08', '2017-11-08 23:49:14'),
(2, 'Product Two', 'This is a summary from the blog post we posted on Kode Blog 10 REST API Design Best Practices That Will Make Developers Love Your API. Read the article for detailed explanations of this summary', 200, '2017-11-08 22:40:10', '2017-11-09 00:43:10'),
(3, 'Product Three', 'For now, we will only display the products and categories. Our API will implement basic authentication only. Future tutorial updates will include more functionality.', 300, '2017-11-09 00:46:16', '2017-11-08 22:38:11'),
(4, 'Product Four', 'Building a basic REST API in Laravel is no more than retrieving data using models and formatting the response to JSON. The future tutorial updates will build a fairly complex API that will do more.', 400, '2017-11-08 22:39:09', '2017-11-08 21:39:10'),
(5, 'New Productssss', 'My Product Descriptionssss', 20, '2017-11-09 02:20:49', '2017-11-09 02:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `blog_id`, `rating`, `created_at`, `updated_at`) VALUES
(6, '4', '5', '2017-11-10 03:29:58', '2017-11-10 03:29:58'),
(7, '5', '3.5', '2017-11-10 03:30:23', '2017-11-10 03:30:23'),
(8, '6', '4', '2017-11-10 03:30:29', '2017-11-10 03:30:29'),
(20, '4', '2', '2017-11-10 07:27:17', '2017-11-10 07:27:17'),
(21, '5', '1.5', '2017-11-10 07:27:31', '2017-11-10 07:27:31'),
(22, '5', '3', '2017-11-10 07:27:34', '2017-11-10 07:27:34'),
(27, '7', '1.5', '2017-11-10 07:38:41', '2017-11-10 07:38:41'),
(28, '4', '1.5', '2017-11-13 00:30:46', '2017-11-13 00:30:46'),
(29, '4', '1.5', '2017-11-13 00:30:46', '2017-11-13 00:30:46'),
(30, '4', '4', '2017-11-20 02:32:28', '2017-11-20 02:32:28'),
(31, '4', '4.5', '2017-11-20 02:35:58', '2017-11-20 02:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `sub_department`
--

CREATE TABLE `sub_department` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_dept` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_department`
--

INSERT INTO `sub_department` (`id`, `dept_id`, `sub_dept`, `created_at`, `updated_at`) VALUES
(1, '11', 'asdfasdfasdf', '2017-10-26 18:30:00', '2017-10-27 04:52:45'),
(2, '13', 'dwerwqerwqerqwerwqre', '2017-10-26 18:30:00', '2017-10-27 04:53:12'),
(3, '13', 'fasdfasfasdf', '2017-10-26 18:30:00', '2017-10-27 04:54:03'),
(4, '13', 'ererewr', '2017-10-26 18:30:00', '2017-10-27 04:54:12'),
(5, '11', 'Account One', '2017-10-26 18:30:00', '2017-10-27 08:11:50'),
(6, '11', 'Account Two', '2017-10-26 18:30:00', '2017-10-27 08:12:05'),
(7, '11', 'Account Three', '2017-10-26 18:30:00', '2017-10-27 08:12:14'),
(8, '12', 'Research One', '2017-10-26 18:30:00', '2017-10-27 08:12:40'),
(9, '12', 'Research Two', '2017-10-26 18:30:00', '2017-10-27 08:12:49'),
(10, '12', 'Research Three', '2017-10-26 18:30:00', '2017-10-27 08:12:58'),
(11, '13', 'Sales One', '2017-10-26 18:30:00', '2017-10-27 08:13:17'),
(12, '13', 'Sales Two', '2017-10-26 18:30:00', '2017-10-27 08:13:26'),
(13, '13', 'Sales Three', '2017-10-26 18:30:00', '2017-10-27 08:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Samridh Dhayapule', 'vinayak@travash.com', '$2y$10$0qJx0/BCuaoA.FRynzM5FeCQyabyyznJZTAJ1NAbwsyvZRFS4w8Ou', 'QujazJTcRR4oJcQogPZmfylDUvqktQ10iCvUuvQztVV6OVwz2hy7TYtCNn6i', '2017-11-09 04:06:24', '2017-11-09 04:40:46'),
(5, 'Srikanthk', 'srikanth@gmail.com', '$2y$10$crO/28JatmgIHnVStVWuueiutYakaazOlna0escH/tcCd36GWq1LO', NULL, '2017-11-09 04:57:49', '2017-11-09 04:57:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_gallery`
--
ALTER TABLE `emp_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_department`
--
ALTER TABLE `sub_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `emp_gallery`
--
ALTER TABLE `emp_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `sub_department`
--
ALTER TABLE `sub_department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
