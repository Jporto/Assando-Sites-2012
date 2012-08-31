<!-- footer -->
<footer>
	<div class="wrap">
		<!-- about -->
		<div class="about">
			<?php echo $this->Html->tag('h1', $this->Html->link(Configure::read('Site.title'), '/')) . PHP_EOL ?>

			<small class="cakephp">O <a href="http://cakephp.org/" rel="external" target="_blank">CakePHP</a>™ é de propriedade da <a href="http://cakefoundation.org/" title="CakePHP Software Foundation" rel="external">CSF</a>® e a mesma não tem relação com este curso ou seu conteúdo</small>
		</div>
		<!-- /about -->

		<!-- credits -->
		<div class="credits">
			<ul class="social">
				<li class="google-plus"></li>
				<li class="twitter"></li>
				<li class="facebook"></li>
			</ul>

			<small>&copy; Assando Sites 2011 &ndash; todos os direitos reservados</small>

			<p>Desenvolvimento por <?php echo $this->Html->link('Thiago Belem', 'http://thiagobelem.net/', array('title' => 'Desenvolvedor', 'rel' => 'author')) ?>, design e ilustrações por <?php echo $this->Html->link('Leonardo Zem', 'http://www.wupdesign.com/', array('title' => 'Designer e Ilustrador', 'rel' => 'external')) ?></p>
		</div>
		<!-- /credits -->
	</div>
</footer>
<!-- /footer -->