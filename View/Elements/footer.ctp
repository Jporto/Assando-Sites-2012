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
				<li class="google-plus">
					<div class="g-plusone" data-size="medium" data-href="http://assando-sites.com.br/"></div>
				</li>

				<li class="twitter">
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://assando-sites.com.br/" data-text="Assando Sites - Curso online de #CakePHP" data-via="<?php echo Configure::read('Social.Twitter') ?>" data-lang="pt" data-related="<?php echo Configure::read('Social.Twitter') ?>">Tweetar</a>
				</li>

				<li class="facebook">
					<div class="fb-like" data-href="http://facebook.com/<?php echo Configure::read('Social.Facebook') ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-font="lucida grande"></div>
				</li>
			</ul>

			<small>&copy; <strong>Assando Sites</strong> 2011 &ndash; Todos os direitos reservados.</small>

			<p>Design e ilustrações por <?php echo $this->Html->link('Leonardo Zem', 'http://www.wupdesign.com/', array('title' => 'Designer e Ilustrador', 'rel' => 'external')) ?>, implementação e desenvolvimento por <?php echo $this->Html->link('Thiago Belem', 'http://thiagobelem.net/', array('title' => 'Desenvolvedor', 'rel' => 'author')) ?></p>
		</div>
		<!-- /credits -->
	</div>
</footer>
<!-- /footer -->