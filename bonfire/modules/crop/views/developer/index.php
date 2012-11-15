<div class="admin-box">
	<h3>crop</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Crop.Developer.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>User ID</th>
					<th>Crop</th>
					<th>Variety</th>
					<th>Hectar</th>
					<th>Certification</th>
					<th>Conventional Crops</th>
					<th>Integrated Crop</th>
					<th>Organic</th>
					<th>Comment</th>
					<th>Deleted</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Crop.Developer.Delete')) : ?>
				<tr>
					<td colspan="13">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('crop_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Crop.Developer.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Crop.Developer.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/developer/crop/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->user_id) ?></td>
				<?php else: ?>
				<td><?php echo $record->user_id ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->crop?></td>
				<td><?php echo $record->variety?></td>
				<td><?php echo $record->hectar?></td>
				<td><?php echo $record->certification?></td>
				<td><?php echo $record->conventional_crops?></td>
				<td><?php echo $record->integrated_crop?></td>
				<td><?php echo $record->organic?></td>
				<td><?php echo $record->comment?></td>
				<td><?php echo $record->deleted > 0 ? lang('crop_true') : lang('crop_false')?></td>
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