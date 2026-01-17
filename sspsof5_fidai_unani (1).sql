-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2026 at 12:29 PM
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
(1, 'admin', '$2y$10$1MYh6zgTs/UsDusfCeDnxOxZq9e/zsjfZUTDwPl6Ftbomm1NCvxnq');

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

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(2, 'Liver', 'cat_696b2f857dbeb4.84442324.jpg'),
(3, 'Kidney', 'cat_696b2f7a505605.78478482.jpg'),
(4, 'Heart', 'cat_696b2f72e99d10.90321474.jpg'),
(5, 'Gastro', 'cat_696b2f6b042c93.43368821.jpg'),
(6, 'Piles', 'cat_696b2f63a4b081.90073162.jpg'),
(7, 'Sexual', 'cat_696b2f5c71cb53.52495601.jpg'),
(8, 'Allergy', 'cat_696b2c451b8fb6.93364075.jpg'),
(10, 'cancer', 'cat_696b2b9e15c7b9.11997880.jpg');

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
(8, 'assets/images/gallery/696b3620436ae_1768633888.png', ''),
(9, 'assets/images/gallery/696b3637cb650_1768633911.jpeg', ''),
(10, 'assets/images/gallery/696b3637d6d64_1768633911.jpeg', ''),
(11, 'assets/images/gallery/696b3637e4606_1768633911.jpeg', ''),
(12, 'assets/images/gallery/696b3637ee1cd_1768633911.jpeg', ''),
(13, 'assets/images/gallery/696b36633494c_1768633955.jpeg', ''),
(14, 'assets/images/gallery/696b36633c75e_1768633955.jpeg', ''),
(15, 'assets/images/gallery/696b36634dbdc_1768633955.jpeg', ''),
(16, 'assets/images/gallery/696b3663588f7_1768633955.jpeg', ''),
(17, 'assets/images/gallery/696b36854a4db_1768633989.jpeg', ''),
(18, 'assets/images/gallery/696b368562351_1768633989.jpeg', ''),
(19, 'assets/images/gallery/696b368567c3c_1768633989.jpeg', '');

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
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `setting_group` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_key`, `setting_value`, `setting_group`, `updated_at`) VALUES
(1, 'site_name', 'Fidai Unani Shifa Khana ', 'site_info', '2026-01-16 07:07:39'),
(2, 'site_tagline', 'Your Trusted Travel Partner in India', 'site_info', '2026-01-16 07:00:49'),
(3, 'site_email', 'info@fidaiunanishifakhana.com', 'site_info', '2026-01-16 07:07:40'),
(4, 'site_phone', '+91-9876543210', 'site_info', '2026-01-16 07:00:50'),
(5, 'site_address', 'Delhi, India', 'site_info', '2026-01-16 07:00:50'),
(6, 'meta_title', 'Fidai Unani Shifa Khana - Private Tours & Car Rentals', 'meta', '2026-01-16 07:00:50'),
(7, 'meta_description', 'Experience India with professional drivers and private tours. Book Golden Triangle, Rajasthan, Himachal tours.', 'meta', '2026-01-16 07:00:50'),
(8, 'meta_keywords', 'india tours, car rental, private driver, golden triangle, rajasthan tour', 'meta', '2026-01-16 07:00:50'),
(9, 'facebook_url', 'https://facebook.com/', 'social', '2026-01-16 07:00:50'),
(10, 'instagram_url', 'https://instagram.com/', 'social', '2026-01-16 07:00:50'),
(11, 'twitter_url', 'https://twitter.com/', 'social', '2026-01-16 07:00:50'),
(12, 'youtube_url', 'https://youtube.com/', 'social', '2026-01-16 07:00:50'),
(13, 'contact_email', 'contact@fidaiunanishifakhana.com', 'contact', '2026-01-16 07:07:40'),
(14, 'support_email', 'support@fidaiunanishifakhana.com', 'contact', '2026-01-16 07:07:40'),
(15, 'whatsapp_number', '+91-9876543210', 'contact', '2026-01-16 07:00:50'),
(16, 'office_hours', 'Mon-Sat: 9:00 AM - 6:00 PM', 'contact', '2026-01-16 07:00:50');

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
  `updated_at` datetime DEFAULT NULL,
  `features` text DEFAULT NULL,
  `care_plans` text DEFAULT NULL,
  `core_values` text DEFAULT NULL,
  `health_tips` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `title`, `slug`, `short_description`, `full_description`, `symptoms`, `causes`, `procedure`, `medicines`, `duration`, `side_effects`, `precautions`, `doctor_name`, `related_treatments`, `status`, `feature_image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `features`, `care_plans`, `core_values`, `health_tips`) VALUES
(10, 'Cancer Treatment', 'cancer-treatment', 'Unani supportive care for cancer focuses on improving immunity, reducing treatment-related side effects, and enhancing overall quality of life through natural and holistic therapies.', 'Unani medicine plays a supportive role in cancer care by helping the body cope better with the physical and emotional challenges of the disease. Herbal formulations and lifestyle guidance help manage fatigue, digestive issues, weakness, and stress, especially during chemotherapy and radiotherapy. This approach complements conventional treatment while promoting internal balance and well-being.', '', '', '', '', '', '', '', '', '', 'active', '696b37fe44287_1768634366.jpeg', '', '', '', '2026-01-09 08:46:04', '2026-01-17 12:49:26', 'Herbal immunity boosters\r\nReduction in chemotherapy side effects\r\nImproved strength and stamina\r\nHolistic and natural care\r\nFocus on quality of life', 'Lung Cancer\r\nLiver Cancer\r\nGall Bladder Cancer', 'Personalized care\r\nNatural healing methods\r\nHolistic approach\r\nEthical and safe practices', '[{\"question\":\"Can liver diseases be treated naturally?\",\"answer\":\"Unani medicine helps improve liver function and supports natural detoxification.\"},{\"question\":\"How long does Unani treatment take for liver issues?\",\"answer\":\"Treatment duration depends on the severity and patient lifestyle.\"}]'),
(11, 'Liver Disease Treatment', 'liver-disease-treatment', 'Unani treatment for liver diseases helps detoxify the liver, improve digestion, and restore normal liver function using herbal medicines.', 'The liver plays a vital role in digestion and detoxification. Unani medicine addresses liver disorders by correcting internal imbalances and strengthening liver function. Natural herbs help in conditions like fatty liver, hepatitis, and liver weakness, supporting long-term liver health.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2026-01-09 08:46:04', NULL, 'Liver detoxification\nImproved digestion\nHerbal formulations\nHolistic healing', 'Fatty Liver\nHepatitis\nLiver Weakness', '', '[{\"question\":\"\",\"answer\":\"A balanced diet and timely treatment help maintain liver health naturally.\"}]'),
(12, 'Kidney Disease Treatment', 'kidney-disease-treatment', 'Unani medicine supports kidney health by improving filtration, reducing inflammation, and maintaining fluid balance naturally.', 'Unani treatment for kidney diseases focuses on strengthening kidney function and reducing stress on the urinary system. Herbal remedies help manage swelling, fatigue, and urinary issues while supporting overall kidney health.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2026-01-09 08:46:04', NULL, 'Supports kidney function\nReduces inflammation\nNatural diuretics\nPersonalized care', 'Chronic Kidney Disease\nKidney Weakness\nUrinary Disorders', '', '[{\"question\":\"Can Unani treatment cure kidney disease?\",\"answer\":\"Unani medicine helps slow progression and improve kidney function in early stages.\"},{\"question\":\"Is dialysis avoidable with Unani treatment?\",\"answer\":\"In early or mild cases, Unani care may help delay complications.\"}]'),
(13, 'Heart & Blood Disorders Treatment', 'heart-blood-disorders-treatment', 'Unani medicine helps maintain heart health and proper blood circulation through natural therapies and lifestyle balance.', 'Heart and blood disorders are often linked to lifestyle and dietary habits. Unani treatment strengthens the heart, improves circulation, and supports healthy blood levels using herbal medicines and holistic principles.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2026-01-09 08:46:04', NULL, 'Improves blood circulation\nSupports heart strength\nHelps manage blood pressure\nNatural and holistic care', 'Hypertension\nCholesterol Imbalance\nGeneral Heart Weakness', '', ''),
(14, 'Gastro Diseases Treatment', 'gastro-diseases-treatment', 'Unani treatment helps improve digestion, relieve stomach issues, and restore gut balance naturally.', 'Digestive health is central to overall well-being. Unani medicine treats digestive disorders by strengthening digestion, improving metabolism, and correcting internal imbalance through herbal remedies.', '', '', '', '', '', '', '', '', '', 'active', '', '', '', '', '2026-01-09 08:46:04', '2026-01-17 12:47:51', 'Improves digestion\r\nRelieves acidity and gas\r\nStrengthens metabolism\r\nNatural herbal care', 'Acidity\r\nIndigestion\r\nIBS\r\nConstipation', '', '[{\"question\":\"\",\"answer\":\"\"}]'),
(15, 'Piles (Bawasir) Treatment', 'piles-bawasir-treatment', 'Unani medicine provides natural relief from piles by reducing pain, swelling, and bleeding.', 'Unani treatment for piles focuses on improving digestion, softening stools, and reducing inflammation. Herbal medicines help manage symptoms without surgical intervention in many cases.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2026-01-09 08:46:04', NULL, 'Reduces pain and swelling\nControls bleeding\nImproves bowel movement\nNon-surgical approach', 'Internal Piles\nExternal Piles\nChronic Constipation', '', '');

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
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
