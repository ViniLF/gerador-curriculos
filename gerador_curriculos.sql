-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2024 às 02:48
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerador_curriculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculos`
--

CREATE TABLE `curriculos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `objective` text NOT NULL,
  `education` text NOT NULL,
  `experience` text NOT NULL,
  `skills` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `theme` varchar(50) DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `curriculos`
--

INSERT INTO `curriculos` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `objective`, `education`, `experience`, `skills`, `created_at`, `theme`) VALUES
(6, 1, 'VINICIUS LUCAS FARIA', 'vinihlucas90@gmail.com', '44998805523', 'Rua Atos Marcos Acorsi, 128', 'asdsad', 'asdsad', 'asdsad', 'asdsad', '2024-11-18 01:23:07', 'default'),
(7, 1, 'VINICIUS LUCAS FARIA', 'vinihlucas90@gmail.com', '44998805523', 'Rua Atos Marcos Acorsi, 128', 'asdsad', 'asdsadsadas', 'asdsaddsad', 'asdsadsadasd', '2024-11-18 01:23:17', 'modern'),
(8, 1, 'VINICIUS LUCAS FARIA', 'vinihlucas90@gmail.com', '44998805523', 'Rua Atos Marcos Acorsi, 128', 'asdsadsadasdasd', 'dasdsadsad', 'asdsadsadsadasd', 'asdsadasdasdsa', '2024-11-18 01:23:30', 'minimalist');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Vinicius Lucas Faria', 'vinihlucas90@gmail.com', '$2y$10$oZ69UF8KWzxPfI6C24LbJuDpmmLRaejE4Ys1e4.XdZMrSBG02ooU.', '2024-11-18 00:31:11'),
(2, 'Giovana Denck', 'giovanadenck2016@gmail.com', '$2y$10$KCmDG4iNHVNPwoSwgDOOPOmSZL64lTm1kmlaT8tatTJzK5.PUpCau', '2024-11-18 00:52:39'),
(3, 'Gustavo Faria', 'gustavofaria@gmail.com', '$2y$10$7tnQqPl/z3Al4vnJ5ZHzwuQyI/eHvYLl9/PrMBDqE4OnpjYBXw4my', '2024-11-18 01:34:02'),
(4, 'Solange das Dores Lucas Faria', 'solange@gmail.com', '$2y$10$fM7V1QwHytldw6DTD/dpL.TK.kUH9JGhssfWFzTajGyfNT6KQmWq6', '2024-11-18 01:38:15');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curriculos`
--
ALTER TABLE `curriculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curriculos`
--
ALTER TABLE `curriculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `curriculos`
--
ALTER TABLE `curriculos`
  ADD CONSTRAINT `curriculos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
