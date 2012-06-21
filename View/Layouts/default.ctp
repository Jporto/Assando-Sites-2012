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
<body role="document" class="<?php echo trim($bodyClass) ?>">

	<!-- header -->
	<header role="heading">
		<div class="wrapper">

			<hgroup role="banner">
				<h1><?php echo $this->Html->link('Assando Sites', '/', array('class' => 'logo')) ?></h1>
				<h2>Desenvolver com CakePHP é tão fácil quanto assar um bolo!</h2>
			</hgroup>

			<?php echo $this->element('navigation-menu') ?>

			<?php echo $this->fetch('header') ?>

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