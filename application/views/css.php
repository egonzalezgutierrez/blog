<?php if(substr( $style, 0, 4 ) === "http") { ?>
<link href="<?php echo $style; ?>" rel="stylesheet" type="text/css" />
<?php }else { ?>
<link href="<?php echo asset_url() . 'css/' . $style; ?>" rel="stylesheet" type="text/css" />
<?php } ?>