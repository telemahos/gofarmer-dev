<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($messages) ) {
    $messages = (array)$messages;
}
$id = isset($messages['id']) ? $messages['id'] : '';
?>


<div>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
	<!-- BUTTONS -->
		<div>
			<div>
				<input type="submit" name="save" id='save' class="btn btn-small btn-primary" value="Αποστολή" />
            	 <?php echo anchor('/messages/mails', lang('messages_cancel'), 'class="btn btn-small"'); ?>
			</div>
			<div class='divider'></div>
		</div>
		<div class='well well-small'>
			<!-- To User Select  -->
            <div class="control-group <?php echo form_error('messages_to') ? 'error' : ''; ?>">
                <?php echo form_label(lang('crop_add_crop') . lang('messages_to'), 'messages_to', array('class' => "control-label") ); ?>
                <div class='controls'>
                    <select name="messages_to" id='messages_to'>
                        <!-- <option value="0"><?php echo lang('crop_add_crop_select'); ?></option> -->
                        <?php if(isset($users)) : foreach ($users as $to_user): ?>
                            <!-- Make an selected control point -->
                            <option value="<?php echo $to_user->id ?>"> <!-- The selected option -->
                                <?php echo $to_user->username; ?>
                            </option>      
                            <!-- End of selected control point -->  
                        <?php endforeach; ?>
                        <?php else : ?>                              
                        <?php endif; ?>
                    </select> 
                </div>
            </div>
            <!-- FROM USER -->
            <input type='hidden' name='messages_from' value='<?php echo $current_user->id; ?>'>
			<p><span><small>Από: </small> <input type='text' value='<?php echo $current_user->username; ?>' disabled ></span></p>
			<!-- SUBJECT -->
			<p><small>Θέμα: </small>
				<input type='text' class='span9' id='msg_subject' name='messages_subject'>&nbsp;<span class='label' id="subjectRemainingCharacters"></span> </p>
		</div>
		<!-- BODY MESSAGE -->
		<div>
			<textarea rows="6" class='span12' id='msg_body' name='messages_body'></textarea>
			<p><span class='label' id="bodyRemainingCharacters"></span> </p> 
			<div class='divider'></div>
		</div>
		<div>
			<!-- ACTIONS -->
			<div>
				<input type="submit" name="save" id='save' class="btn btn-small btn-primary" value="Αποστολή" />
            	 <?php echo anchor('/messages/mails', lang('messages_cancel'), 'class="btn btn-small"'); ?>
			</div>
		</div>

	<?php echo form_close(); ?>
</div>