<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
        	<div class="row text-center">
				<h2><?php echo lang('users.login'); ?></h2>
			</div>
			<?php echo form_open('users/login', array('id' => 'ajaxform')); ?>
			<div class="form-group">
				<label for="username"><?php echo lang('users.username'); ?>:</label>
				<input class="form-control" id="username" type="text" name="username" placeholder="<?php echo lang('users.username'); ?>" />
			</div>
			<div class="form-group">
				<label for="password"><?php echo lang('users.password'); ?>:</label>
				<input class="form-control" id="password" type="password" name="password" placeholder="**********" />
			</div>
			<div class="form-group">
			 	<div class="text-center">
					<button id="submit" name="submit" type="submit" class="btn btn-primary" value="1"><?php echo lang('users.login'); ?></button>
				</div>
			</div>
			<?php echo form_close(); ?>
			<?php $this->load->view('form_validation', $this->data) ; ?>
		</div>
	</div>
</div>
