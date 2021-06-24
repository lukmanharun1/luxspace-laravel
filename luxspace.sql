-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jun 2021 pada 20.39
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxspace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(31, '2014_10_12_100000_create_password_resets_table', 2),
(40, '2019_08_19_000000_create_failed_jobs_table', 3),
(43, '2021_03_03_105535_create_room_table', 4),
(44, '2021_03_22_072031_create_shipping_details_table', 4),
(45, '2021_04_14_075028_add_token_field_on_shipping_details', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('all_room','living_room','children_room','decoration_room','bed_room') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `about_product` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`id`, `name_product`, `category`, `price`, `about_product`, `image1`, `image2`, `image3`, `image4`, `image5`, `created_at`, `updated_at`) VALUES
(1, 'kursi berlengan', 'all_room', 1595000, 'Berbagai pilihan bantal dudukan memudahkan mengubah tampilan POÄNG dan ruang keluarga Anda.\r\nRangka dari lapisan kayu bic yang direkatkan sehingga membal lebih nyaman.\r\nSandaran yang tinggi memberi penyangga yang baik bagi leher anda.\r\nAgar duduk lebih nyaman dan santai, anda dapat menggunakan kursi lengan bersama dengan bangku kaki POÄNG.\r\nGaransi 10 tahun. Baca lebih lanjut mengenai syarat dan ketentuan di dalam brosur garansi.', 'kursi-berlengan.jpg-6059f4d4a2d26.jpg', 'kursi-berlengan2.jpg-6059f4d4a36d4.jpg', 'kursi-berlengan3.jpg-6059f4d4a55c3.jpg', 'kursi-berlengan4.jpg-6059f4d49fdc8.jpg', 'kursi-berlengan5.jpg-6059f4d4a1fc1.jpg', '2021-03-23 07:01:56', '2021-03-23 07:21:07'),
(2, 'karpet anyaman', 'living_room', 4200000, 'Pemukaan yang tahan lama dan tahan kotor membuat karpet ini cocok di ruang tamu atau di bawah meja makan.\r\nSetiap unit memiliki keunikan tersendiri karena dianyam tangan oleh para pengrajin terampil. Dibuat di pusat tenun terorganisir di India dengan lingkungan kerja yang baik dan upah yang adil.\r\nKarpet memiliki motif yang sama di kedua sisi, sehingga anda dapat memutarnya dan karpet bisa bertahan lebih lama.\r\nCocok untuk ruang tamu atau dibawah meja makan anda karena permukaan yang ditenun dengan rata memudahkan menarik kursi dan menyedot.', 'karpet-anyaman1.jpg-6059f74ddd9e6.jpg', 'karpet-anyaman2.jpg-6059f74de1999.jpg', 'karpet-anyaman3.jpg-6059f74de3701.jpg', 'karpet-anyaman4.jpg-6059f74dda9cc.jpg', NULL, '2021-03-23 07:12:29', '2021-03-23 07:12:29'),
(3, 'bangku kaki', 'living_room', 695000, 'Bingkai dibuat dari lapisan kayu ek yang ditekuk, bahan yang sangat kuat dan tahan lama.\r\nBerbagai pilihan bantal dudukan memudahkan mengubah tampilan POÄNG dan ruang keluarga Anda.', 'alas-kursi1.jpg-6059f8eac6bd6.jpg', 'alas-kursi2.jpg-6059f8eac8d17.jpg', 'bangku-kaki3.jpg-6059f8eacbac6.jpg', NULL, NULL, '2021-03-23 07:19:22', '2021-03-23 07:19:22'),
(4, 'karpet bulu tipis', 'living_room', 9500000, 'Karpet akan bertahan lama karena tahan noda dan mudah dirawat.\r\nPolanya terlihat pudar dan usang, membuat tampilan karpet ini antik, mirip dengan karpet Timur Tengah.\r\nEkspresi dan warna oriental-vintage sesuai dengan perabot modern dan tradisional.\r\nKursi mudah dipindahkan dan tidak akan meninggalkan bekas berkat tumpukan yang sangat rendah sehingga menjadikannya pilihan yang cocok untuk ruang makan atau ruang keluarga Anda.\r\nPendamping yang sempurna untuk semua jenis lantai, bahkan lantai dengan pemanas di bawah lantai.\r\nTahan lama dan tidak akan hilang karena karpet terbuat dari polypropylene.', 'karpet-bulu-tipis1.jpg-6059f93ded55f.jpg', 'karpet-bulu-tipis2.jpg-6059f93def5c4.jpg', 'karpet-bulu-tipis3.jpg-6059f93df186d.jpg', 'karpet-bulu-tipis4.jpg-6059f93de7aa4.jpg', 'karpet-bulu-tipis5.jpg-6059f93deab25.jpg', '2021-03-23 07:20:45', '2021-03-23 07:20:45'),
(5, 'kursi bergoyang', 'living_room', 3000000, 'Garansi 10 tahun. Baca lebih lanjut mengenai syarat dan ketentuan di dalam brosur garansi.\r\nBingkai terbuat dari lapisan kayu bic yang merupakan bahan tahan lama dan kuat.\r\nKulit lembut, tahan pakai dan mudah dirawat yang praktis untuk keluarga dengan anak.\r\nBerbagai pilihan bantal dudukan memudahkan mengubah tampilan POÄNG dan ruang keluarga Anda.\r\nSandaran yang tinggi memberi penyangga yang baik bagi leher anda.', 'kursi-goyang1.jpg-6059fb26e0097.jpg', 'kursi-goyang2.jpg-6059fb26e1385.jpg', 'kursi-goyang3.jpg-6059fb26e3651.jpg', NULL, NULL, '2021-03-23 07:28:54', '2021-03-23 07:28:54'),
(6, 'bantal kursi', 'all_room', 380000, 'Dengan beberapa bantal dekoratif di tempat tidur atau sudut baca, kamar anak-anak terasa ekstra nyaman dan mengundang.\r\nBantal berbentuk silinder memberikan dukungan lembut dan bagus untuk tubuh kecil, kepala atau kaki saat menonton TV, membaca atau beristirahat sejenak.\r\nIsian dari polyester menjaga bentuk dan memberi penyangga yang empuk bagi tubuh anak.\r\nTelah diuji dan tidak mengandung zat, phthalate atau bahan kimia yang dapat membahayakan kulit atau kesehatan anak Anda.\r\nRitsleting pada produk anak-anak kami tidak memiliki pegangan penarik. Membuat ini lebih aman untuk anak kecil, tapi sama mudahnya bagi anak-anak yang lebih besar.\r\nMudah dibersihkan; dapat dicuci dengan mesin cuci, hangat (40°C).\r\nSarung bantal yang bisa dicuci mudah dilepaskan karena memiliki ritsleting.', 'bantal-kursi1.jpg-6059fbb133ad8.jpg', 'bantal-kursi2.jpg-6059fbb13573c.jpg', 'bantal-kursi3.jpg-6059fbb137f7d.jpg', 'bantal-kursi4.jpg-6059fbb12eda5.jpg', 'bantal-kursi5.jpg-6059fbb13118c.jpg', '2021-03-23 07:31:13', '2021-03-24 00:13:08'),
(7, 'tenda anak', 'children_room', 390000, 'Beli tenda anak yang dapat ditempatkan di kamar anak yang kecil ukurannya. Lengkapi alat bermainnya agar anak semakin aktif. 0% cicilan. 30 hari pengembalian.\r\n\r\nMembuat tempat berlindung, ruang di dalam ruangan, untuk bermain atau hanya untuk berbaring', 'tenda-anak1.jpg-6059fbf04b101.jpg', 'tenda-anak2.jpg-6059fbf04cad4.jpg', 'tenda-anak3.jpg-6059fbf04e365.jpg', 'tenda-anak4.jpg-6059fbf0497c6.jpg', NULL, '2021-03-23 07:32:16', '2021-03-23 07:32:16'),
(8, 'tirai gulung', 'all_room', 49900, 'Kabel tersembunyi di dalam tirai, sehingga aman untuk anak-anak di rumah.\r\nTirai menurunkan tingkat cahaya sehingga dari luar tidak dapat melihat langsung ke dalam ruangan.\r\nDapat dipotong dengan mudah sesuai ukuran yang diinginkan.\r\nDapat dipasang di dalam atau di luar bingkai jendela, atau di plafon.', 'tirai-gulung1.jpg-6059fcfa93b82.jpg', 'tirai-gulung2.jpg-6059fcfa9652c.jpg', 'gorden-dan-tirai3.jpg-6059fcfa99d4c.jpg', 'tirai-gulung4.jpg-6059fcfa91b2d.jpg', NULL, '2021-03-23 07:36:42', '2021-03-23 07:36:42'),
(9, 'penyimpanan mainan', 'children_room', 590000, 'Roda plastik yang tahan lama ini meluncur dengan mulus dan lancar di lantai.\r\nPenyimpanan mainan dengan roda memudahkan anak untuk mengumpulkan dan memindahkan mainan dari satu ruangan ke ruangan yang lain.', 'penyimpan-mainan1.jpg-6059fd56aba9b.jpg', 'penyimpan-mainan2.jpg-6059fd56ae306.jpg', 'penyimpan-mainan3.jpg-6059fd56af52e.jpg', NULL, NULL, '2021-03-23 07:38:14', '2021-03-23 07:38:14'),
(10, 'tirai seluler', 'all_room', 490000, 'Dapat membantu Anda mengurangi tagihan listrik, karena udara di dalam struktur sarang lebah menciptakan lapisan insulasi.\r\nKabel tersembunyi di dalam tirai, sehingga aman untuk anak-anak di rumah.\r\nTirai menurunkan tingkat cahaya sehingga dari luar tidak dapat melihat langsung ke dalam ruangan.\r\nDapat dipasang di dinding atau plafon.', 'tirai-seluler1.jpg-6059fe3777170.jpg', 'tirai-seluler2.jpg-6059fe3779136.jpg', 'tirai-seluler3.jpg-6059fe3779c79.jpg', 'tirai-seluler4.jpg-6059fe3775be8.jpg', 'tirai-seluler5.jpg-6059fe377696e.jpg', '2021-03-23 07:41:59', '2021-03-23 07:41:59'),
(11, 'kursi anak', 'children_room', 240000, 'Cocok untuk anak kecil duduk dan bermain, menggambar, mengerjakan kerajinan tangan atau atur meja untuk piknik yang nyaman di kebun.\r\nPerabotnya ringan dan stabil, dan anak Anda dapat membawanya dari kamar ke kamar atau keluar ke kebun.\r\nTerbuat dari plastik aman, bahan yang sama dengan yang digunakan dalam botol bayi, popok sekali pakai dan kotak makanan.\r\nMudah dirakit - Anda hanya meng-klik komponennya bersama.\r\nJuga cocok digunakan di luar ruang karena dibuat agar tahan terhadap hujan, matahari, salju dan kotoran.', 'kursi-anak1.jpg-6059fea3e5365.jpg', 'kursi-anak2.jpg-6059fea3e6b3d.jpg', 'kursi-anak3.jpg-6059fea3ea508.jpg', NULL, NULL, '2021-03-23 07:43:47', '2021-03-23 07:43:47'),
(12, 'meja anak', 'children_room', 450000, 'Mudah dirakit - Anda hanya meng-klik komponennya bersama.\r\nTerbuat dari plastik aman, bahan yang sama dengan yang digunakan dalam botol bayi, popok sekali pakai dan kotak makanan.\r\nCocok untuk anak kecil duduk dan bermain, menggambar, mengerjakan kerajinan tangan atau atur meja untuk piknik yang nyaman di kebun.\r\nPerabotnya ringan dan stabil, dan anak Anda dapat membawanya dari kamar ke kamar atau keluar ke kebun.\r\nJuga cocok digunakan di luar ruang karena dibuat agar tahan terhadap hujan, matahari, salju dan kotoran.', 'meja-anak1.jpg-6059fed22baaf.jpg', 'meja-anak2.jpg-6059fed22ca6b.jpg', 'meja-anak3.jpg-6059fed22f1aa.jpg', NULL, NULL, '2021-03-23 07:44:34', '2021-03-23 07:44:34'),
(13, 'kerai penggelap ruangan', 'all_room', 690000, 'Tirai menggelapkan ruangan dan memberikan privasi dengan mencegah orang-orang di luar melihat ke dalam ruangan.\r\nDapat membantu Anda mengurangi tagihan listrik, karena udara di dalam struktur sarang lebah menciptakan lapisan insulasi.\r\nKabel tersembunyi di dalam tirai, sehingga aman untuk anak-anak di rumah.\r\nDapat dipasang di dinding atau plafon.', 'kerai-penggelap-ruangan1.jpg-6059ff178d59b.jpg', 'kerai-penggelap-ruangan2.jpg-6059ff178f99d.jpg', 'kerai-penggelap-ruangan3.jpg-6059ff1792896.jpg', NULL, NULL, '2021-03-23 07:45:43', '2021-03-23 07:45:43'),
(14, 'meja dan 4 kursi', 'all_room', 12500000, 'Meja makan ini memiliki sentuhan lembut dan lapisan hitam matt yang tidak memantulkan cahaya dengan tampilan abadi dan elegan.\r\nPermukaan atas meja tanpa sambungan bertumpu pada konstruksi kuat yang terbuat dari kayu solid yang memberikan estetika hangat dan sentuhan lembut yang menarik.\r\nUntuk mempertahankan keindahan meja, lap goresan dan kotoran sehabis makan menggunakan spons lembut.\r\nMeja VEDBO telah diuji melalui standar ketat kami untuk kestabilan, daya tahan serta keamanan agar tahan terhadap penggunaan sehari-hari di rumah selama bertahun-tahun.\r\nNyaman untuk diduduki berkat dudukan yang berbentuk mangkuk dan sandaran punggung berbentuk bulat.\r\nIdeal untuk keluarga dengan anak dimana bahan serta permukaan yang halus dan desain yang rapi membuat kursi mudah dibersihkan.\r\nTidak membutuhkan alat untuk memasang kursi, Anda hanya perlu menyambungkannya bersama dengan mekanisme yang mudah di bawah dudukan.', 'meja-dan-4kursi1.jpg-605a00295664e.jpg', 'meja-dan-4kursi2.jpg-605a002957810.jpg', 'meja-dan-4kursi3.jpg-605a002959e86.jpg', 'meja-dan-4kursi4.jpg-605a002954dc4.jpg', NULL, '2021-03-23 07:50:17', '2021-03-23 07:50:17'),
(15, 'lampu gantung', 'decoration_room', 399000, 'Lampu memberi cahaya lembut dan menciptakan suasana hangat dan nyaman dalam ruangan.', 'lampu-gantung1.jpg-605ae1e3a9b93.jpg', 'lampu-gantung2.jpg-605ae1e3aa5ce.jpg', 'lampu-gantung3.jpg-605ae1e3ac8bf.jpg', NULL, NULL, '2021-03-23 23:53:23', '2021-03-23 23:56:48'),
(16, 'stiker dekorasi', 'decoration_room', 199000, 'Dengan dekorasi berperekat, Anda dengan mudah memperbarui ruangan tanpa lukisan atau wallpaper.', 'stiker-dekorasi1.jpg-605ae24506662.jpg', 'stiker-dekorasi2.jpg-605ae245089b1.jpg', 'stiker-dekorasi3.jpg-605ae2450acfe.jpg', 'stiker-dekorasi4.jpg-605ae245050ac.jpg', NULL, '2021-03-23 23:55:01', '2021-03-23 23:55:01'),
(17, 'lampu meja', 'decoration_room', 299000, 'Lampu memberi cahaya lembut dan menciptakan suasana hangat dan nyaman dalam ruangan.', 'lampu-meja1.jpg-605ae2a38c39c.jpg', 'lampu-meja2.jpg-605ae2a38e5f2.jpg', 'lampu-meja3.jpg-605ae2a390f73.jpg', NULL, NULL, '2021-03-23 23:56:35', '2021-03-23 23:56:35'),
(18, 'lampu plafon', 'decoration_room', 399000, 'Lampu memberi cahaya lembut dan menciptakan suasana hangat dan nyaman dalam ruangan.', 'lampu-plafon1.jpg-605ae32af19ef.jpg', 'lampu-plafon2.jpg-605ae32af41a7.jpg', 'lampu-plafon3.jpg-605ae32b020b6.jpg', NULL, NULL, '2021-03-23 23:58:51', '2021-03-23 23:58:51'),
(19, 'lampu lantai', 'decoration_room', 899000, 'ampu memberi cahaya lembut dan menciptakan suasana hangat dan nyaman dalam ruangan.\r\n\r\nKap lampu ini terbuat dari kaca tiup yang dibuat oleh pengrajin yang membuatnya unik.', 'lampu-lantai1.jpg-605ae40d8db1d.jpg', 'lampu-lantai2.jpg-605ae40d8de9e.jpg', 'lampu-lantai3.jpg-605ae40d8fa04.jpg', 'lampu-lantai4.jpg-605ae40d8806e.jpg', 'lampu-lantai5.jpg-605ae40d88c0a.jpg', '2021-03-24 00:02:37', '2021-03-24 00:03:02'),
(20, 'lemari pakaian', 'decoration_room', 38990000, 'Rumah Anda harus menjadi tempat yang aman bagi seluruh keluarga. Itu sebabnya perangkat pengaman disertakan agar Anda dapat memasang unit penyimpanan di dinding.\r\nCocok untuk pakaian lipat dan pakaian gantung yang panjang dan pendek.\r\nPintu geser hemat ruang karena tidak memakan ruang saat pintu dibuka.\r\nAnda mendapatkan tempat praktis untuk menggantung tas, jubah mandi, dan aksesori di sisi lemari dengan menambahkan pengait SKOGSVIKEN untuk pintu.', 'lemari-pakaian1.jpg-605ae49157a13.jpg', 'lemari-pakaian2.jpeg-605ae49158709.jpg', 'lemari-pakaian3.jpeg-605ae4915a9fb.jpg', 'lemari-pakaian4.jpeg-605ae49155b28.jpg', NULL, '2021-03-24 00:04:49', '2021-03-24 00:04:49'),
(21, 'sofa', 'all_room', 2990000, 'Busa kasur yang nyaman dan padat untuk digunakan setiap malam.\r\nSofa mudah diubah menjadi tempat tidur dengan melepas sarung dan menarik dudukan untuk mengeluarkan sandaran punggung.\r\nKasur terbuat dari busa poliuteran dan lapisan atas dari busa berketahanan tinggi yang dapat membentuk tubuh anda.\r\nSarung terbuat dari poliester tahan pakai dengan tekstur yang empuk.\r\nDapat diubah menjadi tempat tidur besar untuk dua orang.\r\nSarung mudah dibersihkan karena dapat dilepas dan dicuci dengan mesin.\r\nSarung kasur mudah dibersihkan karena dapat dilepas dan dicuci dengan mesin.\r\nKasur busa keras dan ringkas untuk digunakan setiap malam.\r\nSarung tambahan sebagai sarung pengganti memberikan tampilan baru untuk sofa dan ruangan Anda.', 'sofa1.jpg-605ae54d0bde7.jpg', 'sofa2.jpg-605ae54d0f1de.jpg', 'sofa3.jpg-605ae54d11aff.jpg', 'sofa4.jpg-605ae54d079ae.jpg', 'sofa5.jpg-605ae54d09ce3.jpg', '2021-03-24 00:07:57', '2021-03-24 00:07:57'),
(22, 'sofa tempat tidur', 'bed_room', 1699000, 'Beli sofa bed HAMMARN dengan harga dan desain terbaik. Dapat diubah menjadi tempat tidur yang luas untuk dua orang. Bahan elastis, dimana alas kasur terletak, membuat sofa tempat tidur nyaman untuk duduk maupun tidur. Ringan; mudah diangkat dan dialihkan. Sarung mudah dibersihkan karena dapat dilepas dan dicuci.', 'sofa-tempat-tidur1.jpg-605ae594bd9f9.jpg', 'sofa-tempat-tidur2.jpg-605ae594bf2bf.jpg', 'sofa-tempat-tidur3.jpg-605ae594c1be6.jpg', 'sofa-tempat-tidur4.jpg-605ae594b882a.jpg', 'sofa-tempat-tidur5.jpg-605ae594bbbd6.jpg', '2021-03-24 00:09:08', '2021-03-24 00:09:08'),
(23, 'meja samping tempat tidur', 'bed_room', 1290000, 'Seri NORDKISA yang terbuat dari bambu menyatu dengan indah dengan seri penyimpanan NORDLI dan ELVARLI kami.\r\nLaci dapat diakses dari kedua sisi.\r\nAnda dapat menciptakan pembagi ruang atau kombinasi penyimpanan dengan menempatkan beberapa meja samping tempat tidur di sebelah satu sama lain.\r\nKabel mudah diatur dengan menyalurkannya melalui pegangan di kedua sisi laci.', 'meja-samping-tempat-tidur1.jpg-605ae64701678.jpg', 'meja-samping-tempat-tidur2.jpg-605ae647034fc.jpg', 'meja-samping-tempat-tidur3.jpg-605ae64705a96.jpg', 'meja-samping-tempat-tidur4.jpg-605ae646f2403.jpg', 'meja-samping-tempat-tidur5.jpg-605ae64700122.jpg', '2021-03-24 00:12:07', '2021-03-24 00:12:38'),
(24, 'rangka tempat tidur', 'bed_room', 8890000, 'Seprai PLATSA menutupi kebutuhan tidur dan penyimpanan Anda membantu Anda membuat oasis Anda sendiri di tempat-tempat terkecil sekalipun. Bersama dengan sistem PLATSA Anda dapat memiliki ruang privasi dan rumah untuk semua barang Anda.', 'rangka-tempat-tidur1.jpg-605ae78493316.jpg', 'rangka-tempat-tidur2.jpg-605ae78497d0b.jpg', 'rangka-tempat-tidur3.jpg-605ae7849c298.jpg', NULL, NULL, '2021-03-24 00:17:24', '2021-03-24 00:17:24'),
(25, 'meja rias', 'all_room', 2299000, 'Mengapa tidak membuat ruang di kamar tidur atau ruang ganti di mana semua yang Anda butuhkan untuk bersiap-siap untuk hari itu dalam jangkauan? Anda dapat menyembunyikan make-up dan aksesori di dalam laci.\r\nSeri NORDKISA yang terbuat dari bambu menyatu dengan indah dengan seri penyimpanan NORDLI dan ELVARLI kami.\r\nLaci dapat diakses dari kedua sisi.', 'meja-rias1.jpg-605ae8516c7aa.jpg', 'meja-rias2.jpg-605ae8516de6d.jpg', 'meja-rias3.jpg-605ae851701bb.jpg', 'meja-rias4.jpg-605ae8516745c.jpg', 'meja-rias5.jpg-605ae8516a118.jpg', '2021-03-24 00:20:49', '2021-03-24 00:20:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` enum('success','pending','failed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `name`, `email_address`, `address`, `phone_number`, `courier`, `payment`, `total_price`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'mastercard', 1595000, 'success', '', '2021-03-24 05:02:33', '2021-03-24 05:02:33'),
(2, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'mastercard', 1595000, 'success', '', '2021-03-24 05:04:02', '2021-03-24 05:04:02'),
(3, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'mastercard', 1595000, 'success', '', '2021-03-24 05:05:09', '2021-03-24 05:05:09'),
(4, 'lharun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-28 14:46:01', '2021-03-28 14:46:01'),
(5, 'lharun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-28 15:08:36', '2021-03-28 15:08:36'),
(6, 'lharun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-28 15:11:44', '2021-03-28 15:11:44'),
(7, 'lharun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-28 15:19:24', '2021-03-28 15:19:24'),
(8, 'lharun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '62895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-28 16:16:05', '2021-03-28 16:16:05'),
(9, 'nanda123', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'dhl', 'midtrans', 17775000, 'pending', '', '2021-03-28 16:16:36', '2021-03-28 16:16:36'),
(10, 'nanda123', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'dhl', 'midtrans', 17775000, 'pending', '', '2021-03-28 16:18:55', '2021-03-28 16:18:55'),
(11, 'nanda123', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'dhl', 'midtrans', 17775000, 'pending', '', '2021-03-28 16:19:46', '2021-03-28 16:19:46'),
(12, 'nanda123', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'dhl', 'midtrans', 17775000, 'pending', '', '2021-03-28 16:24:19', '2021-03-28 16:24:19'),
(13, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-28 23:56:49', '2021-03-28 23:56:49'),
(14, 'lukman harun', 'masenih03@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-29 00:00:07', '2021-03-29 00:00:07'),
(15, 'lukman harun', 'masenih03@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-29 00:03:05', '2021-03-29 00:03:05'),
(16, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 17775000, 'pending', '', '2021-03-29 00:07:37', '2021-03-29 00:07:37'),
(17, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'dhl', 'american_express', 17775000, 'pending', '', '2021-03-29 00:32:28', '2021-03-29 00:32:28'),
(18, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'dhl', 'american_express', 17775000, 'pending', '', '2021-03-29 00:35:58', '2021-03-29 00:35:58'),
(19, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'dhl', 'american_express', 17775000, 'pending', '', '2021-03-29 00:57:33', '2021-03-29 00:57:33'),
(20, 'lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 18155000, 'pending', '', '2021-03-30 00:11:37', '2021-03-30 00:11:37'),
(21, 'lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 18155000, 'pending', '', '2021-03-30 00:13:16', '2021-03-30 00:13:16'),
(22, 'lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 18155000, 'pending', '', '2021-03-30 00:59:13', '2021-03-30 00:59:13'),
(23, 'lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 18155000, 'pending', '', '2021-03-30 01:20:32', '2021-03-30 01:20:32'),
(24, 'lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 18155000, 'pending', '', '2021-03-30 03:31:15', '2021-03-30 03:31:15'),
(25, 'lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 18155000, 'pending', '', '2021-03-30 03:41:47', '2021-03-30 03:41:47'),
(26, 'lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 18155000, 'pending', '', '2021-03-30 03:46:34', '2021-03-30 03:46:34'),
(27, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:18:12', '2021-03-30 05:18:12'),
(28, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:18:44', '2021-03-30 05:18:44'),
(29, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:19:01', '2021-03-30 05:19:01'),
(30, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:19:28', '2021-03-30 05:19:28'),
(31, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:20:28', '2021-03-30 05:20:28'),
(32, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:21:03', '2021-03-30 05:21:03'),
(33, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:21:18', '2021-03-30 05:21:18'),
(34, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:21:38', '2021-03-30 05:21:38'),
(35, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:37:50', '2021-03-30 05:37:50'),
(36, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:41:27', '2021-03-30 05:41:27'),
(37, 'admin kocheng', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'midtrans', 2384800, 'pending', '', '2021-03-30 05:43:07', '2021-03-30 05:43:07'),
(38, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '62895391895395', 'fedex', 'midtrans', 240000, 'pending', '', '2021-03-31 03:06:10', '2021-03-31 03:06:10'),
(39, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '0895391895395', 'fedex', 'midtrans', 240000, 'pending', '', '2021-03-31 03:07:26', '2021-03-31 03:07:26'),
(40, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '0895391895395', 'fedex', 'midtrans', 240000, 'pending', '', '2021-03-31 03:10:28', '2021-03-31 03:10:28'),
(41, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '0895391895395', 'fedex', 'midtrans', 240000, 'pending', '', '2021-03-31 03:15:42', '2021-03-31 03:15:42'),
(42, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '0895391895395', 'fedex', 'midtrans', 240000, 'pending', '', '2021-03-31 03:16:44', '2021-03-31 03:16:44'),
(43, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '0895391895395', 'fedex', 'midtrans', 240000, 'pending', '', '2021-03-31 03:18:58', '2021-03-31 03:18:58'),
(44, 'dsdassdsa', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16', '895391895395', 'fedex', 'bitcoin', 12740000, 'pending', '', '2021-03-31 03:51:06', '2021-03-31 03:51:06'),
(45, 'ilham nur ramdani', 'ilham@gmail.com', 'jl.sawo asdasdsadasdffsdfsdfdsfdsfdsfdsfdsfsdfsdfsdfsdfdfs', '0821321321213', 'dhl', 'mastercard', 25240000, 'pending', '', '2021-04-01 04:33:44', '2021-04-01 04:33:44'),
(46, 'ilham nur ramdani', 'nandes88.ni@gmail.com', 'jl.sawo asdasdsadasdffsdfsdfdsfdsfdsfdsfdsfsdfsdfsdfsdfdfs', '0821321321213', 'dhl', 'mastercard', 25240000, 'pending', '', '2021-04-01 04:34:31', '2021-04-01 04:34:31'),
(47, 'ilham nur ramdani', 'nandes88.ni@gmail.com', 'jl.sawo asdasdsadasdffsdfsdfdsfdsfdsfdsfdsfsdfsdfsdfsdfdfs', '821321321213', 'dhl', 'mastercard', 25240000, 'pending', '', '2021-04-01 04:34:52', '2021-04-01 04:34:52'),
(48, 'lukman harun', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '895391895395', 'fedex', 'midtrans', 1595000, 'pending', '', '2021-04-14 00:32:12', '2021-04-14 00:32:12'),
(49, 'harun lukman', 'nandes88.ni@gmail.com', 'jalan hostcokroaminoto no.16 larangan utar RT 02 RW 04 Tangerang Kota', '62895391895395', 'dhl', 'mastercard', 1975000, 'pending', 'fa6ef6f804f26e69734e233f1f8fc0f62b880c3c049dc9e962d9a0ae894be1ac', '2021-04-14 01:05:04', '2021-04-14 01:05:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lukman harun', 'nandes88.ni@gmail.com', NULL, '$2y$10$UvYqhSadCVMcV.iX2Uvqy.PRBpEEnl5u1jPTz4vN5GPhZsg7ng272', 'WI8X7WmrGEZ2JUaQExAXTgdxTrrXLwhZKhreopcEqk4wkK6MH1M8wSFMWQJy', '2021-03-23 06:00:55', '2021-03-23 06:00:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
