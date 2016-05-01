-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2016 at 09:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inf124grp17`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_descriptions`
--

CREATE TABLE `product_descriptions` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `image_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_descriptions`
--

INSERT INTO `product_descriptions` (`id`, `title`, `brand`, `name`, `description`, `price`, `image_path`) VALUES
(1, 'this is a test watch', 'from a test brand', 'with a cool name', 'blkah asdasd\r\nasd\r\nasd\r\nasd\r\nas', 1000.99, 'images/product_images/rolex1.jpg'),
(2, 'Hublot - Ferarri', 'Hublot', 'Ferarri', 'Taking no less than 4 years to develop, the Unico movement is the fruit of intensive research and development within Hublot own manufacture. 330 individually hand-assembled components make up this distinguished movement. With a construction that allows the addition of supplementary functions, the Unico movement can be fitted with other complications and modules such as the Flyback Chronograph, GMT or the Bi-Retrograde Chronograph.', 20000, 'images/product_images/hublot1.jpg'),
(3, 'Hublot - Mr.Brainwash', 'Hublot', 'Mr.Brainwash', 'Rainbow ceramic case with a Green rubber strap. Fixed Gold ceramic bezel. Rainbow dial with luminous hands and alternating Arabic numeral and stick hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display appears between the 4 and 5 o''clock position. Chronograph - three sub-dials displaying: 60 seconds, 30 minutes and 12 hours. Automatic movement with 42 hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Skeleton case back. Case diameter: 44 mm. Case thickness: 14.5 mm. Band width: 22 mm. Deployment clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second. Dress watch style. Watch label: Swiss Made. Hublot Mr. Brainwash Men''s Watch 301.CX.130.RX.\r\n', 15000, 'images/product_images/hublot4.jpg'),
(4, 'Apple - iWatch', 'Apple', 'iWatch', 'The Apple iWatch is a rumored smartwatch project that operates as a small "wearable computing" smartphone-type device that''s worn on a user''s wrist. Apple put the rumors of the iWatch to rest on September 9th, 2014, when it officially released the device under the name of Apple Watch instead of Apple iWatch.\r\n', 600, 'images/product_images/applewatch.jpeg'),
(5, 'Motorola', 'Motorola - Moto Watch', 'Moto Watch', 'The Moto 360 is the most attractive Android Wear device you can buy right now, with a design that''s more reminiscent of a regular watch. Even so, it suffers from poor battery life, just like other early smartwatches, and it has a higher price, too.\r\n', 300, 'images/product_images/motorola.png'),
(6, 'Audemars Piguet - QEII Cup', 'Audemars Piguet', 'QEII Cup', 'This model belongs to the newly relaunched Royal Offshore collection and is a show-stopper piece in stainless steel with a slate-grey dial with ‘Méga Tapisserie’ pattern, black counters, black Arabic numerals and white-gold Royal Oak hands with luminescent coating. The inner bezel is black with a white Tachymeter display. The movement includes a ''Monobloc'' oscillating weight in 22-carat gold and contains 59 jewels. This men''s watch is a real treat for Audemars Piguet enthusiasts, an excellent addition to the brand''s popular collection and perfect for those wanting to remain ahead of the trend as it has only recently been released.\r\n', 10000, 'images/product_images/AP1.jpg'),
(7, 'Rolex', 'Rolex - Sienna', 'Sienna', 'The new Rolesor Datejust 41 is available on an Oyster or Jubilee bracelet. Both bracelets, combining 904L steel and 18 ct gold, benefit from the new concealed attachment beneath the bezel, which ensures seamless visual continuity between the bracelet and case. They are equipped with a folding Oysterclasp and also feature the ingenious Rolex-patented Easylink rapid extension system that allows the wearer to easily increase the bracelet length by approximately 5 mm, for additional comfort in any circumstance.\r\n', 53000, 'images/product_images/rolex1.jpg'),
(8, 'Audemars Piguet - Royal Oak Offshore', 'Audemars Piguet', 'Royal Oak Offshore', 'This model belongs to the newly relaunched Royal Offshore collection and is a show-stopper piece in stainless steel with a slate-grey dial with ‘Méga Tapisserie’ pattern, black counters, black Arabic numerals and white-gold Royal Oak hands with luminescent coating. The inner bezel is black with a white Tachymeter display. The movement includes a ''Monobloc'' oscillating weight in 22-carat gold and contains 59 jewels. This men''s watch is a real treat for Audemars Piguet enthusiasts, an excellent addition to the brand''s popular collection and perfect for those wanting to remain ahead of the trend as it has only recently been released.\r\n', 8000, 'images/product_images/ap2.jpg'),
(9, 'Hublot - WBC', 'Hublot', 'WBC', 'Silver ceramic case with a Green rubber strap. Fixed Gold ceramic bezel. Green dial with luminous hands and alternating Arabic numeral and stick hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display appears between the 4 and 5 o''clock position. Chronograph - three sub-dials displaying: 60 seconds, 30 minutes and 12 hours. Automatic movement with 42 hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Skeleton case back. Case diameter: 44 mm. Case thickness: 14.5 mm. Band width: 22 mm. Deployment clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second. Dress watch style. Watch label: Swiss Made. Hublot Big Bang Green Magic Men''s Watch 301.CX.130.RX.\r\n', 13000, 'images/product_images/hublot2.jpg'),
(10, 'Hublot - Spirit of Big Bang', 'Hublot', 'Spirit of Big Bang', 'Gold ceramic case with a Blue rubber strap. Fixed Gold ceramic bezel. Blue dial with luminous hands and alternating Arabic numeral and stick hour markers. Minute markers around the outer rim. Dial Type: Analog. Luminescent hands and markers. Date display appears between the 4 and 5 o''clock position. Chronograph - three sub-dials displaying: 60 seconds, 30 minutes and 12 hours. Automatic movement with 42 hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Skeleton case back. Case diameter: 44 mm. Case thickness: 14.5 mm. Band width: 22 mm. Deployment clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, date, hour, minute, second. Dress watch style. Watch label: Swiss Made. Hublot Spirit of Big Bang Blue Magic Men''s Watch 301.CX.130.RX.\r\n', 8000, 'images/product_images/hublot3.jpg'),
(1234, 'Samsung - S2 Smart Watch', 'Samsung', 'S2 Smart Watch', '        With elegant curves and premium finishes, the Samsung Gear S2 will turn heads. The intuitive circular face and bezel let you navigate effortlessly to get to what you need. And since it pairs with your phone, it''s easy to gain access to important notifications, texts and updates with just a glance at your wrist. With built-in wireless charging, it''s easy to keep the Gear S2 powered up anywhere by simply setting your Gear S2 on the included wireless charging dock. What''s even better, is that the The Gear S2 is compatible with most Android devices so you can get in on the experience.', 900, 'images/product_images/samsung.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
