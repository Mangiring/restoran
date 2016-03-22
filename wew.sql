-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 09 Nov 2015 pada 21.54
-- Versi Server: 5.5.46-0ubuntu0.14.04.2
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `access_tab`
--

INSERT INTO `access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 1, 18, 1),
(32, 2, 1, 0),
(33, 2, 2, 1),
(34, 2, 3, 1),
(35, 2, 4, 1),
(36, 2, 5, 1),
(37, 2, 6, 1),
(38, 2, 7, 1),
(39, 2, 8, 1),
(40, 2, 9, 1),
(41, 2, 10, 1),
(42, 2, 11, 1),
(43, 2, 12, 1),
(44, 2, 13, 1),
(45, 2, 14, 1),
(46, 2, 15, 1),
(47, 2, 16, 1),
(48, 2, 17, 1),
(49, 2, 18, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `permission_tab`
--

INSERT INTO `permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES
(1, 'Menus', 'Menus', 'menus', 0),
(2, 'CategoryMenu', 'Category Menu', 'categories', 0),
(3, 'RawMaterial', 'Raw Material', 'raw_material', 0),
(4, 'Table', 'Table', 'tables', 0),
(5, 'CategoryTables', 'Category Tables', 'categories_tables', 0),
(6, 'Inventory', 'Inventory', 'inventory', 0),
(7, 'ItemReceiving', 'Item Receiving', 'itemreceiving', 0),
(8, 'ItemOut', 'Item Out', 'itemout', 0),
(9, 'StockOpname', 'Stock Opname', 'opname', 0),
(10, 'Billing', 'Billing', 'wishlist/home/billing', 0),
(11, 'Wishlist', 'Wishlist', 'wishlist', 0),
(12, 'PetiCash', 'Peti Cash', 'peti_cash', 0),
(13, 'ReportTransaction', 'Report Transaction', 'report_transaction', 0),
(14, 'ReportOpname', 'Report Opname', 'report_opname', 0),
(15, 'ReportPetiCash', 'Report Peti Cash', 'report_peti_cash', 0),
(16, 'ReportItemOut', 'Report Item Out', 'report_item_out', 0),
(17, 'User', 'User', 'users', 0),
(18, 'UserGroup', 'User Group', 'users/users_group', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
