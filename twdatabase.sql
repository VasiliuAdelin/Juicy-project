-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 01:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id_product` int(20) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `price` int(200) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `drink_type` varchar(200) NOT NULL,
  `pack_size` int(200) NOT NULL,
  `discount` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id_product`, `url`, `product_name`, `price`, `brand`, `drink_type`, `pack_size`, `discount`) VALUES
(6, 'https://www.mobiloitte.com/blog/wp-content/uploads/2013/09/PHP.jpeg', 'Php Rocks!', 999, 'PHP', 'cat1', 6, 10),
(7, 'https://cora.ro//images/products/1752301/gallery/1752301_hd_1.jpg', 'Tuborg 330mL', 4, 'tuborg', 'beer', 6, 10),
(8, 'https://cdn.shoplightspeed.com/shops/609238/files/2935465/corona-extra-abv-45-24-oz.jpg', 'Corona', 10, 'corona', 'beer', 1, 0),
(9, 'http://www.bere-bauturi.ro/cs-content/cs-photos/products/normal/coca-cola-ultra-025l-rgbambalaj-returnabilbax2_9550_1_1529307254.jpg', 'Coca-Cola 0.25', 2, 'cola', 'carbo drink', 8, 0),
(10, 'http://online.ramstore.kz/content/images/thumbs/0069136_coca-cola-napitok-05-l-pet_350.jpeg', 'Coca-Cola 0.5', 3, 'cola', 'carbo drink', 18, 0),
(11, 'https://cora.ro//images/products/2502817/gallery/2502817_hd_1.jpg', 'Coca-Cola 1.25', 4, 'cola', 'carbo drink', 16, 0),
(12, 'https://alimentara.sstore.ro/wp-content/uploads/2018/05/cola-25litri.jpg', 'Coca-Cola 2.5', 5, 'cola', 'carbo drink', 6, 0),
(13, 'https://images-na.ssl-images-amazon.com/images/I/71Jas3Z5zaL._SX569_.jpg', 'RedBull', 5, 'redbull', 'energy drink', 6, 0),
(14, 'https://www.shopidoki.ro/img/produse/HELL01.jpg?t=1509524278', 'Hell', 2, 'hell', 'energy drink', 48, 5),
(15, 'http://supermarketclaudia.ro/image/cache/data/produse%20alimentare/bauturi%20racoritoare/suc%20neacidulat/Prigat%20Activ%20Piersici%202%20litri-500x500.jpg', 'Prigat Piersici 2L', 4, 'prigat', 'natural drink', 6, 0),
(16, 'https://oliva.md/app/uploads/2016/03/energizant_burn_large.jpg', 'Energizant Burn', 2, 'burn', 'energy drink', 48, 0),
(17, 'https://s12emagst.akamaized.net/products/692/691656/images/res_dcc11a3ab169f8fee4d2eb0e0d002983_full.jpg', 'Prigat portocale 0.25', 2, 'prigat', 'natural drink', 6, 0),
(18, 'http://social-catering.ro/wp-content/uploads/2016/01/Prigat-1l.jpg', 'Prigat Piersic 1L', 4, 'prigat', 'natural drink', 6, 0),
(19, 'https://cora.ro//images/products/2612216/gallery/2612216_hd_1.jpg', 'Giusto Pere 2L', 4, 'giusto', 'natural drink', 6, 6),
(20, 'http://www.magazin.complexnicolmit.ro/1771-large_default/suc-giusto-visine-2-l.jpg', 'Giusto Visine 2L', 4, 'giusto', 'natural drink', 6, 0),
(21, 'https://www.comenzibauturi.ro/wp-content/uploads/2016/05/fanta-orange-0.25l.jpg', 'Fanta 0.25L', 2, 'fanta', 'carbo drink', 6, 0),
(22, 'https://s12emagst.akamaized.net/products/692/691719/images/res_0c9f5cf84a7b14fa7503fe0a0c3308be_full.jpg', 'Coca Cola 0.33L', 2, 'cola', 'carbo drink', 48, 0),
(23, 'http://www.pizza-shop.ro/wp-content/uploads/2017/05/fanta-can-330ml.jpg', 'Fatna 0.33L', 2, 'fanta', 'carbo drink', 48, 0),
(24, 'https://cora.ro//images/products/1637631/gallery/1637631_hd_1.jpg', 'Fanta 0.5L', 3, 'fanta', 'carbo drink', 16, 0),
(25, 'https://boozydelivery.ro/wp-content/uploads/2017/05/Fanta-Portocale-2L-min.png', 'Fanta 2L', 4, 'fanta', 'carbo drink', 6, 0),
(26, 'https://s12emagst.akamaized.net/products/696/695560/images/res_5e8a1706ddf2cb14171eea5507c5f943_full.jpg', 'Fanta 2L', 5, 'fanta', 'carbo drink', 6, 10),
(27, 'https://food.buy.am/uploads/zoom/2016/01/8407-3.jpg', 'Sprite 0.25L', 2, 'sprite', 'carbo drink', 48, 0),
(28, 'https://s12emagst.akamaized.net/products/696/695565/images/res_7d709aba98b1ce2d7fa477bb62b913d8_full.jpg', 'Sprite 0.33L', 3, 'sprite', 'carbo drink', 48, 5),
(29, 'http://www.pizzaabi.ro/image/cache/data/sprite-0.5L-900x900.jpg', 'Sprite 0.5L', 3, 'sprite', 'carbo drink', 6, 0),
(30, 'http://www.pizzaavanti.ro/wp-content/uploads/2015/10/sprite1.jpg', 'Sprite 2L', 5, 'sprite', 'carbo drink', 6, 0),
(31, 'https://s12emagst.akamaized.net/products/696/695569/images/res_f4561ce9c22e2814b21397cd8e745844_full.jpg', 'Sprite 2.5L', 5, 'sprite', 'carbo drink', 6, 0),
(32, 'https://www.dollargeneral.com/media/catalog/product/cache/image/beff4985b56e3afdbeabfc89641a4582/5/b/5b17eaea-54d2-4a87-bb76-e35d548c08bc_1.e758f9d1b7d1de8ac12ba6c90589a1f4.jpeg', 'Energizant monster', 7, 'monster', 'energy drink', 4, 4),
(33, 'https://www.eckeroline.com/media/catalog/product/cache/image/700x560/af097278c5db4767b0fe9bb92fe21690/b/a/battery-24p-mgt.png', 'Energizant Battery', 10, 'battery', 'energy drink', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `name`, `phone`, `address`) VALUES
(15, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1231', 'sadsa'),
(16, 'ada@ada', '8c8d357b5e872bbacd45197626bd5759', 'Adelin Vasiliu', '0755836669', 'Iasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
