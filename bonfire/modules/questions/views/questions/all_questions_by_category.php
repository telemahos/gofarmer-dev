<div>
		<h4>Συνολικές Ερωτήσεις <b>(<?php echo $total_records;?>)</b></h4>
		<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<div class='row'>
					<div class='span1 offset1'>
						<img src="<?php echo site_url('images/kostas.jpg') ?>" class="img-polaroid" width='35' height='35'><br>
						
					</div>
					<div class='span10'>
						<div class='questions'>
						<a title='<?php echo $record->body; ?>'  href="<?php echo site_url('questions/questions/read_question') ?><?php echo '/'. $record->q_id ?>"><?php echo $record->body; ?>
						</a>
						</div>
						<div class='questions_details'>
							<!-- Find how many answers has this Question -->
							<?php $i = 0; ?>
							<?php if (isset($answers) && is_array($answers) && count($answers)) : ?>
								<?php foreach ($answers as $answer) : ?>
									<?php if ($record->q_id == $answer->question_id): ?>
										<?php $i++; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>


							<small><span>απαντήσεις:</span> <?php echo $i; ?> &nbsp; | &nbsp; <span>από:</span> <?php echo $record->username ?>&nbsp; | &nbsp;<abbr class="timeago" title="<?php echo date('j-M-Y, G:i ', strtotime($record->created_on)); ?>"><?php echo date('j-M-Y, G:i ', strtotime($record->created_on)); ?></abbr>&nbsp; <span>στο θέμα:</span> <a href="#"><?php echo $record->category; ?></a> </small>
						</div>
						<div class='divider'></div>
					</div>

				</div>
				
			<?php endforeach; ?>
		<?php else: ?>
			No records found that match your selection.
		<?php endif; ?>

	</div>
	<!-- PAGINATION -->
    <div class="pagination pagination-centered">
    	<ul>
    		<?php echo $this->pagination->create_links(); ?>
    	</ul>
	</div>