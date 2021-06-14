-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 07:30 PM
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
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(13, 'ST-PR0005', 'Iure dolorem dolores', 400, 'Hours', 819, 327600),
(14, 'ST-PR0005', 'Aperiam sunt ea quia', 70, 'Hours', 663, 46410),
(15, 'ST-PR0005', 'Quis sint aliquip si', 6, 'Hours', 520, 3120),
(16, 'ST-PR0006', 'Quaerat ipsum digni', 39, 'Hours', 390, 15210),
(17, 'ST-PR0006', 'Blanditiis est quas', 345, 'Hours', 403, 139035),
(18, 'ST-PR0006', 'Aspernatur amet in ', 678, 'Hours', 428, 290184),
(51, 'ST-PR0004', 'Iure dolorem dolores', 400, 'Hours', 819, 327600),
(52, 'ST-PR0004', 'Aperiam sunt ea quia', 70, 'Hours', 663, 46410),
(53, 'ST-PR0004', 'Quis sint aliquip si', 6, 'Hours', 520, 3120),
(54, 'ST-PR0004', 'coba 2', 200, 'Hours', 1200, 240000);

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
(6, 'ST-PR0007', 100, 100, 100, 100, 100, 100, 100, 110);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `no_Po` varchar(11) NOT NULL,
  `nama_Pm` varchar(7) NOT NULL,
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
  `is_inv` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`no_Po`, `nama_Pm`, `email_pm`, `resource_Name`, `resource_Email`, `resource_Status`, `mobile_Phone`, `date`, `project_Name`, `id_quotation`, `public_Notes`, `regards`, `footer`, `rate`, `address_Resource`, `grand_Total`, `tipe`, `tipe_Po`, `is_inv`) VALUES
('ST-PR0004', 'ciwyruq', 'ciwyruqu@mailinator.com', 'Soluta incididunt ve', 'mod@gmail.com', 'Freelance', '0897654678', '2010-11-17', 'Consectetur veniam ', 'ST-Q0009', 'Fugiat commodi Nam ', 'Eligendi aut mollit ', 'Rerum eius velit al', 0, 'Fuga Incididunt dis', 617130, 'item', '', 0),
('ST-PR0005', 'nydyrax', 'kiviw@mailinator.com', 'Provident totam sed', 'Reuben Steele', 'Freelance', 'Eveniet volupta', '1995-10-18', 'Consectetur veniam ', 'ST-Q0009', 'Qui sit cum tempori', 'Et nihil sit sequi d', 'Cupidatat ex nemo of', 0, 'Quia aliquid archite', 377130, 'item', '', 0),
('ST-PR0006', 'difomef', 'rore@mailinator.com', 'Distinctio Amet nu', 'Iola Beck', 'Freelance', 'Sequi laborum a', '1996-04-06', 'Eu duis voluptatibus', 'ST-Q0008', 'Pariatur Est qui a', 'Quo magna Nam ut ut ', 'Aut tenetur ipsam au', 0, 'Quo ducimus totam e', 444429, 'item', '', 0),
('ST-PR0007', 'lodyvap', 'At ea incidunt quid', 'coba edit 1', 'Jaden Andrews', 'In House (Speequel Jakarta)', 'Sapiente expedi', '1920-11-22', 'Eu duis voluptatibus', 'ST-Q0008', 'Perspiciatis conseq', 'Non officia illum o', 'In aute sed obcaecat', 100, 'Minima proident ape', 33800, 'word', '3', 0);

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
(44, 'ST-Q0011', 'Rerum magnam velit r', 48, 'Hours', 53, 2544);

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
  `is_Q` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`no_Quotation`, `project_Name`, `client_Name`, `project_Start`, `due_Date`, `client_Email`, `public_Notes`, `header`, `footer`, `total_Cost`, `grand_Total`, `is_Acc`, `is_Q`) VALUES
('ST-Q0005', 'Recusandae Dolorem ', 'Clare Becker', '1998-04-14', '1988-12-18', 'Exercitation et labo', 'Ea pariatur Molesti', 'Et reiciendis est v', 'Ullam ut totam recus', 843256, 843256, 0, 0),
('ST-Q0006', 'Ullamco soluta simil', 'Frances Bird', '1980-12-11', '1998-06-19', 'Et nemo facilis haru', 'Deserunt elit dolor', 'Proident quia hic l', 'Est dolore ex non m', 12090, 12090, 0, 0),
('ST-Q0007', 'Est cum consectetur', 'Pandora Potts', '1970-03-10', '2003-02-18', 'Harum sit nesciunt', 'Nobis voluptate offi', 'Quia ut non ut omnis', 'Corporis molestiae c', 24960600, 24960600, 1, 0),
('ST-Q0008', 'Eu duis voluptatibus', 'Jakeem Roach', '2007-02-22', '1990-03-22', 'Voluptas vel sequi c', 'Est architecto sequi', 'Ut asperiores sint ', 'Ut ipsa laboris dol', 444429, 444429, 1, 1),
('ST-Q0009', 'Consectetur veniam ', 'Zephr Larsen', '2014-09-06', '1996-12-25', 'Ab id excepteur repu', 'Et impedit alias co', 'Aute vero ut qui har', 'Ipsam quos est nesci', 377130, 377130, 1, 1),
('ST-Q0010', 'Aliquid sunt ex magn', 'Daria Cox', '1992-02-14', '2003-12-05', 'Est suscipit adipis', 'Ex aliquid deserunt ', 'In Nam inventore ius', 'Expedita possimus d', 51200, 51200, 0, 0),
('ST-Q0011', 'Deserunt facilis fac 1', 'Ashely Adkins', '1983-07-04', '1978-05-09', 'Consectetur dolor n', 'Velit aperiam eum a', 'Quo iusto voluptatem', 'Quia vitae harum mol', 54034, 54034, 0, 0);

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
('STR001', 'admin', 'passadmin', 'admin finance 1', 'Adminfinance123@gmail.com', 4, 0, 'STR001.PNG', '2021-06-10 09:41:37', '2021-05-19 14:10:03', 0),
('STR002', 'irfan', 'coba11', 'muhammad irfan', 'muhammadirfan.9f@gmail.com', 5, 2, 'STR002.jpg', '2021-06-14 13:15:49', '2021-05-19 17:12:39', 0),
('STR003', 'benben', 'bento', 'ben zoskan', 'bneks@gmail.com', 1, 2, 'STR003.jpg', '2021-06-14 13:16:04', '2021-06-10 09:42:27', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_item_spq_2`
--
ALTER TABLE `invoice_item_spq_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_item_itembase`
--
ALTER TABLE `po_item_itembase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `po_item_wordbase`
--
ALTER TABLE `po_item_wordbase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quitation_item`
--
ALTER TABLE `quitation_item`
  MODIFY `id_q_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
