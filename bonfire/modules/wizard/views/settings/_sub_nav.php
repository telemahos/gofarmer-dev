<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/wizard') ?>" id="list"><?php echo lang('wizard_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Wizard.Settings.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/settings/wizard/create') ?>" id="create_new"><?php echo lang('wizard_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>