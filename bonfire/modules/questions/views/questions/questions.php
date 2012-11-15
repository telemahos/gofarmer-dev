<div>
	<?php //echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
	<?php echo form_open('questions/questions/write_a_question', 'class="form-horizontal"'); ?>
	<div class='well well-small'>
		<h5><a href="<?php echo site_url('questions/questions/write_question'); ?>">Κάνε μια ερώτηση.</a></h5>
		<div>
			<input type="text" name="msg_subject" value="" class='span12' placeholder="Κάνε μια ερώτηση" id='msg_subject'>
			<span class="help-block">Γράψε σύντομες ερωτήσεις για να απαντώνται ευκολότερα. </span><span class='label pull-right' id="subjectRemainingCharacters"></span> 
			<hr>
		</div>
		<div class=''>
			<!-- ACTIONS -->
			<div>
				<input type="submit" name="save" id='save' class="btn btn-primary" value="Επόμενο" />
				<!-- <a href="<?php //echo site_url('questions/questions/write_a_question'); ?>" class="btn btn-small btn-primary">Επόμενο</a> -->
            	  
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	<!-- <div class='divider'></div> -->
	<div>
		Απάντησε στις νέες ερωτήσεις (
			<?php if (isset($count_all_questions) && $count_all_questions > 0) : ?>
				<a href="<?php echo site_url('questions/questions/all_questions') ?>"><?php echo $count_all_questions; ?></a>
			<?php else : ?>
			0
			<?php endif; ?>
		)
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
	<div>
		Απάντησαν στις περισσότερες ερωτήσεις.
	</div>
</div>