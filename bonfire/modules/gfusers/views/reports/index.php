<div class="admin-box">
	<h3>gfusers</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Gfusers.Reports.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>User ID</th>
					<th>Name</th>
					<th>Last Name</th>
					<th>Company Name</th>
					<th>Company Description</th>
					<th>Company Category</th>
					<th>Company Email</th>
					<th>Website</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Zip</th>
					<th>Country</th>
					<th>Telephone 1</th>
					<th>Telephone 2</th>
					<th>Fax</th>
					<th>Is Farmer</th>
					<th>Is Company</th>
					<th>Is User</th>
					<th>Deleted</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Gfusers.Reports.Delete')) : ?>
				<tr>
					<td colspan="23">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('gfusers_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Gfusers.Reports.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Gfusers.Reports.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/reports/gfusers/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->user_id) ?></td>
				<?php else: ?>
				<td><?php echo $record->user_id ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->name?></td>
				<td><?php echo $record->last_name?></td>
				<td><?php echo $record->comp_name?></td>
				<td><?php echo $record->comp_description?></td>
				<td><?php echo $record->comp_category?></td>
				<td><?php echo $record->comp_email?></td>
				<td><?php echo $record->website?></td>
				<td><?php echo $record->address?></td>
				<td><?php echo $record->city?></td>
				<td><?php echo $record->state?></td>
				<td><?php echo $record->zip?></td>
				<td><?php echo $record->country?></td>
				<td><?php echo $record->phone_1?></td>
				<td><?php echo $record->phone_2?></td>
				<td><?php echo $record->fax?></td>
				<td><?php echo $record->is_farmer?></td>
				<td><?php echo $record->is_company?></td>
				<td><?php echo $record->is_user?></td>
				<td><?php echo $record->deleted > 0 ? lang('gfusers_true') : lang('gfusers_false')?></td>
				<td><?php echo $record->created_on?></td>
				<td><?php echo $record->modified_on?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="23">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>