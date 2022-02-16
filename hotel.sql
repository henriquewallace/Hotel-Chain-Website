-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Fev-2022 às 02:24
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hotel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `standard` enum('s','p') NOT NULL,
  `opened` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `city`, `description`, `standard`, `opened`) VALUES
(37, 'LA RÉSERVE PARIS HOTEL AND SP', 'Paris - FRA', 'Swimming pools, SPA, restaurant.', '', 'y'),
(38, 'SUMMER LODGE COUNTRY HOUS', 'Evershot - ENG', 'SPA, indoor pools, whiskey bar.', '', 'y'),
(39, 'FASAN0', 'São Paulo - BRA', 'Restaurant, indoor pool, free parking.', 's', 'y'),
(40, ' ARCHIP', 'Mykonos - GRE', 'All inclusive, free parking, swimming pools.', '', 'n'),
(41, 'test', 'Belo Horizonte', 'ds', 's', 'y'),
(62, 'teste', 'teste', 'teste', 's', 'y'),
(71, 'erersd', 'sdsef', 'sdsd', 's', 'y'),
(72, 'teste2', 'teste2', 'teste2', 's', 'y'),
(76, 'teste3', 'teste3', 'teste3', 's', 'y'),
(80, 'teste', 'teste2', 'ds', 's', 'y'),
(84, 'tes', 'teste', 'ui', 'p', 'y');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`city`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
