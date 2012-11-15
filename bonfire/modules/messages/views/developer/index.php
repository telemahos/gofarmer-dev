<div class="admin-box">
	<h3>Messages</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Messages.Developer.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>To</th>
					<th>From</th>
					<th>Attachment</th>
					<th>Subject</th>
					<th>Body</th>
					<th>Box</th>
					<th>Date</th>
					<th>Read</th>
					<th>Sent_copy</th>
					<th>Deleted</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Messages.Developer.Delete')) : ?>
				<tr>
					<td colspan="13">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('messages_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Messages.Developer.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Messages.Developer.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/developer/messages/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->to) ?></td>
				<?php else: ?>
				<td><?php echo $record->to ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->from?></td>
				<td><?php echo $record->attachment?></td>
				<td><?php echo $record->subject?></td>
				<td><?php echo $record->body?></td>
				<td><?php echo $record->box?></td>
				<td><?php echo $record->date?></td>
				<td><?php echo $record->read?></td>
				<td><?php echo $record->sent_copy?></td>
				<td><?php echo $record->deleted > 0 ? lang('messages_true') : lang('messages_false')?></td>
				<td><?php echo $record->created_on?></td>
				<td><?php echo $record->modified_on?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="13">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>