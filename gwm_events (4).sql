-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 07:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gwm_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `category`) VALUES
(1, 'State Bank of India', 'Public Sector Bank'),
(2, 'Punjab National Bank', 'Public Sector Bank'),
(3, 'Bank of Baroda', 'Public Sector Bank'),
(4, 'Canara Bank', 'Public Sector Bank'),
(5, 'Union Bank of India', 'Public Sector Bank'),
(6, 'Indian Bank', 'Public Sector Bank'),
(7, 'Central Bank of India', 'Public Sector Bank'),
(8, 'Indian Overseas Bank', 'Public Sector Bank'),
(9, 'Bank of India', 'Public Sector Bank'),
(10, 'Bank of Maharashtra', 'Public Sector Bank'),
(11, 'Punjab & Sind Bank', 'Public Sector Bank'),
(12, 'UCO Bank', 'Public Sector Bank'),
(13, 'HDFC Bank', 'Private Sector Bank'),
(14, 'ICICI Bank', 'Private Sector Bank'),
(15, 'Axis Bank', 'Private Sector Bank'),
(16, 'Kotak Mahindra Bank', 'Private Sector Bank'),
(17, 'IndusInd Bank', 'Private Sector Bank'),
(18, 'Yes Bank', 'Private Sector Bank'),
(19, 'Federal Bank', 'Private Sector Bank'),
(20, 'IDFC First Bank', 'Private Sector Bank'),
(21, 'Bandhan Bank', 'Private Sector Bank'),
(22, 'RBL Bank', 'Private Sector Bank'),
(23, 'South Indian Bank', 'Private Sector Bank'),
(24, 'IDBI Bank', 'Private Sector Bank'),
(25, 'City Union Bank', 'Private Sector Bank'),
(26, 'Karnataka Bank', 'Private Sector Bank'),
(27, 'Karur Vysya Bank', 'Private Sector Bank'),
(28, 'Tamilnad Mercantile Bank', 'Private Sector Bank'),
(29, 'Nainital Bank', 'Private Sector Bank'),
(30, 'DCB Bank', 'Private Sector Bank'),
(31, 'Dhanlaxmi Bank', 'Private Sector Bank'),
(32, 'CSB Bank', 'Private Sector Bank'),
(33, 'Andhra Pradesh Grameena Vikas Bank', 'Regional Rural Bank'),
(34, 'Assam Gramin Vikash Bank', 'Regional Rural Bank'),
(35, 'Baroda UP Bank', 'Regional Rural Bank'),
(36, 'Chaitanya Godavari Grameena Bank', 'Regional Rural Bank'),
(37, 'Kerala Gramin Bank', 'Regional Rural Bank'),
(38, 'Karnataka Gramin Bank', 'Regional Rural Bank'),
(39, 'Maharashtra Gramin Bank', 'Regional Rural Bank'),
(40, 'Punjab Gramin Bank', 'Regional Rural Bank'),
(41, 'Saptagiri Grameena Bank', 'Regional Rural Bank'),
(42, 'Utkal Grameen Bank', 'Regional Rural Bank'),
(43, 'AU Small Finance Bank', 'Small Finance Bank'),
(44, 'Equitas Small Finance Bank', 'Small Finance Bank'),
(45, 'Ujjivan Small Finance Bank', 'Small Finance Bank'),
(46, 'Jana Small Finance Bank', 'Small Finance Bank'),
(47, 'Fincare Small Finance Bank', 'Small Finance Bank'),
(48, 'Capital Small Finance Bank', 'Small Finance Bank'),
(49, 'Suryoday Small Finance Bank', 'Small Finance Bank'),
(50, 'Utkarsh Small Finance Bank', 'Small Finance Bank'),
(51, 'ESAF Small Finance Bank', 'Small Finance Bank'),
(52, 'North East Small Finance Bank', 'Small Finance Bank'),
(53, 'Shivalik Small Finance Bank', 'Small Finance Bank'),
(54, 'Unity Small Finance Bank', 'Small Finance Bank'),
(55, 'India Post Payments Bank', 'Payment Bank'),
(56, 'Paytm Payments Bank', 'Payment Bank'),
(57, 'Airtel Payments Bank', 'Payment Bank'),
(58, 'Fino Payments Bank', 'Payment Bank'),
(59, 'Citibank', 'Foreign Bank'),
(60, 'HSBC', 'Foreign Bank'),
(61, 'Standard Chartered', 'Foreign Bank'),
(62, 'Deutsche Bank', 'Foreign Bank'),
(63, 'DBS Bank', 'Foreign Bank'),
(64, 'AB Bank', 'Foreign Bank'),
(65, 'Abu Dhabi Commercial Bank', 'Foreign Bank'),
(66, 'American Express Banking Corporation', 'Foreign Bank'),
(67, 'Australia and New Zealand Banking Group', 'Foreign Bank'),
(68, 'Barclays Bank', 'Foreign Bank'),
(69, 'Bank of America', 'Foreign Bank'),
(70, 'Bank of Bahrain & Kuwait', 'Foreign Bank'),
(71, 'Bank of Ceylon', 'Foreign Bank'),
(72, 'Bank of China', 'Foreign Bank'),
(73, 'Bank of Nova Scotia', 'Foreign Bank'),
(74, 'BNP Paribas', 'Foreign Bank'),
(75, 'Cooperatieve Rabobank', 'Foreign Bank'),
(76, 'Credit Agricole Corporate & Investment Bank', 'Foreign Bank'),
(77, 'Credit Suisse', 'Foreign Bank'),
(78, 'CTBC Bank', 'Foreign Bank'),
(79, 'Doha Bank', 'Foreign Bank'),
(80, 'Emirates Bank NBD', 'Foreign Bank'),
(81, 'First Abu Dhabi Bank', 'Foreign Bank'),
(82, 'FirstRand Bank', 'Foreign Bank'),
(83, 'Industrial & Commercial Bank of China', 'Foreign Bank'),
(84, 'Industrial Bank of Korea', 'Foreign Bank'),
(85, 'J.P. Morgan Chase Bank', 'Foreign Bank'),
(86, 'JSC VTB Bank', 'Foreign Bank');

-- --------------------------------------------------------

--
-- Table structure for table `banks_master`
--

CREATE TABLE `banks_master` (
  `id` int(10) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `account_type` varchar(30) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `upi_id` varchar(200) NOT NULL,
  `qr_code` text NOT NULL,
  `flag` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks_master`
--

INSERT INTO `banks_master` (`id`, `bank_name`, `account_no`, `ifsc`, `account_type`, `branch_address`, `upi_id`, `qr_code`, `flag`) VALUES
(1, 'ICICI Bank', '004501560103', 'ICIC0000045', 'Salary Account', 'Madhuban , Udaipur', 'yahsmen@ybl', 'uploads/qrcodes/Zivas_First_Birthday-2025-registration_(1).png', 0),
(2, 'Bank of Baroda', '123123323', 'ewrwer', 'Salary Account', 'adsadas', '122122323', '', 0),
(3, 'Kotak Mahindra Bank', '381258478598', 'KKBK002145', 'Savings Account', 'Nimbahera', 'praaash', 'uploads/qrcodes/image-121.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_code` varchar(250) NOT NULL,
  `booking_date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `package_type` varchar(50) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `row` varchar(20) NOT NULL,
  `seat_no` varchar(10) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount_value` decimal(6,2) NOT NULL,
  `discounty_type` varchar(50) NOT NULL,
  `net_total` decimal(10,2) NOT NULL,
  `no_of_tickets` int(10) NOT NULL,
  `advanced_pay` decimal(10,2) NOT NULL,
  `remaining_amount` decimal(10,2) NOT NULL,
  `payment_model` varchar(50) NOT NULL,
  `payment_reference_no` varchar(200) NOT NULL,
  `payment_screenshot` varchar(255) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `area_of_interest` varchar(200) NOT NULL,
  `lead_source` varchar(100) NOT NULL,
  `admin_discount_status` varchar(20) DEFAULT NULL,
  `admin_discount_amount` float(10,2) DEFAULT NULL,
  `admin_payment_date` date DEFAULT NULL,
  `admin_payment_amount` float(10,2) DEFAULT NULL,
  `admin_payment_reference_number` varchar(200) DEFAULT NULL,
  `admin_payment_screenshot` text DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `transaction_date`, `user_id`, `event_code`, `booking_date`, `time`, `package_type`, `event_type`, `row`, `seat_no`, `total_amount`, `discount_value`, `discounty_type`, `net_total`, `no_of_tickets`, `advanced_pay`, `remaining_amount`, `payment_model`, `payment_reference_no`, `payment_screenshot`, `payment_status`, `area_of_interest`, `lead_source`, `admin_discount_status`, `admin_discount_amount`, `admin_payment_date`, `admin_payment_amount`, `admin_payment_reference_number`, `admin_payment_screenshot`, `booking_status`) VALUES
(2, '2024-07-29', 6, 'Y9qxF@XvOk7w', '2024-07-31', '9 am', 'Silver', 'Seminar', '2', 'NA', '15000.00', '1000.00', 'Early Birds', '14000.00', 1, '4000.00', '10000.00', 'UPI', 'WER$%#TTYHH', '', 'fullpayment', 'competitions', 'gwm_instagram', 'Yes', 5000.00, '2024-09-05', 5000.00, 'UTR10052', 'uploads/payment_images/footer_img1.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `flag` tinyint(2) NOT NULL,
  `show_flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `flag`, `show_flag`) VALUES
(1, 'Salon', NULL, 0, 0),
(9, 'Spa', NULL, 0, 0),
(10, 'Nail Studio', NULL, 0, 0),
(11, 'Parlour', NULL, 0, 0),
(12, 'Academy ', NULL, 0, 0),
(13, 'ss', NULL, 0, 0),
(14, 'ss', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(20) NOT NULL,
  `city` varchar(300) NOT NULL,
  `state_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`) VALUES
(1, 'North and Middle Andaman', 32),
(2, 'South Andaman', 32),
(3, 'Nicobar', 32),
(4, 'Adilabad', 1),
(5, 'Anantapur', 1),
(6, 'Chittoor', 1),
(7, 'East Godavari', 1),
(8, 'Guntur', 1),
(9, 'Hyderabad', 1),
(10, 'Kadapa', 1),
(11, 'Karimnagar', 1),
(12, 'Khammam', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Mahbubnagar', 1),
(16, 'Medak', 1),
(17, 'Nalgonda', 1),
(18, 'Nellore', 1),
(19, 'Nizamabad', 1),
(20, 'Prakasam', 1),
(21, 'Rangareddi', 1),
(22, 'Srikakulam', 1),
(23, 'Vishakhapatnam', 1),
(24, 'Vizianagaram', 1),
(25, 'Warangal', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 3),
(28, 'Changlang', 3),
(29, 'East Kameng', 3),
(30, 'Lohit', 3),
(31, 'Lower Subansiri', 3),
(32, 'Papum Pare', 3),
(33, 'Tirap', 3),
(34, 'Dibang Valley', 3),
(35, 'Upper Subansiri', 3),
(36, 'West Kameng', 3),
(37, 'Barpeta', 2),
(38, 'Bongaigaon', 2),
(39, 'Cachar', 2),
(40, 'Darrang', 2),
(41, 'Dhemaji', 2),
(42, 'Dhubri', 2),
(43, 'Dibrugarh', 2),
(44, 'Goalpara', 2),
(45, 'Golaghat', 2),
(46, 'Hailakandi', 2),
(47, 'Jorhat', 2),
(48, 'Karbi Anglong', 2),
(49, 'Karimganj', 2),
(50, 'Kokrajhar', 2),
(51, 'Lakhimpur', 2),
(52, 'Marigaon', 2),
(53, 'Nagaon', 2),
(54, 'Nalbari', 2),
(55, 'North Cachar Hills', 2),
(56, 'Sibsagar', 2),
(57, 'Sonitpur', 2),
(58, 'Tinsukia', 2),
(59, 'Araria', 4),
(60, 'Aurangabad', 4),
(61, 'Banka', 4),
(62, 'Begusarai', 4),
(63, 'Bhagalpur', 4),
(64, 'Bhojpur', 4),
(65, 'Buxar', 4),
(66, 'Darbhanga', 4),
(67, 'Purba Champaran', 4),
(68, 'Gaya', 4),
(69, 'Gopalganj', 4),
(70, 'Jamui', 4),
(71, 'Jehanabad', 4),
(72, 'Khagaria', 4),
(73, 'Kishanganj', 4),
(74, 'Kaimur', 4),
(75, 'Katihar', 4),
(76, 'Lakhisarai', 4),
(77, 'Madhubani', 4),
(78, 'Munger', 4),
(79, 'Madhepura', 4),
(80, 'Muzaffarpur', 4),
(81, 'Nalanda', 4),
(82, 'Nawada', 4),
(83, 'Patna', 4),
(84, 'Purnia', 4),
(85, 'Rohtas', 4),
(86, 'Saharsa', 4),
(87, 'Samastipur', 4),
(88, 'Sheohar', 4),
(89, 'Sheikhpura', 4),
(90, 'Saran', 4),
(91, 'Sitamarhi', 4),
(92, 'Supaul', 4),
(93, 'Siwan', 4),
(94, 'Vaishali', 4),
(95, 'Pashchim Champaran', 4),
(96, 'Bastar', 36),
(97, 'Bilaspur', 36),
(98, 'Dantewada', 36),
(99, 'Dhamtari', 36),
(100, 'Durg', 36),
(101, 'Jashpur', 36),
(102, 'Janjgir-Champa', 36),
(103, 'Korba', 36),
(104, 'Koriya', 36),
(105, 'Kanker', 36),
(106, 'Kawardha', 36),
(107, 'Mahasamund', 36),
(108, 'Raigarh', 36),
(109, 'Rajnandgaon', 36),
(110, 'Raipur', 36),
(111, 'Surguja', 36),
(112, 'Diu', 29),
(113, 'Daman', 29),
(114, 'Central Delhi', 25),
(115, 'East Delhi', 25),
(116, 'New Delhi', 25),
(117, 'North Delhi', 25),
(118, 'North East Delhi', 25),
(119, 'North West Delhi', 25),
(120, 'South Delhi', 25),
(121, 'South West Delhi', 25),
(122, 'West Delhi', 25),
(123, 'North Goa', 26),
(124, 'South Goa', 26),
(125, 'Ahmedabad', 5),
(126, 'Amreli District', 5),
(127, 'Anand', 5),
(128, 'Banaskantha', 5),
(129, 'Bharuch', 5),
(130, 'Bhavnagar', 5),
(131, 'Dahod', 5),
(132, 'The Dangs', 5),
(133, 'Gandhinagar', 5),
(134, 'Jamnagar', 5),
(135, 'Junagadh', 5),
(136, 'Kutch', 5),
(137, 'Kheda', 5),
(138, 'Mehsana', 5),
(139, 'Narmada', 5),
(140, 'Navsari', 5),
(141, 'Patan', 5),
(142, 'Panchmahal', 5),
(143, 'Porbandar', 5),
(144, 'Rajkot', 5),
(145, 'Sabarkantha', 5),
(146, 'Surendranagar', 5),
(147, 'Surat', 5),
(148, 'Vadodara', 5),
(149, 'Valsad', 5),
(150, 'Ambala', 6),
(151, 'Bhiwani', 6),
(152, 'Faridabad', 6),
(153, 'Fatehabad', 6),
(154, 'Gurgaon', 6),
(155, 'Hissar', 6),
(156, 'Jhajjar', 6),
(157, 'Jind', 6),
(158, 'Karnal', 6),
(159, 'Kaithal', 6),
(160, 'Kurukshetra', 6),
(161, 'Mahendragarh', 6),
(162, 'Mewat', 6),
(163, 'Panchkula', 6),
(164, 'Panipat', 6),
(165, 'Rewari', 6),
(166, 'Rohtak', 6),
(167, 'Sirsa', 6),
(168, 'Sonepat', 6),
(169, 'Yamuna Nagar', 6),
(170, 'Palwal', 6),
(171, 'Bilaspur', 7),
(172, 'Chamba', 7),
(173, 'Hamirpur', 7),
(174, 'Kangra', 7),
(175, 'Kinnaur', 7),
(176, 'Kulu', 7),
(177, 'Lahaul and Spiti', 7),
(178, 'Mandi', 7),
(179, 'Shimla', 7),
(180, 'Sirmaur', 7),
(181, 'Solan', 7),
(182, 'Una', 7),
(183, 'Anantnag', 8),
(184, 'Badgam', 8),
(185, 'Bandipore', 8),
(186, 'Baramula', 8),
(187, 'Doda', 8),
(188, 'Jammu', 8),
(189, 'Kargil', 8),
(190, 'Kathua', 8),
(191, 'Kupwara', 8),
(192, 'Leh', 8),
(193, 'Poonch', 8),
(194, 'Pulwama', 8),
(195, 'Rajauri', 8),
(196, 'Srinagar', 8),
(197, 'Samba', 8),
(198, 'Udhampur', 8),
(199, 'Bokaro', 34),
(200, 'Chatra', 34),
(201, 'Deoghar', 34),
(202, 'Dhanbad', 34),
(203, 'Dumka', 34),
(204, 'Purba Singhbhum', 34),
(205, 'Garhwa', 34),
(206, 'Giridih', 34),
(207, 'Godda', 34),
(208, 'Gumla', 34),
(209, 'Hazaribagh', 34),
(210, 'Koderma', 34),
(211, 'Lohardaga', 34),
(212, 'Pakur', 34),
(213, 'Palamu', 34),
(214, 'Ranchi', 34),
(215, 'Sahibganj', 34),
(216, 'Seraikela and Kharsawan', 34),
(217, 'Pashchim Singhbhum', 34),
(218, 'Ramgarh', 34),
(219, 'Bidar', 9),
(220, 'Belgaum', 9),
(221, 'Bijapur', 9),
(222, 'Bagalkot', 9),
(223, 'Bellary', 9),
(224, 'Bangalore Rural District', 9),
(225, 'Bangalore Urban District', 9),
(226, 'Chamarajnagar', 9),
(227, 'Chikmagalur', 9),
(228, 'Chitradurga', 9),
(229, 'Davanagere', 9),
(230, 'Dharwad', 9),
(231, 'Dakshina Kannada', 9),
(232, 'Gadag', 9),
(233, 'Gulbarga', 9),
(234, 'Hassan', 9),
(235, 'Haveri District', 9),
(236, 'Kodagu', 9),
(237, 'Kolar', 9),
(238, 'Koppal', 9),
(239, 'Mandya', 9),
(240, 'Mysore', 9),
(241, 'Raichur', 9),
(242, 'Shimoga', 9),
(243, 'Tumkur', 9),
(244, 'Udupi', 9),
(245, 'Uttara Kannada', 9),
(246, 'Ramanagara', 9),
(247, 'Chikballapur', 9),
(248, 'Yadagiri', 9),
(249, 'Alappuzha', 10),
(250, 'Ernakulam', 10),
(251, 'Idukki', 10),
(252, 'Kollam', 10),
(253, 'Kannur', 10),
(254, 'Kasaragod', 10),
(255, 'Kottayam', 10),
(256, 'Kozhikode', 10),
(257, 'Malappuram', 10),
(258, 'Palakkad', 10),
(259, 'Pathanamthitta', 10),
(260, 'Thrissur', 10),
(261, 'Thiruvananthapuram', 10),
(262, 'Wayanad', 10),
(263, 'Alirajpur', 11),
(264, 'Anuppur', 11),
(265, 'Ashok Nagar', 11),
(266, 'Balaghat', 11),
(267, 'Barwani', 11),
(268, 'Betul', 11),
(269, 'Bhind', 11),
(270, 'Bhopal', 11),
(271, 'Burhanpur', 11),
(272, 'Chhatarpur', 11),
(273, 'Chhindwara', 11),
(274, 'Damoh', 11),
(275, 'Datia', 11),
(276, 'Dewas', 11),
(277, 'Dhar', 11),
(278, 'Dindori', 11),
(279, 'Guna', 11),
(280, 'Gwalior', 11),
(281, 'Harda', 11),
(282, 'Hoshangabad', 11),
(283, 'Indore', 11),
(284, 'Jabalpur', 11),
(285, 'Jhabua', 11),
(286, 'Katni', 11),
(287, 'Khandwa', 11),
(288, 'Khargone', 11),
(289, 'Mandla', 11),
(290, 'Mandsaur', 11),
(291, 'Morena', 11),
(292, 'Narsinghpur', 11),
(293, 'Neemuch', 11),
(294, 'Panna', 11),
(295, 'Rewa', 11),
(296, 'Rajgarh', 11),
(297, 'Ratlam', 11),
(298, 'Raisen', 11),
(299, 'Sagar', 11),
(300, 'Satna', 11),
(301, 'Sehore', 11),
(302, 'Seoni', 11),
(303, 'Shahdol', 11),
(304, 'Shajapur', 11),
(305, 'Sheopur', 11),
(306, 'Shivpuri', 11),
(307, 'Sidhi', 11),
(308, 'Singrauli', 11),
(309, 'Tikamgarh', 11),
(310, 'Ujjain', 11),
(311, 'Umaria', 11),
(312, 'Vidisha', 11),
(313, 'Ahmednagar', 12),
(314, 'Akola', 12),
(315, 'Amrawati', 12),
(316, 'Aurangabad', 12),
(317, 'Bhandara', 12),
(318, 'Beed', 12),
(319, 'Buldhana', 12),
(320, 'Chandrapur', 12),
(321, 'Dhule', 12),
(322, 'Gadchiroli', 12),
(323, 'Gondiya', 12),
(324, 'Hingoli', 12),
(325, 'Jalgaon', 12),
(326, 'Jalna', 12),
(327, 'Kolhapur', 12),
(328, 'Latur', 12),
(329, 'Mumbai City', 12),
(330, 'Mumbai suburban', 12),
(331, 'Nandurbar', 12),
(332, 'Nanded', 12),
(333, 'Nagpur', 12),
(334, 'Nashik', 12),
(335, 'Osmanabad', 12),
(336, 'Parbhani', 12),
(337, 'Pune', 12),
(338, 'Raigad', 12),
(339, 'Ratnagiri', 12),
(340, 'Sindhudurg', 12),
(341, 'Sangli', 12),
(342, 'Solapur', 12),
(343, 'Satara', 12),
(344, 'Thane', 12),
(345, 'Wardha', 12),
(346, 'Washim', 12),
(347, 'Yavatmal', 12),
(348, 'Bishnupur', 13),
(349, 'Churachandpur', 13),
(350, 'Chandel', 13),
(351, 'Imphal East', 13),
(352, 'Senapati', 13),
(353, 'Tamenglong', 13),
(354, 'Thoubal', 13),
(355, 'Ukhrul', 13),
(356, 'Imphal West', 13),
(357, 'East Garo Hills', 14),
(358, 'East Khasi Hills', 14),
(359, 'Jaintia Hills', 14),
(360, 'Ri-Bhoi', 14),
(361, 'South Garo Hills', 14),
(362, 'West Garo Hills', 14),
(363, 'West Khasi Hills', 14),
(364, 'Aizawl', 15),
(365, 'Champhai', 15),
(366, 'Kolasib', 15),
(367, 'Lawngtlai', 15),
(368, 'Lunglei', 15),
(369, 'Mamit', 15),
(370, 'Saiha', 15),
(371, 'Serchhip', 15),
(372, 'Dimapur', 16),
(373, 'Kohima', 16),
(374, 'Mokokchung', 16),
(375, 'Mon', 16),
(376, 'Phek', 16),
(377, 'Tuensang', 16),
(378, 'Wokha', 16),
(379, 'Zunheboto', 16),
(380, 'Angul', 17),
(381, 'Boudh', 17),
(382, 'Bhadrak', 17),
(383, 'Bolangir', 17),
(384, 'Bargarh', 17),
(385, 'Baleswar', 17),
(386, 'Cuttack', 17),
(387, 'Debagarh', 17),
(388, 'Dhenkanal', 17),
(389, 'Ganjam', 17),
(390, 'Gajapati', 17),
(391, 'Jharsuguda', 17),
(392, 'Jajapur', 17),
(393, 'Jagatsinghpur', 17),
(394, 'Khordha', 17),
(395, 'Kendujhar', 17),
(396, 'Kalahandi', 17),
(397, 'Kandhamal', 17),
(398, 'Koraput', 17),
(399, 'Kendrapara', 17),
(400, 'Malkangiri', 17),
(401, 'Mayurbhanj', 17),
(402, 'Nabarangpur', 17),
(403, 'Nuapada', 17),
(404, 'Nayagarh', 17),
(405, 'Puri', 17),
(406, 'Rayagada', 17),
(407, 'Sambalpur', 17),
(408, 'Subarnapur', 17),
(409, 'Sundargarh', 17),
(410, 'Karaikal', 27),
(411, 'Mahe', 27),
(412, 'Puducherry', 27),
(413, 'Yanam', 27),
(414, 'Amritsar', 18),
(415, 'Bathinda', 18),
(416, 'Firozpur', 18),
(417, 'Faridkot', 18),
(418, 'Fatehgarh Sahib', 18),
(419, 'Gurdaspur', 18),
(420, 'Hoshiarpur', 18),
(421, 'Jalandhar', 18),
(422, 'Kapurthala', 18),
(423, 'Ludhiana', 18),
(424, 'Mansa', 18),
(425, 'Moga', 18),
(426, 'Mukatsar', 18),
(427, 'Nawan Shehar', 18),
(428, 'Patiala', 18),
(429, 'Rupnagar', 18),
(430, 'Sangrur', 18),
(431, 'Ajmer', 19),
(432, 'Alwar', 19),
(433, 'Bikaner', 19),
(434, 'Barmer', 19),
(435, 'Banswara', 19),
(436, 'Bharatpur', 19),
(437, 'Baran', 19),
(438, 'Bundi', 19),
(439, 'Bhilwara', 19),
(440, 'Churu', 19),
(441, 'Chittorgarh', 19),
(442, 'Dausa', 19),
(443, 'Dholpur', 19),
(444, 'Dungapur', 19),
(445, 'Ganganagar', 19),
(446, 'Hanumangarh', 19),
(447, 'Juhnjhunun', 19),
(448, 'Jalore', 19),
(449, 'Jodhpur', 19),
(450, 'Jaipur', 19),
(451, 'Jaisalmer', 19),
(452, 'Jhalawar', 19),
(453, 'Karauli', 19),
(454, 'Kota', 19),
(455, 'Nagaur', 19),
(456, 'Pali', 19),
(457, 'Pratapgarh', 19),
(458, 'Rajsamand', 19),
(459, 'Sikar', 19),
(460, 'Sawai Madhopur', 19),
(461, 'Sirohi', 19),
(462, 'Tonk', 19),
(463, 'Udaipur', 19),
(464, 'East Sikkim', 20),
(465, 'North Sikkim', 20),
(466, 'South Sikkim', 20),
(467, 'West Sikkim', 20),
(468, 'Ariyalur', 21),
(469, 'Chennai', 21),
(470, 'Coimbatore', 21),
(471, 'Cuddalore', 21),
(472, 'Dharmapuri', 21),
(473, 'Dindigul', 21),
(474, 'Erode', 21),
(475, 'Kanchipuram', 21),
(476, 'Kanyakumari', 21),
(477, 'Karur', 21),
(478, 'Madurai', 21),
(479, 'Nagapattinam', 21),
(480, 'The Nilgiris', 21),
(481, 'Namakkal', 21),
(482, 'Perambalur', 21),
(483, 'Pudukkottai', 21),
(484, 'Ramanathapuram', 21),
(485, 'Salem', 21),
(486, 'Sivagangai', 21),
(487, 'Tiruppur', 21),
(488, 'Tiruchirappalli', 21),
(489, 'Theni', 21),
(490, 'Tirunelveli', 21),
(491, 'Thanjavur', 21),
(492, 'Thoothukudi', 21),
(493, 'Thiruvallur', 21),
(494, 'Thiruvarur', 21),
(495, 'Tiruvannamalai', 21),
(496, 'Vellore', 21),
(497, 'Villupuram', 21),
(498, 'Dhalai', 22),
(499, 'North Tripura', 22),
(500, 'South Tripura', 22),
(501, 'West Tripura', 22),
(502, 'Almora', 33),
(503, 'Bageshwar', 33),
(504, 'Chamoli', 33),
(505, 'Champawat', 33),
(506, 'Dehradun', 33),
(507, 'Haridwar', 33),
(508, 'Nainital', 33),
(509, 'Pauri Garhwal', 33),
(510, 'Pithoragharh', 33),
(511, 'Rudraprayag', 33),
(512, 'Tehri Garhwal', 33),
(513, 'Udham Singh Nagar', 33),
(514, 'Uttarkashi', 33),
(515, 'Agra', 23),
(516, 'Allahabad', 23),
(517, 'Aligarh', 23),
(518, 'Ambedkar Nagar', 23),
(519, 'Auraiya', 23),
(520, 'Azamgarh', 23),
(521, 'Barabanki', 23),
(522, 'Badaun', 23),
(523, 'Bagpat', 23),
(524, 'Bahraich', 23),
(525, 'Bijnor', 23),
(526, 'Ballia', 23),
(527, 'Banda', 23),
(528, 'Balrampur', 23),
(529, 'Bareilly', 23),
(530, 'Basti', 23),
(531, 'Bulandshahr', 23),
(532, 'Chandauli', 23),
(533, 'Chitrakoot', 23),
(534, 'Deoria', 23),
(535, 'Etah', 23),
(536, 'Kanshiram Nagar', 23),
(537, 'Etawah', 23),
(538, 'Firozabad', 23),
(539, 'Farrukhabad', 23),
(540, 'Fatehpur', 23),
(541, 'Faizabad', 23),
(542, 'Gautam Buddha Nagar', 23),
(543, 'Gonda', 23),
(544, 'Ghazipur', 23),
(545, 'Gorkakhpur', 23),
(546, 'Ghaziabad', 23),
(547, 'Hamirpur', 23),
(548, 'Hardoi', 23),
(549, 'Mahamaya Nagar', 23),
(550, 'Jhansi', 23),
(551, 'Jalaun', 23),
(552, 'Jyotiba Phule Nagar', 23),
(553, 'Jaunpur District', 23),
(554, 'Kanpur Dehat', 23),
(555, 'Kannauj', 23),
(556, 'Kanpur Nagar', 23),
(557, 'Kaushambi', 23),
(558, 'Kushinagar', 23),
(559, 'Lalitpur', 23),
(560, 'Lakhimpur Kheri', 23),
(561, 'Lucknow', 23),
(562, 'Mau', 23),
(563, 'Meerut', 23),
(564, 'Maharajganj', 23),
(565, 'Mahoba', 23),
(566, 'Mirzapur', 23),
(567, 'Moradabad', 23),
(568, 'Mainpuri', 23),
(569, 'Mathura', 23),
(570, 'Muzaffarnagar', 23),
(571, 'Pilibhit', 23),
(572, 'Pratapgarh', 23),
(573, 'Rampur', 23),
(574, 'Rae Bareli', 23),
(575, 'Saharanpur', 23),
(576, 'Sitapur', 23),
(577, 'Shahjahanpur', 23),
(578, 'Sant Kabir Nagar', 23),
(579, 'Siddharthnagar', 23),
(580, 'Sonbhadra', 23),
(581, 'Sant Ravidas Nagar', 23),
(582, 'Sultanpur', 23),
(583, 'Shravasti', 23),
(584, 'Unnao', 23),
(585, 'Varanasi', 23),
(586, 'Birbhum', 24),
(587, 'Bankura', 24),
(588, 'Bardhaman', 24),
(589, 'Darjeeling', 24),
(590, 'Dakshin Dinajpur', 24),
(591, 'Hooghly', 24),
(592, 'Howrah', 24),
(593, 'Jalpaiguri', 24),
(594, 'Cooch Behar', 24),
(595, 'Kolkata', 24),
(596, 'Malda', 24),
(597, 'Midnapore', 24),
(598, 'Murshidabad', 24),
(599, 'Nadia', 24),
(600, 'North 24 Parganas', 24),
(601, 'South 24 Parganas', 24),
(602, 'Purulia', 24),
(603, 'Uttar Dinajpur', 24);

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `reference_user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `event_code` varchar(200) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `payment_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iso_code_2` varchar(2) NOT NULL,
  `iso_code_3` varchar(3) NOT NULL,
  `address_format` text NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`, `created_by`, `modified_by`, `created_date`, `modified_date`) VALUES
(99, 'India', 'IN', 'IND', '', 0, 1, 0, 0, '2018-12-13 06:37:52', '2018-12-13 06:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) NOT NULL,
  `department_name` varchar(300) NOT NULL,
  `department_code` varchar(100) NOT NULL,
  `flag` tinyint(2) NOT NULL,
  `show_dept` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_code`, `flag`, `show_dept`) VALUES
(1, 'Personal & Administration', 'PEA', 0, 1),
(2, 'Accounts & Finance', 'ACF', 0, 0),
(3, 'Store Department', 'STORE', 0, 0),
(4, 'Product Development &  Production', 'PDP', 0, 1),
(5, 'Supply Chain Management', 'SCM', 0, 1),
(7, 'Engineering', 'ENG', 0, 1),
(8, 'Quality Assurance', 'QA', 0, 0),
(9, 'Sales & Marketing', 'SAM', 0, 0),
(10, 'Top Management', 'TM', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `discounts_master`
--

CREATE TABLE `discounts_master` (
  `id` int(11) NOT NULL,
  `event_code` varchar(150) NOT NULL,
  `discount_type` varchar(150) DEFAULT NULL,
  `coupon_code` varchar(200) DEFAULT NULL,
  `discount_value` decimal(10,2) DEFAULT NULL,
  `no_of_users` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts_master`
--

INSERT INTO `discounts_master` (`id`, `event_code`, `discount_type`, `coupon_code`, `discount_value`, `no_of_users`) VALUES
(1, 'Y9qxF@XvOk7w', 'Early Bird', 'EARLY2000', '2000.00', 20),
(2, 'Y9qxF@XvOk7w', 'General', 'Marathon2024', '1000.00', 100),
(3, 'Y9qxF@XvOk7w', 'Group', 'GDMera700', '700.00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `discount_history`
--

CREATE TABLE `discount_history` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_code` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `discount_value` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`email`) VALUES
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com'),
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com'),
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com'),
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com'),
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com'),
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com'),
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com'),
('prakash1.muskowl@gmail.com'),
('rajesh.muskowl@gmail.com'),
('priyesh1.muskowl@gmail.com'),
('sachin.muskowl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(20) NOT NULL,
  `name` varchar(300) NOT NULL,
  `employee_code` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `role_id` int(10) NOT NULL,
  `department_id` int(5) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` text NOT NULL,
  `pan_no` varchar(300) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `aadhaar_no` varchar(300) NOT NULL,
  `medical_status` varchar(10) DEFAULT NULL,
  `report_no` varchar(250) DEFAULT NULL,
  `dob` date NOT NULL,
  `photo` text NOT NULL,
  `address` text NOT NULL,
  `forgot_code` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `edited_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `edited_by` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `employee_code`, `email`, `mobile_no`, `role_id`, `department_id`, `username`, `password`, `pan_no`, `blood_group`, `gender`, `aadhaar_no`, `medical_status`, `report_no`, `dob`, `photo`, `address`, `forgot_code`, `status`, `created_on`, `created_by`, `edited_on`, `edited_by`, `flag`) VALUES
(2, 'Prakash Sharma', 2, 'prakash@muskowl.com', '6378884529', 1, 0, 'yash', '250cf8b51c773f3f8dc8b4be867a9a02', '', '', '', '', NULL, NULL, '0000-00-00', 'uploads/user_media/272328456_4415017175269435_2943175811010218305_n2.jpg', 'muskowl, udaipur', '', 0, '2021-12-17 11:56:37', 1, '2024-07-19 12:02:31', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events_master`
--

CREATE TABLE `events_master` (
  `id` int(11) NOT NULL,
  `identity_code` varchar(250) NOT NULL,
  `event_name` varchar(250) NOT NULL,
  `category_id` int(8) NOT NULL,
  `subcategory_id` int(10) DEFAULT NULL,
  `bank_master_ids` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `event_types` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` int(8) NOT NULL,
  `state_id` int(10) NOT NULL,
  `freebie_image` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `flag` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_master`
--

INSERT INTO `events_master` (`id`, `identity_code`, `event_name`, `category_id`, `subcategory_id`, `bank_master_ids`, `event_types`, `start_date`, `start_time`, `end_date`, `end_time`, `address`, `city`, `pincode`, `state_id`, `freebie_image`, `status`, `flag`) VALUES
(1, 'Y9qxF@XvOk7w', 'Marathon Udaipur 13 to 15 September 2024', 10, 1, '[\"1\",\"3\"]', '', '2024-09-13', '09:00:00', '2024-09-15', '23:59:00', 'Fateh Sagar Lake ,  Udaipur', 'Udaipur', 313001, 19, 'uploads/event_images/Screenshot_2024-08-28_1553531.png', 'upcoming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL,
  `event_code` varchar(255) NOT NULL,
  `event_type` varchar(200) NOT NULL,
  `package_available` varchar(20) NOT NULL,
  `single_price` decimal(10,2) NOT NULL,
  `vip_row_price` decimal(10,2) NOT NULL,
  `gold_row_price` decimal(10,2) NOT NULL,
  `silver_row_price` decimal(10,2) NOT NULL,
  `tnc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `event_code`, `event_type`, `package_available`, `single_price`, `vip_row_price`, `gold_row_price`, `silver_row_price`, `tnc`) VALUES
(1, 'Y9qxF@XvOk7w', 'Seminar', 'Yes', '0.00', '2500.00', '1500.00', '800.00', '<p><strong>Concept Description:</strong></p><ul><li><strong>Background:</strong> A neutral, slightly textured background in light gray or white to keep the focus on the main elements.</li><li><strong>Main Element:</strong> An open document or contract scroll in the center, with the heading \"Terms & Conditions\" clearly visible at the top of the page.</li><li><strong>Icons:</strong> Around the document, incorporate small icons representing different aspects of event organization, such as a calendar for scheduling, a handshake for agreements, a checkmark for approvals, and a shield for security or legal protection.</li><li><strong>Additional Elements:</strong> A pen signing the document in the lower corner, symbolizing agreement and finalization. You can also include a faint watermark of an event-related graphic, like a stage or a microphone, in the background.</li></ul>'),
(2, 'Y9qxF@XvOk7w', 'Competition', 'No', '6100.00', '0.00', '0.00', '0.00', '<p><strong>Competition Description:</strong></p><ul><li><strong>Background:</strong> A neutral, slightly textured background in light gray or white to keep the focus on the main elements.</li><li><strong>Main Element:</strong> An open document or contract scroll in the center, with the heading \"Terms & Conditions\" clearly visible at the top of the page.</li><li><strong>Icons:</strong> Around the document, incorporate small icons representing different aspects of event organization, such as a calendar for scheduling, a handshake for agreements, a checkmark for approvals, and a shield for security or legal protection.</li><li><strong>Additional Elements:</strong> A pen signing the document in the lower corner, symbolizing agreement and finalization. You can also include a faint watermark of an event-related graphic, like a stage or a microphone, in the background.</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `item_sales`
--

CREATE TABLE `item_sales` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `hsn_code` varchar(100) NOT NULL,
  `tax_per` int(6) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_sales`
--

INSERT INTO `item_sales` (`id`, `name`, `hsn_code`, `tax_per`, `unit`) VALUES
(1, 'Grit 12-20mm', '2517', 5, 'Cbm '),
(3, 'Water Tanker', '2201', 0, 'Per Day'),
(4, 'Cement', '2523', 28, 'Bag'),
(5, 'Grit  40 mm', '2517', 5, 'Cbm '),
(6, 'Ret (Sand)', '2505', 5, 'Cbm '),
(7, 'Mixer machine kiraya', '9973', 18, 'Par day'),
(8, 'Vaibrator machine kiraya', '9973', 18, 'Par day'),
(9, 'Mithi parivahan ', '9965', 12, 'Cbm'),
(10, 'Khanda (Masonary stone)', '2517', 5, 'CBM'),
(11, 'Gravel ', '2517', 5, 'CBM'),
(12, 'Satering kiraya', '9973', 18, 'CBM'),
(13, 'SARIYA (iRON TOR)', '7214', 18, 'Kg.'),
(14, 'Steel furniture', '8302', 18, 'Kgs'),
(15, 'Hume pipe (Cement Pipe)', '6811', 18, 'CBM'),
(16, 'Works contract service', '9954', 18, 'CBM'),
(17, 'Wooden Furniture', '9403', 18, 'Piece'),
(18, 'LED Tube Light', '9405', 18, 'Piece'),
(19, 'Moduler box', '8536', 18, 'Pieces'),
(20, 'Ms bars', '7214', 18, 'Kg'),
(21, 'Shuttering kiraya Iron', '7214', 18, 'Qm'),
(22, 'Shuttering wooden', '7214', 18, 'Qm'),
(23, 'Winding wire', '8544', 18, 'Kg.'),
(24, 'Patthar(Stone )RR', '2516', 18, 'Qm'),
(25, 'Cleaning ', '9994', 0, '1'),
(26, 'Kota stone ', '2516', 5, 'Cbm '),
(27, 'Ghisai polish mshin kiraya', '9973', 18, 'Cbm '),
(28, 'Chinai pathar', '2516', 5, 'Qm'),
(29, 'Pathar pattiya', '2516', 5, 'CBm'),
(30, 'Khurnja pathar', '2516', 5, 'Qm'),
(31, 'Jcb kiraya', '9973', 18, 'Par day'),
(32, 'Kota stone ', '2515', 5, 'Sqm'),
(33, 'Bricks ', '69041000', 12, 'Nung'),
(34, 'Bricks ', '69041000', 12, 'Nung'),
(35, 'Marble ', '25151100', 5, 'Sqm'),
(36, 'Katar mshisn kiraya', '9973', 18, 'PR day'),
(37, 'Display board ', '44111990', 18, 'Par bord'),
(38, 'PVC pipe 110 mm', '391721', 18, 'Meter'),
(39, 'Dismantling ', '90189044', 18, 'CBm'),
(40, 'Flush door', '44182010', 18, 'Metar'),
(41, 'Distember', '32100011', 18, 'Kg'),
(42, 'Color', '3204', 18, 'Kg'),
(43, 'Primer', '32089029', 18, 'Kg'),
(44, 'Water pumping kiraya', '9973', 18, 'Par day'),
(45, 'Senetry', '6910', 18, 'Nung'),
(46, 'Matka', '6912', 18, 'Nung'),
(47, 'Tiles ', '69071010', 18, 'Sqm'),
(48, 'PVC water tank', '3925', 18, 'Leter'),
(49, 'Distember', '321000', 18, 'Kg'),
(50, 'PVC pipe', '391723', 18, 'Meter'),
(51, 'Plumbing work ', '995462', 18, 'Nung'),
(52, 'Kusrya cement concrete ', '68101919', 18, 'Nung'),
(53, 'Ghas dubh ', '0604', 0, 'Sqm'),
(54, 'Ghas dubh nirai gudai khad sahit', '9954', 18, 'Sqm'),
(55, 'Hej k podhe', '0604', 0, 'Sqm'),
(56, 'Fawda hendal sahita henaaa hendal sahit', '8201', 5, 'Nung'),
(57, 'Khurpa ', '8201', 5, 'Nung'),
(58, 'Kudali ', '8201', 5, 'Nung'),
(59, 'Kechi baghwqni', '8201', 5, 'Nung'),
(60, 'Secature', '8201', 5, 'Nung'),
(61, 'Garden rec with hendal', '8201', 5, 'Nung'),
(62, 'Geti hendal sahit', '8201', 5, 'Nung'),
(63, 'Cement portas', '6810', 18, 'Nung'),
(64, 'Dustbeen ', '6810', 18, 'Nung'),
(65, 'Khad ', '3101', 12, 'CBm'),
(66, 'Khad bichhana ', '9954', 18, 'CBm'),
(67, 'Deshi gulab podhe', '0604', 0, 'Nung'),
(68, 'Flwaer plant', '0604', 0, 'Nung'),
(69, 'Claimber plant', '0604', 0, 'Nung'),
(70, 'Ficus plant', '0604', 0, 'Nung'),
(71, 'Botel brush plant', '0604', 0, 'Nung'),
(72, 'Nimbu anar chiku and gudal plant', '0604', 0, 'Nung'),
(73, 'Fiber gate ', '3926', 18, 'Nung');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'uri',
  `page_id` int(11) NOT NULL DEFAULT 0,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icon_class` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `dyn_group_id` int(11) NOT NULL DEFAULT 0,
  `position` int(5) NOT NULL DEFAULT 0,
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `is_parent` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `show_menu` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `priority` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `link_type`, `page_id`, `url`, `controller`, `action`, `icon_class`, `dyn_group_id`, `position`, `target`, `parent_id`, `is_parent`, `show_menu`, `priority`) VALUES
(1, 'Master Dashboard', 'uri', 0, 'http://localhost/sn-ci/', 'User_authentication', 'admin_dashboard', 'fa fa-dashboard', 0, 1, '', 0, 'N', 'Y', 2),
(2, 'Employee Module', 'uri', 0, 'http://localhost/CI/event-portal/', '', '', 'fa fa-user-o', 0, 7, '', 0, 'Y', 'Y', 0),
(3, 'Add', 'uri', 0, 'http://localhost/sn-ci/', 'Employees', 'add', 'fa fa-plus', 0, 0, '', 2, 'N', 'Y', 0),
(4, 'View List', 'uri', 0, 'http://localhost/sn-ci/', 'Employees', 'index', 'fa fa-list', 0, 0, '', 2, 'N', 'Y', 0),
(8, 'Change Password', 'uri', 0, 'http://localhost/sn-ci/', 'User_authentication', 'MyPasswordChangeView', '', 0, 0, NULL, 0, 'N', 'N', 0),
(9, 'My Profile', 'uri', 0, 'http://localhost/sn-ci/', 'Employees', 'MyProfile', '', 0, 0, '', 0, 'N', 'N', 0),
(10, 'Edit', 'uri', 0, 'http://localhost/sn-ci/', 'Employees', 'edit', 'fa fa-circle', 0, 0, '', 2, 'N', 'N', 0),
(11, 'Settings', 'uri', 0, 'http://localhost/sn-ci/', '', '', 'fa fa-cog', 0, 7, '', 0, 'Y', 'Y', 0),
(12, 'Menus', 'uri', 0, 'http://localhost/sn-ci/', 'Meenus', 'index', 'fa fa-bars', 0, 0, '', 11, 'N', 'Y', 0),
(13, 'User Rights', 'uri', 0, 'http://localhost/sn-ci/', 'Meenus', 'UserRights', 'fa fa-key', 0, 0, '', 11, 'N', 'Y', 0),
(271, 'Category', 'uri', 0, 'http://localhost/CI/event-portal/', 'Category', 'index', 'fa fa-circle', 0, 0, '', 272, 'N', 'Y', 0),
(272, 'Master Module', 'uri', 0, 'http://localhost/sn-ci/', '', '', 'fa fa-key', 0, 2, '', 0, 'Y', 'Y', 0),
(273, 'Sub Category', 'uri', 0, 'http://localhost/CI/event-portal/', 'SubCategory', 'add', 'fa fa-circle', 0, 0, '', 272, 'N', 'Y', 0),
(275, 'Edit Item', 'uri', 0, 'http://localhost/sn-ci/', 'SubCategory', 'edit', 'fa fa-edit', 0, 0, '', 273, 'N', 'N', 0),
(276, 'Add Item', 'uri', 0, 'http://localhost/sn-ci/', 'SubCategory', 'add', 'fa fa-add', 0, 0, '', 273, 'N', 'N', 0),
(303, 'User Management', 'uri', 0, 'http://localhost/CI/event-portal/', '', '', 'fa fa-users', 0, 0, '', 0, 'Y', 'Y', 0),
(304, 'Create', 'uri', 0, 'http://localhost/CI/event-portal/', 'Users', 'create', 'fa fa-plus', 0, 0, '', 303, 'N', 'Y', 0),
(305, 'View List', 'uri', 0, 'http://localhost/CI/event-portal/', 'Users', 'index', 'fa fa-list', 0, 0, '', 303, 'N', 'Y', 0),
(306, 'Edit User', 'uri', 0, 'http://localhost/CI/event-portal/', 'Users', 'edit', 'fa fa-pencil', 0, 0, '', 303, 'N', 'N', 0),
(307, 'Delete User', 'uri', 0, 'http://localhost/CI/event-portal/', 'Users', 'delete', 'fa fa-erase', 0, 0, '', 303, 'N', 'N', 0),
(308, 'Events', 'uri', 0, 'http://localhost/CI/event-portal/', 'Events', 'index', 'fa fa-circle', 0, 0, '', 272, 'N', 'Y', 0),
(309, 'Add Event', 'uri', 0, 'http://localhost/CI/event-portal/', 'Events', 'add', 'fa fa-circle', 0, 0, '', 308, 'N', 'N', 0),
(310, 'Generate QR Code', 'uri', 0, 'http://localhost/CI/event-portal/', 'Events', 'generate', 'fa fa-circle', 0, 0, '', 308, 'N', 'N', 0),
(311, 'Bookings Module', 'uri', 0, 'http://localhost/CI/event-portal/', 'Bookings', 'index', 'fa fa-file-o', 0, 0, '', 0, 'N', 'Y', 0),
(312, 'Bank Details', 'uri', 0, 'http://localhost/CI/event-portal/', 'Category', 'BankMaster', 'fa fa-circle', 0, 0, '', 272, 'N', 'Y', 0),
(313, 'Add Bank', 'uri', 0, 'http://localhost/CI/event-portal/', 'Category', 'addBank', 'fa fa-circle', 0, 0, '', 312, 'N', 'N', 0),
(314, 'Event Types', 'uri', 0, 'http://localhost/CI/event-portal/', 'Events', 'AddTypes', 'fa fa-circle', 0, 0, '', 272, 'N', 'Y', 0),
(316, 'Booking Status Edit', 'uri', 0, 'http://localhost/CI/event-portal/', 'Bookings', 'ChangeStatus', '', 0, 0, '', 311, 'N', 'N', 0),
(317, 'Add Discount', 'uri', 0, 'http://localhost/CI/event-portal/', 'Bookings', 'addDiscount', '', 0, 0, '', 311, 'N', 'N', 0),
(318, 'Commission Module', 'uri', 0, 'http://localhost/CI/event-portal/', '', '', 'fa fa-money', 0, 0, '', 0, 'N', 'Y', 0),
(319, 'Add Commission', 'uri', 0, 'http://localhost/CI/event-portal/', 'Commission', 'add', 'fa fa-circle', 0, 0, '', 318, 'N', 'Y', 0),
(320, 'View List', 'uri', 0, 'http://localhost/CI/event-portal/', 'Commission', 'index', 'fa fa-circle', 0, 0, '', 318, 'N', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `my_firms`
--

CREATE TABLE `my_firms` (
  `id` int(20) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `vendor_code` int(11) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `gst_status` varchar(50) NOT NULL,
  `gst_no` varchar(100) NOT NULL,
  `pan_no` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` tinyint(4) NOT NULL,
  `edited_on` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `edited_by` tinyint(4) NOT NULL,
  `flag` tinyint(2) NOT NULL DEFAULT 0,
  `approve_flag` tinyint(2) NOT NULL,
  `approve_by` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_firms`
--

INSERT INTO `my_firms` (`id`, `prefix`, `supplier_name`, `vendor_code`, `contact_person`, `reg_date`, `email`, `mobile_no`, `categories_id`, `gst_status`, `gst_no`, `pan_no`, `state`, `city`, `bank_name`, `branch_name`, `ifsc_code`, `account_no`, `address`, `pin_code`, `created_on`, `created_by`, `edited_on`, `edited_by`, `flag`, `approve_flag`, `approve_by`) VALUES
(1, 'Mr.', 'SS Enterprises', 1, 'Satyanarayan Sharma', '2013-03-01', NULL, '9887190883', 1, 'Yes', '08CNJPS4284A1ZT', 'CNJPS4284A', 'Rajasthan', 'Chittorgarh', 'Punjab National Bank', 'Nimbahera', 'PUNB0661300', '6613002100002984', 'Dheenwa', 312601, '2023-03-19 10:49:38', 1, '2023-03-19 16:50:59', 1, 0, 0, 0),
(2, 'Mr.', 'SK Contractor', 2, 'Prahlad Sharma', '2013-03-01', NULL, '9587069721', 1, 'Yes', '08FQEPS9542C1ZI', 'FQEPS9542C', 'Rajasthan', 'Chittorgarh', 'Bank Of Baroda', 'Chikarda', 'BARB0CHIKAR', '16960200000177', 'Dheenwa', 312601, '2023-03-19 10:49:38', 1, '2023-03-19 16:53:37', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `role` varchar(200) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `flag`) VALUES
(1, 'Super Admin', 0),
(2, 'User', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(5) NOT NULL,
  `size` varchar(255) NOT NULL,
  `flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `flag`) VALUES
(1, '20mm', 0),
(2, '40mm', 0),
(3, '0mm', 0),
(4, '60mm', 0),
(5, 'msize', 0),
(6, 'free', 0),
(7, 'Nos', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) NOT NULL,
  `state_name` varchar(300) NOT NULL,
  `state_code` varchar(20) NOT NULL,
  `country_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `state_code`, `country_id`) VALUES
(1, 'Andhra Pradesh', '37', 105),
(2, 'Assam', '18', 105),
(3, 'Arunachal Pradesh', '12', 105),
(4, 'Bihar', '10', 105),
(5, 'Gujarat', '24', 105),
(6, 'Haryana', '06', 105),
(7, 'Himachal Pradesh', '02', 105),
(8, 'Jammu & Kashmir', '01', 105),
(9, 'Karnataka', '29', 105),
(10, 'Kerala', '32', 105),
(11, 'Madhya Pradesh', '23', 105),
(12, 'Maharashtra', '27', 105),
(13, 'Manipur', '14', 105),
(14, 'Meghalaya', '17', 105),
(15, 'Mizoram', '15', 105),
(16, 'Nagaland', '13', 105),
(17, 'Odisha', '21', 105),
(18, 'Punjab', '03', 105),
(19, 'Rajasthan', '08', 105),
(20, 'Sikkim', '11', 105),
(21, 'Tamil Nadu', '33', 105),
(22, 'Tripura', '16', 105),
(23, 'Uttar Pradesh', '09', 105),
(24, 'West Bengal', '19', 105),
(25, 'Delhi', '07', 105),
(26, 'Goa', '30', 105),
(27, 'Puducherry', '34', 105),
(28, 'Lakshadweep', '31', 105),
(29, 'Daman & Diu', '25', 105),
(30, 'Dadra & Nagar Haveli', '26', 105),
(31, 'Chandigarh', '04', 105),
(32, 'Andaman & Nicobar', '35', 105),
(33, 'Uttarakhand', '05', 105),
(34, 'Jharkhand', '20', 105),
(36, 'Telangana', '36', 105),
(37, 'Chhattisgarh', '22', 105),
(38, 'Ladakh', '38', 105);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(20) NOT NULL,
  `subcat_name` varchar(300) NOT NULL,
  `category_id` int(20) NOT NULL,
  `flag` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcat_name`, `category_id`, `flag`) VALUES
(1, 'Nail Art', 10, 0),
(2, 'Mehandi', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` enum('Participant','Visitor') NOT NULL,
  `role_id` int(60) NOT NULL DEFAULT 1,
  `password` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_verify` tinyint(6) NOT NULL,
  `mobile_verify` tinyint(6) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `certificate_name` varchar(255) NOT NULL,
  `compnay_saloon_name` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `owner` enum('Yes','No') NOT NULL,
  `lead_source` varchar(100) NOT NULL,
  `category_type` varchar(100) NOT NULL,
  `area_interest` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `experience_level` varchar(20) NOT NULL,
  `status` tinyint(6) NOT NULL,
  `created_by` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `role_id`, `password`, `name`, `email`, `mobile`, `city`, `state`, `country`, `address`, `email_verify`, `mobile_verify`, `profile_photo`, `certificate_name`, `compnay_saloon_name`, `designation`, `owner`, `lead_source`, `category_type`, `area_interest`, `pincode`, `age`, `gender`, `dob`, `experience_level`, `status`, `created_by`) VALUES
(6, 'Participant', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'jaynat jain', 'jayant@mo.com', '6378884529', '', '', '', 'udaipur', 0, 0, './uploads/user_media/411605011_18386678530071117_7287243113074334683_n2.jpg', '', '', '', 'Yes', '', '', '', 0, '', 'Male', '0000-00-00', '', 0, 2),
(7, 'Participant', 2, '250cf8b51c773f3f8dc8b4be867a9a02', 'Soniya sharma', 'soniya@mou.com', '7777788888', '', '', '', 'dheenwa', 0, 0, 'uploads/user_media/image-12.webp', '', '', '', 'Yes', '', '', '', 0, '', 'Female', '0000-00-00', '', 0, 2),
(8, 'Visitor', 2, '250cf8b51c773f3f8dc8b4be867a9a02', 'bhveru', 'bheru@gmail.com', '1231231233', '', '', '', 'madri', 0, 0, '', '', '', '', 'Yes', '', '', '', 0, '', 'Male', '0000-00-00', '', 0, 2),
(10, 'Participant', 2, '$2y$10$usMbgE6P/oevHD6sBoaLbed9Qym6KF0O0VeGK2.uZOp.sp9CUOqq2', 'prakash', 'prakash@muskowl.com', '9664100138', '', '', '', '', 0, 0, '', '', '', '', 'Yes', '', '', '', 0, '', '', '0000-00-00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_discounts`
--

CREATE TABLE `user_discounts` (
  `id` int(11) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `discount_type` varchar(150) NOT NULL,
  `coupon_code` varchar(200) NOT NULL,
  `discount_value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_ids` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `employee_id`, `role_id`, `menu_ids`) VALUES
(1, NULL, 1, '1,2,3,4,10,8,9,11,12,13,272,271,273,275,276,308,309,310,312,314,303,304,305,306,307,311,316,317,318,319,320'),
(2, NULL, 2, '1,8,9,283,299,300,301,287,288,289,290,298,291,294,297');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks_master`
--
ALTER TABLE `banks_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts_master`
--
ALTER TABLE `discounts_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_history`
--
ALTER TABLE `discount_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `events_master`
--
ALTER TABLE `events_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_sales`
--
ALTER TABLE `item_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dyn_group_id - normal` (`dyn_group_id`);

--
-- Indexes for table `my_firms`
--
ALTER TABLE `my_firms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_discounts`
--
ALTER TABLE `user_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `banks_master`
--
ALTER TABLE `banks_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `discounts_master`
--
ALTER TABLE `discounts_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_history`
--
ALTER TABLE `discount_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events_master`
--
ALTER TABLE `events_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_sales`
--
ALTER TABLE `item_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `my_firms`
--
ALTER TABLE `my_firms`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_discounts`
--
ALTER TABLE `user_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
