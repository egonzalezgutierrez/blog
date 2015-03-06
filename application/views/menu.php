<section class="container">
	<div class="row">
		<header>
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-2">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><?php echo lang('blog.menu'); ?></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div id="bs-example-navbar-collapse-2">
						<?php if(!empty($menu)) { ?>
						<ul class="nav navbar-nav">
							<?php foreach($menu as $item) { ?>
								<li><?php echo anchor($item['url'], lang($item['token']), 'title="lang($item[\'token\'])"'); ; ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
	</div>
</section>
