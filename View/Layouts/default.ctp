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
		
		<!-- inscricoes -->
		<section class="inscricoes">
			<div class="limite">
				<h1>Próxima turma</h1>

				<p>Fim das inscrições: <time>15/07</time></p>
				<p>Início das aulas: <time>15/07</time></p>

				<p class="valor">12x sem juros de <strong><span>R$</span> 37,50</strong> <span class="a-vista">ou R$ 450,00 à vista</span></p>

				<a href="#" class="botao">
					<h2>Inscreva-se</h2>
					<p>Inscreva-se agora e ganhe 20% de desconto!</p>
				</a>
			</div>
		</section>
		<!-- /inscricoes -->

		<div class="limite">

			<!-- vantagens -->
			<section class="vantagens">
				<h1>Quais as vantagens do curso?</h1>

				<article role="article">
					<img src="http://placehold.it/160x100" alt="" />
					<h1>Coloque um site no ar em menos de três horas</h1>
					<p>Não tem conversa! É só fazer a primeira aula e você já tem um site no
ar utilizando CakePHP</p>
				</article>

				<article role="article">
					<img src="http://placehold.it/160x100" alt="" />
					<h1>Coloque um site no ar em menos de três horas</h1>
					<p>Não tem conversa! É só fazer a primeira aula e você já tem um site no
ar utilizando CakePHP</p>
				</article>

			</section>
			<!-- /vantagens -->

			<!-- depoimentos -->
			<section class="depoimentos">
				<h1>Quem já participou?</h1>

				<article role="article">
					<blockquote>
						<p><em>"Adquiri conhecimento de como programar de forma rápida e eficiente"</em></p>
						<p>Adquiri conhecimento de como programar de forma rápida e eficiente, aumentando a qualidade do desenvolvimento em pouco tempo de trabalho.</p>
						<cite>Simone Myrrha</cite>
					</blockquote>
				</article>

				<article role="article">
					<blockquote>
						<p><em>"Adquiri conhecimento de como programar de forma rápida e eficiente"</em></p>
						<p>Adquiri conhecimento de como programar de forma rápida e eficiente, aumentando a qualidade do desenvolvimento em pouco tempo de trabalho.</p>
						<cite>Simone Myrrha</cite>
					</blockquote>
				</article>

			</section>
			<!-- /depoimentos -->

			<!-- professor -->
			<div class="professor">
				<h1>Quem oferece o curso?</h1>

				<article role="article">
					<img src="http://placehold.it/100" alt="" />
					<h1>Thiago Belem - <a href="#">@TiuTalk</a></h1>
					<p>Não tem conversa! É só fazer a primeira aula e você já tem um site no
ar utilizando CakePHP</p>
				</article>
			</div>
			<!-- /professor -->

			<!-- newsletter -->
			<?php echo $this->Form->create('Newsletter', array('class' => 'newsletter', 'inputDefaults' => array('div' => false))) ?>
				<fieldset>
					<legend>Quer ser avisado sobre as promoções novas turmas do Assando Sites?</legend>

					<?php echo $this->Form->input('Newsletter.nome', array('label' => 'Nome', 'placeholder' => 'Digite seu nome')) ?>
					<?php echo $this->Form->input('Newsletter.email', array('label' => 'Email', 'placeholder' => 'Digite seu email', 'type' => 'email')) ?>

					<?php echo $this->Form->submit('OK', array('div' => false)) ?>
				</fieldset>
			<?php echo $this->Form->end() ?>
			<!-- /newsletter -->

		</div>
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