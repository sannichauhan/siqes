-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2016 at 10:56 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siques`
--

-- --------------------------------------------------------

--
-- Table structure for table `sqs_aboutus`
--

CREATE TABLE IF NOT EXISTS `sqs_aboutus` (
  `aboutus_id` int(1) NOT NULL AUTO_INCREMENT,
  `about_title` varchar(50) NOT NULL,
  `about_banner` varchar(100) NOT NULL,
  `about_image` varchar(100) NOT NULL,
  `about_shortdesc` text NOT NULL,
  `about_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`aboutus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sqs_aboutus`
--

INSERT INTO `sqs_aboutus` (`aboutus_id`, `about_title`, `about_banner`, `about_image`, `about_shortdesc`, `about_description`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(4, 'About Us', '', 'aboutus.jpg', '', '<ul>\r\n<li>With 10+ years of panoramic experience, our domain expertise lies in B2B e-commerce environment. \r\n</li>\r\n<li>We provide End-to-End EDI Services, both in Legacy and Gen2 Architecture\r\n</li>\r\n<li>We provide Technical Support at all levels by strictly adhering to Global  Quality Norms\r\n</li>\r\n<li>SIQES is a boutique IT service provider and ISO 9001:2008 & ISMS/IEC (Information Security) certified, established in 2000 based out of Noida, UP, India.\r\n</li>\r\n<li>We are registered with NSEZ (Noida Special Economic Zone, under Ministry of Commerce and Industries, Govt. of India) and STPI (Software Technology Parks of India).\r\n</li>\r\n<li>We provide dedicated team of resources with skilled buffer pool to ensure seamless operations and on-time project delivery to across our clientele.\r\n</li>\r\n<li>Our Infrastructure facilities, with a comprehensive backup system to ensure redundancy, can be compared with best of the companies. \r\n</li>\r\n<li>A responsive HR team works dedicatedly to ensure growth and satisfaction among the employees of our company.\r\n</li>\r\n</ul>', 1, '2016-07-27 11:30:00', 'admin', '2016-08-09 18:24:15', 'admin'),
(5, 'Our Vision', '', 'vision.jpg', '', '<ul>\r\n<li>To be a global corporation that provides the best business solutions, delivered by the best people utilizing the best technology.\r\n</li>\r\n</ul>', 1, '2016-07-27 11:30:00', 'admin', '2016-08-09 18:24:54', 'admin'),
(6, 'Our Mission', '', 'mission.jpg', '', '<ul>\r\n<li>To help companies succeed by enabling and empowering them to create excellent software products or progress by adopting modern software products, tools, best practices and industry standards.\r\n</li>\r\n<li>We empower teams to meet their strategic and tactical objectives by providing management consulting at strategic and team levels.\r\n</li>\r\n</ul>', 1, '2016-07-27 11:30:00', 'admin', '2016-08-09 18:25:06', 'admin'),
(7, 'Our Vallues', '', '', '', '<ul>\r\n<li>Service</li>\r\n<li>Integrity</li>\r\n<li>Quality</li>\r\n<li>Efficiency</li>\r\n<li>Striving for Excellence\r\n</li>\r\n</ul>', 1, '2016-07-27 11:30:00', 'admin', '2016-08-09 18:42:36', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_admin_user`
--

CREATE TABLE IF NOT EXISTS `sqs_admin_user` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sqs_admin_user`
--

INSERT INTO `sqs_admin_user` (`id`, `name`, `email_id`, `password`, `created_on`) VALUES
(1, 'admin', 'admin@siqes.in', 'e1b4755403710e0deb7aa5d45e43996d', '2016-07-28 01:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_banner`
--

CREATE TABLE IF NOT EXISTS `sqs_banner` (
  `banner_id` int(20) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(25) NOT NULL,
  `banner_text` varchar(150) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `banner_url` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(15) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(15) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sqs_banner`
--

INSERT INTO `sqs_banner` (`banner_id`, `banner_name`, `banner_text`, `banner_image`, `banner_url`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(2, 'innovate', '', 'innovate-lightbulb-n.jpg', 'innovate-lightbulb-n.jpg', 1, '2016-07-24 11:30:00', 'admin', '2016-09-09 12:29:10', 'admin'),
(4, 'banner-2', '', 'quality-n.jpg', 'quality-n.jpg', 1, '2016-08-05 18:50:14', 'admin', '2016-08-05 18:51:02', 'admin'),
(5, 'banner-3', '', 'growth-n.jpg', 'test', 1, '2016-08-05 18:50:43', 'admin', '2016-09-09 12:32:18', 'admin'),
(6, 'banner-3', '', 'beyond.jpg', 'beyond.jpg', 1, '2016-08-09 18:22:10', 'admin', '2016-09-09 13:41:09', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_blog`
--

CREATE TABLE IF NOT EXISTS `sqs_blog` (
  `blog_id` int(111) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `blog_image` varchar(100) NOT NULL,
  `blog_url` varchar(150) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sqs_blog`
--

INSERT INTO `sqs_blog` (`blog_id`, `category_id`, `blog_image`, `blog_url`, `blog_title`, `blog_description`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 1, '1470397757_image-10.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaatest', ' More EDI Blog posts', '<p>Check out my blog posts at <a href="https://blog.covalentworks.com/">CovalentWorks EDI Blog.</a> You will find weekly updates on EDI service topics of interest to small businesses.\r\n\r\nTransaction basics are provided as well as updates on the latest in web based service delivered from the cloud. Upcoming topics include retailer vendor scorecards, chargebacks, and integration with 3PL, accounting, WMS, and custom systems. Later this year there will posts on drop shipping, small business trends and much more.</p>\r\n<h4> EDI System Components </h4>\r\n<p>\r\nAn EDI system consists of all of the components necessary to exchange EDI transactions with trading partners who are EDI capable. The major components are EDI translation software, user or system interfaces, hardware, maps, EDI guides, a communication network and EDI experienced personnel. A company that wants to be EDI capable will have to either buy the components or outsource all of the <a href="https:https://www.covalentworks.com/">EDI system</a> components to a third party.\r\n</p>\r\n<p>\r\nEDI transactions are very compact and difficult to read and manipulate. EDI translation software provides the ability to translate EDI data into a file format that can be interfaced with a company''s in-house systems or translated into forms that can be used by users.\r\n</p>\r\n<p>\r\nEDI translation software supports the development and maintenance of maps. Maps are required to manipulate each transaction type. Every transaction type with every partner will be formatted differently. The map translates the EDI transaction into a useable file format.\r\n</p>\r\n<p>\r\nEDI guides are provided by EDI trading partners to communicate how each transaction type will be formatted. The EDI guides must be followed exactly in order to be EDI compliant with a particular EDI partner. The EDI guides are used to develop maps.</a>\r\n</p>\r\n<p>\r\nHardware is required to run EDI translation software. The computer hardware must be sufficiently powerful and reliable to support exchange of EDI transactions 24 X 7 in compliance with trading partners'' transmission schedules. \r\n</p>\r\n<p>\r\nA communication network is necessary to send and receive EDI transactions. A company can elect to either communicate EDI transactions using a direct AS/2 connection to a trading partner if the trading supports such a connection, or communicate with trading partners using a VAN. A VAN is a third party network provider that is a communications intermediary with other trading partners.\r\n</p>\r\n<p>\r\nAnd perhaps most importantly, expertise is required to implement each of the EDI system components and maintain each of the specific maps for all of a company''s EDI trading partners.\r\n</p>\r\n<h4> eCommerce Best Practices Interview </h4>\r\n<p>\r\nRecently Scott Koegler of eCommerce Best Practices interviewed me about CovalentWorks EDI services. I had the opportunity to explain our focus and key initiatives for continuous improvement as well as the key challenges our clients are facing. We talked about how CovalentWorks helps our clients save time and grow their business. Scott was also interested in our approach to testing so we spent some of our time toward the end of the interview talking about the best practices we employ to make testing as fast and efficient as possible.</p>\r\n<h4> A brief EDI VAN History - Part II </h4>\r\n<p>\r\nAs EDI use became more wide spread, each company followed EDI standards so that communication with their trading partners was facilitated. However, each company still had the flexibility to implement <a href="https://www.covalentworks.com/">EDI</a> transactions that fit its business requirements. Large companies had the ability to dictate to their suppliers exactly how a particular EDI transaction should be formatted.\r\n</p>\r\n<p>\r\nDuring the 1980''s, EDI became even more popular and proliferated with companies who could afford to employ a VAN and who had the technical expertise to implement EDI transactions that integrated with their back office systems. The first EDI software companies provided assistance with translating EDI transactions into and out of the format used by in-house applications so that custom EDI applications did not have to be built from scratch. EDI continued to grow in popularity as an expanding number of companies saw the benefits for themselves and their trading partners. Mainframe or mini-computers were used to run EDI systems.\r\n</p>\r\n<p>\r\nPC based EDI software began to emerge in the early 1990''s as an alternative and at a lower price point, although EDI was still a significant investment. Competition among VANs had reduced the cost of EDI communication somewhat, but it was still expensive. \r\n</p>\r\n<p>\r\nEmergence of the internet in the 1990''s provided the first real competition for VANs. The obvious question was "why use a VAN for communication when the internet was free"? And innovative companies did start to do point-to-point communication over the internet. Standards emerged for this communication and the most popular became <a href="http://searchoracle.techtarget.com/definition/AS2">AS/2 communication .</a> Even though the transportation of the data was free, reliable and secure communication had to be maintained for each trading partner with whom EDI transactions were exchanged.\r\n</p>\r\n<p>\r\nThe demise of VANs was widely predicted because the internet was "free". However, in the late 1990''s and the 2000''s VANs reduced their pricing in order to stay competitive with the internet alternative. In fact, prices changed so much that it again became cheaper for many companies to outsource their point-to-point communication to a VAN rather than doing it themselves with AS/2. Many of their trading partners still used a VAN for the same reason. Some VANs began offering connections to trading partners that used AS/2 communication, while others resisted the trend. Today a competitive VAN offers their customers one point of communication regardless of their trading partners'' communication preferences.\r\n</p>\r\n<h4> A Brief EDI VAN History - Part I </h4>\r\n<p>\r\nToday, a company that is new to EDI or a company that wants to reduce their expenses can arrange for cost effective service with an EDI VAN that will provide EDI communication with their trading partners regardless of whether the trading partner wants to use AS/2 communication or wants to use their own VAN. However, this has not always been the case.\r\n</p>\r\n<p>\r\nEDI started in the 1960''s when a relatively few companies wanted to exchange data electronically in order to become more efficient. The focus of EDI since its inception has been on the replacement of paper-based business documents with carefully defined machine-processable electronic forms. In the 1960''s, companies had no choice at that point in time except to transmit their data directly with each other using point-to-point connections. However, they soon realized that maintaining point-to-point connections with a growing number of trading partners, all of whom had different computing platforms, was an expensive proposition.\r\n</p>\r\n<p>\r\nIn the early 1970''s, companies in several industries banded together to develop the first set of \r\n<a href="http://www.x12.org/">EDI standards</a> and they decided that a for-profit company would be the best avenue for administering the communication among them. The first EDI value added network company, or VAN, then came into existence. The value added network provided one point of connection for each company and then managed the communication with other companies. Now a company could outsource the secure flow of EDI transactions to many other companies while maintaining just one point of communication. EDI had become much easier and less expensive.\r\n</p>\r\n<p>\r\nEDI standards became more formalized throughout the 1970''s, additional EDI VAN companies were formed and those VAN companies developed interconnections among themselves so that it did not matter which VAN a particular company chose. EDI communication with other companies was now possible regardless of which particular EDI VAN any one company used and EDI started to flourish.\r\n</p>\r\n<h4> Federated EDI requirements </h4>\r\n<p>\r\nThere are extensive and sometimes complicated requirements for Federated EDI. Federated mandates EDI compliance for suppliers to all of its stores including Macy''s, Bloomindales, Famous-Barr, Foley''s, Hecht''s, Kaufmann''s, L.S. Ayers, Marshall Fields, Meier & Frank, Robinsons-May, Strawbridges, and The Jones Store.\r\n</p>\r\n<p>\r\nFederated grew considerably with the acquisition of Marshall Fields from Target in May of 2004 and then went on to become the largest operator of department stores in the U.S. during August of 2005 when the acquisition of the May stores was completed. Federated is now moving all May Store suppliers to the Federated EDI standards. Federated has a sophisticated supply chain and EDI transactions are an important link between them and their suppliers.\r\n</p>\r\n\r\n<p>\r\nFederated EDI requirements include the 810 Invoice, 820 Remittance Advice, 846 Inventory Inquiry/Advice, 850 Purchase Order, 852 Product Activity Data, 856 Advanced Ship Notice and 997 Functional Acknowledge. If EDI seems too complicated and expensive, you can have CovalentWorks take care of all the headaches associated with<a href="https://www.covalentworks.com/trading-partners/"> Federated EDI.</a>\r\n</p>\r\n<p>\r\nFederated has three kinds of Advance Ship Notice EDI transactions. The Standard Carton Pack specifies shipment, tare, order, pack and item. The Pick and Pack specifies shipment, order, pack and item. The Drop Ship Advance Ship Notice is simpler because it describes a shipment that goes directly to a consumer rather than to a distribution center or specific store. Most suppliers to <a href="http://www.macys.com/">www.macys.com</a> must support the Drop Ship Advance Ship Notice and special packing slips forms.\r\n</p>\r\n<p>\r\n<a href="https://www.covalentworks.com/macys/">Macys EDI</a> requirements and <a href="https://www.covalentworks.com/bloomingdales/">Bloomingdales EDI</a> requirements all fall under the Federated EDI standards umbrella and are the same.\r\n</p>\r\n<h4> Office Products EDI requirements </h4>\r\n<p>\r\nLed by the largest retailer of office products, Office Depot, EDI is a requirement for virtually every supplier in the office products supply chain.\r\n</p>\r\n<p>\r\nOther major retailers such as Staples, and Office Max require EDI capability. So do wholesale companies like S. P. Richards and United Stationers; buying groups like Independent Stationers and Tri Mega; as well as manufactures including Ampad. \r\n</p>\r\n<p>\r\nRetailer Office Depot mandates that their suppliers exchange EDIpurchase orders, advance ship notices and invoices with them. Learn more about Office Depot EDI requirements at <a href="https://www.covalentworks.com/office-depot/">Office Depot</a> and about an easy-to-use EDI solution at Office Depot EDI .\r\n</p>\r\n<p>\r\nWholesale company S. P. Richards'' EDI requirements include the same three transaction types for their suppliers. However, smaller volume suppliers may get an exemption and not have send advance ship notices. More about S. P. Richards EDI can be found at <a href="https://www.covalentworks.com/trading-partners/"> S. P. Richards EDI.</a>\r\n</p>\r\n<p>\r\nManufactures have also been adopting EDI. Ampad, for example, sends their suppliers EDI purchase orders and requires EDI advance ship notices be sent to them. They pay on receipt though and suppliers do not have to send EDI invoices. \r\n</p>\r\n<p>\r\nTransmission of EDI transactions is done via VAN (Value Added Network) with all of the companies discussed so far. Some, such as Office Depot and Staples also offer suppliers the option of communication via AS/2, which is a secure communication method over the internet. \r\n</p>\r\n<p>\r\nOf course other retailers with efficient supply chains such as discount retailers Wal-Mart, Target, and CostCo, grocery stores Albertsons, Kroger, Meijer, Publix, and Shaws; and drugstores CVS and Walgreens all require their office products vendors to be EDI compliant. I will discuss these stores'' EDI requirements in future blog posts.\r\n</p>', 1, '', '', '', '2016-07-26 11:30:00', 'admin', '2016-07-09 19:25:35', 'admin'),
(3, 2, '1470397726_image-13.jpg', 'testttttttttttttttttttttttttttt', ' What is EDI (Electronic Data Interchange)?', '<p>\r\nWhat is EDI? Electronic Data Interchange (EDI) is the computer-to-computer exchange of business documents in a standard electronic format between business partners.</p>\r\n<p>By moving from a paper-based exchange of business document to one that is electronic, businesses enjoy major benefits such as reduced cost, increased processing speed, reduced errors and improved relationships with business partners. Learn more about the benefits of EDI <a href="http://www.edibasics.com/benefits-of-edi/"> here. >></a></p>\r\n<p>Each term in the definition is significant:</p>\r\n<p><strong>Computer-to-computer-</strong> EDI replaces postal mail, fax and email. While email is also an electronic approach, the documents exchanged via email must still be handled by people rather than computers. Having people involved slows down the processing of the documents and also introduces errors. Instead, EDI documents can flow straight through to the appropriate application on the receiver''s computer (e.g., the Order Management System) and processing can begin immediately. A typical manual process looks like this, with lots of paper and people involvement:</p>\r\n<p>Business documents - These are any of the documents that are typically exchanged between businesses. The most common documents exchanged via EDI are purchase orders, invoices and advance ship notices. But there are many, many others such as bill of lading, customs documents, inventory documents, shipping status documents and payment documents.\r\nStandard format- Because EDI documents must be processed by computers rather than humans, a standard format must be used so that the computer will be able to read and understand the documents. A standard format describes what each piece of information is and in what format (e.g., integer, decimal, mmddyy). Without a standard format, each company would send documents using its company-specific format and, much as an English-speaking person probably doesn''t understand Japanese, the receiver''s computer system doesn''t understand the company-specific format of the sender''s format.\r\n</p>\r\n\r\n<ul>\r\n<li>\r\nThere are several EDI standards in use today, including ANSI, EDIFACT, TRADACOMS and ebXML. And, for each standard there are many different versions, e.g., ANSI 5010 or EDIFACT version D12, Release A. When two businesses decide to exchange EDI documents, they must agree on the specific EDI standard and version.\r\n</li>\r\n<li>\r\nBusinesses typically use an EDI translator - either as in-house software or via an EDI service provider - to translate the EDI format so the data can be used by their internal applications and thus enable straight through processing of documents.</li>\r\n</ul>\r\n\r\n<p>Business partners - The exchange of EDI documents is typically between two different companies, referred to as business partners or trading partners. For example, Company A may buy goods from Company B. Company A sends orders to Company B. Company A and Company B are business partners.\r\n</p>', 1, 'blog detail title', 'blog detail keyword', 'blog detail description', '2016-08-03 18:02:44', 'admin', '2016-08-12 18:31:19', 'admin'),
(4, 3, '1470397701_image-11.jpg', 'testttttttttttttttttttttttttttt', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectet ur adipiscing elit. Donec nisl urna, porta eu vulputate eu, scelerisque vel turpis. Lorem ips um dolor sit amet, consectetur adipiscing elit. Donec nisl urna, porta eu. Maece nas a hendrerit dolor. Praesent auctor at justo lo bortis tincidunt. Vivamus diam lacus, interdum nec fringilla ac, tincidunt vitae mauris.</p>\r\n\r\n<p>Duis ac sem elit. Etiam ac varius nisl, sed convallis lorem. Fusce non lacus sapien. Phasellus gravida molestie lobortis. Etiam at mattis arcu, ut volutpat massa. In commodo felis condimentum ex feugiat tincidunt. Maecenas sed arcu eros. Mauris pellentesque mauris in ligula pulvinar, imperdiet iaculis ligula finibus. Pellentesque ac erat ac ligula gravida condimentum at eget eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed est erat. Ut sollicitudin scelerisque lectus, nec ultricies augue suscipit a. Duis lacinia pellentesque vehicula.</p>', 1, '', '', '', '2015-08-04 12:44:06', 'admin', '2015-08-05 17:18:21', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_blog_category`
--

CREATE TABLE IF NOT EXISTS `sqs_blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_category` varchar(65) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(40) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sqs_blog_category`
--

INSERT INTO `sqs_blog_category` (`id`, `blog_category`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Finance Account', 1, '2016-08-02 11:30:00', 'admin', '2016-08-05 10:43:59', 'admin'),
(2, 'Business Consultance', 1, '2016-08-02 11:30:00', 'admin', '2016-08-02 11:30:00', 'admin'),
(3, 'Market Research', 1, '2016-08-02 11:30:00', 'admin', '0000-00-00 00:00:00', ''),
(4, 'SEO Social Media', 1, '2016-08-02 11:30:00', 'admin', '0000-00-00 00:00:00', ''),
(5, 'Corporate Identity', 1, '2016-08-02 11:30:00', 'admin', '0000-00-00 00:00:00', ''),
(6, 'Uncategorized', 1, '2016-08-02 11:30:00', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_client`
--

CREATE TABLE IF NOT EXISTS `sqs_client` (
  `client_id` int(111) NOT NULL AUTO_INCREMENT,
  `client_title` varchar(50) NOT NULL,
  `client_logo` varchar(100) NOT NULL,
  `client_url` varchar(150) NOT NULL,
  `client_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sqs_client`
--

INSERT INTO `sqs_client` (`client_id`, `client_title`, `client_logo`, `client_url`, `client_description`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(2, 'Inttra', '1470487981_clients-sample01.png', '', '<p>Inttra is the electronic transaction platform and information provider at the center of the ocean shipping industry. Our customers can book and track containers and submit shipping instructions within the industry''s largest e-commerce network, gaining access to 54 carriers and NVOCCs. Through Ocean Schedules, customers can select from 12 million voyages annually.\r\n</p>', 1, '2016-07-25 11:30:00', 'admin', '2016-08-06 18:23:01', 'admin'),
(3, 'Indian Railway', '1470487956_clients-sample02.png', '', '<p>\r\nIndian Railways (reporting mark IR) is a state-owned railway company, responsible for rail transport in India. It is owned and operated by the Government of India through the Ministry of Railways. It is one of the world''s largest railway networks comprising 115,000 km (71,000 mi) of track over a route of 67,312 km (41,826 mi) and 7,112 stations.[3] In 2015-16, IR carried 8.101 billion passengers annually or more than 22 million passengers a day and 1.107 billion tons of freight in the year. In 2014-2015 Indian Railways had revenues of ?1.709 trillion (US$25 billion) which consists of ?1.118 trillion (US$17 billion) from freight and ?451.26 billion (US$6.7 billion) from passengers tickets.[2]\r\n</p>', 1, '2016-07-28 11:30:00', 'admin', '2016-08-06 18:22:36', 'admin'),
(4, 'Ericsson', 'ericsson-logo.png', '', '<p>\r\nOver the past 140 years, Ericsson has been at the forefront of communications technology. Today, we are committed to maximizing customer value by continuously evolving our business portfolio and leading the ICT industry. \r\n</p>\r\n<p>\r\nWe are a global leader in delivering ICT solutions. In fact, 40% of the world''s mobile traffic is carried over Ericsson networks. We have customers in over 180 countries and comprehensive industry solutions ranging from Cloud services and Mobile Broadband to Network Design and Optimization.\r\n</p>\r\n<p>\r\nOur services, software and infrastructure - especially in mobility, broadband and the cloud - are enabling the communications industry and other sectors to do better business, increase efficiency, improve user experience and capture new opportunities. \r\n</p>\r\n<p>\r\nEricsson has one of the industry''s strongest patent portfolios with a total count of over 39,000. R&D is at the heart of our business and approximately 23,700 employees are dedicated to our R&D activities. This commitment to R&D allows us to drive forward our vision for a Networked Society - one where everyone and everything is connected in real time - enabling new ways to collaborate, share and get informed.\r\n</p>', 1, '2016-07-28 11:30:00', 'admin', '2016-08-06 18:20:56', 'admin'),
(5, 'Aircel', '1470652745_clients-sample04.png', '', '<p>\r\nAircel is India''s fifth largest and fastest growing GSM mobile service provider with a subscriber base of 65.1 million. Aircel is a pan India operator with a presence across 23 circles. The company offers voice & data services ranging from postpaid and prepaid plans, 2G and 3G services, Broadband Wireless Access (BWA), Long Term Evolution (LTE) to Value-Added-Services (VAS). In addition to providing premium internet access solutions to facilitate data intensive live streaming applications, the company has also paved the way to be amongst the first to offer 3G and 4G LTE services to customers.\r\n</p>', 1, '2016-07-28 11:30:00', 'admin', '2016-08-08 16:09:05', 'admin'),
(6, 'ICICI Bank', '1470652967_clients-sample05.png', '', '<p>\r\nICICI Bank is India''s largest private sector bank with total assets of Rs. 7,206.95 billion (US$ 109 billion) at March 31, 2016 and profit after tax Rs. 97.26 billion (US$ 1,468 million) for the year ended March 31, 2016. ICICI Bank currently has a network of 4,450 Branches and 14,393 ATM''s across India.\r\n</p>', 1, '2016-07-28 11:30:00', 'admin', '2016-08-08 16:12:47', 'admin'),
(7, 'Airtel', '1470652922_clients-sample06.png', '', '<p>\r\n Bharti Airtel Limited is a leading global telecommunications company with operations in 20 countries across Asia and Africa. Headquartered in New Delhi, India, the company ranks amongst the top 4 mobile service providers globally in terms of subscribers. In India, the company''s product offerings include 2G, 3G and 4G wireless services, mobile commerce, fixed line services, high speed DSL broadband, IPTV, DTH, enterprise services including national & international long distance services to carriers. In the rest of the geographies, it offers 2G, 3G wireless services and mobile commerce. Bharti Airtel had over 307 million customers across its operations at the end of November 2014.\r\n</p>', 1, '2016-07-28 11:30:00', 'admin', '2016-08-08 16:12:02', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_gallery`
--

CREATE TABLE IF NOT EXISTS `sqs_gallery` (
  `gallery_id` int(111) NOT NULL AUTO_INCREMENT,
  `gallery_type` varchar(20) NOT NULL,
  `gallery_url` varchar(150) NOT NULL,
  `image_name` varchar(25) NOT NULL,
  `gallery_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sqs_gallery`
--

INSERT INTO `sqs_gallery` (`gallery_id`, `gallery_type`, `gallery_url`, `image_name`, `gallery_description`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(2, '1', '1470318008_1470312379_image-4.jpg', 'test12', '', 1, '2016-07-26 11:30:00', 'admin', '2016-08-05 10:13:03', 'admin'),
(3, '1', '1470318027_1470312356_image-11.jpg', 'test13', '', 1, '2016-07-26 11:30:00', 'admin', '2016-08-05 10:13:15', 'admin'),
(4, '1', '1470318108_1470312333_image-8.jpg', 'test11', '', 1, '2016-08-04 19:11:48', 'admin', '2016-08-05 10:12:53', 'admin'),
(5, '2', '1470318142_1470312062_image-1.jpg', 'test23', '', 1, '2016-08-04 19:12:22', 'admin', '2016-08-05 10:14:08', 'admin'),
(6, '2', '1470318162_1470312088_image-2.jpg', 'test22', '', 1, '2016-08-04 19:12:42', 'admin', '2016-08-05 10:13:53', 'admin'),
(7, '2', '1470318234_1470312293_image-7.jpg', 'test21', '', 1, '2016-08-04 19:13:54', 'admin', '2016-08-05 10:13:41', 'admin'),
(8, '2', '1470318256_1470312315_image-9.jpg', 'test14', '', 1, '2016-08-04 19:14:16', 'admin', '2016-08-05 10:13:26', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_gallery_type`
--

CREATE TABLE IF NOT EXISTS `sqs_gallery_type` (
  `gal_typ_id` int(11) NOT NULL AUTO_INCREMENT,
  `gal_typ_name` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(30) NOT NULL,
  PRIMARY KEY (`gal_typ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sqs_gallery_type`
--

INSERT INTO `sqs_gallery_type` (`gal_typ_id`, `gal_typ_name`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'Gallery one', 1, '2016-08-03 11:30:00', 'admin', '0000-00-00 00:00:00', ''),
(2, 'Gallery two', 1, '2016-08-03 11:30:00', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_job_application`
--

CREATE TABLE IF NOT EXISTS `sqs_job_application` (
  `applic_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_profile` varchar(50) NOT NULL,
  `job_profile_id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `experiance` varchar(20) NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicatio_doc` varchar(50) NOT NULL,
  PRIMARY KEY (`applic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sqs_job_application`
--

INSERT INTO `sqs_job_application` (`applic_id`, `job_profile`, `job_profile_id`, `name`, `email`, `experiance`, `posted_on`, `applicatio_doc`) VALUES
(2, 'PHP Developer', 1, 'Niraj', 'nks146@gmail.com', '2 year', '2016-08-08 18:08:35', '1470659915_childmbp_benefits-(1).pdf'),
(3, 'PHP Developer', 1, 'ratnesh', 'nks146@gmail.com', '6 Year', '2016-08-09 09:30:47', '1470715247_childmbp_benefits-(1).pdf'),
(4, 'PHP Developer', 1, 'Niraj', 'nks146@gmail.com', '2 year', '2016-08-09 15:55:30', '1470738330_childmbp_benefits-(1).pdf'),
(5, 'PHP Developer', 1, 'Niraj', 'nks146@gmail.com', '2 year', '2016-08-09 16:05:48', '1470738948_childmbp_benefits-(1).pdf'),
(6, 'PHP Developer', 1, 'Niraj', 'nks146@gmail.com', '2 year', '2016-08-09 17:03:10', '1470742390_childmbp_benefits-(1).pdf'),
(7, 'PHP Developer', 1, 'Niraj Singh', 'nks146@gmail.com', '2 year', '2016-08-09 17:35:51', '1470744351_childmbp_benefits-(1).pdf'),
(8, 'PHP Developer', 1, 'Niraj Singh', 'nks146@gmail.com', '2 year', '2016-08-09 17:48:56', '1470745136_childmbp_benefits-(1).pdf'),
(9, 'PHP Developer', 1, 'Niraj Singh', 'nks146@gmail.com', '2 year', '2016-08-09 18:03:16', '1470745996_childmbp_benefits-(1).pdf'),
(10, 'PHP Developer', 1, 'Niraj Singh', 'nks146@gmail.com', '2 year', '2016-08-11 16:23:04', '1470912784_childmbp_benefits-(1).pdf'),
(11, 'PHP Developer', 1, 'Niraj Singh', 'nks146@gmail.com', '2 year', '2016-08-19 10:43:40', '1471583620_childmbp_benefits-(1).pdf'),
(12, 'PHP Developer', 1, 'Niraj Singh', 'nks146@gmail.com', '2 year', '2016-08-19 10:48:31', '1471583911_childmbp_benefits-(1).pdf'),
(13, 'PHP Developer', 1, 'Niraj Singh', 'nks146@gmail.com', '2 year', '2016-08-19 11:00:12', '1471584611_childmbp_benefits-(1).pdf'),
(14, 'PHP Developer', 1, 'www', 'nks146@gmail.com', '2 year', '2016-08-20 12:44:25', '1471677265_childmbp_benefits-(1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_management`
--

CREATE TABLE IF NOT EXISTS `sqs_management` (
  `manag_id` int(11) NOT NULL AUTO_INCREMENT,
  `manag_name` varchar(35) NOT NULL,
  `manag_desig` varchar(40) NOT NULL,
  `manag_image` varchar(40) NOT NULL,
  `manag_desc` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(20) NOT NULL,
  PRIMARY KEY (`manag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sqs_management`
--

INSERT INTO `sqs_management` (`manag_id`, `manag_name`, `manag_desig`, `manag_image`, `manag_desc`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(2, 'Brandon Clark', 'Founder & CEO', '1469708333_image-1.jpg', 'Lorem ipsum dolor sit amet, conse ctet ur adipisc ing elit. Donec nisl urna, porta eu vulputate eu, sceleris que vel turpis vel tristique dolor.', 1, '2016-07-27 11:30:00', 'admin', '2016-07-27 11:30:00', 'admin'),
(3, 'Jason Brian Smith', 'Finance Consultant', '1469708653_image-2.jpg', 'Quisque a ipsum nunc. Morbi pellentesque, purus vel tristique vulputate, risus nisl scelerisque arcu, id facil isis tellus ipsum a purus amet.', 1, '2016-07-27 11:30:00', 'admin', '0000-00-00 00:00:00', ''),
(4, 'Martin Hernandez', 'HR & Marketing', '1469708894_image-3.jpg', 'Tellus ipsum a purus. Fusce dictum enim sit amet leo convallis, vel suscipit sem placerat. Aenean eget mi mollis, sagittis purus sit amet.', 1, '2016-07-27 11:30:00', 'admin', '2016-07-27 11:30:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_mediacenter`
--

CREATE TABLE IF NOT EXISTS `sqs_mediacenter` (
  `media_id` int(111) NOT NULL AUTO_INCREMENT,
  `media_image` varchar(100) NOT NULL,
  `media_url` varchar(150) NOT NULL,
  `media_title` varchar(100) NOT NULL,
  `media_content` text NOT NULL,
  `media_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sqs_mediacenter`
--


-- --------------------------------------------------------

--
-- Table structure for table `sqs_meta_seo`
--

CREATE TABLE IF NOT EXISTS `sqs_meta_seo` (
  `meta_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(75) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sqs_meta_seo`
--

INSERT INTO `sqs_meta_seo` (`meta_id`, `page_name`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_on`, `created_by`) VALUES
(1, 'home_page', 'home_page title', 'home_page keyword', 'home test description', 1, '2016-08-09 11:30:00', 'admin'),
(2, 'about_page', 'About us Title', 'about keyword', 'About us description', 1, '2016-08-09 11:30:00', 'admin'),
(3, 'services_page', 'services test', 'services keyword', 'services description', 1, '2016-08-09 11:30:00', 'admin'),
(4, 'client_page', 'client test', 'client keyword', 'client description', 1, '2016-08-09 11:30:00', 'admin'),
(5, 'partner_page', 'partners test', 'partners keyword', 'partners description', 1, '2016-08-09 11:30:00', 'admin'),
(6, 'travel_page', 'travel test', 'travel keyword', 'travel description', 1, '2016-08-09 11:30:00', 'admin'),
(7, 'rfq_page', 'rfq test', 'rfq keyword', 'rfq description', 1, '2016-08-09 11:30:00', 'admin'),
(8, 'gallery_page', 'gallery test', 'gallery keyword', 'gallery description', 1, '2016-08-09 11:30:00', 'admin'),
(9, 'contact_page', 'contactus test', 'contactus keyword', 'contactus description', 1, '2016-08-09 11:30:00', 'admin'),
(10, 'blog_page', 'blog test', 'blog keyword', 'blog description', 1, '2016-08-09 11:30:00', 'admin'),
(11, 'career_page', 'career test', 'career keyword', 'career description', 1, '2016-08-09 11:30:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_news`
--

CREATE TABLE IF NOT EXISTS `sqs_news` (
  `news_id` int(255) NOT NULL AUTO_INCREMENT,
  `newscat_id` int(255) NOT NULL,
  `news_image` varchar(150) NOT NULL,
  `news_url` varchar(200) NOT NULL,
  `news_title` varchar(150) NOT NULL,
  `news_descr` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sqs_news`
--


-- --------------------------------------------------------

--
-- Table structure for table `sqs_news_category`
--

CREATE TABLE IF NOT EXISTS `sqs_news_category` (
  `newscat_id` int(255) NOT NULL AUTO_INCREMENT,
  `news_category` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`newscat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sqs_news_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `sqs_partners`
--

CREATE TABLE IF NOT EXISTS `sqs_partners` (
  `part_id` int(100) NOT NULL AUTO_INCREMENT,
  `part_title` varchar(50) NOT NULL,
  `part_logo` varchar(255) NOT NULL,
  `part_link` varchar(150) NOT NULL,
  `part_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(20) NOT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `sqs_partners`
--

INSERT INTO `sqs_partners` (`part_id`, `part_title`, `part_logo`, `part_link`, `part_description`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(5, 'Airtel', 'airtel.png', '', '<p>\r\n Bharti Airtel Limited is a leading global telecommunications company with operations in 20 countries across Asia and Africa. Headquartered in New Delhi, India, the company ranks amongst the top 4 mobile service providers globally in terms of subscribers. In India, the company''s product offerings include 2G, 3G and 4G wireless services, mobile commerce, fixed line services, high speed DSL broadband, IPTV, DTH, enterprise services including national & international long distance services to carriers. In the rest of the geographies, it offers 2G, 3G wireless services and mobile commerce. Bharti Airtel had over 307 million customers across its operations at the end of November 2014.\r\n</p>', 1, '2016-07-25 11:30:00', 'admin', '2016-08-06 18:18:37', 'admin'),
(16, 'Aircel', 'aircel.png', '', '<p>\r\nAircel is India''s fifth largest and fastest growing GSM mobile service provider with a subscriber base of 65.1 million. Aircel is a pan India operator with a presence across 23 circles. The company offers voice & data services ranging from postpaid and prepaid plans, 2G and 3G services, Broadband Wireless Access (BWA), Long Term Evolution (LTE) to Value-Added-Services (VAS). In addition to providing premium internet access solutions to facilitate data intensive live streaming applications, the company has also paved the way to be amongst the first to offer 3G and 4G LTE services to customers.\r\n</p>', 1, '2016-07-29 14:23:33', 'admin', '2016-08-06 18:16:56', 'admin'),
(17, 'Ericsson', 'ericsson-logo.png', '', '<p>\r\nOver the past 140 years, Ericsson has been at the forefront of communications technology. Today, we are committed to maximizing customer value by continuously evolving our business portfolio and leading the ICT industry. \r\n</p>\r\n<p>\r\nWe are a global leader in delivering ICT solutions. In fact, 40% of the world''s mobile traffic is carried over Ericsson networks. We have customers in over 180 countries and comprehensive industry solutions ranging from Cloud services and Mobile Broadband to Network Design and Optimization.\r\n</p>\r\n<p>\r\nOur services, software and infrastructure - especially in mobility, broadband and the cloud - are enabling the communications industry and other sectors to do better business, increase efficiency, improve user experience and capture new opportunities. \r\n</p>\r\n<p>\r\nEricsson has one of the industry''s strongest patent portfolios with a total count of over 39,000. R&D is at the heart of our business and approximately 23,700 employees are dedicated to our R&D activities. This commitment to R&D allows us to drive forward our vision for a Networked Society - one where everyone and everything is connected in real time - enabling new ways to collaborate, share and get informed.\r\n</p>', 1, '2016-07-29 14:33:51', 'admin', '2016-08-06 18:18:55', 'admin'),
(18, 'ICICI Bank', 'ICICI-Bank-.png', '', '<p>\r\nICICI Bank is India''s largest private sector bank with total assets of Rs. 7,206.95 billion (US$ 109 billion) at March 31, 2016 and profit after tax Rs. 97.26 billion (US$ 1,468 million) for the year ended March 31, 2016. ICICI Bank currently has a network of 4,450 Branches and 14,393 ATM''s across India.\r\n</p>', 1, '2016-07-29 14:35:00', 'admin', '2016-08-06 18:19:19', 'admin'),
(19, 'Indian Railway', 'indian-railway.png', '', '<p>\r\nIndian Railways (reporting mark IR) is a state-owned railway company, responsible for rail transport in India. It is owned and operated by the Government of India through the Ministry of Railways. It is one of the world''s largest railway networks comprising 115,000 km (71,000 mi) of track over a route of 67,312 km (41,826 mi) and 7,112 stations.[3] In 2015-16, IR carried 8.101 billion passengers annually or more than 22 million passengers a day and 1.107 billion tons of freight in the year. In 2014-2015 Indian Railways had revenues of ?1.709 trillion (US$25 billion) which consists of ?1.118 trillion (US$17 billion) from freight and ?451.26 billion (US$6.7 billion) from passengers tickets.[2]\r\n</p>', 1, '2016-07-29 14:35:53', 'admin', '2016-08-06 18:19:38', 'admin'),
(20, 'Inttra', 'inttra-logo.png', '', '<p>Inttra is the electronic transaction platform and information provider at the center of the ocean shipping industry. Our customers can book and track containers and submit shipping instructions within the industry''s largest e-commerce network, gaining access to 54 carriers and NVOCCs. Through Ocean Schedules, customers can select from 12 million voyages annually.\r\n</p>', 1, '2016-07-29 14:36:56', 'admin', '2016-08-06 18:19:58', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_post_job`
--

CREATE TABLE IF NOT EXISTS `sqs_post_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(40) NOT NULL,
  `job_detail` text NOT NULL,
  `location` varchar(40) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sqs_post_job`
--

INSERT INTO `sqs_post_job` (`job_id`, `job_title`, `job_detail`, `location`, `experience`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'EDI Specialist', '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Job Details</th>\r\n			<td>Placement in Chennai, Bengaluru or Pune. Roles in Testing and Application Support &amp; Maintenance - Java/.Net</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th>Salary</th>\r\n			<td>Minimum salary of 2.1 lakh p.a.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Eligibility</th>\r\n			<td>B.Sc. (CS, IT, Electronics, Maths, Physics, Statistics) or B.C.A<br />\r\n			Minimum of 60% in 10th, 12th &amp; Graduation<br />\r\n			No arrears and No gap in education<br />\r\n			Only 2016 Graduates<br />\r\n			Should not be more than 24 years of Age as of 1st August, 2016<br />\r\n			Applicants should walk-in and clear the Assessment Test conducted by Siqes TalentCare.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'Noida', '2-4Year', 1, 'career detail title', 'career detail keyword', 'career detail description', '2016-11-29 10:56:59', 'admin', '2016-08-12 18:32:43', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_product`
--

CREATE TABLE IF NOT EXISTS `sqs_product` (
  `prod_id` int(111) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL,
  `prod_image` varchar(100) NOT NULL,
  `prod_shortdesc` varchar(255) NOT NULL,
  `prod_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sqs_product`
--

INSERT INTO `sqs_product` (`prod_id`, `prod_name`, `prod_image`, `prod_shortdesc`, `prod_description`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(4, 'test product two', '1469519430_insta-exhibitions.gif', 'testttttttttttttttttttttttttttttt', 'testtttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-07-25 11:30:00', 'admin', '0000-00-00 00:00:00', ''),
(5, 'test product two', '1469521263_conscient.gif', 'testttttttttttttttttttttttttttttt', 'testttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-07-25 11:30:00', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_rfq`
--

CREATE TABLE IF NOT EXISTS `sqs_rfq` (
  `rfq_id` int(11) NOT NULL AUTO_INCREMENT,
  `rfq_name` varchar(40) NOT NULL,
  `rfq_email` varchar(50) NOT NULL,
  `rfq_phone` varchar(15) NOT NULL,
  `rfq_query` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rfq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `sqs_rfq`
--

INSERT INTO `sqs_rfq` (`rfq_id`, `rfq_name`, `rfq_email`, `rfq_phone`, `rfq_query`, `status`, `created_on`) VALUES
(1, 'Niraj', 'niraj.kumar@vibescom.in', '09540975080', 'testttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-07-29 16:37:38'),
(2, 'Niraj', 'nks146@gmail.com', '09540975080', 'test queryyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 1, '2016-07-29 18:15:09'),
(3, 'Niraj', 'nks146@gmail.com', '09540975080', 'testttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-07-29 18:22:49'),
(4, 'Anubhav', 'nks146@gmail.com', '9540975080', 'testttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-08 10:03:31'),
(5, 'Niraj', 'nks146@gmail.com', '9540975080', 'testabcdefghijjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1, '2016-08-08 16:35:31'),
(6, 'Niraj', 'nks146@gmail.com', '9540975080', 'testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-09 14:49:10'),
(7, 'ratnesh', 'nks146@gmail.com', '9540975080', 'testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-09 15:05:59'),
(8, 'aaaa', 'nks146@gmail.com', '9540975080', 'testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-09 15:08:16'),
(9, 'Niraj', 'nks146@gmail.com', '9540975080', 'testttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-09 15:32:57'),
(10, 'Niraj', 'nks146@gmail.com', '9540975080', 'testttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-09 17:04:29'),
(11, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'Testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt\r\nttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-09 17:36:29'),
(12, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 1, '2016-08-09 17:48:25'),
(13, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'testtttttttttttttttttttttttttt', 1, '2016-08-09 18:02:47'),
(14, 'Anubhav', 'anubhav@vibescom.in', '9540975080', 'test', 1, '2016-08-09 19:12:48'),
(15, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'Testttttttt query', 1, '2016-08-11 16:22:04'),
(16, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'test', 1, '2016-08-19 11:00:51'),
(17, '.in', 'nks146@gmail.com', '9540975080', 'jskk', 1, '2016-08-20 11:29:44'),
(18, 'aaaa', 'nks146@gmail.com', '9540975080', 'test', 1, '2016-08-20 12:19:42'),
(19, 'Niraj Singh', 'nks146@gmail.com', '+91 120 47820', 'test', 1, '2016-08-20 12:43:40'),
(20, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'llllllllllllllll', 1, '2016-08-27 15:53:42'),
(21, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'testyyyyyyyyyyyyyyy', 1, '2016-08-27 15:54:37'),
(22, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'kkdjkdmmd', 1, '2016-08-27 15:56:23'),
(23, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'mmmmmmmmmmmmmmm', 1, '2016-08-27 15:57:41'),
(24, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'bbbbbbbbbbbbbbbb', 1, '2016-08-27 16:01:12'),
(25, 'Niraj Singh', 'nks146@gmail.com', '9540975080', 'pppppppppppppppppppp', 1, '2016-08-27 16:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_services`
--

CREATE TABLE IF NOT EXISTS `sqs_services` (
  `serv_id` int(100) NOT NULL AUTO_INCREMENT,
  `serv_title` varchar(50) NOT NULL,
  `serv_image` varchar(150) NOT NULL,
  `serv_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(20) NOT NULL,
  PRIMARY KEY (`serv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sqs_services`
--

INSERT INTO `sqs_services` (`serv_id`, `serv_title`, `serv_image`, `serv_description`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(3, 'service', '1469514672_arab_tec_small.jpg', 'testtttttttttttttttttttttttttttttttttttt', 1, '2016-06-30 11:30:00', 'admin', '2016-07-25 11:30:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_sitemanagement`
--

CREATE TABLE IF NOT EXISTS `sqs_sitemanagement` (
  `site_id` int(111) NOT NULL AUTO_INCREMENT,
  `sitephone_no` varchar(50) NOT NULL,
  `site_address` varchar(200) NOT NULL,
  `site_email` varchar(50) NOT NULL,
  `site_copyright` varchar(50) NOT NULL,
  `site_twitter` varchar(200) NOT NULL,
  `site_facebook` varchar(200) NOT NULL,
  `site_linkdin` varchar(200) NOT NULL,
  `site_pinterest` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sqs_sitemanagement`
--

INSERT INTO `sqs_sitemanagement` (`site_id`, `sitephone_no`, `site_address`, `site_email`, `site_copyright`, `site_twitter`, `site_facebook`, `site_linkdin`, `site_pinterest`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, '+91 120 4782000,  +91 120 4782030', 'SDF K-9, NSEZ Phase-II, Noida, UP - 201305  ', 'info@siqes.com', 'Â© 2016 SIQES.. All rights reserved', '', '', '', '', 1, '2016-07-27 05:09:50', '', '2016-08-09 18:18:27', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_subscribe`
--

CREATE TABLE IF NOT EXISTS `sqs_subscribe` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `subs_email` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sqs_subscribe`
--

INSERT INTO `sqs_subscribe` (`id`, `subs_email`, `status`, `created_on`) VALUES
(1, 'nks146@gmail.com', 1, '2016-08-19 00:34:32'),
(2, 'ff@ss.com', 0, '2016-08-12 05:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `sqs_testimonials`
--

CREATE TABLE IF NOT EXISTS `sqs_testimonials` (
  `testimo_id` int(50) NOT NULL AUTO_INCREMENT,
  `testimo_name` varchar(50) NOT NULL,
  `testimo_designation` varchar(50) NOT NULL,
  `testimo_comp` varchar(30) NOT NULL,
  `testimo_image` varchar(50) NOT NULL,
  `testimo_statement` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(25) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(25) NOT NULL,
  PRIMARY KEY (`testimo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sqs_testimonials`
--

INSERT INTO `sqs_testimonials` (`testimo_id`, `testimo_name`, `testimo_designation`, `testimo_comp`, `testimo_image`, `testimo_statement`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(3, 'Rahul Shariyar, ICICI', 'ICICI Partner', 'ICI', '1470398187_1470389951_image-4.jpg', 'My experience with Siqes has been really good. System designed had been as per developed as per requirements.', 1, '2016-07-27 11:30:00', 'admin', '2016-08-09 18:26:55', 'admin'),
(4, 'Amit Gupta, Aircel', 'Managing Director', 'Aircel', '1470398116_1470389399_image-1.jpg', 'We had been struggling on getting a company who can manage our QA Services, until we found SIQES.', 1, '2016-08-05 17:25:16', 'admin', '2016-08-09 18:26:40', 'admin'),
(5, 'Parul Sharma, Airtel', 'Human Resources', 'Airtel', '1470398187_1470389951_image-4.jpg', 'Extremely satisfied with QA Services of SIQES. Highly recommended.', 1, '2016-08-05 17:27:24', 'admin', '0000-00-00 00:00:00', '');
