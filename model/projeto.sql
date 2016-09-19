-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2016 at 06:24 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

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
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `numero` int(6) NOT NULL,
  `nUser` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`numero`, `nUser`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `alunodisciplina`
--

CREATE TABLE `alunodisciplina` (
  `numero` int(11) NOT NULL,
  `nAluno` int(6) NOT NULL,
  `nDisciplina` int(8) NOT NULL,
  `notaFinal` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alunodisciplina`
--

INSERT INTO `alunodisciplina` (`numero`, `nAluno`, `nDisciplina`, `notaFinal`) VALUES
(1, 1, 1, 13),
(2, 2, 1, NULL),
(3, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `numero` int(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `valor` int(3) NOT NULL,
  `nDisciplina` int(8) NOT NULL,
  `notaMinima` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avaliacao`
--

INSERT INTO `avaliacao` (`numero`, `nome`, `tipo`, `valor`, `nDisciplina`, `notaMinima`) VALUES
(1, 'teste 1', 'normal', 25, 1, NULL),
(2, 'teste 2', 'normal', 25, 1, NULL),
(3, 'trabalho', 'normal', 50, 1, NULL),
(4, 'teste 1', 'normal', 30, 2, 5),
(5, 'teste 2', 'normal', 30, 2, NULL),
(6, 'trabalho', 'normal', 40, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `numero` int(3) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `totalECTS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`numero`, `nome`, `totalECTS`) VALUES
(1, 'Engenharia Informática', 180);

-- --------------------------------------------------------

--
-- Table structure for table `cursoaluno`
--

CREATE TABLE `cursoaluno` (
  `numero` int(7) NOT NULL,
  `nAluno` int(6) NOT NULL,
  `nCurso` int(3) NOT NULL,
  `media` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `numero` int(8) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nProfessor` int(5) NOT NULL,
  `ECTS` int(11) NOT NULL,
  `nCurso` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`numero`, `nome`, `nProfessor`, `ECTS`, `nCurso`) VALUES
(1, 'Desenvolvimento de Aplicações Web', 1, 6, 1),
(2, 'Tecnologias para a Web e Ambiente Móveis', 1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `numero` int(10) NOT NULL,
  `nAlunoDisciplina` int(11) NOT NULL,
  `nAvaliacao` int(10) NOT NULL,
  `nota` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`numero`, `nAlunoDisciplina`, `nAvaliacao`, `nota`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 10),
(3, 1, 3, 15),
(4, 2, 1, NULL),
(5, 2, 2, NULL),
(6, 2, 3, NULL),
(7, 3, 4, NULL),
(8, 3, 5, NULL),
(9, 3, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `numero` int(5) NOT NULL,
  `nUser` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`numero`, `nUser`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `numero` int(6) NOT NULL,
  `passe` varchar(100) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`numero`, `passe`, `nome`) VALUES
(1, ' ', 'Luis Bruno'),
(2, ' ', 'Pedro Figueiredo'),
(3, ' ', 'Alexandre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `nUser` (`nUser`);

--
-- Indexes for table `alunodisciplina`
--
ALTER TABLE `alunodisciplina`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `nDisciplina` (`nDisciplina`),
  ADD KEY `nAluno` (`nAluno`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `nDisciplina` (`nDisciplina`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `cursoaluno`
--
ALTER TABLE `cursoaluno`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `nAluno` (`nAluno`),
  ADD KEY `nCurso` (`nCurso`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `nProfessor` (`nProfessor`),
  ADD KEY `nCurso` (`nCurso`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `nAlunoDisciplina` (`nAlunoDisciplina`),
  ADD KEY `nAvaliacao` (`nAvaliacao`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `nUser` (`nUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `numero` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `alunodisciplina`
--
ALTER TABLE `alunodisciplina`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `numero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `numero` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cursoaluno`
--
ALTER TABLE `cursoaluno`
  MODIFY `numero` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `numero` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `numero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `numero` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `numero` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`nUser`) REFERENCES `user` (`numero`);

--
-- Constraints for table `alunodisciplina`
--
ALTER TABLE `alunodisciplina`
  ADD CONSTRAINT `alunodisciplina_ibfk_1` FOREIGN KEY (`nDisciplina`) REFERENCES `disciplina` (`numero`),
  ADD CONSTRAINT `alunodisciplina_ibfk_2` FOREIGN KEY (`nAluno`) REFERENCES `aluno` (`numero`);

--
-- Constraints for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`nDisciplina`) REFERENCES `disciplina` (`numero`);

--
-- Constraints for table `cursoaluno`
--
ALTER TABLE `cursoaluno`
  ADD CONSTRAINT `cursoaluno_ibfk_1` FOREIGN KEY (`nAluno`) REFERENCES `aluno` (`numero`),
  ADD CONSTRAINT `cursoaluno_ibfk_2` FOREIGN KEY (`nCurso`) REFERENCES `curso` (`numero`);

--
-- Constraints for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`nProfessor`) REFERENCES `professor` (`numero`),
  ADD CONSTRAINT `disciplina_ibfk_2` FOREIGN KEY (`nCurso`) REFERENCES `curso` (`numero`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`nAlunoDisciplina`) REFERENCES `alunodisciplina` (`numero`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`nAvaliacao`) REFERENCES `avaliacao` (`numero`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`nUser`) REFERENCES `user` (`numero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
