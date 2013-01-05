-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 04/01/2013 às 14h41min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `senha`) VALUES
(1, 'root', 'root'),
(2, 'admin', 'admin'),
(3, 'diogosilva', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(200) DEFAULT NULL,
  `destaque` varchar(20) DEFAULT NULL,
  `exibir` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome_categoria`, `destaque`, `exibir`) VALUES
(10, 'Nintendo Wii', 'sim', 'sim'),
(11, 'Xbox 360', 'sim', 'sim'),
(12, 'Playstation 3', 'sim', 'sim'),
(13, 'Nintendo Ds', 'sim', 'sim'),
(14, 'PSP', 'sim', 'sim'),
(15, 'Nintendo 3DS', 'sim', 'sim'),
(16, 'Playstation 2', 'sim', 'sim'),
(17, 'GameCube', 'sim', 'sim'),
(18, 'Xbox', 'sim', 'sim'),
(19, 'PC Games', 'sim', 'sim'),
(20, 'Playstation', 'nao', 'sim'),
(21, 'Nintendo Wii U', 'nao', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja_banner`
--

CREATE TABLE IF NOT EXISTS `loja_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loja_banner` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja_dados`
--

CREATE TABLE IF NOT EXISTS `loja_dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loja_email` varchar(60) DEFAULT NULL,
  `loja_telefone` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `loja_dados`
--

INSERT INTO `loja_dados` (`id`, `loja_email`, `loja_telefone`) VALUES
(2, 'contato@teste.com.br', '21 2006-0100');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja_logo`
--

CREATE TABLE IF NOT EXISTS `loja_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loja_logo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `loja_logo`
--

INSERT INTO `loja_logo` (`id`, `loja_logo`) VALUES
(2, '../produto_img/191212-logo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja_nome`
--

CREATE TABLE IF NOT EXISTS `loja_nome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loja_nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `loja_nome`
--

INSERT INTO `loja_nome` (`id`, `loja_nome`) VALUES
(2, 'Loja Krush Web');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagseguroprodutos`
--

CREATE TABLE IF NOT EXISTS `pagseguroprodutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VendedorEmail` varchar(255) DEFAULT NULL,
  `TransacaoID` varchar(32) DEFAULT NULL,
  `Ordem` mediumint(5) unsigned DEFAULT NULL,
  `ProdID` varchar(100) DEFAULT NULL,
  `ProdDescricao` varchar(100) DEFAULT NULL,
  `ProdValor` decimal(10,2) DEFAULT NULL,
  `ProdQuantidade` mediumint(5) unsigned DEFAULT NULL,
  `ProdFrete` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `VendedorEmail` (`VendedorEmail`,`TransacaoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagsegurotransacoes`
--

CREATE TABLE IF NOT EXISTS `pagsegurotransacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VendedorEmail` varchar(255) DEFAULT NULL,
  `TransacaoID` varchar(32) DEFAULT NULL,
  `Referencia` varchar(255) DEFAULT NULL,
  `Extras` decimal(10,2) DEFAULT NULL,
  `TipoFrete` char(2) DEFAULT NULL,
  `ValorFrete` decimal(10,2) DEFAULT NULL,
  `Anotacao` varchar(250) DEFAULT NULL,
  `DataTransacao` datetime DEFAULT NULL,
  `TipoPagamento` varchar(30) DEFAULT NULL,
  `StatusTransacao` varchar(30) DEFAULT NULL,
  `CliNome` varchar(100) DEFAULT NULL,
  `CliEmail` varchar(255) DEFAULT NULL,
  `CliEndereco` varchar(200) DEFAULT NULL,
  `CliNumero` varchar(10) DEFAULT NULL,
  `CliComplemento` varchar(100) DEFAULT NULL,
  `CliBairro` varchar(100) DEFAULT NULL,
  `CliCidade` varchar(100) DEFAULT NULL,
  `CliEstado` char(2) DEFAULT NULL,
  `CliCEP` varchar(10) DEFAULT NULL,
  `CliTelefone` varchar(16) DEFAULT NULL,
  `NumItens` mediumint(5) unsigned DEFAULT NULL,
  `Data` datetime DEFAULT NULL,
  `Status` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `VendedorTransacao` (`VendedorEmail`,`TransacaoID`),
  KEY `StatusTransacao` (`StatusTransacao`),
  KEY `Status` (`Status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) DEFAULT NULL,
  `preco` double(10,2) DEFAULT NULL,
  `altura` varchar(60) DEFAULT NULL,
  `comprimento` varchar(60) DEFAULT NULL,
  `largura` varchar(60) DEFAULT NULL,
  `descricao` varchar(5800) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `exibir` varchar(10) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_sub_categoria` int(11) DEFAULT NULL,
  `disponivel` varchar(20) DEFAULT NULL,
  `destaque` varchar(50) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_sub_categoria` (`id_sub_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `altura`, `comprimento`, `largura`, `descricao`, `data_cadastro`, `exibir`, `id_categoria`, `id_sub_categoria`, `disponivel`, `destaque`, `estoque`) VALUES
(35, 'Pro Evolution Soccer 2013 - Xbox 360', 129.90, '25', '5', '20', '<div class="ProductDescriptionContainer">\r\n<p>Pro Evolution Soccer 2013 &eacute; mais uma edi&ccedil;&atilde;o da popular franquia de jogos de futebol da Konami. O t&iacute;tulo retorna com algumas novidades em rela&ccedil;&atilde;o ao seu predecessor, especialmente no que diz respeito &agrave; movimenta&ccedil;&atilde;o dos jogadores e comportamento em campo.</p>\r\n<p>As melhorias na intelig&ecirc;ncia artificial deixam o jogo mais realista e oferecem uma din&acirc;mica de jogo mais fluida do que nas &uacute;ltimas edi&ccedil;&otilde;es. Dessa vez o sistema defensivo foi retrabalhado para acomodar eventuais modifica&ccedil;&otilde;es t&aacute;ticas, oferecendo maior controle estrat&eacute;gico da equipe para o jogador.</p>\r\n<p>A tradicional Master League tamb&eacute;m est&aacute; de volta, bem como as licen&ccedil;as oficias da Liga dos Campe&otilde;es da UEFA, da Liga Europa da UEFA e da Copa Libertadores da Am&eacute;rica.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div id="ProductDescription" class="Block Moveable Panel ProductDescription">\r\n<div class="ProductDescriptionContainer">\r\n<div class="text_prod_detalhe_prod"><strong>Observa&ccedil;&atilde;o:</strong>&nbsp;Uma pequena porcentagem de indiv&iacute;duos pode ter problemas epil&eacute;ticos quando expostos a certos padr&otilde;es de luz, ou luzes que piscam. A exposi&ccedil;&atilde;o a certos padr&otilde;es ou imagens em uma televis&atilde;o pode induzir estas pessoas a estes ataques epil&eacute;ticos. Estas pessoas podem apresentar sintomas epil&eacute;ticos mesmo que nunca tenham tido problemas anteriores. Se voc&ecirc;, ou qualquer um em sua fam&iacute;lia tiver problemas epil&eacute;ticos, consulte um m&eacute;dico antes de jogar. Se voc&ecirc; sentir qualquer um destes sintomas enquanto joga - tontura, vis&atilde;o alterada, movimentos involunt&aacute;rios do olho, perda de consci&ecirc;ncia, desorienta&ccedil;&atilde;o, qualquer movimento involunt&aacute;rio ou convuls&otilde;es - imediatamente pare de jogar e consulte um m&eacute;dico antes de retornar ao uso.</div>\r\n<div>&nbsp;</div>\r\n<div>Aten&ccedil;&atilde;o: A imagem do produto real pode deferir da apresentada.</div>\r\n</div>\r\n</div>', '0000-00-00', 'sim', 11, 23, 'sim', 'sim', 10),
(36, 'Avatar The Game - Xbox 360', 89.90, '25', '5', '20', '<p>O videogame ir&aacute; coloc&aacute;-lo em Pandora, um planeta que est&aacute; al&eacute;m da imagina&ccedil;&atilde;o. L&aacute; moram os Na&acute;vi, uma ra&ccedil;a alien&iacute;gena formada por human&oacute;ides gigantes que l&aacute; vivem pacificamente at&eacute; a chegada de terr&aacute;queos da corpora&ccedil;&atilde;o RDA &agrave; procura de uma fonte valiosa de recursos. Lute por uma causa: voc&ecirc; pode escolher de que lado da guerra deseja lutar. Voc&ecirc; pode jogar tanto como Na&acute;vi ou como humano, e h&aacute; v&aacute;rios pontos no game em que voc&ecirc; pode mudar de lado, caso esteja descontente com a sua ra&ccedil;a escolhida.<br /><br />-Plataforma Xbox 360<br />-Classifica&ccedil;&atilde;o 12 anos<br /><br />Caracter&iacute;sticas gerais<br />- Participar de um enorme conflito de dois mundos.<br />- Luta pela RDA ou militares.<br />- Use as habilidades diferentes, e cerca de 20 para cada lado do conflito.<br />- Fight com o uso de ve&iacute;culos ou a cavalo em animais.<br />- 60 RDA e armas de guerra.<br />- Tome parte em batalhas multiplayer.<br />- Crie seu pr&oacute;prio personagem e descobrir novas habilidades em The Game.<br />- G&ecirc;nero A&ccedil;&atilde;o e Aventura<br />- Permite jogar em rede</p>', '0000-00-00', 'sim', 11, 23, 'sim', 'sim', 10),
(37, 'Bioshock - Xbox 360', 89.90, '25', '5', '20', '<p><span>O game mistura tiro em primeira pessoa, a&ccedil;&atilde;o e explora&ccedil;&atilde;o, com elementos de horror de sobreviv&ecirc;ncia . Ele &eacute; ambientado em um mundo futurista, abaixo da superf&iacute;cie, onde o jogador enfrentar&aacute; inimigos geneticamente modificados em um bio-laborat&oacute;rio.</span></p>\r\n<p><span>Sua Intelig&ecirc;ncia Artificial possui alto n&iacute;vel de complexidade, implantes gen&eacute;ticos para fazer upgrades no personagem, armas como op&ccedil;&atilde;o de upgrade e o bio-scanner, um dispositivo usado para descobrir os pontos fracos dos inimigos.</span></p>', '0000-00-00', 'sim', 11, 23, 'sim', 'sim', 10),
(38, 'Gran Turismo 5 - Playstation 3', 159.90, '25', '5', '20', '<p><span>Gran Turismo &eacute; a experi&ecirc;ncia de corrida mais completa e realista de todos os tempos. Uma cole&ccedil;&atilde;o de carros sem precedentes, com quase todos os estilos de corridas inimagin&aacute;veis, al&eacute;m de completos recursos online e de comunidade por meio do PlayStation Network, tudo com os gr&aacute;ficos superiores que s&atilde;o marca registrada do GT. XL EDITION inclui a atualiza&ccedil;&atilde;o 2.0 com caracter&iacute;sticas melhoradas de jogo, bem como Cupom de Conte&uacute;do para download de novos carros, pistas e mais.</span><br /><br /><span>Sinta toda a emo&ccedil;&atilde;o de pilotar os melhores carros do mundo, nas mais diversas e desafiadoras pistas e estilos de corrida. Se para voc&ecirc; isso &eacute; pouco, mostre o seu talento configurando os carros e criando novos tra&ccedil;ados.</span></p>', '0000-00-00', 'sim', 12, 26, 'sim', 'sim', 10),
(39, 'Console Oficial Playstation 3 Slim 160GB', 899.90, '50', '30', '80', '<div class="chosenProds infoP"><strong>Console Oficial PlayStation 3 Slim 250 GB - Sony</strong></div>\r\n<div class="infoProd">\r\n<p>&nbsp;</p>\r\n<p align="Justify">Com a remodela&ccedil;&atilde;o do PlayStation 3, este console oferece um HD de 250GB, que permite um maior armazenamento de fotos, v&iacute;deos, jogos e m&uacute;sicas. Seu design diferenciado com a capa de disco deslizante e tamanho compacto &eacute; aproximadamente 20% menor e 25% mais leve do que a vers&atilde;o atual de 160GB, o que torna perfeito para acomod&aacute;-lo em qualquer ambiente.&nbsp;<br /><br /><strong>Imagens Meramente Ilustrativas</strong><br /><br />Todas As Informa&ccedil;&otilde;es S&atilde;o De Responsabilidade Do Fabricante/Fornecedor<br /><br /><strong>Verifique com os fabricantes do produto e de seus componentes, eventuais limita&ccedil;&otilde;es &agrave; utiliza&ccedil;&atilde;o de todos os recursos e funcionalidades.</strong></p>\r\n</div>', '0000-00-00', 'sim', 12, 27, 'sim', 'sim', 10),
(40, 'Xbox 360 Slim 4GB Kinect Ready', 899.90, '50', '30', '80', '<div class="chosenProds infoP">Console Oficial Xbox 4GB + Controle sem fio - Microsoft</div>\r\n<div class="infoProd">\r\n<p>&nbsp;</p>\r\n<p align="justify">O&nbsp;<strong>Console Microsoft Xbox360</strong>&nbsp;conta com disco r&iacute;gido de&nbsp;<strong>4GB</strong>&nbsp;de espa&ccedil;o para armazenar e transportar dados como fases dos jogos, m&uacute;sicas, v&iacute;deos, entre muitos outros. Acompanha um&nbsp;<strong>controle wireless</strong>com alcance de 9 metros e possui capacidade para at&eacute; quatro controles.<br /><br />Seu drive pode ser usado como DVD player, possui tr&ecirc;s&nbsp;<strong>entradas USB</strong>&nbsp;para conex&atilde;o de c&acirc;mera digital, MP3 e outros. O console&nbsp;<strong>Xbox360 Slim</strong>&nbsp;j&aacute; vem preparado para voc&ecirc; ter a melhor experi&ecirc;ncia de alt&iacute;ssima resolu&ccedil;&atilde;o em som e imagem em uma &uacute;nica conex&atilde;o entre o Xbox360 e a sua TV.<br /><br />Jogue os melhores jogos e assista aos melhores filmes com uma resolu&ccedil;&atilde;o digital de at&eacute;&nbsp;<strong>1080 linhas progressivas</strong>. Conta tamb&eacute;m com um design menor, mais leve e silencioso.<br /><br />Pronto para o&nbsp;<strong>Kinect</strong><br />o Xbox360 Slim possui um porta USB especial para o Kinect (n&atilde;o necessita ligar na tomada). Chame a fam&iacute;lia e os amigos e confira todas as vantagens dessa fascinante e potente maquina!<br /><br /><br />Imagens meramente ilustrativas<br /><br />Todas informa&ccedil;&otilde;es s&atilde;o de responsabilidade do fabricante/fornecedor<br /><br />Verifique com os fabricantes do produto e de seus componentes eventuais limita&ccedil;&otilde;es &agrave; utiliza&ccedil;&atilde;o de todos os recursos e funcionalidades.</p>\r\n</div>', '0000-00-00', 'sim', 11, 25, 'sim', 'sim', 10),
(41, 'Microsoft Controle Xbox 360 Branco Wireless', 99.00, '25', '3', '20', '<p><span>Jogar sem fios e com alto desempenho &eacute; uma realidade! Utilizando tecnologia otimizada, o Controle sem Fio Xbox 360 permite que voc&ecirc; tire proveito de confort&aacute;veis 9 metros de dist&acirc;ncia e at&eacute; 40 horas de utiliza&ccedil;&atilde;o com duas pilhas AA. E quando elas se esgotarem, ser&aacute; emitido um aviso, para que voc&ecirc; possa ligar um carregador e continuar jogando.</span></p>', '0000-00-00', 'sim', 11, 23, 'sim', 'sim', 10),
(42, 'Controle Ps3 Dual Shock 3 Wireless - Original', 99.00, '15', '7', '25', '<p>Controle Ps3 Dual Shock 3 Wireless - Original</p>', '0000-00-00', 'sim', 12, 28, 'sim', 'sim', 10),
(43, 'HD Microsoft Xbox 360 250GB', 119.90, '25', '15', '20', '<p>HD Microsoft Xbox 360 250GB</p>', '0000-00-00', 'sim', 11, 24, 'sim', 'sim', 10),
(44, 'Super Street Fighter 4 - Xbox 360', 99.00, '25', '5', '20', '<p>Super Street Fighter 4</p>', '0000-00-00', 'sim', 11, 23, 'sim', 'sim', 10),
(45, 'Fifa Soccer 13 - PC Games', 69.90, '25', '5', '20', '<p>Fifa Soccer 13 - PC GAMES</p>', '0000-00-00', 'sim', 19, 34, 'sim', 'sim', 10),
(46, 'Geforce 9800 Gtx 512MB SuperClocked', 350.00, '10', '30', '40', '<p>Geforce 9800 Gtx 512MB SuperClocked</p>', '0000-00-00', 'sim', 19, 36, 'sim', 'sim', 10),
(47, 'Pro Evolution Soccer 2013 - PC Games', 99.90, '25', '5', '20', '<p>Pro Evolution Soccer 2013 - PC Games</p>', '0000-00-00', 'sim', 19, 34, 'sim', 'sim', 10),
(48, 'Resistance 2 - Playstation 3', 119.90, '25', '5', '20', '<p>Resistance 2 - Playstation 3</p>', '0000-00-00', 'sim', 12, 26, 'sim', 'sim', 10),
(49, 'Grand Theat Auto 4 - Xbox 360', 89.90, '25', '5', '20', '<p>Grand Theat Auto 4 - Xbox 360</p>', '0000-00-00', 'sim', 11, 23, 'sim', 'sim', 20),
(50, 'Blattefield Bad Company 2 - Playstation 3', 149.90, '25', '5', '20', '<p>Blattefield Bad Company 2 - Playstation 3</p>', '0000-00-00', 'sim', 12, 26, 'sim', 'sim', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_img`
--

CREATE TABLE IF NOT EXISTS `produto_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_img` varchar(200) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `produto_img`
--

INSERT INTO `produto_img` (`id`, `produto_img`, `id_produto`) VALUES
(30, '../produto_img/191212-jogo-game-xbox360-pes-2013-pro-evolution-soccer-2013-xbox360_MLB-F-3362398754_112012.jpg', 35),
(31, '../produto_img/191212-1321965261_1.jpg', 36),
(32, '../produto_img/191212-Bioshock.jpg', 37),
(33, '../produto_img/191212-16574-1349695401-game-gran-turismo-5-sony-playstation-3-1.jpg', 38),
(34, '../produto_img/191212-ps3-caixa.jpg', 39),
(35, '../produto_img/191212-xbox_slim_1__97899_zoom (1).jpg', 40),
(36, '../produto_img/191212-256.jpg', 41),
(37, '../produto_img/191212-Controle-Ps3-Dual-Shock-3-Sixaxis-Wireless-Original__48156.jpg', 42),
(38, '../produto_img/191212-hd_slim250gb__91201_zoom.jpg', 43),
(39, '../produto_img/191212-super-street-fighter-iv-jogo-para-xbox-360-novo_MLB-F-195402963_6349.jpg', 44),
(40, '../produto_img/201212-c1624cc9e3440f67ace40ebbd065d0ca.jpg', 45),
(41, '../produto_img/201212-placa-de-video-nvidia-geforce-9800-gtx-512-mb-superclocked_MLB-O-231048483_4009.jpg', 46),
(42, '../produto_img/201212-jogo-game-xbox360-pes-2013-pro-evolution-soccer-2013-xbox360_MLB-F-3362398754_112012.jpg', 47),
(43, '../produto_img/201212-jogo-ps3-game-resistance-2-com-portugus-playstation-3_MLB-O-2897776024_072012.jpg', 48),
(44, '../produto_img/201212-jaquette-gta4-xbox-360[1].jpg', 49),
(45, '../produto_img/201212-Battlefield_Bad_Company_2_cover.jpg', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_mais_acessado`
--

CREATE TABLE IF NOT EXISTS `produto_mais_acessado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_cont` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `produto_mais_acessado`
--

INSERT INTO `produto_mais_acessado` (`id`, `produto_cont`, `id_produto`) VALUES
(1, 23, 49),
(2, 4, 46),
(3, 10, 40),
(4, 2, 38),
(5, 10, 44),
(6, 8, 41),
(7, 15, 48),
(8, 3, 42),
(9, 9, 45),
(10, 3, 43),
(11, 7, 50),
(12, 5, 39),
(13, 2, 35),
(14, 1, 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categoria`
--

CREATE TABLE IF NOT EXISTS `sub_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sub_categoria` varchar(200) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `exibir` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `sub_categoria`
--

INSERT INTO `sub_categoria` (`id`, `nome_sub_categoria`, `id_categoria`, `exibir`) VALUES
(23, 'Games', 11, 'sim'),
(24, 'Acessórios', 11, 'sim'),
(25, 'Consoles', 11, 'sim'),
(26, 'Games', 12, 'sim'),
(27, 'Console', 12, 'sim'),
(28, 'Acessórios', 12, 'sim'),
(29, 'Games', 10, 'sim'),
(30, 'Acessórios', 10, 'sim'),
(31, 'Console', 10, 'sim'),
(32, 'Console', 20, 'sim'),
(33, 'Games', 20, 'sim'),
(34, 'Games', 19, 'sim'),
(35, 'Acessórios', 19, 'sim'),
(36, 'Hardware', 19, 'sim'),
(37, 'Games', 13, 'sim'),
(38, 'Console', 13, 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `nome_completo` varchar(100) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(80) DEFAULT NULL,
  `pais` varchar(70) DEFAULT NULL,
  `info_referencia` varchar(300) DEFAULT NULL,
  `identifica_endereco` varchar(200) DEFAULT NULL,
  `cep` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `data_nascimento` varchar(30) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome_usuario`, `nome_completo`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `pais`, `info_referencia`, `identifica_endereco`, `cep`, `telefone`, `celular`, `email`, `senha`, `cpf`, `sexo`, `data_nascimento`, `data_cadastro`) VALUES
(3, 'Diogo Silva', 'Diogo Antonio da Silva', 'Rua Nova de Azevedo', '684', 'Casa 2', 'Neves', 'São Gonçalo', 'RJ', 'Brasil', 'Próximo ao colégio estadual santos dias.', 'Casa', '24425445', '(21) 2720-1965', '(21) 7666-5027', 'dantonio_silva@yahoo.com.br', '123456', '131.502.687-29', 'Masculino', '26/04/1988', '2013-01-02');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_sub_categoria`) REFERENCES `sub_categoria` (`id`);

--
-- Restrições para a tabela `produto_img`
--
ALTER TABLE `produto_img`
  ADD CONSTRAINT `produto_img_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Restrições para a tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD CONSTRAINT `sub_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
