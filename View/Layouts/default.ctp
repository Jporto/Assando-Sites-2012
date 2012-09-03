<!DOCTYPE html>
<html dir="ltr" lang="pt-br" class="no-js">
<head>
	<meta charset="utf-8" />
	<title><?php echo Configure::read('Site.title') ?></title>

	<?php echo $this->Html->meta('description', Configure::read('Site.description')) . PHP_EOL ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width" />

	<?php echo $this->Html->meta('favicon.ico', $this->Html->url('/favicon.ico'), array('type' => 'icon')) . PHP_EOL ?>

	<?php echo $this->Html->css($this->Html->url('/css/estilo.less', true), 'stylesheet/less') . PHP_EOL ?>
	<?php echo $this->fetch('styles') ?>

	<?php echo $this->Html->script('vendor/less-1.3.0.min.js') . PHP_EOL ?>
	<?php echo $this->Html->script('vendor/modernizr-2.6.1.min.js') . PHP_EOL ?>
</head>
<body class="<?php if (isset($bodyClass)) echo $bodyClass ?>">

<?php echo $this->element('header') ?>

<?php echo $this->fetch('content') ?>

<?php echo $this->element('footer') ?>

<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js') ?>
<?php echo $this->fetch('scripts') ?>
<?php echo $this->Html->script('main.js') ?>

<?php echo $this->Html->script('//apis.google.com/js/plusone.js', array('async')) ?>
<?php echo $this->Html->script('//platform.twitter.com/widgets.js', array('async')) ?>
<?php echo $this->Html->script('//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=415576408488922', array('async')) ?>

<?php echo $this->element('google-analytics', array('account' => 'UA-XXX')) ?>
</body>
</html>