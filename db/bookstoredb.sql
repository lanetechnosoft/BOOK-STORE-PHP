-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 07:20 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auther`
--

CREATE TABLE IF NOT EXISTS `auther` (
  `authID` int(11) NOT NULL,
  `authName` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auther`
--

INSERT INTO `auther` (`authID`, `authName`) VALUES
(1, 'Sarawut  Inree'),
(2, 'ปฏิภาณ  จันทร์มาเมือง'),
(3, 'วิไลภรณ์  เจริญศักดิ์'),
(4, 'Andy Weir'),
(5, 'วีรพร นิติประภา'),
(6, 'Pedro Mairal'),
(7, 'H. G. Wells'),
(8, 'ประชา พฤกษ์ประเสริฐ'),
(9, 'Vladimir Nabokov'),
(10, 'ภิญญพันธุ์ พจนะลาวัณย์'),
(12, 'จงธวัช พันยะศรี'),
(13, 'เบญจะ รัตนทรัพย์'),
(14, 'ประสานพงษ์ หาเรือนชีพ'),
(15, 'ปิยะณัฐ อเนกประศาสน์');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `bankID` int(11) NOT NULL,
  `bankName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `bankNumber` int(20) NOT NULL,
  `bankLogo` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bankID`, `bankName`, `bankNumber`, `bankLogo`) VALUES
(1, 'ธนาคารกรุงเทพ', 234567891, 'bbl.gif'),
(2, 'ธนาคารกรุงไทย', 123456789, 'ktb.png'),
(3, 'ธนาคารกสิกร', 1234567891, 'ks.gif');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bID` int(11) NOT NULL,
  `bName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `authID` int(11) NOT NULL,
  `CatID` int(11) NOT NULL,
  `pubID` int(11) NOT NULL,
  `bDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `bEdition` int(11) NOT NULL,
  `bPrice` decimal(6,2) NOT NULL,
  `ISBN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bCover` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bPage` int(11) NOT NULL,
  `bPaper` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bCount` int(11) NOT NULL,
  `bBuyPoint` int(11) NOT NULL,
  `bPic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางหนังสือ';

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bID`, `bName`, `authID`, `CatID`, `pubID`, `bDesc`, `bEdition`, `bPrice`, `ISBN`, `bCover`, `bPage`, `bPaper`, `bCount`, `bBuyPoint`, `bPic`, `added_date`) VALUES
(1, 'เหยียบนรกสุญญากาศ', 4, 9, 4, '<p><strong>ผมติดอยู่บนดาวอังคารเพียงลำพัง</strong>นาซาสั่งยกเลิกภารกิจสำรวจพื้นผิวดาวอังคาร หลังจากพายุทรายลูกมหึมา\r\nพัดถล่ม นักบินอวกาศคนหนึ่งกลับหายสาบสูญไประหว่างการอพยพ ทุกคนบนโลกคิดว่านักบินคนนั้นตายไปแล้ว แต่เขายังมีชีวิตอยู่ และเขาคนนั้นก็คือผมเอง<strong>ถึงผมจะยังไม่ตาย แต่ก็เหมือนตกอยู่ในนรกทั้งเป็น</strong>ระบบสื่อสารถูกตัดขาด\r\n ไม่มีทางติดต่อกับโลก ด้วยสภาพที่เป็นอยู่ ผมไม่รู้ว่าจะรอดไปได้อีกสักกี่วันถ้าเครื่องผลิตออกซิเจนเสีย ผมจะขาดอากาศหายใจ\r\nถ้าเครื่องกรองน้ำทรยศ ผมจะช็อกตายเพราะขาดน้ำถ้ายานมีรอยรั่วแม้แต่จุดเดียว \r\nร่างของผมคงระเบิดเป็นเสี่ยงหรือต่อให้สิ่งที่พูดมาทั้งหมดไม่เกิดขึ้น ผมก็ต้องอดอาหารตายอยู่ดีเว้นเสียแต่ว่า\r\n ผมจะหาทางติดต่อโลกให้ได้ และใช้ไหวพริบทั้งหมดที่มีเอาตัวรอด จนกว่าความช่วยเหลือที่อยู่ห่างออกไป 140 ล้านไมล์จะมาถึง</p>\r\n<p> </p>\r\n<p><em>“หนังสือเล่มนี้จะทำให้คุณลุ้นจนแทบหยุดหายใจราวกับถูกทิ้งไว้บนดาวอังคาร” —Amazing Stories</em></p>', 1, '280.00', '9786162871245', 'ปกอ่อน', 400, 'กระดาษมัน', 100, 10, '117640065.jpg', '2015-11-02 11:47:43'),
(2, 'ไส้เดือนตาบอดในเขาวงกต', 5, 4, 5, '<p><strong>ไส้เดือนตาบอดในเขาวงกต (นวนิยายซีไรต์ ปี 2558) โดย วีรพร นิติประภา</strong></p>\r\n<p>นวนิยายที่เต็มไปด้วยศัพท์แสงสัญลักษณ์ในทุกฉากตอน ฉาบซ่อนในเรื่องรักสามเส้าแสนธรรมดา ปรุงรสด้วยเสน่ห์รายละเอียดของความร่วมสมัยผ่านบุคลิก รสนิยม และการดำเนินชีวิตของตัวละครเรื่องนี้ ถ้าจะอ่านเอารส ก็เพลินใจไปกับลีลาการใช้ภาษาที่ลื่นไหลด้วยวรรณศิลป์งดงาม ฉายให้เห็นชะตาชีวิตของผู้คนอย่างเราๆ ท่านๆ ที่มีชีวิตอยู่กับความรัก ผิดหวัง กำพร้า แสวงหา ความจำเสื่อม บ้าอยู่กับการหลอกตัวเองและคนอื่น เพื่อรอให้จุดจบมาถึงในวันหนึ่ง</p>\r\n<p>ส่วนถ้าจะอ่านเอาเรื่อง ก็สามารถทำให้ขบคิด พินิจพิเคราะห์ และคาดเดาไปต่างๆ ได้อย่างฉงนฉงาย ว่าทำไมหนอเด็กกำพร้าเหล่านี้จึงมีชีวิตที่แหว่งวิ่นเสียเหลือเกิน อะไรที่ปะติดปะต่อชะตากรรมของทุกตัวละครเข้าด้วยกัน อะไรที่ทำให้พวกเขาพลัดหลงไปทั้งภายในและภายนอกจิตใจ</p>\r\n<p>และถ้าอ่านแบบไม่คิดอะไรเลย ขอบอกว่าอย่างน้อยหนังสือเล่มนี้ก็จะทำให้รักดนตรี จนอดที่จะเสิร์ชหาในยูทูปมาเปิดคลอไม่ได้ เมื่อถึงฉากที่เล่าถึงอาหาร ก็อดที่จะคั่นหน้านั้นไว้ แล้วออกไปหาชิมตามให้ได้ เมื่อบรรยายถึงแมกไม้ ก็อยากจะมีสวนที่เป็นดงดอกไม้อย่างนั้นบ้าง ส่วนเมื่อกล่าวถึงการเดินทาง ก็อดที่จะตั้งคำถามกับตัวเองไม่ได้ว่า เรากำลังทำอะไรอยู่ และความรู้สึกเมื่อปิดหน้าสุดท้ายลง ก็คือเราจะรักชีวิตมากขึ้น...เท่านี้ไม่เพียงพอหรือสำหรับการเป็นนวนิยายดีๆ เล่มหนึ่ง</p>												', 1, '180.00', '9789740212225', 'ปกอ่อน', 256, '', 100, 10, '9789740212225-seawrite.jpg', '2015-11-02 11:47:43'),
(3, 'บุรุษล่องหน', 7, 4, 7, 'จะเป็นอย่างไรหากมีใครสักคนค้นคิดวิธีทำให้ตัวเองล่องหนได้\r\n\r\nThe Invisible Man นวนิยายต้นแบบของวรรณกรรม “ไซไฟ-ระทึกขวัญ” ตั้งคำถามนั้น และได้สร้างพล็อตชวนติดตามเพื่อหาคำตอบได้อย่างลึกซึ้ง จนทำให้ผลงานของเขาเล่มนี้กลายเป็นวรรณกรรมอมตะระดับสากล ที่ยังทรงอิทธิพลในโลกจินตนาการอย่างต่อเนื่อง', 1, '220.00', '9786167144481', 'ปกอ่อน', 0, '', 100, 10, '9786167144481.jpg', '2015-11-02 11:47:43'),
(4, 'ปีที่หายไปของฆวน ซัลบัตเตียร่า‬', 6, 4, 4, '<p><em><strong>ฆวน ซัลบัตเตียร่า</strong></em> พูดไม่ได้ตั้งแต่อายุเก้าขวบ ทางเดียวที่เขาใช้สื่อสารกับโลกภายนอกคือการวาดภาพ เขาเริ่มวาดภาพทุกอย่างที่เกิดขึ้นในชีวิตประจำวัน ไม่ต่างจากการเขียนไดอารี่ และในวันที่ซัลบัตเตียร่าจากโลกนี้ไป เขาทิ้งภาพเขียนยาวกว่าสี่กิโลเมตร เป็นมรดกให้ลูกชายทั้งสองคน…</p><p>ทั้งคู่ตัดสินใจสำรวจม้วนภาพวาดหลายสิบม้วน ที่บันทึกเรื่องราวกว่าหกสิบปีในชีวิตของพ่อ กระทั่งพบว่ามีม้วนหนึ่งหายไป</p><p>มิกูเอล น้องชายคนเล็ก ตัดสินใจออกตามหาม้วนภาพนั้น ยิ่งเขาลงลึกเท่าไหร่ ก็ได้เรียนรู้และรู้จักตัวตนของพ่อมากขึ้นเท่านั้น …</p>', 1, '190.00', '', 'ปกอ่อน', 204, '', 100, 10, 'the-missing-year-of-juan-salvatierra.jpg', '2015-11-02 11:47:43'),
(5, 'Tokyo Craft Beer', 1, 1, 8, '<p><strong>Tokyo Craft Beer</strong><br><strong>โตเกียวคราฟท์เบียร์ : คู่มือเที่ยวชิมเบียร์ท้องถิ่นในโตเกียวและปริมณฑล</strong></p>\r\n', 1, '315.00', '9786163947697', 'ปกอ่อน', 232, '', 100, 10, '9786163947697.jpg', '2015-11-02 11:47:43'),
(6, 'SQL Server 2012  ฉบับสมบูรณ์ บริหารและจัดการฐานข้อมูลระดับมืออาชีพ', 8, 2, 8, ' เรียนรู้ความสามารถที่สำคัญของ SQL Server 2012 โดยอธิบายตั้งเเต่ การบริหารจัดการฐานข้อมูลในองค์กรและเว็บไซต์อีคอมเมิร์ซ สร้างและจัดการฐานข้อมูลอย่างมีหลักการ สร้างการทำงานต่างๆ ด้วย Stored บริหารฐานข้อมูลด้วย Management Studio Procedure, Trigger และ Cursor หรือ Transact SQL (T-SQL) สร้าง Job และ Alert เพื่อตั้งเวลาให้ฐานข้อมูลทำงานประจำเอง ปรับปรุงประสิทธิภาพการเข้าถึงข้อมูลด้วย Index ทำการแบ็กอัพและรีสโตร์ข้อมูลอย่างถูกต้อง\r\n', 1, '320.00', '9786162622199', 'ปกอ่อน', 432, '', 100, 10, 'sqlserver2012.jpg', '2015-11-02 11:47:43'),
(7, 'โลลิต้า Lolita', 9, 4, 10, '“โลลิต้า” ผลงานชิ้นเอกของ วลาดิเมียร์ นาโบคอฟ นักเขียน นักวิจารณ์ และนักแปลชาวรัสเซีย ผู้ได้รับการยกย่องว่ามีความสามารถเป็นเลิสในการใช้ภาษาอังกฤษ เมื่อนาโบคอฟประพันธ์ โลลิต้า เสร็จในปี 1953 เขาติดต่อสำนักพิมพ์ในสหรัฐอเมริกาถึงสี่แห่งเพื่อเสนอให้จัดพิมพ์ แต่ได้รับการปฏิเสธ จนในที่สุด สำนักพิมพ์ Olympia Press ในกรุงปารีสตกลงรับเป็นผู้จัดพิมพ์ในอีกสองปีต่อมา\r\n', 1, '447.00', '9786169200192', 'ปกอ่อน', 495, 'กระดาษมัน', 100, 10, '9786169200192.png', '2015-11-02 11:47:43'),
(8, 'กำเนิด ประเทศไทย ภายใต้เผด็จการ', 10, 6, 5, 'ในทศวรรษ 2500 (พ.ศ.2500-2510) เกิดการเปลี่ยนแปลงครั้งใหญ่ในสังคมไทย โดยเฉพาะด้านการเมืองการปกครองที่กลุ่มอำนาจทหารอย่างจอมพลสฤษดิ์ ธนะรัชต์ ก้าวขึ้นมาเป็นนายกรัฐมนตรี ซึ่งแม้จะปกครองด้วยระบอบเผด็จการพ่อขุนอุปถัมภ์ แต่ปฏิเสธไม่ได้เลยว่าเป็นยุคที่ประเทศไทยก้าวไปสู่ยุคพัฒนา เกิดถนนหนทางจากกรุงเทพฯ สู่ท้องถิ่น พร้อมสิ่งอำนวยความสะดวกในทุกๆ ด้าน ทุกๆ คนในประเทศ "รู้สึกร่วม" ในความเป็นคนไทย และประเทศไทย\r\n', 1, '220.00', '9789740214212', 'ปกอ่อน', 312, '', 100, 10, '9789740214212.jpg.jpg', '2015-11-02 11:47:43'),
(10, 'ร้อยพรรณพฤกษา บีโกเบีย', 12, 5, 12, 'ไมใบ มนต์เสนห์ที่คุณต้องลองชม ความงามแห่งดแกที่ไม่เหมือนใคร บีโกเนีย สายพันธุ์ต่างๆ', 1, '150.00', '9786167376622', 'ปกอ่อน', 150, 'อ่อน', 100, 5, '9786167376622_150X200.jpg', '2015-11-26 16:02:49'),
(11, 'โตขึ้นหนูจะเป็นหมอ', 13, 7, 13, 'การสร้างสวรรค์ลูกให้รู้จักแบ่งบัน คิดสร้างสรรค์แทนการแข่งขัน ซึ่งจะทำให้ลูกมีความสุขชั่วชีวิต', 5, '185.00', '9786162753060 ', 'ปกอ่อน', 192, 'อ่อน', 100, 10, '9786162753060_90X130.jpg', '2015-11-26 16:03:01'),
(12, 'งานระบบเครื่องยนต์ด้วยอิเล็กทรอนิกส์', 14, 8, 14, 'หนังสือเล่มนี้เป็นหนังสือ ที่ได้รวบรวมเนื้อหาภาคทฤษฎีและปฏิบัติ เกี่ยวกับหลักการทำงาน การตรวจสอบ การวิเคราะห์ปัญหา การซ่อมและการปรับแต่งอุปกรณ์เครื่องยนต์แก๊สโซลีนและเครื่องยนต์ดีเซลด้วยอิเล็กทรอนิกส์ได้เป็นอย่างดี ซึ่งหนังสือเล่มนี้มีเนื้อหาตรงตามหลักสูตร ปวส.สาขาช่างยนต์ ทุกประการ', 2, '195.00', '9786160805686', 'ปกอ่อน', 368, 'อ่อน', 99, 5, '9786160805686_150X193.jpg', '2015-11-26 18:19:33'),
(13, 'English Presentation คู่มือฝึกพูดภาษาอังกฤษนำเสนองานแบบมืออาชีพ', 15, 3, 15, 'หนังสือเล่มนี้ไม่ใช่การสอนพูดภาษาอังกฤษแบบธรรมดา แต่เป็นการสอนวิธีพูดเพื่อนำเสนองานโดยเฉพาะ เหมาะสำหรับนักเรียนนักศึกษา คนทำงาน นักการตลาดนักโฆษณา', 1, '240.00', '9786162753107 ', 'ปกอ่อน', 224, 'อ่อน', 99, 10, '9786162753107_150X220.jpg', '2015-11-26 18:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CatID` int(11) NOT NULL,
  `CatName` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CatID`, `CatName`) VALUES
(1, 'การใช้ชีวิต'),
(2, 'คอมพิวเตอร์'),
(3, 'ภาษาต่างประเทศ'),
(4, 'นวนิยาย'),
(5, 'บ้านและสวน'),
(6, 'การเมืองและกฎหมาย'),
(7, 'สำหรับเด็ก'),
(8, 'วิศกรรมศาสตร์'),
(9, 'บันเทิงคดีแนววิทยาศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberid` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `pfPic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberid`, `username`, `password`, `email`, `status_id`, `Name`, `address`, `pfPic`, `reg_date`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'the.last-stronger@live.com', 1, 'Administrator', '426 หมู่1 ต.ท่าขอนยาง อ.กันทรวิชัย จ.มหาสารคาม\r\n44150', '2105@2x.png', '2015-11-26 14:41:35'),
(2, 'john', '81dc9bdb52d04dc20036dbd8313ed055', 'john@bsp.com', 2, 'John', '88 / 5 หมู่ 1 ต.หนอนนอน อ.นาดี จ.สกลนคร 44444', 'avatar.png', '2015-11-26 15:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Orderid` int(5) NOT NULL,
  `memberid` int(11) NOT NULL,
  `Tax` float(6,2) NOT NULL,
  `TotalPrice` float(6,2) NOT NULL,
  `statusID` int(11) NOT NULL,
  `shippingID` int(11) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Orderid`, `memberid`, `Tax`, `TotalPrice`, `statusID`, `shippingID`, `OrderDate`) VALUES
(1, 2, 54.25, 775.00, 1, 0, '2015-11-26 15:50:01'),
(2, 2, 13.30, 190.00, 2, 0, '2015-11-26 18:06:45'),
(3, 2, 30.45, 435.00, 4, 0, '2015-11-26 18:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `ODetailID` int(11) NOT NULL,
  `Orderid` int(11) NOT NULL,
  `bID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `total` double(6,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`ODetailID`, `Orderid`, `bID`, `Qty`, `total`) VALUES
(1, 1, 1, 1, 775.00),
(2, 1, 2, 1, 775.00),
(3, 1, 5, 1, 775.00),
(4, 2, 4, 1, 190.00),
(5, 3, 13, 1, 435.00),
(6, 3, 12, 1, 435.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pmID` int(11) NOT NULL,
  `Orderid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `bankID` int(11) NOT NULL,
  `Amout` double(6,2) NOT NULL,
  `slipPic` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `paidDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pmID`, `Orderid`, `memberid`, `bankID`, `Amout`, `slipPic`, `Comment`, `paidDate`) VALUES
(1, 2, 2, 1, 203.30, 'slip1.jpg', 'ทดสอบแจ้งการโอนเงิน', '2015-11-27'),
(2, 3, 2, 2, 465.50, 'atm1.gif', 'ทดสอบตัดระบบสต็อก', '2015-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `promoID` int(11) NOT NULL,
  `promoName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `promoDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `bID` int(11) NOT NULL,
  `promoDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promoID`, `promoName`, `promoDesc`, `bID`, `promoDate`) VALUES
(1, '<span>THE</span> MARTIAN', 'นาซาสั่งยกเลิกภารกิจสำรวจพื้นผิวดาวอังคาร หลังจากพายุทรายลูกมหึมาพัดถล่ม นักบินอวกาศคนหนึ่งกลับหายสาบสูญไประหว่างการอพยพ ทุกคนบนโลกคิดว่านักบินคนนั้นตายไปแล้ว แต่เขายังมีชีวิตอยู่ และเขาคนนั้นก็คือผมเอง', 1, '2015-11-26 09:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `pubID` int(11) NOT NULL,
  `pubName` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`pubID`, `pubName`) VALUES
(1, 'สำนักพิมพ์ กขค'),
(2, 'สำนักพิมพ์ กะลาทอง'),
(3, 'สำนักพิมพ์ บ้านต่าง'),
(4, 'น้ำพุสำนักพิมพ์'),
(5, 'มติชน'),
(6, 'เลเจนด์บุ๊คส์ (Legend Books)'),
(7, 'ไต้ฝุ่น'),
(8, 'Local Paper'),
(10, 'ไลต์เฮาส์พับลิชชิ่ง'),
(11, 'Life Balance'),
(12, 'เศรษฐศิลป ส.น.พ.'),
(13, 'POP GET BOOK'),
(14, 'ซีเอ็ดยูเคชั่น, บมจ.'),
(15, 'บ.เอ็ดดูเคชั่น ไมน์ด ไลน์');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `rID` int(11) NOT NULL,
  `rName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rMail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rComment` text COLLATE utf8_unicode_ci NOT NULL,
  `rbook` int(11) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rID`, `rName`, `rMail`, `rComment`, `rbook`, `review_date`) VALUES
(1, 'Hypnox', 'the.last-stronger@live.com', 'TEST COMMENT FORM', 5, '2015-11-02 11:57:27'),
(2, 'ศราวุธ', 'std54010913486@acc.msu.ac.th', 'ชอบมากครับ', 5, '2015-11-02 11:57:27'),
(3, 'Hypnox', 'the.last-stronger@live.com', 'Date Time TEst Insert', 1, '2015-11-02 12:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `statusID` int(11) NOT NULL,
  `statusName` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `statusName`) VALUES
(1, 'รอการชำระเงิน'),
(2, 'ชำระเงินแล้ว'),
(3, 'รอการตรวจสอบ'),
(4, 'อยู่ระหว่างการจัดส่ง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auther`
--
ALTER TABLE `auther`
  ADD PRIMARY KEY (`authID`),
  ADD UNIQUE KEY `authID` (`authID`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CatID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Orderid`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ODetailID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pmID`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promoID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pubID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auther`
--
ALTER TABLE `auther`
  MODIFY `authID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bankID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CatID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Orderid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ODetailID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pmID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promoID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pubID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
