-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Set-2018 às 23:13
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_gti`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativas`
--

CREATE TABLE `alternativas` (
  `id` int(11) NOT NULL,
  `pergunta_id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `correto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `pergunta_id`, `descricao`, `correto`) VALUES
(1, 1, 'Alternativa 1', 1),
(2, 1, 'Alternativa 2', 0),
(3, 1, 'Alternativa 3', 0),
(4, 1, 'Alternativa 4', 0),
(5, 1, 'Alternativa 5', 0),
(6, 2, 'Alternativa 1', 0),
(7, 2, 'Alternativa 2', 1),
(8, 2, 'Alternativa 3', 0),
(9, 2, 'Alternativa 4', 0),
(10, 2, 'Alternativa 5', 0),
(11, 3, 'Alternativa 1', 0),
(12, 3, 'Alternativa 2', 0),
(13, 3, 'Alternativa 3', 1),
(14, 3, 'Alternativa 4', 0),
(15, 3, 'Alternativa 5', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `liberado` tinyint(1) NOT NULL,
  `finalizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `conectada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipes`
--

INSERT INTO `equipes` (`id`, `nome`, `conectada`) VALUES
(1, 'Blue', 0),
(2, 'Gold', 0),
(3, 'Green', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes_alternativas`
--

CREATE TABLE `equipes_alternativas` (
  `id` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  `alternativa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `enunciado`, `ordem`) VALUES
(1, 'Pergunta 1', 1),
(2, 'Pergunta 2', 2),
(3, 'Pergunta 3', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20180824221639, 'CriarTabelaEquipes', '2018-08-25 01:24:35', '2018-08-25 01:24:35', 0),
(20180824221652, 'CriarTabelaPerguntas', '2018-08-25 01:24:35', '2018-08-25 01:24:35', 0),
(20180824221659, 'CriarTabelaAlternativas', '2018-08-25 01:24:35', '2018-08-25 01:24:37', 0),
(20180824221726, 'CriarTabelaEquipesAlternativas', '2018-08-25 01:24:37', '2018-08-25 01:24:38', 0),
(20180824221750, 'CriarTabelaConfig', '2018-08-25 01:24:38', '2018-08-25 01:24:38', 0),
(20180824224501, 'AlterarTabelaEquipeVerificarEquipeConectada', '2018-08-25 01:45:43', '2018-08-25 01:45:44', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pergunta_id` (`pergunta_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipes_alternativas`
--
ALTER TABLE `equipes_alternativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipe_id` (`equipe_id`),
  ADD KEY `alternativa_id` (`alternativa_id`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipes_alternativas`
--
ALTER TABLE `equipes_alternativas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alternativas`
--
ALTER TABLE `alternativas`
  ADD CONSTRAINT `alternativas_ibfk_1` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`);

--
-- Limitadores para a tabela `equipes_alternativas`
--
ALTER TABLE `equipes_alternativas`
  ADD CONSTRAINT `equipes_alternativas_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`),
  ADD CONSTRAINT `equipes_alternativas_ibfk_2` FOREIGN KEY (`alternativa_id`) REFERENCES `alternativas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
