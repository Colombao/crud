-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Abr-2023 às 16:13
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atividade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `datatables`
--

CREATE TABLE `datatables` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `Cpf` varchar(14) NOT NULL,
  `Cep` varchar(9) NOT NULL,
  `Rua` varchar(300) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Bairro` varchar(300) NOT NULL,
  `Login` varchar(32) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  `Telefone` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Nascimento` varchar(300) NOT NULL,
  `complemento` varchar(300) NOT NULL,
  `profile_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `datatables`
--

INSERT INTO `datatables` (`id`, `nome`, `Cpf`, `Cep`, `Rua`, `Numero`, `Bairro`, `Login`, `Senha`, `Telefone`, `email`, `Nascimento`, `complemento`, `profile_id`) VALUES
(43, 'Lurdes', '231.232.132-13', '89252-000', 'Rua Expedicionário Gumercindo da Silva', 2197, 'Tifa Martins', 'Lurdinha', '202cb962ac59075b964b07152d234b70', '(24) 14124-2142', 'Lurdes@gmail.com', '42/14/2141', 'casa', NULL),
(46, 'Lurdes fofa', '123.123.232-32', '89254-000', 'Rua Erwino Menegotti', 2197, 'Chico de Paulo', '3213', '5327b0d1bfa868acb9baac5a9d901815', '(47) 99981-2223', 'sdasdasdas@gmai', '19/04/2000', 'até 478/479', 'Promotor'),
(62, 'Lurdes Ribeiro', '099.999.999-99', '89254-000', 'Rua Erwino Menegotti', 2197, 'Chico de Paulo', '00000000000000', '15f47c8a3e5e9685307dd65a653b8dc0', '(22) 22222-2222', '99999999999@gmail', '12/32/1921', 'até 478/479', 'Gere');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`) VALUES
(129, 'perfil'),
(128, 'Promotor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `datatables`
--
ALTER TABLE `datatables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Cpf` (`Cpf`),
  ADD UNIQUE KEY `Login` (`Login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`),
  ADD UNIQUE KEY `Perfil` (`perfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `datatables`
--
ALTER TABLE `datatables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
