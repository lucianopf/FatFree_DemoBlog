<p>Ola, <?php echo $name; ?>!</p>
<?php if ($frase): ?>
    
    	<?php foreach (($frase?:array()) as $palavra): ?>
		    <p><?php echo $palavra; ?></p>
		<?php endforeach; ?>
    
    <?php else: ?>
    	<p>Nao existe nenhuma palavra nessa frase definida</p>
    
<?php endif; ?>