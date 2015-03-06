<?php if(substr( $javascript, 0, 4 ) === "http") { ?>
<script src="<?php echo $javascript; ?>"></script>
<?php }else { ?>
<script src="<?php echo asset_url() . 'js/' . $javascript; ?>"></script>
<?php } ?>
