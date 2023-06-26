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
  `id_turma` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_aluno` (`id_turma`),
  CONSTRAINT `turma_aluno` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.alunos: ~9 rows (aproximadamente)
INSERT INTO `alunos` (`id`, `nome`, `id_turma`) VALUES
	(23, 'Antônia Liz Almada', NULL),
	(27, 'kleber', 1),
	(28, 'pedro', 1),
	(29, 'joao', 1),
	(30, 'jose', 1),
	(31, 'Jose', NULL),
	(32, 'Francinildo', 10),
	(33, '5', NULL);

-- Copiando estrutura para tabela escola.disciplinas
DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(5000) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.disciplinas: ~12 rows (aproximadamente)
INSERT INTO `disciplinas` (`id`, `nome`) VALUES
	(1, 'Projeto de Desenvolvimento de Software'),
	(2, 'Trabalho de Conclusão de Curso I'),
	(3, 'Projeto de Desenvolvimento de Software'),
	(4, 'Seg. e Auditoria em Sistemas de Informação'),
	(5, 'Programação para Dispositivos Móveis'),
	(6, 'Empreendedorismo e Gestão de Projetos'),
	(7, 'Interação Humano- Computador II'),
	(8, 'Portuhues'),
	(12, 'yy'),
	(13, 't'),
	(14, 'd'),
	(15, '');

-- Copiando estrutura para tabela escola.turmas
DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.turmas: ~13 rows (aproximadamente)
INSERT INTO `turmas` (`id`, `nome`) VALUES
	(1, 'Administração 1º período'),
	(2, 'Administração 3º período'),
	(4, 'Administração 7º período'),
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

-- Copiando estrutura para tabela escola.turmas_disciplinas
DROP TABLE IF EXISTS `turmas_disciplinas`;
CREATE TABLE IF NOT EXISTS `turmas_disciplinas` (
  `id_turma` int(11) DEFAULT NULL,
  `id_disciplina` int(11) DEFAULT NULL,
  KEY `FK__turmas` (`id_turma`),
  KEY `FK__disciplinas` (`id_disciplina`),
  CONSTRAINT `FK__disciplinas` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__turmas` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.turmas_disciplinas: ~16 rows (aproximadamente)
INSERT INTO `turmas_disciplinas` (`id_turma`, `id_disciplina`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(2, 1),
	(2, 3),
	(1, 7),
	(6, 4),
	(6, 6),
	(6, 12),
	(6, 8),
	(9, 8),
	(9, 7),
	(7, 14),
	(12, 8),
	(12, 2),
	(10, 2),
	(10, 5);

-- Copiando estrutura para tabela escola.t_notas
DROP TABLE IF EXISTS `t_notas`;
CREATE TABLE IF NOT EXISTS `t_notas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_aluno` int(11) DEFAULT NULL,
  `fk_disciplina` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.t_notas: ~5 rows (aproximadamente)
INSERT INTO `t_notas` (`id`, `fk_aluno`, `fk_disciplina`, `valor`) VALUES
	(1, 27, 1, 9),
	(2, 27, 3, 8),
	(3, 28, 2, 10),
	(4, 27, 2, 8),
	(10, 27, 2, 10);

-- Copiando estrutura para tabela escola.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(5000) DEFAULT NULL,
  `senha` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela escola.usuarios: ~0 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
	(1, 'Kléber', '8ce4b16b22b58894aa86c421e8759df3');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
