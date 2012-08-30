<!DOCTYPE html>
<!--[if lt IE 7]>      <html dir="ltr" lang="pt-br" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html dir="ltr" lang="pt-br" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html dir="ltr" lang="pt-br" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="pt-br" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo Configure::read('Site.title') ?></title>

	<meta name="description" content="<?php echo Configure::read('Site.description') ?>">
	<meta name="viewport" content="width=device-width">

	<?php echo $this->Html->css($this->Html->url('/css/estilo.less', true), 'stylesheet/less') . PHP_EOL ?>
	<?php echo $this->Html->script('vendor/less-1.3.0.min.js') . PHP_EOL ?>
	<?php echo $this->Html->script('vendor/modernizr-2.6.1.min.js') . PHP_EOL ?>
</head>
<body>
	<?php echo $this->fetch('content') ?>

	<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js') ?>
	<?php echo $this->Html->script(array('plugins.js', 'main.js')) ?>


	<?php echo $this->element('google-analytics', array('account' => 'UA-XXX')) ?>
</body>
</html>