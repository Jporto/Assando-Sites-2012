<div class="description">
	<h2>O curso é dividido em dois módulos...</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<article class="basic">
	<h1><span>Módulo <strong>Básico</strong></span></h1>
	<p><strong>Cinco aulas</strong> de <strong>3 horas</strong> cada, aos domingos</p>

	<?php $Course = $this->requestAction(array('controller' => 'courses', 'action' => 'nextCourse')) ?>

	<span class="price"><?php printf('R$ <strong>%d</strong>,%02d', (int)$Course['Course']['price'], (int)($Course['Course']['price'] % 1)) ?></span>
	<span class="credit"><?php printf('Ou 12x de %s sem juros', $this->Number->currency($Course['Course']['price'] / 12, 'BRL')) ?></span>

	<?php if ($Course['Course']['status_id'] == Status::INSCRICOES_ABERTAS) { ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'Inscreva-se agora'), array('controller' => 'pages', 'action' => 'display', 'about'), array('class' => 'button green', 'escape' => false)) ?>
	<?php } else { ?>
	<h3 class="warning">Aguarde! Novas turmas em breve</h3>
	<?php } ?>

	<h2><span>O que você vai aprender?</span></h2>
	<ul>
		<li>
			<span class="badge basic eggs"></span>
			<h3>Introdução e conceitos gerais</h3>
			<ol>
				<li>História do PHP</li>
				<li>O que são <em>Frameworks</em></li>
				<li>Por que usar <em>Frameworks</em></li>
				<li>O que é o <strong>MVC</strong> (Model - View - Controller)</li>
			</ol>
		</li>
		<li>
			<span class="badge basic milk"></span>
			<h3>Instalação e configuração</h3>
			<ol>
				<li>Download e instalação do ambiente de desenvolvimento</li>
				<li>Download e instalação do <strong>CakePHP</strong></li>
				<li>Estrutura de pastas</li>
				<li>Configuração inicial do <strong>CakePHP</strong></li>
				<li>Conexão ao banco de dados</li>
				<li>Configurações de segurança</li>
			</ol>
		</li>
		<li>
			<span class="badge basic flour"></span>
			<h3>Páginas estáticas e rotas</h3>
			<ol>
				<li>Criação de páginas estáticas</li>
				<li>Conceito de URLs amigáveis</li>
				<li>Criação de URLs amigáveis customizadas</li>
			</ol>
		</li>
		<li>
			<span class="badge basic butter"></span>
			<h3>Models</h3>
			<ol>
				<li>Conceito de <em>models</em> (camada M)</li>
				<li>Convenção de nomeclatura dos <em>models</em> e tabelas</li>
				<li>Criando e configurando <em>models</em></li>
				<li><em lang="en" title="Fontes de dados">Datasources</em> (Twitter, Facebook e etc.)</li>
				<li><em lang="en" title="Comportamentos">Behaviors</em></li>
				<li>Validação de dados</li>
			</ol>
		</li>
		<li>
			<span class="badge basic spoons"></span>
			<h3>Controllers</h3>
			<ol>
				<li>Conceito de <em>controllers</em> (camada C)</li>
				<li>Convenção de nomeclatura dos <em>controllers</em></li>
				<li>Criando e configurando <em>controllers</em></li>
				<li><em lang="en" title="Componentes">Components</em> (Session, Email, Cookies e etc.)</li>
			</ol>
		</li>
		<li>
			<span class="badge basic recipient"></span>
			<h3>Views</h3>
			<ol>
				<li>Conceito de <em>views</em> (camada V)</li>
				<li>Convenção de nomeclatura das <em>views</em></li>
				<li>Criando e carregando <em>views</em></li>
				<li>Criando e utilizando <em>Layouts</em> e <em>Elements</em></li>
				<li><em lang="en" title="Ajudantes">Helpers</em> (HTML, Form e etc.)</li>
			</ol>
		</li>
		<li>
			<span class="badge basic microwave"></span>
			<h3>Painel de controle</h3>
			<ol>
				<li>Criando um painel de controle seguro</li>
				<li>Controle de acesso</li>
			</ol>
		</li>
		<!--
		<li>
			<span class="badge basic cake"></span>
			<h3>Publicação e versionamento</h3>
			<ol>
				<li>Publicação do site via <strong>FTP</strong></li>
				<li>Versionamento de arquivos utilizando <strong>Git</strong> no GitHub</li>
			</ol>
		</li>
		-->
	</ul>
</article>

<article class="advanced">
	<h1><span>Módulo <strong>Avançado</strong></span></h1>
	<p><strong>Quatro aulas</strong> de <strong>3 horas</strong> cada, aos sábados</p>

	<?php $Course = $this->requestAction(array('controller' => 'courses', 'action' => 'nextCourse'), array('pass' => array(true))) ?>

	<span class="price"><?php printf('R$ <strong>%d</strong>,%02d', (int)$Course['Course']['price'], (int)($Course['Course']['price'] % 1)) ?></span>
	<span class="credit"><?php printf('Ou 12x de %s sem juros', $this->Number->currency($Course['Course']['price'] / 12, 'BRL')) ?></span>

	<?php if ($Course['Course']['status_id'] == Status::INSCRICOES_ABERTAS) { ?>
	<?php echo $this->Html->link($this->Html->tag('span', 'Inscreva-se agora'), array('controller' => 'pages', 'action' => 'display', 'about'), array('class' => 'button green', 'escape' => false)) ?>
	<?php } else { ?>
	<h3 class="warning">Aguarde! Novas turmas em breve</h3>
	<?php } ?>

	<h2><span>O que você vai aprender?</span></h2>
	<ul>
		<li>
			<span class="badge advanced dough"></span>
			<h3>ACL – <em>Access Control List</em></h3>
			<ol>
				<li>Conceito de <strong>ACO</strong>s</li>
				<li>Conceito de <strong>ARO</strong>s</li>
				<li>Configurando o ACL</li>
				<li>Definindo os <strong>grupos de acesso</strong> (administradores, usuários e etc.)</li>
				<li>Protegendo a sua aplicação com <strong>AuthComponent</strong> + <strong>ACL</strong></li>
			</ol>
		</li>
		<li>
			<span class="badge advanced cakes"></span>
			<h3>Plugins</h3>
			<ol>
				<li>Conceito de Plugins</li>
				<li>Exemplos de Plugins (<em>Cake pt-BR</em> e <em>Migrations</em>)</li>
				<li>Instalando Plugins</li>
			</ol>
		</li>
		<li>
			<span class="badge advanced cake"></span>
			<h3>Components</h3>
			<ol>
				<li>Conceito de <span lang="en" title="Componentes">Components</span></li>
				<li>Exemplos de <span lang="en" title="Componentes">Components</span> (<em>Security</em>, <em>Request Handling</em> e <em>Pagination</em>)</li>
				<li>Criando <span lang="en" title="Componentes">Components</span></li>
			</ol>
		</li>
		<li>
			<span class="badge advanced eggs-milk"></span>
			<h3>Behaviors</h3>
			<ol>
				<li>Conceito de <span lang="en" title="Comportamentos">Behaviors</span></li>
				<li>Exemplos de <span lang="en" title="Comportamentos">Behaviors</span>	(<em>Sluggable</em> e <em>Containable</em>)</li>
				<li>Criando <span lang="en" title="Comportamentos">Behaviors</span></li>
				<li>AutoUpload <span lang="en" title="Comportamentos">Behavior</span></li>
			</ol>
		</li>
		<li>
			<span class="badge advanced mixer"></span>
			<h3>Otimização</h3>
			<ol>
				<li>Configuração do Cache (<em>FileSystem</em> e <em>Memcached</em>)</li>
				<li>Compressão de CSS</li>
				<li>Compressão de Javascript</li>
				<li>Plugin <em>Asset Compress</em></li>
			</ol>
		</li>
		<li>
			<span class="badge advanced hat"></span>
			<h3>Deploy automatizado</h3>
			<ol>
				<li>Integração via SSH</li>
				<li>Git Hooks</li>
			</ol>
		</li>
	</ul>

</article>