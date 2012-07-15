<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Painel de Controle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php echo $this->Html->css('/TwitterBootstrap/docs/assets/css/bootstrap.css') ?>
	<?php echo $this->Html->css('/TwitterBootstrap/docs/assets/css/bootstrap-responsive.css') ?>
	<?php echo $this->Html->css('admin') ?>
	<?php echo $this->fetch('css') ?>
</head>
<body>

	<?php echo $this->element('admin/menu') ?>

	<!-- .container-fluid -->
	<div class="container-fluid">

		<!-- .row-fluid -->
		<div class="row-fluid">

			<?php if ($this->fetch('left-menu')): ?>
			<div class="span3 visible-desktop">
				<div class="well sidebar-nav">
					<?php echo $this->fetch('left-menu') ?>
				</div>
			</div>
			<?php endif ?>

			<div class="<?php echo ($this->fetch('left-menu')) ? 'span9' : 'span12' ?>">
				<?php echo $this->fetch('content') ?>
			</div>
		</div>
		<!-- /.row-fluid -->

		<hr>

		<footer>
			<p>Assando Sites - CakePHP v<?php echo Configure::version() ?></p>
		</footer>

	</div>
	<!-- /.container-fluid -->

	<?php echo $this->element('sql_dump') ?>

	<?php
	echo $this->Html->script(array(
		'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
		'/TwitterBootstrap/js/bootstrap-transition.js',
		'/TwitterBootstrap/js/bootstrap-alert.js',
		'/TwitterBootstrap/js/bootstrap-modal.js',
		'/TwitterBootstrap/js/bootstrap-dropdown.js',
		'/TwitterBootstrap/js/bootstrap-scrollspy.js',
		'/TwitterBootstrap/js/bootstrap-tab.js',
		'/TwitterBootstrap/js/bootstrap-tooltip.js',
		'/TwitterBootstrap/js/bootstrap-popover.js',
		'/TwitterBootstrap/js/bootstrap-button.js',
		'/TwitterBootstrap/js/bootstrap-collapse.js',
		'/TwitterBootstrap/js/bootstrap-carousel.js',
		'/TwitterBootstrap/js/bootstrap-typeahead.js',
	)) ?>

</body>
</html>