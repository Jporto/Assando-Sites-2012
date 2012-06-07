<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assando Sites</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">

	<?php echo $this->Html->css($this->Html->url('/css/estilo.less', true), 'stylesheet/less') ?>
	<?php echo $this->Html->css($this->Html->url('/css/mobile.less', true), 'stylesheet/less', array('media' => 'screen and (max-width: 600px)')) ?>

	<?php echo $this->Html->script('less') ?>
	<script>less.watch()</script>
</head>
<body role="document">

	<!-- header -->
	<header role="heading">
		<div class="limite">

			<hgroup role="banner">
				<h1><a href="#" class="logo">Assando Sites</a></h1>
				<h2>Desenvolver com CakePHP é tão fácil quanto assar um bolo!</h2>
			</hgroup>

			<!-- navegação -->
			<nav role="navigation">
				<ul>
					<li><a href="#">Sobre o curso</a></li>
					<li><a href="#">CakePHP</a></li>
					<li><a href="#">Depoimentos</a></li>
					<li><a href="#">Inscreva-se!</a></li>
				</ul>
			</nav>
			<!-- /navegação -->

			<!-- sobre -->
			<section class="sobre">
				<p><strong>Assando Sites</strong> é um curso prático de <abbr title="CakePHP, um framework de desenvolvimento rápido em PHP">CakePHP</abbr>, onde você vai aprender a desenvolver sites e portais de forma <strong>rápida e eficiente</strong>.</p>

				<h5>O curso é composto por:</h5>
				<ul class="recursos">
					<li class="online">Aulas online e ao vivo</li>
					<li class="slides">Slides com todo o conteúdo do curso</li>
					<li class="video">Compartilhamento de tela</li>
					<li class="audio">Áudio durante todas as aulas</li>
				</ul>				
			</section>
			<!-- /sobre -->

		</div>
	</header>
	<!-- /header -->

	<!-- principal -->
	<section role="main">
		<?php echo $this->fetch('content') ?>
	</section>
	<!-- /principal -->

	<!-- rodapé -->
	<footer role="contentinfo">
		<div class="limite">

			<!-- pagamento -->
			<div class="pagamento">
				pagamento
			</div>
			<!-- pagamento -->

			<!-- créditos -->
			<div class="creditos">

				<!-- navegação -->
				<nav role="navigation">
					<ul>
						<li><a href="#">Sobre o curso</a></li>
						<li><a href="#">CakePHP</a></li>
						<li><a href="#">Depoimentos</a></li>
						<li><a href="#">Inscreva-se!</a></li>
					</ul>
				</nav>
				<!-- /navegação -->

				<p class="cakephp">O <abbr title="CakePHP, um framework de desenvolvimento rápido em PHP">CakePHP</abbr>&trade; é de propriedade da <a href="#" title="CakePHP Software Foundation">CSF</a>&reg; e a mesma não tem relação com este curso ou seu conteúdo</p>
			</div>
			<!-- créditos -->

		</div>
	</footer>
	<!-- /rodapé -->

</body>
</html>