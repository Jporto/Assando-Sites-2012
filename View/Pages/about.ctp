<?php echo $this->start('header') ?>
<!-- sobre -->
<section class="sobre modulo basico">
	<h1>Módulo Básico</h1>
	<p>Aqui você aprende tudo o que precisa pra criar um site de forma <strong>rápida</strong> e <strong>segura</strong>.</p>

	<?php echo $this->element('next-course-small', array('advanced' => false)) ?>
</section>
<!-- /sobre -->
<?php echo $this->end() ?>

<div class="wrapper">

	<h2>Conteúdo do curso</h2>
	<p>Todo o curso é dividido em <strong>cinco aulas</strong>, durante as quais tentaremos abordar os seguintes assuntos:</p>

	<div class="col-1">
		<h4>1. Introdução e conceitos gerais</h4>
		<ul>
			<li>História do PHP</li>
			<li>O que são <em>Frameworks</em></li>
			<li>Por que usar <em>Frameworks</em></li>
			<li>O que é o <strong>MVC</strong> (Model - View - Controller)</li>
		</ul>

		<h4>2. Instalação e configuração</h4>
		<ul>
			<li>Download e instalação do ambiente de desenvolvimento</li>
			<li>Download e instalação do <strong>CakePHP</strong></li>
			<li>Estrutura de pastas</li>
			<li>Configuração inicial do <strong>CakePHP</strong></li>
			<li>Conexão ao banco de dados</li>
			<li>Configurações de segurança</li>
		</ul>

		<h4>3. Páginas estáticas e rotas</h4>
		<ul>
			<li>Criação de páginas estáticas</li>
			<li>Conceito de URLs amigáveis</li>
			<li>Criação de URLs amigáveis customizadas</li>
		</ul>

		<h4>4. Models</h4>
		<ul>
			<li>Conceito de <em>models</em> (camada M)</li>
			<li>Convenção de nomeclatura dos <em>models</em> e tabelas</li>
			<li>Criando e configurando <em>models</em></li>
			<li><em lang="en" title="Fontes de dados">Datasources</em> (Twitter, Facebook e	etc.)</li>
			<li><em lang="en" title="Comportamentos">Behaviors</em></li>
			<li>Validação de dados</li>
		</ul>

	</div>
	<div class="col-2">

		<h4>5. Controllers</h4>
		<ul>
			<li>Conceito de <em>controllers</em> (camada C)</li>
			<li>Convenção de nomeclatura dos <em>controllers</em></li>
			<li>Criando e configurando <em>controllers</em></li>
			<li><em lang="en" title="Componentes">Components</em> (Session, Email, Cookies e etc.)</li>
		</ul>

		<h4>6. Views</h4>
		<ul>
			<li>Conceito de <em>views</em> (camada V)</li>
			<li>Convenção de nomeclatura das <em>views</em></li>
			<li>Criando e carregando <em>views</em></li>
			<li>Criando e utilizando <em>Layouts</em> e <em>Elements</em></li>
			<li><em lang="en" title="Ajudantes">Helpers</em> (HTML, Form e etc.)</li>
		</ul>

		<h4>7. Painel de controle</h4>
		<ul>
			<li>Criando um painel de controle seguro</li>
			<li>Controle de acesso</li>
		</ul>

		<h4>8. Publicação e versionamento</h4>
		<ul>
			<li>Publicação do site via <strong>FTP</strong></li>
			<li>Versionamento de arquivos utilizando <strong>Git</strong> no GitHub</li>
		</ul>

	</div>

</div>