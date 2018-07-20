-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2018 at 09:59 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companies_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jerrold Kassulke', 'Aspernatur aut ut est maiores veritatis eos in. Aut assumenda qui sit quas eius voluptas. Voluptatibus aut debitis aut vitae vero quia autem occaecati. Totam reiciendis in rerum natus dignissimos inventore neque. Dolor voluptatem odit maiores veritatis quasi architecto. Et blanditiis libero sit et.', 10, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(2, 'Annamarie Hudson', 'Totam aut atque quis quia non. Assumenda molestiae cum eligendi voluptas rerum. Doloremque repellat perferendis doloribus repellendus qui sed. Voluptas odio delectus maxime velit saepe nihil.', 7, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(3, 'Jameson Nicolas II', 'Tempore cupiditate accusantium atque sed fugiat aspernatur accusantium. Vel necessitatibus eos temporibus ut officia labore non. Veritatis dicta molestiae mollitia laborum sed quasi.', 2, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(4, 'Prof. Izabella Trantow', 'Omnis rerum doloremque laborum sed impedit omnis. Repudiandae qui quaerat accusamus voluptatum tempore excepturi rem.', 3, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(5, 'Ms. Marisol Dare', 'Soluta exercitationem est ullam rerum voluptatem animi odio. Deserunt harum autem consequatur animi voluptatum non sunt veniam. Reiciendis et sequi autem. Ratione pariatur autem voluptatem alias voluptates.', 5, '2018-07-14 18:07:06', '2018-07-14 18:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_10_213036_create_companies_migration', 1),
(4, '2018_07_10_213852_create_projects_migration', 1),
(5, '2018_07_10_214717_create_tasks_migration', 1),
(6, '2018_07_11_141934_create_comments_migration', 1),
(7, '2018_07_11_144007_create_roles_migration', 1),
(8, '2018_07_11_144109_create_project_user_migration', 1),
(9, '2018_07_11_144154_create_task_user_migration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_company_id_foreign` (`company_id`),
  KEY `projects_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `days`, `user_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'Doug Runolfsson', 'Deserunt eos quia cum recusandae odit ipsam qui. Itaque explicabo voluptatem atque non eos vel quod et. Eaque velit praesentium rerum qui non. Reprehenderit quibusdam quis odio quibusdam eaque. Consequuntur consequatur quaerat eius quia doloribus earum non.', '11', 9, 2, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(2, 'Justine Marquardt', 'Praesentium et odio dolorem aut explicabo magni quae. Doloribus fuga ab sed est pariatur ea est. Doloremque hic qui enim soluta accusamus soluta et.', '28', 6, 2, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(3, 'Lauryn Satterfield', 'Earum eius tenetur veritatis. Sed recusandae nihil ea perferendis est nemo.', '13', 5, 4, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(4, 'Miss Elfrieda Boyer III', 'Consectetur eveniet et sit placeat aperiam. Qui vitae neque quis fugiat corrupti. Omnis et rerum minus.', '17', 10, 3, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(5, 'Rosalinda Raynor', 'Atque illum odit ullam tenetur. Placeat illum possimus soluta. Qui nihil ipsum commodi quod id.', '15', 4, 1, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(6, 'Reese Braun', 'Exercitationem sint quia molestiae. Accusantium in fugiat quis quod. Doloremque et voluptates iste quaerat omnis accusantium fuga voluptates. Rerum exercitationem sequi sapiente inventore ipsum voluptatem deserunt. Deleniti minima fugiat vero molestiae vel suscipit. Quo aliquid quidem dolorem dolores id quam et.', '12', 6, 4, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(7, 'Dr. Keegan Parker MD', 'Magnam ea id nulla nam. Unde ipsum excepturi aut hic est expedita. Ea commodi nam voluptas dolores. Omnis dignissimos quia voluptate amet blanditiis sit. Ut quaerat quae ipsa est quaerat similique.', '28', 2, 3, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(8, 'Zechariah Rath', 'Aut aut ea quasi voluptatem. Vitae quis consequatur omnis adipisci facilis. Sint delectus sed voluptate perspiciatis et autem exercitationem occaecati. Saepe nihil dicta molestiae ea praesentium. Accusantium et eum maxime quibusdam.', '25', 7, 4, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(9, 'Prof. Quentin Kihn', 'Rerum earum consectetur molestias tempore accusantium sit. Facere ut consequatur iusto et rerum est. Sed saepe iste quia voluptas occaecati.', '17', 3, 3, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(10, 'Rosendo Stoltenberg Sr.', 'Dolore et rerum magnam. Omnis eaque eos blanditiis rem commodi. Iure error nisi et est modi.', '26', 7, 5, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(11, 'Blanche Nikolaus', 'Non odit accusantium fugit minima. Vel placeat ad quo dolor ex maiores non dolorum. Illum aut et nulla magnam maiores. Ut ea officia ex debitis. Veritatis molestiae veritatis modi quo voluptatem.', '27', 1, 3, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(12, 'Leola Adams', 'Et eveniet modi fugiat blanditiis hic ut. Suscipit est et quia et. Labore nihil ut at nisi accusantium consequatur. Quod qui molestiae voluptas voluptas.', '21', 6, 2, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(13, 'Prof. Kristopher Eichmann', 'Velit non consequatur numquam ipsa quidem quia. Est ea voluptatem voluptatem assumenda adipisci doloribus. Accusantium tenetur dicta dolores et similique iure et non. Voluptas dolorum qui dolorum qui aut ipsam veniam. Delectus et voluptatem tempora inventore. Hic aut inventore sint autem.', '28', 8, 5, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(14, 'Ericka Homenick V', 'Natus iure omnis dolores quia culpa sequi dolores. Laborum soluta in ad harum voluptas. Vero perferendis quo nostrum et accusantium officia. Fuga corporis alias harum quasi sint. Quam alias rem assumenda velit vitae. Ipsa dolorem saepe blanditiis sint non tempore excepturi.', '11', 4, 2, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(15, 'Rasheed Gleichner I', 'Qui distinctio aut velit quae aut. Ut excepturi sint vel corrupti ab placeat suscipit. Modi omnis quae reiciendis at dolorum.', '23', 8, 2, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(16, 'Rickey Swift', 'Pariatur est ea minus qui aut sit. Occaecati voluptatum voluptatem at eligendi corrupti tempore autem. Accusantium aperiam possimus aliquam. Iusto accusantium tenetur amet ab ut.', '26', 1, 2, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(17, 'Jeremy Kshlerin', 'Aliquam alias consequuntur modi earum maxime magni quos est. Ipsa voluptatem dicta quam laborum nobis. Ipsum atque totam nulla perferendis magnam. Quibusdam ducimus id repellat aut enim ut.', '19', 7, 3, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(18, 'Dr. Ocie Quigley', 'Fugiat voluptas nulla eaque vel animi illo. Ea tempore nobis architecto autem provident eos minus. Voluptas quo error accusamus vel.', '22', 6, 5, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(19, 'Patrick Donnelly I', 'Aspernatur dignissimos et tempora. Ut id beatae iste et. Fugiat blanditiis fuga ad nisi placeat et omnis quia. Natus nobis nam non et quis ex quidem quia. Ullam ut facere nihil molestiae atque.', '26', 4, 4, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(20, 'Dr. Gerhard Brekke I', 'Et corporis dolor placeat. Rerum repellat magnam fugit non accusantium vel. Molestiae cum est autem voluptatem eum quo libero.', '15', 6, 5, '2018-07-14 18:07:06', '2018-07-14 18:07:06'),
(21, 'test 2', 'htytyh', '7', 10, 1, '2018-07-14 19:03:36', '2018-07-14 19:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
CREATE TABLE IF NOT EXISTS `project_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_user_project_id_foreign` (`project_id`),
  KEY `project_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'Brennon Beier'),
(2, '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'Alana Mann'),
(3, '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'Katheryn Barton Jr.');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(10) UNSIGNED DEFAULT NULL,
  `hours` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`),
  KEY `tasks_company_id_foreign` (`company_id`),
  KEY `tasks_project_id_foreign` (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

DROP TABLE IF EXISTS `task_user`;
CREATE TABLE IF NOT EXISTS `task_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_user_task_id_foreign` (`task_id`),
  KEY `task_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `middle_name`, `last_name`, `city`, `role_id`) VALUES
(1, 'Prof. Josie Hilpert II', 'fahey.angie@example.org', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', '6Qrr5sg7ZX42SMfhsgr2WAIhBOVP90IW79DfZ2RklKlaasAIYqpDCwIDaHkN', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'quisquam', 'aliquam', 'blanditiis', 'hic', '2'),
(2, 'Litzy Pollich', 'ubaid@gmail.com', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'AgMCnB3HxV5Ax3l07lVHQ9dyl2i63dYLfcHizwC4eAH7qAV0yiJ8qbExMqFW', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'tempora', 'omnis', 'ullam', 'perferendis', '1'),
(3, 'Ephraim Lowe Jr.', 'whettinger@example.com', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'ydl23pH6Gm', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'omnis', 'sit', 'autem', 'laudantium', '2'),
(4, 'Mr. Garfield Boehm DVM', 'carter.bogisich@example.com', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'wOSA5hxtNX', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'neque', 'exercitationem', 'tempora', 'atque', '3'),
(5, 'Courtney Crooks', 'gmuller@example.net', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'nbumZqNaMd', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'facilis', 'provident', 'in', 'consequatur', '2'),
(6, 'Mr. Landen Hayes', 'monty05@example.com', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'zYN30zJghl', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'voluptatem', 'incidunt', 'quo', 'est', '3'),
(7, 'Helena Hudson', 'maggie12@example.net', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'vS789YLVmn', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'ad', 'sit', 'dolorum', 'quidem', '3'),
(8, 'Nayeli Lindgren', 'orval.klein@example.net', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'GHpyDtdd26', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'rerum', 'facere', 'vero', 'voluptate', '3'),
(9, 'Burnice Mohr Sr.', 'albin03@example.com', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', '65OB5NLbDA', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'occaecati', 'aperiam', 'sed', 'sit', '2'),
(10, 'Dr. Lucienne Hessel IV', 'ccarroll@example.com', '$2y$10$suO18Hwt0Xa122X6H51T4.erzs18StNj1L5DQISodn1v9wLjW5Ah2', 'ghMQXF8MnGhgdHnJNoMbLCkbsdy3cpwYLI7E3kqWCRge7XZD3hOHtUHH2LtM', '2018-07-14 18:07:06', '2018-07-14 18:07:06', 'tenetur', 'sint', 'cumque', 'voluptatem', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
