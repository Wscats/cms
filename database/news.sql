-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 04:01 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL,
  `channel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `channel`) VALUES
(1, '2'),
(2, '3');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `channel_name` varchar(5) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `channel_id`, `channel_name`, `image`) VALUES
(2, '123', '<h3><img alt="" src="http://localhost/CI/myCi/uploads/aaa_19.png" style="float:left; height:100px; margin-right:10px; width:100px" />Type the title here</h3>\n\n<p>Type the text here</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', 1, '2', 'http://localhost/CI/myCi/uploads/aaa_03.png'),
(3, '3', '<h2>jQuery hide() 和 show()</h2>\n\n<p>通过 jQuery，您可以使用 hide() 和 show() 方法来隐藏和显示 HTML 元素：</p>\n\n<blockquote>\n<pre>\n$(&quot;#hide&quot;).click(function(){\n  $(&quot;p&quot;).hide();\n});\n\n$(&quot;#show&quot;).click(function(){\n  $(&quot;p&quot;).show();\n});</pre>\n</blockquote>\n', 1, '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `token`) VALUES
(1, 'wscat', 'e10adc3949ba59abbe56e057f20f883e', ''),
(2, 'sen', 'e10adc3949ba59abbe56e057f20f883e', ''),
(3, 'admin', '73e5d4706cd1a6f78169298b327f5e59', ''),
(6, 'login', '73e5d4706cd1a6f78169298b327f5e59', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;