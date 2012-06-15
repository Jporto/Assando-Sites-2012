<?php echo $this->element('next-course') ?>

<div class="wrapper">

	<!-- vantagens -->
	<section class="vantagens">
		<h1>Quais as vantagens do curso?</h1>

		<article role="article">
			<img src="http://placehold.it/140x100" alt="" />
			<h1>Coloque um site no ar em menos de três horas</h1>
			<p>Não tem conversa! É só fazer a primeira aula e você já tem um site no
ar utilizando CakePHP</p>
		</article>

		<article role="article">
			<img src="http://placehold.it/140x100" alt="" />
			<h1>Coloque um site no ar em menos de três horas</h1>
			<p>Não tem conversa! É só fazer a primeira aula e você já tem um site no
ar utilizando CakePHP</p>
		</article>

	</section>
	<!-- /vantagens -->

	<!-- depoimentos -->
	<section class="depoimentos">
		<h1><?php echo $this->Html->link('Quem já participou?', array('controller' => 'testmonials', 'action' => 'index')) ?></h1>

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
			<?php echo $this->Html->image('http://placehold.it/100', array('alt' => 'Thiago Belem', 'url' => '#')) ?>
			<h1>Thiago Belem - <a href="#">@TiuTalk</a></h1>
			<p>Não tem conversa! É só fazer a primeira aula e você já tem um site no
ar utilizando CakePHP</p>
		</article>
	</div>
	<!-- /professor -->

	<?php echo $this->element('newsletter') ?>

</div>