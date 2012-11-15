<div class="admin-box">
	<h3>Questions</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Questions.Modules.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Question ID</th>
					<th>User ID</th>
					<th>Body</th>
					<th>Category</th>
					<th>Sub Category</th>
					<th>Details</th>
					<th>Note</th>
					<th>Is Answer</th>
					<th>Is Private</th>
					<th>Is Closed</th>
					<th>Deleted</th>
					<th>Created</th>
					<th>Modified</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Questions.Modules.Delete')) : ?>
				<tr>
					<td colspan="14">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('questions_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Questions.Modules.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->q_id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Questions.Modules.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/modules/questions/edit/'. $record->q_id, '<i class="icon-pencil">&nbsp;</i>' .  $record->question_id) ?></td>
				<?php else: ?>
				<td><?php echo $record->question_id ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->user_id?></td>
				<td><?php echo $record->body?></td>
				<td><?php echo $record->category?></td>
				<td><?php echo $record->sub_category?></td>
				<td><?php echo $record->details?></td>
				<td><?php echo $record->note?></td>
				<td><?php echo $record->is_answer?></td>
				<td><?php echo $record->is_private?></td>
				<td><?php echo $record->is_closed?></td>
				<td><?php echo $record->deleted > 0 ? lang('questions_true') : lang('questions_false')?></td>
				<td><?php echo $record->created_on?></td>
				<td><?php echo $record->modified_on?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="14">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>