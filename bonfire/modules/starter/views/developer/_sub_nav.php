<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/developer/starter') ?>" id="list"><?php echo lang('starter_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Starter.Developer.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/developer/starter/create') ?>" id="create_new"><?php echo lang('starter_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>