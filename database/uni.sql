-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 03:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_page_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `small_description`, `home_page_description`, `main_page_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/about/341140987_251376457267468_4483829708394534051_n.jpg', 'rrrr', '<h2><strong>500+ Words Essay on My Self</strong></h2><p>Seven billion people are on this Earth, and everybody is different from the rest of others. There is nothing without purpose in this world. Everything has some purpose. Humans are the best creation, and each person is exclusive. Thus, writing about myself, I’m here to express myself that what I see, what I experience and what I plan for my life. I try myself to be modest, passionate, devoted, hardworking and honest.Seven billion people are on this Earth, and everybody is different from the rest of others. There is nothing without purpose in this world. Everything has some purpose. Humans are the best creation, and each person is exclusive. Thus, writing about myself, I’m here to express myself that what I see, what I experience and what I plan for my life. I try myself to be modest, passionate, devoted, hardworking and honest.</p>', '<h2><strong>500+ Words Essay on My Self</strong></h2><p>Seven billion people are on this Earth, and everybody is different from the rest of others. There is nothing without purpose in this world. Everything has some purpose. Humans are the best creation, and each person is exclusive. Thus, writing about myself, I’m here to express myself that what I see, what I experience and what I plan for my life. I try myself to be modest, passionate, devoted, hardworking and honest.Seven billion people are on this Earth, and everybody is different from the rest of others. There is nothing without purpose in this world. Everything has some purpose. Humans are the best creation, and each person is exclusive. Thus, writing about myself, I’m here to express myself that what I see, what I experience and what I plan for my life. I try myself to be modest, passionate, devoted, hardworking and honest.</p>', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `access_features`
--

CREATE TABLE `access_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `feature_id` bigint(20) UNSIGNED DEFAULT NULL,
  `all` int(11) NOT NULL DEFAULT 0,
  `add` int(11) NOT NULL DEFAULT 0,
  `edit` int(11) NOT NULL DEFAULT 0,
  `delete` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_features`
--

INSERT INTO `access_features` (`id`, `admin_id`, `feature_id`, `all`, `add`, `edit`, `delete`, `status`, `view`, `created_at`, `updated_at`) VALUES
(40, 1, 1, 0, 0, 0, 0, 1, 0, NULL, NULL),
(41, 1, 2, 0, 0, 0, 0, 0, 0, NULL, NULL),
(42, 1, 3, 0, 0, 0, 0, 1, 0, NULL, NULL),
(43, 1, 4, 0, 0, 0, 0, 0, 0, NULL, NULL),
(44, 1, 5, 0, 0, 0, 0, 1, 0, NULL, NULL),
(45, 1, 6, 0, 0, 0, 0, 0, 0, NULL, NULL),
(46, 1, 7, 0, 0, 0, 0, 0, 0, NULL, NULL),
(47, 1, 8, 0, 0, 0, 0, 1, 0, NULL, NULL),
(48, 1, 9, 0, 0, 0, 0, 1, 0, NULL, NULL),
(49, 4, 1, 0, 0, 0, 0, 1, 0, NULL, NULL),
(50, 4, 2, 0, 0, 0, 0, 1, 0, NULL, NULL),
(51, 4, 3, 0, 0, 0, 0, 0, 0, NULL, NULL),
(52, 4, 4, 0, 0, 0, 0, 0, 0, NULL, NULL),
(53, 4, 5, 0, 0, 0, 0, 0, 0, NULL, NULL),
(54, 4, 6, 0, 0, 0, 0, 0, 0, NULL, NULL),
(55, 4, 7, 0, 0, 0, 0, 0, 0, NULL, NULL),
(56, 4, 8, 0, 0, 0, 0, 0, 0, NULL, NULL),
(57, 4, 9, 0, 0, 0, 0, 0, 0, NULL, NULL),
(58, 1, 10, 0, 0, 0, 0, 0, 0, NULL, NULL),
(59, 1, 11, 0, 0, 0, 0, 1, 0, NULL, NULL),
(60, 4, 10, 0, 0, 0, 0, 0, 0, NULL, NULL),
(61, 4, 11, 0, 0, 0, 0, 0, 0, NULL, NULL),
(62, 4, 12, 0, 0, 0, 0, 0, 0, NULL, NULL),
(63, 4, 13, 0, 0, 0, 0, 0, 0, NULL, NULL),
(64, 4, 14, 0, 0, 0, 0, 0, 0, NULL, NULL),
(65, 1, 12, 0, 0, 0, 0, 0, 0, NULL, NULL),
(66, 1, 13, 0, 0, 0, 0, 0, 0, NULL, NULL),
(67, 1, 14, 0, 0, 0, 0, 0, 0, NULL, NULL),
(68, 5, 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(69, 5, 2, 0, 0, 0, 0, 0, 0, NULL, NULL),
(70, 5, 3, 0, 0, 0, 0, 0, 0, NULL, NULL),
(71, 5, 4, 0, 0, 0, 0, 0, 0, NULL, NULL),
(72, 5, 5, 0, 0, 0, 0, 0, 0, NULL, NULL),
(73, 5, 6, 0, 0, 0, 0, 0, 0, NULL, NULL),
(74, 5, 7, 0, 0, 0, 0, 0, 0, NULL, NULL),
(75, 5, 8, 0, 0, 0, 0, 0, 0, NULL, NULL),
(76, 5, 9, 0, 0, 0, 0, 0, 0, NULL, NULL),
(77, 5, 10, 0, 0, 0, 0, 0, 0, NULL, NULL),
(78, 5, 11, 0, 0, 0, 0, 0, 0, NULL, NULL),
(79, 5, 12, 0, 0, 0, 0, 0, 0, NULL, NULL),
(80, 5, 13, 0, 0, 0, 0, 0, 0, NULL, NULL),
(81, 5, 14, 0, 0, 0, 0, 0, 0, NULL, NULL),
(82, 2, 1, 0, 0, 0, 0, 0, 0, NULL, NULL),
(83, 2, 2, 0, 0, 0, 0, 0, 0, NULL, NULL),
(84, 2, 3, 0, 0, 0, 0, 0, 0, NULL, NULL),
(85, 2, 4, 0, 0, 0, 0, 0, 0, NULL, NULL),
(86, 2, 5, 0, 0, 0, 0, 0, 0, NULL, NULL),
(87, 2, 6, 0, 0, 0, 0, 0, 0, NULL, NULL),
(88, 2, 7, 0, 0, 0, 0, 0, 0, NULL, NULL),
(89, 2, 8, 0, 0, 0, 0, 0, 0, NULL, NULL),
(90, 2, 9, 0, 0, 0, 0, 0, 0, NULL, NULL),
(91, 2, 10, 0, 0, 0, 0, 0, 0, NULL, NULL),
(92, 2, 11, 0, 0, 0, 0, 0, 0, NULL, NULL),
(93, 2, 12, 0, 0, 0, 0, 0, 0, NULL, NULL),
(94, 2, 13, 0, 0, 0, 0, 0, 0, NULL, NULL),
(95, 2, 14, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `avatar`, `name`, `email`, `password`, `status`, `designation`, `address`, `phone`) VALUES
(1, 2, 'uploads/profile-img/20221210021544_IMG_3442.JPG', 'admin', 'admin@gmail.com', '$2y$10$suGIbFYCUuit2/zR1QT6gO79Z1xVgqSMdfLy1Nd6zrD1jswqiCfsG', 1, NULL, 'sylhet', '1234589876'),
(2, 1, 'uploads/profile-img/kisspng-fifa-world-cup-football-poster-sport-football-5a9a4fa6480df8.8808587115200623742952.png', 'Superadmin', 'superadmin@gmail.com', '$2y$10$TsjVuDNfiF/9EjIkUkrTSuLvrvy90gCHJZuagcQPbo379IjrR5Ufy', 1, NULL, 'Sylhet Sadar, Sylhet, Bangladesh', '01728522371'),
(5, 2, NULL, 'Md. Jahidul Islam', 'jahid@gmail.com', '$2y$10$0MLs2pEZbvTUte4dcpg0ROBXJVnFU03uGvvb.Qc2qT9wU9EHpl4GC', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `BlogID` int(11) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_desc` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `timestand` datetime DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`BlogID`, `blog_title`, `blog_desc`, `short_desc`, `status`, `timestand`, `UserID`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'approved', NULL, 1),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', NULL, '2023-07-24 10:32:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `CampaignID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `goals` int(11) DEFAULT NULL,
  `raised` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `timestand` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`CampaignID`, `title`, `img`, `goals`, `raised`, `description`, `timestand`) VALUES
(5, 'Education 1', 'education.png', 5000, 6076, 'We help local nonprofit access the funding tools , training and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', NULL),
(6, 'Refuse Shelter', 'foodCharity.png', 10000, 2000, 'We help local nonprofit access the funding tools , training and support the community. It is a great way for donors to get involved with your organization from anywhere in the world.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ForumID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestand` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `UserID`, `ForumID`, `comment`, `timestand`) VALUES
(6, 5, 16, 'wer', '2023-12-26 06:38:01'),
(10, 1, 16, 'uu', '2023-12-26 07:17:42'),
(11, 5, 18, 'se', '2024-01-05 08:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(8, 'rrr', 'admins@gmail.com', 'ddd', 'sdsd', 'dfssssd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`) VALUES
(2, 'who r u?', '<h2><i>Nothing to say</i></h2>', 1),
(3, 'ki korbo bolo?', '<p>love kore jaw tammure</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'executive-member', 1, NULL, NULL),
(2, 'faculty-member', 1, NULL, NULL),
(3, 'alumni-member', 1, NULL, NULL),
(4, 'slider', 1, NULL, NULL),
(5, 'faqs', 1, NULL, NULL),
(6, 'about-us', 1, NULL, NULL),
(7, 'privacy-policy-terms-condition', 1, NULL, NULL),
(8, 'contact-us', 1, NULL, NULL),
(9, 'setting', 1, NULL, NULL),
(10, 'news', 1, NULL, NULL),
(11, 'events', 1, NULL, NULL),
(12, 'service', 1, NULL, NULL),
(13, 'testimonial', 1, NULL, NULL),
(14, 'gallery', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `details`) VALUES
(1, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `ForumID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `description` text NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `timestand` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`ForumID`, `title`, `UserID`, `description`, `short_description`, `status`, `timestand`) VALUES
(16, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.', 'approved', '2023-12-26 05:37:42'),
(17, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, omnis.', 'approved', '2023-12-26 05:37:54'),
(18, 'r adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit.', 1, 'r adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit.r adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit.r adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'r adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit.r adipisicing elit. Quia, omnis.Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'approved', '2023-12-26 06:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `images`, `title`, `status`) VALUES
(12, 'uploads/gallery/about.jpg,uploads/gallery/banner-1.jpg,uploads/gallery/banner-2.jpg,uploads/gallery/blog-3.jpg', NULL, 1),
(13, 'uploads/gallery/277789541_5124048760975576_6712232194972232450_n.jpg,uploads/gallery/314413179_551302937000506_568043373116593925_n.jpg', NULL, 1),
(14, 'uploads/gallery/20221210020959_IMG_3427.JPG,uploads/gallery/20221210021544_IMG_3442.JPG', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `time_range` varchar(255) DEFAULT NULL,
  `semester_no` varchar(255) DEFAULT NULL,
  `registration_id` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `short_details` longtext DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `type`, `avatar`, `name`, `email`, `phone`, `designation`, `time_range`, `semester_no`, `registration_id`, `address`, `short_details`, `details`, `slug`, `status`) VALUES
(6, 'executive', 'uploads/members/executive/jahid.jpg', 'Md. Jahidul Islam', 'jahid@gmail.com', '017********', 'Vice President', NULL, '11', '200103020029', 'NEUB', '', '', NULL, 1),
(7, 'executive', 'uploads/members/executive/sudip.jpg', 'Sudip Singho', 'sudip@gmail.com', '017*********', 'General Secretary', NULL, '9', '2101030200**', 'NEUB', '', '', NULL, 1),
(8, 'executive', 'uploads/members/executive/Mohid.jpg', 'Md. Mohid Hasan Shanto', 'mohid@gmail.com', '017***********', 'Assistant General Secretary', NULL, '**', '2*0*030200**', 'NEUB', '', '', NULL, 1),
(9, 'executive', 'uploads/members/executive/mansura.jpg', 'Mansura Mokbul', 'mansura@gmail.com', '01***********', 'Senior Executive Member', NULL, '11', '200103020028', 'NEUB', '', '', NULL, 1),
(10, 'executive', 'uploads/members/executive/maruf.jpg', 'Maruf Ahmed', 'maruf@gmail.com', '01***********', 'Senior Executive Member', NULL, '11', '200103020049', 'NEUB', '', '', NULL, 1),
(11, 'executive', 'uploads/members/executive/sunny.jpg', 'Md. Ashrafuzzaman ', 'sunny@gmail.com', '01**********', 'Senior Executive Member', NULL, '11', '200*030200**', 'NEUB', '', '', NULL, 1),
(12, 'executive', 'uploads/members/executive/partho.jpg', 'Partho Das', 'partho@gmailcom', '01***********', 'Executive Member', NULL, '**', '2*0*030200**', 'NEUB', '', '', NULL, 1),
(13, 'executive', 'uploads/members/executive/Sankar.jpg', 'Sankarsan Das', 'sankar@gmail.com', '01***********', 'Executive Member', NULL, '**', '2*0*030200**', 'NEUB', '', '', NULL, 1),
(14, 'executive', 'uploads/members/executive/Torjoy.jpg', 'Torjoy Das Gupto', 'torjoy@gmail.com', '01*********', 'Executive Member', NULL, '**', '2*0*030200**', 'NEUB', '', '', NULL, 1),
(15, 'executive', 'uploads/members/executive/hrithik.jpg', 'Hrithik Deb Nath', 'hrithik@gmail.com', '01**********', 'Executive Member', NULL, '**', '2*0*030200**', 'NEUB', '', '', NULL, 1),
(16, 'faculty', 'uploads/members/faculty/Dr.Mohammad-Shahidur-Rahman.jpg', 'Dr.Mohammad-Shahidur-Rahman', 'abc@gmail.com', '01*************', 'Professor & Advisor ', NULL, NULL, NULL, 'NEUB', '', '<p>Ph.D, Japan</p>', NULL, 1),
(17, 'faculty', 'uploads/members/faculty/Professor-Dr.-Sabira-Khatun.jpg', 'Professor-Dr.-Sabira-Khatun', 'abc1@gmail.com', '01************', 'Professor ', NULL, NULL, NULL, 'NEUB', '', '<p>School of Computing, Mathematics and Engineering&nbsp;</p><p>Charles Sturt University (CSU), Australia</p>', NULL, 1),
(18, 'faculty', NULL, 'Tasnim Zahan', 'abc2@gmail.com', '01*********', 'Assistant Professor & Head', NULL, NULL, NULL, 'NEUB', '', '', NULL, 1),
(19, 'faculty', 'uploads/members/faculty/AlMehdiSaadatChowdhury.jpg', 'Al MehdiSaadat Chowdhury', 'abc3@gmail.com', '01*************', 'Assistant Professor ', NULL, NULL, NULL, 'NEUB', '', '', NULL, 1),
(20, 'faculty', 'uploads/members/faculty/Shahadat_Hussain_Parvej.jpg', 'Shahadat  Hussain Parvej', 'abc4@gmail.com', '01**********', 'Assistant Professor ', NULL, NULL, NULL, 'NEUB', '', '', NULL, 1),
(21, 'alumni', 'uploads/members/alumni/Ayon-Dey.jpg', 'Ayon Dey', 'ayon@gmail.com', '01**********', 'Lecturer(Present)', '20 january 2017 - 31 december 2021', NULL, NULL, 'NEUB', '', '', NULL, 1),
(22, 'alumni', 'uploads/members/alumni/Khadem-Mohammad-Asif-uz-zaman.jpg', 'Khadem Mohammad Asif-uz-zaman', 'asif@gmail.com', '01***********', 'Lecturer(Present)', '20 january 201* - 31 december 202*', NULL, NULL, 'NEUB', '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(16, 4, 5, 'hi'),
(17, 1, 5, 'hi'),
(18, 5, 1, 'hello'),
(19, 1, 5, 'how are you'),
(20, 5, 1, 'fine');

-- --------------------------------------------------------

--
-- Table structure for table `newslatter`
--

CREATE TABLE `newslatter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newslatter`
--

INSERT INTO `newslatter` (`id`, `email`) VALUES
(1, 'admin@gmail.com'),
(8, 'sajibsd013@gmail.com'),
(9, 'sajibsd0131@gmail.com'),
(10, 'sajibsd01322@gmail.com'),
(11, 'saji22bsd013@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `NoticeID` int(11) NOT NULL,
  `notice` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`NoticeID`, `notice`, `timestamp`, `title`) VALUES
(2, 'Notice of Holy ChristmasNotice of Holy ChristmasNotice of Holy ChristmasNotice of Holy ChristmasNotice of Holy ChristmasNotice of Holy ChristmasNotice of Holy Christmas', '2023-12-27 12:16:21', 'Notice of Holy Christmas'),
(4, 'Notice of Holy ChristmasNotice of Holy ChristmasNotice of Holy Christmas', '2023-12-27 12:31:22', 'Notice of Holy ChristmasNotice of Holy Christmas');

-- --------------------------------------------------------

--
-- Table structure for table `photo_sliders`
--

CREATE TABLE `photo_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_sliders`
--

INSERT INTO `photo_sliders` (`id`, `image`, `heading_one`, `small_text`, `btn_title`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'uploads/slider319512321_586466493484150_5465056761951598550_n.jpg', 'CSE SOCITY', 'nothing to say ', 'Test', 'http://localhost/cse-socity/admin/pages/index.php?page=add-slider', '0', NULL, NULL),
(3, 'uploads/slider319117316_586478550149611_7748142640093244078_n.jpg', 'CSE SOCITY', 'Nothing to say', '', '', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type`, `title`, `cover_image`, `tag`, `date`, `time_range`, `location`, `contact_number`, `contact_email`, `organizer_name`, `organizer_link`, `images`, `news_link`, `details`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(12, NULL, 'news', 'test  test ', 'uploads/news/depositphotos_118915374-stock-photo-amroha-utter-pradesh-india-2011.jpg', 'ttttt', '2023-04-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.canva.com/design/DAFdD_2pdvM/n6efHmWkjjlIUBgxyUnqJA/edit', '<p>fsdf Lorem ipsum dolor sit amet nbsp</p>', NULL, '1', NULL, NULL),
(21, NULL, 'event', 'Guest Lectures and Industry Talks', 'uploads/event/277789541_5124048760975576_6712232194972232450_n.jpg', '', '2023-07-24', '10AM - 2PM', 'Sylhet', '01**********', 'mitupaul250@gmail.com', 'NEUB', '', NULL, NULL, '<p>The society may invite guest speakers from the industry or academia to deliver talks and share their expertise. These lectures can provide valuable insights into current trends, career opportunities, and real-world applications of computer science and engineering.</p>', 'guest-lectures-and-industry-talks', '1', NULL, NULL),
(22, NULL, 'event', 'Peer Mentoring and Study Groups', 'uploads/event/download.jpeg', '', '2023-07-25', '2hr', 'Sylhet', '01**********', 'mitupaul250@gmail.com', 'NEUB', '', NULL, NULL, '', 'peer-mentoring-and-study-groups', '1', NULL, NULL),
(23, NULL, 'event', 'Code Contest', 'uploads/event/9608604.jpg', '', '2023-07-31', '10AM - 4PM', 'Sylhet', '01**********', 'mitupaul250@gmail.com', 'NEUB', '', NULL, NULL, '', 'code-contest', '1', NULL, NULL),
(24, NULL, 'event', 'NEUB Sports Week', 'uploads/event/314413179_551302937000506_568043373116593925_n.jpg', '', '2023-08-31', '31 August 2023 - 15 September2023', 'NEUB', '01**********', 'mitupaul250@gmail.com', 'NEUB', '', NULL, NULL, '', 'neub-sports-week', '1', NULL, NULL),
(25, NULL, 'news', 'কেন ফেরানো হল তামিমকে? বাংলাদেশ ক্রিকেটে অতীতের ঘটনার মিল তামিমকাণ্ডে', 'uploads/news/1688750675_tamim-1.jpg', '', '2023-07-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.anandabazar.com/sports/cricket/how-bangladesh-captain-tamim-iqbals-un-retirement-unfolded-dgtl/cid/1443942', '<p>গত বৃহস্পতিবার হঠাৎ আন্তর্জাতিক ক্রিকেট থেকে অবসর ঘোষণা করেছিলেন বাংলাদেশের এক দিনের ক্রিকেটের অধিনায়ক তামিম ইকবাল। বাংলাদেশের প্রধানমন্ত্রী শেখ হাসিনার হস্তক্ষেপে ২৪ ঘণ্টার মধ্যেই অবসর প্রত্যাহার করে নিয়েছিলেন তিনি। এই ঘটনায় এখনও আলোড়ন চলছে বাংলাদেশের ক্রিকেট মহলে। ১১ বছর আগের এক ঘটনার সঙ্গেও মিল পাচ্ছেন অনেকে। কিন্তু কেন ঘটল এমন ঘটনা?</p><p>তামিম অবসর নিতে পারেন, তা জানতেন না বাংলাদেশ ক্রিকেট বোর্ডের কর্তারা। যদিও অনেকের দাবি, তামিমের সিদ্ধান্ত হঠাৎ ছিল না। কিছু দিন ধরে বোর্ড সভাপতি নাজমুল হাসেন পাপন এবং কোচ চন্দিকা হাথুরুসিংহের সঙ্গে নাকি দূরত্ব তৈরি হয়েছিল তামিমের। শোনা যাচ্ছে, তাঁর ফিটনেসে খুশি ছিলেন না বাংলাদেশের কোচ। আফগানিস্তানের বিরুদ্ধে এক দিনের সিরিজ় শুরুর এক সপ্তাহ আগে থেকে তামিমের পিঠে ব্যথা ছিল। সম্পূর্ণ ফিট না থাকলেও তামিম আফগানদের বিরুদ্ধে প্রথম ম্যাচ খেলতে চান। মনে করা হচ্ছে যে কোনও কারণেই হোক তিনি জায়গা ছাড়তে রাজি ছিলেন না। তামিম নিজে জানিয়েছিলেন আফগানিস্তানের বিরুদ্ধে প্রথম এক দিনের ম্যাচে মাঠে নেমে নিজের ফিটনেস পরখ করতে চেয়েছিলেন তিনি। তিনি বলেছিলেন, ‘‘আমি খেলার জন্য তৈরি। তবে পিঠে ব্যথা রয়েছে। এমনিতে সমস্যা হচ্ছে না। জিম করার সময় ব্যথা লাগছে। আমি আগের থেকে ভাল আছি। ১০০ শতাংশ ফিট নই। এমন কিছু করতে চাই না, যার জন্য দলকে ভুগতে হবে। যে কোনও ব্যক্তির থেকে দল আগে। খেলার জন্য আমি প্রস্তুত। ম্যাচের মধ্যে তেমন কিছু মনে হলে মেডিক্যাল স্টাফদের পরামর্শ নিয়ে সিদ্ধান্ত নেব।’’</p><p>তাঁর এই পরীক্ষা-নিরীক্ষা মানতে পারেননি কোচ। সরাসরি নালিশ করেছিলেন বোর্ড সভাপতিকে। সূত্রের খবর, ম্যাচের আগের দিন প্রায় ৩০ মিনিট বোর্ড সভাপতির সঙ্গে কথা বলেছিলেন ক্ষুব্ধ কোচ। নাজমুলও তামিমের কড়া সমালোচনা করে বলেছিলেন, “এটা তো পাড়ার ম্যাচ নয়! এটা আন্তর্জাতিক ম্যাচ। সিরিজ় শুরুর আগের দিন অধিনায়ক বলছে, সে ফিট নয়। কিন্তু খেলবে। খেলে নিজের ফিটনেস বোঝার চেষ্টা করবে। এটা তো কোনও পেশাদার ক্রিকেটারের আচরণ হতে পারে না!”</p><p>তামিমের খেলা নিয়ে আপত্তি ছিল বোর্ড সভাপতি এবং কোচের। কিন্তু তাঁদের আপত্তিতে কান না দিয়ে আফগানিস্তানের বিরুদ্ধে প্রথম এক দিনের ম্যাচ খেলেছিলেন তামিম। করেছিলেন ১৩ রান। সূত্রের খবর, পিঠের ব্যথা নিয়ে মাঠে নেমে ব্যর্থ তামিমকে তীব্র ভর্ৎসনা করেছিলেন বোর্ড সভাপতি এবং কোচ। তার পরই অবসরের সিদ্ধান্ত নেন তামিম।</p><p>&nbsp;</p><p>তা হলে কেন ফেরানো হল তামিমকে? কেনই বা হস্তক্ষেপ করলেন বাংলাদেশের প্রধানমন্ত্রী? উঠে আসছে দু’টি কারণ। প্রথমত, অধিনায়ক হিসাবে তামিমের গ্রহণযোগ্যতা শাকিব আল হাসানের তুলনায় অন্য ক্রিকেটারদের কাছে বেশি। সতীর্থদের সঙ্গে তামিম অনেক সহজ ভাবে মিশতে পারেন। নতুন খেলোয়াড়দের সুযোগ দেওয়ার ক্ষেত্রেও তামিম অনেক বেশি উদার। এক দিনের বিশ্বকাপের আগে নতুন করে অস্থিরতা চাইছেন না বোর্ড কর্তাদের একাংশ। দ্বিতীয়ত, বাংলাদেশের ক্রিকেটে খান পরিবারের প্রভাব। বাংলাদেশের প্রাক্তন অধিনায়ক আক্রম খান তামিমের কাকা। আর এক প্রাক্তন ক্রিকেটার নাফিস ইকবাল সম্পর্কে তামিমের দাদা। ২০১২ সালের এশিয়া কাপের আগে পদত্যাগ করেছিলেন তৎকালীন প্রধান নির্বাচক আক্রম। তামিমকে দল থেকে বাদ দেওয়ার প্রতিবাদে ইস্তফা দিয়েছিলেন তিনি। তৎকালীন বোর্ড সভাপতি মুস্তাফা কামালের সঙ্গে তাঁর সম্পর্কও মধুর ছিল না। সে বারও দ্রুত হস্তক্ষেপ করেছিলেন প্রধানমন্ত্রী হাসিনা। ডেকে পাঠিয়ে কথা বলেছিলেন আক্রমের সঙ্গে। ২৪ ঘণ্টার মধ্যে ইস্তফা প্রত্যাহার করে নিয়েছিলেন আক্রম। বাংলাদেশের ক্রিকেট একই রকম ঘটনার সাক্ষী থাকল আরও এক বার। সেই খান পরিবার এবং বোর্ড সভাপতির দ্বন্দ্ব। শেষে প্রধানমন্ত্রীর হস্তক্ষেপে শান্তি প্রতিষ্ঠা।</p><p>&nbsp;</p><p>হাসিনা ক্রিকেট ভক্ত। সময় পেলে খেলাও দেখেন। গত বৃহস্পতিবার রাতেই তিনি হস্তক্ষেপ করেছিলেন। শুক্রবার সকালে মধ্যহ্নভোজের আমন্ত্রণ পাঠিয়ে তামিমকে ডেকেছিলেন হাসিনা। বাংলাদেশের প্রাক্তন অধিনায়ক মাশরাফি মোর্তাজা এবং বোর্ডের সভাপতি নাজমুলকেও ডেকেছিলেন। প্রায় তিন ঘণ্টা আলোচনার পর তামিমকে অবসর প্রত্যাহার করার নির্দেশ দেন হাসিনা। প্রধানমন্ত্রীর নির্দেশ মেনে নেন তামিম।</p>', NULL, '1', NULL, NULL),
(26, NULL, 'news', 'বদলে যাচ্ছে ব্র্যাক বিশ্ববিদ্যালয়ের নাম', 'uploads/news/fc4b68fc4edccfacb4f34d73f3f3dd28ef03b8bc4995008a.jpg', '', '2023-07-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '<h4>ব্র্যাকের প্রতিষ্ঠাতা প্রয়াত স্যার ফজলে হাসান আবেদের প্রতি শ্রদ্ধা জানাতেই ব্র্যাক বিশ্ববিদ্যালয়ের নাম পরিবর্তন করতে চায় বোর্ড অফ ট্রাস্টিজ। ইতোমধ্যে নাম পরিবর্তনের বিষয়ে মতামত চেয়ে বিশ্ববিদ্যালয় মঞ্জুরি কমিশনকে (ইউজিসি) চিঠি দিয়েছে মাধ্যমিক ও উচ্চশিক্ষা বিভাগ।</h4><h4>বিশ্ববিদ্যালয়ের নতুন নাম হিসেবে ‘স্যার ফজলে হাসান আবেদ ইউনিভার্সিটি’ বা সংক্ষেপে ‘আবেদ ইউনিভার্সিটি’ হিসেবে উল্লেখ করা হয়েছে।</h4><h4><br>যদিও ২০১৯ সালের ৩১ অক্টোবর বোর্ড অফ ট্রাস্টিজ এর ৩১তম সভায় বিশ্ববিদ্যালয়ের নাম পরিবর্তন করে ‘স্যার ফজলে হাসান আবেদ ইউনিভার্সিটি’ রাখার সিদ্ধান্ত নেয়া হয়। তখন স্যার ফজলে হাসান আবেদ জীবিত ছিলেন। একই বছরের ২০ ডিসেম্বর তিনি মারা যান।</h4><h4>ওই সিদ্ধান্তের তিন বছর পর চলতি বছরের ২৮ মে শিক্ষা মন্ত্রণালয়ের অধীন মাধ্যমিক ও উচ্চশিক্ষা বিভাগের অনুমতি নিয়ে নাম পরিবর্তনের আনুষ্ঠানিক প্রক্রিয়া শুরু করে ব্র্যাক বিশ্ববিদ্যালয় কর্তৃপক্ষ। যেখানে, বিশ্ববিদ্যালয়ের নতুন নাম হিসেবে স্যার ফজলে হাসান আবেদ ইউনিভার্সিটি বা সংক্ষেপে আবেদ ইউনিভার্সিটি হিসেবে উল্লেখ করা হয়েছে।</h4><h4><br>নাম পরিবর্তনের সিদ্ধান্ত যে সভায় নেয়া হয়েছিল ওই সভায় চেয়ারপারসন তামারা হাসান আবেদের সভাপতিত্বে সভায় আরও নয়জন বোর্ড অফ ট্রাস্টিজ সদস্য উপস্থিত ছিলেন। তারা সবাই নাম পরিবর্তনের পক্ষে ছিলেন বলেই জানা গেছে।</h4><h4>সভায় ব্র্যাক বিশ্ববিদ্যালয়ের উপাচার্য ও প্রেসিডেন্ট ভিনসেন্ট চ্যাং বিশ্ববিদ্যালয়ের নাম পরিবর্তনের প্রস্তাব দিয়েছেন। একাডেমিক কাউন্সিল এবং বিশ্ববিদ্যালয় সিন্ডিকেটে ব্র্যাকের স্বপ্নদর্শী প্রতিষ্ঠাতার অবদানের স্বীকৃতি হিসেবে বিশ্ববিদ্যালয়ের নাম পরিবর্তনের প্রস্তাবকে সবাই সমর্থন করেছেন। তারা বলেছেন, স্যার ফজলে হাসান আবেদের উত্তরাধিকারকে সম্মান করার এর চেয়ে ভালো উপায় আর হতে পারে না।</h4><h4><br>পরে ব্র্যাক বিশ্ববিদ্যালয়ের রেজিস্ট্রার ড. ডেভিড ডাউল্যান্ড প্রস্তাবটি শিক্ষা মন্ত্রণালয়ে পাঠান।</h4><h4><br>এদিকে নাম পরিবর্তনের বিষয়ে শিক্ষা মন্ত্রণালয়ের মতামত চাওয়ার পর ইউজিসি আবেদনটি আইন সেলে পাঠিয়েছে। কিন্তু প্রাইভেট বিশ্ববিদ্যালয় অ্যাক্ট-২০১০ শিক্ষামূলক কার্যক্রম চলমান থাকা অবস্থায় বিশ্ববিদ্যালয়ের নাম পরিবর্তন করার অনুমতি দেয় না।</h4><h4>&nbsp;</h4><h4>ফলে বিশ্ববিদ্যালয়ের নাম পরিবর্তন করতে কিছুটা সময় লাগতে পারে বলে ধারণা করা হচ্ছে। যদিও এই নাম পরিবর্তনের বিরোধিতা করেছেন বর্তমান ও সাবেক শিক্ষার্থীরা। তাদের মতে, এতে সার্টিফিকেটের সাথে জটিলতা সৃষ্টি হতে পারে।&nbsp;</h4>', NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ProjectID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `live_url` varchar(255) DEFAULT NULL,
  `git_url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `technology` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectID`, `title`, `description`, `author`, `status`, `live_url`, `git_url`, `img`, `technology`) VALUES
(4, 'Demo Project', 'A list of commonly used Git commandsA list of commonly used Git commands , A list of commonly used Git commandsA list of commonly used Git commandsA list of commonly used Git commands', 'Mr XYZ', 'approved', 'https://github.com/joshnh', 'https://github.com/joshnh/Git-Commands', NULL, 'C++, Java'),
(5, 'Demo Project', 'A list of commonly used Git commandsA list of commonly used Git commands , A list of commonly used Git commandsA list of commonly used Git commandsA list of commonly used Git commands', 'Mr XYZ', 'pending', 'https://github.com/joshnh', 'https://github.com/joshnh/Git-Commands', NULL, 'C++, Java');

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `ReactID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ForumID` int(11) DEFAULT NULL,
  `CommentID` int(11) DEFAULT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'like'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `react`
--

INSERT INTO `react` (`ReactID`, `UserID`, `ForumID`, `CommentID`, `type`) VALUES
(93, 5, 17, NULL, 'like'),
(94, 5, NULL, 10, 'like'),
(103, 5, 18, NULL, 'love'),
(104, 5, NULL, 11, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `title`, `url`, `description`, `status`, `author`) VALUES
(1, 'Method of Adjacent Distance Array Outperforms Conventional Huffman Codes to Decode Bengali Transliterated Text Swiftly', 'https://journal.uob.edu.bh/handle/123456789/4498', 'This research works on high symbolic Bengali text and transforms it into corresponding less symbolic English complying with the transliteration method. The Huffman-based approaches serve to compress retaining the original quality of the data. On the other hand, faster encoding and decoding is the most sophisticated sphere in data compression. We propose an adjacent distance array, a novel data structure based on the Huffman principle for encoding and decoding the character of transliterated text. The encoding and decoding algorithms have been explained for the introduced modus operandi and juxtaposed with conventional Huffman-based algorithms. Our research is outdoing than any regular Huffman-based algorithms, concentrating on the speed of the encoding and decoding manner discovered after estimating all decisions.', 'approved', 'Sarker, Pranta; Rahman, Mir Lutfur');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `ResultID` int(11) NOT NULL,
  `StudentID` varchar(100) NOT NULL,
  `CourseCode` varchar(255) NOT NULL,
  `CourseTitle` varchar(255) NOT NULL,
  `Credit` varchar(10) NOT NULL,
  `Ecr` varchar(10) NOT NULL,
  `LetterGrade` varchar(10) NOT NULL,
  `GradePoint` varchar(10) NOT NULL,
  `Semester` varchar(255) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`ResultID`, `StudentID`, `CourseCode`, `CourseTitle`, `Credit`, `Ecr`, `LetterGrade`, `GradePoint`, `Semester`) VALUES
(16, 'Student ID', 'Course Code', 'Course Title', 'Credit', 'Ecr', 'Letter Gra', 'Grade Poin', 'Spring 19'),
(17, '1.50E+11', 'CSE-214', 'Electronic Devices and Circuits Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(18, '1.50E+11', 'CSE-313', 'Database System', '3', '0', 'F', '0', 'Spring 19'),
(19, '1.50E+11', 'CSE-314', 'Database System Lab', '1.5', '1.5', 'D', '2', 'Spring 19'),
(20, '1.50E+11', 'CSE-325', 'Computer Networking', '3', '0', 'F', '0', 'Spring 19'),
(21, '1.50E+11', 'CSE-333', 'Software Engineering', '3', '0', 'F', '0', 'Spring 19'),
(22, '1.50E+11', 'CSE-431', 'Digital Signal  Processing', '3', '0', 'F', '0', 'Spring 19'),
(23, '1.50E+11', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '1.5', 'C', '2.25', 'Spring 19'),
(24, '1.50E+11', 'CSE-455', 'Machine Learning', '3', '0', 'F', '0', 'Spring 19'),
(25, '1.50E+11', 'CSE-456', 'Machine Learning Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(26, '1.50E+11', 'CSE-411', 'Artificial Intelligence', '3', '3', 'B', '3', 'Spring 19'),
(27, '1.60E+11', 'CSE-411', 'Artificial Intelligence', '3', '3', 'B+', '3.25', 'Spring 19'),
(28, '1.60E+11', 'CSE-212', 'Object Oriented Programming Language Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(29, '1.60E+11', 'CSE-456', 'Machine Learning Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(30, '1.60E+11', 'CSE-332', 'Operating System and System Programming', '1.5', '0', 'F', '0', 'Spring 19'),
(31, '1.60E+11', 'CSE-335', 'Technical Writing And Presentation', '3', '0', 'F', '0', 'Spring 19'),
(32, '1.60E+11', 'CSE-421', 'Compiler Construction', '3', '0', 'F', '0', 'Spring 19'),
(33, '1.60E+11', 'CSE-422', 'Compiler Construction Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(34, '1.60E+11', 'CSE-431', 'Digital Signal  Processing', '3', '0', 'F', '0', 'Spring 19'),
(35, '1.60E+11', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(36, '1.60E+11', 'CSE-455', 'Machine Learning', '3', '0', 'F', '0', 'Spring 19'),
(37, '1.70E+11', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '1.5', 'A+', '4', 'Spring 19'),
(38, '1.70E+11', 'CSE-449', 'Bio-Informatics', '3', '3', 'B+', '3.25', 'Spring 19'),
(39, '1.70E+11', 'CSE-450', 'Bio-Informatics Lab', '1.5', '1.5', 'A-', '3.5', 'Spring 19'),
(40, '1.70E+11', 'MAT-103', 'Matrices, Vector Analysis and Geometry', '3', '3', 'B', '3', 'Spring 19'),
(41, '1.70E+11', 'MAT-201', 'Numerical Methods', '3', '3', 'A-', '3.5', 'Spring 19'),
(42, '1.70E+11', 'CSE-331', 'Operating System and System Programming', '3', '3', 'A', '3.75', 'Spring 19'),
(43, '1.70E+11', 'CSE-402', 'Thesis/ Project II', '2', '2', 'A-', '3.5', 'Spring 19'),
(44, '1.70E+11', 'CSE-404', 'Viva Voce', '1.5', '1.5', 'B+', '3.25', 'Spring 19'),
(45, '1.70E+11', 'CSE-431', 'Digital Signal  Processing', '3', '3', 'A', '3.75', 'Spring 19'),
(46, 'Student ID', 'Course Code', 'Course Title', 'Credit', 'Ecr', 'Letter Gra', 'Grade Poin', 'Spring 19'),
(47, '1.50E+11', 'CSE-214', 'Electronic Devices and Circuits Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(48, '1.50E+11', 'CSE-313', 'Database System', '3', '0', 'F', '0', 'Spring 19'),
(49, '1.50E+11', 'CSE-314', 'Database System Lab', '1.5', '1.5', 'D', '2', 'Spring 19'),
(50, '1.50E+11', 'CSE-325', 'Computer Networking', '3', '0', 'F', '0', 'Spring 19'),
(51, '1.50E+11', 'CSE-333', 'Software Engineering', '3', '0', 'F', '0', 'Spring 19'),
(52, '1.50E+11', 'CSE-431', 'Digital Signal  Processing', '3', '0', 'F', '0', 'Spring 19'),
(53, '1.50E+11', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '1.5', 'C', '2.25', 'Spring 19'),
(54, '1.50E+11', 'CSE-455', 'Machine Learning', '3', '0', 'F', '0', 'Spring 19'),
(55, '1.50E+11', 'CSE-456', 'Machine Learning Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(56, '1.50E+11', 'CSE-411', 'Artificial Intelligence', '3', '3', 'B', '3', 'Spring 19'),
(57, '1.60E+11', 'CSE-411', 'Artificial Intelligence', '3', '3', 'B+', '3.25', 'Spring 19'),
(58, '1.60E+11', 'CSE-212', 'Object Oriented Programming Language Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(59, '1.60E+11', 'CSE-456', 'Machine Learning Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(60, '1.60E+11', 'CSE-332', 'Operating System and System Programming', '1.5', '0', 'F', '0', 'Spring 19'),
(61, '1.60E+11', 'CSE-335', 'Technical Writing And Presentation', '3', '0', 'F', '0', 'Spring 19'),
(62, '1.60E+11', 'CSE-421', 'Compiler Construction', '3', '0', 'F', '0', 'Spring 19'),
(63, '1.60E+11', 'CSE-422', 'Compiler Construction Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(64, '1.60E+11', 'CSE-431', 'Digital Signal  Processing', '3', '0', 'F', '0', 'Spring 19'),
(65, '1.60E+11', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '0', 'F', '0', 'Spring 19'),
(66, '1.60E+11', 'CSE-455', 'Machine Learning', '3', '0', 'F', '0', 'Spring 19'),
(67, '1.70E+11', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '1.5', 'A+', '4', 'Spring 19'),
(68, '1.70E+11', 'CSE-449', 'Bio-Informatics', '3', '3', 'B+', '3.25', 'Spring 19'),
(69, '1.70E+11', 'CSE-450', 'Bio-Informatics Lab', '1.5', '1.5', 'A-', '3.5', 'Spring 19'),
(70, '1.70E+11', 'MAT-103', 'Matrices, Vector Analysis and Geometry', '3', '3', 'B', '3', 'Spring 19'),
(71, '1.70E+11', 'MAT-201', 'Numerical Methods', '3', '3', 'A-', '3.5', 'Spring 19'),
(72, '1.70E+11', 'CSE-331', 'Operating System and System Programming', '3', '3', 'A', '3.75', 'Spring 19'),
(73, '1.70E+11', 'CSE-402', 'Thesis/ Project II', '2', '2', 'A-', '3.5', 'Spring 19'),
(74, '1.70E+11', 'CSE-404', 'Viva Voce', '1.5', '1.5', 'B+', '3.25', 'Spring 19'),
(75, '1.70E+11', 'CSE-431', 'Digital Signal  Processing', '3', '3', 'A', '3.75', 'Spring 19'),
(106, '150203020018', 'CSE-214', 'Electronic Devices and Circuits Lab', '1.5', '0', 'F', '0', '6'),
(107, '150203020018', 'CSE-313', 'Database System', '3', '0', 'F', '0', '6'),
(108, '150203020018', 'CSE-314', 'Database System Lab', '1.5', '1.5', 'D', '2', '6'),
(109, '150203020018', 'CSE-325', 'Computer Networking', '3', '0', 'F', '0', '6'),
(110, '150203020018', 'CSE-333', 'Software Engineering', '3', '0', 'F', '0', '6'),
(111, '150203020018', 'CSE-431', 'Digital Signal  Processing', '3', '0', 'F', '0', '6'),
(112, '150203020018', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '1.5', 'C', '2.25', '6'),
(113, '150203020018', 'CSE-455', 'Machine Learning', '3', '0', 'F', '0', '6'),
(114, '150203020018', 'CSE-456', 'Machine Learning Lab', '1.5', '0', 'F', '0', '6'),
(115, '150203020018', 'CSE-411', 'Artificial Intelligence', '3', '3', 'B', '3', '6'),
(116, '160103020079', 'CSE-411', 'Artificial Intelligence', '3', '3', 'B+', '3.25', '6'),
(117, '160203020013', 'CSE-212', 'Object Oriented Programming Language Lab', '1.5', '0', 'F', '0', '6'),
(118, '160203020013', 'CSE-456', 'Machine Learning Lab', '1.5', '0', 'F', '0', '6'),
(119, '160203020013', 'CSE-332', 'Operating System and System Programming', '1.5', '0', 'F', '0', '6'),
(120, '160203020013', 'CSE-335', 'Technical Writing And Presentation', '3', '0', 'F', '0', '6'),
(121, '160203020013', 'CSE-421', 'Compiler Construction', '3', '0', 'F', '0', '6'),
(122, '160203020013', 'CSE-422', 'Compiler Construction Lab', '1.5', '0', 'F', '0', '6'),
(123, '160203020013', 'CSE-431', 'Digital Signal  Processing', '3', '0', 'F', '0', '6'),
(124, '160203020013', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '0', 'F', '0', '6'),
(125, '160203020013', 'CSE-455', 'Machine Learning', '3', '0', 'F', '0', '6'),
(126, '170103020055', 'CSE-432', 'Digital Signal  Processing Lab', '1.5', '1.5', 'A+', '4', '6'),
(127, '170103020055', 'CSE-449', 'Bio-Informatics', '3', '3', 'B+', '3.25', '6'),
(128, '170103020055', 'CSE-450', 'Bio-Informatics Lab', '1.5', '1.5', 'A-', '3.5', '6'),
(129, '170103020055', 'MAT-103', 'Matrices, Vector Analysis and Geometry', '3', '3', 'B', '3', '6'),
(130, '170103020055', 'MAT-201', 'Numerical Methods', '3', '3', 'A-', '3.5', '6'),
(131, '170103020055', 'CSE-331', 'Operating System and System Programming', '3', '3', 'A', '3.75', '6'),
(132, '170103020055', 'CSE-402', 'Thesis/ Project II', '2', '2', 'A-', '3.5', '6'),
(133, '170103020055', 'CSE-404', 'Viva Voce', '1.5', '1.5', 'B+', '3.25', '6'),
(134, '170103020055', 'CSE-431', 'Digital Signal  Processing', '3', '3', 'A', '3.75', '6');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_link` varchar(255) DEFAULT NULL,
  `logo_class` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_details` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `logo`, `logo_link`, `logo_class`, `title`, `short_details`, `details`, `status`) VALUES
(5, 'uploads/service/Network.jpg', '', NULL, 'Networking and Career Development', 'The society may organize networking events, career fairs, or industry visits to help students connect with professionals, alumni, and potential employers. These activities can provide valuable networking opportunities and facilitate internships or job pla', '', 1),
(6, 'uploads/service/download (1).jpg', '', NULL, 'Social and Recreational Activities', 'The society may organize social and recreational activities to promote a sense of community among CSE students. These can include outings, game nights, celebrations, or cultural events where students can interact with each other in a more relaxed setting.', '', 1),
(7, 'uploads/service/images.jpeg', '', NULL, 'Technical Workshops and Training', 'The society may organize workshops and training sessions on various technical topics related to computer science and engineering. These sessions can help students enhance their skills and knowledge in areas such as programming languages, web development, ', '', 1),
(8, NULL, '', NULL, 'Volontier', 'czxdfgs', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_infos`
--

CREATE TABLE `shop_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_infos`
--

INSERT INTO `shop_infos` (`id`, `name`, `logo`, `short_details`, `email`, `phone`, `address`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin`, `currency`, `vat`, `social_media_type`, `social_media_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSE SOCITY', 'uploads/setting/Untitled design (2).png', 'nothing to say', 'admin@gmail.com', '01728522371', 'sylhet city', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/in/', NULL, NULL, NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` varchar(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Program` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `Birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Name`, `Program`, `session`, `Birthday`) VALUES
('150203020018', 'Abdullah Al Mamun', ' BSc. (Engg.) in CSE', 'Spring 17', '1997-01-01'),
('160103020079', 'Md. Zahirul Islam', ' BSc. (Engg.) in CSE', 'Spring 17', '1999-01-05'),
('160203020013', 'Mazid Mazidi', ' BSc. (Engg.) in CSE', 'Spring 17', '1998-01-02'),
('170103020055', 'Mirza Israt Jahan Khadiza', ' BSc. (Engg.) in CSE', 'Spring 19', '1998-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `summeries`
--

CREATE TABLE `summeries` (
  `id` int(11) NOT NULL,
  `privacy_policy` longtext DEFAULT NULL,
  `term_condition` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summeries`
--

INSERT INTO `summeries` (`id`, `privacy_policy`, `term_condition`, `status`) VALUES
(1, '<p>If the form was submitted, we retrieve the privacy policy text from the form data using the $_POST superglobal variable. We then sanitize the data using the mysqli_real_escape_string() function to prevent SQL injection attacks.</p><p>We then construct an SQL query to insert the privacy policy text into the \"summaries\" table, and use the mysqli_query() function to execute the query.</p><p>After inserting the data, we retrieve the ID of the newly inserted row using the mysqli_insert_id() function. We then redirect the user to a success page with the ID of the newly inserted row as a URL parameter.</p><p>Note that this is just a basic example and you should always validate and sanitize user input before storing it in a database to prevent security vulnerabilities.</p>', '<p>If the form was submitted, we retrieve the privacy policy text from the form data using the $_POST superglobal variable. We then sanitize the data using the mysqli_real_escape_string() function to prevent SQL injection attacks.</p><p>We then construct an SQL query to insert the privacy policy text into the \"summaries\" table, and use the mysqli_query() function to execute the query.</p><p>After inserting the data, we retrieve the ID of the newly inserted row using the mysqli_insert_id() function. We then redirect the user to a success page with the ID of the newly inserted row as a URL parameter.</p><p>Note that this is just a basic example and you should always validate and sanitize user input before storing it in a database to prevent security vulnerabilities.</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `avatar`, `star`, `name`, `designation`, `message`, `status`) VALUES
(1, 'uploads/testimonial/ok.png', 5, 'test', 'test', 'test', 1),
(2, 'uploads/testimonial/women.jpg', 4, 'test1', 'test', 'estt', 1),
(3, 'uploads/testimonial/163801-removebg-preview.png', 4, 'test2', 'tttt', 'ttete', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `last_blood_donate` date DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `interests` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `user_type` varchar(255) DEFAULT 'user',
  `img` text DEFAULT NULL,
  `active_status` varchar(255) DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `email`, `name`, `mobile`, `password`, `birthday`, `gender`, `last_blood_donate`, `blood_group`, `address`, `interests`, `skills`, `user_type`, `img`, `active_status`) VALUES
(1, 'joy@gmail.com', 'Joy', '1235', '$2y$10$nWWoIatsr68cUN8Zj3jw0uaZTd6LGYuKm8aOuQComdvMfazbOZLLq', '2023-09-21', 'Male', '2023-09-20', 'B+', 'dsgdfg', 'ML, DL, DS, CP', 'C, Java', 'user', NULL, 'offline'),
(4, 'talha@gmail.com', 'Talha Ahmed', '13213214', '$2y$10$ElOVhJ3hnx5Zu7k3QwE6HumQqWzOS4owpIhIEFd9BpiHB/9D27BcC', '2023-09-13', 'Male', '2023-09-27', 'A+', 'Taltola, Sylhet', 'Web Dev', 'React, Django', 'user', NULL, 'offline'),
(5, 'mitu@gmail.com', 'Mitu Paul', '123456789', '$2y$10$cmilmARfZiYagya3ITeyV.4U.jcMhjQDCS9qrC/8RsizfNVClU9RO', '1998-12-28', 'Male', '2023-10-02', 'A+', 'Sylhet, Os\r\nSylhet', 'ML, Coding, DL', 'HTML, CSS, PHP, JS', 'user', '396512382_1708945682933324_3365298834682639331_n.jpg', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `address`, `phone`, `email`, `role_id`, `employee_id`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, NULL, 'user', '', '', 'user@gmail.com', '3', NULL, NULL, '$2y$10$IBRgA3QqiOhPR.HC.VmgkedYK4O25j2.HSR3bLLgAajbEAY4VYume', '1', NULL, NULL, NULL),
(11, NULL, 'user1', '', '', 'user1@gmail.com', '3', NULL, NULL, '$2y$10$9h3ET3DK5UBpyfvLx/hJ6ujKLtx5zcFPsJXjoMp0p3JFqshbwGTBq', '1', NULL, NULL, NULL),
(12, NULL, 'manager1', '', '', 'manager@manager.com', '4', NULL, NULL, '$2y$10$Z8Fa2Xvu/pIdcwMHXoFlu.9wvo14qIjTaU0HQ6Q3Sd73qKyUZTNf.', '1', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_features`
--
ALTER TABLE `access_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_features_admin_id_index` (`admin_id`),
  ADD KEY `access_features_feature_index` (`feature_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`CampaignID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`ForumID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `newslatter`
--
ALTER TABLE `newslatter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`NoticeID`);

--
-- Indexes for table `photo_sliders`
--
ALTER TABLE `photo_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ProjectID`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`ReactID`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`ResultID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_infos`
--
ALTER TABLE `shop_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `summeries`
--
ALTER TABLE `summeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `access_features`
--
ALTER TABLE `access_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `CampaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `ForumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newslatter`
--
ALTER TABLE `newslatter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `NoticeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photo_sliders`
--
ALTER TABLE `photo_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `ReactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `ResultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shop_infos`
--
ALTER TABLE `shop_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `summeries`
--
ALTER TABLE `summeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
