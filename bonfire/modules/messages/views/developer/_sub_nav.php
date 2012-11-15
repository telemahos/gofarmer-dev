<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/developer/messages') ?>" id="list"><?php echo lang('messages_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Messages.Developer.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/developer/messages/create') ?>" id="create_new"><?php echo lang('messages_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>