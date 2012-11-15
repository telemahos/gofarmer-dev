<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/developer/crdemand') ?>" id="list"><?php echo lang('crdemand_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Crdemand.Developer.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/developer/crdemand/create') ?>" id="create_new"><?php echo lang('crdemand_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>