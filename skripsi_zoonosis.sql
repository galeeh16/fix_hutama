-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 03:59 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_zoonosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(1, 'G01', 'Panas Tubuh Tinggi'),
(2, 'G02', 'Bulu Terlihat Kusam'),
(3, 'G03', 'Lesu'),
(4, 'G04', 'Nafsu Makan Hilang'),
(5, 'G05', 'Berat Badan Menurun'),
(6, 'G06', 'Pupil Mata Mengecil'),
(7, 'G07', 'Tremor'),
(8, 'G08', 'Lumpuh'),
(9, 'G09', 'Muntah Diare'),
(10, 'G10', 'Kematian Anak Kucing'),
(11, 'G11', 'Bulu Pada Ujung Telinga Rontok'),
(12, 'G12', 'Menggaruk - garuk Telingai'),
(13, 'G13', 'Kulit Menebal, Keriput dan ditutupi dengan Remah A'),
(14, 'G14', 'Rambut Rontok Dengan Pola Bulat Kemerahan'),
(15, 'G15', 'Kulit Kemerahan dan Ada Serpihan Seperti Ketombe'),
(16, 'G16', 'Bentuk Kuku Tidak Normal'),
(17, 'G17', 'Terlihat Gelisah atau Takut'),
(18, 'G18', 'Cepat Marah dan Mudah Menyerang Orang'),
(19, 'G19', 'Demam'),
(20, 'G20', 'Mulut berbusa'),
(21, 'G21', 'Lemah'),
(22, 'G22', 'Kejang'),
(23, 'G23', 'Menggigil'),
(24, 'G24', 'Sedikit Makan'),
(25, 'G25', 'Nyeri Otot'),
(26, 'G26', 'Sakit Tenggorokan'),
(27, 'G27', 'Mudah Lelah'),
(28, 'G28', 'Gangguan Penglihatan'),
(29, 'G29', 'Muncul Ruam'),
(30, 'G30', 'Terus Menjilat, Menggigit, dan Mengunyah Benda-Ben'),
(31, 'G31', 'Sensitif Terhadap Sentuhan, Cahaya, dan Suara'),
(32, 'G32', 'Suka Bersembunyi ditempat Gelap'),
(33, 'G33', 'Bulu Pada Ujung Telinga Rontok'),
(34, 'G34', 'Menggaruk - garuk Telinga'),
(35, 'G35', 'Kulit Menebal, Keriput dan ditutupi dengan Remah A'),
(36, 'G36', 'Rambut Rontok Dengan Pola Bulat Kemerahan'),
(37, 'G37', 'Kulit Kemerahan dan Ada Serpihan Seperti Ketombe'),
(38, 'G38', 'Lemah & Sempoyongan'),
(39, 'G39', 'Seringkali Duduk atau Berdiri Dalam Keadaan Seteng'),
(40, 'G40', 'Diare'),
(41, 'G41', 'Unggas Merasa Haus Luar Biasa'),
(42, 'G42', 'Jengger dan pial berwarna merah kehitaman sampai b'),
(43, 'G43', 'Unggas bernafas dengan cepat dan sulit'),
(44, 'G44', 'Tidak Makan'),
(45, 'G45', 'Mata & Hidung Berair');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `description`, `user_id`, `date`, `time`) VALUES
(1, 'Hari Selasa', 'Sebantar lagi aku meninggalkan jogja, hmm hatiku sedih.', 13, '2018-10-17', '09:05:08'),
(2, 'Hari rabu', 'Aku tak mengerti apa yang kurasa, rindu yang tak pernah begitu hebatnya.', 13, '2018-11-24', '00:42:57'),
(5, 'Saya suka ame', 'Tapi Boong hehe, nggak deng beneran', 13, '2018-11-24', '00:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `deskripsi_penyakit` text NOT NULL,
  `id_solusi` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `deskripsi_penyakit`, `id_solusi`, `foto`) VALUES
(1, 'P1', 'Toxoplasmosis', 'Toksoplasmosis adalah infeksi pada manusia yang ditimbulkan oleh parasit protozoa (organisme bersel satu) Toxoplasma gondii (T. gondii). Parasit ini seringkali terdapat pada kotoran kucing. ', 1, ''),
(2, 'P2', 'Scabies', 'Scabies, juga dikenal dengan nama kudis atau gudik, adalah kondisi kulit gatal karena tungau bernama Sarcoptes scabiei. ', 1, ''),
(3, 'P3', 'Jamur Ringworm (Dermatophytosis)', 'A. Etiologi Ringworm (Dermatophytosis) adalah infeksi kulit yang disebabkan oleh jamur. Ringworm dapat menyerang kulit di tubuh (tinea corporis), kulit dan rambut kepala (tinea capitis), area inguinalis (tinea cruris, juga disebut jock itch), atau kaki (tinea pedis, juga disebut athlete`s foot).', 1, ''),
(4, 'P4', 'CSD (Cat Scratch Disease)', 'Cat Scratch Disease adalah kondisi kesehatan yang disebabkan oleh cakaran kucing yang terinfeksi bakteri Bartonella henselae. Bartonela hensale merupakan salah satu bakteri paling umum di dunia. Pasalnya sekitar 40 persen kucing dan anak kucing diketahui terinfeksi bakteri ini yang umumnya terdapat di mulut atau cakar kucing.', 1, ''),
(5, 'P5', 'Rabies', 'Rabies adalah penyakit infeksi tingkat akut pada susunan saraf pusat yang disebabkan oleh virus rabies. Penyakit ini bersifat zoonotik, yaitu dapat ditularkan dari hewan ke manusia. Virus rabies ditularkan ke manusia melalu gigitan hewan misalnya oleh anjing.', 1, ''),
(6, 'P6', 'Leptospirosis', 'Leptospirosis adalah penyakit yang disebabkan oleh bakteri Leptospira interrogans yang disebarkan melalui urine atau darah hewan yang terinfeksi bakteri ini. Beberapa jenis hewan yang dapat menjadi pembawa leptospirosis adalah anjing.', 1, ''),
(7, 'P7', 'Lyme', '', 1, ''),
(8, 'P8', 'Flu Burung', 'Flu burung adalah suatu penyakit menular yang disebabkan oleh virus influenza yang ditularkan oleh unggas yang dapat menyerang manusia.', 1, ''),
(9, 'P9', 'Pssitacosis', 'Psittacosis adalah penyakit langka yang biasanya ditularkan burung kepada manusia dan disebabkan oleh kuman yang bernama Chlamydia psittaci. Pada umumnya infeksi terjadi kalau orang menghirup kumannya - biasanya dari tahi kering burung yang terkena.', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id_rules` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `cf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id_rules`, `id_penyakit`, `id_gejala`, `cf`) VALUES
(1, 1, 1, 0.9),
(2, 4, 1, 0.9),
(3, 5, 1, 0.9),
(4, 6, 1, 0.9),
(5, 7, 1, 0.9),
(6, 8, 1, 0.9),
(7, 9, 1, 0.9),
(8, 1, 2, 0.9),
(9, 2, 2, 0.9),
(10, 3, 2, 0.9),
(11, 5, 2, 0.9),
(12, 6, 2, 0.9),
(13, 8, 2, 0.9),
(14, 9, 2, 0.9),
(15, 1, 3, 0.9),
(16, 2, 3, 0.9),
(17, 3, 3, 0.9),
(18, 4, 3, 0.9),
(19, 4, 3, 0.9),
(20, 6, 3, 0.9),
(21, 7, 3, 0.9),
(22, 8, 3, 0.9),
(23, 9, 3, 0.9),
(24, 1, 4, 0.9),
(25, 2, 4, 0.9),
(26, 4, 4, 0.9),
(27, 6, 4, 0.9),
(28, 7, 4, 0.9),
(29, 8, 4, 0.9),
(30, 9, 4, 0.9),
(31, 1, 5, 0.8),
(32, 2, 5, 0.8),
(33, 3, 5, 0.8),
(34, 4, 5, 0.8),
(35, 6, 5, 0.8),
(36, 7, 5, 0.8),
(37, 8, 5, 0.8),
(38, 1, 6, 0.3),
(39, 6, 6, 0.3),
(40, 8, 6, 0.3),
(41, 1, 7, 0.3),
(42, 5, 7, 0.3),
(43, 7, 7, 0.3),
(44, 1, 8, 0.3),
(45, 7, 8, 0.3),
(46, 8, 8, 0.3),
(47, 1, 9, 0.2),
(48, 6, 9, 0.2),
(49, 1, 10, 0.2),
(50, 2, 10, 0.2),
(51, 2, 11, 0.1),
(52, 2, 12, 0.2),
(53, 3, 12, 0.2),
(54, 2, 13, 0.1),
(55, 3, 14, 0.1),
(56, 2, 15, 0.2),
(57, 3, 15, 0.2),
(58, 2, 16, 0.1),
(59, 2, 17, 0.1),
(60, 5, 17, 0.1),
(61, 5, 18, 0.1),
(62, 1, 19, 0.7),
(63, 4, 19, 0.7),
(64, 5, 19, 0.7),
(65, 6, 19, 0.7),
(66, 7, 19, 0.7),
(67, 8, 19, 0.7),
(68, 9, 19, 0.7),
(69, 5, 20, 0.1),
(70, 1, 21, 0.5),
(71, 4, 21, 0.5),
(72, 5, 21, 0.5),
(73, 6, 21, 0.5),
(74, 8, 21, 0.5),
(75, 5, 22, 0.2),
(76, 1, 23, 0.3),
(77, 5, 23, 0.3),
(78, 7, 2, 0.3),
(79, 1, 24, 0.6),
(80, 4, 24, 0.6),
(81, 6, 24, 0.6),
(82, 7, 24, 0.6),
(83, 8, 24, 0.6),
(84, 9, 24, 0.6),
(85, 4, 25, 0.2),
(86, 7, 25, 0.2),
(87, 8, 26, 0.2),
(88, 9, 26, 0.2),
(89, 1, 27, 0.3),
(90, 2, 27, 0.3),
(91, 7, 27, 0.3),
(92, 5, 28, 0.1),
(93, 3, 29, 0.1),
(94, 5, 30, 0.1),
(95, 5, 31, 0.1),
(96, 5, 32, 0.1),
(97, 2, 33, 0.1),
(98, 2, 34, 0.1),
(99, 2, 35, 0.1),
(100, 3, 36, 0.1),
(101, 2, 37, 0.2),
(102, 3, 37, 0.2),
(103, 1, 38, 0.4),
(104, 6, 38, 0.4),
(105, 7, 38, 0.4),
(106, 9, 38, 0.4),
(107, 8, 39, 0.1),
(108, 1, 40, 0.2),
(109, 8, 40, 0.2),
(110, 8, 41, 0.2),
(111, 9, 41, 0.2),
(112, 8, 42, 0.1),
(113, 8, 43, 0.2),
(114, 9, 43, 0.2),
(115, 1, 44, 0.5),
(116, 5, 44, 0.5),
(117, 7, 44, 0.5),
(118, 8, 44, 0.5),
(119, 9, 44, 0.5),
(120, 1, 45, 0.2),
(121, 9, 45, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `nama_solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `nama_solusi`) VALUES
(1, 'Pencegahan bakteri bisa dilakukan dengan pembersihan yang teratur, air minum bersih dan menyingkirkan segala benda yang bisa mengakibatkan luka pada mulut ular. pisahkann ular yang terinfeksi dari yang lain, bersihkan mulut dengan kapas atau cotton bud dengan betadine yang dicairkan, yakinkan kalau ular tidak menelan cairan pembersih dengan mengarahkan kepala ular ke bagian bawah sewaktu melakukan pembersihan, lalu oleskan obat yang mengandung antibiotik, apabila keadaan tidak juga membaik selama seminggu, segera jumpai dokter hewan yang berpengalaman sesegera mungkin.  '),
(2, 'Segera bawa ke Ruang Karantiana agar segera ditangani Oleh dokter yang tepat'),
(3, 'Pengobatan sederhana memerlukan perendaman di air hangat selama 15 menit /hari yang biasanya bisa sangat membantu mempercepat pengeluaran apalagi bila dibantu dengan pijatan ringan ke arah bawah selama perendaman. Apabila tindakan ini tidak membantu dan bagian perut ular semakin membengkak, lebih baik segera menemui dokter hewan yang berpengalaman.'),
(4, 'Kotoran ular dibawa ke laboratorium untuk diperiksa bisa untuk mendiagnosa adanya parasit pada ular, yang kemudian bisa dijadikan acuan pengobatan. Tanpa adanya diagnosa dari dokter hewan yang berpengalaman, pemakaian obat cacing sangat tidak dianjurkan.'),
(5, '1. Kurangi Intensitas Mandi Air Dingin <br>\r\n2. Rendam Dengan Air Sirih Hangat <br>\r\n3. Bersihkan Kandang Dengan Air Sirih <br>\r\n4. Beri Alas Pada Kandang <br>\r\n5. Jemur Kandang Beserta Ular <br>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `level` enum('Admin','Member') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `address`, `handphone`, `level`, `photo`, `update_at`) VALUES
(13, 'hutama', '123130040', 'Hutama Dewangga Mfckr', 'Maguwoharjo', '083213213217', 'Admin', 'user_32cbe47c46.jpg', '2018-12-23 11:24:03'),
(39, 'hutama14', '123130040', 'Hutama Dewangga', 'gagagagaa', '082342142142', 'Member', 'user_80cdbef432.png', '2018-12-31 15:12:40'),
(40, 'galeeh', '123130039', 'Galih Anggoro Jati', 'jakarta', '082382253383', 'Member', 'user_5e91432fbb.jpg', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`) USING BTREE,
  ADD KEY `id_solusi` (`id_solusi`) USING BTREE;

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id_rules`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id_rules` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD CONSTRAINT `penyakit_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
