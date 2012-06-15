<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Assando Sites</title>

	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<!-- Styles -->
	<?php echo $this->Html->css($this->Html->url('/css/estilo.less', true), 'stylesheet/less') ?>
	<?php echo $this->Html->css($this->Html->url('/css/mobile.less', true), 'stylesheet/less', array('media' => 'screen and (max-width: 600px)')) ?>
	<?php echo $this->fetch('styles') ?>

	<!-- LESS -->
	<?php echo $this->Html->script('less') ?>
	<script>less.watch()</script>
</head>
<body role="document" class="">

	<!-- header -->
	<header role="heading">
		<div class="wrapper">

			<hgroup role="banner">
				<h1><?php echo $this->Html->link('Assando Sites', '/', array('class' => 'logo')) ?></h1>
				<h2>Desenvolver com CakePHP é tão fácil quanto assar um bolo!</h2>
			</hgroup>

			<?php echo $this->element('navigation-menu') ?>

			<!-- sobre -->
			<section class="sobre">
				<p>O <strong>Assando Sites</strong> é um curso prático de <dfn title="CakePHP, um framework de desenvolvimento rápido em PHP">CakePHP</dfn>, onde você vai aprender a desenvolver sites e portais de forma <strong>rápida e eficiente</strong>.</p>

				<h5>Com aulas online, o curso é ministrado através de:</h5>
				<ul class="recursos">
					<li class="online"><strong>Aulas online</strong><span> e ao vivo</span></li>
					<li class="slides"><strong>Slides</strong><span> com todo o conteúdo do curso</span></li>
					<li class="audio"><strong>Áudio</strong><span> durante todas as aulas</span></li>
					<li class="video"><strong>Vídeo</strong><span> das aulas para download</span></li>
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
		<div class="wrapper">

			<!-- pagamento -->
			<div class="pagamento">
				pagamento
			</div>
			<!-- pagamento -->

			<!-- créditos -->
			<div class="creditos">

				<?php echo $this->element('navigation-menu') ?>

				<p class="cakephp"><dfn title="CakePHP, um framework de desenvolvimento rápido em PHP">CakePHP</dfn>&trade; é de propriedade da <a href="#" title="CakePHP Software Foundation">CSF</a>&reg; e a mesma não tem relação<br />com este curso ou seu conteúdo</p>
			</div>
			<!-- créditos -->

		</div>
	</footer>
	<!-- /rodapé -->

	<?php echo $this->fetch('scripts') ?>
</body>
</html>