<?php  if(empty($records)) : ?>
	<h3>No records found that match your selection.</h3>
	<?php echo anchor('/messages/mails', lang('messages_cancel'), 'class="btn btn-small"'); ?>
<?php else : ?>
<div>
	<div>
		<h4><?php echo $records->subject; ?><span>
		<div class='pull-right'>
			<?php echo anchor('/messages/mails', '<i class="icon-circle-arrow-left"></i> ' .lang('messages_cancel'), 'class="btn btn-small"'); ?>
			<?php echo anchor("#myModal".$records->msg_id , "<i class='icon-trash icon-white'></i>", array('title' => 'Διαγραφή', 'class' => 'btn btn-mini btn-danger', 'data-toggle' => 'modal', 'id' => 'delButton') ); ?>
				<!-- Modal Window for Deleting a reocrd ================ -->
				<div class="modal fade" id="myModal<?php echo $records->msg_id; ?>">
					<div class="modal-header">
						<a class="close" data-dismiss="modal">×</a>
						<h5>Διαγραφή Μηνύματος: <!-- {<?php echo $records->msg_id; ?>} --></h5>
					</div>
					<div class="modal-body">
						<p>Θέλετε να διαγράψετε το μύνημα;;; <br><b><?php echo $records->subject; ?></b></p>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Άκυρο</a>
						<a href="<?php echo site_url('messages/messages/delete_mail'); ?>/<?php echo $records->msg_id ?>/" class="btn btn-danger"><i class='icon-trash icon-white'></i> Διαγραφή Μηνύματος</a>
					</div>
				</div>
				<!-- END of Modal Window for Deleting a reocrd ================ -->
		</div></span></h4>
		<div class='divider'></div>
	</div>
	<div>
		<img src="<?php echo site_url('images/kostas.jpg') ?>" class="img-polaroid"  width='35' height='35'>
		<span><small>Από:</small> <strong><?php echo $records->username; ?></strong><small class='pull-right'><abbr class="timeago" title="<?php echo date('j-M-Y, G:i ', strtotime($records->date)); ?>"><?php echo date('j-M-Y, G:i ', strtotime($records->date)); ?></abbr></small></span>
		<div class='divider'></div>
	</div>
	<div>
		<?php echo $records->body; ?>
	</div>
	<hr>
	<div>
		<?php echo form_open($this->uri->uri_string(), 'class="form-vertical"'); ?>
		<div class="accordion" id="accordion2">
			<div class="accordion-group">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
						Απάντηση
					</a>
				</div>
				
				<div id="collapseOne" class="accordion-body collapse">
					<div class="accordion-inner">
						<!-- FROM -->
						<input type='hidden' name="messages_to" value='<?php echo $records->from; ?>'>
						<!-- TO -->
						<input type='hidden' name="messages_from" value='<?php echo $current_user->id; ?>'>
						<!-- SUBJECT -->
						<input type='hidden' name="messages_subject" value='<?php echo 'Re: ' . $records->subject; ?>'>
						<span><img src="<?php echo site_url('images/kostas.jpg') ?>" class="img-polaroid"  width='35' height='35'>	
						<!-- MSG BODY	  -->
						<textarea class='span10' name='messages_body'  rows="12" id='msg_body' autofocus="autofocus">


----------------------------------------	
<?php echo lang('messages_from'); ?><?php echo $records->username; ?>
						
<?php echo trim($records->body); ?>

						</textarea></span>
						<br>
						<input type="submit" name="save" class="btn btn-small" value="Αποστολή" />
						<span class='label pull-right' id="bodyRemainingCharacters"></span>
					</div>
				</div>
				
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
	
</div>

<?php endif; ?>