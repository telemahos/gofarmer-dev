<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/questions') ?>" id="list"><?php echo lang('questions_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Questions.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/questions/create') ?>" id="create_new"><?php echo lang('questions_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>