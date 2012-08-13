<div class="users form">
<?php echo $this->Form->create('User', array('class' => BootstrapFormHelper::FORM_HORIZONTAL)); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('name');
		echo $this->Form->input('surname');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
	<?php echo $this->Form->submit('Salvar', array('icon' => 'ok white', 'class' => 'btn btn-success')) ?>
<?php echo $this->Form->end(); ?>
</div>