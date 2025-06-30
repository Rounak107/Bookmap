-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2025 at 11:52 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u864479888_Bokmapservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_price` decimal(10,2) NOT NULL,
  `booking_date` datetime NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `service_id`, `service_name`, `quantity`, `total_price`, `booking_date`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 'Fully Automatic – Noise Issue', 3, 297.00, '2025-06-24 00:00:00', 'cod', 'confirmed', '2025-06-23 02:06:08', '2025-06-23 02:06:08'),
(6, 1, 2, 'Fully Automatic – Draining Issue', 1, 99.00, '2025-06-23 00:00:00', 'cod', 'confirmed', '2025-06-23 02:06:08', '2025-06-23 02:06:08'),
(13, 1, 34, 'Split AC Uninstallation', 1, 799.00, '2025-06-24 00:00:00', 'cod', 'confirmed', '2025-06-24 10:46:24', '2025-06-24 10:46:24'),
(15, 3, 35, 'Window AC Uninstallation', 2, 1198.00, '2025-06-25 00:00:00', 'cod', 'confirmed', '2025-06-25 00:42:03', '2025-06-25 00:42:03'),
(16, 1, 97, 'Windows OS Setup & Install', 2, 250.00, '2025-06-25 00:00:00', 'cod', 'confirmed', '2025-06-25 03:44:25', '2025-06-25 03:44:25'),
(17, 1, 52, '46” to 55”', 1, 349.00, '2025-06-01 00:00:00', 'cod', 'confirmed', '2025-06-25 03:46:36', '2025-06-25 03:46:36'),
(20, 4, 35, 'Geyser Check-Up', 1, 199.00, '2025-06-26 00:00:00', 'cod', 'confirmed', '2025-06-26 01:26:00', '2025-06-26 01:26:00'),
(22, 5, 69, 'MacBook Visit', 1, 125.00, '2025-06-26 00:00:00', 'cod', 'confirmed', '2025-06-26 04:05:21', '2025-06-26 04:05:21'),
(24, 5, 111, 'Kitchen + Chimney (With Interior)', 1, 1899.00, '2025-06-26 00:00:00', 'cod', 'confirmed', '2025-06-26 05:01:20', '2025-06-26 05:01:20'),
(25, 5, 98, 'Basic Chimney Cleaning', 1, 299.00, '2025-06-26 00:00:00', 'cod', 'confirmed', '2025-06-26 05:04:39', '2025-06-26 05:04:39'),
(27, 3, 33, 'Air Cooler Check-Up', 1, 249.00, '2025-06-26 00:00:00', 'cod', 'confirmed', '2025-06-26 06:42:41', '2025-06-26 06:42:41'),
(30, 7, 21, '1 AC Cleaning', 1, 549.00, '2025-06-27 00:00:00', 'cod', 'confirmed', '2025-06-27 10:08:11', '2025-06-27 10:08:11'),
(31, 1, 208, 'Sink & Exhaust Installation', 1, 899.00, '2025-06-28 00:00:00', 'cod', 'confirmed', '2025-06-28 08:27:56', '2025-06-28 08:27:56');

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Home Cleaning', NULL, NULL),
(2, 'Salon at Home', NULL, NULL),
(3, 'Appliance Repair', NULL, NULL),
(4, 'Kitchen', '2025-05-30 03:37:48', '2025-05-30 03:37:48'),
(5, 'Home Interior', '2025-05-30 03:42:59', '2025-05-30 03:42:59'),
(6, 'Home', '2025-05-30 03:43:23', '2025-05-30 03:43:23');

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
(4, '2025_05_27_093134_create_service_categories_table', 1),
(5, '2025_05_27_093144_create_services_table', 1),
(6, '2025_05_27_093154_create_bookings_table', 1),
(7, '2025_05_27_093202_create_payments_table', 1),
(8, '2025_05_27_093210_create_reviews_table', 1),
(9, '2025_05_29_064430_create_professionals_table', 2),
(10, '2025_05_29_110425_create_categories_table', 3),
(11, '2025_06_02_100401_add_icon_to_services_table', 4),
(13, '2025_06_02_113754_add_category_to_services_table', 5),
(16, '2025_06_03_100849_make_slug_unique_in_services_table', 6),
(17, '2025_06_14_071647_modify_service_id_nullable_in_bookings_table', 6),
(18, '2025_06_14_094946_add_service_name_to_bookings_table', 7),
(19, '2025_06_16_062020_add_quantity_to_bookings_table', 8),
(20, '2025_06_16_062345_add_total_price_to_bookings_table', 9),
(22, '2025_06_16_064605_add_payment_method_to_bookings_table', 10),
(23, '2025_06_24_112208_change_service_id_to_integer_in_bookings', 11),
(24, '2025_06_24_121826_add_subcategory_to_services_table', 12),
(25, '2025_06_25_091026_add_featured_to_services_table', 13),
(26, '2025_06_25_104154_add_is_admin_to_users_table', 14),
(27, '2025_06_26_063841_add_phone_to_users_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('b120053@iiit-bh.ac.in', '$2y$12$D..7Pt5IxD2GxADDGFKWC.TC.PdNgNobbToPRSfsYrojZ2D.7G9Iu', '2025-06-17 00:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `experience_years` int(11) NOT NULL,
  `rating` decimal(3,2) NOT NULL DEFAULT 0.00,
  `bio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `category`, `subcategory`, `slug`, `description`, `price`, `image`, `created_at`, `updated_at`, `icon`, `featured`) VALUES
(1, 'Air Conditioner', 'Home', NULL, 'air-conditioner', 'Air Conditioner installation, maintenance and repair.', 500.00, NULL, NULL, '2025-06-04 01:18:39', 'ac.jpg', 1),
(2, 'Washing Machine', 'Home', NULL, 'washing-machine', 'Get your washing machine serviced or repaired quickly.', 400.00, NULL, NULL, '2025-06-04 01:18:39', 'washing_machine.jpeg', 1),
(3, 'Air Cooler Services', 'Home', NULL, 'air-cooler-services', 'Cooling solutions for summer at your doorstep.', 300.00, NULL, NULL, '2025-06-04 01:18:39', 'cooler.jpg', 1),
(4, 'Geyser Services', 'Home', NULL, 'geyser-services', 'Installation and repair of all types of geysers.', 350.00, NULL, NULL, '2025-06-04 01:18:39', 'geyser.jpg', 1),
(5, 'Inverter & Stabilizer', 'Home', NULL, 'inverter-stabilizer', 'Keep your electronics safe and powered with our services.', 450.00, NULL, NULL, '2025-06-04 01:18:39', 'inverter.png', 1),
(6, 'Television', 'Home', NULL, 'television', 'Smart TV wall mount, configuration and repair.', 550.00, NULL, NULL, '2025-06-04 01:18:39', 'tv.png', 1),
(7, 'Laptop', 'Home', NULL, 'laptop', 'Laptop formatting, hardware and software repairs.', 600.00, NULL, NULL, '2025-06-04 01:18:39', 'laptop.png', 1),
(8, 'Desktop', 'Home', NULL, 'desktop', 'Computer upgrades, antivirus, and troubleshooting.', 500.00, NULL, NULL, '2025-06-04 01:18:39', 'desktop.png', 1),
(21, 'Foam Jet Cleaning - 1 AC', NULL, NULL, 'foam-jet-cleaning-1-ac', 'Foam and jet cleaning of 1 indoor & outdoor unit. Includes gas level check.', 549.00, NULL, '2025-06-09 01:27:43', '2025-06-09 01:27:43', NULL, 0),
(22, 'Foam Jet Cleaning - 2 ACs', NULL, NULL, 'foam-jet-cleaning-2-acs', 'Foam and jet cleaning of 2 AC units. Includes gas level check.', 1049.00, NULL, '2025-06-09 01:31:52', '2025-06-09 01:31:52', NULL, 0),
(23, 'Foam Jet Cleaning - 3 ACs', NULL, NULL, 'foam-jet-cleaning-3-acs', 'Foam and jet cleaning of 3 AC units. Includes gas level check.', 1400.00, NULL, '2025-06-09 01:32:01', '2025-06-09 01:32:01', NULL, 0),
(24, 'Foam Jet Cleaning - 4 ACs', NULL, NULL, 'foam-jet-cleaning-4-acs', 'Foam and jet cleaning of 4 AC units. Includes gas level check.', 1900.00, NULL, '2025-06-09 01:32:08', '2025-06-09 01:32:08', NULL, 0),
(25, 'Foam Jet Cleaning - 5 ACs', NULL, NULL, 'foam-jet-cleaning-5-acs', 'Foam and jet cleaning of 5 AC units. Includes gas level check.', 2400.00, NULL, '2025-06-09 01:32:26', '2025-06-09 01:32:26', NULL, 0),
(26, 'Lite AC Service', NULL, NULL, 'lite-ac-service', 'Basic indoor unit cleaning with gas level check.', 449.00, NULL, '2025-06-09 01:32:37', '2025-06-09 01:32:37', NULL, 0),
(27, 'Low/No Cooling Repair', NULL, NULL, 'lowno-cooling-repair', 'Fix low or no cooling issues in AC unit.', 249.00, NULL, '2025-06-09 01:32:55', '2025-06-09 01:32:55', NULL, 0),
(28, 'Power Issue Repair', NULL, NULL, 'power-issue-repair', 'Fix AC power issues or startup failure.', 249.00, NULL, '2025-06-09 01:33:03', '2025-06-09 01:33:03', NULL, 0),
(29, 'Noise/Smell Issue Repair', NULL, NULL, 'noisesmell-issue-repair', 'Fix fan, motor noise or foul smell in AC.', 449.00, NULL, '2025-06-09 01:33:31', '2025-06-09 01:33:31', NULL, 0),
(30, 'Water Leakage Repair', NULL, NULL, 'water-leakage-repair', 'Fix drain pipe blockage or internal leakage.', 599.00, NULL, '2025-06-09 01:33:40', '2025-06-09 01:33:40', NULL, 0),
(31, 'Gas Leak Repair & Refill', NULL, NULL, 'gas-leak-repair-refill', 'Fix gas leak and refill coolant gas.', 2599.00, NULL, '2025-06-09 01:33:52', '2025-06-09 01:33:52', NULL, 0),
(32, 'Split AC Installation', NULL, NULL, 'split-ac-installation', 'Install split AC (includes mounting, pipe, wiring setup).', 1599.00, NULL, '2025-06-09 01:34:01', '2025-06-09 01:34:01', NULL, 0),
(33, 'Window AC Installation', NULL, NULL, 'window-ac-installation', 'Install window AC (includes setup, testing).', 999.00, NULL, '2025-06-09 01:34:13', '2025-06-09 01:34:13', NULL, 0),
(34, 'Split AC Uninstallation', NULL, NULL, 'split-ac-uninstallation', 'Uninstall split AC and secure wiring.', 799.00, NULL, '2025-06-09 01:34:28', '2025-06-09 01:34:28', NULL, 0),
(35, 'Window AC Uninstallation', NULL, NULL, 'window-ac-uninstallation', 'Uninstall window AC and pack components.', 599.00, NULL, '2025-06-09 01:34:48', '2025-06-09 01:34:48', NULL, 0),
(36, 'Up to 10 Litres – Full Service', 'Home', 'geyser', 'geyser-service-10l', 'Geyser service for up to 10L', 549.00, 'geyser-service-10l.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(37, '11 to 25 Litres – Full Service', 'Home', 'geyser', 'geyser-service-25l', 'Geyser service 11-25L', 599.00, 'geyser-service-25l.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(38, 'Display Issues', 'Home', 'tv', 'tv-display-issue', 'TV display issue diagnosis', 199.00, 'tv-display.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(39, 'Power Issues', 'Home', 'tv', 'tv-power-issue', 'TV power not working', 199.00, 'tv-power.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(40, 'Buzzing or Cracking Sound', 'Home', 'tv', 'tv-sound-issue', 'Sound problems in TV', 199.00, 'tv-sound.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(41, 'Partial/No Display', 'Home', 'tv', 'tv-partial-display', 'Partial display issue in TV', 199.00, 'tv-partial-display.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(42, 'Color Distortion', 'Home', 'tv', 'tv-color-distortion', 'TV color problem diagnosis', 199.00, 'tv-color.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(43, 'Low/No Sound', 'Home', 'tv', 'tv-no-sound', 'No sound in TV', 199.00, 'tv-nosound.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(44, 'Flickering/Blurred Image', 'Home', 'tv', 'tv-flickering', 'Flickering or blurry TV', 199.00, 'tv-flicker.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(45, 'Glitch Lines on Screen', 'Home', 'tv', 'tv-glitch-lines', 'Glitch lines issue in TV', 199.00, 'tv-glitch.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(46, 'Unknown Issues', 'Home', 'tv', 'tv-unknown-issue', 'Unidentified TV problems', 199.00, 'tv-unknown.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(47, 'Up to 26”', 'Home', 'tv', 'tv-install-26', 'Wall mount up to 26” TV', 299.00, 'tv-install-26.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(48, '32” to 43”', 'Home', 'tv', 'tv-install-43', 'Wall mount 32”–43” TV', 549.00, 'tv-install-43.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(49, '46” to 55”', 'Home', 'tv', 'tv-install-55', 'Wall mount 46”–55” TV', 599.00, 'tv-install-55.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(50, '65” and above', 'Home', 'tv', 'tv-install-65', 'Wall mount 65”+ TV', 799.00, 'tv-install-65.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(51, 'Up to 46”', 'Home', 'tv', 'tv-uninstall-46', 'Uninstall TV up to 46”', 299.00, 'tv-uninstall-46.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(52, '46” to 55”', 'Home', 'tv', 'tv-uninstall-55', 'Uninstall TV 46–55”', 349.00, 'tv-uninstall-55.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(53, '65” and above', 'Home', 'tv', 'tv-uninstall-65', 'Uninstall 65”+ TV', 549.00, 'tv-uninstall-65.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(54, 'Inverter Check-Up', 'Home', 'inverter', 'inverter-checkup', 'Diagnose inverter issue', 150.00, 'inverter-checkup.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(55, 'Inverter Servicing – Single Battery', 'Home', 'inverter', 'inverter-service-1', 'Service for single battery inverter', 399.00, 'inverter-service-1.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(56, 'Inverter Servicing – Double Battery', 'Home', 'inverter', 'inverter-service-2', 'Double battery inverter service', 499.00, 'inverter-service-2.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(57, 'Inverter Servicing – Triple Battery', 'Home', 'inverter', 'inverter-service-3', 'Triple battery inverter service', 599.00, 'inverter-service-3.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(58, 'Inverter Servicing – 4 or 6 Battery Setup', 'Home', 'inverter', 'inverter-service-4', 'Large inverter system service', 699.00, 'inverter-service-4.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(59, 'Inverter Installation – Single Battery', 'Home', 'inverter', 'inverter-install-1', 'Install single battery inverter', 375.00, 'inverter-install-1.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(60, 'Inverter Installation – Double Battery', 'Home', 'inverter', 'inverter-install-2', 'Install double battery inverter', 450.00, 'inverter-install-2.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(61, 'Inverter Uninstallation', 'Home', 'inverter', 'inverter-uninstall', 'Remove inverter setup', 449.00, 'inverter-uninstall.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(62, 'Inverter Fuse Replacement', 'Home', 'inverter', 'inverter-fuse', 'Replace inverter fuse', 129.00, 'inverter-fuse.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(63, 'Stabilizer Installation', 'Home', 'stabilizer', 'stabilizer-install', 'Install stabilizer unit', 349.00, 'stabilizer-install.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(64, 'Stabilizer Uninstallation', 'Home', 'stabilizer', 'stabilizer-uninstall', 'Remove stabilizer safely', 249.00, 'stabilizer-uninstall.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(65, 'More than 25 Litres – Full Service', 'Home', 'geyser', 'geyser-service-40l', 'Geyser service 25L+', 649.00, 'geyser-service-40l.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(66, 'Geyser Installation', 'Home', 'geyser', 'geyser-install', 'Install any geyser', 449.00, 'geyser-install.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(67, 'Geyser Uninstallation', 'Home', 'geyser', 'geyser-uninstall', 'Remove any geyser', 349.00, 'geyser-uninstall.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(68, 'Windows Laptop Visit', 'Home', 'laptop', 'windows-laptop-visit', 'Windows laptop diagnosis visit', 125.00, 'laptop-check.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(69, 'MacBook Visit', 'Home', 'laptop', 'macbook-visit', 'MacBook home visit', 125.00, 'macbook-check.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(70, 'Software/OS Issues', 'Home', 'laptop', 'software-issues', 'Fix software/OS issues', 125.00, 'issue-software.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(71, 'Charging/Power Issue', 'Home', 'laptop', 'charging-issue', 'Fix charging issues', 125.00, 'issue-power.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(72, 'Display Problem', 'Home', 'laptop', 'display-problem', 'Fix display issues', 125.00, 'issue-display.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(73, 'Keyboard/Touchpad Fault', 'Home', 'laptop', 'keyboard-fault', 'Fix keyboard/touchpad', 125.00, 'issue-keyboard.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(74, 'Overheating', 'Home', 'laptop', 'laptop-overheat', 'Fix overheating', 125.00, 'issue-overheat.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(75, 'Internet/Camera Issue', 'Home', 'laptop', 'laptop-internet-issue', 'Fix camera/WiFi', 125.00, 'issue-internet.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(76, 'Windows Laptop Deep Service', 'Home', 'laptop', 'windows-deep-service', 'Windows laptop cleaning', 549.00, 'laptop-service.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(77, 'MacBook Deep Service', 'Home', 'laptop', 'macbook-deep-service', 'MacBook maintenance', 549.00, 'macbook-service.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(78, 'Gaming Laptop Service', 'Home', 'laptop', 'gaming-laptop-service', 'Gaming laptop service', 899.00, 'gaming-laptop.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(79, 'Windows RAM Upgrade', 'Home', 'laptop', 'ram-upgrade-win', 'Upgrade Windows RAM', 125.00, 'ram-upgrade.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(80, 'MacBook RAM Upgrade', 'Home', 'laptop', 'ram-upgrade-mac', 'Upgrade Mac RAM', 125.00, 'ram-upgrade.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(81, 'Windows HDD/SSD Upgrade', 'Home', 'laptop', 'ssd-upgrade-win', 'Windows SSD upgrade', 125.00, 'hdd-upgrade.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(82, 'MacBook HDD/SSD Upgrade', 'Home', 'laptop', 'ssd-upgrade-mac', 'MacBook SSD upgrade', 125.00, 'ssd-upgrade.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(83, 'SSD / HDD Install', 'Home', 'laptop', 'ssd-hdd-install', 'Install hard drive', 529.00, 'ssd-install.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(84, 'RAM Install', 'Home', 'laptop', 'ram-install', 'Install RAM chip', 529.00, 'ram-install.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(85, 'Graphics Card Install', 'Home', 'laptop', 'gpu-install', 'Install graphics card', 529.00, 'gpu-install.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(86, 'OS Installation & Setup', 'Home', 'laptop', 'os-install', 'Install operating system', 125.00, 'os-setup.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(87, 'Desktop Visit', 'Home', 'desktop', 'desktop-visit', 'Desktop system checkup', 125.00, 'desktop-check.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(88, 'System Lag / Hanging', 'Home', 'desktop', 'desktop-lag', 'Fix slow desktop', 125.00, 'issue-lag.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(89, 'Physical Damage', 'Home', 'desktop', 'desktop-damage', 'Body/frame damage fix', 125.00, 'issue-damage.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(90, 'Port / Display Issues', 'Home', 'desktop', 'desktop-port', 'Desktop display/port repair', 125.00, 'issue-port.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(91, 'Unknown Problem', 'Home', 'desktop', 'desktop-unknown', 'Unidentified desktop problem', 125.00, 'issue-unknown.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(92, 'Desktop Deep Cleaning & Optimization', 'Home', 'desktop', 'desktop-deep-clean', 'Deep clean desktop', 549.00, 'desktop-service.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(93, 'RAM Upgrade', 'Home', 'desktop', 'desktop-ram-upgrade', 'Upgrade desktop RAM', 125.00, 'ram-upgrade.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(94, 'Hard Disk Upgrade', 'Home', 'desktop', 'desktop-hdd-upgrade', 'Upgrade desktop hard drive', 125.00, 'hdd-upgrade.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(95, 'SSD Install', 'Home', 'desktop', 'desktop-ssd-install', 'Install SSD in desktop', 529.00, 'ssd-install.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(96, 'Graphic Card Install', 'Home', 'desktop', 'desktop-gpu-install', 'Add GPU to desktop', 529.00, 'gpu-install.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(97, 'Windows OS Setup & Install', 'Home', 'desktop', 'desktop-os-setup', 'Reinstall OS on desktop', 125.00, 'os-setup.png', '2025-06-25 08:58:56', '2025-06-25 08:58:56', NULL, 0),
(98, 'Basic Chimney Cleaning', 'Kitchen', NULL, 'chimney-basic', 'Standard chimney cleaning service', 299.00, 'chimney-clean.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'chimney.jfif', 0),
(99, 'Chimney + Stove Cleaning', 'Kitchen', NULL, 'chimney-stove-combo', 'Combo of chimney and stove cleaning', 369.00, 'chimney-stove.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'chimney.jfif', 0),
(100, 'Gas Stove & Hob Deep Cleaning', 'Kitchen', NULL, 'stove-deep-clean', 'Deep cleaning with carbon removal', 149.00, 'stove-clean.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'gas-stove.jfif', 0),
(101, 'Microwave Deep Cleaning', 'Kitchen', NULL, 'microwave-deep', 'Interior/exterior degreasing & deodorization', 199.00, 'microwave-clean.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'microwave.jfif', 0),
(102, 'Water Purifier Check-Up', 'Kitchen', NULL, 'water-purifier-check', 'Basic water purifier diagnostic service', 199.00, 'water-purifier.jfif', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'water-purifier.jfif', 0),
(103, 'Water Purifier Deep Cleaning', 'Kitchen', NULL, 'water-purifier-deep', 'Deep cleaning & maintenance of purifier', 399.00, 'water-purifier.jfif', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'water-purifier.jfif', 0),
(104, 'Improved Water Taste & Flow', 'Kitchen', NULL, 'purifier-taste-flow', 'Restore water flow and taste', 299.00, 'water-purifier.jfif', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'water-purifier.jfif', 0),
(105, 'Increased Filter Life', 'Kitchen', NULL, 'purifier-filter-life', 'Optimize purifier filter life', 299.00, 'water-purifier.jfif', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'water-purifier.jfif', 0),
(106, 'Kitchen Only Cleaning', 'Kitchen', NULL, 'kitchen-only-cleaning', 'Surface, appliances, sink cleaning', 799.00, 'kitchen-only.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-only.png', 0),
(107, 'Kitchen + Chimney Cleaning', 'Kitchen', NULL, 'kitchen-chimney-cleaning', 'Full kitchen cleaning + chimney', 1199.00, 'kitchen-chimney.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-chimney.png', 0),
(108, 'Kitchen + Fridge & Microwave Cleaning', 'Kitchen', NULL, 'kitchen-fridge-micro', 'Kitchen + fridge + microwave cleaning', 1399.00, 'kitchen-fridge-micro.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-fridge-micro.png', 0),
(109, 'Kitchen + All Appliances Cleaning', 'Kitchen', NULL, 'kitchen-all-appliances', 'Kitchen with all appliances deep clean', 1799.00, 'kitchen-all.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-all.png', 0),
(110, 'Kitchen Only (Interior)', 'Kitchen', NULL, 'kitchen-int-only', 'Includes cabinet interiors', 1499.00, 'kitchen-int-only.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-int-only.png', 0),
(111, 'Kitchen + Chimney (Interior)', 'Kitchen', NULL, 'kitchen-int-chimney', 'Kitchen + chimney with interior', 1899.00, 'kitchen-int-chimney.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-int-chimney.png', 0),
(112, 'Kitchen + Fridge & Microwave (Interior)', 'Kitchen', NULL, 'kitchen-int-fridge-micro', 'Kitchen + fridge & microwave + interiors', 2049.00, 'kitchen-int-fridge-micro.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-int-fridge-micro.png', 0),
(113, 'Kitchen + All Appliances (Interior)', 'Kitchen', NULL, 'kitchen-int-all', 'All appliances + cabinet interiors deep clean', 2449.00, 'kitchen-int-all.png', '2025-06-26 10:30:35', '2025-06-26 10:30:35', 'kitchen-int-all.png', 0),
(201, 'Water Purifier', 'Kitchen', NULL, 'water-purifier', 'RO and UV purifier cleaning and repair.', 199.00, 'water-purifier-clean.png', '2025-06-26 10:23:17', '2025-06-26 10:23:17', 'water-purifier.jfif', 1),
(202, 'Refrigerator', 'Kitchen', NULL, 'kitchen-cleaning', 'Fridge external & internal sanitation and polish.', 299.00, 'kitchen-cleaning.png', '2025-06-26 10:23:17', '2025-06-26 10:23:17', 'refrigerator.jfif', 1),
(203, 'Gas Stove & Hob Cleaning', 'Kitchen', NULL, 'stove', 'Burner and hob cleaning & carbon deposit removal.', 149.00, 'stove-clean.png', '2025-06-26 10:23:17', '2025-06-26 10:23:17', 'gas-stove.jfif', 1),
(204, 'Microwave Checkup', 'Kitchen', NULL, 'microwave', 'Internal cleaning, checkup and deodorization.', 199.00, 'microwave-clean.png', '2025-06-26 10:23:17', '2025-06-26 10:23:17', 'microwave.jfif', 1),
(205, 'Chimney', 'Kitchen', NULL, 'chimney', 'Kitchen chimney deep cleaning with degreasing.', 299.00, 'chimney-clean.png', '2025-06-26 10:23:17', '2025-06-26 10:23:17', 'chimney.jfif', 1),
(206, 'Basic Modular Setup (4 ft.)', 'Kitchen', NULL, 'modular-basic', 'Affordable modular setup for small kitchens.', 2499.00, 'modular-basic.jpg', '2025-06-28 07:46:28', '2025-06-28 07:46:28', 'modular-basic.jpg', 0),
(207, 'Modular Cabinet Repair', 'Kitchen', NULL, 'modular-repair', 'Fix broken or misaligned kitchen cabinets.', 699.00, 'modular-repair.jpg', '2025-06-28 07:46:28', '2025-06-28 07:46:28', 'modular-repair.jpg', 0),
(208, 'Sink & Exhaust Installation', 'Kitchen', NULL, 'sink-exhaust', 'Install sink and exhaust setup in kitchen.', 899.00, 'sink-exhaust.jpg', '2025-06-28 07:46:28', '2025-06-28 07:46:28', 'sink-exhaust.jpg', 0),
(209, 'Modular Kitchen', 'Kitchen', NULL, 'modular-kitchen', 'Explore modular cabinets, sink installation, and more.', 2499.00, 'modular-main.jpg', '2025-06-28 07:46:40', '2025-06-28 07:46:40', 'modular-main.jpg', 1),
(301, 'Interior Wall Painting', 'Home Interior', NULL, 'interior-wall-painting', 'Elegant paint finish for 1BHK homes.', 3199.00, 'wall-painting.jpg', '2025-06-28 07:08:30', '2025-06-28 07:08:30', 'wall-painting.jpg', 0),
(302, 'Designer Wallpaper Installation', 'Home Interior', NULL, 'wallpaper-installation', 'Install designer wallpaper per wall.', 1049.00, 'wallpaper.jpg', '2025-06-28 07:08:30', '2025-06-28 07:08:30', 'wallpaper.jpg', 0),
(303, 'Custom Interior Wall Printing', 'Home Interior', NULL, 'wall-printing', 'Custom art or motivational quotes on wall.', 1299.00, 'wall-print.jpg', '2025-06-28 07:08:30', '2025-06-28 07:08:30', 'wall-print.jpg', 0),
(304, 'Kids Room Cartoon Wall Painting', 'Home Interior', NULL, 'kids-wall-painting', 'Cartoon-style painted mural for kids.', 2499.00, 'kids-wall.jpg', '2025-06-28 07:08:30', '2025-06-28 07:08:30', 'kids-wall.jpg', 0),
(305, 'Texture Wall Painting', 'Home Interior', NULL, 'texture-wall-painting', 'Rustic, marble, metallic textures.', 1899.00, 'texture-wall.jpg', '2025-06-28 07:08:30', '2025-06-28 07:08:30', 'texture-wall.jpg', 0),
(306, 'False Ceiling Setup', 'Home Interior', NULL, 'false-ceiling-setup', 'POP and gypsum false ceilings with lighting.', 4499.00, 'false-ceiling.jpg', '2025-06-28 07:08:30', '2025-06-28 07:08:30', 'false-ceiling.jpg', 0),
(307, 'Interior Design Consultation', 'Home Interior', NULL, 'interior-design-consultation', 'Meet expert interior designers for full home design.', 999.00, 'design-consult.jpg', '2025-06-28 07:08:30', '2025-06-28 07:08:30', 'design-consult.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('01C3cfcdoMvCeWf5zZkzQguEjQased1Or6nR3k7a', NULL, '2a02:4780:11:c0de::e', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoic3o4TDkyMkN6R1hZU29KMkVyWVhJTzdTNE1BUHlwc09VWjB6SmkzdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751282838),
('1IyXGbmphocsnRUJvKlwYxmVBVZSXelcA3NOj2h4', NULL, '2a03:2880:f800:b::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmlPT1ptbWxaOWJ4bHQxRDg5OFBweTRWVWpsT3BrdFpRSGFPYVJDYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vd3d3LmJva21hcC5jb20vc2VydmljZS1kZXRhaWxzL2Rlc2t0b3AiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751244837),
('5ehi2MtyQ99MVYZA8wFtf0zj14ZM6FS4zPA58Wsu', NULL, '34.169.74.140', '', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiUEdGRnBEMUpWQThDSVFMd0pmQWhjNWd5YlNHSlFzUWxRYWNMVUJmRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751271361),
('7wfQihmPtxx03oAoYS3y2l877ZYULKOLhx3hb7re', NULL, '2a03:2880:f800:9::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDVWOURVVlZXMFFBSzFXQ3hQQVdKa1IyUTFkVHN4N01zUWpHOUhDTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vd3d3LmJva21hcC5jb20vc2VydmljZS1kZXRhaWxzL3RlbGV2aXNpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751246045),
('9anrlnPVIvZs7P8cWUikSb1fiD4DJhS0PM0xoQQP', NULL, '2a03:2880:f800:2::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlZaeVFqSWFsTDNFS2IzOUUxMk5acGthbzNuTllWaTU4Q2k0NFJaQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMvaG9tZS1pbnRlcmlvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751244849),
('9N55u4Z2OHUHMEACCQgwkMWX7F4Y1nc6av0IGkUx', NULL, '74.125.150.134', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.7151.68 Safari/537.36 PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVZNRU1CRHNuUE9TOWx2WWxsZnlHQkthbkJZU0RKYjFtbHczVHlxciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751249301),
('b27cs24rkHMg4y8fNDXVoEDWoiQMjiMo1rnyV4P7', NULL, '2a09:bac1:36c0::1c5:5f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmc2QlJGQ01oQ2x6U2pyUVRmNlE3Y2hXN3FMSlpEd01ZdU1HOW9VciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751275611),
('B6S3JO0orhGpOt9RI0hvVTqj1omfeH8sbOBCx6Uv', NULL, '66.249.68.133', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.7151.103 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajIyd3NKSTNQNmRWYkh1NnV5UHZHelg1QXFFQ1lmMnVZbTVxVTNGViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMvd2FsbC1wcmludGluZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751240585),
('BXwhXHgaRlgA6QWungRmTpYq12yVWUMRSycBTHpI', NULL, '192.36.109.78', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1.2 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzltYWIxN1RmYWlXZzFjdEFnQVpwQUVCMzZLdXZ0aVRHUEhDMlM1RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751279665),
('c4roJbf6Ezj4pZ9XflDiYxfAkDJg2K2y5Jkwl5W6', NULL, '66.249.68.135', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.7151.103 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEV6SWFZMFNtRjN6Mk84alRFZ083VnF1YzBOYmdwMk5tTkMyUXJQcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vYm9rbWFwLmNvbS9jYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751281139),
('d69Yu3jStlHso54WEhVV5fU4o2dczgDVA3wlIStT', NULL, '2a03:2880:f800:5::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0V4dGhHbkViZWxpT1Q3N3lWT3VITGVWaURGeVdoMGtCWkdoeDBOciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vd3d3LmJva21hcC5jb20vc2VydmljZS1kZXRhaWxzL2xhcHRvcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751245077),
('DZj9u4avf9Nh6UkliHWfgX8O7JpyBCPRNWEc4UCV', NULL, '74.125.150.135', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.7151.68 Safari/537.36 PlayStore-Google', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGZZb2d2NnpqdENyUno1VU1DemNxa0RXOGtxNW91enZTVWxDdUx1YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751249506),
('EdLZ8eug8Hz4GrrT2BN6PIPycJv69sHIbaUgcsHP', NULL, '192.133.77.17', 'Twitterbot/1.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnNKbEl3a0tDb0tsNHNzUmx6YTV6Y0hvb2taeXNoSVpzVFBjRHpQQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751271325),
('fVCIMx23hFuWf6aRb9Lyq4irlLp8z848Mqmm1BO7', NULL, '213.180.203.45', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHFYV1BYemFtcFduT2VkWkxVSWJRekxTNlNYUzV0RDBzVW01RGVHMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751264652),
('FZkAKs5dEICm3SGOukxoBEa49zYFpNstxcsZ6zVl', NULL, '2a03:2880:f800:8::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUtZMUpGMUZHY01NR2RSbFJNMG5UUnlRMjg5MXcxTFBYUHJoaHZudCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMvY2hpbW5leSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751245081),
('hFHrM3HnuMolcO56Irt9k2QLcDfCiqL1nqKNUn6B', NULL, '104.131.187.141', 'Mozilla/5.0 (X11; Linux x86_64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDFIUXhkZUZVVEZyZHZPREdxakJrdTd1eUx0WFZaNHkyN29BQjY0SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751256971),
('HPQUU0UlHhXDYadekPwgL8nxh1LIqw2EMxqXj4N3', NULL, '2409:4060:2e32:3f96:25f3:3361:871b:40c4', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDJNTzNKb0VBWGx2Um1ZcFhmZDluVVN6a1VIMTQ1c3VBc2pWUGYySCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751281775),
('IeR6jnn2LDioI0KLZ0PIdBayucPCo3SkIrOp9vzl', NULL, '2409:4060:2e32:3f96:25f3:3361:871b:40c4', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkZzTHNibXZjdWgxYXhVRUJjTjVaYVpOMWhYYXd1bXI4VFY2bHpjWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751265025),
('jkAo3DBQpgO88AkNoYKqe4uzU0JqT9ptKctbDlmx', NULL, '2a02:4780:11:c0de::21', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWThTQ25sVUl2NHFWcEpuUG92RzVLeHl1YkdPMjhCN2Uxcml0a2RRQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751282629),
('jU0kk8aeCD64my43YSoCeLnAasuOxKaTbFbD8V0N', NULL, '115.96.146.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREp0eDBieDQyMElBZ2gwM2t5UzlIMnVMeW9QdmozRFlVcE1uaDROZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMva2lkcy13YWxsLXBhaW50aW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751284241),
('m22Z0mIelKmrN7x1ETaHeWAtrVU1SlmhW3lRG3UN', NULL, '115.96.146.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlFaZ3pZQzhkNDNxeXZhMVBURUhETkdhOU5RaDc3UUo5dVRMdFlWbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751283409),
('M4RauG6wMVsAYpe0avP0h8vjE8gWdUjBtyIl0SrA', NULL, '66.249.68.133', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUxGcEtVeWxuTER0bFlyajljWjduTENlWUx3RERxU1dtQkpkdmdGSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751275223),
('MH6yamcsrXW3b7DlgYCG3XwISDOv9sxu7azz4T01', NULL, '2a03:2880:f800:18::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzhEMTBObnZWMzBBZ0tzY1RFS2k1VXo2ZExJTlRMMGNrRTBwVzdZRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3LmJva21hcC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751247054),
('mQcuzJ5dFMSd9zPB076UrFQmMpjGqdRh3KZfl7Hu', NULL, '2402:3a80:4318:495a:c1f6:b75d:1ce9:1b99', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/28.0 Chrome/130.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDJKekExcDhHV1N2TENORFpMZ2Zoa0pzcEFES0NtUkZvbGpVZDdidiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjM6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMvaW50ZXJpb3ItZGVzaWduLWNvbnN1bHRhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751250468),
('nsdcjZYuOcVFYZInYZcABsVULU6buvHsOgUAyr44', NULL, '66.249.68.133', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXpSQTVZYWxIaEVJY3FJeklXQzBmWThybjFOVm5nV1liWFRBZzJsdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751275892),
('OpE0pqBgvIDBEzGpyTHioHCUJuZSZld2vSLRdws9', NULL, '51.68.111.241', 'Mozilla/5.0 (compatible; MJ12bot/v2.0.2; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEw3amhPN1hrVGZkRWtrb2FJVGlRc0V5VE1obGFrRWpJVGhmQWhEbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3LmJva21hcC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751257408),
('qDf5MNtpjphIyNONG0lOnX6jUaRGnsIuQA3kxGeO', NULL, '2a03:2880:f800:4::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEFKMDdPeTQxcm9lYkQ3T1luWUQ2QnFXVHhSdHhnd2haRnFoUHQxUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vd3d3LmJva21hcC5jb20vc2VydmljZS1kZXRhaWxzL21pY3Jvd2F2ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751245797),
('quSqvh3EvtAK5PDQJlkGB94opLDiy6FoGJ3ZWdFc', NULL, '2a03:2880:f800:10::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXRBakVuV00zSUNtQ21uYXlTdkVVU2c2UGxtM3ZiYklSMlh0UFhPRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMvd2FzaGluZy1tYWNoaW5lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751244792),
('tbdxAKVnjfHL4RdmB8CpFbOprwZHyt1hKPsdXCCv', NULL, '2a03:2880:f800:4::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHNUQ29kakdxS1RJWmZDSUVvMW1DZDJxa2s1Wmd4dXB1SExaZnJRZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMvc3RvdmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751246027),
('tPLaDBBbeiCzY2keeYqrIjsrmf8IFCTZFWYWU6ub', NULL, '66.249.68.135', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.7151.103 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWEwVnp6dktMY3BHS0w4Z0h5eUdJZTNFNjNJSlJkcUcyWjFOWFN2UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHBzOi8vYm9rbWFwLmNvbS9zZXJ2aWNlLWRldGFpbHMvdGV4dHVyZS13YWxsLXBhaW50aW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751271453),
('xxtrY1r1LLQZnTwqex857ISx3yoolyzTPsPzb3Pv', NULL, '51.68.111.213', 'Mozilla/5.0 (compatible; MJ12bot/v2.0.2; http://mj12bot.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWlmZVd3OXlSRzI1VWVOVlE0bmNmZ2h3enRrYjY4SzFkNHFBVmJDbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751281667),
('y3wNE8GjZKK5FfJ5gJi8vTbs8Amz34PeA9PizcfY', NULL, '2409:40e0:103c:71c2:44ac:d9ff:feac:745', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWxndlMyUVpoU0JUYjF1MGx4clgxalFYYVZHcGl6c3hlMkExQjd1OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vYm9rbWFwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751280955),
('z6VlIoYkLPCts4ktnzt276h1NMXDaKeLFDvKuAAE', NULL, '2a03:2880:f800:7::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3lpb2FDaEpsS0FUMkNoaWpBSXp3RFBDVmk0WGtVRTZYdmQwcHpDdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vd3d3LmJva21hcC5jb20vc2VydmljZS1kZXRhaWxzL3dhdGVyLXB1cmlmaWVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751246195);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'R', 'b120053@iiit-bh.ac.in', NULL, NULL, '$2y$12$lvHYUPvSn5HeqxwjfIy2wOTlc76A2aXkIGlELe6iFTcHHVZCZ0vxG', 0, NULL, '2025-06-12 06:15:57', '2025-06-12 06:15:57'),
(3, 'Rounak', 'rounakbhuiya@gmail.com', NULL, NULL, '$2y$12$XuD7EkW9NDsy4UrRBTZfe.2DNMvULR2UqiJ.FyleDxB5DB.UW6iE.', 1, NULL, '2025-06-25 00:41:33', '2025-06-25 00:41:33'),
(4, 'Bhuiya', 'bhuiyarounak@gmail.com', '8910298774', NULL, '$2y$12$TTUvG7o1yj7qWhbV9RBvwu5kBxwYWrOqmj5ul/qB/F7kyBncdWPbO', 0, NULL, '2025-06-26 01:25:11', '2025-06-26 01:25:11'),
(5, 'shivlal', 'azadshiv@gmail', '8910298774', NULL, '$2y$12$qyEZffDpg1NMvw/YlNz/a.RrDhmHwh9oL6wLzZicTBZgQ3w.4iS7.', 0, NULL, '2025-06-26 01:42:13', '2025-06-26 01:42:13'),
(6, 'azad', 'azadshiv1992@gmail.com', '9910298775', NULL, '$2y$12$7yu9dMICKG.LadupdrC4fu1yiDsfVmg.7Jca5H.8gmyS7YML6tfEK', 0, NULL, '2025-06-27 10:00:56', '2025-06-27 10:00:56'),
(7, 'Raju Barik', 'rajugroupinfo@gmail.com', '6291030338', NULL, '$2y$12$o9.oRkoKYgZe0/5F.PJVY.VH/Z3b0dEafRojQA2F8WzE8.qjuGWVW', 0, NULL, '2025-06-27 10:07:29', '2025-06-27 10:07:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professionals_email_unique` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
