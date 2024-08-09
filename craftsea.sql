-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 04:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Craftsea`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `image`, `name`, `price`, `quantity`, `customer_id`) VALUES
(9, 'img/Featured2.jpg', 'Sacred Lotus - Bell Hanging', 299, 1, 651),
(5, 'img/Featured4.jpg', 'Ahilya - Necklace Set', 1299, 1, 652);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`name`, `email`, `subject`, `message`) VALUES
('Jerold', 'jerold@gmail.com', 'Bug', 'When I clicked my account page it was re-directed to checkout page');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` bigint(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `password`, `name`, `address`, `phone_no`, `email`, `dob`) VALUES
(560, 560, 'Jacob', 'Male', 2147483647, 'jacob@gmail.com', '2001-01-07'),
(651, 12345, 'Jerold', 'HBR Layout Bangalore 560045', 8865942784, 'jerold@gmail.com', '2001-07-07'),
(652, 652, 'Deepak', 'Male', 1963254875, 'deepak@gmail.com', '2023-06-13'),
(654, 123, 'kumar', 'palace', 2653489751, 'xaben10476@ingfix.com', '2023-06-02'),
(656, 1234, 'Jero', 'sdfgh', 1234567890, 'bopacef487@mannawo.com', '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `email` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`email`, `customer_id`, `name`) VALUES
('jerold@gmail.com', 651, 'Jerold'),
('deepak@gmail.com', 652, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `product_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` text NOT NULL,
  `order_date` date NOT NULL,
  `status` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `zipcode` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `image`, `product_name`, `price`, `quantity`, `address`, `order_date`, `status`, `name`, `email`, `mobile`, `country`, `state`, `city`, `zipcode`, `reason`) VALUES
(1, 651, 'img/Featured2.jpg', 'Sacred Lotus - Bell Hanging', 299, 1, 'HBR Layout', '2023-07-04', 'Order Delivered', 'jerold', 'jerold@gmail.com', 1234567890, 'India', 'Karnataka', 'Bangalor', 560078, ''),
(3, 651, 'img/Featured3.jpg', 'Silver Oxidised Earrings', 399, 4, 'HRSH Layout', '2023-07-02', 'Order Confirmed', 'Deepak', 'deepak@gmail.com', 123456789, 'India', 'Karnataka', 'Bangalore', 560001, ''),
(4, 652, 'img/Featured2.jpg', 'Sacred Lotus - Bell Hanging', 299, 1, 'ECR', '2023-01-10', 'Order Delivered', 'Deepak', 'deepak@gmail.com', 6532147895, 'India', 'Tamil Nadu', 'Chennai', 570005, ''),
(5, 651, 'img/Featured3.jpg', 'Silver Oxidised Earrings', 399, 1, 'Rayapuram', '2023-02-14', 'Order Confirmed', 'Ayesha', 'Ayesha@gmail.com', 3526154278, 'India', 'Tamil Nadu', 'Chennai', 570008, ''),
(6, 651, 'img/recent2.jpg', 'Silver Oxidised Ring', 549, 3, 'Pulianthope', '2023-03-10', 'Out for Delivery', 'Jerold', 'jerold@gmail.com', 9656231788, 'India', 'Tamil Nadu', 'Chennai', 570001, ''),
(7, 651, 'img/Featured5.jpg', 'Floral Traces - Oxidised Ring', 599, 3, 'Andheri', '2023-04-12', 'Order Cancelled', 'Jerold', 'jerold@gmail.com', 6598351248, 'India', 'Maharashtra', 'Mumbai', 430026, ''),
(8, 652, 'img/recent5.jpg', 'Handpainted Earrings', 599, 4, 'Andheri west', '2023-05-17', 'Order Picked Up', 'Deepak', 'deepak@gmail.com', 5689487511, 'India', 'Maharashtra', 'Mumbai', 460036, ''),
(9, 561, 'img/recent4.jpg', 'Enamel Earrings', 749, 4, 'Kasturi Nagar', '2023-06-08', 'Order Delivered', 'Jerold', 'jerold@gmail.com', 2356897415, 'India', 'Karnataka', 'Bangalore', 560023, ''),
(23, 652, 'img/TibetanMask.png', 'Tibetan Mask - Wall Frame', 999, 1, 'HBR Layout', '2023-07-24', 'Order Picked Up', 'Jerold A', 'jerold@gmail.com', 1234567890, 'India', 'Tamil Nadu', 'Chennai', 480012, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `specification` text NOT NULL,
  `brand` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` text NOT NULL,
  `build_type` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `specification`, `brand`, `price`, `category`, `build_type`, `image1`, `image2`, `image3`) VALUES
(1, 'Lotus Sheesham Wood Diya', 'These Hand-carved Wooden Tea Light Candle Holders are made of Pure Sheesham Wood.\r\nHandcrafted using traditional carving skills and techniques.\r\nThe Tea Light candles can be replaced as many times. \r\nThese are a perfect gifting solution for any festival/occasion and will complement your home decor.\r\nGifting Occasion Ideas: Diwali, Durga Puja, Ganesh Chaturthi, Home Inaugurations, New Year, Thanksgiving, Christmas, Dusshera. \r\nThis product is handmade and may have a slight colour or design variation from the displayed photographs.', 'Pack Contains 1 Lotus Candle Holder with Complimentary 3 White Tea Light Candles.\r\nMaterial: Pure Sheesham Wood\r\nWidth: 5 inches, Height: 4 inches', 'Select Brand', 499, 'Handmade_Hifi', 'Handmade', 'img/WoodDiya.png', 'img/WoodDiya1.png', 'img/WoodDiya3.png'),
(2, 'Stone Love - Gold Tone Ring', 'This beautiful stylish & fashionable is made with a gold finish and druzy stones.\r\nThis contemporary gemstone earring design will complement both Indian and Western outfits.', 'Content: 1 piece\r\nMaterial: Brass\r\nFinish: Gold\r\nSize: Adjustable', 'Oxidised_Rings', 649, 'Handmade_Hifi', '', 'img/StoneLove.png', 'img/StoneLove2.png', 'img/StoneLove3.png'),
(3, 'Tibetan Mask - Wall Frame', 'This incredibly creative dragon mask is 100% handmade by skilled artisans with a stone finish.\r\nThe Tibetan wall frame is used to ward off the evil eye.\r\nThe minute detailing on these wall-hanging items is the best pick for your space.\r\nThe auspiciousness of these wall hangings makes them unique with gorgeous artistic details.\r\nNOTE: As this product is handmade, there can be slight variations in the design and pattern of the product.', 'Frame Size: 8\" x 8\"  inches\r\nIdol Size: 4\" diameter\r\nMaterial: Stone dust\r\nColour: Multicolour\r\nContent: 1 Piece\r\nPlease wipe with a dry cloth gently, when needed.', 'Wall_Hangings', 999, 'Macrame_Madness', 'Wall_Hangings', 'img/TibetanMask.png', 'img/TibetanMask2.png', 'img/TibetanMask3.png'),
(4, 'Black Buddha - Wall Mask', 'The Buddha wall frame is the epitome of peace & auspiciousness.\r\nThe figurine is made up of stone dust which is 100% hand-made by skilled craftsmanship.\r\nThe minute detailing on these wall-hanging items is the best pick for your space.\r\nThe auspiciousness of these wall hangings makes them unique with gorgeous artistic details.\r\nThe beautifully designed piece of art is a masterpiece which makes it unique in visual and spiritual ways.\r\nNOTE: As this product is handmade, there can be slight variations in the design and pattern of the product.', 'Idol Size: 6\" x 3.5\" inches\r\nMaterial: Stone dust\r\nColour: Black\r\nContent: 1 Piece\r\nPlease wipe with a dry cloth gently, when needed.', 'Wall_Hangings', 899, 'Macrame_Madness', 'Craftography', 'img/prod1.jpg', 'img/pd9.jpg', 'img/pd10.jpg'),
(5, 'Ahilya - Necklace Set', 'The oxidization process creates a light and shadow effect in this jewelry.\r\nThe unique and antique look gives it an old charm and traditional appeal.\r\nComplements both Indian and Western outfits.', '', 'Marcrame Madness', 1299, 'Necklaces', 'Necklaces', 'img/Featured4.jpg', '', ''),
(6, 'Silver Oxidised Earrings', 'The oxidization process creates a light and shadow effect in this jewelry\r\nThe unique and antique look gives it an old charm and traditional appeal\r\nComplements both Indian and Western outfits', 'Content: 1 Set of Earrings\r\nMaterial: Oxidised Silver\r\nFinish: Antique', 'Earrings', 399, 'Handmade_Hifi', 'Earrings', 'img/Featured3.jpg', 'img/', 'img/'),
(7, 'Enamel Earrings', '', '', '', 749, '', '', 'img/recent4.jpg', '', ''),
(8, 'Hand Painted Necklace Set', 'The oxidisation process creates a light and shadow effect in this jewellery.\r\nThe unique and antique look gives it an old charm and traditional appeal.\r\nComplements both Indian and Western outfits.', '', 'Necklaces', 2199, 'Top_Rated_Crafts', 'Necklaces', 'img/recent1.jpg', '', ''),
(9, 'Sacred Lotus - Bell Hanging', 'Handmade Bell hanging with a vintage and rustic look\r\nMade using 5 small size bells\r\nEach bell has a wooden striker inside for soothing sound effects.\r\nThe natural shade and texture add uniqueness & elegance to the final product.\r\nHang it at the entrance or any corner of your house to add a festive look and fee', 'Dimensions: ~9\" inches\r\nDesign: Sacred Lotus\r\nTexture: Vintage\r\nContent: 1 Piece', 'Bell_Hangings', 999, 'Select Category', 'Bell_Hangings', 'img/Featured2.jpg', 'img/', 'img/'),
(12, 'Swara - Silver Oxidised Earrings', 'The oxidization process creates a light and shadow effect in this jewelry.\r\nThe unique and antique look gives it an old charm and traditional appeal.\r\nComplements both Indian and Western outfits.', 'Content: 1 Set of Earrings\r\nMaterial: Oxidised Silver\r\nFinish: Antique\r\nDesign: Swara', 'Earrings', 749, 'Top_Rated_Crafts', 'Creative_Ideas', 'img/cat3.png', 'img/', 'img/'),
(17, 'Brown Flower - Blue Pottery Wall Hooks', 'Crafted from blue pottery ceramic tile.\r\nDecorate your lovely home and enhance both contemporary and traditional style interiors.\r\nServes as multipurpose wall decor & key holder\r\nThis beautiful wall decor hook will enhance & give a very rich look to your home.\r\nCan be used to hang your car keys, house keys, purses, bags, and more on a hook.', 'Diameter: ~4.5 cm\r\nLength: ~5\" inches\r\nMaterial: Ceramic & Iron\r\nDesign: Brown Flower\r\nContent: 2 pieces\r\nThis is a fragile product. Please wipe with a moist cloth gently, when needed.', 'Wall_Hooks', 399, 'Handmade_Hifi', 'Wall_Hooks', 'img/Featured1.jpg', 'img/BrownFlower2.png', 'img/'),
(19, 'Hand-painted Pattachitra Wall Plate', 'Beautifully hand-painted wall plate with traditional pattachitra art figures.\r\nPattachitra is the famous art form of Orissa.\r\nFamous for its mythological narratives and extremely intricate details.\r\nInspired by the temple walls of Puri, Orissa.\r\nDecorate your lovely home and enhance both contemporary and traditional style interiors.\r\nComes with a sturdy hook for hanging purposes.\r\nNOTE: As this product is handmade, there will be slight variations in the design and pattern of the product.', 'Diameter: ~10\" inches.\r\nMaterial: Aluminium\r\nDesign: Dholak\r\nContent:  1 piece\r\nFor cleaning, wipe with a moist cloth gently.', 'Wall_Hangings', 1199, 'Handmade_Hifi', 'HandMade', 'img/cat4.png', 'img/WallPlate2.png', 'img/WallPlate3.png'),
(20, 'Pink Daffodils - Tassel Hanging', 'Easy to hang on the wall\r\nComes with a jute thread for hanging purposes\r\nBeautiful prints will complement the plain white walls\r\nMix & match it with other fabric prints to create a wall collage\r\nThere can be a slight color variation from the displayed photographs.', 'Design: Pink Daffodils\r\nSize: 6\" Inches\r\nContent: 1 piece\r\nDoes not come with any additional hooks', 'Wall_Hangings', 249, 'Woolen_Wonders', 'Wall_Hangings', 'img/prod6.jpg', 'img/', 'img/'),
(21, 'Peacock - Hand-painted Hangings', 'Hand-painted on leather\r\nHang them at your entrances or enhance any corner of your house with these vibrant butterflies\r\nThis beautiful wall hanging gives a very quirky & vibrant look to your home.\r\nHandcrafted in genuine parchment leather by skilled artists, the hangings showcase the art form of Tholu Bommalata.\r\nNOTE: As this product is handmade, there can be slight variations in the design and pattern of the product.', 'Length: 40\" inches\r\nWidth: 5\" inches (each Peacock)\r\nMaterial: Parchment Leather, Wooden Beads\r\nColour: Assorted\r\nContent:  1 hanging consisting of 4 Peacocks\r\nPlease wipe with a moist cloth gently, when needed.', 'Wall_Hangings', 699, 'Kiddo_Crafty', 'DIY', 'img/peacock.png', 'img/peacock1.png', 'img/'),
(23, 'Mayura - Hand Painted Necklace Set', 'The oxidization process creates a light and shadow effect in this jewelry.\r\nThe unique and antique look gives it an old charm and traditional appeal.\r\nComplements both Indian and Western outfits.', 'Content: 1 Neckpiece & 2 Earrings\r\nMaterial: Oxidised Silver\r\nFinish: Antique\r\nClosure: Adjustable', 'Necklaces', 1299, 'Top_Rated_Crafts', 'Necklaces', 'img/prod4.jpg', 'img/', 'img/'),
(24, 'Boho Escapes - Colorful Ring', 'The oxidization process creates a light and shadow effect.\r\nThe unique and antique look gives it an old charm and traditional appeal.\r\nThis piece complements both Ethnic and Western outfits.', 'Content: 1 piece\r\nMaterial: Brass\r\nFinish: Enamel\r\nSize: Adjustable\r\nColor: Please use the dropdown above to see available color options', 'Oxidised_Rings', 499, 'Kiddo_Crafty', 'Oxidised_Rings', 'img/prod3.jpg', 'img/pd11.jpg', 'img/'),
(25, 'Tribal Silver Oxidized Ring', 'The oxidization process creates a light and shadow effect.\r\nThe unique and antique look gives it an old charm and traditional appeal.\r\nThis piece complements both Ethnic and Western outfits.', 'Content: 1 piece\r\nMaterial: Brass\r\nFinish: Antique\r\nSize: Adjustable', 'Oxidised_Rings', 449, 'Top_Rated_Crafts', 'Craft_Daily', 'img/GhunghrooRing.png', 'img/GhunghrooRing2.png', 'img/'),
(26, 'Kavya - Silver Oxidized Bangle', 'This beautiful stylish bangle is crafted in silver oxidised with an antique finish \r\nAdorn your wrists with this stylish bangle \r\nEasy to wear as it comes with adjustable closure', 'Content: 1 piece\r\nMaterial: Brass\r\nFinish: Silver Oxidised\r\nClosure: Adjustable Screw\r\nSize: 2.6 ( Diameter 6 cm)', 'Bangles', 999, 'Top_Rated_Crafts', 'Bangles', 'img/bangles.png', 'img/', 'img/'),
(27, 'Vrinda - Silver Oxidized Bangle', 'This beautiful stylish bangle is crafted in silver oxidised with an antique finish \r\nAdorn your wrists with this stylish bangle \r\nEasy to wear as it comes with adjustable closure', 'Content: 1 piece\r\nMaterial: Brass\r\nFinish: Silver Oxidised\r\nClosure: Adjustable Screw\r\nSize: 2.6 ( Diameter 6 cm)', 'Bangles', 899, 'Top_Rated_Crafts', 'Bangles', 'img/bangles1.png', 'img/', 'img/');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`product_id`, `name`, `price`, `customer_id`, `image`) VALUES
(1, 'Floral Traces - Oxidised Ring', 599, 651, 'img/Featured5.jpg'),
(1, 'Lotus - Handcarved Sheesham Wood Diya', 499, 652, 'img/WoodDiya.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
