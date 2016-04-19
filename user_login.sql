-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2016 at 02:31 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kpu_fix`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login_hash` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_foto` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `status` varchar(30) NOT NULL,
  `vote` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `password`, `nama_lengkap`, `email`, `login_hash`, `tanggal_lahir`, `nama_foto`, `alamat`, `no_hp`, `angkatan`, `status`, `vote`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Tristiyadi', 'admin@if.uai.ac.id', 'administrator', '1994-01-21', 'Photo.jpg', 'Jakarta Selatan', '085717193456', '2010', 'Kuliah', ''),
('zaim', 'f0e486f44d8f49587185991c85a13c37', 'muhammad zaim', 'zaim@gmail.com', 'anggota', '0000-00-00', 'avatar.png', 'jakarta', '085212255619', '2011', 'Kuliah', '1'),
('luki', '3351374649a3645cf743feafeb13c2df', 'Muhammad Masluki', 'masluki@gmail.com', 'anggota', '1994-10-08', 'avatar.png', 'Jakarta', '085212255619', '2011', 'Kuliah', '2'),
('riyadi', '52c91787b868983092bdaad2be8a23f4', 'Sugeng Riyadi', 'riyadi@yahoo.com', 'anggota', '0000-00-00', 'avatar.png', 'jakarta', '089677665544', '2011', 'kuliah', 'Belum');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
