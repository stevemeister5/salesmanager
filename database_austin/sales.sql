-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2018 at 05:49 PM
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
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

DROP TABLE IF EXISTS `tbl_city`;
CREATE TABLE IF NOT EXISTS `tbl_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_acronym` varchar(15) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `state_id`, `city_acronym`) VALUES
(1, 'Aba', 1, 'ABA'),
(2, 'Umuahia', 1, 'UMU'),
(3, 'Abiriba', 1, 'ABI'),
(4, 'Arochukwu', 1, 'ARK'),
(5, 'Bende', 1, 'BEN'),
(6, 'Isiukwuato', 1, 'ISI'),
(7, 'Nbawsi', 1, 'NBS'),
(8, 'Ohafia', 1, 'OHA'),
(9, 'Omoba', 1, 'OMO'),
(10, 'Garki', 2, 'ABJ'),
(11, 'Gwagwalada', 2, 'GWG'),
(12, 'Kuje', 2, 'KUJ'),
(13, 'Abaji', 2, 'ABA'),
(14, 'Abuja-Municipal', 2, 'ABJ'),
(15, 'Bwari', 2, 'BWR'),
(16, 'Kwali', 2, 'KWL'),
(17, 'Yola', 3, 'YOL'),
(18, 'Mubi', 3, 'MUB'),
(19, 'Ganye', 3, 'GAN'),
(20, 'Numan', 3, 'MUM'),
(21, 'Guyuk', 3, 'GUY'),
(22, 'Michika', 3, 'MIC'),
(23, 'Mayo-Belwa', 3, 'MAB'),
(24, 'Gombi', 3, 'GMB'),
(25, 'Jimeta', 3, 'JIM'),
(26, 'Uyo', 4, 'UYO'),
(27, 'Abak', 4, 'ABK'),
(28, 'Etinan', 4, 'ETN'),
(29, 'Ikot-Abasi', 4, 'IKA'),
(30, 'Ikot-Ekpene', 4, 'IKE'),
(31, 'Itu', 4, 'ITU'),
(32, 'Mkpat', 4, 'MKP'),
(33, 'Enin', 4, 'ENI'),
(34, 'Oron', 4, 'ORO'),
(35, 'Ukanafun', 4, 'UKA'),
(36, 'Ibiono-Ibom', 4, 'IBI'),
(37, 'Ibeno', 4, 'IBE'),
(38, 'Awka', 5, 'AWK'),
(39, 'Onitsha', 5, 'ONSH'),
(40, 'Nnewi', 5, 'NWI'),
(41, 'Obosi', 5, 'OBS'),
(42, 'Ihiala', 5, 'IHA'),
(43, 'Aguata', 5, 'ANM'),
(44, 'Bauchi', 6, 'BAU'),
(45, 'Zaki', 6, 'ZAK'),
(46, 'Misau', 6, 'MIS'),
(47, 'Ningi', 6, 'NIN'),
(48, 'Jama\'are', 6, 'JAM'),
(49, 'Tafawa-Balewa', 6, 'TAB'),
(50, 'Alkaleri', 6, 'ALK'),
(51, 'Yenagoa', 7, 'YEN'),
(52, 'Sagbama', 7, 'SAG'),
(53, 'Obi', 7, 'OBI'),
(54, 'Kauama', 7, 'KAU'),
(55, 'Oloibiri', 7, 'OLO'),
(56, 'Ogbla', 7, 'OGB'),
(57, 'Oporama', 7, 'OPO'),
(58, 'Koluama', 7, 'KOL'),
(59, 'Brass', 7, 'BRS'),
(60, 'Opokuma', 7, 'OPK'),
(61, 'Makurdi', 8, 'MAK'),
(62, 'Gboko', 8, 'GBK'),
(63, 'Katsina-Ala', 8, 'KST'),
(64, 'Adikpo', 8, 'ADK'),
(65, 'Otukpo', 8, 'OTK'),
(66, 'Korinya', 8, 'KOR'),
(67, 'Makurdi-Tar', 8, 'MAK'),
(68, 'Vandeikya', 8, 'VAN'),
(69, 'Aliade', 8, 'ALI'),
(70, 'Otukpa', 8, 'OTK'),
(71, 'Lessel', 8, 'LES'),
(72, 'Okpoga', 8, 'OKP'),
(73, 'Awajir', 8, 'AWA'),
(74, 'Agbede', 8, 'AGB'),
(75, 'Ikpayongo', 8, 'IKP'),
(76, 'Zaki-Biam', 8, 'ZAK'),
(77, 'Maiduguri', 9, 'MAID'),
(78, 'Dikwa', 9, 'DIK'),
(79, 'Gwoza', 9, 'GWO'),
(80, 'Konduga', 9, 'KON'),
(81, 'Bama', 9, 'BAM'),
(82, 'Monguno', 9, 'MON'),
(83, 'Shani', 9, 'SHA'),
(84, 'Damboa', 9, 'DAM'),
(85, 'Calabar', 10, 'CAL'),
(86, 'Akamkpa', 10, 'AKA'),
(87, 'Ikon', 10, 'IKO'),
(88, 'Obubra', 10, 'OBU'),
(89, 'Odukpani', 10, 'ODU'),
(90, 'Ogoja', 10, 'OGO'),
(91, 'Okundi', 10, 'OKU'),
(92, 'Ugep', 10, 'UGP'),
(93, 'Obudu', 10, 'OBU'),
(94, 'Obanliku', 10, 'OBA'),
(95, 'Akpabuyo', 10, 'AKP'),
(96, 'Asaba', 11, 'ASA'),
(97, 'Warri', 11, 'WAR'),
(98, 'Agbor', 11, 'AGB'),
(99, 'Sapele', 11, 'SAP'),
(100, 'Ughelli', 11, 'UGH'),
(101, 'Abakaliki', 12, 'ABAK'),
(102, 'Afkpo', 12, 'AFKP'),
(103, 'Uburu', 12, 'UBU'),
(104, 'Nkalagu', 12, 'NKA'),
(105, 'Ishiagu', 12, 'ISHIA'),
(106, 'Okposi', 12, 'OKP'),
(107, 'Amasiri', 12, 'AMAS'),
(108, 'Onicha', 12, 'ONIC'),
(109, 'Eba', 12, 'EBA'),
(110, 'Unwana', 12, 'UNW'),
(111, 'Benin City', 13, 'BEN'),
(112, 'Ubiaja', 13, 'UBIA'),
(113, 'Auchi', 13, 'AUCH'),
(114, 'Abudu', 13, 'ABU'),
(115, 'Uromi', 13, 'URM'),
(116, 'Irrua', 13, 'IRUA'),
(117, 'Ewu', 13, 'EWU'),
(118, 'Okpella', 13, 'OKP'),
(119, 'Ekpoma', 13, 'EKP'),
(120, 'Uzebba', 13, 'UZE'),
(121, 'Afuze', 13, 'AFU'),
(122, 'Ibillo', 13, 'IBL'),
(123, 'Urhonigbe', 13, 'URH'),
(124, 'Sabongida-Ora', 13, 'SAB'),
(125, 'Igarra', 13, 'IGAR'),
(126, 'Ado-Ekiti', 14, 'ADEK'),
(127, 'Ado', 14, 'ADO'),
(128, 'Ikere', 14, 'IKER'),
(129, 'Efon', 14, 'EFON'),
(130, 'Ikole-Aramoko-Ekiti', 14, 'IKOLE'),
(131, 'Ode', 14, 'ODE'),
(132, 'Oye-Ekiti', 14, 'OYE'),
(133, 'Enugu', 15, 'ENUG'),
(134, 'Nsukka', 15, 'NSKA'),
(135, 'Oji-River', 15, 'OJIR'),
(136, 'Awgu', 15, 'AWG'),
(137, 'Gombe', 16, 'GOM'),
(138, 'Kaltungo', 16, 'KALT'),
(139, 'Owerri', 17, 'OWER'),
(140, 'Okigwe', 17, 'OKIG'),
(141, 'Orlu', 17, 'ORL'),
(142, 'Oguta', 17, 'OGUT'),
(143, 'Nkwerre', 17, 'NKWE'),
(144, 'Mbaise', 17, 'MBAIS'),
(145, 'Dutse', 18, 'DUTS'),
(146, 'Hadejia', 18, 'HADE'),
(147, 'Kazaure', 18, 'KAZA'),
(148, 'Gumel', 18, 'GUME'),
(149, 'Ringim', 18, 'RING'),
(150, 'Kaduna', 19, 'KD'),
(151, 'Zaria', 19, 'ZAR'),
(152, 'Zonkwa', 19, 'ZON'),
(153, 'Kachia', 19, 'KACH'),
(154, 'Kagoro', 19, 'KAG'),
(155, 'Kafanchan', 19, 'KAFAN'),
(156, 'Kano', 20, 'KN'),
(157, 'Dambatta', 20, 'DAM'),
(158, 'Gumei', 20, 'GUM'),
(159, 'Gwarzo', 20, 'GWA'),
(160, 'Hadeija', 20, 'HAD'),
(161, 'Karaye', 20, 'KAR'),
(162, 'Kazaye', 20, 'KAZ'),
(163, 'Ririvani', 20, 'RIR'),
(164, 'Katsina', 21, 'KATS'),
(165, 'Daura', 21, 'DAU'),
(166, 'Funtua', 21, 'FUN'),
(167, 'Malumfashi', 21, 'MAL'),
(168, 'Bakori', 21, 'BAK'),
(169, 'Kanjia', 21, 'KANJ'),
(170, 'Birnin-Kebbi', 22, 'BIRK'),
(171, 'Gwandu', 22, 'GWAN'),
(172, 'Argungu', 22, 'ARGU'),
(173, 'Yauri', 22, 'YAU'),
(174, 'Zuru', 22, 'ZUR'),
(175, 'Ilori', 24, 'ILO'),
(176, 'Jebba', 24, 'JEB'),
(177, 'Oro', 24, 'ORO'),
(178, 'Esie', 24, 'ESIE'),
(179, 'Omu-Aran', 24, 'OMU'),
(180, 'Koton-Karie', 24, 'KOT'),
(181, 'Lafiagi', 24, 'LAF'),
(182, 'Oke-Oyi', 24, 'OKE'),
(183, 'Pategi', 24, 'PAT'),
(184, 'Ajasse Ipo', 24, 'AJAS'),
(185, 'Ikeja', 25, 'IKJ'),
(186, 'Ikorodu', 25, 'IKR'),
(187, 'Epe', 25, 'EPE'),
(188, 'Badagry', 25, 'BDG'),
(189, 'Lagos', 25, 'LG'),
(190, 'Apapa', 25, 'APP'),
(191, 'Victoria Island', 25, 'VI'),
(192, 'Ikoyi', 25, 'IKY'),
(193, 'Lafia', 26, 'LF'),
(194, 'Akwanga', 26, 'AK'),
(195, 'Keffi', 26, 'KEF'),
(196, 'Kuru', 26, 'KUR'),
(197, 'Wamba', 26, 'WMB'),
(198, 'Eggon', 26, 'EGG'),
(199, 'Nassarawa', 26, 'NAS'),
(200, 'Doma', 26, 'DOM'),
(201, 'Minna', 27, 'MIN'),
(202, 'Bida', 27, 'BID'),
(203, 'Suleja', 27, 'SUL'),
(204, 'Kontagora', 27, 'KONT'),
(205, 'Lapai', 27, 'LAP'),
(206, 'Mokwa', 27, 'MOK'),
(207, 'Abeokuta', 28, 'ABK'),
(208, 'Ijebu-Ode', 28, 'IJ'),
(209, 'Sagamu', 28, 'SGM'),
(210, 'Ilaro', 28, 'ILR'),
(211, 'Ijebu-Igbo', 28, 'IJIGB'),
(212, 'Ota', 28, 'OTA'),
(213, 'Aiyetoro', 28, 'AYT'),
(214, 'Akure', 29, 'AK'),
(215, 'Owo', 29, 'OWO'),
(216, 'Ore', 29, 'ORE'),
(217, 'Oka-Akoko', 29, 'OKA'),
(218, 'Ondo', 29, 'OND'),
(219, 'Oshogbo', 30, 'OSGB'),
(220, 'Ile-Ife', 30, 'ILE'),
(221, 'Iwo', 30, 'IWO'),
(222, 'Ila-Orangun', 30, 'ILAO'),
(223, 'Ejigbo', 30, 'EJIGB'),
(224, 'Ilesha', 30, 'ILESH'),
(225, 'Ikirun', 30, 'IKIR'),
(226, 'Ibadan', 31, 'IB'),
(227, 'Ogbomosho', 31, 'OGB'),
(228, 'Oyo', 31, 'OY'),
(229, 'Iseyin', 31, 'ISEY'),
(230, 'Shaki-Igboho', 31, 'SHAI'),
(231, 'Kisi', 31, 'KIS'),
(232, 'Igbo-Ora', 31, 'IGB'),
(233, 'Okeho', 31, 'OKE'),
(234, 'Lalupon', 31, 'LAL'),
(235, 'Jos', 32, 'JOS'),
(236, 'Akwanga', 32, 'AKW'),
(237, 'Bukuru', 32, 'BUK'),
(238, 'Barkin/Ladi', 32, 'BAL'),
(239, 'Pankshin', 32, 'PAN'),
(240, 'Shendam', 32, 'SHN'),
(241, 'Langtang', 32, 'LAN'),
(242, 'Vom', 33, 'VOM'),
(243, 'Port-Harcourt', 33, 'PH'),
(244, 'Bonny', 33, 'BON'),
(245, 'Ahoada', 33, 'AHO'),
(246, 'Okrika', 33, 'OKR'),
(247, 'Degema', 33, 'DEG'),
(248, 'Opobo', 33, 'OPO'),
(249, 'Gokana', 33, 'GOK'),
(250, 'Sokoto', 34, 'SOK'),
(251, 'Yabo', 34, 'YAB'),
(252, 'Guddu', 34, 'GUD'),
(253, 'Ilela', 34, 'ILE'),
(254, 'Binji', 34, 'BINJ'),
(255, 'Gwada-Bawa', 34, 'GWB'),
(256, 'Bogings', 34, 'BOG'),
(257, 'Tambulwal', 34, 'TAM'),
(258, 'Wurno', 34, 'WUR'),
(259, 'Jalingo', 35, 'JAL'),
(260, 'Takun', 35, 'TAK'),
(261, 'Wukari', 35, 'WUK'),
(262, 'Zing', 35, 'ZIN'),
(263, 'Sardauna', 35, 'SAR'),
(264, 'Bali', 35, 'BAL'),
(265, 'Yono', 35, 'YON'),
(266, 'Kurmi', 35, 'KUR'),
(267, 'Ibi', 35, 'IBI'),
(268, 'Gashaka', 35, 'GAS'),
(269, 'Damaturu', 36, 'DAM'),
(270, 'Gashua', 36, 'GAS'),
(271, 'Giedam', 36, 'GID'),
(272, 'Nguru', 36, 'NGU'),
(273, 'Potiskum', 36, 'POT'),
(274, 'Gusau', 37, 'GUS'),
(275, 'Kaura-Namoda', 37, 'KAU'),
(276, 'Anka', 37, 'ARK'),
(277, 'Talata-Marafa', 37, 'TLM'),
(278, 'Zugu', 37, 'ZUG'),
(279, 'Lokoja', 23, 'LKJ'),
(280, 'Kabba', 23, 'KAB'),
(281, 'Okene', 23, 'OKE'),
(282, 'Idah', 23, 'IDH'),
(283, 'Kotton-Karfe', 23, 'KOT'),
(284, 'Dekina', 23, 'DEK'),
(285, 'Ayingba', 23, 'AYI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_tab`
--

DROP TABLE IF EXISTS `tbl_main_tab`;
CREATE TABLE IF NOT EXISTS `tbl_main_tab` (
  `main_tab_id` int(3) NOT NULL AUTO_INCREMENT,
  `main_tab_name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`main_tab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_main_tab`
--

INSERT INTO `tbl_main_tab` (`main_tab_id`, `main_tab_name`, `icon`) VALUES
(1, 'Staff Management', 'user'),
(3, 'Sales Management', 'money');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `role_id` int(4) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `subrights` varchar(100) NOT NULL,
  `suberrights` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `rights`, `subrights`, `suberrights`) VALUES
(1, 'Managing Director (MD)', '1,3', '1,2,3,8,9,10', '1,2'),
(2, 'Another Just for Testing', '1', '1,2,3,8', '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

DROP TABLE IF EXISTS `tbl_sales`;
CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(5) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_qty` int(5) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text,
  `date` datetime NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`sales_id`, `staff_id`, `item_name`, `item_price`, `item_qty`, `amount`, `description`, `date`) VALUES
(1, 0, 'Bic Biro', '8900.00', 1, '8900.00', NULL, '2018-07-03 13:50:58'),
(2, 0, 'Another Item Sold Today', '2300.00', 2, '4600.00', NULL, '2018-07-03 14:14:57'),
(3, 0, 'Last One', '3000.00', 3, '9000.00', 'First and last Description', '2018-07-03 17:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `settings_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`settings_id`, `name`, `value`) VALUES
(1, 'company_name', 'Sales Management');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

DROP TABLE IF EXISTS `tbl_staff`;
CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` int(2) DEFAULT NULL COMMENT '0-Female 1-Male',
  `m_status` int(2) DEFAULT NULL COMMENT '0-Single 1-Married 2-Divorced',
  `role_id` int(5) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `state_id` int(3) DEFAULT NULL,
  `pics` varchar(200) DEFAULT 'no_pic.jpg',
  `residential_address` varchar(255) DEFAULT NULL,
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `first_name`, `middle_name`, `last_name`, `gender`, `m_status`, `role_id`, `email`, `phone`, `dob`, `state_id`, `pics`, `residential_address`, `created_by`, `created_on`) VALUES
(0, 'Webmaster', '', 'Doe', 1, 1, 0, 'mamoo.stella@gmail.com', '08036227663', '2016-09-13', 32, 'moi.jpg', '', 0, '0000-00-00 00:00:00'),
(1, 'Limit', NULL, 'Breaker', 1, 1, 1, 'a@a.com', '08043889890', NULL, 11, 'limit_breaker_3158995.jpg', 'This is the address', 0, '2018-07-02 17:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
CREATE TABLE IF NOT EXISTS `tbl_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`) VALUES
(1, 'Abia'),
(2, 'FCT'),
(3, 'Adamawa'),
(4, 'Akwa-Ibom'),
(5, 'Anambra'),
(6, 'Bauchi'),
(7, 'Bayelsa'),
(8, 'Benue'),
(9, 'Borno'),
(10, 'Cross River'),
(11, 'Delta'),
(12, 'Ebonyi'),
(13, 'Edo'),
(14, 'Ekiti'),
(15, 'Enugu'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nassarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suber_tab`
--

DROP TABLE IF EXISTS `tbl_suber_tab`;
CREATE TABLE IF NOT EXISTS `tbl_suber_tab` (
  `suber_tab_id` int(5) NOT NULL AUTO_INCREMENT,
  `sub_tab_id` int(5) NOT NULL,
  `suber_tab_name` varchar(255) NOT NULL,
  `suber_tab_url` varchar(255) NOT NULL,
  `suber_tab_named_route` varchar(100) NOT NULL,
  PRIMARY KEY (`suber_tab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suber_tab`
--

INSERT INTO `tbl_suber_tab` (`suber_tab_id`, `sub_tab_id`, `suber_tab_name`, `suber_tab_url`, `suber_tab_named_route`) VALUES
(1, 8, 'Create Staff Role', '', 'new_staff_role'),
(2, 8, 'Edit Staff Role', '', 'edit_staff_role');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_tab`
--

DROP TABLE IF EXISTS `tbl_sub_tab`;
CREATE TABLE IF NOT EXISTS `tbl_sub_tab` (
  `sub_tab_id` int(4) NOT NULL AUTO_INCREMENT,
  `main_tab_id` int(4) NOT NULL,
  `sub_tab_name` varchar(100) NOT NULL,
  `sub_tab_url` varchar(100) NOT NULL,
  `sub_tab_named_route` varchar(50) DEFAULT '',
  PRIMARY KEY (`sub_tab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_tab`
--

INSERT INTO `tbl_sub_tab` (`sub_tab_id`, `main_tab_id`, `sub_tab_name`, `sub_tab_url`, `sub_tab_named_route`) VALUES
(1, 1, 'Create Staff', '', 'new_staff'),
(2, 1, 'View Staff', '', 'vista_staff'),
(3, 1, 'Edit Staff', '', 'edit_staff'),
(8, 1, 'Manage Data', '#', ''),
(9, 3, 'Record Sale', '', 'new_sale'),
(10, 3, 'View Sales', '', 'view_sale');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT '0',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rights` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subrights` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suberrights` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-inactive 1-active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_staff_id_unique` (`staff_id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `staff_id`, `username`, `admin`, `password`, `rights`, `subrights`, `suberrights`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 0, 'mailaustin37', 1, '$2y$10$adPmHOxJhgu69Ih4u8GqEevHSG9i5gxjmTdGmdxUXs5FZg236sfVC', '*', '*', '*', 1, '5r89zUSKABU1xvK4lmQt26Ot9Ws2T1qtrerJNpm34XCFYmsFG0reiXYPDvtT', '2018-03-22 18:02:09', '2018-03-22 18:02:09'),
(1, 1, 'limitbreaker', 0, '$2y$10$HbtXq4GiO1/rAxiHy/xTZeNNM1kuiWlMgmcxT/V0s9FA/H71Di7DO', '1', '2', '', 1, 'WbiNuhmEPDj8WSbMAu1jvPZY24TPppldhXKC1VV9gcBbXx6RtWlmiYjQcOq3', '2018-07-02 16:47:04', '2018-07-02 21:31:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
