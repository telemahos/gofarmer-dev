<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/crop') ?>" id="list"><?php echo lang('crop_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Crop.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/crop/create') ?>" id="create_new"><?php echo lang('crop_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>