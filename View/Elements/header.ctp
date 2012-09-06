<!-- header -->
<header>
	<div class="wrap">
		<hgroup>
			<?php echo $this->Html->tag('h1', $this->Html->link(Configure::read('Site.title'), '/'), array('title' => Configure::read('Site.title'))) . PHP_EOL ?>
			<?php echo $this->Html->tag('h2', Configure::read('Site.description')) . PHP_EOL ?>
		</hgroup>

		<?php echo $this->element('menu') ?>

		<?php echo $this->fetch('header-content') ?>

		<!-- table -->
		<div class="table">
			<div class="illustration ingredients"><!-- --></div>
			<div class="illustration gnomes-cake">
				<div class="illustration gnome-left" data-blink="true"><!-- --></div>
				<div class="illustration cake"><!-- --></div>
				<div class="illustration gnome-right" data-blink="true"><!-- --></div>
			</div>
			<div class="illustration cherries"><!-- --></div>
		</div>
		<!-- /table -->
	</div>

	<!-- clouds -->
	<?php echo $this->element('clouds') ?>
	<!-- /clouds -->
</header>
<!-- /header -->