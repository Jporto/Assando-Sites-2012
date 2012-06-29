<!-- navegação -->
<nav role="navigation">
	<?php
	echo $this->Html->nestedList(array(
		$this->Html->link('Sobre o curso', array('controller' => 'pages', 'action' => 'display', 'about')),
		$this->Html->link('CakePHP', array('controller' => 'pages', 'action' => 'display', 'cakephp')),
		# $this->Html->link('Depoimentos', array('controller' => 'testmonials', 'action' => 'index')),
		$this->Html->link('Inscreva-se!', '#')
	));
	?>
</nav>
<!-- /navegação -->