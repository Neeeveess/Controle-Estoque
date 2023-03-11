-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Set-2022 às 23:39
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.6
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

create schema controlestoque;
use controlestoque;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `CodRefProd` int NOT NULL,
  `NomeProd` varchar(75) NOT NULL,
  `valorProd` float NOT NULL,
  `qtdeProd` int NOT NULL,
  `Usuario_idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pedido`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `CodRefProd` int NOT NULL,
  `NomeProd` varchar(75) NOT NULL,
  `valorProd` float NOT NULL,
  `qtdeProd` int NOT NULL,
  `validadeProd` date NOT NULL,
  `Usuario_idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `produto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacaotroca`
--

CREATE TABLE `solicitacaotroca` (
  `CodRefProd` int NOT NULL,
  `NomeProd` varchar(75) NOT NULL,
  `valorProd` float NOT NULL,
  `qtdeProd` int NOT NULL,
  `validadeProd` date NOT NULL,
  `Usuario_idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `solicitacaotroca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int NOT NULL,
  `Username` varchar(75) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Password` varchar(75) NOT NULL,
  `Dataregistro` date NOT NULL,
  `Permissao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `Username`, `Email`, `Password`, `Dataregistro`, `Permissao`) VALUES
(1, 'jose', 'jose@gmail.com', '4c0e32cde3da4792073dcb118e17b0ca', '2022-09-03', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`CodRefProd`),
  ADD KEY `fk_Produto_Usuario_idx` (`Usuario_idUser`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`CodRefProd`),
  ADD KEY `fk_Produto_Usuario_idx` (`Usuario_idUser`);

--
-- Índices para tabela `solicitacaotroca`
--
ALTER TABLE `solicitacaotroca`
  ADD PRIMARY KEY (`CodRefProd`),
  ADD KEY `fk_Produto_Usuario_idx` (`Usuario_idUser`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `CodRefProd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `CodRefProd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `solicitacaotroca`
--
ALTER TABLE `solicitacaotroca`
  MODIFY `CodRefProd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Produto_Usuario1` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_Produto_Usuario` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`);

--
-- Limitadores para a tabela `solicitacaotroca`
--
ALTER TABLE `solicitacaotroca`
  ADD CONSTRAINT `fk_Produto_Usuario0` FOREIGN KEY (`Usuario_idUser`) REFERENCES `usuario` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
