-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 09:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text,
  `author_name` varchar(150) DEFAULT 'Abdul Basit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `author_name`) VALUES
(1, 'Title One', 'Blog one description', 'Abdul Basit'),
(2, 'Title Two', 'Blog two description', 'Abdul Basit');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `parent_id`) VALUES
(1, 'Technology', 0),
(2, 'Fashion', 0),
(3, 'Education', 0),
(4, 'Tips and Tricks', 0),
(5, 'Mobiles', 1),
(6, 'Computers', 1),
(7, 'Hairs', 2),
(8, 'Dresses', 2),
(9, 'Science', 3),
(10, 'Computer Science', 3),
(11, 'PC Tips`', 4),
(12, 'Mobile Tips', 4),
(13, 'Samsung', 5),
(14, 'Nokia', 5),
(15, 'Laptops', 1),
(16, 'Sony Ericsson', 5),
(17, 'Q Mobile', 5),
(18, 'Windows Laptop', 15),
(19, 'Mac Laptop', 15),
(20, 'Linux Laptop', 15);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('rdnseluspd7t7pj1s8vr105ibgrou9au', '::1', 1547512190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373531323134333b),
('jr2hbnaqhqik9n6vf66n1ndnpdcupr23', '::1', 1547513284, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373531323833363b),
('trd6q5e2bdnhtm0ejfav2iv4oj5o4slb', '::1', 1547513513, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373531333239333b),
('38p1hn6hea151jnb36ujfsmaroie59lb', '::1', 1547513856, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373531333638303b),
('jlu6uol7umjicmvpr4qknuhdqi0f4t4v', '::1', 1547518995, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373531383834303b),
('98om5c0ko0j5bt9e4khcds36sbtpa5mb', '::1', 1547519481, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373531393235333b),
('ajujc058ocfbk64s52l3ajej5dnt29gk', '::1', 1547524026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532333933393b),
('4j81jv9ch9t6bgdiqh9vj1huehvts5t3', '::1', 1547525411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532353330323b),
('3d9pa6opmh6v6k05mrb3fjufj169g8b4', '::1', 1547526492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532363138333b),
('m5vsomgcnvs5u9cfm1ei4ul1dqvp0pq6', '::1', 1547526726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532363630373b),
('n1c2nsb57q1vug1js3aeor8s05ekuuk6', '::1', 1547527095, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532363939353b),
('bvvbkun74cujrilhroj3h5ee6q6vcmag', '::1', 1547527666, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532373436323b),
('eujch2850uom6bejqn2klcu1ol89kgh8', '::1', 1547527749, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532373638303b),
('plpem8lo9krd3najsp8kt4ell1eelq3g', '::1', 1547528019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532373939303b),
('pej83r8l80djlopbcboik0osfcd8cjub', '::1', 1547528428, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373532383338383b),
('r1fne2mb5771hcjofm9tcmip89p1o2pf', '::1', 1547590508, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539303434363b),
('obrki68ulcnimc64bhvfhakd3oe3ur0j', '::1', 1547591176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539303932373b),
('aukpjja1nh248jr2hi43tb91n23hu98b', '::1', 1547591385, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539313330393b),
('62rim7ed9m2ima048kh1r8ith8u8duht', '::1', 1547592052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539313935333b),
('oo2omhcc5tiffqgkbribg3f2dtkk3bvg', '::1', 1547592559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539323237323b),
('8141q710a95n6jnltdu8jr7rcfeod8nm', '::1', 1547592811, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539323631383b),
('dfpamt8do86ts6s2250ia3qi5seuvhf6', '::1', 1547593359, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539333131383b),
('lj9pa8fuhg472kmid5cdk38f1c9f1f5j', '::1', 1547593701, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539333534313b),
('oiqc6dej9me9u86h0unqflhe9ah3060p', '::1', 1547594174, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539333938373b),
('3me88r21p0kjboj08jogqkjp9tl5qeev', '::1', 1547594650, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539343434393b),
('q16epg6kb1p59anm5de3rsl8uo1ah03k', '::1', 1547595046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539343830313b),
('nc24qsqm0f9ijuaotphrp2a2r6gj6orq', '::1', 1547595264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539353133343b),
('2g2h4j8s69lt25vo20h6g102237n1idm', '::1', 1547595811, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539353532303b63617074636861576f72647c4e3b),
('jpga0scgalobd0gub6iose1e4p0eb47n', '::1', 1547596179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539363137393b63617074636861576f72647c4e3b),
('nn0b7gbtd70f8118j299rhj12m5fc9fv', '::1', 1547596887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539363538383b63617074636861576f72647c733a383a22486d377375516134223b),
('hti1hno76v1ddqaulv3jl3sgm59mua3g', '::1', 1547597136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539363839323b),
('uhlnqgvk3do47ig9eob50r1qpuf7n6lv', '::1', 1547597557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539373331363b63617074636861576f72647c733a383a226565343377633044223b),
('28l8mtshjqdudq4vlccukmqf76bnajcj', '::1', 1547598467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539383137383b63617074636861576f72647c733a383a2244364b42474f6a65223b),
('gcc0igjqrtrfhti8mbec5ggpl8aj041b', '::1', 1547598715, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539383533363b63617074636861576f72647c733a383a224337496a31503459223b),
('q39uf1gsijstv7chhejjo7g9a1p1m4b8', '::1', 1547599330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373539393332363b63617074636861576f72647c733a383a2259527a4f49384e63223b),
('4evr0alk1af4gseo0jagc8leaaphptku', '::1', 1547600081, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373630303037313b63617074636861576f72647c733a383a224b6966373078774b223b),
('1vq0ngvadt7i3tj0gjd8mmsjf7o2np39', '::1', 1547601145, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373630313034323b66696c656e616d657c733a31393a22313534373630313134352e393339312e6a7067223b63617074636861576f72647c733a383a226353697936677a44223b),
('rsoj8666aspqibbhgat6t92mhdl8dfhg', '::1', 1547601602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373630313535333b66696c656e616d657c733a31393a22313534373630313630322e333532322e6a7067223b63617074636861576f72647c733a383a22354c626d72724f4d223b),
('j37b9ji7o4jgntf3vdgkcffte38cbed6', '::1', 1547609243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373630393230363b),
('oq1ks42hfc87i71fdkj9c0fbrc261nks', '::1', 1547754961, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373735343936313b),
('4bm6bb7vckdrc3j2nas75ma94h17ske8', '::1', 1547756121, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373735363132313b);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_contact` varchar(255) NOT NULL,
  `employee_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_email`, `employee_contact`, `employee_address`) VALUES
(1, 'abdul basit', 'dfsd@hotmail.com', '78563784653478', 'jhfsdf sdjhfgs'),
(2, 'dfg sdjh', 'sdfs@yahoo.com', '3345345345345', 'dfg djfgdf'),
(3, 'dfghu dkj', 'sdjhd@hotmail.com', '343453545', 'sdfgsd dfgjkh djkfh');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `name`, `dob`, `email`) VALUES
(1, 'sdfs', '23', 'osndfsd@gmail.com'),
(2, 'sjfg', '45', 'sdfsd@gmail.com'),
(3, 'xcklghd', '54', 'sdf@gmail.com'),
(4, 'sjkdfh', '341', 'slamn@hotmail.com'),
(5, 'sd', '23', 'asaasdqaw@hotmail.com'),
(6, 'sdjkdffd', '99', 'sdfsdfs@hotmai.com'),
(7, 'opl', '34', 'asdsdfe@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Allah Akbar', 'Mashallah. Allah Ghani Allah is Great', 12, '2019-01-05 15:40:04', '2019-01-08 14:57:59'),
(2, 'Subhan Allah', 'hjdjhsd hvjd hjkd hjkfg djk ghdfjk asjkdhas jhasg bn', 12, '2019-01-05 16:00:42', '2019-01-08 15:59:11'),
(5, 'askld uhsd', 'sdjfg sjhdgsd gjsdjkfsdkl sdsd', 13, '2019-01-08 15:56:30', '2019-01-08 15:56:30'),
(6, 'post 4', 'asdfs vjkwehjkh fsjkdfh sdjk', 12, '2019-01-12 23:51:05', '2019-01-12 23:51:05'),
(7, 'post 5', 'this is body this is body this is body this is body this is body this is body...', 12, '2019-01-12 23:51:30', '2019-01-13 00:47:07'),
(8, 'post 6', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:52:36', '2019-01-12 23:52:36'),
(9, 'post 7', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:52:43', '2019-01-12 23:52:43'),
(10, 'post 8', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:52:49', '2019-01-12 23:52:49'),
(11, 'post 9', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:52:53', '2019-01-12 23:52:53'),
(12, 'post 10', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:52:58', '2019-01-12 23:52:58'),
(13, 'post 11', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:53:02', '2019-01-12 23:53:02'),
(14, 'post 12', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:53:06', '2019-01-12 23:53:06'),
(15, 'post 13', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:53:10', '2019-01-12 23:53:10'),
(16, 'post 14', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:53:18', '2019-01-12 23:53:18'),
(17, 'post 15', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:53:22', '2019-01-12 23:53:22'),
(18, 'post 16', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:53:26', '2019-01-12 23:53:26'),
(19, 'post 17', 'sdfjjsd fjhsd gfjhs fsdj fsgd', 12, '2019-01-12 23:53:31', '2019-01-12 23:53:31'),
(20, 'asdazj', 'sdfsdfsdsdfsd sdfjkhsdjk fhsduk fhsduk', 12, '2019-01-13 00:30:49', '2019-01-13 00:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'pdse', 'dsfdrgr@yahoo.com', NULL, '79257926e2c9eb757e719dba3f073d37', '2019-01-05 12:17:47', '2019-01-05 12:53:51'),
(3, 'sdfsd', 'ghfghf@gmail.com', NULL, '79257926e2c9eb757e719dba3f073d37', '2019-01-05 14:34:48', '2019-01-05 14:34:48'),
(4, 'testcase', 'asdf@yahoo.con', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2019-01-07 16:56:45', '2019-01-07 16:56:45'),
(5, 'jdbsdddk', 'sdferrd@yahoo.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2019-01-07 16:59:44', '2019-01-07 16:59:44'),
(6, 'sdklfjfd', 'sdffrr@yahoo.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', '2019-01-07 17:01:49', '2019-01-07 17:01:49'),
(7, 'xklvndl', 'sflsnfds@yahpo.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-07 17:04:04', '2019-01-07 17:04:04'),
(8, 'xfddfg', 'sdfsdf@yahoo.con', NULL, '698d51a19d8a121ce581499d7b701668', '2019-01-07 17:04:58', '2019-01-07 17:04:58'),
(9, 'sdfjkhsdh', 'xcvsd@yahoo.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-07 17:07:33', '2019-01-07 17:07:33'),
(10, 'sdkljfhsdjkf', 'sdsd@yahio.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-07 17:16:22', '2019-01-07 17:16:22'),
(11, 'jkdgdhf', 'djkdfg@yahoo.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-07 17:17:11', '2019-01-07 17:17:11'),
(12, 'basitjee', 'basitjee1@hotmail.com', 'car27.gif', '202cb962ac59075b964b07152d234b70', '2019-01-07 19:23:15', '2019-01-09 21:56:57'),
(13, 'newnew', 'newnew@hotmail.com', 'car.gif', '202cb962ac59075b964b07152d234b70', '2019-01-08 15:31:22', '2019-01-08 23:35:29'),
(14, 'sdjksdssd', 'sdfbsdfdw@hotmail.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-08 17:13:40', '2019-01-08 17:13:40'),
(15, 'oldold', 'oldddsdfsdf@hotmail.com', 'car19.gif', '202cb962ac59075b964b07152d234b70', '2019-01-08 23:37:27', '2019-01-08 23:42:30'),
(17, '<script>alert(\'hello\');</script>', 'sdfsd@hotmail.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-11 21:05:30', '2019-01-11 21:05:30'),
(18, '&lt;script&gt;alert(&#039;hi&#039;);&lt;/script&gt;', 'asdasdf@hotmai.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-11 21:22:52', '2019-01-11 21:22:52'),
(19, '[removed]alert&#40;\'ooo\'&#41;;[removed]', 'sdfsdf@hotmai.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-11 22:06:08', '2019-01-11 22:06:08'),
(20, 'newone', 'osndfsd@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', '2019-01-11 22:25:09', '2019-01-11 22:25:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
