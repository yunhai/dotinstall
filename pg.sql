-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2018 at 03:16 PM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pg`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `login_mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `link`, `media_id`, `type`, `mode`, `login_mode`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'facebook2', 'vnexpress.net', 353, 1, 1, 1, 53, 53, '2018-09-18 19:09:33', '2018-09-25 18:52:46', NULL),
(2, 'youtube', 'https://player.vimeo.com/video/286278638', 354, 1, 1, 1, 53, 53, '2018-09-18 19:16:50', '2018-09-25 18:52:51', NULL),
(3, 'test', 'https://www.youtube.com/embed/5b91dFhZz0g', 355, 1, 1, 1, 53, 53, '2018-09-20 18:27:41', '2018-09-25 18:52:58', NULL),
(4, 'a8', '<a href=\"https://px.a8.net/svt/ejp?a8mat=2ZPRJO+ADW8OI+3W96+1BOLU9\" target=\"_blank\" rel=\"nofollow\">\r\n<img border=\"0\" width=\"300\" height=\"250\" alt=\"\" src=\"https://www23.a8.net/svt/bgt?aid=180921012628&wid=001&eno=01&mid=s00000018177008009000&mc=1\"></a>\r\n<img border=\"0\" width=\"1\" height=\"1\" src=\"https://www14.a8.net/0.gif?a8mat=2ZPRJO+ADW8OI+3W96+1BOLU9\" alt=\"\">', 0, 2, 1, 2, 53, 53, '2018-09-21 16:08:58', '2018-09-25 18:53:07', NULL),
(5, 'xxx', '<a href=\"https://px.a8.net/svt/ejp?a8mat=2ZPRJO+ADW8OI+3W96+1BOLU9\" target=\"_blank\" rel=\"nofollow\">\r\n<img border=\"0\" width=\"300\" height=\"250\" alt=\"\" src=\"https://www23.a8.net/svt/bgt?aid=180921012628&wid=001&eno=01&mid=s00000018177008009000&mc=1\"></a>\r\n<img border=\"0\" width=\"1\" height=\"1\" src=\"https://www14.a8.net/0.gif?a8mat=2ZPRJO+ADW8OI+3W96+1BOLU9\" alt=\"\">', 359, 1, 1, 2, 53, 53, '2018-09-25 18:02:35', '2018-09-25 18:53:46', NULL),
(6, 'pandog', '<a href=\"https://px.a8.net/svt/ejp?a8mat=2ZPRJO+ADW8OI+3W96+1BOLU9\" target=\"_blank\" rel=\"nofollow\">\r\n<img border=\"0\" width=\"300\" height=\"250\" alt=\"\" src=\"https://www23.a8.net/svt/bgt?aid=180921012628&wid=001&eno=01&mid=s00000018177008009000&mc=1\"></a>\r\n<img border=\"0\" width=\"1\" height=\"1\" src=\"https://www14.a8.net/0.gif?a8mat=2ZPRJO+ADW8OI+3W96+1BOLU9\" alt=\"\">', 360, 2, 1, 1, 53, 53, '2018-09-25 18:54:55', '2018-09-25 18:59:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliators`
--

CREATE TABLE `affiliators` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission_rate` decimal(5,2) NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `affiliators`
--

INSERT INTO `affiliators` (`id`, `fullname`, `email`, `token`, `username`, `password`, `commission_rate`, `balance`, `mode`, `user_id`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Affiliator', 'affiliator@pg.me', 'zlla5b6537aaUULy', 'Affiliator', '4d9IyFku', '10.00', 0, 1, 100, 0, 0, '2018-08-03 22:20:42', '2018-08-03 22:20:42', NULL),
(3, 'pandog test3', 'yunhaihuang@gmail.com', '83FC5b82afc1vUVS', 'Affiliator', '4tIlG5Gd', '6.00', 0, 1, 138, 53, 53, '2018-08-26 15:48:49', '2018-08-26 17:01:08', NULL),
(4, 'Ngo Hong Dao', 'yunhaihuang+edit@gmail.com', 'c6e45b82c0aeyItW', 'pandog', '123456', '9.00', 0, 1, 139, 53, 53, '2018-08-26 17:01:02', '2018-08-26 18:03:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliator_incomes`
--

CREATE TABLE `affiliator_incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `affiliator_id` int(10) UNSIGNED NOT NULL,
  `target_date` date NOT NULL,
  `invitation` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `commission` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `affiliator_incomes`
--

INSERT INTO `affiliator_incomes` (`id`, `affiliator_id`, `target_date`, `invitation`, `commission`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2018-08-01', 2, 206, 53, 0, '2018-08-01 08:16:15', '2018-08-01 08:18:58', NULL),
(2, 1, '2018-08-02', 8, 824, 99, 0, '2018-08-02 10:28:54', '2018-08-02 10:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliator_income_logs`
--

CREATE TABLE `affiliator_income_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `target_date` date NOT NULL,
  `affiliator_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `affiliator_commission_base` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `affiliator_commission_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `affiliator_commission` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `affiliator_income_logs`
--

INSERT INTO `affiliator_income_logs` (`id`, `target_date`, `affiliator_id`, `user_id`, `affiliator_commission_base`, `affiliator_commission_rate`, `affiliator_commission`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2018-08-02', 1, 54, 980, '10.50', 103, 99, 0, '2018-08-02 10:41:51', '2018-08-02 10:41:51', NULL),
(2, '2018-08-02', 1, 54, 980, '10.50', 103, 99, 0, '2018-08-02 10:42:11', '2018-08-02 10:42:11', NULL),
(3, '2018-08-02', 1, 54, 980, '10.50', 103, 99, 0, '2018-08-02 10:42:12', '2018-08-02 10:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliator_invitations`
--

CREATE TABLE `affiliator_invitations` (
  `id` int(10) UNSIGNED NOT NULL,
  `affiliator_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `join_date` datetime DEFAULT NULL,
  `affiliator_commission_base` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `affiliator_commission_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `affiliator_commission` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `affiliator_token` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliator_invitations`
--

INSERT INTO `affiliator_invitations` (`id`, `affiliator_id`, `user_id`, `join_date`, `affiliator_commission_base`, `affiliator_commission_rate`, `affiliator_commission`, `affiliator_token`, `mode`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 64, '2018-08-01 14:36:03', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 64, 0, '2018-08-01 07:36:03', '2018-08-01 07:36:03', NULL),
(2, 1, 65, '2018-08-01 15:04:39', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 65, 0, '2018-08-01 08:04:39', '2018-08-01 08:04:39', NULL),
(3, 1, 66, '2018-08-01 15:05:24', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 66, 0, '2018-08-01 08:05:24', '2018-08-01 08:05:24', NULL),
(4, 1, 67, '2018-08-01 15:07:57', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 67, 0, '2018-08-01 08:07:57', '2018-08-01 08:07:57', NULL),
(5, 1, 68, '2018-08-01 15:08:05', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 68, 0, '2018-08-01 08:08:05', '2018-08-01 08:08:05', NULL),
(6, 1, 69, '2018-08-01 15:09:17', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 69, 0, '2018-08-01 08:09:17', '2018-08-01 08:09:17', NULL),
(7, 1, 70, '2018-08-01 15:11:38', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 70, 0, '2018-08-01 08:11:38', '2018-08-01 08:11:38', NULL),
(8, 1, 71, '2018-08-01 15:12:02', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 71, 0, '2018-08-01 08:12:02', '2018-08-01 08:12:02', NULL),
(9, 1, 72, '2018-08-01 15:12:35', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 72, 0, '2018-08-01 08:12:35', '2018-08-01 08:12:35', NULL),
(10, 1, 73, '2018-08-01 15:13:31', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 73, 0, '2018-08-01 08:13:31', '2018-08-01 08:13:31', NULL),
(11, 1, 74, '2018-08-01 15:14:32', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 74, 0, '2018-08-01 08:14:32', '2018-08-01 08:14:32', NULL),
(12, 1, 75, '2018-08-01 15:16:15', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 75, 0, '2018-08-01 08:16:15', '2018-08-01 08:16:15', NULL),
(13, 1, 76, '2018-08-01 15:16:40', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 76, 0, '2018-08-01 08:16:40', '2018-08-01 08:16:40', NULL),
(14, 1, 77, '2018-08-01 15:18:45', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 77, 0, '2018-08-01 08:18:45', '2018-08-01 08:18:45', NULL),
(15, 1, 78, '2018-08-01 15:18:58', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 78, 0, '2018-08-01 08:18:58', '2018-08-01 08:18:58', NULL),
(16, 1, 96, '2018-08-02 16:23:56', 0, '0.00', 0, 'y37t5b61a475VUuP', 1, 96, 0, '2018-08-02 09:23:56', '2018-08-02 09:23:56', NULL),
(17, 1, 97, '2018-08-02 16:58:18', 980, '10.50', 103, 'y37t5b61a475VUuP', 0, 97, 0, '2018-08-02 09:58:18', '2018-08-02 09:58:18', NULL),
(18, 2, 98, '2018-08-02 17:04:09', 980, '10.50', 103, 'y37t5b61a475VUuP', 0, 98, 0, '2018-08-02 10:04:09', '2018-08-02 10:04:09', NULL),
(19, 2, 54, '2018-08-02 17:05:46', 980, '10.50', 103, 'y37t5b61a475VUuP', 1, 99, 0, '2018-08-02 10:05:46', '2018-08-02 10:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `post_date`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '関東で局地的に激しい雨　茨城・鹿嶋で１時間１００ミリ', '関東で１８日夜、局地的に激しい雨が降った。気象庁は、低い土地の浸水、河川の増水への注意を呼びかけている。', '2018-09-19 01:27:24', 53, 53, '2018-09-18 18:27:24', '2018-09-18 18:29:31', NULL),
(2, '節電解除へ、暮らしや観光の復調に期待　地震から２週間', '北海道で続いていた家庭や企業に対する節電要請が６日未明の地震からおよそ２週間で解除される見込みとなった。暮らしや観光、経済に明るさが戻ることへの期待が高まる。地震を機に、このまま節電を続けるという声も上がっている。', '2018-09-19 01:31:14', 53, 53, '2018-09-18 18:31:14', '2018-09-18 18:31:14', NULL),
(3, 'Ｗ杯決勝進入のバンドメンバー、裁判所で毒を盛られる？', 'ロシアのプーチン大統領を批判する同国のパンクバンド「プッシー・ライオット」のメンバーが、モスクワの裁判所で何かを食べた後、倒れる事件があり、運び込まれたベルリンの医療機関は１８日、毒を盛られた可能性が高いと発表した。', '2018-09-19 01:31:33', 53, 53, '2018-09-18 18:31:33', '2018-09-18 18:31:33', NULL),
(4, '「生じょうゆは２往復半」大阪の名物うどん店、閉店へ', '「うどんにかける生（き）じょうゆは２往復半」。名物店主がユーモアたっぷりに食べ方を指南してくれる大阪・梅田の人気うどん店「梅田はがくれ」が、２５日で約３０年の歴史に幕を下ろす。閉店を惜しむファンが、長い列をつくっている。店主... [続きを読む]', '2018-09-19 01:32:14', 53, 53, '2018-09-18 18:32:14', '2018-09-18 18:32:14', NULL),
(5, '若い女性の妊婦判定費用、全額補助へ　未受診減らす狙い', '妊娠中に診察や定期健診を受けない妊婦を減らすため、厚生労働省は、妊娠している可能性がある若い女性らへの支援策を増やす方針を固めた。本人が同意した場合は保健師らが一緒に医療機関に行き、医療機関での妊娠判定費用も全額補助する考えだ。２０１９年度予算の概算要求に盛り込んだ。早ければ来年度にも実施する。', '2018-09-19 01:32:35', 53, 53, '2018-09-18 18:32:35', '2018-09-18 18:32:35', NULL),
(6, '希林さんに２度断られた河瀬監督　「本気度見てはった」', '希林さんは必ず１回断るんです。主人公の徳江を演じてもらった「あん」の時もそう。原作のドリアン助川さんと２人で口説きました。「光」も最初は断られた。こちらの本気度を見てはったんじゃないかな。', '2018-09-19 01:33:20', 53, 53, '2018-09-18 18:33:20', '2018-09-18 18:33:20', NULL),
(7, '小さな家の生活日記 2018特別編', '「東京の台所」でおなじみの大平一枝さんは、23歳の息子さんと19歳の娘さんのお母さんでもあります。大平さんは、朝日新聞デジタルの前身「アサヒコム」で毎週月曜日、「小さな家の生活日記」を連載していました。', '2018-09-20 10:45:11', 53, 53, '2018-09-20 15:45:11', '2018-09-20 15:45:11', NULL),
(8, '', 'fafafda', '2018-09-20 10:53:51', 53, 53, '2018-09-20 15:53:51', '2018-09-20 18:29:21', '2018-09-20 18:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(10) UNSIGNED NOT NULL,
  `invitor_id` int(10) UNSIGNED NOT NULL,
  `participant_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `effective_date` date DEFAULT NULL,
  `token` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `difficulty` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `free_mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `poster` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `video_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name_alias` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `caption`, `note`, `sort`, `mode`, `difficulty`, `free_mode`, `poster`, `category_id`, `video_count`, `name_alias`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lesson 1 demo', '', '', 1, 1, 1, 0, 0, 15, 6, 'xxx', 51, 53, '2018-07-06 09:28:26', '2018-10-07 07:36:06', NULL),
(2, 'lesson 2', '', '', 2, 1, 3, 0, 0, 15, 2, '', 0, 53, '2018-08-03 23:46:20', '2018-10-04 17:06:27', NULL),
(3, 'lesson 3', '', '', 3, 1, 3, 0, 0, 15, 1, '', 0, 53, '2018-08-03 23:46:20', '2018-09-09 07:22:10', NULL),
(4, 'lesson 4', '', '', 4, 1, 1, 0, 0, 15, 2, '', 0, 53, '2018-08-07 14:27:04', '2018-09-09 05:27:28', NULL),
(5, 'lesson 5', '', '', 5, 1, 1, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:04', '2018-09-09 06:20:58', NULL),
(6, 'lesson 6', '', '', 6, 1, 1, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:04', '2018-09-13 23:58:13', NULL),
(7, 'lesson 7', '', '', 7, 1, 1, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:04', '2018-08-11 07:18:46', NULL),
(8, 'lesson 8', '', '', 8, 1, 1, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:04', '2018-09-09 07:06:14', NULL),
(9, 'lesson 9', '', '', 9, 1, 1, 0, 0, 15, 3, '', 0, 53, '2018-08-07 14:27:04', '2018-09-11 17:43:45', NULL),
(10, 'lesson 10', '', '', 10, 1, 1, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:04', '2018-09-12 17:28:39', NULL),
(11, 'iPhoneアプリ/swiftコース/名言集アプリを作ってみようてみよう！', '', '', 11, 1, 4, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:04', '2018-09-28 18:34:16', NULL),
(12, 'swiftコース/メモアプリ【応用編】を作ってみようメモアプリ', '', '', 12, 1, 4, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:05', '2018-09-28 18:36:41', NULL),
(13, 'swiftコース/検索ブラウザを実装してみよう', '', '', 13, 1, 4, 0, 0, 15, 1, '', 0, 53, '2018-08-07 14:27:05', '2018-09-28 18:38:14', NULL),
(14, 'lesson 14', '', '', 14, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(15, 'lesson 15', '', '', 15, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(16, 'lesson 16', '', '', 16, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(17, 'lesson 17', '', '', 17, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(18, 'lesson 18', '', '', 18, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(19, 'lesson 19', '', '', 19, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(20, 'lesson 20', '', '', 20, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(21, 'lesson 21', '', '', 21, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(22, 'lesson 22', '', '', 22, 1, 1, 0, 0, 15, 0, '', 0, 53, '2018-08-07 14:27:05', '2018-08-11 07:18:47', NULL),
(23, 'xxx', '', '', 23, 1, 1, 0, 0, 15, 0, '', 53, 53, '2018-08-08 08:59:24', '2018-08-11 07:18:47', NULL),
(24, 'xxx', '', '', 24, 0, 2, 0, 0, 15, 0, '', 53, 53, '2018-08-08 09:00:06', '2018-08-11 07:18:47', NULL),
(25, 'xx', '', '', 25, 0, 1, 0, 0, 15, 0, '', 53, 53, '2018-08-09 08:42:22', '2018-09-22 18:29:33', '2018-09-22 18:29:33'),
(26, 'メモアプリswiftコース/メモアプリ', '', '', 25, 0, 4, 0, 0, 15, 0, '', 53, 53, '2018-09-28 18:35:17', '2018-09-28 18:35:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_attachments`
--

CREATE TABLE `lesson_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `lession_id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_details`
--

CREATE TABLE `lesson_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_female` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `source_code_content` text COLLATE utf8mb4_unicode_ci,
  `duration` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `duration_female` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `poster` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `free_mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `new_mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `name_alias` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lesson_details`
--

INSERT INTO `lesson_details` (`id`, `name`, `caption`, `url`, `url_female`, `video`, `source_code_content`, `duration`, `duration_female`, `poster`, `mode`, `free_mode`, `new_mode`, `sort`, `lesson_id`, `name_alias`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '(detail) xxx', 'アップルは１２日午前（日本時間１３日未明）、米カリフォルニア州クパティーノ市の同社内にあるスティーブ・ジョブズ・シアター（写真１）で、ｉＰｈｏｎｅとＡｐｐｌｅ　Ｗａｔｃｈの２０１８年モデルを発表しました。新製品にどのような戦略を託したのでしょうか。（ライター・西田宗千佳）', 'https://player.vimeo.com/video/286278638', '', 3, '<?php namespace App\\Http\\Controllers; use App\\Models\\Lesson\\Lesson as LessonModel; use App\\Models\\Media as MediaModel; use App\\Models\\MsCategory as MsCategoryModel; use App\\Models\\User\\UserLesson as UserLessonModel; use App\\Models\\User\\UserLessonDetail as UserLessonDetailModel; use App\\Models\\YoutubeLink as YoutubeLink; use Auth; use Illuminate\\Http\\Request; use Storage; class Top extends Base { public function __construct( LessonModel $lesson_model, UserLessonDetailModel $user_lesson_detail_model, UserLessonModel $user_lesson_model, YoutubeLink $youtube_link ) { $this->model = $lesson_model; $this->user_lesson_detail_model = $user_lesson_detail_model; $this->user_lesson_model = $user_lesson_model; $this->youtube_link = $youtube_link; } public function index(Request $request) { $input = $request->all(); if (!empty($input[\'token\'])) { $affiliator_token = $input[\'token\']; session(compact(\'affiliator_token\')); } $user_id = Auth::id() ?: 0; $filter_form = $this->filterForm($input); $lesson_info = []; if ($user_id) { $lessons = $this->getLogedInLesson($input); $lesson_info = $this->lessonInfo($lessons); } else { $lessons = $this->getUnLogInLesson(); } $youtube_link = $this->youtube_link->random(); shuffle($youtube_link); return $this->render(\'top\', compact(\'lessons\', \'youtube_link\', \'filter_form\', \'lesson_info\')); } public function AjaxLesson() { $filter_form = $this->filterForm(); $lessons = $this->getUnLogInLesson(); return $this->render(\'top/ajax_lesson\', compact(\'lessons\', \'filter_form\')); } private function getUnLogInLesson() { $paginator = $this->model->getLessonsForHome(); if ($paginator->items()) { $lessons = $paginator->items(); $media = $this->getMedia($lessons); $user_id = Auth::id() ?: 0; foreach ($lessons as $index => $item) { $item = $item->toArray(); $lessons[$index] = $this->format($item, $media, $user_id); } $current_page = $paginator->currentPage(); $total_page = $paginator->count(); return [ \'data\' => $lessons, \'current_page\' => $current_page, \'next_page\' => ($current_page < $total_page) ? ++$current_page : 0, \'total_page\' => $total_page ]; } return [ \'data\' => [], \'current_page\' => 0, \'next_page\' => 0, \'total_page\' => 0 ]; } private function filterForm(array $input_value = []) { $model = new MsCategoryModel(); $category = $model->getList(); $difficulty = config(\'master.lesson.difficulty\'); return compact(\'category\', \'difficulty\', \'input_value\'); } private function getLogedInLesson(array $filter = []) { $tmp = []; $lessons = $this->model->getLessons($filter); if ($lessons) { $lesson_id = data_get($lessons, \'*.id\'); $lessons = $this->lessonStat($lessons, $lesson_id); foreach ($lessons as $item) { $difficulty = $item[\'difficulty\']; $category = $item[\'category_id\']; if (!isset($tmp[$difficulty])) { $tmp[$difficulty] = [ $category => [] ]; } elseif (!isset($tmp[$difficulty][$category])) { $tmp[$difficulty][$category] = []; } array_push($tmp[$difficulty][$category], $item); }; } $sort_order = [ LESSON_DIFFICULTY_NEWBIE, LESSON_DIFFICULTY_BEGINNER, LESSON_DIFFICULTY_INTERMEDIATE, LESSON_DIFFICULTY_ADVANCE, ]; $result = []; foreach ($sort_order as $item) { if (!empty($tmp[$item])) { $result[$item] = $tmp[$item]; } } return $result; } private function lessonStat(array $lessons = [], array $lesson_id_list = []) { $lesson_user_count_list = $this->user_lesson_model->countUserByLessonIdList($lesson_id_list); $user_id = Auth::id() ?: 0; $data = $this->user_lesson_detail_model->getByLessonId($user_id, $lesson_id_list); $lesson_detail_close_list = []; foreach ($data as $item) { $lesson_id = $item[\'lesson_id\']; $user_lesson_detail_mode = $item[\'mode\']; if (empty($lesson_detail_close_list[$lesson_id])) { $lesson_detail_close_list[$lesson_id] = 0; } if ($user_lesson_detail_mode == USER_LESSON_DETAIL_MODE_CLOSE) { $lesson_detail_close_list[$lesson_id]++; } } foreach ($lessons as &$item) { $lesson_id = $item[\'id\']; $item[\'lesson_learning_count\'] = $lesson_user_count_list[$lesson_id] ?? 0; $item[\'lesson_detail_close_count\'] = $lesson_detail_close_list[$lesson_id] ?? 0; } return $lessons; } private function lessonInfo(array $lessons = []) { $lesson_total = $video_total = 0; foreach ($lessons as $item) { foreach ($item as $item_detail) { $lesson_total += count($item_detail); foreach ($item_detail as $detail) { $video_total += $detail[\'video_count\']; }; }; }; return compact(\'lesson_total\', \'video_total\'); } private function getMedia($lessons) { $media_id = data_get($lessons, \'*.lesson_details.*.source_code_contents.*.media_id\'); $tmp = data_get($lessons, \'*.lesson_details.*.resources.*.media_id\'); $media_id = array_merge($media_id, $tmp); $tmp = (new MediaModel)->retrieve($media_id); $media = []; foreach ($tmp as $index => $item) { $media[$item[\'id\']] = $item; } return $media; } private function format(array $lesson, $media, $user_id) { $storage = Storage::disk(\'media\'); $lesson_details = $lesson[\'lesson_details\']; $user_diamond_flag = (Auth::check() && Auth::user()->grade == USER_GRADE_DIAMOND); foreach ($lesson_details as $key => $detail) { $lesson_details[$key][\'is_closeable\'] = $user_id && !$this->user_lesson_detail_model->closed($user_id, $detail[\'lesson_id\'], $detail[\'id\']); if (empty($detail[\'source_code_contents\'])) { $detail[\'source_code_contents\'] = []; } else { if ($user_diamond_flag || $detail[\'free_mode\'] == constant(\'LESSON_DETAIL_FREE_MODE_FREE\')) { foreach ($detail[\'source_code_contents\'] as $index => $item) { $path = $media[$item[\'media_id\']][\'path\'] ?? \'\'; if ($path && $storage->exists($path)) { $item[\'filename\'] = $media[$item[\'media_id\']][\'original_name\']; $item[\'content\'] = $storage->get($path); $lesson_details[$key][\'source_code_contents\'][$index] = $item; } else { unset($detail[\'source_code_contents\'][$index]); unset($lesson_details[$key][\'source_code_contents\'][$index]); } } } else { $detail[\'source_code_contents\'] = []; } } $resources_item = []; if (!empty($detail[\'resources\'])) { foreach ($detail[\'resources\'] as $index => $item) { $resources_item[$index] = $media[$item[\'media_id\']] ?? []; } } $lesson_details[$key][\'resources_item\'] = $resources_item; $lesson_details[$key][\'popup\'] = $detail[\'source_code_contents\'] || $detail[\'resources\']; } $lesson[\'lesson_details\'] = $lesson_details; return $lesson; } } <?php namespace App\\Models\\Backend\\Lesson\\LessonDetail; use App\\Models\\Backend\\Base; use App\\Models\\Backend\\Media; class LessonDetailAttachment extends Base { public $fillable = [ \'lesson_detail_id\', \'media_id\', \'type\', \'language\', \'ref_id\', ]; public function media() { return $this->hasOne(Media::class, \'id\', \'media_id\'); } public function createMany($input) { $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } } public function editMany($input, $lesson_detail_id) { $input_media_id = data_get($input, \'*.media_id\'); $old = $this ->select(\'id\', \'media_id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->get() ->pluck(\'media_id\') ->toArray(); $delete_media_id = array_diff($old, $input_media_id); $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } if (empty($item[\'id\'])) { $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } else { $data = array_intersect_key($item, array_flip($this->fillable)); $this->where(\'id\', $item[\'id\'])->update($data); } } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } $delete_id = $this->select(\'id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->whereIn(\'media_id\', $delete_media_id) ->whereIn(\'type\', [LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE, LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE]) ->get() ->pluck(\'id\', \'id\') ->toArray(); $this->whereIn(\'id\', $delete_id) ->delete(); $this->whereIn(\'ref_id\', $delete_id) ->where(\'type\', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) ->delete(); } }', 215, 0, 250, 1, 1, 2, 1, 1, 'iii', 51, 53, '2018-07-06 09:34:26', '2018-10-07 07:27:35', NULL),
(2, '(detail) xxx', '', 'https://player.vimeo.com/video/286278638', '', 7, NULL, 215, 0, 304, 1, 1, 1, 2, 2, '555', 51, 53, '2018-07-07 03:37:42', '2018-09-09 06:35:23', NULL),
(3, '(detail) xxx', '', '', '', 7, NULL, 0, 0, 8, 1, 1, 1, 3, 3, '', 51, 51, '2018-07-07 03:37:42', '2018-08-18 10:04:29', '2018-08-18 10:04:29'),
(4, '(detail) xxx', 'fdafdffdsf', 'https://player.vimeo.com/video/286133800', '', 7, NULL, 1234, 0, 298, 1, 1, 1, 4, 4, '', 51, 53, '2018-07-07 03:37:42', '2018-09-09 05:27:28', NULL),
(5, '(detail) xxx', '', 'https://player.vimeo.com/video/286278638', '', 7, NULL, 215, 0, 302, 1, 1, 1, 5, 5, '', 51, 53, '2018-07-07 03:37:42', '2018-09-09 06:20:58', NULL),
(6, '(detail) xxx', 'yyy', '', '', 70, NULL, 311, 0, 22, 1, 2, 1, 1, 6, '', 53, 53, '2018-08-04 01:28:15', '2018-08-11 07:19:35', '2018-08-11 07:19:35'),
(7, '(detail) xxx', 'charge1', 'https://player.vimeo.com/video/286133800', '', 71, NULL, 0, 0, 217, 1, 2, 1, 2, 7, '', 53, 53, '2018-08-11 07:21:17', '2018-08-26 16:22:58', NULL),
(8, '(detail) xxx', 'free1', 'https://player.vimeo.com/video/286133800', '', 78, '', 0, 0, 215, 1, 2, 2, 3, 1, '', 53, 53, '2018-08-12 00:15:11', '2018-10-07 07:28:29', NULL),
(9, '(detail) xxx', 'charge2', 'https://player.vimeo.com/video/286133800', '', 82, NULL, 0, 0, 305, 1, 1, 2, 4, 1, '', 53, 53, '2018-08-12 00:15:43', '2018-09-12 18:50:14', NULL),
(10, '(detail) xxx', 'bbb', 'https://player.vimeo.com/video/286278638', '', 132, NULL, 215, 0, 303, 1, 2, 1, 1, 2, '', 53, 53, '2018-08-14 09:29:09', '2018-10-04 17:06:26', NULL),
(11, '(detail) xxx', 'fff', 'https://player.vimeo.com/video/286133800', '', 205, NULL, 215, 0, 296, 1, 1, 1, 1, 3, '', 53, 53, '2018-08-18 10:06:09', '2018-09-09 05:26:49', NULL),
(16, '(detail) xxx', 'test1', 'https://player.vimeo.com/video/286133800', 'https://vimeo.com/286453244', 0, NULL, 215, 0, 340, 1, 1, 2, 1, 9, '', 53, 53, '2018-09-09 11:29:53', '2018-09-09 11:29:53', NULL),
(17, '(detail) xxx', '111', 'https://player.vimeo.com/video/286133800', 'https://vimeo.com/286453244', 0, NULL, 215, 293, 349, 1, 1, 1, 1, 9, '', 53, 53, '2018-09-09 12:22:37', '2018-09-11 17:43:45', NULL),
(18, '(detail) xxx', 'uuu', 'https://player.vimeo.com/video/286278638', 'https://player.vimeo.com/video/286133800', 0, NULL, 215, 215, 350, 1, 1, 2, 1, 9, '', 53, 53, '2018-09-09 14:48:42', '2018-09-09 17:18:30', NULL),
(19, '(detail) xxx', 'test', 'https://player.vimeo.com/video/286133800', 'https://vimeo.com/286453244', 0, NULL, 215, 293, 351, 1, 2, 2, 1, 10, '', 53, 53, '2018-09-12 17:27:52', '2018-09-12 17:28:39', NULL),
(20, '(detail) xxx', 'この動画について', 'https://player.vimeo.com/video/286133800', 'https://player.vimeo.com/video/286454495', 0, NULL, 215, 220, 352, 1, 1, 2, 1, 6, '', 53, 53, '2018-09-13 23:58:12', '2018-09-13 23:58:12', NULL),
(21, '(detail) xxx', 'hello world', 'https://player.vimeo.com/video/286133800', 'https://vimeo.com/286453244', 0, NULL, 215, 293, 356, 1, 1, 1, 9, 11, '', 53, 53, '2018-09-22 17:06:18', '2018-09-22 17:06:18', NULL),
(22, '(detail) xxx', 'https://vimeo.com/286453244', 'https://vimeo.com/286453244', '', 0, NULL, 293, 0, 361, 1, 2, 1, 1, 12, NULL, 53, 53, '2018-09-28 18:36:41', '2018-09-28 18:36:41', NULL),
(23, '(detail) xxx', 'https://vimeo.com/286453244', 'https://vimeo.com/286453244', '', 0, NULL, 293, 0, 362, 1, 2, 2, 1, 13, NULL, 53, 53, '2018-09-28 18:37:40', '2018-09-28 18:37:40', NULL),
(24, 'txt', 'test', 'https://player.vimeo.com/video/286133800', '', 0, '<?php namespace App\\Models\\Backend\\Lesson\\LessonDetail; use App\\Models\\Backend\\Base; use App\\Models\\Backend\\Media; class LessonDetailAttachment extends Base { public $fillable = [ \'lesson_detail_id\', \'media_id\', \'type\', \'language\', \'ref_id\', ]; public function media() { return $this->hasOne(Media::class, \'id\', \'media_id\'); } public function createMany($input) { $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } } public function editMany($input, $lesson_detail_id) { $input_media_id = data_get($input, \'*.media_id\'); $old = $this ->select(\'id\', \'media_id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->get() ->pluck(\'media_id\') ->toArray(); $delete_media_id = array_diff($old, $input_media_id); $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } if (empty($item[\'id\'])) { $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } else { $data = array_intersect_key($item, array_flip($this->fillable)); $this->where(\'id\', $item[\'id\'])->update($data); } } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } $delete_id = $this->select(\'id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->whereIn(\'media_id\', $delete_media_id) ->whereIn(\'type\', [LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE, LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE]) ->get() ->pluck(\'id\', \'id\') ->toArray(); $this->whereIn(\'id\', $delete_id) ->delete(); $this->whereIn(\'ref_id\', $delete_id) ->where(\'type\', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) ->delete(); } }', 215, 0, 376, 1, 2, 2, 1, 1, NULL, 53, 53, '2018-10-07 07:31:03', '2018-10-07 07:31:03', NULL),
(25, 'xxx', 'xxx', 'https://player.vimeo.com/video/76979871', 'https://player.vimeo.com/video/286454495', 0, '<?php namespace App\\Models\\Backend\\Lesson\\LessonDetail; use App\\Models\\Backend\\Base; use App\\Models\\Backend\\Media; class LessonDetailAttachment extends Base { public $fillable = [ \'lesson_detail_id\', \'media_id\', \'type\', \'language\', \'ref_id\', ]; public function media() { return $this->hasOne(Media::class, \'id\', \'media_id\'); } public function createMany($input) { $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } } public function editMany($input, $lesson_detail_id) { $input_media_id = data_get($input, \'*.media_id\'); $old = $this ->select(\'id\', \'media_id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->get() ->pluck(\'media_id\') ->toArray(); $delete_media_id = array_diff($old, $input_media_id); $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } if (empty($item[\'id\'])) { $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } else { $data = array_intersect_key($item, array_flip($this->fillable)); $this->where(\'id\', $item[\'id\'])->update($data); } } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } $delete_id = $this->select(\'id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->whereIn(\'media_id\', $delete_media_id) ->whereIn(\'type\', [LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE, LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE]) ->get() ->pluck(\'id\', \'id\') ->toArray(); $this->whereIn(\'id\', $delete_id) ->delete(); $this->whereIn(\'ref_id\', $delete_id) ->where(\'type\', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) ->delete(); } }', 62, 220, 378, 1, 2, 2, 5, 1, NULL, 53, 53, '2018-10-07 07:31:28', '2018-10-07 07:31:28', NULL),
(26, 'iii', '', 'https://player.vimeo.com/video/76979871', '', 0, '<?php namespace App\\Models\\Backend\\Lesson\\LessonDetail; use App\\Models\\Backend\\Base; use App\\Models\\Backend\\Media; class LessonDetailAttachment extends Base { public $fillable = [ \'lesson_detail_id\', \'media_id\', \'type\', \'language\', \'ref_id\', ]; public function media() { return $this->hasOne(Media::class, \'id\', \'media_id\'); } public function createMany($input) { $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } } public function editMany($input, $lesson_detail_id) { $input_media_id = data_get($input, \'*.media_id\'); $old = $this ->select(\'id\', \'media_id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->get() ->pluck(\'media_id\') ->toArray(); $delete_media_id = array_diff($old, $input_media_id); $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } if (empty($item[\'id\'])) { $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } else { $data = array_intersect_key($item, array_flip($this->fillable)); $this->where(\'id\', $item[\'id\'])->update($data); } } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } $delete_id = $this->select(\'id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->whereIn(\'media_id\', $delete_media_id) ->whereIn(\'type\', [LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE, LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE]) ->get() ->pluck(\'id\', \'id\') ->toArray(); $this->whereIn(\'id\', $delete_id) ->delete(); $this->whereIn(\'ref_id\', $delete_id) ->where(\'type\', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) ->delete(); } } <?php namespace App\\Models\\Backend\\Lesson\\LessonDetail; use App\\Models\\Backend\\Base; use App\\Models\\Backend\\Media; class LessonDetailAttachment extends Base { public $fillable = [ \'lesson_detail_id\', \'media_id\', \'type\', \'language\', \'ref_id\', ]; public function media() { return $this->hasOne(Media::class, \'id\', \'media_id\'); } public function createMany($input) { $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } } public function editMany($input, $lesson_detail_id) { $input_media_id = data_get($input, \'*.media_id\'); $old = $this ->select(\'id\', \'media_id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->get() ->pluck(\'media_id\') ->toArray(); $delete_media_id = array_diff($old, $input_media_id); $source_code_content = []; $ref = []; foreach ($input as $item) { if ($item[\'type\'] == LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) { array_push($source_code_content, $item); continue; } if (empty($item[\'id\'])) { $target = $this->create($item); $ref[$item[\'media_id\']] = $target->id; } else { $data = array_intersect_key($item, array_flip($this->fillable)); $this->where(\'id\', $item[\'id\'])->update($data); } } foreach ($source_code_content as $item) { $item[\'ref_id\'] = $ref[$item[\'ref_media_id\']] ?? 0; $this->create($item); } $delete_id = $this->select(\'id\') ->where(\'lesson_detail_id\', $lesson_detail_id) ->whereIn(\'media_id\', $delete_media_id) ->whereIn(\'type\', [LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE, LESSON_DETAIL_ATTACHMENT_TYPE_RESOURCE]) ->get() ->pluck(\'id\', \'id\') ->toArray(); $this->whereIn(\'id\', $delete_id) ->delete(); $this->whereIn(\'ref_id\', $delete_id) ->where(\'type\', LESSON_DETAIL_ATTACHMENT_TYPE_SOURCE_CODE_CONTENT) ->delete(); } }', 62, 0, 381, 1, 2, 2, 2, 1, NULL, 53, 53, '2018-10-07 07:31:59', '2018-10-07 07:36:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_detail_attachments`
--

CREATE TABLE `lesson_detail_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_detail_id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ref_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `language` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lesson_detail_attachments`
--

INSERT INTO `lesson_detail_attachments` (`id`, `lesson_detail_id`, `media_id`, `type`, `mode`, `ref_id`, `language`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 23, 1, 0, 0, 'php', 53, 53, '2018-08-04 01:28:15', '2018-08-05 01:22:28', '2018-08-05 01:22:28'),
(2, 6, 25, 3, 0, 1, 'php', 53, 53, '2018-08-04 01:28:15', '2018-08-05 01:22:28', '2018-08-05 01:22:28'),
(3, 6, 26, 2, 0, 0, '', 53, 53, '2018-08-04 01:30:26', '2018-08-05 01:22:28', '2018-08-05 01:22:28'),
(4, 6, 28, 1, 0, 0, 'php', 53, 53, '2018-08-04 01:37:12', '2018-08-05 01:22:28', '2018-08-05 01:22:28'),
(5, 6, 29, 3, 0, 4, 'php', 53, 53, '2018-08-04 01:37:13', '2018-08-05 01:22:28', '2018-08-05 01:22:28'),
(6, 6, 30, 1, 0, 0, 'php', 53, 53, '2018-08-05 01:16:26', '2018-08-05 01:22:28', '2018-08-05 01:22:28'),
(7, 6, 31, 3, 0, 6, 'php', 53, 53, '2018-08-05 01:16:27', '2018-08-05 01:22:28', '2018-08-05 01:22:28'),
(8, 6, 32, 1, 0, 0, 'php', 53, 53, '2018-08-05 01:22:28', '2018-08-05 01:31:50', '2018-08-05 01:31:50'),
(9, 6, 33, 3, 0, 8, 'php', 53, 53, '2018-08-05 01:22:28', '2018-08-05 01:31:50', '2018-08-05 01:31:50'),
(10, 6, 35, 1, 0, 0, 'php', 53, 53, '2018-08-05 01:31:50', '2018-08-05 01:58:06', '2018-08-05 01:58:06'),
(11, 6, 36, 3, 0, 10, 'php', 53, 53, '2018-08-05 01:31:50', '2018-08-05 01:58:07', '2018-08-05 01:58:07'),
(12, 6, 38, 1, 0, 0, 'php', 53, 53, '2018-08-05 01:58:06', '2018-08-05 02:17:14', '2018-08-05 02:17:14'),
(13, 6, 39, 3, 0, 12, 'php', 53, 53, '2018-08-05 01:58:06', '2018-08-05 02:17:15', '2018-08-05 02:17:15'),
(14, 6, 44, 1, 0, 0, 'php', 53, 53, '2018-08-05 02:17:14', '2018-08-05 02:21:14', '2018-08-05 02:21:14'),
(15, 6, 45, 3, 0, 14, 'php', 53, 53, '2018-08-05 02:17:14', '2018-08-05 02:21:14', '2018-08-05 02:21:14'),
(16, 6, 46, 1, 0, 0, 'php', 53, 53, '2018-08-05 02:21:14', '2018-08-05 06:37:43', '2018-08-05 06:37:43'),
(17, 6, 48, 3, 0, 16, 'php', 53, 53, '2018-08-05 02:21:14', '2018-08-05 06:37:43', '2018-08-05 06:37:43'),
(18, 6, 56, 1, 0, 0, 'php', 53, 53, '2018-08-05 06:56:19', '2018-08-11 07:19:13', NULL),
(19, 6, 57, 3, 0, 18, 'php', 53, 53, '2018-08-05 06:56:19', '2018-08-05 06:56:19', NULL),
(20, 7, 73, 1, 0, 0, 'php', 53, 53, '2018-08-11 07:21:17', '2018-09-09 07:04:37', NULL),
(21, 7, 74, 2, 0, 0, '', 53, 53, '2018-08-11 07:21:17', '2018-09-09 07:04:37', NULL),
(22, 7, 75, 3, 0, 20, 'php', 53, 53, '2018-08-11 07:21:17', '2018-08-11 07:21:17', NULL),
(23, 1, 76, 2, 0, 0, '', 53, 53, '2018-08-11 07:34:53', '2018-08-13 09:30:22', '2018-08-13 09:30:22'),
(24, 8, 77, 1, 0, 0, 'php', 53, 53, '2018-08-12 00:15:11', '2018-10-07 07:28:24', '2018-10-07 07:28:24'),
(25, 8, 80, 2, 0, 0, '', 53, 53, '2018-08-12 00:15:11', '2018-10-07 07:28:29', NULL),
(26, 8, 81, 3, 0, 24, 'php', 53, 53, '2018-08-12 00:15:11', '2018-10-07 07:28:24', '2018-10-07 07:28:24'),
(27, 9, 84, 1, 0, 0, 'php', 53, 53, '2018-08-12 00:15:44', '2018-09-09 05:31:27', '2018-09-09 05:31:27'),
(28, 9, 85, 2, 0, 0, '', 53, 53, '2018-08-12 00:15:44', '2018-09-09 05:31:27', '2018-09-09 05:31:27'),
(29, 9, 86, 2, 0, 0, '', 53, 53, '2018-08-12 00:15:44', '2018-09-09 05:31:27', '2018-09-09 05:31:27'),
(30, 9, 87, 2, 0, 0, '', 53, 53, '2018-08-12 00:15:44', '2018-09-09 05:31:27', '2018-09-09 05:31:27'),
(31, 9, 88, 3, 0, 27, 'php', 53, 53, '2018-08-12 00:15:44', '2018-09-09 05:31:27', '2018-09-09 05:31:27'),
(32, 1, 95, 2, 0, 0, '', 53, 53, '2018-08-13 09:30:32', '2018-08-29 17:53:55', '2018-08-29 17:53:55'),
(33, 11, 207, 1, 0, 0, 'php', 53, 53, '2018-08-18 10:06:09', '2018-09-09 05:26:49', '2018-09-09 05:26:49'),
(34, 11, 208, 3, 0, 33, 'php', 53, 53, '2018-08-18 10:06:09', '2018-09-09 05:26:50', '2018-09-09 05:26:50'),
(35, 11, 209, 1, 0, 0, 'php', 53, 53, '2018-08-18 10:07:46', '2018-09-09 05:26:49', '2018-09-09 05:26:49'),
(36, 11, 210, 3, 0, 35, 'php', 53, 53, '2018-08-18 10:07:46', '2018-09-09 05:26:50', '2018-09-09 05:26:50'),
(37, 13, 247, 1, 0, 0, 'php', 53, 53, '2018-08-28 18:59:20', '2018-08-28 18:59:20', NULL),
(38, 13, 248, 2, 0, 0, '', 53, 53, '2018-08-28 18:59:20', '2018-08-28 18:59:20', NULL),
(39, 13, 249, 3, 0, 37, 'php', 53, 53, '2018-08-28 18:59:20', '2018-08-28 18:59:20', NULL),
(40, 1, 290, 2, 0, 0, '', 53, 53, '2018-09-07 19:40:20', '2018-10-07 07:27:35', NULL),
(41, 1, 291, 2, 0, 0, '', 53, 53, '2018-09-07 19:40:21', '2018-10-07 07:27:35', NULL),
(42, 1, 292, 2, 0, 0, '', 53, 53, '2018-09-07 19:40:21', '2018-10-07 07:27:35', NULL),
(43, 1, 293, 2, 0, 0, '', 53, 53, '2018-09-07 19:40:21', '2018-10-07 07:27:35', NULL),
(44, 1, 294, 2, 0, 0, '', 53, 53, '2018-09-07 19:40:21', '2018-10-07 07:27:35', NULL),
(45, 1, 295, 2, 0, 0, '', 53, 53, '2018-09-07 19:40:21', '2018-10-07 07:27:35', NULL),
(46, 5, 309, 1, 0, 0, 'php', 53, 53, '2018-09-09 06:20:58', '2018-09-09 06:20:58', NULL),
(47, 5, 306, 2, 0, 0, '', 53, 53, '2018-09-09 06:20:58', '2018-09-09 06:20:58', NULL),
(48, 5, 307, 2, 0, 0, '', 53, 53, '2018-09-09 06:20:58', '2018-09-09 06:20:58', NULL),
(49, 5, 308, 2, 0, 0, '', 53, 53, '2018-09-09 06:20:59', '2018-09-09 06:20:59', NULL),
(50, 5, 310, 3, 0, 46, 'php', 53, 53, '2018-09-09 06:20:59', '2018-09-09 06:20:59', NULL),
(51, 1, 311, 1, 0, 0, 'php', 53, 53, '2018-09-09 06:21:30', '2018-10-07 07:27:35', NULL),
(52, 1, 312, 3, 0, 51, 'php', 53, 53, '2018-09-09 06:21:31', '2018-09-09 06:21:31', NULL),
(53, 11, 313, 1, 0, 0, 'php', 53, 53, '2018-09-09 06:26:57', '2018-09-09 06:26:57', NULL),
(54, 11, 314, 2, 0, 0, '', 53, 53, '2018-09-09 06:26:57', '2018-09-09 06:26:57', NULL),
(55, 11, 315, 2, 0, 0, '', 53, 53, '2018-09-09 06:26:57', '2018-09-09 06:26:57', NULL),
(56, 11, 316, 2, 0, 0, '', 53, 53, '2018-09-09 06:26:58', '2018-09-09 06:26:58', NULL),
(57, 11, 317, 3, 0, 53, 'php', 53, 53, '2018-09-09 06:26:58', '2018-09-09 06:26:58', NULL),
(58, 10, 318, 1, 0, 0, 'php', 53, 53, '2018-09-09 06:33:42', '2018-10-04 17:06:27', NULL),
(59, 10, 319, 3, 0, 58, 'php', 53, 53, '2018-09-09 06:33:42', '2018-09-09 06:33:42', NULL),
(60, 14, 322, 1, 0, 0, 'php', 53, 53, '2018-09-09 06:34:55', '2018-09-09 06:34:55', NULL),
(61, 14, 323, 2, 0, 0, '', 53, 53, '2018-09-09 06:34:55', '2018-09-09 06:34:55', NULL),
(62, 14, 324, 2, 0, 0, '', 53, 53, '2018-09-09 06:34:55', '2018-09-09 06:34:55', NULL),
(63, 14, 325, 3, 0, 60, 'php', 53, 53, '2018-09-09 06:34:55', '2018-09-09 06:34:55', NULL),
(64, 2, 326, 1, 0, 0, 'php', 53, 53, '2018-09-09 06:35:23', '2018-09-09 06:35:23', NULL),
(65, 2, 327, 3, 0, 64, 'php', 53, 53, '2018-09-09 06:35:23', '2018-09-09 06:35:23', NULL),
(66, 4, 328, 1, 0, 0, 'php', 53, 53, '2018-09-09 07:00:44', '2018-09-09 07:00:44', NULL),
(67, 4, 329, 3, 0, 66, 'php', 53, 53, '2018-09-09 07:00:44', '2018-09-09 07:00:44', NULL),
(68, 15, 331, 1, 0, 0, 'php', 53, 53, '2018-09-09 07:06:14', '2018-09-09 07:06:14', NULL),
(69, 15, 332, 2, 0, 0, '', 53, 53, '2018-09-09 07:06:14', '2018-09-09 07:06:14', NULL),
(70, 15, 333, 2, 0, 0, '', 53, 53, '2018-09-09 07:06:14', '2018-09-09 07:06:14', NULL),
(71, 15, 334, 2, 0, 0, '', 53, 53, '2018-09-09 07:06:14', '2018-09-09 07:06:14', NULL),
(72, 15, 335, 3, 0, 68, 'php', 53, 53, '2018-09-09 07:06:14', '2018-09-09 07:06:14', NULL),
(73, 16, 342, 1, 0, 0, 'php', 53, 53, '2018-09-09 11:29:53', '2018-09-09 11:29:53', NULL),
(74, 16, 343, 2, 0, 0, '', 53, 53, '2018-09-09 11:29:53', '2018-09-09 11:29:53', NULL),
(75, 16, 344, 2, 0, 0, '', 53, 53, '2018-09-09 11:29:53', '2018-09-09 11:29:53', NULL),
(76, 16, 347, 3, 0, 73, 'php', 53, 53, '2018-09-09 11:29:54', '2018-09-09 11:29:54', NULL),
(77, 1, 373, 1, 0, 0, 'php', 53, 53, '2018-10-07 07:03:05', '2018-10-07 07:27:35', NULL),
(78, 1, 374, 3, 0, 77, 'php', 53, 53, '2018-10-07 07:03:05', '2018-10-07 07:03:05', NULL),
(79, 24, 375, 1, 0, 0, 'php', 53, 53, '2018-10-07 07:31:03', '2018-10-07 07:31:03', NULL),
(80, 24, 377, 3, 0, 79, 'php', 53, 53, '2018-10-07 07:31:03', '2018-10-07 07:31:03', NULL),
(81, 25, 379, 1, 0, 0, 'php', 53, 53, '2018-10-07 07:31:28', '2018-10-07 07:31:28', NULL),
(82, 25, 380, 3, 0, 81, 'php', 53, 53, '2018-10-07 07:31:28', '2018-10-07 07:31:28', NULL),
(83, 26, 382, 1, 0, 0, 'php', 53, 53, '2018-10-07 07:35:44', '2018-10-07 07:35:44', NULL),
(84, 26, 383, 3, 0, 83, 'php', 53, 53, '2018-10-07 07:35:44', '2018-10-07 07:35:44', NULL),
(85, 26, 382, 1, 0, 0, 'php', 53, 53, '2018-10-07 07:36:06', '2018-10-07 07:36:06', NULL),
(86, 26, 384, 3, 0, 85, 'php', 53, 53, '2018-10-07 07:36:06', '2018-10-07 07:36:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_suplements`
--

CREATE TABLE `lesson_suplements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL,
  `flush_date` datetime DEFAULT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `user_id`, `notification_id`, `flush_date`, `mode`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 99, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:57', '2018-08-10 21:27:27', NULL),
(2, 101, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:57', '2018-08-10 21:27:27', NULL),
(3, 102, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:57', '2018-08-10 21:27:27', NULL),
(4, 103, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:57', '2018-08-10 21:27:27', NULL),
(5, 104, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:57', '2018-08-10 21:27:27', NULL),
(6, 105, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(7, 106, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(8, 107, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(9, 108, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(10, 109, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(11, 110, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(12, 111, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(13, 112, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(14, 113, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(15, 114, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(16, 115, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(17, 116, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(18, 117, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(19, 118, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(20, 119, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(21, 120, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(22, 121, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(23, 122, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(24, 123, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:58', '2018-08-10 21:27:27', NULL),
(25, 124, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:59', '2018-08-10 21:27:27', NULL),
(26, 125, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:59', '2018-08-10 21:27:27', NULL),
(27, 126, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:59', '2018-08-10 21:27:27', NULL),
(28, 127, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:59', '2018-08-10 21:27:27', NULL),
(29, 128, 11, '2018-08-11 04:27:27', 1, 53, 53, '2018-08-10 21:26:59', '2018-08-10 21:27:27', NULL),
(30, 99, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:49', '2018-08-10 21:30:17', NULL),
(31, 101, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:49', '2018-08-10 21:30:17', NULL),
(32, 102, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:49', '2018-08-10 21:30:17', NULL),
(33, 103, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:49', '2018-08-10 21:30:17', NULL),
(34, 104, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:49', '2018-08-10 21:30:17', NULL),
(35, 105, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:49', '2018-08-10 21:30:17', NULL),
(36, 106, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(37, 107, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(38, 108, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(39, 109, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(40, 110, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(41, 111, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(42, 112, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(43, 113, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(44, 114, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(45, 115, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(46, 116, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(47, 117, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(48, 118, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(49, 119, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(50, 120, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(51, 121, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(52, 122, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(53, 123, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(54, 124, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(55, 125, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(56, 126, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:50', '2018-08-10 21:30:17', NULL),
(57, 127, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:51', '2018-08-10 21:30:17', NULL),
(58, 128, 12, '2018-08-11 04:30:17', 1, 53, 53, '2018-08-10 21:29:51', '2018-08-10 21:30:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `mime` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'video',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `path`, `original_name`, `size`, `mime`, `extension`, `location`, `hash_name`, `type`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '18/07/27/I3pGbhgZXZfZbP81ywJysQtwFwOAOBUHLhwnKycf.jpeg', 'img_1493393565594.jpg', 63699, 'application/octet-stream', 'jpeg', '18/07/27', 'I3pGbhgZXZfZbP81ywJysQtwFwOAOBUHLhwnKycf.jpeg', 'image', 51, 51, '2018-07-06 09:27:57', '2018-07-06 09:27:57', NULL),
(2, '18/07/27/LW0OrKn643ES8Kv3n3kSzUJl3Ulbj2lOOLr9s1dW.jpeg', 'LondonCitySightseeingBusPass.jpg', 108031, 'application/octet-stream', 'jpeg', '18/07/27', 'LW0OrKn643ES8Kv3n3kSzUJl3Ulbj2lOOLr9s1dW.jpeg', 'image', 51, 51, '2018-07-06 09:29:19', '2018-07-06 09:29:19', NULL),
(3, '18/07/27/Aqwu6Yvi8XThlQWDRgXGHJtVy40pMz2R9yZDqMZh.mp4', 'NƠI NÀY CÓ ANH  OFFICIAL MUSIC VIDEO  SƠN TÙNG M-TP.mp4', 32139026, 'application/octet-stream', 'mp4', '18/07/27', 'Aqwu6Yvi8XThlQWDRgXGHJtVy40pMz2R9yZDqMZh.mp4', 'video', 51, 51, '2018-07-06 09:34:23', '2018-07-06 09:34:23', NULL),
(4, '18/07/27/8eqW7XrcAlGr7stVC9DIQcGxIT1HjJ9HhlQNQrSR.jpeg', 'Romantic-Honeymoon-Ideas.jpg', 58341, 'application/octet-stream', 'jpeg', '18/07/27', '8eqW7XrcAlGr7stVC9DIQcGxIT1HjJ9HhlQNQrSR.jpeg', 'image', 51, 51, '2018-07-06 10:01:31', '2018-07-06 10:01:31', NULL),
(5, '18/07/27/RvFyUxbmU1xdQAw33492OrLw54wJF7MK1ElCV64t.pdf', 'python-projects-cassell-gauld-2014-12-03-6k2UNppxd0h9rmU9.pdf', 9661096, 'application/octet-stream', 'pdf', '18/07/27', 'RvFyUxbmU1xdQAw33492OrLw54wJF7MK1ElCV64t.pdf', 'document', 51, 51, '2018-07-06 20:08:34', '2018-07-06 20:08:34', NULL),
(6, '18/07/27/1rzp8k2fNu13gGGHJ5x3cBKJ33NCQcM8BFNAmvVD.zip', 'drive-download-20180623T100039Z-001.zip', 35549421, 'application/octet-stream', 'zip', '18/07/27', '1rzp8k2fNu13gGGHJ5x3cBKJ33NCQcM8BFNAmvVD.zip', 'document', 51, 51, '2018-07-06 20:09:05', '2018-07-06 20:09:05', NULL),
(7, '18/07/27/Shq0qGnRFQShaihlJHRWTX6YRqEEJl8oCcKXM8YW.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/07/27', 'Shq0qGnRFQShaihlJHRWTX6YRqEEJl8oCcKXM8YW.mp4', 'video', 51, 0, '2018-07-07 03:37:29', '2018-07-07 03:37:29', NULL),
(8, '18/07/27/I8NPlOxgX2atnDAYOwejutL0SrrXzGFEJmm1ciYQ.jpeg', 'paris-sightseeing.jpg', 38121, 'application/octet-stream', 'jpeg', '18/07/27', 'I8NPlOxgX2atnDAYOwejutL0SrrXzGFEJmm1ciYQ.jpeg', 'image', 51, 0, '2018-07-07 03:37:37', '2018-07-07 03:37:37', NULL),
(9, '18/07/29/oNfuZblJFgSIIiaDobt7nanVtj58WLCtK6U3KhQC.docx', 'account.docx', 6325, 'application/octet-stream', 'docx', '18/07/29', 'oNfuZblJFgSIIiaDobt7nanVtj58WLCtK6U3KhQC.docx', 'document', 51, 51, '2018-07-20 09:01:37', '2018-07-20 09:01:37', NULL),
(10, '18/07/29/2nUM7eGwSI4fgT7WrwH3TLKgpJdGjxxC8Nfn70ri.py', 'account.py', 7, 'text/plain', 'py', '18/07/29', '2nUM7eGwSI4fgT7WrwH3TLKgpJdGjxxC8Nfn70ri.py', 'video', 51, 51, '2018-07-20 09:01:58', '2018-07-20 09:01:58', NULL),
(11, '18/07/29/yoJUp4gplsTx0pGhKdxJmeyXpUMQY9WG56mX2rFA.docx', 'account.docx', 6325, 'application/octet-stream', 'docx', '18/07/29', 'yoJUp4gplsTx0pGhKdxJmeyXpUMQY9WG56mX2rFA.docx', 'document', 51, 51, '2018-07-20 09:03:44', '2018-07-20 09:03:44', NULL),
(12, '18/07/29/ZHnOP5lDKnja6grIydiiOfMP8sQkq6cF7JscnIX4.docx', 'account.docx', 7, 'text/plain', 'docx', '18/07/29', 'ZHnOP5lDKnja6grIydiiOfMP8sQkq6cF7JscnIX4.docx', 'video', 51, 51, '2018-07-20 09:03:50', '2018-07-20 09:03:50', NULL),
(13, '18/07/29/RGaQVB1Yf2GpO2qUxMHKLpty3hq4dwXAEfYIgI6H.docx', 'account.docx', 7, 'text/plain', 'docx', '18/07/29', 'RGaQVB1Yf2GpO2qUxMHKLpty3hq4dwXAEfYIgI6H.docx', 'video', 51, 51, '2018-07-20 09:03:50', '2018-07-20 09:03:50', NULL),
(14, '18/08/31/kMp57v3U7VILlR9q20see85Pf9XkVAia1zu5SDkO.bin', '2 (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', 'kMp57v3U7VILlR9q20see85Pf9XkVAia1zu5SDkO.bin', 'document', 53, 53, '2018-08-04 01:16:11', '2018-08-04 01:16:11', NULL),
(15, '18/08/31/1Ib54Ava9HiVApBBaF1qItysrGKTko3UsmmTy4PR.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/31', '1Ib54Ava9HiVApBBaF1qItysrGKTko3UsmmTy4PR.mp4', 'video', 53, 53, '2018-08-04 01:16:25', '2018-08-04 01:16:25', NULL),
(16, '18/08/31/IE1j8nPNCYKONnVVzcXom3vh43ghj5WV4tgHHPbp.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/31', 'IE1j8nPNCYKONnVVzcXom3vh43ghj5WV4tgHHPbp.mp4', 'video', 53, 53, '2018-08-04 01:18:32', '2018-08-04 01:18:32', NULL),
(17, '18/08/31/E65ZGFgdmBNkKCBbrJTA0urDOeKuzpFMpS1i1LG8.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/31', 'E65ZGFgdmBNkKCBbrJTA0urDOeKuzpFMpS1i1LG8.mp4', 'video', 53, 53, '2018-08-04 01:18:48', '2018-08-04 01:18:48', NULL),
(18, '18/08/31/PyNtlAn70Jr6V5xulGk6qAm9oFla47kOunzDLiU4.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/31', 'PyNtlAn70Jr6V5xulGk6qAm9oFla47kOunzDLiU4.mp4', 'video', 53, 53, '2018-08-04 01:19:15', '2018-08-04 01:19:15', NULL),
(19, '18/08/31/VQkprKOZLPQl1g3FvL2J8kFFFzJqM7vH1THtOjc7.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/31', 'VQkprKOZLPQl1g3FvL2J8kFFFzJqM7vH1THtOjc7.mp4', 'video', 53, 53, '2018-08-04 01:21:05', '2018-08-04 01:21:05', NULL),
(20, '18/08/31/umq4LrEgjqd4hBhnUtWP3EH9Zk6DG2J0IHa0maLB.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/31', 'umq4LrEgjqd4hBhnUtWP3EH9Zk6DG2J0IHa0maLB.mp4', 'video', 53, 53, '2018-08-04 01:21:24', '2018-08-04 01:21:24', NULL),
(21, '18/08/31/lDUTEGCG2lw3DuWU2dVWui0oEWhDHojH4ydX2swc.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/31', 'lDUTEGCG2lw3DuWU2dVWui0oEWhDHojH4ydX2swc.mp4', 'video', 53, 53, '2018-08-04 01:22:04', '2018-08-04 01:22:04', NULL),
(22, '18/08/31/SRpKgVtfCyMufm9YKgvcOrp0AjjLuHGc3TcvsB1p.png', 'poster-[2]スタートボタンのデザイン.mp4.png', 289239, 'application/octet-stream', 'png', '18/08/31', 'SRpKgVtfCyMufm9YKgvcOrp0AjjLuHGc3TcvsB1p.png', 'image', 53, 53, '2018-08-04 01:24:22', '2018-08-04 01:24:22', NULL),
(23, '18/08/31/XKCW4aGpdNTxcAxmCIuwQPRW97rRrhuAhBgesTIv.bin', '2 (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', 'XKCW4aGpdNTxcAxmCIuwQPRW97rRrhuAhBgesTIv.bin', 'document', 53, 53, '2018-08-04 01:26:31', '2018-08-04 01:26:31', NULL),
(24, '18/08/31/k1I5nVUTOrWLqyyZIuifCMORyLd1TqIEiEXl5ITH.docx', '2 (1).docx', 17, 'text/plain', 'docx', '18/08/31', 'k1I5nVUTOrWLqyyZIuifCMORyLd1TqIEiEXl5ITH.docx', 'video', 53, 53, '2018-08-04 01:26:48', '2018-08-04 01:26:48', NULL),
(25, '18/08/31/yPM8irFaparDNNICx4ALBygnwGtBHGMLPhYeChdO.docx', '2 (1).docx', 17, 'text/plain', 'docx', '18/08/31', 'yPM8irFaparDNNICx4ALBygnwGtBHGMLPhYeChdO.docx', 'video', 53, 53, '2018-08-04 01:28:15', '2018-08-05 01:16:26', NULL),
(26, '18/08/31/bct7BLKeFXdhsclDaUWdXYfIb4lCcsKnmSo8Rl0G.pdf', 'python-projects-cassell-gauld-2014-12-03-6k2UNppxd0h9rmU9.pdf', 9661096, 'application/octet-stream', 'pdf', '18/08/31', 'bct7BLKeFXdhsclDaUWdXYfIb4lCcsKnmSo8Rl0G.pdf', 'document', 53, 53, '2018-08-04 01:29:19', '2018-08-04 01:29:19', NULL),
(27, '18/08/31/o9ZocdzHlVI3CHelrzJenaD5I6G8vy73QmZvb2dP.bin', '2 (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', 'o9ZocdzHlVI3CHelrzJenaD5I6G8vy73QmZvb2dP.bin', 'document', 53, 53, '2018-08-04 01:34:35', '2018-08-04 01:34:35', NULL),
(28, '18/08/31/YyujdtM0nxYAby9vVZuS1Q9nyrA29k2X7rezV9Hm.docx', '2 (1) (2).docx', 301114, 'application/octet-stream', 'docx', '18/08/31', 'YyujdtM0nxYAby9vVZuS1Q9nyrA29k2X7rezV9Hm.docx', 'document', 53, 53, '2018-08-04 01:36:29', '2018-08-04 01:36:29', NULL),
(29, '18/08/31/xPkhriQmY1DXhsPhZevN0mRIZJzpawHPCbao1mxb.docx', '2 (1) (2).docx', 521, 'text/x-c++', 'docx', '18/08/31', 'xPkhriQmY1DXhsPhZevN0mRIZJzpawHPCbao1mxb.docx', 'video', 53, 53, '2018-08-04 01:37:12', '2018-08-05 01:16:26', NULL),
(30, '18/08/31/lq9JREa0uT455OBSQkNkF6AjBvYFipln5tyTX4Wr.docx', 'stem-cell.docx', 13647, 'application/octet-stream', 'docx', '18/08/31', 'lq9JREa0uT455OBSQkNkF6AjBvYFipln5tyTX4Wr.docx', 'document', 53, 53, '2018-08-05 01:16:23', '2018-08-05 01:16:23', NULL),
(31, '18/08/31/7YwTmM7QmapGZtJOOFDAcAYMuUWxV2Ao5wi8E4dx.docx', 'stem-cell.docx', 466, 'text/plain', 'docx', '18/08/31', '7YwTmM7QmapGZtJOOFDAcAYMuUWxV2Ao5wi8E4dx.docx', 'video', 53, 53, '2018-08-05 01:16:26', '2018-08-05 01:16:26', NULL),
(32, '18/08/31/8T0xrjM8R95PearRjc0MP07RYkGxQbr7qsV55k3x.docx', 'stem-cell.docx', 13647, 'application/octet-stream', 'docx', '18/08/31', '8T0xrjM8R95PearRjc0MP07RYkGxQbr7qsV55k3x.docx', 'document', 53, 53, '2018-08-05 01:22:25', '2018-08-05 01:22:25', NULL),
(33, '18/08/31/CwJf9cMiw9kIW8ZYX0OaT0mJlPYOQ4vIOAWtAfob.docx', 'stem-cell.docx', 466, 'text/plain', 'docx', '18/08/31', 'CwJf9cMiw9kIW8ZYX0OaT0mJlPYOQ4vIOAWtAfob.docx', 'video', 53, 53, '2018-08-05 01:22:28', '2018-08-05 01:22:28', NULL),
(34, '18/08/31/LZdV5YJgAmDRCK6NDglVub3RP0nQq2nSvaGj2Fik.docx', 'stem-cell.docx', 13647, 'application/octet-stream', 'docx', '18/08/31', 'LZdV5YJgAmDRCK6NDglVub3RP0nQq2nSvaGj2Fik.docx', 'document', 53, 53, '2018-08-05 01:23:13', '2018-08-05 01:23:13', NULL),
(35, '18/08/31/dUpKpdQvVu1qNFCLOA8r3oq4BP3JKSV9jbmG5Hh9.bin', '2 (1) (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', 'dUpKpdQvVu1qNFCLOA8r3oq4BP3JKSV9jbmG5Hh9.bin', 'document', 53, 53, '2018-08-05 01:31:46', '2018-08-05 01:31:46', NULL),
(36, '18/08/31/yRgjr1gNGGpk5r8INdJg1Ze61mxJlFAQ8i32C7ie.docx', '2 (1) (1).docx', 0, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', '18/08/31', 'yRgjr1gNGGpk5r8INdJg1Ze61mxJlFAQ8i32C7ie.docx', 'video', 53, 53, '2018-08-05 01:31:50', '2018-08-05 01:31:50', NULL),
(37, '18/08/31/2Zd1kfXJhYfYpruS5CfrF49ufRF5shTM85Yj6AsX.bin', '2 (1) (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', '2Zd1kfXJhYfYpruS5CfrF49ufRF5shTM85Yj6AsX.bin', 'document', 53, 53, '2018-08-05 01:32:13', '2018-08-05 01:32:13', NULL),
(38, '18/08/31/uxFpOaubYc5vBnXM5HRJ47wjftAix2UECOI3Xdwz.docx', 'demo.docx', 301114, 'application/octet-stream', 'docx', '18/08/31', 'uxFpOaubYc5vBnXM5HRJ47wjftAix2UECOI3Xdwz.docx', 'document', 53, 53, '2018-08-05 01:32:25', '2018-08-05 01:32:25', NULL),
(39, '18/08/31/6iJAVoeeDY0PKClcievzOEw3pTH9J2cRcIJuOhdI.docx', 'demo.docx', 521, 'text/x-c++', 'docx', '18/08/31', '6iJAVoeeDY0PKClcievzOEw3pTH9J2cRcIJuOhdI.docx', 'video', 53, 53, '2018-08-05 01:58:06', '2018-08-05 01:58:06', NULL),
(40, '18/08/31/Xjhmr9CwUgMn4Ppv663gt4UHFezRi6MlR7G5508T.docx', 'index.docx', 6223, 'application/octet-stream', 'docx', '18/08/31', 'Xjhmr9CwUgMn4Ppv663gt4UHFezRi6MlR7G5508T.docx', 'document', 53, 53, '2018-08-05 01:58:33', '2018-08-05 01:58:33', NULL),
(41, '18/08/31/lI3nJyeHvJ3aIWf25Oxt9xSGzPlgqCZBtCJI5a1v.docx', 'pandog2017.docx', 18708, 'application/octet-stream', 'docx', '18/08/31', 'lI3nJyeHvJ3aIWf25Oxt9xSGzPlgqCZBtCJI5a1v.docx', 'document', 53, 53, '2018-08-05 02:12:44', '2018-08-05 02:12:44', NULL),
(42, '18/08/31/oibJ2F8dgQznVKDrNbqAN1fM2oykecIKvmpovt4Y.docx', 'stem-cell.docx', 13647, 'application/octet-stream', 'docx', '18/08/31', 'oibJ2F8dgQznVKDrNbqAN1fM2oykecIKvmpovt4Y.docx', 'document', 53, 53, '2018-08-05 02:13:00', '2018-08-05 02:13:00', NULL),
(43, '18/08/31/qgQpYImBfG0czQpaPWezOAU1v4wNJMdaIyvkfcvX.docx', 'stem-cell (1).docx', 6809, 'application/octet-stream', 'docx', '18/08/31', 'qgQpYImBfG0czQpaPWezOAU1v4wNJMdaIyvkfcvX.docx', 'document', 53, 53, '2018-08-05 02:14:52', '2018-08-05 02:14:52', NULL),
(44, '18/08/31/0QtdlDbLEZimPbnQL7LenUFUY23OPGMJwu3bOCpF.bin', '2 (1) (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', '0QtdlDbLEZimPbnQL7LenUFUY23OPGMJwu3bOCpF.bin', 'document', 53, 53, '2018-08-05 02:16:25', '2018-08-05 02:16:25', NULL),
(45, '18/08/31/pCTt6UEQFgoB6X3MBKkSEzFp8TU30e0VctoCCNM4.docx', '2 (1) (1).docx', 8403, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', '18/08/31', 'pCTt6UEQFgoB6X3MBKkSEzFp8TU30e0VctoCCNM4.docx', 'video', 53, 53, '2018-08-05 02:17:14', '2018-08-05 02:17:14', NULL),
(46, '18/08/31/MzzXDuqrM9Wd5OvVusPj2Kty2BpbWwHqQ9zxcmdy.bin', '2 (1) (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', 'MzzXDuqrM9Wd5OvVusPj2Kty2BpbWwHqQ9zxcmdy.bin', 'document', 53, 53, '2018-08-05 02:17:59', '2018-08-05 02:17:59', NULL),
(47, '18/08/31/IzuIo0VV6UFd3p7ufkWhuvJhzM069Sh1O1HwXHYr.docx', 'stem-cell.docx', 13647, 'application/octet-stream', 'docx', '18/08/31', 'IzuIo0VV6UFd3p7ufkWhuvJhzM069Sh1O1HwXHYr.docx', 'document', 53, 53, '2018-08-05 02:20:24', '2018-08-05 02:20:24', NULL),
(48, '18/08/31/N4Nnul8QItCpvEpqHJc8Szk88caQ2Llr5d9gp1Mj.docx', '2 (1) (1).docx', 8403, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', '18/08/31', 'N4Nnul8QItCpvEpqHJc8Szk88caQ2Llr5d9gp1Mj.docx', 'video', 53, 53, '2018-08-05 02:21:14', '2018-08-05 02:21:14', NULL),
(49, '18/08/31/a6ckFQTIACmpnMqYWDRmX4Qjtpz3OTA3J3zT2uxp.bin', '2 (1) (1).docx', 8403, 'application/octet-stream', 'bin', '18/08/31', 'a6ckFQTIACmpnMqYWDRmX4Qjtpz3OTA3J3zT2uxp.bin', 'document', 53, 53, '2018-08-05 02:21:42', '2018-08-05 02:21:42', NULL),
(50, '18/08/31/142cuoNIah29G3F0oJ4wsrdjBs9q5r92a0GpyDt0.bin', '3.docx', 8890, 'application/octet-stream', 'bin', '18/08/31', '142cuoNIah29G3F0oJ4wsrdjBs9q5r92a0GpyDt0.bin', 'document', 53, 53, '2018-08-05 06:09:33', '2018-08-05 06:09:33', NULL),
(51, '18/08/31/Hl1wJoR2p0Rv3uHyIzxPbJzodIbrSyYBSkObInZ5.docx', '2 (1).docx', 16046, 'application/octet-stream', 'docx', '18/08/31', 'Hl1wJoR2p0Rv3uHyIzxPbJzodIbrSyYBSkObInZ5.docx', 'document', 53, 53, '2018-08-05 06:10:27', '2018-08-05 06:10:27', NULL),
(52, '18/08/31/lI7Gk77Cd4H78HxDjbzNnjgBVf9Pc3xuUWZqJQOl.bin', '3.docx', 8890, 'application/octet-stream', 'bin', '18/08/31', 'lI7Gk77Cd4H78HxDjbzNnjgBVf9Pc3xuUWZqJQOl.bin', 'document', 53, 53, '2018-08-05 06:18:11', '2018-08-05 06:18:11', NULL),
(53, '18/08/31/sMJUlCGHmsvcAaCDghVjNHZ97BPgSJnFG5NKsgPe.bin', '3.docx', 8890, 'application/octet-stream', 'bin', '18/08/31', 'sMJUlCGHmsvcAaCDghVjNHZ97BPgSJnFG5NKsgPe.bin', 'document', 53, 53, '2018-08-05 06:35:04', '2018-08-05 06:35:04', NULL),
(54, '18/08/31/ECRW2G99Kb5ovkrOgGdwRJo2PFbasL7mG977VXhg.bin', '3.docx', 8890, 'application/octet-stream', 'bin', '18/08/31', 'ECRW2G99Kb5ovkrOgGdwRJo2PFbasL7mG977VXhg.bin', 'document', 53, 53, '2018-08-05 06:35:52', '2018-08-05 06:35:52', NULL),
(55, '18/08/31/3.docx.', '3.docx', 8890, 'application/octet-stream', '0', '18/08/31', 'xo9rPFrOgoSMOQstKvR3Dsaue6P0IrCRldA5lP7q.bin', 'document', 53, 53, '2018-08-05 06:45:51', '2018-08-05 06:45:51', NULL),
(56, '18/08/31/MXCR7cv7vlKiscrR3zeoE4NvrgPfSIhQDE91xtFr.docx', '3.docx', 8890, 'application/octet-stream', 'docx', '18/08/31', 'MXCR7cv7vlKiscrR3zeoE4NvrgPfSIhQDE91xtFr.docx', 'document', 53, 53, '2018-08-05 06:56:07', '2018-08-05 06:56:07', NULL),
(57, '18/08/31/HO2xMulcLBwvae4rc37c82nPNRChl11mP9jDEIe6.docx', '3.docx', 922, 'text/x-c++', 'docx', '18/08/31', 'HO2xMulcLBwvae4rc37c82nPNRChl11mP9jDEIe6.docx', 'video', 53, 53, '2018-08-05 06:56:19', '2018-08-11 07:19:13', NULL),
(58, '18/08/32/YCBx9DfyFIxSVdIT3h3qybCuBpcac1EpnAY0ht7W.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'YCBx9DfyFIxSVdIT3h3qybCuBpcac1EpnAY0ht7W.mp4', 'video', 53, 53, '2018-08-07 06:10:15', '2018-08-07 06:10:15', NULL),
(59, '18/08/32/n48Z61MV63GTYvn3puSGWSwCfOfbFpjW1lqqOiPL.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'n48Z61MV63GTYvn3puSGWSwCfOfbFpjW1lqqOiPL.mp4', 'video', 53, 53, '2018-08-07 06:12:58', '2018-08-07 06:12:58', NULL),
(60, '18/08/32/oprbwFkR1769V46bY6GpoWUxQm5TGnCLFPXyM3Jm.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'oprbwFkR1769V46bY6GpoWUxQm5TGnCLFPXyM3Jm.mp4', 'video', 53, 53, '2018-08-07 06:15:55', '2018-08-07 06:15:55', NULL),
(61, '18/08/32/7vJMptIJcF0SWoksWWcJXUsQDpHk7DeR96Ehvzgn.png', 'poster-Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4.png', 14487, 'image/png', 'png', '18/08/32', '7vJMptIJcF0SWoksWWcJXUsQDpHk7DeR96Ehvzgn.png', 'image', 53, 53, '2018-08-07 06:15:55', '2018-08-07 06:15:55', NULL),
(62, '18/08/32/jXZrPR6jXpVrvnWVLH7dshZHi8W00pTaR5j5v7Dy.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'jXZrPR6jXpVrvnWVLH7dshZHi8W00pTaR5j5v7Dy.mp4', 'video', 53, 53, '2018-08-07 06:16:35', '2018-08-07 06:16:35', NULL),
(63, '18/08/32/YiwtuNHkJIWh3O3ebgNho6cKOImHVAvjIncSYK8W.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'YiwtuNHkJIWh3O3ebgNho6cKOImHVAvjIncSYK8W.mp4', 'video', 53, 53, '2018-08-07 06:22:50', '2018-08-07 06:22:50', NULL),
(64, '18/08/32/2PwRrS7uJcoE5qc6lp7MUEma3B0yzzXQvW1MGHPS.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', '2PwRrS7uJcoE5qc6lp7MUEma3B0yzzXQvW1MGHPS.mp4', 'video', 53, 53, '2018-08-07 06:32:40', '2018-08-07 06:32:40', NULL),
(65, '18/08/32/bXcMdbhvxf208cByMxBxPOENZeg5VPrqRVaYL76M.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'bXcMdbhvxf208cByMxBxPOENZeg5VPrqRVaYL76M.mp4', 'video', 53, 53, '2018-08-07 06:43:11', '2018-08-07 06:43:11', NULL),
(66, '18/08/32/EIbFgXFaixckSmIuI75Up3Efxvhj7e6xawmWLZn6.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'EIbFgXFaixckSmIuI75Up3Efxvhj7e6xawmWLZn6.mp4', 'video', 53, 53, '2018-08-07 06:45:23', '2018-08-07 06:45:23', NULL),
(67, '18/08/32/ZQQV248Chn2ZoNG2FciYNGEZj7fAE6anW02ZS06m.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'ZQQV248Chn2ZoNG2FciYNGEZj7fAE6anW02ZS06m.mp4', 'video', 53, 53, '2018-08-07 06:46:00', '2018-08-07 06:46:00', NULL),
(68, '18/08/32/oTjBTI9jnyq3Ma9mSiNGzHfZaXaMW7yB2Zw8v50f.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'oTjBTI9jnyq3Ma9mSiNGzHfZaXaMW7yB2Zw8v50f.mp4', 'video', 53, 53, '2018-08-07 06:46:32', '2018-08-07 06:46:32', NULL),
(69, '18/08/32/dK4GdQxXmHi7kqaxdYTTNhi18wn42NeVpK9eP1Hq.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'dK4GdQxXmHi7kqaxdYTTNhi18wn42NeVpK9eP1Hq.mp4', 'video', 53, 53, '2018-08-07 06:50:54', '2018-08-07 06:50:54', NULL),
(70, '18/08/32/bIreul5IqSMnFLezUrTC8D25onH8jGPh4S6bgMYy.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'bIreul5IqSMnFLezUrTC8D25onH8jGPh4S6bgMYy.mp4', 'video', 53, 53, '2018-08-07 06:52:39', '2018-08-07 06:52:39', NULL),
(71, '18/08/32/QQ4iXXeAZndoT5BnL2qjHQcUzVo7sm2ddj9ZBsLL.mp4', 'Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4', 18594889, 'application/octet-stream', 'mp4', '18/08/32', 'QQ4iXXeAZndoT5BnL2qjHQcUzVo7sm2ddj9ZBsLL.mp4', 'video', 53, 53, '2018-08-11 07:19:53', '2018-08-11 07:19:53', NULL),
(72, '18/08/32/B6Ueg0XkVwm45qIkpIoXKdsOCFRyLdm08yn7UFKW.png', 'poster-Ngo Thanh Van - Giot Nuoc Mat Mau Den.mp4.png', 116428, 'image/png', 'png', '18/08/32', 'B6Ueg0XkVwm45qIkpIoXKdsOCFRyLdm08yn7UFKW.png', 'image', 53, 53, '2018-08-11 07:19:53', '2018-08-11 07:19:53', NULL),
(73, '18/08/32/kmwMwZXKBa7tWOS7locqKebJSKXkj5zjStAdfGC0.docx', '3.docx', 8890, 'application/octet-stream', 'docx', '18/08/32', 'kmwMwZXKBa7tWOS7locqKebJSKXkj5zjStAdfGC0.docx', 'document', 53, 53, '2018-08-11 07:20:58', '2018-08-11 07:20:58', NULL),
(74, '18/08/32/vBwKKRMUg81WUAi65MOvU8ejLR5q9YzzUgOBPeoK.zip', '20180811083200.zip', 1384852, 'application/octet-stream', 'zip', '18/08/32', 'vBwKKRMUg81WUAi65MOvU8ejLR5q9YzzUgOBPeoK.zip', 'document', 53, 53, '2018-08-11 07:21:07', '2018-08-11 07:21:07', NULL),
(75, '18/08/32/Z2XIOl08VZuFEPz1bYiVWlEpqt59W3KhBpFDuNi8.', 'yyのソース(1)', 922, 'text/x-c++', '', '18/08/32', 'Z2XIOl08VZuFEPz1bYiVWlEpqt59W3KhBpFDuNi8.', 'video', 53, 53, '2018-08-11 07:21:17', '2018-09-09 07:04:37', NULL),
(76, '18/08/32/AwJQVJoEQ9KodEoWK7IxiY731BHVn36neV239WZG.png', 'Screenshot from 2018-08-11 21-27-37.png', 160705, 'application/octet-stream', 'png', '18/08/32', 'AwJQVJoEQ9KodEoWK7IxiY731BHVn36neV239WZG.png', 'document', 53, 53, '2018-08-11 07:34:52', '2018-08-11 07:34:52', NULL),
(77, '18/08/32/9oicGd85OqMEsTm4vaTSNsYSDU2hOhqfFRByYE7W.docx', '3.docx', 8890, 'application/octet-stream', 'docx', '18/08/32', '9oicGd85OqMEsTm4vaTSNsYSDU2hOhqfFRByYE7W.docx', 'document', 53, 53, '2018-08-12 00:14:43', '2018-08-12 00:14:43', NULL),
(78, '18/08/32/nDyO690GPWAdFcVURj0Kjo8VuJVrwRdkaTAMEoxy.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/32', 'nDyO690GPWAdFcVURj0Kjo8VuJVrwRdkaTAMEoxy.mp4', 'video', 53, 53, '2018-08-12 00:14:43', '2018-08-12 00:14:43', NULL),
(79, '18/08/32/pAokxF1G0dt7IACf3qHjyBMEXICu6NNMz7uGvLyb.png', 'poster-iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4.png', 597678, 'image/png', 'png', '18/08/32', 'pAokxF1G0dt7IACf3qHjyBMEXICu6NNMz7uGvLyb.png', 'image', 53, 53, '2018-08-12 00:14:44', '2018-08-12 00:14:44', NULL),
(80, '18/08/32/ib1RdO3uvDJKumCvdQYu9bzYnUPoCLu13h4BLFLx.zip', '20180811022217.zip', 1384852, 'application/octet-stream', 'zip', '18/08/32', 'ib1RdO3uvDJKumCvdQYu9bzYnUPoCLu13h4BLFLx.zip', 'document', 53, 53, '2018-08-12 00:14:50', '2018-08-12 00:14:50', NULL),
(81, '18/08/32/q7Eg8ut8yivoWi9uydhG7dFqMFHqF77kuT7qoE64.', 'free1のソース(1)', 922, 'text/x-c++', '', '18/08/32', 'q7Eg8ut8yivoWi9uydhG7dFqMFHqF77kuT7qoE64.', 'video', 53, 53, '2018-08-12 00:15:10', '2018-09-22 18:21:43', NULL),
(82, '18/08/32/j77t9w5btGfVSphUTtVc3UpYNsN3QWRBlRz4HikA.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/32', 'j77t9w5btGfVSphUTtVc3UpYNsN3QWRBlRz4HikA.mp4', 'video', 53, 53, '2018-08-12 00:15:29', '2018-08-12 00:15:29', NULL),
(83, '18/08/32/2342dPsWnPNGMunUPICenPrE92NNGLKMgcrbpKPw.png', 'poster-iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4.png', 721608, 'image/png', 'png', '18/08/32', '2342dPsWnPNGMunUPICenPrE92NNGLKMgcrbpKPw.png', 'image', 53, 53, '2018-08-12 00:15:30', '2018-08-12 00:15:30', NULL),
(84, '18/08/32/jPhj6prkXyo1NFYQOqDCav0jyTiBFSX9jbLePqRl.docx', '3.docx', 8890, 'application/octet-stream', 'docx', '18/08/32', 'jPhj6prkXyo1NFYQOqDCav0jyTiBFSX9jbLePqRl.docx', 'document', 53, 53, '2018-08-12 00:15:30', '2018-08-12 00:15:30', NULL),
(85, '18/08/32/cdlktC2n0Qg3sradmBeZn0qUlU922uGZ1m90S7HL.zip', '20180811022217.zip', 1384852, 'application/octet-stream', 'zip', '18/08/32', 'cdlktC2n0Qg3sradmBeZn0qUlU922uGZ1m90S7HL.zip', 'document', 53, 53, '2018-08-12 00:15:35', '2018-08-12 00:15:35', NULL),
(86, '18/08/32/F1oO96V2YYjciOzqr2PmnzRVy5PzspVXnZtK82fF.zip', '20180811022413.zip', 1384852, 'application/octet-stream', 'zip', '18/08/32', 'F1oO96V2YYjciOzqr2PmnzRVy5PzspVXnZtK82fF.zip', 'document', 53, 53, '2018-08-12 00:15:35', '2018-08-12 00:15:35', NULL),
(87, '18/08/32/OFBdC64ljRz47UZ2fQvNiZjqFrb39PpGfODHFUhF.zip', '20180811083200.zip', 1384852, 'application/octet-stream', 'zip', '18/08/32', 'OFBdC64ljRz47UZ2fQvNiZjqFrb39PpGfODHFUhF.zip', 'document', 53, 53, '2018-08-12 00:15:35', '2018-08-12 00:15:35', NULL),
(88, '18/08/32/q6QBXFdMJYYKOrLc48QSgB4JMcxKPlPXJIKtAq6L.', 'charge2のソース(1)', 922, 'text/x-c++', '', '18/08/32', 'q6QBXFdMJYYKOrLc48QSgB4JMcxKPlPXJIKtAq6L.', 'video', 53, 53, '2018-08-12 00:15:43', '2018-08-26 16:22:00', NULL),
(89, '18/08/32/8zlizeETGxYP9TyYSxygJ760dShbM7Z18ZO6i7fV.collecti', '#7.collectionviewのソース(1)', 462875, 'application/octet-stream', 'collecti', '18/08/32', '8zlizeETGxYP9TyYSxygJ760dShbM7Z18ZO6i7fV.collecti', 'document', 53, 53, '2018-08-12 07:19:54', '2018-08-12 07:19:54', NULL),
(90, '18/08/32/j4uE3RMoIga47af8OX708WmCjUtYcuGOvb3OpkLZ.docx', 'ステージ7(5) (1).docx', 12063, 'application/octet-stream', 'docx', '18/08/32', 'j4uE3RMoIga47af8OX708WmCjUtYcuGOvb3OpkLZ.docx', 'document', 53, 53, '2018-08-12 08:37:05', '2018-08-12 08:37:05', NULL),
(91, '18/08/32/RZulp0yU2fsx7tZGm4ZVU7hAmf2E48UtnYhvpSsY.docx', 'ステージ7(5) (21).docx', 9586, 'application/octet-stream', 'docx', '18/08/32', 'RZulp0yU2fsx7tZGm4ZVU7hAmf2E48UtnYhvpSsY.docx', 'document', 53, 53, '2018-08-12 10:04:09', '2018-08-12 10:04:09', NULL),
(92, '18/08/33/ixNQzh85qAcka6rnqwgS5SsUtKrCpY4ky7rllFZY.docx', 'Sample_11_ReadWord2007.docx', 63388, 'application/octet-stream', 'docx', '18/08/33', 'ixNQzh85qAcka6rnqwgS5SsUtKrCpY4ky7rllFZY.docx', 'document', 53, 53, '2018-08-13 08:01:02', '2018-08-13 08:01:02', NULL),
(93, '18/08/33/C73D7uLElhczvS5lTJwRUS4Y1miKDhW3MjnNdUsv.png', 'Screenshot from 2018-08-13 21-22-21.png', 81322, 'application/octet-stream', 'png', '18/08/33', 'C73D7uLElhczvS5lTJwRUS4Y1miKDhW3MjnNdUsv.png', 'image', 53, 53, '2018-08-13 09:28:27', '2018-08-13 09:28:27', NULL),
(94, '18/08/33/O0rYF4DmCTVXthqHERgD01C7rmbuKkeHx66jfNSk.png', 'Screenshot from 2018-08-13 21-22-21.png', 81322, 'application/octet-stream', 'png', '18/08/33', 'O0rYF4DmCTVXthqHERgD01C7rmbuKkeHx66jfNSk.png', 'image', 53, 53, '2018-08-13 09:29:31', '2018-08-13 09:29:31', NULL),
(95, '18/08/33/rjQpyCH87wUAfYn5sszGvzoNdhjGJjU6bBuR81gn.jpg', 'paris-sightseeing.jpg', 38121, 'application/octet-stream', 'jpg', '18/08/33', 'rjQpyCH87wUAfYn5sszGvzoNdhjGJjU6bBuR81gn.jpg', 'image', 53, 53, '2018-08-13 09:30:29', '2018-08-13 09:30:29', NULL),
(96, '18/08/33/d6eDT91Gk4Ztd6uBPS5rztDXBUcrs1R8QlYUqkIK.jpg', 'paris-sightseeing.jpg', 38121, 'application/octet-stream', 'jpg', '18/08/33', 'd6eDT91Gk4Ztd6uBPS5rztDXBUcrs1R8QlYUqkIK.jpg', 'image', 53, 53, '2018-08-13 09:48:36', '2018-08-13 09:48:36', NULL),
(97, '18/08/33/w1JibQjJ3Qt6gtbdZBBrFT5BGDK3RXdlz0ULoVcM.jpg', 'paris-sightseeing.jpg', 38121, 'application/octet-stream', 'jpg', '18/08/33', 'w1JibQjJ3Qt6gtbdZBBrFT5BGDK3RXdlz0ULoVcM.jpg', 'image', 53, 53, '2018-08-13 09:49:43', '2018-08-13 09:49:43', NULL),
(98, '18/08/33/3vCdURafDmrgPkC4INTEH5dfBccxnTdPwaVUajQG.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', '3vCdURafDmrgPkC4INTEH5dfBccxnTdPwaVUajQG.mp4', 'video', 53, 53, '2018-08-14 08:01:22', '2018-08-14 08:01:22', NULL),
(99, '18/08/33/qY0q0KMb1qwP7amIre99kN3GWN5hFSTNxbuoBYkX.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 708513, 'image/png', 'png', '18/08/33', 'qY0q0KMb1qwP7amIre99kN3GWN5hFSTNxbuoBYkX.png', 'image', 53, 53, '2018-08-14 08:01:37', '2018-08-14 08:01:37', NULL),
(100, '18/08/33/B6wW0sVcLTq9bO6jjgucdhIqgczb64wQHwBVP68P.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'B6wW0sVcLTq9bO6jjgucdhIqgczb64wQHwBVP68P.mp4', 'video', 53, 53, '2018-08-14 08:26:25', '2018-08-14 08:26:25', NULL),
(101, '18/08/33/xmQiolZJTV9sSrCRXiJUNOYni9MPOnoK3Pc0Arvi.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 435500, 'image/png', 'png', '18/08/33', 'xmQiolZJTV9sSrCRXiJUNOYni9MPOnoK3Pc0Arvi.png', 'image', 53, 53, '2018-08-14 08:26:25', '2018-08-14 08:26:25', NULL),
(102, '18/08/33/SQEQ5zd7BQchQabyJgi7K5OdVMxppWBat7HBVQv6.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'SQEQ5zd7BQchQabyJgi7K5OdVMxppWBat7HBVQv6.mp4', 'video', 53, 53, '2018-08-14 08:31:24', '2018-08-14 08:31:24', NULL),
(103, '18/08/33/89GcevtHnYrObqYGp9lrUZxxjyxpks1pHZPA9sB0.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 667583, 'image/png', 'png', '18/08/33', '89GcevtHnYrObqYGp9lrUZxxjyxpks1pHZPA9sB0.png', 'image', 53, 53, '2018-08-14 08:31:24', '2018-08-14 08:31:24', NULL),
(104, '18/08/33/5LR6sapK1WYVhO0nJMDNI6Fee0VjM1ydjxbZBfvp.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', '5LR6sapK1WYVhO0nJMDNI6Fee0VjM1ydjxbZBfvp.mp4', 'video', 53, 53, '2018-08-14 09:05:21', '2018-08-14 09:05:21', NULL),
(105, '18/08/33/K8buH2fGUJqfHlmeh55Nozc5oLOKF2KhPLdwDeHd.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', 'K8buH2fGUJqfHlmeh55Nozc5oLOKF2KhPLdwDeHd.mp4', 'video', 53, 53, '2018-08-14 09:06:02', '2018-08-14 09:06:02', NULL),
(106, '18/08/33/3idjEtg49zYtTgL9ZlKkhklRoI7OgvRaUcTc08gI.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', '3idjEtg49zYtTgL9ZlKkhklRoI7OgvRaUcTc08gI.mp4', 'video', 53, 53, '2018-08-14 09:08:47', '2018-08-14 09:08:47', NULL),
(107, '18/08/33/lP8zGwRcbl08YBjbYNEejrnXPCoMkREpAUd0hf7T.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', 'lP8zGwRcbl08YBjbYNEejrnXPCoMkREpAUd0hf7T.mp4', 'video', 53, 53, '2018-08-14 09:10:41', '2018-08-14 09:10:41', NULL),
(108, '18/08/33/2TMYhcNXhq0EtsZHP4yS5LYeFhCpO0Mm5HP88Hp8.png', 'poster-iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4.png', 725314, 'image/png', 'png', '18/08/33', '2TMYhcNXhq0EtsZHP4yS5LYeFhCpO0Mm5HP88Hp8.png', 'image', 53, 53, '2018-08-14 09:10:42', '2018-08-14 09:10:42', NULL),
(109, '18/08/33/WNIUfAUZybSwQYiZqxNZn1Sc1ujAz2iQE9amvtCr.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', 'WNIUfAUZybSwQYiZqxNZn1Sc1ujAz2iQE9amvtCr.mp4', 'video', 53, 53, '2018-08-14 09:11:30', '2018-08-14 09:11:30', NULL),
(110, '18/08/33/0uC0pmAYKhXzWhRmCa1YLs9m4LjTAgobyYtmpBBq.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', '0uC0pmAYKhXzWhRmCa1YLs9m4LjTAgobyYtmpBBq.mp4', 'video', 53, 53, '2018-08-14 09:12:10', '2018-08-14 09:12:10', NULL),
(111, '18/08/33/RkGqdUwCJ3JDXd8IbWcmkmzfkPrJ8kEMnExkQ2Ht.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'RkGqdUwCJ3JDXd8IbWcmkmzfkPrJ8kEMnExkQ2Ht.mp4', 'video', 53, 53, '2018-08-14 09:12:47', '2018-08-14 09:12:47', NULL),
(112, '18/08/33/1rP8JaFJEJw39brF6GelZtAKamk4WZLgTtCRI03r.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 726118, 'image/png', 'png', '18/08/33', '1rP8JaFJEJw39brF6GelZtAKamk4WZLgTtCRI03r.png', 'image', 53, 53, '2018-08-14 09:12:48', '2018-08-14 09:12:48', NULL),
(113, '18/08/33/CHydFy1ahZnKb2YBzpSHktJnmUHh9eCEjFfsyfRS.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'CHydFy1ahZnKb2YBzpSHktJnmUHh9eCEjFfsyfRS.mp4', 'video', 53, 53, '2018-08-14 09:14:52', '2018-08-14 09:14:52', NULL),
(114, '18/08/33/o9YtqFssQPvSrt223NGtiIPzYAkrFhssBQepra4X.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 721187, 'image/png', 'png', '18/08/33', 'o9YtqFssQPvSrt223NGtiIPzYAkrFhssBQepra4X.png', 'image', 53, 53, '2018-08-14 09:14:53', '2018-08-14 09:14:53', NULL),
(115, '18/08/33/qGvpBRryOSPZgFeB1PWIz3hEzxHpRq4bnbdxnYmH.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', 'qGvpBRryOSPZgFeB1PWIz3hEzxHpRq4bnbdxnYmH.mp4', 'video', 53, 53, '2018-08-14 09:15:10', '2018-08-14 09:15:10', NULL),
(116, '18/08/33/pd4qw48qb1b3rNVzDxJRfYNwEj9FNkykEIKqinbj.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'pd4qw48qb1b3rNVzDxJRfYNwEj9FNkykEIKqinbj.mp4', 'video', 53, 53, '2018-08-14 09:15:30', '2018-08-14 09:15:30', NULL),
(117, '18/08/33/fKHDZylcH6956cOIMPtQtY74aDAcTIok5LnNGhOs.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'fKHDZylcH6956cOIMPtQtY74aDAcTIok5LnNGhOs.mp4', 'video', 53, 53, '2018-08-14 09:15:43', '2018-08-14 09:15:43', NULL),
(118, '18/08/33/N4XU8fS9RR2qC3xFRkEGvFKa6hbkWWHijymmCj2l.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'N4XU8fS9RR2qC3xFRkEGvFKa6hbkWWHijymmCj2l.mp4', 'video', 53, 53, '2018-08-14 09:17:05', '2018-08-14 09:17:05', NULL),
(119, '18/08/33/PfwGXLQsHyMVIit5gId9eFmSXiyiQq0ycBJfFefY.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 477342, 'image/png', 'png', '18/08/33', 'PfwGXLQsHyMVIit5gId9eFmSXiyiQq0ycBJfFefY.png', 'image', 53, 53, '2018-08-14 09:17:06', '2018-08-14 09:17:06', NULL),
(120, '18/08/33/rIKyTZNq7zXJmduUN3CH7cor0dN844gi8ahN0QXR.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', 'rIKyTZNq7zXJmduUN3CH7cor0dN844gi8ahN0QXR.mp4', 'video', 53, 53, '2018-08-14 09:17:17', '2018-08-14 09:17:17', NULL),
(121, '18/08/33/Cxm6SCblAtX3UhTeSjtLMqP7vbfCPHEQ2I0IaUw2.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'Cxm6SCblAtX3UhTeSjtLMqP7vbfCPHEQ2I0IaUw2.mp4', 'video', 53, 53, '2018-08-14 09:19:17', '2018-08-14 09:19:17', NULL),
(122, '18/08/33/HRLyTQrN07TGA15VxWCBzKToEUDJxTtuTOEjVuOZ.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'HRLyTQrN07TGA15VxWCBzKToEUDJxTtuTOEjVuOZ.mp4', 'video', 53, 53, '2018-08-14 09:20:24', '2018-08-14 09:20:24', NULL),
(123, '18/08/33/4TtJLkuDVmlBmROsnkpeuapAfZN2laIFrcePAqCy.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', '4TtJLkuDVmlBmROsnkpeuapAfZN2laIFrcePAqCy.mp4', 'video', 53, 53, '2018-08-14 09:20:38', '2018-08-14 09:20:38', NULL),
(124, '18/08/33/VRODpnTUyF4A6yt6uYhJe5CSw3oruLvlRTqdq73Q.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'VRODpnTUyF4A6yt6uYhJe5CSw3oruLvlRTqdq73Q.mp4', 'video', 53, 53, '2018-08-14 09:21:57', '2018-08-14 09:21:57', NULL),
(125, '18/08/33/lhLoKvr67jJGBjVORWmp7jjfo3EuFYbiRL9xWJYl.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'lhLoKvr67jJGBjVORWmp7jjfo3EuFYbiRL9xWJYl.mp4', 'video', 53, 53, '2018-08-14 09:22:54', '2018-08-14 09:22:54', NULL),
(126, '18/08/33/84QNkweEGCOk6dgQJouMRV5GykcC7nAtdt0RaruP.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', '84QNkweEGCOk6dgQJouMRV5GykcC7nAtdt0RaruP.mp4', 'video', 53, 53, '2018-08-14 09:23:07', '2018-08-14 09:23:07', NULL),
(127, '18/08/33/pkpnznLMJhowTsb7xiGTjl2jXIIJj1zPPKCbn9r8.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'pkpnznLMJhowTsb7xiGTjl2jXIIJj1zPPKCbn9r8.mp4', 'video', 53, 53, '2018-08-14 09:23:25', '2018-08-14 09:23:25', NULL),
(128, '18/08/33/2HHsaZN4t8vyBYfHjoAjbh3DiQPPCWpRVwqOcOqp.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', '2HHsaZN4t8vyBYfHjoAjbh3DiQPPCWpRVwqOcOqp.mp4', 'video', 53, 53, '2018-08-14 09:24:04', '2018-08-14 09:24:04', NULL),
(129, '18/08/33/AcFwwozTM3Eh1u8yw1QbXFLMemam7KzD8FN3KUKV.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 699492, 'image/png', 'png', '18/08/33', 'AcFwwozTM3Eh1u8yw1QbXFLMemam7KzD8FN3KUKV.png', 'image', 53, 53, '2018-08-14 09:24:05', '2018-08-14 09:24:05', NULL),
(130, '18/08/33/KWFitWb2MddBrkdPWtP86UPMMNzj2hGVniCwklRY.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', 'KWFitWb2MddBrkdPWtP86UPMMNzj2hGVniCwklRY.mp4', 'video', 53, 53, '2018-08-14 09:24:26', '2018-08-14 09:24:26', NULL),
(131, '18/08/33/UlIPlgO1IDkHQnip8W4x93vNMeEhZdeUxfmmH8lZ.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'UlIPlgO1IDkHQnip8W4x93vNMeEhZdeUxfmmH8lZ.mp4', 'video', 53, 53, '2018-08-14 09:27:52', '2018-08-14 09:27:52', NULL),
(132, '18/08/33/w7mZbbaBcEMtxh4leMNHstSwqjJsQE5lh5xI6auz.mp4', '[2]作られたファイルの説明とシュミレータ起動.mp4', 163835755, 'application/octet-stream', 'mp4', '18/08/33', 'w7mZbbaBcEMtxh4leMNHstSwqjJsQE5lh5xI6auz.mp4', 'video', 53, 53, '2018-08-14 09:28:40', '2018-08-14 09:28:40', NULL),
(133, '18/08/33/tFC0qpVO6xsR9dPKvDDHtNVMCI2fJ3ZXn8UX6r8X.png', 'poster-[2]作られたファイルの説明とシュミレータ起動.mp4.png', 721601, 'image/png', 'png', '18/08/33', 'tFC0qpVO6xsR9dPKvDDHtNVMCI2fJ3ZXn8UX6r8X.png', 'image', 53, 53, '2018-08-14 09:28:41', '2018-08-14 09:28:41', NULL),
(134, '18/08/33/yO9li9Y37B4ff2Ba7Yhz6Hfn6bHp06EXFn9r14Et.mp4', 'iu3HF8CDfjxSIRQqFuzIgYXBwFYd0AYhugnn5b71.mp4', 161738603, 'application/octet-stream', 'mp4', '18/08/33', 'yO9li9Y37B4ff2Ba7Yhz6Hfn6bHp06EXFn9r14Et.mp4', 'video', 53, 53, '2018-08-14 09:29:04', '2018-08-14 09:29:04', NULL),
(135, '18/08/33/tubG9PAed3X79We9lSFvo76SyzMnUGfYMSyogFny.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'tubG9PAed3X79We9lSFvo76SyzMnUGfYMSyogFny.mp4', 'video', 53, 53, '2018-08-18 05:59:14', '2018-08-18 05:59:14', NULL),
(136, '18/08/33/gz9FlkLwRyiMskKxCnZTVIoBJfYvgs9plGjtvSAT.png', 'poster-bbbbbb.mp4.png', 368628, 'image/png', 'png', '18/08/33', 'gz9FlkLwRyiMskKxCnZTVIoBJfYvgs9plGjtvSAT.png', 'image', 53, 53, '2018-08-18 05:59:14', '2018-08-18 05:59:14', NULL),
(137, '18/08/33/fPSf6hMmVPYtgxtoXeKlBgrow0c9UwYblahqDFVm.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'fPSf6hMmVPYtgxtoXeKlBgrow0c9UwYblahqDFVm.mp4', 'video', 53, 53, '2018-08-18 06:07:55', '2018-08-18 06:07:55', NULL),
(138, '18/08/33/iLWqt5majHAquvlopSMUKrfJAidVFn1xqj5aXcbE.png', 'poster-bbbbbb.mp4.png', 512277, 'image/png', 'png', '18/08/33', 'iLWqt5majHAquvlopSMUKrfJAidVFn1xqj5aXcbE.png', 'image', 53, 53, '2018-08-18 06:07:56', '2018-08-18 06:07:56', NULL),
(139, '18/08/33/wLCXmSnADNVLrUAcrBwJEMXeR0pu6800WIO4NlAC.mp4', 'bbbbbb.mp4', 23431103, 'application/octet-stream', 'mp4', '18/08/33', 'wLCXmSnADNVLrUAcrBwJEMXeR0pu6800WIO4NlAC.mp4', 'video', 53, 53, '2018-08-18 06:08:51', '2018-08-18 06:08:51', NULL),
(140, '18/08/33/BHWaILGNTMnm8wssTVBxlwf5Y6GHor4KTqNYk6JK.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'BHWaILGNTMnm8wssTVBxlwf5Y6GHor4KTqNYk6JK.mp4', 'video', 53, 53, '2018-08-18 06:11:07', '2018-08-18 06:11:07', NULL),
(141, '18/08/33/xB2nmtkudTYc4wq1v8ClGuNNHir0R1OtISR8OlKs.png', 'poster-bbbbbb.mp4.png', 475913, 'image/png', 'png', '18/08/33', 'xB2nmtkudTYc4wq1v8ClGuNNHir0R1OtISR8OlKs.png', 'image', 53, 53, '2018-08-18 06:11:08', '2018-08-18 06:11:08', NULL),
(142, '18/08/33/O21rXXzxfjZEBBOj1SpHPRiQO6Diqf36l3Os3T0Z.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'O21rXXzxfjZEBBOj1SpHPRiQO6Diqf36l3Os3T0Z.mp4', 'video', 53, 53, '2018-08-18 06:11:56', '2018-08-18 06:11:56', NULL),
(143, '18/08/33/7IvQzzcB6kjiZTzv0OZhOKzKyH7g2tvRcAmf7Y30.png', 'poster-bbbbbb.mp4.png', 438842, 'image/png', 'png', '18/08/33', '7IvQzzcB6kjiZTzv0OZhOKzKyH7g2tvRcAmf7Y30.png', 'image', 53, 53, '2018-08-18 06:11:56', '2018-08-18 06:11:56', NULL),
(144, '18/08/33/k35cXecKk5a5EmYrllSnPABJ0mhIjsttq1KhP5Vq.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'k35cXecKk5a5EmYrllSnPABJ0mhIjsttq1KhP5Vq.mp4', 'video', 53, 53, '2018-08-18 06:15:40', '2018-08-18 06:15:40', NULL),
(145, '18/08/33/jX6pwFPCRs4QtOgKWtMjWlFviNQ7eqierXLV1ciI.png', 'poster-bbbbbb.mp4.png', 269871, 'image/png', 'png', '18/08/33', 'jX6pwFPCRs4QtOgKWtMjWlFviNQ7eqierXLV1ciI.png', 'image', 53, 53, '2018-08-18 06:15:40', '2018-08-18 06:15:40', NULL),
(146, '18/08/33/ZoaOiAB5nt9zwiIwokLFDRL4n1ZIg6BUUD6zadsG.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'ZoaOiAB5nt9zwiIwokLFDRL4n1ZIg6BUUD6zadsG.mp4', 'video', 53, 53, '2018-08-18 06:19:12', '2018-08-18 06:19:12', NULL),
(147, '18/08/33/dbjxOxNEOCZIKkkSg4BAywdwCeeWADeauePuKpIm.png', 'poster-bbbbbb.mp4.png', 479424, 'image/png', 'png', '18/08/33', 'dbjxOxNEOCZIKkkSg4BAywdwCeeWADeauePuKpIm.png', 'image', 53, 53, '2018-08-18 06:19:12', '2018-08-18 06:19:12', NULL),
(148, '18/08/33/SkmUGNOHoBMPvRXgDtv9WB28smyt3cQrpl7AV2pg.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'SkmUGNOHoBMPvRXgDtv9WB28smyt3cQrpl7AV2pg.mp4', 'video', 53, 53, '2018-08-18 06:19:38', '2018-08-18 06:19:38', NULL),
(149, '18/08/33/5e8lmWvHFrG04blGX7AkrAhgHP3pSvd69eG8J3zM.png', 'poster-bbbbbb.mp4.png', 560203, 'image/png', 'png', '18/08/33', '5e8lmWvHFrG04blGX7AkrAhgHP3pSvd69eG8J3zM.png', 'image', 53, 53, '2018-08-18 06:19:38', '2018-08-18 06:19:38', NULL),
(150, '18/08/33/r3c5sbL3KJrXmGVvOqVQcoqVPUSAewJt94a3O6P8.mp4', 'bbbbbb.mp4', 15042495, 'application/octet-stream', 'mp4', '18/08/33', 'r3c5sbL3KJrXmGVvOqVQcoqVPUSAewJt94a3O6P8.mp4', 'video', 53, 53, '2018-08-18 06:19:53', '2018-08-18 06:19:53', NULL),
(151, '18/08/33/wY21sXi49M4Acl0TzvUoKXx3PjjTL0Y7uRpvJ5NJ.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'wY21sXi49M4Acl0TzvUoKXx3PjjTL0Y7uRpvJ5NJ.mp4', 'video', 53, 53, '2018-08-18 06:20:33', '2018-08-18 06:20:33', NULL),
(152, '18/08/33/2zrxIv90VxZBB43zGY88MXu6ooGRDh6P0Y9FhNNJ.png', 'poster-bbbbbb.mp4.png', 502452, 'image/png', 'png', '18/08/33', '2zrxIv90VxZBB43zGY88MXu6ooGRDh6P0Y9FhNNJ.png', 'image', 53, 53, '2018-08-18 06:20:33', '2018-08-18 06:20:33', NULL),
(153, '18/08/33/b5uY1LtIG5LsXLx0TFhtWYyGIH3as2QiOCbQnQT4.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'b5uY1LtIG5LsXLx0TFhtWYyGIH3as2QiOCbQnQT4.mp4', 'video', 53, 53, '2018-08-18 06:26:00', '2018-08-18 06:26:00', NULL),
(154, '18/08/33/3ilOsZ8UkoDAzWL9ukGcxCYQ2MbfXjuv2PVSHrRw.png', 'poster-bbbbbb.mp4.png', 475208, 'image/png', 'png', '18/08/33', '3ilOsZ8UkoDAzWL9ukGcxCYQ2MbfXjuv2PVSHrRw.png', 'image', 53, 53, '2018-08-18 06:26:01', '2018-08-18 06:26:01', NULL),
(155, '18/08/33/HdwF2gORTTPohGHwXJYZpHOMjVZ9MPZ7VjQkS8b6.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'HdwF2gORTTPohGHwXJYZpHOMjVZ9MPZ7VjQkS8b6.mp4', 'video', 53, 53, '2018-08-18 06:26:36', '2018-08-18 06:26:36', NULL),
(156, '18/08/33/iexn0E7t1njq5H71AqgmmDQemO8mteY8pJT9NzsJ.png', 'poster-bbbbbb.mp4.png', 272009, 'image/png', 'png', '18/08/33', 'iexn0E7t1njq5H71AqgmmDQemO8mteY8pJT9NzsJ.png', 'image', 53, 53, '2018-08-18 06:26:37', '2018-08-18 06:26:37', NULL),
(157, '18/08/33/983QcujaGXnMCr4GRD5rNHoUghg9TOQ0oqeZ7dK5.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '983QcujaGXnMCr4GRD5rNHoUghg9TOQ0oqeZ7dK5.mp4', 'video', 53, 53, '2018-08-18 06:27:59', '2018-08-18 06:27:59', NULL),
(158, '18/08/33/8fXzjlTi3bpPwqGRBk3krlq8m1cBeQDjmZqR0k9M.png', 'poster-bbbbbb.mp4.png', 476876, 'image/png', 'png', '18/08/33', '8fXzjlTi3bpPwqGRBk3krlq8m1cBeQDjmZqR0k9M.png', 'image', 53, 53, '2018-08-18 06:28:00', '2018-08-18 06:28:00', NULL),
(159, '18/08/33/cxUKk1XUtqUdHY8yYsi4KlGVvaO3wmTqn445rK7n.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'cxUKk1XUtqUdHY8yYsi4KlGVvaO3wmTqn445rK7n.mp4', 'video', 53, 53, '2018-08-18 06:30:23', '2018-08-18 06:30:23', NULL),
(160, '18/08/33/ZHfH1frqe6K6Q2basKAoRGx7BVFSfecciJVAu5I8.png', 'poster-bbbbbb.mp4.png', 453624, 'image/png', 'png', '18/08/33', 'ZHfH1frqe6K6Q2basKAoRGx7BVFSfecciJVAu5I8.png', 'image', 53, 53, '2018-08-18 06:30:24', '2018-08-18 06:30:24', NULL),
(161, '18/08/33/3vcaMxYaFJoWy5rNcBXL4p7l5U36MhJkxec0a8UG.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '3vcaMxYaFJoWy5rNcBXL4p7l5U36MhJkxec0a8UG.mp4', 'video', 53, 53, '2018-08-18 06:33:29', '2018-08-18 06:33:29', NULL),
(162, '18/08/33/sydFOEnrFPOH7ML6xAv0s1QGFnYLWMaR7onqqIp1.mp4', 'bbbbbb.mp4', 111511487, 'application/octet-stream', 'mp4', '18/08/33', 'sydFOEnrFPOH7ML6xAv0s1QGFnYLWMaR7onqqIp1.mp4', 'video', 53, 53, '2018-08-18 06:33:56', '2018-08-18 06:33:56', NULL),
(163, '18/08/33/VP28IIu4qBr1MQsLZcdTKN5M2pYydssw8wObuni7.png', 'poster-bbbbbb.mp4.png', 454393, 'image/png', 'png', '18/08/33', 'VP28IIu4qBr1MQsLZcdTKN5M2pYydssw8wObuni7.png', 'image', 53, 53, '2018-08-18 06:33:56', '2018-08-18 06:33:56', NULL),
(164, '18/08/33/CIQ1E1BRAom5b5ZuKM1mYrY1WPLqGbiMInxx4x16.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'CIQ1E1BRAom5b5ZuKM1mYrY1WPLqGbiMInxx4x16.mp4', 'video', 53, 53, '2018-08-18 06:34:21', '2018-08-18 06:34:21', NULL),
(165, '18/08/33/AZbLFFUd1PXuyu0und3JrNYbffYa16HUEnPNfjkU.png', 'poster-bbbbbb.mp4.png', 211325, 'image/png', 'png', '18/08/33', 'AZbLFFUd1PXuyu0und3JrNYbffYa16HUEnPNfjkU.png', 'image', 53, 53, '2018-08-18 06:34:21', '2018-08-18 06:34:21', NULL),
(166, '18/08/33/5bZmFmyP9gICHyrMwpqAtkHVOIUyUsW1NypDZdWd.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '5bZmFmyP9gICHyrMwpqAtkHVOIUyUsW1NypDZdWd.mp4', 'video', 53, 53, '2018-08-18 06:36:00', '2018-08-18 06:36:00', NULL),
(167, '18/08/33/mfdH4hc23tUYjvvDqFwsEt6c79XyvmLcGtLnNwVg.mp4', 'bbbbbb.mp4', 111511487, 'application/octet-stream', 'mp4', '18/08/33', 'mfdH4hc23tUYjvvDqFwsEt6c79XyvmLcGtLnNwVg.mp4', 'video', 53, 53, '2018-08-18 06:38:21', '2018-08-18 06:38:21', NULL),
(168, '18/08/33/SnDOdMLGY5rY7rMG2abtZcMRNmExeLsHiIXf18vP.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'SnDOdMLGY5rY7rMG2abtZcMRNmExeLsHiIXf18vP.mp4', 'video', 53, 53, '2018-08-18 06:41:32', '2018-08-18 06:41:32', NULL),
(169, '18/08/33/rGZ2APNELbIoTmAqwBPYyy1WYzoFNl0pPbelEIRL.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'rGZ2APNELbIoTmAqwBPYyy1WYzoFNl0pPbelEIRL.mp4', 'video', 53, 53, '2018-08-18 06:43:18', '2018-08-18 06:43:18', NULL),
(170, '18/08/33/RbpZDLijMa6CkGDFsebVWJobYogRfiIXZS1JYvpI.png', 'poster-bbbbbb.mp4.png', 266557, 'image/png', 'png', '18/08/33', 'RbpZDLijMa6CkGDFsebVWJobYogRfiIXZS1JYvpI.png', 'image', 53, 53, '2018-08-18 06:43:18', '2018-08-18 06:43:18', NULL),
(171, '18/08/33/AYJWTzDQ6Azzjju9TAL2lF89LarjRzcY5cDIbd98.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'AYJWTzDQ6Azzjju9TAL2lF89LarjRzcY5cDIbd98.mp4', 'video', 53, 53, '2018-08-18 06:43:50', '2018-08-18 06:43:50', NULL),
(172, '18/08/33/Jb2aMuMM8z4Q4LoNDwLzJIZgSHgdQdrUis1yPLh6.png', 'poster-bbbbbb.mp4.png', 458718, 'image/png', 'png', '18/08/33', 'Jb2aMuMM8z4Q4LoNDwLzJIZgSHgdQdrUis1yPLh6.png', 'image', 53, 53, '2018-08-18 06:43:50', '2018-08-18 06:43:50', NULL),
(173, '18/08/33/KbdGindUfBa65gpvzhUziNtnTxET1bqyPVM4NzOv.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'KbdGindUfBa65gpvzhUziNtnTxET1bqyPVM4NzOv.mp4', 'video', 53, 53, '2018-08-18 07:01:09', '2018-08-18 07:01:09', NULL),
(174, '18/08/33/1xRLzMDHUr513LAhtwD5I2w3wkDK49G7HlHU8N8s.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '1xRLzMDHUr513LAhtwD5I2w3wkDK49G7HlHU8N8s.mp4', 'video', 53, 53, '2018-08-18 07:01:42', '2018-08-18 07:01:42', NULL),
(175, '18/08/33/GS3b7BSxZhhlrFqLNiDhoMmZ6dksoub9R73Do95l.png', 'poster-bbbbbb.mp4.png', 457672, 'image/png', 'png', '18/08/33', 'GS3b7BSxZhhlrFqLNiDhoMmZ6dksoub9R73Do95l.png', 'image', 53, 53, '2018-08-18 07:01:43', '2018-08-18 07:01:43', NULL),
(176, '18/08/33/6uLXrAwRbymYv6eLC77qo4jMHlGBYIH1XYEfKmiC.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '6uLXrAwRbymYv6eLC77qo4jMHlGBYIH1XYEfKmiC.mp4', 'video', 53, 53, '2018-08-18 07:02:25', '2018-08-18 07:02:25', NULL),
(177, '18/08/33/4PVYCnkKmeiJRYzLgNEFsdrBPiwpoJdU0cm9K40E.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '4PVYCnkKmeiJRYzLgNEFsdrBPiwpoJdU0cm9K40E.mp4', 'video', 53, 53, '2018-08-18 07:03:05', '2018-08-18 07:03:05', NULL),
(178, '18/08/33/cIFzOh921SH7G1PAjaNGjeQ7reBRnnFDhL7WtI2s.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'cIFzOh921SH7G1PAjaNGjeQ7reBRnnFDhL7WtI2s.mp4', 'video', 53, 53, '2018-08-18 07:04:54', '2018-08-18 07:04:54', NULL),
(179, '18/08/33/Hu2qsFE3ZLfVsfIWbu2oX845bobeuVVf6Dw8XOel.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'Hu2qsFE3ZLfVsfIWbu2oX845bobeuVVf6Dw8XOel.mp4', 'video', 53, 53, '2018-08-18 07:05:35', '2018-08-18 07:05:35', NULL),
(180, '18/08/33/YONHvpFMNTrsDM78Uc0fI9Gqp96xlp7adtlk5gzC.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'YONHvpFMNTrsDM78Uc0fI9Gqp96xlp7adtlk5gzC.mp4', 'video', 53, 53, '2018-08-18 07:23:39', '2018-08-18 07:23:39', NULL),
(181, '18/08/33/38b0Mq21uVPoQfqNB5iKEfhO4yk5ToBe4cbRxSqd.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '38b0Mq21uVPoQfqNB5iKEfhO4yk5ToBe4cbRxSqd.mp4', 'video', 53, 53, '2018-08-18 07:24:23', '2018-08-18 07:24:23', NULL),
(182, '18/08/33/TEJ6ZaNaDD64aUCHZPGLGA3sZeSzZCEMniRt4rUL.png', 'poster-bbbbbb.mp4.png', 455169, 'image/png', 'png', '18/08/33', 'TEJ6ZaNaDD64aUCHZPGLGA3sZeSzZCEMniRt4rUL.png', 'image', 53, 53, '2018-08-18 07:24:24', '2018-08-18 07:24:24', NULL),
(183, '18/08/33/Q7ZIIodGtZjOuLy4jhkLzjAiH35c2RMsiflFph3d.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'Q7ZIIodGtZjOuLy4jhkLzjAiH35c2RMsiflFph3d.mp4', 'video', 53, 53, '2018-08-18 07:26:27', '2018-08-18 07:26:27', NULL),
(184, '18/08/33/z7BpCg63wBfmoX5lVPdvQLuDz6VHocNsgOzAhwgq.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'z7BpCg63wBfmoX5lVPdvQLuDz6VHocNsgOzAhwgq.mp4', 'video', 53, 53, '2018-08-18 07:29:11', '2018-08-18 07:29:11', NULL),
(185, '18/08/33/9N8tQHdD5ttwrxi0WPfYSCePY0FAIv43V3iLfExQ.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '9N8tQHdD5ttwrxi0WPfYSCePY0FAIv43V3iLfExQ.mp4', 'video', 53, 53, '2018-08-18 07:30:33', '2018-08-18 07:30:33', NULL),
(186, '18/08/33/7NySCSjNNkSqpPi9ckF6fRyKcev83UyPQjcILYUH.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '7NySCSjNNkSqpPi9ckF6fRyKcev83UyPQjcILYUH.mp4', 'video', 53, 53, '2018-08-18 07:32:33', '2018-08-18 07:32:33', NULL),
(187, '18/08/33/KTzSekDHl7EACZqHlPYBX4yItM0re44bjTLw2zj4.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'KTzSekDHl7EACZqHlPYBX4yItM0re44bjTLw2zj4.mp4', 'video', 53, 53, '2018-08-18 07:33:19', '2018-08-18 07:33:19', NULL),
(188, '18/08/33/gSs8Thj9s93WW6V7rQZCmFVqXR5kNqFfCYuIqsS4.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'gSs8Thj9s93WW6V7rQZCmFVqXR5kNqFfCYuIqsS4.mp4', 'video', 53, 53, '2018-08-18 07:34:03', '2018-08-18 07:34:03', NULL),
(189, '18/08/33/Mm95p4wA3ukRnAQV9fOftJc8DGgkXBNRrmRpDOsd.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'Mm95p4wA3ukRnAQV9fOftJc8DGgkXBNRrmRpDOsd.mp4', 'video', 53, 53, '2018-08-18 07:34:34', '2018-08-18 07:34:34', NULL),
(190, '18/08/33/aA3UuYWQe526ZkOqfUtY3PK3e9o0gZlvkuCYGR6G.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'aA3UuYWQe526ZkOqfUtY3PK3e9o0gZlvkuCYGR6G.mp4', 'video', 53, 53, '2018-08-18 07:35:24', '2018-08-18 07:35:24', NULL),
(191, '18/08/33/iQ8VLkovZnIp8Ev0LmGFNG7FPZXbD74HXLTNlkGN.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'iQ8VLkovZnIp8Ev0LmGFNG7FPZXbD74HXLTNlkGN.mp4', 'video', 53, 53, '2018-08-18 07:35:55', '2018-08-18 07:35:55', NULL);
INSERT INTO `media` (`id`, `path`, `original_name`, `size`, `mime`, `extension`, `location`, `hash_name`, `type`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(192, '18/08/33/73o7fypDOMp1xHQfqlTgbyg0dRha4RdzpIFuDCww.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', '73o7fypDOMp1xHQfqlTgbyg0dRha4RdzpIFuDCww.mp4', 'video', 53, 53, '2018-08-18 07:49:30', '2018-08-18 07:49:30', NULL),
(193, '18/08/33/H1DaB3XRjV7vGGf6P597PcAqWUahhZZq6rzmemuZ.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'H1DaB3XRjV7vGGf6P597PcAqWUahhZZq6rzmemuZ.mp4', 'video', 53, 53, '2018-08-18 07:49:55', '2018-08-18 07:49:55', NULL),
(194, '18/08/33/xcHXbMn5RbzItzVyfHjlLdw8M97E2KPJV9WKfZ2H.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'xcHXbMn5RbzItzVyfHjlLdw8M97E2KPJV9WKfZ2H.mp4', 'video', 53, 53, '2018-08-18 07:50:53', '2018-08-18 07:50:53', NULL),
(195, '18/08/33/nwM8jtFBjiR5jsCKhWPL7Y0Lv7YQPhXpznM7cnFz.png', 'poster-bbbbbb.mp4.png', 266968, 'image/png', 'png', '18/08/33', 'nwM8jtFBjiR5jsCKhWPL7Y0Lv7YQPhXpznM7cnFz.png', 'image', 53, 53, '2018-08-18 07:50:55', '2018-08-18 07:50:55', NULL),
(196, '18/08/33/x1PnfbcloWeOGfCQvB9w63L7wnf8L10RAMHSgrH1.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/33', 'x1PnfbcloWeOGfCQvB9w63L7wnf8L10RAMHSgrH1.docx', 'document', 53, 53, '2018-08-18 08:14:44', '2018-08-18 08:14:44', NULL),
(197, '18/08/33/tyURLTKQaR9cqbtuW37CgFIBEVBOSYKZGmDeIYGl.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'tyURLTKQaR9cqbtuW37CgFIBEVBOSYKZGmDeIYGl.mp4', 'video', 53, 53, '2018-08-18 08:29:51', '2018-08-18 08:29:51', NULL),
(198, '18/08/33/jqikktgYyGuA2C9ydDkZDEQ66K4pYAhTDOqiaYsy.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'jqikktgYyGuA2C9ydDkZDEQ66K4pYAhTDOqiaYsy.mp4', 'video', 53, 53, '2018-08-18 08:46:28', '2018-08-18 08:46:28', NULL),
(199, '18/08/33/EnrvbNUCAbVKubJR6fUJpkPFQNnDyujJHfIkbdDv.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'EnrvbNUCAbVKubJR6fUJpkPFQNnDyujJHfIkbdDv.mp4', 'video', 53, 53, '2018-08-18 08:49:56', '2018-08-18 08:49:56', NULL),
(200, '18/08/33/u7cSvopFaDwBv2rtb8Ur0Jp5wpIzsKPIEBb89XH7.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'u7cSvopFaDwBv2rtb8Ur0Jp5wpIzsKPIEBb89XH7.mp4', 'video', 53, 53, '2018-08-18 08:50:42', '2018-08-18 08:50:42', NULL),
(201, '18/08/33/Z4Sp7nnZo0KxkePN0lpofSig297594YOzFiwNanJ.mp4', 'bbbbbb.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'Z4Sp7nnZo0KxkePN0lpofSig297594YOzFiwNanJ.mp4', 'video', 53, 53, '2018-08-18 08:53:00', '2018-08-18 08:53:00', NULL),
(202, '18/08/33/nbeP8e69r1nDc4gO2vmzX6B3WdHCPwjFkeFHQXOo.png', 'poster-bbbbbb.mp4.png', 514711, 'image/png', 'png', '18/08/33', 'nbeP8e69r1nDc4gO2vmzX6B3WdHCPwjFkeFHQXOo.png', 'image', 53, 53, '2018-08-18 08:53:02', '2018-08-18 08:53:02', NULL),
(203, '18/08/33/Rueq2aPXk8S26djbGIRJttJ0az2sxsFmp8HMZbKP.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/33', 'Rueq2aPXk8S26djbGIRJttJ0az2sxsFmp8HMZbKP.docx', 'document', 53, 53, '2018-08-18 08:53:14', '2018-08-18 08:53:14', NULL),
(204, '18/08/33/B7wGMWwTya1XlQGb4bkEeiGHWKV1BWARetLnUi0J.jpeg', 'download.jpeg', 10561, 'application/octet-stream', 'jpeg', '18/08/33', 'B7wGMWwTya1XlQGb4bkEeiGHWKV1BWARetLnUi0J.jpeg', 'image', 53, 53, '2018-08-18 08:53:46', '2018-08-18 08:53:46', NULL),
(205, '18/08/33/sEG7AATWUomqyJn5euguuIOticQIa1BcS0Z4zBpO.mp4', '[4]Cellの設定.mp4', 113608639, 'application/octet-stream', 'mp4', '18/08/33', 'sEG7AATWUomqyJn5euguuIOticQIa1BcS0Z4zBpO.mp4', 'video', 53, 53, '2018-08-18 10:04:41', '2018-08-18 10:04:41', NULL),
(206, '18/08/33/PtB4LeuBecsiInmxfZCWKF8xSvakAOfcrNkVOLL8.png', 'poster-[4]Cellの設定.mp4.png', 480692, 'image/png', 'png', '18/08/33', 'PtB4LeuBecsiInmxfZCWKF8xSvakAOfcrNkVOLL8.png', 'image', 53, 53, '2018-08-18 10:04:44', '2018-08-18 10:04:44', NULL),
(207, '18/08/33/5ih169N3QlhhPTRnprVmWUo7cqO7sRqLFa820WNF.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/33', '5ih169N3QlhhPTRnprVmWUo7cqO7sRqLFa820WNF.docx', 'document', 53, 53, '2018-08-18 10:04:45', '2018-08-18 10:04:45', NULL),
(208, '18/08/33/Pq3xCmIUFLCcFN6wrYgF8kMcZjAMHbTkxCPHpex2.docx', 'Untitled document.docx', 103, 'text/plain', 'docx', '18/08/33', 'Pq3xCmIUFLCcFN6wrYgF8kMcZjAMHbTkxCPHpex2.docx', 'video', 53, 53, '2018-08-18 10:06:09', '2018-08-25 02:14:34', NULL),
(209, '18/08/33/u7DcvIrWbmpYLVxGpUBtXIznO8chQlKFy6UVOOuk.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/33', 'u7DcvIrWbmpYLVxGpUBtXIznO8chQlKFy6UVOOuk.docx', 'document', 53, 53, '2018-08-18 10:07:44', '2018-08-18 10:07:44', NULL),
(210, '18/08/33/ktiKtV8ocHlRxbJy3FZFc4rw84dMP9C59g4niu5o.docx', 'Untitled document.docx', 103, 'text/plain', 'docx', '18/08/33', 'ktiKtV8ocHlRxbJy3FZFc4rw84dMP9C59g4niu5o.docx', 'video', 53, 53, '2018-08-18 10:07:46', '2018-08-25 02:14:34', NULL),
(211, '18/08/34/OC4zBcltmzJgkvHaLoVTI3wGgaNxZw1rSW156sUU.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/34', 'OC4zBcltmzJgkvHaLoVTI3wGgaNxZw1rSW156sUU.jpg', 'image', 53, 53, '2018-08-24 19:17:42', '2018-08-24 19:17:42', NULL),
(212, '18/08/34/bslF9kszelX2rTJNOkWhj55DYmu6C4e05luhzhti.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/34', 'bslF9kszelX2rTJNOkWhj55DYmu6C4e05luhzhti.jpg', 'image', 53, 53, '2018-08-24 19:18:42', '2018-08-24 19:18:42', NULL),
(213, '18/08/34/kOJpg1yrKdTh0yjQOP903C5wmX6XL6N7Rwzpu6n1.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/34', 'kOJpg1yrKdTh0yjQOP903C5wmX6XL6N7Rwzpu6n1.jpg', 'image', 53, 53, '2018-08-26 16:21:24', '2018-08-26 16:21:24', NULL),
(214, '18/08/34/72Qvq25cBzScG7wkD9OjHOfYz9wovDFnq7xpFDGX.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/34', '72Qvq25cBzScG7wkD9OjHOfYz9wovDFnq7xpFDGX.jpg', 'image', 53, 53, '2018-08-26 16:21:35', '2018-08-26 16:21:35', NULL),
(215, '18/08/34/GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/34', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z.jpg', 'image', 53, 53, '2018-08-26 16:21:50', '2018-08-26 16:21:50', NULL),
(216, '18/08/34/qu0pK2snkGVjtE1Kgt98oubQJmsu6yLS9fl7Wk0M.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/34', 'qu0pK2snkGVjtE1Kgt98oubQJmsu6yLS9fl7Wk0M.jpg', 'image', 53, 53, '2018-08-26 16:21:58', '2018-08-26 16:21:58', NULL),
(217, '18/08/34/LckNWfEhjwtuMj9iHniN146eytPlp3W4bZPW4Ieh.jpeg', 'aaa.jpeg', 9231, 'application/octet-stream', 'jpeg', '18/08/34', 'LckNWfEhjwtuMj9iHniN146eytPlp3W4bZPW4Ieh.jpeg', 'image', 53, 53, '2018-08-26 16:22:56', '2018-08-26 16:22:56', NULL),
(218, '18/08/35/BYPyef4KiRVvsWVqZoUPfY6tkZrg2ncLGpkDWp0L_original.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/35', 'BYPyef4KiRVvsWVqZoUPfY6tkZrg2ncLGpkDWp0L_original.jpg', 'image', 53, 53, '2018-08-26 18:31:42', '2018-08-26 18:31:42', NULL),
(219, '', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', '.jpg', '18/08/35', '6NQO7iRKlZjEF9RhKXI6jk4As7wTlR6hucVrf1jj..jpg', 'image', 53, 53, '2018-08-26 18:38:00', '2018-08-26 18:38:00', NULL),
(220, '', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', '.jpg', '18/08/35', 'PuFeNdNQE0GDzNgAEhRsynmkX2C8c5ZIBmbqlRLq..jpg', 'image', 53, 53, '2018-08-26 18:38:16', '2018-08-26 18:38:16', NULL),
(221, '', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', '.jpg', '18/08/35', '9mW03gWeUWp83e7db6WSSkLIFi7g61Nk5ij7zkNj..jpg', 'image', 53, 53, '2018-08-26 18:39:24', '2018-08-26 18:39:24', NULL),
(222, '18/08/35/MdZ3aLmujlhnkCs0yKLkEXpdYItVsumAil3g1tPD.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-26 18:41:11', '2018-08-26 18:41:11', NULL),
(223, '/var/www/html/client/pg/storage/app/media/18/08/35/6KBXpEEKxb4oJ2X3aJGSSzyRGGAORAdpxA9ApWyk.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-26 18:43:33', '2018-08-26 18:43:33', NULL),
(224, '18/08/35/Re9Mw9N8KAEfKv0algSSU84CpeJNRjhaauxKeVBa.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/35', 'Re9Mw9N8KAEfKv0algSSU84CpeJNRjhaauxKeVBa.jpg', 'image', 53, 53, '2018-08-27 15:17:17', '2018-08-27 15:17:17', NULL),
(225, '18/08/35/MkcZSenhkpCMjVUk6BYr1Q83aGIjbPFSjhcXipZV.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/35', 'MkcZSenhkpCMjVUk6BYr1Q83aGIjbPFSjhcXipZV.jpg', 'image', 53, 53, '2018-08-27 16:16:15', '2018-08-27 16:16:15', NULL),
(226, '18/08/35/YUGLEdflTgdYrThjdkQfuPconOKlCWtgRA9RhWS7.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/35', 'YUGLEdflTgdYrThjdkQfuPconOKlCWtgRA9RhWS7.docx', 'document', 53, 53, '2018-08-27 16:19:58', '2018-08-27 16:19:58', NULL),
(227, '18/08/35/WpXfS37v76DTNJHjYZE0rRZhcLIQMln0gTw3ZrLF.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/35', 'WpXfS37v76DTNJHjYZE0rRZhcLIQMln0gTw3ZrLF.docx', 'document', 53, 53, '2018-08-27 16:21:58', '2018-08-27 16:21:58', NULL),
(228, '/var/www/html/client/pg/storage/app/media/18/08/35/XQ4XihOZyGXNkmXmtxU2NIQQYJKUOXi8N2nHtzoz.jpeg.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:35:50', '2018-08-28 18:35:50', NULL),
(229, '18/08/35/H2iTXnlAHgypsqUZYHl2iJ2FRS1ZcvxhnWcEaB7Y.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/35', 'H2iTXnlAHgypsqUZYHl2iJ2FRS1ZcvxhnWcEaB7Y.docx', 'document', 53, 53, '2018-08-28 18:36:22', '2018-08-28 18:36:22', NULL),
(230, '/var/www/html/client/pg/storage/app/media/18/08/35/JYB45qvO3npNXYxJrKc0utzTtMdg2a9zVZI3IuFB.jpeg.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:36:32', '2018-08-28 18:36:32', NULL),
(231, '/var/www/html/client/pg/storage/app/media/18/08/35/usUTpYmDbjJRUPRX7M585QL7DPjPvzX622Ab5jn4.jpeg.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:36:59', '2018-08-28 18:36:59', NULL),
(232, '/var/www/html/client/pg/storage/app/media/18/08/35/Q0qAqjWGPcYgqLA7xe5DEkkvQiw4izlpuzbSMNXf.jpeg.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:38:16', '2018-08-28 18:38:16', NULL),
(233, '/var/www/html/client/pg/storage/app/media/18/08/35/hVBWbKvdnLtEJ7HLjuqIUVyZAoxRaQisb82Nds02.jpeg.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:39:32', '2018-08-28 18:39:32', NULL),
(234, '18/08/35/gKDbRZN5dtmkCRzufxiEZH1Eu0rog0xbAX7ZQxWy.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', 'jpg', '18/08/35', 'gKDbRZN5dtmkCRzufxiEZH1Eu0rog0xbAX7ZQxWy.jpg', 'image', 53, 53, '2018-08-28 18:39:47', '2018-08-28 18:39:47', NULL),
(235, '18/08/35/h0PmrQJH8ZST5HJU3259WrZqmTeBGun1haF98eHE.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/35', 'h0PmrQJH8ZST5HJU3259WrZqmTeBGun1haF98eHE.docx', 'document', 53, 53, '2018-08-28 18:40:02', '2018-08-28 18:40:02', NULL),
(236, '18/08/35/YqMr7osTMPuMerCZtu6RXhpVcMST1t2JjZSOvaVn.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', 'jpg', '18/08/35', 'YqMr7osTMPuMerCZtu6RXhpVcMST1t2JjZSOvaVn.jpg', 'image', 53, 53, '2018-08-28 18:43:04', '2018-08-28 18:43:04', NULL),
(237, '/var/www/html/client/pg/storage/app/media/18/08/35/uiH07j8CHVW8LRe7uep0KxsgM1VcDzMTZZN3yLQ8.jpeg.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:44:04', '2018-08-28 18:44:04', NULL),
(238, '/var/www/html/client/pg/storage/app/media/18/08/35/QthuUQ5sobLSDTmB7jBIHSPkQRoLYlRUbjXhrY3W.jpeg.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:45:29', '2018-08-28 18:45:29', NULL),
(239, '18/08/35/yl8mvQjbnbnPtdA2w83VpdELcTVYEqWojJNR6IfD.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/35', 'yl8mvQjbnbnPtdA2w83VpdELcTVYEqWojJNR6IfD.docx', 'document', 53, 53, '2018-08-28 18:45:38', '2018-08-28 18:45:38', NULL),
(240, '18/08/35/YqEsyNbWqfiQFUpcfdqh6zOaUT8gTDExDUbstBCN.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', 'jpg', '18/08/35', 'YqEsyNbWqfiQFUpcfdqh6zOaUT8gTDExDUbstBCN.jpg', 'image', 53, 53, '2018-08-28 18:45:50', '2018-08-28 18:45:50', NULL),
(241, '/var/www/html/client/pg/storage/app/media/18/08/35/DcqWpX3nh21KO6Z2S6dmMz1UM7LGO9fdRn5y6JnU.png.png', 'yBE5rdM9mMDJFW6eONgDpGnnZKZYD5YHDHUG4Kpm.png', 18991, 'application/octet-stream', '.png', '18/08/35', 'png', 'image', 53, 53, '2018-08-28 18:47:59', '2018-08-28 18:47:59', NULL),
(242, '/var/www/html/client/pg/storage/app/media/18/08/35/49UG1FzUD1WhPB6ZDeGkig3agxzX1kMzpakxgaoY.png.png', 'yBE5rdM9mMDJFW6eONgDpGnnZKZYD5YHDHUG4Kpm.png', 18991, 'application/octet-stream', '.png', '18/08/35', 'png', 'image', 53, 53, '2018-08-28 18:48:34', '2018-08-28 18:48:34', NULL),
(243, '', 'yBE5rdM9mMDJFW6eONgDpGnnZKZYD5YHDHUG4Kpm.png', 18991, 'application/octet-stream', '.png', '18/08/35', 'png', 'image', 53, 53, '2018-08-28 18:56:22', '2018-08-28 18:56:22', NULL),
(244, '18/08/35/NJ4NSCgHmeZdR83RVDUzBdHtdKH1yhedF5nXBI2A.jpg', '3112585593_1_3_Epw1PH8P.jpg', 39453, 'application/octet-stream', '.jpg', '18/08/35', 'jpg', 'image', 53, 53, '2018-08-28 18:57:07', '2018-08-28 18:57:07', NULL),
(245, '18/08/35/1x27j6HWx465ZXnA4NUNcEsfFW5YoVa8NiyGfkpw.png', 'yBE5rdM9mMDJFW6eONgDpGnnZKZYD5YHDHUG4Kpm.png', 18991, 'application/octet-stream', '.png', '18/08/35', 'png', 'image', 53, 53, '2018-08-28 18:58:10', '2018-08-28 18:58:10', NULL),
(246, '18/08/35/URgcWCYwaYxjRNdfEhdTvtE5jgXVltzZwnv2Q7Rh.png', 'yBE5rdM9mMDJFW6eONgDpGnnZKZYD5YHDHUG4Kpm.png', 18991, 'application/octet-stream', '.png', '18/08/35', 'png', 'image', 53, 53, '2018-08-28 18:58:30', '2018-08-28 18:58:30', NULL),
(247, '18/08/35/oerKwAyi7BYSpcsmwlGOfBBolmrfBYe1A6b2qXsY.docx', 'Untitled document.docx', 6232, 'application/octet-stream', 'docx', '18/08/35', 'oerKwAyi7BYSpcsmwlGOfBBolmrfBYe1A6b2qXsY.docx', 'document', 53, 53, '2018-08-28 18:58:34', '2018-08-28 18:58:34', NULL),
(248, '18/08/35/drdojTVO2S3RbpfJdCJ2KfRK99ZmaLZSIhazmWHA.jpg', 'GHiHj1nghgFJwTWVQAKGvFs2wVEdIF0FQCp8aO9z_original.jpg', 357240, 'application/octet-stream', 'jpg', '18/08/35', 'drdojTVO2S3RbpfJdCJ2KfRK99ZmaLZSIhazmWHA.jpg', 'image', 53, 53, '2018-08-28 18:58:39', '2018-08-28 18:58:39', NULL),
(249, '18/08/35/KbpGkWAzi8PaUK3NTp6jQHVRBrkvT4zkWsLrHCsE.docx', 'Untitled document.docx', 103, 'text/plain', 'docx', '18/08/35', 'KbpGkWAzi8PaUK3NTp6jQHVRBrkvT4zkWsLrHCsE.docx', 'video', 53, 53, '2018-08-28 18:59:20', '2018-08-28 18:59:20', NULL),
(250, '18/08/35/deWREgA1ZCMjB9jC36XYlQq3ICqGYr1cTjzTDA3N.jpeg', 'LckNWfEhjwtuMj9iHniN146eytPlp3W4bZPW4Ieh_original.jpeg', 422438, 'application/octet-stream', '.jpeg', '18/08/35', 'jpeg', 'image', 53, 53, '2018-08-29 17:53:51', '2018-08-29 17:53:51', NULL),
(251, '18/08/35/rkoDq56JDBCFDm1SdKJTWn7wNda2Le3UCv9d1uQW.jpeg', 'LckNWfEhjwtuMj9iHniN146eytPlp3W4bZPW4Ieh_original.jpeg', 422438, 'application/octet-stream', '.jpeg', '18/08/35', 'jpeg', 'image', 53, 53, '2018-08-29 18:30:35', '2018-08-29 18:30:35', NULL),
(252, '18/08/35/xfxXtY0O7LLf9NumQjNkYCwrqdI3ogOuAzxfo6d2.jpeg', 'LckNWfEhjwtuMj9iHniN146eytPlp3W4bZPW4Ieh_original.jpeg', 422438, 'application/octet-stream', 'jpeg', '18/08/35', 'xfxXtY0O7LLf9NumQjNkYCwrqdI3ogOuAzxfo6d2', 'image', 53, 53, '2018-08-29 18:31:40', '2018-08-29 18:31:40', NULL),
(253, '18/08/35/7O6pVEArxR6epT1RYTpIiwYcdYiZePWjVJQD6kEl.jpeg', 'LckNWfEhjwtuMj9iHniN146eytPlp3W4bZPW4Ieh_original.jpeg', 422438, 'application/octet-stream', 'jpeg', '18/08/35', '7O6pVEArxR6epT1RYTpIiwYcdYiZePWjVJQD6kEl.jpeg', 'image', 53, 53, '2018-08-29 18:36:26', '2018-08-29 18:36:26', NULL),
(254, '18/09/36/xATRKXd0w7AUh7u5zZ2q4XvfTAzEBXXijfPTdezp.jpg', 'cool-wallpaper-dawn-dusk-66997.jpg', 1988307, 'application/octet-stream', 'jpg', '18/09/36', 'xATRKXd0w7AUh7u5zZ2q4XvfTAzEBXXijfPTdezp.jpg', 'image', 53, 53, '2018-09-05 17:01:16', '2018-09-05 17:01:16', NULL),
(255, '18/09/36/YRoB6lUjZBalBKKUAdooTwivHlUnp75tItmgllWU.jpg', 'art-beach-beautiful-269583.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'YRoB6lUjZBalBKKUAdooTwivHlUnp75tItmgllWU.jpg', 'image', 53, 53, '2018-09-05 17:40:46', '2018-09-05 17:40:46', NULL),
(256, '18/09/36/6sptnzfNjgZq3uNB3OvpwGppCslbpgLYzyZ4Qlxk.jpg', 'cool-wallpaper-dawn-dusk-66997.jpg', 1988307, 'application/octet-stream', 'jpg', '18/09/36', '6sptnzfNjgZq3uNB3OvpwGppCslbpgLYzyZ4Qlxk.jpg', 'image', 53, 53, '2018-09-05 17:40:56', '2018-09-05 17:40:56', NULL),
(257, '18/09/36/j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 'art-beach-beautiful-269583.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 'image', 53, 53, '2018-09-05 17:43:50', '2018-09-05 17:43:50', NULL),
(258, '18/09/36/OmnpIIDiMpfsOqtxwSYYvV1WxuNODchK6zR0OBUI.jpg', 'cool-wallpaper-dawn-dusk-66997.jpg', 1988307, 'application/octet-stream', 'jpg', '18/09/36', 'OmnpIIDiMpfsOqtxwSYYvV1WxuNODchK6zR0OBUI.jpg', 'image', 53, 53, '2018-09-05 17:48:11', '2018-09-05 17:48:11', NULL),
(259, '18/09/36/D9n8xuGZRko6v7IxsM7HTHDOYXzNDRXdWJArBSPM.jpg', 'cool-wallpaper-dawn-dusk-66997.jpg', 1988307, 'application/octet-stream', 'jpg', '18/09/36', 'D9n8xuGZRko6v7IxsM7HTHDOYXzNDRXdWJArBSPM.jpg', 'image', 53, 53, '2018-09-05 18:01:52', '2018-09-05 18:01:52', NULL),
(260, '18/09/36/Bq55jt6IYbkW7O0okZtUTRYF15pHrJjFZPc5pedS.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'Bq55jt6IYbkW7O0okZtUTRYF15pHrJjFZPc5pedS.jpeg', 'image', 53, 53, '2018-09-05 18:28:32', '2018-09-05 18:28:32', NULL),
(261, '18/09/36/YhkiFWK1PqnakmioPcvrBG2uawCJ2goFa0kJ978D.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'YhkiFWK1PqnakmioPcvrBG2uawCJ2goFa0kJ978D.jpeg', 'image', 53, 53, '2018-09-05 18:29:33', '2018-09-05 18:29:33', NULL),
(262, '18/09/36/WNEyae4zY5tGmy5LuRyed4HmjKf6vgfQwysV3h19.jpeg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'WNEyae4zY5tGmy5LuRyed4HmjKf6vgfQwysV3h19.jpeg', 'image', 53, 53, '2018-09-05 18:30:16', '2018-09-05 18:30:16', NULL),
(263, '18/09/36/6CNK7tqb58x60bxzSAkJRUXfVQCd9jykOvXMZHgS.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', '6CNK7tqb58x60bxzSAkJRUXfVQCd9jykOvXMZHgS.jpeg', 'image', 53, 53, '2018-09-05 18:32:48', '2018-09-05 18:32:48', NULL),
(264, '18/09/36/vsOCZmILRMS2Im38mY3PcgA189ZnZHknP9BTYRSC.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'vsOCZmILRMS2Im38mY3PcgA189ZnZHknP9BTYRSC.jpg', 'image', 53, 53, '2018-09-06 17:03:22', '2018-09-06 17:03:22', NULL),
(265, '18/09/36/oxwVHezfpLqGQ9ly0eVwWa3t0qBsPnLCfUVSaZar.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'oxwVHezfpLqGQ9ly0eVwWa3t0qBsPnLCfUVSaZar.jpg', 'image', 53, 53, '2018-09-06 17:03:22', '2018-09-06 17:03:22', NULL),
(266, '18/09/36/cOwyE5le3Ua9qJQQgX9Gi6uGVm0EZYlNl4Sagm1M.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'cOwyE5le3Ua9qJQQgX9Gi6uGVm0EZYlNl4Sagm1M.jpg', 'image', 53, 53, '2018-09-06 17:16:18', '2018-09-06 17:16:18', NULL),
(267, '18/09/36/VRQ0YpMV0IIEmlizP44IMoKVgTIDjpzSLmPTZMs7.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'VRQ0YpMV0IIEmlizP44IMoKVgTIDjpzSLmPTZMs7.jpg', 'image', 53, 53, '2018-09-06 17:16:18', '2018-09-06 17:16:18', NULL),
(268, '18/09/36/U8ZwcqojkMjsagfpS4i7f0k5KuvUyF8Hk4sbc8RB.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'U8ZwcqojkMjsagfpS4i7f0k5KuvUyF8Hk4sbc8RB.jpg', 'image', 53, 53, '2018-09-06 17:36:08', '2018-09-06 17:36:08', NULL),
(269, '18/09/36/H1sxIFpFQCqhCZc9dUwAA6gkz9V9JU8n23kplLye.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'H1sxIFpFQCqhCZc9dUwAA6gkz9V9JU8n23kplLye.jpg', 'image', 53, 53, '2018-09-06 17:36:08', '2018-09-06 17:36:08', NULL),
(270, '18/09/36/sPiWy8U7L4HyJhnqkYW9KUETmlTgT7XcHKjXuhPL.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'sPiWy8U7L4HyJhnqkYW9KUETmlTgT7XcHKjXuhPL.jpg', 'image', 53, 53, '2018-09-07 15:18:41', '2018-09-07 15:18:41', NULL),
(271, '18/09/36/hVNbgNiv1Hh8iWPQOvbFGj9sk8aeXo8USs9CmT1z.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'hVNbgNiv1Hh8iWPQOvbFGj9sk8aeXo8USs9CmT1z.jpg', 'image', 53, 53, '2018-09-07 16:24:09', '2018-09-07 16:24:09', NULL),
(272, '18/09/36/L1yGNkxFPihHVnjRLjXOw7Npcp4y3r4X0SD4jQLI.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'L1yGNkxFPihHVnjRLjXOw7Npcp4y3r4X0SD4jQLI.jpg', 'image', 53, 53, '2018-09-07 16:24:38', '2018-09-07 16:24:38', NULL),
(273, '18/09/36/3UJiBK39fqgbjd462h4pi50Aifs5pJPiAaDprs28.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', '3UJiBK39fqgbjd462h4pi50Aifs5pJPiAaDprs28.jpg', 'image', 53, 53, '2018-09-07 16:36:27', '2018-09-07 16:36:27', NULL),
(274, '18/09/36/SbvFd8mb82zf169go5J58i44mzcl3UiJdPMHh9UX.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'SbvFd8mb82zf169go5J58i44mzcl3UiJdPMHh9UX.jpg', 'image', 53, 53, '2018-09-07 16:37:08', '2018-09-07 16:37:08', NULL),
(275, '18/09/36/8rqYLTHAdyZFzkhqfKmAJKc9QcKAFyAXPfJRoWLW.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', '8rqYLTHAdyZFzkhqfKmAJKc9QcKAFyAXPfJRoWLW.jpg', 'image', 53, 53, '2018-09-07 16:39:49', '2018-09-07 16:39:49', NULL),
(276, '18/09/36/171qXSc9QTabCSGZT6Zn6j8B32xmYWaR6Fvr8Rgn.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', '171qXSc9QTabCSGZT6Zn6j8B32xmYWaR6Fvr8Rgn.jpg', 'image', 53, 53, '2018-09-07 16:42:18', '2018-09-07 16:42:18', NULL),
(277, '18/09/36/RGkK9wCgy5vKWrCppll4npPCDBW5IO5mVfFQTzQW.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'RGkK9wCgy5vKWrCppll4npPCDBW5IO5mVfFQTzQW.jpg', 'image', 53, 53, '2018-09-07 16:42:28', '2018-09-07 16:42:28', NULL),
(278, '18/09/36/unWxdXKrfgzqlj3mpcvEYIPYQ6zCCitk2PHJF6bI.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'unWxdXKrfgzqlj3mpcvEYIPYQ6zCCitk2PHJF6bI.jpg', 'image', 53, 53, '2018-09-07 16:44:39', '2018-09-07 16:44:39', NULL),
(279, '18/09/36/kf9rLVfPu3dSlIJarOPMDHBGSrxQxB2459AUV5Wg.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'kf9rLVfPu3dSlIJarOPMDHBGSrxQxB2459AUV5Wg.jpg', 'image', 53, 53, '2018-09-07 16:44:47', '2018-09-07 16:44:47', NULL),
(280, '18/09/36/SIpeJSfte2rqhg8jioeSck0uSckDhrWJ7YJZWmfg.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'SIpeJSfte2rqhg8jioeSck0uSckDhrWJ7YJZWmfg.jpg', 'image', 53, 53, '2018-09-07 16:51:04', '2018-09-07 16:51:04', NULL),
(281, '18/09/36/pZtcpGf5oBLxIP7sWugrQNzjFi2p2MviD84n08Xg.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'pZtcpGf5oBLxIP7sWugrQNzjFi2p2MviD84n08Xg.jpg', 'image', 53, 53, '2018-09-07 16:51:04', '2018-09-07 16:51:04', NULL),
(282, '18/09/36/61gJll55YOs5PdswNQ5T0Kan7VmMsswtaliXVg2N.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', '61gJll55YOs5PdswNQ5T0Kan7VmMsswtaliXVg2N.jpg', 'image', 53, 53, '2018-09-07 16:51:47', '2018-09-07 16:51:47', NULL),
(283, '18/09/36/evaX58wEs8ANIgZ5npQXvuv8rAgaCgStnEHovwot.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'evaX58wEs8ANIgZ5npQXvuv8rAgaCgStnEHovwot.jpg', 'image', 53, 53, '2018-09-07 16:51:47', '2018-09-07 16:51:47', NULL),
(284, '18/09/36/ZsAerhl9fmOXTuGsyrNXMnACAosTy44Z1B9A7dPq.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'ZsAerhl9fmOXTuGsyrNXMnACAosTy44Z1B9A7dPq.jpg', 'image', 53, 53, '2018-09-07 17:39:53', '2018-09-07 17:39:53', NULL),
(285, '18/09/36/r2iQ4BxXwNcZTfm1QfROeNcRtV1w6epw0v5v36vR.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'r2iQ4BxXwNcZTfm1QfROeNcRtV1w6epw0v5v36vR.jpg', 'image', 53, 53, '2018-09-07 18:09:19', '2018-09-07 18:09:19', NULL),
(286, '18/09/36/ZnytkvjqoPLWO3tslowdcSrOB29JpXTV8RnQ7KUN.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'ZnytkvjqoPLWO3tslowdcSrOB29JpXTV8RnQ7KUN.jpg', 'image', 53, 53, '2018-09-07 18:31:38', '2018-09-07 18:31:38', NULL),
(287, '18/09/36/dGZl2J4zHg4Q3y1GoRoQTEks65sUbGNrVwBLLT3t.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'dGZl2J4zHg4Q3y1GoRoQTEks65sUbGNrVwBLLT3t.jpg', 'image', 53, 53, '2018-09-07 18:32:11', '2018-09-07 18:32:11', NULL),
(288, '18/09/36/MGpUL4UwqpB2005kwTDLaQrcuSZE8maR7emrssqo.png', 'PC_LinePay_main_japan_180607_02.png', 31331, 'application/octet-stream', 'png', '18/09/36', 'MGpUL4UwqpB2005kwTDLaQrcuSZE8maR7emrssqo.png', 'image', 53, 53, '2018-09-07 18:40:46', '2018-09-07 18:40:46', NULL),
(289, '18/09/36/NahMwyv60UEosQhzweathfmd4khBsH8bEjpS1ZvP.png', 'PC_Game_rangers_ja_12333.png', 881115, 'application/octet-stream', 'png', '18/09/36', 'NahMwyv60UEosQhzweathfmd4khBsH8bEjpS1ZvP.png', 'image', 53, 53, '2018-09-07 18:41:06', '2018-09-07 18:41:06', NULL),
(290, '18/09/36/cUJmjt8eeOBIe37kWzYGSvo8B3HXbI0lgxDiKvKj.jpeg', 'images.jpeg', 23326, 'application/octet-stream', 'jpeg', '18/09/36', 'cUJmjt8eeOBIe37kWzYGSvo8B3HXbI0lgxDiKvKj.jpeg', 'image', 53, 53, '2018-09-07 19:40:16', '2018-09-07 19:40:16', NULL),
(291, '18/09/36/SDyupnu4SEbeKftByoCnj8k7T1mKtp25ngUz28CY.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'SDyupnu4SEbeKftByoCnj8k7T1mKtp25ngUz28CY.jpg', 'image', 53, 53, '2018-09-07 19:40:16', '2018-09-07 19:40:16', NULL),
(292, '18/09/36/rokxpedJVCF2OQvGlHBy1I4qlAMXNnOk4D9ppE1S.png', 'Japanese0906.png', 1208705, 'application/octet-stream', 'png', '18/09/36', 'rokxpedJVCF2OQvGlHBy1I4qlAMXNnOk4D9ppE1S.png', 'image', 53, 53, '2018-09-07 19:40:16', '2018-09-07 19:40:16', NULL),
(293, '18/09/36/k23p64ptpNsRyssIZvUxpLlHkAaOPfOtTA3gFvmj.png', 'PC_Game_rangers_ja_12333.png', 881115, 'application/octet-stream', 'png', '18/09/36', 'k23p64ptpNsRyssIZvUxpLlHkAaOPfOtTA3gFvmj.png', 'image', 53, 53, '2018-09-07 19:40:17', '2018-09-07 19:40:17', NULL),
(294, '18/09/36/Va5YmoNMSWLt8dKJbujG4BZAp5RSJ4C4NYDJkPv2.png', 'PC_LinePay_main_japan_180607_02.png', 31331, 'application/octet-stream', 'png', '18/09/36', 'Va5YmoNMSWLt8dKJbujG4BZAp5RSJ4C4NYDJkPv2.png', 'image', 53, 53, '2018-09-07 19:40:17', '2018-09-07 19:40:17', NULL),
(295, '18/09/36/83eKEgsaZdTGw42nLQS3xXCnTPnmVhACEEtygXMr.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', '83eKEgsaZdTGw42nLQS3xXCnTPnmVhACEEtygXMr.jpg', 'image', 53, 53, '2018-09-07 19:40:17', '2018-09-07 19:40:17', NULL),
(296, '18/09/36/2EheSflPd3Summ1i8G8JDK8JA97BKEd9hlquDjnP.jpeg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', '2EheSflPd3Summ1i8G8JDK8JA97BKEd9hlquDjnP.jpeg', 'image', 53, 53, '2018-09-09 05:26:45', '2018-09-09 05:26:45', NULL),
(297, '18/09/36/JM462TOm0jV2dLFxb4BJbvxzFJaBe9YIWWmr0wtx.jpeg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'JM462TOm0jV2dLFxb4BJbvxzFJaBe9YIWWmr0wtx.jpeg', 'image', 53, 53, '2018-09-09 05:27:17', '2018-09-09 05:27:17', NULL),
(298, '18/09/36/4V24gQCaAQLMWqklKypMl0UZM3tV7HXm3l7wjnkX.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', '4V24gQCaAQLMWqklKypMl0UZM3tV7HXm3l7wjnkX.jpeg', 'image', 53, 53, '2018-09-09 05:27:26', '2018-09-09 05:27:26', NULL),
(299, '18/09/36/ev8HUgxLk2iE8hJ9qIPPEhlUHq9qO3PuGkRP9Wn5.jpeg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'ev8HUgxLk2iE8hJ9qIPPEhlUHq9qO3PuGkRP9Wn5.jpeg', 'image', 53, 53, '2018-09-09 05:27:54', '2018-09-09 05:27:54', NULL),
(300, '18/09/36/UCZC27nDGS2i2d2NVRAqAJTixTZWBmhoqLba40La.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'UCZC27nDGS2i2d2NVRAqAJTixTZWBmhoqLba40La.jpeg', 'image', 53, 53, '2018-09-09 05:28:24', '2018-09-09 05:28:24', NULL),
(301, '18/09/36/8ZgtXi3q9flj8DooisKsUHcZhubVu5Q8qYXeRqgP.jpeg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', '8ZgtXi3q9flj8DooisKsUHcZhubVu5Q8qYXeRqgP.jpeg', 'image', 53, 53, '2018-09-09 05:28:36', '2018-09-09 05:28:36', NULL),
(302, '18/09/36/JwWuOkA537aFW45MyvWuJzUS3ZJ75FwWEgRmaMHf.jpeg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'JwWuOkA537aFW45MyvWuJzUS3ZJ75FwWEgRmaMHf.jpeg', 'image', 53, 53, '2018-09-09 05:29:54', '2018-09-09 05:29:54', NULL),
(303, '18/09/36/jet6hxu46VIomkbh9bwVXobOaKlH1IollK6UsLFM.jpeg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'jet6hxu46VIomkbh9bwVXobOaKlH1IollK6UsLFM.jpeg', 'image', 53, 53, '2018-09-09 05:30:50', '2018-09-09 05:30:50', NULL),
(304, '18/09/36/8vERjlSQQ3KwpQOUy41JrWgkJDEj3D6NHnU5CB8j.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', '8vERjlSQQ3KwpQOUy41JrWgkJDEj3D6NHnU5CB8j.jpeg', 'image', 53, 53, '2018-09-09 05:31:02', '2018-09-09 05:31:02', NULL),
(305, '18/09/36/d65ko7K3yvEHZrWPWRyOSJJxffzevIGE2VLddkON.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'd65ko7K3yvEHZrWPWRyOSJJxffzevIGE2VLddkON.jpeg', 'image', 53, 53, '2018-09-09 05:31:26', '2018-09-09 05:31:26', NULL),
(306, '18/09/36/8d9boMBBfYwyCqEjWis7tHH5jB9ljkYG2JrRZbSG.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', '8d9boMBBfYwyCqEjWis7tHH5jB9ljkYG2JrRZbSG.jpg', 'image', 53, 53, '2018-09-09 06:20:49', '2018-09-09 06:20:49', NULL),
(307, '18/09/36/AzOd3zHcNSEpBK72xBVjGWqEdpAo4G3HRsgKPd4e.jpg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'AzOd3zHcNSEpBK72xBVjGWqEdpAo4G3HRsgKPd4e.jpg', 'image', 53, 53, '2018-09-09 06:20:49', '2018-09-09 06:20:49', NULL),
(308, '18/09/36/QXRga2TpqyqG2xstjusRLSgj3AX7A5jjAz3oGdkE.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'QXRga2TpqyqG2xstjusRLSgj3AX7A5jjAz3oGdkE.jpg', 'image', 53, 53, '2018-09-09 06:20:49', '2018-09-09 06:20:49', NULL),
(309, '18/09/36/6fKDnWqnR46WRC6Pf42JMgGXePdiTz15qeOK88mI.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', '6fKDnWqnR46WRC6Pf42JMgGXePdiTz15qeOK88mI.docx', 'document', 53, 53, '2018-09-09 06:20:55', '2018-09-09 06:20:55', NULL),
(310, '18/09/36/4dlpk76vqod14Gb8m5zyrd4S4eR2PHwq7vGTppcE.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', '4dlpk76vqod14Gb8m5zyrd4S4eR2PHwq7vGTppcE.docx', 'video', 53, 53, '2018-09-09 06:20:58', '2018-09-09 06:20:58', NULL),
(311, '18/09/36/KAU9Y9LW2Z8rOZUyaICuNoRDPtl4Ceq7plj91HQA.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', 'KAU9Y9LW2Z8rOZUyaICuNoRDPtl4Ceq7plj91HQA.docx', 'document', 53, 53, '2018-09-09 06:21:28', '2018-09-09 06:21:28', NULL),
(312, '18/09/36/0FY4WhKsCFc1l5PPmuXAXK9N28qBLThdiVJvSPqW.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', '0FY4WhKsCFc1l5PPmuXAXK9N28qBLThdiVJvSPqW.docx', 'video', 53, 53, '2018-09-09 06:21:30', '2018-10-07 07:27:35', NULL),
(313, '18/09/36/TiYDgVXvzvoim77YRypCMXqERb9SRXy5qfH3ymnn.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', 'TiYDgVXvzvoim77YRypCMXqERb9SRXy5qfH3ymnn.docx', 'document', 53, 53, '2018-09-09 06:26:43', '2018-09-09 06:26:43', NULL),
(314, '18/09/36/7RJ9Xtz1DStH189aMohPMaIAK77I1xlCqZBLNhu3.png', 'SnapCrab_NoName_2018-9-4_13-3-23_No-00.png', 8168, 'application/octet-stream', 'png', '18/09/36', '7RJ9Xtz1DStH189aMohPMaIAK77I1xlCqZBLNhu3.png', 'image', 53, 53, '2018-09-09 06:26:54', '2018-09-09 06:26:54', NULL),
(315, '18/09/36/6yufAarhGKngiUaHmiZQMp9GC7WA79BV3HRqrjKa.png', 'SnapCrab_NoName_2018-9-4_23-5-30_No-00.png', 8466, 'application/octet-stream', 'png', '18/09/36', '6yufAarhGKngiUaHmiZQMp9GC7WA79BV3HRqrjKa.png', 'image', 53, 53, '2018-09-09 06:26:54', '2018-09-09 06:26:54', NULL),
(316, '18/09/36/2IrRQLRBh2kj13ELqHrx7CGQVlF5X1IqusT39idu.png', 'SnapCrab_NoName_2018-9-7_18-3-11_No-00.png', 52435, 'application/octet-stream', 'png', '18/09/36', '2IrRQLRBh2kj13ELqHrx7CGQVlF5X1IqusT39idu.png', 'image', 53, 53, '2018-09-09 06:26:54', '2018-09-09 06:26:54', NULL),
(317, '18/09/36/uMZgUfxtxFVecON0LqtLcYnF4Z0hI9PWnCWX8tQ1.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', 'uMZgUfxtxFVecON0LqtLcYnF4Z0hI9PWnCWX8tQ1.docx', 'video', 53, 53, '2018-09-09 06:26:57', '2018-09-09 06:26:57', NULL),
(318, '18/09/36/NRH2uV8TmgD2Hukqt7SngLAmQZEsLhCvHVYCJHw3.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', 'NRH2uV8TmgD2Hukqt7SngLAmQZEsLhCvHVYCJHw3.docx', 'document', 53, 53, '2018-09-09 06:33:41', '2018-09-09 06:33:41', NULL),
(319, '18/09/36/sqi78w23TPWC2k8e97yYfGVUEsI5zKVS6lKAedEZ.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', 'sqi78w23TPWC2k8e97yYfGVUEsI5zKVS6lKAedEZ.docx', 'video', 53, 53, '2018-09-09 06:33:42', '2018-10-04 17:06:26', NULL),
(320, '18/09/36/3NJwC3dz2FVMhFQyuQScGoEzofeT4UprFcMQMNcZ.png', 'SnapCrab_NoName_2018-9-4_13-3-23_No-00.png', 8168, 'application/octet-stream', 'png', '18/09/36', '3NJwC3dz2FVMhFQyuQScGoEzofeT4UprFcMQMNcZ.png', 'image', 53, 53, '2018-09-09 06:34:36', '2018-09-09 06:34:36', NULL),
(321, '18/09/36/2CG7ykMK1GnsX0m0BNmfHeXHrvtKWCrBRaB9ry3W.jpeg', 'art-beach-beautiful-269583.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', '2CG7ykMK1GnsX0m0BNmfHeXHrvtKWCrBRaB9ry3W.jpeg', 'image', 53, 53, '2018-09-09 06:34:42', '2018-09-09 06:34:42', NULL),
(322, '18/09/36/E8FMtIsEIo3hsLmC5ueEjMox1bfJxTpoM10vUcNC.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', 'E8FMtIsEIo3hsLmC5ueEjMox1bfJxTpoM10vUcNC.docx', 'document', 53, 53, '2018-09-09 06:34:45', '2018-09-09 06:34:45', NULL),
(323, '18/09/36/JiMKw8CxJ7yR03kWG1iW7Eem8kCFEUJoRK4LUXaE.jpg', 'art-beach-beautiful-269583.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'JiMKw8CxJ7yR03kWG1iW7Eem8kCFEUJoRK4LUXaE.jpg', 'image', 53, 53, '2018-09-09 06:34:53', '2018-09-09 06:34:53', NULL),
(324, '18/09/36/LPbiUR4sc2FyMuQtZtVZHGT4S7EDvPL3xh9taxmv.jpg', 'cool-wallpaper-dawn-dusk-66997.jpg', 1988307, 'application/octet-stream', 'jpg', '18/09/36', 'LPbiUR4sc2FyMuQtZtVZHGT4S7EDvPL3xh9taxmv.jpg', 'image', 53, 53, '2018-09-09 06:34:53', '2018-09-09 06:34:53', NULL),
(325, '18/09/36/AmjA0jEH1CsAQxrKQav6VwD1rB9l7W8L8rAZsCJR.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', 'AmjA0jEH1CsAQxrKQav6VwD1rB9l7W8L8rAZsCJR.docx', 'video', 53, 53, '2018-09-09 06:34:55', '2018-09-09 06:34:55', NULL),
(326, '18/09/36/KtP4NrDRbwt4TrCSH0T9r9Eww0QTHS1PxXSbkUXo.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', 'KtP4NrDRbwt4TrCSH0T9r9Eww0QTHS1PxXSbkUXo.docx', 'document', 53, 53, '2018-09-09 06:35:21', '2018-09-09 06:35:21', NULL),
(327, '18/09/36/1daLh9C9Bx3QVfTsrSLtaSc8EqNumzNda5B13tGg.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', '1daLh9C9Bx3QVfTsrSLtaSc8EqNumzNda5B13tGg.docx', 'video', 53, 53, '2018-09-09 06:35:23', '2018-09-09 06:35:23', NULL),
(328, '18/09/36/oxLQqRCEu4FE7tvvqnmtlzSbEdzNL8PSBLSEYLAR.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', 'oxLQqRCEu4FE7tvvqnmtlzSbEdzNL8PSBLSEYLAR.docx', 'document', 53, 53, '2018-09-09 07:00:42', '2018-09-09 07:00:42', NULL),
(329, '18/09/36/pgoWoYzinubXL6k1dnCEXsIRdzpRGCdbn2nIflKL.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', 'pgoWoYzinubXL6k1dnCEXsIRdzpRGCdbn2nIflKL.docx', 'video', 53, 53, '2018-09-09 07:00:43', '2018-09-09 07:00:43', NULL),
(330, '18/09/36/ZmLKtuyPSrJ09NULzFIqsKy9GfZwLM5xi2gfSjXg.jpeg', 'art-beach-beautiful-269583.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', 'ZmLKtuyPSrJ09NULzFIqsKy9GfZwLM5xi2gfSjXg.jpeg', 'image', 53, 53, '2018-09-09 07:05:17', '2018-09-09 07:05:17', NULL),
(331, '18/09/36/1UAu2MhmbBXGB7q7Sy4WNWFb9dxidvKya5I5NxTO.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', '1UAu2MhmbBXGB7q7Sy4WNWFb9dxidvKya5I5NxTO.docx', 'document', 53, 53, '2018-09-09 07:05:21', '2018-09-09 07:05:21', NULL),
(332, '18/09/36/bSQFEgkfUr3wrDJGO2Om1wkPKlE1SOaHmw1SdkxQ.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'bSQFEgkfUr3wrDJGO2Om1wkPKlE1SOaHmw1SdkxQ.jpg', 'image', 53, 53, '2018-09-09 07:05:28', '2018-09-09 07:05:28', NULL),
(333, '18/09/36/b4JQ6ZSmmpUbHeLyS9Ynl0vKkfnY986pELguKt9d.jpg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'b4JQ6ZSmmpUbHeLyS9Ynl0vKkfnY986pELguKt9d.jpg', 'image', 53, 53, '2018-09-09 07:05:28', '2018-09-09 07:05:28', NULL),
(334, '18/09/36/4N3Atx9MAOSfVHKnox03dZWVr4gcjJOJwS6bkAty.jpg', 'j1bt3f26BdZZkgMtgQfzCG0OUwhrAA80hp3zDoRn.jpg', 4298947, 'application/octet-stream', 'jpg', '18/09/36', '4N3Atx9MAOSfVHKnox03dZWVr4gcjJOJwS6bkAty.jpg', 'image', 53, 53, '2018-09-09 07:05:28', '2018-09-09 07:05:28', NULL),
(335, '18/09/36/4LXUlYtMXmEBnIPVxqz13dNUP1kqtDgmjfGAm17Q.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', '4LXUlYtMXmEBnIPVxqz13dNUP1kqtDgmjfGAm17Q.docx', 'video', 53, 53, '2018-09-09 07:06:13', '2018-09-09 07:06:13', NULL),
(336, '18/09/36/QdmZMoWdtpy33F0SEvCpsDwXnEmAykbKgdPVWO90.png', 'Screenshot from 2018-09-09 12-57-36.png', 94212, 'application/octet-stream', 'png', '18/09/36', 'QdmZMoWdtpy33F0SEvCpsDwXnEmAykbKgdPVWO90.png', 'image', 53, 53, '2018-09-09 09:18:53', '2018-09-09 09:18:53', NULL),
(337, '18/09/36/lyvEVo2p5eCW11I96nVW273LPD3ZqbeR2orSyXEF.jpg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'lyvEVo2p5eCW11I96nVW273LPD3ZqbeR2orSyXEF.jpg', 'image', 53, 53, '2018-09-09 09:18:57', '2018-09-09 09:18:57', NULL),
(338, '18/09/36/vcQr9Mima7ADxVx0yBx72IUWKB9G8wqBu54qOMlK.jpg', 'e0ySdGZsCPH5uI70IRG6AlzvUshhDZeX0DMniOQS.jpg', 187852, 'application/octet-stream', 'jpg', '18/09/36', 'vcQr9Mima7ADxVx0yBx72IUWKB9G8wqBu54qOMlK.jpg', 'image', 53, 53, '2018-09-09 09:26:10', '2018-09-09 09:26:10', NULL),
(339, '18/09/36/V7dJu51RRg22dJcFPsUtmf3Z0XGPigqjd4iYNGqp.jpg', '9wfeeNcq2TtxMMAG2puIZE8elc2IHox8jrwmIn6u.jpg', 64864, 'application/octet-stream', 'jpg', '18/09/36', 'V7dJu51RRg22dJcFPsUtmf3Z0XGPigqjd4iYNGqp.jpg', 'image', 53, 53, '2018-09-09 09:26:47', '2018-09-09 09:26:47', NULL),
(340, '18/09/36/JP86TgkxiqoR2xyoy02Ux3JB2sm99h5yf2UivmgP.jpeg', 'e0ySdGZsCPH5uI70IRG6AlzvUshhDZeX0DMniOQS.jpg', 187852, 'application/octet-stream', 'jpg', '18/09/36', 'JP86TgkxiqoR2xyoy02Ux3JB2sm99h5yf2UivmgP.jpeg', 'image', 53, 53, '2018-09-09 11:26:25', '2018-09-09 11:26:25', NULL),
(341, '18/09/36/HjTRTtghDiab7YpN9XlwnylmTf23WAXlsYaLKHqh.jpg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'HjTRTtghDiab7YpN9XlwnylmTf23WAXlsYaLKHqh.jpg', 'document', 53, 53, '2018-09-09 11:26:52', '2018-09-09 11:26:52', NULL),
(342, '18/09/36/Dzbxs7hYTjQuYUwTU3zs13UOXpa15dunMHA7pdcH.docx', 'Untitled document.docx', 9553, 'application/octet-stream', 'docx', '18/09/36', 'Dzbxs7hYTjQuYUwTU3zs13UOXpa15dunMHA7pdcH.docx', 'document', 53, 53, '2018-09-09 11:26:52', '2018-09-09 11:26:52', NULL),
(343, '18/09/36/WBWLcw2kAP5vkT5TGW9Lwssqr6fhYOiAm5Fsa2ie.jpg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'WBWLcw2kAP5vkT5TGW9Lwssqr6fhYOiAm5Fsa2ie.jpg', 'image', 53, 53, '2018-09-09 11:27:01', '2018-09-09 11:27:01', NULL),
(344, '18/09/36/ND2t9zjLyGURXi7k0qAUGBMlwlX67ZPM7AvzLDJD.jpg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/36', 'ND2t9zjLyGURXi7k0qAUGBMlwlX67ZPM7AvzLDJD.jpg', 'image', 53, 53, '2018-09-09 11:27:01', '2018-09-09 11:27:01', NULL),
(345, '18/09/36/hSAqcAA4pcGCd7uL0ZQ0EnG2WMcY4ep5Rl6E5kWo.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', 'hSAqcAA4pcGCd7uL0ZQ0EnG2WMcY4ep5Rl6E5kWo.docx', 'video', 53, 53, '2018-09-09 11:27:27', '2018-09-09 11:27:27', NULL),
(346, '18/09/36/tvCsJytQzDIzYb1gMeiVxJMZkTUhQOJt4ILF4dCd.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', 'tvCsJytQzDIzYb1gMeiVxJMZkTUhQOJt4ILF4dCd.docx', 'video', 53, 53, '2018-09-09 11:28:28', '2018-09-09 11:28:28', NULL),
(347, '18/09/36/abZ8yxkwcCkqD1vJpisUt82Ld8g8J2xWdvpXXgLh.docx', 'Untitled document.docx', 8831, 'text/x-c++', 'docx', '18/09/36', 'abZ8yxkwcCkqD1vJpisUt82Ld8g8J2xWdvpXXgLh.docx', 'video', 53, 53, '2018-09-09 11:29:53', '2018-09-09 11:29:53', NULL),
(348, '18/09/36/eQmEkPNRiNXqfRqlOWObUReIg1zpQw6imKmUlkOQ.jpeg', 'sea-background-texture-14667654387Yx.jpg', 1113361, 'application/octet-stream', 'jpg', '18/09/36', 'eQmEkPNRiNXqfRqlOWObUReIg1zpQw6imKmUlkOQ.jpeg', 'image', 53, 53, '2018-09-09 12:16:20', '2018-09-09 12:16:20', NULL),
(349, '18/09/36/S4TR2EVtHKXzjhfDvWvcGBqRUUw1coKuBuvFSi22.jpeg', 'e0ySdGZsCPH5uI70IRG6AlzvUshhDZeX0DMniOQS.jpg', 187852, 'application/octet-stream', 'jpg', '18/09/36', 'S4TR2EVtHKXzjhfDvWvcGBqRUUw1coKuBuvFSi22.jpeg', 'image', 53, 53, '2018-09-09 12:22:24', '2018-09-09 12:22:24', NULL),
(350, '18/09/36/k6xBeQfROcXGH4FRZH1dmUpaEKsqWXiedl8No8vK.jpeg', '9wfeeNcq2TtxMMAG2puIZE8elc2IHox8jrwmIn6u.jpg', 64864, 'application/octet-stream', 'jpg', '18/09/36', 'k6xBeQfROcXGH4FRZH1dmUpaEKsqWXiedl8No8vK.jpeg', 'image', 53, 53, '2018-09-09 14:48:39', '2018-09-09 14:48:39', NULL),
(351, '18/09/37/LGBCt9GT89ZDSuqb2xS55nhL8MHE5rDjemTPC7Tn.jpeg', 'e0ySdGZsCPH5uI70IRG6AlzvUshhDZeX0DMniOQS.jpg', 187852, 'application/octet-stream', 'jpg', '18/09/37', 'LGBCt9GT89ZDSuqb2xS55nhL8MHE5rDjemTPC7Tn.jpeg', 'image', 53, 53, '2018-09-12 17:27:50', '2018-09-12 17:27:50', NULL),
(352, '18/09/37/fsef7CDhjatrMADVImsFLfkXSNyjVpNUvTwAghLO.jpeg', 'one-day-mysore-local-sightseeing-tour-package-glimpse-header.jpg', 101874, 'application/octet-stream', 'jpg', '18/09/37', 'fsef7CDhjatrMADVImsFLfkXSNyjVpNUvTwAghLO.jpeg', 'image', 53, 53, '2018-09-13 23:58:11', '2018-09-13 23:58:11', NULL),
(353, '18/09/38/DvYk0Oi9QmObabWj1f18KMEA2FYR7gqLkz5qnQbY.jpg', '6FMl7DLNgthy3fKcw2pkNelkq2veGmBXipD8UNIS.jpg', 187852, 'application/octet-stream', 'jpg', '18/09/38', 'DvYk0Oi9QmObabWj1f18KMEA2FYR7gqLkz5qnQbY.jpg', 'image', 53, 53, '2018-09-18 19:04:49', '2018-09-18 19:04:49', NULL),
(354, '18/09/38/pW5SJu2j4QLnGCzDSJjqJx06aLDWKIGorNsNVHnP.jpg', 'Z9EiEfvAuuEGRdRFhBTdFKVGOMEoln4O6zohxi6E.jpg', 274131, 'application/octet-stream', 'jpg', '18/09/38', 'pW5SJu2j4QLnGCzDSJjqJx06aLDWKIGorNsNVHnP.jpg', 'image', 53, 53, '2018-09-18 19:16:49', '2018-09-18 19:16:49', NULL),
(355, '18/09/38/4xSTNRxnCVvY7vJEtIZZyFubGIWAW9EU0XFd6DRb.png', 'download.png', 1616, 'application/octet-stream', 'png', '18/09/38', '4xSTNRxnCVvY7vJEtIZZyFubGIWAW9EU0XFd6DRb.png', 'image', 53, 53, '2018-09-20 18:27:38', '2018-09-20 18:27:38', NULL),
(356, '18/09/38/KIWxQoP9APKOa2d9wqUkcbAgeUtdaq2tyThvvwPZ.jpeg', 'deWREgA1ZCMjB9jC36XYlQq3ICqGYr1cTjzTDA3N.jpeg', 67792, 'application/octet-stream', 'jpeg', '18/09/38', 'KIWxQoP9APKOa2d9wqUkcbAgeUtdaq2tyThvvwPZ.jpeg', 'image', 53, 53, '2018-09-22 17:06:17', '2018-09-22 17:06:17', NULL),
(357, '18/09/39/KoCWAKj26hGPu8ibE39HrLCTDu9WggRv43wuFh1f.jpeg', 'images.jpeg', 5432, 'application/octet-stream', 'jpeg', '18/09/39', 'KoCWAKj26hGPu8ibE39HrLCTDu9WggRv43wuFh1f.jpeg', 'image', 53, 53, '2018-09-25 18:02:29', '2018-09-25 18:02:29', NULL),
(358, '18/09/39/2YmwMypUgrX95kaZEavtvL9WVtMXN9y5w6AF8snY.png', 'SnapCrab_NoName_2018-9-25_13-38-28_No-00.png', 83355, 'application/octet-stream', 'png', '18/09/39', '2YmwMypUgrX95kaZEavtvL9WVtMXN9y5w6AF8snY.png', 'image', 53, 53, '2018-09-25 18:02:45', '2018-09-25 18:02:45', NULL),
(359, '18/09/39/xjORcnrZ8t9LUfW0y4rhEAlDcjtVkLTt9NT1Ho32.jpeg', 'images.jpeg', 5432, 'application/octet-stream', 'jpeg', '18/09/39', 'xjORcnrZ8t9LUfW0y4rhEAlDcjtVkLTt9NT1Ho32.jpeg', 'image', 53, 53, '2018-09-25 18:03:18', '2018-09-25 18:03:18', NULL),
(360, '18/09/39/4M7jbY75nL8XPn3M8ihCyq0P55h7KHllV3wK5Rvj.jpeg', 'images.jpeg', 5432, 'application/octet-stream', 'jpeg', '18/09/39', '4M7jbY75nL8XPn3M8ihCyq0P55h7KHllV3wK5Rvj.jpeg', 'image', 53, 53, '2018-09-25 18:54:48', '2018-09-25 18:54:48', NULL),
(361, '18/09/39/nbmY7ZK48Cg3jcBhRv4vqsa7f0TuJhO3pviGHYHS.png', 'Screenshot from 2018-09-28 22-53-04.png', 47457, 'application/octet-stream', 'png', '18/09/39', 'nbmY7ZK48Cg3jcBhRv4vqsa7f0TuJhO3pviGHYHS.png', 'image', 53, 53, '2018-09-28 18:35:52', '2018-09-28 18:35:52', NULL),
(362, '18/09/39/r7vOrfqfRAeo64eX6id11ezofi7vU9TqmSsRNF5j.png', 'Screenshot from 2018-09-28 22-53-04.png', 47457, 'application/octet-stream', 'png', '18/09/39', 'r7vOrfqfRAeo64eX6id11ezofi7vU9TqmSsRNF5j.png', 'image', 53, 53, '2018-09-28 18:37:39', '2018-09-28 18:37:39', NULL),
(363, '18/09/39/bmGDXpPjQ30a7maWr2dEMD86r8qzUkJXNoX1Rj38.jpg', 'title-pink.jpg', 30615, 'application/octet-stream', 'jpg', '18/09/39', 'bmGDXpPjQ30a7maWr2dEMD86r8qzUkJXNoX1Rj38.jpg', 'image', 53, 53, '2018-09-29 18:04:01', '2018-09-29 18:04:01', NULL),
(364, '18/09/39/ijbsV843fRcbe9cuOCQRKbtF93kzum4mgdVdM7QU.jpg', 'title-pink.jpg', 30615, 'application/octet-stream', 'jpg', '18/09/39', 'ijbsV843fRcbe9cuOCQRKbtF93kzum4mgdVdM7QU.jpg', 'image', 53, 53, '2018-09-29 18:05:58', '2018-09-29 18:05:58', NULL),
(365, '18/09/39/lJQBCmH9ISdeKbhWPGmgO3snN2Qt0hkNNPgwGsJa.jpg', 'title-pink.jpg', 30615, 'application/octet-stream', 'jpg', '18/09/39', 'lJQBCmH9ISdeKbhWPGmgO3snN2Qt0hkNNPgwGsJa.jpg', 'image', 53, 53, '2018-09-29 18:59:42', '2018-09-29 18:59:42', NULL),
(366, '18/09/39/Ueqtr6DiQ32rNRC7sP8HrC6dR8xb5n7K2l7PRIOR.jpg', 'title-blue.jpg', 19861, 'application/octet-stream', 'jpg', '18/09/39', 'Ueqtr6DiQ32rNRC7sP8HrC6dR8xb5n7K2l7PRIOR.jpg', 'image', 53, 53, '2018-09-30 05:19:58', '2018-09-30 05:19:58', NULL),
(367, '18/09/39/tYGSTch6ebQrvDp9rfzF6dpODIk5nn07SJLzgUhI.jpg', 'title-pastel-green.jpg', 17329, 'application/octet-stream', 'jpg', '18/09/39', 'tYGSTch6ebQrvDp9rfzF6dpODIk5nn07SJLzgUhI.jpg', 'image', 53, 53, '2018-09-30 05:20:45', '2018-09-30 05:20:45', NULL),
(368, '18/09/39/R8SNVlORsNFVwa0gcdyTHMvObEqRUqkibOEvmOYE.jpg', 'title-orange.jpg', 17969, 'application/octet-stream', 'jpg', '18/09/39', 'R8SNVlORsNFVwa0gcdyTHMvObEqRUqkibOEvmOYE.jpg', 'image', 53, 53, '2018-09-30 05:21:00', '2018-09-30 05:21:00', NULL),
(369, '18/09/39/L2nTQws01VhpIRnrdA7q79EfXHmwgh22vwNT93co.jpg', 'title-pink.jpg', 30615, 'application/octet-stream', 'jpg', '18/09/39', 'L2nTQws01VhpIRnrdA7q79EfXHmwgh22vwNT93co.jpg', 'image', 53, 53, '2018-09-30 10:38:40', '2018-09-30 10:38:40', NULL),
(370, '18/10/40/J6PHP4b5zjo573ZukzqFGqhDQ5tQPHfX01BIvl9V.jpg', 'title-blue.jpg', 19861, 'application/octet-stream', 'jpg', '18/10/40', 'J6PHP4b5zjo573ZukzqFGqhDQ5tQPHfX01BIvl9V.jpg', 'image', 53, 53, '2018-10-01 17:23:03', '2018-10-01 17:23:03', NULL),
(371, '18/10/40/pPMvTWoIfJwSRd2WIKSHMQ6hoxeZAm5OCV2GM16m.jpg', 'title-pastel-green.jpg', 17329, 'application/octet-stream', 'jpg', '18/10/40', 'pPMvTWoIfJwSRd2WIKSHMQ6hoxeZAm5OCV2GM16m.jpg', 'image', 53, 53, '2018-10-01 17:52:08', '2018-10-01 17:52:08', NULL),
(372, '18/10/40/m8VrdDdFZgotE41oZt1DxECRjoQrCS4rl5b5CFDI.jpg', 'title-orange.jpg', 17969, 'application/octet-stream', 'jpg', '18/10/40', 'm8VrdDdFZgotE41oZt1DxECRjoQrCS4rl5b5CFDI.jpg', 'image', 53, 53, '2018-10-01 17:52:20', '2018-10-01 17:52:20', NULL),
(373, '18/10/40/ap5hGqJysH2lNh5OkqyLSTgGcDt6hPHzD6UfT3qr.docx', 'Untitled document.docx', 7380, 'application/octet-stream', 'docx', '18/10/40', 'ap5hGqJysH2lNh5OkqyLSTgGcDt6hPHzD6UfT3qr.docx', 'document', 53, 53, '2018-10-07 06:53:41', '2018-10-07 06:53:41', NULL),
(374, '18/10/40/MVmBaNKXdEAh1zfTQ6iH3KNWnOnwvbjVRdbkrBd6.docx', 'Untitled document.docx', 2963, 'text/x-c++', 'docx', '18/10/40', 'MVmBaNKXdEAh1zfTQ6iH3KNWnOnwvbjVRdbkrBd6.docx', 'video', 53, 53, '2018-10-07 07:03:05', '2018-10-07 07:27:35', NULL),
(375, '18/10/40/DJMZOaEmQNZJHAW2k7C2kgzKj28EFJrTkf1le7i3.docx', 'Untitled document.docx', 7380, 'application/octet-stream', 'docx', '18/10/40', 'DJMZOaEmQNZJHAW2k7C2kgzKj28EFJrTkf1le7i3.docx', 'document', 53, 53, '2018-10-07 07:29:57', '2018-10-07 07:29:57', NULL),
(376, '18/10/40/7gpb15Jqx78Ckrz3H2UbAUv6vpOCMlNylMw4GNQA.jpeg', 'download.jpeg', 15876, 'application/octet-stream', 'jpeg', '18/10/40', '7gpb15Jqx78Ckrz3H2UbAUv6vpOCMlNylMw4GNQA.jpeg', 'image', 53, 53, '2018-10-07 07:30:55', '2018-10-07 07:30:55', NULL);
INSERT INTO `media` (`id`, `path`, `original_name`, `size`, `mime`, `extension`, `location`, `hash_name`, `type`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(377, '18/10/40/06XysnBfRwnKSdRsSpUjabiywWon8Z00tJFGvsbT.docx', 'Untitled document.docx', 2963, 'text/x-c++', 'docx', '18/10/40', '06XysnBfRwnKSdRsSpUjabiywWon8Z00tJFGvsbT.docx', 'video', 53, 53, '2018-10-07 07:31:03', '2018-10-07 07:31:03', NULL),
(378, '18/10/40/PZGUmBIpuQ9PeKMGeXFVOdKwxqhrSTXdmlJ67Zqe.jpeg', 'download.jpeg', 15876, 'application/octet-stream', 'jpeg', '18/10/40', 'PZGUmBIpuQ9PeKMGeXFVOdKwxqhrSTXdmlJ67Zqe.jpeg', 'image', 53, 53, '2018-10-07 07:31:22', '2018-10-07 07:31:22', NULL),
(379, '18/10/40/VRrvcJgphfUzlK79Kp1fXptYWHGtaYsNsXTeQejP.docx', 'Untitled document.docx', 7380, 'application/octet-stream', 'docx', '18/10/40', 'VRrvcJgphfUzlK79Kp1fXptYWHGtaYsNsXTeQejP.docx', 'document', 53, 53, '2018-10-07 07:31:26', '2018-10-07 07:31:26', NULL),
(380, '18/10/40/hcuOVwJXjKZ4RVznzwwYQJ8qIkKgiT0mpFb25k9g.docx', 'Untitled document.docx', 2963, 'text/x-c++', 'docx', '18/10/40', 'hcuOVwJXjKZ4RVznzwwYQJ8qIkKgiT0mpFb25k9g.docx', 'video', 53, 53, '2018-10-07 07:31:28', '2018-10-07 07:31:28', NULL),
(381, '18/10/40/9PCr9TOwlWqNXt52HlPjyedBICFUaBzuH6uXqU6F.jpeg', 'download.jpeg', 15876, 'application/octet-stream', 'jpeg', '18/10/40', '9PCr9TOwlWqNXt52HlPjyedBICFUaBzuH6uXqU6F.jpeg', 'image', 53, 53, '2018-10-07 07:31:58', '2018-10-07 07:31:58', NULL),
(382, '18/10/40/P8Lpv7iLbJ99dAy685enjejTnXcdspH4IlKT8A4t.docx', 'Untitled document.docx', 7380, 'application/octet-stream', 'docx', '18/10/40', 'P8Lpv7iLbJ99dAy685enjejTnXcdspH4IlKT8A4t.docx', 'document', 53, 53, '2018-10-07 07:35:42', '2018-10-07 07:35:42', NULL),
(383, '18/10/40/jolUg7NuOKJdyu8gYfF0S5E8TXnVGWnQ66zKrroC.docx', 'Untitled document.docx', 2963, 'text/x-c++', 'docx', '18/10/40', 'jolUg7NuOKJdyu8gYfF0S5E8TXnVGWnQ66zKrroC.docx', 'video', 53, 53, '2018-10-07 07:35:43', '2018-10-07 07:35:43', NULL),
(384, '18/10/40/YzkGxepVvxBG6lwERz6rSTlMobaQEOeeSXsyV1pU.docx', 'Untitled document.docx', 2963, 'text/x-c++', 'docx', '18/10/40', 'YzkGxepVvxBG6lwERz6rSTlMobaQEOeeSXsyV1pU.docx', 'video', 53, 53, '2018-10-07 07:36:06', '2018-10-07 07:36:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_24_072157_create_ms_categories_table', 1),
(4, '2018_06_24_072640_create_lessons_table', 1),
(5, '2018_06_24_072701_create_lesson_details_table', 1),
(7, '2018_06_24_072742_create_media_table', 1),
(8, '2018_06_28_064544_create_lesson_suplements_table', 1),
(9, '2018_06_28_064640_create_invitations_table', 1),
(10, '2018_06_29_144925_create_lession_attachments', 1),
(11, '2018_06_29_144934_create_lession_detail_attachments', 1),
(12, '2018_07_06_035959_create_youtube_links_table', 1),
(13, '2018_07_06_090558_create_subscriptions_table', 1),
(14, '2018_07_07_015907_create_user_lessons_table', 2),
(16, '2018_06_24_072723_create_user_lesson_details_table', 3),
(18, '2018_07_17_101636_create_ms_languages_table', 4),
(19, '2018_07_18_095949_create_affiliators_table', 4),
(20, '2018_07_19_102506_create_notifications_table', 4),
(21, '2018_07_17_072950_create_user_activations_table', 5),
(22, '2018_07_23_045852_create_user_stats_table', 5),
(23, '2018_07_23_055223_create_user_learning_logs_table', 5),
(24, '2018_07_24_071650_create_user_payments_table', 5),
(25, '2018_07_25_062743_create_user_utms_table', 5),
(26, '2018_07_25_063646_create_mails_table', 5),
(27, '2018_06_28_064640_create_affiliator_invitations_table', 6),
(28, '2018_08_01_144424_create_affiliator_incomes_table', 7),
(29, '2018_08_02_173226_create_payment_logs_table', 8),
(30, '2018_08_02_173533_create_affiliator_income_logs_table', 9),
(31, '2018_08_11_040735_create_jobs_table', 10),
(33, '2018_08_20_142123_create_user_diamond_leaves_table', 11),
(35, '2018_08_30_013942_create_settings_table', 12),
(39, '2018_09_06_235831_create_youtube_link_media_table', 13),
(40, '2018_09_19_004316_create_announcements_table', 14),
(44, '2018_09_19_004938_create_ads_table', 15),
(47, '2018_09_30_164447_create_ms_category_attributes_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ms_categories`
--

CREATE TABLE `ms_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ms_categories`
--

INSERT INTO `ms_categories` (`id`, `name`, `mode`, `sort`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'swift入門', 1, 1, 53, 53, '2018-09-29 18:59:45', '2018-10-01 17:45:22', NULL),
(16, 'xxx', 1, 1, 53, 53, '2018-10-01 17:46:25', '2018-10-01 17:46:28', '2018-10-01 17:46:28'),
(17, 'xxxddd', 1, 1, 53, 53, '2018-10-02 18:04:51', '2018-10-02 18:05:24', '2018-10-02 18:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `ms_category_attributes`
--

CREATE TABLE `ms_category_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ms_category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `level` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `caption` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ms_category_attributes`
--

INSERT INTO `ms_category_attributes` (`id`, `ms_category_id`, `level`, `caption`, `media_id`, `type`, `mode`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, 1, 'swiftを基礎からマスターしよう！子供～大人の方', 369, 1, 1, 53, 53, '2018-09-30 10:43:40', '2018-09-30 10:43:40', NULL),
(2, 15, 2, '覚えるまで何度もコードを書いてみよう', 370, 1, 1, 53, 53, '2018-10-01 17:23:04', '2018-10-01 17:51:57', NULL),
(3, 15, 3, 'コードを書くのが一番近道！頑張ろう！', 371, 1, 1, 53, 53, '2018-10-01 17:52:09', '2018-10-01 17:52:09', NULL),
(4, 15, 4, '解らなことはGoogleで検索してみよう！', 372, 1, 1, 53, 53, '2018-10-01 17:52:21', '2018-10-01 17:52:21', NULL),
(5, 15, 1, 'cc', 0, 1, 1, 53, 53, '2018-10-02 18:04:05', '2018-10-02 18:04:41', '2018-10-02 18:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `ms_languages`
--

CREATE TABLE `ms_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ms_languages`
--

INSERT INTO `ms_languages` (`id`, `name`, `fullname`, `mode`, `sort`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'php', 'php', 1, 1, 99, 99, '2018-07-17 10:24:42', '2018-07-17 10:24:42', NULL),
(2, 'java', 'java', 1, 2, 99, 99, '2018-07-17 10:24:42', '2018-07-17 10:24:42', NULL),
(3, 'javascript', 'javascript', 1, 3, 99, 99, '2018-07-17 10:24:42', '2018-07-17 10:24:42', NULL),
(4, 'html', 'html5', 1, 4, 99, 99, '2018-07-17 10:24:42', '2018-07-17 10:24:42', NULL),
(5, 'css', 'css3', 1, 5, 99, 99, '2018-07-17 10:24:42', '2018-07-17 10:24:42', NULL),
(6, 'c#', 'c#', 1, 6, 99, 99, '2018-07-17 10:24:42', '2018-07-17 10:24:42', NULL),
(7, 'python', 'python', 1, 7, 99, 99, '2018-07-17 10:24:42', '2018-07-17 10:24:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `post_date`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'xxx', 'xxxx', '2018-08-11 03:35:01', 53, 53, '2018-08-10 20:35:01', '2018-08-10 20:35:01', NULL),
(2, 'yy', 'yy', '2018-08-11 03:39:01', 53, 53, '2018-08-10 20:39:01', '2018-08-10 20:39:01', NULL),
(3, 'xssss', 'sssss', '2018-08-11 04:11:49', 53, 53, '2018-08-10 21:11:49', '2018-08-10 21:11:49', NULL),
(4, 'xssss', 'sssss', '2018-08-11 04:12:00', 53, 53, '2018-08-10 21:12:00', '2018-08-10 21:12:00', NULL),
(5, 'yy', 'yyyy', '2018-08-11 04:13:05', 53, 53, '2018-08-10 21:13:05', '2018-08-10 21:13:05', NULL),
(6, 'z', 'z', '2018-08-11 04:22:11', 53, 53, '2018-08-10 21:22:11', '2018-08-10 21:22:11', NULL),
(7, 'z', 'z', '2018-08-11 04:22:51', 53, 53, '2018-08-10 21:22:51', '2018-08-10 21:22:51', NULL),
(8, 'z', 'z', '2018-08-11 04:24:45', 53, 53, '2018-08-10 21:24:45', '2018-08-10 21:24:45', NULL),
(9, 'y', 'y', '2018-08-11 04:25:25', 53, 53, '2018-08-10 21:25:25', '2018-08-10 21:25:25', NULL),
(10, 'y', 'y', '2018-08-11 04:26:34', 53, 53, '2018-08-10 21:26:34', '2018-08-10 21:26:34', NULL),
(11, 'y', 'y', '2018-08-11 04:26:57', 53, 53, '2018-08-10 21:26:57', '2018-08-10 21:26:57', NULL),
(12, 'kkkk', 'kkk\r\nkkk\r\nkkk', '2018-08-11 04:29:49', 53, 51, '2018-08-10 21:29:49', '2018-08-15 09:19:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('yunhaihuang@gmail.com', '$2y$10$RQJP1l42..2zz5.rUhI3WO..OqoZsBTi2AFJDdBSHtqGhxKz390l.', '2018-08-26 05:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `target_date` date NOT NULL,
  `affiliator_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `affiliator_commission_base` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `affiliator_commission_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `affiliator_commission` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `backend_mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `show_name`, `value`, `mode`, `type`, `backend_mode`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'slogan', 'TOPの文字列', 'iPhoneアプリ開発レッスン動画', 1, 1, 1, 1, 1, '2018-08-29 17:09:21', '2018-09-04 12:18:33', NULL),
(3, 'page_caption_before_login', 'ログイン前のTOPの文字列', 'レッスン動画99本提供中！小学１\r\n年生から大人の方もプログラミン\r\nグはじめよう！', 1, 2, 1, 1, 53, '2018-08-29 15:09:21', '2018-09-29 14:54:30', NULL),
(4, 'total_lesson', 'total_lesson', '9', 1, 1, 0, 1, 53, '2018-09-22 16:42:43', '2018-09-29 03:33:12', NULL),
(5, 'total_enable_lesson', 'total enable lesson', '9', 1, 1, 0, 1, 53, '2018-09-22 16:42:43', '2018-09-29 03:33:12', NULL),
(6, 'total_video', 'total video', '20', 1, 1, 0, 1, 53, '2018-09-22 16:42:43', '2018-10-07 07:36:06', NULL),
(7, 'total_enable_video', 'total enable video', '20', 1, 1, 0, 1, 53, '2018-09-22 16:42:43', '2018-10-07 07:36:06', NULL),
(8, 'page_caption_after_login', 'ログイン後のTOPの文字列', '見ないで書けるように頑張ろう！', 1, 2, 1, 1, 1, '2018-09-25 15:53:20', '2018-09-28 04:36:41', NULL),
(9, 'page_captionxxx', 'Caption', 'レッスン動画99本￥', 1, 1, 0, 1, 1, '2018-08-29 15:09:21', '2018-09-28 01:15:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 54, 'main', 'sub_DGnDKoqHieoFBi', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 00:35:55', '2018-07-21 00:35:55'),
(2, 54, 'main', 'sub_DGnHyCqCh3ZOFt', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 00:39:24', '2018-07-21 00:39:24'),
(3, 54, 'main', 'sub_DGswyvDe14ZPzL', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 06:30:49', '2018-07-21 06:30:49'),
(4, 54, 'main', 'sub_DGt0nHFltAkeDL', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 06:35:07', '2018-07-21 06:35:07'),
(5, 54, 'main', 'sub_DGt1zRHef8svmh', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 06:35:52', '2018-07-21 06:35:52'),
(6, 54, 'main', 'sub_DGtZLHwlDBPlQG', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 07:10:08', '2018-07-21 07:10:08'),
(7, 54, 'main', 'sub_DGu34md0DPetFD', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 07:39:44', '2018-07-21 07:39:44'),
(8, 54, 'main', 'sub_DGuAYBreMYoNoY', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 07:46:31', '2018-07-21 07:46:31'),
(9, 54, 'main', 'sub_DGueRsgwz4Ak7U', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 08:16:57', '2018-07-21 08:16:57'),
(10, 54, 'main', 'sub_DGv8LR3Dx1kdMh', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-07-21 08:47:19', '2018-07-21 08:47:19'),
(11, 81, 'main', 'sub_DLQ7H2pfrHk9zG', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-02 09:03:29', '2018-08-02 09:03:29'),
(12, 83, 'main', 'sub_DLQGG7YSaewCEE', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-02 09:12:53', '2018-08-02 09:12:53'),
(13, 101, 'main', 'sub_DLRJYwvXU8NfWZ', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, '2018-09-02 10:17:36', '2018-08-02 10:17:37', '2018-08-12 08:18:35'),
(14, 128, 'main', 'sub_DP8ToSXaSAVeFB', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, '2018-09-19 03:34:05', '2018-08-12 07:05:59', '2018-08-12 07:05:59'),
(15, 132, 'main', 'sub_DRiFdByjwHDT1I', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, '2018-09-19 04:11:23', '2018-08-19 04:11:25', '2018-08-20 07:35:17'),
(16, 132, 'main', 'sub_DS9weBf2JRREhq', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-20 08:49:14', '2018-08-20 08:49:14'),
(17, 132, 'main', 'sub_DSA1dyd1N9LSku', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, '2018-09-20 17:53:50', '2018-08-20 08:53:52', '2018-08-21 13:33:21'),
(18, 136, 'main', 'sub_DTDvCGc7pT7dYI', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-23 13:59:38', '2018-08-23 13:59:38'),
(19, 137, 'main', 'sub_DTE0g8PoxfKRrQ', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-23 14:04:44', '2018-08-23 14:04:44'),
(20, 130, 'main', 'sub_DTehnTtrbPC01c', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-24 17:39:36', '2018-08-24 17:39:36'),
(21, 140, 'main', 'sub_DV5lteEeK9Lm0L', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-28 13:41:53', '2018-08-28 13:41:53'),
(22, 140, 'main', 'sub_DV5mtYlZX1HChY', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-28 13:42:40', '2018-08-28 13:42:40'),
(23, 141, 'main', 'sub_DV5p6VyjzPGaRD', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-08-28 13:45:26', '2018-08-28 13:45:26'),
(24, 102, 'main', 'sub_DZe8pOH6i0xUop', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-09 17:28:40', '2018-09-09 17:28:40'),
(25, 101, 'main', 'sub_DbWV1tsHe8FGe0', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-14 17:43:29', '2018-09-14 17:43:29'),
(26, 105, 'main', 'sub_DbXWc0TWnuZA3O', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-14 18:47:17', '2018-09-14 18:47:17'),
(27, 106, 'main', 'sub_DbXbANnejfwbW5', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-14 18:51:47', '2018-09-14 18:51:47'),
(28, 108, 'main', 'sub_DbXl6NTtpm6bel', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-14 19:01:44', '2018-09-14 19:01:44'),
(29, 111, 'main', 'sub_DbXvW61lxVuAV5', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-14 19:11:37', '2018-09-14 19:11:37'),
(30, 101, 'main', 'sub_Dbt2gVTCxT3aCU', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-15 17:00:45', '2018-09-15 17:00:45'),
(31, 124, 'main', 'sub_DbvkhQwI745kWj', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-15 19:48:30', '2018-09-15 19:48:30'),
(33, 128, 'main', 'sub_DbwKKXfAgaK37I', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-15 20:25:07', '2018-09-15 20:25:07'),
(34, 101, 'main', 'sub_DcB7HfupuPdVHA', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-16 11:41:31', '2018-09-16 11:41:31'),
(35, 130, 'main', 'sub_DfHGwu0TKsCswE', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-24 18:14:57', '2018-09-24 18:14:57'),
(36, 131, 'main', 'sub_DfHeeLhp42zNaN', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-24 18:38:23', '2018-09-24 18:38:23'),
(37, 132, 'main', 'sub_DfHgEp3yJ2sTCO', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-24 18:41:11', '2018-09-24 18:41:11'),
(38, 133, 'main', 'sub_DfHi2IMfWMRwta', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-24 18:43:05', '2018-09-24 18:43:05'),
(39, 134, 'main', 'sub_DfI19ML6Dx9TaG', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-24 19:01:33', '2018-09-24 19:01:33'),
(40, 135, 'main', 'sub_DfI5B6jqjP0puM', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, NULL, '2018-09-24 19:05:24', '2018-09-24 19:05:24'),
(41, 129, 'main', 'sub_DfznY4QIEj99ji', 'MEMBERSHIP_FEE_MONTHLY', 1, NULL, '2018-10-26 16:15:20', '2018-09-26 16:15:21', '2018-09-26 16:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `grade` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `affiliator_id` int(11) NOT NULL DEFAULT '0',
  `provider` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `provider_user_id` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `diamond_ends_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `grade`, `mode`, `affiliator_id`, `provider`, `provider_user_id`, `user_id`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `diamond_ends_at`, `remember_token`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(52, 'Hau Le', 'haulenhan@gmail.com', '$2y$10$7zy2vsWqV2QnTJYYGZKe4eiRGFlPYhHO3HfFZZSkRnSUqgl1mzPfy', 2, 0, 1, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2018-08-03 22:20:42', NULL, NULL),
(53, 'Admin', 'admin@programinggo.com', '$2y$10$sxqtPwYG84F4dIFy9FqrIe.sTMGHO8Wu9XoADoXwgyKPK4oBQ1k9O', 2, 0, 1, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, 'GFshO9rG5TXxbiKYR8PnK0ST6w078WCGyShJlgSeKGQnx7fEn9QYcy0muJDB', 0, 0, '2018-08-03 22:20:42', '2018-08-03 22:02:07', NULL),
(54, 'User', 'user@programinggo.com', '$2y$10$7zy2vsWqV2QnTJYYGZKe4eiRGFlPYhHO3HfFZZSkRnSUqgl1mzPfy', 1, 3, 0, 1, '', '', 0, 'cus_DGnDf2r1MmpFd9', 'Visa', '5556', NULL, NULL, NULL, 0, 0, '2018-08-03 22:20:42', '2018-08-02 10:42:12', NULL),
(100, 'Affiliator', 'affiliator@pg.me', '$2y$10$IGnFtUjTBDK9gxXHXpc0De0ahAwbCtHy5SFqxJZoyBqQXO6Rql6lG', 3, 0, 1, 2, '', '', 0, NULL, NULL, NULL, NULL, NULL, 'Aymk8FEgKBZVk3Qh0eEFgDxHx4rPl3rsoxR2WHjWmTtqcc7tS9Q8WfamERQy', 0, 0, '2018-08-03 22:20:42', '2018-08-03 22:20:42', NULL),
(101, 'yunhaihuang', 'yunhaihuang+1713@gmail.com', '$2y$10$S02QwMpRmrQJiOj17peJ/ufniferM3kVPMndltO2BGdMj8qlH/Gdm', 1, 1, 1, 0, '', '', 101, 'cus_DbWVSDeFe2QU8U', 'Visa', '4242', NULL, NULL, 'QlnphqInpvxVTlzzHvFcM8JZhpCyKJnI0gLeusH54aBZc3GV0lrL8GzqBxJk', 101, 0, '2018-09-09 02:49:29', '2018-09-16 12:13:57', NULL),
(102, 'yunhaihuang+diamond', 'yunhaihuang+diamond@gmail.com', '$2y$10$9l0H5c8QzJluPLdonv5EOe7xDWzrADQfBqpxIWk22tayncZkzryUC', 1, 2, 1, 0, '', '', 102, 'cus_DZe8B5iExfssB6', 'Visa', '4242', NULL, NULL, 'zA5vZKRAzRk21AG5cdDEO9Ib1H82s52MQHQPl32uBVd1nXI5S0dsKXeAGs4i', 102, 0, '2018-09-09 17:27:39', '2018-09-09 17:28:38', NULL),
(103, 'yunhaihuang2326', 'yunhaihuang2326@gmail.com', '$2y$10$hi.idqgNl8Q2NW4tDoiH2.jn89dkDLVwzeomZFnAOQEKiNQCTBq5a', 1, 3, 0, 0, '', '', 103, NULL, NULL, NULL, NULL, NULL, NULL, 103, 0, '2018-09-14 18:37:27', '2018-09-14 18:37:28', NULL),
(104, 'haitm789+test1', 'haitm789+test1@gmail.com', '$2y$10$rO6.sMEdV6xWbl1elWNM8OSbmrEmhRfDEb0lyJFA2f9Qf4xkwXf5C', 1, 3, 1, 0, '', '', 104, NULL, NULL, NULL, NULL, NULL, '47hpXpo7BwNgtGjPiJCRbZwYZTAjRIk80zPosBI3Q8S2sSEMR0hOy9TbItsV', 104, 0, '2018-09-14 18:43:56', '2018-09-14 18:44:11', NULL),
(105, 'haitm789+2', 'haitm789+2@gmail.com', '$2y$10$LF.GTAZe9xnBhnmQG8Zia.daiTPpBZOi2MQGRhXk47ViKOCAge3r.', 1, 1, 1, 0, '', '', 105, 'cus_DbXWMTBAJWdMrV', 'Visa', '4242', NULL, NULL, 'GPyNbkbivRXqCOZFQMQC5laUD5p7BHemRuocsFA9eNjdQ6Rov9sJ8vtEXqO8', 105, 0, '2018-09-14 18:45:53', '2018-09-14 18:47:15', NULL),
(106, 'haitm789+diamond2', 'haitm789+diamond2@gmail.com', '$2y$10$qZEbf5/QsLhCM8af3t1Yfu0WtYiD.CY.WKOB1CE9t05ye73fubnA2', 1, 3, 0, 0, '', '', 106, 'cus_DbXbV1YrrrmDlt', 'Visa', '4242', NULL, NULL, NULL, 106, 0, '2018-09-14 18:51:38', '2018-09-14 18:51:44', NULL),
(107, 'haitm789+diamond3', 'haitm789+diamond3@gmail.com', '$2y$10$rXmpKiL6QkkPw0lPYJnquuOhYoxrL6VQV64BlgJOp0W7vR6kuWWLO', 1, 2, 0, 0, '', '', 107, NULL, NULL, NULL, NULL, NULL, NULL, 107, 0, '2018-09-14 18:59:05', '2018-09-14 18:59:06', NULL),
(108, 'haitm789+diamond5', 'haitm789+diamond5@gmail.com', '$2y$10$5MfCasA29Cfqdqmihqezk.LP1arr9jGphtgYYos3oxGkkEPlhK/oG', 1, 2, 0, 0, '', '', 108, 'cus_DbXlpmd77j6BUA', 'Visa', '4242', NULL, NULL, NULL, 108, 0, '2018-09-14 19:01:35', '2018-09-14 19:01:41', NULL),
(111, 'haitm789+diamond6', 'haitm789+diamond6@gmail.com', '$2y$10$C14Xu26Q/X9OymK/qQ9/gOCIy8EvgDTjJKXIoSyVEP76g86b1uKhW', 1, 2, 1, 0, '', '', 111, 'cus_DbXvm0Vb3OpjXt', 'Visa', '4242', NULL, NULL, '2COEwUixLlyPguKkv3xja6nzRcu6ekT6pD1fK7054Ea3YGhPhjUp06RiNZ9B', 111, 0, '2018-09-14 19:11:28', '2018-09-14 19:11:35', NULL),
(124, 'yunhaihuang', 'yunhaihuang+124@gmail.com', '$2y$10$sxqtPwYG84F4dIFy9FqrIe.sTMGHO8Wu9XoADoXwgyKPK4oBQ1k9O', 1, 3, 1, 0, '', '', 124, 'cus_DbvkKIBnnKoAZI', 'Visa', '4242', NULL, NULL, '5yR5cNvqnVF7tWqYAwO3u8yjvLFZtEyxBoKgmwVLBWsIHLLSpDv8JSwPaxqK', 124, 0, '2018-09-15 19:48:21', '2018-09-15 19:48:28', NULL),
(128, 'haitm789+diamond09160122', 'haitm789+diamond09160122@gmail.com', '$2y$10$gPiANNUwxnEapC/ZRuz0xumtBD4b86T7jsXNF6RXlME8vTK1L2muO', 1, 2, 1, 0, '', '', 128, 'cus_DbwKYeR3ePZ7Zb', 'Visa', '4242', NULL, NULL, NULL, 128, 0, '2018-09-15 20:24:59', '2018-09-15 20:25:12', NULL),
(129, 'yunhaihuang', 'yunhaihuang@gmail.com', '$2y$10$dSihPJi7KZAnKsVwRDMe0OtknGTxIYKEJoM1KOjv0OTFypCtvOluS', 1, 1, 1, 0, '', '', 129, 'cus_DfzmgddFFJvHU6', 'Visa', '4242', NULL, '2018-10-26 16:15:20', 'bpk4nHEgiIea7ZbBEpjRCBHEXdmVHHYdweQVHMKQItxhIZmeYN2FzPxWABzV', 129, 0, '2018-09-16 13:42:26', '2018-09-26 16:18:05', NULL),
(130, 'yunhaihuang+2314', 'yunhaihuang+2314@gmail.com', '$2y$10$jWpvKbu2oTdwpM3yLWNEH.saNZVPktKEXkB/uiac.TZzt8A4Lhf02', 1, 2, 1, 0, '', '', 130, 'cus_DfHGWJpun6npJD', 'Visa', '4242', NULL, NULL, 'l4S9eEEPpZ3KVc6XP1vxJ6pvkYzYsdZ3ryTGCTNWRzYbsTLCxc6jiRMHSO3K', 130, 0, '2018-09-24 18:14:49', '2018-09-24 18:15:02', NULL),
(131, 'yunhaihuang+2337', 'yunhaihuang+2337@gmail.com', '$2y$10$IlGu.2xHT4nUJlDXv.hSX.CLa3I99D3FTvmpzoNbqbzhf6cevATk.', 1, 2, 1, 0, '', '', 131, 'cus_DfHdwXB9dwY9SA', 'Visa', '4242', NULL, NULL, 'vCymNar8KqyMWdQfPoA4SxWIIkLW9FGJWwksoFmN1VQ7ysXu2xAHcwk4R1qa', 131, 0, '2018-09-24 18:38:15', '2018-09-24 18:38:29', NULL),
(132, 'yunhaihuang+2340', 'yunhaihuang+2340@gmail.com', '$2y$10$ACmavie/5/tkjdcqtGM2ROb3yMDTwf8CmtpfeP67.e.tfjlZpDeVe', 1, 2, 1, 0, '', '', 132, 'cus_DfHge2Bfk60Uk5', 'Visa', '4242', NULL, NULL, NULL, 132, 0, '2018-09-24 18:41:03', '2018-09-24 18:41:16', NULL),
(133, 'yunhaihuang+42', 'yunhaihuang+42@gmail.com', '$2y$10$qZgjGCZ8LAjxaZNr54FpV.m6PA.53xFQA9LgvkmaBx2M5Mi8M3K6y', 1, 2, 1, 0, '', '', 133, 'cus_DfHi2aMocW8ZBy', 'Visa', '4242', NULL, NULL, 'hFI7TD6oRHEoFEbEUstwYfpWuMCZYKK7GeYiDow0pqqAJVMtxCqBPzqoASct', 133, 0, '2018-09-24 18:42:58', '2018-09-24 18:43:10', NULL),
(134, 'yunhaihuang+0001', 'yunhaihuang+0001@gmail.com', '$2y$10$uc8mySHBPDdSqPi0KxOG4um.bU6nllxhAxCxs1ual53ldySbzde1m', 1, 2, 1, 0, '', '', 134, 'cus_DfI1nTXKL9ZAHg', 'Visa', '4242', NULL, NULL, 'RWASjOyo5JZi9rulhy77fykRQOC7BOw8mN4qEMvdJCrO1YOU46lLcCIu0bnc', 134, 0, '2018-09-24 19:01:24', '2018-09-24 19:01:39', NULL),
(135, 'yunhaihuang+0004', 'yunhaihuang+0004@gmail.com', '$2y$10$SZPkWmVScWKboh9UT0JC5eh4q6eOJQCpfzbHf7PNRxoCvggfliho2', 1, 2, 1, 0, '', '', 135, 'cus_DfI43T3b0jwazv', 'Visa', '4242', NULL, NULL, 'PIWDnSgRBrBRx8aKB7YIdwppCFTl0gVE5FHg4WhegKBB1vCYl6vUemuT68NO', 135, 0, '2018-09-24 19:05:16', '2018-09-24 19:05:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_diamond_leaves`
--

CREATE TABLE `user_diamond_leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_diamond_leaves`
--

INSERT INTO `user_diamond_leaves` (`id`, `user_id`, `ends_at`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 132, '2018-09-19 04:11:23', 132, 0, '2018-08-20 07:39:15', '2018-08-20 07:39:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_learning_logs`
--

CREATE TABLE `user_learning_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lesson_detail_id` int(10) UNSIGNED NOT NULL,
  `learning_date` date NOT NULL,
  `learning_time` time NOT NULL,
  `learning_duration` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_learning_logs`
--

INSERT INTO `user_learning_logs` (`id`, `user_id`, `lesson_detail_id`, `learning_date`, `learning_time`, `learning_duration`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 99, 6, '2018-08-04', '08:30:56', 0, 99, 0, '2018-08-04 01:30:56', '2018-08-04 01:30:56', NULL),
(2, 99, 6, '2018-08-04', '08:31:40', 0, 99, 0, '2018-08-04 01:31:40', '2018-08-04 01:31:40', NULL),
(3, 99, 6, '2018-08-04', '08:33:35', 0, 99, 0, '2018-08-04 01:33:35', '2018-08-04 01:33:35', NULL),
(4, 99, 6, '2018-08-04', '08:37:15', 0, 99, 0, '2018-08-04 01:37:15', '2018-08-04 01:37:15', NULL),
(5, 99, 1, '2018-08-09', '16:17:13', 0, 99, 0, '2018-08-09 09:17:13', '2018-08-09 09:17:13', NULL),
(6, 99, 4, '2018-08-09', '17:00:40', 0, 99, 0, '2018-08-09 10:00:40', '2018-08-09 10:00:40', NULL),
(7, 99, 1, '2018-08-11', '06:07:44', 0, 99, 0, '2018-08-10 23:07:44', '2018-08-10 23:07:44', NULL),
(8, 99, 1, '2018-08-11', '06:08:10', 0, 99, 0, '2018-08-10 23:08:10', '2018-08-10 23:08:10', NULL),
(9, 99, 1, '2018-08-11', '06:09:01', 0, 99, 0, '2018-08-10 23:09:01', '2018-08-10 23:09:01', NULL),
(10, 99, 1, '2018-08-11', '06:10:38', 0, 99, 0, '2018-08-10 23:10:38', '2018-08-10 23:10:38', NULL),
(11, 99, 1, '2018-08-11', '06:14:16', 0, 99, 0, '2018-08-10 23:14:16', '2018-08-10 23:14:16', NULL),
(12, 99, 1, '2018-08-11', '06:15:30', 0, 99, 0, '2018-08-10 23:15:30', '2018-08-10 23:15:30', NULL),
(13, 99, 1, '2018-08-11', '06:20:30', 0, 99, 0, '2018-08-10 23:20:30', '2018-08-10 23:20:30', NULL),
(14, 99, 1, '2018-08-11', '06:20:50', 0, 99, 0, '2018-08-10 23:20:50', '2018-08-10 23:20:50', NULL),
(15, 99, 1, '2018-08-11', '07:06:22', 0, 99, 0, '2018-08-11 00:06:22', '2018-08-11 00:06:22', NULL),
(16, 99, 1, '2018-08-11', '08:56:11', 0, 99, 0, '2018-08-11 01:56:11', '2018-08-11 01:56:11', NULL),
(17, 99, 1, '2018-08-11', '08:59:31', 0, 99, 0, '2018-08-11 01:59:31', '2018-08-11 01:59:31', NULL),
(18, 99, 7, '2018-08-11', '14:31:22', 311, 99, 0, '2018-08-11 07:31:22', '2018-08-11 07:31:22', NULL),
(19, 99, 7, '2018-08-11', '14:34:26', 311, 99, 0, '2018-08-11 07:34:26', '2018-08-11 07:34:26', NULL),
(20, 99, 1, '2018-08-11', '14:34:34', 0, 99, 0, '2018-08-11 07:34:34', '2018-08-11 07:34:34', NULL),
(21, 99, 1, '2018-08-11', '14:34:55', 0, 99, 0, '2018-08-11 07:34:55', '2018-08-11 07:34:55', NULL),
(22, 99, 1, '2018-08-11', '14:37:16', 0, 99, 0, '2018-08-11 07:37:16', '2018-08-11 07:37:16', NULL),
(23, 99, 7, '2018-08-11', '15:04:17', 311, 99, 0, '2018-08-11 08:04:17', '2018-08-11 08:04:17', NULL),
(24, 99, 1, '2018-08-12', '02:57:20', 0, 99, 0, '2018-08-11 19:57:20', '2018-08-11 19:57:20', NULL),
(25, 99, 1, '2018-08-12', '02:57:34', 0, 99, 0, '2018-08-11 19:57:34', '2018-08-11 19:57:34', NULL),
(26, 99, 1, '2018-08-12', '02:59:03', 0, 99, 0, '2018-08-11 19:59:03', '2018-08-11 19:59:03', NULL),
(27, 99, 1, '2018-08-12', '03:00:15', 0, 99, 0, '2018-08-11 20:00:15', '2018-08-11 20:00:15', NULL),
(28, 99, 1, '2018-08-12', '03:00:56', 0, 99, 0, '2018-08-11 20:00:56', '2018-08-11 20:00:56', NULL),
(29, 99, 1, '2018-08-12', '03:01:39', 0, 99, 0, '2018-08-11 20:01:39', '2018-08-11 20:01:39', NULL),
(30, 99, 1, '2018-08-12', '03:02:21', 0, 99, 0, '2018-08-11 20:02:21', '2018-08-11 20:02:21', NULL),
(31, 99, 1, '2018-08-12', '03:03:36', 0, 99, 0, '2018-08-11 20:03:36', '2018-08-11 20:03:36', NULL),
(32, 99, 1, '2018-08-12', '03:03:51', 0, 99, 0, '2018-08-11 20:03:51', '2018-08-11 20:03:51', NULL),
(33, 99, 1, '2018-08-12', '03:05:29', 0, 99, 0, '2018-08-11 20:05:29', '2018-08-11 20:05:29', NULL),
(34, 99, 1, '2018-08-12', '03:06:25', 0, 99, 0, '2018-08-11 20:06:25', '2018-08-11 20:06:25', NULL),
(35, 99, 1, '2018-08-12', '03:11:58', 0, 99, 0, '2018-08-11 20:11:58', '2018-08-11 20:11:58', NULL),
(36, 99, 1, '2018-08-12', '03:12:13', 0, 99, 0, '2018-08-11 20:12:13', '2018-08-11 20:12:13', NULL),
(37, 99, 1, '2018-08-12', '03:15:27', 0, 99, 0, '2018-08-11 20:15:27', '2018-08-11 20:15:27', NULL),
(38, 99, 1, '2018-08-12', '03:21:36', 0, 99, 0, '2018-08-11 20:21:36', '2018-08-11 20:21:36', NULL),
(39, 99, 1, '2018-08-12', '03:22:40', 0, 99, 0, '2018-08-11 20:22:40', '2018-08-11 20:22:40', NULL),
(40, 99, 1, '2018-08-12', '03:24:14', 0, 99, 0, '2018-08-11 20:24:14', '2018-08-11 20:24:14', NULL),
(41, 99, 1, '2018-08-12', '03:32:09', 0, 99, 0, '2018-08-11 20:32:09', '2018-08-11 20:32:09', NULL),
(42, 99, 1, '2018-08-12', '03:33:18', 0, 99, 0, '2018-08-11 20:33:18', '2018-08-11 20:33:18', NULL),
(43, 99, 1, '2018-08-12', '04:20:02', 0, 99, 0, '2018-08-11 21:20:02', '2018-08-11 21:20:02', NULL),
(44, 99, 1, '2018-08-12', '04:20:20', 0, 99, 0, '2018-08-11 21:20:20', '2018-08-11 21:20:20', NULL),
(45, 99, 1, '2018-08-12', '04:21:31', 0, 99, 0, '2018-08-11 21:21:31', '2018-08-11 21:21:31', NULL),
(46, 99, 1, '2018-08-12', '04:21:54', 0, 99, 0, '2018-08-11 21:21:54', '2018-08-11 21:21:54', NULL),
(47, 99, 1, '2018-08-12', '04:22:39', 0, 99, 0, '2018-08-11 21:22:39', '2018-08-11 21:22:39', NULL),
(48, 99, 7, '2018-08-12', '04:22:55', 311, 99, 0, '2018-08-11 21:22:55', '2018-08-11 21:22:55', NULL),
(49, 99, 1, '2018-08-12', '04:23:33', 0, 99, 0, '2018-08-11 21:23:33', '2018-08-11 21:23:33', NULL),
(50, 99, 7, '2018-08-12', '04:25:54', 311, 99, 0, '2018-08-11 21:25:54', '2018-08-11 21:25:54', NULL),
(51, 99, 1, '2018-08-12', '04:26:07', 0, 99, 0, '2018-08-11 21:26:07', '2018-08-11 21:26:07', NULL),
(52, 99, 7, '2018-08-12', '04:26:11', 311, 99, 0, '2018-08-11 21:26:11', '2018-08-11 21:26:11', NULL),
(53, 99, 7, '2018-08-12', '04:30:18', 311, 99, 0, '2018-08-11 21:30:18', '2018-08-11 21:30:18', NULL),
(54, 99, 7, '2018-08-12', '04:31:38', 311, 99, 0, '2018-08-11 21:31:38', '2018-08-11 21:31:38', NULL),
(55, 99, 7, '2018-08-12', '04:32:12', 311, 99, 0, '2018-08-11 21:32:12', '2018-08-11 21:32:12', NULL),
(56, 99, 7, '2018-08-12', '04:37:53', 311, 99, 0, '2018-08-11 21:37:53', '2018-08-11 21:37:53', NULL),
(57, 99, 7, '2018-08-12', '04:42:19', 311, 99, 0, '2018-08-11 21:42:19', '2018-08-11 21:42:19', NULL),
(58, 99, 1, '2018-08-12', '06:55:17', 0, 99, 0, '2018-08-11 23:55:17', '2018-08-11 23:55:17', NULL),
(59, 99, 1, '2018-08-12', '06:55:30', 0, 99, 0, '2018-08-11 23:55:30', '2018-08-11 23:55:30', NULL),
(60, 99, 7, '2018-08-12', '06:55:32', 311, 99, 0, '2018-08-11 23:55:32', '2018-08-11 23:55:32', NULL),
(61, 101, 7, '2018-08-12', '06:58:54', 311, 101, 0, '2018-08-11 23:58:54', '2018-08-11 23:58:54', NULL),
(62, 101, 1, '2018-08-12', '06:58:57', 0, 101, 0, '2018-08-11 23:58:57', '2018-08-11 23:58:57', NULL),
(63, 101, 7, '2018-08-12', '07:04:41', 311, 101, 0, '2018-08-12 00:04:41', '2018-08-12 00:04:41', NULL),
(64, 101, 1, '2018-08-12', '07:04:42', 0, 101, 0, '2018-08-12 00:04:42', '2018-08-12 00:04:42', NULL),
(65, 101, 1, '2018-08-12', '07:05:42', 0, 101, 0, '2018-08-12 00:05:42', '2018-08-12 00:05:42', NULL),
(66, 101, 7, '2018-08-12', '07:08:04', 311, 101, 0, '2018-08-12 00:08:04', '2018-08-12 00:08:04', NULL),
(67, 101, 1, '2018-08-12', '07:08:45', 0, 101, 0, '2018-08-12 00:08:45', '2018-08-12 00:08:45', NULL),
(68, 101, 7, '2018-08-12', '07:08:58', 311, 101, 0, '2018-08-12 00:08:58', '2018-08-12 00:08:58', NULL),
(69, 101, 7, '2018-08-12', '07:12:23', 311, 101, 0, '2018-08-12 00:12:23', '2018-08-12 00:12:23', NULL),
(70, 99, 1, '2018-08-12', '07:12:40', 0, 99, 0, '2018-08-12 00:12:40', '2018-08-12 00:12:40', NULL),
(71, 99, 7, '2018-08-12', '07:12:42', 311, 99, 0, '2018-08-12 00:12:42', '2018-08-12 00:12:42', NULL),
(72, 99, 7, '2018-08-12', '07:12:48', 311, 99, 0, '2018-08-12 00:12:48', '2018-08-12 00:12:48', NULL),
(73, 99, 1, '2018-08-12', '07:17:05', 0, 99, 0, '2018-08-12 00:17:05', '2018-08-12 00:17:05', NULL),
(74, 99, 1, '2018-08-12', '07:24:55', 0, 99, 0, '2018-08-12 00:24:55', '2018-08-12 00:24:55', NULL),
(75, 99, 1, '2018-08-12', '07:25:03', 0, 99, 0, '2018-08-12 00:25:03', '2018-08-12 00:25:03', NULL),
(76, 99, 1, '2018-08-12', '07:25:55', 0, 99, 0, '2018-08-12 00:25:55', '2018-08-12 00:25:55', NULL),
(77, 101, 7, '2018-08-12', '07:26:43', 311, 101, 0, '2018-08-12 00:26:43', '2018-08-12 00:26:43', NULL),
(78, 101, 1, '2018-08-12', '07:26:45', 0, 101, 0, '2018-08-12 00:26:45', '2018-08-12 00:26:45', NULL),
(79, 101, 1, '2018-08-12', '07:27:02', 0, 101, 0, '2018-08-12 00:27:02', '2018-08-12 00:27:02', NULL),
(80, 101, 7, '2018-08-12', '07:27:11', 311, 101, 0, '2018-08-12 00:27:11', '2018-08-12 00:27:11', NULL),
(81, 101, 1, '2018-08-12', '08:05:23', 0, 101, 0, '2018-08-12 01:05:23', '2018-08-12 01:05:23', NULL),
(82, 101, 1, '2018-08-12', '08:05:45', 0, 101, 0, '2018-08-12 01:05:45', '2018-08-12 01:05:45', NULL),
(83, 101, 1, '2018-08-12', '08:06:47', 0, 101, 0, '2018-08-12 01:06:47', '2018-08-12 01:06:47', NULL),
(84, 101, 7, '2018-08-12', '08:06:54', 311, 101, 0, '2018-08-12 01:06:54', '2018-08-12 01:06:54', NULL),
(85, 101, 7, '2018-08-12', '08:07:44', 311, 101, 0, '2018-08-12 01:07:44', '2018-08-12 01:07:44', NULL),
(86, 101, 7, '2018-08-12', '08:08:46', 311, 101, 0, '2018-08-12 01:08:46', '2018-08-12 01:08:46', NULL),
(87, 101, 7, '2018-08-12', '08:10:03', 311, 101, 0, '2018-08-12 01:10:03', '2018-08-12 01:10:03', NULL),
(88, 101, 9, '2018-08-12', '08:10:23', 287, 101, 0, '2018-08-12 01:10:23', '2018-08-12 01:10:23', NULL),
(89, 99, 1, '2018-08-12', '12:14:38', 0, 99, 0, '2018-08-12 05:14:38', '2018-08-12 05:14:38', NULL),
(90, 99, 1, '2018-08-12', '12:15:01', 0, 99, 0, '2018-08-12 05:15:01', '2018-08-12 05:15:01', NULL),
(91, 101, 1, '2018-08-12', '12:16:50', 0, 101, 0, '2018-08-12 05:16:50', '2018-08-12 05:16:50', NULL),
(92, 99, 1, '2018-08-12', '12:17:19', 0, 99, 0, '2018-08-12 05:17:19', '2018-08-12 05:17:19', NULL),
(93, 101, 1, '2018-08-12', '12:17:25', 0, 101, 0, '2018-08-12 05:17:25', '2018-08-12 05:17:25', NULL),
(94, 99, 1, '2018-08-12', '12:20:36', 0, 99, 0, '2018-08-12 05:20:36', '2018-08-12 05:20:36', NULL),
(95, 99, 1, '2018-08-12', '12:21:34', 0, 99, 0, '2018-08-12 05:21:34', '2018-08-12 05:21:34', NULL),
(96, 129, 1, '2018-08-13', '15:28:58', 0, 129, 0, '2018-08-13 08:28:58', '2018-08-13 08:28:58', NULL),
(97, 129, 1, '2018-08-13', '15:38:28', 0, 129, 0, '2018-08-13 08:38:28', '2018-08-13 08:38:28', NULL),
(98, 129, 1, '2018-08-13', '15:38:39', 0, 129, 0, '2018-08-13 08:38:39', '2018-08-13 08:38:39', NULL),
(99, 129, 1, '2018-08-13', '15:39:42', 0, 129, 0, '2018-08-13 08:39:42', '2018-08-13 08:39:42', NULL),
(100, 127, 7, '2018-08-13', '15:59:35', 311, 127, 0, '2018-08-13 08:59:35', '2018-08-13 08:59:35', NULL),
(101, 127, 1, '2018-08-13', '15:59:44', 0, 127, 0, '2018-08-13 08:59:44', '2018-08-13 08:59:44', NULL),
(102, 127, 1, '2018-08-13', '16:00:09', 0, 127, 0, '2018-08-13 09:00:09', '2018-08-13 09:00:09', NULL),
(103, 127, 1, '2018-08-13', '16:04:59', 0, 127, 0, '2018-08-13 09:04:59', '2018-08-13 09:04:59', NULL),
(104, 127, 7, '2018-08-13', '16:05:00', 311, 127, 0, '2018-08-13 09:05:00', '2018-08-13 09:05:00', NULL),
(105, 127, 1, '2018-08-13', '16:05:20', 0, 127, 0, '2018-08-13 09:05:20', '2018-08-13 09:05:20', NULL),
(106, 127, 1, '2018-08-13', '16:06:38', 0, 127, 0, '2018-08-13 09:06:38', '2018-08-13 09:06:38', NULL),
(107, 127, 1, '2018-08-13', '16:07:19', 0, 127, 0, '2018-08-13 09:07:19', '2018-08-13 09:07:19', NULL),
(108, 127, 1, '2018-08-13', '16:07:35', 0, 127, 0, '2018-08-13 09:07:35', '2018-08-13 09:07:35', NULL),
(109, 127, 1, '2018-08-13', '16:08:27', 0, 127, 0, '2018-08-13 09:08:27', '2018-08-13 09:08:27', NULL),
(110, 127, 7, '2018-08-13', '16:08:39', 311, 127, 0, '2018-08-13 09:08:39', '2018-08-13 09:08:39', NULL),
(111, 127, 1, '2018-08-13', '16:09:45', 0, 127, 0, '2018-08-13 09:09:45', '2018-08-13 09:09:45', NULL),
(112, 127, 7, '2018-08-13', '16:09:48', 311, 127, 0, '2018-08-13 09:09:48', '2018-08-13 09:09:48', NULL),
(113, 127, 1, '2018-08-13', '16:10:03', 0, 127, 0, '2018-08-13 09:10:03', '2018-08-13 09:10:03', NULL),
(114, 127, 1, '2018-08-13', '16:10:58', 0, 127, 0, '2018-08-13 09:10:58', '2018-08-13 09:10:58', NULL),
(115, 127, 7, '2018-08-13', '16:10:59', 311, 127, 0, '2018-08-13 09:10:59', '2018-08-13 09:10:59', NULL),
(116, 127, 1, '2018-08-13', '16:12:38', 0, 127, 0, '2018-08-13 09:12:38', '2018-08-13 09:12:38', NULL),
(117, 127, 7, '2018-08-13', '16:13:37', 311, 127, 0, '2018-08-13 09:13:37', '2018-08-13 09:13:37', NULL),
(118, 127, 1, '2018-08-13', '16:13:40', 0, 127, 0, '2018-08-13 09:13:40', '2018-08-13 09:13:40', NULL),
(119, 127, 1, '2018-08-13', '16:14:04', 0, 127, 0, '2018-08-13 09:14:04', '2018-08-13 09:14:04', NULL),
(120, 127, 7, '2018-08-13', '16:14:07', 311, 127, 0, '2018-08-13 09:14:07', '2018-08-13 09:14:07', NULL),
(121, 129, 1, '2018-08-13', '16:14:41', 0, 129, 0, '2018-08-13 09:14:41', '2018-08-13 09:14:41', NULL),
(122, 129, 7, '2018-08-13', '16:14:42', 311, 129, 0, '2018-08-13 09:14:42', '2018-08-13 09:14:42', NULL),
(123, 129, 1, '2018-08-15', '15:04:44', 0, 129, 0, '2018-08-15 08:04:44', '2018-08-15 08:04:44', NULL),
(124, 130, 1, '2018-08-19', '07:20:35', 0, 130, 0, '2018-08-19 00:20:35', '2018-08-19 00:20:35', NULL),
(125, 130, 7, '2018-08-19', '07:26:24', 311, 130, 0, '2018-08-19 00:26:24', '2018-08-19 00:26:24', NULL),
(126, 130, 7, '2018-08-19', '07:32:05', 311, 130, 0, '2018-08-19 00:32:05', '2018-08-19 00:32:05', NULL),
(127, 128, 7, '2018-08-19', '08:46:15', 311, 128, 0, '2018-08-19 01:46:15', '2018-08-19 01:46:15', NULL),
(128, 128, 7, '2018-08-19', '08:46:18', 311, 128, 0, '2018-08-19 01:46:18', '2018-08-19 01:46:18', NULL),
(129, 130, 7, '2018-08-19', '08:47:16', 311, 130, 0, '2018-08-19 01:47:16', '2018-08-19 01:47:16', NULL),
(130, 130, 7, '2018-08-19', '08:47:19', 311, 130, 0, '2018-08-19 01:47:19', '2018-08-19 01:47:19', NULL),
(131, 133, 1, '2018-08-22', '01:20:21', 0, 133, 0, '2018-08-21 18:20:21', '2018-08-21 18:20:21', NULL),
(132, 133, 1, '2018-08-22', '01:24:40', 0, 133, 0, '2018-08-21 18:24:40', '2018-08-21 18:24:40', NULL),
(133, 133, 1, '2018-08-22', '01:24:47', 0, 133, 0, '2018-08-21 18:24:47', '2018-08-21 18:24:47', NULL),
(134, 133, 1, '2018-08-22', '01:28:29', 0, 133, 0, '2018-08-21 18:28:29', '2018-08-21 18:28:29', NULL),
(135, 126, 1, '2018-08-25', '00:40:07', 0, 126, 0, '2018-08-24 17:40:07', '2018-08-24 17:40:07', NULL),
(136, 137, 1, '2018-08-25', '09:55:09', 0, 137, 0, '2018-08-25 02:55:09', '2018-08-25 02:55:09', NULL),
(137, 137, 1, '2018-08-25', '09:57:39', 0, 137, 0, '2018-08-25 02:57:39', '2018-08-25 02:57:39', NULL),
(138, 137, 1, '2018-08-25', '09:58:05', 0, 137, 0, '2018-08-25 02:58:05', '2018-08-25 02:58:05', NULL),
(139, 142, 13, '2018-08-29', '01:59:33', 266, 142, 0, '2018-08-28 18:59:33', '2018-08-28 18:59:33', NULL),
(140, 142, 13, '2018-08-29', '01:59:55', 266, 142, 0, '2018-08-28 18:59:55', '2018-08-28 18:59:55', NULL),
(141, 101, 18, '2018-09-10', '00:17:56', 215, 101, 0, '2018-09-09 17:17:56', '2018-09-09 17:17:56', NULL),
(142, 101, 18, '2018-09-10', '00:18:11', 215, 101, 0, '2018-09-09 17:18:11', '2018-09-09 17:18:11', NULL),
(143, 101, 18, '2018-09-10', '00:18:33', 215, 101, 0, '2018-09-09 17:18:33', '2018-09-09 17:18:33', NULL),
(144, 102, 18, '2018-09-10', '00:29:45', 215, 102, 0, '2018-09-09 17:29:45', '2018-09-09 17:29:45', NULL),
(145, 102, 18, '2018-09-10', '00:30:29', 215, 102, 0, '2018-09-09 17:30:29', '2018-09-09 17:30:29', NULL),
(146, 102, 18, '2018-09-10', '00:30:41', 215, 102, 0, '2018-09-09 17:30:41', '2018-09-09 17:30:41', NULL),
(147, 102, 18, '2018-09-10', '00:34:37', 215, 102, 0, '2018-09-09 17:34:37', '2018-09-09 17:34:37', NULL),
(148, 102, 18, '2018-09-10', '00:36:00', 215, 102, 0, '2018-09-09 17:36:00', '2018-09-09 17:36:00', NULL),
(149, 102, 18, '2018-09-10', '00:50:51', 215, 102, 0, '2018-09-09 17:50:51', '2018-09-09 17:50:51', NULL),
(150, 102, 18, '2018-09-10', '00:54:36', 215, 102, 0, '2018-09-09 17:54:36', '2018-09-09 17:54:36', NULL),
(151, 102, 18, '2018-09-10', '00:54:57', 215, 102, 0, '2018-09-09 17:54:57', '2018-09-09 17:54:57', NULL),
(152, 102, 18, '2018-09-10', '00:57:43', 215, 102, 0, '2018-09-09 17:57:43', '2018-09-09 17:57:43', NULL),
(153, 102, 18, '2018-09-10', '00:57:57', 215, 102, 0, '2018-09-09 17:57:57', '2018-09-09 17:57:57', NULL),
(154, 102, 18, '2018-09-10', '00:58:37', 215, 102, 0, '2018-09-09 17:58:37', '2018-09-09 17:58:37', NULL),
(155, 102, 18, '2018-09-10', '01:02:18', 215, 102, 0, '2018-09-09 18:02:18', '2018-09-09 18:02:18', NULL),
(156, 102, 18, '2018-09-10', '01:02:25', 215, 102, 0, '2018-09-09 18:02:25', '2018-09-09 18:02:25', NULL),
(157, 102, 18, '2018-09-10', '01:02:36', 215, 102, 0, '2018-09-09 18:02:36', '2018-09-09 18:02:36', NULL),
(158, 102, 18, '2018-09-10', '01:04:39', 215, 102, 0, '2018-09-09 18:04:39', '2018-09-09 18:04:39', NULL),
(159, 102, 18, '2018-09-10', '01:04:54', 215, 102, 0, '2018-09-09 18:04:54', '2018-09-09 18:04:54', NULL),
(160, 102, 18, '2018-09-10', '01:06:02', 215, 102, 0, '2018-09-09 18:06:02', '2018-09-09 18:06:02', NULL),
(161, 102, 18, '2018-09-10', '01:07:44', 215, 102, 0, '2018-09-09 18:07:44', '2018-09-09 18:07:44', NULL),
(162, 102, 18, '2018-09-10', '01:08:21', 215, 102, 0, '2018-09-09 18:08:21', '2018-09-09 18:08:21', NULL),
(163, 102, 18, '2018-09-10', '01:08:24', 215, 102, 0, '2018-09-09 18:08:24', '2018-09-09 18:08:24', NULL),
(164, 102, 18, '2018-09-10', '01:09:12', 215, 102, 0, '2018-09-09 18:09:12', '2018-09-09 18:09:12', NULL),
(165, 102, 18, '2018-09-10', '01:10:05', 215, 102, 0, '2018-09-09 18:10:05', '2018-09-09 18:10:05', NULL),
(166, 102, 18, '2018-09-10', '01:10:08', 215, 102, 0, '2018-09-09 18:10:08', '2018-09-09 18:10:08', NULL),
(167, 102, 18, '2018-09-10', '01:10:13', 215, 102, 0, '2018-09-09 18:10:13', '2018-09-09 18:10:13', NULL),
(168, 102, 18, '2018-09-10', '01:10:30', 215, 102, 0, '2018-09-09 18:10:30', '2018-09-09 18:10:30', NULL),
(169, 102, 18, '2018-09-10', '01:10:32', 215, 102, 0, '2018-09-09 18:10:32', '2018-09-09 18:10:32', NULL),
(170, 102, 18, '2018-09-10', '01:12:01', 215, 102, 0, '2018-09-09 18:12:01', '2018-09-09 18:12:01', NULL),
(171, 102, 18, '2018-09-10', '01:14:06', 215, 102, 0, '2018-09-09 18:14:06', '2018-09-09 18:14:06', NULL),
(172, 102, 18, '2018-09-10', '01:14:50', 215, 102, 0, '2018-09-09 18:14:50', '2018-09-09 18:14:50', NULL),
(173, 102, 18, '2018-09-10', '01:14:53', 215, 102, 0, '2018-09-09 18:14:53', '2018-09-09 18:14:53', NULL),
(174, 102, 18, '2018-09-10', '01:15:42', 215, 102, 0, '2018-09-09 18:15:42', '2018-09-09 18:15:42', NULL),
(175, 102, 18, '2018-09-10', '01:15:52', 215, 102, 0, '2018-09-09 18:15:52', '2018-09-09 18:15:52', NULL),
(176, 102, 18, '2018-09-10', '01:16:43', 215, 102, 0, '2018-09-09 18:16:43', '2018-09-09 18:16:43', NULL),
(177, 101, 18, '2018-09-10', '01:20:16', 215, 101, 0, '2018-09-09 18:20:16', '2018-09-09 18:20:16', NULL),
(178, 101, 18, '2018-09-10', '01:21:35', 215, 101, 0, '2018-09-09 18:21:35', '2018-09-09 18:21:35', NULL),
(179, 102, 17, '2018-09-10', '01:33:27', 215, 102, 0, '2018-09-09 18:33:27', '2018-09-09 18:33:27', NULL),
(180, 102, 17, '2018-09-10', '01:34:24', 215, 102, 0, '2018-09-09 18:34:24', '2018-09-09 18:34:24', NULL),
(181, 102, 17, '2018-09-10', '01:34:41', 215, 102, 0, '2018-09-09 18:34:41', '2018-09-09 18:34:41', NULL),
(182, 102, 16, '2018-09-11', '23:37:35', 215, 102, 0, '2018-09-11 16:37:35', '2018-09-11 16:37:35', NULL),
(183, 102, 16, '2018-09-11', '23:39:52', 215, 102, 0, '2018-09-11 16:39:52', '2018-09-11 16:39:52', NULL),
(184, 102, 16, '2018-09-11', '23:41:27', 215, 102, 0, '2018-09-11 16:41:27', '2018-09-11 16:41:27', NULL),
(185, 102, 17, '2018-09-13', '23:01:32', 215, 102, 0, '2018-09-13 16:01:32', '2018-09-13 16:01:32', NULL),
(186, 102, 17, '2018-09-13', '23:01:38', 215, 102, 0, '2018-09-13 16:01:38', '2018-09-13 16:01:38', NULL),
(187, 102, 17, '2018-09-13', '23:03:28', 215, 102, 0, '2018-09-13 16:03:28', '2018-09-13 16:03:28', NULL),
(188, 102, 17, '2018-09-13', '23:05:38', 215, 102, 0, '2018-09-13 16:05:38', '2018-09-13 16:05:38', NULL),
(189, 102, 17, '2018-09-13', '23:05:41', 215, 102, 0, '2018-09-13 16:05:41', '2018-09-13 16:05:41', NULL),
(190, 102, 17, '2018-09-13', '23:07:27', 215, 102, 0, '2018-09-13 16:07:27', '2018-09-13 16:07:27', NULL),
(191, 102, 17, '2018-09-13', '23:08:37', 215, 102, 0, '2018-09-13 16:08:37', '2018-09-13 16:08:37', NULL),
(192, 102, 16, '2018-09-13', '23:08:58', 215, 102, 0, '2018-09-13 16:08:58', '2018-09-13 16:08:58', NULL),
(193, 102, 16, '2018-09-13', '23:09:43', 215, 102, 0, '2018-09-13 16:09:43', '2018-09-13 16:09:43', NULL),
(194, 102, 16, '2018-09-13', '23:10:38', 215, 102, 0, '2018-09-13 16:10:38', '2018-09-13 16:10:38', NULL),
(195, 102, 16, '2018-09-13', '23:11:02', 215, 102, 0, '2018-09-13 16:11:02', '2018-09-13 16:11:02', NULL),
(196, 102, 16, '2018-09-13', '23:11:36', 215, 102, 0, '2018-09-13 16:11:36', '2018-09-13 16:11:36', NULL),
(197, 102, 17, '2018-09-13', '23:11:40', 215, 102, 0, '2018-09-13 16:11:40', '2018-09-13 16:11:40', NULL),
(198, 102, 16, '2018-09-13', '23:12:05', 215, 102, 0, '2018-09-13 16:12:05', '2018-09-13 16:12:05', NULL),
(199, 102, 17, '2018-09-13', '23:14:25', 215, 102, 0, '2018-09-13 16:14:25', '2018-09-13 16:14:25', NULL),
(200, 101, 18, '2018-09-16', '18:30:48', 215, 101, 0, '2018-09-16 11:30:48', '2018-09-16 11:30:48', NULL),
(201, 101, 18, '2018-09-16', '18:31:06', 215, 101, 0, '2018-09-16 11:31:06', '2018-09-16 11:31:06', NULL),
(202, 101, 18, '2018-09-16', '18:35:33', 215, 101, 0, '2018-09-16 11:35:33', '2018-09-16 11:35:33', NULL),
(203, 129, 8, '2018-09-20', '00:51:43', 0, 129, 0, '2018-09-19 17:51:43', '2018-09-19 17:51:43', NULL),
(204, 129, 1, '2018-09-27', '00:02:46', 215, 129, 0, '2018-09-26 17:02:46', '2018-09-26 17:02:46', NULL),
(205, 129, 1, '2018-09-27', '00:04:13', 215, 129, 0, '2018-09-26 17:04:13', '2018-09-26 17:04:13', NULL),
(206, 129, 1, '2018-09-27', '00:04:37', 215, 129, 0, '2018-09-26 17:04:37', '2018-09-26 17:04:37', NULL),
(207, 129, 1, '2018-10-04', '23:48:25', 215, 129, 0, '2018-10-04 16:48:25', '2018-10-04 16:48:25', NULL),
(208, 129, 10, '2018-10-04', '23:50:14', 215, 129, 0, '2018-10-04 16:50:14', '2018-10-04 16:50:14', NULL),
(209, 129, 10, '2018-10-04', '23:50:49', 215, 129, 0, '2018-10-04 16:50:49', '2018-10-04 16:50:49', NULL),
(210, 129, 1, '2018-10-04', '23:50:53', 215, 129, 0, '2018-10-04 16:50:53', '2018-10-04 16:50:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_lessons`
--

CREATE TABLE `user_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `enroll_date` datetime DEFAULT NULL,
  `close_date` datetime DEFAULT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_lessons`
--

INSERT INTO `user_lessons` (`id`, `user_id`, `lesson_id`, `enroll_date`, `close_date`, `mode`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 99, 1, '2018-08-09 16:10:25', NULL, 1, 99, 0, '2018-08-09 09:10:25', '2018-08-09 09:10:25', NULL),
(2, 99, 4, '2018-08-11 08:45:12', NULL, 1, 99, 0, '2018-08-11 01:45:12', '2018-08-11 01:45:12', NULL),
(3, 101, 1, '2018-08-12 04:42:00', NULL, 1, 101, 0, '2018-08-11 21:42:00', '2018-08-11 21:42:00', NULL),
(4, 129, 1, '2018-08-13 15:23:44', NULL, 1, 129, 0, '2018-08-13 08:23:44', '2018-08-13 08:23:44', NULL),
(5, 127, 1, '2018-08-13 15:58:43', NULL, 1, 127, 0, '2018-08-13 08:58:43', '2018-08-13 08:58:43', NULL),
(6, 130, 1, '2018-08-19 07:20:31', NULL, 1, 130, 0, '2018-08-19 00:20:31', '2018-08-19 00:20:31', NULL),
(7, 128, 1, '2018-08-19 07:47:33', NULL, 1, 128, 0, '2018-08-19 00:47:33', '2018-08-19 00:47:33', NULL),
(8, 133, 1, '2018-08-22 01:20:19', NULL, 1, 133, 0, '2018-08-21 18:20:19', '2018-08-21 18:20:19', NULL),
(9, 126, 1, '2018-08-25 00:40:00', NULL, 1, 126, 0, '2018-08-24 17:40:00', '2018-08-24 17:40:00', NULL),
(10, 137, 1, '2018-08-25 09:55:00', NULL, 1, 137, 0, '2018-08-25 02:55:00', '2018-08-25 02:55:00', NULL),
(11, 142, 1, '2018-08-29 01:59:28', NULL, 1, 142, 0, '2018-08-28 18:59:28', '2018-08-28 18:59:28', NULL),
(12, 102, 9, '2018-09-10 00:29:39', NULL, 1, 102, 0, '2018-09-09 17:29:39', '2018-09-09 17:29:39', NULL),
(13, 102, 1, '2018-09-10 00:35:53', NULL, 1, 102, 0, '2018-09-09 17:35:53', '2018-09-09 17:35:53', NULL),
(14, 102, 7, '2018-09-10 01:33:22', NULL, 1, 102, 0, '2018-09-09 18:33:22', '2018-09-09 18:33:22', NULL),
(15, 102, 5, '2018-09-14 22:45:23', NULL, 1, 102, 0, '2018-09-14 15:45:23', '2018-09-14 15:45:23', NULL),
(16, 129, 7, '2018-09-28 21:05:30', NULL, 1, 129, 0, '2018-09-28 14:05:30', '2018-09-28 14:05:30', NULL),
(17, 129, 4, '2018-09-28 21:05:31', NULL, 1, 129, 0, '2018-09-28 14:05:31', '2018-09-28 14:05:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_lesson_details`
--

CREATE TABLE `user_lesson_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lesson_detail_id` int(10) UNSIGNED NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `view_date` datetime DEFAULT NULL,
  `close_date` datetime DEFAULT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_lesson_details`
--

INSERT INTO `user_lesson_details` (`id`, `user_id`, `lesson_detail_id`, `mode`, `view_date`, `close_date`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 51, 3, 3, '2018-07-15 15:08:18', '2018-07-15 15:09:26', 51, 51, '2018-07-15 08:08:18', '2018-07-15 08:09:26', '2018-08-15 14:56:14'),
(2, 51, 4, 3, '2018-07-15 15:09:12', '2018-07-15 15:09:12', 51, 51, '2018-07-15 08:09:12', '2018-07-15 08:09:12', '2018-08-15 14:56:14'),
(3, 54, 3, 2, '2018-07-21 16:05:35', NULL, 54, 0, '2018-07-21 09:05:35', '2018-07-21 09:05:35', '2018-08-15 14:56:14'),
(4, 99, 6, 3, '2018-08-04 08:30:56', '2018-08-11 08:59:28', 99, 0, '2018-08-04 01:30:56', '2018-08-11 01:59:28', '2018-08-15 14:56:14'),
(5, 99, 1, 2, '2018-08-09 16:17:13', NULL, 99, 0, '2018-08-09 09:17:13', '2018-08-12 00:12:45', '2018-08-15 14:56:14'),
(6, 99, 4, 2, '2018-08-09 17:00:40', NULL, 99, 0, '2018-08-09 10:00:40', '2018-08-09 10:00:40', '2018-08-15 14:56:14'),
(7, 99, 7, 2, '2018-08-11 14:31:22', NULL, 99, 0, '2018-08-11 07:31:22', '2018-08-12 00:12:59', '2018-08-15 14:56:14'),
(8, 101, 7, 2, '2018-08-12 06:58:54', NULL, 101, 0, '2018-08-11 23:58:54', '2018-08-11 23:58:54', '2018-08-15 14:56:14'),
(9, 101, 1, 3, '2018-08-12 06:58:57', '2018-08-12 07:08:55', 101, 0, '2018-08-11 23:58:57', '2018-08-12 00:08:55', '2018-08-15 14:56:14'),
(10, 101, 8, 3, '2018-08-12 07:27:00', '2018-08-12 07:27:00', 101, 0, '2018-08-12 00:27:00', '2018-08-12 00:27:00', '2018-08-15 14:56:14'),
(11, 101, 9, 2, '2018-08-12 08:10:23', NULL, 101, 0, '2018-08-12 01:10:23', '2018-08-12 01:10:23', '2018-08-15 14:56:14'),
(12, 129, 1, 2, '2018-08-13 15:28:58', NULL, 129, 0, '2018-08-13 08:28:58', '2018-08-13 08:28:58', '2018-08-15 14:56:14'),
(13, 127, 7, 2, '2018-08-13 15:59:35', NULL, 127, 0, '2018-08-13 08:59:35', '2018-08-13 08:59:35', '2018-08-15 14:56:14'),
(14, 127, 1, 3, '2018-08-13 15:59:44', '2018-08-13 16:14:15', 127, 0, '2018-08-13 08:59:44', '2018-08-13 09:14:15', '2018-08-15 14:56:14'),
(15, 127, 8, 2, '2018-08-13 16:07:45', NULL, 127, 0, '2018-08-13 09:07:45', '2018-08-13 09:07:46', '2018-08-15 14:56:14'),
(16, 129, 7, 2, '2018-08-13 16:14:42', NULL, 129, 0, '2018-08-13 09:14:42', '2018-08-13 09:14:42', '2018-08-15 14:56:14'),
(17, 129, 1, 3, '2018-08-15 15:04:44', '2018-10-04 23:50:04', 129, 0, '2018-08-15 08:04:44', '2018-10-04 16:50:04', NULL),
(18, 130, 1, 2, '2018-08-19 07:20:35', NULL, 130, 0, '2018-08-19 00:20:35', '2018-08-19 00:28:56', NULL),
(19, 130, 7, 2, '2018-08-19 07:26:24', NULL, 130, 0, '2018-08-19 00:26:24', '2018-08-19 00:26:24', NULL),
(20, 128, 7, 2, '2018-08-19 08:46:15', NULL, 128, 0, '2018-08-19 01:46:15', '2018-08-19 01:46:15', NULL),
(21, 133, 1, 2, '2018-08-22 01:20:21', NULL, 133, 0, '2018-08-21 18:20:21', '2018-08-21 18:20:21', NULL),
(22, 126, 1, 2, '2018-08-25 00:40:07', NULL, 126, 0, '2018-08-24 17:40:07', '2018-08-24 17:40:07', NULL),
(23, 137, 1, 2, '2018-08-25 09:55:09', NULL, 137, 0, '2018-08-25 02:55:09', '2018-08-25 02:55:09', NULL),
(24, 142, 13, 2, '2018-08-29 01:59:33', NULL, 142, 0, '2018-08-28 18:59:33', '2018-08-28 18:59:33', NULL),
(25, 101, 18, 2, '2018-09-10 00:17:56', NULL, 101, 0, '2018-09-09 17:17:56', '2018-09-09 17:17:56', NULL),
(26, 102, 18, 2, '2018-09-10 00:29:45', NULL, 102, 0, '2018-09-09 17:29:45', '2018-09-09 17:29:45', NULL),
(27, 102, 17, 2, '2018-09-10 01:33:27', NULL, 102, 0, '2018-09-09 18:33:27', '2018-09-09 18:33:27', NULL),
(28, 102, 16, 2, '2018-09-11 23:37:35', NULL, 102, 0, '2018-09-11 16:37:35', '2018-09-11 16:37:35', NULL),
(29, 102, 5, 3, '2018-09-14 22:45:26', '2018-09-14 22:45:26', 102, 0, '2018-09-14 15:45:26', '2018-09-14 15:45:26', NULL),
(30, 129, 8, 2, '2018-09-20 00:51:43', NULL, 129, 0, '2018-09-19 17:51:43', '2018-09-19 17:51:43', NULL),
(31, 129, 7, 3, '2018-09-28 21:05:34', '2018-09-28 21:05:34', 129, 0, '2018-09-28 14:05:34', '2018-09-28 14:05:34', NULL),
(32, 129, 4, 3, '2018-09-28 21:05:36', '2018-09-28 21:05:36', 129, 0, '2018-09-28 14:05:36', '2018-09-28 14:05:36', NULL),
(33, 129, 10, 3, '2018-10-04 23:50:08', '2018-10-05 00:06:37', 129, 0, '2018-10-04 16:50:08', '2018-10-04 17:06:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_amount` int(10) UNSIGNED NOT NULL,
  `stripe_status` tinyint(3) UNSIGNED NOT NULL,
  `stripe_time` datetime NOT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_last_four` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`id`, `user_id`, `stripe_id`, `stripe_amount`, `stripe_status`, `stripe_time`, `card_brand`, `card_last_four`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:09:44', 'master card', '1234', 0, 0, '2018-08-02 10:09:44', '2018-08-02 10:09:44', NULL),
(2, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:16:07', 'master card', '1234', 0, 0, '2018-08-02 10:16:07', '2018-08-02 10:16:07', NULL),
(3, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:16:49', 'master card', '1234', 0, 0, '2018-08-02 10:16:49', '2018-08-02 10:16:49', NULL),
(4, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:17:52', 'master card', '1234', 99, 0, '2018-08-02 10:17:52', '2018-08-02 10:17:52', NULL),
(5, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:18:52', 'master card', '1234', 99, 0, '2018-08-02 10:18:52', '2018-08-02 10:18:52', NULL),
(6, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:25:44', 'master card', '1234', 99, 0, '2018-08-02 10:25:44', '2018-08-02 10:25:44', NULL),
(7, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:26:14', 'master card', '1234', 99, 0, '2018-08-02 10:26:14', '2018-08-02 10:26:14', NULL),
(8, 99, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-06-02 17:26:26', 'master card', '1234', 99, 0, '2018-08-02 10:26:26', '2018-08-02 10:26:26', NULL),
(9, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:28:46', 'master card', '1234', 99, 0, '2018-08-02 10:28:46', '2018-08-02 10:28:46', NULL),
(10, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:28:54', 'master card', '1234', 99, 0, '2018-08-02 10:28:54', '2018-08-02 10:28:54', NULL),
(11, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:29:42', 'master card', '1234', 99, 0, '2018-08-02 10:29:42', '2018-08-02 10:29:42', NULL),
(12, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:29:56', 'master card', '1234', 99, 0, '2018-08-02 10:29:56', '2018-08-02 10:29:56', NULL),
(13, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:30:35', 'master card', '1234', 99, 0, '2018-08-02 10:30:35', '2018-08-02 10:30:35', NULL),
(14, 54, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:30:45', 'master card', '1234', 99, 0, '2018-08-02 10:30:45', '2018-08-02 10:30:45', NULL),
(15, 99, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-07-02 17:37:54', 'master card', '1234', 99, 0, '2018-08-02 10:37:54', '2018-08-02 10:37:54', NULL),
(16, 128, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:41:39', 'master card', '1234', 99, 0, '2018-08-02 10:41:39', '2018-08-02 10:41:39', NULL),
(17, 128, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:41:51', 'master card', '1234', 99, 0, '2018-08-02 10:41:51', '2018-08-02 10:41:51', NULL),
(18, 128, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:42:11', 'master card', '1234', 99, 0, '2018-08-02 10:42:11', '2018-08-02 10:42:11', NULL),
(19, 99, 'cus_DGnDf2r1MmpFd9', 1, 1, '2018-08-02 17:42:12', 'master card', '1234', 99, 0, '2018-08-02 10:42:12', '2018-08-02 10:42:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE `user_stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `closed_lesson_detail_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `learning_date_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `learning_duration` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_stats`
--

INSERT INTO `user_stats` (`id`, `user_id`, `closed_lesson_detail_count`, `learning_date_count`, `learning_duration`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 99, 1, 1, 4354, 99, 0, '2018-08-04 01:30:56', '2018-08-12 05:21:34', NULL),
(2, 101, 2, 1, 5428, 101, 0, '2018-08-11 23:58:54', '2018-09-16 11:35:33', NULL),
(3, 129, 4, 1, 1816, 129, 0, '2018-08-13 08:28:58', '2018-10-04 17:06:37', NULL),
(4, 127, 1, 1, 2177, 127, 0, '2018-08-13 08:59:35', '2018-08-13 09:14:16', NULL),
(5, 130, 0, 1, 1244, 130, 0, '2018-08-19 00:20:35', '2018-08-19 01:47:19', NULL),
(6, 128, 0, 1, 622, 128, 0, '2018-08-19 01:46:15', '2018-08-19 01:46:18', NULL),
(7, 133, 0, 1, 0, 133, 0, '2018-08-21 18:20:21', '2018-08-21 18:28:29', NULL),
(8, 126, 0, 1, 0, 126, 0, '2018-08-24 17:40:07', '2018-08-24 17:40:07', NULL),
(9, 137, 0, 1, 0, 137, 0, '2018-08-25 02:55:09', '2018-08-25 02:58:05', NULL),
(10, 142, 0, 1, 532, 142, 0, '2018-08-28 18:59:33', '2018-08-28 18:59:55', NULL),
(11, 102, 1, 1, 11610, 102, 0, '2018-09-09 17:29:45', '2018-09-14 15:45:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_utms`
--

CREATE TABLE `user_utms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `utm_source` tinyint(3) UNSIGNED NOT NULL,
  `utm_code` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utm_date` datetime NOT NULL,
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_utms`
--

INSERT INTO `user_utms` (`id`, `user_id`, `utm_source`, `utm_code`, `utm_date`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 136, 1, 'niZoXihHJdRrdHZY7NudyTBK7Zf-adaEZNugEfRGYG.HJdZTuYZn0YQAyY0EzEQaPGCYReZAPiZoWs00000019108001', '2018-08-23 20:59:28', 136, 0, '2018-08-23 13:59:28', '2018-08-23 13:59:28', NULL),
(2, 137, 1, 'niZoXihHJdRrdHZY7NudyTBK7Zf-adaEZNugEfRGYG.HJdZTuYZn0YQAyY0EzEQaPGCYReZAPiZoWs00000019108001', '2018-08-23 21:04:34', 137, 0, '2018-08-23 14:04:34', '2018-08-23 14:04:34', NULL),
(3, 140, 1, '$a8', '2018-08-28 20:41:43', 140, 0, '2018-08-28 13:41:43', '2018-08-28 13:42:35', '2018-08-28 13:42:35'),
(4, 140, 1, '$a8', '2018-08-28 20:42:35', 140, 0, '2018-08-28 13:42:35', '2018-08-28 13:42:35', NULL),
(5, 141, 1, '$a8', '2018-08-28 20:45:18', 141, 0, '2018-08-28 13:45:18', '2018-08-28 13:45:18', NULL),
(6, 102, 1, '$a8', '2018-09-10 00:28:31', 102, 0, '2018-09-09 17:28:31', '2018-09-09 17:28:31', NULL),
(7, 101, 1, '$a8', '2018-09-15 00:43:20', 101, 0, '2018-09-14 17:43:20', '2018-09-15 17:00:35', '2018-09-15 17:00:35'),
(8, 105, 1, '$a8', '2018-09-15 01:47:09', 105, 0, '2018-09-14 18:47:09', '2018-09-14 18:47:09', NULL),
(9, 106, 1, '$a8', '2018-09-15 01:51:38', 0, 0, '2018-09-14 18:51:38', '2018-09-14 18:51:38', NULL),
(10, 107, 1, '$a8', '2018-09-15 01:59:06', 0, 0, '2018-09-14 18:59:06', '2018-09-14 18:59:06', NULL),
(11, 108, 1, '$a8', '2018-09-15 02:01:35', 0, 0, '2018-09-14 19:01:35', '2018-09-14 19:01:35', NULL),
(12, 111, 1, '$a8', '2018-09-15 02:11:29', 0, 0, '2018-09-14 19:11:29', '2018-09-14 19:11:29', NULL),
(13, 101, 1, '$a8', '2018-09-16 00:00:35', 101, 0, '2018-09-15 17:00:35', '2018-09-16 11:41:22', '2018-09-16 11:41:22'),
(26, 124, 1, '$a8', '2018-09-16 02:48:21', 0, 0, '2018-09-15 19:48:21', '2018-09-15 19:48:21', NULL),
(30, 128, 1, '$a8', '2018-09-16 03:24:59', 0, 0, '2018-09-15 20:24:59', '2018-09-15 20:24:59', NULL),
(31, 101, 1, '$a8', '2018-09-16 18:41:22', 101, 0, '2018-09-16 11:41:22', '2018-09-16 11:41:22', NULL),
(32, 130, 1, '$a8', '2018-09-25 01:14:49', 0, 0, '2018-09-24 18:14:49', '2018-09-24 18:14:49', NULL),
(33, 131, 1, '$a8', '2018-09-25 01:38:15', 0, 0, '2018-09-24 18:38:15', '2018-09-24 18:38:15', NULL),
(34, 132, 1, '$a8', '2018-09-25 01:41:03', 0, 0, '2018-09-24 18:41:03', '2018-09-24 18:41:03', NULL),
(35, 133, 1, '$a8', '2018-09-25 01:42:58', 0, 0, '2018-09-24 18:42:58', '2018-09-24 18:42:58', NULL),
(36, 134, 1, '$a8', '2018-09-25 02:01:24', 0, 0, '2018-09-24 19:01:24', '2018-09-24 19:01:24', NULL),
(37, 135, 1, '$a8', '2018-09-25 02:05:16', 0, 0, '2018-09-24 19:05:16', '2018-09-24 19:05:16', NULL),
(38, 129, 1, '$a8', '2018-09-26 23:15:11', 129, 0, '2018-09-26 16:15:11', '2018-09-26 16:15:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `youtube_links`
--

CREATE TABLE `youtube_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_id` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `youtube_links`
--

INSERT INTO `youtube_links` (`id`, `name`, `link`, `youtube_id`, `media_id`, `type`, `mode`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'youtube', 'https://www.youtube.com/embed/5b91dFhZz0g', '5b91dFhZz0g', 257, 1, 0, 53, 53, '2018-09-05 17:08:58', '2018-09-11 14:47:58', NULL),
(2, 'youtube', 'https://www.youtube.com/watch?v=4GnyhB5PRRA', '4GnyhB5PRRA', 258, 1, 0, 53, 53, '2018-09-05 17:48:19', '2018-09-11 14:48:50', NULL),
(15, 'line', 'https://www.youtube.com/embed/5b91dFhZz0g', '', 0, 2, 0, 53, 53, '2018-09-07 17:28:41', '2018-09-09 09:24:48', '2018-09-09 09:24:48'),
(16, 'vimeo', 'https://player.vimeo.com/video/286278638', '286278638', 0, 3, 0, 53, 53, '2018-09-09 09:17:37', '2018-09-11 14:48:38', NULL),
(17, 'image2', 'https://www.youtube.com/embed/5b91dFhZz0g', '5b91dFhZz0g', 0, 2, 1, 53, 53, '2018-09-09 09:19:18', '2018-09-11 14:52:09', NULL),
(18, 'image', 'http://pg.me/lesson/1/detail/1', 'tgbNymZ7vqY', 0, 2, 0, 53, 53, '2018-09-09 09:26:29', '2018-09-11 14:48:10', NULL),
(19, 'image', 'http://pg.me/lesson/1/detail/2', '', 0, 2, 0, 53, 53, '2018-09-09 09:26:50', '2018-09-11 14:52:16', NULL),
(20, 'youtube', 'https://www.youtube.com/watch?v=-q3q16rqESI', '-q3q16rqESI', 0, 1, 1, 53, 53, '2018-09-09 09:42:22', '2018-09-11 14:49:23', NULL),
(21, 'vimeo', 'https://player.vimeo.com/video/286278638', '286278638', 0, 3, 1, 53, 53, '2018-09-09 10:13:01', '2018-09-11 14:55:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `youtube_link_media`
--

CREATE TABLE `youtube_link_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `youtube_link_id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `youtube_link_media`
--

INSERT INTO `youtube_link_media` (`id`, `youtube_link_id`, `media_id`, `url`, `sort`, `created_user_id`, `updated_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, 282, 'https://www.facebook.com/1', 1, 53, 53, '2018-09-07 17:28:41', '2018-09-07 18:31:41', '2018-09-07 18:31:41'),
(9, 15, 287, 'eeee3', 1, 53, 53, '2018-09-07 18:32:55', '2018-09-07 18:41:10', '2018-09-07 18:41:10'),
(11, 15, 288, '', 1, 53, 53, '2018-09-07 18:40:52', '2018-09-09 09:24:44', NULL),
(12, 15, 289, '', 1, 53, 53, '2018-09-07 18:41:09', '2018-09-09 09:24:44', NULL),
(13, 17, 337, '', 1, 53, 53, '2018-09-09 09:19:18', '2018-09-11 14:52:09', NULL),
(14, 18, 338, '', 1, 53, 53, '2018-09-09 09:26:29', '2018-09-11 14:48:10', NULL),
(15, 19, 339, '', 1, 53, 53, '2018-09-09 09:26:50', '2018-09-11 14:52:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliators`
--
ALTER TABLE `affiliators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliator_incomes`
--
ALTER TABLE `affiliator_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliator_income_logs`
--
ALTER TABLE `affiliator_income_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliator_invitations`
--
ALTER TABLE `affiliator_invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_attachments`
--
ALTER TABLE `lesson_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_details`
--
ALTER TABLE `lesson_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_detail_attachments`
--
ALTER TABLE `lesson_detail_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_suplements`
--
ALTER TABLE `lesson_suplements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_categories`
--
ALTER TABLE `ms_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_category_attributes`
--
ALTER TABLE `ms_category_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_languages`
--
ALTER TABLE `ms_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_token_index` (`token`);

--
-- Indexes for table `user_diamond_leaves`
--
ALTER TABLE `user_diamond_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_learning_logs`
--
ALTER TABLE `user_learning_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_lessons`
--
ALTER TABLE `user_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_lesson_details`
--
ALTER TABLE `user_lesson_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_stats`
--
ALTER TABLE `user_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_utms`
--
ALTER TABLE `user_utms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_links`
--
ALTER TABLE `youtube_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_link_media`
--
ALTER TABLE `youtube_link_media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `affiliators`
--
ALTER TABLE `affiliators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `affiliator_incomes`
--
ALTER TABLE `affiliator_incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `affiliator_income_logs`
--
ALTER TABLE `affiliator_income_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `affiliator_invitations`
--
ALTER TABLE `affiliator_invitations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `lesson_attachments`
--
ALTER TABLE `lesson_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_details`
--
ALTER TABLE `lesson_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `lesson_detail_attachments`
--
ALTER TABLE `lesson_detail_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `lesson_suplements`
--
ALTER TABLE `lesson_suplements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ms_categories`
--
ALTER TABLE `ms_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ms_category_attributes`
--
ALTER TABLE `ms_category_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ms_languages`
--
ALTER TABLE `ms_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_diamond_leaves`
--
ALTER TABLE `user_diamond_leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_learning_logs`
--
ALTER TABLE `user_learning_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `user_lessons`
--
ALTER TABLE `user_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_lesson_details`
--
ALTER TABLE `user_lesson_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_stats`
--
ALTER TABLE `user_stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_utms`
--
ALTER TABLE `user_utms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `youtube_links`
--
ALTER TABLE `youtube_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `youtube_link_media`
--
ALTER TABLE `youtube_link_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
