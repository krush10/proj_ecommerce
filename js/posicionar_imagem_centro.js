function centralizar(){
	//Pega a altura do seu pai e armazena em uma variável
	var parent_height = 280;
	//Pega a altura da imagem e armazena em uma variável
	var image_height = $('.imagem_grande').height();
	
	var parent_width = 300;
	//Pega a altura da imagem e armazena em uma variável
	var image_width = $('.imagem_grande').width();
	//Calcula a altura do pai menos a altura da imagem e divide por 2
	//É onde obtemos a distancia que a imagem deve ficar do topo e a armazenamos em uma variável
	var top_margin = (parent_height - image_height)/2;
	
	var left_margin = (parent_width - image_width)/2;
	//Aqui é onde aplicamos a margem do topo a imagem
	$('.imagem_grande').css( 'margin-top' , top_margin);
	$('.imagem_grande').css( 'margin-left' , left_margin);
}