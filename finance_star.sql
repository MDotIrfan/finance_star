-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 11:09 PM
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
-- Table structure for table `client_data`
--

CREATE TABLE `client_data` (
  `client_id` varchar(7) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_data`
--

INSERT INTO `client_data` (`client_id`, `client_name`, `client_email`, `address`) VALUES
('CL001', 'PT. Sentosa Abadi', 'sentosa@gmail.com', 'Jln. Kaliurang, D . I. Yogyakarta'),
('CL002', 'PT. Jaya Wijaya', 'jaya@gmail.com', 'Jln. Thamrin, Jakarta');

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
  `tipe` enum('word','item','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_in`
--

INSERT INTO `invoice_in` (`no_invoice`, `no_Po`, `no_rekening`, `cabang_bank`, `mitra_name`, `address`, `down_payment`, `invoice_date`, `due_date`, `email`, `no_npwp`, `public_notes`, `terms`, `signature`, `footer`, `total_cost`, `grand_total`, `tipe`) VALUES
('STJAK-0002-2021', 'ST-PR0004', '5435345', 'BCA', 'ilham nur inzani', 'coba address 2', 500, '2021-06-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'rg', 'ar', 'ft', 617130, 617130, 'item'),
('STJAK-0003-2021', 'ST-PR0007', '5435345', 'coba project', 'ilham nur inzani', 'coba address 2', 500, '2021-06-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'rg', 'ar', 'ft', 92000, 92000, 'word'),
('STJAK-0004-2021', 'ST-PR0010', '5435345', 'coba project', 'ilham nur inzani', 'coba address', 500, '2021-06-16', '2021-06-18', 'ilhamham@gmail.com', '634345', 'pn', 'reg', 'rress', 'foot', 142500, 142500, 'word'),
('STJAK-0005-2021', 'ST-PR0011', '5435345', 'coba project item 1', 'ilham nur inzani', 'coba address 1', 5000, '2021-06-15', '2021-06-19', 'ilhamham@gmail.com', '634345', 'pn', 'reg', 'addr', 'foot', 190190, 190190, 'item'),
('STJAK-0006-2021', 'SQ-PR0014', '5435345', 'BCA', 'freelance 1', 'coba address 1', 10000, '2021-06-15', '2021-06-23', 'fl1@gmail.com', '634345', '', '', '', '', 136200, 136200, 'word'),
('STJAK-0007-2021', 'SQ-PR0017', '5435345', 'BCA', 'freelance 1', 'coba address 1', 10000, '2021-06-15', '2021-06-19', 'fl1@gmail.com', '634345', '', '', '', '', 158190, 158190, 'item');

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
(44, 'STJAK-0003-2021', 'Eu duis voluptatibus', 810, '', 100, 81000),
(45, 'STJAK-0003-2021', 'coba 1', 110, '', 100, 11000),
(62, 'STJAK-0002-2021', 'Iure dolorem dolores', 400, 'Hours', 819, 327600),
(63, 'STJAK-0002-2021', 'Aperiam sunt ea quia', 70, 'Hours', 663, 46410),
(64, 'STJAK-0002-2021', 'Quis sint aliquip si', 6, 'Hours', 520, 3120),
(65, 'STJAK-0002-2021', 'coba 3', 200, 'Hours', 1200, 240000),
(70, 'STJAK-0004-2021', 'project ke 12', 830, '', 120, 99600),
(71, 'STJAK-0004-2021', 'coba 2', 110, '', 390, 42900),
(78, 'STJAK-0005-2021', 'Ut id quibusdam quo ', 100, 'Hours', 512, 51200),
(79, 'STJAK-0005-2021', 'coba 2', 200, 'Hours', 339, 67800),
(80, 'STJAK-0005-2021', 'coba 3', 210, 'Hours', 339, 71190),
(81, 'STJAK-0006-2021', 'project ke 14', 810, '', 120, 97200),
(82, 'STJAK-0006-2021', 'tambah project 1', 100, '', 390, 39000),
(86, 'STJAK-0007-2021', 'coba 1', 100, 'Hours', 390, 39000),
(87, 'STJAK-0007-2021', 'coba 2', 210, 'Hours', 339, 71190),
(88, 'STJAK-0007-2021', 'coba 3', 480, 'Hours', 100, 48000);

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
(12, 'STJAK-0004-2021', 'coba project 3', 1000, 200, 200000),
(13, 'STJAK-0004-2021', 'coba 2', 210, 1000, 210000);

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
('KEB-0008-06-2021', 'SQ-PR0015', 'Frances Bird', '090 2212221', 'BBBAIDJA', 'coba address 1', 10000, '2021-06-15', '2021-06-30', 'freelnastar11@gmail.com', '3', '', '', '', '', 192000, 192000, 0),
('STJAK-0004-2021', 'ST-PR0009', 'Clare Becken', '0902211411', 'BBBAIDJA', 'coba address 1', 500, '2021-06-15', '2021-06-18', 'freelnastar11@gmail.com', '', 'pn', 'rg', 'ar', 'ft', 410000, 410000, 4);

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
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_item_itembase`
--

INSERT INTO `po_item_itembase` (`id`, `no_Po`, `task`, `qty`, `unit`, `rate`, `amount`) VALUES
(13, 'SQ-PR0005', 'Iure dolorem dolores', 400, 'Hours', 819, 327600),
(14, 'SQ-PR0005', 'Aperiam sunt ea quia', 70, 'Hours', 663, 46410),
(15, 'SQ-PR0005', 'Quis sint aliquip si', 6, 'Hours', 520, 3120),
(16, 'SQ-PR0006', 'Quaerat ipsum digni', 39, 'Hours', 390, 15210),
(17, 'SQ-PR0006', 'Blanditiis est quas', 345, 'Hours', 403, 139035),
(18, 'SQ-PR0006', 'Aspernatur amet in ', 678, 'Hours', 428, 290184),
(63, 'ST-PR0008', 'coba 1', 100, 'Hours', 390, 39000),
(64, 'ST-PR0008', 'coba 3', 820, 'Hours', 426, 349320),
(75, 'ST-PR0011', 'Ut id quibusdam quo ', 100, 'Hours', 512, 51200),
(76, 'ST-PR0011', 'coba 2', 200, 'Hours', 339, 67800),
(77, 'ST-PR0013', 'coba 1', 100, 'Hours', 1000, 100000),
(91, 'SQ-PR0017', 'coba 1', 100, 'Hours', 390, 39000),
(92, 'SQ-PR0017', 'coba 2', 210, 'Hours', 339, 71190),
(93, 'SQ-PR0016', 'coba 1', 39, 'Hours', 390, 15210),
(94, 'SQ-PR0016', 'Quaerat ipsum digni', 400, 'Hours', 1000, 400000),
(95, 'SQ-PR0016', 'coba 2', 200, 'Hours', 339, 67800),
(129, 'ST-PR0019', 'Dignissimos voluptas', 100, 'Days', 426, 42600),
(130, 'ST-PR0019', 'Eaque doloribus magn', 500, 'Months', 276, 138000),
(131, 'ST-PR0019', 'Aspernatur a qui lab', 30000, 'Hours', 826, 24780000),
(136, 'ST-PR0004', 'Iure dolorem dolores', 400, 'Hours', 819, 327600),
(137, 'ST-PR0004', 'Aperiam sunt ea quia', 70, 'Hours', 663, 46410),
(138, 'ST-PR0004', 'Quis sint aliquip si', 6, 'Hours', 520, 3120),
(139, 'ST-PR0004', 'coba 2', 200, 'Hours', 1200, 240000);

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
  `new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_item_wordbase`
--

INSERT INTO `po_item_wordbase` (`id`, `no_Po`, `locked`, `repetitions`, `fuzzy100`, `fuzzy95`, `fuzzy85`, `fuzzy75`, `fuzzy50`, `new`) VALUES
(6, 'ST-PR0007', 100, 100, 100, 100, 100, 100, 100, 110),
(9, 'ST-PR0009', 200, 200, 200, 200, 200, 200, 200, 200),
(20, 'ST-PR0010', 100, 100, 100, 100, 100, 100, 110, 120),
(21, 'ST-PR0012', 100, 100, 100, 100, 100, 100, 100, 100),
(28, 'SQ-PR0015', 200, 200, 200, 200, 200, 200, 200, 200),
(32, 'ST-PR0018', 100, 200, 200, 200, 100, 200, 200, 200),
(37, 'ST-PR0020', 150, 160, 78, 34, 69, 67, 49, 50);

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
  `rate` int(11) NOT NULL,
  `address_Resource` text NOT NULL,
  `grand_Total` int(11) NOT NULL,
  `tipe` enum('item','word','','') NOT NULL,
  `tipe_Po` varchar(30) NOT NULL,
  `is_inv` int(11) NOT NULL DEFAULT 0,
  `v_form` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`no_Po`, `nama_Pm`, `email_pm`, `resource_Name`, `resource_Email`, `resource_Status`, `mobile_Phone`, `date`, `project_Name`, `id_quotation`, `public_Notes`, `regards`, `footer`, `rate`, `address_Resource`, `grand_Total`, `tipe`, `tipe_Po`, `is_inv`, `v_form`) VALUES
('SQ-PR0005', 'project manager 1', 'kiviw@mailinator.com', 'Provident totam sed', 'Reuben Steele', 'Freelance', 'Eveniet volupta', '1995-10-18', 'Consectetur veniam ', 'ST-Q0009', 'Qui sit cum tempori', 'Et nihil sit sequi d', 'Cupidatat ex nemo of', 0, 'Quia aliquid archite', 377130, 'item', '', 0, '0'),
('SQ-PR0006', 'project manager 1', 'rore@mailinator.com', 'Distinctio Amet nu', 'Iola Beck', 'Freelance', 'Sequi laborum a', '1996-04-06', 'Eu duis voluptatibus', 'ST-Q0008', 'Pariatur Est qui a', 'Quo magna Nam ut ut ', 'Aut tenetur ipsam au', 0, 'Quo ducimus totam e', 444429, 'item', '', 0, '0'),
('SQ-PR0007', 'project manager 1', 'pm1@gmail.com', 'coba edit 1', 'Jaden Andrews', 'In House (Speequel Jakarta)', 'Sapiente expedi', '1920-11-22', 'Eu duis voluptatibus', 'ST-Q0008', 'Perspiciatis conseq', 'Non officia illum o', 'In aute sed obcaecat', 100, 'Minima proident ape', 33800, 'word', '3', 1, '0'),
('SQ-PR0015', 'project manager 1', 'pm1@gmail.com', 'fl1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 15', '', '', '', '', 120, '', 87600, 'word', '2', 1, '0'),
('SQ-PR0016', 'project manager 1', 'pm1@gmail.com', 'freelance 1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 3', 'ST-Q0014', '', '', '', 0, '', 483010, 'item', '', 0, '0'),
('SQ-PR0017', 'project manager 1', 'pm1@gmail.com', 'freelance 1', 'fl1@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project', '', '', '', '', 0, '', 110190, 'item', '', 1, '0'),
('ST-PR0004', 'ben zoskan', 'ben@mailinator.com', 'Soluta incididunt ve', 'mod@gmail.com', 'Freelance', '0897654678', '2010-11-17', 'Consectetur veniam ', 'ST-Q0009', 'Fugiat commodi Nam ', 'Eligendi aut mollit ', 'Rerum eius velit al', 0, 'Fuga Incididunt dis', 617130, 'item', '', 1, '0'),
('ST-PR0008', 'ben zoskan', 'gyhiqe@mailinator.com', 'Eu accusantium dolor', 'Eve Mcclure', 'In House (Star Jakarta)', 'Amet aliqua Et ', '1989-02-07', 'coba project', '', 'Recusandae Consequu', 'Aut rerum cillum vol', 'Est non voluptatem n', 0, 'Et tempor facere eum', 388320, 'item', '', 0, '0'),
('ST-PR0009', 'ben zoskan', 'bneks@gmail.com', 'Consequat Nulla eni', 'Patience Cline', 'In House (Speequel Jakarta)', 'Do rem sint et ', '0000-00-00', 'coba project 2', '', 'Nulla quo distinctio', 'Culpa iure neque in', 'Quaerat minus eiusmo', 200, 'Cumque blanditiis vo', 146000, 'word', '2', 1, '0'),
('ST-PR0010', 'ben zoskan', 'bneks@gmail.com', 'ilham', 'ilham@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'project ke 12', 'ST-Q0012', 'coba pn', 'coba reg', 'coba foot', 120, 'coba addr', 28680, 'word', '4', 1, '0'),
('ST-PR0011', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilham', 'admin', '0897654678', '2021-06-15', 'Aliquid sunt ex magn', 'ST-Q0010', 'pn', 'reg', 'foot', 0, 'addr', 119000, 'item', '', 1, '0'),
('ST-PR0012', 'ben zoskan', 'bneks@gmail.com', 'beck', 'beck@gmail.com', 'Freelance', '08136728690', '2021-06-15', 'coba project 2', '', 'pn', 'reg', 'fot', 100, 'addr', 36500, 'word', '2', 0, '0'),
('ST-PR0013', 'ben zoskan', 'bneks@gmail.com', 'beck', 'beck@gmail.com', 'Freelance', '0897654678', '2021-06-16', 'coba project', '', 'pn', 'reg', 'foot', 0, 'addr', 100000, 'item', '', 0, '0'),
('ST-PR0018', 'ben zoskan', 'bneks@gmail.com', 'freelance 1', 'dsadsa', 'Freelance', '0897654678', '2021-06-16', 'project ke 13', 'ST-Q0013', '', '', '', 100, '', 61000, 'word', '3', 0, '0'),
('ST-PR0019', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'admin', '0856879465', '2021-06-16', 'Est cum consectetur', 'ST-Q0007', '', '', '', 0, '', 24960600, 'item', '', 0, '1'),
('ST-PR0020', 'ben zoskan', 'bneks@gmail.com', 'ilham nur inzani', 'ilhamham@gmail.com', 'admin', '0856879465', '2021-06-19', 'coba project 15', 'ST-Q0015', '', '', '', 130, '', 23478, 'word', '3', 0, '0');

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
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quitation_item`
--

INSERT INTO `quitation_item` (`id_q_num`, `no_Quotation`, `job_Desc`, `volume`, `unit`, `price`, `cost`) VALUES
(11, 'ST-Q0005', 'Minim aperiam consec', 100, 'Unit', 1200, 120000),
(12, 'ST-Q0005', 'Unde aut eiusmod ess', 23, 'Hours', 872, 20056),
(13, 'ST-Q0005', 'Perspiciatis cillum', 500, 'Months', 800, 400000),
(14, 'ST-Q0005', 'Consequatur Corpori', 400, 'Unit', 758, 303200),
(19, 'ST-Q0006', 'Ullamco maxime moles', 10, 'Hours', 752, 7520),
(20, 'ST-Q0006', 'Culpa minima corpor', 12, 'Days', 354, 4248),
(21, 'ST-Q0006', 'Assumenda commodo am', 23, 'Days', 14, 322),
(22, 'ST-Q0007', 'Dignissimos voluptas', 100, 'Years', 426, 42600),
(23, 'ST-Q0007', 'Eaque doloribus magn', 500, 'Months', 276, 138000),
(24, 'ST-Q0007', 'Aspernatur a qui lab', 30000, 'Months', 826, 24780000),
(25, 'ST-Q0008', 'Quaerat ipsum digni', 39, 'Hours', 390, 15210),
(26, 'ST-Q0008', 'Blanditiis est quas', 345, 'Months', 403, 139035),
(27, 'ST-Q0008', 'Aspernatur amet in ', 678, 'Days', 428, 290184),
(35, 'ST-Q0009', 'Iure dolorem dolores', 400, 'Hours', 819, 327600),
(36, 'ST-Q0009', 'Aperiam sunt ea quia', 70, 'Hours', 663, 46410),
(37, 'ST-Q0009', 'Quis sint aliquip si', 6, 'Hours', 520, 3120),
(38, 'ST-Q0010', 'Ut id quibusdam quo ', 100, 'Unit', 512, 51200),
(42, 'ST-Q0011', 'Culpa vel voluptate', 60, 'Hours', 711, 42660),
(43, 'ST-Q0011', 'Dolore iure officiis', 10, 'Hours', 883, 8830),
(44, 'ST-Q0011', 'Rerum magnam velit r', 48, 'Hours', 53, 2544),
(45, 'ST-Q0012', 'list project 1', 100, 'Days', 390, 39000),
(46, 'ST-Q0012', 'list project 2', 200, 'Hours', 426, 85200),
(47, 'ST-Q0013', 'list pekerjaan 1', 100, 'Hours', 390, 39000),
(48, 'ST-Q0013', 'list pekerjaan 2', 200, 'Hours', 426, 85200),
(51, 'ST-Q0015', 'coba 1', 810, 'Hours', 100, 81000),
(54, 'ST-Q0014', 'coba 1', 39, 'Hours', 390, 15210),
(55, 'ST-Q0014', 'Quaerat ipsum digni', 400, 'Years', 1000, 400000),
(62, 'ST-Q0016', 'coba 1', 100, 'Hours', 150, 15000),
(63, 'ST-Q0016', 'coba 2', 12, 'Months', 100, 1200),
(65, 'SQM-Q0002', 'coba 1', 140, 'Hours', 150, 21000),
(72, 'SQM-Q0001', 'coba coba', 130, 'Days', 90, 11700),
(75, 'SQM-Q0003', 'kodegiri 1', 56, 'Days', 1678, 93968);

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
  `total_Cost` int(11) NOT NULL,
  `grand_Total` int(11) NOT NULL,
  `is_Acc` int(11) NOT NULL DEFAULT 0,
  `is_Q` int(11) NOT NULL DEFAULT 0,
  `v_form` enum('0','1','','') NOT NULL,
  `sales_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`no_Quotation`, `project_Name`, `client_Name`, `project_Start`, `due_Date`, `client_Email`, `public_Notes`, `header`, `footer`, `total_Cost`, `grand_Total`, `is_Acc`, `is_Q`, `v_form`, `sales_name`) VALUES
('SQM-Q0001', 'coba 1', 'PT. Jaya Wijaya', '2021-06-16', '2021-06-16', 'jaya@gmail.com', '', '', '', 11700, 11700, 1, 0, '1', 'sales ke 1'),
('SQM-Q0002', 'coba ke 1', 'PT. Jaya Wijaya', '2021-06-16', '2021-06-16', 'jaya@gmail.com', '', '', '', 21000, 21000, 1, 0, '1', 'sales ke 1'),
('SQM-Q0003', 'coba project', 'PT. Sentosa Abadi', '2021-06-19', '2021-06-16', 'sentosa@gmail.com', '', '', '', 93968, 93968, 1, 0, '0', 'sales ke 1'),
('ST-Q0005', 'Recusandae Dolorem ', 'Clare Becker', '1998-04-14', '1988-12-18', 'Exercitation et labo', 'Ea pariatur Molesti', 'Et reiciendis est v', 'Ullam ut totam recus', 843256, 843256, 0, 0, '0', 'muhammad irfan'),
('ST-Q0006', 'Ullamco soluta simil', 'Frances Bird', '1980-12-11', '1998-06-19', 'Et nemo facilis haru', 'Deserunt elit dolor', 'Proident quia hic l', 'Est dolore ex non m', 12090, 12090, 0, 0, '0', 'muhammad irfan'),
('ST-Q0007', 'Est cum consectetur', 'Pandora Potts', '1970-03-10', '2003-02-18', 'Harum sit nesciunt', 'Nobis voluptate offi', 'Quia ut non ut omnis', 'Corporis molestiae c', 24960600, 24960600, 1, 1, '0', 'muhammad irfan'),
('ST-Q0008', 'Eu duis voluptatibus', 'Jakeem Roach', '2007-02-22', '1990-03-22', 'Voluptas vel sequi c', 'Est architecto sequi', 'Ut asperiores sint ', 'Ut ipsa laboris dol', 444429, 444429, 1, 1, '0', 'muhammad irfan'),
('ST-Q0009', 'Consectetur veniam ', 'Zephr Larsen', '2014-09-06', '1996-12-25', 'Ab id excepteur repu', 'Et impedit alias co', 'Aute vero ut qui har', 'Ipsam quos est nesci', 377130, 377130, 1, 1, '0', 'muhammad irfan'),
('ST-Q0010', 'Aliquid sunt ex magn', 'Daria Cox', '1992-02-14', '2003-12-05', 'Est suscipit adipis', 'Ex aliquid deserunt ', 'In Nam inventore ius', 'Expedita possimus d', 51200, 51200, 1, 1, '0', 'muhammad irfan'),
('ST-Q0011', 'Deserunt facilis fac 1', 'Ashely Adkins', '1983-07-04', '1978-05-09', 'Consectetur dolor n', 'Velit aperiam eum a', 'Quo iusto voluptatem', 'Quia vitae harum mol', 54034, 54034, 0, 0, '0', 'muhammad irfan'),
('ST-Q0012', 'project ke 12', 'PT. sutarma', '2021-06-15', '2021-06-30', 'sutarma@pt.com', 'coba public notes', 'coba header', 'coba footer', 124200, 124200, 1, 1, '0', 'muhammad irfan'),
('ST-Q0013', 'project ke 13', 'PT. Abadi', '2021-06-17', '2021-06-30', 'abadi@gmail.com', 'coba ', 'coba', 'coba', 124200, 124200, 1, 1, '0', 'muhammad irfan'),
('ST-Q0014', 'coba project 3', 'Clare Becker', '2021-06-18', '2021-06-17', 'kod@gmail.com', '', '', '', 415210, 415210, 1, 1, '0', 'muhammad irfan'),
('ST-Q0015', 'coba project 15', 'Trevor Thomas', '2021-06-15', '2021-06-17', 'trev@gmail.com', '', '', '', 81000, 81000, 1, 1, '0', 'muhammad irfan'),
('ST-Q0016', 'coba project ke-16', 'PT. Sentosa Abadi', '2021-06-16', '2021-06-30', 'sentosa@gmail.com', '', '', '', 16200, 16200, 1, 0, '1', 'muhammad irfan');

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
  `no_npwp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource_data`
--

INSERT INTO `resource_data` (`id`, `id_user`, `mobile_phone`, `cabang_bank`, `no_rekening`, `address`, `no_npwp`) VALUES
(1, 'STR004', '0856879465', 'Bank Mandiri', '776475890', 'Jln. Kabupaten, No. 15, Sleman, D. I. Yogyakarta.', '445653345'),
(2, 'STR008', '08134657849', 'BRI', '3332456674565', 'Jln. Aspal No. 56, Pengangsaan, Jakarta Timur.', '01234577');

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
(3, 'In House (Speequel Jakarta)'),
(4, 'In House (Speequel Malaysia)'),
(5, 'Vendor'),
(6, 'Kodegiri');

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
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_User`, `user_Name`, `pass_Word`, `full_Name`, `email_Address`, `id_Position`, `id_Status`, `profile_Photo`, `last_Login`, `created_at`, `is_active`) VALUES
('STR001', 'admin', 'passadmin', 'admin finance 1', 'Adminfinance123@gmail.com', 4, 0, 'STR001.PNG', '2021-06-16 21:03:12', '2021-05-19 14:10:03', 0),
('STR002', 'irfan', 'coba11', 'muhammad irfan', 'muhammadirfan.9f@gmail.com', 5, 2, 'STR002.jpg', '2021-06-16 21:07:02', '2021-05-19 17:12:39', 0),
('STR003', 'benben', 'bento', 'ben zoskan', 'bneks@gmail.com', 1, 2, 'STR003.jpg', '2021-06-16 20:21:55', '2021-06-10 09:42:27', 0),
('STR004', 'ilham', 'ilham', 'ilham nur inzani', 'ilhamham@gmail.com', 7, 1, 'STR004.jpg', '2021-06-16 09:07:28', '2021-06-14 17:34:53', 0),
('STR005', 'putri', 'putri', 'putri finance 1', 'financestarna1@gmail.com', 3, 2, 'STR005.jpg', '2021-06-15 06:27:12', '2021-06-14 23:05:46', 0),
('STR006', 'sales1', 'sales1', 'sales ke 1', 'sales1@gmail.com', 5, 4, 'STR006.jpg', '2021-06-16 21:07:25', '2021-06-15 06:37:16', 0),
('STR007', 'pm1', 'pm1', 'project manager 1', 'pm1@gmail.com', 1, 3, 'STR007.jpg', '2021-06-16 21:05:40', '2021-06-15 06:37:56', 0),
('STR008', 'fl1', 'fl1', 'freelance 1', 'fl1@gmail.com', 7, 1, 'STR008.jpg', '2021-06-15 07:09:10', '2021-06-15 06:38:39', 0),
('STR009', 'finance1', 'fn1', 'finance ke 1', 'fn1@gmail.com', 3, 6, 'STR009.jpg', '2021-06-16 09:13:57', '2021-06-15 06:39:16', 0),
('STR010', 'financespq', 'fnspq', 'finance speequel', 'financespq1@gmail.com', 3, 3, 'STR010.jpg', '2021-06-15 07:42:31', '2021-06-15 07:42:11', 0),
('STR011', 'sales2', 'sales2', 'sales ke 2', 'sales2@gmail.com', 5, 4, 'STR011.jpg', '2021-06-16 21:07:51', '2021-06-16 21:04:06', 0),
('STR012', 'pm2', 'pm2', 'project manager 2', 'pm2@gmail.com', 1, 3, 'STR012.jpg', '2021-06-16 21:05:12', '2021-06-16 21:04:59', 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_in_item`
--
ALTER TABLE `invoice_in_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `invoice_item_local`
--
ALTER TABLE `invoice_item_local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_item_luar`
--
ALTER TABLE `invoice_item_luar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_item_luar_2`
--
ALTER TABLE `invoice_item_luar_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_item_spq`
--
ALTER TABLE `invoice_item_spq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice_item_spq_2`
--
ALTER TABLE `invoice_item_spq_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_item_itembase`
--
ALTER TABLE `po_item_itembase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `po_item_wordbase`
--
ALTER TABLE `po_item_wordbase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `quitation_item`
--
ALTER TABLE `quitation_item`
  MODIFY `id_q_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `resource_data`
--
ALTER TABLE `resource_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
