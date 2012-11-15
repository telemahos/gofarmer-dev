<?php echo theme_view('parts/_header'); ?>

<div class="container body narrow-body">
	
	<div class="row-fluid">
		<div class="span3">
			<?php echo Template::block('sidebar_left'); ?>
		</div>

		<div class="span6">
			<?php echo Template::message(); ?>

			<?php echo isset($content) ? $content : Template::yield(); ?>

		</div>

		<div class="span3">
			<?php echo Template::block('sidebar_right'); ?>
		</div>
	</div>

<!-- </div> -->

<?php echo theme_view('parts/_footer'); ?>