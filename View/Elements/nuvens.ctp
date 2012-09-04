<div class="nuvens">
<?php
for ($i = 1; $i <= 5; $i++) {
	$nuvem = rand(1, 2);

	$attributes = array(
		'alt' => 'Nuvem',
		'width' => mt_rand(70, 140),
		'style' => 'bottom: ' . mt_rand(20, 80) . '%',
	);

	$attributes['class'] = 'nuvem nuvem-' . $i;
	$attributes['class'] .= ' ' . (($i <= rand(2, 3)) ? 'nuvem-esquerda' : 'nuvem-direita');
?>
<?php echo $this->Html->image("nuvem{$nuvem}.png", $attributes) ?>
<?php } ?>
</div>