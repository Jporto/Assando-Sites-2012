<?php $pendingStudents = $this->element('admin/badges/pending-students') ?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<?php echo $this->Html->link('Assando Sites', '/admin', array('class' => 'brand')) ?>

			<div class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i> Thiago Belem <span class="caret visible-desktop"></span>
				</a>
				<ul class="dropdown-menu">
					<li><?php echo $this->Html->link('<i class="icon-user"></i> Usuários', '#', array('escape' => false)) ?></li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link('<i class="icon-off"></i> Logout', '#', array('escape' => false)) ?></li>
				</ul>
			</div>

			<div class="nav-collapse">

				<ul class="nav">

					<!-- Alunos -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user icon-white"></i> Alunos <?php echo $pendingStudents ?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('<i class="icon-user"></i> Inscritos', array('controller' => 'users', 'action' => 'index'), array('escape' => false)) ?></li>
							<li><?php echo $this->Html->link('<i class="icon-ok"></i> Confirmados', array('controller' => 'users', 'action' => 'index', '?' => array('status' => Status::ALUNO_CONFIRMADO)), array('escape' => false)) ?></li>
							<li><?php echo $this->Html->link('<i class="icon-warning-sign"></i> Pendentes ' . $pendingStudents, array('controller' => 'users', 'action' => 'index', '?' => array('status' => Status::ALUNO_PENDENTE)), array('escape' => false)) ?></li>
						</ul>
					</li>
					<!-- /Alunos -->

					<!-- Pagamentos -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-barcode icon-white"></i> Pagamentos <span class="badge badge-warning pending-payments"></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('<i class="icon-barcode"></i> Pagamentos', '#', array('escape' => false)) ?></li>
							<li><?php echo $this->Html->link('<i class="icon-gift"></i> Cupons de Desconto', '#', array('escape' => false)) ?></li>
						</ul>
					</li>
					<!-- /Pagamentos -->

					<!-- Turmas -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-calendar icon-white"></i> Turmas <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('<i class="icon-calendar"></i> Turmas', '#', array('escape' => false)) ?></li>
							<li><?php echo $this->Html->link('<i class="icon-comment"></i> Aulas', '#', array('escape' => false)) ?></li>
							<li><?php echo $this->Html->link('<i class="icon-file"></i> Arquivos', '#', array('escape' => false)) ?></li>
						</ul>
					</li>
					<!-- /Turmas -->

				</ul>

				<?php echo $this->Form->create('User', array('action' => 'index', 'class' => 'navbar-search pull-left', 'type' => 'get')) ?>
				<?php echo $this->Form->text('search', array('placeholder' => 'Buscar aluno', 'class' => 'search-query span2')) ?>
				<?php echo $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>