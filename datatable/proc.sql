-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 04:49 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proc`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoint_tec_details`
--

CREATE TABLE `appoint_tec_details` (
  `status` int(1) NOT NULL,
  `appointtecdetail_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `user_key` int(11) NOT NULL,
  `chairman_appointtec` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appoint_tec_details`
--

INSERT INTO `appoint_tec_details` (`status`, `appointtecdetail_key`, `project_key`, `user_key`, `chairman_appointtec`) VALUES
(0, 1, 1, 5, 'C'),
(0, 2, 1, 1, 'A'),
(0, 3, 1, 2, 'A'),
(0, 4, 2, 5, 'C'),
(0, 5, 2, 4, 'A'),
(0, 6, 2, 2, 'A'),
(0, 7, 2, 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `direct_item_master`
--

CREATE TABLE `direct_item_master` (
  `status` int(1) NOT NULL,
  `dir_item_key` int(11) NOT NULL,
  `dir_master_key` int(11) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `total_amount` double NOT NULL,
  `vat` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `direct_item_master`
--

INSERT INTO `direct_item_master` (`status`, `dir_item_key`, `dir_master_key`, `item_name`, `qty`, `unit_price`, `total_amount`, `vat`) VALUES
(0, 1, 1, 'Heavy Duty Stapler Machine[Kangaroo 23L17]', 1, 7500, 7500, 0),
(0, 2, 1, 'A4 Paper', 50, 1000, 5000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `direct_purches_master`
--

CREATE TABLE `direct_purches_master` (
  `status` int(1) NOT NULL,
  `direct_mas_key` int(11) NOT NULL,
  `date` date NOT NULL,
  `direct_id` varchar(50) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `supplier_key` int(11) NOT NULL,
  `remove_reason` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `direct_purches_master`
--

INSERT INTO `direct_purches_master` (`status`, `direct_mas_key`, `date`, `direct_id`, `heading`, `supplier_key`, `remove_reason`) VALUES
(0, 1, '2019-06-30', 'UCSC|PROC|D|2019|1', 'SUPPLY AND DELIVERY OF HEAVY DUTY STAPLER MACHINE', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_calender_master`
--

CREATE TABLE `event_calender_master` (
  `event_calender_key` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_calender_master`
--

INSERT INTO `event_calender_master` (`event_calender_key`, `title`, `start`, `end`) VALUES
(5, 'Management Meeting Held on board Room', '2019-07-16 00:00:00', '2019-07-17 00:00:00'),
(6, 'Orientation Programme', '2019-07-14 00:00:00', '2019-07-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ncbsec03_details`
--

CREATE TABLE `ncbsec03_details` (
  `status` int(11) NOT NULL,
  `ncbsec03_details_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `heading_lots` varchar(600) DEFAULT NULL,
  `expreance_yer` varchar(600) DEFAULT NULL,
  `expireance_handle` varchar(600) DEFAULT NULL,
  `tecnical_support` varchar(600) DEFAULT NULL,
  `manufacture_auth` varchar(600) DEFAULT NULL,
  `comp_warranty` varchar(600) DEFAULT NULL,
  `sec4_discount1` varchar(200) DEFAULT NULL,
  `sec4_discount2` varchar(200) DEFAULT NULL,
  `sec5_vatregno` varchar(20) DEFAULT NULL,
  `sec5_authperson` varchar(100) DEFAULT NULL,
  `sec5_issueaddress` varchar(300) DEFAULT NULL,
  `sec5_dteofissue` date DEFAULT NULL,
  `sec5_bidguarenteeno` varchar(15) DEFAULT NULL,
  `sec5_contractor` varchar(100) DEFAULT NULL,
  `sec5_contract` varchar(50) DEFAULT NULL,
  `sec5_invitationbidno` varchar(15) DEFAULT NULL,
  `sec5_amount` double DEFAULT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncbsec03_details`
--

INSERT INTO `ncbsec03_details` (`status`, `ncbsec03_details_key`, `project_key`, `lot_no`, `heading_lots`, `expreance_yer`, `expireance_handle`, `tecnical_support`, `manufacture_auth`, `comp_warranty`, `sec4_discount1`, `sec4_discount2`, `sec5_vatregno`, `sec5_authperson`, `sec5_issueaddress`, `sec5_dteofissue`, `sec5_bidguarenteeno`, `sec5_contractor`, `sec5_contract`, `sec5_invitationbidno`, `sec5_amount`, `sys_enterdte`, `act_person`) VALUES
(0, 1, 1, 1, 'DATA STORAGE SERVER', 'Bidder should have an experience in selling and maintaining similar type [Data Storage server] at least one contract worth of LKR 2.0 million [Please attached document] avoidance during last 03 years.', 'Bidder should have a proven track record in selling and maintaining Data Storage Server for a minimum period of 03 Years.', 'Bidder should provide list of educational/ professional qualifications of the Technical Support Staff.', 'Bidder should provide list of educational/ professional qualifications of the Technical Support Staff.', 'Bidder should have a proven track record in selling and maintaining Data Storage Server for a minimum period of 03 Years.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-29 16:30:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ncbsec45_bid_eveluate_details`
--

CREATE TABLE `ncbsec45_bid_eveluate_details` (
  `status` int(1) NOT NULL,
  `ncbsec45_bid_eveluate_dtlkey` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `supplier_key` int(11) NOT NULL,
  `pre_exami_bidbond` varchar(150) NOT NULL,
  `pre_exami_bidfilled` varchar(150) NOT NULL,
  `pre_exami_priceshedulefill` varchar(150) NOT NULL,
  `pre_exami_manufactureauth` varchar(150) NOT NULL,
  `pre_exami_accpectancedetail` int(2) NOT NULL,
  `pre_exami_reject_bidder` int(11) DEFAULT NULL,
  `pre_exami_reject_bidder_reason` varchar(300) DEFAULT NULL,
  `fin_eveluate_addi_ommi` double DEFAULT NULL,
  `fin_eveluate_bidprice` double DEFAULT NULL,
  `tec_eveluate_discription` varchar(300) DEFAULT NULL,
  `tec_eveluate_responsivness` int(2) DEFAULT NULL,
  `tec_eveluate_rank` int(20) DEFAULT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_peson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncbsec45_bid_eveluate_details`
--

INSERT INTO `ncbsec45_bid_eveluate_details` (`status`, `ncbsec45_bid_eveluate_dtlkey`, `project_key`, `lot_no`, `supplier_key`, `pre_exami_bidbond`, `pre_exami_bidfilled`, `pre_exami_priceshedulefill`, `pre_exami_manufactureauth`, `pre_exami_accpectancedetail`, `pre_exami_reject_bidder`, `pre_exami_reject_bidder_reason`, `fin_eveluate_addi_ommi`, `fin_eveluate_bidprice`, `tec_eveluate_discription`, `tec_eveluate_responsivness`, `tec_eveluate_rank`, `sys_enterdte`, `act_peson`) VALUES
(0, 1, 1, 1, 1, 'Yes', 'Yes', 'Yes', 'No', 1, NULL, NULL, 0, 40000, 'Not Complied Max Turbo Frequency â€“ The UCSC has requested 4GHz Max Turbo Frequency. But this bidder    has  provided 3.7 GHz Max turbo Frequency.', 1, 1, '2019-06-29 16:57:00', 2),
(0, 2, 1, 1, 2, 'Yes', 'No ', 'No ', 'No', 0, 1, 'Incomplete Documents', NULL, NULL, NULL, NULL, NULL, '2019-06-29 19:41:48', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ncbsec45_initial_item_details`
--

CREATE TABLE `ncbsec45_initial_item_details` (
  `status` int(1) NOT NULL,
  `ncbsec45_ini_item_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `item_nme` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL,
  `bidbond_amount` double NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncbsec45_initial_item_details`
--

INSERT INTO `ncbsec45_initial_item_details` (`status`, `ncbsec45_ini_item_key`, `project_key`, `lot_no`, `item_nme`, `qty`, `bidbond_amount`, `sys_enterdte`, `act_person`) VALUES
(0, 1, 1, 1, 'DATA STORAGE SERVER', 1, 50000, '2019-06-29 16:35:02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ncbsec45_itemspec_details`
--

CREATE TABLE `ncbsec45_itemspec_details` (
  `status` int(1) NOT NULL,
  `ncbsec45_itemspec_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `ncbsec45_item_key` int(11) NOT NULL,
  `specification_detail` varchar(300) NOT NULL,
  `requirement` varchar(600) NOT NULL,
  `bidders_responce` int(2) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncbsec45_itemspec_details`
--

INSERT INTO `ncbsec45_itemspec_details` (`status`, `ncbsec45_itemspec_key`, `project_key`, `lot_no`, `ncbsec45_item_key`, `specification_detail`, `requirement`, `bidders_responce`, `sys_enterdte`, `act_person`) VALUES
(0, 1, 1, 1, 1, 'RAM', '1 GB or more', 0, '2019-06-29 16:46:25', 2),
(0, 2, 1, 1, 1, 'Hard Disk', '500 GB or more', 0, '2019-06-29 16:46:25', 2),
(0, 3, 1, 1, 1, 'CPU', 'I 3  3rd Gen', 0, '2019-06-29 16:46:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ncbsec45_item_bid_details`
--

CREATE TABLE `ncbsec45_item_bid_details` (
  `status` int(1) NOT NULL,
  `ncbsec45_itembid_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `supplier_key` int(11) NOT NULL,
  `item_key` int(11) NOT NULL,
  `qty` double NOT NULL,
  `unit_price_withoutvat` double NOT NULL,
  `unit_price_withvat` double NOT NULL,
  `total_price_withvat` double NOT NULL,
  `total_price_withoutvat` double NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncbsec45_item_bid_details`
--

INSERT INTO `ncbsec45_item_bid_details` (`status`, `ncbsec45_itembid_key`, `project_key`, `lot_no`, `supplier_key`, `item_key`, `qty`, `unit_price_withoutvat`, `unit_price_withvat`, `total_price_withvat`, `total_price_withoutvat`, `sys_enterdte`, `act_person`) VALUES
(0, 1, 1, 1, 1, 1, 1, 40000, 45000, 45000, 40000, '2019-06-29 16:50:33', 2),
(0, 2, 1, 1, 2, 1, 1, 48000, 50000, 50000, 48000, '2019-06-29 16:50:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ncb_details`
--

CREATE TABLE `ncb_details` (
  `status` int(11) NOT NULL,
  `ncb_detail_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `procument_title` varchar(500) DEFAULT NULL,
  `sec2_itb1_1` varchar(200) DEFAULT NULL,
  `sec2_itb1_1_tenderno` varchar(70) DEFAULT NULL,
  `sec2_itb2_1` varchar(100) DEFAULT NULL,
  `sec2_itb4_4` varchar(50) DEFAULT NULL,
  `sec2_itb7_1_attention` varchar(100) DEFAULT NULL,
  `sec2_itb7_1_address` varchar(200) DEFAULT NULL,
  `sec2_itb7_1_telephone` varchar(150) DEFAULT NULL,
  `sec2_itb7_1_facimaileno` varchar(100) DEFAULT NULL,
  `sec2_itb7_1_Eelectornicmail` varchar(100) DEFAULT NULL,
  `no_of_lots` int(11) NOT NULL,
  `sec2_itb11_1e` varchar(300) DEFAULT NULL,
  `sec2_itb14_3` varchar(300) DEFAULT NULL,
  `sec2_itb15_1` varchar(300) DEFAULT NULL,
  `sec2_itb17_3` varchar(300) DEFAULT NULL,
  `sec2_itb18_1b` varchar(300) DEFAULT NULL,
  `sec2_itb19_1` varchar(300) DEFAULT NULL,
  `sec2_itb20_2` varchar(300) DEFAULT NULL,
  `sec2_itb20_2_date` varchar(10) DEFAULT NULL,
  `sec2_itb22_2c` varchar(300) DEFAULT NULL,
  `sec2_itb23_1_date` varchar(10) DEFAULT NULL,
  `sec2_itb23_1_time` varchar(10) DEFAULT NULL,
  `sec2_itb26_1_address` varchar(300) DEFAULT NULL,
  `sec2_itb26_1_date` varchar(300) DEFAULT NULL,
  `sec2_itb26_1_time` varchar(300) DEFAULT NULL,
  `sec2_itb35_4` varchar(400) DEFAULT NULL,
  `sec2_itb35_5` varchar(400) DEFAULT NULL,
  `sec3_fincapable` varchar(200) DEFAULT NULL,
  `sec4_dte` date DEFAULT NULL,
  `sec4_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncb_details`
--

INSERT INTO `ncb_details` (`status`, `ncb_detail_key`, `project_key`, `procument_title`, `sec2_itb1_1`, `sec2_itb1_1_tenderno`, `sec2_itb2_1`, `sec2_itb4_4`, `sec2_itb7_1_attention`, `sec2_itb7_1_address`, `sec2_itb7_1_telephone`, `sec2_itb7_1_facimaileno`, `sec2_itb7_1_Eelectornicmail`, `no_of_lots`, `sec2_itb11_1e`, `sec2_itb14_3`, `sec2_itb15_1`, `sec2_itb17_3`, `sec2_itb18_1b`, `sec2_itb19_1`, `sec2_itb20_2`, `sec2_itb20_2_date`, `sec2_itb22_2c`, `sec2_itb23_1_date`, `sec2_itb23_1_time`, `sec2_itb26_1_address`, `sec2_itb26_1_date`, `sec2_itb26_1_time`, `sec2_itb35_4`, `sec2_itb35_5`, `sec3_fincapable`, `sec4_dte`, `sec4_no`) VALUES
(0, 1, 1, 'SUPPLY, DELIVERY, INSTALLATION, COMMISSIONING, TESTING AND  MAINTENANCE OF DATA STORAGE SERVER ', 'GENERAL', 'UCSC/PROC/G/2019/003', 'GOSL', 'Allowed', 'Assistant Network Manager', 'Network Operations Centre\r\nUniversity of Colombo School of Computing\r\n No 35 Reid Avenue Colombo 00700.', '011 215 8925', '011 2 587 239', 'proc@ucsc.cmb.ac.lk', 1, 'Bidder should have a proven record of accomplishment in selling and maintaining Data Storage Server for a minimum period of 03 Years', 'The Bidders should quote for Total Lot. The bids will be evaluated only whole lot basis. Bidder shall not be allowed to quote part of the bid', 'Sri Lankan Rupees Only', '05 Years', 'Required', '2019-06-28', '50000', '2019-06-28', 'SUPPLY, DELIVERY, INSTALLATION, COMMISSIONING, TESTING AND MAINTENANCE OF DATA STORAGE SERVER', '2019-06-28', '14:30', 'Board Room â€“ 03rd Floor,\r\nUniversity Of Colombo School Of Computing\r\nNo 35 Reid Avenue Colombo 00700.\r\n', '2019-06-28', 'Immediately after the bid closing time', 'Commercial Qualification', 'Bidders should quote for Total Lot. (Refer to Section III Evaluation and Qualification Criteria, for the evaluation methodology, if appropriate)', 'Provide Copies of Year 2016,  2017 & 2018 Audited Financial Statements', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ncb_postqulification_details`
--

CREATE TABLE `ncb_postqulification_details` (
  `status` int(1) NOT NULL,
  `ncb_postqulifidetail_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `supplier_key` int(11) NOT NULL,
  `ncb_master_key` int(11) NOT NULL,
  `qulification` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncb_postqulification_details`
--

INSERT INTO `ncb_postqulification_details` (`status`, `ncb_postqulifidetail_key`, `project_key`, `lot_no`, `supplier_key`, `ncb_master_key`, `qulification`) VALUES
(0, 1, 1, 1, 1, 1, '6 years'),
(0, 2, 1, 1, 1, 2, 'Yes'),
(0, 3, 1, 1, 1, 3, 'Yes'),
(0, 4, 1, 1, 1, 4, 'Yes'),
(0, 5, 1, 1, 1, 5, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `ncb_postqulification_master`
--

CREATE TABLE `ncb_postqulification_master` (
  `status` int(2) NOT NULL,
  `ncb_postqulifimas_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `lot_no` int(3) NOT NULL,
  `post_qulified_detail` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ncb_postqulification_master`
--

INSERT INTO `ncb_postqulification_master` (`status`, `ncb_postqulifimas_key`, `project_key`, `lot_no`, `post_qulified_detail`) VALUES
(0, 1, 1, 1, 'Vender should have a proven track record in selling and maintaining supply, delivery, commissioning of laptop computers, for a minimum period of 08 years.'),
(0, 2, 1, 1, 'Vender should have an experience in selling and  maintaining similar type (laptop computers) at least  one contract worth of  05 million.'),
(0, 3, 1, 1, '05 year on site island wide from the date of supply. Warranty certificate should be provided on delivery. Replacement machine should provide during repairs.'),
(0, 4, 1, 1, 'Vendors should provide technical support staff and professional staff details'),
(0, 5, 1, 1, 'Provide Copies of Past 3yeras Audited Financial Accounts');

-- --------------------------------------------------------

--
-- Table structure for table `project_master`
--

CREATE TABLE `project_master` (
  `status` int(1) NOT NULL,
  `projmas_key` int(11) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `project_nme` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  `bid_type` varchar(80) NOT NULL,
  `expire_dte` date NOT NULL,
  `exp_time` time NOT NULL,
  `valueofbid_sec` double NOT NULL,
  `remark` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL,
  `remove_reason` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_master`
--

INSERT INTO `project_master` (`status`, `projmas_key`, `project_id`, `project_nme`, `description`, `bid_type`, `expire_dte`, `exp_time`, `valueofbid_sec`, `remark`, `sys_enterdte`, `act_person`, `remove_reason`) VALUES
(0, 1, 'UCSC|PROC|G|2019|1', 'SUPPLY, DELIVERY, INSTALLATION, COMMISSIONING, TESTING & MAINTENANCE OF DATA STORAGE SERVER', 'DATA STORAGE SERVER', 'NCB', '2019-06-28', '12:00:00', 50000, '', '2019-06-29 13:10:53', 2, NULL),
(0, 2, 'UCSC|PROC|G|2019|2', 'INVITATION OF QUOTATIONS FOR SUPPLY, DELIVERY MAINTAINING OF LAPTOP COMPUTERS', 'Laptop Computers', 'Shopping', '2019-09-13', '15:30:00', 6000, '', '2019-06-30 08:23:40', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_bid_eveluate_details`
--

CREATE TABLE `shopping_bid_eveluate_details` (
  `status` int(1) NOT NULL,
  `shp_bid_eveluate_dtlkey` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `supplier_key` int(11) NOT NULL,
  `lowest_status` int(11) DEFAULT NULL,
  `reject_reason` varchar(300) DEFAULT NULL,
  `reject_status` int(11) DEFAULT NULL,
  `brand` varchar(300) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `reason_recommended` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_bid_eveluate_details`
--

INSERT INTO `shopping_bid_eveluate_details` (`status`, `shp_bid_eveluate_dtlkey`, `project_key`, `supplier_key`, `lowest_status`, `reject_reason`, `reject_status`, `brand`, `rank`, `reason_recommended`) VALUES
(0, 1, 2, 2, NULL, NULL, NULL, 'Lenovo', 1, 'Successfully Complete Bid'),
(0, 2, 2, 3, NULL, NULL, NULL, '', 3, NULL),
(0, 3, 2, 1, 1, 'Not Successfully Bid', NULL, 'HP', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_details`
--

CREATE TABLE `shopping_details` (
  `status` int(11) NOT NULL,
  `shopping_detail_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `purchser_nme_1` varchar(150) DEFAULT NULL,
  `purchser_address_1` varchar(300) DEFAULT NULL,
  `shp_5_1` varchar(300) DEFAULT NULL,
  `validdte_8` date DEFAULT NULL,
  `deadlinedte_11` date DEFAULT NULL,
  `deadlinetime_11` varchar(50) DEFAULT NULL,
  `bidopenplc_13` varchar(300) DEFAULT NULL,
  `amountbid_21` double DEFAULT NULL,
  `bidsecvalid_21` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_details`
--

INSERT INTO `shopping_details` (`status`, `shopping_detail_key`, `project_key`, `purchser_nme_1`, `purchser_address_1`, `shp_5_1`, `validdte_8`, `deadlinedte_11`, `deadlinetime_11`, `bidopenplc_13`, `amountbid_21`, `bidsecvalid_21`) VALUES
(0, 1, 2, 'University of Colombo School of Computing', 'No 35 Reid Avenue Colombo 00700.', 'Should be quote for total Items', '2019-05-09', '2019-05-09', '15:10', 'ADMTC Lab â€“ 03rd Floor,\r\nUniversity Of Colombo School Of Computing\r\nNo 35 Reid Avenue Colombo 00700.', 80000, '2019-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_initial_item_details`
--

CREATE TABLE `shopping_initial_item_details` (
  `status` int(11) NOT NULL,
  `shopping_ini_item_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `item_nme` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL,
  `completion_dte` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_initial_item_details`
--

INSERT INTO `shopping_initial_item_details` (`status`, `shopping_ini_item_key`, `project_key`, `item_nme`, `qty`, `completion_dte`) VALUES
(0, 1, 2, 'Laptops Computers', 4, '2 - 3 Weeks'),
(0, 2, 2, 'Key Boardd', 50, '2 - 3 Weeks');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_itemspec_details`
--

CREATE TABLE `shopping_itemspec_details` (
  `status` int(1) NOT NULL,
  `shopping_itemspec_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `item_key` int(11) NOT NULL,
  `specification_detail` varchar(300) DEFAULT NULL,
  `requirement` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_itemspec_details`
--

INSERT INTO `shopping_itemspec_details` (`status`, `shopping_itemspec_key`, `project_key`, `item_key`, `specification_detail`, `requirement`, `sys_enterdte`, `act_person`) VALUES
(0, 1, 2, 1, 'RAM', '1 GB or more', '2019-06-30 12:07:18', 2),
(0, 2, 2, 1, 'Hard Disk', '500 GB or more', '2019-06-30 12:07:18', 2),
(0, 3, 2, 1, 'CPU', 'I 3  3rd Gen', '2019-06-30 12:07:18', 2),
(0, 4, 2, 2, 'Language', 'English', '2019-06-30 12:07:46', 2),
(0, 5, 2, 2, 'Color', 'Black', '2019-06-30 12:07:46', 2),
(1, 6, 2, 2, 'CPU', 'I 3  3rd Gen', '2019-06-30 12:07:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_item_bid_details`
--

CREATE TABLE `shopping_item_bid_details` (
  `status` int(1) NOT NULL,
  `shopping_itembid_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `supplier_key` int(11) NOT NULL,
  `item_key` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price_withoutvat` double DEFAULT NULL,
  `unit_price_withvat` double DEFAULT NULL,
  `total_price_withvat` double DEFAULT NULL,
  `total_price_withoutvat` double DEFAULT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_item_bid_details`
--

INSERT INTO `shopping_item_bid_details` (`status`, `shopping_itembid_key`, `project_key`, `supplier_key`, `item_key`, `qty`, `unit_price_withoutvat`, `unit_price_withvat`, `total_price_withvat`, `total_price_withoutvat`, `sys_enterdte`, `act_person`) VALUES
(0, 1, 2, 2, 1, 4, 60000, 70000, 420000, 240000, '2019-06-30 14:03:59', 2),
(0, 2, 2, 2, 2, 50, 400, 500, 25000, 500000, '2019-06-30 14:04:11', 2),
(0, 3, 2, 1, 2, 4, 80000, 100000, 400000, 320000, '2019-06-30 14:05:19', 2),
(0, 4, 2, 1, 1, 50, 500, 600, 30000, 25000, '2019-06-30 14:05:49', 2),
(0, 5, 2, 3, 1, 4, 20000, 30000, 120000, 800000, '2019-06-30 17:41:57', 2),
(0, 6, 2, 3, 2, 50, 100, 200, 10000, 5000, '2019-06-30 17:42:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_master`
--

CREATE TABLE `supplier_master` (
  `status` varchar(2) NOT NULL,
  `supplierms_key` int(50) NOT NULL,
  `registration_no` varchar(150) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `tp_no` varchar(10) DEFAULT NULL,
  `fax_no` varchar(20) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `act_person` int(50) NOT NULL,
  `sysenter_dte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_master`
--

INSERT INTO `supplier_master` (`status`, `supplierms_key`, `registration_no`, `supplier_name`, `address`, `tp_no`, `fax_no`, `email_address`, `act_person`, `sysenter_dte`) VALUES
('0', 1, 'A001', 'Damro Group', '141,sdasd,asdd,sad', '0115555555', '4664', 'Damro@slt.net', 0, '2018-12-31 14:04:09'),
('0', 2, 'A002', 'Unidil Packaging ', '141,Gampaha road, Delgoda1', '0113333333', '4334', 'unidil@slt.net', 0, '2018-12-31 14:05:23'),
('0', 3, 'SSS/001', 'Link Natural', '145,Gampaha Road.Delgoda', '0711111888', '0712226666', 'link@gmai.com', 2, '2019-06-30 17:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `upload_documents`
--

CREATE TABLE `upload_documents` (
  `status` int(1) NOT NULL,
  `uploaddoc_key` int(11) NOT NULL,
  `project_key` int(11) NOT NULL,
  `doc_type` varchar(200) NOT NULL,
  `doc_nme` varchar(200) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sys_actperson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upload_documents`
--

INSERT INTO `upload_documents` (`status`, `uploaddoc_key`, `project_key`, `doc_type`, `doc_nme`, `sys_enterdte`, `sys_actperson`) VALUES
(0, 1, 2, 'Shopping_Bidding_Document', '2-Shopping-Bidding-Document.docx', '2019-06-30 12:25:03', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `status` int(1) NOT NULL,
  `useractivity_key` int(11) NOT NULL,
  `boqmas_key` int(11) NOT NULL,
  `user_key` int(11) NOT NULL,
  `activity` varchar(150) NOT NULL,
  `sys_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`status`, `useractivity_key`, `boqmas_key`, `user_key`, `activity`, `sys_time`) VALUES
(0, 1, 1, 3, 'Entered', '2019-01-22 14:28:58'),
(0, 2, 2, 3, 'Entered', '2019-01-22 14:29:37'),
(0, 3, 1, 3, 'confirm', '2019-01-22 14:34:55'),
(0, 4, 2, 3, 'confirm', '2019-01-22 14:34:55'),
(0, 5, 1, 2, 'confirm', '2019-01-22 14:37:59'),
(0, 6, 2, 2, 'confirm', '2019-01-22 14:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `status` int(2) NOT NULL,
  `user_key` int(11) NOT NULL,
  `emp_no` varchar(150) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `department` varchar(150) NOT NULL,
  `committee` varchar(200) NOT NULL,
  `user_level` varchar(20) NOT NULL,
  `sys_regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`status`, `user_key`, `emp_no`, `first_name`, `last_name`, `designation`, `user_name`, `password`, `department`, `committee`, `user_level`, `sys_regdate`) VALUES
(0, 1, '123', 'Sajith', 'Fernando', 'Accountant', '12213', '202cb962ac59075b964b07152d234b70', 'Finance', 'Technical Evaluation Committee', 'Authorized', '2018-12-31'),
(0, 2, '1366', 'Lahiru', 'Chathuranga', 'Sys Admin', 'lahiru', '202cb962ac59075b964b07152d234b70', 'Procurement', 'None', 'Admin', '2018-12-31'),
(0, 3, '456', 'Lahiru', 'Kasun', 'DEO', 'lahiru1', '202cb962ac59075b964b07152d234b70', 'IT', 'None', 'Data Entry', '2018-12-31'),
(0, 4, '258', 'Lakshan', 'Sandaruwan', 'Tec. Officer', 'lakshan', '202cb962ac59075b964b07152d234b70', 'Administration', 'None', 'View Only', '2018-12-31'),
(0, 5, '1174', 'Harshana', 'Jayasekara', 'Sys Admin', 'Harshana', '202cb962ac59075b964b07152d234b70', 'Procurement', 'None', 'Admin', '2018-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoint_tec_details`
--
ALTER TABLE `appoint_tec_details`
  ADD PRIMARY KEY (`appointtecdetail_key`);

--
-- Indexes for table `direct_item_master`
--
ALTER TABLE `direct_item_master`
  ADD PRIMARY KEY (`dir_item_key`);

--
-- Indexes for table `direct_purches_master`
--
ALTER TABLE `direct_purches_master`
  ADD PRIMARY KEY (`direct_mas_key`);

--
-- Indexes for table `event_calender_master`
--
ALTER TABLE `event_calender_master`
  ADD PRIMARY KEY (`event_calender_key`);

--
-- Indexes for table `ncbsec03_details`
--
ALTER TABLE `ncbsec03_details`
  ADD PRIMARY KEY (`ncbsec03_details_key`);

--
-- Indexes for table `ncbsec45_bid_eveluate_details`
--
ALTER TABLE `ncbsec45_bid_eveluate_details`
  ADD PRIMARY KEY (`ncbsec45_bid_eveluate_dtlkey`);

--
-- Indexes for table `ncbsec45_initial_item_details`
--
ALTER TABLE `ncbsec45_initial_item_details`
  ADD PRIMARY KEY (`ncbsec45_ini_item_key`);

--
-- Indexes for table `ncbsec45_itemspec_details`
--
ALTER TABLE `ncbsec45_itemspec_details`
  ADD PRIMARY KEY (`ncbsec45_itemspec_key`);

--
-- Indexes for table `ncbsec45_item_bid_details`
--
ALTER TABLE `ncbsec45_item_bid_details`
  ADD PRIMARY KEY (`ncbsec45_itembid_key`);

--
-- Indexes for table `ncb_details`
--
ALTER TABLE `ncb_details`
  ADD PRIMARY KEY (`ncb_detail_key`);

--
-- Indexes for table `ncb_postqulification_details`
--
ALTER TABLE `ncb_postqulification_details`
  ADD PRIMARY KEY (`ncb_postqulifidetail_key`);

--
-- Indexes for table `ncb_postqulification_master`
--
ALTER TABLE `ncb_postqulification_master`
  ADD PRIMARY KEY (`ncb_postqulifimas_key`);

--
-- Indexes for table `project_master`
--
ALTER TABLE `project_master`
  ADD PRIMARY KEY (`projmas_key`);

--
-- Indexes for table `shopping_bid_eveluate_details`
--
ALTER TABLE `shopping_bid_eveluate_details`
  ADD PRIMARY KEY (`shp_bid_eveluate_dtlkey`);

--
-- Indexes for table `shopping_details`
--
ALTER TABLE `shopping_details`
  ADD PRIMARY KEY (`shopping_detail_key`);

--
-- Indexes for table `shopping_initial_item_details`
--
ALTER TABLE `shopping_initial_item_details`
  ADD PRIMARY KEY (`shopping_ini_item_key`);

--
-- Indexes for table `shopping_itemspec_details`
--
ALTER TABLE `shopping_itemspec_details`
  ADD PRIMARY KEY (`shopping_itemspec_key`);

--
-- Indexes for table `shopping_item_bid_details`
--
ALTER TABLE `shopping_item_bid_details`
  ADD PRIMARY KEY (`shopping_itembid_key`);

--
-- Indexes for table `supplier_master`
--
ALTER TABLE `supplier_master`
  ADD PRIMARY KEY (`supplierms_key`);

--
-- Indexes for table `upload_documents`
--
ALTER TABLE `upload_documents`
  ADD PRIMARY KEY (`uploaddoc_key`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`useractivity_key`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoint_tec_details`
--
ALTER TABLE `appoint_tec_details`
  MODIFY `appointtecdetail_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `direct_item_master`
--
ALTER TABLE `direct_item_master`
  MODIFY `dir_item_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `direct_purches_master`
--
ALTER TABLE `direct_purches_master`
  MODIFY `direct_mas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event_calender_master`
--
ALTER TABLE `event_calender_master`
  MODIFY `event_calender_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ncbsec03_details`
--
ALTER TABLE `ncbsec03_details`
  MODIFY `ncbsec03_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ncbsec45_bid_eveluate_details`
--
ALTER TABLE `ncbsec45_bid_eveluate_details`
  MODIFY `ncbsec45_bid_eveluate_dtlkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ncbsec45_initial_item_details`
--
ALTER TABLE `ncbsec45_initial_item_details`
  MODIFY `ncbsec45_ini_item_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ncbsec45_itemspec_details`
--
ALTER TABLE `ncbsec45_itemspec_details`
  MODIFY `ncbsec45_itemspec_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ncbsec45_item_bid_details`
--
ALTER TABLE `ncbsec45_item_bid_details`
  MODIFY `ncbsec45_itembid_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ncb_details`
--
ALTER TABLE `ncb_details`
  MODIFY `ncb_detail_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ncb_postqulification_details`
--
ALTER TABLE `ncb_postqulification_details`
  MODIFY `ncb_postqulifidetail_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ncb_postqulification_master`
--
ALTER TABLE `ncb_postqulification_master`
  MODIFY `ncb_postqulifimas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_master`
--
ALTER TABLE `project_master`
  MODIFY `projmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shopping_bid_eveluate_details`
--
ALTER TABLE `shopping_bid_eveluate_details`
  MODIFY `shp_bid_eveluate_dtlkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shopping_details`
--
ALTER TABLE `shopping_details`
  MODIFY `shopping_detail_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shopping_initial_item_details`
--
ALTER TABLE `shopping_initial_item_details`
  MODIFY `shopping_ini_item_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shopping_itemspec_details`
--
ALTER TABLE `shopping_itemspec_details`
  MODIFY `shopping_itemspec_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shopping_item_bid_details`
--
ALTER TABLE `shopping_item_bid_details`
  MODIFY `shopping_itembid_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `supplier_master`
--
ALTER TABLE `supplier_master`
  MODIFY `supplierms_key` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `upload_documents`
--
ALTER TABLE `upload_documents`
  MODIFY `uploaddoc_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `useractivity_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
