<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/developer/gfusers') ?>" id="list"><?php echo lang('gfusers_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Gfusers.Developer.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/developer/gfusers/create') ?>" id="create_new"><?php echo lang('gfusers_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>