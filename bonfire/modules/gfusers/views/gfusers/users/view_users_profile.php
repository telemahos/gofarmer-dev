<ul class="nav nav-tabs">
	<li class="active"><a href="#"><?php echo $user->username; ?></a></li>
    <li>
    	<a href="<?php echo site_url('gfusers/gf_users_profile/users_crops') . '/' . $user->id; ?>">Καλλιέργειες</a>
    </li>
    <li><a href="<?php echo site_url('gfusers/gf_users_profile/users_crop_offers') . '/' . $user->id; ?>">Προσφορές</a></li>
    <li><a href="<?php echo site_url('gfusers/gf_users_profile/users_following')  . '/' . $user->id; ?>">Ακολουθεί</a></li>
	<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_followers')  . '/' . $user->id; ?>">Ακολουθείτε</a></li>
    <li class="dropdown pull-right">
		<a class="dropdown-toggle"
		data-toggle="dropdown"
		href="#">
			<!-- <i class="icon-cog"></i> -->
			<b class="caret"></b>
		</a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo site_url('gfusers/gf_users_profile/users_profile') . '/' . $user->id; ?>"><?php echo $user->username; ?></a></li>
		</ul>
	</li>
</ul>
<br>

<div class="page-header">
<h4>Καλλιέργειες<small> &nbsp;<a href="<?php echo site_url('gfusers/gf_users_profile/users_crops') . '/' . $this->uri->segment(4); ?>">εμφάνιση όλων</a></small>&nbsp;<?php if($total_crops > 0): ?><span class="badge"><?php echo $total_crops; ?> </span><?php endif; ?></h4>
</div>

 <!-- View User's crops -->
<?php if (isset($user_crops) && is_array($user_crops) && count($user_crops)) : ?>
<table class='table table-condensed table-hover'>
<!-- <caption></caption> -->
	<thead>
		
			<tr>
				<th>Καλλιέργεια</th>
				<th>Ποικιλία</th>
				<th>Στρέμματα</th>
				<th>Είδος Καλλιέργειας</th>
				<th>&nbsp;</th>
			</tr>
		
	</thead>
	<tbody>
		<?php if (isset($user_crops) && is_array($user_crops) && count($user_crops)) : ?>
			<?php foreach ($user_crops as $crops) : ?>
				<tr class="center">
					<td><b><?php echo $crops->crops_gr; ?></b></td>
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
<h4>
	Προσφορές <small>&nbsp;<a href="<?php echo site_url('gfusers/gf_my_profile/my_crop_offers'); ?>">εμφάνιση όλων </a></small>&nbsp;<?php if($total_croffers > 0): ?><span class="badge"><?php echo $total_croffers; ?> </span><?php endif; ?>
</h4>
</div>
<?php if (isset($user_croffers) && is_array($user_croffers) && count($user_croffers)) : ?>
<table class='table table-condensed table-hover'>
<!-- <caption></caption> -->
	<thead>
		
			<tr>
				<th>Καλλιέργεια</th>
				<th>Ποικιλία</th>
				<th>Ποσότητα</th>
				<th>Τιμή</th>
			</tr>
		
	</thead>
	<tbody>
		<?php if (isset($user_croffers) && is_array($user_croffers) && count($user_croffers)) : ?>
			<?php foreach ($user_croffers as $croffers) : ?>
				<tr class="center">
					<td><b><?php echo $croffers->crops_gr; ?></b></td>
					<td class='muted'><?php echo $croffers->crop_variety_gr; ?></td>
					<td class='muted'><b><?php echo $croffers->quantity . '</b> Τόνοι'; ?></td>
					<td class='muted'><b><?php echo $croffers->price  . ' &#8364;</b> / ανά τόνο '; ?></td>
				</tr>

			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
	<?php if($total_croffers > 5) : ?>
		<div class='pull-right'><a href="<?php echo site_url('gfusers/gf_my_profile/my_crop_offers'); ?>">εμφάνιση όλων</a></div>
	<?php endif; ?>
<?php endif; ?>

<!-- View User's Demands -->
<!-- <div class="page-header">
<h4>Ζητήσεις <small>Subtext for header</small></h4>
</div> -->

<br>
<!-- View User's Questions -->
<div class="page-header">
	<h4>
		Ερωτήσεις <small>σύνολο </small>&nbsp;<?php if($total_questions > 0): ?><span class="badge"><?php echo $total_questions; ?></span><?php endif; ?>
	</h4>
</div>
<div>
	<ol>
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
	</ol>
</div>

<!-- View User's Questions -->
<!-- <div class="page-header">
<h4>Αγγελίες <small>Subtext for header</small></h4>
</div> -->


<!-- View User's Groups -->
<!-- <div class="page-header">
<h4>Ομάδες <small>Subtext for header</small></h4>
</div> -->


<!-- View User's Event -->
<!-- <div class="page-header">
<h4>Εκδηλώσεις <small>Subtext for header</small></h4>
</div> -->
