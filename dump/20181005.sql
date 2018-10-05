-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 05/10/2018 às 22:41
-- Versão do servidor: 5.7.23
-- Versão do PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tickets`
--
CREATE DATABASE IF NOT EXISTS `tickets` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `tickets`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `descricao` text COLLATE utf8_bin,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Fazendo dump de dados para tabela `tickets`
--

INSERT INTO `tickets` (`id`, `titulo`, `descricao`, `status`) VALUES
(1, 'Criar novo usuario	', NULL, 0),
(2, 'Analisar fatura	', NULL, 0),
(3, 'Criar novo usuario de acesso	', NULL, 0),
(4, 'Teste de sistema', NULL, 1),
(5, 'Mudança de plano', NULL, 1),
(6, 'Nova assinatura', NULL, 0),
(7, 'MaÃƒÂ§ÃƒÂ£', NULL, 0),
(8, 'Mudar ambiente', NULL, 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
