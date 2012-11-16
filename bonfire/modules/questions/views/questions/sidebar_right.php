<div class='sidebar'>
	<a href="<?php echo site_url("questions/questions/write_question"); ?>" class="btn btn-large btn-block "><img class="glyphs"  src="<?php echo Template::theme_url('images/glyphs/png/glyphicons_194_circle_question_mark.png') ?>" >Νέα Ερώτηση</a> 
	<br>

    <div class='side_widget'>
        <div class="side_widget_header">
            <h4>Οι δικές μου ερωτήσεις και απαντήσεις</h4>
        </div>
		<table>
			<thead></thead>
			<tbody>
				<tr>
					<td class='count'>
						<?php if (isset($count_my_questions) && $count_my_questions > 0) : ?>
							<a href="<?php echo site_url('questions/questions/all_my_questions') ?>"><?php echo $count_my_questions; ?></a>
						<?php else : ?>
						0
						<?php endif; ?>
						
					</td>
					<td>&nbsp;&nbsp;</td>
					<td class='description'>
						Ερωτήσεις δικές σου.
					</td>
				</tr>
				<tr>
					<td class='count'>
						<?php if (isset($count_my_answers) && $count_my_answers > 0) : ?>
							<a href="<?php echo site_url('questions/questions/all_my_answers') ?>"><?php echo $count_my_answers; ?></a>
						<?php else : ?>
						0
						<?php endif; ?>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td class='description'>
						Απαντήσεις δικές σου. 
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class='side_widget'>
		<div class="side_widget_header">
			<h4>Όλες οι ερωτήσεις και απαντήσεις</h4>
		</div>
		<table>
			<thead></thead>
			<tbody>
				<tr>
					<td class='count'>
						<?php if (isset($count_all_questions) && $count_all_questions > 0) : ?>
							<a href="<?php echo site_url('questions/questions/all_questions') ?>"><?php echo $count_all_questions; ?></a>
						<?php else : ?>
						0
						<?php endif; ?>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td class='description'>
						Ερωτήσεις
					</td>
				</tr>
				<tr>
					<td class='count'>
						<?php if (isset($count_all_answers) && $count_all_answers > 0) : ?>
							<?php echo $count_all_answers; ?>
						<?php else : ?>
						0
						<?php endif; ?>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td class='description'>
						Απαντήσεις για όλες τις ερωτήσεις που έχουν γίνει. 
					</td>
				</tr>
			</tbody>
		</table>
  	</div>

  	<div class='side_widget'>
        <div class="side_widget_header">
            <h4>Περιήγηση στις ερωτήσεις</h4>
        </div>
		<ul>
			<li><a href="<?php echo site_url('questions/questions/all_questions_by_category/1'); ?>">Γεωργία</a></li>
			<li><a href="<?php echo site_url('questions/questions/all_questions_by_category/2'); ?>">Πώληση</a></li>
			<li><a href="<?php echo site_url('questions/questions/all_questions_by_category/3'); ?>">Τεχνολογία</a></li>
			<li><a href="<?php echo site_url('questions/questions/all_questions_by_category/4'); ?>">Προσφορά</a></li>
			<li><a href="<?php echo site_url('questions/questions/all_questions_by_category/5'); ?>">Ζήτηση</a></li>
		</ul>
	</div>

	<div class='side_widget'>
		<div class="side_widget_header">
			<h4>Ενδιαφέρουσες Εταιρίες</h4>
		</div>
		this is sidebar right
  	</div>

  	<div class='side_widget'>
        <div class="side_widget_header">
            <h4>Άτομα που μπορεί να γνωρίζεις</h4>
        </div>
		this is sidebar right
	</div>

	<div class='side_widget'>
		<div class="side_widget_header">
			<h4>Ενδιαφέρουσες Εταιρίες</h4>
		</div>
		this is sidebar right
  	</div>
</div>