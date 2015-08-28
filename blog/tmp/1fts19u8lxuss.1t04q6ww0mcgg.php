<!-- Include the pre-body -->
<?php echo $this->render('./views/blocks/includes_begin.htm',$this->mime,get_defined_vars()); ?>

<div class="container">
	<!-- Header -->
	<?php echo $this->render('./views/blocks/header.htm',$this->mime,get_defined_vars()); ?>
	<!-- Content -->
	<?php echo $this->render('./views/blocks/content.htm',$this->mime,get_defined_vars()); ?>
</div>
<!-- Footer -->
<?php echo $this->render('./views/blocks/footer.htm',$this->mime,get_defined_vars()); ?>

<!-- Include the post-body -->
<?php echo $this->render('./views/blocks/includes_end.htm',$this->mime,get_defined_vars()); ?>
