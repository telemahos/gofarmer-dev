<div>
	<h1 class="page-header">gfusers</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
		
			
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
		
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('gfusers_true') : lang('gfusers_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>