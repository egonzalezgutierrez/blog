<div class="container">
	<div class="row">
		<?php if(!empty($posts)) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#tposts').dataTable( {
					"oLanguage": {
						"sUrl": "<?php echo lang('datatable.sUrl'); ?>"
					}
		        } );
			} );
		</script> 
		<table id="tposts" class="table table-condensed">
			<thead>
				<th><?php echo lang('users.name'); ?></th>
				<th><?php echo lang('posts.date'); ?></th>
				<th><?php echo lang('posts.content'); ?></th>
				<?php if($isAdmin) { ?>
				<th><?php echo lang('posts.censure'); ?></th>
				<?php } ?>
			</thead>
			<tbody>
			<?php foreach($posts as $post) { ?>
				<tr>
					<td><?php echo $post['name']; ?></td>
					<td><?php echo $post['created']; ?></td>
					<td><?php echo $post['content']; ?></td>
					<?php if($isAdmin) { ?>
					<?php if(!$post['censured']) { ?>
					<td><?php echo anchor('posts/censurePost/'.$post['id_post'], lang('posts.censure'), 'title="lang(\'posts.censure\')"'); ?></td>
					<?php }else { ?>
					<td><?php echo lang('posts.censured') ?></td>
					<?php } ?>
					<?php } ?>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php } ?>
	</div>
</div>