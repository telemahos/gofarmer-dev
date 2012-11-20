<div class="page-header">
<!-- View User's crops -->
<!-- ################################################################## -->
<h4>Καλλιέργειές μου <small>&nbsp;<a href="<?php echo site_url('gfusers/gf_my_profile/my_crops'); ?>">εμφάνιση όλων</a></small>&nbsp;<?php if($total_crops > 0): ?><span class="badge"><?php echo $total_crops; ?> </span><?php endif; ?>
<div class="btn-group pull-right">
	<!-- <button class="btn btn-link" type="submit"><i class="icon-cog"></i></button> -->
	<button class="btn btn-mini btn-link dropdown-toggle " data-toggle="dropdown">
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu ">
		<li><a href="<?php echo site_url('crop/add_crop') ?>">Νέα Καλλιέργεια</a></li>
	</ul>
</div>

</h4>
</div>


<?php if (isset($user_crops) && is_array($user_crops) && count($user_crops)) : ?>
<table class='table table-condensed table-hover table-bordered'>
<!-- <caption></caption> -->
	<thead>
		
			<tr>
				<th>Καλλιέργεια</th>
				<th>Ποικιλία</th>
				<th>Στρέμματα</th>
				<th>Είδος Καλλιέργειας</th>
				<!-- <th>Λεπτομέριες</th> -->
			</tr>
		
	</thead>
	<tbody>
		<?php if (isset($user_crops) && is_array($user_crops) && count($user_crops)) : ?>
			<?php foreach ($user_crops as $crops) : ?>
				<tr class="center">
					<td><a href="<?php echo $crops->crops_gr; ?>"><b><?php echo $crops->crops_gr; ?></b></a></td>
					<td class='muted'><em><?php echo $crops->crop_variety_gr; ?></em></td>
					<td class='muted'><b><?php echo $crops->hectar . '</b> στρ'; ?></td>
					<td class='muted'>
						<?php if($crops->certification == 0) : ?>
							<?php echo 'Συμβατική Καλλιέργεια'; ?>
						<?php elseif ($crops->certification == 1) : ?>
							<?php echo '<span class="text-info">Ολοκληρωμένη Διαχείρηση</span>'; ?>
						<?php else : ?>
							<?php echo '<span class="text-success">Βιολογική Καλλιέργεια</span>'; ?>
						<?php endif ?>
					</td>
					<!-- <td><?php //echo $crops->comment; ?></td> -->
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
	<?php if($total_crops > 5) : ?>
		<div class='pull-right'><a href="<?php echo site_url('gfusers/gf_my_profile/my_crops'); ?>">εμφάνιση όλων</a></div>
	<?php endif; ?>
<?php endif; ?>

<br>
<!-- ################################################################## -->
<!-- View User's crop Offers -->
<div class="page-header">
<h4>Προσφορές μου <small>&nbsp;<a href="<?php echo site_url('gfusers/gf_my_profile/my_crop_offers'); ?>">εμφάνιση όλων </a></small>&nbsp;<?php if($total_croffers > 0): ?><span class="badge"><?php echo $total_croffers; ?> </span><?php endif; ?>
<div class="btn-group pull-right">
	<!-- <button class="btn btn-link" type="submit"><i class="icon-cog"></i></button> -->
	<button class="btn btn-mini btn-link dropdown-toggle " data-toggle="dropdown">
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu ">
		<li><a href="<?php echo site_url('croffer/create') ?>">Νέα Προσφορά</a></li>
	</ul>
</div>
</h4>
</div>
<?php if (isset($user_croffers) && is_array($user_croffers) && count($user_croffers)) : ?>
<table class='table table-condensed table-hover table-bordered'>
<!-- <caption></caption> -->
	<thead>
		
			<tr>
				<th>Καλλιέργεια</th>
				<th>Ποικιλία</th>
				<th>Ποσότητα</th>
				<th>Τιμή</th>
				<!-- <th>Λεπτομέριες</th> -->
			</tr>
		
	</thead>
	<tbody>
		<?php if (isset($user_croffers) && is_array($user_croffers) && count($user_croffers)) : ?>
			<?php foreach ($user_croffers as $croffers) : ?>
				<tr class="center">
					<td><a href="<?php echo $croffers->crops_gr; ?>"><b><?php echo $croffers->crops_gr; ?></b></a></td>
					<td class='muted'><?php echo $croffers->crop_variety_gr; ?></td>
					<td class='muted'><b><?php echo $croffers->quantity . '</b> Τόνοι'; ?></td>
					<td class='muted'><b><?php echo $croffers->price  . ' &#8364;</b> / ανά τόνο '; ?></td>
					<!-- <td><?php //echo $crops->comment; ?></td> -->
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
	<?php if($total_crops > 5) : ?>
		<div class='pull-right'><a href="<?php echo site_url('gfusers/gf_my_profile/my_crop_offers'); ?>">εμφάνιση όλων</a></div>
	<?php endif; ?>
<?php endif; ?>
<br>
<!-- ################################################################## -->
<!-- View User's Demands -->
<!-- <div class="page-header">
<h4>Οι ζητήσεις μου <small>Subtext for header</small>
<div class="btn-group pull-right">
	<button class="btn btn-mini btn-link dropdown-toggle " data-toggle="dropdown">
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu ">
		<li><a href="<?php echo site_url('croffer/create') ?>">Νέα Ζήτηση</a></li>
	</ul>
</div>
</h4>
</div> 
<br>-->
<!-- ################################################################## -->
<!-- View User's Questions -->
<div class="page-header">
<h4>Ερωτήσεις μου <small>σύνολο </small>&nbsp;<?php if($total_questions > 0): ?><span class="badge"><?php echo $total_questions; ?></span><?php endif; ?>
<div class="btn-group pull-right">
	<!-- <button class="btn btn-link" type="submit"><i class="icon-cog"></i></button> -->
	<button class="btn btn-mini btn-link dropdown-toggle " data-toggle="dropdown">
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu ">
		<li><a href="<?php echo site_url('questions/questions/write_question') ?>">Νέα Ερώτηση</a></li>
	</ul>
</div>
</h4>
</div>
<div>
	<ul class=''>
	<?php if (isset($user_questions) && is_array($user_questions) && count($user_questions)) : ?>
		<?php foreach ($user_questions as $questions) : ?>
			<li>
				<a href="<?php echo site_url('questions/questions/read_question') ?><?php echo '/' . $questions->q_id; ?>" title="<?php echo $questions->details; ?>"><?php echo $questions->body; ?></a><br>
				<?php // echo ', ' .$questions->details; ?>
				<?php // echo ', ' .$questions->sub_category . ' '; ?>
				<?php // echo ', ' .$questions->category . '  <br>' ; ?>
			</li>

		<?php endforeach; ?>
	<?php endif; ?>
	</ul>
</div>

<br>
<!-- ################################################################## -->
<!-- View User's Anounce's -->
<!-- <div class="page-header">
<h4>Οι αγγελίες μου <small>Subtext for header</small>
<div class="btn-group pull-right">
	<button class="btn btn-mini btn-link dropdown-toggle " data-toggle="dropdown">
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu ">
		<li><a href="<?php //echo site_url('questions/questions/write_question') ?>">Νέα Αγγελία</a></li>
	</ul>
</div>
</h4>
</div> -->

<!-- <br> -->
<!-- ################################################################## -->
<!-- View User's Groups -->
<!-- <div class="page-header">
<h4>Οι ομάδες μου <small>Subtext for header</small>
<div class="btn-group pull-right">
	<button class="btn btn-mini btn-link dropdown-toggle " data-toggle="dropdown">
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu ">
		<li><a href="<?php //echo site_url('questions/questions/write_question') ?>">Νέα Ομάδα</a></li>
	</ul>
</div>
</h4>
</div> -->

<!-- <br> -->
<!-- ################################################################## -->
<!-- View User's Event -->
<!-- <div class="page-header">
<h4>Οι εκδηλώσεις μου <small>Subtext for header</small>
<div class="btn-group pull-right">
	<button class="btn btn-mini btn-link dropdown-toggle " data-toggle="dropdown">
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu ">
		<li><a href="<?php //echo site_url('questions/questions/write_question') ?>">Νέα Εκδήλωση</a></li>
	</ul>
</div>
</h4>
</div> -->