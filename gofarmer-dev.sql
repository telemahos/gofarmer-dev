-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 13 Δεκ 2012 στις 21:28:20
-- Έκδοση Διακομιστή: 5.5.16
-- Έκδοση PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `gofarmer-dev`
--

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_activities`
--

CREATE TABLE IF NOT EXISTS `bf_activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=423 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_activities`
--

INSERT INTO `bf_activities` (`activity_id`, `user_id`, `activity`, `module`, `created_on`, `deleted`) VALUES
(1, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-12 08:30:42', 0),
(2, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 08:30:58', 0),
(3, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 08:31:08', 0),
(4, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 08:31:47', 0),
(5, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 08:32:23', 0),
(6, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 08:32:49', 0),
(7, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 08:33:55', 0),
(8, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 08:34:05', 0),
(9, 1, 'Migrate Type: starter_ to Version: 1 from: 127.0.0.1', 'migrations', '2012-09-12 08:51:40', 0),
(10, 1, 'Migrate Type: gfusers_ to Version: 0 from: 127.0.0.1', 'migrations', '2012-09-12 08:51:47', 0),
(11, 1, 'Migrate Type: gfusers_ to Version: 2 from: 127.0.0.1', 'migrations', '2012-09-12 08:51:55', 0),
(12, 1, 'Migrate Type: crop_ to Version: 2 from: 127.0.0.1', 'migrations', '2012-09-12 08:52:01', 0),
(13, 1, 'Migrate Type: croffer_ to Version: 2 from: 127.0.0.1', 'migrations', '2012-09-12 08:52:09', 0),
(14, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-12 08:56:21', 0),
(15, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 09:05:33', 0),
(16, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-12 09:06:12', 0),
(17, 1, 'logged out from: 127.0.0.1', 'users', '2012-09-12 11:20:00', 0),
(18, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-12 11:23:38', 0),
(19, 2, 'registered a new account.', 'users', '2012-09-12 13:04:34', 0),
(20, 2, 'logged in from: 127.0.0.1', 'users', '2012-09-12 13:04:42', 0),
(21, 2, 'updated their profile: kostas', 'users', '2012-09-12 13:05:30', 0),
(22, 1, 'Created record with ID: 1 : 127.0.0.1', 'crop', '2012-09-12 21:06:30', 0),
(23, 1, 'Created record with ID: 1 : 127.0.0.1', 'croffer', '2012-09-12 21:09:58', 0),
(24, 1, 'Created record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-12 21:34:34', 0),
(25, 1, 'Created record with ID: 2 : 127.0.0.1', 'gfusers', '2012-09-12 21:35:22', 0),
(26, 1, 'Created record with ID: 3 : 127.0.0.1', 'gfusers', '2012-09-12 21:39:41', 0),
(27, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-13 11:11:08', 0),
(28, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-13 18:21:18', 0),
(29, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-13 18:45:09', 0),
(30, 1, 'App settings saved from: 127.0.0.1', 'core', '2012-09-13 18:46:03', 0),
(31, 1, 'logged out from: 127.0.0.1', 'users', '2012-09-13 18:46:11', 0),
(32, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-13 19:15:43', 0),
(33, 1, 'Created record with ID: 4 : 127.0.0.1', 'gfusers', '2012-09-13 19:15:56', 0),
(34, 1, 'Updated record with ID:  : 127.0.0.1', 'gfusers', '2012-09-13 19:27:16', 0),
(35, 1, 'Updated record with ID:  : 127.0.0.1', 'gfusers', '2012-09-13 19:27:40', 0),
(36, 1, 'Updated record with ID:  : 127.0.0.1', 'gfusers', '2012-09-13 19:27:58', 0),
(37, 1, 'Updated record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-13 19:28:45', 0),
(38, 1, 'logged out from: 127.0.0.1', 'users', '2012-09-13 19:28:55', 0),
(39, 2, 'logged in from: 127.0.0.1', 'users', '2012-09-13 19:29:11', 0),
(40, 2, 'logged out from: 127.0.0.1', 'users', '2012-09-13 19:49:43', 0),
(41, 3, 'registered a new account.', 'users', '2012-09-13 19:50:17', 0),
(42, 3, 'logged in from: 127.0.0.1', 'users', '2012-09-13 19:50:51', 0),
(43, 3, 'Updated record with ID:  : 127.0.0.1', 'gfusers', '2012-09-13 19:58:36', 0),
(44, 3, 'Updated record with ID:  : 127.0.0.1', 'gfusers', '2012-09-13 19:59:59', 0),
(45, 3, 'Created record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-13 20:04:19', 0),
(46, 3, 'Updated record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-13 20:05:16', 0),
(47, 3, 'Updated record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-13 20:06:39', 0),
(48, 3, 'Updated record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-13 20:08:12', 0),
(49, 3, 'Updated record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-13 20:09:45', 0),
(50, 3, 'Updated record with ID: 1 : 127.0.0.1', 'gfusers', '2012-09-13 20:12:13', 0),
(51, 1, 'Created record with ID: 2 : 127.0.0.1', 'gfusers', '2012-09-13 20:12:39', 0),
(52, 1, 'Updated record with ID: 2 : 127.0.0.1', 'gfusers', '2012-09-13 20:14:23', 0),
(53, 1, 'Updated record with ID: 2 : 127.0.0.1', 'gfusers', '2012-09-13 21:41:43', 0),
(54, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-14 01:10:25', 0),
(55, 1, 'Updated record with ID: 2 : 127.0.0.1', 'gfusers', '2012-09-14 01:10:56', 0),
(56, 1, 'updated their profile: admin', 'users', '2012-09-14 01:11:18', 0),
(57, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-19 07:21:13', 0),
(58, 1, 'logged out from: 127.0.0.1', 'users', '2012-09-19 07:27:06', 0),
(59, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-19 07:27:45', 0),
(60, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-20 09:14:24', 0),
(61, 1, 'logged out from: 127.0.0.1', 'users', '2012-09-20 09:15:05', 0),
(62, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-20 09:15:08', 0),
(63, 1, 'logged out from: 127.0.0.1', 'users', '2012-09-20 09:15:27', 0),
(64, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-20 09:15:30', 0),
(65, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-21 09:23:55', 0),
(66, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-23 20:03:45', 0),
(67, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-29 11:21:41', 0),
(68, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-29 11:57:29', 0),
(69, 1, 'Migrate Type: crdemand_ to Version: 1 from: 127.0.0.1', 'migrations', '2012-09-29 12:01:51', 0),
(70, 1, 'Migrate Type: crdemand_ to Version: 2 from: 127.0.0.1', 'migrations', '2012-09-29 12:01:57', 0),
(71, 1, 'Created Module: Messages : 127.0.0.1', 'modulebuilder', '2012-09-29 12:23:16', 0),
(72, 1, 'logged in from: 127.0.0.1', 'users', '2012-09-29 18:55:21', 0),
(73, 1, 'logged in from: 127.0.0.1', 'users', '2012-10-03 08:20:31', 0),
(74, 1, 'Created record with ID: 1 : 127.0.0.1', 'messages', '2012-10-03 08:25:51', 0),
(75, 1, 'logged out from: 127.0.0.1', 'users', '2012-10-03 08:29:00', 0),
(76, 1, 'logged in from: 127.0.0.1', 'users', '2012-10-03 08:35:08', 0),
(77, 1, 'Created record with ID: 3 : 127.0.0.1', 'messages', '2012-10-03 08:35:57', 0),
(78, 3, 'logged in from: 127.0.0.1', 'users', '2012-10-03 08:36:12', 0),
(79, 3, 'Created record with ID: 5 : 127.0.0.1', 'messages', '2012-10-03 08:43:11', 0),
(80, 1, 'logged in from: 127.0.0.1', 'users', '2012-10-03 12:41:39', 0),
(81, 1, 'logged out from: 127.0.0.1', 'users', '2012-10-03 12:42:51', 0),
(82, 3, 'logged in from: 127.0.0.1', 'users', '2012-10-03 12:43:11', 0),
(83, 3, 'logged in from: 127.0.0.1', 'users', '2012-10-09 07:51:21', 0),
(84, 1, 'logged in from: 127.0.0.1', 'users', '2012-10-10 08:52:30', 0),
(85, 3, 'logged in from: 127.0.0.1', 'users', '2012-10-13 11:35:49', 0),
(86, 3, 'logged out from: 127.0.0.1', 'users', '2012-10-13 11:36:15', 0),
(87, 1, 'logged in from: 127.0.0.1', 'users', '2012-10-13 11:36:22', 0),
(88, 1, 'Migrate Type: questions_ to Version: 2 from: 127.0.0.1', 'migrations', '2012-10-13 11:36:52', 0),
(89, 1, 'Migrate Type: news_ to Version: 1 from: 127.0.0.1', 'migrations', '2012-10-13 11:37:08', 0),
(90, 2, 'logged in from: 127.0.0.1', 'users', '2012-10-13 11:41:39', 0),
(91, 1, 'Created record with ID: 1 : 127.0.0.1', 'questions', '2012-10-13 12:01:54', 0),
(92, 1, 'Created record with ID: 2 : 127.0.0.1', 'questions', '2012-10-13 12:09:27', 0),
(93, 1, 'Created record with ID: 3 : 127.0.0.1', 'questions', '2012-10-13 12:16:15', 0),
(94, 1, 'Created record with ID: 4 : 127.0.0.1', 'questions', '2012-10-13 12:16:28', 0),
(95, 1, 'Created record with ID: 5 : 127.0.0.1', 'questions', '2012-10-13 12:16:40', 0),
(96, 1, 'Created record with ID: 6 : 127.0.0.1', 'questions', '2012-10-13 12:16:49', 0),
(97, 1, 'Created record with ID: 7 : 127.0.0.1', 'questions', '2012-10-13 12:17:08', 0),
(98, 1, 'Created record with ID: 8 : 127.0.0.1', 'questions', '2012-10-13 12:17:18', 0),
(99, 1, 'Created record with ID: 9 : 127.0.0.1', 'questions', '2012-10-13 12:17:25', 0),
(100, 1, 'Created record with ID: 10 : 127.0.0.1', 'questions', '2012-10-13 12:17:53', 0),
(101, 1, 'Created record with ID: 11 : 127.0.0.1', 'questions', '2012-10-13 12:18:05', 0),
(102, 1, 'Created record with ID: 12 : 127.0.0.1', 'questions', '2012-10-13 12:18:16', 0),
(103, 1, 'Created record with ID: 13 : 127.0.0.1', 'questions', '2012-10-13 12:21:05', 0),
(104, 1, 'Created record with ID: 14 : 127.0.0.1', 'questions', '2012-10-13 13:51:51', 0),
(105, 1, 'Created record with ID: 15 : 127.0.0.1', 'questions', '2012-10-13 13:52:11', 0),
(106, 1, 'Created record with ID: 16 : 127.0.0.1', 'questions', '2012-10-13 13:52:47', 0),
(107, 1, 'Created record with ID: 17 : 127.0.0.1', 'questions', '2012-10-13 13:56:45', 0),
(108, 1, 'Created record with ID: 18 : 127.0.0.1', 'questions', '2012-10-13 13:58:04', 0),
(109, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-06 12:25:57', 0),
(110, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 00:23:01', 0),
(111, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-07 00:25:04', 0),
(112, 3, 'Created record with ID: 1 : 127.0.0.1', 'followers', '2012-11-07 00:30:11', 0),
(113, 3, 'updated their profile: kostas1', 'users', '2012-11-07 00:31:11', 0),
(114, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 00:33:43', 0),
(115, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:03:36', 0),
(116, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-07 09:04:08', 0),
(117, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:04:12', 0),
(118, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-07 09:04:42', 0),
(119, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:04:45', 0),
(120, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-07 09:06:51', 0),
(121, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:06:55', 0),
(122, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:09:55', 0),
(123, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-07 09:11:47', 0),
(124, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:12:39', 0),
(125, 1, 'deleted user: admin', 'users', '2012-11-07 09:13:22', 0),
(126, 1, 'Created record with ID: 2 : 127.0.0.1', 'followers', '2012-11-07 09:14:07', 0),
(127, 2, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:41:53', 0),
(128, 2, 'Created record with ID: 3 : 127.0.0.1', 'gfusers', '2012-11-07 09:42:36', 0),
(129, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-07 09:58:57', 0),
(130, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 09:59:00', 0),
(131, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-07 10:11:57', 0),
(132, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-07 10:12:06', 0),
(133, 3, 'logged out from: 127.0.0.1', 'users', '2012-11-07 10:14:11', 0),
(134, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 10:14:14', 0),
(135, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-07 10:15:53', 0),
(136, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-07 10:15:55', 0),
(137, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-08 17:00:23', 0),
(138, 3, 'Created record with ID: 3 : 127.0.0.1', 'followers', '2012-11-08 17:05:38', 0),
(139, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-09 09:40:46', 0),
(140, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-09 10:23:00', 0),
(141, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-09 16:59:00', 0),
(142, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-12 09:34:12', 0),
(143, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-12 10:33:29', 0),
(144, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-12 10:37:44', 0),
(145, 2, 'logged in from: 127.0.0.1', 'users', '2012-11-12 11:27:05', 0),
(146, 2, 'logged in from: 127.0.0.1', 'users', '2012-11-12 11:27:54', 0),
(147, 2, 'logged in from: 127.0.0.1', 'users', '2012-11-12 13:38:40', 0),
(148, 1, 'Created record with ID: 4 : 127.0.0.1', 'followers', '2012-11-12 15:09:38', 0),
(149, 1, 'Created record with ID: 1 : 127.0.0.1', 'followers', '2012-11-12 15:10:49', 0),
(150, 3, 'Created record with ID: 1 : 127.0.0.1', 'followers', '2012-11-12 15:13:07', 0),
(151, 3, 'Created record with ID: 1 : 127.0.0.1', 'followers', '2012-11-12 15:13:54', 0),
(152, 3, 'Created record with ID: 2 : 127.0.0.1', 'crop', '2012-11-12 15:54:54', 0),
(153, 3, 'Created record with ID: 3 : 127.0.0.1', 'crop', '2012-11-12 15:55:17', 0),
(154, 3, 'Created record with ID: 19 : 127.0.0.1', 'questions', '2012-11-12 15:56:34', 0),
(155, 3, 'Created record with ID: 2 : 127.0.0.1', 'croffer', '2012-11-12 16:36:53', 0),
(156, 3, 'Created record with ID: 3 : 127.0.0.1', 'croffer', '2012-11-12 16:37:37', 0),
(157, 3, 'Created record with ID: 4 : 127.0.0.1', 'croffer', '2012-11-12 16:38:40', 0),
(158, 2, 'Created record with ID: 5 : 127.0.0.1', 'followers', '2012-11-12 16:44:36', 0),
(159, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-14 09:24:21', 0),
(160, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-14 14:45:07', 0),
(161, 5, 'registered a new account.', 'users', '2012-11-14 15:29:17', 0),
(162, 5, 'logged in from: 127.0.0.1', 'users', '2012-11-14 15:29:30', 0),
(163, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-14 15:57:23', 0),
(164, 5, 'Created record with ID: 4 : 127.0.0.1', 'gfusers', '2012-11-14 16:04:51', 0),
(165, 5, 'Updated record with ID: 4 : 127.0.0.1', 'gfusers', '2012-11-14 16:05:16', 0),
(166, 5, 'Updated record with ID: 4 : 127.0.0.1', 'gfusers', '2012-11-14 16:05:50', 0),
(167, 5, 'Created record with ID: 6 : 127.0.0.1', 'followers', '2012-11-14 16:07:56', 0),
(168, 5, 'Created record with ID: 7 : 127.0.0.1', 'followers', '2012-11-14 16:07:58', 0),
(169, 5, 'Created record with ID: 8 : 127.0.0.1', 'followers', '2012-11-14 16:07:59', 0),
(170, 1, 'Created record with ID: 4 : 127.0.0.1', 'crop', '2012-11-14 16:09:26', 0),
(171, 1, 'Created record with ID: 5 : 127.0.0.1', 'crop', '2012-11-14 16:09:45', 0),
(172, 1, 'Created record with ID: 6 : 127.0.0.1', 'crop', '2012-11-14 16:10:05', 0),
(173, 1, 'Created record with ID: 1 : 127.0.0.1', 'followers', '2012-11-14 16:19:27', 0),
(174, 1, 'Created record with ID: 9 : 127.0.0.1', 'followers', '2012-11-14 16:19:29', 0),
(175, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-14 16:22:35', 0),
(176, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-14 16:23:42', 0),
(177, 1, 'Created record with ID: 5 : 127.0.0.1', 'croffer', '2012-11-14 17:21:26', 0),
(178, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-14 18:48:40', 0),
(179, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-14 18:48:42', 0),
(180, 5, 'logged out from: 127.0.0.1', 'users', '2012-11-14 19:01:06', 0),
(181, 5, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:12:08', 0),
(182, 5, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:19:57', 0),
(183, 6, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:22:17', 0),
(184, 6, 'Created record with ID: 5 : 127.0.0.1', 'gfusers', '2012-11-15 10:22:30', 0),
(185, 6, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:23:19', 0),
(186, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:29:45', 0),
(187, 7, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:36:32', 0),
(188, 7, 'Created record with ID: 6 : 127.0.0.1', 'gfusers', '2012-11-15 10:36:58', 0),
(189, 7, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:37:04', 0),
(190, 8, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:37:12', 0),
(191, 8, 'Created record with ID: 7 : 127.0.0.1', 'gfusers', '2012-11-15 10:37:28', 0),
(192, 8, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:37:32', 0),
(193, 9, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:37:40', 0),
(194, 9, 'Created record with ID: 8 : 127.0.0.1', 'gfusers', '2012-11-15 10:37:47', 0),
(195, 9, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:37:51', 0),
(196, 10, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:37:58', 0),
(197, 10, 'Created record with ID: 9 : 127.0.0.1', 'gfusers', '2012-11-15 10:38:07', 0),
(198, 10, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:38:10', 0),
(199, 11, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:38:31', 0),
(200, 11, 'Created record with ID: 10 : 127.0.0.1', 'gfusers', '2012-11-15 10:38:40', 0),
(201, 11, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:38:45', 0),
(202, 12, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:38:50', 0),
(203, 12, 'Created record with ID: 11 : 127.0.0.1', 'gfusers', '2012-11-15 10:39:02', 0),
(204, 12, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:47:09', 0),
(205, 13, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:47:16', 0),
(206, 13, 'Created record with ID: 12 : 127.0.0.1', 'gfusers', '2012-11-15 10:47:27', 0),
(207, 13, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:54:15', 0),
(208, 14, 'logged in from: 127.0.0.1', 'users', '2012-11-15 10:54:22', 0),
(209, 14, 'Created record with ID: 13 : 127.0.0.1', 'gfusers', '2012-11-15 10:54:32', 0),
(210, 14, 'logged out from: 127.0.0.1', 'users', '2012-11-15 10:54:35', 0),
(211, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-15 13:51:11', 0),
(212, 16, 'logged in from: 127.0.0.1', 'users', '2012-11-15 13:55:43', 0),
(213, 16, 'Created record with ID: 14 : 127.0.0.1', 'gfusers', '2012-11-15 13:55:54', 0),
(214, 16, 'logged out from: 127.0.0.1', 'users', '2012-11-15 13:56:02', 0),
(215, 15, 'logged in from: 127.0.0.1', 'users', '2012-11-15 13:56:11', 0),
(216, 15, 'Created record with ID: 15 : 127.0.0.1', 'gfusers', '2012-11-15 13:56:34', 0),
(217, 15, 'logged out from: 127.0.0.1', 'users', '2012-11-15 14:44:32', 0),
(218, 16, 'logged in from: 127.0.0.1', 'users', '2012-11-15 14:44:39', 0),
(219, 16, 'logged out from: 127.0.0.1', 'users', '2012-11-15 14:45:03', 0),
(220, 17, 'logged in from: 127.0.0.1', 'users', '2012-11-15 14:56:30', 0),
(221, 17, 'Created record with ID: 16 : 127.0.0.1', 'gfusers', '2012-11-15 14:56:54', 0),
(222, 17, 'logged out from: 127.0.0.1', 'users', '2012-11-15 14:56:56', 0),
(223, 18, 'logged in from: 127.0.0.1', 'users', '2012-11-15 14:57:03', 0),
(224, 18, 'Created record with ID: 17 : 127.0.0.1', 'gfusers', '2012-11-15 14:57:15', 0),
(225, 18, 'logged out from: 127.0.0.1', 'users', '2012-11-15 14:57:18', 0),
(226, 19, 'logged in from: 127.0.0.1', 'users', '2012-11-15 14:57:24', 0),
(227, 19, 'Created record with ID: 18 : 127.0.0.1', 'gfusers', '2012-11-15 14:57:36', 0),
(228, 19, 'logged out from: 127.0.0.1', 'users', '2012-11-15 14:57:38', 0),
(229, 20, 'logged in from: 127.0.0.1', 'users', '2012-11-15 14:57:47', 0),
(230, 20, 'Created record with ID: 19 : 127.0.0.1', 'gfusers', '2012-11-15 14:57:58', 0),
(231, 20, 'logged out from: 127.0.0.1', 'users', '2012-11-15 14:58:02', 0),
(232, 21, 'logged in from: 127.0.0.1', 'users', '2012-11-15 15:15:08', 0),
(233, 21, 'Created record with ID: 20 : 127.0.0.1', 'gfusers', '2012-11-15 15:15:21', 0),
(234, 21, 'logged out from: 127.0.0.1', 'users', '2012-11-15 15:15:32', 0),
(235, 22, 'logged in from: 127.0.0.1', 'users', '2012-11-15 15:15:42', 0),
(236, 22, 'Created record with ID: 21 : 127.0.0.1', 'gfusers', '2012-11-15 15:15:54', 0),
(237, 22, 'logged out from: 127.0.0.1', 'users', '2012-11-15 15:15:57', 0),
(238, 23, 'logged in from: 127.0.0.1', 'users', '2012-11-15 15:16:02', 0),
(239, 23, 'Created record with ID: 22 : 127.0.0.1', 'gfusers', '2012-11-15 15:16:12', 0),
(240, 23, 'Updated record with ID: 22 : 127.0.0.1', 'gfusers', '2012-11-15 15:23:35', 0),
(241, 23, 'logged out from: 127.0.0.1', 'users', '2012-11-15 15:23:41', 0),
(242, 24, 'logged in from: 127.0.0.1', 'users', '2012-11-15 15:32:49', 0),
(243, 24, 'Created record with ID: 23 : 127.0.0.1', 'gfusers', '2012-11-15 15:32:56', 0),
(244, 24, 'logged out from: 127.0.0.1', 'users', '2012-11-15 15:32:59', 0),
(245, 25, 'registered a new account.', 'users', '2012-11-15 15:38:01', 0),
(246, 25, 'logged in from: 127.0.0.1', 'users', '2012-11-15 15:38:38', 0),
(247, 25, 'logged out from: 127.0.0.1', 'users', '2012-11-15 15:39:38', 0),
(248, 26, 'registered a new account.', 'users', '2012-11-15 15:39:57', 0),
(249, 26, 'logged in from: 127.0.0.1', 'users', '2012-11-15 15:40:03', 0),
(250, 26, 'Created record with ID: 10 : 127.0.0.1', 'followers', '2012-11-15 15:41:15', 0),
(251, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-15 15:43:55', 0),
(252, 3, 'Created record with ID: 11 : 127.0.0.1', 'followers', '2012-11-15 15:44:06', 0),
(253, 3, 'Created record with ID: 12 : 127.0.0.1', 'followers', '2012-11-15 15:44:10', 0),
(254, 26, 'logged in from: 127.0.0.1', 'users', '2012-11-15 17:46:26', 0),
(255, 26, 'Created record with ID: 13 : 127.0.0.1', 'followers', '2012-11-15 17:46:39', 0),
(256, 2, 'logged out from: 127.0.0.1', 'users', '2012-11-15 17:47:37', 0),
(257, 22, 'logged in from: 127.0.0.1', 'users', '2012-11-15 17:47:44', 0),
(258, 22, 'Created record with ID: 14 : 127.0.0.1', 'followers', '2012-11-15 17:47:53', 0),
(259, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-15 22:32:56', 0),
(260, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-15 22:33:54', 0),
(261, 3, 'logged out from: 127.0.0.1', 'users', '2012-11-15 22:34:14', 0),
(262, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-16 08:56:32', 0),
(263, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-16 08:59:07', 0),
(264, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 08:59:21', 0),
(265, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 11:33:48', 0),
(266, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 11:33:55', 0),
(267, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 11:36:15', 0),
(268, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 11:36:30', 0),
(269, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 11:38:16', 0),
(270, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 11:41:12', 0),
(271, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 11:42:59', 0),
(272, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 12:04:36', 0),
(273, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 12:06:56', 0),
(274, 1, 'Created record with ID: 6 : 127.0.0.1', 'croffer', '2012-11-16 13:32:17', 0),
(275, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-16 13:48:18', 0),
(276, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 14:07:46', 0),
(277, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 14:09:26', 0),
(278, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 14:21:27', 0),
(279, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 14:26:04', 0),
(280, 5, 'logged in from: 127.0.0.1', 'users', '2012-11-16 14:49:22', 0),
(281, 5, 'logged out from: 127.0.0.1', 'users', '2012-11-16 16:14:15', 0),
(282, 6, 'logged in from: 127.0.0.1', 'users', '2012-11-16 16:14:22', 0),
(283, 6, 'Created record with ID: 15 : 127.0.0.1', 'followers', '2012-11-16 16:14:34', 0),
(284, 1, 'Created record with ID: 16 : 127.0.0.1', 'followers', '2012-11-16 16:49:11', 0),
(285, 6, 'logged out from: 127.0.0.1', 'users', '2012-11-16 16:55:16', 0),
(286, 22, 'logged in from: 127.0.0.1', 'users', '2012-11-16 16:55:22', 0),
(287, 22, 'Created record with ID: 17 : 127.0.0.1', 'followers', '2012-11-16 16:55:35', 0),
(288, 22, 'logged out from: 127.0.0.1', 'users', '2012-11-16 17:07:46', 0),
(289, 24, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:07:52', 0),
(290, 24, 'Created record with ID: 18 : 127.0.0.1', 'followers', '2012-11-16 17:08:01', 0),
(291, 24, 'logged out from: 127.0.0.1', 'users', '2012-11-16 17:20:57', 0),
(292, 21, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:21:04', 0),
(293, 21, 'Created record with ID: 19 : 127.0.0.1', 'followers', '2012-11-16 17:21:11', 0),
(294, 21, 'logged out from: 127.0.0.1', 'users', '2012-11-16 17:21:33', 0),
(295, 2, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:21:39', 0),
(296, 2, 'Created record with ID: 20 : 127.0.0.1', 'followers', '2012-11-16 17:21:47', 0),
(297, 2, 'logged out from: 127.0.0.1', 'users', '2012-11-16 17:23:24', 0),
(298, 21, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:23:37', 0),
(299, 21, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:24:59', 0),
(300, 1, 'Created record with ID: 21 : 127.0.0.1', 'followers', '2012-11-16 17:36:05', 0),
(301, 1, 'Created record with ID: 1 : 127.0.0.1', 'followers', '2012-11-16 17:40:57', 0),
(302, 1, 'Created record with ID: 22 : 127.0.0.1', 'followers', '2012-11-16 17:41:30', 0),
(303, 1, 'Created record with ID: 23 : 127.0.0.1', 'followers', '2012-11-16 17:41:34', 0),
(304, 1, 'Created record with ID: 24 : 127.0.0.1', 'followers', '2012-11-16 17:41:37', 0),
(305, 1, 'Created record with ID: 25 : 127.0.0.1', 'followers', '2012-11-16 17:41:41', 0),
(306, 1, 'Created record with ID: 26 : 127.0.0.1', 'followers', '2012-11-16 17:41:44', 0),
(307, 1, 'Created record with ID: 27 : 127.0.0.1', 'followers', '2012-11-16 17:41:55', 0),
(308, 1, 'Created record with ID: 28 : 127.0.0.1', 'followers', '2012-11-16 17:41:59', 0),
(309, 1, 'Created record with ID: 29 : 127.0.0.1', 'followers', '2012-11-16 17:42:03', 0),
(310, 1, 'Created record with ID: 30 : 127.0.0.1', 'followers', '2012-11-16 17:42:06', 0),
(311, 1, 'Created record with ID: 31 : 127.0.0.1', 'followers', '2012-11-16 17:42:11', 0),
(312, 1, 'Created record with ID: 32 : 127.0.0.1', 'followers', '2012-11-16 17:42:14', 0),
(313, 1, 'Created record with ID: 33 : 127.0.0.1', 'followers', '2012-11-16 17:42:18', 0),
(314, 1, 'Created record with ID: 34 : 127.0.0.1', 'followers', '2012-11-16 17:42:37', 0),
(315, 1, 'Created record with ID: 35 : 127.0.0.1', 'followers', '2012-11-16 17:42:41', 0),
(316, 1, 'Created record with ID: 36 : 127.0.0.1', 'followers', '2012-11-16 17:42:45', 0),
(317, 1, 'Created record with ID: 37 : 127.0.0.1', 'followers', '2012-11-16 17:42:50', 0),
(318, 1, 'Created record with ID: 38 : 127.0.0.1', 'followers', '2012-11-16 17:42:54', 0),
(319, 1, 'Created record with ID: 39 : 127.0.0.1', 'followers', '2012-11-16 17:42:58', 0),
(320, 1, 'Created record with ID: 40 : 127.0.0.1', 'followers', '2012-11-16 17:43:03', 0),
(321, 21, 'Created record with ID: 41 : 127.0.0.1', 'followers', '2012-11-16 17:43:46', 0),
(322, 21, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:44:29', 0),
(323, 21, 'logged out from: 127.0.0.1', 'users', '2012-11-16 17:44:40', 0),
(324, 24, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:44:47', 0),
(325, 24, 'Created record with ID: 42 : 127.0.0.1', 'followers', '2012-11-16 17:45:30', 0),
(326, 21, 'Created record with ID: 43 : 127.0.0.1', 'followers', '2012-11-16 17:47:05', 0),
(327, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 17:52:47', 0),
(328, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:52:57', 0),
(329, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-16 17:53:02', 0),
(330, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-16 17:55:41', 0),
(331, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-19 09:00:40', 0),
(332, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-19 10:38:11', 0),
(333, 1, 'Updated record with ID: 2 : 127.0.0.1', 'gfusers', '2012-11-19 10:57:06', 0),
(334, 1, 'Updated record with ID: 2 : 127.0.0.1', 'gfusers', '2012-11-19 10:57:14', 0),
(335, 1, 'Created record with ID: 1 : 127.0.0.1', 'crop', '2012-11-19 12:34:01', 0),
(336, 1, 'Created record with ID: 2 : 127.0.0.1', 'crop', '2012-11-19 12:34:14', 0),
(337, 1, 'Created record with ID: 3 : 127.0.0.1', 'crop', '2012-11-19 12:34:27', 0),
(338, 1, 'Created record with ID: 1 : 127.0.0.1', 'croffer', '2012-11-19 12:38:10', 0),
(339, 1, 'Created record with ID: 2 : 127.0.0.1', 'croffer', '2012-11-19 12:38:45', 0),
(340, 1, 'Created record with ID: 3 : 127.0.0.1', 'croffer', '2012-11-19 12:39:12', 0),
(341, 2, 'logged in from: 127.0.0.1', 'users', '2012-11-19 14:04:23', 0),
(342, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-19 14:37:13', 0),
(343, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-19 14:45:22', 0),
(344, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-20 13:37:01', 0),
(345, 1, 'Created record with ID: 4 : 127.0.0.1', 'crop', '2012-11-20 13:51:49', 0),
(346, 1, 'Created record with ID: 5 : 127.0.0.1', 'crop', '2012-11-20 13:52:15', 0),
(347, 1, 'Created record with ID: 4 : 127.0.0.1', 'croffer', '2012-11-20 13:55:10', 0),
(348, 1, 'Created record with ID: 5 : 127.0.0.1', 'croffer', '2012-11-20 15:10:23', 0),
(349, 1, 'Created record with ID: 1 : 127.0.0.1', 'crop', '2012-11-20 15:32:28', 0),
(350, 1, 'Created record with ID: 2 : 127.0.0.1', 'crop', '2012-11-20 15:32:52', 0),
(351, 1, 'Created record with ID: 3 : 127.0.0.1', 'crop', '2012-11-20 15:33:25', 0),
(352, 1, 'Created record with ID: 1 : 127.0.0.1', 'croffer', '2012-11-20 15:34:44', 0),
(353, 1, 'Created record with ID: 2 : 127.0.0.1', 'croffer', '2012-11-20 15:35:45', 0),
(354, 1, 'Created record with ID: 1 : 127.0.0.1', 'crop', '2012-11-20 17:34:30', 0),
(355, 1, 'Created record with ID: 2 : 127.0.0.1', 'crop', '2012-11-20 17:34:50', 0),
(356, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-22 09:51:12', 0),
(357, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-22 12:04:34', 0),
(358, 1, 'Updated record with ID: 1 : 127.0.0.1', 'crop', '2012-11-22 12:09:07', 0),
(359, 1, 'Created record with ID: 1 : 127.0.0.1', 'croffer', '2012-11-22 12:14:12', 0),
(360, 1, 'Updated record with ID: 1 : 127.0.0.1', 'croffer', '2012-11-22 12:29:27', 0),
(361, 1, 'Created record with ID: 2 : 127.0.0.1', 'croffer', '2012-11-22 13:07:36', 0),
(362, 1, 'Deleted record with ID: 2 : 127.0.0.1', 'croffer', '2012-11-22 14:03:45', 0),
(363, 1, 'Deleted record with ID: 2 : 127.0.0.1', 'croffer', '2012-11-22 14:07:30', 0),
(364, 1, 'Deleted record with ID: 1 : 127.0.0.1', 'croffer', '2012-11-22 14:09:22', 0),
(365, 1, 'Created record with ID: 3 : 127.0.0.1', 'croffer', '2012-11-22 14:11:27', 0),
(366, 1, 'Created record with ID: 3 : 127.0.0.1', 'crop', '2012-11-22 14:12:01', 0),
(367, 1, 'Created record with ID: 4 : 127.0.0.1', 'crop', '2012-11-22 14:12:16', 0),
(368, 1, 'Created record with ID: 5 : 127.0.0.1', 'crop', '2012-11-22 14:12:42', 0),
(369, 1, 'Created record with ID: 6 : 127.0.0.1', 'crop', '2012-11-22 14:13:05', 0),
(370, 24, 'logged in from: 127.0.0.1', 'users', '2012-11-22 14:21:10', 0),
(371, 24, 'Created record with ID: 7 : 127.0.0.1', 'crop', '2012-11-22 14:23:20', 0),
(372, 24, 'Created record with ID: 4 : 127.0.0.1', 'croffer', '2012-11-22 14:24:08', 0),
(373, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-23 12:36:21', 0),
(374, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-26 14:14:46', 0),
(375, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-26 14:16:09', 0),
(376, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-26 15:02:04', 0),
(377, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-27 11:41:18', 0),
(378, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-27 12:00:32', 0),
(379, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-27 12:01:32', 0),
(380, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-27 14:54:41', 0),
(381, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-27 15:26:32', 0),
(382, 5, 'logged in from: 127.0.0.1', 'users', '2012-11-27 15:34:25', 0),
(383, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-28 09:47:34', 0),
(384, 1, 'Migrate Type: wizard_ to Version: 1 from: 127.0.0.1', 'migrations', '2012-11-28 11:37:16', 0),
(385, 1, 'Migrate Type: wizard_ to Version: 2 from: 127.0.0.1', 'migrations', '2012-11-28 11:37:23', 0),
(386, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-28 11:46:21', 0),
(387, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-28 11:46:24', 0),
(388, 1, 'logged out from: 127.0.0.1', 'users', '2012-11-28 12:50:09', 0),
(389, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-28 12:50:14', 0),
(390, 1, 'logged in from: 127.0.0.1', 'users', '2012-11-28 12:51:39', 0),
(391, 27, 'registered a new account.', 'users', '2012-11-28 14:56:05', 0),
(392, 27, 'logged in from: 127.0.0.1', 'users', '2012-11-28 14:56:15', 0),
(393, 27, 'Updated record with ID: 26 : 127.0.0.1', 'gfusers', '2012-11-28 14:57:26', 0),
(394, 3, 'logged in from: 127.0.0.1', 'users', '2012-11-28 14:58:29', 0),
(395, 27, 'logged out from: 127.0.0.1', 'users', '2012-11-28 15:25:24', 0),
(396, 26, 'logged in from: 127.0.0.1', 'users', '2012-11-28 15:25:35', 0),
(397, 26, 'Updated record with ID: 25 : 127.0.0.1', 'gfusers', '2012-11-28 15:27:11', 0),
(398, 26, 'logged out from: 127.0.0.1', 'users', '2012-11-28 15:28:40', 0),
(399, 25, 'logged in from: 127.0.0.1', 'users', '2012-11-28 15:28:53', 0),
(400, 25, 'Updated record with ID: 24 : 127.0.0.1', 'gfusers', '2012-11-28 15:29:41', 0),
(401, 25, 'logged out from: 127.0.0.1', 'users', '2012-11-28 15:30:46', 0),
(402, 24, 'logged in from: 127.0.0.1', 'users', '2012-11-28 15:30:54', 0),
(403, 24, 'Updated record with ID: 23 : 127.0.0.1', 'gfusers', '2012-11-28 15:32:55', 0),
(404, 1, 'Updated record with ID: 2 : 127.0.0.1', 'gfusers', '2012-11-28 16:04:37', 0),
(405, 1, 'Updated record with ID: 2 : 127.0.0.1', 'gfusers', '2012-11-28 16:23:41', 0),
(406, 3, 'Updated record with ID: 1 : 127.0.0.1', 'gfusers', '2012-11-28 16:25:48', 0),
(407, 1, 'Created record with ID: 8 : 127.0.0.1', 'crop', '2012-11-28 17:06:49', 0),
(408, 3, 'logged in from: 127.0.0.1', 'users', '2012-12-03 12:57:01', 0),
(409, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-03 12:57:43', 0),
(410, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-03 17:16:46', 0),
(411, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-04 13:51:03', 0),
(412, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-05 14:27:08', 0),
(413, 1, 'Created Module: keywords : 127.0.0.1', 'modulebuilder', '2012-12-05 16:52:07', 0),
(414, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-06 14:18:31', 0),
(415, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-06 16:55:33', 0),
(416, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-07 07:50:28', 0),
(417, 3, 'logged in from: 127.0.0.1', 'users', '2012-12-07 12:10:54', 0),
(418, 3, 'logged in from: 127.0.0.1', 'users', '2012-12-13 11:17:53', 0),
(419, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-13 11:18:52', 0),
(420, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-13 13:25:26', 0),
(421, 1, 'logged in from: 127.0.0.1', 'users', '2012-12-13 13:27:25', 0),
(422, 3, 'logged in from: 127.0.0.1', 'users', '2012-12-13 15:22:32', 0);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_crop`
--

CREATE TABLE IF NOT EXISTS `bf_crop` (
  `crop_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `crop` varchar(250) NOT NULL,
  `variety` varchar(255) NOT NULL,
  `hectar` int(10) NOT NULL,
  `certification` varchar(255) NOT NULL,
  `conventional_crops` varchar(255) NOT NULL,
  `integrated_crop` varchar(255) NOT NULL,
  `organic` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`crop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_crop`
--

INSERT INTO `bf_crop` (`crop_id`, `user_id`, `crop`, `variety`, `hectar`, `certification`, `conventional_crops`, `integrated_crop`, `organic`, `comment`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, '1', '1', 11, '1', '0', '0', '0', 'kgkhjg kjhg kjh gkjhg kjhg kj;', 0, '2012-11-20 17:34:30', '2012-11-22 12:09:07'),
(2, 1, '4', '7', 22, '2', '0', '0', '0', 'kjhg kjhkj hg kjhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjhgkjhgkjhg kjhg kjh gkjhg kjhg kjhg kjh kjh kjh kjh', 0, '2012-11-20 17:34:50', '0000-00-00 00:00:00'),
(3, 1, '2', '4', 54, '2', '0', '0', '0', 'If you''re interested in helping out, fork the project and start coding! I''d love to have you on board. You can always shoot me an email at lonnieje@gmail.com and we can talk about how you''ll best fit it and what the best place to start coding would be.', 0, '2012-11-22 14:12:01', '0000-00-00 00:00:00'),
(4, 1, '2', '3', 32, '1', '0', '0', '0', '', 0, '2012-11-22 14:12:16', '0000-00-00 00:00:00'),
(5, 1, '3', '5', 6, '0', '0', '0', '0', 'We strive to make Bonfire a solid base to work with. In doing so your Bug Reports are very vital to us. Before making a Bug Report please check the existing Issue Tracker , if the bug you have found does not exist in the issue tracker already, please text a minute to read the guide lines to making a Good Bug report.', 0, '2012-11-22 14:12:42', '0000-00-00 00:00:00'),
(6, 1, '4', '8', 12, '2', '0', '0', '0', 'We strive to make Bonfire a solid base to work with. In doing so your Bug Reports are very vital to us. Before making a Bug Report please check the existing Issue Tracker , if the bug you have found does not exist in the issue tracker already, please text a minute to read the guide lines to making a Good Bug report.', 0, '2012-11-22 14:13:05', '0000-00-00 00:00:00'),
(7, 24, '1', '1', 11, '1', '0', '0', '0', '.asjhd askdhlkajshd kajshd lkajsh dlkajhd lak', 0, '2012-11-22 14:23:20', '0000-00-00 00:00:00'),
(8, 1, '1', '2', 221, '2', '0', '0', '0', '0', 0, '2012-11-28 17:06:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_crop_crops`
--

CREATE TABLE IF NOT EXISTS `bf_crop_crops` (
  `crop_crops_id` int(11) NOT NULL AUTO_INCREMENT,
  `crops_gr` varchar(255) NOT NULL,
  `crops_en` varchar(255) NOT NULL,
  PRIMARY KEY (`crop_crops_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_crop_crops`
--

INSERT INTO `bf_crop_crops` (`crop_crops_id`, `crops_gr`, `crops_en`) VALUES
(1, 'Ροδάκινα', 'Peach'),
(2, 'Μήλα', 'Apple'),
(3, 'Αχλάδια', 'Pears'),
(4, 'Νεκταρίνια', 'Nectarines');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_crop_demand`
--

CREATE TABLE IF NOT EXISTS `bf_crop_demand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `crop_id` bigint(20) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_type_id` int(2) NOT NULL,
  `packaging_id` int(2) NOT NULL,
  `price` int(11) NOT NULL,
  `price_per` int(2) NOT NULL,
  `release_date` date NOT NULL DEFAULT '0000-00-00',
  `comment` text NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_crop_offer`
--

CREATE TABLE IF NOT EXISTS `bf_crop_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `from_user_crop` bigint(20) NOT NULL,
  `crop_id` bigint(20) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_type_id` int(2) NOT NULL,
  `packaging_id` int(2) NOT NULL,
  `quality_id` int(2) NOT NULL,
  `price` int(11) NOT NULL,
  `price_per` int(1) NOT NULL,
  `release_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_crop_offer`
--

INSERT INTO `bf_crop_offer` (`id`, `user_id`, `from_user_crop`, `crop_id`, `variety_id`, `quantity`, `quantity_type_id`, `packaging_id`, `quality_id`, `price`, `price_per`, `release_date`, `comment`, `image`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, 1, 1, 1, 11, 1, 1, 1, 1350, 1, '2012-11-22 00:00:00', 'That''s Bonfire''s goal: provide a solid base off of which to build your new web applications. It''s not a CMS. Instead, it''s a springboard to build off of with many of the tools you wish you had on projects but never took the time to build.', '0', 0, '2012-11-22 12:14:12', '2012-11-22 12:29:27'),
(2, 1, 2, 4, 7, 22, 1, 2, 2, 467, 1, '2012-11-22 00:00:00', 'If you''re interested in helping out, fork the project and start coding! I''d love to have you on board. You can always shoot me an email at lonnieje@gmail.com and we can talk about how you''ll best fit it and what the best place to start coding would be.', '0', 0, '2012-11-22 13:07:36', '0000-00-00 00:00:00'),
(3, 1, 1, 1, 1, 5, 1, 2, 3, 334, 1, '2012-11-08 00:00:00', 'NOTE: Latest database dump can be found under bonfire/application/db/backups. Import that into a new database, and setup your database connections and you should be good to go. You can login to the admin /admin with email: admin@bonfire.com, pass: bonfire.', '0', 0, '2012-11-22 14:11:27', '0000-00-00 00:00:00'),
(4, 24, 7, 1, 1, 5, 1, 2, 1, 435, 1, '2012-11-22 00:00:00', 'sdkjhlsdk jhf ksdlhkfj shldkjfh lskdjhf lskjd hflskjdhf lskjhfd lksjd hlfksjdh flkjshd lfkjsh flk', '0', 0, '2012-11-22 14:24:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_crop_variety`
--

CREATE TABLE IF NOT EXISTS `bf_crop_variety` (
  `crop_variety_id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` int(11) NOT NULL,
  `crop_variety_gr` varchar(250) NOT NULL,
  `crop_variety_en` varchar(250) CHARACTER SET utf32 NOT NULL,
  PRIMARY KEY (`crop_variety_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_crop_variety`
--

INSERT INTO `bf_crop_variety` (`crop_variety_id`, `crop_id`, `crop_variety_gr`, `crop_variety_en`) VALUES
(1, 1, 'Έβερτ', 'Evert'),
(2, 1, 'Κατερίνα', 'Caterina'),
(3, 2, 'Γκόλντεν', 'Golden'),
(4, 2, 'Γκράνι Σμίθ', 'Grand Smith'),
(5, 3, 'Ντελίσιους', 'Delicious'),
(6, 3, 'Βίλιαμς', 'Williams'),
(7, 4, 'Σαν Γκολντ', 'Sun Gold'),
(8, 4, 'Σβέετ Σιξτιν', 'Sweet Sixteen');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_email_queue`
--

CREATE TABLE IF NOT EXISTS `bf_email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(128) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_followers`
--

CREATE TABLE IF NOT EXISTS `bf_followers` (
  `foll_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `follower_id` bigint(20) NOT NULL,
  `block` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`foll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_followers`
--

INSERT INTO `bf_followers` (`foll_id`, `user_id`, `follower_id`, `block`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 3, 1, 0, 0, '2012-11-07 00:30:11', '2012-11-12 15:13:54'),
(2, 1, 3, 0, 0, '2012-11-07 09:14:07', '0000-00-00 00:00:00'),
(3, 3, 2, 0, 0, '2012-11-08 17:05:38', '2012-11-12 15:13:07'),
(4, 1, 2, 0, 0, '2012-11-12 15:09:38', '2012-11-14 16:19:27'),
(5, 2, 3, 0, 0, '2012-11-12 16:44:36', '0000-00-00 00:00:00'),
(6, 5, 3, 0, 0, '2012-11-14 16:07:56', '0000-00-00 00:00:00'),
(7, 5, 2, 0, 0, '2012-11-14 16:07:58', '0000-00-00 00:00:00'),
(8, 5, 1, 0, 0, '2012-11-14 16:07:59', '0000-00-00 00:00:00'),
(9, 1, 5, 0, 0, '2012-11-14 16:19:29', '0000-00-00 00:00:00'),
(10, 26, 2, 0, 0, '2012-11-15 15:41:15', '0000-00-00 00:00:00'),
(11, 3, 19, 0, 0, '2012-11-15 15:44:06', '0000-00-00 00:00:00'),
(12, 3, 26, 0, 0, '2012-11-15 15:44:10', '0000-00-00 00:00:00'),
(13, 26, 3, 0, 0, '2012-11-15 17:46:39', '0000-00-00 00:00:00'),
(14, 22, 3, 0, 0, '2012-11-15 17:47:53', '0000-00-00 00:00:00'),
(15, 6, 1, 0, 0, '2012-11-16 16:14:34', '0000-00-00 00:00:00'),
(16, 1, 6, 0, 0, '2012-11-16 16:49:11', '0000-00-00 00:00:00'),
(17, 22, 1, 0, 0, '2012-11-16 16:55:35', '0000-00-00 00:00:00'),
(18, 24, 1, 0, 0, '2012-11-16 17:08:01', '0000-00-00 00:00:00'),
(19, 21, 1, 0, 0, '2012-11-16 17:21:11', '0000-00-00 00:00:00'),
(20, 2, 1, 0, 0, '2012-11-16 17:21:47', '0000-00-00 00:00:00'),
(21, 1, 22, 0, 1, '2012-11-16 17:36:05', '2012-11-16 17:40:57'),
(22, 1, 7, 0, 0, '2012-11-16 17:41:30', '0000-00-00 00:00:00'),
(23, 1, 8, 0, 0, '2012-11-16 17:41:34', '0000-00-00 00:00:00'),
(24, 1, 9, 0, 0, '2012-11-16 17:41:37', '0000-00-00 00:00:00'),
(25, 1, 10, 0, 0, '2012-11-16 17:41:41', '0000-00-00 00:00:00'),
(26, 1, 11, 0, 0, '2012-11-16 17:41:44', '0000-00-00 00:00:00'),
(27, 1, 12, 0, 0, '2012-11-16 17:41:55', '0000-00-00 00:00:00'),
(28, 1, 13, 0, 0, '2012-11-16 17:41:59', '0000-00-00 00:00:00'),
(29, 1, 14, 0, 0, '2012-11-16 17:42:03', '0000-00-00 00:00:00'),
(30, 1, 15, 0, 0, '2012-11-16 17:42:06', '0000-00-00 00:00:00'),
(31, 1, 16, 0, 0, '2012-11-16 17:42:11', '0000-00-00 00:00:00'),
(32, 1, 17, 0, 0, '2012-11-16 17:42:14', '0000-00-00 00:00:00'),
(33, 1, 18, 0, 0, '2012-11-16 17:42:18', '0000-00-00 00:00:00'),
(34, 1, 19, 0, 0, '2012-11-16 17:42:37', '0000-00-00 00:00:00'),
(35, 1, 20, 0, 0, '2012-11-16 17:42:41', '0000-00-00 00:00:00'),
(36, 1, 21, 0, 0, '2012-11-16 17:42:45', '0000-00-00 00:00:00'),
(37, 1, 23, 0, 0, '2012-11-16 17:42:50', '0000-00-00 00:00:00'),
(38, 1, 24, 0, 0, '2012-11-16 17:42:54', '0000-00-00 00:00:00'),
(39, 1, 25, 0, 0, '2012-11-16 17:42:58', '0000-00-00 00:00:00'),
(40, 1, 26, 0, 0, '2012-11-16 17:43:03', '0000-00-00 00:00:00'),
(41, 21, 5, 0, 0, '2012-11-16 17:43:46', '0000-00-00 00:00:00'),
(42, 24, 21, 0, 0, '2012-11-16 17:45:30', '0000-00-00 00:00:00'),
(43, 21, 24, 0, 0, '2012-11-16 17:47:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_gfusers`
--

CREATE TABLE IF NOT EXISTS `bf_gfusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT '""',
  `last_name` varchar(255) DEFAULT NULL,
  `comp_name` varchar(255) NOT NULL,
  `comp_description` text NOT NULL,
  `comp_category` varchar(255) NOT NULL,
  `comp_email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_1` varchar(100) NOT NULL,
  `phone_2` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `is_farmer` int(1) NOT NULL,
  `is_company` int(1) NOT NULL,
  `is_user` int(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_gfusers`
--

INSERT INTO `bf_gfusers` (`id`, `user_id`, `name`, `last_name`, `comp_name`, `comp_description`, `comp_category`, `comp_email`, `website`, `address`, `city`, `state`, `zip`, `country`, `phone_1`, `phone_2`, `fax`, `image`, `is_farmer`, `is_company`, `is_user`, `deleted`, `created_on`, `modified_on`) VALUES
(1, '3', 'kostas1', 'kakoulis1', '', '', '', '0', '0', '0', '0', 'Θεσσαλονίκης', '0', 'Ελλάδα', '0', '0', '0', '', 1, 0, 0, 0, '2012-09-13 20:04:19', '2012-11-28 16:25:48'),
(2, '1', 'kostas73', 'kakoulis', '', '', '', '0', '0', '0', '0', 'Πιέρια', '0', 'Ελλάδα', '0', '0', '0', '', 1, 0, 0, 0, '2012-09-13 20:12:39', '2012-11-28 16:23:41'),
(3, '2', 'kostas', 'kakoulis', '', '', '', '', '', '', '', '', '', '', '', '', '', '1352713135-2.jpg', 1, 0, 1, 0, '2012-11-07 09:42:36', '2012-11-12 13:38:55'),
(4, '5', 'Κώστας2', 'Κακούλης', '', '', '', 'info@cypris.eu', 'www.cypris.eu', '', 'Βέροια', 'Ημαθία', '', 'Ελλάδα', '', '', '', '1352894851-5.jpg', 1, 0, 1, 0, '2012-11-14 16:04:51', '2012-11-14 16:07:32'),
(5, '6', 'kostas3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1352960578-6.jpg', 1, 0, 1, 0, '2012-11-15 10:22:30', '2012-11-15 10:22:58'),
(6, '7', 'kostas4', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:36:58', '0000-00-00 00:00:00'),
(7, '8', 'kostas5', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:37:28', '0000-00-00 00:00:00'),
(8, '9', 'kostas6', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:37:47', '0000-00-00 00:00:00'),
(9, '10', 'kostas7', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:38:07', '0000-00-00 00:00:00'),
(10, '11', 'kostas8', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:38:40', '0000-00-00 00:00:00'),
(11, '12', 'kostas9', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:39:02', '0000-00-00 00:00:00'),
(12, '13', 'noula1', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:47:27', '0000-00-00 00:00:00'),
(13, '14', 'noula2', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 10:54:32', '0000-00-00 00:00:00'),
(14, '16', 'noula4', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 13:55:54', '0000-00-00 00:00:00'),
(15, '15', 'noula3', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 13:56:34', '0000-00-00 00:00:00'),
(16, '17', 'noula5', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 14:56:54', '0000-00-00 00:00:00'),
(17, '18', 'noula6', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 14:57:15', '0000-00-00 00:00:00'),
(18, '19', 'noula7', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 14:57:36', '0000-00-00 00:00:00'),
(19, '20', 'noula8', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 14:57:58', '0000-00-00 00:00:00'),
(20, '21', 'noula9', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '1353072362-21.jpg', 1, 0, 1, 0, '2012-11-15 15:15:21', '2012-11-16 17:26:02'),
(21, '22', 'niki1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 15:15:54', '0000-00-00 00:00:00'),
(22, '23', 'niki2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 1, 0, '2012-11-15 15:16:12', '2012-11-15 15:23:35'),
(23, '24', 'Νίκη3', 'Κακούλη3', '', '', '', '0', '0', '0', '0', 'Καρδίτσας', '0', 'Ελλάδα', '0', '0', '0', '', 1, 0, 0, 0, '2012-11-15 15:32:56', '2012-11-28 15:32:55'),
(24, '25', 'Νίκη4', 'Κακούλη4', '', '', '', '0', '0', '0', '0', 'Πιερίων', '0', 'Ελλάδα', '0', '0', '0', '', 1, 0, 1, 0, '0000-00-00 00:00:00', '2012-11-28 15:29:41'),
(25, '26', 'Νίκη5', 'Κακούλη5', '', '', '', '0', '0', '0', '0', 'Αττική', '0', 'Ελλάδα', '0', '0', '0', '', 1, 0, 1, 0, '0000-00-00 00:00:00', '2012-11-28 15:27:11'),
(26, '27', 'Νίκη', 'Κακούλη', '', '', '', '0', '0', '0', '0', 'Ημαθία', '0', 'Ελλάδα', '0', '0', '0', '', 1, 0, 1, 0, '0000-00-00 00:00:00', '2012-11-28 14:57:26');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_keywords`
--

CREATE TABLE IF NOT EXISTS `bf_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `cat_id` int(6) NOT NULL,
  `product_id` int(10) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_login_attempts`
--

CREATE TABLE IF NOT EXISTS `bf_login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_messages`
--

CREATE TABLE IF NOT EXISTS `bf_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `to` int(20) NOT NULL,
  `from` int(20) NOT NULL,
  `attachment` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `body` longtext NOT NULL,
  `box` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `read` int(1) NOT NULL,
  `sent_copy` int(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_messages`
--

INSERT INTO `bf_messages` (`msg_id`, `to`, `from`, `attachment`, `subject`, `body`, `box`, `date`, `read`, `sent_copy`, `deleted`, `created_on`, `modified_on`) VALUES
(3, 3, 1, '', 'first test mail to kostas1, from admin', 'saiuhiuashldkjahs kj aslj dlaskjh lksah ldkja', 'INBOX', '2012-10-03', 0, 0, 0, '2012-10-03 08:35:57', '0000-00-00 00:00:00'),
(4, 3, 1, '', 'first test mail to kostas1, from admin', 'saiuhiuashldkjahs kj aslj dlaskjh lksah ldkja', 'SEND', '2012-10-03', 1, 1, 0, '2012-10-03 08:35:57', '2012-12-05 16:43:36'),
(5, 1, 3, '', 'this a test mail to admin, from kostas1', 'sdjlkfhls kjdhlkjshd lkjhf slkjhd lksjhd fljksh dlfskj hdflkj shlkjdh lkdsj hf', 'INBOX', '2012-10-03', 1, 0, 0, '2012-10-03 08:43:11', '2012-12-05 16:43:56'),
(6, 1, 3, '', 'this a test mail to admin, from kostas1', 'sdjlkfhls kjdhlkjshd lkjhf slkjhd lksjhd fljksh dlfskj hdflkj shlkjdh lkdsj hf', 'SEND', '2012-10-03', 1, 1, 0, '2012-10-03 08:43:11', '2012-11-12 14:46:39');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_news_articles`
--

CREATE TABLE IF NOT EXISTS `bf_news_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL DEFAULT '-1',
  `title` varchar(255) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `body` longtext,
  `attachment` varchar(1000) NOT NULL,
  `image_align` varchar(255) NOT NULL,
  `image_caption` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `created_on` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL DEFAULT '-1',
  `modified_on` int(11) NOT NULL DEFAULT '0',
  `modified_by` int(11) NOT NULL DEFAULT '-1',
  `status_id` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `image_alttag` varchar(255) NOT NULL DEFAULT '',
  `image_title` varchar(255) NOT NULL DEFAULT '',
  `comments_thread_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_news_articles`
--

INSERT INTO `bf_news_articles` (`id`, `author`, `title`, `date`, `body`, `attachment`, `image_align`, `image_caption`, `tags`, `created_on`, `created_by`, `modified_on`, `modified_by`, `status_id`, `category_id`, `date_published`, `deleted`, `image_alttag`, `image_title`, `comments_thread_id`) VALUES
(1, 1, 'Test News Article', 1350021028, '<b>This is a test</b><br />Testing how this all works out.</b>', '', '-1', '', 'news,article,first', 1350121028, 1, 1350121028, 1, 1, 1, 1329174000, 0, '', '', 0),
(2, 1, 'A sample news article with title', 1350121028, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse est dolor, pellentesque a aliquet commodo, vestibulum quis enim. Ut aliquet rutrum purus, in vestibulum augue mattis eget. Aliquam iaculis lacinia neque, nec ultrices lorem aliquet eu. Suspendisse potenti. Nullam elementum feugiat blandit. Nullam ultricies leo libero, venenatis molestie diam. Proin mollis libero vitae nunc mattis rutrum.', '', '-1', '', 'lipsum, news, title, content, fresh', 1350121028, 1, 1350121028, 1, 1, 1, 1333231200, 0, '', '', 0),
(3, 1, 'Test News Article', 1352139995, '<b>This is a test</b><br />Testing how this all works out.</b>', '', '-1', '', 'news,article,first', 1352239995, 1, 1352239995, 1, 1, 1, 1329170400, 0, '', '', 0),
(4, 1, 'A sample news article with title', 1352239995, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse est dolor, pellentesque a aliquet commodo, vestibulum quis enim. Ut aliquet rutrum purus, in vestibulum augue mattis eget. Aliquam iaculis lacinia neque, nec ultrices lorem aliquet eu. Suspendisse potenti. Nullam elementum feugiat blandit. Nullam ultricies leo libero, venenatis molestie diam. Proin mollis libero vitae nunc mattis rutrum.', '', '-1', '', 'lipsum, news, title, content, fresh', 1352239995, 1, 1352239995, 1, 1, 1, 1333227600, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_news_categories`
--

CREATE TABLE IF NOT EXISTS `bf_news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_news_categories`
--

INSERT INTO `bf_news_categories` (`id`, `category`, `default`) VALUES
(-1, 'Unknown', 0),
(1, 'Default', 1);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_news_status`
--

CREATE TABLE IF NOT EXISTS `bf_news_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_news_status`
--

INSERT INTO `bf_news_status` (`id`, `status`, `default`) VALUES
(-1, 'Unknown', 0),
(1, 'Draft', 1),
(2, 'In Review', 0),
(3, 'Published', 0),
(4, 'Archived', 0);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_permissions`
--

CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=229 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_permissions`
--

INSERT INTO `bf_permissions` (`permission_id`, `name`, `description`, `status`) VALUES
(2, 'Site.Content.View', 'Allow users to view the Content Context', 'active'),
(3, 'Site.Reports.View', 'Allow users to view the Reports Context', 'active'),
(4, 'Site.Settings.View', 'Allow users to view the Settings Context', 'active'),
(5, 'Site.Developer.View', 'Allow users to view the Developer Context', 'active'),
(6, 'Bonfire.Roles.Manage', 'Allow users to manage the user Roles', 'active'),
(7, 'Bonfire.Users.Manage', 'Allow users to manage the site Users', 'active'),
(8, 'Bonfire.Users.View', 'Allow users access to the User Settings', 'active'),
(9, 'Bonfire.Users.Add', 'Allow users to add new Users', 'active'),
(10, 'Bonfire.Database.Manage', 'Allow users to manage the Database settings', 'active'),
(11, 'Bonfire.Emailer.Manage', 'Allow users to manage the Emailer settings', 'active'),
(12, 'Bonfire.Logs.View', 'Allow users access to the Log details', 'active'),
(13, 'Bonfire.Logs.Manage', 'Allow users to manage the Log files', 'active'),
(14, 'Bonfire.Emailer.View', 'Allow users access to the Emailer settings', 'active'),
(15, 'Site.Signin.Offline', 'Allow users to login to the site when the site is offline', 'active'),
(16, 'Bonfire.Permissions.View', 'Allow access to view the Permissions menu unders Settings Context', 'active'),
(17, 'Bonfire.Permissions.Manage', 'Allow access to manage the Permissions in the system', 'active'),
(18, 'Bonfire.Roles.Delete', 'Allow users to delete user Roles', 'active'),
(19, 'Bonfire.Modules.Add', 'Allow creation of modules with the builder.', 'active'),
(20, 'Bonfire.Modules.Delete', 'Allow deletion of modules.', 'active'),
(21, 'Permissions.Administrator.Manage', 'To manage the access control permissions for the Administrator role.', 'active'),
(22, 'Permissions.Editor.Manage', 'To manage the access control permissions for the Editor role.', 'active'),
(24, 'Permissions.User.Manage', 'To manage the access control permissions for the User role.', 'active'),
(25, 'Permissions.Developer.Manage', 'To manage the access control permissions for the Developer role.', 'active'),
(27, 'Activities.Own.View', 'To view the users own activity logs', 'active'),
(28, 'Activities.Own.Delete', 'To delete the users own activity logs', 'active'),
(29, 'Activities.User.View', 'To view the user activity logs', 'active'),
(30, 'Activities.User.Delete', 'To delete the user activity logs, except own', 'active'),
(31, 'Activities.Module.View', 'To view the module activity logs', 'active'),
(32, 'Activities.Module.Delete', 'To delete the module activity logs', 'active'),
(33, 'Activities.Date.View', 'To view the users own activity logs', 'active'),
(34, 'Activities.Date.Delete', 'To delete the dated activity logs', 'active'),
(35, 'Bonfire.UI.Manage', 'Manage the Bonfire UI settings', 'active'),
(36, 'Bonfire.Settings.View', 'To view the site settings page.', 'active'),
(37, 'Bonfire.Settings.Manage', 'To manage the site settings.', 'active'),
(38, 'Bonfire.Activities.View', 'To view the Activities menu.', 'active'),
(39, 'Bonfire.Database.View', 'To view the Database menu.', 'active'),
(40, 'Bonfire.Migrations.View', 'To view the Migrations menu.', 'active'),
(41, 'Bonfire.Builder.View', 'To view the Modulebuilder menu.', 'active'),
(42, 'Bonfire.Roles.View', 'To view the Roles menu.', 'active'),
(43, 'Bonfire.Sysinfo.View', 'To view the System Information page.', 'active'),
(44, 'Bonfire.Translate.Manage', 'To manage the Language Translation.', 'active'),
(45, 'Bonfire.Translate.View', 'To view the Language Translate menu.', 'active'),
(46, 'Bonfire.UI.View', 'To view the UI/Keyboard Shortcut menu.', 'active'),
(47, 'Bonfire.Update.Manage', 'To manage the Bonfire Update.', 'active'),
(48, 'Bonfire.Update.View', 'To view the Developer Update menu.', 'active'),
(49, 'Bonfire.Profiler.View', 'To view the Console Profiler Bar.', 'active'),
(50, 'Bonfire.Roles.Add', 'To add New Roles', 'active'),
(51, 'Starter.Content.View', '', 'active'),
(52, 'Starter.Content.Create', '', 'active'),
(53, 'Starter.Content.Edit', '', 'active'),
(54, 'Starter.Content.Delete', '', 'active'),
(55, 'Starter.Reports.View', '', 'active'),
(56, 'Starter.Reports.Create', '', 'active'),
(57, 'Starter.Reports.Edit', '', 'active'),
(58, 'Starter.Reports.Delete', '', 'active'),
(59, 'Starter.Settings.View', '', 'active'),
(60, 'Starter.Settings.Create', '', 'active'),
(61, 'Starter.Settings.Edit', '', 'active'),
(62, 'Starter.Settings.Delete', '', 'active'),
(63, 'Starter.Developer.View', '', 'active'),
(64, 'Starter.Developer.Create', '', 'active'),
(65, 'Starter.Developer.Edit', '', 'active'),
(66, 'Starter.Developer.Delete', '', 'active'),
(67, 'Gfusers.Content.View', '', 'active'),
(68, 'Gfusers.Content.Create', '', 'active'),
(69, 'Gfusers.Content.Edit', '', 'active'),
(70, 'Gfusers.Content.Delete', '', 'active'),
(71, 'Gfusers.Reports.View', '', 'active'),
(72, 'Gfusers.Reports.Create', '', 'active'),
(73, 'Gfusers.Reports.Edit', '', 'active'),
(74, 'Gfusers.Reports.Delete', '', 'active'),
(75, 'Gfusers.Settings.View', '', 'active'),
(76, 'Gfusers.Settings.Create', '', 'active'),
(77, 'Gfusers.Settings.Edit', '', 'active'),
(78, 'Gfusers.Settings.Delete', '', 'active'),
(79, 'Gfusers.Developer.View', '', 'active'),
(80, 'Gfusers.Developer.Create', '', 'active'),
(81, 'Gfusers.Developer.Edit', '', 'active'),
(82, 'Gfusers.Developer.Delete', '', 'active'),
(83, 'Crop.Content.View', '', 'active'),
(84, 'Crop.Content.Create', '', 'active'),
(85, 'Crop.Content.Edit', '', 'active'),
(86, 'Crop.Content.Delete', '', 'active'),
(87, 'Crop.Reports.View', '', 'active'),
(88, 'Crop.Reports.Create', '', 'active'),
(89, 'Crop.Reports.Edit', '', 'active'),
(90, 'Crop.Reports.Delete', '', 'active'),
(91, 'Crop.Settings.View', '', 'active'),
(92, 'Crop.Settings.Create', '', 'active'),
(93, 'Crop.Settings.Edit', '', 'active'),
(94, 'Crop.Settings.Delete', '', 'active'),
(95, 'Crop.Developer.View', '', 'active'),
(96, 'Crop.Developer.Create', '', 'active'),
(97, 'Crop.Developer.Edit', '', 'active'),
(98, 'Crop.Developer.Delete', '', 'active'),
(99, 'Croffer.Content.View', '', 'active'),
(100, 'Croffer.Content.Create', '', 'active'),
(101, 'Croffer.Content.Edit', '', 'active'),
(102, 'Croffer.Content.Delete', '', 'active'),
(103, 'Croffer.Reports.View', '', 'active'),
(104, 'Croffer.Reports.Create', '', 'active'),
(105, 'Croffer.Reports.Edit', '', 'active'),
(106, 'Croffer.Reports.Delete', '', 'active'),
(107, 'Croffer.Settings.View', '', 'active'),
(108, 'Croffer.Settings.Create', '', 'active'),
(109, 'Croffer.Settings.Edit', '', 'active'),
(110, 'Croffer.Settings.Delete', '', 'active'),
(111, 'Croffer.Developer.View', '', 'active'),
(112, 'Croffer.Developer.Create', '', 'active'),
(113, 'Croffer.Developer.Edit', '', 'active'),
(114, 'Croffer.Developer.Delete', '', 'active'),
(115, 'Crdemand.Modules.View', '', 'active'),
(116, 'Crdemand.Modules.Create', '', 'active'),
(117, 'Crdemand.Modules.Edit', '', 'active'),
(118, 'Crdemand.Modules.Delete', '', 'active'),
(119, 'Crdemand.Content.View', '', 'active'),
(120, 'Crdemand.Content.Create', '', 'active'),
(121, 'Crdemand.Content.Edit', '', 'active'),
(122, 'Crdemand.Content.Delete', '', 'active'),
(123, 'Crdemand.Reports.View', '', 'active'),
(124, 'Crdemand.Reports.Create', '', 'active'),
(125, 'Crdemand.Reports.Edit', '', 'active'),
(126, 'Crdemand.Reports.Delete', '', 'active'),
(127, 'Crdemand.Settings.View', '', 'active'),
(128, 'Crdemand.Settings.Create', '', 'active'),
(129, 'Crdemand.Settings.Edit', '', 'active'),
(130, 'Crdemand.Settings.Delete', '', 'active'),
(131, 'Crdemand.Developer.View', '', 'active'),
(132, 'Crdemand.Developer.Create', '', 'active'),
(133, 'Crdemand.Developer.Edit', '', 'active'),
(134, 'Crdemand.Developer.Delete', '', 'active'),
(135, 'Messages.Content.View', '', 'active'),
(136, 'Messages.Content.Create', '', 'active'),
(137, 'Messages.Content.Edit', '', 'active'),
(138, 'Messages.Content.Delete', '', 'active'),
(139, 'Messages.Reports.View', '', 'active'),
(140, 'Messages.Reports.Create', '', 'active'),
(141, 'Messages.Reports.Edit', '', 'active'),
(142, 'Messages.Reports.Delete', '', 'active'),
(143, 'Messages.Settings.View', '', 'active'),
(144, 'Messages.Settings.Create', '', 'active'),
(145, 'Messages.Settings.Edit', '', 'active'),
(146, 'Messages.Settings.Delete', '', 'active'),
(147, 'Messages.Developer.View', '', 'active'),
(148, 'Messages.Developer.Create', '', 'active'),
(149, 'Messages.Developer.Edit', '', 'active'),
(150, 'Messages.Developer.Delete', '', 'active'),
(151, 'Questions.Modules.View', '', 'active'),
(152, 'Questions.Modules.Create', '', 'active'),
(153, 'Questions.Modules.Edit', '', 'active'),
(154, 'Questions.Modules.Delete', '', 'active'),
(155, 'Questions.Content.View', '', 'active'),
(156, 'Questions.Content.Create', '', 'active'),
(157, 'Questions.Content.Edit', '', 'active'),
(158, 'Questions.Content.Delete', '', 'active'),
(159, 'Questions.Reports.View', '', 'active'),
(160, 'Questions.Reports.Create', '', 'active'),
(161, 'Questions.Reports.Edit', '', 'active'),
(162, 'Questions.Reports.Delete', '', 'active'),
(163, 'Questions.Settings.View', '', 'active'),
(164, 'Questions.Settings.Create', '', 'active'),
(165, 'Questions.Settings.Edit', '', 'active'),
(166, 'Questions.Settings.Delete', '', 'active'),
(167, 'Questions.Developer.View', '', 'active'),
(168, 'Questions.Developer.Create', '', 'active'),
(169, 'Questions.Developer.Edit', '', 'active'),
(170, 'Questions.Developer.Delete', '', 'active'),
(171, 'Site.News.Manage', 'Manage News Content', 'active'),
(172, 'Site.News.Add', 'Add News Content', 'active'),
(173, 'Site.News.Delete', 'Add News Content', 'active'),
(174, 'Followers.Content.View', '', 'active'),
(175, 'Followers.Content.Create', '', 'active'),
(176, 'Followers.Content.Edit', '', 'active'),
(177, 'Followers.Content.Delete', '', 'active'),
(178, 'Followers.Reports.View', '', 'active'),
(179, 'Followers.Reports.Create', '', 'active'),
(180, 'Followers.Reports.Edit', '', 'active'),
(181, 'Followers.Reports.Delete', '', 'active'),
(182, 'Followers.Settings.View', '', 'active'),
(183, 'Followers.Settings.Create', '', 'active'),
(184, 'Followers.Settings.Edit', '', 'active'),
(185, 'Followers.Settings.Delete', '', 'active'),
(186, 'Followers.Developer.View', '', 'active'),
(187, 'Followers.Developer.Create', '', 'active'),
(188, 'Followers.Developer.Edit', '', 'active'),
(189, 'Followers.Developer.Delete', '', 'active'),
(190, 'News.Content.View', 'To view the News Content menu.', 'active'),
(191, 'News.Settings.View', 'To view the News Settings menu.', 'active'),
(192, 'News.Settings.Manage', 'Manage News Settings.', 'active'),
(193, 'Test.Modules.View', '', 'active'),
(194, 'Test.Modules.Create', '', 'active'),
(195, 'Test.Modules.Edit', '', 'active'),
(196, 'Test.Modules.Delete', '', 'active'),
(197, 'Test.Content.View', '', 'active'),
(198, 'Test.Content.Create', '', 'active'),
(199, 'Test.Content.Edit', '', 'active'),
(200, 'Test.Content.Delete', '', 'active'),
(201, 'Test.Reports.View', '', 'active'),
(202, 'Test.Reports.Create', '', 'active'),
(203, 'Test.Reports.Edit', '', 'active'),
(204, 'Test.Reports.Delete', '', 'active'),
(205, 'Test.Settings.View', '', 'active'),
(206, 'Test.Settings.Create', '', 'active'),
(207, 'Test.Settings.Edit', '', 'active'),
(208, 'Test.Settings.Delete', '', 'active'),
(209, 'Test.Developer.View', '', 'active'),
(210, 'Test.Developer.Create', '', 'active'),
(211, 'Test.Developer.Edit', '', 'active'),
(212, 'Test.Developer.Delete', '', 'active'),
(213, 'Wizard.Content.View', '', 'active'),
(214, 'Wizard.Content.Create', '', 'active'),
(215, 'Wizard.Content.Edit', '', 'active'),
(216, 'Wizard.Content.Delete', '', 'active'),
(217, 'Wizard.Reports.View', '', 'active'),
(218, 'Wizard.Reports.Create', '', 'active'),
(219, 'Wizard.Reports.Edit', '', 'active'),
(220, 'Wizard.Reports.Delete', '', 'active'),
(221, 'Wizard.Settings.View', '', 'active'),
(222, 'Wizard.Settings.Create', '', 'active'),
(223, 'Wizard.Settings.Edit', '', 'active'),
(224, 'Wizard.Settings.Delete', '', 'active'),
(225, 'Wizard.Developer.View', '', 'active'),
(226, 'Wizard.Developer.Create', '', 'active'),
(227, 'Wizard.Developer.Edit', '', 'active'),
(228, 'Wizard.Developer.Delete', '', 'active');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_questions`
--

CREATE TABLE IF NOT EXISTS `bf_questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `body` text NOT NULL,
  `category` int(3) NOT NULL,
  `sub_category` int(5) NOT NULL,
  `details` text NOT NULL,
  `note` text NOT NULL,
  `is_answer` tinyint(1) NOT NULL,
  `is_private` tinyint(1) NOT NULL,
  `is_closed` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_questions`
--

INSERT INTO `bf_questions` (`q_id`, `question_id`, `user_id`, `body`, `category`, `sub_category`, `details`, `note`, `is_answer`, `is_private`, `is_closed`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 0, 1, 'πρωτίστη ερώτηση', 1, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:01:54', '0000-00-00 00:00:00'),
(2, 0, 1, 'δεύτερη ερώτηση', 2, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:09:27', '0000-00-00 00:00:00'),
(3, 0, 1, 'τρίτη ερώτηση', 3, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:16:15', '0000-00-00 00:00:00'),
(4, 0, 1, 'τέταρτη ερώτηση', 4, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:16:28', '0000-00-00 00:00:00'),
(5, 0, 1, 'πέμπτη ερώτηση', 5, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:16:40', '0000-00-00 00:00:00'),
(6, 0, 1, 'έκτη ερώτηση', 1, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:16:49', '0000-00-00 00:00:00'),
(7, 0, 1, 'έβδομη ερώτηση', 3, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:17:08', '0000-00-00 00:00:00'),
(8, 0, 1, 'όγδοη ερώτηση', 5, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:17:18', '0000-00-00 00:00:00'),
(9, 0, 1, 'ένατη ερώτηση', 2, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:17:25', '0000-00-00 00:00:00'),
(10, 0, 1, 'δέκατη ερώτηση', 3, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:17:53', '0000-00-00 00:00:00'),
(11, 0, 1, 'ενδέκατη ερώτηση', 5, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:18:05', '0000-00-00 00:00:00'),
(12, 0, 1, 'δωδέκατη ερώτηση', 3, 12, '', '', 0, 0, 0, 0, '2012-10-13 12:18:16', '0000-00-00 00:00:00'),
(13, 1, 1, 'πρώτη απάντηση για την πρώτη ερώτηση', 1, 12, '', '', 1, 0, 0, 0, '2012-10-13 12:21:05', '0000-00-00 00:00:00'),
(14, 1, 1, 'με αφήνεις; Αυτοί θέλουν να συνηθίσουμε αυτά τα νταηλίκια και τα νταβατζιλίκια, δείχνουν στον κόσμο ότι είναι συμπαθητικοί χοντρούληδες, ωστόσο λειτουργούν με όρους συμμορίας».', 1, 12, '', '', 1, 0, 0, 0, '2012-10-13 13:51:51', '0000-00-00 00:00:00'),
(15, 1, 1, 'Ο βουλευτής του ΣΥΡΙΖΑ μιλώντας στην πρωινή εκπομπή του MEGA δήλωσε μετά από μία βραδιά τρομοκρατίας και επίδειξης νταβατζιλικιού, η Χρυσή Αυγή, του 7 % προσπαθεί να επιβάλλει στους άλλους τι θα κάνουν. Μάλιστα, είπε: «Θα τον παίρνουμε τηλέφωνο και θα λέμε, Ηλία θέλω να πάω να δω τον τελευταίο πειρασμό μπορώ, θέλω να δω το', 1, 12, '', '', 1, 0, 0, 0, '2012-10-13 13:52:11', '0000-00-00 00:00:00'),
(16, 1, 1, 'Απάντηση στον Ηλία Κασιδιάρη έδωσε πριν από λίγο ο Πέτρος Τατσόπουλος, για όσα έχουν συμβεί το τελευταίο διήμερο στο θέατρο «Χυτήριο». Υπενθυμίζεται ότι χθες ο κ. Κασιδιάρης τόνισε έξω από τη Βουλή πως «οι Συριζέοι θα τρώνε πόρτα».', 1, 12, '', '', 1, 0, 0, 0, '2012-10-13 13:52:47', '0000-00-00 00:00:00'),
(17, 1, 1, 'λοι οι Ελληνες, άλλος λιγότερο άλλος περισσότερο, έχουν έρθει σε επαφή τρίτου τύπου με το κύκλωμα των «ληστών με τις άσπρες μπλούζες».', 1, 12, '', '', 1, 0, 0, 0, '2012-10-13 13:56:45', '0000-00-00 00:00:00'),
(18, 1, 1, 'Με τη συμφωνία του 2010 η Cosco μίσθωσε το μισό λιμάνι του Πειραιά για 500 εκατομμύρια ευρώ, μετατρέποντας το από μία άτονη επιχείρηση σε ένα τμήμα έντονης...', 1, 12, '', '', 1, 0, 0, 0, '2012-10-13 13:58:04', '0000-00-00 00:00:00'),
(19, 0, 3, 'Τα αχλάδια γιατί παίρνουν το σχήμα της καμπάνας;', 1, 12, 'Αφού τα μήλα έχουν στρόγγυλο σχήμα και με το κοτσάνι από την πάνω πλευρά.', '', 0, 0, 0, 0, '2012-11-12 15:56:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_roles`
--

CREATE TABLE IF NOT EXISTS `bf_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `default_context` varchar(255) NOT NULL DEFAULT 'content',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_roles`
--

INSERT INTO `bf_roles` (`role_id`, `role_name`, `description`, `default`, `can_delete`, `login_destination`, `deleted`, `default_context`) VALUES
(1, 'Administrator', 'Has full control over every aspect of the site.', 0, 0, 'http://localhost/my-pro/gofarmer-dev-026/index.php/gfusers/gf_my_profile', 0, 'content'),
(2, 'Editor', 'Can handle day-to-day management, but does not have full power.', 0, 1, '', 0, 'content'),
(4, 'User', 'This is the default user with access to login.', 1, 0, 'http://localhost/my-pro/gofarmer-dev-026/index.php/gfusers/gf_my_profile', 0, 'content'),
(6, 'Developer', 'Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.', 0, 1, '', 0, 'content');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_role_permissions`
--

CREATE TABLE IF NOT EXISTS `bf_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `bf_role_permissions`
--

INSERT INTO `bf_role_permissions` (`role_id`, `permission_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 24),
(1, 25),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 174),
(1, 175),
(1, 176),
(1, 177),
(1, 178),
(1, 179),
(1, 180),
(1, 181),
(1, 182),
(1, 183),
(1, 184),
(1, 185),
(1, 186),
(1, 187),
(1, 188),
(1, 189),
(1, 190),
(1, 191),
(1, 192),
(1, 193),
(1, 194),
(1, 195),
(1, 196),
(1, 197),
(1, 198),
(1, 199),
(1, 200),
(1, 201),
(1, 202),
(1, 203),
(1, 204),
(1, 205),
(1, 206),
(1, 207),
(1, 208),
(1, 209),
(1, 210),
(1, 211),
(1, 212),
(1, 213),
(1, 214),
(1, 215),
(1, 216),
(1, 217),
(1, 218),
(1, 219),
(1, 220),
(1, 221),
(1, 222),
(1, 223),
(1, 224),
(1, 225),
(1, 226),
(1, 227),
(1, 228),
(2, 2),
(2, 3),
(4, 49),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 49);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_schema_version`
--

CREATE TABLE IF NOT EXISTS `bf_schema_version` (
  `type` varchar(40) NOT NULL,
  `version` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `bf_schema_version`
--

INSERT INTO `bf_schema_version` (`type`, `version`) VALUES
('app_', 0),
('core', 35),
('crdemand_', 2),
('croffer_', 2),
('crop_', 2),
('followers_', 2),
('gfusers_', 2),
('keywords_', 2),
('messages_', 2),
('news_', 3),
('questions_', 2),
('starter_', 1),
('test_', 1),
('wizard_', 2);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_sessions`
--

CREATE TABLE IF NOT EXISTS `bf_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_settings`
--

CREATE TABLE IF NOT EXISTS `bf_settings` (
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `unique - name` (`name`),
  KEY `index - name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `bf_settings`
--

INSERT INTO `bf_settings` (`name`, `module`, `value`) VALUES
('auth.allow_name_change', 'core', '1'),
('auth.allow_register', 'core', '1'),
('auth.allow_remember', 'core', '1'),
('auth.do_login_redirect', 'core', '1'),
('auth.login_type', 'core', 'both'),
('auth.name_change_frequency', 'core', '1'),
('auth.name_change_limit', 'core', '1'),
('auth.password_force_mixed_case', 'core', '0'),
('auth.password_force_numbers', 'core', '0'),
('auth.password_force_symbols', 'core', '0'),
('auth.password_min_length', 'core', '8'),
('auth.password_show_labels', 'core', '1'),
('auth.remember_length', 'core', '1209600'),
('auth.use_extended_profile', 'core', '0'),
('auth.use_usernames', 'core', '1'),
('auth.user_activation_method', 'core', '0'),
('form_save', 'core.ui', 'ctrl+s/⌘+s'),
('goto_content', 'core.ui', 'alt+c'),
('mailpath', 'email', '/usr/sbin/sendmail'),
('mailtype', 'email', 'text'),
('news.allow_attachments', 'news', '1'),
('news.comments_enabled', 'news', '1'),
('news.default_article_count', 'news', '5'),
('news.max_img_disp_height', 'news', '200'),
('news.max_img_disp_width', 'news', '200'),
('news.max_img_height', 'news', '768'),
('news.max_img_size', 'news', '125000'),
('news.max_img_width', 'news', '1024'),
('news.public_moderation', 'news', '1'),
('news.public_submissions', 'news', '1'),
('news.public_submitters', 'news', '1'),
('news.share_delicious', 'news', '1'),
('news.share_email', 'news', '1'),
('news.share_facebook', 'news', '1'),
('news.share_fblike', 'news', '1'),
('news.share_plusone', 'news', '1'),
('news.share_stumbleupon', 'news', '1'),
('news.share_twitter', 'news', '1'),
('news.sharing_enabled', 'news', '1'),
('news.upload_dir_path', 'news', '/assets/uploads/news/'),
('news.upload_dir_url', 'news', '/assets/uploads/news/'),
('protocol', 'email', 'mail'),
('sender_email', 'email', 'kakoulis@hotmail.com'),
('site.languages', 'core', 'a:2:{i:0;s:7:"english";i:1;s:5:"greek";}'),
('site.list_limit', 'core', '25'),
('site.show_front_profiler', 'core', '1'),
('site.show_profiler', 'core', '1'),
('site.status', 'core', '1'),
('site.system_email', 'core', 'kakoulis@hotmail.com'),
('site.title', 'core', 'Gofarmer'),
('smtp_host', 'email', ''),
('smtp_pass', 'email', ''),
('smtp_port', 'email', ''),
('smtp_timeout', 'email', ''),
('smtp_user', 'email', ''),
('updates.bleeding_edge', 'core', '0'),
('updates.do_check', 'core', '0');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_users`
--

CREATE TABLE IF NOT EXISTS `bf_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `email` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` varchar(40) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `salt` varchar(7) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(40) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_message` varchar(255) DEFAULT NULL,
  `reset_by` int(10) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT '',
  `display_name_changed` date DEFAULT NULL,
  `timezone` char(4) NOT NULL DEFAULT 'UM6',
  `language` varchar(20) NOT NULL DEFAULT 'english',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activate_hash` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_users`
--

INSERT INTO `bf_users` (`id`, `role_id`, `email`, `username`, `password_hash`, `reset_hash`, `salt`, `last_login`, `last_ip`, `created_on`, `deleted`, `banned`, `ban_message`, `reset_by`, `display_name`, `display_name_changed`, `timezone`, `language`, `active`, `activate_hash`) VALUES
(1, 1, 'kakoulis@hotmail.com', 'admin', 'fe0370804521ccfa2080bca38f0e8b52bc6f00a7', NULL, 'bHM3cqn', '2012-12-13 13:27:25', '127.0.0.1', '2012-09-01 00:00:00', 0, 0, NULL, NULL, '', NULL, 'UM6', 'greek', 1, ''),
(2, 4, 'kakoulis73@gmail.com', 'kostas', 'b84f891c83d6eb6b989c6dc4d84f054dad888c46', NULL, 'UqKNbZb', '2012-11-19 14:04:23', '127.0.0.1', '2012-09-12 13:04:33', 0, 0, NULL, NULL, 'kostas', NULL, 'UP2', 'greek', 1, ''),
(3, 4, 'kos1@abc.com', 'kostas1', '0d873645c47f2434d74784ac81db453d71d3bb3c', NULL, 'T4qgUvU', '2012-12-13 15:22:32', '127.0.0.1', '2012-09-13 19:50:16', 0, 0, NULL, NULL, 'kostas1', NULL, 'UP2', 'greek', 1, ''),
(5, 4, 'kostas2@gmail.com', 'kostas2', '6ff93753d6745732cd3c909367c9cb40d1a5e7e1', NULL, 'oFZhFIL', '2012-11-27 15:34:25', '127.0.0.1', '2012-11-14 15:29:16', 0, 0, NULL, NULL, 'kostas2', NULL, 'UP2', 'greek', 1, ''),
(6, 4, 'kostas3@abc.com', 'kostas3', 'f9c79e36a134fa028a1366fa8bdc64213144036f', NULL, 'xe8MnkL', '2012-11-16 16:14:22', '127.0.0.1', '2012-11-15 10:20:18', 0, 0, NULL, NULL, 'kostas3', NULL, 'UP2', 'greek', 1, ''),
(7, 4, 'kostas4@abc.com', 'kostas4', 'ab58a161eca82d310428b64e56c6018ad3d1dcbb', NULL, 'JFy5FwC', '2012-11-15 10:36:32', '127.0.0.1', '2012-11-15 10:23:39', 0, 0, NULL, NULL, 'kostas4', NULL, 'UP2', 'greek', 1, ''),
(8, 4, 'kostas5@abc.com', 'kostas5', '9b31ea92bc43d0708b99cae001df2c26d3136e29', NULL, 'BcpWDDW', '2012-11-15 10:37:12', '127.0.0.1', '2012-11-15 10:25:00', 0, 0, NULL, NULL, 'kostas5', NULL, 'UP2', 'greek', 1, ''),
(9, 4, 'kostas6@abc.com', 'kostas6', 'fd9e145e19e40fdc3d906a10d06c8d20b804a2cc', NULL, '0gZY5HF', '2012-11-15 10:37:40', '127.0.0.1', '2012-11-15 10:28:21', 0, 0, NULL, NULL, 'kostas6', NULL, 'UP2', 'greek', 1, ''),
(10, 4, 'kostas7@abc.com', 'kostas7', '4881afbe8059769bd0883d04d298ce2be2f77566', NULL, '69rd612', '2012-11-15 10:37:58', '127.0.0.1', '2012-11-15 10:31:31', 0, 0, NULL, NULL, 'kostas7', NULL, 'UP2', 'greek', 1, ''),
(11, 4, 'kostas8@abc.com', 'kostas8', 'e3c6433c1da3a8b5b27a16b3ad7717636d99dc6c', NULL, 'YG59UPL', '2012-11-15 10:38:31', '127.0.0.1', '2012-11-15 10:34:03', 0, 0, NULL, NULL, 'kostas8', NULL, 'UP2', 'greek', 1, ''),
(12, 4, 'kostas9@abc.com', 'kostas9', '10690b842785667be2e8729cffbdd2b19e386b40', NULL, 'djo9V4e', '2012-11-15 10:38:50', '127.0.0.1', '2012-11-15 10:35:34', 0, 0, NULL, NULL, 'kostas9', NULL, 'UP2', 'greek', 1, ''),
(13, 4, 'noula1@abc.com', 'noula1', '14c59484e1ee04130cf26cc4412280d07811857d', NULL, '2BNFK7r', '2012-11-15 10:47:16', '127.0.0.1', '2012-11-15 10:45:48', 0, 0, NULL, NULL, 'noula1', NULL, 'UP2', 'greek', 1, ''),
(14, 4, 'noula2@abc.com', 'noula2', 'bea3853709607e9d839dbd63fe3018583894394b', NULL, 'kekfLX8', '2012-11-15 10:54:22', '127.0.0.1', '2012-11-15 10:48:08', 0, 0, NULL, NULL, 'noula2', NULL, 'UP2', 'greek', 1, ''),
(15, 4, 'noula3@abc.com', 'noula3', 'ca9708c3bd09494f639c0a55396fbf162fbd0aa1', NULL, 'BGLTBcH', '2012-11-15 13:56:11', '127.0.0.1', '2012-11-15 10:57:00', 0, 0, NULL, NULL, 'noula3', NULL, 'UP2', 'greek', 1, ''),
(16, 4, 'noula4@abc.com', 'noula4', 'ed60c22d5f686a2f91d56fcdef0be5e0f46b1f12', NULL, 'CKKHb1L', '2012-11-15 14:44:39', '127.0.0.1', '2012-11-15 13:50:50', 0, 0, NULL, NULL, 'noula4', NULL, 'UP2', 'greek', 1, ''),
(17, 4, 'noula5@abc.com', 'noula5', '3b5b1b123ae47693f513cec43c9e36aa876dfab0', NULL, 'DBu5vRq', '2012-11-15 14:56:30', '127.0.0.1', '2012-11-15 14:45:44', 0, 0, NULL, NULL, 'noula5', NULL, 'UP2', 'greek', 1, ''),
(18, 4, 'noula6@abc.com', 'noula6', 'd917eab7d390a81ea86ad671a419339d128154b2', NULL, 'Qc3p2fX', '2012-11-15 14:57:03', '127.0.0.1', '2012-11-15 14:48:43', 0, 0, NULL, NULL, 'noula6', NULL, 'UP2', 'greek', 1, ''),
(19, 4, 'noula7@abc.com', 'noula7', 'ec101c082a0cc33f1c0b0e2490dc9c706a33ca2e', NULL, 'D7kpRiu', '2012-11-15 14:57:24', '127.0.0.1', '2012-11-15 14:50:30', 0, 0, NULL, NULL, 'noula7', NULL, 'UP2', 'greek', 1, ''),
(20, 4, 'noula8@abc.com', 'noula8', 'c39a3e8fe5326b279a25ed5a69a90f2948392d7e', NULL, 'cx9Ihuq', '2012-11-15 14:57:47', '127.0.0.1', '2012-11-15 14:55:24', 0, 0, NULL, NULL, 'noula8', NULL, 'UP2', 'greek', 1, ''),
(21, 4, 'noula9@abc.com', 'noula9', '381aba80aa5df8c713c8f19ae2841e3ca4edcc4d', NULL, 'zlShvVc', '2012-11-16 17:44:29', '127.0.0.1', '2012-11-15 15:05:35', 0, 0, NULL, NULL, 'noula9', NULL, 'UP2', 'greek', 1, ''),
(22, 4, 'niki1@abc.com', 'niki1', '80c8366296c5bd869c00266549906aca2f5ebcae', NULL, 'hicTo5N', '2012-11-16 16:55:22', '127.0.0.1', '2012-11-15 15:10:21', 0, 0, NULL, NULL, 'niki1', NULL, 'UP2', 'greek', 1, ''),
(23, 4, 'niki2@abc.com', 'niki2', '60ae62918820744bc70cf20c25765b09880fc4fd', NULL, 'UHCxHuo', '2012-11-15 15:16:02', '127.0.0.1', '2012-11-15 15:12:35', 0, 0, NULL, NULL, 'niki2', NULL, 'UP2', 'greek', 1, ''),
(24, 4, 'niki3@abc.com', 'niki3', 'd021a97798964e26dadf98e674e789684f6117cd', NULL, 'pAOrzwI', '2012-11-28 15:30:54', '127.0.0.1', '2012-11-15 15:31:24', 0, 0, NULL, NULL, 'niki3', NULL, 'UP2', 'greek', 1, ''),
(25, 4, 'niki4@abc.com', 'niki4', '1a38c65012c802de6fdea536e315fe0533e6cc8a', NULL, '9MgfhEe', '2012-11-28 15:28:53', '127.0.0.1', '2012-11-15 15:38:00', 0, 0, NULL, NULL, 'niki4', NULL, 'UP2', 'greek', 1, ''),
(26, 4, 'niki5@abc.com', 'niki5', '3cc36b8918ec5bf40683d6c0a4f12478cea545fd', NULL, 'fVWZBkj', '2012-11-28 15:25:35', '127.0.0.1', '2012-11-15 15:39:56', 0, 0, NULL, NULL, 'niki5', NULL, 'UP2', 'greek', 1, ''),
(27, 4, 'niki6@abc.com', 'niki6', '3de0376738277cfd0d617a7d24be14508994226b', NULL, 'G1z1Lwp', '2012-11-28 14:56:15', '127.0.0.1', '2012-11-28 14:56:04', 0, 0, NULL, NULL, 'niki6', NULL, 'UP2', 'greek', 1, '');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_user_cookies`
--

CREATE TABLE IF NOT EXISTS `bf_user_cookies` (
  `user_id` bigint(20) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `bf_user_cookies`
--

INSERT INTO `bf_user_cookies` (`user_id`, `token`, `created_on`) VALUES
(1, 'afQhaT4D9H4pGYkp9fPxjLj8G8tlq5Gw7YAcjXlbAcUY3RxgKPO0WS6HAjiXJeCc9mifViS86qvXMYTGMXgdRaSeejjXg2iSF0E9lqOnxmKFbwk1MGk1X2pWcrzCxOZp', '2012-11-14 18:48:40'),
(2, 'pS0Phuwh6FsrJQPz2E2URjPJ4GG3bL1Mi8cCY05oURmYbeKAuuQZS5rLIFFWBSKfIO76PpVDYsT5z0hkE6qIjHjracB5814Yo9ffSnJacUqM00xLz5nRnyq3Mx9wh7Xg', '2012-11-26 11:52:37'),
(1, 'VAtkSEyPK5ygX8hv29sEAgGxYNHnIjRKAthfwF4N8p7d3sF2ebVuHGpKCcAPrF9gcBNPFo5jq90NM03gG4vJrlsWPmAccYGw8sZfzUrDohqdX0DTnUMZDgqDfvJmcHSC', '2012-11-28 09:52:30'),
(3, 'A2zSCGpKAyt4cVFuWGOIK31jU0vAntUgfnCbhdAK5yAh16si8fwmYZ3FM3obU6N9lqeTGJUrbkxiafI2C7EjftgJqJavzMNALojjTVxm3mpbkGgh66VPISLHw65U8Sda', '2012-12-13 15:22:32');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_user_meta`
--

CREATE TABLE IF NOT EXISTS `bf_user_meta` (
  `meta_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_value` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `bf_wizard`
--

CREATE TABLE IF NOT EXISTS `bf_wizard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `bf_wizard`
--

INSERT INTO `bf_wizard` (`id`, `user_id`, `completed`, `deleted`, `created_on`, `modified_on`) VALUES
(1, 1, 5, 0, '2012-11-28 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
