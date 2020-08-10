-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2020 pada 11.31
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_jayasport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`id_admin` int(2) NOT NULL,
  `kode_admin` varchar(6) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `kode_admin`, `nama_admin`, `username`, `password`, `email`, `phone`, `alamat`) VALUES
(1, 'ADM001', 'Administrator', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'administrator@gmail.com', 81222339098, 'Seoul, Korea Selatan'),
(2, 'ADM002', 'Muhammad Aldi Muzakky', 'day', '827ccb0eea8a706c4c34a16891f84e7b', 'aldimuzakky@gmail.com', 81222339098, 'Konohagakure');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE IF NOT EXISTS `tbl_bank` (
`id_bank` int(2) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nama_pemilik` varchar(35) NOT NULL,
  `no_rekening` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_bank`, `nama_pemilik`, `no_rekening`, `gambar`) VALUES
(1, 'BCA', 'Genos', '3029466392', '92fffae0df9e8ffe6cf8b60c63557d1e.png'),
(2, 'Mandiri', 'Saitama', '4059208573', 'ef548aea6b56db9a723f9c7ac91d46da.png'),
(3, 'BRI', 'Nagato', '5632098140', '778473b7e82f9e47ba2c284eb60a6dfb.png'),
(4, 'Mandiri Syariah', 'Yahiko', '6475809284', 'b8a5a05025b265f80b85ec7f2494e367.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_carabooking`
--

CREATE TABLE IF NOT EXISTS `tbl_carabooking` (
`id_carabooking` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_carabooking`
--

INSERT INTO `tbl_carabooking` (`id_carabooking`, `judul`, `deskripsi`) VALUES
(1, 'Cara Booking Online Lapangan Bulutangkis di JayaSport', '<br>01. Anda harus masuk sebagai member, sebelum masuk di harapkan mendaftar agar menjadi member.\r\n<br>02. Silahkan isi semua data-data pendaftaran anda dengan baik dan benar.\r\n<br>03. Jika semua sudah di isi, maka silahkan klik tombol <b>SUBMIT</b>.\r\n<br>04. Jika sukses melakukan pendaftaran, anda sudah bisa masuk sebagai member.\r\n<br>05. Masukkan pada halaman masuk username dan password anda pada waktu mendaftar di dalam form masuk.\r\n<br>06. Jika benar, anda akan di bawa ke halaman utama website.\r\n<br>07. Pada halaman utama website anda bisa langsung booking lapangan bulutangkis.\r\n<br>08. Pilih dan lihat keterangan lapangan bulutangkis yang anda ingin booking terlebih dahulu.\r\n<br>09. Jika pilihan anda sudah benar, klik button <b>BOOKING</b>.\r\n<br>10. Tentukan berapa lama waktu anda ingin membooking lapangan bulutangkis tersebut. \r\n<br>11. Tentukan kapan tanggal dan waktu main yang anda inginkan, kemudian klik <b>SUBMIT</b>. \r\n<br>12. Pilih metode pembayaran yang tersedia.\r\n<br>13. Klik button <b>SELESAI</B>.\r\n<br>14. Setelah melakukan booking lapangan, member diharapkan melakukan konfirmasi pembayaran.\r\n<br>15. Jika sudah melakukan konfirmasi dengan <b>BENAR </b>, maka <b> admin </b> akan mengubah status menjadi <b> BOOKING </b>.\r\n<br>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hubungikami`
--

CREATE TABLE IF NOT EXISTS `tbl_hubungikami` (
`id_hubungikami` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hp` bigint(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hubungikami`
--

INSERT INTO `tbl_hubungikami` (`id_hubungikami`, `nama`, `email`, `hp`, `alamat`, `pesan`, `tanggal`, `status`) VALUES
(1, 'Membership', 'member@gmail.com', 81295058289, 'Konohagakure', 'Yaudah', '2019-08-06', 1),
(2, 'M Aldi Muzakky', 'aldimuzakky@gmail.com', 81295058289, 'Konohagakure', 'ILY', '2019-08-06', 1),
(3, 'M Aldi Muzakky', 'aldimuzakky@gmail.com', 81295058289, 'Konohagakure', 'adsdsd', '2019-09-22', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hubungi_kami_kirim`
--

CREATE TABLE IF NOT EXISTS `tbl_hubungi_kami_kirim` (
`id_hubungi_kami_kirim` int(11) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_hubungi_kami_kirim` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jam`
--

CREATE TABLE IF NOT EXISTS `tbl_jam` (
`id_jam` int(2) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jam`
--

INSERT INTO `tbl_jam` (`id_jam`, `jam_mulai`, `jam_selesai`) VALUES
(1, '09:00:00', '09:00:00'),
(2, '10:00:00', '10:00:00'),
(3, '11:00:00', '11:00:00'),
(4, '12:00:00', '12:00:00'),
(5, '13:00:00', '13:00:00'),
(6, '14:00:00', '14:00:00'),
(7, '15:00:00', '15:00:00'),
(8, '16:00:00', '16:00:00'),
(9, '17:00:00', '17:00:00'),
(10, '18:00:00', '18:00:00'),
(11, '19:00:00', '19:00:00'),
(12, '20:00:00', '20:00:00'),
(13, '21:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `tbl_konfirmasi` (
`id_konfirmasi` int(2) NOT NULL,
  `kode_transaksi` varchar(6) NOT NULL,
  `total_bayar` varchar(10) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `bank_id` int(2) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `no_rekening` int(15) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`id_konfirmasi`, `kode_transaksi`, `total_bayar`, `nama_member`, `bank_id`, `jumlah_bayar`, `no_rekening`, `atas_nama`, `nama_bank`, `pesan`) VALUES
(8, 'TRS001', '1800000', 'eka', 4, 1800000, 2147483647, 'Mentel', 'BRI', 'uwis'),
(9, 'TRS002', '900000', 'Membership', 1, 90000, 2147483647, 'Mentel', 'BRI', 'uis'),
(10, 'TRS010', '50000', 'eka', 4, 50000, 2147483647, 'eka', 'Mandiri Syariah', 'saya sudah melakukan transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kontak`
--

CREATE TABLE IF NOT EXISTS `tbl_kontak` (
`id_kontak` int(11) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`id_kontak`, `alamat`, `phone`, `email`) VALUES
(1, 'Jl. Raya Kp. Sengkol Gg. H. Kasman RT/RW.03/02 Kel. MUNCUL Kec. Setu Tangsel', 81388670160, 'jayasport487@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lapangan`
--

CREATE TABLE IF NOT EXISTS `tbl_lapangan` (
`id_lapangan` int(2) NOT NULL,
  `kode_lapangan` varchar(6) NOT NULL,
  `nama_lapangan` varchar(100) NOT NULL,
  `harga` bigint(15) NOT NULL,
  `gambar` varchar(36) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lapangan`
--

INSERT INTO `tbl_lapangan` (`id_lapangan`, `kode_lapangan`, `nama_lapangan`, `harga`, `gambar`) VALUES
(1, 'LAP001', 'Lapangan satu\r\n<br>Tidak Ada Fasilitas', 40000, 'c0cd19b9f2791e6285254a3ca81d7332.png'),
(2, 'LAP002', 'Lapangan dua\r\n<br>Fasilitas Shuttlecock', 50000, '688c3fdd01d5e9fae74c1ada611ac1ef.png'),
(3, 'LAP003', 'Lapangan tiga\r\n<br>Fasilitas Shuttlecock dan Raket', 60000, 'eb74daa5c62d46ebd4cce05d09baaf20.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_logo`
--

CREATE TABLE IF NOT EXISTS `tbl_logo` (
`id_logo` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_logo`
--

INSERT INTO `tbl_logo` (`id_logo`, `gambar`) VALUES
(1, 'af4d8c5ba91fa928c2c939f0e630853e.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
`id_member` int(2) NOT NULL,
  `kode_member` varchar(6) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `kode_member`, `nama_member`, `username`, `password`, `email`, `phone`, `alamat`) VALUES
(1, 'MBR001', 'Membership', 'member', '827ccb0eea8a706c4c34a16891f84e7b', 'member@gmail.com', 81222339092, 'Amegakure'),
(9, 'MBR002', 'eka', 'ekami', '827ccb0eea8a706c4c34a16891f84e7b', 'suryaniiieka@gmail.com', 89687654963, 'korea'),
(10, 'MBR003', 'taehyung', 'mphi', '827ccb0eea8a706c4c34a16891f84e7b', 'yulidwi.rahmawati@yahoo.com', 81388670160, 'seoul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_seo`
--

CREATE TABLE IF NOT EXISTS `tbl_seo` (
`id_seo` int(11) NOT NULL,
  `tittle` varchar(50) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_seo`
--

INSERT INTO `tbl_seo` (`id_seo`, `tittle`, `keyword`, `description`) VALUES
(1, 'JayaSport', 'JayaSport, website', 'JayaSport adalah sebuah tempat penyewaan lapangan bulutangkis yang berbasis online dalam suatu website.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
`id_slider` int(11) NOT NULL,
  `tittle` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_slider`
--

INSERT INTO `tbl_slider` (`id_slider`, `tittle`, `description`, `gambar`, `status`) VALUES
(12, 'Aturan Bulutangkis', 'Dalam permainan bulu tangkis lama permainan tidak di tentukan oleh jalannya waktu permainan namun di tentukan oleh game yang terdiri dari 21 poin. Tiap permainan maksimal 2 game jika berturut menang, namun jika 1 kali menang dan 1 kali kalah dalam setiap game maka akan di adakan game tambahan yaitu game ke 3. ', '9f8d0aaf99bfad60ee9f41734f3a04f7.png', 1),
(13, 'Definisi Bulutangkis', 'Bulu tangkis atau badminton adalah suatu olahraga raket yang dimainkan oleh dua orang (untuk tunggal) atau dua pasangan (untuk ganda) yang saling berlawanan.', 'b518efc6aec5824c95d76d1cbe3262c4.png', 1),
(14, 'Sejarah Bulutangkis', 'Olahraga bulu tangkis ditemukan oleh petugas tentara Britania di Pune India pada abad ke-19 ketika mereka menambah peralatan jaring atau net dan dimainkan secara berlawanan. Oleh karena itu kota Pune sebelumnya dikenal dengan Poona, ketika itu permainan ini mempunyai sebutan lain yaitu Poona. ', 'ec3b308dd88b32f8cfd0f1fcbfbb5629.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sosial_media`
--

CREATE TABLE IF NOT EXISTS `tbl_sosial_media` (
`id_sosial_media` int(11) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `gp` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sosial_media`
--

INSERT INTO `tbl_sosial_media` (`id_sosial_media`, `tw`, `fb`, `gp`) VALUES
(1, 'http://twitter.com', 'http://facebook.com', 'http://gplus.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tentangkami`
--

CREATE TABLE IF NOT EXISTS `tbl_tentangkami` (
`id_tentangkami` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tentangkami`
--

INSERT INTO `tbl_tentangkami` (`id_tentangkami`, `judul`, `deskripsi`) VALUES
(1, 'Kami Hadir Untuk Anda | Jaya Sport', 'Jaya Sport adalah sebuah tempat penyewaan lapangan bulutangkis yang berbasis online dalam <br> suatu website yang berguna mempermudah bagi para pengunjung yang ingin menggunakan lapangan kami.<br>\r\n\r\n<br>Salam Owner<br>\r\n<b>@unique.code__ </b>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
`id_transaksi` int(2) NOT NULL,
  `kode_transaksi` varchar(6) NOT NULL,
  `member_id` int(2) NOT NULL,
  `lapangan_id` int(2) NOT NULL,
  `tgl_booking` date NOT NULL,
  `jam_booking` time NOT NULL,
  `tgl_main` varchar(20) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `jam_selesai` varchar(10) NOT NULL,
  `durasi` varchar(5) NOT NULL,
  `total` double NOT NULL,
  `bank_id` int(2) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Belum Konfirmasi'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `kode_transaksi`, `member_id`, `lapangan_id`, `tgl_booking`, `jam_booking`, `tgl_main`, `jam_mulai`, `jam_selesai`, `durasi`, `total`, `bank_id`, `status`) VALUES
(9, 'TRS001', 7, 3, '2020-06-01', '14:46:00', '04/06/2020', '09:00:00', '15:00:00', '6', 1800000, 4, 'Booking'),
(10, 'TRS002', 1, 3, '2020-06-01', '14:59:00', '01/06/2020', '09:00:00', '12:00:00', '3', 900000, 1, 'Booking'),
(11, 'TRS003', 8, 1, '2020-06-11', '13:17:00', '', '09:00:00', '09:00:00', '0', 0, 4, 'Booking'),
(12, 'TRS004', 8, 1, '2020-06-11', '13:30:00', '', '09:00:00', '09:00:00', '0', 0, 4, 'Belum Konfirmasi'),
(13, 'TRS005', 8, 1, '2020-06-11', '14:04:00', '', '09:00:00', '09:00:00', '0', 0, 4, 'Belum Konfirmasi'),
(14, 'TRS006', 8, 2, '2020-06-11', '14:06:00', '12/06/2020', '09:00:00', '11:00:00', '2', 400000, 4, 'Belum Konfirmasi'),
(15, 'TRS007', 9, 1, '2020-06-23', '21:47:00', '24/06/2020', '09:00:00', '10:00:00', '1', 40000, 4, 'Booking'),
(16, 'TRS008', 9, 3, '2020-07-03', '11:47:00', '05/07/2020', '17:00:00', '19:00:00', '2', 120000, 4, 'Booking'),
(17, 'TRS009', 9, 1, '2020-07-09', '22:39:00', '25/07/2020', '19:00:00', '21:00:00', '2', 80000, 1, 'Booking'),
(18, 'TRS010', 9, 2, '2020-07-11', '20:56:00', '12/07/2020', '19:00:00', '20:00:00', '1', 50000, 4, 'Belum Konfirmasi'),
(19, 'TRS011', 9, 1, '2020-07-11', '21:58:00', '22/07/2020', '15:00:00', '16:00:00', '1', 40000, 4, 'Belum Konfirmasi'),
(20, 'TRS012', 9, 2, '2020-07-13', '13:37:00', '23/07/2020', '09:00:00', '11:00:00', '2', 100000, 4, 'Belum Konfirmasi'),
(21, 'TRS013', 9, 2, '2020-07-13', '13:56:00', '14/07/2020', '14:00:00', '15:00:00', '1', 50000, 4, 'Belum Konfirmasi'),
(22, 'TRS014', 9, 2, '2020-08-04', '19:35:00', '06/08/2020', '09:00:00', '10:00:00', '1', 50000, 4, 'Belum Konfirmasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
 ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_carabooking`
--
ALTER TABLE `tbl_carabooking`
 ADD PRIMARY KEY (`id_carabooking`);

--
-- Indexes for table `tbl_hubungikami`
--
ALTER TABLE `tbl_hubungikami`
 ADD PRIMARY KEY (`id_hubungikami`);

--
-- Indexes for table `tbl_hubungi_kami_kirim`
--
ALTER TABLE `tbl_hubungi_kami_kirim`
 ADD PRIMARY KEY (`id_hubungi_kami_kirim`);

--
-- Indexes for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
 ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
 ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
 ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
 ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
 ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
 ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
 ADD PRIMARY KEY (`id_seo`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tbl_sosial_media`
--
ALTER TABLE `tbl_sosial_media`
 ADD PRIMARY KEY (`id_sosial_media`);

--
-- Indexes for table `tbl_tentangkami`
--
ALTER TABLE `tbl_tentangkami`
 ADD PRIMARY KEY (`id_tentangkami`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
MODIFY `id_bank` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_carabooking`
--
ALTER TABLE `tbl_carabooking`
MODIFY `id_carabooking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_hubungikami`
--
ALTER TABLE `tbl_hubungikami`
MODIFY `id_hubungikami` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_hubungi_kami_kirim`
--
ALTER TABLE `tbl_hubungi_kami_kirim`
MODIFY `id_hubungi_kami_kirim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
MODIFY `id_jam` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
MODIFY `id_konfirmasi` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
MODIFY `id_lapangan` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
MODIFY `id_member` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
MODIFY `id_seo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_sosial_media`
--
ALTER TABLE `tbl_sosial_media`
MODIFY `id_sosial_media` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_tentangkami`
--
ALTER TABLE `tbl_tentangkami`
MODIFY `id_tentangkami` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
MODIFY `id_transaksi` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
