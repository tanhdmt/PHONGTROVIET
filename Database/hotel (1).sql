-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 04:05 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_customers`(IN id INT)
BEGIN
SELECT count(*) FROM customer;

END$$

CREATE DEFINER=`hotel`@`localhost` PROCEDURE `get_available_rooms`(IN o_room_type varchar(50), IN o_checkin_date varchar(50), IN o_checkout_date varchar(50))
BEGIN
SELECT * FROM `room` WHERE room_type=o_room_type AND NOT EXISTS (
SELECT room_id FROM reservation WHERE reservation.room_id=room.room_id AND checkout_date >= o_checkin_date AND checkin_date <= o_checkout_date
UNION ALL
SELECT room_id FROM room_sales WHERE room_sales.room_id=room.room_id AND checkout_date >= o_checkin_date AND checkin_date <= o_checkout_date
);
END$$

CREATE DEFINER=`hotel`@`localhost` PROCEDURE `get_customers`(IN today_date varchar(50))
BEGIN
SELECT * FROM `room_sales` NATURAL JOIN `customer` WHERE checkout_date >= today_date AND checkin_date <= today_date;
END$$

CREATE DEFINER=`hotel`@`localhost` PROCEDURE `todays_service_count`(IN today_date varchar(50))
BEGIN
SELECT count(*) as amount, "laundry" as type FROM laundry_service WHERE laundry_date=today_date UNION ALL SELECT count(*) as amount, "massage" as type FROM massage_service WHERE massage_date=today_date UNION ALL SELECT count(*) as amount, "roomservice" as type FROM get_roomservice WHERE roomservice_date=today_date UNION ALL SELECT count(*) as amount, "medicalservice" as type FROM get_medicalservice WHERE medicalservice_date=today_date UNION ALL SELECT count(*) as amount, "sport" as type FROM do_sport WHERE dosport_date=today_date
UNION ALL SELECT count(*) as amount, "restaurant" as type FROM restaurant_booking WHERE book_date=today_date;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chiphish`
--

CREATE TABLE IF NOT EXISTS `chiphish` (
`MaCP` int(10) NOT NULL,
  `TenCP` varchar(30) CHARACTER SET utf8 NOT NULL,
  `DonGia` int(11) NOT NULL,
  `MaNT` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `chiphish`
--

INSERT INTO `chiphish` (`MaCP`, `TenCP`, `DonGia`, `MaNT`) VALUES
(9, 'Điện', 5000, 2),
(10, 'Nước', 3000, 2),
(11, 'Rác', 3000, 2),
(12, 'Điện', 5000, 1),
(13, 'Nước', 3000, 1),
(14, 'Rác', 3000, 1),
(15, 'Wifi', 30000, 1),
(16, 'Điện', 0, 4),
(17, 'Nước', 0, 4),
(18, 'rasc', 100000, 4),
(19, 'internet', 100000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dien`
--

CREATE TABLE IF NOT EXISTS `dien` (
`MaDien` int(10) NOT NULL,
  `MaPhong` int(5) NOT NULL,
  `Thang` int(2) NOT NULL,
  `Nam` int(4) NOT NULL,
  `ChiSoCu` int(10) DEFAULT NULL,
  `ChiSoMoi` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dien`
--

INSERT INTO `dien` (`MaDien`, `MaPhong`, `Thang`, `Nam`, `ChiSoCu`, `ChiSoMoi`) VALUES
(1, 4, 5, 2017, 0, 15),
(2, 1, 5, 2017, 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
`MaHD` int(20) NOT NULL,
  `MaPhong` int(5) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` int(11) DEFAULT NULL,
  `DaTra` int(11) DEFAULT NULL,
  `No` int(11) DEFAULT NULL,
  `ConLai` int(11) DEFAULT NULL,
  `NgayTra` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaPhong`, `NgayLap`, `TongTien`, `DaTra`, `No`, `ConLai`, `NgayTra`) VALUES
(5, 4, '2017-05-08', 926000, 300000, 0, 626000, '0000-00-00'),
(6, 1, '2017-05-09', 909000, 400000, 0, 509000, '2017-06-12'),
(7, 7, '2017-05-09', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

CREATE TABLE IF NOT EXISTS `loaiphong` (
`MaLoaiPhong` int(5) NOT NULL,
  `TenLoaiPhong` varchar(50) CHARACTER SET utf8 NOT NULL,
  `GiaPhong` int(20) NOT NULL,
  `MaNT` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `loaiphong`
--

INSERT INTO `loaiphong` (`MaLoaiPhong`, `TenLoaiPhong`, `GiaPhong`, `MaNT`) VALUES
(1, 'Phòng thường', 800000, 1),
(2, 'Phòng VIP', 1300000, 1),
(3, 'bt', 50000000, 4),
(4, 'vip', 1000000, 4),
(5, 'fdsad', 1212121, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhatro`
--

CREATE TABLE IF NOT EXISTS `nhatro` (
`MaNT` int(5) NOT NULL,
  `TenNT` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(30) CHARACTER SET utf32 NOT NULL,
  `DiaChi` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `SDT` int(15) DEFAULT NULL,
  `SoLuongPhong` int(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `nhatro`
--

INSERT INTO `nhatro` (`MaNT`, `TenNT`, `Username`, `Password`, `DiaChi`, `SDT`, `SoLuongPhong`) VALUES
(1, 'Tuấn Việt', 'admin', 'admin', 'Thủ Đức', 1672417012, 30),
(2, 'Tuấn Anh', 'tanhdmt', 'hoinghia12', NULL, NULL, NULL),
(3, 'FDSFG', 'as', 'as', NULL, NULL, NULL),
(4, 'quang', 'quang', 'quang', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nuoc`
--

CREATE TABLE IF NOT EXISTS `nuoc` (
`MaNuoc` int(10) NOT NULL,
  `MaPhong` int(5) NOT NULL,
  `Thang` int(2) NOT NULL,
  `Nam` int(4) NOT NULL,
  `ChiSoCu` int(10) DEFAULT NULL,
  `ChiSoMoi` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nuoc`
--

INSERT INTO `nuoc` (`MaNuoc`, `MaPhong`, `Thang`, `Nam`, `ChiSoCu`, `ChiSoMoi`) VALUES
(1, 4, 5, 2017, 0, 6),
(2, 1, 5, 2017, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `phongtro`
--

CREATE TABLE IF NOT EXISTS `phongtro` (
`MaPhong` int(5) NOT NULL,
  `NgayThue` date DEFAULT NULL,
  `TinhTrang` varchar(30) NOT NULL,
  `DuDinhTra` date DEFAULT NULL,
  `MaLoaiPhong` int(5) NOT NULL,
  `MaNT` int(5) NOT NULL,
  `GhiChu` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `phongtro`
--

INSERT INTO `phongtro` (`MaPhong`, `NgayThue`, `TinhTrang`, `DuDinhTra`, `MaLoaiPhong`, `MaNT`, `GhiChu`) VALUES
(1, '2017-05-09', 'Đã thuê', NULL, 1, 2, 'Hay về trễ'),
(2, NULL, 'Trống', NULL, 2, 2, NULL),
(3, NULL, 'Trống', NULL, 1, 2, NULL),
(4, '2017-05-08', 'Đã thuê', NULL, 1, 1, 'Hay về trễ'),
(5, '2017-05-09', 'Đã thuê', NULL, 2, 1, ''),
(6, NULL, 'Trống', NULL, 1, 1, NULL),
(7, '2017-05-09', 'Đã thuê', NULL, 3, 4, ''),
(8, NULL, 'Trống', NULL, 4, 4, NULL),
(9, NULL, 'Trống', NULL, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
`MaTV` int(5) NOT NULL,
  `TenTV` varchar(50) NOT NULL,
  `Sdt` bigint(20) DEFAULT NULL,
  `CMND` int(9) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `TinhTrang` varchar(20) NOT NULL,
  `MaPhong` int(5) NOT NULL,
  `ChucVu` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MaTV`, `TenTV`, `Sdt`, `CMND`, `GioiTinh`, `TinhTrang`, `MaPhong`, `ChucVu`) VALUES
(14, 'Dương Tuấn Anh', 43434, 3232, 'Nam', 'Đang ở', 4, 'DD'),
(15, 'Phạm Thị Kiên', 4343, 4343, 'Nữ', 'Đang ở', 4, 'TV'),
(16, 'Dương Tuấn Anh', 656753, 434, 'Nam', 'Đang ở', 1, 'DD'),
(17, 'Dương Việt Anh', 3434435435, NULL, 'Nam', 'Đang ở', 1, 'TV'),
(18, 'b', NULL, NULL, 'Nam', 'Đang ở', 7, 'DD'),
(19, 'dfdfd', NULL, NULL, 'Nam', 'Đang ở', 7, 'TV'),
(20, 'FDFD', NULL, NULL, 'Nam', 'Không ở', 5, 'DD'),
(21, 'RTRT', NULL, NULL, 'Nam', 'Không ở', 5, 'TV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chiphish`
--
ALTER TABLE `chiphish`
 ADD PRIMARY KEY (`MaCP`);

--
-- Indexes for table `dien`
--
ALTER TABLE `dien`
 ADD PRIMARY KEY (`MaDien`,`MaPhong`,`Thang`,`Nam`), ADD KEY `phong` (`MaPhong`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
 ADD PRIMARY KEY (`MaHD`,`MaPhong`,`NgayLap`), ADD KEY `phong` (`MaPhong`);

--
-- Indexes for table `loaiphong`
--
ALTER TABLE `loaiphong`
 ADD PRIMARY KEY (`MaLoaiPhong`);

--
-- Indexes for table `nhatro`
--
ALTER TABLE `nhatro`
 ADD PRIMARY KEY (`MaNT`), ADD UNIQUE KEY `Username` (`Username`), ADD UNIQUE KEY `TenNT` (`TenNT`), ADD UNIQUE KEY `SDT` (`SDT`);

--
-- Indexes for table `nuoc`
--
ALTER TABLE `nuoc`
 ADD PRIMARY KEY (`MaNuoc`,`MaPhong`,`Thang`,`Nam`), ADD KEY `phong` (`MaPhong`);

--
-- Indexes for table `phongtro`
--
ALTER TABLE `phongtro`
 ADD PRIMARY KEY (`MaPhong`), ADD KEY `loaiphong` (`MaLoaiPhong`), ADD KEY `nhatro` (`MaNT`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
 ADD PRIMARY KEY (`MaTV`), ADD KEY `phongtro` (`MaPhong`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chiphish`
--
ALTER TABLE `chiphish`
MODIFY `MaCP` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `dien`
--
ALTER TABLE `dien`
MODIFY `MaDien` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
MODIFY `MaHD` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `loaiphong`
--
ALTER TABLE `loaiphong`
MODIFY `MaLoaiPhong` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nhatro`
--
ALTER TABLE `nhatro`
MODIFY `MaNT` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nuoc`
--
ALTER TABLE `nuoc`
MODIFY `MaNuoc` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phongtro`
--
ALTER TABLE `phongtro`
MODIFY `MaPhong` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
MODIFY `MaTV` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dien`
--
ALTER TABLE `dien`
ADD CONSTRAINT `dien_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phongtro` (`MaPhong`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phongtro` (`MaPhong`);

--
-- Constraints for table `nuoc`
--
ALTER TABLE `nuoc`
ADD CONSTRAINT `nuoc_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phongtro` (`MaPhong`);

--
-- Constraints for table `phongtro`
--
ALTER TABLE `phongtro`
ADD CONSTRAINT `phongtro_ibfk_1` FOREIGN KEY (`MaLoaiPhong`) REFERENCES `loaiphong` (`MaLoaiPhong`),
ADD CONSTRAINT `phongtro_ibfk_2` FOREIGN KEY (`MaNT`) REFERENCES `nhatro` (`MaNT`);

--
-- Constraints for table `thanhvien`
--
ALTER TABLE `thanhvien`
ADD CONSTRAINT `thanhvien_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phongtro` (`MaPhong`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
