<nav>
	<ul>
		<li><?php echo $this->Html->link('Conteúdo do curso', array('controller' => 'pages', 'action' => 'display', 'about')) ?></li>
		<li><?php echo $this->Html->link('Contato', array('controller' => 'pages', 'action' => 'display', 'contact')) ?></li>
		<li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'login')) ?></li>

		<li><?php echo $this->Html->link('Twitter', '#', array('class' => 'social twitter')) ?></li>
		<li><?php echo $this->Html->link('Facebook', '#', array('class' => 'social facebook')) ?></li>
	</ul>
</nav>