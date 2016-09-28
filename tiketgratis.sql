-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2016 at 07:02 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tiketgratis`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
`auid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`auid`, `nama`) VALUES
(1, 'Administrator'),
(2, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_transportasi`
--

CREATE TABLE IF NOT EXISTS `jenis_transportasi` (
`jtid` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jenis_transportasi`
--

INSERT INTO `jenis_transportasi` (`jtid`, `nama`) VALUES
(1, 'BIS'),
(2, 'KAPAL'),
(3, 'KERETA');

-- --------------------------------------------------------

--
-- Table structure for table `pemudik`
--

CREATE TABLE IF NOT EXISTS `pemudik` (
`pid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `transportasi` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pemudik`
--

INSERT INTO `pemudik` (`pid`, `nama`, `jenis_kelamin`, `pekerjaan`, `asal`, `tujuan`, `transportasi`) VALUES
(1, 'Muhammad Ali', 'L', 'Mahasiswa', 1, 3, 5),
(7, 'Taufik', 'L', 'Programmer', 1, 3, 1),
(8, 'Resky', 'L', 'Mahasiswa', 1, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE IF NOT EXISTS `tempat` (
`tid` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`tid`, `nama`, `jenis`) VALUES
(1, 'Terminal A', 1),
(2, 'Terminal B', 1),
(3, 'Terminal C', 1),
(4, 'Terminal D', 1),
(5, 'Pelabuhan A', 2),
(6, 'Pelabuhan B', 2),
(7, 'Pelabuhan C', 2),
(8, 'Pelabuhan D', 2),
(9, 'Terminal E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE IF NOT EXISTS `transportasi` (
`tid` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jtid` int(11) NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `sisa_penumpang` int(11) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `tanggal_pemberangkatan` varchar(50) NOT NULL,
  `waktu_pemberangkatan` varchar(50) NOT NULL,
  `route` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`tid`, `nama`, `jtid`, `jumlah_penumpang`, `sisa_penumpang`, `asal`, `tujuan`, `tanggal_pemberangkatan`, `waktu_pemberangkatan`, `route`) VALUES
(1, 'Sejahtera', 1, 35, 34, '1', '3', '20 April 2016', '20:31', 'Terminal A, Terminal B, Terminal C'),
(5, 'Madura Express', 1, 34, 33, '1', '4', '20 April 2016', '20:31', 'Terminal A, Terminal B'),
(6, 'Kapal Armada Laut', 2, 100, 100, '5', '8', '30 Agustus 2012', '22:12', 'Pelabuhan D, Pelabuhan C, Pelabuhan B, Pelabuhan A, '),
(7, 'Pahala Kencana', 1, 50, 49, '1', '3', '30 Agustus 2012', '22:12', 'Terminal D, Terminal C, Terminal B, Terminal A, ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` text NOT NULL,
  `auid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `auid`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 1),
('alie', '3fa898892c1df2eb69e0e69ca41ef3dd640dc29b', 'Alie Muhammad', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
 ADD PRIMARY KEY (`auid`);

--
-- Indexes for table `jenis_transportasi`
--
ALTER TABLE `jenis_transportasi`
 ADD PRIMARY KEY (`jtid`);

--
-- Indexes for table `pemudik`
--
ALTER TABLE `pemudik`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_transportasi`
--
ALTER TABLE `jenis_transportasi`
MODIFY `jtid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pemudik`
--
ALTER TABLE `pemudik`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
