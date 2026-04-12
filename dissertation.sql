-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2026 at 03:39 AM
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
-- Database: `dissertation`
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'blog',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Dissertation Writing', 'dissertation-writing', 'service', NULL, '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(2, 'Editing', 'editing', 'service', NULL, '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(3, 'Exams', 'online-exams', 'service', NULL, '2026-04-11 07:00:55', '2026-04-11 07:00:55');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'general',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `source_url` varchar(255) DEFAULT NULL,
  `service_reference` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `extra_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extra_data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `type`, `name`, `email`, `phone`, `subject`, `message`, `source_url`, `service_reference`, `status`, `extra_data`, `created_at`, `updated_at`) VALUES
(1, 'cta', 'Minhaj Ur Rehman', 'minhajurrehman32@gmail.com', NULL, NULL, NULL, 'http://127.0.0.1:8000/services/doctoral-dissertation-editing', NULL, 'read', NULL, '2026-04-11 13:48:59', '2026-04-11 19:22:06'),
(2, 'general', 'Minhaj Ur Rehman', 'minhajurrehman32@gmail.com', NULL, NULL, 'test', 'http://127.0.0.1:8000/services/full-dissertation-writing', NULL, 'read', NULL, '2026-04-11 19:21:02', '2026-04-11 19:21:57'),
(3, 'general', 'Minhaj Ur Rehman', 'minhajurrehman32@gmail.com', NULL, NULL, 'exam help', 'http://127.0.0.1:8000/services/online-exam-help', NULL, 'read', NULL, '2026-04-11 20:28:01', '2026-04-11 20:28:10');

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Header Navigation', 'header', '2026-04-11 07:00:55', '2026-04-11 07:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'custom',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `css_class` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `parent_id`, `label`, `link`, `type`, `sort_order`, `css_class`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Home', '/', 'custom', 1, NULL, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(2, 1, NULL, 'About Us', '/p/about-us', 'custom', 2, NULL, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(3, 1, NULL, 'Services', '/services', 'custom', 3, NULL, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(4, 1, NULL, 'Pricing', '/p/pricing', 'custom', 4, NULL, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(5, 1, NULL, 'Blog', '/blog', 'custom', 5, NULL, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(6, 1, NULL, 'Contact Us', '/p/contact-us', 'custom', 6, NULL, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55');

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
(4, '2026_04_11_103118_create_categories_table', 1),
(5, '2026_04_11_103118_create_pages_and_sections_tables', 1),
(6, '2026_04_11_103118_create_services_table', 1),
(7, '2026_04_11_103119_create_blog_tables', 1),
(8, '2026_04_11_103119_create_testimonials_and_faqs_tables', 1),
(9, '2026_04_11_103120_create_inquiries_and_orders_tables', 1),
(10, '2026_04_11_103120_create_settings_and_menus_tables', 1),
(11, '2026_04_11_205433_add_service_id_to_page_sections_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `order_details` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_status` varchar(255) NOT NULL DEFAULT 'unpaid',
  `amount` decimal(10,2) DEFAULT NULL,
  `internal_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL DEFAULT 'default',
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `seo_metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`seo_metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `template`, `is_published`, `seo_metadata`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'default', 1, '{\"title\":null,\"description\":null}', '2026-04-11 07:00:55', '2026-04-11 14:47:51'),
(2, 'About Us', 'about-us', 'default', 1, NULL, '2026-04-11 07:00:55', '2026-04-11 07:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

CREATE TABLE `page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `page_id`, `type`, `content`, `sort_order`, `is_active`, `created_at`, `updated_at`, `service_id`) VALUES
(1, 1, 'hero', '{\"badge\":\"Premium Academic Excellence\",\"title\":\"Elevating Research into Scholarly Excellence\",\"title_accent\":\"You Can Trust\",\"subtitle\":\"Professional dissertation consultancy for the modern academic landscape. We transform your rigorous research into a definitive scholarly contribution.\",\"cta_primary_label\":\"Get Started\",\"cta_primary_link\":\"#\",\"cta_secondary_label\":\"Get Free Quote\",\"cta_secondary_link\":\"#\",\"image_url\":\"https:\\/\\/lh3.googleusercontent.com\\/aida-public\\/AB6AXuAoje5weV3d7jENut3ainxRhkPPeo_d58HGDxtCiiFHgDOXCoKjXdzjodgZ_GmQ6S1jLw_mJJSlY3umwwHD8dwUZdGh6KNrIR3Pg9ruQo-nKUWjdxb1dnGUFwxmd-90cUvEX26TvJ5pZ_dOwZlBx-uLr21Xk3tnIxYi47mGKkCZ0aeNzEoRSu33ALwOs6qrd3OvRRzyIkuwbSLASd2prX3JhUXVQpt4ku5gjOICfHEnCPZS-9ZDbAhmhrroAWGrBUDZ55_UM8cuRKA\",\"advisor_name\":\"Dr. Elena Vance\",\"advisor_role\":\"Lead Research Strategist\",\"advisor_quote\":\"\\\"Our mission is to refine your vision...\\\"\",\"advisor_image\":null}', 0, 1, '2026-04-11 07:00:55', '2026-04-11 15:41:39', NULL),
(2, 1, 'services_bento', '{\"heading\":\"Our Services\",\"items\":[{\"icon\":\"edit_note\",\"title\":\"Dissertation Writing\",\"text\":\"Comprehensive support from topic selection to final conclusion. Our experts help you synthesize complex data into a cohesive narrative that meets the highest academic standards.\",\"link_label\":\"Explore Service\",\"link\":\"\\/services\\/dissertation-writing\",\"button_label\":\"Explore Service\",\"is_dark\":\"1\"},{\"icon\":\"draw\",\"title\":\"Editing & Proofreading\",\"text\":\"Fine-tuning your manuscript for clarity, tone, and impeccable grammar.\",\"link_label\":\"Learn More\",\"link\":\"\\/services\\/editing\",\"button_label\":\"Priority Support\"},{\"icon\":\"biotech\",\"title\":\"Research Proposal\",\"text\":\"Crafting persuasive proposals that secure committee approval and funding.\",\"link_label\":\"Explore Service\",\"link\":\"#\",\"button_label\":\"Priority Support\"},{\"icon\":\"assignment\",\"title\":\"Assignment Help\",\"text\":\"Specialized assistance for complex coursework, case studies, and methodological frameworks. We help you master the material while maintaining academic integrity.\",\"link_label\":\"Explore Service\",\"link\":\"#\",\"button_label\":\"Explore Service\",\"is_dark\":\"1\"}]}', 1, 1, '2026-04-11 07:00:55', '2026-04-11 14:49:17', NULL),
(3, 1, 'why_choose_us', '{\"heading\":\"Professional Academic Excellence\",\"paragraph\":\"Empowering doctoral candidates through rigorous methodological oversight and scholarly integrity.\",\"image_url\":null,\"stat_value\":\"99%\",\"stat_label\":\"Success Rate\"}', 2, 1, '2026-04-11 07:00:55', '2026-04-11 15:24:09', NULL),
(4, 1, 'progress_ledger', '{\"heading\":\"Your Path to Excellence\",\"paragraph\":\"A transparent, four-step journey...\",\"steps\":[{\"number\":\"1\",\"title\":\"Submit Requirements\",\"text\":\"Upload your prompts, guidelines, dissertation brief, and any supporting draft materials for expert review.\"},{\"number\":\"2\",\"title\":\"Get Quote\",\"text\":\"Receive a transparent, all-inclusive quotation tailored to your academic needs and project scope.\"},{\"number\":\"3\",\"title\":\"Work in Progress\",\"text\":\"Collaborate directly with your assigned academic expert as your work is developed with precision and care.\"},{\"number\":\"4\",\"title\":\"Delivery\",\"text\":\"Receive your polished, submission-ready academic document prepared to the highest scholarly standards.\"}]}', 3, 1, '2026-04-11 07:00:55', '2026-04-11 15:37:20', NULL),
(5, 1, 'testimonials', '{\"heading\":\"Scholarly Testimonials\",\"paragraph\":null,\"items\":[{\"name\":\"Helena Vance\",\"role\":\"PhD Candidate, Oxford\",\"text\":\"The level of rigor and attention to detail provided by the advisors was instrumental in my successful defense.\",\"rating\":\"5\"},{\"name\":\"James Thorne\",\"role\":\"Assoc. Professor, LSE\",\"text\":\"A true atelier for academic work. They don\'t just edit; they understand the scholarly conversation.\",\"rating\":\"5\"}]}', 5, 1, '2026-04-11 07:00:55', '2026-04-11 15:29:04', NULL),
(6, 1, 'cta_banner', '{\"heading\":\"Elevate your research to the Atelier Standard.\",\"paragraph\":\"Every masterpiece begins with a conversation. Let\'s discuss your contribution to academia.\",\"cta_primary_label\":\"Consult with an Advisor\",\"cta_primary_link\":\"#\",\"cta_secondary_label\":\"Review Portfolio\",\"cta_secondary_link\":\"#\"}', 6, 1, '2026-04-11 07:00:55', '2026-04-11 15:29:04', NULL),
(7, 2, 'hero_about', '{\"badge\":\"Since 2012\",\"title\":\"Elevating Research into\",\"title_italic\":\"Scholarly Art.\",\"subtitle\":\"We exist to bridge the gap between complex research and accessible clarity.\",\"stat_label\":\"Academic Distinction\",\"stat_text\":\"Consistently helping scholars reach the highest tiers of academic recognition.\"}', 1, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55', NULL),
(8, 2, 'mission_vision', '{\"mission_title\":\"Our Mission\",\"mission_text\":\"To empower scholars with the strategic tools and editorial precision required to leave an indelible mark.\",\"mission_tags\":\"Precision, Authority, Integrity\",\"vision_title\":\"Our Vision\",\"vision_text\":\"To become the world\'s most trusted atelier for academic excellence.\",\"vision_quote\":\"The pursuit of knowledge is a craft; we provide the studio where that craft is perfected.\"}', 2, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55', NULL),
(9, 2, 'team_grid', '{\"heading\":\"Distinguished Faculty\",\"members\":[{\"name\":\"Dr. Marcus Thorne\",\"role\":\"Technical Editor-in-Chief\",\"bio\":\"Ph.D. MIT. Expert in STEM clarity and structural integrity.\"},{\"name\":\"Dr. Helena Vance\",\"role\":\"Senior Research Strategist\",\"bio\":\"Ph.D. Oxford. Specializes in qualitative methodology and societal impact.\"}]}', 3, 1, '2026-04-11 07:00:55', '2026-04-11 07:00:55', NULL),
(12, 1, 'stagger_testimonials', '{\"heading\":\"Scholarly Success Stories\",\"paragraph\":\"Join thousands of doctoral candidates who secured their terminal degree with our support.\"}', 4, 1, '2026-04-11 15:29:04', '2026-04-11 15:29:04', NULL),
(27, NULL, 'hero_side_form', '{\"badge\":\"Elite Academic Consultancy\",\"title\":\"Struggling with Your Dissertation? Get Expert Help That Actually Improves Your Grade.\",\"subtitle\":\"If your dissertation deadline is approaching and you feel stuck or overwhelmed\\u2014you\\u2019re not alone. We provide structured support for students starting from scratch or refining existing drafts to meet supervisor expectations.\",\"image_url\":\"https:\\/\\/images.unsplash.com\\/photo-1524311586216-996417a00fb4?q=80&w=2670\",\"form_title\":\"Request Dissertation Support\",\"form_subtitle\":\"Receive topic refinement and a clear research roadmap.\",\"form_button\":\"Get Free Consultation\",\"cta_label\":\"Review Our Academic Standards\",\"cta_link\":\"#commitment\"}', 0, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:51', 2),
(28, NULL, 'why_choose_us', '{\"heading\":\"Trusted Support That Delivers Results\",\"paragraph\":\"We support candidates across PhD, Postgraduate, and Undergraduate levels with work aligned to UK university expectations.\",\"image_url\":\"https:\\/\\/images.unsplash.com\\/photo-1517842645767-c6370d6778e0?q=80&w=2670\",\"stat_value\":\"99%\",\"stat_label\":\"Student Approval Rate\",\"highlights\":[{\"icon\":\"edit_note\",\"title\":\"Structured Academic Writing\",\"text\":\"Clear, professionally structured work that meets rigid academic standards.\"},{\"icon\":\"library_books\",\"title\":\"Strong Research\",\"text\":\"Utilising credible scholarly sources and authoritative academic literature.\"},{\"icon\":\"history_edu\",\"title\":\"Accurate Referencing\",\"text\":\"Perfectly formatted citations: Harvard, APA, MLA, OSCOLA.\"},{\"icon\":\"school\",\"title\":\"Tailored Aligned Guidelines\",\"text\":\"Work strictly aligned with your specific university handbook and rubric.\"}]}', 1, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:57', 2),
(29, NULL, 'cta_banner', '{\"heading\":\"Get a Free Dissertation Plan in Minutes\",\"paragraph\":\"Share your brief to receive research direction, a clear chapter outline, and personalised level-based guidance.\",\"cta_primary_label\":\"Request My Free Plan\",\"cta_secondary_label\":\"Speak to an Advisor\"}', 2, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:57', 2),
(30, NULL, 'progress_ledger', '{\"heading\":\"A Multi-Stage Curated Process\",\"paragraph\":\"Transparent, rigorous development for your terminal contribution.\",\"steps\":[{\"number\":\"01\",\"title\":\"Share Your Requirements\",\"text\":\"Submit your topic, deadline, and university guidelines for faculty review.\"},{\"number\":\"02\",\"title\":\"Receive a Structured Plan\",\"text\":\"Get a clear approach with a definitive timeline and academic research direction.\"},{\"number\":\"03\",\"title\":\"Work With an Expert\",\"text\":\"Your work is developed step-by-step with senior advisor updates and revisions.\"}]}', 3, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:51', 2),
(31, NULL, 'feature_grid', '{\"heading\":\"Complete Academic Support Architecture\",\"paragraph\":\"Bespoke services tailored to individual project requirements.\",\"items\":[{\"icon\":\"history_edu\",\"title\":\"Full Dissertation Writing\",\"text\":\"From proposal to submission, covering literature reviews, methodology, and authoritative analysis.\"},{\"icon\":\"edit_document\",\"title\":\"Assignment & Coursework\",\"text\":\"Carefully structured essays, reports, and case studies aligned with your marking criteria.\"},{\"icon\":\"spellcheck\",\"title\":\"Editing & Proofreading\",\"text\":\"Refining clarity, academic tone, structure, and referencing for submission readiness.\"},{\"icon\":\"published_with_changes\",\"title\":\"Resubmission Support\",\"text\":\"Restructuring and improving rejected or low-graded work to meet strict expectations.\",\"is_secondary\":\"1\"}]}', 4, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:51', 2),
(32, NULL, 'why_choose_us', '{\"heading\":\"The Atelier Standard Commitment\",\"paragraph\":\"Foundational principles of scholarly integrity and student success.\",\"image_url\":\"https:\\/\\/images.unsplash.com\\/photo-1521791136064-7986c2959210?q=80&w=2670\",\"stat_value\":\"100%\",\"stat_label\":\"Originality\",\"highlights\":[{\"icon\":\"verified\",\"title\":\"100% Original Content\",\"text\":\"Custom-written work crafted from scratch for your specific project.\"},{\"icon\":\"lock\",\"title\":\"Confidential & Secure\",\"text\":\"Strict data protocols ensuring total candidate anonymity and safety.\"},{\"icon\":\"chat_bubble\",\"title\":\"Clear Communication\",\"text\":\"Transparent updates and senior advisor contact throughout your venture.\"},{\"icon\":\"flag\",\"title\":\"UK Academic Standards\",\"text\":\"Work strictly aligned with the highest standards of British Higher Education.\"}]}', 5, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:51', 2),
(33, NULL, 'stagger_testimonials', '{\"heading\":\"Scholarly Success Stories\",\"paragraph\":\"Experiences from doctoral and postgraduate candidates.\",\"items\":[{\"name\":\"Sarah M.\",\"role\":\"PhD Candidate, Social Sciences\",\"quote\":\"\\u201cI was struggling with my dissertation structure and feedback. The guidance I received helped me organise my work properly and improve my final grade.\\u201d\",\"image\":\"https:\\/\\/i.pravatar.cc\\/150?img=1\"},{\"name\":\"James T.\",\"role\":\"Master of Law (LLM)\",\"quote\":\"\\u201cVery helpful and responsive team. My assignment was well-structured, properly referenced, and delivered on time.\\u201d\",\"image\":\"https:\\/\\/i.pravatar.cc\\/150?img=2\"}]}', 6, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:51', 2),
(34, NULL, 'faq_accordion', '{\"heading\":\"Inquiries & Clarifications\",\"items\":[{\"question\":\"Is the work original?\",\"answer\":\"Yes, every masterpiece is a 100% custom-written scholarly contribution, crafted from scratch and checked for total originality.\"},{\"question\":\"Can you help improve my existing dissertation?\",\"answer\":\"Absolutely. We specialise in refining existing drafts, improving methodology, and ensuring editorial polish.\"},{\"question\":\"Do you follow UK university guidelines?\",\"answer\":\"Yes, all our advisors are experts in UK Higher Education and will align your work strictly with your institution\'s specific rubric.\"}]}', 7, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:51', 2),
(35, NULL, 'cta', '{\"title\":\"Speak to an Expert Today\",\"text\":\"Get started now to receive urgent help or quick guidance for your terminal project.\",\"button_text\":\"Initiate Consultation\",\"button_link\":\"#hero\"}', 8, 1, '2026-04-11 17:04:10', '2026-04-11 20:26:51', 2),
(36, NULL, 'hero_side_form', '{\"badge\":\"Scholarly Identity\",\"title\":\"Expert Online Exam Help for UK Students\",\"subtitle\":\"We commonly receive enquiries from students enquiring if paying someone to take an online exam for them is legal. The answer is no. Many UK students seek our online exam assistance to free up time for other courses and activities. Our specialists assure anonymity and provide excellent online exam aid to students from various UK colleges.\",\"image_url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/images\\/academic-excellence.png\",\"form_title\":\"Reserve Your Consultant\",\"form_subtitle\":\"Personalized support for bespoke research.\",\"form_button\":\"Initiate Consultation\",\"cta_label\":\"Review Our Academic Standards\",\"cta_link\":\"#commitment\"}', 0, 1, '2026-04-11 20:27:19', '2026-04-11 20:27:19', 3);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `seo_metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`seo_metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category_id`, `user_id`, `excerpt`, `content`, `featured_image`, `is_published`, `published_at`, `seo_metadata`, `created_at`, `updated_at`) VALUES
(1, 'Developing a Thesis Framework in the Modern Age', 'thesis-framework-modern-age', 3, 1, 'How the modern scholar navigates the convergence of classical research methodologies and emergent AI tools.', 'Full research paper content goes here...', NULL, 1, NULL, NULL, '2026-04-11 07:00:55', '2026-04-11 07:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
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
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `seo_metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`seo_metadata`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `category_id`, `short_description`, `description`, `features`, `image`, `banner_image`, `is_featured`, `is_published`, `sort_order`, `seo_metadata`, `created_at`, `updated_at`) VALUES
(1, 'Doctoral Dissertation Editing', 'doctoral-dissertation-editing', 2, 'Comprehensive editorial support for advanced research.', 'Our advisors provide substantive, developmental, and copy-editing tailored to PhD standards.', '[\"Methodology Audit\",\"Citation Verification\",\"Logical Flow Refinement\"]', NULL, NULL, 1, 1, 0, '{\"title\":null,\"description\":null}', '2026-04-11 07:00:55', '2026-04-11 13:53:59'),
(2, 'Full Dissertation', 'full-dissertation-writing', 1, 'Comprehensive academic support for PhD, PG, and UG dissertation projects.', 'Guided support for dissertation literature reviews, methodology, and final analysis.', '[]', NULL, NULL, 1, 1, 1, '{\"title\":\"Full Dissertation Help | Expert Academic Writing Support\",\"description\":\"Get expert help with your dissertation. Aligned with UK university guidelines, credible research, and accurate referencing.\"}', '2026-04-11 15:59:06', '2026-04-11 20:26:51'),
(3, 'Online Exam Help', 'online-exam-help', 3, 'We commonly receive enquiries from students enquiring if paying someone to take an online exam for them is legal.', 'We commonly receive enquiries from students enquiring if paying someone to take an online exam for them is legal. The answer is no. Many UK students seek our online exam assistance to free up time for other courses and activities. Our specialists assure anonymity and provide excellent online exam aid to students from various UK colleges.', '[]', NULL, NULL, 0, 1, 0, '{\"title\":\"testtt\",\"description\":\"testestest\"}', '2026-04-11 20:04:44', '2026-04-11 20:27:19');

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
('08liLLceS9p5NpJSewQGhzHt2GBqAuc56rSDtQLg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiakNsRkZqaFY2cnA4MkliQ0ZERFlkWXFNT2gwQUEwakhDRTF2V3dHWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXJ2aWNlcy9mdWxsLWRpc3NlcnRhdGlvbi13cml0aW5nIjtzOjU6InJvdXRlIjtzOjEzOiJzZXJ2aWNlcy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1775957939);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Online Dissertation Advisors', 'general', '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(2, 'contact_email', 'info@onlinedissertationadvisors.co.uk', 'contact', '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(3, 'contact_phone', '+44 123 456 7890', 'contact', '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(4, 'address', 'London, United Kingdom', 'contact', '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(5, 'default_seo_title', 'Expert Dissertation Writing & Editorial Services', 'seo', '2026-04-11 07:00:55', '2026-04-11 07:00:55'),
(6, 'default_seo_description', 'Professional academic support for doctoral students.', 'seo', '2026-04-11 07:00:55', '2026-04-11 07:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `quote` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Admin', 'admin@onlinedissertationadvisors.co.uk', NULL, '$2y$12$UKtwY/NIwTpGsjzbGTj8/O09kLFf/cT.nEei9dtBLS7Yj5Yi7T/bq', NULL, '2026-04-11 07:00:55', '2026-04-11 07:00:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
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
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_location_unique` (`location`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_items_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_service_id_foreign` (`service_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_sections_page_id_foreign` (`page_id`),
  ADD KEY `page_sections_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD CONSTRAINT `page_sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_sections_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
