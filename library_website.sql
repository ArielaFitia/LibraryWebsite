-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2023 at 04:56 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `synopsis` text NOT NULL,
  `availability` varchar(50) NOT NULL,
  `cover_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `synopsis`, `availability`, `cover_image`) VALUES
(11, 'Bash and Lucy', 'LISA', 'Pellentesque non augue sed justo fringilla lobortis vel quis enim. Donec congue lobortis orci sit amet dignissim. Cras viverra convallis ipsum ut pretium. Integer lacus sem, iaculis sit amet risus a, rhoncus cursus mi. Curabitur consectetur, sapien id venenatis condimentum, lacus nisl venenatis leo, ut pharetra quam magna et ligula. Phasellus sed iaculis ligula, quis fermentum dolor. Donec ultricies laoreet urna nec consectetur. Nulla facilisi. Morbi non bibendum orci. Ut auctor placerat mauris ut pretium. Nulla at elit felis. Donec volutpat at lorem non suscipit. Nulla leo nunc, semper ac condimentum et, viverra id tortor.', 'Disponible', '64a2974679f12_bash_and_lucy-2.jpg'),
(12, 'Be well bee', 'Cabe Lindsay', 'Pellentesque non augue sed justo fringilla lobortis vel quis enim. Donec congue lobortis orci sit amet dignissim. Cras viverra convallis ipsum ut pretium. Integer lacus sem, iaculis sit amet risus a, rhoncus cursus mi. Curabitur consectetur, sapien id venenatis condimentum, lacus nisl venenatis leo, ut pharetra quam magna et ligula. Phasellus sed iaculis ligula, quis fermentum dolor. Donec ultricies laoreet urna nec consectetur. Nulla facilisi. Morbi non bibendum orci. Ut auctor placerat mauris ut pretium. Nulla at elit felis. Donec volutpat at lorem non suscipit. Nulla leo nunc, semper ac condimentum et, viverra id tortor.', 'Disponible', '64a297a867496_be_well_bee.jpg'),
(13, 'Darknet', 'Matthew Mather', 'Pellentesque non augue sed justo fringilla lobortis vel quis enim. Donec congue lobortis orci sit amet dignissim. Cras viverra convallis ipsum ut pretium. Integer lacus sem, iaculis sit amet risus a, rhoncus cursus mi. Curabitur consectetur, sapien id venenatis condimentum, lacus nisl venenatis leo, ut pharetra quam magna et ligula. Phasellus sed iaculis ligula, quis fermentum dolor. Donec ultricies laoreet urna nec consectetur. Nulla facilisi. Morbi non bibendum orci. Ut auctor placerat mauris ut pretium. Nulla at elit felis. Donec volutpat at lorem non suscipit. Nulla leo nunc, semper ac condimentum et, viverra id tortor.', 'Disponible', '64a297d8c8ba9_darknet.jpg'),
(17, 'Economic', 'Andrew and Paul', 'Sed laoreet dui, nec hendrerit sem. Cras laoreet suscipit ante, quis accumsan lorem placerat eget. Proin ultrices lorem at metus aliquet, at posuere diam pharetra. Nulla eu turpis quis mi cursus dignissim sed non eros. Vivamus sodales ultrices sodales. Morbi eleifend felis ut dapibus blandit. Donec a nisl tincidunt, pharetra arcu et, porttitor enim. Donec eget ante commodo, ullamcorper eros sed, imperdiet dui. Nulla non nulla lectus. Morbi id turpis eu massa bibendum viverra at a urna. Maecenas tempus magna nec felis consectetur tincidunt molestie sit amet ligula. Nullam et urna arcu. Donec nec lectus a purus faucibus pharetra. Morbi faucibus leo eget ante aliquet ultricies.', 'Disponible', '64a2ab323715f_economic.jpg'),
(18, 'Clever Lands', 'Lucy Crehan', 'Aliquam est elit, imperdiet convallis justo sit amet, suscipit rutrum dui. Mauris blandit, dui eget feugiat lacinia, metus massa auctor quam, accumsan ullamcorper felis metus ut dui. Pellentesque sed nisi congue, finibus velit et, auctor elit. Nulla ac luctus arcu. Integer sem nisi, pharetra eget eros at, ultrices rutrum nisi. Vestibulum volutpat nunc interdum quam ultrices, sed tincidunt lectus malesuada. Duis feugiat nulla at fringilla efficitur. Nullam elit arcu, vulputate scelerisque eleifend ut, sollicitudin non ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Disponible', '64a472d9ccf9a_clever_lands.jpg'),
(19, 'The happy lemon', 'Kurt Yamashita', 'Aenean id tincidunt nunc. Sed quis semper arcu. Nunc vitae nibh nulla. Nulla elementum semper tellus ac scelerisque. Aenean hendrerit leo non tellus iaculis, vel malesuada velit bibendum. Vivamus magna nisl, consequat sit amet ipsum vel, rutrum euismod diam. Ut suscipit dui vel urna tempor, id suscipit diam vehicula. Aliquam a ornare nulla, eu sodales felis. Donec volutpat magna ante, sit amet imperdiet tortor dignissim eu. Vestibulum ut leo vel justo vestibulum lacinia ut sed sapien. Quisque interdum pellentesque odio eu mattis. Duis consectetur sodales sem vitae ultrices. Duis interdum tortor sem, auctor mollis nisi sollicitudin sagittis.', 'Disponible', '64a5e747ef982_the_happy_lemon.jpg'),
(20, 'Red Queen', 'Victoria Aveyard', 'Morbi suscipit ultricies eros, id molestie ipsum luctus eget. Fusce vulputate sodales massa, vel faucibus velit fringilla efficitur. Nunc pharetra imperdiet velit in sollicitudin. Cras ac velit a tellus pretium maximus. Donec euismod in augue nec dictum. Phasellus semper, ipsum eu pharetra tincidunt, orci nulla posuere augue, bibendum imperdiet tellus erat quis enim. Morbi id ligula sit amet lorem molestie lobortis.', 'Disponible', '64a5e8128a768_red_queen.jpg'),
(21, 'Free fall', 'Peter Cawdron', 'Integer ornare neque nulla, in venenatis odio porttitor vehicula. Quisque porttitor mi orci, at volutpat tellus imperdiet non. Fusce ac maximus augue, in efficitur dui. Donec quis dolor et dolor porta fermentum non vel dolor. Donec rutrum volutpat sapien et scelerisque. In hac habitasse platea dictumst. Nunc sit amet auctor erat, eu pulvinar eros. Duis dignissim porttitor purus, eu semper odio iaculis sit amet. Aenean faucibus nisl vitae nulla volutpat egestas. Nunc luctus aliquet lorem, quis tincidunt nibh bibendum at. Mauris nibh enim, luctus non ex nec, pharetra rutrum nisi. Nulla congue turpis eu lectus tincidunt aliquet. Maecenas malesuada pharetra erat, vel commodo diam imperdiet ac. Fusce eu hendrerit est. Mauris vulputate vehicula risus, ac elementum nibh suscipit nec.', 'Disponible', '64a6aae75197f_freefall.jpg'),
(22, 'Radical gardening', 'George McKay', 'Phasellus vitae eleifend nisi. Nulla sem nulla, tristique id interdum sit amet, congue id odio. Duis tincidunt congue lacus vel egestas. Sed luctus felis ac cursus accumsan. Donec sed leo aliquam, lobortis ipsum suscipit, fermentum enim. Etiam vel enim ut nisi venenatis pharetra sed nec mauris. Nulla mollis imperdiet elit, eu consequat magna consectetur at. Suspendisse id pharetra tellus, nec blandit arcu. Maecenas iaculis sapien quis ullamcorper pharetra. Curabitur lobortis tortor pellentesque ante efficitur faucibus.', 'Emprunté', '64a7f8508f99a_radical_gardening.jpg'),
(23, 'The AoL', 'Mike Sauve', 'Sed ut egestas quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vitae commodo ante, sit amet pretium magna. Fusce vel tempus erat. Etiam aliquet eros leo, a mollis eros consequat sit amet. Phasellus pellentesque tortor lorem, eget rutrum leo tempus nec. Vivamus porttitor laoreet nisl nec rhoncus. Aenean ante tellus, convallis a placerat et, sollicitudin nec augue. Etiam dapibus ut lectus pellentesque sollicitudin.', 'Disponible', '64c4f33cd4b88_lloyd.jpg'),
(24, 'Holy ghosts', 'David J.Schmidth', 'In porttitor sagittis enim id porttitor. Nunc et leo molestie, ullamcorper massa in, pharetra turpis. Nunc non metus eu lectus elementum elementum. Sed eleifend vel ipsum eget pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet rutrum tellus. Morbi sed porta arcu. Duis eu nisi ultrices, hendrerit eros in, euismod metus. Sed porttitor ligula vel justo venenatis, ut commodo risus pharetra. Nunc tempus venenatis porttitor.\r\n\r\nCras non dapibus dolor. Nunc non faucibus ', 'Emprunté', '64c506dc0497a_holy_ghosts.jpg'),
(25, 'Night shade', 'Andrea cremer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus bibendum metus ut elit volutpat lacinia. Aenean blandit eros vitae sapien condimentum vestibulum. Nam porttitor tempus augue at euismod. Mauris iaculis, nisi id pellentesque efficitur, metus arcu volutpat purus, sed tristique dolor arcu sit amet eros. Integer vestibulum mollis nisl ac rhoncus. Phasellus venenatis at nibh congue pellentesque. Ut enim felis, consectetur nec venenatis at, vulputate sit amet leo. Curabitur ornare interdum quam. Curabitur a erat a tortor fermentum cursus vel in neque. Phasellus vel vulputate elit, in iaculis magna. Suspendisse dapibus aliquam aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed aliquam pharetra nulla non iaculis. Integer tristique dapibus nisl, a sollicitudin orci porta lacinia. Cras rutrum at risus eu condimentum. Pellentesque commodo ultrices convallis.', 'Disponible', '64c5250fb3165_nightshade.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `expiration_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_option` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`id`, `payment_date`, `expiration_date`, `user_id`, `payment_option`) VALUES
(6, '2023-07-25 00:00:00', '2024-07-25 00:00:00', 9, 'Paiement en une seule fois'),
(7, '2023-07-26 00:00:00', '2023-07-26 00:00:00', 10, 'Paiement en une fois'),
(8, '2023-07-06 00:00:00', '2024-07-06 00:00:00', 11, 'Paiement en une seule fois'),
(9, '2023-02-24 00:00:00', '2024-02-24 00:00:00', 12, 'Paiement en deux tranches'),
(10, '2023-02-20 00:00:00', '2024-02-20 00:00:00', 13, 'Paiement en deux tranches'),
(11, '2023-07-04 00:00:00', '2024-07-04 00:00:00', 14, 'Paiement en une seule fois'),
(12, '2023-07-06 00:00:00', '2024-01-06 00:00:00', 15, 'Paiement en deux tranches'),
(13, '2023-07-30 00:00:00', '2024-07-30 00:00:00', 18, 'Paiement en une seule fois'),
(14, '2023-07-30 00:00:00', '2024-03-01 00:00:00', 19, 'Paiement en deux tranches'),
(15, '2023-07-31 00:00:00', '2024-07-31 00:00:00', 22, 'Paiement en une fois'),
(16, '2023-07-29 00:00:00', '2024-07-29 00:00:00', 23, 'Paiement en une seule fois'),
(17, '2023-08-01 00:00:00', '2024-03-01 00:00:00', 25, 'Paiement en deux tranches'),
(18, '2023-08-01 00:00:00', '2024-03-01 00:00:00', 26, 'Paiement en deux tranches');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `loan_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `loan_status` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `loan_date`, `return_date`, `loan_status`, `user_id`, `book_id`) VALUES
(13, '2023-07-04 00:00:00', '2023-07-18 00:00:00', 'En cours', 10, 12),
(15, '2023-07-14 00:00:00', '2023-07-28 00:00:00', 'En cours', 15, 21),
(17, '2023-07-30 00:00:00', '2023-08-12 00:00:00', 'En cours', 18, 22),
(18, '2023-07-30 00:00:00', '2023-08-13 00:00:00', 'En cours', 23, 24);

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL,
  `message` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `message`, `user_id`, `book_id`) VALUES
(8, 'le livre semble bien ecrit', 10, 12),
(9, 'c\'est louche', 11, 11),
(11, 'le titre ne me semble pas correcte', 15, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `password`, `email`, `status`) VALUES
(17, 'bibliothecaire principale', '$2y$10$J86EYsQ.trjswBy0X7I7Xeo1lsTq/TSzRsef2BAz2ixrCAorO6C1i', 'admin01@gmail.com', 'admin'),
(18, 'coca lover', '$2y$10$tlccRpyMWv6egap1JJNL1O/CvdnqSIlGj.Xnu./Q56uJL4hnSOkLq', 'cocalovertest@gmail.com', 'membre'),
(19, 'user01', '$2y$10$9kyzGYJ4aPhXqi71kkq.5urdm1OxwK1/yJgee48r2DawpH2DKk/0a', 'user01@gmail.com', 'membre'),
(20, 'admin02', '$2y$10$5Pkr3XnJQ.IzyMdVbNVmaur/0d5tK/J0FMNsOgYnYMlYm4XmzYTVC', 'admin02@gmail.com', 'admin'),
(21, 'admin03', '$2y$10$2tNT0qbsTIh3K8yRjXNjjOJhDpapluqO1BwlG4NRHcN/BJOazo1XO', 'admin03@gmail.com', 'admin'),
(22, 'razer', '$2y$10$TwIZmyfa1hGHlHGMpHLtBuk1kIIAeEnrta.vVsXVy4hMu.9frTfUO', 'user06@gmail.com', 'membre'),
(23, 'user77', '$2y$10$ox0/m8W3FAZ3Yxw9bxcpWuu4VzYhXTiti9C4xYEfK7O4W9lVEcqUG', 'user76@gmail.com', 'membre'),
(24, 'admin77', '$2y$10$yzqhQLpM5ro/KxSal6nDgef32IKhy86tO6aEyAScwjv4NEMFENT9y', 'admin71@gmail.com', 'admin'),
(26, 'Ariela Fitia', '$2y$10$jwWJHh/IY1r1uhbau0eIlu5Yx2hmvVoxA8XLewgTomYrQifcYYz1m', 'arielafitiajoharini@gmail.com', 'membre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
