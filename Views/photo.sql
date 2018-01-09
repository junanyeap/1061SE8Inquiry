-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-10 00:49:01
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ecology`
--

-- --------------------------------------------------------

--
-- 資料表結構 `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `directory` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `altitude` varchar(20) DEFAULT NULL,
  `shootdatetime` datetime DEFAULT NULL,
  `createtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `photo`
--

INSERT INTO `photo` (`id`, `directory`, `path`, `name`, `longitude`, `latitude`, `altitude`, `shootdatetime`, `createtime`) VALUES
(1, '虎皮蛙', '../Public/h虎皮蛙/a3a77dd99bd232c540fd128edd0bc215.jpg', 'frog3.jpg', '', '', NULL, '0000-00-00 00:00:00', '2018-01-09 23:46:15'),
(2, '海蛙', '../Public/海蛙/39e471ce7a42ebdb20efac76e9013060.jpg', '海娃.jpg', '', '', NULL, '0000-00-00 00:00:00', '2018-01-09 23:55:45'),
(3, '澤蛙', '../Public/澤蛙/4c51f81e2eb02e96133dce2d42e1f6e5.jpg', '澤蛙.jpg', '', '', NULL, '0000-00-00 00:00:00', '2018-01-09 23:57:32'),
(4, '馬達加斯加彩蛙', '../Public/馬達加斯加彩蛙/65dcdf8a0b3189d8c5d21916b05ab460.jpg', '馬達加斯加彩蛙.jpg', '', '', NULL, '0000-00-00 00:00:00', '2018-01-10 00:18:40'),
(5, '金蛙', '../Public/金蛙/f70a904932c75cdc42937fc36ed0f5fd.jpg', '金蛙.jpg', '', '', NULL, '0000-00-00 00:00:00', '2018-01-10 00:19:39'),
(6, '綠彩蛙', '../Public/綠彩蛙/0d1fc0263c82bedd26076fad8074dd99.jpg', '綠彩蛙.jpg', '', '', NULL, '0000-00-00 00:00:00', '2018-01-10 00:20:28'),
(11, '面天樹蛙', '../Public/面天樹蛙/7bed4a517732ad0fe9f3d184cabff133.jpg', '面天樹蛙.jpg', 'NAN', 'NAN', NULL, '0000-00-00 00:00:00', '2018-01-10 00:23:46'),
(12, '艾氏樹蛙', '../Public/艾氏樹蛙/53d9202a5f5fd3ec8b1d332af6900c3f.jpg', '艾氏樹蛙.jpg', '', '', NULL, '0000-00-00 00:00:00', '2018-01-10 00:25:00');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
