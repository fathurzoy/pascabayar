-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 04:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pascabayar`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `daya_sembilan_ratus` (`cariDaya` VARCHAR(15))  SELECT DISTINCT nama_pelanggan, daya FROM info_penggunaan WHERE daya = cariDaya;$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `totalPenggunaan` (`idPenggunaan` CHAR(12)) RETURNS INT(11) BEGIN
DECLARE totalDigunakan INT(11);
SET totalDigunakan = (SELECT meter_akhir-meter_awal FROM penggunaan WHERE id_penggunaan = idPenggunaan);
RETURN totalDigunakan;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_penggunaan`
-- (See below for the actual view)
--
CREATE TABLE `info_penggunaan` (
`nama_pelanggan` varchar(30)
,`daya` varchar(15)
,`bulan` char(2)
,`tahun` year(4)
,`meter_awal` int(11) unsigned
,`meter_akhir` int(11) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_tagihan`
-- (See below for the actual view)
--
CREATE TABLE `info_tagihan` (
`id_tagihan` int(11) unsigned
,`id_pelanggan` char(12)
,`nama_pelanggan` varchar(30)
,`daya` varchar(15)
,`tarifperkwh` int(5) unsigned
,`bulan` char(2)
,`tahun` year(4)
,`jumlah_meter` int(11) unsigned
,`status` enum('sudah bayar','belum bayar')
);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(3) UNSIGNED NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'super admin'),
(2, 'admin'),
(3, 'manager'),
(4, 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_kwh` char(12) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `id_tarif` int(3) UNSIGNED NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nohandphone` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`, `token`, `email`, `nohandphone`) VALUES
('182965738820', 'DimasAR', 'abb8a97c7802fc54a68857c09c7bb434', '539610074973', 'Dimas Ari', 'Jl Kh Hasyim Hasari Cipondoh Tangerang', 3, '378b22dfea2547b2f5f6d30de0ad3437', 'dimas45@gmail.com', '0812768299201'),
('182965738821', 'OctaR', 'f24379abf1036e38ce8aa076fa593b71', '539610174971', 'Octa Riangga', 'Cipondoh', 2, '710a66cc1441843562f680914633b737', NULL, NULL),
('182965738822', 'Praztt', '8b1bc81997b5b0f12948cc7b7bbc76d1', '539610274972', 'Prazt', 'Batu Ceper', 1, NULL, NULL, NULL),
('182965738823', 'Sari', 'a87bcf310c4fdf2a80f2f3d97f1f9424', '539610474974', 'Sari', 'Karawaci', 3, NULL, NULL, NULL),
('182965748824', 'EthanP', 'bc9c85301e68cdabb7422fb4e037d721', '539610574975', 'Ethan Pio', 'Babakan', 5, NULL, NULL, NULL),
('182965758825', 'BeckR', '93d422f6dc5f1fc627b27a7dee8a42b9', '539610674976', 'Beckr Red', 'Serpong', 6, NULL, NULL, NULL),
('182965768826', 'PorterC', '1d6542418bb1932f01c66b3b98933b1e', '539610774977', 'Porter Cr', 'Cikokol', 4, NULL, NULL, NULL),
('182965778827', 'AlvaradoK', '86075ecbf8b56c1deabf2a663581a662', '539610874978', 'Alvarado Kun', 'Tanah Tinggi', 8, NULL, NULL, NULL),
('182965788828', 'ZahirM', '356eb8038137dfde366df80b3b4f4a28', '539610974979', 'Zahir Mulya', 'Serpong', 7, NULL, NULL, NULL),
('182965798829', 'SyahrilK', 'b77fd6600f574ac43ab7a692e9b622e2', '539611074980', 'Syahril Kim', 'Cikokol', 4, NULL, NULL, NULL),
('182965808830', 'IshakM', '52c64655dc16559287669188631589ff', '539611174981', 'Ishak Mo', 'Babakan', 5, NULL, NULL, NULL),
('182965818831', 'ZulfahS', 'c76e00a5dfda1b405df63305d1e8f070', '539611274982', 'Zulfah Zulfah', 'Tangerang', 3, NULL, NULL, NULL),
('182965828832', 'RiaS', 'c383569f5f7f92e8cc3d41648299dbd5', '539611374983', 'Ria Susanti', 'Cikokol', 3, NULL, NULL, NULL),
('182965838833', 'SriS', '671b479071551be9e6d3105e9cfaee1c', '539611474984', 'Sri Sri', 'Tanah Tinggi', 2, NULL, NULL, NULL),
('182965848834', 'SitiA', '60887ff82814c498adf3cd75a7e6322b', '539611574985', 'Siti Aminah', 'Karawaci', 1, NULL, NULL, NULL),
('182965858835', 'AbiF', '25c749e04d0315fcd8961fdafae0a0b2', '539611674986', 'Abi Firman', 'Serpong', 2, NULL, NULL, NULL),
('182965868836', 'HeriK', '8dcdc82de963a09fe73cabd1f963535f', '539617674987', 'Heri Kom', 'Pinang', 4, NULL, NULL, NULL),
('182965878837', 'RizkyS', 'a66fcd6b4000e34d105af9ea606939e2', '539618674988', 'Rizky Sueb', 'Cipondoh', 3, NULL, NULL, NULL),
('182965888838', 'DiahD', 'a2e7207941e5d99a67799ab738800b91', '539619674989', 'Diah Diah', 'Karawaci', 6, NULL, NULL, NULL),
('182965898839', 'AraiA', 'f04affb55b08c3c703552d6a278fcc96', '539620674990', 'Arai Arai', 'Batu Ceper', 6, NULL, NULL, NULL),
('182965908840', 'VijayA', 'db8834197077287186e8c7524ca43d6f', '539621674991', 'Vijay Arai', 'Pinang', 2, NULL, NULL, NULL),
('182965918841', 'KhansaS', '47b04c24b437f231db5fd89b93e6d16e', '539622674992', 'Khansa Siti', 'Cipondoh', 3, NULL, NULL, NULL),
('182965928842', 'ElifF', '749aa4f1fa54ef97fde895059350df90', '539623674993', 'Elif F', 'Tangerang', 8, NULL, NULL, NULL),
('182965938843', 'BetrandE', '4a2b783d54b5141350a7a558207e391d', '539624674994', 'Betrand Elik', 'Serpong', 1, NULL, NULL, NULL),
('182965948844', 'BambangW', 'e5b0dcf27e9f786fb6e99e6ba3235632', '539625674995', 'Bambang Wulyo', 'Karawaci', 8, NULL, NULL, NULL),
('182965958845', 'AyuA', 'faa263f1d356257af2664dfeec1841c4', '539626674996', 'Ayo Azhari', 'Babakan', 7, NULL, NULL, NULL),
('182965968846', 'BowoB', '796befa68e74486dc3d9bbe1931876ea', '539627674997', 'Bowo Bima', 'Pinang', 2, NULL, NULL, NULL),
('182965978847', 'Bimo', 'c72444a1b9678e55273d5d5f315a6c0e', '539628674998', 'Bimo', 'Tanah Tinggi', 1, NULL, NULL, NULL),
('182965988848', 'FiraF', '7d9681930f879f86db61e3957eea52d7', '539629674999', 'Fira Fey', 'Babakan', 3, NULL, NULL, NULL),
('182965998849', 'AgungA', '18b37a5ae15f5b9bd93aa4f621698a33', '539630674100', 'Agung Alay', 'Cipondoh', 2, NULL, NULL, NULL),
('182967008850', 'BustariB', 'd1564318cfcc4660b62ba1bb5205ca73', '539631674101', 'Bustari Bim', 'Cikokol', 4, NULL, NULL, NULL),
('182967018851', 'BeyB', 'ac6467bf4f2b250bcbd3cd3bc0ccde19', '539632674102', 'Bey Bey', 'Tanah Tinggi', 11, NULL, NULL, NULL),
('182967028852', 'GioG', '97851581303a5579ff1887511abd468d', '539633674103', 'Gio Gio', 'Batu Ceper', 11, NULL, NULL, NULL),
('182967038853', 'CouC', '2b3e962a0ca3b6846d3c4e2dca5e4586', '539634674104', 'Cou Cou', 'Tanah Tinggi', 1, NULL, NULL, NULL),
('182967058855', 'MolfiM', 'f4239c4562e5bf1e3b85cdd7b062ede4', '539635674105', 'Molfi Molfi', 'Batu Ceper', 10, NULL, NULL, NULL),
('182967068856', 'DoddiD', '0772519d7978a4dec1f5c6e4120dfb3f', '539636674106', 'Doddi Doddi', 'Tangerang', 11, NULL, NULL, NULL),
('182967078857', 'DioF', '1e18d21840005203079a4b92d923e6b5', '539637674107', 'Dio Dio', 'Cipondoh', 1, NULL, NULL, NULL),
('182967088858', 'TottiT', '9a3e98e0233f120a417009af6e488e7d', '539638674108', 'Totti Totti', 'Pinang', 10, NULL, NULL, NULL),
('182967098859', 'MessiM', '398bf46088c1ea9f9b5531a3861f0690', '539639674109', 'Messi Messi', 'Tangerang', 11, NULL, NULL, NULL),
('182967108860', 'NeymarN', 'b65f0265fee9c96e3630fbd082e09a23', '539640674110', 'Neymar Neymar', 'Cipondoh', 2, NULL, NULL, NULL),
('182967118861', 'UkiK', '3ced969bd1d2e9c1e0061714cbf1bae9', '539641674111', 'Uki Uki', 'Serpong', 11, NULL, NULL, NULL),
('182967128862', 'WantoM', '352bddf6b6bb1601d0f818f98e236718', '539642674112', 'Wanto Wanto', 'Cikokol', 1, NULL, NULL, NULL),
('182967138863', 'WantiS', '504123c7899911d299324e56700bde06', '539643674113', 'Wanti Wanti', 'Babakan', 11, NULL, NULL, NULL),
('182967148864', 'EntisS', 'cc7679afe925a5f114e7c296f7be3bb8', '539644674114', 'Entis Entis', 'Cikokol', 10, NULL, NULL, NULL),
('182967158865', 'EmaS', 'bc86242cb6b17de03ffc2fcfa02519fe', '539645674115', 'Ema Ema', 'Cipondoh', 2, NULL, NULL, NULL),
('182967168866', 'ImahH', 'fb902de594783490f8923794726c0fcd', '539646674116', 'Imah Imah', 'Tangerang', 3, NULL, NULL, NULL),
('182967178867', 'DewoD', 'c7542e64e127d32219078719ed85d679', '539647674117', 'Dewo Dewo', 'Batu Ceper', 1, NULL, NULL, NULL),
('182967188868', 'IwanF', '8607fa13f1f49130ccf11b3fd9f312a9', '539648674118', 'Iwan Iwan', 'Cipondoh', 10, NULL, NULL, NULL),
('182967198869', 'SantosoS', '84ac6ea076f2312b74fc24acc0f025d9', '539649674119', 'Santoso Santoso', 'Tangerang', 11, NULL, NULL, NULL),
('182967208870', 'SainoM', '2c187c0ec92922ad981de042a1e8c9a7', '539650674120', 'Saino Saino', 'Cikokol', 8, NULL, NULL, NULL),
('182967218871', 'WiwiA', 'fe944c13263575d76f076604e019a0c2', '539651674121', 'Wiwi Wiwi', 'Babakan', 7, NULL, NULL, NULL),
('182967228872', 'MiaK', '21eec910ea696f532072aff04bcd1d85', '539652674122', 'Mia Mia', 'Tanah Tinggi', 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_pelanggan` char(12) NOT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bulan_bayar` char(2) NOT NULL,
  `biaya_admin` int(4) NOT NULL,
  `total_bayar` int(11) UNSIGNED NOT NULL,
  `id_user` int(3) UNSIGNED NOT NULL,
  `id_tagihan` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` int(11) UNSIGNED NOT NULL,
  `id_pelanggan` char(12) NOT NULL,
  `bulan` char(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `meter_awal` int(11) UNSIGNED NOT NULL,
  `meter_akhir` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
(1, '182965738820', '10', 2021, 1984, 2016),
(2, '182965738821', '10', 2021, 1982, 2017),
(3, '182965738822', '10', 2021, 1982, 2018),
(4, '182965738823', '10', 2021, 1982, 2019),
(5, '182965748824', '10', 2021, 1982, 2020),
(6, '182965758825', '10', 2021, 1982, 2021),
(7, '182965768826', '10', 2021, 1982, 2022),
(8, '182965778827', '10', 2021, 1982, 2023),
(9, '182965788828', '10', 2021, 1982, 2024),
(10, '182965798829', '10', 2021, 1982, 2025),
(11, '182965808830', '10', 2021, 1982, 2026),
(12, '182965818831', '10', 2021, 1982, 2027),
(13, '182965828832', '10', 2021, 1982, 2028),
(14, '182965838833', '10', 2021, 1982, 2029),
(15, '182965848834', '10', 2021, 1982, 2030),
(16, '182965858835', '10', 2021, 1982, 2031),
(17, '182965868836', '10', 2021, 1982, 2032),
(18, '182965878837', '10', 2021, 1982, 2033),
(19, '182965888838', '10', 2021, 1982, 2034),
(20, '182965898839', '10', 2021, 1982, 2035),
(21, '182965908840', '10', 2021, 1982, 2036),
(22, '182965918841', '10', 2021, 1982, 2037),
(23, '182965928842', '10', 2021, 1982, 2038),
(24, '182965938843', '10', 2021, 1982, 2039),
(25, '182965948844', '10', 2021, 1982, 2040),
(26, '182965958845', '10', 2021, 1982, 2041),
(27, '182965968846', '10', 2021, 1982, 2042),
(28, '182965978847', '10', 2021, 1982, 2043),
(29, '182965988848', '10', 2021, 1982, 2044),
(30, '182965998849', '10', 2021, 1982, 2045),
(31, '182967008850', '10', 2021, 1982, 2046),
(32, '182967018851', '10', 2021, 1982, 2047),
(33, '182967028852', '10', 2021, 1982, 2048),
(34, '182967038853', '10', 2021, 1982, 2049),
(35, '182967058855', '10', 2021, 1982, 2050),
(36, '182967068856', '10', 2021, 1982, 2051),
(37, '182967078857', '10', 2021, 1982, 2052),
(38, '182967088858', '10', 2021, 1982, 2053),
(39, '182967098859', '10', 2021, 1982, 2054),
(40, '182967108860', '10', 2021, 1982, 2055),
(41, '182967118861', '10', 2021, 1982, 2056),
(42, '182967128862', '10', 2021, 1982, 2057),
(43, '182967138863', '10', 2021, 1982, 2058),
(44, '182967148864', '10', 2021, 1982, 2059),
(45, '182967158865', '10', 2021, 1982, 2060),
(46, '182967168866', '10', 2021, 1982, 2061),
(47, '182967178867', '10', 2021, 1982, 2062),
(48, '182967188868', '10', 2021, 1982, 2063),
(49, '182967198869', '10', 2021, 1982, 2064),
(50, '182967208870', '10', 2021, 1982, 2065),
(51, '182967218871', '10', 2021, 1982, 2066),
(52, '182967228872', '10', 2021, 1982, 2067),
(53, '182965738820', '11', 2021, 2016, 2048),
(54, '182965738821', '11', 2021, 2017, 2049),
(55, '182965738822', '11', 2021, 2018, 2050),
(56, '182965738823', '11', 2021, 2019, 2051),
(57, '182965748824', '11', 2021, 2020, 2052),
(58, '182965758825', '11', 2021, 2021, 2053),
(59, '182965768826', '11', 2021, 2022, 2043),
(60, '182965778827', '11', 2021, 2023, 2040),
(61, '182965788828', '11', 2021, 2024, 2041),
(62, '182965798829', '11', 2021, 2025, 2042),
(63, '182965808830', '11', 2021, 2026, 2043),
(64, '182965818831', '11', 2021, 2027, 2044),
(65, '182965828832', '11', 2021, 2028, 2052),
(66, '182965838833', '11', 2021, 2029, 2053),
(67, '182965848834', '11', 2021, 2030, 2082),
(68, '182965858835', '11', 2021, 2031, 2083),
(69, '182965868836', '11', 2021, 2032, 2084),
(70, '182965878837', '11', 2021, 2033, 2085),
(71, '182965888838', '11', 2021, 2034, 2077),
(72, '182965898839', '11', 2021, 2035, 2075),
(73, '182965908840', '11', 2021, 2036, 2083),
(74, '182965918841', '11', 2021, 2037, 2084),
(75, '182965928842', '11', 2021, 2038, 2085),
(76, '182965938843', '11', 2021, 2039, 2086),
(77, '182965948844', '11', 2021, 2040, 2087),
(78, '182965958845', '11', 2021, 2041, 2095),
(79, '182965968846', '11', 2021, 2042, 2096),
(80, '182965978847', '11', 2021, 2043, 2097),
(81, '182965988848', '11', 2021, 2044, 2098),
(82, '182965998849', '11', 2021, 2045, 2099),
(83, '182967008850', '11', 2021, 2046, 2100),
(84, '182967018851', '11', 2021, 2047, 2101),
(85, '182967028852', '11', 2021, 2048, 2102),
(86, '182967038853', '11', 2021, 2049, 2103),
(87, '182967058855', '11', 2021, 2050, 2104),
(88, '182967068856', '11', 2021, 2051, 2105),
(89, '182967078857', '11', 2021, 2052, 2106),
(90, '182967088858', '11', 2021, 2053, 2074),
(91, '182967098859', '11', 2021, 2054, 2075),
(92, '182967108860', '11', 2021, 2055, 2076),
(93, '182967118861', '11', 2021, 2056, 2077),
(94, '182967128862', '11', 2021, 2057, 2078),
(95, '182967138863', '11', 2021, 2058, 2079),
(96, '182967148864', '11', 2021, 2059, 2080),
(97, '182967158865', '11', 2021, 2060, 2081),
(98, '182967168866', '11', 2021, 2061, 2082),
(99, '182967178867', '11', 2021, 2062, 2083),
(100, '182967188868', '11', 2021, 2063, 2084),
(101, '182967198869', '11', 2021, 2064, 2085),
(102, '182967208870', '11', 2021, 2065, 2086),
(103, '182967218871', '11', 2021, 2066, 2087),
(104, '182967228872', '11', 2021, 2067, 2088),
(105, '182965738820', '12', 2021, 2048, 2083),
(106, '182965738821', '12', 2021, 2049, 2103),
(107, '182965738822', '12', 2021, 2050, 2075),
(108, '182965738823', '12', 2021, 2051, 2082),
(109, '182965748824', '12', 2021, 2052, 2091),
(110, '182965758825', '12', 2021, 2053, 2085),
(111, '182965768826', '12', 2021, 2043, 2074),
(112, '182965778827', '12', 2021, 2040, 2061),
(113, '182965788828', '12', 2021, 2041, 2074),
(114, '182965798829', '12', 2021, 2042, 2070),
(115, '182965808830', '12', 2021, 2043, 2072),
(116, '182965818831', '12', 2021, 2044, 2064),
(117, '182965828832', '12', 2021, 2052, 2074),
(118, '182965838833', '12', 2021, 2053, 2076),
(119, '182965848834', '12', 2021, 2082, 2105),
(120, '182965858835', '12', 2021, 2083, 2117),
(121, '182965868836', '12', 2021, 2084, 2104),
(122, '182965878837', '12', 2021, 2085, 2115),
(123, '182965888838', '12', 2021, 2077, 2107),
(124, '182965898839', '12', 2021, 2075, 2098),
(125, '182965908840', '12', 2021, 2083, 2108),
(126, '182965918841', '12', 2021, 2084, 2121),
(127, '182965928842', '12', 2021, 2085, 2143),
(128, '182965938843', '12', 2021, 2086, 2135),
(129, '182965948844', '12', 2021, 2087, 2142),
(130, '182965958845', '12', 2021, 2095, 2155),
(131, '182965968846', '12', 2021, 2096, 2133),
(132, '182965978847', '12', 2021, 2097, 2145),
(133, '182965988848', '12', 2021, 2098, 2125),
(134, '182965998849', '12', 2021, 2099, 2147),
(135, '182967008850', '12', 2021, 2100, 2158),
(136, '182967018851', '12', 2021, 2101, 2134),
(137, '182967028852', '12', 2021, 2102, 2153),
(138, '182967038853', '12', 2021, 2103, 2132),
(139, '182967058855', '12', 2021, 2104, 2159),
(140, '182967068856', '12', 2021, 2105, 2136),
(141, '182967078857', '12', 2021, 2106, 2138),
(142, '182967088858', '12', 2021, 2074, 2119),
(143, '182967098859', '12', 2021, 2075, 2108),
(144, '182967108860', '12', 2021, 2076, 2134),
(145, '182967118861', '12', 2021, 2077, 2112),
(146, '182967128862', '12', 2021, 2078, 2123),
(147, '182967138863', '12', 2021, 2079, 2144),
(148, '182967148864', '12', 2021, 2080, 2118),
(149, '182967158865', '12', 2021, 2081, 2135),
(150, '182967168866', '12', 2021, 2082, 2108),
(151, '182967178867', '12', 2021, 2083, 2137),
(152, '182967188868', '12', 2021, 2084, 2105),
(153, '182967198869', '12', 2021, 2085, 2138),
(154, '182967208870', '12', 2021, 2086, 2116),
(155, '182967218871', '12', 2021, 2087, 2118),
(156, '182967228872', '12', 2021, 2088, 2122);

--
-- Triggers `penggunaan`
--
DELIMITER $$
CREATE TRIGGER `tagihan_pelanggan` AFTER INSERT ON `penggunaan` FOR EACH ROW BEGIN
INSERT INTO tagihan (id_penggunaan,id_pelanggan,bulan,tahun,jumlah_meter,status) VALUES
(new.id_penggunaan,new.id_pelanggan,new.bulan,new.tahun,new.meter_akhir-new.meter_awal,'belum bayar');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) UNSIGNED NOT NULL,
  `id_penggunaan` int(11) UNSIGNED NOT NULL,
  `id_pelanggan` char(12) NOT NULL,
  `bulan` char(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_meter` int(11) UNSIGNED NOT NULL,
  `status` enum('sudah bayar','belum bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `status`) VALUES
(1, 1, '182965738820', '10', 2021, 32, 'belum bayar'),
(2, 2, '182965738821', '10', 2021, 35, 'belum bayar'),
(3, 3, '182965738822', '10', 2021, 36, 'belum bayar'),
(4, 4, '182965738823', '10', 2021, 37, 'belum bayar'),
(5, 5, '182965748824', '10', 2021, 38, 'belum bayar'),
(6, 6, '182965758825', '10', 2021, 39, 'belum bayar'),
(7, 7, '182965768826', '10', 2021, 40, 'belum bayar'),
(8, 8, '182965778827', '10', 2021, 41, 'belum bayar'),
(9, 9, '182965788828', '10', 2021, 42, 'belum bayar'),
(10, 10, '182965798829', '10', 2021, 43, 'belum bayar'),
(11, 11, '182965808830', '10', 2021, 44, 'belum bayar'),
(12, 12, '182965818831', '10', 2021, 45, 'belum bayar'),
(13, 13, '182965828832', '10', 2021, 46, 'belum bayar'),
(14, 14, '182965838833', '10', 2021, 47, 'belum bayar'),
(15, 15, '182965848834', '10', 2021, 48, 'belum bayar'),
(16, 16, '182965858835', '10', 2021, 49, 'belum bayar'),
(17, 17, '182965868836', '10', 2021, 50, 'belum bayar'),
(18, 18, '182965878837', '10', 2021, 51, 'belum bayar'),
(19, 19, '182965888838', '10', 2021, 52, 'belum bayar'),
(20, 20, '182965898839', '10', 2021, 53, 'belum bayar'),
(21, 21, '182965908840', '10', 2021, 54, 'belum bayar'),
(22, 22, '182965918841', '10', 2021, 55, 'belum bayar'),
(23, 23, '182965928842', '10', 2021, 56, 'belum bayar'),
(24, 24, '182965938843', '10', 2021, 57, 'belum bayar'),
(25, 25, '182965948844', '10', 2021, 58, 'belum bayar'),
(26, 26, '182965958845', '10', 2021, 59, 'belum bayar'),
(27, 27, '182965968846', '10', 2021, 60, 'belum bayar'),
(28, 28, '182965978847', '10', 2021, 61, 'belum bayar'),
(29, 29, '182965988848', '10', 2021, 62, 'belum bayar'),
(30, 30, '182965998849', '10', 2021, 63, 'belum bayar'),
(31, 31, '182967008850', '10', 2021, 64, 'belum bayar'),
(32, 32, '182967018851', '10', 2021, 65, 'belum bayar'),
(33, 33, '182967028852', '10', 2021, 66, 'belum bayar'),
(34, 34, '182967038853', '10', 2021, 67, 'belum bayar'),
(35, 35, '182967058855', '10', 2021, 68, 'belum bayar'),
(36, 36, '182967068856', '10', 2021, 69, 'belum bayar'),
(37, 37, '182967078857', '10', 2021, 70, 'belum bayar'),
(38, 38, '182967088858', '10', 2021, 71, 'belum bayar'),
(39, 39, '182967098859', '10', 2021, 72, 'belum bayar'),
(40, 40, '182967108860', '10', 2021, 73, 'belum bayar'),
(41, 41, '182967118861', '10', 2021, 74, 'belum bayar'),
(42, 42, '182967128862', '10', 2021, 75, 'belum bayar'),
(43, 43, '182967138863', '10', 2021, 76, 'belum bayar'),
(44, 44, '182967148864', '10', 2021, 77, 'belum bayar'),
(45, 45, '182967158865', '10', 2021, 78, 'belum bayar'),
(46, 46, '182967168866', '10', 2021, 79, 'belum bayar'),
(47, 47, '182967178867', '10', 2021, 80, 'belum bayar'),
(48, 48, '182967188868', '10', 2021, 81, 'belum bayar'),
(49, 49, '182967198869', '10', 2021, 82, 'belum bayar'),
(50, 50, '182967208870', '10', 2021, 83, 'belum bayar'),
(51, 51, '182967218871', '10', 2021, 84, 'belum bayar'),
(53, 53, '182965738820', '11', 2021, 32, 'belum bayar'),
(54, 54, '182965738821', '11', 2021, 32, 'belum bayar'),
(55, 55, '182965738822', '11', 2021, 32, 'belum bayar'),
(56, 56, '182965738823', '11', 2021, 32, 'belum bayar'),
(57, 57, '182965748824', '11', 2021, 32, 'belum bayar'),
(58, 58, '182965758825', '11', 2021, 32, 'belum bayar'),
(59, 59, '182965768826', '11', 2021, 21, 'belum bayar'),
(60, 60, '182965778827', '11', 2021, 17, 'belum bayar'),
(61, 61, '182965788828', '11', 2021, 17, 'belum bayar'),
(62, 62, '182965798829', '11', 2021, 17, 'belum bayar'),
(63, 63, '182965808830', '11', 2021, 17, 'belum bayar'),
(64, 64, '182965818831', '11', 2021, 17, 'belum bayar'),
(65, 65, '182965828832', '11', 2021, 24, 'belum bayar'),
(66, 66, '182965838833', '11', 2021, 24, 'belum bayar'),
(67, 67, '182965848834', '11', 2021, 52, 'belum bayar'),
(68, 68, '182965858835', '11', 2021, 52, 'belum bayar'),
(69, 69, '182965868836', '11', 2021, 52, 'belum bayar'),
(70, 70, '182965878837', '11', 2021, 52, 'belum bayar'),
(71, 71, '182965888838', '11', 2021, 43, 'belum bayar'),
(72, 72, '182965898839', '11', 2021, 40, 'belum bayar'),
(73, 73, '182965908840', '11', 2021, 47, 'belum bayar'),
(74, 74, '182965918841', '11', 2021, 47, 'belum bayar'),
(75, 75, '182965928842', '11', 2021, 47, 'belum bayar'),
(76, 76, '182965938843', '11', 2021, 47, 'belum bayar'),
(77, 77, '182965948844', '11', 2021, 47, 'belum bayar'),
(78, 78, '182965958845', '11', 2021, 54, 'belum bayar'),
(79, 79, '182965968846', '11', 2021, 54, 'belum bayar'),
(80, 80, '182965978847', '11', 2021, 54, 'belum bayar'),
(81, 81, '182965988848', '11', 2021, 54, 'belum bayar'),
(82, 82, '182965998849', '11', 2021, 54, 'belum bayar'),
(83, 83, '182967008850', '11', 2021, 54, 'belum bayar'),
(84, 84, '182967018851', '11', 2021, 54, 'belum bayar'),
(85, 85, '182967028852', '11', 2021, 54, 'belum bayar'),
(86, 86, '182967038853', '11', 2021, 54, 'belum bayar'),
(87, 87, '182967058855', '11', 2021, 54, 'belum bayar'),
(88, 88, '182967068856', '11', 2021, 54, 'belum bayar'),
(89, 89, '182967078857', '11', 2021, 54, 'belum bayar'),
(90, 90, '182967088858', '11', 2021, 21, 'belum bayar'),
(91, 91, '182967098859', '11', 2021, 21, 'belum bayar'),
(92, 92, '182967108860', '11', 2021, 21, 'belum bayar'),
(93, 93, '182967118861', '11', 2021, 21, 'belum bayar'),
(94, 94, '182967128862', '11', 2021, 21, 'belum bayar'),
(95, 95, '182967138863', '11', 2021, 21, 'belum bayar'),
(96, 96, '182967148864', '11', 2021, 21, 'belum bayar'),
(97, 97, '182967158865', '11', 2021, 21, 'belum bayar'),
(98, 98, '182967168866', '11', 2021, 21, 'belum bayar'),
(99, 99, '182967178867', '11', 2021, 21, 'belum bayar'),
(100, 100, '182967188868', '11', 2021, 21, 'belum bayar'),
(101, 101, '182967198869', '11', 2021, 21, 'belum bayar'),
(102, 102, '182967208870', '11', 2021, 21, 'belum bayar'),
(103, 103, '182967218871', '11', 2021, 21, 'belum bayar'),
(105, 105, '182965738820', '12', 2021, 35, 'belum bayar'),
(106, 106, '182965738821', '12', 2021, 54, 'belum bayar'),
(107, 107, '182965738822', '12', 2021, 25, 'belum bayar'),
(108, 108, '182965738823', '12', 2021, 31, 'belum bayar'),
(109, 109, '182965748824', '12', 2021, 39, 'belum bayar'),
(110, 110, '182965758825', '12', 2021, 32, 'belum bayar'),
(111, 111, '182965768826', '12', 2021, 31, 'belum bayar'),
(112, 112, '182965778827', '12', 2021, 21, 'belum bayar'),
(113, 113, '182965788828', '12', 2021, 33, 'belum bayar'),
(114, 114, '182965798829', '12', 2021, 28, 'belum bayar'),
(115, 115, '182965808830', '12', 2021, 29, 'belum bayar'),
(116, 116, '182965818831', '12', 2021, 20, 'belum bayar'),
(117, 117, '182965828832', '12', 2021, 22, 'belum bayar'),
(118, 118, '182965838833', '12', 2021, 23, 'belum bayar'),
(119, 119, '182965848834', '12', 2021, 23, 'belum bayar'),
(120, 120, '182965858835', '12', 2021, 34, 'belum bayar'),
(121, 121, '182965868836', '12', 2021, 20, 'belum bayar'),
(122, 122, '182965878837', '12', 2021, 30, 'belum bayar'),
(123, 123, '182965888838', '12', 2021, 30, 'belum bayar'),
(124, 124, '182965898839', '12', 2021, 23, 'belum bayar'),
(125, 125, '182965908840', '12', 2021, 25, 'belum bayar'),
(126, 126, '182965918841', '12', 2021, 37, 'belum bayar'),
(127, 127, '182965928842', '12', 2021, 58, 'belum bayar'),
(128, 128, '182965938843', '12', 2021, 49, 'belum bayar'),
(129, 129, '182965948844', '12', 2021, 55, 'belum bayar'),
(130, 130, '182965958845', '12', 2021, 60, 'belum bayar'),
(131, 131, '182965968846', '12', 2021, 37, 'belum bayar'),
(132, 132, '182965978847', '12', 2021, 48, 'belum bayar'),
(133, 133, '182965988848', '12', 2021, 27, 'belum bayar'),
(134, 134, '182965998849', '12', 2021, 48, 'belum bayar'),
(135, 135, '182967008850', '12', 2021, 58, 'belum bayar'),
(136, 136, '182967018851', '12', 2021, 33, 'belum bayar'),
(137, 137, '182967028852', '12', 2021, 51, 'belum bayar'),
(138, 138, '182967038853', '12', 2021, 29, 'belum bayar'),
(139, 139, '182967058855', '12', 2021, 55, 'belum bayar'),
(140, 140, '182967068856', '12', 2021, 31, 'belum bayar'),
(141, 141, '182967078857', '12', 2021, 32, 'belum bayar'),
(142, 142, '182967088858', '12', 2021, 45, 'belum bayar'),
(143, 143, '182967098859', '12', 2021, 33, 'belum bayar'),
(144, 144, '182967108860', '12', 2021, 58, 'belum bayar'),
(145, 145, '182967118861', '12', 2021, 35, 'belum bayar'),
(146, 146, '182967128862', '12', 2021, 45, 'belum bayar'),
(147, 147, '182967138863', '12', 2021, 65, 'belum bayar'),
(148, 148, '182967148864', '12', 2021, 38, 'belum bayar'),
(149, 149, '182967158865', '12', 2021, 54, 'belum bayar'),
(150, 150, '182967168866', '12', 2021, 26, 'belum bayar'),
(151, 151, '182967178867', '12', 2021, 54, 'belum bayar'),
(152, 152, '182967188868', '12', 2021, 21, 'belum bayar'),
(153, 153, '182967198869', '12', 2021, 53, 'belum bayar'),
(154, 154, '182967208870', '12', 2021, 30, 'belum bayar'),
(155, 155, '182967218871', '12', 2021, 31, 'belum bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(3) UNSIGNED NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `daya` varchar(15) NOT NULL,
  `tarifperkwh` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `golongan`, `daya`, `tarifperkwh`) VALUES
(1, 'GOL R-1/TR', '900 VA', 1352),
(2, 'GOL R-1/TR', '1300 VA', 1444),
(3, 'GOL R-1/TR', '2200 VA', 1444),
(4, 'GOL R-2/TR', '4000 VA', 1444),
(5, 'GOL R-3/TR', '6600 VA', 1444),
(6, 'GOL B-2/TR', '7000 VA', 1444),
(7, 'GOL B-3/TM', '200 kVA', 1114),
(8, 'GOL I-4/TT', '30000 kVA', 996),
(10, 'GOL SR-1/TR', '250 VA', 415),
(11, 'GOL SR-1/TR', '450 VA', 605),
(12, 'GOL R-2/TR', '3000 VA', 1444);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(3) UNSIGNED NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_level`, `token`, `nama`) VALUES
(00001, 'FajarH', '1b3231655cebb7a1f783eddf27d254ca', 1, 'fd5517ebfa6fc44408c2c7fb8234b195', 'Fajar Hafidzi'),
(00002, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 2, NULL, NULL),
(00003, 'Manager', '1d0258c2440a8d19e716292b231e3190', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `info_penggunaan`
--
DROP TABLE IF EXISTS `info_penggunaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_penggunaan`  AS  select `pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`tarif`.`daya` AS `daya`,`penggunaan`.`bulan` AS `bulan`,`penggunaan`.`tahun` AS `tahun`,`penggunaan`.`meter_awal` AS `meter_awal`,`penggunaan`.`meter_akhir` AS `meter_akhir` from ((`pelanggan` join `penggunaan` on(`pelanggan`.`id_pelanggan` = `penggunaan`.`id_pelanggan`)) join `tarif` on(`pelanggan`.`id_tarif` = `tarif`.`id_tarif`)) order by `pelanggan`.`nama_pelanggan` ;

-- --------------------------------------------------------

--
-- Structure for view `info_tagihan`
--
DROP TABLE IF EXISTS `info_tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_tagihan`  AS  select `tagihan`.`id_tagihan` AS `id_tagihan`,`pelanggan`.`id_pelanggan` AS `id_pelanggan`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`tarif`.`daya` AS `daya`,`tarif`.`tarifperkwh` AS `tarifperkwh`,`tagihan`.`bulan` AS `bulan`,`tagihan`.`tahun` AS `tahun`,`tagihan`.`jumlah_meter` AS `jumlah_meter`,`tagihan`.`status` AS `status` from ((`pelanggan` join `tagihan` on(`pelanggan`.`id_pelanggan` = `tagihan`.`id_pelanggan`)) join `tarif` on(`pelanggan`.`id_tarif` = `tarif`.`id_tarif`)) order by `pelanggan`.`nama_pelanggan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `fk_tarif` (`id_tarif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_tagihan` (`id_tagihan`),
  ADD KEY `fk_customer` (`id_pelanggan`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `fk_pemakai` (`id_pelanggan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_menggunakan` (`id_penggunaan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id_penggunaan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4294967296;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_tarif` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`) ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tagihan` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `fk_pemakai` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON UPDATE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `fk_menggunakan` FOREIGN KEY (`id_penggunaan`) REFERENCES `penggunaan` (`id_penggunaan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
