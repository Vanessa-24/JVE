-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2021 at 04:33 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `img_ID` int(100) NOT NULL AUTO_INCREMENT,
  `details_ID` int(50) NOT NULL,
  `img_link` varchar(600) NOT NULL,
  PRIMARY KEY (`img_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`img_ID`, `details_ID`, `img_link`) VALUES
(1, 19, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/imac-24-touch-id-blue-gallery-1?wid=4000&hei=3072&fmt=jpeg&qlt=80&.v=1617486478000'),
(2, 19, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/imac-24-touch-id-blue-gallery-2? wid=4000&hei=3072&fmt=jpeg&qlt=80&.v=1617741434000 '),
(3, 19, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/imac-24-touch-id-blue-gallery-3?wid=4000&hei=3072&fmt=jpeg&qlt=80&.v=1617741419000'),
(4, 20, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/imac-24-touch-id-silver-gallery-1?wid=2000&hei=1536&fmt=jpeg&qlt=95&.v=1617486488000'),
(5, 20, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/imac-24-touch-id-silver-gallery-2?wid=2000&hei=1536&fmt=jpeg&qlt=95&.v=1617741435000'),
(6, 20, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/imac-24-touch-id-silver-gallery-3?wid=2000&hei=1536&fmt=jpeg&qlt=95&.v=1617741430000'),
(7, 21, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/desktops/alienware_desktops/alienware_aurora_r12/media_gallery/cs2201g0008_382698_gl_cs_co_desktop_aw_aurora_r12_media_gallery_lunar-light_6.psd?fmt=pjpg&amp;pscan=auto&amp;scl=1&amp;hei=402&amp;wid=402&amp;qlt=100,0&amp;resMode=sharp2&amp;size=402,402'),
(8, 22, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/desktops/xps_desktops/xps_8940/general/201-xps-desktop-product-images-w-nvidia-logo-desktop-xps-8940-4000x4000.jpg?fmt=pjpg&pscan=auto&scl=1&hei=402&wid=421&qlt=100,0&resMode=sharp2&size=421,402'),
(9, 23, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/desktops/inspiron_desktops/inspiron_3891/media_gallery/in3891_csy_00000ff_bk_no_odd_no_sd-psd.psd?fmt=pjpg&pscan=auto&scl=1&wid=5000&hei=5000&qlt=100,0&resMode=sharp2&size=5000,5000'),
(10, 23, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/desktops/inspiron_desktops/inspiron_3891/media_gallery/in3891_csy_00030lf_bk_no_odd_no_sd-psd.psd?fmt=pjpg&pscan=auto&scl=1&wid=5000&hei=5000&qlt=100,0&resMode=sharp2&size=5000,5000'),
(11, 24, 'https://www.hp.com/us-en/shop/app/assets/images/product/20W70AA%23ABA/center_facing.png?_=1619257575075&imwidth=75&imdensity=1'),
(12, 24, 'https://www.hp.com/us-en/shop/app/assets/images/product/20W70AA%23ABA/left_facing.png?_=1619257575075&imwidth=75&imdensity=1'),
(13, 24, 'https://www.hp.com/us-en/shop/app/assets/images/product/20W70AA%23ABA/right_facing.png?_=1619257575075&imwidth=75&imdensity=1'),
(14, 25, 'https://www.hp.com/us-en/shop/app/assets/images/product/20W71AA%23ABA/center_facing.png?_=1620215777418&imwidth=75&imdensity=1'),
(15, 25, 'https://www.hp.com/us-en/shop/app/assets/images/product/20W71AA%23ABA/left_facing.png?_=1620215777418&imwidth=75&imdensity=1'),
(16, 25, 'https://www.hp.com/us-en/shop/app/assets/images/product/20W71AA%23ABA/right_facing.png?_=1620215777418&imwidth=75&imdensity=1'),
(17, 26, 'https://www.hp.com/us-en/shop/app/assets/images/product/1X7B2AV_1/center_facing.png?_=1622028371452&imwidth=75&imdensity=1'),
(18, 26, 'https://www.hp.com/us-en/shop/app/assets/images/product/1X7B2AV_1/left_facing.png?_=1622028371452&imwidth=75&imdensity=1'),
(19, 26, 'https://www.hp.com/us-en/shop/app/assets/images/product/1X7B2AV_1/right_facing.png?_=1622028371452&imwidth=75&imdensity=1'),
(20, 27, 'https://www.hp.com/us-en/shop/app/assets/images/product/33V37AA%23ABA/center_facing.png?_=1621509380284&imwidth=75&imdensity=1'),
(21, 27, 'https://www.hp.com/us-en/shop/app/assets/images/product/33V37AA%23ABA/left_facing.png?_=1621509380284&imwidth=75&imdensity=1'),
(22, 27, 'https://www.hp.com/us-en/shop/app/assets/images/product/33V37AA%23ABA/right_facing.png?_=1621509380284&imwidth=75&imdensity=1'),
(23, 28, 'https://www.hp.com/us-en/shop/app/assets/images/product/1A226AV_1/center_facing.png?_=1591939326058&imwidth=75&imdensity=1'),
(24, 28, 'https://www.hp.com/us-en/shop/app/assets/images/product/1A226AV_1/left_facing.png?_=1591939326058&imwidth=75&imdensity=1'),
(25, 28, 'https://www.hp.com/us-en/shop/app/assets/images/product/1A226AV_1/right_facing.png?_=1591939326058&imwidth=75&imdensity=1'),
(26, 29, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzwaxsp-481689943?$684_547_PNG$'),
(27, 29, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzwaxsp-481689926?$684_547_PNG$'),
(28, 29, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzwaxsp-481689927?$684_547_PNG$'),
(29, 29, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzwaxsp-481689929?$684_547_PNG$'),
(30, 29, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzwaxsp-481689931?$684_547_PNG$'),
(31, 30, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzkaxsp-481689924?$684_547_PNG$'),
(32, 30, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzkaxsp-481689909?$684_547_PNG$'),
(33, 30, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzkaxsp-481689910?$684_547_PNG$'),
(34, 30, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzkaxsp-481689912?$684_547_PNG$'),
(35, 30, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nzkaxsp-481689914?$684_547_PNG$'),
(36, 31, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nlvaxsp-481689886?$684_547_PNG$'),
(37, 31, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nlvaxsp-481689871?$684_547_PNG$'),
(38, 31, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nlvaxsp-481689872?$684_547_PNG$'),
(39, 31, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nlvaxsp-481689874?$684_547_PNG$'),
(40, 31, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-buds2-r177-sm-r177nlvaxsp-481689876?$684_547_PNG$'),
(41, 32, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r175nzpbasa/gallery/sg-galaxy-buds-plus-bts-edition-sm-r175nzpbasa-501913333?$684_547_PNG$'),
(42, 32, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r175nzpbasa/gallery/sg-galaxy-buds-plus-bts-edition-sm-r175nzpbasa-501913788?$684_547_PNG$'),
(43, 32, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r175nzpbasa/gallery/sg-galaxy-buds-plus-bts-edition-sm-r175nzpbasa-501913985?$684_547_PNG$'),
(44, 32, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r175nzpbasa/gallery/sg-galaxy-buds-plus-bts-edition-sm-r175nzpbasa-501914560?$684_547_PNG$'),
(45, 32, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r175nzpbasa/gallery/sg-galaxy-buds-plus-bts-edition-sm-r175nzpbasa-501916289?$684_547_PNG$'),
(46, 33, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r180nzbaxsp/gallery/sg-galaxy-buds-live-r180-sm-r180nzbaxsp-501876070?$684_547_PNG$'),
(47, 33, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r180nzbaxsp/gallery/sg-galaxy-buds-live-r180-sm-r180nzbaxsp-000?$684_547_PNG$'),
(48, 33, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r180nzbaxsp/gallery/sg-galaxy-buds-live-r180-sm-r180nzbaxsp-501876987?$684_547_PNG$'),
(49, 33, 'https://images.samsung.com/is/image/samsung/p6pim/sg/sm-r180nzbaxsp/gallery/sg-galaxy-buds-live-r180-sm-r180nzbaxsp-501879354?$684_547_PNG$'),
(50, 34, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MWP22?wid=1144&hei=1144&fmt=jpeg&qlt=80&.v=1591634795000'),
(51, 34, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MWP22_AV1?wid=1144&hei=1144&fmt=jpeg&qlt=80&.v=1591634652000'),
(52, 35, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MME73?wid=1144&hei=1144&fmt=jpeg&qlt=80&.v=1632861342000'),
(53, 35, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MME73_AV1?wid=1144&hei=1144&fmt=jpeg&qlt=80&.v=1632861333000'),
(54, 36, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MV7N2?wid=1144&hei=1144&fmt=jpeg&qlt=95&.v=1551489688005'),
(55, 36, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MV7N2_AV1?wid=1144&hei=1144&fmt=jpeg&qlt=95&.v=1551489684370'),
(56, 37, 'https://cdn.shopify.com/s/files/1/0397/7166/8635/products/WF-1000XM4_B_KeyVisual-Mid_600x.png?v=1623126381'),
(57, 37, 'https://cdn.shopify.com/s/files/1/0397/7166/8635/products/WF-1000XM4_B_case_open_one_side_out-Mid_600x.png?v=1623126445'),
(58, 38, 'https://cdn.shopify.com/s/files/1/0397/7166/8635/products/WF-1000XM4_S_KeyVisual-Mid_1_600x.png?v=1628678200'),
(59, 38, 'https://cdn.shopify.com/s/files/1/0397/7166/8635/products/WF-1000XM4_S_case_open_one_side_out-Mid_600x.png?v=1623126446'),
(60, 39, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ML4Q3ref_VW_34FR+watch-41-alum-starlight-nc-7s_VW_34FR_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1630364929000,1631661270000'),
(61, 39, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ML4Q3ref_VW_PF+watch-41-alum-starlight-nc-7s_VW_PF_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1630364933000,1631661279000'),
(62, 40, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ML493ref_VW_34FR+watch-41-alum-starlight-nc-7s_VW_34FR_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1630365006000,1631661270000'),
(63, 40, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ML493ref_VW_PF+watch-41-alum-starlight-nc-7s_VW_PF_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1630365007000,1631661279000'),
(64, 47, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MKUQ3_VW_34FR+watch-45-alum-midnight-nc-7s_VW_34FR_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1632171067000,1631661671000'),
(65, 47, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MKUQ3_VW_PF+watch-45-alum-midnight-nc-7s_VW_PF_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1632171068000,1631661680000'),
(66, 48, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MKUV3_VW_34FR+watch-45-alum-midnight-nc-7s_VW_34FR_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1632171103000,1631661671000'),
(67, 48, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MKUV3_VW_PF+watch-45-alum-midnight-nc-7s_VW_PF_WF_CO?wid=1400&hei=1400&trim=1,0&fmt=p-jpg&qlt=95&.v=1632171105000,1631661680000'),
(68, 49, 'https://cdn.hachi.tech/assets/images/product_images/6941487218813_BPQtPswDbbyyToTqUWmnKCMWpxV166nLDCSNhQsx.jpg'),
(69, 49, 'https://cdn.hachi.tech/assets/images/product_images/6941487218813_tPNRfFtOl8yBROjEmJiuZLGEdsbLNz8Cm2Fa16rG.jpg'),
(70, 49, 'https://cdn.hachi.tech/assets/images/product_images/6941487218813_tPNRfFtOl8yBROjEmJiuZLGEdsbLNz8Cm2Fa16rG.jpg'),
(71, 52, 'https://cdn.hachi.tech/assets/images/product_images/75a6180136eec84272b5c90e3043f4ca.png'),
(72, 52, 'https://cdn.hachi.tech/assets/images/product_images/51842fa98ee26be95217cbb8e37d6e63.png'),
(73, 53, 'https://cdn.hachi.tech/assets/images/product_images/1c6ac2e37e4b26ea747a4a663313742b.png'),
(74, 53, 'https://cdn.hachi.tech/assets/images/product_images/12d4589fda4df0008144858144f5b82a.png'),
(75, 1, 'https://images.samsung.com/sg/smartphones/galaxy-z-flip3-5g/buy/zflip3_carousel_singleshot_cream_mo.jpg?imwidth=720'),
(76, 1, 'https://images.samsung.com/sg/smartphones/galaxy-z-flip3-5g/buy/zflip3_colorselection_cream_mo.jpg?imwidth=480'),
(77, 2, 'https://images.samsung.com/sg/smartphones/galaxy-z-flip3-5g/buy/zflip3_carousel_colorcombokv_ex_mo.jpg?imwidth=720'),
(78, 2, 'https://images.samsung.com/sg/smartphones/galaxy-z-flip3-5g/buy/zflip3_colorselection_phantomblack_mo.jpg?imwidth=480'),
(79, 3, 'https://images.samsung.com/sg/smartphones/galaxy-z-flip3-5g/buy/zflip3_colorselection_green_mo.jpg?imwidth=480'),
(80, 4, 'https://images.samsung.com/sg/smartphones/galaxy-z-flip3-5g/buy/zflip3_colorselection_lavender_mo.jpg?imwidth=480'),
(81, 5, 'https://images.samsung.com/sg/smartphones/galaxy-z-fold3-5g/buy/zfold3_colorselection_phantomblack_mo.jpg?imwidth=480'),
(82, 5, 'https://images.samsung.com/sg/smartphones/galaxy-z-fold3-5g/buy/zfold3_carousel_productimage_phantomblack_mo.jpg?imwidth=720'),
(83, 6, 'https://images.samsung.com/sg/smartphones/galaxy-z-fold3-5g/buy/zfold3_colorselection_phantomgreen_mo.jpg?imwidth=720'),
(84, 6, 'https://images.samsung.com/sg/smartphones/galaxy-z-fold3-5g/buy/zfold3_carousel_productimage_phantomgreen_mo.jpg?imwidth=720'),
(85, 7, 'https://images.samsung.com/sg/smartphones/galaxy-z-fold3-5g/buy/zfold3_colorselection_phantomsilver_mo.jpg?imwidth=720'),
(86, 7, 'https://images.samsung.com/sg/smartphones/galaxy-z-fold3-5g/buy/zfold3_carousel_productimage_phantomsilver_mo.jpg?imwidth=720'),
(87, 8, 'https://images.samsung.com/sg/smartphones/galaxy-note20/buy/005-galaxynote20ultra-mysticbronze-mo-720.jpg?imwidth=720'),
(88, 8, 'https://images.samsung.com/sg/smartphones/galaxy-note20/buy/002-note20ultra-kv-mo-720.jpg?imwidth=720'),
(89, 9, 'https://images.samsung.com/sg/smartphones/galaxy-note20/buy/005-galaxynote20ultra-mysticwhite-mo-720.jpg?imwidth=720'),
(90, 10, 'https://images.samsung.com/sg/smartphones/galaxy-note20/buy/005-galaxynote20ultra-mysticblack-mo-720.jpg?imwidth=720'),
(91, 11, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-13-pro-blue-select?wid=940&hei=1112&fmt=png-alpha&.v=1631652954000'),
(92, 11, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-13-pro-gallery-1?wid=4056&hei=2400&fmt=jpeg&qlt=95&.v=1629956757000'),
(93, 11, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-13-pro-gallery-3?wid=2824&hei=2400&fmt=jpeg&qlt=95&.v=1629956761000'),
(94, 12, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-13-pro-silver-select?wid=940&hei=1112&fmt=png-alpha&.v=1631652954000'),
(95, 12, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_954/large_1631779484__0007_iPhone_13_Pro_PDP_Position-4_Design__SEA-4.jpg'),
(96, 13, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-13-pro-gold-select?wid=940&hei=1112&fmt=png-alpha&.v=1631652954000'),
(97, 13, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-13-pro-gallery-5?wid=2824&hei=2400&fmt=jpeg&qlt=95&.v=1631057935000'),
(98, 14, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-13-pro-graphite-select?wid=940&hei=1112&fmt=png-alpha&.v=1631652957000'),
(99, 15, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-se-white-select-2020?wid=940&hei=1112&fmt=png-alpha&.v=1586574259457'),
(100, 16, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-se-black-select-2020?wid=940&hei=1112&fmt=png-alpha&.v=1586574260051'),
(101, 17, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-se-red-select-2020?wid=940&hei=1112&fmt=png-alpha&.v=1586574260319'),
(102, 18, 'https://shop.singtel.com/static/8f34a1a9951fc2f54c281e0ef87306f1/82f8d/Huawei-mate40-pro-5g-000000-black-02.jpg'),
(103, 18, 'https://shop.singtel.com/static/2976f849a84802ba5f91c08d1b368fc6/82f8d/Huawei-mate40-pro-5g-000000-black-03.jpg'),
(104, 41, 'https://shop.singtel.com/static/c628080949c52ec1a16433ae8ef8ddf8/82f8d/Huawei-mate40-pro-5g-e7f2fd-silver-02.jpg'),
(105, 41, 'https://shop.singtel.com/static/1bf4c7ad618822096d26140549ad0ac3/82f8d/Huawei-mate40-pro-5g-e7f2fd-silver-03.jpg'),
(106, 42, 'https://cdn.hachi.tech/assets/images/product_images/3f0aa2fd7f6ab37442a41e2d2ccea108.png'),
(107, 42, 'https://cdn.hachi.tech/assets/images/product_images/43efe6cf0ab52a2e269abd72f4d585bf.png'),
(108, 42, 'https://cdn.hachi.tech/assets/images/product_images/1d93276279de9f32a303223b0126cab7.png'),
(109, 43, 'https://cdn.hachi.tech/assets/images/product_images/315c4080cb6117e6590a9c65fea97deb.png'),
(110, 43, 'https://cdn.hachi.tech/assets/images/product_images/6f5a23b50823f34e098c1583b7a891d9.png'),
(111, 43, 'https://cdn.hachi.tech/assets/images/product_images/563ce058c9c9f4a7718d33a0eadd3c6f.png'),
(112, 44, 'https://cdn.hachi.tech/assets/images/product_images/40b978402ccbefe9261a9adc3156ca27.png'),
(113, 44, 'https://cdn.hachi.tech/assets/images/product_images/5e021df6df1e8646c6b94d92da76d055.png'),
(114, 44, 'https://cdn.hachi.tech/assets/images/product_images/b82fa7ca66fb009daec808db59c2f904.png'),
(115, 45, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105618-1_1.jpg'),
(116, 45, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105618-2_1.jpg'),
(117, 45, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105618-3_1.jpg'),
(118, 46, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105617-1_1.jpg'),
(119, 46, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105617-2_1.jpg'),
(120, 46, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105617-3_1.jpg'),
(121, 50, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105547-1_2l6ukl8z9utrp30m.jpg'),
(122, 51, 'https://www.bestdenki.com.sg/pub/media/catalog/product/cache/339302d87a37d5f8da2e1e72d6fcc2e2/2/1/2105546-1_at7u00jhbopkz9su.jpg'),
(123, 54, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857452_MacBook-Air-Space-Grey-1.jpg'),
(124, 54, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857452_MacBook-Air-Space-Grey-2.jpg'),
(125, 54, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857452_MacBook-Air-Space-Grey-5.jpg'),
(126, 55, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857374_MacBook-Air-Gold-1.jpg'),
(127, 55, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857374_MacBook-Air-Gold-2.jpg'),
(128, 55, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857374_MacBook-Air-Gold-5.jpg'),
(129, 56, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857417_MacBook-Air-Silver-1.jpg'),
(130, 56, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857417_MacBook-Air-Silver-2.jpg'),
(131, 56, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_415/large_1595857417_MacBook-Air-Silver-5.jpg'),
(132, 57, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_420/large_1594695874_MacBookPro16-inch-SpaceGrey-1.jpg'),
(133, 57, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_420/large_1594695874_MacBookPro16-inch-SpaceGrey-3.jpg'),
(134, 57, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_420/large_1594695874_MacBookPro16-inch-SpaceGrey-5.jpg'),
(135, 58, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_420/large_1594695862_MacBookPro16-inch-Silver-1.jpg'),
(136, 58, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_420/large_1594695862_MacBookPro16-inch-Silver-3.jpg'),
(137, 58, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_420/large_1594695862_MacBookPro16-inch-Silver-5.jpg'),
(138, 59, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c06910486_intel_evo_icon.png'),
(139, 59, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c06910702_intel_evo_icon.png'),
(140, 59, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c06910606_intel_evo_icon.png'),
(141, 60, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c06588805.png'),
(142, 60, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c06588776.png'),
(143, 60, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c06588705_1.png'),
(144, 61, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c07729669_2.png'),
(145, 61, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/c/0/c07729696.png'),
(146, 61, 'https://sg-media.apjonlinecdn.com/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/4/9/49J32PA-4_T1624954178.png'),
(147, 62, 'https://www.lenovo.com/medias/lenovo-laptop-thinkpad-x1-carbon-gen-9-14-subseries-gallery-6.png?context=bWFzdGVyfHJvb3R8MTEyMjY5fGltYWdlL3BuZ3xoODQvaGY3LzExMzIwNTM4Mzk4NzUwLnBuZ3xmMGVmNTk5MWMwNTMyOGI3MTY4MTY3MjJlZjRlZmFkNmY4OTA5YTUyOGJmZmVkYzg2NzJiYzMyNzBjMzNjMWM2'),
(148, 62, 'https://www.lenovo.com/medias/lenovo-laptop-thinkpad-x1-carbon-gen-9-14-subseries-gallery-7.png?context=bWFzdGVyfHJvb3R8OTgzMTR8aW1hZ2UvcG5nfGgwOS9oYzQvMTEzMjA1Mzg1OTUzNTgucG5nfGE3ZTM3ZmEzMWM4YTFlOGQxYmE1YTBiMDVmZWJjZTk5N2UwYjYxMGFhYzhlNjQyMzg5MzBiZjJhOGM1OWQ2ZmQ'),
(149, 62, 'https://www.lenovo.com/medias/lenovo-laptop-thinkpad-x1-carbon-gen-9-14-subseries-gallery-8.png?context=bWFzdGVyfHJvb3R8MTUyODM1fGltYWdlL3BuZ3xoNGYvaDY3LzExMzIwNTM4MDA1NTM0LnBuZ3xiMDgyZTMzNGZkNmNiMTkyMDcxMjAzMDk1MTc5MjUzMzgzYTJkOGNkNDgzMDc4ZmNlNWVkN2MxZWEzODJkY2Q2'),
(150, 63, 'https://www.lenovo.com/medias/?context=bWFzdGVyfHJvb3R8MTA5MjczfGltYWdlL3BuZ3xoYzMvaGFhLzExMzM1OTk5MjkxNDIyLnBuZ3w3ZmM3N2IxMjQxYjA2OTA4NzBiNDVlY2FiMDJiNzAxNzI0NjIzZWZiNGE3NzAwZDllOTFiMjBlNTcwNTFlN2U2'),
(151, 63, 'https://www.lenovo.com/medias/?context=bWFzdGVyfHJvb3R8MTQ0NjYyfGltYWdlL3BuZ3xoMGMvaDE5LzExMzM1OTk5MTYwMzUwLnBuZ3xiM2JlNTYwNWExNjQwMzZjNGM5NWIxNzU3MmE3YTUyOWFkZDViZjgxYTVlNjgyNGEwNWE5NmZkMjA1ZWRjYzQ0'),
(152, 63, 'https://www.lenovo.com/medias/?context=bWFzdGVyfHJvb3R8OTA3NTl8aW1hZ2UvcG5nfGgyMS9oNDcvMTEzMzU5OTg5NjM3NDIucG5nfDcxMDk0NjA5NWJlYTZjZmQ0MTBmYzVhYjcxNTY5ODY1ZmQzYTIyY2U2YTA0ZmI3Yjk5ZDQxOTFmZWQzN2VkYWQ'),
(153, 64, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/inspiron_notebooks/inspiron_14_5415/media-gallery/notebook-in5415nt-cnb-00000ff090-gy.psd?fmt=png-alpha&pscan=auto&scl=1&wid=4212&hei=2603&qlt=100,0&resMode=sharp2&size=4212,2603'),
(154, 64, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/inspiron_notebooks/inspiron_14_5415/pdp/notebook-inspiron-14-5415-module1.jpg?fmt=jpg&wid=965&hei=570'),
(155, 64, 'https://i.dell.com/is/image/DellContent//content/dam/global-asset-library/Products/Notebooks/Inspiron/14_5415_non-touch/in5415nt_cnb_00090lp090_gy.psd?fmt=png-alpha&pscan=auto&scl=1&wid=4389&hei=4268&qlt=100,0&resMode=sharp2&size=4389,4268'),
(156, 65, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/alienware_notebooks/m17_r4_non-touch_non-tobii/laptop_awm17_r4_non-touch_non-tobii_gy_01.psd?fmt=pjpg&pscan=auto&scl=1&hei=402&wid=402&qlt=100,0&resMode=sharp2&size=402,402'),
(157, 65, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/alienware_notebooks/m17_r4_non-touch_non-tobii/laptop_awm17_r4_non-touch_non-tobii_gy_03.psd?fmt=pjpg&amp;pscan=auto&amp;scl=1&amp;hei=402&amp;wid=402&amp;qlt=100,0&amp;resMode=sharp2&amp;size=402,402'),
(158, 65, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/alienware_notebooks/m17_r4_non-touch_non-tobii/laptop_awm17_r4_non-touch_non-tobii_gy_06.psd?fmt=pjpg&amp;pscan=auto&amp;scl=1&amp;hei=402&amp;wid=402&amp;qlt=100,0&amp;resMode=sharp2&amp;size=402,402'),
(159, 66, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/alienware_notebooks/m17_r4_non-touch_non-tobii/laptop_awm17_r4_non-touch_non-tobii_wh_01.psd?fmt=pjpg&amp;pscan=auto&amp;scl=1&amp;hei=402&amp;wid=402&amp;qlt=100,0&amp;resMode=sharp2&amp;size=402,402'),
(160, 66, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/alienware_notebooks/m17_r4_non-touch_non-tobii/laptop_awm17_r4_non-touch_non-tobii_wh_03.psd?fmt=pjpg&amp;pscan=auto&amp;scl=1&amp;hei=402&amp;wid=402&amp;qlt=100,0&amp;resMode=sharp2&amp;size=402,402'),
(161, 66, 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/alienware_notebooks/m17_r4_non-touch_non-tobii/laptop_awm17_r4_non-touch_non-tobii_wh_06.psd?fmt=pjpg&amp;pscan=auto&amp;scl=1&amp;hei=402&amp;wid=402&amp;qlt=100,0&amp;resMode=sharp2&amp;size=402,402'),
(162, 3, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-z-flip3-f711-5g-sm-f711bzgexsp-477355732?$684_547_PNG$'),
(163, 4, 'https://images.samsung.com/is/image/samsung/p6pim/sg/2108/gallery/sg-galaxy-z-flip3-f711-5g-sm-f711blvexsp-477355655?$684_547_PNG$'),
(164, 0, ''),
(165, 9, 'https://images.samsung.com/is/image/samsung/sg-galaxy-note20-ultra-5g-n986-sm-n986bzwgxsp-devicepenlmysticwhite-289368665?$684_547_PNG$'),
(166, 10, 'https://images.samsung.com/is/image/samsung/sg-galaxy-note20-ultra-5g-n986-sm-n986bzkgxsp-devicepenfrontmysticblack-289368610?$684_547_PNG$'),
(167, 12, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_954/large_1631779484__0006_iPhone_13_Pro_PDP_Position-3_Camera__SEA-3.jpg'),
(168, 14, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_954/large_1631781311__0005_iPhone_13_Pro_PDP_Position-4_Design__SEA-4.jpg'),
(169, 14, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_954/large_1631781311__0006_iPhone_13_Pro_PDP_Position-3_Camera__SEAgraphite-3.jpg'),
(170, 13, 'https://res.cloudinary.com/octopuscdn/image/upload/f_auto/istudio/images/products/styles/style_954/large_1631781696__0006_iPhone_13_Pro_PDP_Position-3_Camera__SEA-3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
