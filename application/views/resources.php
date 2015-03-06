<?php foreach($css as $style) { ?>
	<?php $data['style'] = $style; ?>
	<?php echo $this->load->view('css', $data, true); ?>
<?php } ?>
<?php foreach($js as $javascript) { ?>
	<?php $data['javascript'] = $javascript; ?>
	<?php echo $this->load->view('js', $data, true); ?>
<?php } ?>