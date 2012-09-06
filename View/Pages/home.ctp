<?php $this->start('header-content') ?>
<div class="about">
	<h3><span class="comment">/**</span> Desenvolver com <strong class="cakephp">CakePHP</strong> é tão fácil quanto <span class="cake">assar um bolo</span>! <span class="comment">*/</span></h3>
	<p>Assando Sites é um <strong>curso prático de CakePHP</strong> onde você vai aprender a desenvolver sites e portais de forma rápida e eficiente.</p>
	<?php echo $this->Html->link($this->Html->tag('span', 'Veja o conteúdo do curso'), array('controller' => 'pages', 'action' => 'display', 'about'), array('class' => 'button green', 'escape' => false)) ?>
</div>
<?php $this->end() ?>

<div class="blocks features">
	<article class="block learn">
		<h1>Fácil de aprender</h1>
		<p>As aulas são <strong>on-line</strong>, através de uma ferramenta com áudio, vídeo, chat e apresentação de slides</p>
	</article>

	<article class="block network">
		<h1>Networking garatido</h1>
		<p>Estude com outros profissionais da área e encontre parceiros para qualquer tipo de projeto</p>
	</article>

	<article class="block time">
		<h1>Coloque um site no ar em menos de três horas</h1>
		<p>Não tem conversa! É só fazer a primeira aula e você já tem um site no ar utilizando CakePHP</p>
	</article>
</div>

<div class="block newsletter-badges">
	<div class="newsletter">
		<h3>Quer ser avisado sobre promoções e novas turmas do <strong>Assando Sites</strong>?</h3>
		<?php echo $this->Html->link($this->Html->tag('span', 'Asinar Newsletter'), '#', array('class' => 'button green', 'escape' => false)) ?>
	</div>

	<h4>O <?php echo $this->Html->link('conteúdo', array('controller' => 'pages', 'action' => 'display', 'about')) ?> é divido em dois módulos que se complementam</h4>
	<div class="badges">
		<span class="badge advanced hat" title="Deploy Automatizado"></span>
		<span class="badge basic microwave" title="Painel de Controle"></span>
		<span class="badge basic milk" title="Instalação e Configuração"></span>
		<span class="badge basic cake" title="Publicação e Versionamento"></span>
		<span class="badge advanced mixer" title="Otimização"></span>
		<span class="badge basic flour" title="Rotas"></span>
		<span class="badge advanced bowel" title="ACL"></span>
		<span class="badge advanced cakes" title="Plugins"></span>
	</div>
</div>

<?php $this->Html->css('/js/vendor/tipsy/src/stylesheets/tipsy.css', null, array('block' => 'styles')) ?>
<?php $this->Html->script('vendor/tipsy/src/javascripts/jquery.tipsy.js', array('block' => 'scripts')) ?>