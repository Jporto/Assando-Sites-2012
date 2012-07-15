<div class="users index">
	<h2>Alunos</h2>

	<table class="table table-striped table-bordered">
	<tr>
		<th><?php echo $this->Paginator->sort('id', '#') ?></th>
		<th><?php echo $this->Paginator->sort('name', 'Nome') ?></th>
		<th><?php echo $this->Paginator->sort('email') ?></th>
		<th><?php echo $this->Paginator->sort('status_id', 'Status') ?></th>
		<th>Turmas</th>
		<th><?php echo $this->Paginator->sort('created', 'Cadastro') ?></th>
	</tr>
	<?php
foreach ($users as $user):

switch ($user['User']['status_id']) {
	case Status::ALUNO_CONFIRMADO:
		$status = $this->Bootstrap->label('Confirmado', 'success');
		break;
	default:
		$status = $this->Bootstrap->label('Pendente', 'warning');
		break;
}

	?>
	<tr>
		<td><?php echo h($user['User']['id']) ?></td>
		<td><?php echo $this->Html->link($user['User']['full_name'], array('action' => 'edit', $user['User']['id'])) ?></td>
		<td><?php echo $this->Html->link($user['User']['email'], 'mailto:' . $user['User']['email']) ?></td>
		<td><?php echo $status ?></td>
		<td></td>
		<td><?php echo $this->Time->niceShort($user['User']['created']) ?></td>
	</tr>
<?php endforeach ?>
	</table>

	<p><?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} no total'))) ?></p>

	<div class="paging"><?php echo $this->Paginator->numbers() ?></div>
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