-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 12:26 AM
-- Server version: 10.11.2-MariaDB-1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital-locator`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lga_id` varchar(255) NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address`, `lga_id`, `state_id`, `latitude`, `longitude`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Federal University Lokoja Teaching Hospital, Lokoja', 'FMC Junction, Lokoja', '478', '23', 7.81666340, 6.74999700, '080934902321', '2024-07-14 15:02:21', '2024-07-14 15:02:21'),
(2, 'Specialist hospital', 'Lokoja', '483', '23', 7.81666340, 6.74999700, '080934902321', '2024-07-14 15:50:36', '2024-07-14 15:50:36'),
(94, 'Lagos University Teaching Hospital', '1-5 Idi-Araba St, Mushin', '203', '26', 6.52256300, 3.36965400, '+234 123 4567', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(95, 'University College Hospital', 'Queen Elizabeth Road, Oritamefa', '147', '31', 7.39320700, 3.91601900, '+234 234 5678', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(96, 'Ahmadu Bello University Teaching Hospital', 'Samaru', '286', '21', 11.14607200, 7.69355900, '+234 345 6789', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(97, 'University of Nigeria Teaching Hospital', 'Ituku-Ozalla', '65', '10', 6.44501800, 7.52062200, '+234 456 7890', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(98, 'Federal Medical Centre', 'Along Ogbomoso-Ilorin Road', '242', '31', 8.13336000, 4.24063000, '+234 567 8901', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(99, 'National Hospital', 'Plot 132 Central District (Phase II), Garki', '103', '2', 9.04758500, 7.49769600, '+234 678 9012', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(100, 'University of Benin Teaching Hospital', 'Ugbowo', '171', '13', 6.33536500, 5.62680800, '+234 789 0123', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(101, 'University of Ilorin Teaching Hospital', 'New Site, Oke-Oyi', '129', '19', 8.47986200, 4.59112400, '+234 890 1234', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(102, 'Federal Teaching Hospital', 'Ido Ekiti', '126', '11', 7.78816200, 5.19971300, '+234 901 2345', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(103, 'Obafemi Awolowo University Teaching Hospitals Complex', 'Ile-Ife', '64', '30', 7.50861500, 4.52347300, '+234 012 3456', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(104, 'University of Maiduguri Teaching Hospital', 'Bama Road', '171', '5', 11.84563800, 13.15725400, '+234 123 4568', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(105, 'Federal Medical Centre', 'Yola Road', '92', '2', 9.27852300, 12.46122600, '+234 234 5679', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(106, 'Aminu Kano Teaching Hospital', 'Zaria Road', '242', '16', 12.02968200, 8.52127800, '+234 345 6790', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(107, 'Nnamdi Azikiwe University Teaching Hospital', 'Nnewi', '158', '3', 6.01954000, 6.91122000, '+234 456 7891', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(108, 'Federal Medical Centre', 'Amassoma Road', '136', '4', 4.92494800, 6.26734500, '+234 567 8902', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(109, 'Federal Teaching Hospital', 'Abakaliki', '5', '6', 6.32485400, 8.11374500, '+234 678 9013', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(110, 'Federal Medical Centre', 'Hadejia Road', '98', '18', 11.76250800, 9.33821500, '+234 789 0124', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(111, 'University of Uyo Teaching Hospital', 'Abak Road', '243', '2', 5.04181900, 7.92752700, '+234 890 1235', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(112, 'Federal Medical Centre', 'Old Ife Road', '147', '31', 7.39857300, 3.92763100, '+234 901 2346', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(113, 'Federal Medical Centre', 'Lokoja', '123', '14', 7.79883700, 6.74280400, '+234 012 3457', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(115, 'Federal Medical Centre', 'Rumuokoro', '163', '32', 4.88692500, 6.99153100, '+234 234 5680', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(116, 'Federal Medical Centre', 'Owerri', '136', '15', 5.48702800, 7.02702600, '+234 345 6791', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(117, 'Federal Medical Centre', 'Birnin Kebbi', '22', '21', 12.45361700, 4.19983700, '+234 456 7892', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(118, 'Federal Medical Centre', 'Makurdi', '118', '8', 7.73592400, 8.51536000, '+234 567 8903', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(119, 'Federal Medical Centre', 'Azare', '20', '7', 11.67508400, 10.19119900, '+234 678 9014', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(120, 'University of Calabar Teaching Hospital', 'Moore Road', '78', '9', 4.97115200, 8.34906700, '+234 789 0125', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(121, 'Federal Medical Centre', 'Birnin Jigawa', '98', '19', 11.43946900, 9.49916700, '+234 890 1236', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(122, 'Federal Medical Centre', 'Asaba', '158', '11', 6.19440300, 6.74020500, '+234 901 2347', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(123, 'Federal Medical Centre', 'Abeokuta', '12', '29', 7.15907300, 3.34914900, '+234 012 3458', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(124, 'Federal Medical Centre', 'Ikot Ekpene Road', '39', '2', 5.17299800, 7.71417400, '+234 123 4570', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(126, 'University of Jos Teaching Hospital', 'Lamingo Road', '116', '27', 9.89652700, 8.86874700, '+234 345 6792', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(127, 'Federal Medical Centre', 'Katsina', '117', '21', 12.99508500, 7.60719600, '+234 456 7893', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(128, 'Federal Medical Centre', 'Ado-Ekiti', '18', '11', 7.62328200, 5.22151700, '+234 567 8904', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(130, 'Federal Medical Centre', 'Minna', '82', '23', 9.60722200, 6.54725400, '+234 789 0126', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(131, 'Federal Medical Centre', 'Gombe', '6', '12', 10.27712200, 11.16620800, '+234 890 1237', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(132, 'Federal Medical Centre', 'Kontagora', '80', '23', 10.40747300, 5.46993400, '+234 901 2348', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(133, 'Federal Medical Centre', 'Umuahia', '165', '5', 5.52686700, 7.48983200, '+234 012 3459', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(134, 'Federal Medical Centre', 'Birnin Gwari', '286', '21', 10.66212200, 6.53278800, '+234 123 4571', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(135, 'Federal Medical Centre', 'Ikenne', '85', '29', 6.87832100, 3.71765300, '+234 234 5682', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(136, 'Federal Medical Centre', 'Gombe', '93', '12', 10.28616200, 11.16651300, '+234 345 6793', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(137, 'Federal Medical Centre', 'Keffi', '107', '25', 8.84770700, 7.87368400, '+234 456 7894', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(138, 'Federal Medical Centre', 'Makurdi', '118', '8', 7.73386700, 8.51389600, '+234 567 8905', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(139, 'Federal Medical Centre', 'Birnin Kebbi', '22', '21', 12.45683900, 4.19974100, '+234 678 9016', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(140, 'Federal Medical Centre', 'Yola', '92', '2', 9.20349700, 12.47083900, '+234 789 0127', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(141, 'Federal Medical Centre', 'Lokoja', '123', '14', 7.80175900, 6.73146800, '+234 890 1238', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(142, 'Federal Medical Centre', 'Jebba Road', '99', '24', 8.88614000, 7.25004600, '+234 901 2349', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(143, 'Federal Medical Centre', 'Abeokuta', '12', '29', 7.16007400, 3.35226900, '+234 012 3460', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(144, 'Federal Medical Centre', 'Bida Road', '50', '23', 9.17261700, 6.01700000, '+234 123 4572', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(145, 'Federal Medical Centre', 'Lafia', '117', '25', 8.51084800, 8.51670700, '+234 234 5683', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(146, 'Federal Medical Centre', 'Owo', '168', '29', 7.20124900, 5.58635100, '+234 345 6794', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(147, 'Federal Medical Centre', 'Yenagoa', '258', '8', 4.91727800, 6.26478000, '+234 456 7895', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(148, 'Federal Medical Centre', 'Suleja', '179', '23', 9.19389200, 7.17611600, '+234 567 8906', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(150, 'Federal Medical Centre', 'Aba', '165', '1', 5.11949600, 7.37999200, '+234 789 0128', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(151, 'Federal Medical Centre', 'Jibia', '136', '21', 12.26852900, 8.39024600, '+234 890 1239', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(152, 'Federal Medical Centre', 'Owerri', '193', '15', 5.49778200, 7.03979300, '+234 901 2350', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(153, 'Federal Medical Centre', 'Kaltungo', '213', '12', 10.04702600, 11.24204000, '+234 012 3461', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(154, 'Federal Medical Centre', 'Dutsinma Road', '108', '21', 12.44934600, 7.64439200, '+234 123 4573', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(156, 'Federal Medical Centre', 'Owerri', '193', '15', 5.49510800, 7.03112200, '+234 345 6795', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(159, 'Federal Medical Centre', 'Abuja', '35', '1', 9.06923100, 7.48998300, '+234 678 9018', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(160, 'Federal Medical Centre', 'Yelwa', '260', '8', 8.22444300, 4.33713400, '+234 789 0129', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(161, 'Federal Medical Centre', 'Funtua', '131', '21', 11.52083100, 7.31124500, '+234 890 1240', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(162, 'Federal Medical Centre', 'Ikare Road', '96', '29', 7.72644400, 5.12909000, '+234 012 3462', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(163, 'Federal Medical Centre', 'Bichi', '29', '16', 12.21614000, 8.41940700, '+234 123 4574', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(164, 'Federal Medical Centre', 'Kano', '143', '16', 12.01768400, 8.50929000, '+234 234 5685', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(165, 'Federal Medical Centre', 'Sokoto', '154', '36', 13.04546900, 5.25019900, '+234 345 6796', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(166, 'Federal Medical Centre', 'Auchi', '15', '13', 7.07334800, 6.28278900, '+234 456 7897', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(167, 'Federal Medical Centre', 'Ilorin', '109', '18', 8.48305500, 4.56586200, '+234 567 8908', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(168, 'Federal Medical Centre', 'Ogoja', '213', '9', 6.65918600, 8.80322900, '+234 678 9019', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(169, 'Federal Medical Centre', 'Gombe', '252', '12', 10.30766500, 11.16117400, '+234 789 0130', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(171, 'Federal Medical Centre', 'Bauchi', '22', '4', 10.30620500, 9.82599000, '+234 012 3463', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(173, 'Federal Medical Centre', 'Keffi', '107', '25', 8.85653600, 7.87715900, '+234 234 5686', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(174, 'Federal Medical Centre', 'Saki', '152', '30', 8.66550600, 3.39478200, '+234 345 6797', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(175, 'Federal Medical Centre', 'Gombe', '252', '12', 10.30706500, 11.16127000, '+234 456 7898', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(177, 'Federal Medical Centre', 'Kankia', '104', '21', 12.65361800, 7.71727300, '+234 678 9020', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(178, 'Federal Medical Centre', 'Otukpo', '170', '8', 7.19316800, 8.13343300, '+234 789 0131', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(179, 'Federal Medical Centre', 'Bida', '50', '23', 9.07601800, 6.01560300, '+234 890 1242', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(180, 'Federal Medical Centre', 'Birnin Kudu', '22', '17', 12.14263500, 9.91112100, '+234 012 3464', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(181, 'Federal Medical Centre', 'Maiduguri', '171', '5', 11.83512100, 13.16059700, '+234 123 4576', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(183, 'Federal Medical Centre', 'Owo', '168', '29', 7.20041700, 5.58517700, '+234 345 6798', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(184, 'Federal Medical Centre', 'Ebonyi', '54', '6', 6.31475500, 8.12297300, '+234 456 7899', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(185, 'Federal Medical Centre', 'Jebba Road', '99', '24', 8.88907700, 7.25010100, '+234 567 8910', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(187, 'Federal Medical Centre', 'Owerri', '193', '15', 5.49865800, 7.03179100, '+234 789 0132', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(188, 'Federal Medical Centre', 'Kaltungo', '213', '12', 10.05227200, 11.24644000, '+234 890 1243', '2024-07-14 17:10:58', '2024-07-14 17:10:58'),
(190, 'Federal Medical Centre', 'Dutsinma', '108', '21', 12.45036100, 7.64459600, '+234 123 4577', '2024-07-14 17:10:58', '2024-07-14 17:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE `lgas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `name`, `state_id`) VALUES
(1, 'Aba North', 1),
(2, 'Aba South', 1),
(3, 'Arochukwu', 1),
(4, 'Bende', 1),
(5, 'Ikwuano', 1),
(6, 'Isiala Ngwa North', 1),
(7, 'Isiala Ngwa South', 1),
(8, 'Isuikwuato', 1),
(9, 'Obi Ngwa', 1),
(10, 'Ohafia', 1),
(11, 'Osisioma', 1),
(12, 'Ugwunagbo', 1),
(13, 'Ukwa East', 1),
(14, 'Ukwa West', 1),
(15, 'Umuahia North', 1),
(16, 'Umuahia South', 1),
(17, 'Umu Nneochi', 1),
(18, 'Demsa', 2),
(19, 'Fufure', 2),
(20, 'Ganye', 2),
(21, 'Girei', 2),
(22, 'Gombi', 2),
(23, 'Guyuk', 2),
(24, 'Hong', 2),
(25, 'Jada', 2),
(26, 'Lamurde', 2),
(27, 'Madagali', 2),
(28, 'Maiha', 2),
(29, 'Mayo-Belwa', 2),
(30, 'Michika', 2),
(31, 'Mubi North', 2),
(32, 'Mubi South', 2),
(33, 'Numan', 2),
(34, 'Shelleng', 2),
(35, 'Song', 2),
(36, 'Toungo', 2),
(37, 'Yola North', 2),
(38, 'Yola South', 2),
(39, 'Abak', 3),
(40, 'Eastern Obolo', 3),
(41, 'Eket', 3),
(42, 'Esit Eket', 3),
(43, 'Essien Udim', 3),
(44, 'Etim Ekpo', 3),
(45, 'Etinan', 3),
(46, 'Ibeno', 3),
(47, 'Ibesikpo Asutan', 3),
(48, 'Ibiono Ibom', 3),
(49, 'Ika', 3),
(50, 'Ikono', 3),
(51, 'Ikot Abasi', 3),
(52, 'Ikot Ekpene', 3),
(53, 'Ini', 3),
(54, 'Itu', 3),
(55, 'Mbo', 3),
(56, 'Mkpat Enin', 3),
(57, 'Nsit Atai', 3),
(58, 'Nsit Ibom', 3),
(59, 'Nsit Ubium', 3),
(60, 'Obot Akara', 3),
(61, 'Okobo', 3),
(62, 'Onna', 3),
(63, 'Oron', 3),
(64, 'Oruk Anam', 3),
(65, 'Udung Uko', 3),
(66, 'Ukanafun', 3),
(67, 'Uruan', 3),
(68, 'Urue-Offong/Oruko', 3),
(69, 'Uyo', 3),
(70, 'Aguata', 4),
(71, 'Anambra East', 4),
(72, 'Anambra West', 4),
(73, 'Anaocha', 4),
(74, 'Awka North', 4),
(75, 'Awka South', 4),
(76, 'Ayamelum', 4),
(77, 'Dunukofia', 4),
(78, 'Ekwusigo', 4),
(79, 'Idemili North', 4),
(80, 'Idemili South', 4),
(81, 'Ihiala', 4),
(82, 'Njikoka', 4),
(83, 'Nnewi North', 4),
(84, 'Nnewi South', 4),
(85, 'Ogbaru', 4),
(86, 'Onitsha North', 4),
(87, 'Onitsha South', 4),
(88, 'Orumba North', 4),
(89, 'Orumba South', 4),
(90, 'Oyi', 4),
(91, 'Alkaleri', 5),
(92, 'Bauchi', 5),
(93, 'Bogoro', 5),
(94, 'Damban', 5),
(95, 'Darazo', 5),
(96, 'Dass', 5),
(97, 'Ganjuwa', 5),
(98, 'Giade', 5),
(99, 'Itas/Gadau', 5),
(100, 'Jama\'are', 5),
(101, 'Katagum', 5),
(102, 'Kirfi', 5),
(103, 'Misau', 5),
(104, 'Ningi', 5),
(105, 'Shira', 5),
(106, 'Tafawa Balewa', 5),
(107, 'Toro', 5),
(108, 'Warji', 5),
(109, 'Zaki', 5),
(110, 'Brass', 6),
(111, 'Ekeremor', 6),
(112, 'Kolokuma/Opokuma', 6),
(113, 'Nembe', 6),
(114, 'Ogbia', 6),
(115, 'Sagbama', 6),
(116, 'Southern Ijaw', 6),
(117, 'Yenagoa', 6),
(118, 'Ado', 7),
(119, 'Agatu', 7),
(120, 'Apa', 7),
(121, 'Buruku', 7),
(122, 'Gboko', 7),
(123, 'Guma', 7),
(124, 'Gwer East', 7),
(125, 'Gwer West', 7),
(126, 'Katsina-Ala', 7),
(127, 'Konshisha', 7),
(128, 'Kwande', 7),
(129, 'Logo', 7),
(130, 'Makurdi', 7),
(131, 'Obi', 7),
(132, 'Ogbadibo', 7),
(133, 'Ohimini', 7),
(134, 'Oju', 7),
(135, 'Okpokwu', 7),
(136, 'Otukpo', 7),
(137, 'Tarka', 7),
(138, 'Ukum', 7),
(139, 'Ushongo', 7),
(140, 'Vandeikya', 7),
(141, 'Abadam', 8),
(142, 'Askira/Uba', 8),
(143, 'Bama', 8),
(144, 'Bayo', 8),
(145, 'Biu', 8),
(146, 'Chibok', 8),
(147, 'Damboa', 8),
(148, 'Dikwa', 8),
(149, 'Gubio', 8),
(150, 'Guzamala', 8),
(151, 'Gwoza', 8),
(152, 'Hawul', 8),
(153, 'Jere', 8),
(154, 'Kaga', 8),
(155, 'Kala/Balge', 8),
(156, 'Konduga', 8),
(157, 'Kukawa', 8),
(158, 'Kwaya Kusar', 8),
(159, 'Mafa', 8),
(160, 'Magumeri', 8),
(161, 'Maiduguri', 8),
(162, 'Marte', 8),
(163, 'Mobbar', 8),
(164, 'Monguno', 8),
(165, 'Ngala', 8),
(166, 'Nganzai', 8),
(167, 'Shani', 8),
(168, 'Abi', 9),
(169, 'Akamkpa', 9),
(170, 'Akpabuyo', 9),
(171, 'Bakassi', 9),
(172, 'Bekwarra', 9),
(173, 'Biase', 9),
(174, 'Boki', 9),
(175, 'Calabar Municipal', 9),
(176, 'Calabar South', 9),
(177, 'Etung', 9),
(178, 'Ikom', 9),
(179, 'Obanliku', 9),
(180, 'Obubra', 9),
(181, 'Obudu', 9),
(182, 'Odukpani', 9),
(183, 'Ogoja', 9),
(184, 'Yakuur', 9),
(185, 'Yala', 9),
(186, 'Aniocha North', 10),
(187, 'Aniocha South', 10),
(188, 'Bomadi', 10),
(189, 'Burutu', 10),
(190, 'Ethiope East', 10),
(191, 'Ethiope West', 10),
(192, 'Ika North East', 10),
(193, 'Ika South', 10),
(194, 'Isoko North', 10),
(195, 'Isoko South', 10),
(196, 'Ndokwa East', 10),
(197, 'Ndokwa West', 10),
(198, 'Okpe', 10),
(199, 'Oshimili North', 10),
(200, 'Oshimili South', 10),
(201, 'Patani', 10),
(202, 'Sapele', 10),
(203, 'Udu', 10),
(204, 'Ughelli North', 10),
(205, 'Ughelli South', 10),
(206, 'Ukwuani', 10),
(207, 'Uvwie', 10),
(208, 'Warri North', 10),
(209, 'Warri South', 10),
(210, 'Warri South West', 10),
(211, 'Abakaliki', 11),
(212, 'Afikpo North', 11),
(213, 'Afikpo South', 11),
(214, 'Ebonyi', 11),
(215, 'Ezza North', 11),
(216, 'Ezza South', 11),
(217, 'Ikwo', 11),
(218, 'Ishielu', 11),
(219, 'Ivo', 11),
(220, 'Izzi', 11),
(221, 'Ohaozara', 11),
(222, 'Ohaukwu', 11),
(223, 'Onicha', 11),
(224, 'Akoko-Edo', 12),
(225, 'Egor', 12),
(226, 'Esan Central', 12),
(227, 'Esan North-East', 12),
(228, 'Esan South-East', 12),
(229, 'Esan West', 12),
(230, 'Etsako Central', 12),
(231, 'Etsako East', 12),
(232, 'Etsako West', 12),
(233, 'Igueben', 12),
(234, 'Ikpoba-Okha', 12),
(235, 'Oredo', 12),
(236, 'Orhionmwon', 12),
(237, 'Ovia North-East', 12),
(238, 'Ovia South-West', 12),
(239, 'Owan East', 12),
(240, 'Owan West', 12),
(241, 'Uhunmwonde', 12),
(242, 'Ado Ekiti', 13),
(243, 'Efon', 13),
(244, 'Ekiti East', 13),
(245, 'Ekiti South-West', 13),
(246, 'Ekiti West', 13),
(247, 'Emure', 13),
(248, 'Gbonyin', 13),
(249, 'Ido Osi', 13),
(250, 'Ijero', 13),
(251, 'Ikere', 13),
(252, 'Ikole', 13),
(253, 'Ilejemeje', 13),
(254, 'Irepodun/Ifelodun', 13),
(255, 'Ise/Orun', 13),
(256, 'Moba', 13),
(257, 'Oye', 13),
(258, 'Aninri', 14),
(259, 'Awgu', 14),
(260, 'Enugu East', 14),
(261, 'Enugu North', 14),
(262, 'Enugu South', 14),
(263, 'Ezeagu', 14),
(264, 'Igbo Etiti', 14),
(265, 'Igbo Eze North', 14),
(266, 'Igbo Eze South', 14),
(267, 'Isi Uzo', 14),
(268, 'Nkanu East', 14),
(269, 'Nkanu West', 14),
(270, 'Nsukka', 14),
(271, 'Oji River', 14),
(272, 'Udenu', 14),
(273, 'Udi', 14),
(274, 'Uzo Uwani', 14),
(275, 'Abaji', 15),
(276, 'Bwari', 15),
(277, 'Gwagwalada', 15),
(278, 'Kuje', 15),
(279, 'Kwali', 15),
(280, 'Municipal Area Council', 15),
(281, 'Akko', 16),
(282, 'Balanga', 16),
(283, 'Billiri', 16),
(284, 'Dukku', 16),
(285, 'Funakaye', 16),
(286, 'Gombe', 16),
(287, 'Kaltungo', 16),
(288, 'Kwami', 16),
(289, 'Nafada', 16),
(290, 'Shongom', 16),
(291, 'Yamaltu/Deba', 16),
(292, 'Aboh Mbaise', 17),
(293, 'Ahiazu Mbaise', 17),
(294, 'Ehime Mbano', 17),
(295, 'Ezinihitte', 17),
(296, 'Ideato North', 17),
(297, 'Ideato South', 17),
(298, 'Ihitte/Uboma', 17),
(299, 'Ikeduru', 17),
(300, 'Isiala Mbano', 17),
(301, 'Isu', 17),
(302, 'Mbaitoli', 17),
(303, 'Ngor Okpala', 17),
(304, 'Njaba', 17),
(305, 'Nkwerre', 17),
(306, 'Nwangele', 17),
(307, 'Obowo', 17),
(308, 'Oguta', 17),
(309, 'Ohaji/Egbema', 17),
(310, 'Okigwe', 17),
(311, 'Orlu', 17),
(312, 'Orsu', 17),
(313, 'Oru East', 17),
(314, 'Oru West', 17),
(315, 'Owerri Municipal', 17),
(316, 'Owerri North', 17),
(317, 'Owerri West', 17),
(318, 'Auyo', 18),
(319, 'Babura', 18),
(320, 'Biriniwa', 18),
(321, 'Birnin Kudu', 18),
(322, 'Buji', 18),
(323, 'Dutse', 18),
(324, 'Gagarawa', 18),
(325, 'Garki', 18),
(326, 'Gumel', 18),
(327, 'Guri', 18),
(328, 'Gwaram', 18),
(329, 'Gwiwa', 18),
(330, 'Hadejia', 18),
(331, 'Jahun', 18),
(332, 'Kafin Hausa', 18),
(333, 'Kaugama', 18),
(334, 'Kazaure', 18),
(335, 'Kiri Kasama', 18),
(336, 'Kiyawa', 18),
(337, 'Maigatari', 18),
(338, 'Malam Madori', 18),
(339, 'Miga', 18),
(340, 'Ringim', 18),
(341, 'Roni', 18),
(342, 'Sule Tankarkar', 18),
(343, 'Taura', 18),
(344, 'Yankwashi', 18),
(345, 'Birnin Gwari', 19),
(346, 'Chikun', 19),
(347, 'Giwa', 19),
(348, 'Igabi', 19),
(349, 'Ikara', 19),
(350, 'Jaba', 19),
(351, 'Jema\'a', 19),
(352, 'Kachia', 19),
(353, 'Kaduna North', 19),
(354, 'Kaduna South', 19),
(355, 'Kagarko', 19),
(356, 'Kajuru', 19),
(357, 'Kaura', 19),
(358, 'Kauru', 19),
(359, 'Kubau', 19),
(360, 'Kudan', 19),
(361, 'Lere', 19),
(362, 'Makarfi', 19),
(363, 'Sabon Gari', 19),
(364, 'Sanga', 19),
(365, 'Soba', 19),
(366, 'Zangon Kataf', 19),
(367, 'Zaria', 19),
(368, 'Ajingi', 20),
(369, 'Albasu', 20),
(370, 'Bagwai', 20),
(371, 'Bebeji', 20),
(372, 'Bichi', 20),
(373, 'Bunkure', 20),
(374, 'Dala', 20),
(375, 'Dambatta', 20),
(376, 'Dawakin Kudu', 20),
(377, 'Dawakin Tofa', 20),
(378, 'Doguwa', 20),
(379, 'Fagge', 20),
(380, 'Gabasawa', 20),
(381, 'Garko', 20),
(382, 'Garun Mallam', 20),
(383, 'Gaya', 20),
(384, 'Gezawa', 20),
(385, 'Gwale', 20),
(386, 'Gwarzo', 20),
(387, 'Kabo', 20),
(388, 'Kano Municipal', 20),
(389, 'Karaye', 20),
(390, 'Kibiya', 20),
(391, 'Kiru', 20),
(392, 'Kumbotso', 20),
(393, 'Kunchi', 20),
(394, 'Kura', 20),
(395, 'Madobi', 20),
(396, 'Makoda', 20),
(397, 'Minjibir', 20),
(398, 'Nasarawa', 20),
(399, 'Rano', 20),
(400, 'Rimin Gado', 20),
(401, 'Rogo', 20),
(402, 'Shanono', 20),
(403, 'Sumaila', 20),
(404, 'Takai', 20),
(405, 'Tarauni', 20),
(406, 'Tofa', 20),
(407, 'Tsanyawa', 20),
(408, 'Tudun Wada', 20),
(409, 'Ungogo', 20),
(410, 'Warawa', 20),
(411, 'Wudil', 20),
(412, 'Bakori', 21),
(413, 'Batagarawa', 21),
(414, 'Batsari', 21),
(415, 'Baure', 21),
(416, 'Bindawa', 21),
(417, 'Charanchi', 21),
(418, 'Dandume', 21),
(419, 'Danja', 21),
(420, 'Dan Musa', 21),
(421, 'Daura', 21),
(422, 'Dutsi', 21),
(423, 'Dutsin Ma', 21),
(424, 'Faskari', 21),
(425, 'Funtua', 21),
(426, 'Ingawa', 21),
(427, 'Jibia', 21),
(428, 'Kafur', 21),
(429, 'Kaita', 21),
(430, 'Kankara', 21),
(431, 'Kankia', 21),
(432, 'Katsina', 21),
(433, 'Kurfi', 21),
(434, 'Kusada', 21),
(435, 'Mai\'Adua', 21),
(436, 'Malumfashi', 21),
(437, 'Mani', 21),
(438, 'Mashi', 21),
(439, 'Matazu', 21),
(440, 'Musawa', 21),
(441, 'Rimi', 21),
(442, 'Sabuwa', 21),
(443, 'Safana', 21),
(444, 'Sandamu', 21),
(445, 'Zango', 21),
(446, 'Aleiro', 22),
(447, 'Arewa Dandi', 22),
(448, 'Argungu', 22),
(449, 'Augie', 22),
(450, 'Bagudo', 22),
(451, 'Birnin Kebbi', 22),
(452, 'Bunza', 22),
(453, 'Dandi', 22),
(454, 'Fakai', 22),
(455, 'Gwandu', 22),
(456, 'Jega', 22),
(457, 'Kalgo', 22),
(458, 'Koko/Besse', 22),
(459, 'Maiyama', 22),
(460, 'Ngaski', 22),
(461, 'Sakaba', 22),
(462, 'Shanga', 22),
(463, 'Suru', 22),
(464, 'Wasagu/Danko', 22),
(465, 'Yauri', 22),
(466, 'Zuru', 22),
(467, 'Adavi', 23),
(468, 'Ajaokuta', 23),
(469, 'Ankpa', 23),
(470, 'Bassa', 23),
(471, 'Dekina', 23),
(472, 'Ibaji', 23),
(473, 'Idah', 23),
(474, 'Igalamela-Odolu', 23),
(475, 'Ijumu', 23),
(476, 'Kabba/Bunu', 23),
(477, 'Kogi', 23),
(478, 'Lokoja', 23),
(479, 'Mopa-Muro', 23),
(480, 'Ofu', 23),
(481, 'Ogori/Magongo', 23),
(482, 'Okehi', 23),
(483, 'Okene', 23),
(484, 'Olamaboro', 23),
(485, 'Omala', 23),
(486, 'Yagba East', 23),
(487, 'Yagba West', 23),
(488, 'Asa', 24),
(489, 'Baruten', 24),
(490, 'Edu', 24),
(491, 'Ekiti', 24),
(492, 'Ifelodun', 24),
(493, 'Ilorin East', 24),
(494, 'Ilorin South', 24),
(495, 'Ilorin West', 24),
(496, 'Irepodun', 24),
(497, 'Isin', 24),
(498, 'Kaiama', 24),
(499, 'Moro', 24),
(500, 'Offa', 24),
(501, 'Oke Ero', 24),
(502, 'Oyun', 24),
(503, 'Pategi', 24),
(504, 'Agege', 25),
(505, 'Ajeromi-Ifelodun', 25),
(506, 'Alimosho', 25),
(507, 'Amuwo-Odofin', 25),
(508, 'Apapa', 25),
(509, 'Badagry', 25),
(510, 'Epe', 25),
(511, 'Eti Osa', 25),
(512, 'Ibeju-Lekki', 25),
(513, 'Ifako-Ijaiye', 25),
(514, 'Ikeja', 25),
(515, 'Ikorodu', 25),
(516, 'Kosofe', 25),
(517, 'Lagos Island', 25),
(518, 'Lagos Mainland', 25),
(519, 'Mushin', 25),
(520, 'Ojo', 25),
(521, 'Oshodi-Isolo', 25),
(522, 'Shomolu', 25),
(523, 'Surulere', 25),
(524, 'Akwanga', 26),
(525, 'Awe', 26),
(526, 'Doma', 26),
(527, 'Karu', 26),
(528, 'Keana', 26),
(529, 'Keffi', 26),
(530, 'Kokona', 26),
(531, 'Lafia', 26),
(532, 'Nasarawa', 26),
(533, 'Nasarawa Eggon', 26),
(534, 'Obi', 26),
(535, 'Toto', 26),
(536, 'Wamba', 26),
(537, 'Agaie', 27),
(538, 'Agwara', 27),
(539, 'Bida', 27),
(540, 'Borgu', 27),
(541, 'Bosso', 27),
(542, 'Chanchaga', 27),
(543, 'Edati', 27),
(544, 'Gbako', 27),
(545, 'Gurara', 27),
(546, 'Katcha', 27),
(547, 'Kontagora', 27),
(548, 'Lapai', 27),
(549, 'Lavun', 27),
(550, 'Magama', 27),
(551, 'Mariga', 27),
(552, 'Mashegu', 27),
(553, 'Mokwa', 27),
(554, 'Muya', 27),
(555, 'Paikoro', 27),
(556, 'Rafi', 27),
(557, 'Rijau', 27),
(558, 'Shiroro', 27),
(559, 'Suleja', 27),
(560, 'Tafa', 27),
(561, 'Wushishi', 27),
(562, 'Abeokuta North', 28),
(563, 'Abeokuta South', 28),
(564, 'Ado-Odo/Ota', 28),
(565, 'Egbado North', 28),
(566, 'Egbado South', 28),
(567, 'Ewekoro', 28),
(568, 'Ifo', 28),
(569, 'Ijebu East', 28),
(570, 'Ijebu North', 28),
(571, 'Ijebu North East', 28),
(572, 'Ijebu Ode', 28),
(573, 'Ikenne', 28),
(574, 'Imeko Afon', 28),
(575, 'Ipokia', 28),
(576, 'Obafemi Owode', 28),
(577, 'Odeda', 28),
(578, 'Odogbolu', 28),
(579, 'Ogun Waterside', 28),
(580, 'Remo North', 28),
(581, 'Shagamu', 28),
(582, 'Akoko North-East', 29),
(583, 'Akoko North-West', 29),
(584, 'Akoko South-West', 29),
(585, 'Akoko South-East', 29),
(586, 'Akure North', 29),
(587, 'Akure South', 29),
(588, 'Ese Odo', 29),
(589, 'Idanre', 29),
(590, 'Ifedore', 29),
(591, 'Ilaje', 29),
(592, 'Ile Oluji/Okeigbo', 29),
(593, 'Irele', 29),
(594, 'Odigbo', 29),
(595, 'Okitipupa', 29),
(596, 'Ondo East', 29),
(597, 'Ondo West', 29),
(598, 'Ose', 29),
(599, 'Owo', 29),
(600, 'Aiyedaade', 30),
(601, 'Aiyedire', 30),
(602, 'Atakunmosa East', 30),
(603, 'Atakunmosa West', 30),
(604, 'Boluwaduro', 30),
(605, 'Boripe', 30),
(606, 'Ede North', 30),
(607, 'Ede South', 30),
(608, 'Egbedore', 30),
(609, 'Ejigbo', 30),
(610, 'Ife Central', 30),
(611, 'Ife East', 30),
(612, 'Ife North', 30),
(613, 'Ife South', 30),
(614, 'Ifedayo', 30),
(615, 'Ifelodun', 30),
(616, 'Ila', 30),
(617, 'Ilesa East', 30),
(618, 'Ilesa West', 30),
(619, 'Irepodun', 30),
(620, 'Irewole', 30),
(621, 'Isokan', 30),
(622, 'Iwo', 30),
(623, 'Obokun', 30),
(624, 'Odo Otin', 30),
(625, 'Ola Oluwa', 30),
(626, 'Olorunda', 30),
(627, 'Oriade', 30),
(628, 'Orolu', 30),
(629, 'Osogbo', 30),
(630, 'Afijio', 31),
(631, 'Akinyele', 31),
(632, 'Atiba', 31),
(633, 'Atisbo', 31),
(634, 'Egbeda', 31),
(635, 'Ibadan North', 31),
(636, 'Ibadan North-East', 31),
(637, 'Ibadan North-West', 31),
(638, 'Ibadan South-East', 31),
(639, 'Ibadan South-West', 31),
(640, 'Ibarapa Central', 31),
(641, 'Ibarapa East', 31),
(642, 'Ibarapa North', 31),
(643, 'Ido', 31),
(644, 'Irepo', 31),
(645, 'Iseyin', 31),
(646, 'Itesiwaju', 31),
(647, 'Iwajowa', 31),
(648, 'Kajola', 31),
(649, 'Lagelu', 31),
(650, 'Ogo Oluwa', 31),
(651, 'Ogbomosho North', 31),
(652, 'Ogbomosho South', 31),
(653, 'Olorunsogo', 31),
(654, 'Oluyole', 31),
(655, 'Ona Ara', 31),
(656, 'Orelope', 31),
(657, 'Ori Ire', 31),
(658, 'Oyo East', 31),
(659, 'Oyo West', 31),
(660, 'Saki East', 31),
(661, 'Saki West', 31),
(662, 'Surulere', 31),
(663, 'Barkin Ladi', 32),
(664, 'Bassa', 32),
(665, 'Bokkos', 32),
(666, 'Jos East', 32),
(667, 'Jos North', 32),
(668, 'Jos South', 32),
(669, 'Kanam', 32),
(670, 'Kanke', 32),
(671, 'Langtang North', 32),
(672, 'Langtang South', 32),
(673, 'Mangu', 32),
(674, 'Mikang', 32),
(675, 'Pankshin', 32),
(676, 'Qua\'an Pan', 32),
(677, 'Riyom', 32),
(678, 'Shendam', 32),
(679, 'Wase', 32),
(680, 'Abua/Odual', 33),
(681, 'Ahoada East', 33),
(682, 'Ahoada West', 33),
(683, 'Akuku-Toru', 33),
(684, 'Andoni', 33),
(685, 'Asari-Toru', 33),
(686, 'Bonny', 33),
(687, 'Degema', 33),
(688, 'Eleme', 33),
(689, 'Emuoha', 33),
(690, 'Etche', 33),
(691, 'Gokana', 33),
(692, 'Ikwerre', 33),
(693, 'Khana', 33),
(694, 'Obio/Akpor', 33),
(695, 'Ogba/Egbema/Ndoni', 33),
(696, 'Ogu/Bolo', 33),
(697, 'Okrika', 33),
(698, 'Omuma', 33),
(699, 'Opobo/Nkoro', 33),
(700, 'Oyigbo', 33),
(701, 'Port Harcourt', 33),
(702, 'Tai', 33),
(703, 'Binji', 34),
(704, 'Bodinga', 34),
(705, 'Dange Shuni', 34),
(706, 'Gada', 34),
(707, 'Goronyo', 34),
(708, 'Gudu', 34),
(709, 'Gwadabawa', 34),
(710, 'Illela', 34),
(711, 'Kebbe', 34),
(712, 'Kware', 34),
(713, 'Rabah', 34),
(714, 'Sabon Birni', 34),
(715, 'Shagari', 34),
(716, 'Silame', 34),
(717, 'Sokoto North', 34),
(718, 'Sokoto South', 34),
(719, 'Tambuwal', 34),
(720, 'Tangaza', 34),
(721, 'Tureta', 34),
(722, 'Wamako', 34),
(723, 'Wurno', 34),
(724, 'Yabo', 34),
(725, 'Ardo Kola', 35),
(726, 'Bali', 35),
(727, 'Donga', 35),
(728, 'Gashaka', 35),
(729, 'Gassol', 35),
(730, 'Ibi', 35),
(731, 'Jalingo', 35),
(732, 'Karim Lamido', 35),
(733, 'Kurmi', 35),
(734, 'Lau', 35),
(735, 'Sardauna', 35),
(736, 'Takum', 35),
(737, 'Ussa', 35),
(738, 'Wukari', 35),
(739, 'Yorro', 35),
(740, 'Zing', 35),
(741, 'Bade', 36),
(742, 'Bursari', 36),
(743, 'Damaturu', 36),
(744, 'Fika', 36),
(745, 'Fune', 36),
(746, 'Geidam', 36),
(747, 'Gujba', 36),
(748, 'Gulani', 36),
(749, 'Jakusko', 36),
(750, 'Karasuwa', 36),
(751, 'Machina', 36),
(752, 'Nangere', 36),
(753, 'Nguru', 36),
(754, 'Potiskum', 36),
(755, 'Tarmuwa', 36),
(756, 'Yunusari', 36),
(757, 'Yusufari', 36),
(758, 'Anka', 37),
(759, 'Bakura', 37),
(760, 'Birnin Magaji/Kiyaw', 37),
(761, 'Bukkuyum', 37),
(762, 'Bungudu', 37),
(763, 'Gummi', 37),
(764, 'Gusau', 37),
(765, 'Kaura Namoda', 37),
(766, 'Maradun', 37),
(767, 'Maru', 37),
(768, 'Shinkafi', 37),
(769, 'Talata Mafara', 37),
(770, 'Chafe', 37),
(771, 'Zurmi', 37);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_14_144358_create_hospitals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('grYIfXTcWkwdwoEaXcRbiARqFquLuS9hHfsBtmN1', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGxOUXdUNm5mTXY3dXpZTWdqZlkzU2d2QW92NXljRTVCRUNUTENjSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/cXVlcnk9YWRhbWF3YSI7fX0=', 1720978140),
('NmQvPJBKwv3Pe3W3wp80kCCuPi8D6tgkxionbHDU', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3RlT01ESlF2Zk9OS2JIQ1p0MG1ib09TYWJ6SDRJZmxraUd4Y1pCMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8/cXVlcnk9bG9rb2phIjt9fQ==', 1721175732);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$mcUeGl4Jl5QWG3gmUP60TeB27VhiC4PhPKpWs68tsxPvU3Ywun95G', NULL, '2024-07-14 13:54:32', '2024-07-14 13:54:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lgas`
--
ALTER TABLE `lgas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lgas`
--
ALTER TABLE `lgas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=772;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lgas`
--
ALTER TABLE `lgas`
  ADD CONSTRAINT `lgas_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
