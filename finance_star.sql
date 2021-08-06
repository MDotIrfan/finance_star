-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 05:38 PM
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
  `second_party` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bast`
--

INSERT INTO `bast` (`id_bast`, `type_of_work`, `due_date`, `no_invoice`, `project_name`, `pic_client`, `perihal`, `company_name`, `email`, `first_party`, `second_party`, `created_at`) VALUES
('001-VIII-RB-2021', 'coba BAST', '2021-08-12', 'STJAK-0006-2021', 'Distinctio Cum susc', 'Chadwick Mendoza', 'coba BAST', 'PT. Jaya Wijaya', 'pmstarna2@gmail.com', 'PT. STAR Software Indonesia', 'Chadwick Mendoza', '2021-08-06 05:55:42'),
('002-VIII-BY-2021', 'coba BAST', '2021-08-19', 'KEB-0003-08-2021', 'Pariatur Ut ullamco', 'Vivian Gay', 'coba BAST', 'PT. Sentosa Abadi', 'pmstarna1@gmail.com', 'PT. Kode Evolusi Bangsa', 'Vivian Gay', '2021-08-06 06:07:55');

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
(33, '001-VIII-RB-2021', 'Suscipit enim qui mo', 1, 'Years', 1),
(34, '001-VIII-RB-2021', 'Aliquip et quaerat o', 20, 'Days', 1),
(35, '001-VIII-RB-2021', 'Vero blanditiis amet', 2, 'Months', 0),
(36, '002-VIII-BY-2021', 'Ipsam consequuntur q', 890, 'Hours', 1);

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
('CL003', 'xyxipo', 'qywivufe@mailinator.com', 'Osborne M', 'Rerum at');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_in`
--

CREATE TABLE `invoice_in` (
  `no_invoice` varchar(20) NOT NULL,
  `no_Po` varchar(15) NOT NULL,
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
  `total_cost` decimal(11,2) NOT NULL,
  `grand_total` decimal(11,2) NOT NULL,
  `tipe` enum('word','item','','') NOT NULL,
  `v_form` enum('0','1') NOT NULL,
  `is_Acc` int(11) NOT NULL DEFAULT 0,
  `currency_inv` varchar(36) DEFAULT 'IDR',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `tax` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_in`
--

INSERT INTO `invoice_in` (`no_invoice`, `no_Po`, `no_rekening`, `cabang_bank`, `mitra_name`, `address`, `down_payment`, `invoice_date`, `due_date`, `email`, `no_npwp`, `public_notes`, `terms`, `signature`, `footer`, `total_cost`, `grand_total`, `tipe`, `v_form`, `is_Acc`, `currency_inv`, `created_at`, `tax`) VALUES
('KEB-0001-08-2021', 'KEB-PR0001_1', '12345', 'Bank Mandiri', 'Boston High', 'Jln. Kepatihan No. 8, Bandung', 0, '2021-08-06', '2021-08-06', 'larimysu@mailinator.com', '1234', '', '', '', '', '70.00', '68.60', 'word', '0', 0, 'USD', '2021-08-06 02:44:49', '1.40'),
('KEB-0002-08-2021', 'KEB-PR0002_1', '12345', 'Bank Mandiri', 'Boston High', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 0, '2021-08-06', '2021-08-13', 'larimysu@mailinator.com', '1234', '', '', '', '', '4574956.00', '4483456.88', 'item', '0', 0, 'IDR', '2021-08-06 02:46:38', '0.00'),
('SQJAK-0001-08-2021', 'SQ-PR0001_2', '12345', 'Bank Mandiri', 'Boston High', 'Jln. Batu No.6, Malang', 0, '2021-08-06', '2021-08-11', 'larimysu@mailinator.com', '1234', '', '', '', '', '21.00', '20.58', 'word', '0', 0, 'USD', '2021-08-06 01:41:17', '0.00'),
('SQM-0001-08-2021', 'SQM-PR0002_3', '12345', 'Bank Mandiri', 'Boston High', 'Jln. Batu No.6, Malang', 0, '2021-08-06', '2021-08-06', 'larimysu@mailinator.com', '1234', '', '', '', '', '193.20', '189.34', 'item', '0', 0, 'EUR', '2021-08-06 02:47:18', '0.00'),
('STJAK-0001-2021', 'ST-PR0001_1', '12345', 'Bank Mandiri', 'Denton Dodson', 'Jln. Kepatihan No. 8, Bandung', 0, '2021-08-06', '2021-08-21', 'freelnstar1@gmail.com', '1234', '', '', '', '', '3285000.00', '3285000.00', 'word', '0', 0, 'IDR', '2021-08-06 00:46:33', '0.00'),
('STJAK-0002-2021', 'ST-PR0001_2', '12345', 'Bank Mandiri', 'Denton Dodson', 'Jln. Kepatihan No. 8, Bandung', 0, '2021-08-06', '2021-08-06', 'freelnstar1@gmail.com', '1234', '', '', '', '', '438.00', '438.00', 'word', '0', 0, 'USD', '2021-08-06 00:47:26', '0.00'),
('STJAK-0003-2021', 'ST-PR0002_2', '12345', 'Bank Mandiri', 'Denton Dodson', 'Jln. Kepatihan No. 8, Bandung', 0, '2021-08-06', '2021-08-14', 'freelnstar1@gmail.com', '1234', '', '', '', '', '7839113.30', '7447157.64', 'item', '0', 0, 'IDR', '2021-08-06 00:49:41', '0.00'),
('STJAK-0004-2021', 'ST-PR0002_3', '12345', 'Bank Mandiri', 'Denton Dodson', 'Jln. Kepatihan No. 8, Bandung', 0, '2021-08-06', '2021-08-06', 'freelnstar1@gmail.com', '1234', '', '', '', '', '751.71', '751.71', 'item', '0', 0, 'EUR', '2021-08-06 00:52:16', '0.00');

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
  `rate` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_in_item`
--

INSERT INTO `invoice_in_item` (`id`, `no_invoice`, `jobdesc`, `qty`, `unit`, `rate`, `amount`) VALUES
(168, 'STJAK-0002-2021', 'Project Example 1', 7300, '', '0.06', '438.00'),
(171, 'STJAK-0004-2021', 'Suscipit enim qui mo', 1, 'Years', '750.27', '750.27'),
(172, 'STJAK-0004-2021', 'Aliquip et quaerat o', 20, 'Days', '0.03', '0.60'),
(173, 'STJAK-0004-2021', 'Vero blanditiis amet', 2, 'Months', '0.42', '0.84'),
(174, 'STJAK-0003-2021', 'Suscipit enim qui mo', 1, 'Years', '7839113.30', '7839113.30'),
(175, 'STJAK-0001-2021', 'Project Example 1', 3650, '', '900.00', '3285000.00'),
(181, 'KEB-0001-08-2021', 'Atque laudantium ve', 350, '', '0.20', '70.00'),
(182, 'SQJAK-0001-08-2021', 'Ad sint sint omnis v', 350, '', '0.06', '21.00'),
(183, 'KEB-0002-08-2021', 'Ipsam consequuntur q', 890, 'Hours', '5140.40', '4574956.00'),
(184, 'SQM-0001-08-2021', 'Commodo id aperiam ', 230, 'Unit', '0.84', '193.20');

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
  `price` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_item_local`
--

INSERT INTO `invoice_item_local` (`id`, `no_invoice`, `domain`, `volume`, `unit`, `price`, `amount`) VALUES
(28, 'STJAK-0006-2021', 'Suscipit enim qui mo', 1, 'Years', '890.00', '890.00'),
(29, 'STJAK-0006-2021', 'Aliquip et quaerat o', 20, 'Days', '0.03', '0.60'),
(30, 'STJAK-0006-2021', 'Vero blanditiis amet', 2, 'Months', '0.50', '1.00');

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
  `unit_price` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_item_luar`
--

INSERT INTO `invoice_item_luar` (`id`, `no_invoice`, `jobdesc`, `project_manager`, `star_number`, `number_word`, `unit_price`, `amount`) VALUES
(4, 'STJAK-0005-2021', 'Project Example 1', 'Josiah Collier', '32332', 3650, '900.00', '3285000.00');

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
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_item_luar_2`
--

INSERT INTO `invoice_item_luar_2` (`id`, `no_invoice`, `jobdesc`, `star_number`, `number_line`, `amount`) VALUES
(3, 'KEB-0003-08-2021', 'Ipsam consequuntur q', '890', 'Hours', '5140.40');

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
(30, 'SQM-0002-08-2021', 'Numquam pariatur Ac', 350, 1, 175);

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

--
-- Dumping data for table `invoice_item_spq_2`
--

INSERT INTO `invoice_item_spq_2` (`id`, `no_invoice`, `pre_invoice`, `date_deliv`, `amount`) VALUES
(4, 'SQJAK-0002-08-2021', 'inv/008/2021', '2021-08-06', 405000);

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
  `total_cost` decimal(11,2) NOT NULL,
  `grand_total` decimal(11,2) NOT NULL,
  `tipe` int(11) NOT NULL,
  `currency_inv` varchar(36) NOT NULL DEFAULT 'IDR',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_out`
--

INSERT INTO `invoice_out` (`no_invoice`, `no_Po`, `client_name`, `account`, `swift_code`, `address`, `down_payment`, `invoice_date`, `due_date`, `email`, `no_rek`, `public_notes`, `terms`, `signature`, `footer`, `total_cost`, `grand_total`, `tipe`, `currency_inv`, `created_at`) VALUES
('KEB-0003-08-2021', 'KEB-PR0002_1', 'Vivian Gay', '0701137302', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-08-06', '2021-08-19', 'vivian@gmail.com', '1', '', '', '', '', '4574956.00', '3888712.60', 4, 'IDR', '2021-08-06 04:09:40'),
('SQJAK-0002-08-2021', 'SQ-PR0001_1', 'Barbara Casey', '0701137302', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-08-06', '2021-08-13', 'barbara@gmail.com', '1', '', '', '', '', '405000.00', '405000.00', 5, 'IDR', '2021-08-06 04:04:29'),
('SQM-0002-08-2021', 'SQM-PR0001_1', 'Tatum Marquez', '090 2212221', 'BBBAIDJA', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 0, '2021-08-06', '2021-08-06', 'tatum@gmail.com', '3', '', '', '', '', '175.00', '175.00', 3, 'EUR', '2021-08-06 03:55:27'),
('STJAK-0005-2021', 'ST-PR0001_1', 'PT. Jua Bersama', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-06', '2021-08-13', 'finstarna2@gmail.com', '1', '', '', '', '', '3285000.00', '2956500.00', 1, 'IDR', '2021-08-06 03:00:32'),
('STJAK-0006-2021', 'ST-PR0002_1', 'Chadwick Mendoza', '0902211411', 'BBBAIDJA', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 0, '2021-08-06', '2021-08-12', 'finstarna2@gmail.com', '2', '', '', '', '', '891.60', '891.60', 2, 'USD', '2021-08-06 03:27:23');

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
  `no_Po` varchar(15) NOT NULL,
  `task` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` enum('Hours','Days','Months','Years','Unit') NOT NULL,
  `rate` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_item_itembase`
--

INSERT INTO `po_item_itembase` (`id`, `no_Po`, `task`, `qty`, `unit`, `rate`, `amount`) VALUES
(260, 'ST-PR0002_1', 'Suscipit enim qui mo', 1, 'Years', '890.00', '890.00'),
(261, 'ST-PR0002_1', 'Aliquip et quaerat o', 20, 'Days', '0.03', '0.60'),
(262, 'ST-PR0002_1', 'Vero blanditiis amet', 2, 'Months', '0.50', '1.00'),
(263, 'ST-PR0002_2', 'Suscipit enim qui mo', 1, 'Years', '7839113.30', '7839113.30'),
(264, 'ST-PR0002_3', 'Suscipit enim qui mo', 1, 'Years', '750.27', '750.27'),
(265, 'ST-PR0002_3', 'Aliquip et quaerat o', 20, 'Days', '0.03', '0.60'),
(266, 'ST-PR0002_3', 'Vero blanditiis amet', 2, 'Months', '0.42', '0.84'),
(267, 'SQM-PR0002_1', 'Commodo id aperiam ', 230, 'Unit', '1.00', '230.00'),
(268, 'SQM-PR0002_2', 'Commodo id aperiam ', 230, 'Unit', '14425.97', '3317973.10'),
(269, 'SQM-PR0002_3', 'Commodo id aperiam ', 230, 'Unit', '0.84', '193.20'),
(270, 'SQ-PR0002_1', 'Aliquip neque volupt', 190, 'Years', '5.00', '950.00'),
(271, 'SQ-PR0002_2', 'Aliquip neque volupt', 190, 'Years', '25733.30', '4889327.00'),
(272, 'KEB-PR0002_1', 'Ipsam consequuntur q', 890, 'Hours', '5140.40', '4574956.00'),
(273, 'KEB-PR0002_2', 'Ipsam consequuntur q', 890, 'Hours', '0.03', '26.70');

-- --------------------------------------------------------

--
-- Table structure for table `po_item_wordbase`
--

CREATE TABLE `po_item_wordbase` (
  `id` int(11) NOT NULL,
  `no_Po` varchar(15) NOT NULL,
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
(152, 'ST-PR0001_2', 2000, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 0, 300, 0, 600, 1000, 1400, 2000, 2000),
(161, 'SQM-PR0001_1', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(162, 'SQM-PR0001_2', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(163, 'SQM-PR0001_3', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(166, 'SQ-PR0001_1', 100, 100, 100, 100, 100, 100, 100, 200, 0, 0, 0, 30, 50, 70, 100, 200),
(167, 'SQ-PR0001_2', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(168, 'KEB-PR0001_1', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(169, 'KEB-PR0001_2', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 10, 10, 25, 100, 70),
(170, 'ST-PR0001_1', 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 0, 150, 0, 300, 500, 700, 1000, 1000),
(176, 'ST-PR0001_3', 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 0, 0, 0, 300, 500, 700, 1000, 800),
(177, 'ST-PR0003_1', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `no_Po` varchar(15) NOT NULL,
  `nama_Pm` varchar(50) NOT NULL,
  `email_pm` varchar(50) NOT NULL,
  `resource_Name` varchar(50) NOT NULL,
  `resource_Email` varchar(30) NOT NULL,
  `resource_Status` enum('admin','Freelance','In House (Star Jakarta)','In House (Speequel Jakarta)','In House (Speequel Malaysia)','Vendor','Kodegiri') NOT NULL,
  `mobile_Phone` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `project_Name_po` varchar(50) NOT NULL,
  `id_quotation` varchar(9) NOT NULL,
  `public_Notes` text NOT NULL,
  `regards` text NOT NULL,
  `footer` text NOT NULL,
  `rate` decimal(11,2) NOT NULL,
  `address_Resource` text NOT NULL,
  `grand_Total_po` decimal(11,2) NOT NULL,
  `tipe` enum('item','word','','') NOT NULL,
  `tipe_Po` varchar(30) NOT NULL,
  `is_inv_in` int(11) NOT NULL DEFAULT 0,
  `v_form` enum('0','1') NOT NULL,
  `currency_po` varchar(5) NOT NULL DEFAULT 'IDR',
  `jumlah_pembayaran` int(11) NOT NULL DEFAULT 1,
  `no_po_ori` varchar(15) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `company` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`no_Po`, `nama_Pm`, `email_pm`, `resource_Name`, `resource_Email`, `resource_Status`, `mobile_Phone`, `date`, `project_Name_po`, `id_quotation`, `public_Notes`, `regards`, `footer`, `rate`, `address_Resource`, `grand_Total_po`, `tipe`, `tipe_Po`, `is_inv_in`, `v_form`, `currency_po`, `jumlah_pembayaran`, `no_po_ori`, `created_at`, `company`) VALUES
('KEB-PR0001_1', 'Jenette Boone', 'vupevaze@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '78900887', '2021-08-06', 'Atque laudantium ve', 'KEB-Q0002', '', '', '', '0.20', 'Jln. Batu No.8, Malang', '70.00', 'word', '1', 1, '0', 'USD', 3, 'KEB-PR0001', '2021-08-06', 'kodegiri'),
('KEB-PR0001_2', 'Jenette Boone', 'vupevaze@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '78900887', '2021-08-06', 'Atque laudantium ve', 'KEB-Q0002', '', '', '', '2885.19', 'Jln. Batu No.6, Malang', '620315.85', 'word', '4', 0, '0', 'IDR', 3, 'KEB-PR0001', '2021-08-06', 'kodegiri'),
('KEB-PR0002_1', 'Jenette Boone', 'vupevaze@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '78695867', '2021-08-06', 'Pariatur Ut ullamco', 'KEB-Q0001', '', '', '', '0.00', 'Jln. Batu No.6, Malang', '4574956.00', 'item', '', 1, '0', 'IDR', 3, 'KEB-PR0002', '2021-08-06', 'kodegiri'),
('KEB-PR0002_2', 'Jenette Boone', 'vupevaze@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '78695867', '2021-08-06', 'Pariatur Ut ullamco', 'KEB-Q0001', '', '', '', '0.00', '', '26.70', 'item', '', 0, '0', 'EUR', 3, 'KEB-PR0002', '2021-08-06', 'kodegiri'),
('SQ-PR0001_1', 'Carl Flynn', 'ropesiwip@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '74657499', '2021-08-06', 'Ad sint sint omnis v', 'SQ-Q0002', '', '', '', '900.00', 'Jln. Batu No.8, Bandung', '405000.00', 'word', '1', 0, '0', 'IDR', 3, 'SQ-PR0001', '2021-08-06', 'Speequal Jakarta'),
('SQ-PR0001_2', 'Carl Flynn', 'ropesiwip@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '74657499', '2021-08-06', 'Ad sint sint omnis v', 'SQ-Q0002', '', '', '', '0.06', '', '21.00', 'word', '1', 1, '0', 'USD', 3, 'SQ-PR0001', '2021-08-06', 'Speequal Jakarta'),
('SQ-PR0002_1', 'Carl Flynn', 'ropesiwip@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '4433256', '2021-08-06', 'Et proident cupidat', 'SQ-Q0003', '', '', '', '0.00', 'Jln. Batu no.8, Bandung', '950.00', 'item', '', 0, '0', 'EUR', 3, 'SQ-PR0002', '2021-08-06', 'Speequal Jakarta'),
('SQ-PR0002_2', 'Carl Flynn', 'ropesiwip@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '4433256', '2021-08-06', 'Et proident cupidat', 'SQ-Q0003', '', '', '', '0.00', 'Jln. Batu No.8, Bandung', '4889327.00', 'item', '', 0, '0', 'IDR', 3, 'SQ-PR0002', '2021-08-06', 'Speequal Jakarta'),
('SQM-PR0001_1', 'Porter Gilliam', 'nufu@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '0765352788', '2021-08-06', 'Numquam pariatur Ac', 'SQM-Q0001', '', '', '', '0.50', 'Jln. Batu No.6, Malang', '175.00', 'word', '1', 1, '0', 'EUR', 3, 'SQM-PR0001', '2021-08-06', 'Speequal Malaysia'),
('SQM-PR0001_2', 'Porter Gilliam', 'nufu@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '0765352788', '2021-08-06', 'Numquam pariatur Ac', 'SQM-Q0001', '', '', '', '8573.33', '', '3000665.50', 'word', '1', 1, '0', 'IDR', 3, 'SQM-PR0001', '2021-08-06', 'Speequal Malaysia'),
('SQM-PR0001_3', 'Porter Gilliam', 'nufu@mailinator.com', 'Boston High', 'freelnastar1@gmail.com', 'Freelance', '0765352788', '2021-08-06', 'Numquam pariatur Ac', 'SQM-Q0001', '', '', '', '0.59', '', '206.50', 'word', '1', 0, '0', 'USD', 3, 'SQM-PR0001', '2021-08-06', 'Speequal Malaysia'),
('SQM-PR0002_1', 'Porter Gilliam', 'nufu@mailinator.com', 'Boston High', 'boston@gmail.com', 'Freelance', '8697586746', '2021-08-06', 'Voluptas et voluptat', 'SQM-Q0002', '', '', '', '0.00', 'Jln. Batu No.8, Malang', '230.00', 'item', '', 0, '0', 'USD', 3, 'SQM-PR0002', '2021-08-06', 'Speequal Malaysia'),
('SQM-PR0002_2', 'Porter Gilliam', 'nufu@mailinator.com', 'Boston High', 'boston@gmail.com', 'Freelance', '8697586746', '2021-08-06', 'Voluptas et voluptat', 'SQM-Q0002', '', '', '', '0.00', '', '3317973.10', 'item', '', 0, '0', 'IDR', 3, 'SQM-PR0002', '2021-08-06', 'Speequal Malaysia'),
('SQM-PR0002_3', 'Porter Gilliam', 'nufu@mailinator.com', 'Boston High', 'boston@gmail.com', 'Freelance', '8697586746', '2021-08-06', 'Voluptas et voluptat', 'SQM-Q0002', '', '', '', '0.00', '', '193.20', 'item', '', 1, '0', 'EUR', 3, 'SQM-PR0002', '2021-08-06', 'Speequal Malaysia'),
('ST-PR0001_1', 'Josiah Collier', 'pmstarna1@gmail.com', 'Denton Dodson', 'freelnstarna1@gmail.com', 'Freelance', '65748857', '2021-08-05', 'Project Example 1', 'ST-Q0001', '', '', '', '900.00', 'Jln. Kepatihan 5, Bandung', '3285000.00', 'word', '2', 1, '0', 'IDR', 3, 'ST-PR0001', '2021-08-05', 'STAR Jakarta'),
('ST-PR0001_2', 'Josiah Collier', 'pmstarna1@gmail.com', 'Denton Dodson', 'freelnstarna1@gmail.com', 'Freelance', '65748857', '2021-08-05', 'Project Example 1', 'ST-Q0001', '', '', '', '0.06', '', '438.00', 'word', '2', 1, '0', 'USD', 3, 'ST-PR0001', '2021-08-05', 'STAR Jakarta'),
('ST-PR0001_3', 'Josiah Collier', 'pmstarna1@gmail.com', 'Denton Dodson', 'freelnstarna1@gmail.com', 'Freelance', '65748857', '2021-08-05', 'Project Example 1', 'ST-Q0001', '', '', '', '0.05', '', '165.00', 'word', '3', 0, '0', 'EUR', 3, 'ST-PR0001', '2021-08-05', 'STAR Jakarta'),
('ST-PR0002_1', 'Josiah Collier', 'pmstarna1@gmail.com', 'Denton Dodson', 'freelnastar1@gmail.com', 'Freelance', '56789976', '2021-08-05', 'Distinctio Cum susc', 'ST-Q0003', '', '', '', '0.00', '', '891.60', 'item', '', 0, '0', 'USD', 3, 'ST-PR0002', '2021-08-05', 'STAR Jakarta'),
('ST-PR0002_2', 'Josiah Collier', 'pmstarna1@gmail.com', 'Denton Dodson', 'freelnastar1@gmail.com', 'Freelance', '56789976', '2021-08-05', 'Distinctio Cum susc', 'ST-Q0003', '', '', '', '0.00', 'Jln. Kepatihan No.8, Bandung', '7839113.30', 'item', '', 1, '0', 'IDR', 3, 'ST-PR0002', '2021-08-05', 'STAR Jakarta'),
('ST-PR0002_3', 'Josiah Collier', 'pmstarna1@gmail.com', 'Denton Dodson', 'freelnastar1@gmail.com', 'Freelance', '56789976', '2021-08-05', 'Distinctio Cum susc', 'ST-Q0003', '', '', '', '0.00', 'Jln. Kepatihan No.8, Bandung', '751.71', 'item', '', 1, '0', 'EUR', 3, 'ST-PR0002', '2021-08-05', 'STAR Jakarta'),
('ST-PR0003_1', 'Josiah Collier', 'host@kodegiri.com', 'Boston High', 'freelnastar1@gmail.com', 'admin', '9788667', '2021-08-06', 'Ducimus non at quis', 'ST-Q0002', '', '', '', '154.00', '', '53900.00', 'word', '1', 0, '0', 'IDR', 3, 'ST-PR0003', '2021-08-06', 'STAR Jakarta');

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
  `price` decimal(11,2) NOT NULL,
  `cost` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quitation_item`
--

INSERT INTO `quitation_item` (`id_q_num`, `no_Quotation`, `job_Desc`, `volume`, `unit`, `price`, `cost`) VALUES
(213, 'ST-Q0001', 'cobain project 1', 1000, 'Hours', '1500.00', '1500000.00'),
(214, 'ST-Q0001', 'cobain project 2', 50, 'Days', '67800.00', '3390000.00'),
(215, 'ST-Q0002', 'Sit obcaecati culpa ', 100, 'Hours', '0.20', '20.00'),
(216, 'ST-Q0002', '2', 20, 'Days', '10.00', '200.00'),
(217, 'ST-Q0003', 'Suscipit enim qui mo', 1, 'Years', '890.00', '890.00'),
(218, 'ST-Q0003', 'Aliquip et quaerat o', 20, 'Days', '0.03', '0.60'),
(219, 'ST-Q0003', 'Vero blanditiis amet', 2, 'Months', '0.50', '1.00'),
(220, 'SQM-Q0001', 'Dolores laborum Rat', 890, 'Hours', '0.40', '356.00'),
(222, 'SQM-Q0003', 'Eum rerum minima sit', 200, 'Unit', '34500.00', '6900000.00'),
(223, 'SQM-Q0002', 'Commodo id aperiam ', 230, 'Unit', '1.00', '230.00'),
(224, 'SQ-Q0001', 'Non sed dolore rerum', 120, 'Days', '0.20', '24.00'),
(225, 'SQ-Q0002', 'Mollit eiusmod volup', 150, 'Days', '7620.00', '1143000.00'),
(226, 'SQ-Q0003', 'Aliquip neque volupt', 190, 'Years', '5.00', '950.00'),
(227, 'KEB-Q0001', 'Ipsam consequuntur q', 890, 'Hours', '0.03', '26.70'),
(229, 'KEB-Q0002', 'Eiusmod ut sed deser', 5, 'Years', '238.00', '1190.00'),
(230, 'KEB-Q0003', 'Nulla architecto in ', 300, 'Hours', '4500.00', '1350000.00');

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
  `currency` varchar(5) NOT NULL DEFAULT 'IDR',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`no_Quotation`, `project_Name`, `client_Name`, `project_Start`, `due_Date`, `client_Email`, `public_Notes`, `header`, `footer`, `total_Cost`, `grand_Total`, `is_Acc`, `is_Q`, `v_form`, `sales_name`, `currency`, `created_at`) VALUES
('KEB-Q0001', 'Pariatur Ut ullamco', 'Vivian Gay', '2021-08-06', '2021-08-21', 'vivian@gmail.com', 'Enim ut molestias cu', 'Distinctio Sint do', 'Quia soluta qui exce', '26.70', '26.70', 1, 0, '0', 'Unity Talley', 'EUR', '2021-08-06 05:48:23'),
('KEB-Q0002', 'Atque laudantium ve', 'Lunea Cobb', '1996-10-01', '1994-08-23', 'lunea@gmail.com', 'Voluptatum voluptatu', 'Dolorem minima est d', 'Occaecat beatae eius', '1190.00', '1190.00', 1, 0, '0', 'Unity Talley', 'USD', '2021-08-06 05:50:26'),
('KEB-Q0003', 'Magni tempora dolore', 'Kareem Bray', '1996-08-23', '1977-11-01', 'kareem@gmail.com', 'Laboriosam et nesci', 'Voluptatem laborios', 'Aliquam sapiente Nam', '1350000.00', '1350000.00', 1, 0, '1', 'Unity Talley', 'IDR', '2021-08-06 05:51:06'),
('SQ-Q0001', 'Doloremque modi quis', 'Kadeem Conner', '2021-08-06', '2021-08-08', 'kadeem@gmail.com', 'Atque aut at volupta', 'Id tempor quibusdam ', 'Earum enim adipisici', '24.00', '24.00', 1, 0, '0', 'Hannah Bates', 'EUR', '2021-08-06 05:43:36'),
('SQ-Q0002', 'Ad sint sint omnis v', 'Barbara Casey', '2021-08-06', '2021-08-13', 'barbara@gmail.com', 'Vero dolorum dolor q', 'Mollit anim doloremq', 'Ad animi neque et m', '1143000.00', '1143000.00', 1, 0, '1', 'Hannah Bates', 'IDR', '2021-08-06 05:44:27'),
('SQ-Q0003', 'Et proident cupidat', 'Yuri Steele', '2021-08-06', '2021-08-13', 'yuri@gmail.com', 'Sint laborum Est ', 'Irure reprehenderit', 'Aut non quibusdam do', '950.00', '950.00', 1, 0, '1', 'Hannah Bates', 'EUR', '2021-08-06 05:46:30'),
('SQM-Q0001', 'Numquam pariatur Ac', 'Tatum Marquez', '2021-08-06', '2021-08-21', 'tatum@gmail.com', 'Sequi consequuntur c', 'Est qui lorem recus', 'Eos nobis eum pariat', '356.00', '356.00', 1, 1, '0', 'Louis Rush', 'EUR', '2021-08-06 05:38:27'),
('SQM-Q0002', 'Voluptas et voluptat', 'Cherokee Moss', '2021-08-06', '2021-08-18', 'cherokee@gmail.com', 'Quo minim reprehende', 'At debitis saepe vel', 'Nihil vero est quas ', '230.00', '230.00', 1, 1, '1', 'Louis Rush', 'USD', '2021-08-06 05:39:52'),
('SQM-Q0003', 'Omnis aliqua Saepe ', 'Caleb Montgomery', '2021-08-06', '2021-08-21', 'Caleb@gmail.com', 'Quis voluptatum lore', 'Ut consectetur do v', 'Eum est in Nam maxi', '6900000.00', '6900000.00', 1, 0, '0', 'Louis Rush', 'IDR', '2021-08-06 05:41:10'),
('ST-Q0001', 'Project Example 1', 'PT. Jua Bersama', '2021-08-05', '2021-08-21', 'finstarna2@gmail.com', '', '', '', '4890000.00', '4890000.00', 1, 1, '0', 'Odessa Bolton', 'IDR', '2021-08-05 19:08:58'),
('ST-Q0002', 'Ducimus non at quis', 'Winifred Kaufman', '2021-08-05', '2021-08-14', 'finstarna2@gmail.com', 'Pariatur Maiores mi', 'Perspiciatis qui vo', 'Facilis magni volupt', '220.00', '220.00', 1, 0, '0', 'Odessa Bolton', 'EUR', '2021-08-05 19:13:12'),
('ST-Q0003', 'Distinctio Cum susc', 'Chadwick Mendoza', '2021-08-05', '2021-08-21', 'finstarna2@gmail.com', 'Rerum impedit rem v', 'Pariatur Qui ut in ', 'Est distinctio Et ', '891.60', '891.60', 1, 1, '1', 'Odessa Bolton', 'USD', '2021-08-05 19:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `resource_data`
--

CREATE TABLE `resource_data` (
  `id_resource` varchar(12) NOT NULL,
  `resource_name` varchar(30) NOT NULL,
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

INSERT INTO `resource_data` (`id_resource`, `resource_name`, `mobile_phone`, `cabang_bank`, `no_rekening`, `address`, `no_npwp`, `jenis`) VALUES
('RES001', 'Ilham Nur Inzani', '0217843814', 'Mandiri', '32252235325', 'ar3erw3radf', '52354', 'tenaga ahli'),
('RES002', 'Gary Andrews', '+1 (445) 346-99', 'Cupidatat ad optio ', 'Magna nostrum conseq', 'Recusandae Vel fugi', 'At quas magna nostru', 'vendor');

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
(39, 'STJAK-0005-2021', '1'),
(40, 'STJAK-0005-2021', '2'),
(41, 'KEB-0003-08-2021', '1'),
(42, 'KEB-0003-08-2021', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_User` varchar(7) NOT NULL,
  `user_Name` varchar(15) NOT NULL,
  `pass_Word` varchar(250) NOT NULL,
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
('STR001', 'admin', '7a25b0bc04e77a2f7453dd021168cdc2', 'Admin Finance 1', 'adminfinance@gmail.com', 4, 0, 'STR001.jpg', '2021-08-06 13:42:52', '2021-07-30 23:47:54', 'A1', 0),
('STR002', 'salesstar', 'cd2e3b502b265957378ba6f011e7a313', 'Odessa Bolton', 'freelnastar2@gmail.com', 5, 2, 'default.jpg', '2021-08-06 08:42:41', '2021-08-05 11:57:16', 'OB', 0),
('STR003', 'pmstar', '0cb672d8e4c23c5be2622d1322fde0a6', 'Josiah Collier', 'host@kodegiri.com', 1, 2, 'default.jpg', '2021-08-06 11:46:39', '2021-08-05 12:00:58', 'JC', 0),
('STR004', 'bosab', '6871aa3c9b1fbad62bf6ef25365055e0', 'Denton Dodson', 'freelnstar1@gmail.com', 7, 1, 'default.jpg', '2021-08-06 11:50:32', '2021-08-05 12:01:27', 'DD', 0),
('STR005', 'financestar', 'a67dfaec8217db3d775f9768025d7739', 'Rhea Buckner', 'finstarna2@gmail.com', 3, 2, 'default.jpg', '2021-08-06 11:54:56', '2021-08-05 12:02:01', 'RB', 0),
('STR006', 'topman_star', '0a8831bdd11507bc948742931ff985e7', 'Julian Burke', 'pmstarna2@gmail.com', 2, 2, 'default.jpg', '2021-08-06 08:12:58', '2021-08-05 12:02:46', 'JB', 0),
('STR007', 'salesspqm', 'e8d054fa99df3418690f6c3fe75bad8b', 'Louis Rush', 'vymocikozo@mailinator.com', 5, 4, 'default.jpg', '2021-08-05 23:40:21', '2021-08-05 22:10:48', 'LR', 0),
('STR008', 'salesspqj', '9cceb2a0d66dd9fe8eefe3ce27fd235a', 'Hannah Bates', 'nagumuku@mailinator.com', 5, 3, 'default.jpg', '2021-08-05 23:40:36', '2021-08-05 22:13:18', 'HB', 0),
('STR009', 'saleskg', '7d0eb03122982ce8adbbb181eba0b693', 'Unity Talley', 'nifujux@mailinator.com', 5, 6, 'default.jpg', '2021-08-06 11:43:15', '2021-08-05 22:13:56', 'UT', 0),
('STR010', 'pmspqm', 'cf76fdcd60212535578824b348c76fa1', 'Porter Gilliam', 'nufu@mailinator.com', 1, 4, 'default.jpg', '2021-08-06 08:17:48', '2021-08-05 22:14:28', 'PG', 0),
('STR011', 'pmspqj', '50f774d3b8a7d82a9b37534530da753f', 'Carl Flynn', 'ropesiwip@mailinator.com', 1, 3, 'default.jpg', '2021-08-06 00:18:47', '2021-08-05 22:15:22', 'CF', 0),
('STR012', 'pmkg', 'dd0631a49ac5242df59b1921307e5cf8', 'Jenette Boone', 'vupevaze@mailinator.com', 1, 6, 'default.jpg', '2021-08-06 08:33:34', '2021-08-05 22:18:21', 'JB', 0),
('STR013', 'boston', '6aecdfe8b004d1e8cb1e42c4414687a9', 'Boston High', 'larimysu@mailinator.com', 6, 5, 'default.jpg', '2021-08-06 08:13:42', '2021-08-05 22:19:17', 'BH', 0),
('STR014', 'financespqm', '33ca8da8482b802ac88045298b088924', 'Imani Richardson', 'bamona@mailinator.com', 3, 4, 'default.jpg', '2021-08-06 03:39:31', '2021-08-05 22:20:34', 'IR', 0),
('STR015', 'financespqj', 'eb8777af3b5d11f42d4892eca5b744db', 'Sheila Daugherty', 'kotobuny@mailinator.com', 3, 3, 'default.jpg', '2021-08-06 03:55:58', '2021-08-05 22:21:28', 'SD', 0),
('STR016', 'financekg', '8965f29e5a4877c1cbb2a7b62afaf66c', 'Berk Yang', 'komojymeh@mailinator.com', 3, 6, 'default.jpg', '2021-08-06 09:00:10', '2021-08-05 22:21:51', 'BY', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `invoice_in_item`
--
ALTER TABLE `invoice_in_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `invoice_item_local`
--
ALTER TABLE `invoice_item_local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `invoice_item_luar`
--
ALTER TABLE `invoice_item_luar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice_item_luar_2`
--
ALTER TABLE `invoice_item_luar_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_item_spq`
--
ALTER TABLE `invoice_item_spq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `invoice_item_spq_2`
--
ALTER TABLE `invoice_item_spq_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_item_itembase`
--
ALTER TABLE `po_item_itembase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `po_item_wordbase`
--
ALTER TABLE `po_item_wordbase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `quitation_item`
--
ALTER TABLE `quitation_item`
  MODIFY `id_q_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `tax_invoice`
--
ALTER TABLE `tax_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
