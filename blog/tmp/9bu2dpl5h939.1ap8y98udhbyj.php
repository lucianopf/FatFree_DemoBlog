<br/>
<?php foreach (($result?:array()) as $unit): ?>

		<h6><?php echo $unit['title']; ?></h6>
		<p><?php echo $unit['content']; ?></p>
		<?php if ($SESSION): ?>
			<?php if ($SESSION['user']== $unit['author']): ?>
		  		
			   		<a href="\blog/articles/edit/<?php echo $unit['id']; ?>" class="btn btn-lg btn-default"><span class="fui-new"></span></a>
					<a href="\blog/articles/delete/<?php echo $unit['id']; ?>" class="btn btn-lg btn-danger"><span class="fui-cross"></span></a>
					<br/>
					<br/>
				
			<?php endif; ?>
		<?php endif; ?>
		<small>Author: <?php echo $unit['author']; ?></small>
	<br/>
	<br/>
<?php endforeach; ?>