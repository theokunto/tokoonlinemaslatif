-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2019 pada 05.18
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gutbalan_sop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `provinsi`, `kota`, `kecamatan`, `no_hp`) VALUES
(1, 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `sub_kategori` int(11) NOT NULL,
  `home` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `gambar`, `sub_kategori`, `home`) VALUES
(1, 'Herbal', 'https://sr4ys49v4cf86dvi-zippykid.netdna-ssl.com/wp-content/uploads/2016/10/alternative-medicine-herbal-medicine.jpg', 0, 0),
(2, 'Madu', 'https://www.honestdocs.id/system/blog_articles/main_hero_images/000/001/514/large/Manfaat_Madu_Berikut_Ini_Sungguh_Mencengangkan.jpg', 0, 0),
(9, 'Desain', 'https://scanqr.xyz/apiku/upload/kategori/1559366482.jpg', 0, 0),
(4, 'Buku', 'https://scanqr.xyz/apiku/upload/kategori/1559095038.jpg', 0, 0),
(8, 'Kolak', 'https://scanqr.xyz/apiku/upload/kategori/1559102395.jpg', 0, 0),
(22, 'testsub3', './images/mgg-vitchakorn-527292-unsplash.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` text NOT NULL,
  `waktu_buat` datetime NOT NULL,
  `waktu_login` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `nama`, `alamat`, `email`, `hp`, `password`, `token`, `waktu_buat`, `waktu_login`) VALUES
(1, 'Nama', 'Solo', 'tes@gmail.com', '0852', '25d55ad283aa400af464c76d713c07ad', 'faMHcyjJFXE:APA91bHtQduMRxKEGZtQ3MRoaRVHKyw5L4teAvUlsgM99tAsAckdOFUlMp1MWshb7c2kbOi1eWP1n6tLkf05o3OJjm7nw6DHlXCVO5ovzxa6MlW4rnMerUGzQpfsnL0Cxi6mvTj6HTNI', '2019-05-24 06:01:01', '0000-00-00 00:00:00'),
(2, 'Budiyanto', 'Surakarta', 'a@b.com', '085123456789', '25d55ad283aa400af464c76d713c07ad', '', '2019-05-24 16:21:34', '0000-00-00 00:00:00'),
(3, 'Muhammad', 'Solo', 'm@gmail.com', '08572266643', 'e10adc3949ba59abbe56e057f20f883e', 'egaxG4wemIY:APA91bG1bcW7apNzU4pI8xr6Thkou-npvcjG1vlrxr9ipBTR--s9X7vjnCXQOhAzTQEyQbsENGhPZUHC3otio6NWQrcd8-Etu8ElidYIYPnya5P30eR0whWZJHvf_p8fgYO5Vlp8BDfi', '2019-05-27 11:34:12', '0000-00-00 00:00:00'),
(4, 'Slamet', 'Jepara rt 22', 'slametbirodin@gmail.com', '085743448960', '2ca909352170522037a63538ee9b807e', 'fHjtLXxEEv4:APA91bHlYGERNbdd6npGYUpZ8Dm4i_Zp3OPWu_LGAPzkCuAY9bt_5CZ3fbtJEYPff-qJ31gTemtx7aJNBvWTtkcFE5zrfu8glTdR8NThDXTWn6IJgTG7wrwdi2HyWUhcc8mh5i7p5OPM', '2019-05-28 15:02:39', '0000-00-00 00:00:00'),
(5, 'Agus Budiman', 'Surakarta', 'n@n.co', '085222333666', 'fdf169558242ee051cca1479770ebac3', 'dydhfwsM_as:APA91bGUJOLSEGJh013ILO-Gf7BiNagRBoZb_uqzNnvsfCz2pA9fyDZl4VrgMRjH0i2loerX6qa1LHJV76V1yRyR6p0eV6kcDRcPJ62svJ4_XQih_Zqvcsr1GceCiePeRwOjy-VdtG6L', '2019-05-30 10:47:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `deskripsi` text CHARACTER SET utf8 NOT NULL,
  `member_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `judul`, `deskripsi`, `member_id`, `waktu`) VALUES
(1, 'Selamat datang ya', 'Aplikasi belanja online terpercaya', 0, '2019-05-25 16:58:02'),
(3, 'Test notifikasi', 'Ini adalah test notifikasi', 0, '2019-05-31 08:26:31'),
(5, 'Tes dulu', 'Tes dulu saudara2', 0, '2019-06-02 14:42:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `member_id` int(11) NOT NULL,
  `keterangan` text CHARACTER SET utf8 NOT NULL,
  `total_bayar` varchar(12) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text CHARACTER SET utf8 NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `biaya_ongkir` varchar(12) NOT NULL,
  `alamat_detail` varchar(500) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `resi` varchar(100) NOT NULL,
  `konfirmasi` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `invoice`, `member_id`, `keterangan`, `total_bayar`, `nama`, `no_hp`, `alamat`, `ongkir`, `biaya_ongkir`, `alamat_detail`, `kurir`, `resi`, `konfirmasi`, `status`, `waktu`) VALUES
(1, '51559375340', 5, '', '20000.0', 'Nama', '085222333666', 'Alamat', 'JET Express REG 2 - 4 hari - Rp 17,000', '17000', 'Ciledug, Kota Tangerang, Banten (Kode Pos: 25555)', '', '1234567', '', 2, '2019-06-01 14:49:00'),
(2, '51559376064', 5, '', '60000.0', 'Nama', '085222333666', 'Alamat', 'Wahana Prestasi Logistik Normal  - Rp 24,000', '24000', 'Jepara, Kabupaten Jepara, Jawa Tengah (Kode Pos: 25555)', '', 'bxhxkhxhk', 'https://scanqr.xyz/apiku/upload/1559376087.jpg', 3, '2019-06-01 15:01:04'),
(3, '51559450472', 5, '', '48500.0', 'Nama', '085222333666', 'Alamat', 'POS Paket Kilat Khusus 2-4 hari - Rp 45,500', '45500', 'Simpang Renggiang, Kabupaten Belitung Timur, Bangka Belitung (Kode Pos: 25555)', '', 't', '', 1, '2019-06-02 11:41:12'),
(4, '51559524943', 5, '', '7500.0', 'Nama', '085222333666', 'Alamat', 'TIKI REG 2 hari - Rp 5,000', '5000', 'Jetis, Kota Yogyakarta, DI Yogyakarta (Kode Pos: 25555)', '', '516839', 'https://scanqr.xyz/apiku/upload/1559524965.jpg', 3, '2019-06-03 08:22:23'),
(5, '51559527291', 5, '', '12500.0', 'Nama', '085222333666', 'Alamat', 'JET Express XPS 0 - 1 hari - Rp 9,000', '9000', 'Jetis, Kota Yogyakarta, DI Yogyakarta (Kode Pos: 25555)', '', '', '', 0, '2019-06-03 09:01:31'),
(6, '51559527360', 5, '', '21000.0', 'Nama', '085222333666', 'Alamat', 'JET Express XPS 0 - 1 hari - Rp 9,000', '9000', 'Jetis, Kota Yogyakarta, DI Yogyakarta (Kode Pos: 25555)', '', '', 'https://scanqr.xyz/apiku/upload/1559527387.jpg', 0, '2019-06-03 09:02:40'),
(7, '51559531270', 5, '', '20000.0', 'Nama', '085222333666', 'Alamat', 'TIKI REG 2 hari - Rp 5,000', '5000', 'Jetis, Kota Yogyakarta, DI Yogyakarta (Kode Pos: 25555)', '', '1234', '', 3, '2019-06-03 10:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id` int(11) NOT NULL,
  `invoice` varchar(12) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `invoice`, `produk_id`, `nama_produk`, `harga`, `qty`) VALUES
(1, '51559375340', 3, 'Kolak ubi', '3000.0', 1),
(2, '51559376064', 3, 'Kolak ubi', '3000.0', 12),
(3, '51559450472', 3, 'Kolak ubi', '3000.0', 1),
(4, '51559524943', 3, 'Kolak pisang', '2500.0', 1),
(5, '51559527291', 3, 'Kolak buah', '3500.0', 1),
(6, '51559527360', 3, 'Kolak ubi', '3000.0', 4),
(7, '51559531270', 3, 'Kolak ubi', '3000.0', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `gambar` text CHARACTER SET utf8 NOT NULL,
  `kategori` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` text CHARACTER SET utf8 NOT NULL,
  `harga` varchar(20) NOT NULL,
  `harga_lama` varchar(20) NOT NULL,
  `harga_grosir` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `tokped` varchar(200) NOT NULL,
  `bukalapak` varchar(200) NOT NULL,
  `shopee` varchar(200) NOT NULL,
  `kreator` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `gambar`, `kategori`, `berat`, `deskripsi`, `harga`, `harga_lama`, `harga_grosir`, `stok`, `tokped`, `bukalapak`, `shopee`, `kreator`, `waktu`) VALUES
(3, 'Kolak', './images/1559374625.jpg', 4, 225, 'Kolak pisang', '2500', '3000', '5000', 200, 'ea', 'ea', 'ea', 1, '2019-06-13 13:00:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `distrik` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `info_pembayaran` text CHARACTER SET utf8 NOT NULL,
  `info_about` text CHARACTER SET utf8 NOT NULL,
  `sms` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `line` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `provinsi`, `distrik`, `kota`, `info_pembayaran`, `info_about`, `sms`, `whatsapp`, `line`) VALUES
(1, 5, 6994, 501, 'Pembayaran bisa dilakukan melalui:\r\nBRI - an Budi\r\n1234567890\r\n\r\nBNI - an Budi\r\n1234567890\r\n\r\nBCA - an Budi\r\n23456789009876', 'About ini ada disetting tes', '085777222888', '6285728111222', 'linetoday');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `member_id` int(11) NOT NULL,
  `testimoni` text CHARACTER SET utf8 NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `invoice`, `member_id`, `testimoni`, `waktu`) VALUES
(1, '31558957483', 3, 'Test', '2019-05-28 09:18:18'),
(2, '51559376064', 5, 'Bagus', '2019-06-01 15:25:59'),
(3, '51559524943', 5, 'Bagus', '2019-06-03 08:29:47'),
(4, '51559531270', 5, 'Terima', '2019-06-03 10:14:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `varian`
--

CREATE TABLE `varian` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `varian`
--

INSERT INTO `varian` (`id`, `produk_id`, `nama`, `stok`, `berat`, `harga`) VALUES
(9, 3, 'Kolak ubi', 25, 250, '3000'),
(5, 1, 'Nama', 2500, 250, '2500'),
(8, 3, 'Kolak pisang', 25, 250, '2500'),
(10, 3, 'Kolak buah', 25, 255, '3500'),
(13, 3, 'tester1', 1, 1, '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `jenis` int(11) NOT NULL,
  `besar` varchar(12) NOT NULL,
  `min_beli` varchar(12) NOT NULL,
  `max_diskon` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id`, `kode`, `jenis`, `besar`, `min_beli`, `max_diskon`) VALUES
(1, 'LEBARAN', 1, '10', '100000', '25000'),
(2, 'SUCI', 2, '15000', '100000', '0'),
(3, 'ONGKIR', 3, '0', '100000', '25000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `varian`
--
ALTER TABLE `varian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
