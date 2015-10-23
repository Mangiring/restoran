-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2015 pada 10.30
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist_tab`
--

CREATE TABLE IF NOT EXISTS `wishlist_tab` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `wname` varchar(50) DEFAULT NULL,
  `wtid` int(11) NOT NULL,
  `wtotal` double NOT NULL,
  `wppn` double DEFAULT NULL,
  `wdis` double NOT NULL,
  `wtotalall` double NOT NULL,
  `wdate` datetime DEFAULT NULL,
  `wstatus` int(11) NOT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data untuk tabel `wishlist_tab`
--

INSERT INTO `wishlist_tab` (`wid`, `wname`, `wtid`, `wtotal`, `wppn`, `wdis`, `wtotalall`, `wdate`, `wstatus`) VALUES
(41, 'sandi', 4, 103000, 10, 10, 82400, '2015-10-23 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
