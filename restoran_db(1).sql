-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2015 pada 13.30
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `restoran_db`
--
CREATE DATABASE IF NOT EXISTS `restoran_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restoran_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_tab`
--

CREATE TABLE IF NOT EXISTS `access_tab` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `agid` int(4) unsigned NOT NULL,
  `apid` int(10) DEFAULT NULL,
  `aaccess` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `branch_tab`
--

CREATE TABLE IF NOT EXISTS `branch_tab` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `bname` varchar(150) DEFAULT NULL,
  `baddr` text,
  `bphone` varchar(20) DEFAULT NULL,
  `bstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `branch_tab`
--

INSERT INTO `branch_tab` (`bid`, `bname`, `baddr`, `bphone`, `bstatus`) VALUES
(1, 'Green Lake', 'Green Lake', '08121313', 1),
(2, 'jkt', 'jakarta', '', 0),
(3, 'bandung', 'bbbb', '', 0),
(4, 'bandung xx', 'lkkl', '', 0),
(5, 'medan', 'kjklj', '', 0),
(6, 'hhh', 'gggg', '', 0),
(7, '123', 'nnnn', '', 0),
(8, '123', 'kjkjkj', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories_tab`
--

CREATE TABLE IF NOT EXISTS `categories_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `ctype` tinyint(1) DEFAULT '1',
  `cname` varchar(150) DEFAULT NULL,
  `cdesc` varchar(350) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `categories_tab`
--

INSERT INTO `categories_tab` (`cid`, `ctype`, `cname`, `cdesc`, `cstatus`) VALUES
(1, 1, 'Makanan', 'Minuman', 1),
(2, 1, 'Minuman Baku', 'Minuman Baku', 1),
(3, 2, 'Lantai I', 'Lantai I', 1),
(4, 2, 'Lantai II', 'Lantai II', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_tab`
--

CREATE TABLE IF NOT EXISTS `groups_tab` (
  `gid` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL,
  `gdesc` text NOT NULL,
  `gstatus` int(1) DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `groups_tab`
--

INSERT INTO `groups_tab` (`gid`, `gname`, `gdesc`, `gstatus`) VALUES
(1, 'root', 'Root', 1),
(2, 'Kitchen', 'Kitchen', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus_tab`
--

CREATE TABLE IF NOT EXISTS `menus_tab` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `mcid` int(10) DEFAULT NULL,
  `mname` varchar(300) DEFAULT NULL,
  `mdesc` varchar(300) DEFAULT NULL,
  `mharga` double DEFAULT NULL,
  `mdisc` int(10) DEFAULT NULL,
  `mstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `menus_tab`
--

INSERT INTO `menus_tab` (`mid`, `mcid`, `mname`, `mdesc`, `mharga`, `mdisc`, `mstatus`) VALUES
(1, 1, 'Nasi Goreng Pedas Asam Manis Bumbu Cabe', 'Nasi Goreng Pedas Asam Manis Bumbu Cabe', 25000, 10, 1),
(2, 1, 'Nasi Bakar Ikan Teri', 'Nasi Bakar Ikan Teri', 24000, 15, 1),
(3, 1, 'Soto Babat', 'Soto Babat', 20000, 10, 1),
(4, 1, 'Empal Sapi', 'Empal Sapi', 25000, 10, 1),
(5, 2, 'Air Mineral', 'Air Mineral', 2000, 0, 1),
(6, 2, 'Es Teh Tawar ', 'Es Teh Tawar ', 2500, 0, 1),
(7, 2, 'Es Teh Manis', 'Es Teh Manis', 3000, 0, 1),
(8, 2, 'Teh Tawar Hangat', 'Teh Tawar Hangat', 2000, 0, 1),
(9, 2, 'Teh Manis Hangat', 'Teh Manis Hangat', 2500, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_tab`
--

CREATE TABLE IF NOT EXISTS `permission_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(45) DEFAULT NULL,
  `pdesc` varchar(150) DEFAULT NULL,
  `purl` varchar(45) DEFAULT NULL,
  `pparent` int(10) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_material_tab`
--

CREATE TABLE IF NOT EXISTS `raw_material_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rname` varchar(150) DEFAULT NULL,
  `rdesc` varchar(350) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `raw_material_tab`
--

INSERT INTO `raw_material_tab` (`rid`, `rname`, `rdesc`, `rstatus`) VALUES
(1, 'Ayam Kampung', 'Ayam Kampung', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tables_tab`
--

CREATE TABLE IF NOT EXISTS `tables_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tcid` int(10) DEFAULT NULL,
  `tname` varchar(150) DEFAULT NULL,
  `tdesc` varchar(350) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `tables_tab`
--

INSERT INTO `tables_tab` (`tid`, `tcid`, `tname`, `tdesc`, `tstatus`) VALUES
(1, 3, 'Table I', 'Table I', 1),
(2, 3, 'Table II', 'Table II', 1),
(3, 3, 'Table III', 'Table III', 1),
(4, 3, 'Table IV', 'Table IV', 3),
(5, 4, 'Table I', 'Table I', 1),
(6, 4, 'Table II', 'Table II', 1),
(7, 4, 'Table III', 'Table III', 1),
(8, 4, 'Table IV', 'Table IV', 1),
(9, 4, 'Table V', 'Table V', 1),
(10, 4, 'Table VI', 'Table VI', 1),
(11, 4, 'Table VII', 'Table VII', 1),
(12, 4, 'Table VIII', 'Table VIII', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_tab`
--

CREATE TABLE IF NOT EXISTS `users_tab` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `ugid` int(10) DEFAULT NULL,
  `ubid` int(10) DEFAULT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `ulastlogin` varchar(21) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `users_tab`
--

INSERT INTO `users_tab` (`uid`, `ugid`, `ubid`, `uemail`, `upass`, `ulastlogin`, `ustatus`) VALUES
(1, 1, 1, 'root@restoran.com', 'e89591ee9b8e7018511649a2146ae279', '*1445590749', 1),
(2, 1, 1, 'palma@restoran.com', 'e89591ee9b8e7018511649a2146ae279', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist_detail_tab`
--

CREATE TABLE IF NOT EXISTS `wishlist_detail_tab` (
  `wdid` int(11) NOT NULL AUTO_INCREMENT,
  `wid` int(11) NOT NULL,
  `wmid` int(11) NOT NULL,
  `wqty` int(11) NOT NULL,
  `wdisc` double DEFAULT NULL,
  `wharga` double DEFAULT NULL,
  `wstatus` int(11) NOT NULL,
  PRIMARY KEY (`wdid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data untuk tabel `wishlist_detail_tab`
--

INSERT INTO `wishlist_detail_tab` (`wdid`, `wid`, `wmid`, `wqty`, `wdisc`, `wharga`, `wstatus`) VALUES
(65, 41, 9, 2, 0, 2500, 1),
(66, 41, 8, 4, 0, 2000, 1),
(67, 41, 1, 2, 10, 25000, 1),
(68, 41, 4, 2, 10, 25000, 1),
(69, 42, 8, 1, 0, 2000, 1),
(70, 42, 1, 2, 10, 25000, 1),
(71, 43, 5, 2, 0, 2000, 1),
(72, 43, 2, 3, 15, 24000, 1),
(73, 43, 1, 3, 10, 25000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist_tab`
--

CREATE TABLE IF NOT EXISTS `wishlist_tab` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `wname` varchar(50) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `wtid` int(11) NOT NULL,
  `wtotal` double NOT NULL,
  `wppn` double DEFAULT NULL,
  `wdis` double NOT NULL,
  `wtotalall` double NOT NULL,
  `wdate` datetime DEFAULT NULL,
  `wstatus` int(11) NOT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data untuk tabel `wishlist_tab`
--

INSERT INTO `wishlist_tab` (`wid`, `wname`, `person`, `wtid`, `wtotal`, `wppn`, `wdis`, `wtotalall`, `wdate`, `wstatus`) VALUES
(42, '', NULL, 4, 47000, 0, 0, 47000, '2015-10-23 00:00:00', 3),
(43, 'sand', 2, 4, 51000, NULL, 0, 51000, '2015-10-23 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
