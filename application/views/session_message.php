<div id="session_message">
	<p><?php echo $this->session->flashdata('feedback'); ?></p>
	<?php if(!empty($this->session->flashdata('session.message'))) { ?>
	 <div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<p><?php echo $this->session->flashdata('session.message'); ?></p>
	</div>
	<?php } ?>
</div>
