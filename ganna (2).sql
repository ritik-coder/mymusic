-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2021 at 07:44 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ganna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `sr.` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`sr.`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sr.`, `username`, `email`, `password`) VALUES
(1, 'secure', 'hari@gmail.com', '$2y$10$lPSAdTBaSBX5ZmWyvbi09utD1zNjgaMJY0EEqLVAPdfzKsIQbtLKS'),
(17, 'a', 'a@gmail.com', '$2y$10$bsYxNSss.a2l3L1ynSrugOYuNg9RC2pwgn5sIY3D2MzR6JVHriUry');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
CREATE TABLE IF NOT EXISTS `music` (
  `sr` int(11) NOT NULL AUTO_INCREMENT,
  `music` varchar(100) NOT NULL,
  `addedby` varchar(20) NOT NULL,
  `Elbum` varchar(50) NOT NULL,
  `categery` varchar(50) NOT NULL,
  `musicpic` varchar(100) NOT NULL,
  PRIMARY KEY (`sr`),
  UNIQUE KEY `music` (`music`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`sr`, `music`, `addedby`, `Elbum`, `categery`, `musicpic`) VALUES
(38, 'aaa jaan- Aarsh Benipal .mp3', 'ritik', 'honey singh', 'top picks', 'ganna1.jpg'),
(39, '01 - Tere Sang Yaara - Rustom [DJMaza.Cool].mp3', 'ritik', 'sonu nigam', 'trending songs', 'ganna2.jpg'),
(40, '02 Baaton Ko Teri (All Is Well) Arijit Singh 190Kbps.mp3', 'ritik', 'honey singh', 'new release', 'ganna3.jpg'),
(41, '01. Love Mashup (2015) - DJ Harsh Sharma (DJJOhAL.Com).mp3', 'ritik', 'arijit singh', 'new song', 'ganna4.jpg'),
(42, 'pe rkhi h.mp3\r\n\r\n', 'ritik', 'sonu nigam', 'top picks', 'ganna5.jpg'),
(43, 'Sau Tarah Ke Dishoom.mp3', 'ritik', 'honey singh', 'top picks', 'ganna7.jpg'),
(44, 'leela.mp3', 'ritik', 'honey singh', 'trending songs', 'ganna9.jpg'),
(45, '03 - Janam Janam - DownloadMing.SE.mp3', 'ritik', 'sonu nigam', 'top chart', 'crop_175x175_177698_1489055153.jpg'),
(46, '02 - Kheech Meri Photo (Sanam Teri Kasam).mp3', 'ritik', 'gulzar channi wal', 'trending songs', 'crop_175x175_1363122_1543315225.jpg'),
(47, '02 Ijazat - One Night Stand (Arijit Singh) 190Kbps.mp3', 'ritik', 'neha kakkar', 'new release', 'crop_175x175_3513376.jpg'),
(48, '02 Main Dhoondne Ko Zamaane Mein (Heartless) - Arijit Singh.mp3', 'ritik', 'gulzar channi wal', 'trending songs', 'crop_175x175_3547856.jpg'),
(49, '03 - Ankhon Se Ojhal - Rhythm.mp3', 'ritik', 'honey singh', 'trending songs', 'crop_175x175_3548375.jpg'),
(50, 'Board Creak-SoundBible.com-2020134935 (1).mp3', 'ritik', 'neha kakkar', 'trending songs', 'crop_175x175_3548375.jpg'),
(51, 'Crackle-SoundBible.com-186260417.mp3', 'hari', 'neha kakkar', 'top chart', 'crop_175x175_3757700_1436265823.jpg'),
(52, '03 - Deere Dhree Kam Hogi Udasi - DownloadMing.SE.mp3', 'ritik', 'arijit singh', 'top picks', 'crop_175x175_14836711_1510162133.jpg'),
(53, '03 - O Meri Jaan - Raaz Reboot [DJMaza.Cool].mp3', 'hari', 'badshah', 'top chart', 'size_m_1593616645.jpg'),
(54, 'Water-Lisa_Redfern-1888623835.mp3', 'ritik', 'neha kakkar', 'top charts', 'size_m_1590149832.jpg'),
(55, '03 - Wafa Ne Bewafai - Teraa Surroor [Songspk.LINK].mp3', 'hari', 'arijit singh', 'top charts', 'size_m_1593616645.jpg'),
(56, 'Turkey Gobble-SoundBible.com-1935194723 (2).mp3', '', 'sonu nigam', 'new release', 'crop_175x175_1565775714_17016181.jpg'),
(57, '03 Tere Pyar Ka - The Last Tale Of Kayenaat 190Kbps.mp3', 'dhanajay', 'gulzar channi wal', 'top charts', 'ganna20.jpg'),
(58, '03 Naam-E-Wafa - Creature (Farhan Saeed n Tulsi Kumar) - 192Kbps(4337).mp3', 'hari', 'honey singh', 'new release', 'ganna19.jpg'),
(59, 'thought-Abby_E-331775585.mp3', 'hari', 'sonu nigam', 'new release', 'ganna18.jpg'),
(60, '04 - Mujhe De De Har Gham Tera.mp3', 'ritik', 'gulzar channi wal', 'top charts', 'ganna17.jpg'),
(61, '04 Tujhko Mein  - 1920 London (Shaan) 190kbps.mp3', 'hari', 'arijit singh', 'top charts', 'ganna15.jpg'),
(62, '05 Naina - Dangal (Arijit Singh) 190Kbps.mp3', 'dhanajay', 'neha kakkar', 'new release', 'ganna14.jpg'),
(63, 'Shush Short-SoundBible.com-2068181934.mp3', 'dhanajay', 'neha kakkar', 'top picks', 'ganna11.jpg'),
(64, '5 Taara - Diljit Dosanjh(PagalWorlds.in).mp3', 'dhanajay', 'arijit singh', 'top picks', 'ganna12.jpg'),
(66, 'à¤¹à¤¨à¥à¤®à¤¾à¤¨ à¤šà¤¾à¤²à¥€à¤¸à¤¾ Bhakti - HARIHARAN ! Shree Hanuman Chalisa.mp3', 'ritik', 'arijit singh', 'top picks', 'WhatsApp Image 2020-12-29 at 8.51.22 AM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `sr` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sr`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sr`, `firstname`, `password`, `lastname`, `email`, `token`, `status`) VALUES
(20, 'hari', '$2y$10$P2UTvCEsx9VQZZdtfZ.dcuGeMfCEGeNINy32Z7dgJNfc2bZKBhIBy', 'pal', 'hari@gmail.com', '', ''),
(19, 'Ritik', '$2y$10$HMMtVAzsftiECiHhw6Qs0.ztJfw3nk4J5fnOIUFVBd9nWZm5WCQSO', 'pal', 'ritikpal41@gmail.com', '', ''),
(18, 'secure', '$2y$10$lPSAdTBaSBX5ZmWyvbi09utD1zNjgaMJY0EEqLVAPdfzKsIQbtLKS', 'pal', 'security@gmail.com', '', ''),
(21, 'ritesh', '$2y$10$CuBJj3WpumPJpKTT12NY0.XBSXoiI.SafSlsLXD8dfy6VaSZQVgzS', 'pal', 'ritesh@gmail.com', '', ''),
(22, 'user', '$2y$10$KeKpR7gO8WaaKNTFN50Sr.N45EQo880JyZZs7vNunBSRHr/kbXaNm', 'pal', 'user@gmail.com', '', ''),
(23, 'a', '$2y$10$YXArWgBtqWXbb1BZTH4X/OPpL4SPJfxeX216lJBymVne7rRljo/WS', 'a', 'a@gmail.com', '', ''),
(24, 'k', '$2y$10$OLLgy0d/olgzNYckKvOOxu7G8Mst8Ipa8kH3p6ul0AlSjDnqZ0n6u', 'k', 'k@gmail.com', '', ''),
(25, 'Ritik', '$2y$10$y/qQK9f.CKb0fRP2O4Pq8eBN9kvzu028aZI7jPFSHNdFjIKJVh81W', 'pal', 'kallu@gmail.com', '55dfa2f08b4de3d1d504a2fac602b2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `usersong`
--

DROP TABLE IF EXISTS `usersong`;
CREATE TABLE IF NOT EXISTS `usersong` (
  `sr` int(12) NOT NULL AUTO_INCREMENT,
  `useremail` varchar(30) NOT NULL,
  `favoratesong` varchar(250) NOT NULL,
  PRIMARY KEY (`sr`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersong`
--

INSERT INTO `usersong` (`sr`, `useremail`, `favoratesong`) VALUES
(63, 'ritikpal41@gmail.com', '03 Tere Pyar Ka - The Last Tale Of Kayenaat 190Kbps.mp3'),
(62, 'ritikpal41@gmail.com', 'pe rkhi h.mp3\r\n\r\n'),
(61, 'ritikpal41@gmail.com', '04 - Mujhe De De Har Gham Tera.mp3'),
(60, 'ritikpal41@gmail.com', '02 Main Dhoondne Ko Zamaane Mein (Heartless) - Arijit Singh.mp3'),
(59, 'ritikpal41@gmail.com', 'leela.mp3'),
(58, 'ritikpal41@gmail.com', '01 - Tere Sang Yaara - Rustom [DJMaza.Cool].mp3'),
(57, 'user@gmail.com', 'Sau Tarah Ke Dishoom.mp3'),
(56, 'ritikpal41@gmail.com', '02 - Kheech Meri Photo (Sanam Teri Kasam).mp3'),
(55, 'ritikpal41@gmail.com', '03 - Wafa Ne Bewafai - Teraa Surroor [Songspk.LINK].mp3'),
(54, 'ritikpal41@gmail.com', '03 - Deere Dhree Kam Hogi Udasi - DownloadMing.SE.mp3'),
(41, 'ritikpal41@gmail.com', '02 Baaton Ko Teri (All Is Well) Arijit Singh 190Kbps.mp3'),
(42, 'ritikpal41@gmail.com', 'Turkey Gobble-SoundBible.com-1935194723 (2).mp3'),
(43, 'ritikpal41@gmail.com', 'Sau Tarah Ke Dishoom.mp3'),
(53, 'ritikpal41@gmail.com', '03 Naam-E-Wafa - Creature (Farhan Saeed n Tulsi Kumar) - 192Kbps(4337).mp3'),
(52, 'ritikpal41@gmail.com', 'Board Creak-SoundBible.com-2020134935 (1).mp3'),
(51, 'ritikpal41@gmail.com', '03 - Ankhon Se Ojhal - Rhythm.mp3'),
(50, 'ritikpal41@gmail.com', 'aaa jaan- Aarsh Benipal .mp3'),
(49, 'ritikpal41@gmail.com', 'Water-Lisa_Redfern-1888623835.mp3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
