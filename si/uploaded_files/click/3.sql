-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 04:13 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cle_client`
--

CREATE TABLE IF NOT EXISTS `cle_client` (
  `cl_clid` varchar(10) NOT NULL,
  `cl_clname` varchar(50) NOT NULL,
  `cl_contact1` int(20) DEFAULT NULL,
  `cl_contact2` int(20) DEFAULT NULL,
  `cl_phone1` int(20) NOT NULL,
  `cl_phone2` int(20) DEFAULT NULL,
  `cl_email1` varchar(20) NOT NULL,
  `cl_email2` varchar(20) DEFAULT NULL,
  `cl_fax1` int(15) DEFAULT NULL,
  `cl_fax2` int(15) DEFAULT NULL,
  `cl_edtm` date DEFAULT NULL,
  `cl_eby` varchar(50) DEFAULT NULL,
  `cl_mdtm` date DEFAULT NULL,
  `cl_mby` varchar(50) DEFAULT NULL,
  `cl_active` varchar(3) DEFAULT NULL,
  `cl_cdtm` date DEFAULT NULL,
  `cl_cby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cl_clid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='client table';

-- --------------------------------------------------------

--
-- Table structure for table `con_contractors`
--

CREATE TABLE IF NOT EXISTS `con_contractors` (
  `co_clid` varchar(10) NOT NULL,
  `co_clname` varchar(50) NOT NULL,
  `co_contact1` varchar(50) DEFAULT NULL,
  `co_contact2` varchar(50) DEFAULT NULL,
  `co_phone1` int(20) NOT NULL,
  `co_phone2` int(20) DEFAULT NULL,
  `co_email1` varchar(30) NOT NULL,
  `co_email2` int(30) DEFAULT NULL,
  `co_fax1` int(20) DEFAULT NULL,
  `co_fax2` int(20) DEFAULT NULL,
  `co_edtm` date DEFAULT NULL,
  `co_eby` varchar(50) DEFAULT NULL,
  `co_mdtm` date DEFAULT NULL,
  `co_mby` varchar(50) DEFAULT NULL,
  `co_active` varchar(3) DEFAULT NULL,
  `co_cdtm` date DEFAULT NULL,
  `co_cby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`co_clid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='contractor table';

-- --------------------------------------------------------

--
-- Table structure for table `fid_file`
--

CREATE TABLE IF NOT EXISTS `fid_file` (
  `fi_fiid` varchar(10) NOT NULL,
  `fi_prid` varchar(10) NOT NULL,
  `fi_woid` varchar(10) NOT NULL,
  `fi_poid` varchar(10) NOT NULL,
  `fi_stid` varchar(10) NOT NULL,
  `fi_usid` varchar(10) NOT NULL,
  `fi_quid` varchar(10) NOT NULL,
  `fi_path` varchar(300) DEFAULT NULL,
  `fi_edtm` date DEFAULT NULL,
  `fi_eby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fi_fiid`),
  KEY `fi_prid` (`fi_prid`),
  KEY `fi_prid_2` (`fi_prid`),
  KEY `fi_woid` (`fi_woid`),
  KEY `fi_stid` (`fi_stid`),
  KEY `fi_usid` (`fi_usid`),
  KEY `fi_quid` (`fi_quid`),
  KEY `fi_poid` (`fi_poid`),
  KEY `fi_stid_2` (`fi_stid`),
  KEY `fi_woid_2` (`fi_woid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='file table';

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `or_id` int(11) NOT NULL AUTO_INCREMENT,
  `or_prjname` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `or_prid` varchar(15) DEFAULT NULL,
  `or_wopo_cid` varchar(15) DEFAULT NULL,
  `or_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`or_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `or_prjname`, `or_prid`, `or_wopo_cid`, `or_status`) VALUES
(1, 'Project1', 'P-10001', 'WC-00001', 'Request for quotes'),
(2, 'Project1', 'P-10001', 'WC-00003', 'Review the quotes');

-- --------------------------------------------------------

--
-- Table structure for table `pod_order`
--

CREATE TABLE IF NOT EXISTS `pod_order` (
  `po_poid` varchar(10) NOT NULL,
  `po_pocid` varchar(15) DEFAULT NULL,
  `po_prid` varchar(10) DEFAULT NULL,
  `po_ponum` varchar(20) DEFAULT NULL,
  `po_veid` varchar(10) DEFAULT NULL,
  `po_quoteid` varchar(10) DEFAULT NULL,
  `po_quoteid1` varchar(10) DEFAULT NULL,
  `po_quoteid2` varchar(10) DEFAULT NULL,
  `po_quoteid3` varchar(10) DEFAULT NULL,
  `po_podesc` varchar(100) DEFAULT NULL,
  `po_poquantity` int(11) DEFAULT NULL,
  `po_porate` int(3) DEFAULT NULL,
  `po_rateq1` int(30) DEFAULT NULL,
  `po_rateq2` int(30) DEFAULT NULL,
  `po_rateq3` int(30) DEFAULT NULL,
  `po_discount` int(10) DEFAULT NULL,
  `po_tax` int(3) DEFAULT NULL,
  `po_poamount` int(10) DEFAULT NULL,
  `po_pscomment` varchar(100) DEFAULT NULL,
  `po_pspost` varchar(50) DEFAULT NULL,
  `po_psdate` date DEFAULT NULL,
  `po_pmcomment` varchar(50) DEFAULT NULL,
  `po_pmpost` varchar(50) DEFAULT NULL,
  `po_pmdate` date DEFAULT NULL,
  `po_fscomment` varchar(50) DEFAULT NULL,
  `po_fspost` varchar(50) DEFAULT NULL,
  `po_fsdate` date DEFAULT NULL,
  `po_mdcomment` varchar(50) DEFAULT NULL,
  `po_mdpost` varchar(50) DEFAULT NULL,
  `po_mddate` date DEFAULT NULL,
  `po_pscomment2` varchar(11) DEFAULT NULL,
  `po_pspost2` int(50) DEFAULT NULL,
  `po_psdate2` date DEFAULT NULL,
  `po_approval` varchar(5) DEFAULT NULL,
  `po_adtm` varchar(50) DEFAULT NULL,
  `po_aby` varchar(100) DEFAULT NULL,
  `po_edtm` date DEFAULT NULL,
  `po_eby` varchar(50) DEFAULT NULL,
  `po_mdtm` date DEFAULT NULL,
  `po_mby` varchar(50) DEFAULT NULL,
  `po_active` varchar(3) DEFAULT NULL,
  `po_cdtm` date DEFAULT NULL,
  `po_cby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`po_poid`),
  KEY `po_prid` (`po_prid`),
  KEY `po_veid` (`po_veid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='product order';

--
-- Dumping data for table `pod_order`
--

INSERT INTO `pod_order` (`po_poid`, `po_pocid`, `po_prid`, `po_ponum`, `po_veid`, `po_quoteid`, `po_quoteid1`, `po_quoteid2`, `po_quoteid3`, `po_podesc`, `po_poquantity`, `po_porate`, `po_rateq1`, `po_rateq2`, `po_rateq3`, `po_discount`, `po_tax`, `po_poamount`, `po_pscomment`, `po_pspost`, `po_psdate`, `po_pmcomment`, `po_pmpost`, `po_pmdate`, `po_fscomment`, `po_fspost`, `po_fsdate`, `po_mdcomment`, `po_mdpost`, `po_mddate`, `po_pscomment2`, `po_pspost2`, `po_psdate2`, `po_approval`, `po_adtm`, `po_aby`, `po_edtm`, `po_eby`, `po_mdtm`, `po_mby`, `po_active`, `po_cdtm`, `po_cby`) VALUES
('PO-00001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'helo', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carpenter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('PO-00002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'po', 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carpenter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('PO-00003', 'PC-00001', 'P-10001', NULL, NULL, NULL, NULL, NULL, NULL, 'jikjh', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carpenter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('PO-00004', 'PC-00001', 'P-10001', NULL, NULL, NULL, NULL, NULL, NULL, 'ki', 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carpenter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prd_product`
--

CREATE TABLE IF NOT EXISTS `prd_product` (
  `pd_pdid` varchar(10) NOT NULL,
  `pd_pddesc` varchar(100) DEFAULT NULL,
  `pd_edtm` date DEFAULT NULL,
  `pd_eby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pd_pdid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='product table';

-- --------------------------------------------------------

--
-- Table structure for table `prj_project`
--

CREATE TABLE IF NOT EXISTS `prj_project` (
  `pr_prid` varchar(10) NOT NULL,
  `pr_prname` varchar(20) NOT NULL,
  `pr_ddate` date DEFAULT NULL,
  `pr_odate` date DEFAULT NULL,
  `pr_prdesc` varchar(100) DEFAULT NULL,
  `pr_prnotes` varchar(100) DEFAULT NULL,
  `pr_md` varchar(50) DEFAULT NULL,
  `pr_pm` varchar(50) DEFAULT NULL,
  `pr_pi` varchar(50) DEFAULT NULL,
  `pr_ps` varchar(50) DEFAULT NULL,
  `pr_fs` varchar(50) DEFAULT NULL,
  `pr_si` varchar(50) DEFAULT NULL,
  `pr_approval` varchar(3) DEFAULT NULL,
  `pr_adtm` date DEFAULT NULL,
  `pr_aby` varchar(50) DEFAULT NULL,
  `pr_areason` varchar(100) DEFAULT NULL,
  `pr_edtm` date DEFAULT NULL,
  `pr_eby` varchar(50) DEFAULT NULL,
  `pr_mdtm` int(11) DEFAULT NULL,
  `pr_mby` int(11) DEFAULT NULL,
  `pr_active` varchar(3) DEFAULT NULL,
  `pr_cdtm` date DEFAULT NULL,
  `pr_cby` varchar(50) DEFAULT NULL,
  `pr_clid` varchar(10) DEFAULT NULL,
  `pr_coid` varchar(10) DEFAULT NULL,
  `pr_prnum` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pr_prid`),
  KEY `pr_coid` (`pr_coid`),
  KEY `pr_clid` (`pr_clid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='project table';

--
-- Dumping data for table `prj_project`
--

INSERT INTO `prj_project` (`pr_prid`, `pr_prname`, `pr_ddate`, `pr_odate`, `pr_prdesc`, `pr_prnotes`, `pr_md`, `pr_pm`, `pr_pi`, `pr_ps`, `pr_fs`, `pr_si`, `pr_approval`, `pr_adtm`, `pr_aby`, `pr_areason`, `pr_edtm`, `pr_eby`, `pr_mdtm`, `pr_mby`, `pr_active`, `pr_cdtm`, `pr_cby`, `pr_clid`, `pr_coid`, `pr_prnum`) VALUES
('P-10001', 'Project1', NULL, NULL, NULL, NULL, NULL, 'Jiten Sabharwal', 'Rishabh', 'Rachit', 'Utkarsh', 'Jiten', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('P-10002', 'Project2', NULL, NULL, NULL, NULL, NULL, 'Jiten Sabharwal', NULL, 'Rachit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('P-10003', 'Project-2', NULL, NULL, NULL, NULL, NULL, 'Arjun', 'Rishabh', 'Rachit', 'Ravi', 'John', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qut_quote`
--

CREATE TABLE IF NOT EXISTS `qut_quote` (
  `qu_quid` varchar(10) NOT NULL,
  `qu_qdate` date DEFAULT NULL,
  `qu_snum` varchar(10) DEFAULT NULL,
  `qu_prid` varchar(10) DEFAULT NULL,
  `qu_venid` varchar(10) DEFAULT NULL,
  `qu_coid` varchar(10) DEFAULT NULL,
  `qu_crrefnum` varchar(10) DEFAULT NULL,
  `qu_amount` int(10) DEFAULT NULL,
  `qu_approval` varchar(3) DEFAULT NULL,
  `qu_adtm` date DEFAULT NULL,
  `qu_aby` varchar(50) DEFAULT NULL,
  `qu_pmcomment` varchar(50) DEFAULT NULL,
  `qu_pmpost` varchar(50) DEFAULT NULL,
  `qu_pmdate` date DEFAULT NULL,
  `qu_pscomment` varchar(50) DEFAULT NULL,
  `qu_pspost` varchar(50) DEFAULT NULL,
  `qu_psdate` date DEFAULT NULL,
  `qu_picomment` varchar(50) DEFAULT NULL,
  `qu_pipost` varchar(50) DEFAULT NULL,
  `qu_pidate` date DEFAULT NULL,
  `qu_pscomment2` varchar(50) DEFAULT NULL,
  `qu_pspost2` varchar(50) DEFAULT NULL,
  `qu_psdate2` date DEFAULT NULL,
  `qu_areason` varchar(100) DEFAULT NULL,
  `qu_rdate` date DEFAULT NULL,
  `qu_edtm` date DEFAULT NULL,
  `qu_eby` varchar(50) DEFAULT NULL,
  `qu_mdtm` date DEFAULT NULL,
  `qu_mby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`qu_quid`),
  KEY `qu_prid` (`qu_prid`),
  KEY `qu_coid` (`qu_coid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='quote table';

--
-- Dumping data for table `qut_quote`
--

INSERT INTO `qut_quote` (`qu_quid`, `qu_qdate`, `qu_snum`, `qu_prid`, `qu_venid`, `qu_coid`, `qu_crrefnum`, `qu_amount`, `qu_approval`, `qu_adtm`, `qu_aby`, `qu_pmcomment`, `qu_pmpost`, `qu_pmdate`, `qu_pscomment`, `qu_pspost`, `qu_psdate`, `qu_picomment`, `qu_pipost`, `qu_pidate`, `qu_pscomment2`, `qu_pspost2`, `qu_psdate2`, `qu_areason`, `qu_rdate`, `qu_edtm`, `qu_eby`, `qu_mdtm`, `qu_mby`) VALUES
('QU-00001', NULL, NULL, 'P-10003', NULL, NULL, NULL, 300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('QU-00002', NULL, NULL, 'P-10003', NULL, NULL, NULL, 300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('QU-00003', NULL, NULL, 'P-10001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stg_stage`
--

CREATE TABLE IF NOT EXISTS `stg_stage` (
  `st_stid` varchar(10) NOT NULL DEFAULT '',
  `st_woid` varchar(10) DEFAULT NULL,
  `st_sttitle` varchar(20) DEFAULT NULL,
  `st_stdesc` varchar(100) DEFAULT NULL,
  `st_stnum` int(2) DEFAULT NULL,
  `st_stquantity` int(5) DEFAULT NULL,
  `st_strate` int(3) DEFAULT NULL,
  `st_sttax` int(3) DEFAULT NULL,
  `st_stamt` int(10) DEFAULT NULL,
  `st_picomment` varchar(50) DEFAULT NULL,
  `st_pipost` varchar(50) DEFAULT NULL,
  `st_pidate` date DEFAULT NULL,
  `st_pmcomment` varchar(50) DEFAULT NULL,
  `st_pmpost` varchar(50) DEFAULT NULL,
  `st_pmdate` date DEFAULT NULL,
  `st_pscomment` varchar(50) DEFAULT NULL,
  `st_pspost` varchar(50) DEFAULT NULL,
  `st_psdate` date DEFAULT NULL,
  `st_fscomment` varchar(50) DEFAULT NULL,
  `po_fspost` varchar(50) DEFAULT NULL,
  `st_fsdate` date DEFAULT NULL,
  `st_mdcomment` varchar(50) DEFAULT NULL,
  `st_mdpost` varchar(50) DEFAULT NULL,
  `st_mddate` date DEFAULT NULL,
  `st_pscomment2` varchar(50) DEFAULT NULL,
  `st_pspost2` varchar(50) DEFAULT NULL,
  `st_psdate2` date DEFAULT NULL,
  `st_edtm` date DEFAULT NULL,
  `st_eby` varchar(50) DEFAULT NULL,
  `st_mdtm` date DEFAULT NULL,
  `st_mby` varchar(50) DEFAULT NULL,
  `st_active` varchar(3) DEFAULT NULL,
  `st_cdtm` date DEFAULT NULL,
  `st_cby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`st_stid`),
  KEY `po_prid` (`st_woid`),
  KEY `po_veid` (`st_stdesc`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='stage table';

--
-- Dumping data for table `stg_stage`
--

INSERT INTO `stg_stage` (`st_stid`, `st_woid`, `st_sttitle`, `st_stdesc`, `st_stnum`, `st_stquantity`, `st_strate`, `st_sttax`, `st_stamt`, `st_picomment`, `st_pipost`, `st_pidate`, `st_pmcomment`, `st_pmpost`, `st_pmdate`, `st_pscomment`, `st_pspost`, `st_psdate`, `st_fscomment`, `po_fspost`, `st_fsdate`, `st_mdcomment`, `st_mdpost`, `st_mddate`, `st_pscomment2`, `st_pspost2`, `st_psdate2`, `st_edtm`, `st_eby`, `st_mdtm`, `st_mby`, `st_active`, `st_cdtm`, `st_cby`) VALUES
('ST-00001', NULL, NULL, 'jiten', NULL, NULL, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ST-00002', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('ST-00003', NULL, NULL, 'jaskd', NULL, NULL, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usx_user`
--

CREATE TABLE IF NOT EXISTS `usx_user` (
  `us_usid` varchar(10) NOT NULL,
  `us_fname` varchar(20) NOT NULL,
  `us_lname` varchar(20) NOT NULL,
  `us_mname` varchar(20) DEFAULT NULL,
  `us_phone1` int(11) NOT NULL,
  `us_phone2` int(11) DEFAULT NULL,
  `us_email1` varchar(50) NOT NULL,
  `us_email2` varchar(50) DEFAULT NULL,
  `us_fax1` int(20) DEFAULT NULL,
  `us_fax2` int(20) DEFAULT NULL,
  `us_addr1` varchar(50) NOT NULL,
  `us_addr2` varchar(50) NOT NULL,
  `us_city` varchar(50) NOT NULL,
  `us_state` varchar(50) NOT NULL,
  `us_zip` int(11) NOT NULL,
  `us_country` varchar(50) NOT NULL,
  `us_pm` varchar(50) DEFAULT NULL,
  `us_md` varchar(50) DEFAULT NULL,
  `us_pi` varchar(50) DEFAULT NULL,
  `us_ps` varchar(50) DEFAULT NULL,
  `us_fs` varchar(50) DEFAULT NULL,
  `us_si` varchar(50) DEFAULT NULL,
  `us_edtm` date DEFAULT NULL,
  `us_eby` varchar(50) DEFAULT NULL,
  `us_mdtm` date DEFAULT NULL,
  `us_mby` varchar(50) DEFAULT NULL,
  `us_active` varchar(3) DEFAULT NULL,
  `us_cdtm` date DEFAULT NULL,
  `us_cby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`us_usid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='user inf. table';

--
-- Dumping data for table `usx_user`
--

INSERT INTO `usx_user` (`us_usid`, `us_fname`, `us_lname`, `us_mname`, `us_phone1`, `us_phone2`, `us_email1`, `us_email2`, `us_fax1`, `us_fax2`, `us_addr1`, `us_addr2`, `us_city`, `us_state`, `us_zip`, `us_country`, `us_pm`, `us_md`, `us_pi`, `us_ps`, `us_fs`, `us_si`, `us_edtm`, `us_eby`, `us_mdtm`, `us_mby`, `us_active`, `us_cdtm`, `us_cby`) VALUES
('us-2000', 'Rishabh', 'kumar', NULL, 0, NULL, '', NULL, NULL, NULL, '', '', '', '', 0, '', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, NULL),
('us-5002', 'Utkarsh', 'Rai', NULL, 0, NULL, '', NULL, NULL, NULL, '', '', '', '', 0, '', NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, 'the', NULL, NULL),
('us-6000', 'Garvit', 'Vijai', NULL, 0, NULL, '', NULL, NULL, NULL, '', '', '', '', 0, '', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'int', NULL, NULL),
('us-9000', 'Rachit', 'Arora', NULL, 0, NULL, '', NULL, NULL, NULL, '', '', '', '', 0, '', NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'cha', NULL, NULL),
('us50001', 'Jiten', 'Sabharwal', NULL, 0, NULL, '', NULL, NULL, NULL, '', '', '', '', 0, '', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'roo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ven_vendor`
--

CREATE TABLE IF NOT EXISTS `ven_vendor` (
  `ve_veid` varchar(10) NOT NULL DEFAULT '',
  `ve_vname` varchar(10) DEFAULT NULL,
  `ve_contact1` int(20) DEFAULT NULL,
  `ve_contact2` int(20) DEFAULT NULL,
  `ve_phone1` int(20) DEFAULT NULL,
  `ve_phone2` int(20) DEFAULT NULL,
  `ve_email1` varchar(30) DEFAULT NULL,
  `ve_email2` varchar(30) DEFAULT NULL,
  `ve_fax1` int(20) DEFAULT NULL,
  `ve_fax2` int(20) DEFAULT NULL,
  `ve_edtm` date DEFAULT NULL,
  `ve_eby` varchar(50) DEFAULT NULL,
  `ve_mdtm` date DEFAULT NULL,
  `ve_mby` varchar(50) DEFAULT NULL,
  `ve_active` varchar(3) DEFAULT NULL,
  `ve_cdtm` date DEFAULT NULL,
  `ve_cby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ve_veid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='vendor table';

--
-- Dumping data for table `ven_vendor`
--

INSERT INTO `ven_vendor` (`ve_veid`, `ve_vname`, `ve_contact1`, `ve_contact2`, `ve_phone1`, `ve_phone2`, `ve_email1`, `ve_email2`, `ve_fax1`, `ve_fax2`, `ve_edtm`, `ve_eby`, `ve_mdtm`, `ve_mby`, `ve_active`, `ve_cdtm`, `ve_cby`) VALUES
('VE-00001', 'jiten', 78945612, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('VE-00005', 'jiten', 875522, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('VE-00006', 'jiten', 875522, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('VE-00007', 'kar', 74556633, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('VE-00008', 'kar', 74556633, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('VE-00009', 'jiten', 2147483647, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wok_order`
--

CREATE TABLE IF NOT EXISTS `wok_order` (
  `wo_woid` varchar(10) NOT NULL DEFAULT '',
  `wo_wocid` varchar(15) DEFAULT NULL,
  `wo_coid` varchar(10) DEFAULT NULL,
  `wo_prid` varchar(10) DEFAULT NULL,
  `wo_quoteid` varchar(10) DEFAULT NULL,
  `wo_quoteid1` varchar(10) DEFAULT NULL,
  `wo_quoteid2` varchar(10) DEFAULT NULL,
  `wo_quoteid3` varchar(10) DEFAULT NULL,
  `wo_wonum` varchar(10) DEFAULT NULL,
  `wo_wodesc` varchar(100) DEFAULT NULL,
  `wo_woquantity` int(11) DEFAULT NULL,
  `wo_worate` int(3) DEFAULT NULL,
  `wo_rateq1` int(30) DEFAULT NULL,
  `wo_rateq2` int(30) DEFAULT NULL,
  `wo_rateq3` int(30) DEFAULT NULL,
  `wo_discount` int(10) DEFAULT NULL,
  `wo_wotax` int(3) DEFAULT NULL,
  `wo_woamount` int(10) DEFAULT NULL,
  `wo_pscomment` varchar(50) DEFAULT NULL,
  `wo_pspost` varchar(50) DEFAULT NULL,
  `wo_psdate` date DEFAULT NULL,
  `wo_fscomment` varchar(50) DEFAULT NULL,
  `wo_fspost` varchar(50) DEFAULT NULL,
  `wo_fsdate` date DEFAULT NULL,
  `wo_mdcomment` varchar(50) DEFAULT NULL,
  `wo_mdpost` varchar(50) DEFAULT NULL,
  `wo_mddate` date DEFAULT NULL,
  `wo_pscomment2` varchar(11) DEFAULT NULL,
  `wo_pspost2` int(50) DEFAULT NULL,
  `wo_psdate2` date DEFAULT NULL,
  `wo_approval` varchar(5) DEFAULT NULL,
  `wo_aby` varchar(50) DEFAULT NULL,
  `wo_edtm` date DEFAULT NULL,
  `wo_eby` varchar(50) DEFAULT NULL,
  `wo_mdtm` date DEFAULT NULL,
  `wo_mby` varchar(50) DEFAULT NULL,
  `wo_active` varchar(3) DEFAULT NULL,
  `wo_cdtm` date DEFAULT NULL,
  `wo_cby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`wo_woid`),
  UNIQUE KEY `wo_woid` (`wo_woid`),
  KEY `po_prid` (`wo_coid`),
  KEY `po_veid` (`wo_prid`),
  KEY `wo_coid` (`wo_coid`),
  KEY `wo_prid` (`wo_prid`),
  KEY `wo_woid_2` (`wo_woid`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='work order table';

--
-- Dumping data for table `wok_order`
--

INSERT INTO `wok_order` (`wo_woid`, `wo_wocid`, `wo_coid`, `wo_prid`, `wo_quoteid`, `wo_quoteid1`, `wo_quoteid2`, `wo_quoteid3`, `wo_wonum`, `wo_wodesc`, `wo_woquantity`, `wo_worate`, `wo_rateq1`, `wo_rateq2`, `wo_rateq3`, `wo_discount`, `wo_wotax`, `wo_woamount`, `wo_pscomment`, `wo_pspost`, `wo_psdate`, `wo_fscomment`, `wo_fspost`, `wo_fsdate`, `wo_mdcomment`, `wo_mdpost`, `wo_mddate`, `wo_pscomment2`, `wo_pspost2`, `wo_psdate2`, `wo_approval`, `wo_aby`, `wo_edtm`, `wo_eby`, `wo_mdtm`, `wo_mby`, `wo_active`, `wo_cdtm`, `wo_cby`) VALUES
('WO-00004', NULL, NULL, 'P-10003', NULL, 'VE-00001', NULL, NULL, 'c3', 'good', 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'painter', NULL, 'Sorry no funds', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('WO-00005', 'WC-00001', NULL, 'P-10001', NULL, 'QU-00003', NULL, NULL, 'c1', 'fdhslk', 45, 54, 50, 30, 12, NULL, NULL, NULL, NULL, 'carpenter', NULL, 'no funds for 3yr', NULL, NULL, 'Approved', NULL, NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('WO-00006', 'WC-00001', NULL, 'P-10001', NULL, 'QU-00003', NULL, NULL, 'c2', 'ksnldv', 45, 54, 90, 30, 85, NULL, NULL, NULL, NULL, 'carpenter', NULL, 'no funds for 3yr', NULL, NULL, 'Approved', NULL, NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('WO-00007', 'WC-00002', NULL, 'P-10001', NULL, NULL, NULL, NULL, 'c1', 'fdhslk', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carpenter', NULL, 'Sorry no funds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('WO-00008', 'WC-00002', NULL, 'P-10001', NULL, NULL, NULL, NULL, 'c2', 'ksnldv', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carpenter', NULL, 'Sorry no funds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('WO-00009', 'WC-00003', NULL, 'P-10001', NULL, 'VE-00034', NULL, NULL, 'c1', 'jiten', 82, NULL, 80, 0, 0, NULL, NULL, NULL, NULL, 'tiles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fid_file`
--
ALTER TABLE `fid_file`
  ADD CONSTRAINT `FK ORDER1` FOREIGN KEY (`fi_poid`) REFERENCES `pod_order` (`po_poid`),
  ADD CONSTRAINT `FK PROJECT1` FOREIGN KEY (`fi_prid`) REFERENCES `prj_project` (`pr_prid`),
  ADD CONSTRAINT `FK QUOTE2` FOREIGN KEY (`fi_quid`) REFERENCES `qut_quote` (`qu_quid`),
  ADD CONSTRAINT `FK STAGE1` FOREIGN KEY (`fi_stid`) REFERENCES `stg_stage` (`st_stid`),
  ADD CONSTRAINT `FK USER1` FOREIGN KEY (`fi_usid`) REFERENCES `usx_user` (`us_usid`),
  ADD CONSTRAINT `FK WORK1` FOREIGN KEY (`fi_woid`) REFERENCES `wok_order` (`wo_woid`);

--
-- Constraints for table `pod_order`
--
ALTER TABLE `pod_order`
  ADD CONSTRAINT `FK VENDOR1` FOREIGN KEY (`po_veid`) REFERENCES `ven_vendor` (`ve_veid`),
  ADD CONSTRAINT `FK_PROJECT1` FOREIGN KEY (`po_prid`) REFERENCES `prj_project` (`pr_prid`);

--
-- Constraints for table `prj_project`
--
ALTER TABLE `prj_project`
  ADD CONSTRAINT `FK CLIENT1` FOREIGN KEY (`pr_clid`) REFERENCES `cle_client` (`cl_clid`),
  ADD CONSTRAINT `FK CONTARACTOR2` FOREIGN KEY (`pr_coid`) REFERENCES `con_contractors` (`co_clid`);

--
-- Constraints for table `qut_quote`
--
ALTER TABLE `qut_quote`
  ADD CONSTRAINT `FK CONTRACTOR1` FOREIGN KEY (`qu_coid`) REFERENCES `con_contractors` (`co_clid`),
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`qu_prid`) REFERENCES `prj_project` (`pr_prid`);

--
-- Constraints for table `wok_order`
--
ALTER TABLE `wok_order`
  ADD CONSTRAINT `FK CONTRACT1` FOREIGN KEY (`wo_coid`) REFERENCES `con_contractors` (`co_clid`),
  ADD CONSTRAINT `FK PROJECT2` FOREIGN KEY (`wo_prid`) REFERENCES `prj_project` (`pr_prid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
