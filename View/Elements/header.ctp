<!-- header -->
<header>
	<div class="wrap">
		<hgroup>
			<?php echo $this->Html->tag('h1', $this->Html->link(Configure::read('Site.title'), '/')) . PHP_EOL ?>
			<?php echo $this->Html->tag('h2', Configure::read('Site.description')) . PHP_EOL ?>
		</hgroup>

		<?php echo $this->element('menu') ?>

		<!-- ilustrações -->
		<div class="mesa">
			<div class="ilustracao ingredientes"><!-- --></div>
			<div class="ilustracao gnomos-bolo">
				<div class="ilustracao gnomo-esquerda"><!-- --></div>
				<div class="ilustracao bolo"><!-- --></div>
				<div class="ilustracao gnomo-direita"><!-- --></div>
			</div>
			<div class="ilustracao cerejas"><!-- --></div>
		</div>
		<!-- /ilustrações -->
	</div>

	<!-- nuvens -->
	<div class="nuvens">
	<?php
	for ($i = 1; $i <= 5; $i++) {
		$nuvem = rand(1, 2);

		$class = 'nuvem nuvem-' . $i;
		$class .= ' ' . (($i <= rand(2, 3)) ? 'nuvem-esquerda' : 'nuvem-direita');

		$width = mt_rand(70, 140);

		$style = 'bottom: ' . mt_rand(20, 80) . '%';
	?>
	<?php echo $this->Html->image("nuvem{$nuvem}.png", compact('class', 'width', 'style')) ?>
	<?php } ?>
	</div>
	<!-- /nuvens -->
</header>
<!-- /header -->