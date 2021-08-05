-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 01:41 PM
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
('001-VI-PF1-2021', 'project item', '2021-06-30', 'STJAK-0012-2021', 'coba project 1', 'Darkah Subin', 'project', 'PT. Sentosa Abadi', 'sentosa@gmail.com', 'STAR', 'Darkah Subin', '2021-08-05 02:58:40'),
('002-VI-FK-2021', 'project item', '2021-06-30', 'KEB-0004-06-2021', 'coba kodegiri', 'Darkah Subin', 'project', 'PT. Sentosa Abadi', 'sentosa@gmail.com', 'Cycas Rifki Yolanda', 'Darkah Subin', '2021-08-05 02:58:40'),
('003-VIII-P1-2021', 'coba BAST', '2021-08-05', 'STJAK-0028-2021', 'der', 'Darkah Subin', 'coba BAST', 'PT. Sentosa Abadi', 'sentosa@gmail.com', 'PT.STAR', 'Darkah Subin', '2021-08-05 03:20:27'),
('004-VIII-P1-2021', 'coba BAST', '2021-08-05', 'STJAK-0028-2021', 'der', 'Darkah Subin', 'coba BAST', 'PT. Sentosa Abadi', 'pmstarna1@gmail.com', 'PT. STAR', 'Darkah Subin', '2021-08-05 03:22:02');

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
(29, '002-VI-FK-2021', 'coba kodegiri', 350, 'Hours', 1),
(30, '003-VIII-P1-2021', 'nkkm/990/df', 1, 'word', 0),
(32, '004-VIII-P1-2021', 'nkkm/990/df', 1, 'Unit', 1);

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
  `total_cost` decimal(11,2) NOT NULL,
  `grand_total` decimal(11,2) NOT NULL,
  `tipe` enum('word','item','','') NOT NULL,
  `v_form` enum('0','1') NOT NULL,
  `is_Acc` int(11) NOT NULL DEFAULT 0,
  `currency_inv` varchar(36) DEFAULT 'IDR',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_in`
--

INSERT INTO `invoice_in` (`no_invoice`, `no_Po`, `no_rekening`, `cabang_bank`, `mitra_name`, `address`, `down_payment`, `invoice_date`, `due_date`, `email`, `no_npwp`, `public_notes`, `terms`, `signature`, `footer`, `total_cost`, `grand_total`, `tipe`, `v_form`, `is_Acc`, `currency_inv`, `created_at`) VALUES
('KEB-0001-06-2021', 'KEB-PR0001', '3456789', 'BRI', 'Freelance Kodegiri', 'Jln. Panyawangan, Bandung', 500, '2021-06-25', '2021-06-30', 'flkg@gmail.com', '45767890', '', '', '', '', '193500.00', '189630.00', 'word', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('KEB-0002-06-2021', 'KEB-PR0002', '3456789', 'BRI', 'Freelance Kodegiri', 'Jln. Panyawangan, Bandung', 0, '2021-06-25', '2021-06-30', 'flkg@gmail.com', '45767890', '', '', '', '', '510000.00', '499800.00', 'item', '1', 0, 'IDR', '2021-08-02 19:45:39'),
('SQJAK-0006-06-2021', 'SQ-PR0014', '5435345', 'BCA', 'freelance 1', 'coba address 1', 10000, '2021-06-15', '2021-06-23', 'fl1@gmail.com', '634345', '', '', '', '', '136200.00', '136200.00', 'word', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('SQJAK-0007-06-2021', 'SQ-PR0017', '5435345', 'BCA', 'freelance 1', 'coba address 1', 10000, '2021-06-15', '2021-06-19', 'fl1@gmail.com', '634345', '', '', '', '', '158190.00', '158190.00', 'item', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0003-2021', 'ST-PR0007', '5435345', 'BCA', 'ilham nur inzani', 'coba address 2', 500, '2021-06-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'rg', 'ar', 'ft', '92000.00', '92000.00', 'word', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0004-2021', 'ST-PR0010', '5435345', 'coba project', 'ilham nur inzani', 'coba address', 500, '2021-06-16', '2021-06-18', 'ilhamham@gmail.com', '634345', 'pn', 'reg', 'rress', 'foot', '142500.00', '142500.00', 'word', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0005-2021', 'ST-PR0011', '5435345', 'BCA', 'ilham nur inzani', 'coba address 1', 5000, '2021-05-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'reg', 'addr', 'foot', '190190.00', '178779.00', 'item', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0006-2021', 'ST-PR0020', '776475890', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 10000, '2021-05-14', '2021-06-24', 'ilhamham@gmail.com', '445653345', 'dsadasdas', '', '', '', '85410.00', '80285.00', 'word', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0009-2021', 'ST-PR0022', '2675889', 'BRI', 'Zoey Panda', 'Jln. Kedamaian No. 11', 5000, '2021-06-25', '2021-06-26', 'zoeypanda@gmail.com', '775684956', '', '', '', '', '82400.00', '80340.00', 'item', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0010-2021', 'ST-PR0021', '2675889', 'BRI', 'Zoey Panda', 'Jln. Kedamaian No. 11', 0, '2021-06-24', '2021-06-30', 'zoeypanda@gmail.com', '775684956', '', '', '', '', '193500.00', '188663.00', 'word', '0', 0, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0013-2021', 'ST-PR0024', '776475890', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 5000, '2021-07-09', '2021-07-16', 'ilhamham@gmail.com', '445653345', '', '', '', '', '50000.00', '47000.00', 'item', '0', 1, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0014-2021', 'ST-PR0025_2', '776475890', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 50000, '2021-07-15', '2021-07-17', 'ilhamham@gmail.com', '445653345', '', '', '', '', '4900000.00', '4606000.00', 'word', '0', 1, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0016-2021', 'ST-PR0028_1', '776475890', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 300, '2021-07-17', '2021-07-21', 'ilhamham@gmail.com', '445653345', '', '', '', '', '5000000.00', '4700000.00', 'item', '0', 1, 'IDR', '2021-08-02 19:45:39'),
('STJAK-0017-2021', 'ST-PR0027_2', '12345', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 0, '2021-08-03', '2021-08-03', 'ilhamham@gmail.com', '445653345', '', '', '', '', '7096740.00', '6670935.60', 'word', '0', 0, 'IDR', '2021-08-03 21:14:46'),
('STJAK-0018-2021', 'ST-PR0027_1', '5679', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 0, '2021-08-03', '2021-08-03', 'ilhamham@gmail.com', '445653345', '', '', '', '', '245.00', '245.00', 'word', '0', 0, 'USD', '2021-08-03 21:29:19'),
('STJAK-0020-2021', 'ST-PR0026_1', '776475890', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 0, '2021-08-04', '2021-08-04', 'ilhamham@gmail.com', '445653345', '', '', '', '', '60.80', '60.80', 'item', '0', 0, 'EUR', '2021-08-03 23:29:01'),
('STJAK-0021-2021', 'ST-PR0026_2', '53533565', 'Bank Mandiri', 'ilham nur inzani', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', 0, '2021-08-04', '2021-08-04', 'ilhamham@gmail.com', '445653345', '', '', '', '', '4662000.00', '4382280.00', 'item', '0', 0, 'IDR', '2021-08-03 23:37:37');

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
(70, 'STJAK-0004-2021', 'project ke 12', 830, '', '120.00', '99600.00'),
(71, 'STJAK-0004-2021', 'coba 2', 110, '', '390.00', '42900.00'),
(81, 'SQJAK-0006-06-2021', 'project ke 14', 810, '', '120.00', '97200.00'),
(82, 'SQJAK-0006-06-2021', 'tambah project 1', 100, '', '390.00', '39000.00'),
(86, 'SQJAK-0007-06-2021', 'coba 1', 100, 'Hours', '390.00', '39000.00'),
(87, 'SQJAK-0007-06-2021', 'coba 2', 210, 'Hours', '339.00', '71190.00'),
(88, 'SQJAK-0007-06-2021', 'coba 3', 480, 'Hours', '100.00', '48000.00'),
(89, 'STJAK-0003-2021', 'Eu duis voluptatibus', 810, '', '100.00', '81000.00'),
(90, 'STJAK-0003-2021', 'coba 1', 110, '', '100.00', '11000.00'),
(121, 'STJAK-0009-2021', 'coba ini', 124, 'Days', '100.00', '12400.00'),
(122, 'STJAK-0009-2021', 'coba lagi', 700, 'Hours', '100.00', '70000.00'),
(125, 'STJAK-0010-2021', 'coba coba', 215, '', '900.00', '193500.00'),
(127, 'KEB-0001-06-2021', 'coba project ke 2', 215, '', '900.00', '193500.00'),
(128, 'KEB-0002-06-2021', 'coba 1', 300, 'Days', '200.00', '60000.00'),
(129, 'KEB-0002-06-2021', 'coba 2', 500, 'Hours', '900.00', '450000.00'),
(130, 'STJAK-0013-2021', 'coba 1', 100, 'Hours', '500.00', '50000.00'),
(132, 'STJAK-0006-2021', 'coba project 15', 657, '', '130.00', '85410.00'),
(133, 'STJAK-0005-2021', 'Ut id quibusdam quo ', 100, 'Hours', '512.00', '51200.00'),
(134, 'STJAK-0005-2021', 'coba 2', 200, 'Hours', '339.00', '67800.00'),
(135, 'STJAK-0005-2021', 'coba 3', 210, 'Hours', '339.00', '71190.00'),
(138, 'STJAK-0014-2021', 'der', 700, '', '7000.00', '4900000.00'),
(139, 'STJAK-0016-2021', 'coba po 1', 5000, 'Hours', '1000.00', '5000000.00'),
(150, 'STJAK-0018-2021', 'coba quot baru', 3500, '', '0.07', '245.00'),
(152, 'STJAK-0017-2021', 'coba quot baru', 7000, '', '1013.82', '7096740.00'),
(155, 'STJAK-0020-2021', 'coba ii', 190, 'Hours', '0.32', '60.80'),
(157, 'STJAK-0021-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00');

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
(7, 'STJAK-0012-2021', 'coba ini 1', 100, 'Days', '100.00', '10000.00'),
(8, 'STJAK-0012-2021', 'coba lagi', 700, 'Hours', '100.00', '70000.00'),
(10, 'KEB-0003-06-2021', 'cek', 1400, 'Hours', '1.00', '1400.00'),
(11, 'STJAK-0022-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00'),
(12, 'STJAK-0023-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00'),
(13, 'STJAK-0024-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00'),
(14, 'STJAK-0025-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00'),
(15, 'STJAK-0026-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00'),
(16, 'STJAK-0027-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00'),
(17, 'STJAK-0029-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00'),
(18, 'STJAK-0030-2021', 'coba', 9000, 'Hours', '518.00', '4662000.00');

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
(2, 'STJAK-0015-2021', 'der', 'ben zoskan', '', 700, '7000.00', '4900000.00');

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

--
-- Dumping data for table `invoice_item_spq_2`
--

INSERT INTO `invoice_item_spq_2` (`id`, `no_invoice`, `pre_invoice`, `date_deliv`, `amount`) VALUES
(3, 'STJAK-0028-2021', 'nkkm/990/df', '2021-08-05', 4900000);

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
  `tipe` int(11) NOT NULL,
  `currency_inv` varchar(36) NOT NULL DEFAULT 'IDR',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_out`
--

INSERT INTO `invoice_out` (`no_invoice`, `no_Po`, `client_name`, `account`, `swift_code`, `address`, `down_payment`, `invoice_date`, `due_date`, `email`, `no_rek`, `public_notes`, `terms`, `signature`, `footer`, `total_cost`, `grand_total`, `tipe`, `currency_inv`, `created_at`) VALUES
('KEB-0003-06-2021', 'KEB-PR0004', 'Bambang Mustajab', 'financedept@bintang‐35.net', '', 'Jln. Siliwangi, Bandung', 0, '2021-06-15', '2021-06-25', 'bmclient@gmail.com', '5', '', '', '', '', 1400, 1176, 2, 'IDR', '2021-08-02 19:15:09'),
('KEB-0004-06-2021', 'KEB-PR0003', 'Darkah Subin', '0902211411', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-06-18', '2021-06-30', 'sentosa@gmail.com', '2', '', '', '', '', 315000, 315000, 3, 'IDR', '2021-08-02 19:15:09'),
('SQJAK-0008-06-2021', 'SQ-PR0015', 'Darkah Subin', '090 2212221', 'BBBAIDJA', 'coba address 1', 10000, '2021-06-15', '2021-06-30', 'freelnastar11@gmail.com', '3', '', '', '', '', 192000, 192000, 4, 'IDR', '2021-08-02 19:15:09'),
('STJAK-0012-2021', 'ST-PR0022', 'Darkah Subin', '0701137302', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-06-26', '2021-06-30', 'sentosa@gmail.com', '1', 'ss', '', '', '', 80000, 66400, 2, 'IDR', '2021-08-02 19:15:09'),
('STJAK-0015-2021', 'ST-PR0025_2', 'Darkah Subin', '0701137302', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-08-01', '2021-08-06', 'sentosa@gmail.com', '1', '', '', '', '', 4900000, 4067000, 1, 'IDR', '2021-08-02 19:15:09'),
('STJAK-0022-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-14', 'pmstarna1@gmail.com', '1', '', '', '', '', 4662000, 3962700, 2, 'IDR', '2021-08-05 01:01:36'),
('STJAK-0023-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-05', 'pmstarna1@gmail.com', '1', '', '', '', '', 4662000, 3962700, 2, 'IDR', '2021-08-05 01:08:16'),
('STJAK-0024-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-05', 'pmstarna1@gmail.com', '1', '', '', '', '', 4662000, 4195800, 2, 'IDR', '2021-08-05 01:11:29'),
('STJAK-0025-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-05', 'jaya@gmail.com', '1', '', '', '', '', 4662000, 4662000, 2, 'IDR', '2021-08-05 01:15:12'),
('STJAK-0026-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-05', 'jaya@gmail.com', '1', '', '', '', '', 4662000, 4195800, 2, 'IDR', '2021-08-05 01:16:33'),
('STJAK-0027-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-05', 'jaya@gmail.com', '1', '', '', '', '', 4662000, 4195800, 2, 'IDR', '2021-08-05 01:18:07'),
('STJAK-0028-2021', 'ST-PR0025_2', 'Darkah Subin', '0701137302', 'BBBAIDJA', 'Jln. Kaliurang, D . I. Yogyakarta', 0, '2021-08-05', '2021-08-05', 'pmstarna1@gmail.com', '1', '', '', '', '', 4900000, 4410000, 5, 'IDR', '2021-08-05 01:19:50'),
('STJAK-0029-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-05', 'pmstarna1@gmail.com', '1', '', '', '', '', 4662000, 4195800, 2, 'IDR', '2021-08-05 01:27:23'),
('STJAK-0030-2021', 'ST-PR0026_2', 'Nur Minah', '0701137302', 'BBBAIDJA', 'Jln. Thamrin, Jakarta', 0, '2021-08-05', '2021-08-05', 'pmstarna1@gmail.com', '1', '', '', '', '', 4662000, 4195800, 2, 'IDR', '2021-08-05 01:32:27');

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
  `rate` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_item_itembase`
--

INSERT INTO `po_item_itembase` (`id`, `no_Po`, `task`, `qty`, `unit`, `rate`, `amount`) VALUES
(13, 'SQ-PR0005', 'Iure dolorem dolores', 400, 'Hours', '819.00', '327600.00'),
(14, 'SQ-PR0005', 'Aperiam sunt ea quia', 70, 'Hours', '663.00', '46410.00'),
(15, 'SQ-PR0005', 'Quis sint aliquip si', 6, 'Hours', '520.00', '3120.00'),
(16, 'SQ-PR0006', 'Quaerat ipsum digni', 39, 'Hours', '390.00', '15210.00'),
(17, 'SQ-PR0006', 'Blanditiis est quas', 345, 'Hours', '403.00', '139035.00'),
(18, 'SQ-PR0006', 'Aspernatur amet in ', 678, 'Hours', '428.00', '290184.00'),
(91, 'SQ-PR0017', 'coba 1', 100, 'Hours', '390.00', '39000.00'),
(92, 'SQ-PR0017', 'coba 2', 210, 'Hours', '339.00', '71190.00'),
(93, 'SQ-PR0016', 'coba 1', 39, 'Hours', '390.00', '15210.00'),
(94, 'SQ-PR0016', 'Quaerat ipsum digni', 400, 'Hours', '1000.00', '400000.00'),
(95, 'SQ-PR0016', 'coba 2', 200, 'Hours', '339.00', '67800.00'),
(142, 'KEB-PR0002', 'coba 1', 300, 'Days', '200.00', '60000.00'),
(143, 'KEB-PR0002', 'coba 2', 500, 'Hours', '900.00', '450000.00'),
(144, 'KEB-PR0004', 'cek', 1400, 'Hours', '1.00', '1400.00'),
(229, 'ST-PR0004', 'Iure dolorem dolores', 400, 'Hours', '8190.00', '3276000.00'),
(230, 'ST-PR0004', 'Aperiam sunt ea quia', 70, 'Hours', '6630.00', '464100.00'),
(231, 'ST-PR0004', 'Quis sint aliquip si', 6, 'Hours', '5200.00', '31200.00'),
(232, 'ST-PR0004', 'coba 2', 200, 'Hours', '12000.00', '2400000.00'),
(233, 'ST-PR0013', 'coba 1', 100, 'Hours', '10000.00', '1000000.00'),
(234, 'ST-PR0022', 'coba ini', 124, 'Days', '1000.00', '124000.00'),
(235, 'ST-PR0022', 'coba lagi', 700, 'Hours', '10000.00', '7000000.00'),
(236, 'ST-PR0024', 'coba 1', 100, 'Hours', '50000.00', '5000000.00'),
(241, 'ST-PR0029_1', 'coba ini ya! (diedit 3x)', 570, 'Hours', '0.05', '28.50'),
(242, 'ST-PR0029_2', 'coba ini ya! (diedit 3x)', 120, 'Hours', '0.05', '6.00'),
(243, 'ST-PR0029_2', 'bonus', 2, 'Hours', '0.10', '0.20'),
(244, 'ST-PR0026_1', 'coba ii', 190, 'Hours', '0.32', '60.80'),
(245, 'ST-PR0026_2', 'coba', 9000, 'Hours', '518.00', '4662000.00');

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
(45, 'KEB-PR0001', 0, 0, 100, 100, 100, 100, 100, 100, 0, 0, 0, 10, 10, 25, 100, 70),
(46, 'KEB-PR0003', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(112, 'ST-PR0025_1', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(117, 'ST-PR0025_2', 200, 200, 200, 200, 200, 200, 200, 200, 0, 0, 0, 60, 100, 140, 200, 200),
(131, 'ST-PR0028_1', 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 0, 30, 50, 70, 100, 100),
(134, 'ST-PR0028_2', 50, 50, 50, 50, 50, 50, 50, 50, 0, 0, 0, 15, 25, 35, 50, 50),
(135, 'ST-PR0010', 1000, 1000, 1000, 1000, 1000, 1000, 1100, 1200, 0, 0, 0, 100, 100, 250, 1100, 840),
(136, 'ST-PR0018', 1000, 2000, 2000, 2000, 1000, 2000, 2000, 2000, 0, 0, 0, 600, 500, 1400, 2000, 1600),
(140, 'ST-PR0027_3', 1000, 1000, 1000, 1000, 1000, 1000, 1000, 900, 0, 0, 0, 300, 500, 700, 1000, 900),
(142, 'ST-PR0027_1', 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 0, 0, 0, 300, 500, 700, 1000, 1000),
(144, 'ST-PR0027_2', 2000, 2000, 2000, 2000, 2000, 2000, 2000, 2000, 0, 0, 0, 600, 1000, 1400, 2000, 2000);

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
('KEB-PR0001', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'admin', '08956673455', '2021-06-30', 'coba project ke 2', 'KEB-Q0004', '', '', '', '900.00', '', '193500.00', 'word', '4', 1, '0', 'IDR', 1, '', '2021-08-01', 'kodegiri'),
('KEB-PR0002', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'Freelance', '08956673455', '2021-06-26', 'coba project kodegiri', 'KEB-Q0003', '', '', '', '0.00', '', '510000.00', 'item', '', 1, '0', 'IDR', 1, '', '2021-08-01', 'kodegiri'),
('KEB-PR0003', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'Freelance', '08956673455', '2021-06-25', 'coba kodegiri', 'KEB-Q0001', '', '', '', '900.00', '', '315000.00', 'word', '1', 0, '0', 'IDR', 1, '', '2021-08-01', 'kodegiri'),
('KEB-PR0004', 'project manager kodegiri', 'pmkg@gmail.com', 'Freelance Kodegiri', 'flkg@gmail.com', 'admin', '08956673455', '2021-06-25', 'coba 3', 'KEB-Q0005', '', '', '', '0.00', '', '1400.00', 'item', '', 0, '0', 'IDR', 1, '', '2021-08-01', 'kodegiri'),
('SQ-PR0005', 'project manager 1', 'kiviw@mailinator.com', 'Provident totam sed', 'Reuben Steele', 'Freelance', 'Eveniet volupta', '1995-10-18', 'Consectetur veniam ', 'ST-Q0009', 'Qui sit cum tempori', 'Et nihil sit sequi d', 'Cupidatat ex nemo of', '0.00', 'Quia aliquid archite', '377130.00', 'item', '', 0, '0', 'IDR', 1, '', '2021-08-01', 'Speequal Jakarta'),
('SQ-PR0006', 'project manager 1', 'rore@mailinator.com', 'Distinctio Amet nu', 'Iola Beck', 'Freelance', 'Sequi laborum a', '1996-04-06', 'Eu duis voluptatibus', 'ST-Q0008', 'Pariatur Est qui a', 'Quo magna Nam ut ut ', 'Aut tenetur ipsam au', '0.00', 'Quo ducimus totam e', '444429.00', 'item', '', 0, '0', 'IDR', 1, '', '2021-08-01', 'Speequal Jakarta'),
('SQ-PR0007', 'project manager 1', 'pm1@gmail.com', 'coba edit 1', 'Jaden Andrews', 'In House (Speequel Jakarta)', 'Sapiente expedi', '1920-11-22', 'Eu duis voluptatibus', 'ST-Q0008', 'Perspiciatis conseq', 'Non officia illum o', 'In aute sed obcaecat', '100.00', 'Minima proident ape', '33800.00', 'word', '3', 1, '0', 'IDR', 1, '', '2021-08-01', 'Speequal Jakarta'),
('SQ-PR0015', 'project manager 1', 'pm1@gmail.com', 'fl1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 15', '', '', '', '', '120.00', '', '87600.00', 'word', '2', 1, '0', 'IDR', 1, '', '2021-08-01', 'Speequal Jakarta'),
('SQ-PR0016', 'project manager 1', 'pm1@gmail.com', 'freelance 1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 3', 'ST-Q0014', '', '', '', '0.00', '', '483010.00', 'item', '', 0, '0', 'IDR', 1, '', '2021-08-01', 'Speequal Jakarta'),
('SQ-PR0017', 'project manager 1', 'pm1@gmail.com', 'freelance 1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project', '', '', '', '', '0.00', '', '110190.00', 'item', '', 1, '0', 'IDR', 1, '', '2021-08-01', 'Speequal Jakarta'),
('ST-PR0004', 'ben zoskan', 'ben@mailinator.com', 'Soluta incididunt ve', 'mod@gmail.com', 'Freelance', '0897654678', '2010-11-17', 'Consectetur veniam ', 'ST-Q0009', '', '', '', '0.00', '', '6171300.00', 'item', '', 0, '0', 'IDR', 1, '', '2021-08-01', 'STAR Jakarta'),
('ST-PR0010', 'ben zoskan', 'bneks@gmail.com', 'Ilham Nur Inzani', 'ilham@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'project ke 12', 'ST-Q0012', 'coba pn', 'coba reg', 'coba foot', '1200.00', 'coba addr', '2868000.00', 'word', '4', 1, '0', 'IDR', 1, '', '2021-08-01', 'STAR Jakarta'),
('ST-PR0013', 'ben zoskan', 'bneks@gmail.com', 'Ilham Nur Inzani', 'beck@gmail.com', 'Freelance', '0897654678', '2021-06-16', 'coba project', '', '', '', '', '0.00', '', '1000000.00', 'item', '', 0, '0', 'IDR', 1, '', '2021-08-01', 'STAR Jakarta'),
('ST-PR0018', 'ben zoskan', 'bneks@gmail.com', 'freelance 1', 'dsadsa', 'Freelance', '0897654678', '2021-06-16', 'project ke 13', 'ST-Q0013', '', '', '', '1000.00', '', '6100000.00', 'word', '3', 0, '0', 'IDR', 1, '', '2021-08-01', 'STAR Jakarta'),
('ST-PR0022', 'ben zoskan', 'bneks@gmail.com', 'Zoey Panda', 'zoeypanda@gmail.com', 'Freelance', '0897655432', '2021-06-26', 'coba project', 'ST-Q0017', '', '', '', '0.00', '', '7124000.00', 'item', '', 1, '0', 'IDR', 1, '', '2021-08-01', 'STAR Jakarta'),
('ST-PR0024', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'Freelance', '0856879465', '2021-07-08', 'coba ini', 'ST-Q0022', '', '', '', '0.00', '', '5000000.00', 'item', '', 1, '0', 'IDR', 1, '', '2021-08-01', 'STAR Jakarta'),
('ST-PR0025_1', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'Freelance', '0856879465', '2021-07-14', 'der', 'ST-Q0021', '', '', '', '7000.00', '', '2450000.00', 'word', '1', 0, '0', 'IDR', 2, 'ST-PR0025', '2021-08-01', 'STAR Jakarta'),
('ST-PR0025_2', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'Freelance', '0856879465', '0000-00-00', 'der', 'ST-Q0021', '', '', '', '7000.00', '', '4900000.00', 'word', '1', 1, '0', 'IDR', 2, 'ST-PR0025', '2021-08-01', 'STAR Jakarta'),
('ST-PR0026_1', 'ben zoskan', 'pmstarna1@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'Freelance', '0856879465', '2021-07-14', 'coba', 'ST-Q0020', '', '', '', '0.00', '', '60.80', 'item', '', 1, '0', 'EUR', 2, 'ST-PR0026', '2021-08-01', 'STAR Jakarta'),
('ST-PR0026_2', 'ben zoskan', 'pmstarna1@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'Freelance', '0856879465', '2021-07-14', 'coba', 'ST-Q0020', '', '', '', '0.00', '', '4662000.00', 'item', '', 1, '0', 'IDR', 2, 'ST-PR0026', '2021-08-01', 'STAR Jakarta'),
('ST-PR0027_1', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'Freelance', '0856879465', '2021-07-14', 'coba quot baru', 'ST-Q0023', '', '', '', '0.07', '', '241.50', 'word', '1', 1, '0', 'USD', 3, 'ST-PR0027', '2021-08-01', 'STAR Jakarta'),
('ST-PR0027_2', 'ben zoskan', 'pmstarna1@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'Freelance', '0856879465', '2021-07-17', 'coba quot baru', 'ST-Q0023', '', '', '', '1013.82', '', '7096740.00', 'word', '1', 1, '0', 'IDR', 3, 'ST-PR0027', '2021-08-01', 'STAR Jakarta'),
('ST-PR0027_3', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'pmstarna1@gmail.com', 'Freelance', '0856879465', '2021-08-01', 'coba quot baru2', 'ST-Q0023', '', '', '', '0.07', '', '234.60', 'word', '1', 0, '0', 'USD', 3, 'ST-PR0027', '2021-08-02', 'STAR Jakarta'),
('ST-PR0028_1', 'ben zoskan', 'bneks@gmail.com', 'sam', 'pmstarna1@gmail.com', 'admin', '089667485767', '2021-08-02', 'fgy', 'ST-Q0027', '', '', '', '1.50', '', '525.00', 'word', '1', 0, '0', 'EUR', 2, 'ST-PR0028', '2021-08-02', 'STAR Jakarta'),
('ST-PR0028_2', 'ben zoskan', 'bneks@gmail.com', 'sam', 'pmstarna1@gmail.com', 'admin', '089667485767', '2021-08-02', 'fgy', 'ST-Q0027', '', '', '', '1.50', '', '262.50', 'word', '1', 0, '0', 'EUR', 2, 'ST-PR0028', '2021-08-02', 'STAR Jakarta'),
('ST-PR0029_1', 'ben zoskan', 'pmstarna1@gmail.com', 'monsieur', 'pmstarna1@gmail.com', 'Freelance', '345578', '2021-08-02', 'edit quot', 'ST-Q0026', '', '', '', '0.00', '', '28.50', 'item', '', 0, '0', 'USD', 2, 'ST-PR0029', '2021-08-02', 'STAR Jakarta'),
('ST-PR0029_2', 'ben zoskan', 'pmstarna1@gmail.com', 'monsieur', 'pmstarna1@gmail.com', 'Freelance', '345578', '2021-08-02', 'edit quot', 'ST-Q0026', '', '', '', '0.00', '', '6.20', 'item', '', 0, '0', 'USD', 2, 'ST-PR0029', '2021-08-02', 'STAR Jakarta');

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
(11, 'ST-Q0005', 'Minim aperiam consec', 100, 'Unit', '1200.00', '120000.00'),
(12, 'ST-Q0005', 'Unde aut eiusmod ess', 23, 'Hours', '872.00', '20056.00'),
(13, 'ST-Q0005', 'Perspiciatis cillum', 500, 'Months', '800.00', '400000.00'),
(14, 'ST-Q0005', 'Consequatur Corpori', 400, 'Unit', '758.00', '303200.00'),
(19, 'ST-Q0006', 'Ullamco maxime moles', 10, 'Hours', '752.00', '7520.00'),
(20, 'ST-Q0006', 'Culpa minima corpor', 12, 'Days', '354.00', '4248.00'),
(21, 'ST-Q0006', 'Assumenda commodo am', 23, 'Days', '14.00', '322.00'),
(22, 'ST-Q0007', 'Dignissimos voluptas', 100, 'Years', '426.00', '42600.00'),
(23, 'ST-Q0007', 'Eaque doloribus magn', 500, 'Months', '276.00', '138000.00'),
(24, 'ST-Q0007', 'Aspernatur a qui lab', 30000, 'Months', '826.00', '24780000.00'),
(25, 'ST-Q0008', 'Quaerat ipsum digni', 39, 'Hours', '390.00', '15210.00'),
(26, 'ST-Q0008', 'Blanditiis est quas', 345, 'Months', '403.00', '139035.00'),
(27, 'ST-Q0008', 'Aspernatur amet in ', 678, 'Days', '428.00', '290184.00'),
(35, 'ST-Q0009', 'Iure dolorem dolores', 400, 'Hours', '819.00', '327600.00'),
(36, 'ST-Q0009', 'Aperiam sunt ea quia', 70, 'Hours', '663.00', '46410.00'),
(37, 'ST-Q0009', 'Quis sint aliquip si', 6, 'Hours', '520.00', '3120.00'),
(38, 'ST-Q0010', 'Ut id quibusdam quo ', 100, 'Unit', '512.00', '51200.00'),
(42, 'ST-Q0011', 'Culpa vel voluptate', 60, 'Hours', '711.00', '42660.00'),
(43, 'ST-Q0011', 'Dolore iure officiis', 10, 'Hours', '883.00', '8830.00'),
(44, 'ST-Q0011', 'Rerum magnam velit r', 48, 'Hours', '53.00', '2544.00'),
(45, 'ST-Q0012', 'list project 1', 100, 'Days', '390.00', '39000.00'),
(46, 'ST-Q0012', 'list project 2', 200, 'Hours', '426.00', '85200.00'),
(47, 'ST-Q0013', 'list pekerjaan 1', 100, 'Hours', '390.00', '39000.00'),
(48, 'ST-Q0013', 'list pekerjaan 2', 200, 'Hours', '426.00', '85200.00'),
(51, 'ST-Q0015', 'coba 1', 810, 'Hours', '100.00', '81000.00'),
(54, 'ST-Q0014', 'coba 1', 39, 'Hours', '390.00', '15210.00'),
(55, 'ST-Q0014', 'Quaerat ipsum digni', 400, 'Years', '1000.00', '400000.00'),
(62, 'ST-Q0016', 'coba 1', 100, 'Hours', '150.00', '15000.00'),
(63, 'ST-Q0016', 'coba 2', 12, 'Months', '100.00', '1200.00'),
(76, 'SQM-Q0001', 'coba coba', 130, 'Days', '90.00', '11700.00'),
(77, 'SQM-Q0002', 'coba 1', 140, 'Hours', '150.00', '21000.00'),
(78, 'SQM-Q0003', 'kodegiri 1', 56, 'Days', '1678.00', '93968.00'),
(84, 'SQM-Q0004', 'fgfdgfd', 300, 'Hours', '459.00', '137700.00'),
(85, 'SQM-Q0004', 'ddghtre', 366, 'Hours', '567.00', '207522.00'),
(92, 'SQM-Q0005', 'sdsda123', 4579, 'Hours', '100.00', '457900.00'),
(93, 'SQM-Q0005', 'dfgttr321', 400, 'Hours', '200.00', '80000.00'),
(94, 'KEB-Q0001', 'asasd', 120, 'Hours', '100.00', '12000.00'),
(95, 'ST-Q0017', 'coba ini', 124, 'Days', '100.00', '12400.00'),
(96, 'ST-Q0017', 'coba lagi', 700, 'Hours', '100.00', '70000.00'),
(97, 'ST-Q0018', 'coba ini', 700, 'Hours', '800.00', '560000.00'),
(110, 'KEB-Q0002', 'coba 1', 300, 'Hours', '100.00', '1.74'),
(111, 'KEB-Q0002', 'coba 2', 46, 'Days', '1000.00', '2.66'),
(114, 'KEB-Q0003', 'coba 1', 300, 'Days', '200.00', '59855.76'),
(115, 'KEB-Q0003', 'coba 2', 500, 'Hours', '900.00', '449280.52'),
(116, 'KEB-Q0004', 'coba lagi', 400, 'Hours', '900.00', '360000.00'),
(117, 'KEB-Q0005', 'cek', 1400, 'Hours', '1.00', '1400.00'),
(118, 'KEB-Q0006', 'coba item', 3, 'Hours', '67.00', '201.00'),
(133, 'ST-Q0020', 'coba', 190, 'Hours', '560.00', '106400.00'),
(143, 'ST-Q0021', 'der', 600, 'Hours', '900.00', '37.26'),
(147, 'ST-Q0022', 'coba 1', 100, 'Hours', '500.00', '50000.00'),
(148, 'ST-Q0023', 'coba 1', 4900, 'Hours', '1000.00', '4900000.00'),
(149, 'ST-Q0024', 'coba po 1', 5000, 'Hours', '1000.00', '5000000.00'),
(195, 'ST-Q0028', 'fer', 459, 'Hours', '678.00', '311202.00'),
(197, 'ST-Q0027', 'dsdas', 567, 'Hours', '0.04', '22.68'),
(198, 'ST-Q0026', 'coba ini ya! (diedit 3x)', 570, 'Hours', '0.05', '28.50');

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
('KEB-Q0001', 'coba kodegiri', 'Darkah Subin', '2021-06-23', '2021-06-23', 'sentosa@gmail.com', '', '', '', '12000.00', '12000.00', 1, 1, '0', 'Sales Kodegiri', 'IDR', '2021-07-31 13:37:27'),
('KEB-Q0002', 'coba project kodegiri', 'Darkah Subin', '2021-06-25', '2021-06-25', 'sentosa@gmail.com', '', '', '', '4.40', '4.40', 0, 0, '1', 'Sales Kodegiri', 'EUR', '2021-07-31 13:37:27'),
('KEB-Q0003', 'coba project kodegiri', 'Bambang Mustajab', '2021-06-30', '2021-06-26', 'bmclient@gmail.com', '', '', '', '509136.28', '509136.28', 1, 1, '1', 'Sales Kodegiri', 'IDR', '2021-07-31 13:37:27'),
('KEB-Q0004', 'coba project ke 2', 'Bambang Mustajab', '2021-06-29', '2021-06-24', 'bmclient@gmail.com', '', '', '', '360000.00', '360000.00', 1, 1, '0', 'Sales Kodegiri', 'IDR', '2021-07-31 13:37:27'),
('KEB-Q0005', 'coba 3', 'Bambang Mustajab', '2021-06-25', '2021-06-25', 'bmclient@gmail.com', '', '', '', '1400.00', '1400.00', 1, 1, '0', 'Sales Kodegiri', 'IDR', '2021-07-31 13:37:27'),
('KEB-Q0006', 'coba 4', 'Darkah Subin', '2021-06-25', '2021-06-25', 'sentosa@gmail.com', '', '', '', '201.00', '201.00', 1, 0, '0', 'Sales Kodegiri', 'IDR', '2021-07-31 13:37:27'),
('SQM-Q0001', 'coba 1', 'Nur Minah', '2021-06-16', '2021-06-16', 'jaya@gmail.com', '', '', '', '11700.00', '11700.00', 1, 0, '1', 'sales ke 1', 'IDR', '2021-07-31 13:37:27'),
('SQM-Q0002', 'coba ke 1', 'Nur Minah', '2021-06-16', '2021-06-16', 'jaya@gmail.com', '', '', '', '21000.00', '21000.00', 1, 0, '1', 'sales ke 1', 'IDR', '2021-07-31 13:37:27'),
('SQM-Q0003', 'coba project', 'Darkah Subin', '2021-06-19', '2021-06-16', 'sentosa@gmail.com', '', '', '', '93968.00', '93968.00', 1, 0, '0', 'sales ke 1', 'IDR', '2021-07-31 13:37:27'),
('SQM-Q0004', 'coba ini edu', 'Nur Minah', '2021-06-23', '2021-06-23', 'jaya@gmail.com', '', '', '', '345222.00', '345222.00', 0, 0, '0', 'sales ke 1', 'IDR', '2021-07-31 13:37:27'),
('SQM-Q0005', 'mozif track 22', 'Darkah Subin', '2021-06-23', '2021-06-23', 'sentosa@gmail.com', '', '', '', '537900.00', '537900.00', 0, 0, '0', 'sales ke 1', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0005', 'Recusandae Dolorem ', 'Clare Becker', '1998-04-14', '1988-12-18', 'Exercitation et labo', 'Ea pariatur Molesti', 'Et reiciendis est v', 'Ullam ut totam recus', '843256.00', '843256.00', 0, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0006', 'Ullamco soluta simil', 'Frances Bird', '1980-12-11', '1998-06-19', 'Et nemo facilis haru', 'Deserunt elit dolor', 'Proident quia hic l', 'Est dolore ex non m', '12090.00', '12090.00', 0, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0007', 'Est cum consectetur', 'Pandora Potts', '1970-03-10', '2003-02-18', 'Harum sit nesciunt', 'Nobis voluptate offi', 'Quia ut non ut omnis', 'Corporis molestiae c', '24960600.00', '24960600.00', 1, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0008', 'Eu duis voluptatibus', 'Jakeem Roach', '2007-02-22', '1990-03-22', 'Voluptas vel sequi c', 'Est architecto sequi', 'Ut asperiores sint ', 'Ut ipsa laboris dol', '444429.00', '444429.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0009', 'Consectetur veniam ', 'Zephr Larsen', '2014-09-06', '1996-12-25', 'Ab id excepteur repu', 'Et impedit alias co', 'Aute vero ut qui har', 'Ipsam quos est nesci', '377130.00', '377130.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0010', 'Aliquid sunt ex magn', 'Daria Cox', '1992-02-14', '2003-12-05', 'Est suscipit adipis', 'Ex aliquid deserunt ', 'In Nam inventore ius', 'Expedita possimus d', '51200.00', '51200.00', 1, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0011', 'Deserunt facilis fac 1', 'Ashely Adkins', '1983-07-04', '1978-05-09', 'Consectetur dolor n', 'Velit aperiam eum a', 'Quo iusto voluptatem', 'Quia vitae harum mol', '54034.00', '54034.00', 0, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0012', 'project ke 12', 'PT. sutarma', '2021-06-15', '2021-06-30', 'sutarma@pt.com', 'coba public notes', 'coba header', 'coba footer', '124200.00', '124200.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0013', 'project ke 13', 'PT. Abadi', '2021-06-17', '2021-06-30', 'abadi@gmail.com', 'coba ', 'coba', 'coba', '124200.00', '124200.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0014', 'coba project 3', 'Clare Becker', '2021-06-18', '2021-06-17', 'kod@gmail.com', '', '', '', '415210.00', '415210.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0015', 'coba project 15', 'Trevor Thomas', '2021-06-15', '2021-06-17', 'trev@gmail.com', '', '', '', '81000.00', '81000.00', 1, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0016', 'coba project ke-16', 'PT. Sentosa Abadi', '2021-06-16', '2021-06-30', 'sentosa@gmail.com', '', '', '', '16200.00', '16200.00', 1, 0, '1', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0017', 'coba project', 'Darkah Subin', '2021-06-23', '2021-06-23', 'sentosa@gmail.com', '', '', '', '82400.00', '82400.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0018', 'coba coba', 'Nur Minah', '2021-06-23', '2021-06-23', 'jaya@gmail.com', '', '', '', '560000.00', '560000.00', 1, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0020', 'coba', 'Nur Minah', '2021-06-25', '2021-06-25', 'jaya@gmail.com', '', '', '', '106400.00', '106400.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0021', 'der', 'Darkah Subin', '2021-06-25', '2021-06-25', 'sentosa@gmail.com', '', '', '', '37.26', '37.26', 1, 1, '0', 'muhammad irfan', 'USD', '2021-07-31 13:37:27'),
('ST-Q0022', 'coba ini', 'Darkah Subin', '2021-07-08', '2021-07-31', 'sentosa@gmail.com', '', '', '', '50000.00', '50000.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0023', 'coba quot baru', 'Nur Minah', '2021-07-14', '2021-07-14', 'jaya@gmail.com', '', '', '', '4900000.00', '4900000.00', 1, 1, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0024', 'coba quot 2', 'Darkah Subin', '2021-07-14', '2021-07-14', 'sentosa@gmail.com', '', '', '', '5000000.00', '5000000.00', 1, 0, '0', 'muhammad irfan', 'IDR', '2021-07-31 13:37:27'),
('ST-Q0026', 'edit quot', 'bb', '2021-07-31', '2021-07-31', 'pmstarna1@gmail.com', '', '', '', '28.50', '28.50', 1, 1, '0', 'muhammad irfan', 'USD', '2021-08-01 04:00:24'),
('ST-Q0027', 'fgy', 'dffgh', '2021-08-01', '2021-08-14', 'pmstarna1@gmail.com', '', '', '', '22.68', '22.68', 1, 1, '0', 'muhammad irfan', 'EUR', '2021-08-01 17:20:30'),
('ST-Q0028', 'coba baru', 'cobaaja', '2021-08-01', '2021-08-01', 'pmstarna1@gmail.com', '', '', '', '311202.00', '311202.00', 0, 0, '0', 'cobain aja', 'IDR', '2021-08-01 23:47:18');

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
(22, 'KEB-0003-06-2021', '3'),
(23, 'STJAK-0015-2021', '1'),
(24, 'STJAK-0015-2021', '2'),
(25, 'STJAK-0015-2021', '6'),
(26, 'STJAK-0022-2021', '1'),
(27, 'STJAK-0022-2021', '2'),
(28, 'STJAK-0023-2021', '1'),
(29, 'STJAK-0023-2021', '2'),
(30, 'STJAK-0024-2021', '1'),
(31, 'STJAK-0026-2021', '1'),
(32, 'STJAK-0027-2021', '1'),
(34, 'STJAK-0029-2021', '1'),
(35, 'STJAK-0030-2021', '1'),
(36, 'STJAK-0028-2021', '1');

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
('STR002', 'irfan', '3ef3699d13dcb525f7dc10cae32eb7b7', 'muhammad irfan', 'muhammadirfan.9f@gmail.com', 5, 2, 'STR002.jpg', '2021-08-02 10:03:36', '2021-05-19 17:12:39', 'MI', 0),
('STR003', 'benben', 'e3d644dea859dba15669f1f0b8107974', 'ben zoskan', 'pmstarna1@gmail.com', 1, 2, 'STR003.jpg', '2021-08-04 09:29:00', '2021-06-10 09:42:27', 'BZ', 0),
('STR004', 'ilham', 'b63d204bf086017e34d8bd27ab969f28', 'ilham nur inzani', 'ilhamham@gmail.com', 7, 1, 'STR004.jpg', '2021-08-05 11:33:00', '2021-06-14 17:34:53', 'II', 0),
('STR005', 'putri', '4093fed663717c843bea100d17fb67c8', 'putri finance 1', 'finstarna2@gmail.com', 3, 2, 'STR005.jpg', '2021-08-04 20:54:26', '2021-06-14 23:05:46', 'P1', 0),
('STR006', 'sales1', 'sales1', 'sales ke 1', 'sales1@gmail.com', 5, 4, 'STR006.jpg', '2021-06-25 02:58:05', '2021-06-15 06:37:16', 'SK1', 0),
('STR007', 'pm1', 'pm1', 'project manager 1', 'pm1@gmail.com', 1, 3, 'STR007.jpg', '2021-06-17 05:59:33', '2021-06-15 06:37:56', 'PM1', 0),
('STR008', 'fl1', 'fl1', 'freelance 1', 'fl1@gmail.com', 7, 1, 'STR008.jpg', '2021-06-23 03:10:13', '2021-06-15 06:38:39', 'FL1', 0),
('STR009', 'finance1', 'fn1', 'finance ke 1', 'fn1@gmail.com', 3, 6, 'STR009.jpg', '2021-07-14 00:43:04', '2021-06-15 06:39:16', 'F1', 0),
('STR010', 'financespq', 'fnspq', 'finance speequel', 'financespq1@gmail.com', 3, 3, 'STR010.jpg', '2021-06-22 13:33:19', '2021-06-15 07:42:11', 'FS', 0),
('STR011', 'sales2', 'sales2', 'sales ke 2', 'sales2@gmail.com', 5, 4, 'STR011.jpg', '2021-06-16 21:07:51', '2021-06-16 21:04:06', 'SK2', 0),
('STR012', 'pm2', 'pm2', 'project manager 2', 'pm2@gmail.com', 1, 3, 'STR012.jpg', '2021-06-16 21:05:12', '2021-06-16 21:04:59', 'PM2', 0),
('STR013', 'finance2', 'fn2', 'Salam Selem', 'financestarna2@gmail.com', 3, 2, 'STR013.jpg', '2021-06-23 03:11:05', '2021-06-22 15:23:55', 'SS', 0),
('STR014', 'saleskg', 'saleskg', 'Sales Kodegiri', 'skg@gmail.com', 5, 6, 'STR014.jpg', '2021-06-25 08:08:13', '2021-06-23 11:53:03', 'SK', 0),
('STR015', 'pmkg', 'pmkg', 'project manager kodegiri', 'pmkg@gmail.com', 1, 6, 'STR015.jpg', '2021-06-25 07:54:21', '2021-06-23 11:53:51', 'PK', 0),
('STR016', 'zoey_panda', 'zoey', 'Zoey Panda', 'zoeypanda@gmail.com', 7, 1, 'STR016.jpg', '2021-06-24 07:47:51', '2021-06-23 15:19:53', 'ZP', 0),
('STR017', 'finkg', 'finkg', 'Finance Kodegiri', 'pmstarna1@gmail.com', 3, 6, 'STR017.jpg', '2021-06-25 07:55:05', '2021-06-25 04:56:36', 'FK', 0),
('STR018', 'flkodegiri', 'flkg', 'Freelance Kodegiri', 'flkg@gmail.com', 6, 5, 'STR018.jpg', '2021-06-25 07:43:45', '2021-06-25 07:15:14', 'FK', 0),
('STR019', 'topman_star', '0a8831bdd11507bc948742931ff985e7', 'Top Management 1', 'topman1@gmail.com', 2, 2, 'STR019.jpg', '2021-08-04 10:04:23', '2021-07-08 20:20:31', 'T1', 0),
('STR022', 'admin', '7a25b0bc04e77a2f7453dd021168cdc2', 'Admin Finance 1', 'adminfinance@gmail.com', 4, 0, 'STR022.jpg', '2021-08-03 23:49:59', '2021-07-30 23:47:54', 'A1', 0),
('STR023', 'userbaru', '827ccb0eea8a706c4c34a16891f84e7b', 'cobain aja', 'fd@gmail.com', 5, 2, 'default.jpg', '2021-08-01 16:46:37', '2021-08-01 16:45:49', 'CA', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `invoice_in_item`
--
ALTER TABLE `invoice_in_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `invoice_item_local`
--
ALTER TABLE `invoice_item_local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoice_item_luar`
--
ALTER TABLE `invoice_item_luar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `po_item_itembase`
--
ALTER TABLE `po_item_itembase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `po_item_wordbase`
--
ALTER TABLE `po_item_wordbase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `quitation_item`
--
ALTER TABLE `quitation_item`
  MODIFY `id_q_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `resource_data`
--
ALTER TABLE `resource_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tax_invoice`
--
ALTER TABLE `tax_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
