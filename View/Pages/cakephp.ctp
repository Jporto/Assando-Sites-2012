<?php echo $this->start('header') ?>
<!-- sobre -->
<section class="sobre cakephp">
	<?php echo $this->Html->image('http://cakephp.org/img/logo/cakephp_logo_250_trans.png', array('alt' => 'CakePHP', 'width' => 160)) ?>
	<h1>Sobre o CakePHP</h1>
	<p>O <a href="http://www.cakephp.org/" rel="reference external" target="_blank">CakePHP</a>™ é um <a href="http://pt.wikipedia.org/wiki/Framework" rel="reference external" target="_blank"><em>framework</em></a> de <a href="http://pt.wikipedia.org/wiki/Rapid_Application_Development" rel="reference external" target="_blank">desenvolvimento rápido</a> para <a href="http://www.php.net/" rel="reference external" target="_blank">PHP</a>, <a href="http://pt.wikipedia.org/wiki/Licen%C3%83%C2%A7a_MIT" rel="reference external" target="_blank">livre</a> e de <a href="http://pt.wikipedia.org/wiki/C%C3%83%C2%B3digo_aberto" rel="reference external" target="_blank">código aberto</a>. Seu principal objetivo é permitir que
você trabalhe de forma estruturada e rápida sem perder a flexibilidade.</p>
</section>
<!-- /sobre -->
<?php echo $this->end() ?>

<div class="wrapper">

	<div class="sobre">
		<p>O CakePHP tira a monotonia do desenvolvimento web. Ele fornece todas as ferramentas que você precisa para começar programando o que realmente deseja: a lógica específica da sua aplicação. Em vez de reinventar a roda a cada vez que se constrói um novo projeto, pegue uma cópia do CakePHP e comece com o interior de sua aplicação.</p>

		<p>O CakePHP possui uma <a href="http://cakephp.lighthouseapp.com/contributors" rel="reference external" target="_blank">equipe de desenvolvedores</a> ativa e uma grande comunidade, trazendo grande valor ao projeto. Além de manter você fora da reinvenção da roda, usar o CakePHP significa que o núcleo da sua aplicação é bem testado e está em constante aperfeiçoamento.</p>

		<p>Texto original: <a href="http://book.cakephp.org/2.0/pt/cakephp-overview/what-is-cakephp-why-use-it.html" rel="external" target="_blank">http://book.cakephp.org/2.0/pt/cakephp-overview/what-is-cakephp-why-use-it.html</a></p>

		<h2 style="margin-top: 50px">Exemplo de código – MVC</h2>

		<p>Veja a seguir o exemplo de um <strong>Controller</strong> de Notícias, onde usamos o <strong>Model</strong> de Notícia para buscar - no banco de dados - as últimas 5 notícias publicadas e enviamos os dados para exibição na <strong>View</strong>:</p>

		<script src="https://gist.github.com/1323060.js" type="text/javascript"></script>

		<p>Com o CakePHP é assim: você não se preocupa com conexão à banco de dados, consultas SQL complicadas, includes ou requires... você vai direto ao ponto, focando na parte mais importante da sua aplicação.</p>
	</div>

	<div class="recursos">
		<h3>Abaixo segue uma pequena lista dos recursos que você poder desfrutar no CakePHP:</h3>
		<ul>
			<li><a href="http://cakephp.org/feeds" rel="reference external" target="_blank">Comunidade</a> ativa e amigável</li>
			<li><a href="http://pt.wikipedia.org/wiki/Licen%C3%83%C2%A7a_MIT" rel="reference external" target="_blank">Licença</a> flexível</li>
			<li>Compatível com o PHP 5.2.9 e superior</li>
			<li><a href="http://pt.wikipedia.org/wiki/CRUD" rel="reference external" target="_blank">CRUD</a> integrado para interação com o banco de dados</li>
			<li><a href="http://en.wikipedia.org/wiki/Scaffold_(programming)" rel="reference external" target="_blank">Scaffolding</a> para criar protótipos</li>
			<li>Geração de código</li>
			<li>Arquitetura <a href="http://pt.wikipedia.org/wiki/MVC" rel="reference external" target="_blank">MVC</a></li>
			<li>Requisições feitas com clareza, URLs e rotas customizáveis</li>
			<li><a href="http://en.wikipedia.org/wiki/Data_validation" rel="reference external" target="_blank">Validações</a> embutidas</li>
			<li><a href="http://en.wikipedia.org/wiki/Web_template_system" rel="reference external" target="_blank">Templates</a> rápidos e flexíveis (Sintaxe PHP, com <cite>helpers</cite>)</li>
			<li><cite>Helpers</cite> para AJAX, JavaScript, formulários HTML e outros</li>
			<li>Componentes de Email, Cookie, Segurança, Sessão, e Tratamento de Requisições</li>
			<li><a href="http://pt.wikipedia.org/wiki/Access_Control_List" rel="reference external" target="_blank">Controle de Acessos</a> flexível</li>
			<li>Limpeza dos dados</li>
			<li>Sistema de <a href="http://en.wikipedia.org/wiki/Web_cache" rel="reference external" target="_blank">Cache</a> flexível</li>
			<li>Localização</li>
			<li>Funciona com pouca ou nenhuma configuração do Apache</li>
		</ul>
	</div>

</div>

<?php
echo $this->element('next-course');