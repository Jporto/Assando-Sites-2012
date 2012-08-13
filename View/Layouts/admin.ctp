<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Painel de Controle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php echo $this->Html->css(array('bootstrap.min', 'bootstrap-responsive.min')) ?>
	<?php echo $this->Html->css('admin') . PHP_EOL ?>
	<?php echo $this->fetch('css') . PHP_EOL ?>
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

	<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js') . PHP_EOL ?>
	<?php echo $this->Html->script('bootstrap.min') . PHP_EOL ?>
	<?php echo $this->fetch('js') . PHP_EOL ?>

</body>
</html>