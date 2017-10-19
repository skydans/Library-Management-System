-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2016 at 03:05 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `year` varchar(30) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `author` varchar(100) NOT NULL,
  `nop` varchar(30) NOT NULL,
  `quantity` int(100) NOT NULL,
  `language` varchar(30) NOT NULL,
  `date_received` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `year`, `publisher`, `author`, `nop`, `quantity`, `language`, `date_received`) VALUES
('D000001', 'Manajemen Perguruan Tinggi Modern', '2007', 'Andi Publisher', 'Richardus Eko Indrajit', '418', 0, 'Indonesian', '08-01-2016'),
('D000002', 'Global Business Today (9th Edition)', '2015', 'McGraw-Hill Education', 'Charles W. L. Hill, G. Tomas M', '576', 2, 'English', '18-01-2016'),
('D000003', 'Trump: The Art of the Deal', '2004', 'Ballantine Books', 'Donald J. Trump, Tony Schwartz', '384', 5, 'English', '25-01-2016'),
('I000001', 'Resep Masakan Pilihan Keluarga: Daging', '2009', 'Gramedia Pustaka Utama', 'Rih Lasmiatik', '', 2, 'Indonesian', '17-02-2016');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
  `fine_id` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL,
  `amount` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tranz`
--

CREATE TABLE IF NOT EXISTS `tranz` (
`transaction_id` int(100) NOT NULL,
  `book_id` varchar(30) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date_of_borrowing` varchar(15) NOT NULL,
  `date_of_return` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tranz`
--

INSERT INTO `tranz` (`transaction_id`, `book_id`, `user_id`, `date_of_borrowing`, `date_of_return`, `status`) VALUES
(30, 'D000002', 'user', '09-01-2016', '16-01-2016', 'Borrowing'),
(31, 'D000003', 'user2', '08-01-2016', '15-01-2016', 'Returned'),
(32, 'I000001', 'user3', '17-02-2016', '24-02-2016', 'Borrowing'),
(33, 'I000001', 'student01', '17-02-2016', '24-02-2016', 'Borrowing'),
(34, 'D000001', 'student01', '17-02-2016', '24-02-2016', 'Borrowing'),
(35, 'I000001', 'student02', '17-02-2016', '24-02-2016', 'Returned'),
(36, 'I000001', 'user3', '17-02-2016', '24-02-2016', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `faculty` varchar(30) NOT NULL,
  `year` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `name`, `gender`, `dob`, `faculty`, `year`, `address`, `email`, `phone`, `level`) VALUES
('admin', 'admin', 'Admin', 'M', '06-03-1991', '', '', 'Green Ave', 'email@email.com', '01234567', 'admin'),
('user2', 'user2', 'User number 2', 'F', '08-02-1995', 'Akuntasi', '2001', 'Jenderal Sudirman Street', 'email@email.coms', '1234567891', 'user'),
('student01', 'student01', 'Student One', 'F', '03-07-1990', 'Manajemen', '2001', 'Jalan Sudirman', 'sdfasd@asdasf.com', '108293', 'user'),
('user', 'user', 'User', 'F', '02-02-1993', 'Akutansi', '2015', 'Jenderal Sudirman Street', 'user@email.com', '019012304', 'user'),
('admin2', 'admin2', 'Admin2', 'F', '01-02-1995', '', '', 'Brown Ave', 'email2@email2.com', '07654321', 'admin'),
('user3', 'user3', 'User number 3', 'F', '07-02-2006', 'Manajemen', '2001', 'Jalan Sudirman', 'email@email.comss', '012938', 'user'),
('student02', 'student02', 'Student Two', 'M', '01-02-2004', 'Manajemen', '2001', 'Jalan Sudirman', 'email@emails.com', '910284', 'user'),
('student03', 'student03', 'Student Three', 'M', '05-02-1992', 'Manajemen', '2001', 'Jalan Sudirman', 'email@emails.com', '64821', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`book_id`), ADD KEY `id_buku` (`book_id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
 ADD PRIMARY KEY (`fine_id`), ADD KEY `id_transaksi` (`fine_id`);

--
-- Indexes for table `tranz`
--
ALTER TABLE `tranz`
 ADD PRIMARY KEY (`transaction_id`), ADD KEY `id_peminjam` (`user_id`), ADD KEY `id_buku` (`book_id`), ADD KEY `id_transaksi` (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD KEY `nama` (`name`), ADD KEY `nama_2` (`name`), ADD KEY `nama_3` (`name`), ADD KEY `nama_4` (`name`), ADD KEY `username` (`user_id`), ADD KEY `username_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tranz`
--
ALTER TABLE `tranz`
MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
