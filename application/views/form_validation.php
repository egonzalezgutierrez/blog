<div id="ajax_message">
	<?php if(!empty($this->data['validation_message'])) { ?>
	<div class="alert alert-danger alert-error">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<p><?php echo $this->data['validation_message']; ?></p>
	</div>
	<?php } ?>
</div>
