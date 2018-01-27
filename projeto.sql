-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Set-2017 às 18:08
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacoes_palvras`
--

CREATE TABLE `marcacoes_palvras` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `palavra_id` int(11) NOT NULL,
  `acao` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcacoes_palvras`
--

INSERT INTO `marcacoes_palvras` (`id`, `user_id`, `palavra_id`, `acao`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '2017-09-04 00:00:00', '2017-09-04 00:00:00'),
(12, 2, 1, 1, '2017-09-06 16:03:24', '2017-09-06 16:55:54'),
(13, 2, 8, 1, '2017-09-06 16:28:14', '2017-09-06 16:28:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_25_233602_create_social_accounts_table', 1),
(4, '2017_09_01_151931_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavras`
--

CREATE TABLE `palavras` (
  `id` int(11) NOT NULL,
  `palavra_pt` varchar(255) NOT NULL,
  `traducao_en` varchar(255) NOT NULL,
  `significado_pt` text NOT NULL,
  `significado_en` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `palavras`
--

INSERT INTO `palavras` (`id`, `palavra_pt`, `traducao_en`, `significado_pt`, `significado_en`, `created_at`, `updated_at`) VALUES
(1, 'amor', 'love', 'eu amo você', 'i love you', '2017-09-02 14:53:41', '2017-09-02 14:53:41'),
(2, 'amor', 'love', 'sad', 'dsad', '2017-09-02 15:02:00', '2017-09-02 15:02:00'),
(3, 'fsdf', 'fsdf', 'fdfsd', 'fsdf', '2017-09-04 18:36:36', '2017-09-04 18:36:36'),
(4, 'sadasdas', 'love', 'dsadasdas', 'dsadsadasd', '2017-09-05 16:48:43', '2017-09-05 16:48:43'),
(5, 'sadasdas', 'love', 'dsadasdas', 'dsadsadasd', '2017-09-05 16:59:41', '2017-09-05 16:59:41'),
(6, 'sadasdas', 'love', 'dsadasdas', 'dsadsadasd', '2017-09-05 17:00:25', '2017-09-05 17:00:25'),
(7, 'amor', 'amor', 'Sentimento afetivo em relação a; afeição viva por alguém ou por alguma coisa; afeto: o amor a Deus, ao próximo.\r\nPessoa amada: coragem, meu amor!\r\nSentimento apaixonado por outra pessoa: sinto amor por ela.\r\nInclinação ditada pelas leis da natureza: amor materno, filial.\r\nGosto vivo por alguma coisa: amor pelas artes.\r\nSentimento de adoração em relação a algo específico (real ou abstrato); esse ideal de adoração: amor à pátria; seu amor é o futebol.\r\nExcesso de zelo e dedicação: trabalhar com amor.\r\n[Mitologia] Designação do Cupido, deus romano do amor.\r\n[Religião] Sentimento de devoção direcionado a alguém ou ente abstrato; devoção, adoração: amor aos preceitos da Igreja.', 'Sentimento afetivo em relação a; afeição viva por alguém ou por alguma coisa; afeto: o amor a Deus, ao próximo.\r\nPessoa amada: coragem, meu amor!\r\nSentimento apaixonado por outra pessoa: sinto amor por ela.\r\nInclinação ditada pelas leis da natureza: amor materno, filial.\r\nGosto vivo por alguma coisa: amor pelas artes.\r\nSentimento de adoração em relação a algo específico (real ou abstrato); esse ideal de adoração: amor à pátria; seu amor é o futebol.\r\nExcesso de zelo e dedicação: trabalhar com amor.\r\n[Mitologia] Designação do Cupido, deus romano do amor.\r\n[Religião] Sentimento de devoção direcionado a alguém ou ente abstrato; devoção, adoração: amor aos preceitos da Igreja.', '2017-09-06 13:43:34', '2017-09-06 13:43:34'),
(8, 'amorerere', 'amor', 'Sentimento afetivo em relação a; afeição viva por alguém ou por alguma coisa; afeto: o amor a Deus, ao próximo.\r\nPessoa amada: coragem, meu amor!\r\nSentimento apaixonado por outra pessoa: sinto amor por ela.\r\nInclinação ditada pelas leis da natureza: amor materno, filial.\r\nGosto vivo por alguma coisa: amor pelas artes.\r\nSentimento de adoração em relação a algo específico (real ou abstrato); esse ideal de adoração: amor à pátria; seu amor é o futebol.\r\nExcesso de zelo e dedicação: trabalhar com amor.\r\n[Mitologia] Designação do Cupido, deus romano do amor.\r\n[Religião] Sentimento de devoção direcionado a alguém ou ente abstrato; devoção, adoração: amor aos preceitos da Igreja.', 'Sentimento afetivo em relação a; afeição viva por alguém ou por alguma coisa; afeto: o amor a Deus, ao próximo.\r\nPessoa amada: coragem, meu amor!\r\nSentimento apaixonado por outra pessoa: sinto amor por ela.\r\nInclinação ditada pelas leis da natureza: amor materno, filial.\r\nGosto vivo por alguma coisa: amor pelas artes.\r\nSentimento de adoração em relação a algo específico (real ou abstrato); esse ideal de adoração: amor à pátria; seu amor é o futebol.\r\nExcesso de zelo e dedicação: trabalhar com amor.\r\n[Mitologia] Designação do Cupido, deus romano do amor.\r\n[Religião] Sentimento de devoção direcionado a alguém ou ente abstrato; devoção, adoração: amor aos preceitos da Igreja.', '2017-09-06 14:30:47', '2017-09-06 14:30:47'),
(10, 'salada10', 'salada', 'salada', 'salada', '2017-09-07 13:36:13', '2017-09-07 13:55:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fernandofranco157@gmail.com', '$2y$10$ZUkX6Ze3ga9t9OMYZSEe8uT3Dyd08IWzbS6RgxejTRrnlph60/bQm', '2017-09-07 16:00:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(2, 4, '111149858416590171894', 'google', '2017-09-07 16:30:10', '2017-09-07 16:30:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestao_palavras`
--

CREATE TABLE `sugestao_palavras` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `palavra_pt` varchar(255) NOT NULL,
  `traducao_en` varchar(255) NOT NULL,
  `significado_pt` text NOT NULL,
  `significado_en` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sugestao_palavras`
--

INSERT INTO `sugestao_palavras` (`id`, `user_id`, `palavra_pt`, `traducao_en`, `significado_pt`, `significado_en`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, '11', '11', '11', '11', 1, '2017-09-28 00:00:00', '2017-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'projeto.web.email@gmail.com', '$2y$10$mZCI6Kf2evR8QCO6VaCQtuR7U3dcG6WKSel14BcgesxEkIjwaDeP6', '6WZ7nsrWG0SD5FE02Vqo4P0u6jNKSjwMBaBnK3JCgRSuU5lSz11XLCsurFOn', NULL, NULL),
(5, 'dsa', 'dasd', 'dsadsa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `marcacoes_palvras`
--
ALTER TABLE `marcacoes_palvras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marcacoes_palvras_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `palavras`
--
ALTER TABLE `palavras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `social_accounts` ADD FULLTEXT KEY `provider_user_id` (`provider_user_id`);

--
-- Indexes for table `sugestao_palavras`
--
ALTER TABLE `sugestao_palavras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sugestao_palavras_user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marcacoes_palvras`
--
ALTER TABLE `marcacoes_palvras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `palavras`
--
ALTER TABLE `palavras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sugestao_palavras`
--
ALTER TABLE `sugestao_palavras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
