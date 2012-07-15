<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Surname'); ?></dt>
		<dd>
			<?php echo h($user['User']['surname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Status']['id'], array('controller' => 'statuses', 'action' => 'view', $user['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Highrise People'), array('controller' => 'highrise_people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Highrise Person'), array('controller' => 'highrise_people', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Information'), array('controller' => 'information', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information'), array('controller' => 'information', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('controller' => 'enrollments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Addresses'); ?></h3>
	<?php if (!empty($user['Address'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $user['Address']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $user['Address']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
	<?php echo $user['Address']['city']; ?>
&nbsp;</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
	<?php echo $user['Address']['state']; ?>
&nbsp;</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
	<?php echo $user['Address']['country']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Address'), array('controller' => 'addresses', 'action' => 'edit', $user['Address']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Highrise People'); ?></h3>
	<?php if (!empty($user['HighrisePerson'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $user['HighrisePerson']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $user['HighrisePerson']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
	<?php echo $user['HighrisePerson']['code']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Highrise Person'), array('controller' => 'highrise_people', 'action' => 'edit', $user['HighrisePerson']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Information'); ?></h3>
	<?php if (!empty($user['Information'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $user['Information']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $user['Information']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
	<?php echo $user['Information']['mobile']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cpf'); ?></dt>
		<dd>
	<?php echo $user['Information']['cpf']; ?>
&nbsp;</dd>
		<dt><?php echo __('Twitter'); ?></dt>
		<dd>
	<?php echo $user['Information']['twitter']; ?>
&nbsp;</dd>
		<dt><?php echo __('Github'); ?></dt>
		<dd>
	<?php echo $user['Information']['github']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Information'), array('controller' => 'information', 'action' => 'edit', $user['Information']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Enrollments'); ?></h3>
	<?php if (!empty($user['Enrollment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Enrollment'] as $enrollment): ?>
		<tr>
			<td><?php echo $enrollment['id']; ?></td>
			<td><?php echo $enrollment['user_id']; ?></td>
			<td><?php echo $enrollment['course_id']; ?></td>
			<td><?php echo $enrollment['status_id']; ?></td>
			<td><?php echo $enrollment['created']; ?></td>
			<td><?php echo $enrollment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enrollments', 'action' => 'view', $enrollment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enrollments', 'action' => 'edit', $enrollment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enrollments', 'action' => 'delete', $enrollment['id']), null, __('Are you sure you want to delete # %s?', $enrollment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enrollment'), array('controller' => 'enrollments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Payments'); ?></h3>
	<?php if (!empty($user['Payment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Payment Gateway Id'); ?></th>
		<th><?php echo __('Enrollment Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Reference'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Payment'] as $payment): ?>
		<tr>
			<td><?php echo $payment['id']; ?></td>
			<td><?php echo $payment['user_id']; ?></td>
			<td><?php echo $payment['payment_gateway_id']; ?></td>
			<td><?php echo $payment['enrollment_id']; ?></td>
			<td><?php echo $payment['value']; ?></td>
			<td><?php echo $payment['reference']; ?></td>
			<td><?php echo $payment['status_id']; ?></td>
			<td><?php echo $payment['created']; ?></td>
			<td><?php echo $payment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'payments', 'action' => 'view', $payment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'payments', 'action' => 'edit', $payment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'payments', 'action' => 'delete', $payment['id']), null, __('Are you sure you want to delete # %s?', $payment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
