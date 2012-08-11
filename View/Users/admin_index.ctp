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
		$status = $this->TwitterBootstrap->label('Confirmado', 'success');
		break;
	case Status::ALUNO_DELETADO:
		$status = $this->TwitterBootstrap->label('Deletado', 'important');
		break;
	default:
		$status = $this->TwitterBootstrap->label('Pendente', 'warning');
		break;
}

$turmas = array();
foreach ($user['Enrollment'] AS $Enrollment) {
	$label = $this->TwitterBootstrap->label($Enrollment['Course']['code'], null, array(
		'style' => 'background: ' . $this->Html->HEXColor($Enrollment['Course']['code'])
	));

	array_push($turmas, $label);
}

	?>
	<tr>
		<td class="visible-desktop"><?php echo h($user['User']['id']) ?></td>
		<td>
			<?php echo $this->Html->image($this->Html->gravatar($user['User']['email'], array('s' => 20, 'd' => 'mm')), array('width' => 20, 'height' => 20, 'title' => $user['User']['full_name'], 'class' => 'avatar visible-desktop')) ?>
			<?php echo $this->Html->link($user['User']['full_name'], array('action' => 'edit', $user['User']['id'])) ?>
		</td>
		<td class="visible-desktop"><?php echo $this->Html->link($user['User']['email'], 'mailto:' . $user['User']['email']) ?></td>
		<td><?php echo $status ?></td>
		<td class="visible-desktop"><?php echo join(' ', $turmas) ?></td>
		<td class="visible-desktop"><?php echo $this->Time->niceShort($user['User']['created']) ?></td>
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