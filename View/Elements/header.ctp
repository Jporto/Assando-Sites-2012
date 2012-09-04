<!-- header -->
<header>
	<div class="wrap">
		<hgroup>
			<?php echo $this->Html->tag('h1', $this->Html->link(Configure::read('Site.title'), '/')) . PHP_EOL ?>
			<?php echo $this->Html->tag('h2', Configure::read('Site.description')) . PHP_EOL ?>
		</hgroup>

		<?php echo $this->element('menu') ?>

		<?php echo $this->fetch('header-content') ?>

		<!-- ilustrações -->
		<div class="mesa">
			<div class="ilustracao ingredientes"><!-- --></div>
			<div class="ilustracao gnomos-bolo">
				<div class="ilustracao gnomo-esquerda" data-blink="true"><!-- --></div>
				<div class="ilustracao bolo"><!-- --></div>
				<div class="ilustracao gnomo-direita" data-blink="true"><!-- --></div>
			</div>
			<div class="ilustracao cerejas"><!-- --></div>
		</div>
		<!-- /ilustrações -->
	</div>

	<!-- nuvens -->
	<?php echo $this->element('nuvens') ?>
	<!-- /nuvens -->
</header>
<!-- /header -->