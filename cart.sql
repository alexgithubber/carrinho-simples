-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para carrinho
CREATE DATABASE IF NOT EXISTS `carrinho` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `carrinho`;

-- Copiando dados para a tabela carrinho.caracteristicas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `caracteristicas` DISABLE KEYS */;
INSERT INTO `caracteristicas` (`id`, `nome`) VALUES
	(1, 'Peso'),
	(2, 'Cor'),
	(3, 'Aplicação'),
	(4, 'Origem');
/*!40000 ALTER TABLE `caracteristicas` ENABLE KEYS */;

-- Copiando dados para a tabela carrinho.caracteristicas_produtos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `caracteristicas_produtos` DISABLE KEYS */;
INSERT INTO `caracteristicas_produtos` (`idCaracteristica`, `idProduto`, `valor`) VALUES
	(2, 8, 'Preto'),
	(2, 9, 'Preto'),
	(2, 11, 'Preto'),
	(4, 12, 'Nacional'),
	(3, 6, 'Limpezas severas'),
	(2, 6, 'Verde'),
	(3, 5, 'Limpeza'),
	(4, 9, 'Importado'),
	(1, 10, '0,3kg'),
	(3, 7, 'Limpeza de pedras rústicas'),
	(4, 13, 'Nacional'),
	(4, 14, 'Importado');
/*!40000 ALTER TABLE `caracteristicas_produtos` ENABLE KEYS */;

-- Copiando dados para a tabela carrinho.categorias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nome`) VALUES
	(1, 'Produtos de Limpeza'),
	(2, 'Eletrônicos'),
	(7, 'Informática'),
	(8, 'Jogos');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando dados para a tabela carrinho.categorias_produtos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias_produtos` DISABLE KEYS */;
INSERT INTO `categorias_produtos` (`idCategoria`, `idProduto`) VALUES
	(2, 8),
	(2, 12),
	(7, 9),
	(7, 11),
	(7, 10),
	(1, 6),
	(1, 5),
	(1, 7),
	(8, 13),
	(8, 14),
	(2, 10);
/*!40000 ALTER TABLE `categorias_produtos` ENABLE KEYS */;

-- Copiando dados para a tabela carrinho.pedidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Copiando dados para a tabela carrinho.pedidos_produtos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos_produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_produtos` ENABLE KEYS */;

-- Copiando dados para a tabela carrinho.produtos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `imagem`, `preco`) VALUES
	(5, 'Detergel', 'Lorem ipsum bibendum aptent habitasse praesent suscipit blandit est aenean aliquam, leo potenti ad proin malesuada consequat purus mollis urna nec nisl, tellus dictumst ligula elementum a suscipit laoreet bibendum malesuada. ', 'detergel.jpg', 18.9),
	(6, 'Diabo Verde', 'O Diabo Verde líquido é um desincrustante alcalino com alto poder desentupidor, eficaz para ralos e vasos sanitários, evitando a necessidade de contratar especialistas encanadores para casos de entupimento de baixa e média complexidade. Embalagem com 1 litro.', 'green-devil.jpg', 22.5),
	(7, 'Reax - Limpa pedra', 'Lorem ipsum bibendum aptent habitasse praesent suscipit blandit est aenean aliquam, leo potenti ad proin malesuada consequat purus mollis urna nec nisl, tellus dictumst ligula elementum a suscipit laoreet bibendum malesuada. ', 'limpa-pedra.jpg', 26.8),
	(8, 'Microsystem', 'Micro System com gravação: CD / DVD e permite também a gravação de músicas de CD\'s diretamente no PEN DRIVE em formato MP3', 'micro-system.jpg', 450.7),
	(9, 'Notebook', 'Um ótimo notebook cujas configurações são: Processador Intel Core i3 de 6a geração', 'notebook.jpg', 2900),
	(10, 'Roteador Cisco', 'Lorem ipsum bibendum aptent habitasse praesent suscipit blandit est aenean aliquam, leo potenti ad proin malesuada consequat purus mollis urna nec nisl, tellus dictumst ligula elementum a suscipit laoreet bibendum malesuada. ', 'roteador.jpg', 350.9),
	(11, 'Radeon RX', 'Placa de Vídeo AMD Radeon RX550 2GB DDR5 GIGABYTE GV-RX550D5-2GD', 'placa-de-video-amd.jpg', 1455),
	(12, 'TV Ultra HD', 'Lorem ipsum bibendum aptent habitasse praesent suscipit blandit est aenean aliquam, leo potenti ad proin malesuada consequat purus mollis urna nec nisl, tellus dictumst ligula elementum a suscipit laoreet bibendum malesuada. ', 'tv-uhd.jpg', 2876),
	(13, 'BF1', 'Lorem ipsum bibendum aptent habitasse praesent suscipit blandit est aenean aliquam, leo potenti ad proin malesuada consequat purus mollis urna nec nisl, tellus dictumst ligula elementum a suscipit laoreet bibendum malesuada. ', 'BF1.jpg', 185),
	(14, 'Horizon Zero Dawn', 'Horizon Zero Dawn acontece mil anos no futuro em um mundo pós-apocalíptico onde criaturas mecanizadas colossais dominaram o mundo, e vagam em uma paisagem fora do controle da humanidade. O jogador controla Aloy, uma caçadora que utiliza sua velocidade, esperteza e agilidade para permanecer viva e proteger sua tribo contra a força, o tamanho e o poder bruto das máquinas.', 'horizon.jpg', 199);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
