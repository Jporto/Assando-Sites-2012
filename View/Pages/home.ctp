		<!-- inscricoes -->
		<section class="inscricoes">
			<div class="wrapper">
				<h1>Próxima turma</h1>

				<div class="precos">
					<p class="valor">12x sem juros de <strong><span>R$</span> 37,50</strong> <span class="a-vista">ou R$ 450,00 à vista</span></p>

					<p>Fim das inscrições: <time>15/07</time></p>
					<p>Início das aulas: <time>15/07</time></p>
				</div>

				<a href="#" class="botao">
					<h2>Inscreva-se</h2>
					<p>Inscreva-se agora e ganhe 20% de desconto!</p>
				</a>
			</div>
		</section>
		<!-- /inscricoes -->

		<div class="wrapper">

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