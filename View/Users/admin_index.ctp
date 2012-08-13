<div class="users index">
	<h2>Alunos</h2>

	<table class="table table-striped table-bordered">
	<tr>
		<th class="visible-desktop"><?php echo $this->Paginator->sort('id', '#') ?></th>
		<th><?php echo $this->Paginator->sort('name', 'Nome') ?></th>
		<th class="visible-desktop"><?php echo $this->Paginator->sort('email') ?></th>
		<th><?php echo $this->Paginator->sort('status_id', 'Status') ?></th>
		<th class="visible-desktop">Turmas</th>
		<th class="visible-desktop"><?php echo $this->Paginator->sort('created', 'Cadastro') ?></th>
	</tr>
	<?php
foreach ($users as $user):

switch ($user['User']['status_id']) {
	case Status::ALUNO_CONFIRMADO:
		$status = $this->Html->tag('span', 'Confirmado', array('class' => 'label label-success'));
		break;
	case Status::ALUNO_DELETADO:
		$status = $this->Html->tag('span', 'Deletado', array('class' => 'label label-important'));
		break;
	default:
		$status = $this->Html->tag('span', 'Pendente', array('class' => 'label label-warning'));
		break;
}

$turmas = array();
foreach ($user['Enrollment'] as $Enrollment) {
	$label = $this->Html->tag('span', $Enrollment['Course']['code'], array(
		'class' => 'label',
		'style' => 'background: ' . $this->Html->hexColor($Enrollment['Course']['code'])
	));

	array_push($turmas, $label);
}

	?>
	<tr>
		<td class="visible-desktop"><?php echo h($user['User']['id']) ?></td>
		<td>
			<?php echo $this->Html->image($this->Html->gravatar($user['User']['email'], array('s' => 20)), array('width' => 20, 'height' => 20, 'title' => $user['User']['full_name'], 'class' => 'avatar visible-desktop')) ?>
			<?php echo $this->Html->link($user['User']['full_name'], array('action' => 'edit', $user['User']['id'])) ?>
		</td>
		<td class="visible-desktop"><?php echo $this->Html->link($user['User']['email'], 'mailto:' . $user['User']['email']) ?></td>
		<td><?php echo $status ?></td>
		<td class="visible-desktop"><?php echo join(' ', $turmas) ?></td>
		<td class="visible-desktop"><?php echo $this->Time->niceShort($user['User']['created']) ?></td>
	</tr>
<?php endforeach ?>
	</table>

	<div class="paging"><?php echo $this->Paginator->pagination() ?></div>
</div>

<?php echo $this->start('left-menu') ?>
<ul class="nav nav-list">
	<li class="nav-header">Status</li>
	<li><?php echo $this->Html->link('Confirmados', array('?' => array('status' => Status::ALUNO_CONFIRMADO))) ?></li>
	<li><?php echo $this->Html->link('Pendentes ' . $this->element('admin/badges/pending-students'), array('?' => array('status' => Status::ALUNO_PENDENTE)), array('escape' => false)) ?></li>

	<li class="nav-header">Turmas</li>
	<li><?php echo $this->Html->link('Turma 2012.2', '#') ?></li>
	<li><?php echo $this->Html->link('Turma 2012.3', '#') ?></li>
	<li><?php echo $this->Html->link('Turma 2012.4', '#') ?></li>
	<li><?php echo $this->Html->link('Turma 2012.5', '#') ?></li>
</ul>
<?php echo $this->end();