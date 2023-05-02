-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para escola
DROP DATABASE IF EXISTS `escola`;
CREATE DATABASE IF NOT EXISTS `escola` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `escola`;

-- Copiando estrutura para tabela escola.alunos
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.alunos: ~8 rows (aproximadamente)
INSERT INTO `alunos` (`id`, `nome`) VALUES
	(1, 'Jéssica Daiane Duarte'),
	(2, 'Heitor Sebastião Moreira'),
	(3, 'Marcelo Felipe Emanuel Nunes'),
	(4, 'Mateus Martin Carvalho'),
	(5, 'Antônia Liz Almada'),
	(6, 'Luan Ian Vieira'),
	(7, 'Carlos Caleb Assunção'),
	(8, 'Cauê Raul Thomas Carvalho');

-- Copiando estrutura para tabela escola.disciplinas
DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(5000) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.disciplinas: ~7 rows (aproximadamente)
INSERT INTO `disciplinas` (`id`, `nome`) VALUES
	(1, 'Projeto de Desenvolvimento de Software'),
	(2, 'Trabalho de Conclusão de Curso I'),
	(3, 'Projeto de Desenvolvimento de Software'),
	(4, 'Seg. e Auditoria em Sistemas de Informação'),
	(5, 'Programação para Dispositivos Móveis'),
	(6, 'Empreendedorismo e Gestão de Projetos'),
	(7, 'Interação Humano- Computador II');

-- Copiando estrutura para tabela escola.turmas
DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.turmas: ~15 rows (aproximadamente)
INSERT INTO `turmas` (`id`, `nome`) VALUES
	(1, 'Administração 1º período'),
	(2, 'Administração 3º período'),
	(3, 'Administração 5º período'),
	(4, 'Administração 7º período'),
	(5, 'Agronomia 1º período'),
	(6, 'Agronomia 2º período'),
	(7, 'Agronomia 3º período'),
	(8, 'Agronomia 5º período'),
	(9, 'Agronomia 6º período'),
	(10, 'Agronomia 7º período'),
	(11, 'Agronomia 9º período'),
	(12, 'Sistemas de Informação 1º período'),
	(13, 'Sistemas de Informação 3º período'),
	(14, 'Sistemas de Informação 5º período'),
	(15, 'Sistemas de Informação 7º período');

-- Copiando estrutura para tabela escola.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(5000) DEFAULT NULL,
  `senha` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
	(1, 'Kléber', '8ce4b16b22b58894aa86c421e8759df3');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
