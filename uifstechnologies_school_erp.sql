-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2024 at 05:36 AM
-- Server version: 8.0.37
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uifstechnologies_school_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `school_id` int DEFAULT NULL,
  `student_id` int NOT NULL DEFAULT '0',
  `staff_id` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `per_std_price` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `plan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_status` tinyint DEFAULT '0',
  `one_month_fix_price` float DEFAULT NULL,
  `six_month_fix_price` float DEFAULT NULL,
  `yearly_fix_price` float DEFAULT NULL,
  `total_no_of_school` int DEFAULT NULL,
  `total_no_of_student` int DEFAULT NULL,
  `fsd_start` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fsd_end` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `school_id`, `student_id`, `staff_id`, `created_by`, `name`, `type`, `email`, `password`, `mobile`, `status`, `per_std_price`, `total_price`, `plan`, `payment_type`, `plan_start_date`, `plan_end_date`, `plan_status`, `one_month_fix_price`, `six_month_fix_price`, `yearly_fix_price`, `total_no_of_school`, `total_no_of_student`, `fsd_start`, `fsd_end`, `created_at`, `updated_at`) VALUES
(1, 0, 0, NULL, 0, 'ERP-System', 'Super-Admin', 'superadmin@gmail.com', '$2y$10$3GLag0Qi9aLsyOq8NxdBM.0mu1BAQV7ryeLchBqtsiHVBhH8sS2/G', '9999999999', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 0, NULL, 1, 'Demo School Owner', 'Admin', 'schoolowner@gmail.com', '$2y$10$9uqK9E/3w5lDNG99Ecg1h.EA6VlOjnOYM9JROLjTr87mIxYYMlhoa', '1234567890', 1, 2, 96, '12', 'Yearly Subscription', '2023-07-01', '2024-07-01', 1, NULL, NULL, NULL, 6, 6, NULL, NULL, '2023-05-19 05:45:21', '2023-09-01 18:04:46'),
(3, 1, 0, NULL, 2, 'Demo  Public School', 'School-Admin', 'schooladmin@gmail.com', '$2y$10$U5X8plUb.OX8J3CT8Hf0YOuu71e7fVJr0VXT6U5n/d5/tLdhh2paK', '1234567898', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2023-05-01', '2023-05-30', '2023-05-19 05:53:15', '2023-06-19 04:13:51'),
(36, 3, 2, NULL, 3, 'Dummy Student', 'Student', 'student@gmail.com', '$2y$10$9OAxaggDhQFvh0opd9jsUOTwrnfljtQU8PbwCGEcX4XFLj8Olc1VG', '1234567809', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-08 06:57:43', '2023-06-08 06:57:43'),
(37, 3, 0, 1, 3, 'Dummy Teacher', 'Teacher', 'schoolteacher@gmail.com', '$2y$10$/eGzAevUt/./OPDZrmUQUOm/LbcLoLBQVhTC7/g1Wr88GKz5Fy1BG', '2345610789', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-08 23:14:11', '2023-06-08 23:14:11'),
(38, 3, 0, 2, 3, 'Dummy Teacher 2', 'Teacher', 'dummyteacher2@gmail.com', '$2y$10$2WiYPFZ5s1tL0uAy0xoWaOIQN11pHpjOqRaCLjCJEJvTs1dygpyGa', '8528528523', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-08 23:35:59', '2023-06-08 23:35:59'),
(39, 3, 3, NULL, 3, 'shivam', 'Student', 'student4@gmail.com', '$2y$10$WdciNw1x2xTJwvuDRHPSP.xJLpvd5xnd5whO98O5/3O3jDppkfCVu', '1231231235', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-12 01:23:21', '2023-06-13 03:40:03'),
(41, 3, 0, NULL, 2, 'Karmal School', 'School-Admin', 'karmalschool@gmail.com', '$2y$10$G6XvJSwZemHzwsjeQWC8ouqWOTb8cd6dbMriJ.xh6qjUh6xVKty9a', '9898765432', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-17 01:20:31', '2023-06-17 01:20:31'),
(42, 4, 0, NULL, 2, 'Vipol School', 'School-Admin', 'vipolschool@gmail.com', '$2y$10$PeA9NN5kHfjF18SZfk0W8O9y3d5QV4n9O2sC5o9OEU9FDZ16h689G', '6765456765', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-17 01:30:09', '2023-06-17 01:30:09'),
(43, 5, 0, NULL, 2, 'RLB School', 'School-Admin', 'rlbschool@gmail.com', '$2y$10$rO5K90qKiU9JkwwhQ7tYHOoXCHd9Y2UOHdKU3yE8VH1R1c4Ji8GSm', '6758967435', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-17 01:31:50', '2023-06-17 01:31:50'),
(44, 6, 0, NULL, 2, 'Dr.Bheem Rao School', 'School-Admin', 'drbheemschool@gmail.com', '$2y$10$4qlhM6OwyrsISODNh0bvWOy7JxbLfIMJVM7hkzUQL3u9WPXK0Lv2y', '6788934522', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-17 01:33:46', '2023-06-17 01:33:46'),
(45, 3, 4, NULL, 3, 'Komal', 'Student', 'komal@gmail.com', '$2y$10$7q7Rvz3fkJrOvhcNUMB6WORI/tmOcLcssNErU.hjlcjOOpW95bJ2y', '9878765434', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-19 04:07:41', '2023-06-19 04:07:41'),
(46, 3, 5, NULL, 3, 'Vipul', 'Student', 'vipul@gmail.com', '$2y$10$8QOdpk7kumPioDKrwN8xM.QcbGPgmwJqsmTzfytcIBFMUF/xKSjNm', '6756756754', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-19 04:13:51', '2023-06-19 04:13:51'),
(47, NULL, 0, NULL, 1, 'Vnn Inter College', 'Admin', 'vnnintercollege@gmail.com', '$2y$10$BP8ayh1viaroqcmc5EtYXeg5ewg.D/6uwV0ycfeKeCJYNhqkNIV/K', '8765678765', 1, 10, 10000, '1', 'Fix Payment Of One Month', '2023-07-01', '2023-08-01', 1, 10000, 500000, 70000000, NULL, NULL, NULL, NULL, '2023-07-01 04:14:21', '2023-07-01 04:17:50'),
(48, NULL, 0, NULL, 1, 'Jss School', 'Admin', 'Jsstech@gmail.com', '$2y$10$VMVUHsuY4yM73wVURJcNs.1w2EGMPEof/aaXgPaVRK0H071OUBtse', '8767876786', 1, 2, 5000, '6', 'Fix Payment Of Six Month', '2023-07-07', '2024-01-07', 1, 3000, 5000, 10000, 1, 3, NULL, NULL, '2023-07-07 06:40:50', '2023-07-08 04:37:38'),
(49, 7, 0, NULL, 48, 'jss1', 'School-Admin', 'jss1@gamil.com', '$2y$10$WDJAYGOi1p6A2FYdNg0eweVgFZf0fzfmgikoLtS42muwBlvTuvc4.', '7676543456', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2023-07-07 06:55:36', '2023-07-08 04:37:38'),
(50, 49, 6, NULL, 49, 'Kirti Rauniyar', 'Student', 'jgjgjhss1@gamil.com', '$2y$10$2ml/bmL52nk4tGtpBErWDugw1WTLRc5Hy73eQZEWKjJYfTOxYi8Yi', '7380593485', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 07:42:33', '2023-07-07 10:17:54'),
(51, 49, 7, NULL, 49, 'Neha', 'Student', 'jjjss1@gamil.com', '$2y$10$CHFyhugSTulFG3Shw2HKkucWH5CRJDamMBJ3Ypo1B.tr7iz3yJxJO', '9956830561', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 08:00:20', '2023-07-07 08:00:20'),
(52, 49, 0, 7, 49, 'Kirti Rauniyar', 'Teacher', 'jssddd1@gamil.com', '$2y$10$KipS8Hni45YGPLF1/8D5jeWpCCbnOSOmppDzIeypUZz612O8bnXQS', '8380593485', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 08:38:28', '2023-07-07 08:38:28'),
(53, 49, 8, NULL, 49, 'Nehasdfghjk', 'Student', 'jss1st@gamil.com', '$2y$10$h5xBU0x/e/HpCvFTIPbJ9u1e/sShUIc7IZHG8pdvQsbpzZqHwQ7uC', '8765432123', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-08 04:37:39', '2023-07-08 04:37:39'),
(54, 49, 0, 8, 49, 'Teacher-1', 'Teacher', 'jsstc@gamil.com', '$2y$10$y0Yo5vSqI70jqjTx75ttTe6.diRmcgGbeCiztSS3G30UF6ZtiOdRC', '7876567654', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-08 04:42:39', '2023-07-08 04:42:39'),
(56, NULL, 0, NULL, 1, 'Kirti Rauniyarfghjk', 'Admin', 'bit16cs51@bit.ac.in', '$2y$10$vCXkJKB7JpgUy4K6OO0HZOtHJEzHJ6C5qgLsSjZyGkQ5lte9UQzuu', '9380593485', 1, 2, 3000, '3', 'Fix Payment Of Three Month', '2023-09-01', '2023-12-01', 1, 3000, 500000, 70000000, NULL, NULL, NULL, NULL, '2023-07-11 12:10:04', '2023-09-01 16:50:30'),
(60, NULL, 0, NULL, 1, 'sss', 'Admin', 'usedefaultkirti@gmail.com', '$2y$10$J5pcB0VnSCb0eX6NiU79GezKokvbph7TQ/G0Le8ZykVta2Xl/0f..', '9870123458', 1, 33, 999, '12', 'Fix Payment Of  Yearly', '2023-09-01', '2024-09-01', 1, 3333, 333334, 999, NULL, NULL, NULL, NULL, '2023-07-11 12:26:56', '2023-09-01 17:17:05'),
(61, 8, 0, NULL, 2, 'Test', 'School-Admin', 'nothing@gmail.com', '$2y$10$frNs8KHEUvyK0PjmAWnY9uMhT9avaPJNzdMc7XDz88TxYogKGGEde', '9876543210', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2023-09-01 17:36:53', '2023-09-01 18:04:46'),
(62, 61, 9, NULL, 61, 'Nothing', 'Student', 'Nothing1@gmail.com', '$2y$10$Wl2h2UOaSkbAscgGrK1vI.W673fBG01PhWy0JV6GWWC0sdkfbVWWO', '9876543219', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-01 17:59:16', '2023-09-01 17:59:16'),
(63, 61, 10, NULL, 61, 'you', 'Student', 'you@gmail.com', '$2y$10$G6Lqtp0nKwq4Bb3FFftQzeHX11JhwTgcNSqLz3R70V0wo/B2wDCzG', '8765432345', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-01 18:04:46', '2023-09-01 18:04:46'),
(64, 61, 0, 9, 61, 'nothing', 'Teacher', 'nothing2@gmail.com', '$2y$10$7lhm8swO4F7c0dMt75HaXe68th/rudQWb9f36a4UKc01Q5zGBEagW', '9876543456', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-01 18:12:48', '2023-09-01 18:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `student_id` int NOT NULL COMMENT 'user_id=student_id',
  `roll` int DEFAULT NULL,
  `class_id` int NOT NULL,
  `stream` int DEFAULT NULL,
  `section` int NOT NULL,
  `year_id` int NOT NULL,
  `group_id` int DEFAULT NULL,
  `shift_id` int DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `admin_id`, `school_id`, `student_id`, `roll`, `class_id`, `stream`, `section`, `year_id`, `group_id`, `shift_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 2, NULL, 1, 4, 1, 2, NULL, NULL, 'This student Has Been Promoted-2023-07-01', '2023-06-08', '2023-07-01'),
(2, 2, 3, 3, NULL, 1, 4, 1, 2, NULL, NULL, 'This student Has Been Promoted-2023-07-01', '2023-06-12', '2023-07-01'),
(3, 2, 3, 4, NULL, 4, 4, 1, 2, NULL, NULL, NULL, '2023-06-19', '2023-06-19'),
(4, 2, 3, 5, NULL, 4, 4, 1, 2, NULL, NULL, NULL, '2023-06-19', '2023-06-19'),
(5, 48, 49, 6, NULL, 26, 8, 5, 7, NULL, NULL, 'This student Has Been Promoted-2023-07-07', '2023-07-07', '2023-07-07'),
(6, 48, 49, 7, NULL, 26, 8, 4, 10, NULL, NULL, NULL, '2023-07-07', '2023-07-07'),
(7, 48, 49, 8, NULL, 26, 8, 4, 7, NULL, NULL, 'This student Has Been Promoted-2023-07-08', '2023-07-08', '2023-07-08'),
(8, 2, 61, 9, NULL, 29, 12, 6, 12, NULL, NULL, 'This student Has Been Promoted-2023-09-01', '2023-09-01', '2023-09-01'),
(9, 2, 61, 10, NULL, 29, 12, 6, 12, NULL, NULL, 'This student Has Been Promoted-2023-09-01', '2023-09-01', '2023-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `admin_id`, `school_id`, `class_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, 2, '2023-06-08 06:47:24', '2023-06-08 06:47:24'),
(2, 2, 3, 1, 8, '2023-06-08 06:47:24', '2023-06-08 06:47:24'),
(3, 2, 3, 1, 30, '2023-06-08 06:47:24', '2023-06-08 06:47:24'),
(4, 2, 3, 1, 38, '2023-06-08 06:47:24', '2023-06-08 06:47:24'),
(5, 2, 3, 1, 150, '2023-06-08 06:47:24', '2023-06-08 06:47:24'),
(6, 2, 3, 1, 38, '2023-06-08 06:47:24', '2023-06-08 06:47:24'),
(7, 2, 3, 2, 2, '2023-06-08 06:48:00', '2023-06-08 06:48:00'),
(8, 2, 3, 2, 8, '2023-06-08 06:48:00', '2023-06-08 06:48:00'),
(9, 2, 3, 2, 30, '2023-06-08 06:48:00', '2023-06-08 06:48:00'),
(10, 2, 3, 2, 38, '2023-06-08 06:48:00', '2023-06-08 06:48:00'),
(11, 2, 3, 2, 150, '2023-06-08 06:48:00', '2023-06-08 06:48:00'),
(12, 2, 3, 10, 3, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(13, 2, 3, 10, 2, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(14, 2, 3, 10, 109, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(15, 2, 3, 10, 120, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(16, 2, 3, 10, 43, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(17, 2, 3, 10, 8, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(18, 2, 3, 10, 145, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(19, 2, 3, 10, 150, '2023-06-08 06:49:44', '2023-06-08 06:49:44'),
(20, 48, 49, 26, 227, '2023-07-07 08:29:26', '2023-07-07 08:29:26'),
(21, 48, 49, 25, 227, '2023-07-08 04:44:00', '2023-07-08 04:44:00'),
(22, 2, 61, 29, 228, '2023-09-01 17:39:00', '2023-09-01 17:39:00'),
(23, 2, 61, 29, 228, '2023-09-01 17:50:32', '2023-09-01 17:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `assign_techer_subjects`
--

CREATE TABLE `assign_techer_subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `teacher_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `year_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_techer_subjects`
--

INSERT INTO `assign_techer_subjects` (`id`, `teacher_id`, `admin_id`, `school_id`, `class_id`, `subject_id`, `year_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 1, 2, 2, '2023-06-08 23:33:43', '2023-06-08 23:33:43'),
(2, 1, 2, 3, 2, 2, 2, '2023-06-08 23:33:43', '2023-06-08 23:33:43'),
(3, 2, 2, 3, 1, 8, 2, '2023-06-08 23:36:40', '2023-06-08 23:36:40'),
(4, 2, 2, 3, 1, 38, 2, '2023-06-08 23:36:40', '2023-06-08 23:36:40'),
(5, 1, 2, 3, 1, 38, 2, '2023-06-15 02:35:59', '2023-06-15 02:35:59'),
(7, 1, 2, 3, 1, 38, 2, '2023-07-01 01:39:35', '2023-07-01 01:39:35'),
(8, 7, 48, 49, 26, 227, 7, '2023-07-07 09:42:23', '2023-07-07 09:42:23'),
(9, 8, 48, 49, 25, 227, 7, '2023-07-08 04:44:22', '2023-07-08 04:44:22'),
(10, 9, 2, 61, 29, 228, 12, '2023-09-01 18:17:58', '2023-09-01 18:17:58'),
(11, 9, 2, 61, 29, 228, 12, '2023-09-01 18:19:29', '2023-09-01 18:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `class_configers`
--

CREATE TABLE `class_configers` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `class_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_configers`
--

INSERT INTO `class_configers` (`id`, `admin_id`, `school_id`, `class_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '1st', 1, '2023-05-16 04:40:15', '2023-09-01 17:09:41'),
(2, 2, 3, '2nd', 1, '2023-05-16 04:40:35', '2023-05-24 00:22:20'),
(4, 2, 3, '3rd', 1, '2023-05-24 00:22:24', '2023-05-24 00:22:24'),
(5, 2, 3, '4th', 1, '2023-05-24 00:22:28', '2023-05-24 00:22:28'),
(6, 2, 3, '5th', 1, '2023-05-24 00:22:32', '2023-05-24 00:22:32'),
(7, 2, 3, '6th', 1, '2023-05-24 00:22:37', '2023-05-24 00:22:37'),
(8, 2, 3, '7th', 1, '2023-05-24 00:22:41', '2023-05-24 00:22:41'),
(9, 2, 3, '8th', 1, '2023-05-24 00:22:45', '2023-05-24 00:22:45'),
(10, 2, 3, '9th', 1, '2023-05-24 00:22:56', '2023-05-26 01:23:04'),
(12, 2, 3, '10th', 1, '2023-05-24 00:27:12', '2023-05-26 01:23:12'),
(14, 2, 3, '11th', 1, '2023-05-24 00:27:38', '2023-05-26 01:23:17'),
(17, 2, 3, '12th', 1, '2023-05-24 00:29:00', '2023-05-26 01:23:37'),
(25, 48, 49, '1st', 1, '2023-07-07 06:57:26', '2023-07-07 06:57:26'),
(26, 48, 49, '2nd', 1, '2023-07-07 06:58:14', '2023-07-07 06:58:14'),
(27, 48, 49, '12th', 1, '2023-07-07 06:59:42', '2023-07-07 06:59:42'),
(29, 2, 61, 'test 12', 1, '2023-09-01 17:38:09', '2023-09-01 17:38:09'),
(30, 2, 61, 'test 13', 1, '2023-09-01 18:06:17', '2023-09-01 18:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `decide_class_periods`
--

CREATE TABLE `decide_class_periods` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `year_id` int NOT NULL,
  `week_days` int NOT NULL,
  `class_id` int NOT NULL,
  `stream_id` int DEFAULT NULL,
  `Section_id` int DEFAULT NULL,
  `room_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `class_start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `decide_class_periods`
--

INSERT INTO `decide_class_periods` (`id`, `admin_id`, `school_id`, `year_id`, `week_days`, `class_id`, `stream_id`, `Section_id`, `room_no`, `class_period`, `teacher_id`, `subject_id`, `class_start_time`, `class_end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 2, 1, 1, 4, 1, '101', 'Period-1', 2, 2, '08:00', '09:00', 1, '2023-06-09 03:40:09', '2023-06-10 02:57:49'),
(2, 2, 3, 2, 1, 1, 4, 1, '101', 'Period-2', 1, 8, '09:01', '10:02', 1, '2023-06-09 03:42:26', '2023-06-10 02:57:49'),
(3, 2, 3, 2, 1, 1, 4, 1, '101', 'Period-3', 2, 30, '10:00', '11:00', 1, '2023-06-09 03:42:26', '2023-06-10 02:57:49'),
(4, 2, 3, 2, 1, 2, 4, 1, '102', 'Period-1', 1, 2, '08:00', '09:00', 1, '2023-06-09 03:45:56', '2023-06-09 03:45:56'),
(6, 2, 3, 2, 2, 1, 4, 1, '101', 'Period-1', 1, 2, '10:41', '11:41', 1, '2023-06-09 23:42:27', '2023-06-10 02:57:49'),
(7, 2, 3, 2, 2, 1, 4, 1, '101', 'Period-2', 2, 8, '11:43', '12:42', 1, '2023-06-09 23:42:27', '2023-06-10 02:57:49'),
(9, 2, 3, 2, 3, 1, 4, 1, '101', 'Period-1', 1, 38, '01:01', '02:01', 1, '2023-06-12 01:01:41', '2023-06-12 01:01:41'),
(10, 2, 3, 2, 3, 1, 4, 1, '101', 'Period-2', 1, 8, '02:01', '03:01', 1, '2023-06-12 01:01:41', '2023-06-12 01:01:41'),
(11, 2, 3, 2, 1, 1, 4, 2, '102', 'Period-1', 2, 2, '17:56', '18:57', 1, '2023-06-12 06:57:00', '2023-06-12 06:57:00'),
(12, 2, 3, 2, 4, 1, 4, 1, '101', 'Period-4', 1, 2, '17:58', '19:59', 1, '2023-06-12 06:58:32', '2023-06-12 06:58:32'),
(13, 48, 49, 7, 1, 26, 9, 5, '101', 'Period-1', 7, 227, '16:14', '15:16', 1, '2023-07-07 09:44:26', '2023-07-07 09:45:14'),
(14, 48, 49, 7, 1, 25, 8, 4, '101', 'Period-4', 8, 227, '10:17', '10:17', 1, '2023-07-08 04:46:42', '2023-07-08 04:46:42'),
(15, 2, 61, 12, 1, 29, 12, 6, '1', 'Period-1', 9, 228, '23:53', '12:53', 1, '2023-09-01 18:23:47', '2023-09-01 18:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `date` date NOT NULL,
  `attend_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `admin_id`, `school_id`, `staff_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 1, '2023-06-09', 'Present', '2023-06-08 23:37:44', '2023-06-08 23:37:44'),
(2, 2, 3, 2, '2023-06-09', 'Leave', '2023-06-08 23:37:44', '2023-06-08 23:37:44'),
(3, 2, 3, 1, '2023-07-01', 'Present', '2023-07-01 00:33:44', '2023-07-01 00:33:44'),
(4, 2, 3, 2, '2023-07-01', 'Leave', '2023-07-01 00:33:44', '2023-07-01 00:33:44'),
(5, 2, 3, 1, '2023-07-02', 'Leave', '2023-07-01 03:36:42', '2023-07-01 03:36:42'),
(6, 2, 3, 2, '2023-07-02', 'Present', '2023-07-01 03:36:42', '2023-07-01 03:36:42'),
(7, 2, 3, 1, '2023-07-03', 'Absent', '2023-07-01 03:36:59', '2023-07-01 03:36:59'),
(8, 2, 3, 2, '2023-07-03', 'Present', '2023-07-01 03:36:59', '2023-07-01 03:36:59'),
(9, 48, 49, 7, '2023-07-07', 'Present', '2023-07-07 09:42:41', '2023-07-07 09:42:41'),
(10, 48, 49, 7, '2023-07-08', 'Leave', '2023-07-08 04:44:43', '2023-07-08 04:44:43'),
(11, 48, 49, 8, '2023-07-08', 'Present', '2023-07-08 04:44:43', '2023-07-08 04:44:43'),
(12, 2, 61, 9, '2023-09-01', 'Present', '2023-09-01 18:19:57', '2023-09-01 18:19:57'),
(13, 2, 61, 9, '2023-09-02', 'Present', '2023-09-01 18:21:09', '2023-09-01 18:21:09'),
(14, 2, 61, 9, '2023-09-03', 'Leave', '2023-09-01 18:21:17', '2023-09-01 18:21:17'),
(15, 2, 61, 9, '2023-09-04', 'Absent', '2023-09-01 18:21:25', '2023-09-01 18:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_percantage_st` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `admin_id`, `school_id`, `name`, `passing_percantage_st`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Semester-I', '33', '2023-05-30 05:01:55', '2023-06-15 05:44:52'),
(2, 2, 3, 'Semester-II', '33', '2023-05-30 05:02:43', '2023-05-30 05:02:43'),
(3, 2, 3, 'Semester-III', '33', '2023-05-30 05:02:54', '2023-05-30 05:02:54'),
(6, 48, 49, 'exam-1', '60', '2023-07-07 08:20:29', '2023-07-07 08:20:29'),
(7, 2, 61, 'Nothing', '60', '2023-09-01 17:39:43', '2023-09-01 17:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint UNSIGNED NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_fee` float NOT NULL,
  `fee_date` date NOT NULL,
  `class_id` int NOT NULL,
  `stream_id` int DEFAULT NULL,
  `section` int DEFAULT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `month`, `class_fee`, `fee_date`, `class_id`, `stream_id`, `section`, `admin_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, '1', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(2, '2', 500, '2023-06-15', 1, NULL, NULL, 2, 3, NULL, NULL),
(3, '3', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(4, '4', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(5, '5', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(6, '6', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(7, '7', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(8, '8', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(9, '9', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(10, '10', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(11, '11', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(12, '12', 500, '2023-06-10', 1, NULL, NULL, 2, 3, NULL, NULL),
(13, '1', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(14, '2', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(15, '3', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(16, '4', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(17, '5', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(18, '6', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(19, '7', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(20, '8', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(21, '9', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(22, '10', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(23, '11', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(24, '12', 600, '2023-06-10', 2, NULL, NULL, 2, 3, NULL, NULL),
(25, '1', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(26, '2', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(27, '3', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(28, '4', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(29, '5', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(30, '6', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(31, '7', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(32, '8', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(33, '9', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(34, '10', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(35, '11', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(36, '12', 2000, '2023-06-10', 10, NULL, NULL, 2, 3, NULL, NULL),
(37, '1', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(38, '2', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(39, '3', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(40, '4', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(41, '5', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(42, '6', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(43, '7', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(44, '8', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(45, '9', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(46, '10', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(47, '11', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(48, '12', 500, '2023-07-07', 27, NULL, NULL, 48, 49, NULL, NULL),
(49, '1', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(50, '2', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(51, '3', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(52, '4', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(53, '5', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(54, '6', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(55, '7', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(56, '8', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(57, '9', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(58, '10', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(59, '11', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(60, '12', 444, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(61, '1', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(62, '2', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(63, '3', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(64, '4', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(65, '5', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(66, '6', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(67, '7', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(68, '8', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(69, '9', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(70, '10', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(71, '11', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(72, '12', 44, '2023-07-07', 25, NULL, NULL, 48, 49, NULL, NULL),
(73, '1', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(74, '2', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(75, '3', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(76, '4', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(77, '5', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(78, '6', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(79, '7', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(80, '8', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(81, '9', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(82, '10', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(83, '11', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(84, '12', 500, '2023-07-07', 26, NULL, NULL, 48, 49, NULL, NULL),
(85, '9', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(86, '10', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(87, '11', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(88, '12', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(89, '1', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(90, '2', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(91, '3', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(92, '4', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(93, '5', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(94, '6', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(95, '7', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(96, '8', 12000, '2023-09-01', 29, 0, 0, 2, 61, NULL, NULL),
(97, '9', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(98, '10', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(99, '11', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(100, '12', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(101, '1', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(102, '2', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(103, '3', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(104, '4', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(105, '5', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(106, '6', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(107, '7', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL),
(108, '8', 100, '2023-09-01', 29, 12, 6, 2, 61, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint UNSIGNED NOT NULL,
  `fee_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_name`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Monthly-Fee', 1, 400, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `generate_certificates`
--

CREATE TABLE `generate_certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `year_id` int NOT NULL,
  `certificate_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generate_certificates`
--

INSERT INTO `generate_certificates` (`id`, `admin_id`, `school_id`, `year_id`, `certificate_name`, `part_name`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 2, 'online Quiz', 'Dummy Student', 'Kindly participate in the quiz. Successful candidates will get online certificate. Kindly instruct all your students to attempt the quizs', '2023-06-16 05:44:23', '2023-06-16 06:10:36'),
(2, 2, 3, 2, 'online Quiz Math Competition', 'Sonu Yadav', 'A completion certificate contains all the details about the building, including the location, identification of the land, details about the developer/owner, the height of the building and the quality of materials used.25-Jan-2023', '2023-06-16 23:44:52', '2023-06-16 23:44:52'),
(3, 2, 61, 12, 'nothing', 'nothing', 'nothing nothing n nothing nothingothing nothing nothing', '2023-09-01 18:26:25', '2023-09-01 18:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` int NOT NULL,
  `student_id` int NOT NULL DEFAULT '0',
  `staff_id` int NOT NULL DEFAULT '0',
  `class_id` int DEFAULT NULL,
  `stream_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `leave_start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `admin_id`, `school_id`, `type`, `year_id`, `student_id`, `staff_id`, `class_id`, `stream_id`, `section_id`, `leave_start_date`, `leave_end_date`, `leave_region`, `leave_status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Student', 2, 2, 0, 1, 4, 1, '2023-06-09', '2023-06-30', 'Unpaid leave is given at the request of the employee or due to some misconduct from the employee. It can be for some employee-requested reasons, like active duty call-ups for reserve military personnel, or to attend health checkups/appointments of the employee/family member.', 'Approved', '2023-06-16 00:09:10', '2023-06-16 01:45:50'),
(2, 2, 3, 'Teacher', 0, 0, 1, NULL, NULL, NULL, '2023-06-16', '2023-06-16', 'Seek leave', 'Approved', '2023-06-16 00:23:50', '2023-06-16 00:54:52'),
(3, 2, 3, 'Teacher', 0, 0, 1, NULL, NULL, NULL, '2023-06-16', '2023-06-19', 'visit leave', 'Cancel', '2023-06-16 00:26:30', '2023-06-16 00:55:02'),
(4, 2, 3, 'Student', 2, 2, 0, 1, 4, 1, '2023-06-16', '2023-07-04', 'I, Dummy Student, student of Class 1 A, am writing this application to inform you that I need to go to Delhi to attend a family function. Thus, I will not be able to attend school from  16 June to 4 July 2022. I, therefore, request you to kindly grant me 7 days’ leave for attending the family function. I shall be very thankful to you.', 'Cancel', '2023-06-16 02:27:59', '2023-06-16 03:14:43'),
(7, 2, 3, 'Teacher', 0, 0, 1, NULL, NULL, NULL, '2023-06-16', '2023-06-16', 'Seek Leave for one day ,kindly approve  this', 'Approved', '2023-06-16 03:04:34', '2023-06-16 03:09:05'),
(9, 48, 49, 'Teacher', 0, 0, 7, NULL, NULL, NULL, '2023-07-07', '2023-07-07', 'h', 'Approved', '2023-07-07 10:13:06', '2023-07-07 10:16:34'),
(10, 48, 49, 'Student', 7, 6, 0, 26, 8, 5, '2023-07-08', '2023-07-13', 'j                                                                            \r\n                                                 j', 'Requested', '2023-07-07 10:22:50', '2023-07-07 10:22:50'),
(11, 2, 61, 'Student', 12, 9, 0, 29, 12, 6, '2023-09-03', '2023-09-03', 'nothing', 'Approved', '2023-09-01 18:41:01', '2023-09-01 18:43:27'),
(12, 2, 61, 'Student', 12, 9, 0, 29, 12, 6, '2023-09-04', '2023-09-04', 'nothing', 'Cancel', '2023-09-01 18:41:24', '2023-09-01 18:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_01_063057_create_admins_table', 1),
(15, '2023_05_15_083830_create_school_registations_table', 2),
(16, '2023_05_16_080233_create_class_configers_table', 3),
(17, '2023_05_16_093022_create_streams_table', 4),
(18, '2023_05_16_093055_create_sections_table', 4),
(19, '2023_05_17_050312_create_students_table', 5),
(20, '2023_05_20_100000_create_subscription_plan_histroys_table', 6),
(21, '2023_05_22_093411_create_update_f_s_d_s_table', 7),
(22, '2023_05_23_051201_create_subjects_table', 8),
(23, '2023_05_23_071141_create_fees_table', 9),
(24, '2023_05_24_081021_create_staff_table', 10),
(25, '2023_05_25_062059_create_salary_congigurations_table', 11),
(26, '2023_05_25_092413_create_monthwise_salaries_table', 12),
(27, '2023_05_26_055654_create_assign_subjects_table', 13),
(28, '2023_05_26_111202_create_assign_techer_subjects_table', 14),
(29, '2023_05_27_051340_create_employee_attendances_table', 15),
(31, '2023_05_27_105438_create_student_attendances_table', 16),
(32, '2023_05_29_093200_create_exams_table', 17),
(33, '2023_05_29_094808_create_student_years_table', 17),
(34, '2023_05_29_121737_create_exam_types_table', 18),
(35, '2023_05_29_123426_create_student_marks_table', 19),
(36, '2023_05_29_124953_create_assign_students_table', 20),
(37, '2023_06_07_044931_create_units_table', 21),
(38, '2023_06_07_083657_create_upload_contents_table', 22),
(39, '2023_06_09_055404_create_week_days_table', 23),
(40, '2023_06_09_061723_create_decide_class_periods_table', 24),
(41, '2023_06_12_081444_create_student_more_details_table', 25),
(42, '2023_06_13_065139_create_fee_category_amounts_table', 26),
(43, '2023_06_13_102002_create_student_fees_table', 27),
(44, '2023_06_16_044749_create_leaves_table', 28),
(45, '2023_06_16_103648_create_generate_certificates_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint UNSIGNED NOT NULL,
  `month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`, `created_at`, `updated_at`) VALUES
(1, 'Januaray', NULL, NULL),
(2, 'Feburary', NULL, NULL),
(3, 'March', NULL, NULL),
(4, 'April', NULL, NULL),
(5, 'May', NULL, NULL),
(6, 'June', NULL, NULL),
(7, 'July', NULL, NULL),
(8, 'August', NULL, NULL),
(9, 'September', NULL, NULL),
(10, 'October', NULL, NULL),
(11, 'November', NULL, NULL),
(12, 'December', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monthwise_salaries`
--

CREATE TABLE `monthwise_salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `salaray_slip_no` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `staff_member_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` float NOT NULL,
  `medical_allowance` float NOT NULL DEFAULT '0',
  `providant_fund` float NOT NULL DEFAULT '0',
  `employee_tax` float NOT NULL DEFAULT '0',
  `bonus` float NOT NULL DEFAULT '0',
  `transportation_allow` float NOT NULL DEFAULT '0',
  `total` float NOT NULL,
  `total_dedunction` float NOT NULL,
  `total_paid` float NOT NULL,
  `fsd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthwise_salaries`
--

INSERT INTO `monthwise_salaries` (`id`, `salaray_slip_no`, `admin_id`, `school_id`, `staff_id`, `staff_member_id`, `staff_type`, `salary_month`, `salary`, `medical_allowance`, `providant_fund`, `employee_tax`, `bonus`, `transportation_allow`, `total`, `total_dedunction`, `total_paid`, `fsd`, `created_at`, `updated_at`) VALUES
(1, 'S-SLIP-2023-1', 2, 3, 1, 'ST2023-1', 'Teacher', 'July', 15000, 0, 2000, 280, 0, 0, 15000, 2280, 12720, '2023-05-01', '2023-06-08 23:15:22', '2023-06-08 23:15:22'),
(2, 'S-SLIP-2023-2', 2, 3, 1, 'ST2023-1', 'Teacher', 'Feburary', 15000, 0, 2000, 280, 0, 0, 15000, 2280, 12720, '2023-05-01', '2023-06-19 02:09:54', '2023-06-19 02:09:54'),
(3, 'S-SLIP-2023-3', 2, 3, 1, 'ST2023-1', 'Teacher', 'June', 15000, 0, 2000, 280, 0, 0, 15000, 2280, 12720, '2023-05-01', '2023-06-19 02:10:04', '2023-06-19 02:10:04'),
(4, 'S-SLIP-2023-4', 2, 3, 2, 'ST2023-2', 'Teacher', 'June', 6000, 0, 1000, 120, 5000, 0, 11000, 1120, 9880, '2023-05-01', '2023-07-01 00:12:07', '2023-07-01 00:12:07'),
(5, 'S-SLIP-2023-5', 48, 49, 7, 'ST2023-3', 'Teacher', 'Januaray', 44, 444, 1, 6, 10, 0, 498, 7, 491, '', '2023-07-07 09:41:05', '2023-07-07 09:41:05'),
(6, 'S-SLIP-2023-6', 48, 49, 7, 'ST2023-3', 'Teacher', 'March', 44, 444, 1, 6, 10, 0, 498, 7, 491, '', '2023-07-07 09:41:15', '2023-07-07 09:41:15'),
(7, 'S-SLIP-2023-7', 48, 49, 8, 'ST2023-8', 'Teacher', 'Januaray', 500, 0, 44, 0, 0, 0, 500, 44, 456, '', '2023-07-08 04:43:19', '2023-07-08 04:43:19'),
(8, 'S-SLIP-2023-8', 2, 3, 1, 'ST2023-1', 'Teacher', 'August', 15000, 0, 2000, 280, 0, 0, 15000, 2280, 12720, '', '2023-08-24 07:03:01', '2023-08-24 07:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_congigurations`
--

CREATE TABLE `salary_congigurations` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `staff_member_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double(8,2) NOT NULL,
  `medical_allowance` double(8,2) DEFAULT NULL,
  `providant_fund` double(8,2) DEFAULT NULL,
  `employee_tax` double(8,2) DEFAULT NULL,
  `bonus` double(8,2) DEFAULT NULL,
  `transportation_allow` double(8,2) DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `total_dedunction` double(8,2) NOT NULL,
  `total_paid` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_congigurations`
--

INSERT INTO `salary_congigurations` (`id`, `admin_id`, `school_id`, `staff_id`, `staff_member_id`, `staff_type`, `salary`, `medical_allowance`, `providant_fund`, `employee_tax`, `bonus`, `transportation_allow`, `total`, `total_dedunction`, `total_paid`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'ST2023-1', 'Teacher', 15000.00, 0.00, 2000.00, 280.00, 0.00, 0.00, 15000.00, 2280.00, 12720.00, '2023-06-08 23:15:09', '2023-06-08 23:15:09'),
(2, 2, 1, 2, 'ST2023-2', 'Teacher', 6000.00, 0.00, 1000.00, 120.00, 5000.00, 0.00, 11000.00, 1120.00, 9880.00, '2023-07-01 00:11:56', '2023-07-01 00:11:56'),
(3, 48, 7, 7, 'ST2023-3', 'Teacher', 44.00, 444.00, 1.00, 6.00, 10.00, 0.00, 498.00, 7.00, 491.00, '2023-07-07 08:40:13', '2023-07-07 08:40:13'),
(4, 48, 7, 8, 'ST2023-8', 'Teacher', 500.00, 0.00, 44.00, 0.00, 0.00, 0.00, 500.00, 44.00, 456.00, '2023-07-08 04:43:14', '2023-07-08 04:43:14'),
(5, 2, 8, 9, 'ST2023-9', 'Teacher', 10000.00, 0.00, NULL, 0.00, 1.00, 0.00, 10001.00, 0.00, 10001.00, '2023-09-01 18:16:13', '2023-09-01 18:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `school_registations`
--

CREATE TABLE `school_registations` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fsd_start` date NOT NULL,
  `fsd_end` date NOT NULL,
  `principal_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `logo_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_registations`
--

INSERT INTO `school_registations` (`id`, `admin_id`, `school_name`, `fsd_start`, `fsd_end`, `principal_name`, `mobile_no`, `email`, `password`, `status`, `logo_image`, `school_address`, `created_at`, `updated_at`) VALUES
(1, 2, 'Demo  Public School', '2023-05-01', '2023-05-30', 'Demo Principal', '1234567898', 'schooladmin@gmail.com', '$2y$10$/n5Yw2oprf3lL/QTt6MMM.HvGYyTNgLfw81Aej8s2Xa.PI6hRcBvO', 1, '62552.png', 'Azad nagr ward no 78 , luknow city up', '2023-05-19 05:53:15', '2023-05-22 05:30:31'),
(3, 2, 'Karmal School', '2023-06-17', '2023-06-15', 'Priya', '9898765432', 'karmalschool@gmail.com', '$2y$10$6qvSK0QZDqSmKD75CdyzDOafN4fj1.74QK.kzZYRyuPgS7XMUesUS', 1, '29440.png', 'karmal lucknow ,near to chinhat, 233098,up', '2023-06-17 01:20:31', '2023-06-17 01:20:31'),
(4, 2, 'Vipol School', '2023-06-17', '2024-10-17', 'Vipol Kumar', '6765456765', 'vipolschool@gmail.com', '$2y$10$d1ruL8ZIKldlxa2O5JJI8uoZB5Qex.3JugKHTYtH896Hg/8kYSgLS', 1, '73784.jpg', 'vipol school , kanpur raod , 345677', '2023-06-17 01:30:09', '2023-06-17 01:30:09'),
(5, 2, 'RLB School', '2023-06-17', '2024-02-20', 'Rani Meera Sahi', '6758967435', 'rlbschool@gmail.com', '$2y$10$nWg2MkEyN/UyCWphRUSoTeTWL86sgxuOKKc34Ux2mkyKX6UZyaK1S', 1, '75679.png', 'RLB shcool Licknow , 897654', '2023-06-17 01:31:50', '2023-06-17 01:31:50'),
(6, 2, 'Dr.Bheem Rao School', '2023-06-17', '2023-06-14', 'Bheem Dube', '6788934522', 'drbheemschool@gmail.com', '$2y$10$TG.WDXA3ucmORJr8BGs0velGKmaOA4hK7eyuuRb2SPmaeeXXDeYMe', 1, '24037.png', 'Dr. bheem rao shcool pune , 787654', '2023-06-17 01:33:46', '2023-06-17 01:33:46'),
(7, 48, 'jss1', '2023-07-07', '2024-04-07', 'jss principal', '7676543456', 'jss1@gamil.com', '$2y$10$JE33o7gyHnFzidLbE0nAjuI6mcB/P2Co8P/4XxE1d0fRTbTw/XikK', 1, '78713.jpg', 'jss1 , lucknow ,23456', '2023-07-07 06:55:36', '2023-07-07 06:55:36'),
(8, 2, 'Test', '2023-09-01', '2024-01-01', 'Nothing', '9876543210', 'nothing@gmail.com', '$2y$10$ortwWXLQb0cb5QAFxAE6leOGNA.adYYOlZeeZpd/i1tJMaGR7Gk2u', 1, '29039.png', 'nothing address on this school', '2023-09-01 17:36:53', '2023-09-01 17:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `section_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `admin_id`, `school_id`, `section_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'A', 1, '2023-06-08 06:44:57', '2023-06-08 06:44:57'),
(2, 2, 3, 'B', 1, '2023-06-08 06:45:06', '2023-06-08 06:45:06'),
(3, 2, 3, 'C', 1, '2023-06-12 00:19:32', '2023-06-12 00:19:32'),
(4, 48, 49, 'A', 1, '2023-07-07 06:57:41', '2023-07-07 06:57:41'),
(5, 48, 49, 'B', 1, '2023-07-07 06:57:56', '2023-07-07 06:57:56'),
(6, 2, 61, 'nothing', 1, '2023-09-01 17:43:37', '2023-09-01 17:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `staff_member_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int NOT NULL,
  `year_id` int NOT NULL DEFAULT '0',
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_pincode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_joining_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_hold_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `configure_salary_status` tinyint NOT NULL DEFAULT '0',
  `salary_paid_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Paid',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `medical_allowance` float DEFAULT '0',
  `salary` float DEFAULT '0',
  `providant_fund` float DEFAULT '0',
  `employee_tax` float DEFAULT '0',
  `transportation_allow` float DEFAULT '0',
  `bonus` float DEFAULT '0',
  `total` float DEFAULT '0',
  `total_dedunction` float DEFAULT '0',
  `total_paid` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `admin_id`, `staff_member_id`, `school_id`, `year_id`, `reg_no`, `staff_type`, `email`, `name`, `mobile`, `e_dob`, `e_gender`, `complete_address`, `e_pincode`, `e_joining_date`, `e_image`, `experience`, `aadhar`, `account_no`, `acc_hold_name`, `ifsc_code`, `bank_name`, `configure_salary_status`, `salary_paid_status`, `status`, `created_at`, `updated_at`, `medical_allowance`, `salary`, `providant_fund`, `employee_tax`, `transportation_allow`, `bonus`, `total`, `total_dedunction`, `total_paid`) VALUES
(1, 2, 'ST2023-1', 3, 2, 'REGID2023-1', 'Teacher', 'schoolteacher@gmail.com', 'Dummy Teacher', '2345610789', '2023-06-09', 'Male', 'Vidhayk chwraha ,chinhat Lucknow', '226028', '2023-06-01', '32682.png', '2', '20230609044411.pdf', '46575575', 'Dummy Teacher', 'PUNB000002909', 'SBI', 1, 'August', 1, '2023-06-08 23:14:11', '2023-08-24 07:03:01', 0, 15000, 2000, 280, 0, 0, 15000, 2280, 12720),
(2, 2, 'ST2023-2', 3, 2, 'REGID2023-2', 'Teacher', 'dummyteacher2@gmail.com', 'Dummy Teacher 2', '8528528523', '2023-06-09', 'Male', 'A16 Dayal estate matiyari chinhat near to reliance petrol pump', '226028', '2023-06-01', '63791.png', '3', '20230609050558.pdf', '46575575', 'Dummy Teacher2', 'PUNB000002909', 'पंजाब नेशन बैंक', 1, 'June', 1, '2023-06-08 23:35:58', '2023-07-01 00:12:07', 0, 6000, 1000, 120, 0, 5000, 11000, 1120, 9880),
(7, 48, 'ST2023-3', 49, 7, 'REGID2023-3', 'Teacher', 'jssddd1@gamil.com', 'Kirti Rauniyar', '8380593485', '2023-07-07', 'Male', 'A16 Dayal estate matiyari chinhat near to reliance petrol pump', '226028', '2023-07-07', '99314.png', '3', '20230707083828.pdf', '46575575', 'Teacher name', 'PUNB000002909', 'पंजाब नेशन बैंक', 1, 'March', 1, '2023-07-07 08:38:28', '2023-07-07 09:42:23', 444, 44, 1, 6, 0, 10, 498, 7, 491),
(8, 48, 'ST2023-8', 49, 7, 'REGID2023-8', 'Teacher', 'jsstc@gamil.com', 'Teacher-1', '7876567654', '2023-07-08', 'Female', 'AZAD NAGAR WADR NO 11 CHWRAHA ROAD NAGAR PALIKA PARISHAD MAH\r\nStreet of In front of aadarsh coaching center', '273303', '2023-07-08', '61921.png', '3', '20230708044239.pdf', '46575575', 'Saloni Shrama', 'PUNB000002909', 'पंजाब नेशन बैंक', 1, 'Januaray', 1, '2023-07-08 04:42:39', '2023-07-08 04:44:22', 0, 500, 44, 0, 0, 0, 500, 44, 456),
(9, 2, 'ST2023-9', 61, 12, 'REGID2023-9', 'Teacher', 'nothing2@gmail.com', 'nothing', '9876543456', '2023-09-01', 'Male', 'nothing', '876543', '2023-09-01', '79157.jpg', '3', '20230901181248.pdf', '98765432134', 'nothing', 'nothing', 'nothing', 1, 'Feburary', 1, '2023-09-01 18:12:48', '2023-09-01 18:17:59', 0, 10000, NULL, 0, 0, 1, 10001, 0, 10001);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `stream_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `admin_id`, `school_id`, `stream_name`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 3, 'None', 1, '2023-05-31 03:11:17', '2023-05-31 03:11:17'),
(5, 2, 3, 'Science Student', 1, '2023-05-31 03:11:51', '2023-05-31 03:11:51'),
(6, 2, 3, 'Art Student', 1, '2023-05-31 03:12:04', '2023-05-31 03:12:04'),
(7, 2, 3, 'Bio Student', 1, '2023-05-31 03:12:23', '2023-05-31 03:12:23'),
(8, 48, 49, 'None', 1, '2023-07-07 06:57:34', '2023-07-07 06:57:34'),
(9, 48, 49, 'Math', 1, '2023-07-07 06:59:57', '2023-07-07 06:59:57'),
(10, 48, 49, 'Bio', 1, '2023-07-07 07:00:08', '2023-07-07 07:00:08'),
(11, 48, 49, 'Arts', 1, '2023-07-07 07:00:35', '2023-07-07 07:00:35'),
(12, 2, 61, 'nothing', 1, '2023-09-01 17:43:30', '2023-09-01 17:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_relision` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `s_pincode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_addmission_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_fsd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_mobile_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `admin_id`, `school_id`, `reg_no`, `student_id`, `email`, `password`, `s_name`, `s_dob`, `s_gender`, `s_category`, `s_relision`, `s_address`, `s_pincode`, `s_addmission_date`, `current_fsd`, `father_name`, `mother_name`, `f_mobile_no`, `stream`, `section`, `class`, `stu_image`, `created_at`, `status`, `updated_at`) VALUES
(2, 2, 3, 'REGID2022-20230001', 'SID2022-20230001', 'student@gmail.com', '$2y$10$ZYtm3b1PO0ZsjlEzLJM0y.yDlObeL9t14qV.8NvHFY85Hv4hgaS1S', 'Dummy Student', '2004-02-21', 'Male', 'General', 'Hindu', 'Dummy Addresss', '123456', '2023-06-08', '2', 'Dummy Father', 'Dummy Mother', '1234567809', '4', NULL, '1', '20230608122762760.webp', '2023-04-08 06:57:43', 1, '2023-07-01 01:23:59'),
(3, 2, 3, 'REGID2022-20230037', 'SID2022-20230037', 'student4@gmail.com', '$2y$10$H8w7fpbdVqaKYeofGdJhtOuBSPVcLBxFvJXb11/j5eNhJX.Fdri5K', 'shivam', '2023-06-12', 'Female', 'General', 'Islam', 'A16 Dayal estate matiyari chinhat near to reliance petrol pump', '226028', '2023-06-12', '2', 'shiv', 'mother', '1231231235', '4', NULL, '1', '202306120653screencapture-127-0-0-1-8000-view-time-table-with-search-2023-06-10-18_34_44.png', '2023-05-12 01:23:21', 1, '2023-07-01 01:24:46'),
(4, 2, 3, 'REGID2022-20230040', 'SID2022-20230040', 'komal@gmail.com', '$2y$10$vpbba7q01Y9gfC9BdRG4bOK5Gi6qCqcpoAXgWhRMxGYF0d63wdXoe', 'Komal', '2023-05-30', 'Female', 'OBC', 'Islam', 'Vidhayk chwraha ,chinhat Lucknow', '226028', '2021-06-19', '2', 'keshari lala', 'Devi kalma', '9878765434', '4', '1', '4', '202306190937new_logo.png', '2023-06-19 04:07:41', 1, '2023-06-19 04:07:41'),
(5, 2, 3, 'REGID2022-20230046', 'SID2022-20230046', 'vipul@gmail.com', '$2y$10$S/xFcR7XUNtHD3nGnsZ3mO68771tmcN56KDXbEZjRgTxRwJJoYEAm', 'Vipul', '2023-05-30', 'Male', 'OBC', 'Hindu', 'AZAD NAGAR WADR NO 11 CHWRAHA ROAD NAGAR PALIKA PARISHAD MAH', '273303', '2022-06-19', '2', 'vip', 'vip m', '6756756754', '4', '1', '4', '2023061909431684567430.png', '2023-06-19 04:13:51', 1, '2023-06-19 04:13:51'),
(6, 48, 49, 'REGID2020-20216', 'SID2020-20216', 'jgjgjhss1@gamil.com', '$2y$10$L94nl6LzgxOzDXj5TN7QN.ostwZZO.01.jR7lcHjJ.WvODRt3jxiq', 'Kirti Rauniyar', '2023-07-06', 'Male', 'General', 'Islam', 'A16 Dayal estate matiyari chinhat near to reliance petrol pump', '226028', '2023-07-21', '7', 'Kirti Rauniyar', 'ff', '7380593485', '8', '5', '26', '202307070742campus-collage-university-educat.png', '2023-07-07 07:42:33', 1, '2023-07-07 10:17:54'),
(7, 48, 49, 'REGID2023-20247', 'SID2023-20247', 'jjjss1@gamil.com', '$2y$10$6wOHwmZ2x28yG.tVkiDBy.R1YbKywfCyKxIxAclw7vrwFRBWfWWjK', 'Neha', '2023-07-07', 'Male', 'OBC', 'Islam', 'AZAD NAGAR WADR NO 11 CHWRAHA ROAD NAGAR PALIKA PARISHAD MAH', '273303', '2023-07-07', '10', 'Kirti Rauniyar', 'ff', '9956830561', '8', '4', '26', '202307070800campus-collage-university-educat.png', '2023-07-07 08:00:20', 1, '2023-07-07 08:00:20'),
(8, 48, 49, 'REGID2020-20218', 'SID2020-20218', 'jss1st@gamil.com', '$2y$10$LAIXLX0/LkiETRg9V.kJVejrUDE83nTSzerHev1zegiP.G/ORT/SK', 'Nehasdfghjk', '2023-07-08', 'Female', 'OBC', 'Islam', 'AZAD NAGAR WADR NO 11 CHWRAHA ROAD NAGAR PALIKA PARISHAD MAH', '273303', '2023-07-08', '7', 'Kirti Rauniyar', 'Kmala', '8765432123', '8', '4', '26', '202307080437dummy-user.png', '2023-07-08 04:37:38', 1, '2023-07-08 04:39:31'),
(9, 2, 61, 'REGID20239', 'SID20239', 'Nothing1@gmail.com', '$2y$10$PwfO87ygJp2OAyfTYb12fe479RpUF.zU2uEFmC9./JU2SAdeoWJeC', 'Nothing', '2023-09-01', 'Male', 'OBC', 'Hindu', 'Nothing', '987654', '2023-09-01', '12', 'Nothing', 'Nothing', '9876543219', '12', '6', '29', '202309011759unnamed.png', '2023-09-01 17:59:16', 1, '2023-09-01 18:34:18'),
(10, 2, 61, 'REGID202310', 'SID202310', 'you@gmail.com', '$2y$10$/mqbZ2cXWqf8DYOHS5WjB.MnqGl6iIlS1jMnBEdJ1y1z7nLK1KSpS', 'you', '2023-09-01', 'Male', 'OBC', 'Hindu', 'you', '676545', '2023-09-01', '12', 'you', 'you', '8765432345', '12', '6', '29', '20230901180491MjpJj1TPL._AC_UF1000,1000_QL80_.jpg', '2023-09-01 18:04:46', 1, '2023-09-01 18:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `student_id` int NOT NULL,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `section_id` int NOT NULL,
  `date` date NOT NULL,
  `class_start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attend_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`id`, `admin_id`, `school_id`, `staff_id`, `student_id`, `class_id`, `subject_id`, `section_id`, `date`, `class_start_time`, `class_end_time`, `attend_status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 37, 2, 1, 2, 1, '2023-06-09', '10:40', '11:40', 'Present', '2023-06-08 23:40:46', '2023-06-08 23:40:46'),
(2, 2, 3, 37, 2, 1, 2, 1, '2023-06-13', '11:10', '12:11', 'Present', '2023-06-13 00:11:04', '2023-06-13 00:11:04'),
(3, 2, 3, 37, 3, 1, 2, 1, '2023-06-13', '11:10', '12:11', 'Present', '2023-06-13 00:11:04', '2023-06-13 00:11:04'),
(4, 2, 3, 37, 2, 1, 2, 1, '2023-06-12', '11:11', '12:12', 'Absent', '2023-06-13 00:11:50', '2023-06-13 00:11:50'),
(5, 2, 3, 37, 3, 1, 2, 1, '2023-06-12', '11:11', '12:12', 'Present', '2023-06-13 00:11:50', '2023-06-13 00:11:50'),
(6, 2, 3, 37, 2, 1, 2, 1, '2023-06-02', '11:12', '12:13', 'Leave', '2023-06-13 00:12:22', '2023-06-13 00:12:22'),
(8, 48, 49, 52, 6, 26, 227, 4, '2023-07-07', '15:39', '03:39', 'Present', '2023-07-07 10:09:35', '2023-07-07 10:09:35'),
(9, 48, 49, 52, 7, 26, 227, 4, '2023-07-07', '15:39', '03:39', 'Leave', '2023-07-07 10:09:35', '2023-07-07 10:09:35'),
(10, 2, 3, 37, 3, 1, 2, 1, '2023-06-02', '11:12', '12:13', 'Present', '2023-09-01 17:34:00', '2023-09-01 17:34:00'),
(11, 2, 61, 64, 10, 29, 228, 6, '2023-09-02', '00:00', '01:00', 'Present', '2023-09-01 18:30:40', '2023-09-01 18:30:40'),
(12, 2, 61, 64, 9, 29, 228, 6, '2023-09-02', '00:05', '00:05', 'Present', '2023-09-01 18:35:18', '2023-09-01 18:35:18'),
(13, 2, 61, 64, 10, 29, 228, 6, '2023-09-02', '00:05', '00:05', 'Present', '2023-09-01 18:35:18', '2023-09-01 18:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint UNSIGNED NOT NULL,
  `inovice_no` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `student_id` int NOT NULL,
  `month_id` int NOT NULL,
  `fee_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `late_fee_charges` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_fee_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int NOT NULL,
  `stream_id` int NOT NULL,
  `section_id` int NOT NULL,
  `year_id` int NOT NULL,
  `fee_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `inovice_no`, `admin_id`, `school_id`, `student_id`, `month_id`, `fee_amount`, `late_fee_charges`, `total_fee_amount`, `class_id`, `stream_id`, `section_id`, `year_id`, `fee_status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 'RCN-140623-1', 2, 3, 2, 1, '500', '0', '500', 1, 4, 1, 2, 'Paid', '', '2023-05-13 05:08:42', '2023-06-13 05:08:42'),
(3, 'RCN-140623-3', 2, 3, 2, 3, '500', '0', '500', 1, 4, 1, 2, 'Paid', '', '2024-05-13 07:51:59', '2023-06-13 07:51:59'),
(4, 'RCN-140623-4', 2, 3, 2, 2, '500', '40', '540', 1, 4, 1, 2, 'Paid', '', '2023-06-13 07:53:54', '2023-06-13 07:53:54'),
(5, 'RCN-140623-5', 2, 3, 2, 5, '500', '0', '500', 1, 4, 1, 2, 'Paid', 'Case Payment', '2023-06-13 23:49:30', '2023-06-13 23:49:30'),
(6, 'RCN-140623-6', 2, 3, 3, 1, '500', '0', '500', 1, 4, 0, 2, 'Paid', 'Case Payment', '2023-06-13 23:51:25', '2023-06-13 23:51:25'),
(7, 'RCN-140623-7', 2, 3, 3, 2, '500', '0', '500', 1, 4, 0, 2, 'Paid', 'Case Payment', '2023-06-13 23:52:08', '2023-06-13 23:52:08'),
(8, 'RCN-140623-8', 2, 3, 3, 3, '500', '0', '500', 1, 4, 0, 2, 'Paid', 'Case Payment', '2023-06-13 23:53:17', '2023-06-13 23:53:17'),
(9, 'RCN-140623-9', 2, 3, 3, 1, '500', '0', '500', 1, 4, 0, 3, 'Paid', 'Case Payment', '2023-06-13 23:55:15', '2023-06-13 23:55:15'),
(10, 'RCN-140623-10', 2, 3, 3, 5, '500', '0', '500', 1, 4, 0, 2, 'Paid', 'Online', '2023-06-13 23:58:11', '2023-06-13 23:58:11'),
(12, 'RCN-140623-11', 2, 3, 3, 6, '500', '90', '590', 1, 4, 0, 2, 'Paid', 'Upi', '2023-06-14 00:02:32', '2023-06-14 00:02:32'),
(13, 'RCN-140623-13', 2, 3, 3, 7, '500', '0', '500', 1, 4, 0, 2, 'Paid', 'Case Payment', '2023-06-14 00:02:54', '2023-06-14 00:02:54'),
(14, 'RCN-070723-14', 48, 49, 6, 1, '500', '0', '500', 26, 8, 4, 7, 'Paid', 'Case Payment', '2023-07-07 08:19:24', '2023-07-07 08:19:24'),
(15, 'RCN-080723-15', 48, 49, 8, 1, '500', '0', '500', 26, 8, 4, 7, 'Paid', 'Case Payment', '2023-07-08 04:40:12', '2023-07-08 04:40:12'),
(16, 'RCN-010923-16', 2, 61, 9, 9, '100', '0', '100', 29, 12, 6, 12, 'Paid', 'offline', '2023-09-01 18:00:42', '2023-09-01 18:00:42'),
(17, 'RCN-010923-17', 2, 61, 9, 10, '100', '0', '100', 29, 12, 6, 12, 'Paid', 'offline', '2023-09-01 18:01:15', '2023-09-01 18:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `student_id` int NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `stream_id` int NOT NULL,
  `Section_id` int NOT NULL,
  `assign_subject_id` int DEFAULT NULL,
  `exam_type_id` int DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `passing_marks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalsub_marks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `admin_id`, `school_id`, `teacher_id`, `student_id`, `id_no`, `year_id`, `class_id`, `stream_id`, `Section_id`, `assign_subject_id`, `exam_type_id`, `marks`, `passing_marks`, `totalsub_marks`, `created_at`, `updated_at`) VALUES
(19, 3, 3, 1, 2, 'SID2022-20230001', 2, 1, 4, 1, 38, 1, 22, '22', '55', '2023-06-15 02:38:03', '2023-06-15 02:38:03'),
(20, 3, 3, 1, 3, 'SID2022-20230037', 2, 1, 4, 1, 38, 1, 51, '22', '55', '2023-06-15 02:38:03', '2023-06-15 02:38:03'),
(23, 3, 3, 1, 2, 'SID2022-20230001', 2, 1, 4, 1, 2, 1, 35, '40', '100', '2023-06-15 03:12:54', '2023-06-15 03:12:54'),
(24, 3, 3, 1, 3, 'SID2022-20230037', 2, 1, 4, 1, 2, 1, 65, '40', '100', '2023-06-15 03:12:54', '2023-06-15 03:12:54'),
(25, 49, 49, 7, 6, 'SID2020-20216', 7, 26, 8, 5, 227, 6, 55, '33', '70', '2023-07-07 10:14:27', '2023-07-07 10:14:27'),
(26, 61, 61, 9, 9, 'SID20239', 12, 29, 12, 6, 228, 7, 9, '8', '12', '2023-09-01 18:38:04', '2023-09-01 18:38:04'),
(27, 61, 61, 9, 10, 'SID202310', 12, 29, 12, 6, 228, 7, 7, '8', '12', '2023-09-01 18:38:04', '2023-09-01 18:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_more_details`
--

CREATE TABLE `student_more_details` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `student_id` int NOT NULL,
  `previous_school_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_school_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `addmistion_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_school_transfer_cerificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `previous_school_character_cerificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_more_details`
--

INSERT INTO `student_more_details` (`id`, `admin_id`, `school_id`, `student_id`, `previous_school_name`, `previous_school_class`, `addmistion_class`, `previous_school_transfer_cerificate`, `previous_school_character_cerificate`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 2, 'Karmla Kanya school Gomti Nagar, Lucknow', 'Narcsary', '1', 'previous_school_transfer_cerificate114507230612114507pdf', 'previous_school_character_cerificate113953230612113953png', '2023-06-12 03:50:52', '2023-06-12 06:15:07'),
(2, 2, 3, 3, 'Lucknow Public School Licknow', '2nd', '1', 'previous_school_transfer_cerificate114012230612114012png', 'previous_school_character_cerificate114012230612114012png', '2023-06-12 05:58:19', '2023-06-12 06:10:12'),
(3, 48, 49, 7, 'addd', 'lkg', '26', '', '', '2023-07-07 08:00:37', '2023-07-07 08:00:37'),
(4, 48, 49, 6, 'i gg', '1', '25', 'previous_school_transfer_cerificate080222230707080222png', 'previous_school_character_cerificate080222230707080222png', '2023-07-07 08:02:22', '2023-07-07 08:02:22'),
(5, 48, 49, 8, 'i gg', '1', '25', 'previous_school_transfer_cerificate043820230708043820png', 'previous_school_character_cerificate043820230708043820png', '2023-07-08 04:38:20', '2023-07-08 04:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `admin_id`, `school_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 2, 3, '2022-2023', '2023-05-30 04:15:45', '2023-05-30 04:19:28'),
(3, 2, 3, '2023-2024', '2023-05-30 04:18:56', '2023-05-30 04:19:40'),
(4, 2, 3, '2024-2025', '2023-05-30 04:26:21', '2023-05-30 04:26:21'),
(6, 2, 3, '2025-2026', '2023-05-30 04:57:51', '2023-05-30 04:57:51'),
(7, 48, 49, '2020-2021', '2023-07-07 07:14:55', '2023-07-07 07:14:55'),
(10, 48, 49, '2023-2024', '2023-07-07 07:35:54', '2023-07-07 07:35:54'),
(11, 48, 49, '2024-2025', '2023-07-07 07:36:14', '2023-07-07 07:36:14'),
(12, 2, 61, '2023', '2023-09-01 17:39:20', '2023-09-01 17:39:20'),
(13, 2, 61, '2025', '2023-09-01 17:51:54', '2023-09-01 17:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `subject_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `admin_id`, `school_id`, `subject_name`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 'Maths', '2023-05-23 00:24:46', '2023-05-23 00:24:46'),
(3, 2, 3, 'Physics', '2023-05-23 00:24:54', '2023-05-23 00:24:54'),
(8, 2, 3, 'English', '2023-05-26 00:40:35', '2023-05-26 00:42:41'),
(30, 2, 3, 'art', '2023-05-26 00:41:15', '2023-05-26 00:42:56'),
(38, 2, 3, 'science', '2023-05-26 00:41:15', '2023-05-26 00:43:26'),
(43, 2, 3, 'history', '2023-05-26 00:41:15', '2023-05-26 00:43:40'),
(93, 2, 3, 'geography', '2023-05-26 00:41:15', '2023-05-26 00:43:55'),
(109, 2, 3, 'biology', '2023-05-26 00:41:15', '2023-05-26 00:44:15'),
(120, 2, 3, 'chemistry', '2023-05-26 00:41:15', '2023-05-26 00:44:34'),
(145, 2, 3, 'geometry', '2023-05-26 00:41:15', '2023-05-26 00:45:09'),
(150, 2, 3, 'music', '2023-05-26 00:41:15', '2023-05-26 00:45:58'),
(154, 2, 3, 'drama', '2023-05-26 00:41:15', '2023-05-26 00:46:14'),
(227, 48, 49, 'Math', '2023-07-07 08:20:58', '2023-07-07 08:20:58'),
(228, 2, 61, 'nothing', '2023-09-01 17:38:25', '2023-09-01 17:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan_histroys`
--

CREATE TABLE `subscription_plan_histroys` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `total_price` int NOT NULL,
  `plan` int NOT NULL,
  `per_std_price` int NOT NULL,
  `total_stud` int NOT NULL,
  `plan_start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plan_histroys`
--

INSERT INTO `subscription_plan_histroys` (`id`, `admin_id`, `total_price`, `plan`, `per_std_price`, `total_stud`, `plan_start_date`, `plan_end_date`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 2, 2, '2023-05-20', '2023-06-20', '', '2023-05-20 04:46:14', '2023-05-20 04:46:14'),
(2, 2, 4, 1, 2, 2, '2023-05-20', '2023-06-20', '', '2023-05-20 04:51:43', '2023-05-20 04:51:43'),
(3, 2, 12, 3, 2, 2, '2023-05-20', '2023-08-20', '', '2023-05-20 05:03:13', '2023-05-20 05:03:13'),
(4, 2, 48, 12, 2, 2, '2023-05-20', '2024-05-20', '', '2023-05-20 05:07:57', '2023-05-20 05:07:57'),
(5, 2, 4, 1, 2, 2, '2023-05-20', '2023-06-20', '', '2023-05-20 05:24:34', '2023-05-20 05:24:34'),
(6, 2, 12, 3, 2, 2, '2023-05-20', '2023-08-20', '', '2023-05-20 05:26:37', '2023-05-20 05:26:37'),
(7, 2, 48, 12, 2, 2, '2023-05-20', '2024-05-20', '', '2023-05-20 05:27:19', '2023-05-20 05:27:19'),
(11, 2, 4, 1, 2, 2, '2023-05-22', '2023-06-22', 'Monthly Subscription', '2023-05-22 00:43:19', '2023-05-22 00:43:19'),
(12, 2, 4, 1, 2, 2, '2023-05-22', '2023-06-22', 'Monthly Subscription', '2023-05-22 00:44:30', '2023-05-22 00:44:30'),
(13, 2, 4, 1, 2, 2, '2023-05-22', '2023-06-22', 'Monthly Subscription', '2023-05-22 00:45:11', '2023-05-22 00:45:11'),
(14, 2, 4, 1, 2, 2, '2023-05-22', '2023-06-22', 'Monthly Subscription', '2023-05-22 01:02:02', '2023-05-22 01:02:02'),
(15, 2, 24, 6, 2, 2, '2023-05-22', '2023-11-22', 'Six Month Subscription', '2023-05-22 01:42:31', '2023-05-22 01:42:31'),
(19, 2, 4, 1, 2, 2, '2023-05-22', '2023-06-22', 'Monthly Subscription', '2023-05-22 02:25:42', '2023-05-22 02:25:42'),
(20, 2, 4, 1, 2, 2, '2023-05-22', '2023-06-22', 'Monthly Subscription', '2023-05-22 02:27:02', '2023-05-22 02:27:02'),
(22, 2, 96, 12, 2, 4, '2023-07-01', '2024-07-01', 'Yearly Subscription', '2023-07-01 04:03:42', '2023-07-01 04:03:42'),
(23, 47, 10000, 1, 10, 0, '2023-07-01', '2023-08-01', ' Fix Payment Of One Month', '2023-07-01 04:16:44', '2023-07-01 04:16:44'),
(24, 48, 5000, 6, 2, 0, '2023-07-07', '2024-01-07', 'Fix Payment Of Six Month', '2023-07-07 06:43:24', '2023-07-07 06:43:24'),
(25, 56, 3000, 3, 2, 0, '2023-09-01', '2023-12-01', ' Fix Payment Of Three Month', '2023-09-01 16:50:30', '2023-09-01 16:50:30'),
(26, 60, 999, 12, 33, 0, '2023-09-01', '2024-09-01', 'Fix Payment Of  Yearly', '2023-09-01 17:17:05', '2023-09-01 17:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `assign_class_id` int NOT NULL,
  `assign_subject_id` int NOT NULL,
  `unit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `admin_id`, `school_id`, `teacher_id`, `assign_class_id`, `assign_subject_id`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 37, 1, 2, 'unit-1-Numbers from (10 – 20)', 1, '2023-06-08 23:42:34', '2023-06-08 23:42:34'),
(2, 2, 3, 37, 2, 2, 'unit-1-Number System', 1, '2023-06-08 23:43:07', '2023-06-08 23:48:04'),
(3, 48, 49, 52, 26, 227, 'Lat-long', 1, '2023-07-07 10:10:26', '2023-07-07 10:10:26'),
(4, 2, 61, 64, 29, 0, 'you', 1, '2023-09-01 18:36:39', '2023-09-01 18:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `upload_contents`
--

CREATE TABLE `upload_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int NOT NULL,
  `school_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `topic_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_contents`
--

INSERT INTO `upload_contents` (`id`, `admin_id`, `school_id`, `teacher_id`, `class_id`, `subject_id`, `unit_id`, `topic_name`, `upload_note`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 37, 1, 2, 1, 'Forming sequence from 10 to 20', 'note_09-06-23-50.png', 1, '2023-06-08 23:44:50', '2023-06-08 23:45:02'),
(2, 2, 3, 37, 1, 2, 1, 'Counting objects using numbers', 'note_09-06-23-41.png', 1, '2023-06-08 23:45:41', '2023-06-08 23:45:41'),
(3, 2, 3, 37, 1, 2, 1, 'Grouping objects into tens.', 'note_09-06-23-05.png', 1, '2023-06-08 23:46:05', '2023-06-08 23:46:05'),
(4, 2, 3, 37, 1, 2, 1, 'Developing the vocabulary related to groups of ‘tens’ and ‘ones’.', 'note_09-06-23-34.png', 1, '2023-06-08 23:46:34', '2023-06-08 23:46:34'),
(5, 2, 3, 37, 2, 2, 2, 'Place Value (Up to 10,000)', 'note_09-06-23-36.png', 1, '2023-06-08 23:48:36', '2023-06-08 23:48:36'),
(6, 2, 3, 37, 2, 2, 2, 'Expanded Form', 'note_09-06-23-00.png', 1, '2023-06-08 23:49:00', '2023-06-08 23:49:00'),
(7, 2, 3, 37, 2, 2, 2, 'Standard Form', 'note_09-06-23-22.png', 1, '2023-06-08 23:49:22', '2023-06-08 23:49:22'),
(8, 2, 3, 37, 2, 2, 2, 'Forward Counting', 'note_09-06-23-46.png', 1, '2023-06-08 23:49:46', '2023-06-08 23:49:46'),
(9, 2, 3, 37, 2, 2, 2, 'Backward Counting', 'note_09-06-23-08.png', 1, '2023-06-08 23:50:08', '2023-06-08 23:50:08'),
(10, 48, 49, 52, 26, 227, 3, 'Add and Substract', 'note_07-07-23-52.png', 1, '2023-07-07 10:10:52', '2023-07-07 10:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `week_days`
--

CREATE TABLE `week_days` (
  `id` bigint UNSIGNED NOT NULL,
  `week_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `week_days`
--

INSERT INTO `week_days` (`id`, `week_name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', NULL, NULL),
(2, 'Tuesday ', NULL, NULL),
(3, 'Wednesday', NULL, NULL),
(4, 'Thursday', NULL, NULL),
(5, 'Friday', NULL, NULL),
(6, 'Saturday', NULL, NULL),
(7, 'Sunday ', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_mobile_unique` (`mobile`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_techer_subjects`
--
ALTER TABLE `assign_techer_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_configers`
--
ALTER TABLE `class_configers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decide_class_periods`
--
ALTER TABLE `decide_class_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generate_certificates`
--
ALTER TABLE `generate_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthwise_salaries`
--
ALTER TABLE `monthwise_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salary_congigurations`
--
ALTER TABLE `salary_congigurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_registations`
--
ALTER TABLE `school_registations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_registations_email_unique` (`email`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_s_email_unique` (`email`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_more_details`
--
ALTER TABLE `student_more_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plan_histroys`
--
ALTER TABLE `subscription_plan_histroys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_contents`
--
ALTER TABLE `upload_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week_days`
--
ALTER TABLE `week_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `assign_techer_subjects`
--
ALTER TABLE `assign_techer_subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class_configers`
--
ALTER TABLE `class_configers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `decide_class_periods`
--
ALTER TABLE `decide_class_periods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `generate_certificates`
--
ALTER TABLE `generate_certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `monthwise_salaries`
--
ALTER TABLE `monthwise_salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_congigurations`
--
ALTER TABLE `salary_congigurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_registations`
--
ALTER TABLE `school_registations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_more_details`
--
ALTER TABLE `student_more_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `subscription_plan_histroys`
--
ALTER TABLE `subscription_plan_histroys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upload_contents`
--
ALTER TABLE `upload_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `week_days`
--
ALTER TABLE `week_days`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
