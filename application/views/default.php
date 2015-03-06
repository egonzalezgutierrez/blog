<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<title><?php echo $metatitle; ?></title>
    	<meta name="description" content="<?php echo $metadescription; ?>" />
		<meta name="keywords" content="<?php echo $metakeywords; ?>" />
		<meta name="author" content="<?php echo $metaauthor; ?>" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php $this->load->view('resources', $this->data); ?>
    </head>
    <body>
       <div class="container primary-container">
			<div class="row">
	            <?php $this->load->view('header'); ?>
	            <div class="container">
					<div class="row">
		            	<?php $this->load->view('menu'); ?>
		            	<div class="container">
							<div class="row">
								<?php $this->load->view('session_message'); ?>
		            			<?php echo $content; ?>
		            		</div>
		                </div>
					</div>
	            </div>
	            <?php $this->load->view('footer'); ?>
			</div>	            
        </div>
    </body>
</html>
