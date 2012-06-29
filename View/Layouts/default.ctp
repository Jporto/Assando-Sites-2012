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
				<p>O pagamento pode ser feito via PagSeguro ou Paypal:</p>

				<span class="pagamento-flag pagamento-paypal" title="PayPal">PayPal</span>
				<span class="pagamento-flag pagamento-pagseguro" title="PagSeguro">PagSeguro</span>
				<span class="pagamento-flag pagamento-visa" title="Visa">Visa</span>
				<span class="pagamento-flag pagamento-mastercard" title="MasterCard">MasterCard</span>
				<span class="pagamento-flag pagamento-diners" title="Diners">Diners</span>
				<span class="pagamento-flag pagamento-americanexpress" title="American Express">American Express</span>
				<span class="pagamento-flag pagamento-hipercard" title="Hipercard">Hipercard</span>
				<span class="pagamento-flag pagamento-aura" title="Aura">Aura</span>
				<span class="pagamento-flag pagamento-elo" title="Elo">Elo</span>
				<!-- <span class="pagamento-flag pagamento-plenocard" title="PLENOCard">PLENOCard</span>
				<span class="pagamento-flag pagamento-personalcard" title="PersonalCard">PersonalCard</span>
				<span class="pagamento-flag pagamento-brasilcard" title="Brasilcard">Brasilcard</span>
				<span class="pagamento-flag pagamento-fortbrasil" title="FORTBRASIL">FORTBRASIL</span>
				<span class="pagamento-flag pagamento-oipaggo" title="Oi Paggo">Oi Paggo</span> -->
				<span class="pagamento-flag pagamento-bradesco" title="Banco Bradesco">Banco Bradesco</span>
				<span class="pagamento-flag pagamento-itau" title="Banco Itaú">Banco Itaú</span>
				<span class="pagamento-flag pagamento-bb" title="Banco do Brasil">Banco do Brasil</span>
				<!-- <span class="pagamento-flag pagamento-banrisul" title="Banco Banrisul">Banco Banrisul</span> -->
				<span class="pagamento-flag pagamento-hsbc" title="Banco HSBC">Banco HSBC</span>
				<span class="pagamento-flag pagamento-boleto" title="Boleto">Boleto</span>
				<!-- <span class="pagamento-flag pagamento-pincode" title="PinCode PagSeguro">PinCode</span> -->
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