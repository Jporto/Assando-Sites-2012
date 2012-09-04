<?php $this->start('header-content') ?>
<div class="about">
	<h3><span class="comment">/**</span> Desenvolver com <strong class="cakephp">CakePHP</strong> é tão fácil quanto <span class="bolo">assar um bolo</span>! <span class="comment">*/</span></h3>
	<p>Assando Sites é um <strong>curso prático de CakePHP</strong> onde você vai aprender a desenvolver sites e portais de forma rápida e eficiente.</p>
	<?php echo $this->Html->link($this->Html->tag('span', 'Saiba mais sobre o curso'), array('controller' => 'pages', 'action' => 'display', 'about'), array('class' => 'botao botao-verde', 'escape' => false)) ?>
</div>
<?php $this->end() ?>