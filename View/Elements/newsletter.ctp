<!-- newsletter -->
<?php echo $this->Form->create('Newsletter', array('action' => 'subscribe', 'class' => 'newsletter', 'inputDefaults' => array('div' => false))) ?>
	<fieldset>
		<legend>Quer ser avisado sobre as <strong>promoções</strong> ou sobre as novas turmas do Assando Sites?</legend>

		<?php echo $this->Form->input('Newsletter.nome', array('label' => 'Nome', 'placeholder' => 'Digite seu nome')) ?>
		<?php echo $this->Form->input('Newsletter.email', array('label' => 'Email', 'placeholder' => 'Digite seu email', 'type' => 'email')) ?>

		<?php echo $this->Form->submit('OK', array('div' => false)) ?>
	</fieldset>
<?php echo $this->Form->end() ?>
<!-- /newsletter -->