<h3><?php echo $title; ?></h3>
<?php if ($console_error==''): ?>
	<?php else: ?>
		<div class="alert alert-danger" role="alert"><?php echo $console_error; ?></div>
	
<?php endif; ?>
<?php if ($console_success==''): ?>
	<?php else: ?>
		<div class="alert alert-success" role="alert"><?php echo $console_success; ?></div>
	
<?php endif; ?>
<?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
