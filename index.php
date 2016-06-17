<?php
if( $_SERVER['REQUEST_METHOD']=='POST' ){

	$form_name = isset($_POST['form_name']) ? $_POST['form_name'] : false;

	//$to         = 'congresso@mpd.org.br'; //para quem vai o email
	$to 		= "edy.castro@outlook.com";
	$email 		= isset($_POST['email']) ? $_POST['email'] : "";

	$message = "";

	if($form_name == "contato") {

		$subject	= isset($_POST['assunto']) ? $_POST['assunto'] : "Contato pelo site";

		$nome 		= isset($_POST['nome']) ? $_POST['nome'] : "";
		$tel 		= isset($_POST['tel']) ? $_POST['tel'] : "";
		$cel 		= isset($_POST['cel']) ? $_POST['cel'] : "";
		$mensagem 	= isset($_POST['mensagem']) ? $_POST['mensagem'] : "";
		$mailing 	= isset($_POST['mailing']);

		/* Mensagem */
		$message = "<div id=\"opiniao\">{$nome}, mandou a seguinte mensagem pela seção 
						\"Fale Conosco\" do site: <br> <i>{$mensagem}</i> <br> Deixou o seguinte 
						telefone para contato: {$tel}, e email: {$email}. 
					</div>";

		if($mailing) {
			$message .= "<br>O usuario gostaria tambem de receber as newsletters.";
		}

		$msg = 'Obrigado pelo contato, aguardamos a sua visita.';
	} else if ($form_name == "mailing") {

		$subject = isset($_POST['assunto']) ? $_POST['assunto'] : "Novo registro do site";

		$message = "Um usuario deseja de inscrever para as newsletter. O seu email: {$email}";

		$msg = 'Obrigado pelo contato, aguardamos a sua visita.';
	}

	$headers =  "MIME-Version: 1.1".PHP_EOL;
	$headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
	$headers .= "From: congresso@mpd.org.br".PHP_EOL; // remetente
	$headers .= "Return-Path: congresso@mpd.org.br".PHP_EOL; // return-path

	mail($to, $subject, $message, $headers);
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable-no">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/ico" href="favicon.png?v=2"></link>
	<link rel="shortcut icon" href="favicon.png?v=2"></link>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700' rel='stylesheet' type='text/css'>

	<title>Congresso - MPD</title>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-73133002-2', 'auto');
		ga('send', 'pageview');
<?php if($msg != ""){ 
		echo "alert(\"{$msg}\");";
}?>
	</script>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/congresso-mpd.css?v=1" rel="stylesheet">

	<!-- fonts -->
	<!-- Open sans -->
	<!-- Fonts -->
	<link rel="stylesheet" type="text/css" href="fonts/GothamHTF-Book/GothamHTF-Book.css" media="all">
	<link rel="stylesheet" type="text/css" href="fonts/GothamHTF-Medium/GothamHTF-Medium.css" media="all">
	<link rel="stylesheet" type="text/css" href="fonts/GothamHTF-XLight/GothamHTF-XLight.css" media="all">
	<link rel="stylesheet" type="text/css" href="fonts/GothamHTF-LightItalic/GothamHTF-LightItalic.css" media="all">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic,400italic,600,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="js/ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body role="document" class="home">

	<div class="container-full" role="main">
		<!-- Fixed navbar -->
		<section class="row start" id="home">
			<div class="container-congresso-mpd">
				<div class="col-md-12">
					<center>
						<h1><img src="img/logo-congresso-mpd.png" class="img-mobile" border="0" alt="" /></h1><br>
						<p class="dark-blue thirty">
							Faça parte do Congresso e participe das mesas de debate<br>
							que discutirão propostas para o aprimoramento<br>
							da intervenção do Ministério Público.</p>
							<a href="http://www.automacaoperfecta.com.br/sistema/mpd/usuario/index.asp?codigo=1" target="_blank" class="bt-inscreva-agora">Inscreva-se agora</a>
							<p class="twenty-four dark-blue">e ganhe <span class="green bold">62%</span> de desconto de até o dia 15/06</p>
							<img src="img/arrow-bottom.png" border="0" alt="" />
							<p>&nbsp;</p>
						</center><br>
					</div>
				</div>
			</section>
			<section class="row mailing">
				<div class="container-congresso-mpd">
					<div class="col-md-12 ">
						<center>
							<form action="" method="POST">
								<input type="hidden" name="form_name" value="mailing">
								<img src="img/faca-parte-mailing.png" border="0" alt="" />
								<input type="email" placeholder="E-mail" name="email" />
								<button type="submit">OK</button>
							</form>
						</center>
					</div>
				</div>
			</section>
			<section class="row mpd-intro" id="sobre">
				<div class="container-congresso-mpd">
					<div class="col-md-12">
						<br><br><center><img src="img/mpd-logo.png" class="img-mobile" /></center><br><br>
						<div class="col-md-12">
							<p align="center" style="max-width: 700px; display:block; margin:0 auto;">
								O MPD - Movimento do Ministério Público Democrático, entidade sem fins lucrativos, de promotores
								e procuradores de Justiça de todo o Brasil, foi fundado em 25 de agosto de 1991, em São Paulo SP.
								A Associação foi criada por membros do MP que desejam maior compromisso da Justiça com o povo brasileiro
								por meio do debate sobre os rumos do Direito. O MPD foi fundado numa época em que o país havia promulgado
								recentemente a Constituição Federal de 1988 a qual sacramentou os direitos dos cidadãos
								após longo período de ditadura e sem eleições diretas.<br> 
								<br>
								Em meio às garantias da Carta Magna como liberdade de expressão e a igualdade entre homens e mulheres,
								estava o Ministério Público. O texto constitucional incumbiu à instituição as missões de defender o regime
								democrático, zelar pelo cumprimento da lei e proteção dos brasileiros em face de prejuízos aos seus direitos.
								Com associados em todo o território nacional, o MPD mantém o debate contínuo sobre a aplicação das leis,
								projetos voltados à educação popular do Direito, o engajamento em movimentos da sociedade civil
								e a busca do fortalecimento das instituições democráticas. 
							</p><br><br>
						</div>
					</div>
				</div>
			</section>
			<section class="row congresso">
				<div class="container-congresso-mpd">
					<br><br><center>
						<h2>Sobre o Congresso</h2>
						<hr class="title-border" style="border-color: #449194;">
					</center>
					<div class="col-md-12">
						<p align="center" class="white" style="max-width: 700px; margin: 0 auto; display: block;">
							Passados 25 anos do nascimento do Movimento do Ministério Público Democrático,
							é imprescindível promover uma profunda discussão sobre a atuação do MP no Brasil e isto nos inspirou
							a realizar nosso quinto congresso nacional: Ministério Público e Sociedade.
							Como podemos evoluir mais e atender melhor a comunidade? Qual o futuro do MP?<br>
							<br>
							Para isso reuniremos nomes de extremo relevo do sistema de justiça, do meio acadêmico,
							do mundo da comunicação e de outras áreas de atuação, assim como as forças vivas da sociedade civil,
							buscando aprofundar o debate e encontrar os melhores caminhos para o aprimoramento do MP, falando,
							de sua política de atuação no Brasil.
						</p><br><br><br>
					</div><br><br>
				</div>
			</section>
			<section class="row subscribe" id="inscricoes">
				<div class="container-congresso-mpd">
					<h2>Inscrições</h2>
					<center><hr style="border-color: #2d7f83;" class="title-border"></center>
					<div class="col-md-6"><img src="img/wz-hotel.png" class="img-mobile img-hotel" border="0" alt="" style="margin-bottom: 50px;" /></div>
					<div class="col-md-6 local-info">
						<center>
							<ul>
								<li>
									<img src="img/calendar.png" border="0" alt="" /><br>
									<h4>São Paulo<br>
										<span class="grey">24 a 26 de Agosto de 2016</span>
									</h4>
								</li>
								<li>
									<img src="img/pin.png" border="0" alt="" /><br>
									<h4>WZ Hotel<br>
										<span class="grey"><strong>Av. Rebouças, 955 - Jardins</strong><br>
											(próx. Avenida Paulista)</span>
										</h4>
									</li>
									<li>
										<img src="img/coordinator.png" border="0" alt="" /><br>
										<h4>Coordenação Executiva<br>
											<span class="grey"><strong>Laila Shukair</strong> | Presidente do MPD</span>
										</h4>
										<h4>Coordenação científica<br>
											<span class="grey"><strong>Roberto Livianu</strong></span>
										</h4>
									</li>
								</ul>
							</center>
						</div>
						<div class="col-md-12">
							<h2 class="green">Valores de inscrição</h2>
							<ul class="dates">
								<li class="green">
									<span class="info bold twenty-four" style="margin-top:12px; min-width:258px;">Associados MPD*<br>
										Estudantes**</span>
									</li>
									<li class="dark-blue"><span class="values bold">R$ 400,00</span><span class="sixteen">Até 15/06/2016</span></li>
									<li class="dark-blue"><span class="values bold">R$ 480,00</span><span class="sixteen">Até 15/07/2016</span></li>
									<li class="dark-blue"><span class="values bold">R$ 560,00</span><span class="sixteen">Até 15/08/2016</span></li>
									<li class="dark-blue"><span class="values bold">R$ 640,00</span><span class="sixteen">No local</span></li>
								</ul>
								<ul class="dates">
									<li class="green bold" style="padding: 16px 0; min-width:258px;">
										<span class="info twenty-four">Não Associados MPD*</span><br>
									</li>
									<li class="dark-blue"><span class="values bold">R$ 500,00</span><span class="sixteen">Até 15/06/2016</span></li>
									<li class="dark-blue"><span class="values bold">R$ 600,00</span><span class="sixteen">Até 15/07/2016</span></li>
									<li class="dark-blue"><span class="values bold">R$ 700,00</span><span class="sixteen">Até 15/08/2016</span></li>
									<li class="dark-blue"><span class="values bold">R$ 800,00</span><span class="sixteen">No local</span></li>
								</ul>
								<ul id="row-info">
									<li class="include"><span class="info">Incluso</span></li>
									<li style="margin: 0 30px 0 0;">
										<span class="green">•</span> Crachá<br>
										<span class="green">•</span> Bloco de anotações com Programa e caneta<br>
										<span class="green">•</span> Livro comemorativo de 25 anos do MPD<br>
										<span class="green">•</span> Certificado de participação<br>
										<span class="green">•</span> Ecobag<br>
									</li>
									<li>
										<span class="green">•</span> Coquetel de abertura no dia 24/08/2016<br>
										<span class="green">•</span> Almoço nos dias 25 e 26/08/2016<br>
										<span class="green">•</span> Coffee break, dois no dia 25 e dois no dia 26<br>
										<span class="green">•</span> Coquetel de encerramento no dia 26/08/2016
									</li>
									<li class="dark-blue fourteen txt-left"><br><br>* Condição válida para associados com as contribuições associativas regularizadas<br>
										** É necessário o envio de carteirinha de estudante para o e-mail mpdemocratico@terra.com.br no ato da inscrição</li>
									</ul>
								</div>
							</div>
						</section>
						<section class="row methodology" id="metodologia">
							<div class="container-congresso-mpd">
								<h2>Metodologia</h2>
								<hr class="title-border">
								<br>
								<ul>
									<li class="col-md-4">
										<img src="img/icon-time.png" border="0" alt="" /><br>
										<br>
										<h3>MESAS COM <br>3 HORAS DE DURAÇÃO</h3><br>
										<p class="white">
											Intervenções provocativas dos dois<br>
											expositores, apresentando questões<br>
											de relevo para o debate da plateia<br>
											e do convidado especial,<br>
											observador qualificado.
										</p>
									</li>
									<li class="col-md-4">
										<img src="img/icon-public.png" border="0" alt="" /><br>
										<br>
										<h3>PALAVRA <br>DO PÚBLICO</h3><br>
										<p class="white">
											Extrema interatividade<br>
											e dinamismo em formato<br>
											circular, essencial para<br>
											a fluência da discussão<br>
											e construção estruturada<br>
											dos respectivos enunciados.
										</p>
									</li>
									<li class="col-md-4">
										<img src="img/icon-congress.png" border="0" alt="" /><br>
										<br>
										<h3>OBJETIVO<br> DO CONGRESSO</h3><br>
										<p class="white">
											Elaboração de enunciados<br>
											visando o aprimoramento da<br>
											intervenção do MP no Brasil,<br>
											encaminhando-se para o CNMP,<br>
											CNPG e associações do MP.
										</p>
									</li>
								</ul>
								<center><a href="http://www.automacaoperfecta.com.br/sistema/mpd/usuario/index.asp?codigo=1" target="_blank" class="bt-inscreva-agora dark-blue">Inscreva-se agora</a></center>
							</div>
						</section>
						<section class="row">
							<div class="container-congresso-mpd"><br><br><br>
								<center><img src="img/lancamento.jpg" class="img-mobile" border="0" alt="" /></center><br><br><br>
							</div>
						</section>
						<section class="row program" id="programacao">
							<div class="container-congresso-mpd">
								<h2 class="green">Programação</h2>
								<hr class="title-border">
								<ul class="col-md-12">
									<li class="col-md-3 txt-right white bold fourty">
										Dia 24 |<br>
										Dias 25 e 26 |
									</li>
									<li class="col-md-9 dark-blue bold fourty">
										Conferência de abertura<br>
										Painéis, em três salas simultâneas,<br> durante as manhãs e tardes.
									</li>
								</ul>
								<h3 class="dark-blue">Conferência de abertura <hr style="border: 1px solid #002338; width: 71%; float: right;"></h3>
								<ul class="col-md-12 program-agenda">
									<li class="col-md-2"><center><img src="img/24-8h.png" class="img-mobile" border="0" alt="" style="margin-top: 80px;" /></center><br><br></li>
									<li class="col-md-1">&nbsp;</li>
									<li class="col-md-9 white">
										<p><span class="white twenty">Dia 24</span><br>
											<span class="green twenty">18:00 | Abertura oficial</span></p>
											<h4>
												<span>MINISTÉRIO PÚBLICO E SOCIEDADE<br>MPD: 25 ANOS DE HISTÓRIA DEMOCRÁTICA</span><br>
												<hr style="width: 30px; border: 1px solid #ffffff; float: left; clear: both; margin: 24px 0 0 0;">
											</h4>
											<br>
<!--<span class="dark-blue twenty">Carlos Ayres Britto | Ex-presidente do STF<br>
Antonio Cluny | Procurador-Geral Adjunto em Portugal
</span>-->
<br>
<br>
<span class="green twenty">20:30 | Lançamento do livro e vídeo institucional<br>
	21h | Coquetel</span>
</li>
</ul>

<h3 class="dark-blue">Painéis <hr style="border: 1px solid #002338; width: 90%; float: right;"></h3>
<br>
<br>
<center>
	<h4><span class="white twenty-four">Dia 25</span><br><br>
		<span class="green twenty-four">8h | Credenciamento <br>e retirada do material</span>
	</h4>
</center>

<ul class="col-md-12 program-agenda">
	<li class="col-md-4">
		<center><img src="img/25-9h.png" border="0" alt="" /></center><br>
		<p class="white thirty">1. Formas alternativas para resolução de conflitos
			diante do esgotamento das vias clássicas da justiça<br><br></p>
			<p class="green"><strong>Sala Jardim I</strong></p>
			<br>
			<p class="dark-blue">
				<strong>Presidente</strong><br>
				Carlos Eduardo de Azevedo Lima |<br>
				Procurador do Trabalho e ex-Presidente ANPT<br>
				<br>
				<strong>Expositores</strong><br>
				Leoberto Brancher | Juiz de Direito<br>
				Salomão Ismail | Promotor de Justiça MP-PE e Presidente AMP-PE<br><br>
				<strong>Convidado Especial</strong><br>
				Rogério Nascimento | Procurador da República e Conselheiro CNJ<br><br>
				<strong>Tópicos</strong><br>
				fórmulas não estatais de realização de justiça. Mediação e justiça estaurativa, justiça terapêutica entre outros.
			</li>
			<li class="col-md-4">
				<center><img src="img/25-9h.png" border="0" alt="" /></center><br>
				<p class="white thirty">2. Os desafios sociais das promessas não cumpridas da democracia. MP em defesa dos mais vulneráveis socialmente.
				</p>
				<p class="green"><strong>Sala Jardim II</strong>
				</p>
				<br>
				<p class="dark-blue">
					<strong>Presidente</strong><br>
					Evelise Pedroso Teixeira Prado Vieira | Procuradora de Justiça MP-SP<br><br>
					<strong>Expositores</strong><br>
					Edna Roland | Especialista da ONU<br>
					Francisco Sales de Albuquerque | Procurador de Justiça MP-PE</br /><br>
					<strong>Convidado Especial</strong><br>
					Gianpaolo Smanio | Procurador-Geral de Justiça MP-SP<br><br>
					<strong>Tópicos</strong><br>
					Minorias, trabalho em rede, imigrantes, migrantes e refugiados, ações afirmativas, saúde, saneamento básico, educação-MP no combate às fomes sociais.
				</p>
			</li>
			<li class="col-md-4">
				<center><img src="img/25-9h.png" border="0" alt="" /></center><br>
				<p class="white thirty">3. O lugar do MP: sociedade política
					ou sociedade civil? Estratégia e proatividade no acompanhamento
					das políticas públicas.
				</p>
				<p class="green"><strong>Sala Jardim III</strong></p>
				<br>
				<p class="dark-blue">
					<strong>Presidente</strong><br>
					Nedens Vieira | ex-Procurador Geral de Justiça MP-MG e Vice-Presidente CONAMP<br><br>
					<strong>Expositores</strong><br>
					Cláudio Barros Silva | ex-Procurador-Geral de Justiça MP-RS e ex-Presidente CONAMP<br>
					Heródoto Barbeiro | Jornalista e Apresentador Record News<br><br>
					<strong>Convidado Especial</strong><br>
					Gil Castelo Branco | Economista e Diretor da ONG Contas Abertas<br><br>
					<strong>Tópicos</strong><br>
					formação das políticas públicas; fiscalização, atuação extrajudicial, estratégias e judicialização de conflitos.resolutivo, custos e resultados do trabalho do MP, comunicação social.
				</p>
			</li>
		</ul>

		<center><p><span class="green">10:30 as 11h | Coffee Break &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 11h as 12:30 | Retorno aos painéis &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 12:30 às 14h | Almoço (restaurante do hotel)</span></p></center>

		<ul class="col-md-12 program-agenda">
			<li class="col-md-4"> <center><img src="img/25-14h.png" border="0" alt=""
				/></center><br>                             <p class="white thirty">4. Por
				uma Justiça para o povo:                                 desafios para
				mpliação do acesso à justiça.<br><br></p>
				<p class="green"><strong>Sala Jardim I</strong></p> <br>
				<p class="dark-blue"> <strong>Presidente</strong><br>
					Charles Hamilton Santos Lima | Procurador de Justiça MP-PE<br>
					<br> <strong>Expositores</strong><br>
					Maria Tereza Sadek | Cientista política USP<br> Fábio Bastos Stica | ex-
					Procurador Geral de Justiça MP-RR e Conselheiro CNMP<br><br>
					<strong>Convidado Especial</strong><br>
					Sérgio Renault | Presidente do Prêmio Innovare<br><br>
					<strong>Tópicos</strong><br> questão territorial, MP itinerante, aproximação
					com a sociedade. Crescente judicialização dos conflitos. </li>
					<li class="col-md-4">                                     <center><img
						src="img/25-14h.png" border="0" alt="" /></center><br>
						<p class="white thirty">5. Novas gerações do MP: agentes burocráticos ou
							agentes políticos de transformações sociais? O modelo de formação dos membros
							do MP no Brasil é adequado?</p>                                     <p
							class="green"><strong>Sala Jardim II</strong></p>
							<br>                                     <p class="dark-blue">
							<strong>Presidente</strong><br>
							Ubiratan Cazetta | Procurador da República e Gabinete PGR <br><br>
							<strong>Expositores</strong><br> Eduardo Diniz Neto | Promotor de Justiça
							MP-PR e ex-Presidente CEDEP<br> Roberto Romano | Filósofo</br /><br>
							<strong>Convidado Especial</strong><br> Sabine Righetti | Jornalista Folha
							de S. Paulo<br><br> <strong>Tópicos</strong><br>
							visão social e humanista, seleção, curso de adaptação, formação
							continuada/acompanhamento e formação complementar.
						</li> <li class="col-md-4">
						<center><img src="img/25-14h.png" border="0" alt="" /></center><br>
						<p class="white thirty">6. A tragédia social e cultural da corrupção endêmica,
							que bloqueia a concretização de políticas públicas. Estamos apenas tocando a
							ponta do “iceberg”. Faltam pernas, coragem ou ndependência das cúpulas do MP
							para responsabilizar os do “andar de cima”?</p> <p class="green"><strong>Sala
							Jardim III</strong></p>                                         <br> <p
							class="dark-blue">
							<strong>Presidente</strong><br> Fábio George Cruz da Nóbrega | Procurador da
							República e Conselheiro CNMP<br><br> <strong>Expositores</strong><br>
							Roberto Livianu | Promotor de Justiça MP- SP e Presidente do Inst. Não Aceito
							Corrupção<br>                                             Silvio Caccia Bava
							| Diretor e editor-chefe do Le Monde Diplomatique Brasil<br><br>
							<strong>Convidado Especial</strong><br>
							José Álvaro Moysés | Cientista Político USP <br><br>
							<strong>Tópicos</strong><br> investigação, ação anticorrupção em rede,
							competência originária, prevenção, ativismo </li>
						</ul>

						<center><p><span class="green">10:30 as 11h | Coffee Break &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 11h as 12:30 | Retorno aos painéis &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 12:30 às 14h | Almoço (restaurante do hotel)</span></p></center>
						<br>
						<br>
						<hr class="title-border">
						<br>
						<br>
						<center>
							<h4><span class="white twenty-four">Dia 26</span><br><br>
								<span class="green twenty-four">8h | Credenciamento <br>e entrega dos vouchers</span>
							</h4>
						</center>

						<ul class="col-md-12 program-agenda">
							<li class="col-md-4">
								<center><img src="img/26-9h.png" border="0" alt="" /></center><br>
								<p class="white thirty">7. O que vem depois da ação penal? A importância vital da Execução da Pena para a efetividade do Direito Penal, instrumento de proteção da sociedade.<br><br></p>
								<p class="green"><strong>Sala Jardim I</strong></p>
								<br>
								<p class="dark-blue">
									<strong>Presidente</strong><br>
									Maria Tereza Uille Gomes | Procuradora de Justiça MP-PR<br>
									<br>
									<strong>Expositores</strong><br>
									Ela Wiecko | Vice-Procuradora-Geral da República<br>
									Alamiro Veludo | Advogado e Membro CNPCP-MJ<br><br>
									<strong>Convidado Especial</strong><br>
									Renato De Vitto | Diretor Geral DEPEN<br><br>
									<strong>Tópicos</strong><br>
									sistema carcerário, legislação vigente e alterações, penas alternativas.
								</li>
								<li class="col-md-4">
									<center><img src="img/26-9h.png" border="0" alt="" /></center><br>
									<p class="white thirty">8. Expansão ou contenção do poder punitivo? Problematização do papel do MP na persecução penal.</p>
									<p class="green"><strong>Sala Jardim II</strong></p>
									<br>
									<p class="dark-blue">
										<strong>Presidente</strong><br>
										Felipe Locke | Procurador de Justiça MP-SP e Presidente APMP<br><br>
										<strong>Expositores</strong><br>
										Luiz Antonio Marrey | ex-Procurador-Geral de Justiça MP-SP e ex-Presidente CNPG<br>
										Sérgio Adorno | Coordenador do Núcleo de Estudos da Violência | USP</br /><br>
										<strong>Convidado Especial</strong><br>
										Antônio Cluny | Procurador-Geral Adjunto em Portugal<br><br>
										<strong>Tópicos</strong><br>
										estratégias, o papel do MP na investigação criminal, controle externo da polícia, proteção e direitos da vítima (inclusive informação e indenização), prevenção, violência policial, crime organizado, crimes de intolerância e alterações legislativas.
									</li>
									<li class="col-md-4">
										<center><img src="img/26-9h.png" border="0" alt="" /></center><br>
										<p class="white thirty">9. Gestão do MP. Modernização, os antigos problemas e os novos desafios.</p>
										<p class="green"><strong>Sala Jardim III</strong></p>
										<br>
										<p class="dark-blue">
											<strong>Presidente</strong><br>
											Diogo Roberto Ringenberg | Procurador de Contas MPC-SC e Presidente AMPCON<br><br>
											<strong>Expositores</strong><br>
											Plácido Rios | Procurador-Geral de Justiça MP-CE <br>
											Paulo Passos | Procurador-Geral de Justiça MP-MS<br><br>
											<strong>Convidado Especial</strong><br>
											Lauro Machado Nogueira | Procurador-Geral de Justiça MP-GO e ex-Presidente CNPG <br><br>
											<strong>Tópicos</strong><br>
											orçamento, estrutura, 1ª e 2ª instâncias, análise de situação e desafios para uma adequada estrutura de órgão auxiliar do MP, MP resolutivo, custos e resultados do trabalho do MP, comunicação social.
										</li>
									</ul>

									<center><p><span class="green">10:30 as 11h | Coffee Break &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 11h as 12:30 | Retorno aos painéis &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 12:30 às 14h | Almoço (restaurante do hotel)</span></p></center>

									<ul class="col-md-12 program-agenda">
										<li class="col-md-4">
											<center><img src="img/26-14h.png" border="0" alt="" /></center><br>
											<p class="white thirty">10. Defendemos a cidadania. Somos cidadãos plenos? Como defender o regime democrático sem plena democracia interna? MP e participação política<br><br></p>
											<p class="green"><strong>Sala Jardim I</strong></p>
											<br>
											<p class="dark-blue">
												<strong>Presidente</strong><br>
												Benedito Torres | Procurador de Justiça MP-GO e Presidente da AMP-GO<br>
												<br>
												<strong>Expositores</strong><br>
												Rogério Bastos Arantes | Cientista Político USP<br>
												Achilles Siquara | ex-Procurador-Geral de Justiça MP-BA e ex-Conselheiro CNMP<br><br>
												<strong>Convidado Especial</strong><br>
												Tereza Exner | Vice Corregedora do MPSP<br><br>
												<strong>Tópicos</strong><br>
												exercício pleno da cidadania, contribuição não-partidária, filiação partidária, democratização interna.
											</li>
											<li class="col-md-4">
												<center><img src="img/26-14h.png" border="0" alt="" /></center><br>
												<p class="white thirty">11. Violência doméstica: transformação cultural através de empoderamento da mulher. Necessidade de uma abordagem multidisciplinar.</p>
												<p class="green"><strong>Sala Jardim II</strong></p>
												<br>
												<p class="dark-blue">
													<strong>Presidente</strong><br>
													Samantha Chantal Dobrowolski | Procuradora da República e Diretora ANPR<br><br>
													<strong>Expositores</strong><br>
													Fabíola Sucasas Negrão Covas | Promotora de Justiça MP-SP e integrante GEVID<br>
													Maria Amélia Teles | Ativista e dirigente União de Mulheres SP</br /><br>
													<strong>Convidado Especial</strong><br>
													Adriana Martorelli | Advogada e Comissão de Direitos Humanos OAB-SP<br><br>
													<strong>Tópicos</strong><br>
													atuação em rede, estrutura da Promotoria, integração com a Polícia, função educativa da responsabilização, reeducação do agressor.
												</li>
												<li class="col-md-4">
													<center><img src="img/26-14h.png" border="0" alt="" /></center><br>
													<p class="white thirty">12. Controle do MP. Reflexão crítica sobre atuação das Corregedorias e do CNMP.</p>
													<p class="green"><strong>Sala Jardim III</strong></p>
													<br>
													<p class="dark-blue">
														<strong>Presidente</strong><br>
														Cláudio Portela | Corregedor Nacional do Ministério Público<br><br>
														<strong>Expositores</strong><br>
														Paulo Garrido | Corregedor Geral MP-SP<br>
														Lucieni Pereira | Auditora e Presidente ANTC<br><br>
														<strong>Convidado Especial</strong><br>
														Júlio Marcelo de Oliveira | Procurador de Contas TCU e Vice-Presidente AMPCOM<br><br>
														<strong>Tópicos</strong><br>
														estatísticas de atuação correcional, transparência dos resultados das correições, correição do MP em segundo grau, critérios de avaliação, estruturação humana e material da Corregedorias, mecanismos de controle dos servidores, relação Corregedoria/Ouvidoria.
													</li>
												</ul>

												<center><p><span class="green">10:30 as 11h | Coffee Break &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 11h as 12:30 | Retorno aos painéis &nbsp; &nbsp; &nbsp; • &nbsp; &nbsp; &nbsp; 12:30 às 14h | Almoço (restaurante do hotel)</span></p></center>

												<a href="http://www.automacaoperfecta.com.br/sistema/mpd/usuario/index.asp?codigo=1" target="_blank" class="bt-inscreva-agora dark-blue">Inscreva-se agora</a>
											</div>
										</section>
										<section class="row speechers" id="palestrantes">
											<div class="container-congresso-mpd">
												<h2>Palestrantes</h2>
												<hr class="title-border">
												<article class="col-md-4">
													<h4 class="green">Achilles Siquara<br>
														<span class="white">Procurador</span>
													</h4>
													<p class="dark-blue">Procurador de Justiça MP-BA, ex-Procurador-Geral da Justiça PGJ-BA, ex-Presidente da CONAMP e ex-Conselheiro do CNMP, ex-Presidente do Conselho Nacional dos Procuradores Gerais (CNPG)</p>
												</article>
												<article class="col-md-4">
													<h4 class="green">Adriana Nunes Martorelli<br>
														<span class="white">Advogada</span>
													</h4>
													<p class="dark-blue">Membro da Comissão de Direitos Humanos OAB-SP e representou a Ordem dos Advogados do Brasil junto ao Conselho de Defesa da Pessoa Humana</p>
												</article>
												<article class="col-md-4">
													<h4 class="green">Alamiro Velludo Salvador Neto<br>
														<span class="white">Advogado</span>
													</h4>
													<p class="dark-blue">Professor de Direito Penal da Faculdade de Direito da Universidade de São Paulo – USP e Membro do Conselho Nacional de Política Criminal e Penitenciária do Ministério da Justiça (CNPCP/MJ)</p>
												</article>
												<article class="col-md-4">
													<h4 class="green">Antonio Cluny<br>
														<span class="white">Procurador</span>
													</h4>
													<p class="dark-blue">Procurador-Geral Adjunto em Portugal atuando nos Tribunais Supremos. Atual Membro Nacional de Portugal na Eurojust agência
														da União Europeia para a cooperação judiciária.</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Benedito Torres<br>
															<span class="white">Ex-Procurador</span>
														</h4>
														<p class="dark-blue">Ex-Procurador geral de Justiça, Presidente da Associação Goiana do Ministério Público, Procurador de Justiça, ex-Professor de Direito Penal e ex-Líder estudantil</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Carlos Eduardo de Azevedo Lima<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador do Trabalho da 13ª Região (com sede em João Pessoa-PB), ex-Presidente da Associação Nacional dos Procuradores do Trabalho (ANPT)</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Charles Hamilton dos Santos Lima<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador de Justiça MPPE, Chefe de Gabinete do Procurador-Geral de Justiça, Secretário Geral do MPPE e Coordenador do CAOP de Defesa do Patrimônio Público.</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Cláudio Barros Silva<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador de Justiça do Rio Grande do Sul, ex-Presidente da CONAMP, ex-Procurador-Geral de Justiça do RS, ex-Presidente da AMP-RS, ex-Presidente do CNPG e ex-Conselheiro do CNMP</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Cláudio Portela<br>
															<span class="white">Corregedor</span>
														</h4>
														<p class="dark-blue">Corregedor Nacional do Ministério Público</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Diogo Roberto Ringenberg<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador do Ministério Público de Contas de Santa Catarina, Presidente da Associação Nacional do Ministério Público de Contas (AMPCON) e Coordenador da Rede de Controle da Gestão Pública SC</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Eduardo Diniz Neto<br>
															<span class="white">Promotor</span>
														</h4>
														<p class="dark-blue">Promotor de Justiça MP-PR, Presidente da Fundação Escola Superior do Ministério Público do Estado do Paraná, Membro do Conselho Editorial da Revista Eletrônica de Direito Público da UEL</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Edna Roland<br>
															<span class="white">Coordenadora</span>
														</h4>
														<p class="dark-blue">Coordenadora de igualdade racial da Prefeitura de Guarulhos e membro de Grupo de Especialistas Eminentes para a Implementação da Declaração e Programa de Ação de Durban – ONU</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Ela Wiecko Volkmer de Castilho<br>
															<span class="white">Subprocurador</span>
														</h4>
														<p class="dark-blue">Subprocuradora-Geral da República (ou membro do MPF), atualmente Vice-Procuradora-Geral da República, Doutora em Direito, Professora da Universidade de Brasília e membro do MPD</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Evelise Pedroso Teixeira Prado Vieira<br>
															<span class="white">Procuradora</span>
														</h4>
														<p class="dark-blue">Procuradora de Justiça MP-SP, Mestre em Direito Constitucional pela PUC, ex–integrante do Conselho Superior do Ministério Público de São Paulo, escritora e membro do MPD</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Fábio Bastos Stica<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador da Justiça MP-RR, ex-Procurador-Geral de Justiça PGJ-RR, Conselheiro do Conselho Nacional do Ministério Público (CNMP) e membro do MPD</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Fábio George Cruz da Nóbrega<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador da República e Conselheiro do Conselho Nacional do Ministério Público</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Fabíola Sucasas Negrão Covas<br>
															<span class="white">Promotora</span>
														</h4>
														<p class="dark-blue">Promotora de Justiça MP-SP, formou-se no Curso de Gestão em Segurança Pública do NEV-USP, integra o Grupo de Enfrentamento à Violência Doméstica e Diretora da APMP-Mulher</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Felipe Locke<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador de Justiça MP-SP, Presidente da Associação Paulista do Ministério Público (APMP) e ex-Conselheiro do Conselho Nacional de Justiça</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Francisco Sales de Albuquerque<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador de Justiça MP-PE, ex-Procurador-Geral de Justiça de Pernambuco, ex-Presidente CNPG, ex- Advogado do Gabinete de Assessoria Jurídica às Organizações Populares (GAJOP) e membro do MPD</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Gianpaolo Smanio<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador-Geral de Justiça de São Paulo, Mestre e Doutor em Direito das Relações Sociais pela PUC e Primeiro-Vice-Presidente da Associação Paulista do Ministério Público</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Gil Castelo Branco<br>
															<span class="white">Economista</span>
														</h4>
														<p class="dark-blue">Fundador e Secretário-Geral da Associação Contas Abertas, presidente da Empresa Brasileira de Planejamento e Transportes - GEIPOT e consultor da ONU</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Heródoto Barbeiro<br>
															<span class="white">Jornalista</span>
														</h4>
														<p class="dark-blue">Âncora do Jornal da Record News e do R7. Autor de Manual de Jornalismo (Elsevier). Provocações Corporativas (Altabooks), Midia Training (Saraiva), Budismo (Bellaletra), Buda (Madras)</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">José Álvaro Moysés<br>
															<span class="white">Cientista</span>
														</h4>
														<p class="dark-blue">Político, jornalista, escritor, Graduado em Ciências Sociais pela USP, Mestre em Política e Governo pela University of Essex e Doutor em Ciência Política pela USP</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Júlio Marcelo de Oliveira<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador de Contas MP-TCU, Vice-Presidente da Associação Nacional do Ministério Público de Contas (AMPCON) e membro do MPD</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Lauro Machado Nogueira<br>
															<span class="white">Procurador</span>
														</h4>
														<p class="dark-blue">Procurador-Geral de Justiça de Goiás e ex-Presidente do Conselho Nacional de Procuradores-Gerais (CNPG)</p>
													</article>
													<article class="col-md-4">
														<h4 class="green">Leoberto Brancher<br>
															<span class="white">Juiz</span>
														</h4>
														<p class="dark-blue">Juiz de Direito do Rio Grande
															do Sul, Coordenador do Centro Judiciário de Soluções de Conflitos e Cidadania da Comarca de Caxias do Sul e Programa Justiça Restaurativa para o Século 21 do TJ-RS</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Lucieni Pereira<br>
																<span class="white">Auditora</span>
															</h4>
															<p class="dark-blue">Auditora Federal de Controle Externo do Tribunal de Contas da União, especialista em finanças públicas pela Fundação Getúlio Vargas do Rio de Janeiro e Presidente da ANTC</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Luiz Antonio Guimarães Marrey<br>
																<span class="white">Procurador</span>
															</h4>
															<p class="dark-blue">Procurador de Justiça MP-SP, ex-Procurador-Geral da Justiça PGJ-SP, ex-Presidente do CNPG, ex-Secretário de Estado de Justiça e Defesa da Cidadania e co-Fundador e ex-Presidente do MPD</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Maria Amélia Teles<br>
																<span class="white">Socióloga</span>
															</h4>
															<p class="dark-blue">Socióloga, ativista, integrante da Comissão Estadual da Verdade e Dirigente da União de Mulheres de São Paulo</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Maria Tereza Sadek<br>
																<span class="white">Doutora</span>
															</h4>
															<p class="dark-blue">Doutora em Ciência Política pela USP, Pesquisadora sênior, diretora de pesquisas do Centro Brasileiro de Estudos e Pesquisas Judiciais e Professora da USP e Membro da Comissão de Altos Estudos em Administração da Justiça</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Maria Tereza Uille Gomes<br>
																<span class="white">Procuradora</span>
															</h4>
															<p class="dark-blue">Procuradora de Justiça do MP-PR, Conselheira do Conselho Nacional de Políticas Criminais e Penitenciárias, Doutora em Sociologia e Relatora da Comissão de Juristas da Lei de Execução Penal no Senado Federal (PLS 513/2013).</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Nedens Ulisses Freire Vieira<br>
																<span class="white">Procurador</span>
															</h4>
															<p class="dark-blue">Procurador de Justiça MP-MG, Vice-Presidente da CONAMP, ex-Procurador-Geral de Justiça de Minas Gerias e ex-Presidente da Associação de Minas Gerais.</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Paulo Cezar dos Passos<br>
																<span class="white">Procuradora</span>
															</h4>
															<p class="dark-blue">Procurador-Geral de Justiça MP-MS, ex-Defensor Público MS, ex-Presidente da Associação Sul-Mato-Grossense do Ministério Público (ASMMP) e ex-Chefe de Gabinete do Procurador-Geral de Justiça do Estado de MS</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Paulo Afonso Garrido de Paula<br>
																<span class="white">Corregedor-Geral</span>
															</h4>
															<p class="dark-blue">Corregedor-Geral MP-SP, fundador do Movimento do Ministério Público Democrático e ex-Presidente da Associação Brasileira de Magistrados e Promotores de Justiça da Infância e da Juventude.</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Plácido Rios<br>
																<span class="white">Procurador</span>
															</h4>
															<p class="dark-blue">Procurador-Geral de Justiça PGJ-CE, Presidente da Associação Cearense do Ministério Público (ACMP)</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Renato De Vitto<br>
																<span class="white">Defensor Público</span>
															</h4>
															<p class="dark-blue">Defensor Público do 1º Tribunal do Júri da Capital, Diretor-Geral do Departamento Penitenciário Nacional (DEPEN), ex-Procurador do Estado de São Paulo e assessor da Secretaria de Reforma do Judiciário</p>
														</article>
														<article class="col-md-4">
															<h4 class="green">Roberto Livianu<br>
																<span class="white">Promotor</span>
															</h4>
															<p class="dark-blue">Promotor de Justiça MP-SP, Doutor em Direito pela USP, Presidente
																do Instituto Não Aceito Corrupção, ex-Presidente do MPD e membro
																do Conselho Editorial da Revista International Journal of Research
																on Corruption and Democracy</p>
															</article>
															<article class="col-md-4">
																<h4 class="green">Roberto Romano<br>
																	<span class="white">Professor</span>
																</h4>
																<p class="dark-blue">Professor de Ética e Filosofia na UNICAMP</p>
															</article>
															<article class="col-md-4">
																<h4 class="green">Rogério Bastos Arantes<br>
																	<span class="white">Professor</span>
																</h4>
																<p class="dark-blue">Professor Doutor do Departamento de Ciência Política da Universidade de São Paulo</p>
															</article>
															<article class="col-md-4">
																<h4 class="green">Rogério Nascimento<br>
																	<span class="white">Procurador</span>
																</h4>
																<p class="dark-blue">Procurador da República e Conselheiro do Conselho Nacional de Justiça</p>
															</article>
															<article class="col-md-4">
																<h4 class="green">Sabine Righetti<br>
																	<span class="white">Jornalista</span>
																</h4>
																<p class="dark-blue">Jornalista da Folha de S. Paulo, Mestre em Política Científica e Tecnológica UNICAMP, pesquisadora associada ao Laboratório de Estudos Avançados em Jornalismo (Labjor/Unicamp).</p>
															</article>
															<article class="col-md-4">
																<h4 class="green">Salomão Ismail<br>
																	<span class="white">Promotor</span>
																</h4>
																<p class="dark-blue">Promotor de Justiça MP-PE, Presidente da Associação do Ministério Público do Pernambuco (AMP-PE) e membro MPD</p>
															</article>
															<article class="col-md-4">
																<h4 class="green">Samantha Chantal Dobrowolski<br>
																	<span class="white">Procuradora</span>
																</h4>
																<p class="dark-blue">Procuradora da República MPF, Mestre e Doutora em Filosofia
																	do Direito pela UFSC, diretora
																	da Associação Nacional dos Procuradores da República (ANPR)
																	e membro do MPD</p>
																</article>
																<article class="col-md-4">
																	<h4 class="green">Sérgio Franca Adorno de Abreu<br>
																		<span class="white">Cientista Social</span>
																	</h4>
																	<p class="dark-blue">Diretor da Faculdade de Filosofia, Letras e Ciências Humanas da Universidade de São Paulo (FFLCH-USP), Professor Titular em Sociologia da FFLCH e Coordenador Científico do NEV-USP</p>
																</article>
																<article class="col-md-4">
																	<h4 class="green">Sérgio Rabello Tamm Renault<br>
																		<span class="white">Advogado</span>
																	</h4>
																	<p class="dark-blue">Ex-Secretário Nacional da Reforma do Poder Judiciário do Ministério da Justiça, Diretor Vice-Presidente do Instituto Innovare e ex-chefe de Assuntos Jurídicos da Casa Civil</p>
																</article>
																<article class="col-md-4">
																	<h4 class="green">Silvio Caccia Bava<br>
																		<span class="white">Sociólogo</span>
																	</h4>
																	<p class="dark-blue">Diretor e editor-chefe do jornal Le Monde Diplomatique Brasil, membro do Conselho da Cidade
																		de São Paulo e presidente
																		do Conselho de Administração
																		da Action Aid Brasil</p>
																	</article>
																	<article class="col-md-4">
																		<h4 class="green">Tereza Exner<br>
																			<span class="white">Vice-Corregedora-Geral</span>
																		</h4>
																		<p class="dark-blue">Vice-Corregedora-Geral
																			do Ministério Público de São Paulo, Procuradora de Justiça</p>
																		</article>
																		<article class="col-md-4">
																			<h4 class="green">Ubiratan Cazetta<br>
																				<span class="white">Procurador</span>
																			</h4>
																			<p class="dark-blue">Procurador da República,
																				Coordena a Assessoria Jurídica em Tutela Coletiva do Gabinete
																				do PGR e responsável pelo acompanhamento dos debates envolvendo a Convenção da ONU sobre combate a corrupção</p>
																			</article>
																		</div>
																	</section>
																	<section class="row general-info" id="informacoes-gerais">
																		<h2>Informações Gerais</h2>
																		<hr class="title-border">
																		<div class="col-md-12">
																			<article class="col-md-4 white twenty">
																				<br>
																				<br>
																				<br>
																				<h4>Valores da hospedagem</h4>
																				WZHotel<br>
																				<br>
																				Av. Rebouças, 955. Jardins<br>
																				(próx. Avenida Paulista)<br>
																				<br>
																				<a href="tel:551130690000">T: 55 (11) 3069.0000</a><br>
																				<br>
																				<a href="http://www.wzhoteljardins.com.br" target="_blank">www.wzhoteljardins.com.br</a>
																				<br>
																				<br>
																				<br>
																				<br>
																				<br>
																			</article>
																			<article class="col-md-4 green circle">
																				<br>
																				<br>
																				<br>
																				<br>
																				Apto Executivo<br>
																				<strong>16m2</strong><br>
																				<br>
																				<strong>Single</strong><br>
																				R$ <strong>280,00</strong> + 5% ISS<br>
																				<span>+ R$ 3,90 taxa turismo</span><br>
																				<br>
																				<strong>Double</strong><br>
																				R$ <strong>320,00</strong> + 5% ISS<br>
																				<span>+ R$ 3,90 taxa turismo</span>
																				<br>
																				<br>
																				<br>
																				<br>
																			</article>
																			<article class="col-md-4 green circle">
																				<br>
																				Apto Luxo<br>
																				<strong>40m2</strong><br>
																				<br>
																				<strong>Single</strong><br>
																				R$ <strong>308,00</strong> + 5% ISS<br>
																				<span>+ R$ 3,90 taxa turismo</span><br>
																				<br>
																				<strong>Double</strong><br>
																				R$ <strong>348,00</strong> + 5% ISS<br>
																				<span>+ R$ 3,90 taxa turismo</span><br>
																				<br>
																				<strong>Triplo</strong><br>
																				R$ <strong>407,00</strong> + 5% ISS<br>
																				<span>+ R$ 3,90 taxa turismo</span>
																				<br><br><br>
																			</article>
																		</div>
																	</section>
<!--<section class="row sponsors">
<div class="container-congresso-mpd">
<h2>Patrocinadores e Apoiadores</h2>
<hr class="title-border" style="border: #002439;">
<ul class="plans">
<li>&nbsp;</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<li class="porto"><img src="img/porto-seguro.png" /></li>
<li class="bradesco"><img src="img/bradesco-saude.png" /></li>
<li class="sulamerica"><img src="img/sulamerica.png" /></li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
</ul>
</div>
</section>-->
<section class="row contact" id="contato">
	<div class="container-congresso-mpd">
		<h2>Contato</h2>
		<hr class="title-border">
		<center><p class="white">Esta área é reservada para você!<br>
			Entre em contato conosco, teremos enorme prazer em ajudar a esclarecer suas dúvidas.<br><br></p>
		</center>
		<?php
		if( isSet($msg) )
			echo '<div style="color: #ffffff; font-size: 20px; font-weight: 700;"><center><span class="msg">'.$msg.'</span></center></div>';
else { // só mostra o form se não existir a mensagem de obrigado
	?>
	<form action="" method="post">
		<input type="hidden" name="form_name" value="contato">
		<ul class="col-md-12">
			<li class="col-md-4"><input type="text" placeholder="Nome" name="nome" /></li>
			<li class="col-md-4"><input type="email" placeholder="E-mail" name="email" /></li>
			<li class="col-md-4"><input type="text" placeholder="Telefone" name="tel" /></li>
			<li class="col-md-12">
				<textarea placeholder="Mensagem" name="mensagem"></textarea>
				<center><button type="submit">ENVIAR</button></center>
			</li>
			<li class="col-md-12 white twenty"><input id="mailing" name="mailing" type="checkbox" /><label for="mailing">Adicionar ao mailing</label></li>
		</ul>
	</form>
	<?php
} // fecha else
?>
<ul class="col-md-12">
	<li class="col-md-6 twenty-four">
		<span class="green">ou</span>
		<br><br>
		<span class="white">Informações sobre o Congresso
			<br><br>
			Telefone: (11) 3241.4313 / (11)3106-9680<br>
			E-mail: mpd@mpd.org.br<br>
			Website: www.mpd.org.br</span>
			<br><br><br>
		</li>
		<li class="col-md-6 twenty-four">
			<br><br><br><br><br>
			<span class="white">Horário do atendimento</span><br>
			<span class="green">Segunda a sexta das 9h as 18h</span>
			<br><br>
		</li>
	</ul>
</div>
</section>
<section class="row discount">
	<div class="container-congresso-mpd">
		<center>
			<a href="http://www.automacaoperfecta.com.br/sistema/mpd/usuario/index.asp?codigo=1" target="_blank"><img src="img/desconto-62.png" class="img-mobile" border="0" alt="" /></a>
		</center>
	</div>
</section>
<section class="row social">
	<div class="container-congresso-mpd">
		<ul>
			<li id="mpd"><a href="http://mpd.org.br" target="_blank">MPD</a></li>
			<li id="facebook"><a href="https://www.facebook.com/MPDemocratico" target="_blank">Facebook</a></li>
			<li id="twitter"><a href="http://twitter.com/mpdemocratico" target="_blank">Twitter</a></li>
		</ul>
	</div>
</section>
<footer class="row">
	<div class="container-congresso-mpd">
		<div class="col-md-10">
			<ul class="col-md-12">
				<li><a href="#home">home</a></li>
				<li>|</li>
				<li><a href="#sobre">sobre</a></li>
				<li>|</li>
				<li><a href="#inscricoes">inscrições</a></li>
				<li>|</li>
				<li><a href="#metodologia">metodologia</a></li>
				<li>|</li>
				<li><a href="#programacao">programação</a></li>
				<li>|</li>
				<li><a href="#palestrantes">palestrantes</a></li>
				<li>|</li>
				<li><a href="#informacoes-gerais">informações gerais</a></li>
				<li>|</li>
				<li><a href="#contato">contato</a></li>
			</ul>

			<ul class="col-md-12">
				<li class="img-mailing-footer"><img src="img/faca-parte-mailing-2.png" border="0" alt="" /></li>
				<li>
					<form action="" method="POST">
						<input type="hidden" name="form_name" value="mailing">
						<input type="email" name="email" placeholder="E-mail" />
						<button type="submit">OK</button>
					</form>
				</li>
			</ul>
			<span class="copyright">COPYRIGHT - 2016 CONGRESSOMPD.COM.BR TODOS OS DIREITOS RESERVADOS</span>
		</div>
		<div class="col-md-2">
			<a href="" class="bt-back-top"><img src="img/back-top.png" border="0" /></a>
		</div>
	</div>
</footer>
</div> <!-- /container -->
<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../vendor/jquery.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/docs.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script type="text/javascript">
		$('.bt-back-top').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 600);
			return false;
		});
	</script>
</body>
</html>
