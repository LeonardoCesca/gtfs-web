-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 31/10/2019 às 01:20
-- Versão do servidor: 10.4.6-MariaDB
-- Versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabWeb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `agency_id` varchar(255) NOT NULL,
  `route_short_name` varchar(255) NOT NULL,
  `route_long_name` varchar(255) NOT NULL,
  `route_desc` varchar(255) NOT NULL,
  `route_type` varchar(255) NOT NULL,
  `route_url` varchar(255) NOT NULL,
  `route_color` varchar(255) NOT NULL,
  `route_text_color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
