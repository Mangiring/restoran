-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2015 pada 02.05
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `branch_tab`
--

INSERT INTO `branch_tab` (`bid`, `bname`, `baddr`, `bphone`, `bstatus`) VALUES
(1, 'Green Lake', 'Green Lake', '08121313', 1);

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
-- Struktur dari tabel `inventory_tab`
--

CREATE TABLE IF NOT EXISTS `inventory_tab` (
  `iid` int(10) NOT NULL AUTO_INCREMENT,
  `irid` int(10) DEFAULT '0',
  `istockbegining` int(10) DEFAULT '0',
  `istockin` int(10) DEFAULT '0',
  `istockout` int(10) DEFAULT '0',
  `istockretur` int(10) DEFAULT '0',
  `istock` int(10) DEFAULT '0',
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `inventory_tab`
--

INSERT INTO `inventory_tab` (`iid`, `irid`, `istockbegining`, `istockin`, `istockout`, `istockretur`, `istock`) VALUES
(1, 1, 5, 10, 3, 1, 9),
(2, 2, 0, 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus_tab`
--

CREATE TABLE IF NOT EXISTS `menus_tab` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `mcid` int(10) DEFAULT NULL,
  `mname` varchar(300) DEFAULT NULL,
  `mdesc` varchar(300) DEFAULT NULL,
  `mdisc` int(10) DEFAULT NULL,
  `mharga` int(10) DEFAULT NULL,
  `mstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `menus_tab`
--

INSERT INTO `menus_tab` (`mid`, `mcid`, `mname`, `mdesc`, `mdisc`, `mharga`, `mstatus`) VALUES
(1, 1, 'Nasi Goreng Pedas Asam Manis Bumbu Cabe', 'Nasi Goreng Pedas Asam Manis Bumbu Cabe', 10, 150000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opname_tab`
--

CREATE TABLE IF NOT EXISTS `opname_tab` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oidid` int(10) DEFAULT NULL,
  `odate` int(10) DEFAULT NULL,
  `ostockbegining` int(10) DEFAULT NULL,
  `ostockin` int(10) DEFAULT NULL,
  `ostockout` int(10) DEFAULT NULL,
  `ostockretur` int(10) DEFAULT NULL,
  `ostock` int(10) DEFAULT NULL,
  `oadjustmin` int(10) DEFAULT NULL,
  `oadjustplus` int(10) DEFAULT NULL,
  `odesc` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `opname_tab`
--

INSERT INTO `opname_tab` (`oid`, `oidid`, `odate`, `ostockbegining`, `ostockin`, `ostockout`, `ostockretur`, `ostock`, `oadjustmin`, `oadjustplus`, `odesc`) VALUES
(1, 2, 1446178856, 0, 0, 0, 0, 0, 0, 4, 'iseng aja'),
(2, 1, 1446179370, 5, 10, 3, 1, 10, 1, 0, 'iseng lagi');

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
-- Struktur dari tabel `peticash_tab`
--

CREATE TABLE IF NOT EXISTS `peticash_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `ptype` tinyint(1) DEFAULT '1',
  `pdate` int(10) DEFAULT NULL,
  `pdesc` text,
  `pnominal` int(10) DEFAULT NULL,
  `psaldo` int(10) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `peticash_tab`
--

INSERT INTO `peticash_tab` (`pid`, `ptype`, `pdate`, `pdesc`, `pnominal`, `psaldo`, `pstatus`) VALUES
(1, 1, 1445585399, 'beli cat', 100000, 100000, 1),
(3, 1, 1445586419, 'masuk lagi', 1000000, 1100000, 1),
(4, 2, 1445586445, 'beli garam', 5000, 1095000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `raw_material_tab`
--

INSERT INTO `raw_material_tab` (`rid`, `rname`, `rdesc`, `rstatus`) VALUES
(1, 'Ayam Kampung', 'Ayam Kampung', 1),
(2, 'Bebek', 'Bebek', 1);

--
-- Trigger `raw_material_tab`
--
DROP TRIGGER IF EXISTS `raw_material_tab_AINS`;
DELIMITER //
CREATE TRIGGER `raw_material_tab_AINS` AFTER INSERT ON `raw_material_tab`
 FOR EACH ROW INSERT INTO inventory_tab (irid) VALUES (NEW.rid);
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tables_tab`
--

INSERT INTO `tables_tab` (`tid`, `tcid`, `tname`, `tdesc`, `tstatus`) VALUES
(1, 3, 'Table I', 'Table I', 1),
(2, 3, 'Table II', 'Table II', 1),
(3, 3, 'Table III', 'Table III', 1),
(4, 3, 'Table IV', 'Table IV', 1),
(5, 4, 'Table I', 'Table I', 1),
(6, 4, 'Table II', 'Table II', 3);

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
(1, 1, 1, 'root@restoran.com', 'e89591ee9b8e7018511649a2146ae279', '*1446253253', 1),
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
  `wcreateby` int(11) DEFAULT NULL,
  `wupdateby` int(11) DEFAULT NULL,
  `wcdate` datetime DEFAULT NULL,
  `wudate` datetime DEFAULT NULL,
  `bcreateby` int(11) DEFAULT NULL,
  `bupdateby` int(11) DEFAULT NULL,
  `bcdate` datetime DEFAULT NULL,
  `budate` datetime DEFAULT NULL,
  PRIMARY KEY (`wdid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data untuk tabel `wishlist_detail_tab`
--

INSERT INTO `wishlist_detail_tab` (`wdid`, `wid`, `wmid`, `wqty`, `wdisc`, `wharga`, `wstatus`, `wcreateby`, `wupdateby`, `wcdate`, `wudate`, `bcreateby`, `bupdateby`, `bcdate`, `budate`) VALUES
(65, 41, 9, 2, 0, 2500, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 41, 8, 4, 0, 2000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 41, 1, 2, 10, 25000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 41, 4, 2, 10, 25000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 42, 8, 1, 0, 2000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 42, 1, 2, 10, 25000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 43, 5, 2, 0, 2000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 43, 2, 3, 15, 24000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 43, 1, 3, 10, 25000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 44, 1, 7, 10, 150000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 45, 1, 2, 10, 150000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 46, 1, 3, 10, 150000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 47, 1, 3, 10, 150000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 48, 1, 3, 10, 150000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 49, 1, 0, 10, 150000, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 55, 1, 2, 10, 150000, 1, 1, 1, '2015-10-31 00:24:14', '2015-10-31 00:33:39', NULL, 1, NULL, '2015-10-31 12:41:18'),
(81, 55, 1, 1, 10, 150000, 1, 1, 1, '2015-10-31 00:24:32', '2015-10-31 00:33:39', NULL, 1, NULL, '2015-10-31 12:41:18'),
(82, 52, 1, 1, 10, 150000, 1, 1, 1, '2015-10-31 01:05:19', '2015-10-31 01:15:01', NULL, NULL, NULL, NULL),
(83, 56, 1, 2, 10, 150000, 1, 1, 1, '2015-10-31 01:19:16', '2015-10-31 01:19:25', NULL, 1, NULL, '2015-10-31 01:19:53'),
(84, 53, 1, 3, 10, 150000, 1, 1, 1, '2015-10-31 01:54:25', '2015-10-31 01:54:34', NULL, NULL, NULL, NULL);

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
  `wcreateby` int(11) DEFAULT NULL,
  `wupdateby` int(11) DEFAULT NULL,
  `wcdate` datetime DEFAULT NULL,
  `wudate` datetime DEFAULT NULL,
  `bcreateby` int(11) DEFAULT NULL,
  `bupdateby` int(11) DEFAULT NULL,
  `bcdate` datetime DEFAULT NULL,
  `budate` datetime DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data untuk tabel `wishlist_tab`
--

INSERT INTO `wishlist_tab` (`wid`, `wname`, `person`, `wtid`, `wtotal`, `wppn`, `wdis`, `wtotalall`, `wdate`, `wstatus`, `wcreateby`, `wupdateby`, `wcdate`, `wudate`, `bcreateby`, `bupdateby`, `bcdate`, `budate`) VALUES
(44, 'Mona', 2, 4, 945000, 0, 0, 945000, '2015-10-23 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Mona', 2, 1, 270000, 10, 10, 216000, '2015-10-23 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Mona', 3, 1, 150000, NULL, 0, 150000, '2015-10-23 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Mona', 3, 4, 405000, 3, 10, 352350, '2015-10-23 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Mona', 2, 4, 150000, NULL, 0, 150000, '2015-10-23 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Mona', 2, 4, 150000, NULL, 0, 150000, '2015-10-23 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '', NULL, 3, 0, NULL, 0, 0, '2015-10-29 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '', NULL, 2, 0, NULL, 0, 0, '2015-10-29 00:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'kk', 2, 1, 150000, NULL, 0, 150000, '2015-10-31 01:05:19', 3, NULL, 1, NULL, '2015-10-31 01:18:56', NULL, NULL, NULL, NULL),
(53, 'saya', 5, 6, 150000, NULL, 0, 150000, '2015-10-31 01:54:26', 1, NULL, 1, NULL, '2015-10-31 01:54:26', NULL, NULL, NULL, NULL),
(54, '', NULL, 4, 0, NULL, 0, 0, '2015-10-31 00:00:00', 3, NULL, 1, NULL, '2015-10-31 12:18:52', NULL, NULL, NULL, NULL),
(55, 'jjj', 2, 4, 405000, 10, 3, 433350, '2015-10-31 00:24:32', 3, 1, 1, '2015-10-31 00:19:17', '2015-10-31 00:24:32', 1, 1, '2015-10-31 12:42:59', '2015-10-31 12:42:59'),
(56, 'kkk', 3, 2, 270000, 10, 5, 283500, '2015-10-31 01:19:16', 3, 1, 1, '2015-10-31 01:19:09', '2015-10-31 01:19:16', 1, 1, '2015-10-31 01:20:59', '2015-10-31 01:20:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
