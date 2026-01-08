CREATE TABLE `images_list` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `sort` int(2) NOT NULL DEFAULT '0',
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `images_list` (`id`, `name`, `location`, `sort`, `timemodified`) VALUES
(1, 'image 1', 'images/image1.jpg', 1, '2018-05-26 13:18:15'),
(2, 'image 2', 'images/image2.jpg', 4, '2018-05-26 13:18:15'),
(3, 'image 3', 'images/image3.jpg', 9, '2018-05-26 13:18:16'),
(4, 'image 4', 'images/image4.jpg', 5, '2018-05-26 13:18:16'),
(5, 'image 5', 'images/image5.jpg', 11, '2018-05-26 13:18:16'),
(6, 'image 6', 'images/image6.jpg', 7, '2018-05-26 13:18:16'),
(7, 'image 7', 'images/image7.jpg', 6, '2018-05-26 13:18:16'),
(8, 'image 8', 'images/image8.jpg', 8, '2018-05-26 13:18:16'),
(9, 'image 9', 'images/image9.jpg', 10, '2018-05-26 13:18:16'),
(10, 'image 10', 'images/image10.jpg', 12, '2018-05-25 18:01:23'),
(11, 'image 11', 'images/image11.jpg', 3, '2018-05-26 13:18:15'),
(12, 'image 12', 'images/image12.jpg', 2, '2018-05-26 13:18:15');