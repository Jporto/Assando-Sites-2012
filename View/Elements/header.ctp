<!-- header -->
<header>
	<div class="wrap">
		<hgroup>
			<?php echo $this->Html->tag('h1', $this->Html->link(Configure::read('Site.title'), '/')) . PHP_EOL ?>
			<?php echo $this->Html->tag('h2', Configure::read('Site.description')) . PHP_EOL ?>
		</hgroup>

		<?php echo $this->element('menu') ?>
	</div>
</header>
<!-- /header -->