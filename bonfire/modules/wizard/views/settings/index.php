<div class="admin-box">
	<h3>wizard</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Wizard.Settings.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>User Id</th>
					<th>Completed</th>
					<th>Deleted</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Wizard.Settings.Delete')) : ?>
				<tr>
					<td colspan="6">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('wizard_delete_confirm'))); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Wizard.Settings.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Wizard.Settings.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/settings/wizard/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->user_id) ?></td>
				<?php else: ?>
				<td><?php e($record->user_id) ?></td>
				<?php endif; ?>
			
				<td><?php e($record->completed) ?></td>
				<td><?php echo $record->deleted > 0 ? lang('wizard_true') : lang('wizard_false')?></td>
				<td><?php e($record->created_on) ?></td>
				<td><?php e($record->modified_on) ?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="6">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>