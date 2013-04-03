-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost:3306
-- Generation Time: Apr 07, 2008 at 11:08 AM
-- Server version: 5.0.37
-- PHP Version: 4.3.10
-- 
-- Database: `ethiomirror`
-- 
CREATE DATABASE `ethiomirror`;
USE `ethiomirror`;

-- --------------------------------------------------------

-- 
-- Table structure for table `blogs`
-- 

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL auto_increment,
  `blog` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `blogs`
-- 

INSERT INTO `blogs` (`id`, `blog`, `url`) VALUES 
(1, 'Bewketu Seyoum', ''),
(2, 'Tedla Gebre-Eyesus', ''),
(3, 'Abiy Teklemariam', ''),
(4, 'Abraham Wolde', ''),
(5, 'Environment', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `category` varchar(30) NOT NULL default '',
  `description` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` (`id`, `category`, `description`) VALUES 
(12, 'Sports', ''),
(13, 'Entertainment', ''),
(14, 'Arts', ''),
(15, 'Life', ''),
(16, 'Travel and Tour', ''),
(17, 'Science and Technology', ''),
(18, 'Business', ''),
(19, 'Environment', ''),
(21, 'Big Interview', ''),
(22, 'History', ''),
(23, 'Not specified', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `news`
-- 

CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `headline` varchar(100) NOT NULL default '',
  `body` varchar(150) NOT NULL default '',
  `keyword` varchar(255) NOT NULL default '',
  `media1` varchar(150) NOT NULL default '',
  `media2` varchar(150) NOT NULL default '',
  `media3` varchar(150) NOT NULL default '',
  `media4` varchar(150) NOT NULL default '',
  `media5` varchar(150) NOT NULL default '',
  `section` int(11) NOT NULL default '0',
  `posteddate` date NOT NULL default '0000-00-00',
  `lastmodified` date NOT NULL default '0000-00-00',
  `reporter` int(11) NOT NULL default '0',
  `postedby` int(11) NOT NULL default '0',
  `category` int(11) NOT NULL default '0',
  `subcategory` int(11) NOT NULL default '0',
  `ispublished` tinyint(1) NOT NULL default '1',
  `show` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `reporter` (`reporter`),
  KEY `postedby` (`postedby`),
  KEY `category` (`category`),
  KEY `subcategory` (`subcategory`),
  KEY `section` (`section`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

-- 
-- Dumping data for table `news`
-- 

INSERT INTO `news` (`id`, `headline`, `body`, `keyword`, `media1`, `media2`, `media3`, `media4`, `media5`, `section`, `posteddate`, `lastmodified`, `reporter`, `postedby`, `category`, `subcategory`, `ispublished`, `show`) VALUES 
(1, 'The Begena Puzzle', 'files/news/the begena puzzle/news.txt', 'Begena Puzzle Alemu Aga St. John''s Church music the shy instrument Ethiopian music Yared Music Institute Ethiopian Orthodox Church King David Palestine ten-stringed musical instrument 1990', 'files/news/the begena puzzle/images/begena.jpg', '', '', '', '', 1, '2007-10-07', '2007-12-06', 5, 1, 23, 1, 1, 1),
(2, 'Ababa Tesfaye''s Great Journey', 'files/news/ababa tesfaye''s great jorny/news.txt', 'Ethiopia''s answer to mister Rogers Ethiopian children Ababa Tesfaye Ginir and Elkere Ato Desta and Ato Yofthe Niguse Ato Menberework Hailu ETV Haileselassie Samuel Ferenj', 'files/news/ababa tesfaye''s great jorny/images/AbabaTesfaye1.jpg', '', '', '', '', 9, '2007-10-08', '2007-12-03', 5, 1, 14, 1, 1, 1),
(4, 'A nation on the verge of insanity?', 'files/news/A nation on the verge of insanity/news.txt', 'chat qat A nation on the verge of insanity drugs and alchol', 'files/news/A nation on the verge of insanity/images/CHAT.jpg', '', '', '', '', 3, '2007-10-14', '2007-10-14', 5, 1, 15, 10, 1, 1),
(5, 'Seeing Red - Addis Ababa''s Architecture', 'files/news/Seeing Red - Addis Ababa''s Architecture/news.txt', 'Addis Ababa’s architecture Gashaw Tekola Addis Ababa’s international airport Prêt-à-Porter Lex Plaza Adam’s Pavilion', 'files/news/Seeing Red - Addis Ababa''s Architecture/images/ketema.jpg', '', '', '', '', 9, '2007-10-14', '2007-10-14', 5, 1, 17, 11, 1, 1),
(6, 'Is God Capitalist?', 'files/news/Is God Capitalist/news.txt', 'Addis Ababa God of Orthodox Christianity St. Raguel’s complex Businesses', '', '', '', '', '', 9, '2007-10-14', '2007-10-14', 5, 1, 18, 12, 1, 1),
(7, 'Notes from Rimbaud country', 'files/news/Notes from Rimbaud country/news.txt', 'Harar first millennium Ahmed Ibn Ibrahim al-Gahzi(Gragn) 1870s Jugol fourth holiest city in the world Egyptian Rauf Pasha emperor Hailesellasie(then Teferi Mekonnen)', 'files/news/Notes from Rimbaud country/images/Harar.gif', '', '', '', '', 9, '2007-10-14', '2007-10-14', 5, 1, 16, 13, 1, 1),
(8, 'Fraudulent Decision.', 'files/news/Fraudulent Decision/news.txt', 'Wussane is a tear jerker like no other Indian cinema movie popular film in Addis Ababa', '', '', '', '', '', 9, '2007-10-14', '2007-12-03', 5, 1, 14, 3, 1, 1),
(9, 'Yawn! Here comes the host.', 'files/news/Yawn! Here comes the host/news.txt', 'ETV Ethiopian Idol and Debo HIV/AIDS talk shows AAU', '', '', '', '', '', 9, '2007-10-14', '2007-12-03', 5, 1, 14, 4, 1, 1),
(10, 'Unheard victims of Violence', 'files/news/Unheard victims of Violence/news.txt', 'Ethiopian Women Lawyers Association (EWLA) Kamilat''s acid attack Addis Ababa Fistula Hospital Addis Ababa University and EWLA violence', '', '', '', '', '', 2, '2007-10-14', '2007-10-14', 5, 1, 15, 9, 1, 1),
(11, 'How Astrophysics is cool', 'files/news/How Astrophysics is cool/news.txt', 'scientist Legesse Wotrou(PhD) How Astrophysics is cool', '', '', '', '', '', 9, '2007-10-14', '2007-10-14', 5, 1, 21, 15, 1, 1),
(12, 'The Fascinating story of Mahabuba', 'files/news/The Fascinating story of Mahabuba/news.txt', 'The Fascinating story of Mahabuba African slaves Prince Herman Puckler left his estate at Muskau Ethiopian girl Christian or a Muslim', '', '', '', '', '', 9, '2007-10-14', '2007-10-14', 5, 1, 22, 16, 1, 1),
(57, 'Ethiopia''s Agony: How cruel climate change may be to our country', 'files/news/1_031207113237/news.txt', 'climate change\r\ndire dawa Ethiopian scientist IPCC Intergovernmental Panel Of Climate Change\r\n', '../ethiomirror/files/news/1_031207113237/media/climatology.jpg', '', '', '', '', 9, '2007-12-03', '2007-12-28', 5, 1, 19, 12, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `otherlinks`
-- 

CREATE TABLE `otherlinks` (
  `id` int(11) NOT NULL auto_increment,
  `link` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `otherlinks`
-- 

INSERT INTO `otherlinks` (`id`, `link`, `url`) VALUES 
(1, 'Addis Fortune', 'http://www.addisfortune.com'),
(2, 'Capital', 'http://www.capitalethiopia.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `reporters`
-- 

CREATE TABLE `reporters` (
  `id` int(11) NOT NULL auto_increment,
  `fullname` varchar(40) NOT NULL default '',
  `tel` varchar(30) NOT NULL default '',
  `address` varchar(100) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `location` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `reporters`
-- 

INSERT INTO `reporters` (`id`, `fullname`, `tel`, `address`, `email`, `location`) VALUES 
(3, 'Hirut Gebreamlak', '251-11-520-2255', 'P.O. Box 1122', 'hi@ethiomirror.com', 'Addis Ababa'),
(4, 'Alemu Gebereab', '251-11-520-2255', 'P.O. Box 1122', 'ag@ethiomirror.com', 'Nazareth'),
(5, 'Not specified', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `section`
-- 

CREATE TABLE `section` (
  `id` int(11) NOT NULL auto_increment,
  `section` varchar(30) NOT NULL default '',
  `description` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `section`
-- 

INSERT INTO `section` (`id`, `section`, `description`) VALUES 
(1, 'Home-Section A', 'Top area of home page'),
(2, 'Home-Section B', ''),
(3, 'Home-Section C', ''),
(4, 'Home-Section D', ''),
(5, 'Home-Section E', ''),
(9, 'Not on Home', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `subcategory`
-- 

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL auto_increment,
  `subcategory` varchar(40) NOT NULL default '',
  `category` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `subcategory`
-- 

INSERT INTO `subcategory` (`id`, `subcategory`, `category`) VALUES 
(1, 'Music', 14),
(2, 'Books', 14),
(3, 'Movies', 14),
(4, 'Media', 14),
(6, 'Education', 15),
(7, 'Religion', 15),
(8, 'Children', 15),
(9, 'Society', 15),
(10, 'Health', 15),
(11, 'Architecture', 17);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `fullname` varchar(40) NOT NULL default '',
  `username` varchar(40) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `isadmin` tinyint(1) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `isadmin`, `active`) VALUES 
(1, 'Ethiomirror Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(4, 'Ethiomirror User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 1);
