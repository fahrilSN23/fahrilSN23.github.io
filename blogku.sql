-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Okt 2023 pada 13.23
-- Versi server: 8.0.30
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int NOT NULL,
  `tema` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int NOT NULL DEFAULT '1',
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `gambar`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `dibaca`, `email`) VALUES
(70, 'Hari Sumpah Pemuda', 'hari-sumpah-pemuda', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum. Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur fugiat, temporibus enim commodi iusto libero magni deleniti quod quam consequuntur! Commodi minima excepturi repudiandae velit hic maxime doloremque. Quaerat provident commodi consectetur veniam similique ad earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam quasi aliquam eligendi, placeat qui corporis!</span><br></p>', 'YSPT', 'Fahril', '1698031097_4cf6438c5c1deed100f9.jpg', '2023-10-18', '2023-10-19', '2023-10-26', '8:00 s/d 15:00', 0, 'fahrilsn@mail.com'),
(71, 'Pekan 17 agustus', 'pekan-17-agustus', '<p><span style=\"color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum. Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur fugiat, temporibus enim commodi iusto libero magni deleniti quod quam consequuntur! Commodi minima excepturi repudiandae velit hic maxime doloremque. Quaerat provident commodi consectetur veniam similique ad earum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo fugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore suscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium modi minima sunt esse temporibus sint culpa, recusandae aliquam numquam totam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam quasi aliquam eligendi, placeat qui corporis!</span><br></p>', 'Kapsul Waktu Merauke', 'Katuk', '1698030943_d0cf610233d2a4bb8a9b.png', '2023-08-14', '2023-08-20', '2023-10-26', '7:30 s/d 16:30', 0, 'fahrilsn@mail.com'),
(74, 'Kekuatan Dari Dalam', 'kekuatan-dari-dalam', '<p><span style=\"font-family: Consolas, Monaco, &quot;Andale Mono&quot;, &quot;Ubuntu Mono&quot;, monospace; white-space: pre; background-color: rgb(255, 255, 255);\"><font color=\"#000000\" style=\"\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos \r\nsapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit \r\nquibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur \r\nfugiat, temporibus enim commodi iusto libero magni deleniti quod quam \r\nconsequuntur! Commodi minima excepturi repudiandae velit hic maxime\r\ndoloremque. Quaerat provident commodi consectetur veniam similique ad \r\nearum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo \r\nfugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore \r\nsuscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium\r\nmodi minima sunt esse temporibus sint culpa, recusandae aliquam numquam \r\ntotam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam \r\nquasi aliquam eligendi, placeat qui corporis!</font></span><br></p>', 'Laparngan Kodim', 'Difa', '1698143751_0649311c516a8b5e4fdb.jpg', '2023-10-24', '2023-10-26', '2023-10-26', '8:00 s/d 10:30', 0, 'fahrilsn@mail.com'),
(76, 'QAgenda', 'qagenda', '<p>asdsads</p>', 'asdas', 'dsad', '1698664451_f0688fbbd9f75717e7bf.jpg', '2023-10-30', '2023-10-30', '2023-10-30', '20:15 s/d 20:15', 0, 'fahrilsn@mail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int NOT NULL,
  `jdl_album` varchar(100) NOT NULL,
  `album_seo` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gbr_album` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `keterangan`, `gbr_album`, `aktif`, `tgl_posting`, `jam`, `hari`, `email`) VALUES
(1, 'YSPT', 'yspt', 'Pnodk SPT', 'yspt.png', 'Y', '2023-10-17', '08:08:48', 'Selasa', 'fahrilsn@mail.com'),
(2, 'Pesantren Santri Perbatasan Timur', 'pesantren-santri-perbatasan-timur', '<p>Pondoku</p>', '1697512424_943f1d6a52bf4299851f.png', 'Y', '2023-10-17', '02:56:23', 'Selasa', 'fahrilsn@mail.com'),
(3, 'Hari Santri Nasional 2023', 'hari-santri-nasional-2023', '<p>Peringatan hari santri</p>', '1697511666_3746eb8311a8abe4a76f.png', 'Y', '2023-10-17', '12:01:06', 'Selasa', 'fahrilsn@mail.com'),
(7, 'Album Operator', 'album-operator', '<p>dasdas</p>', '1698140130_1477593817f25e02a1a7.png', 'Y', '2023-10-24', '18:33:00', 'Selasa', 'test@mail.com'),
(8, 'Album ajah', 'album-ajah', '<p>dfs</p>', '1698661585_760c24cecdd32f7dde1e.png', 'Y', '2023-10-30', '19:25:47', 'Senin', 'fahrilsn@mail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `id_kategori` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` text NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `headline` enum('Y','N') NOT NULL,
  `isi_artikel` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan_gambar` text NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` int NOT NULL,
  `tag` varchar(150) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_kategori`, `email`, `judul`, `judul_seo`, `youtube`, `headline`, `isi_artikel`, `gambar`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `dibaca`, `tag`, `status`) VALUES
(2, 1, 'fahrilsn@mail.com', 'Test Artikel 1', 'test-artikel-1', 'Antcode', 'Y', '<p>sdfasdf</p>', '1697944184_33450d438e8f79c763ba.png', 'Logo YSPT', 'Minggu', '2023-10-22', '12:10:14', 25, 'teknologi', 'Y'),
(5, 3, 'test@mail.com', 'Artikel Dua Tiga', 'artikel-dua-tiga', '', 'N', '<p></p><div style=\"text-align: justify;\"><span style=\"font-family: arial;\" andale=\"\" mono\",=\"\" \"ubuntu=\"\" monospace;=\"\" white-space:=\"\" pre;\"=\"\"><font color=\"#000000\" style=\"\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, </font></span><span style=\"color: rgb(0, 0, 0); text-align: left; font-family: arial;\">molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos \r\nsapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit \r\nquibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur \r\nfugiat, temporibus enim commodi iusto libero magni deleniti quod quam \r\nconsequuntur! Commodi minima excepturi repudiandae velit hic maxime\r\ndoloremque. Quaerat provident commodi consectetur veniam similique ad \r\nearum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo \r\nfugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore \r\nsuscipit quas? Nulla, placeat. </span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); text-align: left; font-family: arial;\">Voluptatem quaerat non architecto ab laudantium\r\nmodi minima sunt esse temporibus sint culpa, recusandae aliquam numquam \r\ntotam ratione voluptas quod exercitationem fuga. </span><span style=\"color: rgb(0, 0, 0); text-align: left; font-family: arial;\">Possimus quis earum veniam \r\nquasi aliquam eligendi, placeat qui corporis!</span></div><p></p>', '1698125739_fc21f3c3c79210463b49.jpg', 'gfsfg', 'Senin', '2023-10-30', '20:53:26', 15, 'teknologi,nasional', 'Y'),
(6, 4, 'fahrilsn@mail.com', 'Artikelasdasd', 'artikelasdasd', '', 'N', '<p>asdasdsda</p>', 'No-image.jpg', '', 'Rabu', '2023-10-25', '12:05:10', 12, 'nasional', 'Y'),
(7, 4, 'fahrilsn@mail.com', 'Bakso Malang', 'bakso-malang', '', 'N', '', 'No-image.jpg', '', 'Rabu', '2023-10-25', '12:06:09', 9, 'nasional', 'Y'),
(8, 9, 'fahrilsn@mail.com', 'Artikel Coba Coba', 'artikel-coba-coba', 'https://www.youtube.com/embed/uVP1hBnK3EQ?si=AcWHi5LVEu7865Bj', 'Y', '<p>Artikel Coba -coba</p>', '1698661265_e62ac08848f5c4c19ea3.png', 'logo', 'Senin', '2023-10-30', '19:21:20', 0, 'tag-one-two', 'Y'),
(10, 4, 'test@mail.com', 'Artikel Satu', 'artikel-satu', 'adas', 'N', '<p>sdsadsd</p>', '1698666915_51c5b3e9c94f8c20c211.jpg', 'cbc', 'Senin', '2023-10-30', '20:55:15', 0, 'tag-one-two', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE `download` (
  `id_download` int NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(2, 'Teest', '1698060093_3dcdf6a397507b59df72.docx', '2023-10-23', 8),
(3, 'SURAT-KETERANGAN-USAHA', '1698060032_fa35b9bfe3ae2ed8e746.pdf', '2023-10-23', 9),
(6, 'Cover Rapor', '1698664745_441fca32d5e3a78700cf.jpeg', '2023-10-30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int NOT NULL,
  `id_album` int NOT NULL,
  `jdl_gallery` varchar(100) NOT NULL,
  `gbr_gallery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `jdl_gallery`, `gbr_gallery`) VALUES
(1, 3, 'Yayasan Santri Perbatasan Timur', 'yspt.png'),
(2, 3, 'Pesantren Perbatasan Timur', '1697599837_9547229153b4d2f7c08c.png'),
(6, 2, 'Keluarga', '1697600517_c8240a3df16098f4de6d.jpg'),
(10, 7, 'dsfsf', '1698140004_378eede1b6d028d657a8.png'),
(11, 7, 'asdsd', '1698140021_f5fc7571668e6b680f32.png'),
(12, 8, 'g1', '1698661606_64518a467cbaf1b88661.jpeg'),
(13, 8, 'g2', '1698661617_22062e67c9fb68236b3e.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id_halaman` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text,
  `tgl_posting` date DEFAULT NULL,
  `gambar` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'No-image.jpg',
  `username` varchar(50) DEFAULT NULL,
  `dibaca` int DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(1, 'Tentang Kami', 'tentang-kami', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 255);\"><span style=\"font-family: Verdana;\">﻿</span><span style=\"\" andale=\"\" mono\",=\"\" \"ubuntu=\"\" monospace;=\"\" white-space:=\"\" pre;=\"\" background-color:=\"\" rgb(39,=\"\" 40,=\"\" 34);\"=\"\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos \r\nsapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit \r\nquibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur \r\nfugiat, temporibus enim commodi iusto libero magni deleniti quod quam \r\nconsequuntur! Commodi minima excepturi repudiandae velit hic maxime\r\ndoloremque. Quaerat provident commodi consectetur veniam similique ad \r\nearum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo \r\nfugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore \r\nsuscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium\r\nmodi minima sunt esse temporibus sint culpa, recusandae aliquam numquam \r\ntotam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam \r\nquasi aliquam eligendi, placeat qui corporis!</span></font><br></p>', '2023-10-10', '1697501295_9848412cbd2ecf257e30.jpg', 'fahrilsn@mail.com', NULL, NULL, NULL),
(2, 'Kontak Kami', 'kontak-kami', '<p>Jika anda ingin mendapat informasi lebih lanjut mengenai kami silahkan menghubungi kami melalui kontak di bawah ini</p><p>328394938294</p>', '2023-10-01', '1697501148_7fec334e2bb6810fedd8.png', 'fahrilsn@mail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) NOT NULL,
  `meta_deskripsi` text,
  `meta_keyword` varchar(100) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `maps` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `facebook`, `instagram`, `youtube`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `maps`) VALUES
(1, 'Dinkes Merauke', 'puskesmasmopah@mail.com', 'https://web.facebook.com/', 'fahril_sn', 'https://www.youtube.com/channel/UCd_dyGwymXHobrknbJbSDqw', '082335058132', 'Dinkes Merauke', 'Puskesmas Mopah', '1698658059_b9a8d40dff54858edd40.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.5610050212995!2d140.43888467393427!3d-8.541927386577175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x69b53e2c48336183%3A0x8bcc939b72266d5a!2sDinas%20Kesehatan%20Kab.%20Merauke!5e0!3m2!1sid!2sid!4v1696399250563!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan_sidebar`
--

CREATE TABLE `iklan_sidebar` (
  `id_iklan` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `iklan_sidebar`
--

INSERT INTO `iklan_sidebar` (`id_iklan`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(6, 'Momogi Snack', 'https://youtu.be/XdmbdwiI-90?si=pyrf1nVrhubz62j4', '1698020378_9854b70090af35e3eb3a.webp', '2023-10-23'),
(10, 'TikTok ID', 'https://www.tiktok.com/id-ID/', '1698663818_6662c8badb2896362d22.jpg', '2023-10-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan_slide`
--

CREATE TABLE `iklan_slide` (
  `id_iklan` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `iklan_slide`
--

INSERT INTO `iklan_slide` (`id_iklan`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'Susu Bearbrand', 'https://youtu.be/LvI7-OYwaeI?si=td9sJeJdz8AEhcFs', '1698018309_a53e5685fe480a3d8ba4.jpg', '2023-10-20'),
(2, 'Upacara Peringatan Hari Santri Nasional 2023', 'https://www.youtube.com/results?search_query=hari+santri+nasional+2023', '1698018475_896df5f1ad5d2ba24f9d.png', '2023-10-23'),
(3, 'Iklan Sunsilk', 'https://youtu.be/MpBhOBZxB1c?si=tQ18nvHc8VfkiNj_', '1698018362_0048cbbd4ec03a93e3f6.webp', '2023-10-23'),
(6, 'Lagu Ibu - Iwan Flas', 'https://www.youtube.com/watch?v=SGm9hnG2OBw', '1698663657_e89dce2d51b0ca9558b4.jpg', '2023-10-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `name_kategori` varchar(100) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `name_kategori`, `slug_kategori`, `email`, `aktif`) VALUES
(1, 'Olahraga Menantang Maut', 'olahraga-menantang-maut', 'fahrilsn@mail.com', 'Y'),
(3, 'Budaya Islam', 'budaya-islam', 'test@mail.com', 'Y'),
(4, 'Kuliner Nusantara', 'kuliner-nusantara', 'fahrilsn@mail.com', 'Y'),
(9, 'Tes Kategori', 'tes-kategori', 'fahrilsn@mail.com', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarartikel`
--

CREATE TABLE `komentarartikel` (
  `id_komentar` int NOT NULL,
  `id_berita` int NOT NULL,
  `nama_komentar` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `dibaca` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'N',
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `komentarartikel`
--

INSERT INTO `komentarartikel` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`, `dibaca`, `email`) VALUES
(6, 5, 'Fahril', 'https://www.antcode.com', 'Artikel Mantap', '0000-00-00', '00:00:00', 'Y', 'Y', 'fahril@mail.com'),
(7, 5, 'sadsadsf', '', 'ddfassd', '0000-00-00', '00:00:00', 'Y', 'N', 'sdads@mail.com'),
(8, 5, 'Tes', '', 'Tes Komentar', '2023-10-28', '22:01:22', 'Y', 'N', 'tes@mail.com'),
(9, 5, 'sdfsa', 'asdkd', 'bangsat kamu', '2023-10-28', '22:07:42', 'Y', 'Y', 'sfda@asdns.vom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarvideo`
--

CREATE TABLE `komentarvideo` (
  `id_komentar` int NOT NULL,
  `id_video` int NOT NULL,
  `nama_komentar` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `dibaca` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `komentarvideo`
--

INSERT INTO `komentarvideo` (`id_komentar`, `id_video`, `nama_komentar`, `email`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`, `dibaca`) VALUES
(6, 3, 'Fadin', 'dinol@mail.com', 'MashaAllah Tabarkallah', '2023-10-29', '10:14:35', 'N', 'Y'),
(7, 3, 'Fahril', 'fahril@mail.com', 'Tes sensor komentar sex, pantat, bajingan, bangsat', '2023-10-29', '10:15:23', 'Y', 'Y'),
(9, 10, 'Brok', 'brok@mail.com', 'adksd', '2023-10-30', '20:33:45', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `id_logo` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`id_logo`, `name`) VALUES
(1, '1698658023_3824db0e438ad82eaea9.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `id_parent` int DEFAULT '0',
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'Ya',
  `urutan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `urutan`) VALUES
(1, 0, 'Beranda', 'beranda', 'Ya', 1),
(10, 0, 'Profil', '#profil', 'Ya', 2),
(12, 10, 'Tentang Kami', 'page/detail/tentang-kami', 'Ya', 1),
(15, 0, 'Artikel & Foto', 'listartikel', 'Ya', 3),
(19, 0, 'Video', 'listvideo', 'Ya', 4),
(23, 0, 'Modul Interaksi', '#modulinteraksi', 'Ya', 5),
(24, 23, 'Agenda', 'listagenda', 'Ya', 1),
(25, 23, 'Sekilas Info', 'listinfo', 'Ya', 2),
(26, 23, 'Download', 'listdownload', 'Ya', 3),
(27, 0, 'Kontak', 'page/detail/kontak-kami', 'Ya', 7),
(29, 15, 'Budaya Islam', 'kategoriartikel/detail/budaya-islam', 'Ya', 1),
(30, 15, 'Olahraga Menantang Maut', 'kategoriartikel/detail/olahraga-menantang-maut', 'Ya', 2),
(31, 15, 'Kuliner Nusantara', 'kategoriartikel/detail/kuliner-nusantara', 'Ya', 3),
(32, 19, 'MTs SPT', 'listvideo/detail/playlist-mts-spt', 'Ya', 1),
(33, 19, 'Pontren SPT', 'listvideo/detail/playlist-pontren-spt', 'Ya', 2),
(34, 19, 'Operator', 'listvideo/detail/playlist-operator', 'Ya', 3),
(36, 15, 'Foto', 'listfoto', 'Ya', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2023-09-13-125716', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1694610205, 1),
(3, '2023-09-29-103205', 'App\\Database\\Migrations\\CreateUsers', 'default', 'App', 1695983642, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int NOT NULL,
  `jdl_playlist` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `playlist_seo` varchar(100) NOT NULL,
  `gbr_playlist` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `jdl_playlist`, `email`, `playlist_seo`, `gbr_playlist`, `aktif`) VALUES
(3, 'Playlist MTs SPT', 'fahrilsn@mail.com', 'playlist-mts-spt', '1697760501_06ee3bad2c1af773c3f4.png', 'Y'),
(4, 'Playlist Pontren SPT', 'fahrilsn@mail.com', 'playlist-pontren-spt', '1697760461_b7ee8bc2173818de67e8.png', 'Y'),
(7, 'Playlist Operator', 'test@mail.com', 'playlist-operator', '1698140354_e322676dd84ecf35e342.png', 'Y'),
(8, 'Mlm', 'fahrilsn@mail.com', 'mlm', '1698661799_25e88f7d083c476413c6.jpeg', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekilasinfo`
--

CREATE TABLE `sekilasinfo` (
  `id_sekilasinfo` int NOT NULL,
  `info` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilasinfo`, `info`, `tgl_posting`, `gambar`, `aktif`) VALUES
(1, '<p>info pertama saya</p>', '2023-10-23', '1698033423_172e029b92720c9e7d1a.jpg', 'Y'),
(2, '<p>Info kedua</p>', '2023-10-25', '1698033396_2b43e39db58d51d5cef5.jpg', 'Y'),
(5, '<p>Info ku tenang</p>', '2023-10-30', 'No-image.jpg', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sensorkomentar`
--

CREATE TABLE `sensorkomentar` (
  `id_sensorkomentar` int NOT NULL,
  `kata` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ganti` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `sensorkomentar`
--

INSERT INTO `sensorkomentar` (`id_sensorkomentar`, `kata`, `email`, `ganti`) VALUES
(1, 'sex', 'fahrilsn@mail.com', 's**'),
(2, 'bajingan', 'fahrilsn@mail.com', 'b******n'),
(3, 'bangsat', 'fahrilsn@mail.com', 'b*****t'),
(5, 'pantat', 'fahrilsn@mail.com', 'p****t'),
(7, 'jancok koe', 'fahrilsn@mail.com', 'j****k k**');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_artikel`
--

CREATE TABLE `tag_artikel` (
  `id_tag_artikel` int NOT NULL,
  `nama_tag` varchar(100) NOT NULL,
  `tag_seo` varchar(100) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tag_artikel`
--

INSERT INTO `tag_artikel` (`id_tag_artikel`, `nama_tag`, `tag_seo`, `count`) VALUES
(2, 'Teknologi', 'teknologi', 1),
(3, 'Nasional', 'nasional', 0),
(6, 'Tag One Two', 'tag-one-two', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_video`
--

CREATE TABLE `tag_video` (
  `id_tag_video` int NOT NULL,
  `nama_tag` varchar(100) NOT NULL,
  `tag_seo` varchar(100) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tag_video`
--

INSERT INTO `tag_video` (`id_tag_video`, `nama_tag`, `tag_seo`, `count`) VALUES
(1, 'Kecerdasan Buatan', 'kecerdasan-buatan', 0),
(3, 'Olahraga Ekstrem', 'olahraga-ekstrem', 0),
(4, 'Kuliner Nusantara', 'kuliner-nusantara', 0),
(5, 'tag video one two', 'tag-video-one-two', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `level_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `foto`, `nama_user`, `email_user`, `password_user`, `level_user`) VALUES
(1, '1698655098_ae56fa0307c1cf8b9d9c.jpeg', 'Fahril S. Nur, S.Kom', 'fahrilsn@mail.com', '$2y$10$55rOcDC0dFuTiTBSu1kbXOJydul1Pna0LakaYx9jy3Br6AtYLjodK', 'Administrator'),
(3, '1698666023_2dff74708f4b09f458b4.webp', 'Test Saja', 'test@mail.com', '$2y$10$vq6SCiSeIRn0l26Xwwxu1.Cx7oZJBg31W7rC3SxeA5Ey1/iV7EYzy', 'Operator'),
(9, 'avatar-2.png', 'Dinol', 'dinol@mail.com', '$2y$10$14nlxTeLIX9SCgkGuHci4eRvlqIQyndUlPZ9I1WlGzDz6ogZaLcdS', 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int NOT NULL,
  `id_playlist` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `jdl_video` varchar(100) NOT NULL,
  `video_seo` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `gbr_video` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `dilihat` int NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `id_playlist`, `email`, `jdl_video`, `video_seo`, `keterangan`, `gbr_video`, `youtube`, `dilihat`, `hari`, `tanggal`, `jam`, `tag`) VALUES
(3, 4, 'fahrilsn@mail.com', 'Makanan Kesukaan Nabi', 'makanan-kesukaan-nabi', '<p>Makanan Kesukaan Nabi<br></p>', '1698016342_3f127e99047a91f2b1b6.png', 'https://www.youtube.com/embed/HlhW26PZr9Q?si=KULRfI7N7BYNxFOS', 0, 'Minggu', '2023-10-29', '10:10:33', 'kuliner-nusantara'),
(8, 8, 'fahrilsn@mail.com', 'Video Ibu', 'video-ibu', '<p>dsadfs</p>', '1698662407_f5f639cc771a926108fd.jpg', 'https://www.youtube.com/embed/SGm9hnG2OBw?si=l_OW0Cr5bxDoDdyz', 0, 'Senin', '2023-10-30', '19:40:07', 'tag-video-one-two'),
(10, 7, 'test@mail.com', 'Video Operator', 'video-operator', '<p>sadasd</p>', '1698665447_c17f4bfc6f8c060e9d02.jpg', 'https://www.youtube.com/embed/SGm9hnG2OBw?si=l_OW0Cr5bxDoDdyz', 0, 'Senin', '2023-10-30', '20:30:47', 'tag-video-one-two');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `iklan_sidebar`
--
ALTER TABLE `iklan_sidebar`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indeks untuk tabel `iklan_slide`
--
ALTER TABLE `iklan_slide`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `komentarartikel`
--
ALTER TABLE `komentarartikel`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `komentarvideo`
--
ALTER TABLE `komentarvideo`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`);

--
-- Indeks untuk tabel `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  ADD PRIMARY KEY (`id_sekilasinfo`);

--
-- Indeks untuk tabel `sensorkomentar`
--
ALTER TABLE `sensorkomentar`
  ADD PRIMARY KEY (`id_sensorkomentar`);

--
-- Indeks untuk tabel `tag_artikel`
--
ALTER TABLE `tag_artikel`
  ADD PRIMARY KEY (`id_tag_artikel`);

--
-- Indeks untuk tabel `tag_video`
--
ALTER TABLE `tag_video`
  ADD PRIMARY KEY (`id_tag_video`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id_halaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `iklan_sidebar`
--
ALTER TABLE `iklan_sidebar`
  MODIFY `id_iklan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `iklan_slide`
--
ALTER TABLE `iklan_slide`
  MODIFY `id_iklan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `komentarartikel`
--
ALTER TABLE `komentarartikel`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `komentarvideo`
--
ALTER TABLE `komentarvideo`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  MODIFY `id_sekilasinfo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sensorkomentar`
--
ALTER TABLE `sensorkomentar`
  MODIFY `id_sensorkomentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tag_artikel`
--
ALTER TABLE `tag_artikel`
  MODIFY `id_tag_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tag_video`
--
ALTER TABLE `tag_video`
  MODIFY `id_tag_video` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
