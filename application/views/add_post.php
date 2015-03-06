<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
        	<div class="row text-center">
				<h2><?php echo lang('posts.add'); ?></h2>
			</div>
			<?php echo form_open('posts/addPost', array('id' => 'ajaxform')); ?>
			<div class="form-group">
				<label for="content"><?php echo lang('posts.content'); ?>:</label>
				<textarea class="form-control" rows="4" cols="50" name="content" id="content" placeholder="<?php echo lang('posts.content'); ?>"></textarea>
			</div>
			<div class="form-group">
			 	<div class="text-center">
					<button id="submit" name="submit" type="submit" class="btn btn-primary" value="1"><?php echo lang('posts.add'); ?></button>
				</div>
			</div>
			<?php echo form_close(); ?>
			<?php $this->load->view('form_validation'); ?>
		</div>
	</div>
</div>