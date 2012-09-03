<!-- header -->
<header>
	<div class="wrap">
		<hgroup>
			<?php echo $this->Html->tag('h1', $this->Html->link(Configure::read('Site.title'), '/')) . PHP_EOL ?>
			<?php echo $this->Html->tag('h2', Configure::read('Site.description')) . PHP_EOL ?>
		</hgroup>

		<?php echo $this->element('menu') ?>

		<div class="nuvens">
		<?php
		for ($i = 1; $i <= 5; $i++) {
			$nuvem = rand(1, 2);

			$class = 'nuvem nuvem-' . $i;
			$class .= ' ' . (($i <= rand(2, 3)) ? 'nuvem-esquerda' : 'nuvem-direita');

			$width = rand(60, 130);

			$style = 'top: ' . rand(10, 60) . '%';
		?>
		<?php echo $this->Html->image("nuvem{$nuvem}.png", compact('class', 'width', 'style')) ?>
		<?php } ?>
		</div>
	</div>
</header>
<!-- /header -->