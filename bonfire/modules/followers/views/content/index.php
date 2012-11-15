<div class="admin-box">
	<h3>Followers</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Followers.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>User ID</th>
					<th>Follower ID</th>
					<th>Block</th>
					<th>Deleted</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Followers.Content.Delete')) : ?>
				<tr>
					<td colspan="7">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('followers_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Followers.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->foll_id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Followers.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/followers/edit/'. $record->foll_id, '<i class="icon-pencil">&nbsp;</i>' .  $record->user_id) ?></td>
				<?php else: ?>
				<td><?php e($record->user_id) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->follower_id) ?></td>
				<td><?php e($record->block) ?></td>
				<td><?php echo $record->deleted > 0 ? lang('followers_true') : lang('followers_false')?></td>
				<td><?php echo $record->created_on?></td>
				<td><?php echo $record->modified_on?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>