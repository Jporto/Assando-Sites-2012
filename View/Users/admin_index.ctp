<?php
echo $this->Html->breadcrumb(array(
	$this->Html->link('Dashboard', '/admin'),
	$this->Html->link('Alunos', array('action' => 'index')),
	$title_for_layout,
));
?>

<div class="users index">
	<h2><?php echo $title_for_layout ?></h2>

	<table class="table table-striped table-bordered table-hover">
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
		$status = $this->Html->tag('span', $this->Html->link('Confirmado', array('status' => Status::ALUNO_CONFIRMADO)), array('class' => 'label label-success'));
		break;
	case Status::ALUNO_DELETADO:
		$status = $this->Html->tag('span', $this->Html->link('Deletado', array('status' => Status::ALUNO_DELETADO)), array('class' => 'label label-important'));
		break;
	default:
		$status = $this->Html->tag('span', $this->Html->link('Pendente', array('status' => Status::ALUNO_PENDENTE)), array('class' => 'label label-warning'));
		break;
}

$turmas = array();
foreach ($user['Enrollment'] as $Enrollment) {
	$label = $this->Html->tag('span',
		$this->Html->link($Enrollment['Course']['code'], array('course' => $Enrollment['Course']['id'])),
		array(
			'class' => 'label',
			'style' => 'background: ' . $this->Html->hexColor($Enrollment['Course']['code'])
		)
	);

	array_push($turmas, $label);
}

	?>
	<tr>
		<td><?php echo h($user['User']['id']) ?></td>
		<td>
			<?php echo $this->Gravatar->image($user['User']['email'], array('size' => 26, 'width' => 26, 'height' => 26, 'title' => $user['User']['full_name'], 'class' => 'img-circle gravatar')) ?>
			<?php echo $this->Html->link($user['User']['full_name'], array('action' => 'edit', $user['User']['id'])) ?>
		</td>
		<td><?php echo $this->Html->link($user['User']['email'], 'mailto:' . $user['User']['email']) ?></td>
		<td><?php echo $status ?></td>
		<td><?php echo join(' ', $turmas) ?></td>
		<td><?php echo $this->Time->niceShort($user['User']['created']) ?></td>
	</tr>
<?php endforeach ?>
	</table>

	<div class="paging"><?php echo $this->Paginator->pagination() ?></div>
</div>

<?php echo $this->start('left-menu') ?>
<ul class="nav nav-list">
	<li class="nav-header">Status</li>
	<li><?php echo $this->Html->link('Pendentes ' . $this->element('admin/badges/pending-students'), array_merge($this->passedArgs, array('status' => Status::ALUNO_PENDENTE)), array('escape' => false)) ?></li>
	<li><?php echo $this->Html->link('Confirmados', array_merge($this->passedArgs, array('status' => Status::ALUNO_CONFIRMADO))) ?></li>
	<li><?php echo $this->Html->link('Deletados', array_merge($this->passedArgs, array('status' => Status::ALUNO_DELETADO))) ?></li>

	<li class="nav-header">Turmas</li>
	<?php foreach ($this->requestAction(array('controller' => 'courses', 'action' => 'index')) AS $Course) { ?>
	<li><?php echo $this->Html->link($Course['Course']['name'], array_merge($this->passedArgs, array('course' => $Course['Course']['id']))) ?></li>
	<?php } ?>
</ul>
<?php echo $this->end();