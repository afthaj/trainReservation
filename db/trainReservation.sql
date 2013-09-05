-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2013 at 09:40 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trainReservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `adminID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `joinDate` datetime NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `othernames` varchar(50) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(70) NOT NULL,
  `dateofbirth` date NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `telephoneNumber` varchar(13) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` VALUES(1, 'admin', '123', '2010-12-27 23:04:35', 'Admin', 'Middle', 'User', 'Thalangama, Battaramulla', '1988-11-18', 22, 'M', '0777746692', 'afthajaldin@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passengerID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `joinDate` datetime NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `othernames` varchar(50) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(70) NOT NULL,
  `dateofbirth` date NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `telephoneNumber` varchar(13) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  PRIMARY KEY (`passengerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` VALUES(1, 'aftha', '123', '2010-12-27 00:00:00', 'Aftha', 'Rizwan', 'Jaldin', '218/61, Deniyawatta Road, Thalangama, Battaramulla', '1988-11-18', 22, 'M', '0774422980', 'aftha.jaldin88@gmail.com');
INSERT INTO `passenger` VALUES(2, 'muznia', '456', '2010-12-27 13:07:59', 'Muznia', '', 'Jaldin', '218/61, Deniyawatta Road, Thalangama, Battaramulla', '1984-11-24', 26, 'F', '0778499319', 'muzniajaldin@yahoo.com');
INSERT INTO `passenger` VALUES(3, 'rajitha', '123', '2010-12-29 11:08:33', 'Rajitha', 'Shalika', 'Jayasekara', 'Siddamulla, Kottawa', '1987-04-14', 23, 'M', '', '');
INSERT INTO `passenger` VALUES(4, 'dada', '123', '2010-12-30 11:18:18', 'Imtiaz', 'Saramasth', 'Jaldin', '218/61, Deniyawatta Road, Thalangama, Battaramulla', '1951-05-16', 59, 'M', '0775799571', 'i.jaldin@yahoo.com');
INSERT INTO `passenger` VALUES(5, 'milinda', '123', '2010-12-30 11:40:33', 'Milinda', '', 'Jayathilaka', 'Colombo 07', '1987-01-01', 23, 'M', '', '');
INSERT INTO `passenger` VALUES(12, 'diyana', '123', '2010-12-30 12:32:29', 'Diyana', '', 'Kahawita', 'New York', '1990-08-10', 20, 'F', '0112345678', 'Denator@live.com');
INSERT INTO `passenger` VALUES(13, 'passenger1', '123', '2010-12-31 11:47:38', 'Passenger', 'Number', 'One', 'Wakaputa Handiya, Colombo', '1988-11-18', 22, 'M', '0777654321', 'passengerone@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(5) NOT NULL AUTO_INCREMENT,
  `passengerID` int(5) NOT NULL,
  `adminID` int(5) NOT NULL,
  `trainNo` varchar(5) NOT NULL,
  `class` varchar(1) NOT NULL,
  `noOfPassengers` varchar(3) NOT NULL,
  `dateSubmitted` datetime NOT NULL,
  PRIMARY KEY (`reservationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` VALUES(6, 0, 1, '8058', '1', '2', '2011-01-02 13:45:09');
INSERT INTO `reservation` VALUES(7, 1, 0, '8056', '1', '3', '2011-01-02 13:50:34');
INSERT INTO `reservation` VALUES(8, 12, 0, '0048', '1', '1', '2011-01-02 13:51:22');
INSERT INTO `reservation` VALUES(9, 12, 0, '1017', '1', '3', '2011-01-02 13:54:15');
INSERT INTO `reservation` VALUES(11, 12, 0, '0077', '1', '2', '2011-01-02 13:56:15');
INSERT INTO `reservation` VALUES(12, 12, 0, '0077', '2', '3', '2011-01-02 13:57:14');
INSERT INTO `reservation` VALUES(13, 0, 1, '0009', '3', '3', '2011-01-02 13:59:07');
INSERT INTO `reservation` VALUES(14, 0, 1, '4002', '2', '2', '2011-01-02 14:08:35');
INSERT INTO `reservation` VALUES(15, 0, 1, '8040', '3', '1', '2011-01-02 14:12:30');
INSERT INTO `reservation` VALUES(16, 0, 1, '0058', '2', '3', '2011-01-02 14:14:26');
INSERT INTO `reservation` VALUES(17, 0, 1, '0005', '2', '3', '2011-01-02 14:15:42');
INSERT INTO `reservation` VALUES(18, 1, 0, '0051', '3', '1', '2011-01-02 14:27:36');
INSERT INTO `reservation` VALUES(19, 1, 0, '0056', '1', '3', '2011-01-02 14:31:10');
INSERT INTO `reservation` VALUES(20, 1, 0, '0095', '1', '2', '2011-01-02 14:39:10');
INSERT INTO `reservation` VALUES(21, 1, 0, '0023', '2', '3', '2011-01-02 14:44:02');
INSERT INTO `reservation` VALUES(22, 1, 0, '0059', '1', '3', '2011-01-02 14:52:28');
INSERT INTO `reservation` VALUES(23, 1, 0, '0094', '1', '5', '2011-01-02 14:52:56');
INSERT INTO `reservation` VALUES(24, 1, 0, '8041', '1', '5', '2011-01-02 17:26:10');
INSERT INTO `reservation` VALUES(25, 1, 0, '0095', '1', '1', '2011-01-02 17:37:46');
INSERT INTO `reservation` VALUES(26, 1, 0, '0095', '1', '3', '2011-01-02 17:50:00');
INSERT INTO `reservation` VALUES(27, 2, 0, '0048', '2', '6', '2011-01-02 18:07:58');
INSERT INTO `reservation` VALUES(28, 0, 1, '0086', '1', '4', '2011-01-02 18:36:48');
INSERT INTO `reservation` VALUES(29, 0, 1, '8056', '1', '1', '2011-01-02 19:19:05');
INSERT INTO `reservation` VALUES(30, 0, 1, '0058', '2', '5', '2011-01-02 20:09:19');
INSERT INTO `reservation` VALUES(31, 0, 1, '0086', '2', '5', '2011-01-02 22:15:55');
INSERT INTO `reservation` VALUES(32, 2, 0, '1006', '1', '4', '2011-01-03 02:02:56');
INSERT INTO `reservation` VALUES(33, 1, 0, '1016', '1', '35', '2011-01-03 13:34:49');
INSERT INTO `reservation` VALUES(34, 1, 0, '0058', '1', '2', '2011-01-03 22:37:34');
INSERT INTO `reservation` VALUES(35, 1, 0, '0058', '1', '5', '2011-01-03 22:38:31');
INSERT INTO `reservation` VALUES(36, 1, 0, '0096', '1', '1', '2011-01-04 09:09:37');
INSERT INTO `reservation` VALUES(37, 1, 0, '0051', '1', '3', '2011-06-16 23:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `train_schedule`
--

CREATE TABLE `train_schedule` (
  `trainNo` varchar(5) NOT NULL,
  `trainName` varchar(50) NOT NULL,
  `departureStation` varchar(20) NOT NULL,
  `departureTime` time NOT NULL,
  `arrivalStation` varchar(20) NOT NULL,
  `arrivalTime` time NOT NULL,
  `stationsIncluded` varchar(1000) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `otherInformation` varchar(200) NOT NULL,
  PRIMARY KEY (`trainNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_schedule`
--

INSERT INTO `train_schedule` VALUES('0005', 'Podi Menike', 'Colombo-Fort', '05:55:00', 'Badulla', '16:20:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Gampola, Ulapane, Nawalapitiya, Galabodde, Watawala, Rozella, Hatton, Kotagala, Talawakelle, Watagodde, Great Western, Nanu Oya, Ambewela, Pattipola, Ohiya, Idalgashinna, Haputale, Diyatalawe, Bandarawela, Ella, Demodara, Uduwara, Hali Ela, Badulla.', 'Daily', 'Runs Via Kandy, Observation Saloon 2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0006', 'Podi Menike', 'Badulla', '09:10:00', 'Colombo-Fort', '19:45:00', 'Badulla, Hali Ela, Uduwara, Demodara, Ella, Bandarawela, Diyatalawe, Haputale, Idalgashinna,  Ohiya, Pattipola, Ambewela, Nanu Oya, Great Western, Watagodde, Talawakelle, Kotagala, Hatton, Rozella, Watawala, Galabodde, Nawalapitiya, Ulapane, Gampola, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Runs via Kandy, Observation Saloon 2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0009', 'Intercity Express', 'Colombo-Fort', '07:00:00', 'Kandy', '09:35:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Sarasavi Uyana, Kandy', 'Daily', '1st & 2nd Class Reserved');
INSERT INTO `train_schedule` VALUES('0010', 'Intercity Express', 'Kandy', '15:00:00', 'Colombo-Fort', '17:35:00', 'Kandy, Sarasavi Uyana, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', '1st & 2nd Class Reserved');
INSERT INTO `train_schedule` VALUES('0015', 'Udarata Menike', 'Colombo-Fort', '09:45:00', 'Badulla', '19:05:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Gampola, Ulapane, Nawalapitiya, Galabodde, Watawala, Rozella, Hatton, Kotagala, Talawakelle, Watagodde, Great Western, Nanu Oya, Ambewela, Pattipola, Ohiya, Idalgashinna, Haputale, Diyatalawe, Bandarawela, Ella, Demodara, Uduwara, Hali Ela, Badulla', 'Daily', 'Observation Saloon 2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0016', 'Udarata Menike', 'Badulla', '05:55:00', 'Colombo-Fort', '15:30:00', 'Badulla, Hali Ela, Uduwara, Demodara, Ella, Bandarawela, Diyatalawe, Haputale, Idalgashinna,  Ohiya, Pattipola, Ambewela, Nanu Oya, Great Western, Watagodde, Talawakelle, Kotagala, Hatton, Rozella, Watawala, Galabodde, Nawalapitiya, Ulapane, Gampola, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Observation Saloon 2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0019', 'Express', 'Colombo-Fort', '10:30:00', 'Matale', '16:15:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Sarasavi Uyana, Kandy, Matale', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0020', 'Express', 'Kandy', '15:40:00', 'Colombo-Fort', '18:55:00', 'Kandy, Sarasavi Uyana, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0023', 'Express', 'Colombo-Fort', '12:40:00', 'Hatton', '20:00:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Gampola, Ulapane, Nawalapitiya, Galabodde, Watawala, Rozella, Hatton', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0029', 'Intercity Express', 'Colombo-Fort', '15:35:00', 'Kandy', '18:05:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Sarasavi Uyana, Kandy', 'Daily', '1st & 2nd Class Stops at Peradeniya');
INSERT INTO `train_schedule` VALUES('0030', 'Intercity Express', 'Kandy', '06:25:00', 'Colombo-Fort', '09:00:00', 'Kandy, Sarasavi Uyana, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Observation & 2nd Class Reserved');
INSERT INTO `train_schedule` VALUES('0035', 'Express', 'Colombo-Fort', '16:55:00', 'Kandy', '20:00:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Sarasavi Uyana, Kandy', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0036', 'Express', 'Matale', '05:15:00', 'Colombo-Fort', '10:10:00', 'Matale, Kandy, Sarasavi Uyana, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0045', 'Night Mail', 'Colombo-Fort', '19:40:00', 'Badulla', '06:30:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Gampola, Ulapane, Nawalapitiya, Galabodde, Watawala, Rozella, Hatton, Kotagala, Talawakelle, Watagodde, Great Western, Nanu Oya, Ambewela, Pattipola, Ohiya, Idalgashinna, Haputale, Diyatalawe, Bandarawela, Ella, Demodara, Uduwara, Hali Ela, Badulla', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0047', 'Night Mail', 'Colombo-Fort', '22:00:00', 'Badulla', '08:45:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Panaliya, Tismalpola, Yatagama, Rambukkana, Kadigamuwa, Gangoda, Ihala Kotte, Balana, Kadugannawa, Pilimatalawa, Peradeniya, Gampola, Ulapane, Nawalapitiya, Galabodde, Watawala, Rozella, Hatton, Kotagala, Talawakelle, Watagodde, Great Western, Nanu Oya, Ambewela, Pattipola, Ohiya, Idalgashinna, Haputale, Diyatalawe, Bandarawela, Ella, Demodara, Uduwara, Hali Ela, Badulla', 'Daily', '1st Class Berths and 2nd and 3rd Class Sleeperettes');
INSERT INTO `train_schedule` VALUES('0048', 'Night Mail', 'Badulla', '19:50:00', 'Colombo-Fort', '05:50:00', 'Badulla, Hali Ela, Uduwara, Demodara, Ella, Bandarawela, Diyatalawe, Haputale, Idalgashinna,  Ohiya, Pattipola, Ambewela, Nanu Oya, Great Western, Watagodde, Talawakelle, Kotagala, Hatton, Rozella, Watawala, Galabodde, Nawalapitiya, Ulapane, Gampola, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', '2nd & 3rd Class Sleeperettes');
INSERT INTO `train_schedule` VALUES('0050', 'Night Mail', 'Matara', '18:30:00', 'Trincomalee', '08:45:00', 'Matara, Kamburugamuva, Weligama, Ahangama, Koggala, Talpe, Galle, Hikkaduwa, Ambalangoda, Balapitiya, Kosgoda, Bentota, Aluthgama, Beruwala, Kaluthara, Wadduwa, Panadura, Moratuwa, Ratmalana, Mount Lavinia, Dehiwala, Wellawatta, Bambalapitiya, Kollutipiya, Slave Island, Colombo-Fort, Maradana, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Polgahawela, Potuhera, Kurunegala, Wellawa, Ganewatta, Maho, Moragollagama, Kalawewa, Kekirawa, Habarana, Gal Oya, Kanthalai, Thampalakamam, China Bay, Trincomalee', 'Daily', 'Departure Via Colombo-Fort at 22:30 2nd and 3rd Class');
INSERT INTO `train_schedule` VALUES('0051', 'Night Mail', 'Trincomalee', '17:00:00', 'Matara', '07:15:00', 'Trincomalee, China Bay, Thampalakamam, Kanthalai, Gal Oya, Habarana, Kekirawa, Kalawewa, Moragollagama, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama, Bentota, Kosgoda, Balapitiya, Ambalangoda, Hikkaduwa, Galle, Talpe, Koggala,\r\nAhangama, Weligama, Kamburugamuva, Matara', 'Daily', 'Departure Via Colombo-Fort at 3:15 2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0056', 'Gaalu Kumari', 'Maradana', '13:40:00', 'Matara', '18:40:00', 'Maradana, Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama, Bentota, Kosgoda, Balapitiya, Ambalangoda, Hikkaduwa, Galle, Talpe, Koggala,\r\nAhangama, Weligama, Kamburugamuva, Matara', 'Monday to Friday', '2nd & 3rd Class Colombo-Fort 14:05 Galle 18:16 Sat, Sun, Poya 3rd Class');
INSERT INTO `train_schedule` VALUES('0057', 'Gaalu Kumari', 'Matara', '07:25:00', 'Maradana', '11:50:00', 'Matara, Kamburugamuva, Weligama, Ahangama, Koggala, Talpe, Galle, Hikkaduwa, Ambalangoda, Balapitiya, Kosgoda, Bentota, Aluthgama, Beruwala, Kaluthara, Wadduwa, Panadura, Moratuwa, Ratmalana, Mount Lavinia, Dehiwala, Wellawatta, Bambalapitiya, Kollutipiya, Slave Island, Colombo-Fort, Maradana', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0058', 'Ruhunu Kumari', 'Maradana', '15:50:00', 'Matara', '19:30:00', 'Maradana, Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama, Bentota, Kosgoda, Balapitiya, Ambalangoda, Hikkaduwa, Galle, Talpe, Koggala,\r\nAhangama, Weligama, Kamburugamuva, Matara', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0059', 'Ruhunu Kumari', 'Matara', '05:40:00', 'Maradana', '09:20:00', 'Matara, Kamburugamuva, Weligama, Ahangama, Koggala, Talpe, Galle, Hikkaduwa, Ambalangoda, Balapitiya, Kosgoda, Bentota, Aluthgama, Beruwala, Kaluthara, Wadduwa, Panadura, Moratuwa, Ratmalana, Mount Lavinia, Dehiwala, Wellawatta, Bambalapitiya, Kollutipiya, Slave Island, Colombo-Fort, Maradana', 'Daily', '2nd & 3rd Class');
INSERT INTO `train_schedule` VALUES('0077', 'Yaldevi', 'Colombo-Fort', '05:45:00', 'Vavuniya', '11:50:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Potuhera, Kurunegala, Wellawa, Ganewatta, Maho, Galgamuwa, Talawa, Anuradhapura, Medawachchiya, Vavuniya', 'Daily', 'Travels via Anuradhapura Air Conditioned 1st Class 2nd & 3 Class');
INSERT INTO `train_schedule` VALUES('0078', 'Yaldevi', 'Vavuniya', '13:15:00', 'Colombo-Fort', '19:20:00', 'Vavuniya, Medawachchiya, Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', '2nd & 3rd Class Reserved/Non');
INSERT INTO `train_schedule` VALUES('0081', 'Express', 'Colombo-Fort', '06:15:00', 'Trincomalee', '14:10:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Polgahawela, Potuhera, Kurunegala, Wellawa, Ganewatta, Maho, Moragollagama, Kalawewa, Kekirawa, Habarana, Gal Oya, Kanthalai, Thampalakamam, China Bay, Trincomalee', 'Daily', '2nd & 3rd Class Connection to Gal Oya - Polonnaruwa at 13:15');
INSERT INTO `train_schedule` VALUES('0082', 'Express', 'Trincomalee', '09:45:00', 'Colombo-Fort', '17:45:00', 'Trincomalee, China Bay, Thampalakamam, Kanthalai, Gal Oya, Gal Oya, Habarana, Kekirawa, Kalawewa, Moragollagama, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', '2nd & 3rd Class Connection to Gal Oya-Polonnaruwa at 10:50');
INSERT INTO `train_schedule` VALUES('0085', 'Rajarata Rajini', 'Matara', '09:15:00', 'Vavuniya', '20:25:00', 'Matara, Kamburugamuva, Weligama, Ahangama, Koggala, Talpe, Galle, Hikkaduwa, Ambalangoda, Balapitiya, Kosgoda, Bentota, Aluthgama, Beruwala, Kaluthara, Wadduwa, Panadura, Moratuwa, Ratmalana, Mount Lavinia, Dehiwala, Wellawatta, Bambalapitiya, Kollutipiya, Slave Island, Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Potuhera, Kurunegala, Wellawa, Ganewatta, Maho, Galgamuwa, Talawa, Anuradhapura, Medawachchiya, Vavuniya', 'Daily', '2nd & 3rd Class Via Colombo-Fort Departure at 14:00');
INSERT INTO `train_schedule` VALUES('0086', 'Rajarata Rajini', 'Vavuniya', '03:15:00', 'Matara', '14:15:00', 'Vavuniya, Medawachchiya, Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama, Bentota, Kosgoda, Balapitiya, Ambalangoda, Hikkaduwa, Galle, Talpe, Koggala, Ahangama, Weligama, Kamburugamuva, Matara', 'Daily', '2nd & 3rd Class Via Colombo-Fort Departure at 10:30');
INSERT INTO `train_schedule` VALUES('0089', 'Night Mail', 'Colombo-Fort', '21:30:00', 'Vavuniya', '04:25:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Potuhera, Kurunegala, Wellawa, Ganewatta, Maho, Galgamuwa, Talawa, Anuradhapura, Medawachchiya, Vavuniya', 'Daily', '2nd & 3rd Class Via Anuradhapura at 2:45');
INSERT INTO `train_schedule` VALUES('0090', 'Night Mail', 'Vavuniya', '21:30:00', 'Colombo-Fort', '04:50:00', 'Vavuniya, Medawachchiya, Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', '2nd & 3rd Class Via Anuradhapura at 23:10');
INSERT INTO `train_schedule` VALUES('0094', 'Intercity Train/Express', 'Colombo-Fort', '16:45:00', 'Galle', '19:15:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama, Bentota, Kosgoda, Balapitiya, Ambalangoda, Hikkaduwa, Galle', 'Daily', '2nd & 3rd Class Via Hikkaduwa at 18:52');
INSERT INTO `train_schedule` VALUES('0095', 'Intercity Train/Express', 'Galle', '07:40:00', 'Colombo-Fort', '10:00:00', 'Galle, Hikkaduwa, Ambalangoda, Balapitiya, Kosgoda, Bentota, Aluthgama, Beruwala, Kaluthara, Wadduwa, Panadura, Moratuwa, Ratmalana, Mount Lavinia, Dehiwala, Wellawatta, Bambalapitiya, Kollutipiya, Slave Island, Colombo-Fort', 'Daily', '2nd & 3rd Class Via Hikkaduwa at 8:05');
INSERT INTO `train_schedule` VALUES('0096', 'Express Train', 'Colombo-Fort', '15:55:00', 'Vavuniya', '20:40:00', 'Colombo-Fort, Maradana, Dematagoda, Kelaniya, Wanawasala, Hunupitiya, Enderamulla, Horape, Ragama, Walpola, Batuwaththa, Bulugahagoda, Ganemulla, Yagoda, Gampaha, Daraluwa, Bemmulla, Magalegoda, Heendeniya Pattiyagoda, Veyangoda, Wadurawa, Keenawala, Ganegoda, Wijaya Rajadahana, Mirigama, Wilwatta, Botale, Ambepussa, Yattalgoda, Bujjomuwa, Alawwa, Walakumbura, Polgahawela, Potuhera, Kurunegala, Wellawa, Ganewatta, Maho, Galgamuwa, Talawa, Anuradhapura, Medawachchiya, Vavuniya', 'Daily', 'A/C and 2nd Class Via Anuradhapura at 19:40');
INSERT INTO `train_schedule` VALUES('0097', 'Express Train', 'Vavuniya', '05:45:00', 'Colombo-Fort', '10:25:00', 'Vavuniya, Medawachchiya, Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'A/C and 2nd Class Via Anuradhapura at 6:40');
INSERT INTO `train_schedule` VALUES('1006', 'Long Distance', 'Badulla', '08:50:00', 'Colombo-Fort', '19:30:00', 'Badulla, Hali Ela, Uduwara, Demodara, Ella, Bandarawela, Diyatalawe, Haputale, Idalgashinna,  Ohiya, Pattipola, Ambewela, Nanu Oya, Great Western, Watagodde, Talawakelle, Kotagala, Hatton, Rozella, Watawala, Galabodde, Nawalapitiya, Ulapane, Gampola, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Badulla');
INSERT INTO `train_schedule` VALUES('1016', 'Long Distance', 'Badulla', '05:45:00', 'Colombo-Fort', '15:40:00', 'Badulla, Hali Ela, Uduwara, Demodara, Ella, Bandarawela, Diyatalawe, Haputale, Idalgashinna,  Ohiya, Pattipola, Ambewela, Nanu Oya, Great Western, Watagodde, Talawakelle, Kotagala, Hatton, Rozella, Watawala, Galabodde, Nawalapitiya, Ulapane, Gampola, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Badulla');
INSERT INTO `train_schedule` VALUES('1017', 'Long Distance', 'Bandarawela', '07:18:00', 'Colombo-Fort', '15:40:00', 'Bandarawela, Diyatalawe, Haputale, Idalgashinna,  Ohiya, Pattipola, Ambewela, Nanu Oya, Great Western, Watagodde, Talawakelle, Kotagala, Hatton, Rozella, Watawala, Galabodde, Nawalapitiya, Ulapane, Gampola, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Badulla');
INSERT INTO `train_schedule` VALUES('1046', 'Long Distance', 'Badulla', '18:00:00', 'Colombo-Fort', '05:15:00', 'Badulla, Hali Ela, Uduwara, Demodara, Ella, Bandarawela, Diyatalawe, Haputale, Idalgashinna,  Ohiya, Pattipola, Ambewela, Nanu Oya, Great Western, Watagodde, Talawakelle, Kotagala, Hatton, Rozella, Watawala, Galabodde, Nawalapitiya, Ulapane, Gampola, Peradeniya, Pilimatalawa, Kadugannawa, Balana, Ihala Kotte, Gangoda, Kadigamuwa, Rambukkana, Yatagama, Tismalpola, Panaliya, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Badulla');
INSERT INTO `train_schedule` VALUES('4002', 'Long Distance', 'Anuradhapura', '16:55:00', 'Colombo-Fort', '20:30:00', 'Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Thandikulam');
INSERT INTO `train_schedule` VALUES('4004', 'Long Distance', 'Anuradhapura', '06:40:00', 'Colombo-Fort', '10:25:00', 'Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Vavuniya');
INSERT INTO `train_schedule` VALUES('4086', 'Long Distance', 'Anuradhapura', '05:00:00', 'Colombo-Fort', '09:55:00', 'Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Vavuniya');
INSERT INTO `train_schedule` VALUES('4090', 'Long Distance', 'Anuradhapura', '23:30:00', 'Colombo-Fort', '04:35:00', 'Anuradhapura, Talawa, Galgamuwa, Maho, Ganewatta, Wellawa, Kurunegala, Potuhera, Polgahawela, Walakumbura, Alawwa, Bujjomuwa, Yattalgoda, Ambepussa, Botale, Wilwatta, Mirigama, Wijaya Rajadahana, Ganegoda, Keenawala, Wadurawa, Veyangoda, Heendeniya Pattiyagoda, Magalegoda, Bemmulla, Daraluwa, Gampaha, Yagoda, Ganemulla, Bulugahagoda, Batuwaththa, Walpola, Ragama, Horape, Enderamulla, Hunupitiya, Wanawasala, Kelaniya, Dematagoda, Maradana, Colombo-Fort', 'Daily', 'Train Starting from Thandikulam');
INSERT INTO `train_schedule` VALUES('8040', 'Long Distance', 'Colombo-Fort', '08:35:00', 'Aluthgama', '09:58:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Daily', 'Train Starting from Colombo-Fort Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8041', 'Long Distance', 'Colombo-Fort', '08:35:00', 'Galle', '11:18:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama, Bentota, Kosgoda, Balapitiya, Ambalangoda, Hikkaduwa, Galle', 'Daily', 'Train Starting from Colombo-Fort Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8050', 'Long Distance', 'Colombo-Fort', '06:55:00', 'Aluthgama', '08:34:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Daily', 'Train Starting from Maradana Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8051', 'Long Distance', 'Colombo-Fort', '06:55:00', 'Galle', '09:48:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama, Bentota, Kosgoda, Balapitiya, Ambalangoda, Hikkaduwa, Galle', 'Daily', 'Train Starting from Maradana Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8056', 'Long Distance', 'Colombo-Fort', '14:05:00', 'Aluthgama', '15:29:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Daily', 'Train Starting from Maradana Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8058', 'Long Distance', 'Colombo-Fort', '15:50:00', 'Aluthgama', '17:03:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Daily', 'Train Starting from Maradana, Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8086', 'Long Distance', 'Colombo-Fort', '10:30:00', 'Aluthgama', '11:54:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Daily', 'Train Starting from Colombo-Fort Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8096', 'Long Distance', 'Colombo-Fort', '16:46:00', 'Aluthgama', '18:07:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Monday to Friday', 'Train Starting from Maradana Train Runs to Matara');
INSERT INTO `train_schedule` VALUES('8097', 'Colombo Commuter', 'Colombo-Fort', '17:55:00', 'Aluthgama', '19:47:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Saturday and Sunday', 'Train Starting from Maradana Train Runs to Galle');
INSERT INTO `train_schedule` VALUES('8742', 'Colombo Commuter', 'Colombo-Fort', '11:15:00', 'Aluthgama', '13:07:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Daily', 'Train Starting from Colombo-Fort Train Runs to Aluthgama');
INSERT INTO `train_schedule` VALUES('8751', 'Colombo Commuter', 'Colombo-Fort', '14:10:00', 'Aluthgama', '16:13:00', 'Colombo-Fort, Slave Island, Kollutipiya, Bambalapitiya, Wellawatta, Dehiwala, Mount Lavinia, Ratmalana, Moratuwa, Panadura, Wadduwa, Kaluthara, Beruwala, Aluthgama', 'Daily', 'Train Starting from Maradana Train Runs to Aluthgama');
