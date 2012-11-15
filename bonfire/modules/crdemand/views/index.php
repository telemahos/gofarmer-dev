<div>
	<h1 class="page-header">crdemand</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
		
			
		<th>User Id</th>
		<th>Crop Id</th>
		<th>Variety Id</th>
		<th>Quantity</th>
		<th>Quantity Type Id</th>
		<th>Packaging Id</th>
		<th>Price</th>
		<th>Price Per</th>
		<th>Release Date</th>
		<th>Comment</th>
		<th>Deleted</th>
		<th>Created</th>
		<th>Modified</th>
		
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('crdemand_true') : lang('crdemand_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>