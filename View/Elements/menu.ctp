<nav>
	<ul>
		<li><?php echo $this->Html->link('Conteúdo do curso', array('controller' => 'pages', 'action' => 'display', 'about')) ?></li>
		<li><?php echo $this->Html->link('Contato', array('controller' => 'pages', 'action' => 'display', 'contact')) ?></li>
		<li class="login"><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')) ?></li>

		<li class="social twitter"><?php echo $this->Html->link('Twitter', '#') ?></li>
		<li class="social facebook"><?php echo $this->Html->link('Facebook', '#') ?></li>
	</ul>
</nav>