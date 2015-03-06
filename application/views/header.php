<div class="container">
	<div class="row">
		<div class="jumbotron">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="#"><?php echo lang('blog.welcome'); ?></a>
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div id="bs-example-navbar-collapse-1">
						<?php if(!empty($langs)) { ?>
						<ul class="nav navbar-nav navbar-right">
							<?php foreach($langs as $lang) { ?>
								<li><?php echo anchor($lang['url'], lang($lang['token']), 'title="lang($lang[\'token\'])"'); ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</div>
	</div>
</div>
