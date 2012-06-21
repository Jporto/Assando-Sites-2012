<?php echo $this->start('header') ?>
<!-- sobre -->
<section class="sobre modulo avancado">
	<h1>Módulo Avançado</h1>
	<p>Aqui você aprende tudo o que precisa pra criar um site de forma <strong>rápida</strong> e <strong>segura</strong>.</p>

	<?php echo $this->element('next-course-small', array('advanced' => true)) ?>
</section>
<!-- /sobre -->
<?php echo $this->end() ?>

<div class="wrapper">

	<h2>Conteúdo do curso</h2>
	<p>Todo o curso é dividido em <strong>quatro aulas</strong>, durante as quais tentaremos abordar os seguintes assuntos:</p>

	<div class="col-1">
		<h4>1. ACL – <em>Access Control List</em></h4>
		<ul>
			<li>Conceito de <strong>ACO</strong>s</li>
			<li>Conceito de <strong>ARO</strong>s</li>
			<li>Configuração básica do ACL</li>
			<li>Grupos de acesso (administradores &times; moderadores)</li>
			<li>Utilizando <strong>AuthComponent</strong> +	<strong>ACL</strong></li>
			<li><strong>DbACL</strong> e <strong>PhpACL</strong></li>
		</ul>

		<h4>2. Plugins</h4>
		<ul>
			<li>Conceito de Plugins</li>
			<li>Exemplos de Plugins (<em>MeioUpload</em>)</li>
			<li>Instalando Plugins</li>
		</ul>

		<h4>3. Components</h4>
		<ul>
			<li>Conceito de <span lang="en" title="Componentes">Components</span></li>
			<li>Exemplos de <span lang="en" title="Componentes">Components</span></li>
			<li>Criando <span lang="en" title="Componentes">Components</span> (<em>Carrinho</em>)</li>
		</ul>

	</div>
	<div class="col-2">

		<h4>4. Behaviors</h4>
		<ul>
			<li>Conceito de <span lang="en" title="Comportamentos">Behaviors</span></li>
			<li>Exemplos de <span lang="en" title="Comportamentos">Behaviors</span> (<em>MeioUpload</em>)</li>
			<li>Criando <span lang="en" title="Comportamentos">Behaviors</span> (<em>Sluggable</em> e <em>Containable</em>)</li>
		</ul>

		<h4>5. Otimização</h4>
		<ul>
			<li>Configuração do Cache</li>
			<li>Compressão de CSS</li>
			<li>Compressão de Javascript</li>
			<li>Plugin <em>Asset Compress</em></li>
		</ul>

		<h4>6. Deploy automatizado</h4>
		<ul>
			<li>Integração via SSH</li>
			<li>Git Hooks</li>
		</ul>

	</div>

</div>