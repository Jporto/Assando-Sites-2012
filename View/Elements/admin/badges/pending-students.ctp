<?php
$count = $this->requestAction(array('controller' => 'users', 'action' => 'pendingStudents', 'admin' => true));

if ($count > 0) {
	echo $this->TwitterBootstrap->badge($count, 'warning');
}