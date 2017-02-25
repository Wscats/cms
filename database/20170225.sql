-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-25 07:59:51
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- 表的结构 `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL,
  `channel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `channel`
--

INSERT INTO `channel` (`id`, `channel`) VALUES
(4, '军事'),
(6, '推荐'),
(7, '热点'),
(8, '娱乐');

-- --------------------------------------------------------

--
-- 表的结构 `news`
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
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `channel_id`, `channel_name`, `image`) VALUES
(14, '广州非法逗留“黑人”事件', '2013年6月18日13时许，一名黑人在广园西路搭乘摩托车，与车主因车费纠纷引发打斗，双方随后被警方带回矿泉派出所作进一步调查。17时许，该外籍男士突然昏迷，警方即通知“120”派医务人员到场抢救，最终经抢救无效死亡，警方正依法立案开展侦查。', 6, '推荐', 'http://localhost:81/news/php/uploads/aaa_03.png'),
(15, '为什么酒店厕所（浴室）玻璃都是透明，或者半透明的？', '我深信这样的设计不是为了看里面的人洗澡（才怪！？），玻璃的背后肯定隐藏了很深的设计用意，嗯，今天就为你呈上使用浴室透明玻璃的10大原因……', 6, '推荐', 'http://localhost:81/news/php/uploads/aaa_15.png'),
(16, '此人死后轰动整个上海滩，三十万人替她送葬，5名少女为其自杀', '要说公众人物，明星肯定也是其中一员，而在民国年间，明星可不像现在这么多，那些影视明星真的是火遍大江南北，为世人所熟知，有的影视演员的影响力甚至不输于当时的文学大家。而位于民国四大美女之一的阮玲玉就是这样的一位女性，她出生贫寒，却靠着自己一步步的努力成了最耀眼的明星，而她却死于舆论之下，阮玲玉死的时候，就有五名少女为她自杀，这五名都是阮玲玉的忠实粉丝，她们将阮玲玉作为自己的榜样，这些人死的时候纷纷表示阮玲玉是她们的精神支柱，她死了，她们的心也死了，她们愿意跟随阮玲玉。', 6, '推荐', 'http://localhost:81/news/php/uploads/aaa_19.png'),
(17, '董卿自爆曾被爸爸逼到不想活，网友：难怪她一直没结婚也不幸福', '她对父亲的形容也一直是“非常非常非常严厉”，“我父母从小对我特别特别严厉”，甚至怀疑过自己是不是亲生的。 ', 6, '推荐', 'http://localhost:81/news/php/uploads/20150529180426_dMeGw.jpeg'),
(19, '第一条测试', 'hello', 6, '推荐', '');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `token`) VALUES
(1, 'wscat', 'e10adc3949ba59abbe56e057f20f883e', '1ec4f749064c0e78c527ff8eaa523d81'),
(2, 'sen', 'e10adc3949ba59abbe56e057f20f883e', '1177000ae556091fdeef7995cabac8d6'),
(3, 'admin', '73e5d4706cd1a6f78169298b327f5e59', ''),
(6, 'login', '73e5d4706cd1a6f78169298b327f5e59', ''),
(7, 'asd', '202cb962ac59075b964b07152d234b70', ''),
(8, 'abc', '202cb962ac59075b964b07152d234b70', '948abafa32dffb3e368a8f72eeef05ba'),
(9, 'cba', '202cb962ac59075b964b07152d234b70', '80b216bdb6c812d5d884e18d44faae32'),
(10, 'abcd', '202cb962ac59075b964b07152d234b70', 'eeca0bc6c7760e56394ecfc642fa6e16'),
(11, 'abcde', '202cb962ac59075b964b07152d234b70', 'c14d9f08e68d8fc91b1dae67e69d4485'),
(12, 'abcdefg', '202cb962ac59075b964b07152d234b70', 'ed95d6f1657e990a4ceca31507495494'),
(13, 'lobotu', '202cb962ac59075b964b07152d234b70', 'd08271c913484c75ee801d94b404bd49'),
(14, 'lobotu2', '202cb962ac59075b964b07152d234b70', 'ed645a289631cc5e4247e6b80ecff318'),
(15, 'lobotu3', '202cb962ac59075b964b07152d234b70', '788e4baf282b50bd5a7f2eefc78dddf2'),
(16, 'lobotu4', '202cb962ac59075b964b07152d234b70', '152977ef154b96d4b98c5053cfbe6b98'),
(17, 'lobotu5', '202cb962ac59075b964b07152d234b70', '67d17783208a984a06072aa359d83759'),
(18, 'hjk', '202cb962ac59075b964b07152d234b70', ''),
(19, 'yaojialong', '25d55ad283aa400af464c76d713c07ad', '17b3b951ff1276189eae1b9c5dfc3a8a'),
(20, 'laoxie', '25d55ad283aa400af464c76d713c07ad', 'd1d5821ad97593fc108992b1aee138ef'),
(21, 'asdasd', 'a8f5f167f44f4964e6c998dee827110c', ''),
(22, 'abcd', '202cb962ac59075b964b07152d234b70', ''),
(23, 'acbd', '7815696ecbf1c96e6894b779456d330e', '01355a192e0825c4da9e1383cb20634e');

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
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
