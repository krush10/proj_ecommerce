INSERT INTO `loja_banner` (`id`, `loja_banner`) VALUES
(1, '../produto_img/banner.png');

INSERT INTO `loja_dados` (`id`, `loja_email`, `loja_telefone`) VALUES
(1, 'contato@krush.com.br', '(21) 2006-0100');

INSERT INTO `loja_logo` (`id`, `loja_logo`) VALUES
(1, '../produto_img/logo.png');

INSERT INTO `loja_nome` (`id`, `loja_nome`) VALUES
(1, 'Loja Krush');

INSERT INTO `categoria` (`id`, `nome_categoria`, `exibir`) VALUES
(2, 'Informática', 'sim'),
(3, 'Eletrônicos', 'sim'),
(4, 'Games', 'sim'),
(5, 'Eletroeletrônicos', 'sim'),
(6, 'Fitness', 'sim'),
(7, 'Celulares e Telefonia', 'sim'),
(8, 'Esporte e Lazer', 'sim'),
(9, 'Móveis e Decoração', 'sim');

INSERT INTO `sub_categoria` (`id`, `nome_sub_categoria`, `id_categoria`, `exibir`) VALUES
(1, 'Xbox 360', 4, 'sim'),
(2, 'Playstation 3', 4, 'sim'),
(3, 'Computadores', 2, 'sim'),
(4, 'Nintendo Wii', 4, 'sim'),
(5, 'Nintendo DS', 4, 'sim'),
(6, 'Nintendo 3DS', 4, 'sim'),
(7, 'PSP', 4, 'sim'),
(8, 'Halteres', 6, 'sim'),
(9, 'Anilhas', 6, 'sim'),
(10, 'Aparelho Abdominal', 6, 'sim'),
(11, 'Aparelho de Musculação', 6, 'sim'),
(12, 'Barra', 6, 'sim'),
(13, 'Bicicleta Ergométrica', 6, 'sim'),
(14, 'Cama Elástica', 6, 'sim'),
(15, 'Monitores Cardíacos', 6, 'sim');

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `descricao`, `data_cadastro`, `exibir`, `id_categoria`, `id_sub_categoria`, `disponivel`, `destaque`) VALUES
(5, 'Computador Megaware M8768 - 2GB HD500', 615.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(6, 'Computador Megaware M8768 - 2GB HD500', 699.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(7, 'Computador Megaware M8768 - 2GB HD500', 590.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(8, 'Computador Megaware M8768 - 2GB HD500', 690.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(9, 'Computador Megaware M8768 - 2GB HD500', 670.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(10, 'Computador Megaware M8768 - 2GB HD500', 580.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(11, 'Computador Megaware M8768 - 2GB HD500', 699.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(12, 'Computador Megaware M8768 - 2GB HD500', 590.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(13, 'Computador Megaware M8768 - 2GB HD500', 599.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(14, 'Computador Megaware M8768 - 2GB HD500', 690.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(15, 'Computador Megaware M8768 - 2GB HD500', 690.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(16, 'Computador Megaware M8768 - 2GB HD500', 789.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(17, 'Computador Megaware M8768 - 2GB HD500', 690.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(18, 'Computador Megaware M8768 - 2GB HD500', 699.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(19, 'Computador Megaware M8768 - 2GB HD500', 699.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(20, 'Computador Megaware M8768 - 2GB - HD500 - Geforce 9600 1GB DDR 5', 699.00, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(22, 'Computador Megaware M8768 - 2GB HD500', 699.90, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(23, 'Computador Megaware M8768 - 2GB HD500', 799.90, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(24, 'Computador Megaware M8768 - 2GB HD500', 899.90, '<p>testess</p>', '2012-05-12', 'sim', 2, 3, 'sim', 'sim'),
(25, 'Xbox 360 Slim 4GB Kinect Ready', 690.00, '<p>testess</p>', '2012-05-12', 'sim', 4, 1, 'sim', 'sim'),
(26, 'Controle Xbox 360 Branco - Sem Fio', 99.90, '<p>testes</p>', '2012-05-12', 'sim', 4, 1, 'sim', 'nao'),
(27, 'Call of Duty: Modern Warfare 3 - Xbox 360', 145.00, '<p>testess</p>', '2012-05-12', 'sim', 4, 1, 'sim', 'nao'),
(28, 'PlayStation 3 Black Slim 120 Gb', 799.00, '<p>testess</p>', '2012-05-12', 'sim', 4, 2, 'sim', 'sim'),
(29, 'Xbox 360 Slim 4GB Kinect Ready', 680.00, '<p>testess</p>', '2012-05-12', 'sim', 4, 1, 'sim', 'nao'),
(30, 'PlayStation 3 Black Slim 120 Gb', 799.00, '<p>testess</p>', '2012-05-12', 'sim', 4, 2, 'sim', 'nao'),
(31, 'Xbox 360 Slim 4GB Kinect Ready', 700.00, '<p>testess</p>', '2012-05-12', 'sim', 4, 1, 'sim', 'nao'),
(32, 'Xbox 360 Slim 4GB Kinect Ready', 700.00, '<p>testess</p>', '2012-05-12', 'sim', 4, 1, 'sim', 'nao'),
(34, 'Computador Megaware M8768 - 2GB - HD500 - Geforce 9600 1GB DDR 5', 599.90, '<div class="chosenProds infoP"><strong>Computador SIM Positivo L3430 com Intel Pentium Dual Core 6GB 1TB Linux - Positivo + Monitor LED 20'' E2050SN - AOC</strong></div>\r\n<div class="infoProd">\r\n<p>Tenha em sua casa uma m&aacute;quina de alto desempenho e com um bom custo benef&iacute;cio!<br />Se voc&ecirc; procura um equipamento com configura&ccedil;&atilde;o arrojada e que atenda os consumidores mais exigentes, o computador SIM Positivo L3430 &eacute; sua melhor op&ccedil;&atilde;o!<br /><br />A linha de computadores da Positivo oferecem durabilidade e &oacute;tima configura&ccedil;&atilde;o para uso cotidiano, como navegar na Internet, redes sociais, e-mail, trabalho e estudo. Possui processador Intel Pentium E6500 Dual Core, 6GB de mem&oacute;ria RAM, HD de 1 terabyte, Sistema operacional Linux e acompanha mouse &oacute;ptico scroll com 2 bot&otilde;es, teclado em portugu&ecirc;s-Brasil padr&atilde;o ABNT2 com 107 teclas e pacote Positivo Experience com 3D incr&iacute;vel.<br /><br />Voc&ecirc; poder&aacute; armazenar arquivos, v&iacute;deos, fotos e m&uacute;sicas sem comprometer a mem&oacute;ria do seu computador. Ideal para quem procura uma m&aacute;quina que desenvolva com qualidade as tarefas di&aacute;rias.<br />Tudo para voc&ecirc; navegar na internet e fazer seus trabalhos pessoais com mais qualidade e desempenho!<br /><br /><strong>Monitor LED 20'' E2050SN - AOC</strong><br /><br />AOC apresenta o monitor E2050S! Re&uacute;ne o que h&aacute; de mais moderno em tecnologia e design em um &uacute;nico produto. Qualidade em cores, brilho, contraste e tudo o que o consumidor necessita.<br />Sua rela&ccedil;&atilde;o de contraste de 20.000.000:1, proporciona um espet&aacute;culo de imagem. E mais: responsabilidade ambiental, at&eacute; 50% de economia de energia em compara&ccedil;&atilde;o a monitores LCD e tudo isso em um design impec&aacute;vel.<br />Experimente voc&ecirc; tamb&eacute;m usufruir de tanta sofistica&ccedil;&atilde;o! A Tela LED 20" em Widescreen garante a visualiza&ccedil;&atilde;o da melhor imagem. Voc&ecirc; nunca viu nada igual!<br /><br /><strong>Todas as informa&ccedil;&otilde;es divulgadas s&atilde;o de responsabilidade do fabricante/fornecedor.</strong><br /><br /><strong>Verifique com os fabricantes do produto e de seus componentes eventuais limita&ccedil;&otilde;es &agrave; utiliza&ccedil;&atilde;o de todos os recursos e funcionalidades.&nbsp;</strong><br /><br /><strong>Imagem meramente ilustrativa</strong><br /><br /></p>\r\n<dl><dt>Marca</dt><dd>Megaware</dd><dt>Processador</dt><dd>Pentium</dd><dt>Modelo do Processador</dt><dd>E6500</dd><dt>Barramento</dt><dd>1066 MHz</dd><dt>Cache</dt><dd>2MB</dd><dt>Chipset</dt><dd>Intel G41</dd><dt>Mem&oacute;ria RAM</dt><dd>6GB</dd><dt>HD</dt><dd>1TB</dd><dt>Placa M&atilde;e</dt><dd>Positivo/SIM</dd><dt>Drives</dt><dd>Leitor e Gravador de CD e DVD</dd><dt>Rede</dt><dd>10/100Mbps, Fast Ethernet</dd><dt>Som</dt><dd>Positivo Inform&aacute;tica / Integrada, com suporte para &Aacute;udio 5.1</dd><dt>Mem&oacute;ria de v&iacute;deo</dt><dd>Intel Graphics Media Accelerator X4500 (Intel GMA X4500), com suporte a gr&aacute;ficos 2D/3D e Microsoft DirectX 10</dd><dt>Teclado</dt><dd>Portugu&ecirc;s Brasil ABNT2, 107 teclas, PS 2</dd><dt>Mouse</dt><dd>PS 2 , 2 bot&otilde;es, com scroll, &oacute;ptico</dd><dt>Sistema Operacional</dt><dd>Linux</dd><dt>Softwares inclusos</dt><dd>Antiv&iacute;rus gr&aacute;tis por 1 ano, Aplicativos para escrit&oacute;rio e Sistema de Recupera&ccedil;&atilde;o Eletr&ocirc;nico</dd><dt>PRODUTO</dt><dd>Monitor LED AOC E2050S - Tela de 20" Widescreen - Preto</dd><dt>Tipo de Monitor</dt><dd>LED</dd><dt>Tamanho da tela</dt><dd>20"</dd><dt>Resolu&ccedil;&atilde;o M&aacute;xima</dt><dd>1600x 900 @Hz</dd><dt>Pixel Pitch</dt><dd>0,277mm</dd><dt>Brilho</dt><dd>250</dd><dt>Contraste</dt><dd>20.000.000:1</dd><dt>&Acirc;ngulo de Vis&atilde;o</dt><dd>170&ordm;/160&ordm;</dd><dt>Tempo de resposta</dt><dd>5 ms</dd><dt>Caixas ac&uacute;sticas embutidas</dt><dd>N&atilde;o</dd><dt>Conex&otilde;es</dt><dd>Anal&oacute;gico (RGB)</dd><dt>Voltagem</dt><dd>Bivolt</dd><dt>Conte&uacute;do da Embalagem</dt><dd class="desc">01 Monitor, 01 Cabo de for&ccedil;a, 01 cabo RGB, 01 manual (CD), 01 certificado de garantia e 01 base</dd><dt>Dimens&otilde;es aproximadas do produto (cm) - AxLxP</dt><dd>36,1x 47,7x 1,7 cm</dd><dt>Peso l&iacute;q. aproximado do produto (kg)</dt><dd>3 Kg</dd><dt>Garantia do Fornecedor</dt><dd>12 meses</dd><dt>Modelo</dt><dd>E2050S</dd><dt>Refer&ecirc;ncia do Modelo</dt><dd>E2050S</dd><dt>Fornecedor</dt><dd>Envision Industria de Produtos Eletr&ocirc;nicos LTDA</dd><dt>SAC</dt><dd>0800 109 539</dd></dl></div>', '2012-06-12', 'sim', 2, 3, 'sim', 'sim');


INSERT INTO `produto_img` (`id`, `produto_img`, `id_produto`) VALUES
(1, '../produto_img/051212-58553675_1.jpg', 5),
(2, '../produto_img/051212-58553675_1.jpg', 6),
(3, '../produto_img/051212-58553675_1.jpg', 7),
(4, '../produto_img/051212-58553675_1.jpg', 8),
(5, '../produto_img/051212-58553675_1.jpg', 9),
(6, '../produto_img/051212-58553675_1.jpg', 10),
(7, '../produto_img/051212-58553675_1.jpg', 11),
(8, '../produto_img/051212-58553675_1.jpg', 12),
(9, '../produto_img/051212-58553675_1.jpg', 13),
(10, '../produto_img/051212-58553675_1.jpg', 14),
(11, '../produto_img/051212-58553675_1.jpg', 15),
(12, '../produto_img/051212-58553675_1.jpg', 16),
(13, '../produto_img/051212-58553675_1.jpg', 17),
(14, '../produto_img/051212-58553675_1.jpg', 18),
(15, '../produto_img/051212-58553675_1.jpg', 19),
(16, '../produto_img/051212-58553675_1.jpg', 20),
(17, '../produto_img/051212-58553675_1.jpg', 22),
(18, '../produto_img/051212-58553675_1.jpg', 23),
(19, '../produto_img/051212-58553675_1.jpg', 24),
(20, '../produto_img/051212-xbox_slim_1__97899_zoom.jpg', 25),
(21, '../produto_img/051212-2012619115737_1_orig.jpg', 26),
(22, '../produto_img/051212-call-of-duty-modern-warfare-3-xbox-360.jpg', 27),
(23, '../produto_img/051212-1288200230_132537987_1-Fotos-de--PlayStation-3-Slim-120-Gb-PS3-1288200230.jpg', 28),
(24, '../produto_img/051212-xbox_slim_1__97899_zoom.jpg', 29),
(25, '../produto_img/051212-1288200230_132537987_1-Fotos-de--PlayStation-3-Slim-120-Gb-PS3-1288200230.jpg', 30),
(26, '../produto_img/051212-xbox_slim_1__97899_zoom.jpg', 31),
(27, '../produto_img/051212-xbox_slim_1__97899_zoom.jpg', 32),
(29, '../produto_img/061212-58553675_1.jpg', 34);
