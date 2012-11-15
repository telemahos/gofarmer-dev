<div>
	<h1 class="page-header">Questions</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
		
			
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
		
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'q_id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('questions_true') : lang('questions_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>