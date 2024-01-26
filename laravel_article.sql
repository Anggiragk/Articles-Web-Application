-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 08:59 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_article`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `username`, `email`, `password`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Anggira GK', 'anggira_gk', 'anggira@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2024-01-23 07:28:25', '2024-01-23 07:28:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Music', 'music', NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25'),
(2, 'Movies', 'movies', NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25'),
(3, 'Tech', 'tech', NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25'),
(4, 'Narrative Text', 'narrative_text', NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_01_15_100631_create_posts_table', 1),
(4, '2024_01_15_122321_create_categories_table', 1),
(5, '2024_01_17_043522_create_authors_table', 1),
(6, '2024_01_23_123528_add_is_admin_to_table_authors', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category_id`, `author_id`, `excerpt`, `body`, `image`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'The Ant and The Elephant', 'the_ant_and_the_elephant', 1, 1, 'Once upon a time, there lived a huge elephant in a jungle. He was arrogant and always underestimated animals smaller than him.', '            One day, when the ant family was coming back collecting their food, the elephant sprayed a trunk full of water on them. “You shouldn`t hurt others like this” cried one of the ants. “Shut up you, tiny ant! Keep quiet or I will crush you to death,” said the elephant angrily. The poor ant kept quiet and went on its way. But she decided to teach the proud elephant a lesson.\n            \n            Next day, when the elephant was sleeping, the tiny ant slowly crept into the elephant`s trunk and started biting him. The elephant woke up and tried everything to get the ant out his trunk but could not. Such a big animal but he could not do anything to get the tiny ant out.\n            \n            The elephant started to cry and begged sorry to the ant. “I hope now you understand how others feel when you hurt them” said the ant. “Yes, I do. Yes, I do,” cried the elephant and pleaded the ant to come out. The ant took pity on the elephant and came out of his trunk. From that day onward, the elephant never troubled any animals.', NULL, NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25'),
(2, 'Article 8196', 'article_8196', 1, 1, 'Illum quasi quod quos qui iste hic. Quasi at est eum fugit. Nam ea et ex fuga quia rerum numquam ullam. Voluptatum nam atque cumque iure consequuntur atque nostrum.', 'Voluptate ea quas reiciendis voluptas sunt. Corrupti sit dolorem illum aut perferendis. Voluptatem doloremque dolor laborum ipsum. Eum alias occaecati nemo aut autem numquam et. Ullam corrupti quis nam nobis vitae. Consectetur eaque et repellat voluptate facilis ullam aspernatur. Quam expedita saepe repellendus aliquid. Maxime eos et quidem consequatur eum quo quis. Et dicta deleniti temporibus nemo distinctio deserunt a et. Aliquid voluptatum voluptas consequatur ducimus atque libero.', NULL, NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25'),
(3, 'Article 6559', 'article_6559', 2, 1, 'Vero dignissimos sed fugiat incidunt. Doloremque ut eaque dolorum. Veniam voluptatum ut reprehenderit hic illo dolorem. Est similique debitis velit vel sit molestiae et. Quidem quia asperiores sed neque repudiandae.', 'Et rerum quo minus sint quia. Maiores ipsa magnam beatae quas sed neque asperiores. Perferendis quia dignissimos repellat voluptas non ex itaque. Repudiandae id qui tempora. Modi quia eos fuga. Et asperiores necessitatibus ut sed. Atque officia iste odit illo.', NULL, NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25'),
(4, 'Article 5943', 'article_5943', 1, 1, 'Aliquid corporis ab fugiat sequi. Id aut commodi earum non blanditiis.', 'Quia corporis accusamus cum cum. Rerum aut numquam et porro ipsam esse. Tenetur est alias incidunt iusto totam dolor rerum. Reprehenderit magnam doloremque quam asperiores quae. Animi voluptatem sit nobis itaque commodi et unde. Optio distinctio voluptas deserunt. In cum amet expedita facere esse culpa ex. In rerum et esse sed quia. Voluptas at vero consectetur unde nihil quia. Ipsam adipisci quae quia officiis.', NULL, NULL, '2024-01-23 07:28:25', '2024-01-23 07:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_username_unique` (`username`),
  ADD UNIQUE KEY `authors_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
