-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 01 Nov 2015 pada 02.27
-- Versi Server: 5.5.44-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `restoran_db`
--

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
(1, 1, 0, 160, 120, 0, 30),
(2, 2, 0, 65, 0, 0, 65);

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemout_tab`
--

CREATE TABLE IF NOT EXISTS `itemout_tab` (
  `iid` int(10) NOT NULL AUTO_INCREMENT,
  `iidid` int(10) DEFAULT NULL,
  `idate` int(10) DEFAULT NULL,
  `istockbegining` int(10) DEFAULT NULL,
  `istockin` int(10) DEFAULT NULL,
  `istockout` int(10) DEFAULT NULL,
  `istockretur` int(10) DEFAULT NULL,
  `istock` int(10) DEFAULT NULL,
  `iadjust` int(10) DEFAULT NULL,
  `idesc` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `itemout_tab`
--

INSERT INTO `itemout_tab` (`iid`, `iidid`, `idate`, `istockbegining`, `istockin`, `istockout`, `istockretur`, `istock`, `iadjust`, `idesc`) VALUES
(1, 1, 1446306582, 0, 120, 0, 0, 120, 3, 'wew'),
(2, 1, 1446306589, 0, 120, 3, 0, 117, 5, 'wew'),
(3, 1, 1446309564, 0, 160, 8, 0, 142, 4, 'wew'),
(4, 1, 1446309802, 0, 160, 12, 0, 138, 30, 'wew');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `menus_tab`
--

INSERT INTO `menus_tab` (`mid`, `mcid`, `mname`, `mdesc`, `mdisc`, `mharga`, `mstatus`) VALUES
(1, 1, 'Nasi Goreng Pedas Asam Manis Bumbu Cabe', 'Nasi Goreng Pedas Asam Manis Bumbu Cabe', 10, 150000, 1),
(2, 1, 'gado gado', 'qweqwe', 0, 20000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `opname_tab`
--

INSERT INTO `opname_tab` (`oid`, `oidid`, `odate`, `ostockbegining`, `ostockin`, `ostockout`, `ostockretur`, `ostock`, `oadjustmin`, `oadjustplus`, `odesc`) VALUES
(1, 1, 1446307225, 0, 150, 8, 0, 142, 10, 0, 'gak balance');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `peticash_tab`
--

INSERT INTO `peticash_tab` (`pid`, `ptype`, `pdate`, `pdesc`, `pnominal`, `psaldo`, `pstatus`) VALUES
(1, 1, 1445585399, 'beli cat', 100000, 100000, 1),
(3, 1, 1445586419, 'masuk lagi', 1000000, 1100000, 1),
(4, 2, 1445586445, 'beli garam', 5000, 1095000, 1),
(5, 1, 1446310088, 'kas masuk', 500000, 1595000, 1),
(6, 2, 1446316023, 'wew', 500000, -500000, 1);

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
(2, 'Telur Ayam', 'Telur Ayam', 1);

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
-- Struktur dari tabel `receiving_material_tab`
--

CREATE TABLE IF NOT EXISTS `receiving_material_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rrid` int(10) DEFAULT NULL,
  `rrrid` int(10) DEFAULT NULL,
  `rqty` int(10) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `receiving_material_tab`
--

INSERT INTO `receiving_material_tab` (`rid`, `rrid`, `rrrid`, `rqty`, `rstatus`) VALUES
(1, 1, 2, 120, 1),
(2, 1, 1, 30, 1),
(3, 2, 2, 35, 1),
(4, 3, 1, 30, 1),
(5, 4, 1, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `receiving_tab`
--

CREATE TABLE IF NOT EXISTS `receiving_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rtitle` varchar(350) DEFAULT NULL,
  `rdate` int(10) DEFAULT NULL,
  `rdesc` varchar(350) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `receiving_tab`
--

INSERT INTO `receiving_tab` (`rid`, `rtitle`, `rdate`, `rdesc`, `rstatus`) VALUES
(1, 'wew', 1446305720, 'wew', 3),
(2, 'masuk telur', 1446306740, 'masuk telur', 3),
(3, 'ayam masuk', 1446307157, 'ayam masuk', 3),
(4, 'qwqw', 1446308071, 'qq', 3);

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
(1, 3, 'Table I', 'Table I', 3),
(2, 3, 'Table II', 'Table II', 3),
(3, 3, 'Table III', 'Table III', 1),
(4, 3, 'Table IV', 'Table IV', 1),
(5, 4, 'Table I', 'Table I', 1),
(6, 4, 'Table II', 'Table II', 1);

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
(1, 1, 1, 'root@restoran.com', 'e89591ee9b8e7018511649a2146ae279', '*1446315896', 1),
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
  `wnote` text,
  PRIMARY KEY (`wdid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `wishlist_detail_tab`
--

INSERT INTO `wishlist_detail_tab` (`wdid`, `wid`, `wmid`, `wqty`, `wdisc`, `wharga`, `wstatus`, `wcreateby`, `wupdateby`, `wcdate`, `wudate`, `bcreateby`, `bupdateby`, `bcdate`, `budate`, `wnote`) VALUES
(1, 1, 1, 10, 10, 150000, 1, 1, 1, '2015-10-31 11:02:11', '2015-10-31 11:03:10', NULL, 1, NULL, '2015-10-31 11:06:14', NULL),
(2, 2, 1, 0, 10, 150000, 1, 1, NULL, '2015-10-31 11:09:03', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 2, 0, 0, 20000, 1, 1, NULL, '2015-10-31 11:18:41', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, 2, 2, 0, 20000, 1, 1, 1, '2015-10-31 11:51:32', '2015-10-31 11:51:42', NULL, 1, NULL, '2015-10-31 11:52:03', NULL),
(5, 4, 2, 2, 0, 20000, 1, 1, 1, '2015-10-31 11:58:09', '2015-10-31 11:58:54', NULL, NULL, NULL, NULL, 'wew'),
(6, 4, 1, 2, 10, 150000, 1, 1, 1, '2015-10-31 11:58:09', '2015-10-31 11:58:55', NULL, NULL, NULL, NULL, 'wew'),
(7, 5, 2, 2, 0, 20000, 1, 1, 1, '2015-11-01 12:03:07', '2015-11-01 12:04:31', NULL, NULL, NULL, NULL, 'wew'),
(8, 5, 1, 2, 10, 150000, 1, 1, 1, '2015-11-01 12:03:07', '2015-11-01 12:04:31', NULL, NULL, NULL, NULL, 'wewew'),
(9, 6, 2, 1, 0, 20000, 1, 1, 1, '2015-11-01 12:13:28', '2015-11-01 12:14:46', NULL, NULL, NULL, NULL, 'pedes'),
(10, 6, 1, 1, 10, 150000, 1, 1, 1, '2015-11-01 12:13:28', '2015-11-01 12:14:47', NULL, NULL, NULL, NULL, 'sedeng'),
(11, 7, 2, 1, 0, 20000, 1, 1, 1, '2015-11-01 01:18:39', '2015-11-01 01:18:58', NULL, NULL, NULL, NULL, 'wewe'),
(12, 7, 1, 2, 10, 150000, 1, 1, 1, '2015-11-01 01:18:39', '2015-11-01 01:18:58', NULL, NULL, NULL, NULL, 'wewew');

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
  `wnotes` text,
  `wpayment` double DEFAULT NULL,
  `wbackpayment` double DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `wishlist_tab`
--

INSERT INTO `wishlist_tab` (`wid`, `wname`, `person`, `wtid`, `wtotal`, `wppn`, `wdis`, `wtotalall`, `wdate`, `wstatus`, `wcreateby`, `wupdateby`, `wcdate`, `wudate`, `bcreateby`, `bupdateby`, `bcdate`, `budate`, `wnotes`, `wpayment`, `wbackpayment`) VALUES
(1, 'table I', 10, 5, 1350000, 10, 0, 1485000, '2015-10-31 11:02:12', 3, 1, 1, '2015-10-31 11:02:01', '2015-10-31 11:02:12', 1, 1, '2015-10-31 11:07:47', '2015-10-31 11:07:47', '5 gak pedas\n2 sedang\n3 pedes banget', 1500000, 15000),
(2, '', NULL, 6, 20000, NULL, 0, 20000, '2015-10-31 11:18:41', 2, 1, 1, '2015-10-31 11:08:56', '2015-10-31 11:19:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'wew', 2, 1, 40000, 0, 0, 40000, '2015-10-31 11:51:32', 3, 1, 1, '2015-10-31 11:51:14', '2015-10-31 11:51:32', 1, 1, '2015-10-31 11:52:07', '2015-10-31 11:52:07', 'wew', 50000, 10000),
(4, 'wew', 5, 3, 170000, NULL, 0, 170000, '2015-10-31 11:58:09', 2, 1, 1, '2015-10-31 11:58:03', '2015-11-01 12:02:50', NULL, NULL, NULL, NULL, 'wewwew', NULL, NULL),
(5, 'Mona', 5, 3, 170000, NULL, 0, 170000, '2015-11-01 12:03:07', 2, 1, 1, '2015-11-01 12:02:57', '2015-11-01 12:13:03', NULL, NULL, NULL, NULL, '', NULL, NULL),
(6, 'aaaa', 2, 1, 170000, NULL, 0, 170000, '2015-11-01 12:13:28', 1, 1, 1, '2015-11-01 12:13:16', '2015-11-01 12:13:28', NULL, NULL, NULL, NULL, '', NULL, NULL),
(7, 'Table II', 2, 2, 170000, NULL, 0, 170000, '2015-11-01 01:18:39', 1, 1, 1, '2015-11-01 01:18:07', '2015-11-01 01:18:39', NULL, NULL, NULL, NULL, '', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
