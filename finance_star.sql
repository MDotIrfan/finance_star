-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 10:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance_star`
--

-- --------------------------------------------------------

--
-- Table structure for table `bast`
--

CREATE TABLE `bast` (
  `id_bast` varchar(20) NOT NULL,
  `type_of_work` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `pic_client` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_party` text NOT NULL,
  `second_party` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bast`
--

INSERT INTO `bast` (`id_bast`, `type_of_work`, `due_date`, `no_invoice`, `project_name`, `pic_client`, `perihal`, `company_name`, `email`, `first_party`, `second_party`) VALUES
('001-VI-PF1-2021', 'project item', '2021-06-30', 'STJAK-0012-2021', 'coba project 1', 'Darkah Subin', 'project', 'PT. Sentosa Abadi', 'sentosa@gmail.com', 'STAR', 'Darkah Subin'),
('002-VI-FK-2021', 'project item', '2021-06-30', 'KEB-0004-06-2021', 'coba kodegiri', 'Darkah Subin', 'project', 'PT. Sentosa Abadi', 'sentosa@gmail.com', 'Cycas Rifki Yolanda', 'Darkah Subin');

-- --------------------------------------------------------

--
-- Table structure for table `bast_item`
--

CREATE TABLE `bast_item` (
  `id` int(11) NOT NULL,
  `id_bast` varchar(20) NOT NULL,
  `item` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `Unit` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bast_item`
--

INSERT INTO `bast_item` (`id`, `id_bast`, `item`, `qty`, `Unit`, `status`) VALUES
(21, '001-VI-PF1-2021', 'coba ini 1', 100, 'Days', 1),
(22, '001-VI-PF1-2021', 'coba lagi', 700, 'Hours', 0),
(23, '001-VI-PF1-2021', 'coba 1', 10, 'Years', 1),
(29, '002-VI-FK-2021', 'coba kodegiri', 350, 'Hours', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_data`
--

CREATE TABLE `client_data` (
  `client_id` varchar(7) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_data`
--

INSERT INTO `client_data` (`client_id`, `client_name`, `client_email`, `company_name`, `address`) VALUES
('CL001', 'Darkah Subin', 'sentosa@gmail.com', 'PT. Sentosa Abadi', 'Jln. Kaliurang, D . I. Yogyakarta'),
('CL002', 'Nur Minah', 'jaya@gmail.com', 'PT. Jaya Wijaya', 'Jln. Thamrin, Jakarta'),
('CL003', 'Bambang Mustajab', 'bmclient@gmail.com', '', 'Jln. Siliwangi, Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_in`
--

CREATE TABLE `invoice_in` (
  `no_invoice` varchar(20) NOT NULL,
  `no_Po` varchar(11) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `cabang_bank` varchar(30) NOT NULL,
  `mitra_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `down_payment` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_npwp` varchar(30) NOT NULL,
  `public_notes` text NOT NULL,
  `terms` text NOT NULL,
  `signature` text NOT NULL,
  `footer` text NOT NULL,
  `total_cost` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `tipe` enum('word','item','','') NOT NULL,
  `v_form` enum('0','1') NOT NULL,
  `is_Acc` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_in`
--

INSERT INTO `invoice_in` (`no_invoice`, `no_Po`, `no_rekening`, `cabang_bank`, `mitra_name`, `address`, `down_payment`, `invoice_date`, `due_date`, `email`, `no_npwp`, `public_notes`, `terms`, `signature`, `footer`, `total_cost`, `grand_total`, `tipe`, `v_form`, `is_Acc`) VALUES
('KEB-0001-06-2021', 'KEB-PR0001', '3456789', 'BRI', 'Freelance Kodegiri', 'Jln. Panyawangan, Bandung', 500, '2021-06-25', '2021-06-30', 'flkg@gmail.com', '45767890', '', '', '', '', 193500, 189630, 'word', '0', 0),
('KEB-0002-06-2021', 'KEB-PR0002', '3456789', 'BRI', 'Freelance Kodegiri', 'Jln. Panyawangan, Bandung', 0, '2021-06-25', '2021-06-30', 'flkg@gmail.com', '45767890', '', '', '', '', 510000, 499800, 'item', '1', 0),
('SQJAK-0006-06-2021', 'SQ-PR0014', '5435345', 'BCA', 'freelance 1', 'coba address 1', 10000, '2021-06-15', '2021-06-23', 'fl1@gmail.com', '634345', '', '', '', '', 136200, 136200, 'word', '0', 0),
('SQJAK-0007-06-2021', 'SQ-PR0017', '5435345', 'BCA', 'freelance 1', 'coba address 1', 10000, '2021-06-15', '2021-06-19', 'fl1@gmail.com', '634345', '', '', '', '', 158190, 158190, 'item', '0', 0),
('STJAK-0002-2021', 'ST-PR0004', '5435345', 'BCA', 'ilham nur inzani', 'coba address 2', 500, '2021-06-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'rg', 'ar', 'ft', 617130, 617130, 'item', '0', 0),
('STJAK-0003-2021', 'ST-PR0007', '5435345', 'BCA', 'ilham nur inzani', 'coba address 2', 500, '2021-06-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'rg', 'ar', 'ft', 92000, 92000, 'word', '0', 0),
('STJAK-0004-2021', 'ST-PR0010', '5435345', 'coba project', 'ilham nur inzani', 'coba address', 500, '2021-06-16', '2021-06-18', 'ilhamham@gmail.com', '634345', 'pn', 'reg', 'rress', 'foot', 142500, 142500, 'word', '0', 0),
('STJAK-0005-2021', 'ST-PR0011', '5435345', 'BCA', 'ilham nur inzani', 'coba address 1', 5000, '2021-06-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'reg', 'addr', 'foot', 190190, 190190, 'item', '0', 0),
('STJAK-0006-2021', 'ST-PR0020', '776475890', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 10000, '2021-06-17', '2021-06-24', 'ilhamham@gmail.com', '445653345', 'dsadasdas', '', '', '', 85410, 85410, 'word', '0', 0),
('STJAK-0007-2021', 'ST-PR0019', '776475890', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 10000, '2021-06-17', '2021-06-25', 'ilhamham@gmail.com', '445653345', 'dssadas', '', '', '', 24960600, 24960600, 'item', '1', 0),
('STJAK-0009-2021', 'ST-PR0022', '2675889', 'BRI', 'Zoey Panda', 'Jln. Kedamaian No. 11', 5000, '2021-06-25', '2021-06-26', 'zoeypanda@gmail.com', '775684956', '', '', '', '', 82400, 80340, 'item', '0', 0),
('STJAK-0010-2021', 'ST-PR0021', '2675889', 'BRI', 'Zoey Panda', 'Jln. Kedamaian No. 11', 0, '2021-06-24', '2021-06-30', 'zoeypanda@gmail.com', '775684956', '', '', '', '', 193500, 188663, 'word', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_in_item`
--

CREATE TABLE `invoice_in_item` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `jobdesc` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_in_item`
--

INSERT INTO `invoice_in_item` (`id`, `no_invoice`, `jobdesc`, `qty`, `unit`, `rate`, `amount`) VALUES
(62, 'STJAK-0002-2021', 'Iure dolorem dolores', 400, 'Hours', 819, 327600),
(63, 'STJAK-0002-2021', 'Aperiam sunt ea quia', 70, 'Hours', 663, 46410),
(64, 'STJAK-0002-2021', 'Quis sint aliquip si', 6, 'Hours', 520, 3120),
(65, 'STJAK-0002-2021', 'coba 3', 200, 'Hours', 1200, 240000),
(70, 'STJAK-0004-2021', 'project ke 12', 830, '', 120, 99600),
(71, 'STJAK-0004-2021', 'coba 2', 110, '', 390, 42900),
(81, 'SQJAK-0006-06-2021', 'project ke 14', 810, '', 120, 97200),
(82, 'SQJAK-0006-06-2021', 'tambah project 1', 100, '', 390, 39000),
(86, 'SQJAK-0007-06-2021', 'coba 1', 100, 'Hours', 390, 39000),
(87, 'SQJAK-0007-06-2021', 'coba 2', 210, 'Hours', 339, 71190),
(88, 'SQJAK-0007-06-2021', 'coba 3', 480, 'Hours', 100, 48000),
(89, 'STJAK-0003-2021', 'Eu duis voluptatibus', 810, '', 100, 81000),
(90, 'STJAK-0003-2021', 'coba 1', 110, '', 100, 11000),
(92, 'STJAK-0005-2021', 'Ut id quibusdam quo ', 100, 'Hours', 512, 51200),
(93, 'STJAK-0005-2021', 'coba 2', 200, 'Hours', 339, 67800),
(94, 'STJAK-0005-2021', 'coba 3', 210, 'Hours', 339, 71190),
(108, 'STJAK-0007-2021', 'Dignissimos voluptas', 100, 'Days', 426, 42600),
(109, 'STJAK-0007-2021', 'Eaque doloribus magn', 500, 'Months', 276, 138000),
(110, 'STJAK-0007-2021', 'Aspernatur a qui lab', 30000, 'Hours', 826, 24780000),
(112, 'STJAK-0006-2021', 'coba project 15', 657, '', 130, 85410),
(121, 'STJAK-0009-2021', 'coba ini', 124, 'Days', 100, 12400),
(122, 'STJAK-0009-2021', 'coba lagi', 700, 'Hours', 100, 70000),
(125, 'STJAK-0010-2021', 'coba coba', 215, '', 900, 193500),
(127, 'KEB-0001-06-2021', 'coba project ke 2', 215, '', 900, 193500),
(128, 'KEB-0002-06-2021', 'coba 1', 300, 'Days', 200, 60000),
(129, 'KEB-0002-06-2021', 'coba 2', 500, 'Hours', 900, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_local`
--

CREATE TABLE `invoice_item_local` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_item_local`
--

INSERT INTO `invoice_item_local` (`id`, `no_invoice`, `domain`, `volume`, `unit`, `price`, `amount`) VALUES
(7, 'STJAK-0012-2021', 'coba ini 1', 100, 'Days', 100, 10000),
(8, 'STJAK-0012-2021', 'coba lagi', 700, 'Hours', 100, 70000),
(10, 'KEB-0003-06-2021', 'cek', 1400, 'Hours', 1, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_luar`
--

CREATE TABLE `invoice_item_luar` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `jobdesc` varchar(50) NOT NULL,
  `project_manager` varchar(50) NOT NULL,
  `star_number` varchar(30) NOT NULL,
  `number_word` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_luar_2`
--

CREATE TABLE `invoice_item_luar_2` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `jobdesc` varchar(50) NOT NULL,
  `star_number` varchar(30) NOT NULL,
  `number_line` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_spq`
--

CREATE TABLE `invoice_item_spq` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `jobdesc` varchar(50) NOT NULL,
  `qtt_word` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_item_spq`
--

INSERT INTO `invoice_item_spq` (`id`, `no_invoice`, `jobdesc`, `qtt_word`, `price`, `amount`) VALUES
(9, 'KEB-0008-06-2021', 'coba project 15', 1600, 120, 192000),
(20, 'STJAK-0004-2021', 'coba project 3', 1000, 200, 200000),
(21, 'STJAK-0004-2021', 'coba 2', 210, 1000, 210000),
(27, 'STJAK-0011-2021', 'coba coba', 215, 900, 193500),
(28, 'KEB-0004-06-2021', 'coba kodegiri', 350, 900, 315000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_spq_2`
--

CREATE TABLE `invoice_item_spq_2` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `pre_invoice` varchar(50) NOT NULL,
  `date_deliv` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_out`
--

CREATE TABLE `invoice_out` (
  `no_invoice` varchar(30) NOT NULL,
  `no_Po` varchar(20) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `account` varchar(30) NOT NULL,
  `swift_code` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `down_payment` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `public_notes` text NOT NULL,
  `terms` text NOT NULL,
  `signature` text NOT NULL,
  `footer` text NOT NULL,
  `total_cost` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_out`
--

INSERT INTO `invoice_out` (`no_invoice`, `no_Po`, `client_name`, `account`, `swift_code`, `address`, `down_payment`, `invoice_date`, `due_date`, `email`, `no_rek`, `public_notes`, `terms`, `signature`, `footer`, `total_cost`, `grand_total`, `tipe`) VALUES
('KEB-0003-06-2021', 'KEB-PR0004', 'Bambang Mustajab', 'financedept@bintang‐35.net', '', 'Jln. Siliwangi, Bandung', 0, '2021-06-15', '2021-06-25', 'bmclient@gmail.com', '5', '', '', '', '', 1400, 1176, 2),
('KEB-0004-06-2021', 'KEB-PR0003', 'Darkah Subin', '0902211411', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-06-18', '2021-06-30', 'sentosa@gmail.com', '2', '', '', '', '', 315000, 315000, 3),
('SQJAK-0008-06-2021', 'SQ-PR0015', 'Darkah Subin', '090 2212221', 'BBBAIDJA', 'coba address 1', 10000, '2021-06-15', '2021-06-30', 'freelnastar11@gmail.com', '3', '', '', '', '', 192000, 192000, 4),
('STJAK-0011-2021', 'ST-PR0021', 'Nur Minah', '0902211411', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-06-30', '2021-06-26', 'jaya@gmail.com', '2', '', '', '', '', 193500, 188663, 3),
('STJAK-0012-2021', 'ST-PR0022', 'Darkah Subin', '0701137302', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-06-26', '2021-06-30', 'sentosa@gmail.com', '1', 'ss', '', '', '', 80000, 66400, 2);

-- --------------------------------------------------------

--
-- Table structure for table `position_item`
--

CREATE TABLE `position_item` (
  `id` int(11) NOT NULL,
  `position_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position_item`
--

INSERT INTO `position_item` (`id`, `position_Name`) VALUES
(1, 'Project Manager'),
(2, 'Top Management'),
(3, 'Finance'),
(4, 'Admin'),
(5, 'Sales'),
(6, 'Team'),
(7, 'Individu');

-- --------------------------------------------------------

--
-- Table structure for table `po_item_itembase`
--

CREATE TABLE `po_item_itembase` (
  `id` int(11) NOT NULL,
  `no_Po` varchar(11) NOT NULL,
  `task` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` enum('Hours','Days','Months','Years','Unit') NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_item_itembase`
--

INSERT INTO `po_item_itembase` (`id`, `no_Po`, `task`, `qty`, `unit`, `rate`, `amount`) VALUES
(13, 'SQ-PR0005', 'Iure dolorem dolores', 400, 'Hours', 819, '327600.00'),
(14, 'SQ-PR0005', 'Aperiam sunt ea quia', 70, 'Hours', 663, '46410.00'),
(15, 'SQ-PR0005', 'Quis sint aliquip si', 6, 'Hours', 520, '3120.00'),
(16, 'SQ-PR0006', 'Quaerat ipsum digni', 39, 'Hours', 390, '15210.00'),
(17, 'SQ-PR0006', 'Blanditiis est quas', 345, 'Hours', 403, '139035.00'),
(18, 'SQ-PR0006', 'Aspernatur amet in ', 678, 'Hours', 428, '290184.00'),
(63, 'ST-PR0008', 'coba 1', 100, 'Hours', 390, '39000.00'),
(64, 'ST-PR0008', 'coba 3', 820, 'Hours', 426, '349320.00'),
(75, 'ST-PR0011', 'Ut id quibusdam quo ', 100, 'Hours', 512, '51200.00'),
(76, 'ST-PR0011', 'coba 2', 200, 'Hours', 339, '67800.00'),
(77, 'ST-PR0013', 'coba 1', 100, 'Hours', 1000, '100000.00'),
(91, 'SQ-PR0017', 'coba 1', 100, 'Hours', 390, '39000.00'),
(92, 'SQ-PR0017', 'coba 2', 210, 'Hours', 339, '71190.00'),
(93, 'SQ-PR0016', 'coba 1', 39, 'Hours', 390, '15210.00'),
(94, 'SQ-PR0016', 'Quaerat ipsum digni', 400, 'Hours', 1000, '400000.00'),
(95, 'SQ-PR0016', 'coba 2', 200, 'Hours', 339, '67800.00'),
(129, 'ST-PR0019', 'Dignissimos voluptas', 100, 'Days', 426, '42600.00'),
(130, 'ST-PR0019', 'Eaque doloribus magn', 500, 'Months', 276, '138000.00'),
(131, 'ST-PR0019', 'Aspernatur a qui lab', 30000, 'Hours', 826, '24780000.00'),
(136, 'ST-PR0004', 'Iure dolorem dolores', 400, 'Hours', 819, '327600.00'),
(137, 'ST-PR0004', 'Aperiam sunt ea quia', 70, 'Hours', 663, '46410.00'),
(138, 'ST-PR0004', 'Quis sint aliquip si', 6, 'Hours', 520, '3120.00'),
(139, 'ST-PR0004', 'coba 2', 200, 'Hours', 1200, '240000.00'),
(140, 'ST-PR0022', 'coba ini', 124, 'Days', 100, '12400.00'),
(141, 'ST-PR0022', 'coba lagi', 700, 'Hours', 100, '70000.00'),
(142, 'KEB-PR0002', 'coba 1', 300, 'Days', 200, '60000.00'),
(143, 'KEB-PR0002', 'coba 2', 500, 'Hours', 900, '450000.00'),
(144, 'KEB-PR0004', 'cek', 1400, 'Hours', 1, '1400.00');

-- --------------------------------------------------------

--
-- Table structure for table `po_item_wordbase`
--

CREATE TABLE `po_item_wordbase` (
  `id` int(11) NOT NULL,
  `no_Po` varchar(11) NOT NULL,
  `locked` int(11) NOT NULL,
  `repetitions` int(11) NOT NULL,
  `fuzzy100` int(11) NOT NULL,
  `fuzzy95` int(11) NOT NULL,
  `fuzzy85` int(11) NOT NULL,
  `fuzzy75` int(11) NOT NULL,
  `fuzzy50` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `wwc1` int(11) NOT NULL,
  `wwc2` int(11) NOT NULL,
  `wwc3` int(11) NOT NULL,
  `wwc4` int(11) NOT NULL,
  `wwc5` int(11) NOT NULL,
  `wwc6` int(11) NOT NULL,
  `wwc7` int(11) NOT NULL,
  `wwc8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_item_wordbase`
--

INSERT INTO `po_item_wordbase` (`id`, `no_Po`, `locked`, `repetitions`, `fuzzy100`, `fuzzy95`, `fuzzy85`, `fuzzy75`, `fuzzy50`, `new`, `wwc1`, `wwc2`, `wwc3`, `wwc4`, `wwc5`, `wwc6`, `wwc7`, `wwc8`) VALUES
(6, 'SQ-PR0007', 100, 100, 100, 100, 100, 100, 100, 110, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 'SQ-PR0015', 200, 200, 200, 200, 200, 200, 200, 200, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 'ST-PR0021', 0, 0, 100, 100, 100, 100, 100, 100, 0, 0, 0, 10, 10, 25, 100, 70),
(40, 'ST-PR0009', 200, 200, 200, 200, 200, 200, 200, 200, 0, 30, 0, 60, 100, 140, 200, 200),
(41, 'ST-PR0010', 100, 100, 100, 100, 100, 100, 110, 120, 0, 0, 0, 10, 10, 25, 110, 84),
(42, 'ST-PR0012', 100, 100, 100, 100, 100, 100, 100, 100, 0, 15, 0, 30, 50, 70, 100, 100),
(43, 'ST-PR0018', 100, 200, 200, 200, 100, 200, 200, 200, 0, 0, 0, 60, 50, 140, 200, 160),
(44, 'ST-PR0020', 150, 160, 78, 34, 69, 67, 49, 50, 0, 0, 0, 10, 35, 47, 49, 40),
(45, 'KEB-PR0001', 0, 0, 100, 100, 100, 100, 100, 100, 0, 0, 0, 10, 10, 25, 100, 70),
(46, 'KEB-PR0003', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(102, 'ST-PR0023_1', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 80),
(106, 'ST-PR0023_2', 50, 50, 50, 50, 50, 50, 50, 50, 0, 0, 0, 15, 25, 35, 50, 40);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `no_Po` varchar(11) NOT NULL,
  `nama_Pm` varchar(50) NOT NULL,
  `email_pm` varchar(50) NOT NULL,
  `resource_Name` varchar(50) NOT NULL,
  `resource_Email` varchar(30) NOT NULL,
  `resource_Status` enum('admin','Freelance','In House (Star Jakarta)','In House (Speequel Jakarta)','In House (Speequel Malaysia)','Vendor','Kodegiri') NOT NULL,
  `mobile_Phone` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `project_Name` varchar(50) NOT NULL,
  `id_quotation` varchar(9) NOT NULL,
  `public_Notes` text NOT NULL,
  `regards` text NOT NULL,
  `footer` text NOT NULL,
  `rate` decimal(11,2) NOT NULL,
  `address_Resource` text NOT NULL,
  `grand_Total` decimal(11,2) NOT NULL,
  `tipe` enum('item','word','','') NOT NULL,
  `tipe_Po` varchar(30) NOT NULL,
  `is_inv_in` int(11) NOT NULL DEFAULT 0,
  `v_form` enum('0','1') NOT NULL,
  `currency` varchar(5) NOT NULL DEFAULT 'IDR',
  `jumlah_pembayaran` int(11) NOT NULL DEFAULT 1,
  `no_po_ori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`no_Po`, `nama_Pm`, `email_pm`, `resource_Name`, `resource_Email`, `resource_Status`, `mobile_Phone`, `date`, `project_Name`, `id_quotation`, `public_Notes`, `regards`, `footer`, `rate`, `address_Resource`, `grand_Total`, `tipe`, `tipe_Po`, `is_inv_in`, `v_form`, `currency`, `jumlah_pembayaran`, `no_po_ori`) VALUES
('KEB-PR0001', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'admin', '08956673455', '2021-06-30', 'coba project ke 2', 'KEB-Q0004', '', '', '', '900.00', '', '193500.00', 'word', '4', 1, '0', 'IDR', 1, ''),
('KEB-PR0002', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'Freelance', '08956673455', '2021-06-26', 'coba project kodegiri', 'KEB-Q0003', '', '', '', '0.00', '', '510000.00', 'item', '', 1, '0', 'IDR', 1, ''),
('KEB-PR0003', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'Freelance', '08956673455', '2021-06-25', 'coba kodegiri', 'KEB-Q0001', '', '', '', '900.00', '', '315000.00', 'word', '1', 0, '0', 'IDR', 1, ''),
('KEB-PR0004', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'admin', '08956673455', '2021-06-25', 'coba 3', 'KEB-Q0005', '', '', '', '0.00', '', '1400.00', 'item', '', 0, '0', 'IDR', 1, ''),
('SQ-PR0005', 'project manager 1', 'kiviw@mailinator.com', 'Provident totam sed', 'Reuben Steele', 'Freelance', 'Eveniet volupta', '1995-10-18', 'Consectetur veniam ', 'ST-Q0009', 'Qui sit cum tempori', 'Et nihil sit sequi d', 'Cupidatat ex nemo of', '0.00', 'Quia aliquid archite', '377130.00', 'item', '', 0, '0', 'IDR', 1, ''),
('SQ-PR0006', 'project manager 1', 'rore@mailinator.com', 'Distinctio Amet nu', 'Iola Beck', 'Freelance', 'Sequi laborum a', '1996-04-06', 'Eu duis voluptatibus', 'ST-Q0008', 'Pariatur Est qui a', 'Quo magna Nam ut ut ', 'Aut tenetur ipsam au', '0.00', 'Quo ducimus totam e', '444429.00', 'item', '', 0, '0', 'IDR', 1, ''),
('SQ-PR0007', 'project manager 1', 'pm1@gmail.com', 'coba edit 1', 'Jaden Andrews', 'In House (Speequel Jakarta)', 'Sapiente expedi', '1920-11-22', 'Eu duis voluptatibus', 'ST-Q0008', 'Perspiciatis conseq', 'Non officia illum o', 'In aute sed obcaecat', '100.00', 'Minima proident ape', '33800.00', 'word', '3', 1, '0', 'IDR', 1, ''),
('SQ-PR0015', 'project manager 1', 'pm1@gmail.com', 'fl1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 15', '', '', '', '', '120.00', '', '87600.00', 'word', '2', 1, '0', 'IDR', 1, ''),
('SQ-PR0016', 'project manager 1', 'pm1@gmail.com', 'freelance 1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 3', 'ST-Q0014', '', '', '', '0.00', '', '483010.00', 'item', '', 0, '0', 'IDR', 1, ''),
('SQ-PR0017', 'project manager 1', 'pm1@gmail.com', 'freelance 1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project', '', '', '', '', '0.00', '', '110190.00', 'item', '', 1, '0', 'IDR', 1, ''),
('ST-PR0004', 'ben zoskan', 'ben@mailinator.com', 'Soluta incididunt ve', 'mod@gmail.com', 'Freelance', '0897654678', '2010-11-17', 'Consectetur veniam ', 'ST-Q0009', 'Fugiat commodi Nam ', 'Eligendi aut mollit ', 'Rerum eius velit al', '0.00', 'Fuga Incididunt dis', '617130.00', 'item', '', 1, '0', 'IDR', 1, ''),
('ST-PR0008', 'ben zoskan', 'gyhiqe@mailinator.com', 'Eu accusantium dolor', 'Eve Mcclure', 'In House (Star Jakarta)', 'Amet aliqua Et ', '1989-02-07', 'coba project', '', 'Recusandae Consequu', 'Aut rerum cillum vol', 'Est non voluptatem n', '0.00', 'Et tempor facere eum', '388320.00', 'item', '', 0, '0', 'IDR', 1, ''),
('ST-PR0009', 'ben zoskan', 'bneks@gmail.com', 'Consequat Nulla eni', 'Patience Cline', 'admin', 'Do rem sint et ', '0000-00-00', 'coba project 2', '', 'Nulla quo distinctio', 'Culpa iure neque in', 'Quaerat minus eiusmo', '200.00', 'Cumque blanditiis vo', '146000.00', 'word', '2', 1, '0', 'IDR', 1, ''),
('ST-PR0010', 'ben zoskan', 'bneks@gmail.com', 'Ilham Nur Inzani', 'ilham@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'project ke 12', 'ST-Q0012', 'coba pn', 'coba reg', 'coba foot', '120.00', 'coba addr', '28680.00', 'word', '4', 1, '0', 'IDR', 1, ''),
('ST-PR0011', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilham', 'admin', '0897654678', '2021-06-15', 'Aliquid sunt ex magn', 'ST-Q0010', 'pn', 'reg', 'foot', '0.00', 'addr', '119000.00', 'item', '', 1, '0', 'IDR', 1, ''),
('ST-PR0012', 'ben zoskan', 'bneks@gmail.com', 'Ilham Nur Inzani', 'beck@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 2', '', 'pn', 'reg', 'fot', '100.00', 'addr', '36500.00', 'word', '2', 0, '0', 'IDR', 1, ''),
('ST-PR0013', 'ben zoskan', 'bneks@gmail.com', 'Ilham Nur Inzani', 'beck@gmail.com', 'Freelance', '0897654678', '2021-06-16', 'coba project', '', 'pn', 'reg', 'foot', '0.00', 'addr', '100000.00', 'item', '', 0, '0', 'IDR', 1, ''),
('ST-PR0018', 'ben zoskan', 'bneks@gmail.com', 'freelance 1', 'dsadsa', 'Freelance', '0897654678', '2021-06-16', 'project ke 13', 'ST-Q0013', '', '', '', '100.00', '', '61000.00', 'word', '3', 0, '0', 'IDR', 1, ''),
('ST-PR0019', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'admin', '0856879465', '2021-06-16', 'Est cum consectetur', 'ST-Q0007', '', '', '', '0.00', '', '24960600.00', 'item', '', 1, '1', 'IDR', 1, ''),
('ST-PR0020', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'admin', '0856879465', '2021-06-19', 'coba project 15', 'ST-Q0015', '', '', '', '130.00', '', '23478.00', 'word', '3', 1, '0', 'IDR', 1, ''),
('ST-PR0021', 'ben zoskan', 'bneks@gmail.com', 'Zoey Panda', 'zoeypanda@gmail.com', 'admin', '0897655432', '2021-06-26', 'coba coba', 'ST-Q0018', '', '', '', '900.00', '', '193500.00', 'word', '4', 1, '0', 'IDR', 1, ''),
('ST-PR0022', 'ben zoskan', 'bneks@gmail.com', 'Zoey Panda', 'zoeypanda@gmail.com', 'Freelance', '0897655432', '2021-06-26', 'coba project', 'ST-Q0017', '', '', '', '0.00', '', '82400.00', 'item', '', 1, '0', 'IDR', 1, ''),
('ST-PR0023_1', 'ben zoskan', 'bneks@gmail.com', 'Zoey Panda', 'zoeypanda@gmail.com', 'Freelance', '0897655432', '2021-06-30', 'der', 'ST-Q0021', '', '', '', '900.00', '', '297000.00', 'word', '3', 0, '0', 'IDR', 3, 'ST-PR0023'),
('ST-PR0023_2', 'ben zoskan', 'bneks@gmail.com', 'Zoey Panda', 'zoeypanda@gmail.com', 'Freelance', '0897655432', '2021-06-30', 'der', 'ST-Q0021', '', '', '', '900.00', '', '148500.00', 'word', '3', 0, '0', 'IDR', 3, 'ST-PR0023');

-- --------------------------------------------------------

--
-- Table structure for table `quitation_item`
--

CREATE TABLE `quitation_item` (
  `id_q_num` int(11) NOT NULL,
  `no_Quotation` varchar(9) NOT NULL,
  `job_Desc` varchar(30) NOT NULL,
  `volume` int(11) NOT NULL,
  `unit` enum('Hours','Days','Months','Years','Unit') NOT NULL,
  `price` int(11) NOT NULL,
  `cost` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quitation_item`
--

INSERT INTO `quitation_item` (`id_q_num`, `no_Quotation`, `job_Desc`, `volume`, `unit`, `price`, `cost`) VALUES
(11, 'ST-Q0005', 'Minim aperiam consec', 100, 'Unit', 1200, '120000.00'),
(12, 'ST-Q0005', 'Unde aut eiusmod ess', 23, 'Hours', 872, '20056.00'),
(13, 'ST-Q0005', 'Perspiciatis cillum', 500, 'Months', 800, '400000.00'),
(14, 'ST-Q0005', 'Consequatur Corpori', 400, 'Unit', 758, '303200.00'),
(19, 'ST-Q0006', 'Ullamco maxime moles', 10, 'Hours', 752, '7520.00'),
(20, 'ST-Q0006', 'Culpa minima corpor', 12, 'Days', 354, '4248.00'),
(21, 'ST-Q0006', 'Assumenda commodo am', 23, 'Days', 14, '322.00'),
(22, 'ST-Q0007', 'Dignissimos voluptas', 100, 'Years', 426, '42600.00'),
(23, 'ST-Q0007', 'Eaque doloribus magn', 500, 'Months', 276, '138000.00'),
(24, 'ST-Q0007', 'Aspernatur a qui lab', 30000, 'Months', 826, '24780000.00'),
(25, 'ST-Q0008', 'Quaerat ipsum digni', 39, 'Hours', 390, '15210.00'),
(26, 'ST-Q0008', 'Blanditiis est quas', 345, 'Months', 403, '139035.00'),
(27, 'ST-Q0008', 'Aspernatur amet in ', 678, 'Days', 428, '290184.00'),
(35, 'ST-Q0009', 'Iure dolorem dolores', 400, 'Hours', 819, '327600.00'),
(36, 'ST-Q0009', 'Aperiam sunt ea quia', 70, 'Hours', 663, '46410.00'),
(37, 'ST-Q0009', 'Quis sint aliquip si', 6, 'Hours', 520, '3120.00'),
(38, 'ST-Q0010', 'Ut id quibusdam quo ', 100, 'Unit', 512, '51200.00'),
(42, 'ST-Q0011', 'Culpa vel voluptate', 60, 'Hours', 711, '42660.00'),
(43, 'ST-Q0011', 'Dolore iure officiis', 10, 'Hours', 883, '8830.00'),
(44, 'ST-Q0011', 'Rerum magnam velit r', 48, 'Hours', 53, '2544.00'),
(45, 'ST-Q0012', 'list project 1', 100, 'Days', 390, '39000.00'),
(46, 'ST-Q0012', 'list project 2', 200, 'Hours', 426, '85200.00'),
(47, 'ST-Q0013', 'list pekerjaan 1', 100, 'Hours', 390, '39000.00'),
(48, 'ST-Q0013', 'list pekerjaan 2', 200, 'Hours', 426, '85200.00'),
(51, 'ST-Q0015', 'coba 1', 810, 'Hours', 100, '81000.00'),
(54, 'ST-Q0014', 'coba 1', 39, 'Hours', 390, '15210.00'),
(55, 'ST-Q0014', 'Quaerat ipsum digni', 400, 'Years', 1000, '400000.00'),
(62, 'ST-Q0016', 'coba 1', 100, 'Hours', 150, '15000.00'),
(63, 'ST-Q0016', 'coba 2', 12, 'Months', 100, '1200.00'),
(76, 'SQM-Q0001', 'coba coba', 130, 'Days', 90, '11700.00'),
(77, 'SQM-Q0002', 'coba 1', 140, 'Hours', 150, '21000.00'),
(78, 'SQM-Q0003', 'kodegiri 1', 56, 'Days', 1678, '93968.00'),
(84, 'SQM-Q0004', 'fgfdgfd', 300, 'Hours', 459, '137700.00'),
(85, 'SQM-Q0004', 'ddghtre', 366, 'Hours', 567, '207522.00'),
(92, 'SQM-Q0005', 'sdsda123', 4579, 'Hours', 100, '457900.00'),
(93, 'SQM-Q0005', 'dfgttr321', 400, 'Hours', 200, '80000.00'),
(94, 'KEB-Q0001', 'asasd', 120, 'Hours', 100, '12000.00'),
(95, 'ST-Q0017', 'coba ini', 124, 'Days', 100, '12400.00'),
(96, 'ST-Q0017', 'coba lagi', 700, 'Hours', 100, '70000.00'),
(97, 'ST-Q0018', 'coba ini', 700, 'Hours', 800, '560000.00'),
(110, 'KEB-Q0002', 'coba 1', 300, 'Hours', 100, '1.74'),
(111, 'KEB-Q0002', 'coba 2', 46, 'Days', 1000, '2.66'),
(114, 'KEB-Q0003', 'coba 1', 300, 'Days', 200, '59855.76'),
(115, 'KEB-Q0003', 'coba 2', 500, 'Hours', 900, '449280.52'),
(116, 'KEB-Q0004', 'coba lagi', 400, 'Hours', 900, '360000.00'),
(117, 'KEB-Q0005', 'cek', 1400, 'Hours', 1, '1400.00'),
(118, 'KEB-Q0006', 'coba item', 3, 'Hours', 67, '201.00'),
(133, 'ST-Q0020', 'coba', 190, 'Hours', 560, '106400.00'),
(143, 'ST-Q0021', 'der', 600, 'Hours', 900, '37.26'),
(144, 'ST-Q0019', 'coba 1', 300, 'Hours', 100, '2.07'),
(145, 'ST-Q0019', 'coba 2', 580, 'Days', 100, '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `no_Quotation` varchar(9) NOT NULL,
  `project_Name` varchar(50) NOT NULL,
  `client_Name` varchar(50) NOT NULL,
  `project_Start` date NOT NULL,
  `due_Date` date NOT NULL,
  `client_Email` varchar(50) NOT NULL,
  `public_Notes` text NOT NULL,
  `header` text NOT NULL,
  `footer` text NOT NULL,
  `total_Cost` decimal(11,2) NOT NULL,
  `grand_Total` decimal(11,2) NOT NULL,
  `is_Acc` int(11) NOT NULL DEFAULT 0,
  `is_Q` int(11) NOT NULL DEFAULT 0,
  `v_form` enum('0','1','','') NOT NULL,
  `sales_name` varchar(50) NOT NULL,
  `currency` varchar(5) NOT NULL DEFAULT 'IDR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`no_Quotation`, `project_Name`, `client_Name`, `project_Start`, `due_Date`, `client_Email`, `public_Notes`, `header`, `footer`, `total_Cost`, `grand_Total`, `is_Acc`, `is_Q`, `v_form`, `sales_name`, `currency`) VALUES
('KEB-Q0001', 'coba kodegiri', 'Darkah Subin', '2021-06-23', '2021-06-23', 'sentosa@gmail.com', '', '', '', '12000.00', '12000.00', 1, 1, '0', 'Sales Kodegiri', ''),
('KEB-Q0002', 'coba project kodegiri', 'Darkah Subin', '2021-06-25', '2021-06-25', 'sentosa@gmail.com', '', '', '', '4.40', '4.40', 0, 0, '1', 'Sales Kodegiri', 'EUR'),
('KEB-Q0003', 'coba project kodegiri', 'Bambang Mustajab', '2021-06-30', '2021-06-26', 'bmclient@gmail.com', '', '', '', '509136.28', '509136.28', 1, 1, '1', 'Sales Kodegiri', 'IDR'),
('KEB-Q0004', 'coba project ke 2', 'Bambang Mustajab', '2021-06-29', '2021-06-24', 'bmclient@gmail.com', '', '', '', '360000.00', '360000.00', 1, 1, '0', 'Sales Kodegiri', 'IDR'),
('KEB-Q0005', 'coba 3', 'Bambang Mustajab', '2021-06-25', '2021-06-25', 'bmclient@gmail.com', '', '', '', '1400.00', '1400.00', 1, 1, '0', 'Sales Kodegiri', 'IDR'),
('KEB-Q0006', 'coba 4', 'Darkah Subin', '2021-06-25', '2021-06-25', 'sentosa@gmail.com', '', '', '', '201.00', '201.00', 1, 0, '0', 'Sales Kodegiri', 'IDR'),
('SQM-Q0001', 'coba 1', 'Nur Minah', '2021-06-16', '2021-06-16', 'jaya@gmail.com', '', '', '', '11700.00', '11700.00', 1, 0, '1', 'sales ke 1', ''),
('SQM-Q0002', 'coba ke 1', 'Nur Minah', '2021-06-16', '2021-06-16', 'jaya@gmail.com', '', '', '', '21000.00', '21000.00', 1, 0, '1', 'sales ke 1', ''),
('SQM-Q0003', 'coba project', 'Darkah Subin', '2021-06-19', '2021-06-16', 'sentosa@gmail.com', '', '', '', '93968.00', '93968.00', 1, 0, '0', 'sales ke 1', ''),
('SQM-Q0004', 'coba ini edu', 'Nur Minah', '2021-06-23', '2021-06-23', 'jaya@gmail.com', '', '', '', '345222.00', '345222.00', 0, 0, '0', 'sales ke 1', ''),
('SQM-Q0005', 'mozif track 22', 'Darkah Subin', '2021-06-23', '2021-06-23', 'sentosa@gmail.com', '', '', '', '537900.00', '537900.00', 0, 0, '0', 'sales ke 1', ''),
('ST-Q0005', 'Recusandae Dolorem ', 'Clare Becker', '1998-04-14', '1988-12-18', 'Exercitation et labo', 'Ea pariatur Molesti', 'Et reiciendis est v', 'Ullam ut totam recus', '843256.00', '843256.00', 0, 0, '0', 'muhammad irfan', ''),
('ST-Q0006', 'Ullamco soluta simil', 'Frances Bird', '1980-12-11', '1998-06-19', 'Et nemo facilis haru', 'Deserunt elit dolor', 'Proident quia hic l', 'Est dolore ex non m', '12090.00', '12090.00', 0, 0, '0', 'muhammad irfan', ''),
('ST-Q0007', 'Est cum consectetur', 'Pandora Potts', '1970-03-10', '2003-02-18', 'Harum sit nesciunt', 'Nobis voluptate offi', 'Quia ut non ut omnis', 'Corporis molestiae c', '24960600.00', '24960600.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0008', 'Eu duis voluptatibus', 'Jakeem Roach', '2007-02-22', '1990-03-22', 'Voluptas vel sequi c', 'Est architecto sequi', 'Ut asperiores sint ', 'Ut ipsa laboris dol', '444429.00', '444429.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0009', 'Consectetur veniam ', 'Zephr Larsen', '2014-09-06', '1996-12-25', 'Ab id excepteur repu', 'Et impedit alias co', 'Aute vero ut qui har', 'Ipsam quos est nesci', '377130.00', '377130.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0010', 'Aliquid sunt ex magn', 'Daria Cox', '1992-02-14', '2003-12-05', 'Est suscipit adipis', 'Ex aliquid deserunt ', 'In Nam inventore ius', 'Expedita possimus d', '51200.00', '51200.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0011', 'Deserunt facilis fac 1', 'Ashely Adkins', '1983-07-04', '1978-05-09', 'Consectetur dolor n', 'Velit aperiam eum a', 'Quo iusto voluptatem', 'Quia vitae harum mol', '54034.00', '54034.00', 0, 0, '0', 'muhammad irfan', ''),
('ST-Q0012', 'project ke 12', 'PT. sutarma', '2021-06-15', '2021-06-30', 'sutarma@pt.com', 'coba public notes', 'coba header', 'coba footer', '124200.00', '124200.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0013', 'project ke 13', 'PT. Abadi', '2021-06-17', '2021-06-30', 'abadi@gmail.com', 'coba ', 'coba', 'coba', '124200.00', '124200.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0014', 'coba project 3', 'Clare Becker', '2021-06-18', '2021-06-17', 'kod@gmail.com', '', '', '', '415210.00', '415210.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0015', 'coba project 15', 'Trevor Thomas', '2021-06-15', '2021-06-17', 'trev@gmail.com', '', '', '', '81000.00', '81000.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0016', 'coba project ke-16', 'PT. Sentosa Abadi', '2021-06-16', '2021-06-30', 'sentosa@gmail.com', '', '', '', '16200.00', '16200.00', 1, 0, '1', 'muhammad irfan', ''),
('ST-Q0017', 'coba project', 'Darkah Subin', '2021-06-23', '2021-06-23', 'sentosa@gmail.com', '', '', '', '82400.00', '82400.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0018', 'coba coba', 'Nur Minah', '2021-06-23', '2021-06-23', 'jaya@gmail.com', '', '', '', '560000.00', '560000.00', 1, 1, '0', 'muhammad irfan', ''),
('ST-Q0019', 'coba pdf', 'Darkah Subin', '2021-06-24', '2021-06-30', 'sentosa@gmail.com', 'cek cek', 'header', 'footer', '6.07', '6.07', 1, 0, '1', 'muhammad irfan', 'USD'),
('ST-Q0020', 'coba', 'Nur Minah', '2021-06-25', '2021-06-25', 'jaya@gmail.com', '', '', '', '106400.00', '106400.00', 1, 0, '0', 'muhammad irfan', 'IDR'),
('ST-Q0021', 'der', 'Darkah Subin', '2021-06-25', '2021-06-25', 'sentosa@gmail.com', '', '', '', '37.26', '37.26', 1, 0, '0', 'muhammad irfan', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `resource_data`
--

CREATE TABLE `resource_data` (
  `id` int(11) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `cabang_bank` varchar(30) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `no_npwp` varchar(30) NOT NULL,
  `jenis` enum('biasa','tenaga ahli','vendor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource_data`
--

INSERT INTO `resource_data` (`id`, `id_user`, `mobile_phone`, `cabang_bank`, `no_rekening`, `address`, `no_npwp`, `jenis`) VALUES
(1, 'STR004', '0856879465', 'Bank Mandiri', '776475890', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', '445653345', 'biasa'),
(2, 'STR008', '08134657849', 'BRI', '3332456674565', 'Jln. Aspal No. 56, Pengangsaan, Jakarta Timur.', '01234577', 'biasa'),
(4, 'STR016', '0897655432', 'BRI', '2675889', 'Jln. Kedamaian No. 11', '775684956', 'tenaga ahli'),
(5, 'STR018', '08956673455', 'BRI', '3456789', 'Jln. Panyawangan, Bandung', '45767890', 'vendor');

-- --------------------------------------------------------

--
-- Table structure for table `status_item`
--

CREATE TABLE `status_item` (
  `id` int(11) NOT NULL,
  `status_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_item`
--

INSERT INTO `status_item` (`id`, `status_Name`) VALUES
(0, 'admin'),
(1, 'Freelance'),
(2, 'In House (Star Jakarta)'),
(3, 'In House (Speequal Jakarta)'),
(4, 'In House (Speequal Malaysia)'),
(5, 'Vendor'),
(6, 'Kodegiri');

-- --------------------------------------------------------

--
-- Table structure for table `tax_invoice`
--

CREATE TABLE `tax_invoice` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `jenis_tax` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax_invoice`
--

INSERT INTO `tax_invoice` (`id`, `no_invoice`, `jenis_tax`) VALUES
(14, 'STJAK-0012-2021', '1'),
(15, 'STJAK-0012-2021', '2'),
(16, 'STJAK-0012-2021', '6'),
(19, 'STJAK-0011-2021', '4'),
(21, 'KEB-0003-06-2021', '1'),
(22, 'KEB-0003-06-2021', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_User` varchar(7) NOT NULL,
  `user_Name` varchar(15) NOT NULL,
  `pass_Word` varchar(15) NOT NULL,
  `full_Name` varchar(30) NOT NULL,
  `email_Address` varchar(30) NOT NULL,
  `id_Position` int(11) NOT NULL,
  `id_Status` int(11) NOT NULL,
  `profile_Photo` text NOT NULL,
  `last_Login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `inisial` varchar(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_User`, `user_Name`, `pass_Word`, `full_Name`, `email_Address`, `id_Position`, `id_Status`, `profile_Photo`, `last_Login`, `created_at`, `inisial`, `is_active`) VALUES
('STR001', 'admin', 'passadmin', 'admin finance 1', 'Adminfinance123@gmail.com', 4, 0, 'STR001.PNG', '2021-06-25 07:11:49', '2021-05-19 14:10:03', 'AF1', 0),
('STR002', 'irfan', 'coba11', 'muhammad irfan', 'muhammadirfan.9f@gmail.com', 5, 2, 'STR002.jpg', '2021-06-26 08:35:57', '2021-05-19 17:12:39', 'MI', 0),
('STR003', 'benben', 'bento', 'ben zoskan', 'bneks@gmail.com', 1, 2, 'STR003.jpg', '2021-06-28 05:41:14', '2021-06-10 09:42:27', 'BZ', 0),
('STR004', 'ilham', 'ilham', 'ilham nur inzani', 'ilhamham@gmail.com', 7, 1, 'STR004.jpg', '2021-06-26 08:35:20', '2021-06-14 17:34:53', 'INI', 0),
('STR005', 'putri', 'putri', 'putri finance 1', 'finstarna2@gmail.com', 3, 2, 'STR005.jpg', '2021-06-25 03:08:44', '2021-06-14 23:05:46', 'P1', 0),
('STR006', 'sales1', 'sales1', 'sales ke 1', 'sales1@gmail.com', 5, 4, 'STR006.jpg', '2021-06-25 02:58:05', '2021-06-15 06:37:16', 'SK1', 0),
('STR007', 'pm1', 'pm1', 'project manager 1', 'pm1@gmail.com', 1, 3, 'STR007.jpg', '2021-06-17 05:59:33', '2021-06-15 06:37:56', 'PM1', 0),
('STR008', 'fl1', 'fl1', 'freelance 1', 'fl1@gmail.com', 7, 1, 'STR008.jpg', '2021-06-23 03:10:13', '2021-06-15 06:38:39', 'FL1', 0),
('STR009', 'finance1', 'fn1', 'finance ke 1', 'fn1@gmail.com', 3, 6, 'STR009.jpg', '2021-06-23 14:04:24', '2021-06-15 06:39:16', 'F1', 0),
('STR010', 'financespq', 'fnspq', 'finance speequel', 'financespq1@gmail.com', 3, 3, 'STR010.jpg', '2021-06-22 13:33:19', '2021-06-15 07:42:11', 'FS', 0),
('STR011', 'sales2', 'sales2', 'sales ke 2', 'sales2@gmail.com', 5, 4, 'STR011.jpg', '2021-06-16 21:07:51', '2021-06-16 21:04:06', 'SK2', 0),
('STR012', 'pm2', 'pm2', 'project manager 2', 'pm2@gmail.com', 1, 3, 'STR012.jpg', '2021-06-16 21:05:12', '2021-06-16 21:04:59', 'PM2', 0),
('STR013', 'finance2', 'fn2', 'Salam Selem', 'financestarna2@gmail.com', 3, 2, 'STR013.jpg', '2021-06-23 03:11:05', '2021-06-22 15:23:55', 'SS', 0),
('STR014', 'saleskg', 'saleskg', 'Sales Kodegiri', 'skg@gmail.com', 5, 6, 'STR014.jpg', '2021-06-25 08:08:13', '2021-06-23 11:53:03', 'SK', 0),
('STR015', 'pmkg', 'pmkg', 'project manager kodegiri', 'pmkg@gmail.com', 1, 6, 'STR015.jpg', '2021-06-25 07:54:21', '2021-06-23 11:53:51', 'PK', 0),
('STR016', 'zoey_panda', 'zoey', 'Zoey Panda', 'zoeypanda@gmail.com', 7, 1, 'STR016.jpg', '2021-06-24 07:47:51', '2021-06-23 15:19:53', 'ZP', 0),
('STR017', 'finkg', 'finkg', 'Finance Kodegiri', 'pmstarna1@gmail.com', 3, 6, 'STR017.jpg', '2021-06-25 07:55:05', '2021-06-25 04:56:36', 'FK', 0),
('STR018', 'flkodegiri', 'flkg', 'Freelance Kodegiri', 'flkg@gmail.com', 6, 5, 'STR018.jpg', '2021-06-25 07:43:45', '2021-06-25 07:15:14', 'FK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bast`
--
ALTER TABLE `bast`
  ADD PRIMARY KEY (`id_bast`);

--
-- Indexes for table `bast_item`
--
ALTER TABLE `bast_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_data`
--
ALTER TABLE `client_data`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `invoice_in`
--
ALTER TABLE `invoice_in`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indexes for table `invoice_in_item`
--
ALTER TABLE `invoice_in_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_item_local`
--
ALTER TABLE `invoice_item_local`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_item_luar`
--
ALTER TABLE `invoice_item_luar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_item_luar_2`
--
ALTER TABLE `invoice_item_luar_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_item_spq`
--
ALTER TABLE `invoice_item_spq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_item_spq_2`
--
ALTER TABLE `invoice_item_spq_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_out`
--
ALTER TABLE `invoice_out`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indexes for table `position_item`
--
ALTER TABLE `position_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_item_itembase`
--
ALTER TABLE `po_item_itembase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_item_wordbase`
--
ALTER TABLE `po_item_wordbase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`no_Po`);

--
-- Indexes for table `quitation_item`
--
ALTER TABLE `quitation_item`
  ADD PRIMARY KEY (`id_q_num`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`no_Quotation`);

--
-- Indexes for table `resource_data`
--
ALTER TABLE `resource_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_item`
--
ALTER TABLE `status_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_invoice`
--
ALTER TABLE `tax_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bast_item`
--
ALTER TABLE `bast_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `invoice_in_item`
--
ALTER TABLE `invoice_in_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `invoice_item_local`
--
ALTER TABLE `invoice_item_local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice_item_luar`
--
ALTER TABLE `invoice_item_luar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_item_luar_2`
--
ALTER TABLE `invoice_item_luar_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_item_spq`
--
ALTER TABLE `invoice_item_spq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `invoice_item_spq_2`
--
ALTER TABLE `invoice_item_spq_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `po_item_itembase`
--
ALTER TABLE `po_item_itembase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `po_item_wordbase`
--
ALTER TABLE `po_item_wordbase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `quitation_item`
--
ALTER TABLE `quitation_item`
  MODIFY `id_q_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `resource_data`
--
ALTER TABLE `resource_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tax_invoice`
--
ALTER TABLE `tax_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
