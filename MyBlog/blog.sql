-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-06-20 22:35:05
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `salt`) VALUES
(9, 'admin', '846334475185e541e9b40d3b21a49ff4', 'b0c992bc189e7449e2ab20c3b6b9e6d2');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `article_category_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `thumb`, `title`, `article_category_id`, `content`, `create_time`) VALUES
(1, 'https://gss3.bdstatic.com/-Po3dSag_xI4khGkpoWK1HF6hhy/baike/w%3D268%3Bg%3D0/sign=0c07140c8935e5dd902ca2d94efdc0d2/377adab44aed2e73c81172728b01a18b86d6faf0.jpg', '极限挑战第四季热播中', 5, '极限挑战第四季热播中', 0),
(2, 'https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=3450127879,2312360913&fm=58&bpow=472&bpoh=338', '呵呵呵', 4, '<p>全职高手<img src="/ueditor/php/upload/image/20180604/1528124624130472.jpg" title="1528124624130472.jpg" alt="24.jpg"/></p>', 1526894155),
(3, 'http://00.imgmini.eastday.com/mobile/20170903/20170903115945_03b8a88df16017aec1f520ab74f2d6cd_4.jpeg', 'SwinJoy的博客都是正经的', 2, '<p>纯天然，无添加，正能量爆棚，技术分享的好博客！</p>', 1527601588),
(4, 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=1332936090,1086240862&fm=85&s=DEA4546EC60045451B2203580200D0DB', '富文本编辑器', 1, '<p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 18px;">富</span><span style="color: rgb(84, 141, 212);">文本</span><strong>编辑器</strong></p><p><strong><img src="/ueditor/php/upload/image/20180605/1528207400132998.gif" title="1528207400132998.gif" alt="kv_img_01.gif"/></strong></p>', 1528207403),
(5, 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=1332936090,1086240862&fm=85&s=DEA4546EC60045451B2203580200D0DB', '富文本编辑器2测试', 3, '<h1><span style="color: rgb(0, 176, 240);">富<span style="text-decoration: underline;">文本</span><em>编辑</em></span><em>器2</em><sub>测试<img src="/ueditor/php/upload/image/20180605/1528207690970108.png" title="1528207690970108.png" alt="kv_gif_2.png"/></sub></h1>', 1528207669),
(6, 'http://www.xiaohei.com/d/file/gonglue/youxigonglue/neirongtu/20171017/volkuxzev3e_68.jpg', '李白凤求凰', 2, '<p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);"><strong>【李白凤求凰台词】</strong></p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　凤兮凤兮归故乡，遨游四海求其凰。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　三尺长剑，斩不尽相思情缠。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　邂逅你，是生生世世的宿命。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　逆了苍天，踏破碧落黄泉。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　直至地老天荒，独剩你我。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　剑之所至，心之所往。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　单身又活的太久是最大的痛，我来替你解脱!</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　长歌当哭，为君仗剑弑天下!</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　有凤来仪。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　永生不过是场幻梦，唯吾所爱不朽。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);">　　何以缘起?何以缘灭?当以剑歌问之。</p><p style="box-sizing: border-box; padding: 0px; margin-top: 0px; margin-bottom: 0px; font-family: Arial, &quot;Microsoft YaHei&quot;, 锟斤拷锟斤拷, 锟斤拷锟斤拷, sans-serif; line-height: 36px; color: rgb(48, 48, 48); white-space: normal; background-color: rgb(255, 255, 255);"><img src="/ueditor/php/upload/image/20180612/1528799220100604.jpg" title="1528799220100604.jpg" alt="timg.jpg"/></p><p><br/></p>', 1528799226);

-- --------------------------------------------------------

--
-- 表的结构 `article_category`
--

CREATE TABLE `article_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `sug` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article_category`
--

INSERT INTO `article_category` (`id`, `name`, `sug`) VALUES
(1, '技术', 'it'),
(2, '随笔', 'essay'),
(3, '摄影', 'shoot'),
(4, '旅游', 'travel'),
(5, '他山之玉', 'reprint'),
(6, '天马行空', 'someWord');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sug` (`sug`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
