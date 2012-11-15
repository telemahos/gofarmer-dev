<div>
	<div class='row'>
		<div class='span2 offset2'>
			<div class=''>
				<img src="<?php echo site_url('images/kostas.jpg') ?>" class="img-polaroid" width='35' height='35'>
				<?php echo $records->username; ?>
			</div>
		</div>
		<div class='span8'>
			<div class='mini-layout'>
				<div class='questions'>
					<?php echo $records->body; ?>
					<div class='divider'></div>
					<small><?php echo $records->details; ?></small>
				</div>
				<div class='questions_details'>
					<small><span>δημοσιεύτηκε: </span><abbr class="timeago" title="<?php echo date('j-M-Y, G:i ', strtotime($records->created_on)); ?>"><?php echo date('j-M-Y, G:i ', strtotime($records->created_on)); ?></abbr>&nbsp; <span>στο θέμα:</span> <a href="#">γεωπονικά</a> </small>
				</div>
			</div>
			<!-- <div class='divider'></div> -->
			<div id='btn-answer' class='right'>
				<a href="#" class='btn'>Απάντηση</a>
			</div>
			<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
			<div id='form-answer'>
				<div class='well well-small'>
					<h5>Η απάντηση σου</h5>
					<textarea rows="3" class='span12' id='msg_body' name='body'></textarea>
					<input type='hidden' name='question_id' value='<?php echo $records->q_id?>'>
					<input type='hidden' name='category' value='<?php echo $records->category?>'>
					<input type='hidden' name='sub_category' value='<?php echo $records->sub_category?>'>
					<input type='hidden' name='details' value='<?php echo $records->details?>'>
					<span class='label pull-right' id="bodyRemainingCharacters"></span> 
					<hr>
					<!-- ACTIONS -->
					<div>
						<input type="submit" name="save" id='save' class="btn btn-small btn-primary" value="Απάντηση" />
						<input type="submit" name="cancel" id='btn-answer-cancel' class="btn btn-small" value="Άκυρο" />
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div> 
	</div><!-- end row -->

	<hr>
	<!-- Show the Answers -->
	<div class='span8 offset3'><h4>Απαντήσεις</h4></div>
	<?php $i = 0; ?>
	<?php if (isset($answers) && is_array($answers) && count($answers)) : ?>
		<?php foreach ($answers as $answer) : ?>
			<?php $i++; ?>
			<div class='row'>
				<div class='span2 offset2'>
					<div class=''>
						<img src="<?php echo site_url('images/kostas.jpg') ?>" class="img-polaroid" width='35' height='35'>
						<?php echo $answer->username; ?>
					</div>	
				</div>
				<div class='span8'>
					<div>
						<div class='questions'>
							<?php echo $answer->body; ?> 
						</div>
						<div class='questions_details'>
							<small><span>δημοσιεύτηκε: </span><abbr class="timeago" title="<?php echo date('j-M-Y, G:i ', strtotime($answer->created_on)); ?>"><?php echo date('j-M-Y, G:i ', strtotime($answer->created_on)); ?></abbr></small>
						</div>
					</div>
				</div>
			</div><!-- end row -->
			<div class='divider'></div>
		<?php endforeach; ?>
	<?php else: ?>
		<div class='span8 offset4'>No records found that match your selection.</div>
	<?php endif; ?>
	
</div>