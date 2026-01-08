-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 11:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sspsof5_fidai_unani`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$wH6Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `treatment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_name`, `phone`, `date`, `time`, `treatment_id`) VALUES
(1, 'Abdul Rahman', '9876543210', '2026-01-10', '10:00:00', 2),
(2, 'Sana Khan', '9123456780', '2026-01-12', '11:30:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cancer'),
(2, 'Liver'),
(3, 'Kidney'),
(4, 'Heart'),
(5, 'Gastro'),
(6, 'Piles'),
(7, 'Sexual'),
(8, 'Allergy');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `title`, `description`) VALUES
(1, 'Hakeem Shan-e-Alam', 'Chief Unani Physician & Founder', 'Hakeem Shan-e-Alam is a highly experienced Unani physician dedicated to the treatment of chronic and critical diseases through authentic Unani medicine.');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `caption`) VALUES
(1, 'assets/images/gallery/1.jpeg', 'Clinic Front'),
(2, 'assets/images/gallery/2.jpeg', 'Reception'),
(3, 'assets/images/gallery/3.jpeg', 'Consultation Room'),
(4, 'assets/images/gallery/4.jpeg', 'Waiting Area');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `key` varchar(64) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`key`, `value`) VALUES
('address', 'Ravlee Road, Chungi No-3, Police Chauki ke samne, Muradnagar, Ghaziabad, Uttar Pradesh'),
('email', 'info@fidaiunanishifa.com'),
('emergency_phone', '9568304355'),
('facebook', 'https://facebook.com/fidaiunanishifa'),
('favicon', 'assets/images/favicon/favicon.png'),
('footer_about', 'Our goal is to deliver quality of care in a courteous, respectful, and compassionate manner. We hope you will allow us to care for you and strive to be the first and best choice for your family healthcare.'),
('footer_copyright', '© 2026 Fidai Unani Shifa Khana. All rights reserved.'),
('google_map', 'https://maps.google.com/maps?q=Near%20Jama%20Masjid%2C%20Main%20Road%2C%20Muradnagar%2C%20Ghaziabad%2C%20UP%2C%20India&t=m&z=16&output=embed'),
('instagram', 'https://instagram.com/fidaiunanishifa'),
('logo', 'assets/images/logo/logo.png'),
('meta_description', 'Best Unani natural treatment for chronic and lifestyle diseases in Muradnagar, Ghaziabad, Uttar Pradesh. Book appointment for personalized care.'),
('meta_keywords', 'unani, treatment, muradnagar, ghaziabad, natural, chronic, lifestyle, doctor, clinic'),
('meta_title', 'Fidai Unani Shifa Khana - Unani Natural Treatment in Muradnagar, Ghaziabad, UP'),
('phone', '9634430627, 9568304355'),
('site_name', 'Fidai Unani Shifa Khana'),
('twitter', 'https://twitter.com/fidaiunanishifa'),
('whatsapp', '9634430627');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `full_description` longtext DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `causes` text DEFAULT NULL,
  `procedure` text DEFAULT NULL,
  `medicines` text DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `side_effects` text DEFAULT NULL,
  `precautions` text DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `related_treatments` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `feature_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `title`, `slug`, `short_description`, `full_description`, `symptoms`, `causes`, `procedure`, `medicines`, `duration`, `side_effects`, `precautions`, `doctor_name`, `related_treatments`, `status`, `feature_image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Cancer Treatment', '', 'Unani supportive care for cancer.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Liver Disease Treatment', '', 'Safe Unani treatment for liver diseases.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Kidney Disease Treatment', '', 'Unani care for kidney function improvement.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Heart & Blood Disorders', '', 'Unani solutions for heart and blood pressure.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Gastro & Digestive Diseases', '', 'Natural Unani remedies for digestive issues.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Piles (Bawasir) Treatment', '', 'Unani cure for piles without surgery.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Sexual & Infertility Treatment', '', 'Unani solutions for infertility and sexual health.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Allergy & Asthma', '', 'Unani herbal care for allergies and asthma.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_gallery`
--

CREATE TABLE `treatment_gallery` (
  `id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatment_id` (`treatment_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment_gallery`
--
ALTER TABLE `treatment_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatment_id` (`treatment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `treatment_gallery`
--
ALTER TABLE `treatment_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`);

--
-- Constraints for table `treatment_gallery`
--
ALTER TABLE `treatment_gallery`
  ADD CONSTRAINT `treatment_gallery_ibfk_1` FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
