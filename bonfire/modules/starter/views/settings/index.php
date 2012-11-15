<div class="admin-box">
	<h3>starter</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Starter.Settings.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Starter.Settings.Delete')) : ?>
				<tr>
					<td colspan="1">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('starter_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Starter.Settings.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="1">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>