<div>
	<h1 class="page-header">crop</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
		
			
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
		
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('crop_true') : lang('crop_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>