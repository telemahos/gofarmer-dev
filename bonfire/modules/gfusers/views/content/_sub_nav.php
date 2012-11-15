<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/gfusers') ?>" id="list"><?php echo lang('gfusers_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Gfusers.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/gfusers/create') ?>" id="create_new"><?php echo lang('gfusers_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>