<br/>
<?php foreach (($result?:array()) as $unit): ?>
	<?php foreach (($unit?:array()) as $ola): ?>
		<p><?php echo $ola->username; ?></p>
	<?php endforeach; ?>
<?php endforeach; ?>