<div class="page-header">
<h4>Καλλιέργειες<small> Subtext for header</small></h4>
</div>

 <!-- View User's crops -->
<div>
	<ol>
	<?php if (isset($user_crops) && is_array($user_crops) && count($user_crops)) : ?>
		<?php foreach ($user_crops as $crops) : ?>
			<li>
				<b><?php echo $crops->crops_gr; ?></b>
				<span class='muted'>
					<?php echo ' <b>|</b> ' .$crops->crop_variety_gr; ?>
					<?php echo ' <b>|</b> ' .$crops->hectar . ' Στρέμματα'; ?>
					<?php echo ' <b>|</b> ' .$crops->crop_variety_gr . '<br>' ; ?>
				</span>
			</li>

		<?php endforeach; ?>
	<?php endif; ?>
	</ol>
</div>

<br>
<!-- View User's Offers -->
<div class="page-header">
<h4>Προσφορές <small>Subtext for header</small></h4>
</div>
<?php //print_r($user_croffers); ?>
 <!-- View User's crops -->
<div>
	<ol>
	<?php if (isset($user_croffers) && is_array($user_croffers) && count($user_croffers)) : ?>
		<?php foreach ($user_croffers as $croffer) : ?>
			<li>
				<a href="<?php echo $croffer->crops_gr; ?>"><?php echo $croffer->crops_gr; ?></a>
				<span class='muted'>
					<?php echo ' <b>|</b> ' .$croffer->crop_variety_gr; ?>
					<?php echo ' <b>|</b> ' .$croffer->quantity . ' Τόνοι'; ?>
					<?php echo ' <b>|</b> ' .$croffer->price . ' &#8364; / ανά τόνο <br>' ; ?>
				</span>
			</li>

		<?php endforeach; ?>
	<?php endif; ?>
	</ol>
</div>

<br>
<!-- View User's Demands -->
<div class="page-header">
<h4>Ζητήσεις <small>Subtext for header</small></h4>
</div>

<br>
<!-- View User's Questions -->
<div class="page-header">
	<h4>Ερωτήσεις <small>Subtext for header</small></h4>
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

<br>
<!-- View User's Questions -->
<div class="page-header">
<h4>Αγγελίες <small>Subtext for header</small></h4>
</div>

<br>
<!-- View User's Groups -->
<div class="page-header">
<h4>Ομάδες <small>Subtext for header</small></h4>
</div>

<br>
<!-- View User's Event -->
<div class="page-header">
<h4>Εκδηλώσεις <small>Subtext for header</small></h4>
</div>
